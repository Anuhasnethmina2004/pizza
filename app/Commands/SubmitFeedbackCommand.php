<?php

namespace App\Commands;

use App\Models\Feedback;

class SubmitFeedbackCommand implements Command
{
    protected $userId;
    protected $orderId;
    protected $rating;
    protected $comment;

    public function __construct($userId, $orderId, $rating, $comment)
    {
        $this->userId = $userId;
        $this->orderId = $orderId;
        $this->rating = $rating;
        $this->comment = $comment;
    }

    public function execute()
    {
        Feedback::create([
            'user_id' => $this->userId,
            'order_id' => $this->orderId,
            'rating' => $this->rating,
            'comment' => $this->comment,
        ]);
    }
}
