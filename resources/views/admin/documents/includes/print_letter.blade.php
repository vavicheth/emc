<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Letter Print</title>
    {{--    <link rel="stylesheet" href="{{ltrim(public_path('css/app.css')}}" type="text/css">--}}
    {{--    <link rel="stylesheet" href="{{asset('js/plugins/print/style_print.css')}}">--}}

    <style>
        .title1 {font-family: Khmerosmoullight; font-size: 16px; }
        .title2 {font-family: Khmerosmoullight; font-size: 14px;}
        .title3 {font-family: Khmerosmoul; font-size:13px; font-style: normal}
        .content {font-family: khmerosbattambang; font-size: 13px;}
        .content_table {font-family: khmerosbattambang; font-size: 13px;}
        .content-small {font-family: khmerosbattambang; font-size: 12px;}
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
    <div id="logo" style="width: 70%;" >
        {{--        <span class='content ml-3'>ក្រសួងសុខាភិបាល</span>--}}
        <div class="ml-3">
            {{--            <img class="ml-2" src="{{asset('photos/Logo_Calmette_BW.jpg')}}" height="120px" width="auto" /><br>--}}
            <img class="ml-2" src="{{base_path('public/photos/emc_logo.png')}}" height="80px" width="auto" /><br>
            <span>លេខៈ {{$document->code_out}}</span>
        </div>
    </div>
</div>

<div class="pull-right">
    <div align="center">
        <span class='title1' style="align-self: center"><u>{{$letter->title1}}</u></span><br>
    </div>
</div>

<div class="ml-5 mr-5 mt-2 content" id="docinfo">
    <span>{!! $letter->reference !!}</span><br>
</div>

<div align="center">
    <span class='title1' style="align-self: center"><u>{{$letter->title2}}</u></span><br>
    <span class='title2' style="align-self: center">{{$letter->title3}}</span><br>
</div>

<div class="ml-5 mr-5 mt-2" id="docinfo">
    <span class='content'>{!! $letter->description !!}</span><br>
</div>
<div style="width: 100%">
    <div id="logo" style="width: 50%; float: right;position: absolute; text-align: center" >
        <span class='content'>{!! $letter->text_date !!}</span><br>
{{--        <span class='content'> រាជធានីភ្នំពេញ, ថ្ងៃ {{\Carbon\Carbon::parse($letter->date)->day}} ខែ {{\Carbon\Carbon::parse($letter->date)->month}} ឆ្នាំ{{\Carbon\Carbon::parse($letter->date)->year}}</span><br>--}}
        <span class='content'> រាជធានីភ្នំពេញ, ថ្ងៃទី {{\KhmerDateTime\KhmerDateTime::parse($letter->date)->day()}} ខែ{{\KhmerDateTime\KhmerDateTime::parse($letter->date) ->fullMonth()}} ឆ្នាំ{{\KhmerDateTime\KhmerDateTime::parse($letter->date)->year()}}</span><br>
{{--        <span class='content'> រាជធានីភ្នំពេញ, {{\KhmerDateTime\KhmerDateTime::parse($letter->date)->format("LLLL")}}</span><br>--}}
        <img class="ml-2" src="{{base_path('public/photos/sign.png')}}" height="80px" width="auto" /><br>
    </div>
    <div id="logo" style="width: 50%;" >
    </div>
</div>

<div style="width: 50%;" class="content-small">
    @if ($letter->to_place)
        <span><u>ចម្លងជូនៈ</u></span><br>
        <span>{!! $letter->to_place !!}</span><br>
    @endif
</div>


{{--@foreach($users as $user)--}}
{{--    @foreach($user->comments as $comment)--}}
{{--    <!-- Comment user in document -->--}}
{{--        <div class="ml-5 mr-5 mb-3 mt-2">--}}
{{--            <div style="float: right; width: 30%">--}}
{{--                <span  class='content right' style="float: right; width: 70%">{{$comment->updated_at->format('d-M-Y   H:i:s')}}</span><br>--}}
{{--            </div>--}}
{{--            <div style="width: 70%">--}}
{{--                <span class='title2 float-left'>{{$user->staff ? ($user->staff->department ? ($user->staff->department->name_kh) : '') : ''}}: &nbsp; </span>--}}
{{--                <span class='content float-left'><b>{{$user->staff ? (($user->staff->title ? $user->staff->title->name_kh : '') . ' ' . $user->staff->name_kh) : ''}}៖ </b></span>--}}
{{--            </div>--}}

{{--            <span style="margin-top: -2px; font-family: khmerosbattambang">{!! $comment->comment !!}</span>--}}
{{--        </div>--}}
{{--    @endforeach--}}

{{--@endforeach--}}


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
