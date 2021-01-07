@component('mail::message')
## New ticket: {{ $ticket->title }}

@component( 'mail::button', ['url' => $url . '/ticket/' . $ticket->id ])
View Ticket
@endcomponent

@endcomponent
