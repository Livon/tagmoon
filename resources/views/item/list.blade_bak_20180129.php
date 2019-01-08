@extends('layouts.master')

@section('pageTitle','列表 - TagMoon')




@section('pageBody')


    <!-- Start your project here-->
<div style="height: 10vh">
    <div class="flex-center flex-column">
        <h1 class="animated fadeIn mb-4">列表</h1>
    </div>
</div>

<h3>1、做为检索条件的关键字</h3>
<div class="md-form">
    <i class="fa fa-search prefix"></i>
    <input type="text" id="input_search" class="form-control">
    <label for="form2">请输入检索内容或者标签，用空格间隔</label>
</div>

<h3>2、做为检索条件的标签</h3>
<div id="div_searchCondition_tags"></div>
<h3>3、标签搜索结果</h3>
<div id="div_tags"></div>
<h3>4、最近使用标签</h3>
<div id="div_recently_used_tags"></div>
<h3>5、内容标签</h3>
<div id="div_itemsTags"></div>
<h3>6、内容搜索结果</h3>
<div id="div_items"></div>

{{ $items->links() }}

@foreach($items as $item )

    <pre>

        {{ $item->id }} - {{ $item->name }}

    </pre>

@endforeach

{{-- http://www.cnblogs.com/timeismoney/p/7082444.html --}}
{{ $items->links() }}

<pre>
/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/
</pre>
<p>Livon 2018.01</p>


@endsection


@section('myJavascript')
    <script type="text/javascript" src="../../public/js/item/list.js"></script>
@endsection
