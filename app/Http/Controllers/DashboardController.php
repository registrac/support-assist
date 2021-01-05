<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index ()
    {
        $tickets = null;

        // For Non Admin Users
        if ( count(auth()->user()->companies) == 1 ) {
            $tickets = auth()->user()->companies[0]->tickets()->orderBy('created_at', 'desc')->paginate(5);
        }

        return view('dashboard', [
            'tickets' => $tickets,
        ]);
    }
}
