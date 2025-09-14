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

            // ENUM untuk kelas
            $table->enum('class_level', ['10', '11', '12']);
            $table->enum('class_group', ['A', 'B', 'C', 'D']);

            // ENUM untuk jurusan
            $table->enum('major', ['RPL', 'TBSM', 'TKJ', 'AKL'])->default('RPL');

            // Akumulasi poin pelanggaran
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
