<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_id')->constrained()->restrictOnDelete();
            $table->foreignId('department_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('requester_profile_id')->constrained('profiles')->restrictOnDelete();
            $table->foreignId('assigned_manager_profile_id')->nullable()->constrained('profiles')->nullOnDelete();
            $table->string('title');
            $table->string('status')->default('Draft');
            $table->text('ministry_need')->nullable();
            $table->text('why_it_matters')->nullable();
            $table->text('audience')->nullable();
            $table->text('desired_action')->nullable();
            $table->text('desired_tone')->nullable();
            $table->json('key_dates_json')->nullable();
            $table->text('known_constraints')->nullable();
            $table->json('missing_information_json')->nullable();
            $table->text('triage_summary')->nullable();
            $table->timestamp('submitted_at')->nullable();
            $table->timestamp('decision_at')->nullable();
            $table->foreignId('decision_by_profile_id')->nullable()->constrained('profiles')->nullOnDelete();
            $table->text('decision_notes')->nullable();
            $table->timestamp('archived_at')->nullable();
            $table->timestamps();

            $table->index('organization_id');
            $table->index('department_id');
            $table->index('requester_profile_id');
            $table->index('assigned_manager_profile_id');
            $table->index('status');
            $table->index('submitted_at');
            $table->index('decision_at');
        });

        Schema::create('request_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_id')->constrained()->restrictOnDelete();
            $table->foreignId('request_id')->constrained('requests')->cascadeOnDelete();
            $table->string('question_key');
            $table->string('question_label');
            $table->string('answer_type');
            $table->text('answer_value')->nullable();
            $table->json('answer_json')->nullable();
            $table->unsignedInteger('sort_order')->nullable();
            $table->timestamps();

            $table->unique(['request_id', 'question_key']);
            $table->index('organization_id');
        });

        Schema::create('request_ideas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_id')->constrained()->restrictOnDelete();
            $table->foreignId('request_id')->constrained('requests')->cascadeOnDelete();
            $table->foreignId('suggested_by_profile_id')->nullable()->constrained('profiles')->nullOnDelete();
            $table->string('title');
            $table->string('idea_type');
            $table->string('source');
            $table->string('triage_decision')->default('Suggested');
            $table->text('decision_notes')->nullable();
            $table->timestamps();

            $table->index('organization_id');
            $table->index('request_id');
            $table->index('suggested_by_profile_id');
            $table->index('triage_decision');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_ideas');
        Schema::dropIfExists('request_answers');
        Schema::dropIfExists('requests');
    }
};
