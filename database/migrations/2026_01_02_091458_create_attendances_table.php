<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('users')->cascadeOnDelete();
            $table->date('date'); // attendance date
            $table->boolean('present')->default(false); // present or absent
            $table->timestamps();
            $table->unique(['student_id', 'date']); // same student per date ek hi record
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
