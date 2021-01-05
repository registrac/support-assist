<?php

namespace App\Http\Livewire;

use App\Mail\NotifyClosedTicket;
use App\Mail\NotifyTicketInProgress;
use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use App\Models\Company;
use Illuminate\Support\Facades\DB;

class ManageTicketClock extends Component
{
    public $ticket;
    public $company;
    public $total_hours;
    public $successMessage;

    public function startClock ()
    {
        $this->ticket->update([
            'start' => Carbon::now(),
            'status' => 'in_progress',
            'end' => null,
        ]);

        /**
         * Send ticket notification to customer
         */
        if ( unserialize( $this->ticket->notify ) > 0 ) {
            Mail::to( unserialize( $this->ticket->notify ) )
            ->send( new NotifyTicketInProgress($this->ticket, config('app.url')) );
        }

        $this->successMessage = "Clock started at " . Carbon::now();
    }

    public function stopClock ()
    {
        $this->ticket->update([
            'end' => Carbon::now(),
            'total_hours' => round( abs( strtotime( Carbon::now() ) - strtotime( $this->ticket->start ) ) / (60*60), 1 ),
            'status' => 'completed'
        ]);

        /**
         * Send ticket notification to customer
         */
        if ( unserialize( $this->ticket->notify ) > 0 ) {
            Mail::to( unserialize( $this->ticket->notify ) )
            ->send( new NotifyClosedTicket($this->ticket, config('app.url')) );
        }

        $this->successMessage = "Clock ended at " . Carbon::now();
    }

    public function render()
    {
        return view('livewire.manage-ticket-clock');
    }
}
