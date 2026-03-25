<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('tbl_admin')) {
            return;
        }

        Schema::create('tbl_admin', function (Blueprint $table) {
            $table->increments('id');
            $table->string('employee_ad_id', 100)->unique();
            $table->string('name', 150)->nullable();
            $table->string('email', 150)->nullable();
            $table->tinyInteger('is_active')->default(1);
            $table->rememberToken();
            $table->string('password');
            $table->string('theme_color', 50)->nullable();
            $table->enum('user_type', ['super_admin', 'admin', 'viewer'])->default('viewer');
            $table->tinyInteger('is_deleted')->default(0);
            $table->dateTime('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_admin');
    }
};

