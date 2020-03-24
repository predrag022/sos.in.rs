<!DOCTYPE html>
<html>
<head>
    <title>Nova dostava...</title>
</head>

<body>
Dodeljena Vam je nova dostava.<br>
Datum i vreme kreiranja: {{$dostava->created_at}}<br>
Ime: {{$dostava->name}}<br>
Adresa: {{$dostava->address}}<br>
Broj telefona: {{$dostava->phone_number}}<br>------------<br>
Spisak:<br>
{!! nl2br($dostava->spisak) !!}
<br>
<br>
<br>------------<br>
Porudžbinu kreirao: {{$dostava->kreirao->name}}, broj telefona: {{$dostava->kreirao->phone_number}}
</body>
</html>
