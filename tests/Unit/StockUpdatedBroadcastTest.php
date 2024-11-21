<?php

namespace Tests\Unit;

use App\Events\StockUpdated;
use App\Models\Product;
use Illuminate\Broadcasting\Channel;
use Tests\TestCase;

class StockUpdatedBroadcastTest extends TestCase
{
    /** @test */
    public function it_broadcasts_on_the_correct_channel()
    {
        $product = Product::get()->first();
        $event = new StockUpdated($product);

        // Assert the event implements ShouldBroadcast
        $this->assertInstanceOf(\Illuminate\Contracts\Broadcasting\ShouldBroadcast::class, $event);

        // Assert it broadcasts on the correct channel
        $this->assertEquals(new Channel('stock-updates'), $event->broadcastOn());
    }
}
