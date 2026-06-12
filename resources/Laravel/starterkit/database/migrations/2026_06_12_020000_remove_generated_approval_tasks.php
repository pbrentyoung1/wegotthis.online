<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('tasks')
            ->where('metadata_json->task_type', 'task_review')
            ->delete();
    }

    public function down(): void
    {
        // Generated approval tasks cannot be reconstructed after removal.
    }
};
