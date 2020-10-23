<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Auth;

class OrderCheck extends Notification
{
    use Queueable;
    protected $countOrder;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($countOrder)
    {
        $this->countOrder = $countOrder;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {

        return ['mail'];
    }

    /**
     * Get the database representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toDatabase($notifiable)
    {
        return [
            'user' => auth()->user(),
        ];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = "http://127.0.0.1:8080/admin/orders";

        return (new MailMessage)->bcc($notifiable->email)
            ->subject(trans('messages.order.sub_new'))
            ->greeting(trans('messages.order.hello').$notifiable->user_name)
            ->action(trans('messages.order.check'), $url)
            ->line(trans('messages.order.detail_new'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
