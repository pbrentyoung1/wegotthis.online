<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('deliverable_links', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_id')->constrained()->restrictOnDelete();
            $table->foreignId('deliverable_id')->constrained()->cascadeOnDelete();
            $table->string('label')->nullable();
            $table->string('url');
            $table->foreignId('added_by_profile_id')->nullable()->constrained('profiles')->nullOnDelete();
            $table->timestamps();

            $table->index(['deliverable_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('deliverable_links');
    }
};
