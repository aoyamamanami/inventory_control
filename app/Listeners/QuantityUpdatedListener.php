<?php

namespace App\Listeners;

use App\Events\QuantityUpdated;
use App\Models\Chart;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class QuantityUpdatedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(QuantityUpdated $event)
    {
        $product = $event->product;
        
        $chartData = [
            'product_id' => $product->id,
            'quantity' => $product->quantity,
            ];
            
        Chart::create($chartData);
        
    }
}
