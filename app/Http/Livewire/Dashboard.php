<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ticket;

class Dashboard extends Component
{
    public $open_tickets;
    public $in_progress_tickets;
    public $closed_tickets;
    public $total_mtd_tickets;

    public function render()
    {
        $this->open_tickets = Ticket::where('status', 'open')->whereMonth('tickets.created_at', '=', date('m'))->count();
        $this->in_progress_tickets = Ticket::where('status', 'in_progress')->whereMonth('tickets.created_at', '=', date('m'))->count();
        $this->closed_tickets = Ticket::where('status', 'completed')->whereMonth('tickets.created_at', '=', date('m'))->count();
        $this->total_mtd_tickets = Ticket::whereMonth('tickets.created_at', '=', date('m'))->count();


        return view('livewire.dashboard');
    }
}
