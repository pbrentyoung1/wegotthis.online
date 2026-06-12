<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('deliverable_reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_id')->constrained()->restrictOnDelete();
            $table->foreignId('deliverable_id')->constrained()->cascadeOnDelete();
            $table->foreignId('reviewer_profile_id')->constrained('profiles')->restrictOnDelete();
            $table->unsignedInteger('round_number');
            $table->string('reviewer_role');
            $table->string('decision')->default('Pending');
            $table->text('notes')->nullable();
            $table->timestamp('decided_at')->nullable();
            $table->timestamps();

            $table->unique(['deliverable_id', 'round_number', 'reviewer_profile_id']);
            $table->index(['reviewer_profile_id', 'decision']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('deliverable_reviews');
    }
};
