<?php
// app/Events/StockUpdated.php
namespace App\Events;

use App\Models\Product;
use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class StockUpdated implements ShouldBroadcast
{
    public $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function broadcastOn(): Channel
    {
        return new Channel('stock-updates');
    }

    public function broadcastAs(): string
    {
        return 'StockUpdated';
    }
}
