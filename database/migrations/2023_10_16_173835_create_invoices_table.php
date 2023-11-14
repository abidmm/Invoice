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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->decimal('amount');
            $table->decimal('total_amount');
            $table->enum('tax_percentage',['0','5','12','18','28'])->default('0');
            $table->decimal('tax_amount');
            $table->decimal('net_amount');
            $table->string('name');
            $table->date('date');
            $table->string('file');
            $table->string('email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
