<?php

use App\Http\Controllers\CalendarController;
use App\Http\Controllers\DeliverableController;
use App\Http\Controllers\DirectMessageController;
use App\Http\Controllers\DeliverableConversationController;
use App\Http\Controllers\DeliverableLinkController;
use App\Http\Controllers\MinistryRequestController;
use App\Http\Controllers\MyTaskController;
use App\Http\Controllers\PeopleDirectoryController;
use App\Http\Controllers\ProjectCloseoutController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectScheduleController;
use App\Http\Controllers\ProjectTypeController;
use App\Http\Controllers\RequestConversationController;
use App\Http\Controllers\Settings\ProfileController;
use App\Http\Controllers\TaggedRequestController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskLinkController;
use App\Http\Controllers\TriageRequestController;
use App\Http\Controllers\UserInviteController;
use App\Models\ConversationParticipant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::patch('/topbar/conversations/read', function (Request $request) {
        $profile = $request->user()->profiles()->where('status', 'Active')->first();
        if ($profile) {
            ConversationParticipant::where('profile_id', $profile->id)
                ->update(['last_read_at' => now()]);
        }
        return response()->noContent();
    })->name('topbar.conversations.read');

    Route::get('/requests/tagged', [TaggedRequestController::class, 'index'])->name('requests.tagged');
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/tasks', [MyTaskController::class, 'index'])->name('tasks.index');
    Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar.index');
    Route::get('/calendar/events', [CalendarController::class, 'events'])->name('calendar.events');
    Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
    Route::get('/projects/{project}/schedule', [ProjectScheduleController::class, 'show'])->name('projects.schedule');
    Route::patch('/projects/{project}/schedule/order', [ProjectScheduleController::class, 'reorder'])->name('projects.schedule.reorder');
    Route::patch('/projects/{project}/schedule/dates', [ProjectScheduleController::class, 'updateDates'])->name('projects.schedule.dates');
    Route::get('/projects/{project}/closeout', [ProjectCloseoutController::class, 'show'])->name('projects.closeout');
    Route::post('/projects/{project}/closeout/start', [ProjectCloseoutController::class, 'start'])->name('projects.closeout.start');
    Route::patch('/projects/{project}/closeout', [ProjectCloseoutController::class, 'update'])->name('projects.closeout.update');
    Route::post('/projects/{project}/closeout/archive', [ProjectCloseoutController::class, 'archive'])->name('projects.closeout.archive');
    Route::patch('/projects/{project}/status', [ProjectController::class, 'updateStatus'])->name('projects.status.update');
    Route::get('/projects/{project}/deliverables/create', [DeliverableController::class, 'create'])->name('deliverables.create');
    Route::post('/projects/{project}/deliverables', [DeliverableController::class, 'store'])->name('deliverables.store');
    Route::get('/projects/{project}/deliverables/{deliverable}', [DeliverableController::class, 'show'])->name('deliverables.show');
    Route::get('/projects/{project}/deliverables/{deliverable}/edit', [DeliverableController::class, 'edit'])->name('deliverables.edit');
    Route::patch('/projects/{project}/deliverables/{deliverable}', [DeliverableController::class, 'update'])->name('deliverables.update');
    Route::post('/projects/{project}/deliverables/{deliverable}/plan', [DeliverableController::class, 'plan'])->name('deliverables.plan');
    Route::post('/projects/{project}/deliverables/{deliverable}/start-production', [DeliverableController::class, 'startProduction'])->name('deliverables.production.start');
    Route::post('/projects/{project}/deliverables/{deliverable}/submit-review', [DeliverableController::class, 'submitForReview'])->name('deliverables.review.submit');
    Route::post('/projects/{project}/deliverables/{deliverable}/review-decision', [DeliverableController::class, 'reviewDecision'])->name('deliverables.review.decision');
    Route::post('/projects/{project}/deliverables/{deliverable}/start-delivery', [DeliverableController::class, 'startDelivery'])->name('deliverables.delivery.start');
    Route::post('/projects/{project}/deliverables/{deliverable}/mark-published', [DeliverableController::class, 'markPublished'])->name('deliverables.published.mark');
    Route::post('/projects/{project}/deliverables/{deliverable}/end', [DeliverableController::class, 'end'])->name('deliverables.end');
    Route::post('/projects/{project}/deliverables/{deliverable}/archive', [DeliverableController::class, 'archive'])->name('deliverables.archive');
    Route::post('/projects/{project}/deliverables/{deliverable}/messages', [DeliverableConversationController::class, 'store'])->name('deliverables.messages.store');
    Route::post('/projects/{project}/deliverables/{deliverable}/links', [DeliverableLinkController::class, 'store'])->name('deliverables.links.store');
    Route::delete('/projects/{project}/deliverables/{deliverable}/links/{deliverableLink}', [DeliverableLinkController::class, 'destroy'])->name('deliverables.links.destroy');
    Route::get('/projects/{project}/deliverables/{deliverable}/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/projects/{project}/deliverables/{deliverable}/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::get('/projects/{project}/deliverables/{deliverable}/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');
    Route::get('/projects/{project}/deliverables/{deliverable}/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::patch('/projects/{project}/deliverables/{deliverable}/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
    Route::post('/projects/{project}/deliverables/{deliverable}/tasks/{task}/links', [TaskLinkController::class, 'store'])->name('tasks.links.store');
    Route::delete('/projects/{project}/deliverables/{deliverable}/tasks/{task}/links/{taskLink}', [TaskLinkController::class, 'destroy'])->name('tasks.links.destroy');
    Route::resource('project-types', ProjectTypeController::class)->only(['index', 'store', 'edit', 'update']);
    Route::resource('requests', MinistryRequestController::class)
        ->parameters(['requests' => 'ministryRequest'])
        ->except(['destroy']);
    Route::post('/requests/{ministryRequest}/submit', [MinistryRequestController::class, 'submit'])->name('requests.submit');
    Route::post('/requests/{ministryRequest}/messages', [RequestConversationController::class, 'store'])->name('requests.messages.store');
    Route::get('/triage/requests', [TriageRequestController::class, 'index'])->name('triage.index');
    Route::get('/triage/requests/{ministryRequest}', [TriageRequestController::class, 'show'])->name('triage.show');
    Route::post('/triage/requests/{ministryRequest}/transition', [TriageRequestController::class, 'transition'])->name('triage.transition');
    Route::post('/triage/requests/{ministryRequest}/convert', [TriageRequestController::class, 'convert'])->name('triage.convert');
    Route::get('/people', [PeopleDirectoryController::class, 'index'])->name('people.index');
    Route::get('/people/{profile}', [PeopleDirectoryController::class, 'show'])->name('people.show');
    Route::post('/messages/{profile}', [DirectMessageController::class, 'store'])->name('messages.store');
    Route::get('/conversations/{conversation}', [DirectMessageController::class, 'show'])->name('conversations.show');
    Route::post('/conversations/{conversation}/reply', [DirectMessageController::class, 'reply'])->name('conversations.reply');
    Route::get('/users/create', [UserInviteController::class, 'create'])->name('users.create');
    Route::post('/users', [UserInviteController::class, 'store'])->name('users.store');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::redirect('/settings', '/settings/account');
    Route::redirect('/settings/profile', '/settings/account');
    Route::get('/settings/account', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/settings/account', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/settings/account/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.avatar');
    Route::post('/settings/account/banner', [ProfileController::class, 'updateBanner'])->name('profile.banner');

    Route::get('/ui/typography', fn () => view('ui.typography'));
    Route::get('/ui/colors', fn () => view('ui.colors'));
    Route::get('/ui/buttons', fn () => view('ui.buttons'));
    Route::get('/ui/forms', fn () => view('ui.forms'));
    Route::get('/ui/cards', fn () => view('ui.cards'));
});

Route::get('/auth/lock-screen', function () {
    return redirect()->route('password.confirm');
});

Route::get('/auth/sign-in', function () {
    return redirect()->route('login');
});

Route::get('/auth/new-pass', function () {
    return redirect()->route('password.request');
});

Route::get('/auth/delete-account', function () {
    return view('auth.delete-account');
});

// Registration is invite-only — /auth/sign-up redirects to login
Route::get('/auth/sign-up', function () {
    return redirect()->route('login');
});

Route::get('/auth/reset-pass', function () {
    return redirect()->route('password.request');
});

Route::get('/auth/success-mail', function () {
    return redirect()->route('verification.notice');
});

Route::get('/auth/two-factor', function () {
    return redirect()->route('two-factor.login');
});

Route::get('/auth/login-pin', function () {
    return view('auth.login-pin');
});

Route::get('/layouts/compact', function () {
    return view('layouts.compact');
});

Route::get('/layouts/boxed', function () {
    return view('layouts.boxed');
});

Route::get('/layouts/horizontal', function () {
    return view('layouts.horizontal');
});

Route::get('/layouts/preloader', function () {
    return view('layouts.preloader');
});

Route::get('/layouts/scrollable', function () {
    return view('layouts.scrollable');
});

Route::get('/error/400', function () {
    return view('error.400');
});

Route::get('/error/500', function () {
    return view('error.500');
});

Route::get('/error/408', function () {
    return view('error.408');
});

Route::get('/error/404', function () {
    return view('error.404');
});

Route::get('/error/401', function () {
    return view('error.401');
});

Route::get('/error/maintenance', function () {
    return view('error.maintenance');
});

Route::get('/error/403', function () {
    return view('error.403');
});

Route::get('/icons/tabler', function () {
    return view('icons.tabler');
});

Route::get('/auth-split/lock-screen', function () {
    return view('auth-split.lock-screen');
});

Route::get('/auth-split/sign-in', function () {
    return view('auth-split.sign-in');
});

Route::get('/auth-split/new-pass', function () {
    return view('auth-split.new-pass');
});

Route::get('/auth-split/delete-account', function () {
    return view('auth-split.delete-account');
});

Route::get('/auth-split/sign-up', function () {
    return view('auth-split.sign-up');
});

Route::get('/auth-split/reset-pass', function () {
    return view('auth-split.reset-pass');
});

Route::get('/auth-split/success-mail', function () {
    return view('auth-split.success-mail');
});

Route::get('/auth-split/two-factor', function () {
    return view('auth-split.two-factor');
});

Route::get('/auth-split/login-pin', function () {
    return view('auth-split.login-pin');
});

Route::get('/pages/empty', function () {
    return view('pages.empty');
});

Route::get('/auth-card/lock-screen', function () {
    return view('auth-card.lock-screen');
});

Route::get('/auth-card/sign-in', function () {
    return view('auth-card.sign-in');
});

Route::get('/auth-card/new-pass', function () {
    return view('auth-card.new-pass');
});

Route::get('/auth-card/delete-account', function () {
    return view('auth-card.delete-account');
});

Route::get('/auth-card/sign-up', function () {
    return view('auth-card.sign-up');
});

Route::get('/auth-card/reset-pass', function () {
    return view('auth-card.reset-pass');
});

Route::get('/auth-card/success-mail', function () {
    return view('auth-card.success-mail');
});

Route::get('/auth-card/two-factor', function () {
    return view('auth-card.two-factor');
});

Route::get('/auth-card/login-pin', function () {
    return view('auth-card.login-pin');
});

Route::get('/layouts/sidebar/offcanvas', function () {
    return view('layouts.sidebar.offcanvas');
});

Route::get('/layouts/sidebar/compact', function () {
    return view('layouts.sidebar.compact');
});

Route::get('/layouts/sidebar/image', function () {
    return view('layouts.sidebar.image');
});

Route::get('/layouts/sidebar/on-hover', function () {
    return view('layouts.sidebar.on-hover');
});

Route::get('/layouts/sidebar/gray', function () {
    return view('layouts.sidebar.gray');
});

Route::get('/layouts/sidebar/gradient', function () {
    return view('layouts.sidebar.gradient');
});

Route::get('/layouts/sidebar/on-hover-active', function () {
    return view('layouts.sidebar.on-hover-active');
});

Route::get('/layouts/sidebar/with-lines', function () {
    return view('layouts.sidebar.with-lines');
});

Route::get('/layouts/sidebar/light', function () {
    return view('layouts.sidebar.light');
});

Route::get('/layouts/topbar/dark', function () {
    return view('layouts.topbar.dark');
});

Route::get('/layouts/topbar/gray', function () {
    return view('layouts.topbar.gray');
});

Route::get('/layouts/topbar/gradient', function () {
    return view('layouts.topbar.gradient');
});
