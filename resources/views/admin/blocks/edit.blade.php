@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.block.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.blocks.update", [$block->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
                            <label class="required" for="code">{{ trans('cruds.block.fields.code') }}</label>
                            <input class="form-control" type="text" name="code" id="code" value="{{ old('code', $block->code) }}" required>
                            @if($errors->has('code'))
                                <span class="help-block" role="alert">{{ $errors->first('code') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.block.fields.code_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('text') ? 'has-error' : '' }}">
                            <label for="text">{{ trans('cruds.block.fields.text') }}</label>
                            <textarea class="form-control ckeditor" name="text" id="text">{!! old('text', $block->text) !!}</textarea>
                            @if($errors->has('text'))
                                <span class="help-block" role="alert">{{ $errors->first('text') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.block.fields.text_helper') }}</span>
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

@section('scripts')
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/admin/blocks/ckmedia', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', {{ $block->id ?? 0 }});
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection