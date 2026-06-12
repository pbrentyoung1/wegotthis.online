<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'organization_id',
        'user_id',
        'department_id',
        'display_name',
        'title',
        'person_type',
        'phone',
        'avatar_url',
        'bio',
        'status',
        'metadata_json',
    ];

    protected function casts(): array
    {
        return [
            'metadata_json' => 'array',
        ];
    }

    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function ledDepartments(): HasMany
    {
        return $this->hasMany(Department::class, 'lead_profile_id');
    }

    public function roleAssignments(): HasMany
    {
        return $this->hasMany(ProfileRoleAssignment::class);
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'profile_role_assignments')
            ->withPivot(['organization_id', 'scope_type', 'scope_id', 'assigned_by_profile_id', 'assigned_at', 'ended_at'])
            ->withTimestamps();
    }

    public function hasPermission(string $permissionKey): bool
    {
        return $this->roleAssignments()
            ->where('organization_id', $this->organization_id)
            ->whereNull('ended_at')
            ->whereHas('role.permissions', fn ($query) => $query->where('key', $permissionKey))
            ->exists();
    }

    public function submittedRequests(): HasMany
    {
        return $this->hasMany(MinistryRequest::class, 'requester_profile_id');
    }

    public function assignedRequests(): HasMany
    {
        return $this->hasMany(MinistryRequest::class, 'assigned_manager_profile_id');
    }

    public function requestDecisions(): HasMany
    {
        return $this->hasMany(MinistryRequest::class, 'decision_by_profile_id');
    }

    public function suggestedRequestIdeas(): HasMany
    {
        return $this->hasMany(RequestIdea::class, 'suggested_by_profile_id');
    }

    public function ownedProjects(): HasMany
    {
        return $this->hasMany(Project::class, 'owner_profile_id');
    }

    public function projectMemberships(): HasMany
    {
        return $this->hasMany(ProjectMember::class);
    }

    public function assignedTasks(): HasMany
    {
        return $this->hasMany(Task::class, 'assigned_to_profile_id');
    }

    public function workNotifications(): HasMany
    {
        return $this->hasMany(WorkNotification::class, 'recipient_profile_id');
    }
}
