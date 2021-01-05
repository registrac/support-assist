<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
class TicketController extends Controller
{
    //

    public function index ()
    {
        return view('admin.tickets.index', [
            'tickets' => Ticket::orderBy('created_at', 'desc')->paginate(10)
        ]);
    }

    public function show (Ticket $ticket)
    {
        if ( ! auth()->user()->isAdmin() ) {
            return view('user.tickets.show', [
                'ticket' => $ticket,
                'company' => $ticket->company,
            ]);
        }

        return view('admin.tickets.show', [
            'ticket' => $ticket,
            'company' => $ticket->company,
        ]);
    }

    /**
     * Display ticket editing screen
     */
    public function edit (Ticket $ticket)
    {
        return view('admin.tickets.edit', [
            'ticket' => $ticket,
        ]);
    }
}
