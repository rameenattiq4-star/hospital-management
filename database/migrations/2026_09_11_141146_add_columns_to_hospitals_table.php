<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('hospitals', function (Blueprint $table) {
            $table->integer('age')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->enum('gender', ['m', 'f'])->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('hospitals', function (Blueprint $table) {
            $table->dropColumn(['age', 'date_of_birth', 'gender']);
        });
    }
};