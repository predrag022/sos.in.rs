@extends('layouts.admin')
@section('content')
<div class="content">
    @can('operater')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.dostaves.create") }}">
                    Dodavanje dostave
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Lista dostava
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Dostave">
                            <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                        {{ trans('cruds.dostave.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.dostave.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.dostave.fields.address') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.dostave.fields.status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.dostave.fields.spisak') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.dostave.fields.phone_number') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.dostave.fields.organization') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.dostave.fields.operater') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.dostave.fields.dostavljac') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dostaves as $key => $dostave)
                                    <tr data-entry-id="{{ $dostave->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $dostave->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $dostave->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $dostave->address ?? '' }}
                                        </td>
                                        <td>
                                            @if($dostave->status == 'prihvacena')
                                                <span class="badge bg-primary">prihvatio volonter</span>
                                            @elseif($dostave->status == 'dostavljena')
                                                <span class="badge bg-success">dostavljena</span>
                                            @else
                                                <span class="badge bg-danger">nova</span>
                                            @endif
                                            {{--                                            {{ App\Dostave::STATUS_SELECT[$dostave->status] ?? '' }}--}}
                                        </td>
                                        <td>
                                            {{ $dostave->spisak ?? '' }}
                                        </td>
                                        <td>
                                            {{ $dostave->phone_number ?? '' }}
                                        </td>
                                        <td>
                                            {{ $dostave->organization->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $dostave->operater->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $dostave->dostavljac->name ?? '' }}
                                        </td>
                                        <td>
                                            @can('operater')
                                                <a class="btn btn-xs btn-primary"
                                                   href="{{ route('admin.dostaves.show', $dostave->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @elsecan('volonter-update-dostava', $dostave)
                                                <a class="btn btn-xs btn-primary"
                                                   href="{{ route('admin.dostaves.show', $dostave->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('operater')
                                                <a class="btn btn-xs btn-info"
                                                   href="{{ route('admin.dostaves.edit', $dostave->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @elsecan('volonter-update-dostava', $dostave)
                                                <a class="btn btn-xs btn-info"
                                                   href="{{ route('admin.dostaves.edit', $dostave->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('operater')
                                                <form action="{{ route('admin.dostaves.destroy', $dostave->id) }}"
                                                      method="POST"
                                                      onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                                      style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger"
                                                           value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('dostave_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.dostaves.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-Dostave:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
