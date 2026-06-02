<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('status')->default('Active');
            $table->string('timezone')->default('UTC');
            $table->json('settings_json')->nullable();
            $table->timestamps();

            $table->index('status');
        });

        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_id')->constrained()->restrictOnDelete();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('department_id')->nullable();
            $table->string('display_name');
            $table->string('title')->nullable();
            $table->string('person_type');
            $table->string('phone')->nullable();
            $table->string('avatar_url')->nullable();
            $table->text('bio')->nullable();
            $table->string('status')->default('Active');
            $table->json('metadata_json')->nullable();
            $table->timestamps();

            $table->index('organization_id');
            $table->index('user_id');
            $table->index('department_id');
            $table->index('status');
            $table->unique(['organization_id', 'user_id']);
        });

        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_id')->constrained()->restrictOnDelete();
            $table->string('name');
            $table->string('slug');
            $table->foreignId('parent_department_id')->nullable()->constrained('departments')->nullOnDelete();
            $table->foreignId('lead_profile_id')->nullable();
            $table->string('status')->default('Active');
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->unique(['organization_id', 'slug']);
            $table->index('parent_department_id');
            $table->index('lead_profile_id');
            $table->index('status');
        });

        Schema::table('profiles', function (Blueprint $table) {
            $table->foreign('department_id')->references('id')->on('departments')->nullOnDelete();
        });

        Schema::table('departments', function (Blueprint $table) {
            $table->foreign('lead_profile_id')->references('id')->on('profiles')->nullOnDelete();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_id')->nullable()->constrained()->restrictOnDelete();
            $table->string('name');
            $table->string('slug');
            $table->string('scope_type')->default('Organization');
            $table->text('description')->nullable();
            $table->boolean('is_system')->default(false);
            $table->timestamps();

            $table->index('scope_type');
            $table->index('is_system');
        });

        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('role_permissions', function (Blueprint $table) {
            $table->foreignId('role_id')->constrained()->cascadeOnDelete();
            $table->foreignId('permission_id')->constrained()->restrictOnDelete();

            $table->primary(['role_id', 'permission_id']);
        });

        Schema::create('profile_role_assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_id')->constrained()->restrictOnDelete();
            $table->foreignId('profile_id')->constrained()->restrictOnDelete();
            $table->foreignId('role_id')->constrained()->restrictOnDelete();
            $table->string('scope_type')->default('Organization');
            $table->unsignedBigInteger('scope_id')->nullable();
            $table->foreignId('assigned_by_profile_id')->nullable()->constrained('profiles')->nullOnDelete();
            $table->timestamp('assigned_at');
            $table->timestamp('ended_at')->nullable();
            $table->timestamps();

            $table->index('organization_id');
            $table->index('profile_id');
            $table->index('role_id');
            $table->index(['scope_type', 'scope_id']);
            $table->index('assigned_by_profile_id');
            $table->index('ended_at');
        });

        $this->createPartialIndexes();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $this->dropPartialIndexes();

        Schema::dropIfExists('profile_role_assignments');
        Schema::dropIfExists('role_permissions');
        Schema::dropIfExists('permissions');
        Schema::dropIfExists('roles');

        Schema::table('departments', function (Blueprint $table) {
            $table->dropForeign(['lead_profile_id']);
        });

        Schema::table('profiles', function (Blueprint $table) {
            $table->dropForeign(['department_id']);
        });

        Schema::dropIfExists('departments');
        Schema::dropIfExists('profiles');
        Schema::dropIfExists('organizations');
    }

    private function createPartialIndexes(): void
    {
        DB::statement('CREATE UNIQUE INDEX roles_system_slug_unique ON roles (slug) WHERE organization_id IS NULL');
        DB::statement('CREATE UNIQUE INDEX roles_organization_slug_unique ON roles (organization_id, slug) WHERE organization_id IS NOT NULL');
        DB::statement('CREATE UNIQUE INDEX profile_role_assignments_active_org_scope_unique ON profile_role_assignments (organization_id, profile_id, role_id, scope_type) WHERE scope_id IS NULL AND ended_at IS NULL');
        DB::statement('CREATE UNIQUE INDEX profile_role_assignments_active_object_scope_unique ON profile_role_assignments (organization_id, profile_id, role_id, scope_type, scope_id) WHERE scope_id IS NOT NULL AND ended_at IS NULL');
    }

    private function dropPartialIndexes(): void
    {
        DB::statement('DROP INDEX IF EXISTS profile_role_assignments_active_object_scope_unique');
        DB::statement('DROP INDEX IF EXISTS profile_role_assignments_active_org_scope_unique');
        DB::statement('DROP INDEX IF EXISTS roles_organization_slug_unique');
        DB::statement('DROP INDEX IF EXISTS roles_system_slug_unique');
    }
};
