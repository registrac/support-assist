<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;

class ContractController extends Controller
{

    public function index ()
    {
        return view('admin.contracts.index', [
            'contracts' => Contract::all(),
        ]);
    }

    public function create ()
    {
        return view('admin.contracts.create');
    }

    /**
     * Show contract
     *
     * @return view
     */
    public function show(Contract $contract)
    {
        if ( empty( $contract->companies->toArray() ) ) {
            // Return to contracts page with error.
            return redirect()->route('contracts')
                ->with('error_message', 'We could not open this contract. Please delete it and create it again.');
        }

        return view('admin.contracts.show', [
            'contract' => $contract
        ]);
    }

}
