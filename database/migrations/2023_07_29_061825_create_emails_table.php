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
        Schema::create('emails', function (Blueprint $table) {
            $table->id();
            $table->enum('type', \App\Enum\EmailEnum::values())->nullable();
            $table->string('host')->nullable();
            $table->integer('port')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('secure')->nullable();
            $table->string('reply_mail')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emails');
    }
};
