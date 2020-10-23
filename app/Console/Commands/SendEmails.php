<?php

namespace App\Console\Commands;

use App\Models\Order;
use App\Notifications\OrderCheck;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send mail after 18 PM if have order';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $now = Carbon::now();
        var_dump($now);
        $orderPending = Order::where('status', '=', config('const.status.unapproved'))->get();
        if (count($orderPending) > config('const.default.zero'))
        {
            $countOrder = count($orderPending);
            $adminNotificationMail = User::where('role_id', '=', config('const.role.admin'))->get();
            \Notification::send($adminNotificationMail, New OrderCheck($countOrder));
        }
    }
}
