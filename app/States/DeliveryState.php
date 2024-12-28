<?php
 namespace App\States;

 use App\Models\Cart;

 interface DeliveryState
 {
     public function handle(Cart $cart): void;
     public function next(Cart $cart): ?DeliveryState;
     public function name(): string;
 }
