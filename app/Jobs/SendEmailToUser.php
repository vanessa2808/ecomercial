<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use App\Mail\CustomerOrder;
use Mail;
use App\Models\User;

class SendEmailToUser implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $email;
    protected $orderedProducts;
    protected $total;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email, $orderedProducts, $total)
    {
        $this->email = $email;
        $this->orderedProducts = $orderedProducts;
        $this->total = $total;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $content = [
            'products' => $this->orderedProducts,
            'total' => $this->total,
        ];

        Mail::to($this->email)->send(new CustomerOrder($content));
    }
}
