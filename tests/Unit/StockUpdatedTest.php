<?php

namespace Tests\Unit;

use App\Events\StockUpdated;
use App\Models\Product;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class StockUpdatedTest extends TestCase
{
    /** @test */
    public function it_dispatches_stock_updated_event()
    {
        Event::fake(); // Fake event dispatching

        // Simulate an action that triggers the event
        $product = Product::get()->first();
        event(new StockUpdated($product));

        // Assert that the event was dispatched
        Event::assertDispatched(StockUpdated::class, function ($event) use ($product) {
            return $event->product === $product;
        });
    }
}
