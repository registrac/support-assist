<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ITNotifyNewTicket extends Mailable
{
    use Queueable, SerializesModels;

    public $ticket;
    public $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($ticket, $url)
    {
        $this->ticket = $ticket;
        $this->url = $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.notify_it_about_new_ticket')
            ->subject('Incomming New Ticket');
    }
}
