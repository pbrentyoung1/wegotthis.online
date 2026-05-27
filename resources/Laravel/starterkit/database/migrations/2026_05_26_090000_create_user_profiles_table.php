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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained()->cascadeOnDelete();
            $table->string('job_title')->nullable();
            $table->string('department')->nullable()->index();
            $table->string('phone')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('timezone')->nullable();
            $table->string('website')->nullable();
            $table->text('bio')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('instagram_handle')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('x_handle')->nullable();
            $table->string('status')->default('active')->index();
            $table->timestamp('last_seen_at')->nullable()->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};
