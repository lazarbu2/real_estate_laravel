@component('mail::message')
# Zakazano gledanje nekretnine

    Korinik:

    Ime: {{$data['name']}}
    Email: {{$data['email']}}
    Tel: {{$data['tel']}}

    Termin gledanja: {{$data['date']}} u {{$data['time']}}h.

    Nekretnina: {{$data['url']}}
@endcomponent
