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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['randevu', 'iletisim']);
            $table->string('name');
            $table->string('mail');
            $table->string('subject');
            $table->text('message');
            $table->string('ip_adress');
            $table->text('ip_info_json');
            $table->string('device_info');
            $table->boolean('is_mail_send');
            $table->string('send_mail_adress');
            $table->date('page_created_at');
            $table->boolean('is_read');
            $table->boolean('is_deleted');
            $table->date('is_read_date');
            $table->date('is_deleted_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
