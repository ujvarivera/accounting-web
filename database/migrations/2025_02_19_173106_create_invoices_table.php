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
            $table->string('no'); // számlaszám
            $table->string('from'); // kitől
            $table->string('to'); // kinek
            $table->date('date')->nullable(); // kelt
            $table->date('due_date')->nullable(); // fizetési határidő
            $table->float('total')->nullable(); // fizetendő összeg
            //$table->timestamps();
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
