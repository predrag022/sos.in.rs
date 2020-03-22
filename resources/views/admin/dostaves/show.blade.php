@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.dostave.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.dostaves.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.dostave.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $dostave->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.dostave.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $dostave->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.dostave.fields.address') }}
                                    </th>
                                    <td>
                                        {{ $dostave->address }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.dostave.fields.status') }}
                                    </th>
                                    <td>
                                        {{ App\Dostave::STATUS_SELECT[$dostave->status] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.dostave.fields.spisak') }}
                                    </th>
                                    <td>
                                        {{ $dostave->spisak }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.dostave.fields.phone_number') }}
                                    </th>
                                    <td>
                                        {{ $dostave->phone_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.dostave.fields.organization') }}
                                    </th>
                                    <td>
                                        {{ $dostave->organization->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.dostave.fields.operater') }}
                                    </th>
                                    <td>
                                        {{ $dostave->operater->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.dostave.fields.dostavljac') }}
                                    </th>
                                    <td>
                                        {{ $dostave->dostavljac->name ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.dostaves.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection