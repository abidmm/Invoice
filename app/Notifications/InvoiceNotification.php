<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InvoiceNotification extends Notification
{
    use Queueable;

    public $info;

    /**
     * Create a new notification instance.
     */
    public function __construct($details)
    {
        //
        $this->info = $details;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $attachment = storage_path('app/public/'.$this->info['file']);
        return (new MailMessage)
        ->from('abidmeethal@gmail.com','mailer')
        ->replyTo('ana@gmail.com','anagha')
        ->subject('invoice created')
        ->line('amount :'.$this->info['amount'])
        ->line('quantity :'.$this->info['quantity'])
        ->line('tax :'.$this->info['tax_percentage'])
        ->line('total amount :'.$this->info['total_amount'])
        ->line('tax amount :'.$this->info['tax_amount'])
        ->line('net amount ;'.$this->info['net_amount'])
        ->attach($attachment);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
