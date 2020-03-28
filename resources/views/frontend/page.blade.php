@extends('layouts.frontend')
@section('content')
    <h1 class="my-4">{{$title}}</h1>

    <!-- Features Section -->
    <div class="row">
        <div class="col-lg-12">
            {!! $page->text !!}
        </div>
    </div>
    <!-- /.row -->
@endsection
@section('scripts')
    @parent

@endsection
