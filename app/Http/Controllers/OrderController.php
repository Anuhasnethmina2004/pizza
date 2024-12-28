<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
// use App\Http\Models\PizzaOrder;
use App\Models\PizzaOrder;
use App\Models\PizzaCrust;
use App\Models\PizzaSauce;
use App\Models\PizzaTopping;
use App\Builders\PizzaOrderBuilder;
use App\Builders\CartBuilder;
use App\Strategies\CreditCardPayment;
use App\Models\Discount;
use App\Models\Promotion;
use Carbon\Carbon;

class OrderController extends Controller
{


    public function home(Request $request)
    {

        return view('home');
    }





    public function showPizzaBuilder()
    {
        $crusts = PizzaCrust::all();
        $sauces = PizzaSauce::all();
        $toppings = PizzaTopping::all();
        return view('pizza.builder', compact('crusts', 'sauces', 'toppings'));
    }

    public function addToCart(Request $request)
    {

        if(empty(auth()->id())){
            return redirect()->route('login')->with('success', 'Please Login Before place order');
        }

        $validated = $request->validate([
            'crust_id' => 'required|exists:pizza_crusts,id',
            'sauce_id' => 'required|exists:pizza_sauces,id',
            'topping_ids' => 'nullable|array',
            'topping_ids.*' => 'exists:pizza_toppings,id',
        ]);

        $price = PizzaCrust::find($validated['crust_id'])->price +
        PizzaSauce::find($validated['sauce_id'])->price +
        PizzaTopping::whereIn('id', $validated['topping_ids'] ?? [])->sum('price');


        $builder = new PizzaOrderBuilder();
        $builder->setCrust($validated['crust_id'])
            ->setSauce($validated['sauce_id'])
            ->setToppings($validated['topping_ids'] ?? [])
            ->setCheeseLevel($request->cheese_level)
            ->setName($request->name)
            ->setFavorite($request->favorite)
            ->build(auth()->id());

        return redirect()->route('cart.view')->with('success', 'Pizza added to cart!');
    }

    public function viewCart()
    {
        // Fetch user's pizzas
        $pizzas = PizzaOrder::where('user_id', auth()->id())
            ->where('status', '0')
            ->get();

        // Calculate total price
        $totalPrice = $pizzas->sum('price');

        // Fetch active promotions based on the current date
        $currentDate = Carbon::now();
        $promotion = Promotion::where('start_date', '<=', $currentDate)
            ->where('end_date', '>=', $currentDate)
            ->first();

        return view('cart.index', compact('pizzas', 'totalPrice', 'promotion'));
    }

    public function removeFromCart($id)
    {
        $pizza = PizzaOrder::findOrFail($id);
        if ($pizza->user_id === auth()->id() && $pizza->status == '0') {
            $pizza->delete();
        }
        return redirect()->route('cart.view')->with('success', 'Pizza removed from cart.');
    }

    public function showCheckoutForm()
    {
        $totalPrice = PizzaOrder::where('user_id', auth()->id())->where('status', '0')->sum('price');
        return view('checkout.index', compact('totalPrice'));
    }



//     public function checkout(Request $request)
//     {


//         $pizzas = PizzaOrder::where('user_id', auth()->id())->where('status', '0')->get();
//         $totalPrice = $pizzas->sum('price');
//         $itemCount = $pizzas->count();

//         $paymentStrategy = new CreditCardPayment();
//         $paymentDetails = [
//             'card_number' => $request->card_number,
//             'cvv' => $request->cvv,
//             'expiry_date' => $request->expiry_date,
//         ];


//         $paymentSuccessful = $paymentStrategy->pay($totalPrice, $paymentDetails);

//         if (!$paymentSuccessful) {
//             return redirect()->back()->with('error', 'Payment failed. Please try again.');
//         }


//             // Build the cart
//     $cartBuilder = new CartBuilder();
//    $id= $cartBuilder->setUser(auth()->id())
//         ->setName($request->name)
//         ->setPhoneNumber($request->phone)
//         ->setDeliveryAddress($request->address)
//         ->setDiscounts(0)
//         ->setLoyaltyPoints(0)
//         ->setPrice($totalPrice)
//         ->setStatus(1)
//         ->setDeliveryStatus(0)
//         ->setItemCount($itemCount)
//         ->build();




//         foreach ($pizzas as $pizza) {
//             $pizza->update(['paid' => true, 'status' => '1','cart_id' => $id]);
//         }

//         return redirect()->route('pizza.builder')->with('success', 'Payment successful and checkout completed!');
//     }


public function applyDiscount(Request $request)
{
    $discountCode = $request->input('discount_code');
    $discount = Discount::where('code', $discountCode)
                        ->where('start_date', '<=', now())
                        ->where('end_date', '>=', now())
                        ->first();

    if ($discount) {
        // Check if the discount is still valid
        if ($discount->uses < $discount->max_uses) {
            session([
                'discount' => [
                    'code' => $discount->code,
                    'value' => $discount->value,
                ],
            ]);
            return redirect()->back()->with('success', 'Discount applied successfully!');
        } else {
            return redirect()->back()->with('error', 'This discount code has reached its usage limit.');
        }
    }

    return redirect()->back()->with('error', 'Invalid or expired discount code.');
}

public function checkout(Request $request)
{
    $pizzas = PizzaOrder::where('user_id', auth()->id())->where('status', '0')->get();
    $totalPrice = $pizzas->sum('price');
    $itemCount = $pizzas->count();

    // Apply discount if available
    $discount = session('discount');
    if ($discount) {
        $totalPrice -= $discount['value'];
    }

    $paymentStrategy = new CreditCardPayment();
    $paymentDetails = [
        'card_number' => $request->card_number,
        'cvv' => $request->cvv,
        'expiry_date' => $request->expiry_date,
    ];

    $paymentSuccessful = $paymentStrategy->pay($totalPrice, $paymentDetails);
if($request->delivery_method=='pickup'){
    $delstatus=3;
}else{
    $delstatus=0;
}



    if (!$paymentSuccessful) {
        return redirect()->back()->with('error', 'Payment failed. Please try again.');
    }

    // Build the cart
    $cartBuilder = new CartBuilder();
    $cart = $cartBuilder->setUser(auth()->id())
        ->setName($request->name)
        ->setPhoneNumber($request->phone)
        ->setDeliveryAddress($request->address)
        ->setDiscounts($discount['value'] ?? 0)
        ->setLoyaltyPoints(0)
        ->setPrice($totalPrice)
        ->setStatus(1)
        ->setDeliveryStatus($delstatus)
        ->setItemCount($itemCount)
        ->build();

    foreach ($pizzas as $pizza) {
        $pizza->update(['paid' => true, 'status' => '1', 'cart_id' => $cart->id]);
    }

    // Clear the discount session after checkout
    session()->forget('discount');

    return redirect()->route('profile')->with('success', 'Payment successful and checkout completed!');
}







    // public function saveFeedback(Request $request, $orderId)
    // {
    //     $request->validate([
    //         'rating' => 'required|integer|min:1|max:5',
    //         'comment' => 'nullable|string|max:500',
    //     ]);

    //     Feedback::create([
    //         'user_id' => auth()->id(),
    //         'order_id' => $orderId,
    //         'rating' => $request->input('rating'),
    //         'comment' => $request->input('comment'),
    //     ]);

    //     return back()->with('success', 'Thank you for your feedback!');
    // }








}

