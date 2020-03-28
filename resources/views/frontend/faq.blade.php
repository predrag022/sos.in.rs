@extends('layouts.frontend')
@section('content')
    <h1 class="mt-4 mb-3">{{$title}}
        <small>(FAQ)</small>
    </h1>

    <div class="mb-4" id="accordion" role="tablist" aria-multiselectable="true">

        @foreach($faqs as $faq)
            <div class="card">
                <div class="card-header" role="tab" id="heading{{$faq->id}}">
                    <h5 class="mb-0">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$faq->id}}"
                           aria-expanded="true" aria-controls="collapse{{$faq->id}}">{{$faq->question}}</a>
                    </h5>
                </div>

                <div id="collapse{{$faq->id}}" class="collapse show" role="tabpanel"
                     aria-labelledby="heading{{$faq->id}}">
                    <div class="card-body">
                        {!! $faq->answer !!}
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection
@section('scripts')
    @parent

@endsection
