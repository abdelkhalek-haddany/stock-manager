<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class StockAlertNotification extends Notification
{
    protected $product;

    public function __construct($product)
    {
        $this->product = $product;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        // Use 'mail' for email, 'database' for storing the notification, and 'broadcast' if you want to send it in real-time
        return ['mail', 'database'];
    }

    /**
     * Get the database representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'product_id' => $this->product->id,
            'product_name' => $this->product->name,
            'quantity_in_stock' => $this->product->quantity_in_stock,
            'minimum_stock' => $this->product->minimum_stock,
            'message' => "The stock for {$this->product->name} is below the minimum threshold.",
        ];
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
            'product_name' => $this->product->name,
            'message' => "The stock for {$this->product->name} is below the minimum threshold.",
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
        return (new MailMessage)
            ->subject('Product Status Update')
            ->view('emails.product-status', [
                'product' => $this->product,
            ]);
    }

    /**
     * Optional: Get the broadcast representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toBroadcast($notifiable)
    {
        return [
            'message' => "The stock for {$this->product->name} is below the minimum threshold.",
        ];
    }
}
