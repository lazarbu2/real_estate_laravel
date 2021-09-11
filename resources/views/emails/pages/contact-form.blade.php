@component('mail::message')

    # Poruka poslata preko kontakt forme

     Ime: {{$data['name']}}
     Email: {{$data['email']}}

    Predmet: {{$data['subject']}}

     Poruka:

    {{$data['message']}}

    Poslato sa stranice:

    {{$data['url']}}

@endcomponent
