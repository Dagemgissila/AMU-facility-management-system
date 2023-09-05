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
        Schema::create('workorders', function (Blueprint $table) {
            $table->id();
             $table->unsignedBigInteger("staff_id");
             $table->foreign("staff_id")->references("id")->on('staff')->onDelete("cascade")->onUpdate("cascade");
             $table->string("work_type");
             $table->string("work_required");
             $table->string("status");
             $table->string("workapprove_status");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workorders');
    }
};
