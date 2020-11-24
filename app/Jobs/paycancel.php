<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Order;

class paycancel implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $status;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Order $status)
    {
        $this->status = $status;
        
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $status = $this->status;
        $order = Order::find($status->id);
        // print_r($order->status);die;
        if($order->status == 0){
            $order->status = 3;
            $order->save();
        }
        
    }
}
