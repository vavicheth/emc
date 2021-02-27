<div class="box">
    <div class="box-header">
        <h3 class="box-title">លិខិត</h3>
        <button class="btn btn-success" data-toggle="modal" data-target="#letter-create" data-backdrop="static" data-keyboard="false">Add New</button>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ចំណងជើង</th>
                <th>យោង</th>
                <th>តំណងអង្គភាព</th>
                <th>អត្ថន័យ</th>
                <th>បរិយាយ</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                @foreach($document->documentLetters as $letter)
                    <tr>
                        <td>{{$letter->title1}}</td>
                        <td>{!! Str::limit($letter->reference,25)!!}</td>
                        <td>{!! $letter->title2 !!}</td>
                        <td> {!! $letter->title3 !!}</td>
                        <td>{!! Str::limit($letter->description,25)!!}</td>
                        <td>
                            @can('document_letter_show')
                                <a class="btn btn-xs btn-primary" href="{{route('admin.documents.print_letter',$letter->id)}}"  target="_blank">
                                   <i class="fa fa-print"></i> Print
                                </a>
                            @endcan

                            @can('document_letter_edit')
                                <button class="btn btn-xs btn-info" data-toggle="modal" data-target="#letter{{$letter->id}}" data-backdrop="static" data-keyboard="false">Edit</button>
                            @endcan

                            @can('document_letter_delete')
                                <form action="{{ route('admin.document_letters.destroy', $letter->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                </form>
                            @endcan

                        </td>
                    </tr>

                    @include('admin.documents.includes.modal_letter_edit')

                @endforeach

            </tbody>
        </table>



    </div>
    <!-- /.box-body -->
    @include('admin.documents.includes.modal_letter_create')
</div>
<!-- /.box -->
