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
        Schema::create('home_setting', function (Blueprint $table) {
            $table->id();
            $table->string('section');
            $table->string('title');
            $table->string('info');
            $table->text('content');
            $table->boolean('active');
            
            $table->text('props');
            
            $table->integer('que');
            
            $table->integer('fixed');
            $table->integer('field');
            $table->enum('type', ['PAGE', 'SECTION']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_setting');
    }
};
