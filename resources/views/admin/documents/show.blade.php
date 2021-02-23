@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.document.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
{{--            <div class="form-group">--}}
{{--                <a class="btn btn-default" href="{{ route('admin.documents.index') }}">--}}
{{--                    {{ trans('global.back_to_list') }}--}}
{{--                </a>--}}
{{--            </div>--}}
            <table class="table table-bordered table-striped table-sm">
                <tbody>
{{--                    <tr>--}}
{{--                        <th>--}}
{{--                            {{ trans('cruds.document.fields.id') }}--}}
{{--                        </th>--}}
{{--                        <td>--}}
{{--                            {{ $document->id }}--}}
{{--                        </td>--}}
{{--                    </tr>--}}
                    <tr>
                        <th>
                            {{ trans('cruds.document.fields.letter_code') }}
                        </th>
                        <td>
                            {{ $document->letter_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.document.fields.code_in') }}
                        </th>
                        <td>
                            {{ $document->code_in }}
                        </td>
                    </tr>
{{--                    <tr>--}}
{{--                        <th>--}}
{{--                            {{ trans('cruds.document.fields.code_out') }}--}}
{{--                        </th>--}}
{{--                        <td>--}}
{{--                            {{ $document->code_out }}--}}
{{--                        </td>--}}
{{--                    </tr>--}}
                    <tr>
                        <th>
                            {{ trans('cruds.document.fields.document_code') }}
                        </th>
                        <td>
                            {{ $document->document_code }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.document.fields.from_organisation') }}
                        </th>
                        <td>
                            {{ $document->organisation->name }}
                        </td>
                    </tr>

{{--                    <tr>--}}
{{--                        <th>--}}
{{--                            {{ trans('cruds.document.fields.category') }}--}}
{{--                        </th>--}}
{{--                        <td>--}}
{{--                            {{ $document->category->name ?? '' }}--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <th>--}}
{{--                            {{ trans('cruds.document.fields.organisation') }}--}}
{{--                        </th>--}}
{{--                        <td>--}}
{{--                            {{ $document->organisation->name ?? '' }}--}}
{{--                        </td>--}}
{{--                    </tr>--}}

                    <tr>
                        <th>
                            {{ trans('cruds.document.fields.description') }}
                        </th>
                        <td>
                            {!! $document->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.document.fields.user') }}
                        </th>
                        <td>
                            @foreach($document->users as $key => $user)
                                <span class="badge badge-info">{{ $user->name }}</span><br>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.document.fields.document_file') }}
                        </th>
                        <td>
                            @foreach($document->document_file as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ $media->name }} ({{ $media->size }} KB)<br>
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.document.fields.document_type') }}
                        </th>
                        <td>
                            {{ $document->document_type->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.document.fields.dateline') }}
                        </th>
                        <td>
                            {{ $document->dateline }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.document.fields.date_complete') }}
                        </th>
                        <td>
                            {{ $document->date_complete }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.document.fields.complete') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $document->complete ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.document.fields.submit') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $document->submit ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>


@if (auth()->user()->can('comment_access'))
    <div>
        <div class="nav-tabs-custom card card-primary card-outline card-tabs">
            <ul class="nav nav-tabs" id="document-tab" >
                <li class="nav-item"><a class="nav-link show active" href="#tab-comments" data-toggle="tab">Comments</a></li>
                <li class="nav-item"><a class="nav-link" href="#tab-letter" data-toggle="tab">Letter</a></li>
            </ul>
            <div class="tab-content" id="document-tab">
                <div class="tab-pane fade show active" id="tab-comments" role="tabpanel" aria-labelledby="tab-comments">
                    <div class="card-body">

                    @if ($users->whereIn('id',auth()->id())->count() > 0 || auth()->user()->can('comment_status_view') || auth()->user()->can('comment_grand_access'))
                        @if ($document->getType() == 'normal_view')
                            @include('admin.documents.includes.comment_normal_view')
                        @elseif ($document->getType() == 'status_view')
                            @include('admin.documents.includes.comment_status_view')
                        @elseif ($document->getType() == 'inheritance_view')
                            @include('admin.documents.includes.comment_inheritance_view')
                        @endif
                    @endif

                    </div>
                </div>

                <div class="tab-pane fade show" id="tab-letter" role="tabpanel" aria-labelledby="tab-comments">
                    <div class="card-body">
                        @include('admin.documents.includes.document_letter')
                    </div>
                </div>
            </div>
        </div>
    </div>

@endif

<div class="box-footer">
    <div class="form-group">
        <a class="btn btn-secondary" href="{{route('admin.documents.index')}}">
            {{ trans('global.back_to_list') }}
        </a>

        @can('document_print_access')
            <a class="btn btn-info float-right" href="{{route('admin.documents.print',$document->id)}}" target="_blank">
                <i class="fa fa-hand-point-right"></i> Print
            </a>
        @endcan
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
                                        xhr.open('POST', '/admin/comments/ckmedia', true);
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
                                        data.append('crud_id', '{{ $comment->id ?? 0 }}');
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
