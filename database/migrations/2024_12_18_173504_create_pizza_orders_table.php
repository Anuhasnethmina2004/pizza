<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePizzaOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('pizza_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->json('toppings'); // JSON array for storing toppings
            $table->string('crust'); // Crust type
            $table->string('sauce'); // Sauce type
            $table->decimal('price', 8, 2); // Price
            $table->boolean('favorite')->default(false); // Favorite flag
            $table->boolean('paid')->default(false); // Paid status
            // $table->decimal('total_price', 8, 2);
            $table->string('status'); // e.g., "pending", "in preparation", "delivered"
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pizza_orders');
    }
}
