<!-- Modal Create Document Letter-->
<div class="modal fade" id="letter-create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route("admin.document_letters.store") }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input hidden name="document_id" value="{{$document->id}}" >
                    <div class="form-group">
                        <label for="ltitle1">ចំណងជើង</label>
                        <input class="form-control {{ $errors->has('title1') ? 'is-invalid' : '' }}" type="text" name="title1" id="title1" value="{{ old('title1', '') }}">
                        @if($errors->has('title1'))
                            <span class="text-danger">{{ $errors->first('title1') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.document.fields.letter_code_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <label for="reference">យោង</label>
                        <textarea class="form-control ckeditor {{ $errors->has('reference') ? 'is-invalid' : '' }}" name="reference" id="reference">{!! old('reference') !!}</textarea>
                        @if($errors->has('reference'))
                            <span class="text-danger">{{ $errors->first('reference') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.document.fields.description_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <label for="ltitle2">តំណងអង្គភាព</label>
                        <input class="form-control {{ $errors->has('title2') ? 'is-invalid' : '' }}" type="text" name="title2" id="title2" value="{{ old('title2', '') }}">
                        @if($errors->has('title2'))
                            <span class="text-danger">{{ $errors->first('title2') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.document.fields.letter_code_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <label for="ltitle3">អត្ថន័យ</label>
                        <input class="form-control {{ $errors->has('title3') ? 'is-invalid' : '' }}" type="text" name="title3" id="title3" value="{{ old('title3', '') }}">
                        @if($errors->has('title3'))
                            <span class="text-danger">{{ $errors->first('title3') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.document.fields.letter_code_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <label for="description">បរិយាយ</label>
                        <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{!! old('description') !!}</textarea>
                        @if($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.document.fields.description_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <label for="to_place">ចម្លងជូន</label>
                        <textarea class="form-control ckeditor {{ $errors->has('to_place') ? 'is-invalid' : '' }}" name="to_place" id="to_place">{!! old('to_place') !!}</textarea>
                        @if($errors->has('to_place'))
                            <span class="text-danger">{{ $errors->first('to_place') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.document.fields.description_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <label for="text_date">កាលបរិច្ឆេទជាខ្មែរ</label>
                        <input class="form-control {{ $errors->has('text_date') ? 'is-invalid' : '' }}" type="text" name="text_date" id="text_date" value="{{ old('text_date', '') }}">
                        @if($errors->has('text_date'))
                            <span class="text-danger">{{ $errors->first('text_date') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.document.fields.letter_code_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <label for="date">កាលបរិច្ឆេទ</label>
                        <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date') }}">
                        @if($errors->has('date'))
                            <span class="text-danger">{{ $errors->first('date') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.document.fields.dateline_helper') }}</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
