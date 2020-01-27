<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SaleUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $providerId;

    public $purchaseAmount;

    /**
     * Create a new event instance.
     *
     * @param $providerId
     * @param $purchaseAmount
     */
    public function __construct($providerId, $purchaseAmount)
    {
        $this->providerId = $providerId;
        $this->purchaseAmount = $purchaseAmount;
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
