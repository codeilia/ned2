<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SaleRegistered
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $providerId;

    public $purchaseAmount;

    public $sale;

    /**
     * Create a new event instance.
     *
     * @param $providerId
     * @param $purchaseAmount
     * @param $sale
     */
    public function __construct($providerId, $purchaseAmount, $sale)
    {
        $this->providerId = $providerId;
        $this->purchaseAmount = $purchaseAmount;
        $this->sale = $sale;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
