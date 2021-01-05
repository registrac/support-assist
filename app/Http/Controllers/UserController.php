<?php

namespace App\Http\Controllers;

use App\Mail\InviteUser;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public $temporary_password;

    /**
     * Show Company Users
     */
    public function show_company_users (Company $company)
    {
        return view('admin.customers.users.index',[
            'company' => $company->id,
            'users' => $company->users
        ]);
    }

    /**
     * Activate User
     */
    public function activate (Request $request)
    {
        $request->validate([
            'token' => ['min:32', 'max:32', 'exists:users,invitation_token']
        ]);

        $user = User::find(auth()->user()->id);

        $user->invitation_token = null;
        $user->status = '1';

        $user->save();

        return redirect()->route('dashboard');
    }

    /**
     * Resend Invitation
     */
    public function resend_invitation (User $user)
    {
        $this->temporary_password = Str::random(8);

        $user->password = Hash::make($this->temporary_password);
        $user->save();

        Mail::to($user->email)->send( new InviteUser( $user->name, $user->email, $this->temporary_password, $user->invitation_token, config('app.url') . '/login' ) );

        session()->flash('success_message', 'Invitation successfully sent!');

        return redirect('/customer/'.$user->companies[0]['id'].'/users');
    }

    /**
     * Delete User
     */
    public function delete_user (User $user)
    {

    }
}
