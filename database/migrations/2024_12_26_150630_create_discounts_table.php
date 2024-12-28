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

            Schema::create('discounts', function (Blueprint $table) {
                $table->id();
                $table->string('code')->unique();
                $table->text('description')->nullable();
                $table->enum('type', ['fixed', 'percentage']);
                $table->decimal('value', 10, 2);
                $table->date('start_date');
                $table->date('end_date');
                $table->integer('max_uses')->default(0);
                $table->integer('uses')->default(0);
                $table->timestamps();
            });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discounts');
    }
};
