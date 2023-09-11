<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Enum\EmailContactEnum;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->enum('type', \App\Enum\EmailContactEnum::values())->nullable()->change();
            $table->string('name')->nullable()->change();
            $table->string('mail')->nullable()->change();
            $table->string('subject')->nullable()->change();
            $table->text('message')->nullable()->change();
            $table->string('ip_adress')->nullable()->change();
            $table->text('ip_info_json')->nullable()->change();
            $table->string('device_info')->nullable()->change();
            $table->boolean('is_mail_send')->nullable()->change();
            $table->string('send_mail_adress')->nullable()->change();
            $table->date('page_created_at')->nullable()->change();
            $table->boolean('is_read')->default(false)->change();
            $table->boolean('is_deleted')->default(false)->change();
            $table->date('is_read_date')->nullable()->change();
            $table->date('is_deleted_date')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->enum('type', \App\Enum\EmailContactEnum::values())->nullable(false)->change();
            $table->string('name')->nullable(false)->change();
            $table->string('mail')->nullable(false)->change();
            $table->string('subject')->nullable(false)->change();
            $table->text('message')->nullable(false)->change();
            $table->string('ip_adress')->nullable(false)->change();
            $table->text('ip_info_json')->nullable(false)->change();
            $table->string('device_info')->nullable(false)->change();
            $table->boolean('is_mail_send')->nullable(false)->change();
            $table->string('send_mail_adress')->nullable(false)->change();
            $table->date('page_created_at')->nullable(false)->change();
            $table->date('is_read_date')->nullable(false)->change();
            $table->date('is_deleted_date')->nullable(false)->change();
        });
    }
};
