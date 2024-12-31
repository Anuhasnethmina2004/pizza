<?php

namespace App\Services\OrderProcessing;

abstract class OrderHandler
{
    protected $nextHandler;

    public function setNext(OrderHandler $handler)
    {
        $this->nextHandler = $handler;
        return $handler;
    }

    public function handle($order)
    {
        if ($this->nextHandler) {
            return $this->nextHandler->handle($order);
        }
        return $order;
    }
}

// Add items to the cart
class AddItemsHandler extends OrderHandler
{
    public function handle($order)
    {
        if (empty($order['items'])) {
            throw new \Exception('No items in the order.');
        }
        $order['cart_items'] = $order['items'];
        return parent::handle($order);
    }
}

// Apply discounts
class ApplyDiscountHandler extends OrderHandler
{
    public function handle($order)
    {
        if (!empty($order['discount_code'])) {
            $order['discount'] = 10; // Example discount logic
        } else {
            $order['discount'] = 0;
        }
        return parent::handle($order);
    }
}

// Calculate total price
class CalculateTotalHandler extends OrderHandler
{
    public function handle($order)
    {
        $subtotal = array_sum(array_column($order['cart_items'], 'price'));
        $order['total_price'] = $subtotal - $order['discount'];
        return parent::handle($order);
    }
}

// Chain initialization
function processOrder($order)
{
    $addItemsHandler = new AddItemsHandler();
    $applyDiscountHandler = new ApplyDiscountHandler();
    $calculateTotalHandler = new CalculateTotalHandler();

    $addItemsHandler->setNext($applyDiscountHandler)->setNext($calculateTotalHandler);

    return $addItemsHandler->handle($order);
}
