@extends('layouts.admin')
@section('content')
    @can('title_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">

            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            Summary Report
        </div>

        <div class="card-body">
        </div>
    </div>



@endsection
@section('scripts')
    @parent
    <script>
        $(function () {

        });
    </script>
@endsection
