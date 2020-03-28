@extends('layouts.frontend')
@section('content')
    <h1 class="my-4">Besplatan servis za organizovanje volontera</h1>

    <!-- Features Section -->
    <div class="row">
        <div class="col-lg-6">
            {!! $mainText->text !!}
        </div>
        <div class="col-lg-6">
            <img class="img-fluid rounded" width="400" src="{{url('/logo.png')}}" alt="Volonteri2020">
        </div>
    </div>
    <!-- /.row -->

    <hr>

    <!-- Call to Action Section -->
    <div class="row mb-4">
        <div class="col-md-8">
            {!! $bottomText->text !!}
        </div>
        <div class="col-md-4">
            <a class="btn btn-lg btn-secondary btn-block" href="/register">Registrujte svoju organizaciju</a>
        </div>
    </div>



@endsection
@section('scripts')
    @parent

@endsection
