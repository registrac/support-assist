<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Ticket;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified']);
    }

    /**
     * Return contract file requested
     */
    public function grab_contract (Contract $contract)
    {
        $file = $contract->attachment;

        if ($file) {

            return response()->download(storage_path('app/contracts/'.$file), null, [
                'Cache-Control' => 'no-cache, no-store, must-revalidate',
                'Pragma' => 'no-cache',
                'Expires' => '0',
            ], null);

        } else {
            return abort(404);
        }
    }

    /**
     * Return attachments from tickets
     */
    public function grab_attachment (Ticket $ticket)
    {
        $file = $ticket->attachment;

        if ($file) {

            return response()->download(storage_path('app/tickets/'.$file), null, [
                'Cache-Control' => 'no-cache, no-store, must-revalidate',
                'Pragma' => 'no-cache',
                'Expires' => '0',
            ], null);

        } else {
            return abort(404);
        }
    }
}
