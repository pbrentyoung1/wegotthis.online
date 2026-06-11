<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('conversations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_id')->constrained()->restrictOnDelete();
            $table->string('conversation_type');
            $table->nullableMorphs('subject');
            $table->string('title')->nullable();
            $table->string('visibility')->default('Requester Visible');
            $table->string('status')->default('Open');
            $table->foreignId('created_by_profile_id')->constrained('profiles')->restrictOnDelete();
            $table->timestamps();

            $table->index(['organization_id', 'status']);
        });

        Schema::create('conversation_participants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_id')->constrained()->restrictOnDelete();
            $table->foreignId('conversation_id')->constrained()->cascadeOnDelete();
            $table->foreignId('profile_id')->constrained()->restrictOnDelete();
            $table->string('participant_role')->default('participant');
            $table->timestamp('last_read_at')->nullable();
            $table->timestamps();

            $table->unique(['conversation_id', 'profile_id']);
            $table->index(['organization_id', 'profile_id']);
        });

        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_id')->constrained()->restrictOnDelete();
            $table->foreignId('conversation_id')->constrained()->cascadeOnDelete();
            $table->foreignId('author_profile_id')->nullable()->constrained('profiles')->nullOnDelete();
            $table->text('body');
            $table->string('message_type')->default('Comment');
            $table->string('visibility')->default('Requester Visible');
            $table->foreignId('parent_message_id')->nullable()->constrained('messages')->nullOnDelete();
            $table->json('metadata_json')->nullable();
            $table->timestamps();

            $table->index(['organization_id', 'created_at']);
            $table->index(['conversation_id', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('messages');
        Schema::dropIfExists('conversation_participants');
        Schema::dropIfExists('conversations');
    }
};
