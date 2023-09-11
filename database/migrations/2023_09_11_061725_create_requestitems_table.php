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
        Schema::create('requestitems', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id'); // foreign key column
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('technician_id'); // foreign key column
            $table->foreign('technician_id')->references('id')->on('technicians')->onDelete('cascade')->onUpdate('cascade');
            $table->string("quantity");
            $table->boolean("status")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requestitems');
    }
};
