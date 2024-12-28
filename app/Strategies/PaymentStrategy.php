<?php
namespace App\Strategies;

interface PaymentStrategy
{
    public function pay($amount, $details);
}
