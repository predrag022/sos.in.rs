@extends('layouts.frontend')
@section('content')
    {{--    <h1 >Servis za organizovanje volontera</h1>--}}
    <div class="row">
        <div class="col-lg-8 mb-4">
            <h3 class="my-4">Registracija</h3>
            <p>Registraciona forma služi za registrovanje organizacija.</p>
            <form name="sentMessage" id="contactForm" novalidate method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <input type="text" name="name" class="form-control" required autofocus
                           placeholder="{{ trans('global.organization_name') }}" value="{{ old('name', null) }}">
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="email" name="email" class="form-control" required
                           placeholder="{{ trans('global.login_email') }}" value="{{ old('email', null) }}">
                    @if($errors->has('email'))
                        <p class="help-block">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input type="password" name="password" class="form-control" required
                           placeholder="{{ trans('global.login_password') }}">
                    @if($errors->has('password'))
                        <p class="help-block">
                            {{ $errors->first('password') }}
                        </p>
                    @endif
                </div>
                <div class="form-group">
                    <input type="password" name="password_confirmation" class="form-control" required
                           placeholder="{{ trans('global.login_password_confirmation') }}">
                </div>
                <div class="row">
                    <div class="col-xs-8">

                    </div>
                    <div class="col-xs-4">

                    </div>
                </div>
                <div id="success"></div>
                <!-- For success/fail messages -->
                {{--                <button type="submit" class="btn btn-primary" id="sendMessageButton">Send Message</button>--}}
                <button type="submit" class="btn btn-primary btn-block btn-flat">
                    {{ trans('global.register') }}
                </button>
            </form>
        </div>

    </div>
@endsection


@section('scripts')
    <!-- Contact form JavaScript -->
    <script src="/js/jqBootstrapValidation.js"></script>
    <script src="/js/contact_me.js"></script>
@endsection
