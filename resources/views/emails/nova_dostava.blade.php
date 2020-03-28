@component('mail::message')
    <div>
        Dodeljena Vam je nova dostava.<br>
        Datum i vreme kreiranja dostave: {{$dostava->created_at}}<br>
        Ime: {{$dostava->name}}<br>
        Adresa: {{$dostava->address}}<br>
        Broj telefona: {{$dostava->phone_number}}
        <br>------------<br>
        Spisak:<br>
        {!! nl2br($dostava->spisak) !!}
        <br>------------<br>
        Porudžbinu kreirao operater: {{$dostava->kreirao->name}}<br>
        broj telefona: {{$dostava->kreirao->phone_number}}
    </div>
    <br><br><br>
    Potvrdite klikom na ovo dugme da ste prihvatili ovu dostavu:
    @component('mail::button', ['url' => url('/admin/dostaves/accept/'.$dostava->id), 'color' =>'green'])
        Prihvatam dostavu
    @endcomponent
    Potvrdite klikom na ovo dugme da ste obavili ovu dostavu:
    @component('mail::button', ['url' => url('/admin/dostaves/delivered/'.$dostava->id), 'color' =>'red'])
        Dostavljeno
    @endcomponent

    Hvala,
    {{ config('app.name') }}
@endcomponent
