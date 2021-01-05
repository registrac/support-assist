<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Contract extends Component
{
    public $contract;
    public $confirmingContractDeletion = false;

    public function displayDeleteModal ()
    {
        return $this->confirmingContractDeletion = true;
    }

    public function deleteContract ()
    {
        $this->contract->delete();

        $this->success_message = "Contract successfully deleted!";

        return redirect()->to('/contracts');

    }


    public function render()
    {
        return view('livewire.contract');
    }
}
