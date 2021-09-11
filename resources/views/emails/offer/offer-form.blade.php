@component('mail::message')
    # Ponuda nekretnine #

    Poslao:

    Ime: {{$data['name']}}
    Email: {{$data['email']}}
    Tel: {{$data['tel']}}


    Podaci o nekretnini:

    Adresa: {{$data['adress']}}
    Površina: {{$data['area']}}
    Broj spavaćih soba: {{$data['bedrooms']}}
    Sprat: {{$data['floor']}}
    Cena: {{$data['price']}}€

@endcomponent
