<?php

namespace App\Http\ViewComposers;

use App\Enums\TaskStatus;
use App\Models\Conversation;
use App\Models\Deliverable;
use App\Models\MinistryRequest;
use App\Models\Project;
use App\Models\Task;
use App\Models\WorkNotification;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Str;
use Illuminate\View\View;

class TopbarComposer
{
    public function compose(View $view): void
    {
        $user = auth()->user();

        if (! $user) {
            $this->withEmpty($view);
            return;
        }

        $profile = $user->profiles()->where('status', 'Active')->orderBy('id')->first();

        if (! $profile) {
            $this->withEmpty($view);
            return;
        }

        $conversations = Conversation::whereHas(
                'participants',
                fn ($q) => $q->where('profile_id', $profile->id)
            )
            ->whereHas('messages')
            ->with([
                'participants' => fn ($q) => $q->where('profile_id', $profile->id),
                'latestMessage',
                'subject' => fn (MorphTo $morphTo) => $morphTo->morphWith([
                    MinistryRequest::class => [],
                    Project::class => [],
                    Deliverable::class => ['project'],
                    Task::class => ['deliverable.project'],
                ]),
            ])
            ->latest()
            ->limit(6)
            ->get()
            ->map(function ($conversation) {
                $participant = $conversation->participants->first();
                $lastMessage = $conversation->latestMessage;
                $unread = is_null($participant?->last_read_at)
                    || $participant->last_read_at < $conversation->updated_at;

                return [
                    'title' => $conversation->title,
                    'preview' => $lastMessage
                        ? $this->messagePreview($lastMessage->body)
                        : null,
                    'last_active' => $conversation->updated_at,
                    'unread' => $unread,
                    'url' => $conversation->url(),
                ];
            });

        $alerts = WorkNotification::where('recipient_profile_id', $profile->id)
            ->whereNull('read_at')
            ->where(function ($query) use ($profile) {
                $query->where(function ($q) use ($profile) {
                    $q->where('notification_type', 'Blocked')
                        ->where('subject_type', Task::class)
                        ->whereIn('subject_id', Task::query()
                            ->where('organization_id', $profile->organization_id)
                            ->where('status', 'Blocked')
                            ->select('id'));
                })->orWhere(function ($q) use ($profile) {
                    $q->where('notification_type', 'Needs Approval')
                        ->where('subject_type', Task::class)
                        ->whereIn('subject_id', Task::query()
                            ->where('organization_id', $profile->organization_id)
                            ->where('status', TaskStatus::ReadyForReview->value)
                            ->select('id'));
                })->orWhere(function ($q) use ($profile) {
                    $q->where('notification_type', 'Needs Approval')
                        ->where('subject_type', Deliverable::class)
                        ->whereIn('subject_id', Deliverable::query()
                            ->where('organization_id', $profile->organization_id)
                            ->where('lifecycle_status', 'Ready for Review')
                            ->select('id'));
                });
            })
            ->latest()
            ->limit(6)
            ->get();

        $view->with([
            'topbarConversations' => $conversations,
            'topbarUnreadMessageCount' => $conversations->where('unread', true)->count(),
            'topbarAlerts' => $alerts,
            'topbarUnreadAlertCount' => $alerts->count(),
        ]);
    }

    private function messagePreview(?string $body): ?string
    {
        if (! $body) {
            return null;
        }

        $decoded = json_decode($body, true);

        if (json_last_error() === JSON_ERROR_NONE && isset($decoded['ops'])) {
            $text = collect($decoded['ops'])
                ->filter(fn ($op) => isset($op['insert']) && is_string($op['insert']))
                ->pluck('insert')
                ->join('');

            return Str::limit(trim($text), 60) ?: null;
        }

        return Str::limit(strip_tags($body), 60) ?: null;
    }

    private function withEmpty(View $view): void
    {
        $view->with([
            'topbarConversations' => collect(),
            'topbarUnreadMessageCount' => 0,
            'topbarAlerts' => collect(),
            'topbarUnreadAlertCount' => 0,
        ]);
    }
}
