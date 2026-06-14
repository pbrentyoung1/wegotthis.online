<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('deliverables', function (Blueprint $table) {
            $table->string('upload_slug', 100)->nullable()->unique()->after('archived_at');
            $table->boolean('upload_open')->default(true)->after('upload_slug');
            $table->timestamp('upload_closes_at')->nullable()->after('upload_open');
        });

        Schema::create('media_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_id')->constrained()->restrictOnDelete();
            $table->foreignId('deliverable_id')->constrained()->cascadeOnDelete();

            // Upload provenance
            $table->string('uploader_name', 100)->nullable();
            $table->string('uploader_ip', 45)->nullable();

            // File storage
            $table->string('file_path', 500);
            $table->string('file_name', 255);
            $table->unsignedInteger('file_size')->nullable();
            $table->string('mime_type', 100)->nullable();

            // EXIF — camera metadata extracted on upload
            $table->timestamp('exif_taken_at')->nullable();
            $table->decimal('exif_gps_lat', 10, 7)->nullable();
            $table->decimal('exif_gps_lng', 10, 7)->nullable();
            $table->string('exif_device_make', 100)->nullable();
            $table->string('exif_device_model', 100)->nullable();
            $table->unsignedInteger('exif_width')->nullable();
            $table->unsignedInteger('exif_height')->nullable();
            $table->smallInteger('exif_orientation')->nullable();
            $table->string('exif_aperture', 20)->nullable();
            $table->string('exif_shutter_speed', 20)->nullable();
            $table->unsignedInteger('exif_iso')->nullable();

            // Custom metadata — added by staff during curation
            $table->boolean('is_favorite')->default(false);
            $table->boolean('approved_for_use')->default(false);
            $table->text('caption')->nullable();
            $table->text('notes')->nullable();
            $table->jsonb('tags')->default('[]');

            $table->timestamps();

            $table->index(['deliverable_id', 'exif_taken_at']);
            $table->index(['deliverable_id', 'is_favorite']);
            $table->index(['deliverable_id', 'approved_for_use']);
        });

        Schema::create('media_file_crops', function (Blueprint $table) {
            $table->id();
            $table->foreignId('media_file_id')->constrained()->cascadeOnDelete();
            $table->foreignId('organization_id')->constrained()->restrictOnDelete();
            $table->string('platform', 50);
            $table->string('label', 100);
            $table->string('file_path', 500);
            $table->unsignedInteger('width');
            $table->unsignedInteger('height');
            $table->integer('crop_x');
            $table->integer('crop_y');
            $table->integer('crop_w');
            $table->integer('crop_h');
            $table->timestamps();

            $table->unique(['media_file_id', 'platform']);
            $table->index(['media_file_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('media_file_crops');
        Schema::dropIfExists('media_files');
        Schema::table('deliverables', function (Blueprint $table) {
            $table->dropColumn(['upload_slug', 'upload_open', 'upload_closes_at']);
        });
    }
};
