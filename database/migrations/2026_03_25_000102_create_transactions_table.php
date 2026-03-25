<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('statement_id');
            $table->enum('type', ['kharcha', 'amad']);
            $table->string('description', 255);
            $table->decimal('amount', 15, 2);
            $table->integer('sr_no')->default(0);
            $table->string('color_tag', 50)->nullable();
            $table->text('notes')->nullable();
            $table->date('transaction_date')->nullable();
            $table->tinyInteger('is_active')->default(1);
            $table->unsignedInteger('created_by')->nullable();
            $table->timestamps();

            $table->foreign('statement_id')->references('id')->on('statements')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};

