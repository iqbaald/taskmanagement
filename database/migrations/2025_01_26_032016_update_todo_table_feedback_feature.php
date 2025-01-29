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
        Schema::table('todo', function (Blueprint $table) {
            $table->text('user_comment')->nullable()->after('task');
            $table->string('proof_file_path')->nullable()->after('is_done');
            $table->text('admin_feedback')->nullable()->after('proof_file_path');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('todo', function (Blueprint $table) {
            $table->dropColumn(['user_comment','proof_file_path','admin_feedback']);
        });


    }
};
