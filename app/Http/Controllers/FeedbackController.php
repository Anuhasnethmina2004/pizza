<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Commands\SubmitFeedbackCommand;
use App\Commands\CommandInvoker;

class FeedbackController extends Controller
{


    public function create(Request $request)
{
    $orderId = $request->get('order_id');
    $pizzas = auth()->user()->orders()->where('status', '!=', 0)->where('cart_id',$orderId)->get(); // Past orders

    return view('feedback.create', compact('orderId','pizzas'));
}


    public function store(Request $request, CommandInvoker $invoker)
    {
        $validated = $request->validate([
            'order_id' => 'required',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        $command = new SubmitFeedbackCommand(
            auth()->id(),
            $validated['order_id'],
            $validated['rating'],
            $validated['comment']
        );

        $invoker->addCommand($command);
        $invoker->executeCommands();

        return redirect()->route('profile')->with('success', 'Feedback submitted successfully!');
    }
}
