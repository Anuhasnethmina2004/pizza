<?php

namespace App\Constants;

class DeliveryStatus
{
    const PENDING = 0;
    const IN_PROGRESS = 1;
    const OUT_FOR_DELIVERY = 2;
    const DELIVERED = 3;
    const CANCELLED = 4;

    public static function getStatuses()
    {
        return [
            self::PENDING => 'Pending',
            self::IN_PROGRESS => 'In Progress',
            self::OUT_FOR_DELIVERY => 'Out for Delivery',
            self::DELIVERED => 'Delivered',
            self::CANCELLED => 'Cancelled',
        ];
    }
}
