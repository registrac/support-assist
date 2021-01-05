<?php

namespace App\Http\Livewire;

use App\Mail\InviteUser;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AddCustomerUsers extends Component
{
    public $company;
    public $addUser;
    public $name;
    public $email;
    private $token;
    private $temporary_password;

    /**
     * Invite User from Company
     */
    public function inviteUser ()
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        $this->token = Str::random(32);
        $this->temporary_password = Str::random(8);

        $new_user = User::create([
                        'name' => $this->name,
                        'email' => $this->email,
                        'password' => Hash::make($this->temporary_password),
                        'invitation_token' => $this->token,
                    ]);

        $new_user->companies()->attach($this->company);

        // Send Notification
        Mail::to( $this->email )->send( new InviteUser( $this->name, $this->email, $this->temporary_password, $this->token, config('app.url') . '/login' ));

        session()->flash('success_message', 'Invitation successfully sent!');

        return redirect('/customer/'.$this->company.'/users');
    }

    public function render()
    {
        return view('livewire.customer.add-customer-users');
    }
}
