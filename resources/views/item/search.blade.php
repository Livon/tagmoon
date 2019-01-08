@extends('layouts.master')

@section('pageTitle','搜索 - TagMoon')




@section('pageBody')


    <!-- Start your project here-->
<div style="height: 10vh">
    <div class="flex-center flex-column">
        <h1 class="animated fadeIn mb-4">Search</h1>
    </div>
</div>


<div class="md-form">
    <i class="fa fa-tag prefix"></i>
    <input id="input_tag_queryKeyword" type="text" class="form-control">
    <label for="form2">标签关键字</label>
</div>

<h3>1、Tag query result</h3>
<div id="div_tag_queryResult"></div>

<h3>2、Recent tags</h3>
<div id="div_tag_recentlyUsed"></div>

<h3>3、Query Condition Tags</h3>
<div id="div_tag_queryCondition"></div>

{{--<h3>5、内容标签</h3>--}}
{{--<div id="div_tag_itemsTags"></div>--}}

<hr>

<h3>4、Recent keywords</h3>

{{--<h3>1、做为检索条件的关键字</h3>--}}
<div id="div_item_queryKeywords" class="md-form">
    <i class="fa fa-search prefix"
       data-toggle="tooltip" data-placement="right" title="单击执行查询"></i>
    <input type="text" id="input_item_queryKeywords" class="form-control">
    <label for="form2">内容关键字，用空格间隔</label>
</div>

<h3>5、Item query result</h3>
<div id="div_items_pagination_link"></div>
<div id="div_items"></div>

<hr>
<div class="flex-center flex-column">
    {{--<i class="fa fa-android fa-2x" aria-hidden="true"></i><br>--}}
    {{--<i id="i_new_button" class="fa fa-plus-square fa-2x"--}}
       {{--data-toggle="tooltip" data-placement="right" title="单击打开‘新增’页面"></i><br>--}}
    <a href="newBlank" target="_blank" class="fa fa-plus-square fa-2x"></a>

    {{--<i class="fa fa-barcode"></i>--}}
</div>


{{--https://mdbootstrap.com/javascript/modals/--}}
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">确定删除吗？</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" tagId="">确定删除</button>
            </div>
        </div>
    </div>
</div>

@endsection


@section('myJavascript')
    <script type="text/javascript" src="../../public/js/item/main.js"></script>
    <script type="text/javascript" src="../../public/js/item/search.js"></script>
    <script type="text/javascript" src="../../public/js/item/query.js"></script>

    <script type="text/javascript" src="../../public/js/tag/main.js"></script>
    <script type="text/javascript" src="../../public/js/tag/query.js"></script>
    <script type="text/javascript" src="../../public/js/tag/queryCondition.js"></script>
    <script type="text/javascript" src="../../public/js/tag/recentlyUsed.js"></script>
@endsection
