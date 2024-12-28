<?php

namespace App\Strategies;

class CreditCardPayment implements PaymentStrategy
{
    public function pay($amount, $details)
    {
        // Simulate payment processing with card details
        if ($details['card_number'] && $details['cvv'] && $details['expiry_date']) {
            // Simulated payment logic
            return true; // Payment successful
        }

        return false; // Payment failed
    }
}
