@extends('layouts.master')

@section('pageTitle','详情 - TagMoon')




@section('pageBody')


    <!-- Start your project here-->
<div style="height: 10vh">
    <div class="flex-center flex-column">
        <h1 class="animated fadeIn mb-4">详情</h1>
    </div>
</div>

{{ $item -> id }} <br>
{{ $item -> name }} <br>
{{ $item -> done }} <br>

<a href="/tagMoon/public/item/edit/{{ $item -> id }}" target="_blank">修改<br></a>


@endsection


@section('myJavascript')
    <script type="text/javascript" src="../../public/js/item/detail.js"></script>
@endsection
