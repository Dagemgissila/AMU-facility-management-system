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
        Schema::create('work_technicians', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('technician_id'); // foreign key column
            $table->foreign('technician_id')->references('id')->on('technicians')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('work_id'); // foreign key column
            $table->foreign('work_id')->references('id')->on('workorders')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean("status")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_technicians');
    }
};
