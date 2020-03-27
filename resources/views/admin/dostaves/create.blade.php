@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Dodavanje dostave
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.dostaves.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="required" for="name">{{ trans('cruds.dostave.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.dostave.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                            <label class="required" for="address">{{ trans('cruds.dostave.fields.address') }}</label>
                            <input class="form-control" type="text" name="address" id="address" value="{{ old('address', '') }}" required>
                            @if($errors->has('address'))
                                <span class="help-block" role="alert">{{ $errors->first('address') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.dostave.fields.address_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('spisak') ? 'has-error' : '' }}">
                            <label for="spisak">{{ trans('cruds.dostave.fields.spisak') }}</label>
                            <textarea class="form-control" name="spisak" id="spisak">{{ old('spisak') }}</textarea>
                            @if($errors->has('spisak'))
                                <span class="help-block" role="alert">{{ $errors->first('spisak') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.dostave.fields.spisak_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('phone_number') ? 'has-error' : '' }}">
                            <label for="phone_number">{{ trans('cruds.dostave.fields.phone_number') }}</label>
                            <input class="form-control" type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', '') }}">
                            @if($errors->has('phone_number'))
                                <span class="help-block" role="alert">{{ $errors->first('phone_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.dostave.fields.phone_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('dostavljac') ? 'has-error' : '' }}">
                            <label class="required" for="dostavljac_id">{{ trans('cruds.dostave.fields.dostavljac') }}</label>
                            <select class="form-control select2" name="dostavljac_id" id="dostavljac_id" required>
                                @foreach($dostavljacs as $id => $dostavljac)
                                    <option value="{{ $id }}" {{ old('dostavljac_id') == $id ? 'selected' : '' }}>{{ $dostavljac }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('dostavljac'))
                                <span class="help-block" role="alert">{{ $errors->first('dostavljac') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.dostave.fields.dostavljac_helper') }}</span>
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
