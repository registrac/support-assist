<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Symfony\Component\HttpFoundation\Request;

class DeleteCustomerUsers extends Component
{
    public $confirmUserDeletion;
    public $deleteUser;
    public $user;
    public $company;

    public function delete()
    {
        $this->user->tokens->each->delete();
        $this->user->delete();

        session()->flash('success_message', $this->user->name . ' was successfully deleted from the system.');
        return redirect('/customer/'.$this->company.'/users');
    }

    public function render()
    {
        return view('livewire.customer.delete-customer-users');
    }
}
