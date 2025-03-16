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
        Schema::create('card_histories', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount',10,2)->default(0);
            $table->string('transaction_type');
            $table->timestamp('time');
            $table->foreignId('card_id')->constrained('cards')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('card_histories');
    }
};
