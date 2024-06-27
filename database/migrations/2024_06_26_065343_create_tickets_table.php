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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id(); //int big_int
            $table->timestamps();
            $table->string('submitter_name'); // varchar maximum characters
            $table->string('submitter_email', 100); // varchar limit 100 characters
            $table->string('title', 150); // varchar limit 150 characters
            $table->string('category', 100); // varchar limit 100 characters
            $table->text('content')->nullable();
            //$table->bigInteger('user_id')->unsigned();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
