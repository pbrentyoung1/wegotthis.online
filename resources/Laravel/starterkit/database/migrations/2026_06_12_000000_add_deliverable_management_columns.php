<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('deliverables', function (Blueprint $table) {
            $table->foreignId('internal_reviewer_profile_id')
                ->nullable()
                ->after('owner_profile_id')
                ->constrained('profiles')
                ->nullOnDelete();
            $table->foreignId('stakeholder_reviewer_profile_id')
                ->nullable()
                ->after('internal_reviewer_profile_id')
                ->constrained('profiles')
                ->nullOnDelete();
            $table->date('publish_date')->nullable()->after('due_date');
        });

        Schema::create('project_activity_events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_id')->constrained()->restrictOnDelete();
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->foreignId('deliverable_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('actor_profile_id')->nullable()->constrained('profiles')->nullOnDelete();
            $table->string('event_type');
            $table->text('description')->nullable();
            $table->json('metadata_json')->nullable();
            $table->timestamp('occurred_at')->useCurrent();
            $table->timestamps();

            $table->index(['organization_id', 'project_id']);
            $table->index(['project_id', 'deliverable_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('project_activity_events');

        Schema::table('deliverables', function (Blueprint $table) {
            $table->dropConstrainedForeignId('stakeholder_reviewer_profile_id');
            $table->dropConstrainedForeignId('internal_reviewer_profile_id');
            $table->dropColumn('publish_date');
        });
    }
};
