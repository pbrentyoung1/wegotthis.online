<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_id')->constrained()->restrictOnDelete();
            $table->foreignId('department_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('source_request_id')->nullable()->unique()->constrained('requests')->nullOnDelete();
            $table->foreignId('owner_profile_id')->nullable()->constrained('profiles')->nullOnDelete();
            $table->string('title');
            $table->string('slug');
            $table->string('project_type')->default('Standard');
            $table->string('lifecycle_status')->default('Planning');
            $table->string('attention_state')->default('On Track');
            $table->text('objective')->nullable();
            $table->text('scope_summary')->nullable();
            $table->text('audience')->nullable();
            $table->text('desired_action')->nullable();
            $table->date('start_date')->nullable();
            $table->date('stop_date')->nullable();
            $table->json('metadata_json')->nullable();
            $table->timestamp('archived_at')->nullable();
            $table->timestamps();

            $table->unique(['organization_id', 'slug']);
            $table->index(['organization_id', 'lifecycle_status']);
        });

        Schema::create('project_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_id')->constrained()->restrictOnDelete();
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->foreignId('profile_id')->constrained()->restrictOnDelete();
            $table->string('project_role');
            $table->timestamps();

            $table->unique(['project_id', 'profile_id']);
            $table->index(['organization_id', 'profile_id']);
        });

        Schema::create('deliverable_types', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->unsignedInteger('default_tat_days')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->unique(['organization_id', 'slug']);
        });

        Schema::create('deliverables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_id')->constrained()->restrictOnDelete();
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->foreignId('source_request_idea_id')->nullable()->unique()->constrained('request_ideas')->nullOnDelete();
            $table->foreignId('deliverable_type_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('owner_profile_id')->nullable()->constrained('profiles')->nullOnDelete();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('lifecycle_status')->default('Proposed');
            $table->string('attention_state')->default('On Track');
            $table->text('purpose')->nullable();
            $table->text('audience')->nullable();
            $table->text('desired_action')->nullable();
            $table->date('due_date')->nullable();
            $table->json('metadata_json')->nullable();
            $table->timestamp('archived_at')->nullable();
            $table->timestamps();

            $table->index(['organization_id', 'lifecycle_status']);
        });

        Schema::table('requests', function (Blueprint $table) {
            $table->foreignId('converted_project_id')->nullable()->unique()->constrained('projects')->nullOnDelete();
        });

        Schema::table('request_ideas', function (Blueprint $table) {
            $table->foreignId('converted_deliverable_id')->nullable()->unique()->constrained('deliverables')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('request_ideas', fn (Blueprint $table) => $table->dropConstrainedForeignId('converted_deliverable_id'));
        Schema::table('requests', fn (Blueprint $table) => $table->dropConstrainedForeignId('converted_project_id'));
        Schema::dropIfExists('deliverables');
        Schema::dropIfExists('deliverable_types');
        Schema::dropIfExists('project_members');
        Schema::dropIfExists('projects');
    }
};
