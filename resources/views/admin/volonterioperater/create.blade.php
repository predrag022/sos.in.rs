@extends('layouts.admin')
@section('content')
    <div class="content">

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Dodavanje volontera
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="{{ route("admin.volonterioperater.store") }}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                <label class="required" for="name">{{ trans('cruds.user.fields.name') }}</label>
                                <input class="form-control" type="text" name="name" id="name"
                                       value="{{ old('name', '') }}" required>
                                @if($errors->has('name'))
                                    <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
                            </div>
                            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                <label class="required" for="email">{{ trans('cruds.user.fields.email') }}</label>
                                <input class="form-control" type="email" name="email" id="email"
                                       value="{{ old('email') }}" required>
                                @if($errors->has('email'))
                                    <span class="help-block" role="alert">{{ $errors->first('email') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
                            </div>
                            <div class="form-group {{ $errors->has('phone_number') ? 'has-error' : '' }}">
                                <label class="required"
                                       for="phone_number">{{ trans('cruds.user.fields.phone_number') }}</label>
                                <input class="form-control" type="text" name="phone_number" id="phone_number"
                                       value="{{ old('phone_number') }}" required>
                                @if($errors->has('phone_number'))
                                    <span class="help-block" role="alert">{{ $errors->first('phone_number') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
                            </div>
                            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                <label class="required" for="password">{{ trans('cruds.user.fields.password') }}</label>
                                <input class="form-control" type="password" name="password" id="password" required>
                                @if($errors->has('password'))
                                    <span class="help-block" role="alert">{{ $errors->first('password') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-danger" type="submit">
                                    {{ trans('global.save') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
