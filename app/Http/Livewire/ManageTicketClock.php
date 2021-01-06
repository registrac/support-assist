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

    public function stopClock ()
    {
        $this->ticket->update([
            'end' => Carbon::now(),
            'status' => 'completed'
        ]);

        /**
         * Send ticket notification to customer
         */
        if ( unserialize( $this->ticket->notify ) > 0 ) {
            Mail::to( unserialize( $this->ticket->notify ) )
            ->send( new NotifyClosedTicket($this->ticket, config('app.url')) );
        }

        $this->successMessage = "Ticket successfully closed at " . Carbon::now();
    }

    public function reopen ()
    {

        $this->ticket->update([
            'status' => 'open',
        ]);

        $this->successMessage = "Ticket has been reopened at " . Carbon::now();

    }

    public function render()
    {
        return view('livewire.manage-ticket-clock');
    }
}
