@component('mail::message')
    #{{$user['text']}}
    <div>
        <br/>
        Email: {{$user['email']}}
        <br/>
        Lozinka: {{$user['password_real']}}
    </div>

    @component('mail::button', ['url' => url('/login')])
        Login
    @endcomponent


    Hvala,
    {{ config('app.name') }}
@endcomponent
