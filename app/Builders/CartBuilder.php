<?php
namespace App\Builders;

use App\Models\Cart;

class CartBuilder
{
    protected $data = [];

    public function setUser($userId)
    {
        $this->data['user_id'] = $userId;
        return $this;
    }

    public function setName($name)
    {
        $this->data['name'] = $name;
        return $this;
    }

    public function setPhoneNumber($phoneNumber)
    {
        $this->data['phone_number'] = $phoneNumber;
        return $this;
    }

    public function setDeliveryAddress($address)
    {
        $this->data['delivery_address'] = $address;
        return $this;
    }

    public function setDiscounts($discounts)
    {
        $this->data['discounts'] = $discounts;
        return $this;
    }

    public function setLoyaltyPoints($loyalty)
    {
        $this->data['loyalty'] = $loyalty;
        return $this;
    }

    public function setPrice($price)
    {
        $this->data['price'] = $price;
        return $this;
    }

    public function setStatus($status)
    {
        $this->data['status'] = $status;
        return $this;
    }

    public function setDeliveryStatus($deliveryStatus)
    {
        $this->data['delivery_status'] = $deliveryStatus;
        return $this;
    }

    public function setItemCount($count)
    {
        $this->data['item_count'] = $count;
        return $this;
    }

    public function build()
    {
        return Cart::create($this->data);
    }
}
