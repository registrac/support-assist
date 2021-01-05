<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Ticket;

class NotifyTicketInProgress extends Mailable
{
    use Queueable, SerializesModels;

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
        return $this->markdown('emails.notify_ticket_in_progress')
            ->subject('Issue update - Registrac Support Team');
    }
}
