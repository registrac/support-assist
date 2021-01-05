<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EditCustomer extends Component
{
    public $customer;
    public $name;
    public $email;
    public $tel;
    public $postal_address;
    public $stripe_id;
    public $successMessage;

    /**
     * Updating customer
     */
    public function updateCustomer ()
    {
        $this->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'tel'   => ['required', 'integer'],
            'postal_address' => ['required'],
            'stripe_id' => ['required'],
        ]);

        $this->customer->update([
            'name' => $this->name,
            'email' => $this->email,
            'tel' => $this->tel,
            'postal_address' => $this->postal_address,
            'stripe_id' => $this->stripe_id
        ]);

        $this->successMessage = "Company information was successfully updated!";
    }

    public function render()
    {

        $this->name = $this->customer->name;
        $this->email = $this->customer->email;
        $this->tel = $this->customer->tel;
        $this->postal_address = $this->customer->postal_address;
        $this->stripe_id = $this->customer->stripe_id;

        return view('livewire.edit-customer');
    }
}
