@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Početna strana
{{--Z--}}
                    </div>

                    <div class="panel-body">
                        @if(session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">
                        <div class="panel-body">
                            <h3>Vaša organizacija: {{$organization ?? ''}}</h3>
                            <p></p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="panel-body">
                        <div class="{{ $chart1->options['column_class'] }}">
                            <h3>{!! $chart1->options['chart_title'] !!}</h3>
                            {!! $chart1->renderHtml() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

    @parent
    @if($getAndroidToken)
        <script>
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '/admin/token/' + android.getFirebaseToken());
            xhr.send(null);
            xhr.onreadystatechange = function () {
                var DONE = 4; // readyState 4 means the request is done.
                var OK = 200; // status 200 is a successful return.
                if (xhr.readyState === DONE) {
                }
            }
        </script>
    @endif
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
{!! $chart1->renderJs() !!}

@endsection
