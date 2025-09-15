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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');

            // ENUM untuk kelas (string, bukan integer)
            $table->enum('class_level', ['10', '11', '12'])->default('10');
            $table->enum('class_group', ['A', 'B', 'C', 'D'])->default('A');

            // ENUM untuk jurusan
            $table->enum('major', ['ATPH', 'APHP', 'TKRO', 'RPL', 'TBSM', 'TAB', 'TL'])->default('RPL');

            $table->integer('points')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
