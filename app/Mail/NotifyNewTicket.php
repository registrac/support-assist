<?php

namespace App\Mail;

use App\Models\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyNewTicket extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The ticket instance
     *
     * @var \App\Models\Ticket
     */
    public $ticket;
    public $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Ticket $ticket, string $url)
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
        return $this->markdown('emails.notify_new_ticket')
            ->subject('New issue reported - Registrac Support Team');
    }
}
