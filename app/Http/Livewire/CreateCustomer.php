<?php

namespace App\Http\Livewire;

use App\Models\Company;
use Livewire\Component;

class CreateCustomer extends Component
{
    public $name;
    public $email;
    public $tel;
    public $postal_address;
    public $stripe_id;
    public $successMessage;

    public function createCustomer ()
    {

        $customer = $this->validate([
            'name' => ['required', 'unique:companies,name'],
            'email' => ['required', 'email','unique:companies,email'],
            'tel'   => ['required', 'integer'],
            'postal_address' => ['required'],
            'stripe_id' => ['required']
        ]);


        $customer = new Company([
            'name' => $this->name,
            'email' => $this->email,
            'tel' => $this->tel,
            'postal_address' => $this->postal_address,
            'stripe_id' => $this->stripe_id
        ]);

        $customer->save();

        $this->successMessage = "Company successfully created!";
    }

    public function render()
    {
        return view('livewire.create-customer');
    }
}
