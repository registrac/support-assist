<?php

namespace App\Http\Livewire;

use App\Mail\ITNotifyNewTicket;
use App\Mail\NotifyNewTicket;
use App\Models\Company;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Mail;

class CreateTicket extends Component
{
    use WithFileUploads;

    public $name;
    public $queryCustomerName = [];

    public $title;
    public $desc;
    public $attachment;
    public $mode;
    public $priority;
    public $selected_customer;
    public $notify = array();
    public $emails;
    private $file;
    private $url;

    public $successMessage;

    public function createTicket ()
    {

        if ( ! auth()->user()->isAdmin() ) {
            $this->name = auth()->user()->companies[0]['name'];
            $this->notify[] = auth()->user()->email;
        }

        $ticket = $this->validate([
            'name' => ['required'],
            'title' => ['required','min:3'],
            'desc'  => ['required', 'min:5'],
            'mode'  => ['required'],
            'priority' => ['required'],
        ]);

        if ( $this->attachment ) {
            $ticket = $this->validate([
                'attachment' => ['mimes:png,jpg,jpeg,pdf']
            ]);

            $this->file = $this->title.'-'.Carbon::now().'.'.$this->attachment->extension();
            $this->attachment->storeAs('tickets', $this->file);
        }

        $ticket = new Ticket([
            'title' => $this->title,
            'desc'  => $this->desc,
            'mode'  => $this->mode,
            'priority' => $this->priority,
            'status'=> 'open',
            'attachment' => $this->file,
            'notify' => serialize($this->notify),
        ]);

        $ticket->save();

        $ticket->company()->attach(Company::where('name', $this->name)->get());

        /**
         * Send ticket notification to owner
         */
        if ( $this->notify > 0 ) {
            # code...
            Mail::to( $this->notify )->send(new NotifyNewTicket($ticket, config('app.url')));
        }

        /**
         * Send notification to IT
         */
        Mail::to( User::where('role', 'admin')->pluck('email')->toArray() )
            ->send( new ITNotifyNewTicket( $ticket, config('app.url') ) );

        session()->flash('success_message', 'Ticket successfully created!');
        return redirect()->to('/tickets');
    }

    public function render()
    {
        if ( strlen( $this->name ) > 2 ) {
            $this->queryCustomerName = Company::where('name', 'LIKE', '%'.$this->name.'%')->get();
        }

        if ( Company::where('name', '=', $this->name)->count() > 0 ) {
            $this->emails = Company::where('name', '=', $this->name)->get()[0]->users;
        }

        return view('livewire.create-ticket');
    }
}
