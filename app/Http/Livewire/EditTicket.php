<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Mail\NotifyClosedTicket;
use Illuminate\Support\Facades\Mail;

class EditTicket extends Component
{
    public $ticket;

    public $status;
    public $mode;
    public $priority;
    public $notes;
    public $total_hours;

    public $successMessage;

    public function updateTicket()
    {
        $this->ticket->update([
            'status' => $this->status,
            'mode' => $this->mode,
            'priority' => $this->priority,
            'notes' => $this->notes,
            'total_hours' => $this->total_hours,
        ]);

        if ($this->total_hours > 0) {
            $this->ticket->update(['status' => 'completed']);

            if ( unserialize( $this->ticket->notify ) > 0 ) {
                Mail::to( unserialize( $this->ticket->notify ) )
                ->send( new NotifyClosedTicket($this->ticket, config('app.url')) );
            }
        }

        $this->successMessage = "Ticket successfully updated!";
    }

    public function render()
    {
        $this->status   = $this->ticket->status;
        $this->mode = $this->ticket->mode;
        $this->priority = $this->ticket->priority;
        $this->notes    = $this->ticket->notes;

        return view('livewire.edit-ticket');
    }
}
