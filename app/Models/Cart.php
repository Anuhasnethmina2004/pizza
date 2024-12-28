<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    // Table associated with the model
    protected $table = 'cart';

    // Mass assignable attributes
    protected $fillable = [
        'price',
        'loyalty',
        'discounts',
        'status',
        'item_count',
        'user_id',
        'date',
        'delivery_address',
        'name',
        'phone_number',
        'delivery_status',
    ];

    // Define relationship with PizzaOrder
    public function pizzaOrders()
    {
        return $this->hasMany(PizzaOrder::class, 'cart_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function feedback()
    {
        return $this->hasMany(Feedback::class, 'order_id', 'id');
    }
}
