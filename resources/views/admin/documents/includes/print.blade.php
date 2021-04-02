<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Document Print</title>
{{--    <link rel="stylesheet" href="{{ltrim(public_path('css/app.css')}}" type="text/css">--}}
{{--    <link rel="stylesheet" href="{{asset('js/plugins/print/style_print.css')}}">--}}

    <style>
        .title1 {font-family: Khmerosmoullight; font-size: 16px; }
        .title2 {font-family: Khmerosmoullight; font-size: 14px;}
        .title3 {font-family: Khmerosmoul; font-size:13px; font-style: normal}
        .content {font-family: khmerosbattambang; font-size: 13px;}
        .content_table {font-family: khmerosbattambang; font-size: 13px;}
        p{
            font-family: khmerosbattambang; font-size: 13px;
        }
        .right {
            float: right;
        }
        body{
            font-family: khmerosbattambang; font-size: 13px;
        }
    </style>
</head>

<body>

{{--<page size='A4' layout='landscape'>--}}
    <div align="center" >
        <span class='title1'>ព្រះរាជាណាចក្រកម្ពុជា</span><br>
        <span class='title2'>ជាតិ សាសនា ព្រះមហាក្សត្រ</span><br>
{{--        <div style="width: 120px; align-self: center">--}}
            <hr style="border: double; width: 120px">
{{--        </div>--}}
    </div>

<div style="width: 100%">
    <div style="float: right;width: 30%">
        <span class='content'><b>លិខិតលេខៈ </b> {{$document->letter_code}}</span><br>
        <span class='content'><b>លេខលិខិតចូលៈ </b> {{$document->code_in}}</span><br>
{{--        <span class='content'><b>លេខសំគាល់ឯកសារៈ </b> {{$document->document_code}}</span><br>--}}
        <span class='content'><b>ចុះថ្ងៃទីៈ </b> {{$document->created_at->format('d-M-Y H:i:s')}}</span><br>
        <span class='content'><b>អ្នកបញ្ចូលលិខិតៈ </b>{{$document->creator->staff ? (($document->creator->staff->title ? $document->creator->staff->title->name_kh : '') . ' ' . $document->creator->staff->name_kh) : $document->creator->name}}</span><br>
    </div>

    <div id="logo" style="width: 70%;" >
{{--        <span class='content ml-3'>ក្រសួងសុខាភិបាល</span>--}}
        <div class="ml-3">
                        <img class="ml-2" src="{{base_path('public/photos/emc_logo.png')}}" height="80px" width="auto" /><br>
{{--            <img class="ml-2" src="{{\App\Models\AppSeeting::where('name','logo')->first()->photo != null ? \App\Models\AppSeeting::where('name','logo')->first()->photo->getUrl() : asset('photos/logo.png')}}" height="80px" width="auto" /><br>--}}
        </div>
    </div>
</div>


<br>

    <div class="pull-right">
        <div align="center">
            <span class='title1' style="align-self: center"><u>កំណត់បង្ហាញ</u></span><br>
        </div>
    </div>

    <div class="ml-5 mr-5 mt-2" id="docinfo">
        <span class='content float-leftt'><b>មកពីៈ </b> {{$document->organisation->name}}</span><br>
        <span class='content float-leftt' style="line-height: 80%;"><b>កម្មវត្ថុៈ </b> {!! $document->description !!}</span>
        <hr>
    </div>

@foreach($users as $user)
    @if (!$loop->last)
        @foreach($user->comments as $comment)

            <!-- Comment user in document -->
            <div class="ml-5 mr-5 mb-3 mt-2">
                <div style="float: right; width: 30%">
                    <span  class='content right' style="float: right; width: 70%">{{$comment->updated_at->format('d-M-Y   H:i:s')}}</span><br>
                </div>
                <div style="width: 70%; ">
                    <span class='title2 float-left'>{{$user->staff ? ($user->staff->department ? ($user->staff->department->name_kh) : '') : ''}}: &nbsp; </span>
                    <span class='content float-left'><b>{{$user->staff ? (($user->staff->title ? $user->staff->title->name_kh : '') . ' ' . $user->staff->name_kh) : ''}}៖ </b></span>
                </div>

                <span style="font-family: khmerosbattambang">{!! $comment->comment !!}</span>
            </div>

        @endforeach
    @else

        @foreach($user->comments as $comment)
            <div class="ml-5 mr-5 mb-3 mt-2" style="text-align: center">
                <span class='title2'>{{$user->staff ? ($user->staff->department ? ($user->staff->department->name_kh) : '') : ''}}</span><br>
                    <span style="font-family: khmerosbattambang; text-align: center">{!! $comment->comment !!}</span>

                    @if ($comment->is_esign == '1')
                        @if ($user->staff)
                            @if ($user->staff->sigature)
                                <img class="ml-2" src="{{$user->staff->sigature->getUrl()}}" height="80px" width="auto" /><br>
                            @endif
                        @endif
                    @endif
                    <span  class='title2'>{{$user->staff ? (($user->staff->title ? $user->staff->title->name_kh : '') . ' ' . $user->staff->name_kh) : ''}}</span>
            </div>
        @endforeach

    @endif

@endforeach




{{--</page>--}}

</body>

<script  type="text/javascript">
    // window.onload = function() { window.print(); }
    // window.print();
</script>
<script type="text/javascript">
    try {
        this.print();
    }
    catch(e) {
        window.onload = window.print;
    }
</script>
</html>
