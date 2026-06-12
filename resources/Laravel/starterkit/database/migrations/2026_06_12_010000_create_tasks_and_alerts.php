<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_id')->constrained()->restrictOnDelete();
            $table->foreignId('deliverable_id')->constrained()->cascadeOnDelete();
            $table->foreignId('assigned_to_profile_id')->nullable()->constrained('profiles')->nullOnDelete();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('status')->default('Not Started');
            $table->string('priority')->nullable();
            $table->date('due_date')->nullable();
            $table->unsignedInteger('time_budget_minutes')->nullable();
            $table->string('blocker_type')->nullable();
            $table->text('blocker_reason')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->foreignId('completed_by_profile_id')->nullable()->constrained('profiles')->nullOnDelete();
            $table->timestamp('completed_at')->nullable();
            $table->json('metadata_json')->nullable();
            $table->timestamps();

            $table->index(['organization_id', 'assigned_to_profile_id', 'status']);
            $table->index(['deliverable_id', 'sort_order']);
        });

        Schema::create('task_links', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_id')->constrained()->restrictOnDelete();
            $table->foreignId('task_id')->constrained()->cascadeOnDelete();
            $table->string('label')->nullable();
            $table->string('url', 2048);
            $table->foreignId('added_by_profile_id')->nullable()->constrained('profiles')->nullOnDelete();
            $table->timestamps();
        });

        Schema::create('work_notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_id')->constrained()->restrictOnDelete();
            $table->foreignId('recipient_profile_id')->constrained('profiles')->cascadeOnDelete();
            $table->foreignId('actor_profile_id')->nullable()->constrained('profiles')->nullOnDelete();
            $table->string('notification_type');
            $table->string('subject_type')->nullable();
            $table->unsignedBigInteger('subject_id')->nullable();
            $table->string('title');
            $table->text('body')->nullable();
            $table->string('action_url')->nullable();
            $table->timestamp('read_at')->nullable();
            $table->json('metadata_json')->nullable();
            $table->timestamps();

            $table->index(['recipient_profile_id', 'read_at']);
        });

        Schema::table('project_activity_events', function (Blueprint $table) {
            $table->foreignId('task_id')->nullable()->after('deliverable_id')->constrained()->nullOnDelete();
            $table->index(['project_id', 'task_id']);
        });
    }

    public function down(): void
    {
        Schema::table('project_activity_events', function (Blueprint $table) {
            $table->dropIndex(['project_id', 'task_id']);
            $table->dropConstrainedForeignId('task_id');
        });
        Schema::dropIfExists('work_notifications');
        Schema::dropIfExists('task_links');
        Schema::dropIfExists('tasks');
    }
};
