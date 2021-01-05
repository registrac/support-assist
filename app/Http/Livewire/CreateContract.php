<?php

namespace App\Http\Livewire;

use App\Models\Company;
use App\Models\Contract;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateContract extends Component
{
    use WithFileUploads;

    public $queryCustomerName = [];
    public $customer;
    public $desc;
    public $attachment;
    public $start;
    public $end;
    public $remote_hours;
    public $onsite_hours;
    public $successMessage;

    public function createContract ()
    {
        $this->validate([
            'customer' => ['required', 'exists:companies,name'],
            'attachment' => ['required', 'file', 'max:10240', 'mimes:pdf,doc,docx,odg']
        ]);


        $contractName = 'contract-' . $this->customer . ' ' . Carbon::now() . '.' . $this->attachment->extension();

        $this->attachment->storeAs('contracts', $contractName);

        $contract = new Contract([
            'start' => $this->start,
            'end'   => $this->end,
            'desc'  => $this->desc,
            'attachment' => $contractName,
            'remote_hours' => $this->remote_hours,
            'onsite_hours' => $this->onsite_hours,
        ]);

        $contract->save();

        $contract->companies()->attach(Company::where('name', $this->customer)->get());

        $this->reset();

        $this->successMessage = "Contract successfully created!";
    }

    public function render()
    {
        if ( strlen( $this->customer ) > 2 ) {
            $this->queryCustomerName = Company::where('name', 'LIKE', '%'.$this->customer.'%')->get();
        }
        return view('livewire.create-contract');
    }
}
