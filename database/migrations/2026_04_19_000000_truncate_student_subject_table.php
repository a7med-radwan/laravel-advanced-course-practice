<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('student_subject')->truncate();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // لا نستطيع استعادة البيانات المحذوفة
    }
};