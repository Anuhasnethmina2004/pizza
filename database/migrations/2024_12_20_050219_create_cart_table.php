<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartTable extends Migration
{
    public function up()
    {
        Schema::create('cart', function (Blueprint $table) {
            $table->id(); // Cart ID
            $table->decimal('price', 10, 2)->default(0.00); // Total price
            $table->integer('loyalty')->default(0); // Loyalty points
            $table->decimal('discounts', 10, 2)->default(0.00); // Discounts applied
            $table->string('status', 50)->default('active'); // Cart status
            $table->integer('item_count')->default(0); // Number of items
            $table->timestamp('date')->useCurrent(); // Creation date
            $table->string('delivery_address')->nullable(); // Delivery address
            $table->string('name')->nullable(); // Customer name
            $table->string('phone_number')->nullable(); // Customer phone number
            $table->string('delivery_status', 50)->default('pending'); // Delivery status
            $table->timestamps(); // Timestamps for created_at and updated_at
        });

        Schema::table('pizza_orders', function (Blueprint $table) {
            $table->foreignId('cart_id')->nullable()->constrained('cart')->onDelete('cascade'); // Add cart_id column
        });
    }

    public function down()
    {
        Schema::dropIfExists('cart');
        Schema::table('pizza_orders', function (Blueprint $table) {
            $table->dropForeign(['cart_id']); // Drop foreign key
            $table->dropColumn('cart_id'); // Drop cart_id column
        });
    }
}
