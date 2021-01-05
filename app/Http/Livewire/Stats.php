<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Stats extends Component
{
    public $closed_tickets;
    public $open_tickets;
    public $mtd;

    public function render()
    {

        $this->closed_tickets = auth()->user()->companies[0]->tickets()->where('status', 'completed')->whereMonth('tickets.created_at', '=', date('m'))->count();

        $this->open_tickets = auth()->user()->companies[0]->tickets()->where('status', 'open')->whereMonth('tickets.created_at', '=', date('m'))->count();

        $this->open_tickets += auth()->user()->companies[0]->tickets()->where('status', 'in_progress')->whereMonth('tickets.created_at', '=', date('m'))->count();

        $this->mtd = auth()->user()->companies[0]->tickets()->whereMonth('tickets.created_at', '=', date('m'))->count();

        return view('livewire.stats');
    }
}
