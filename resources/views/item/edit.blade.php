@extends('layouts.master')

@section('pageTitle','修改 - TagMoon')


@section('myCss')

<link rel="stylesheet" href="../../../../markdown\sparksuite-simplemde-markdown-editor-1.11.2-0-g6abda7a\demo\font-awesome.min.css">
<link rel="stylesheet" href="../../../../markdown\sparksuite-simplemde-markdown-editor-1.11.2-0-g6abda7a\dist\simplemde.min.css">

@endsection


@section('pageBody')


    <script type="text/javascript">
        var itemId = '{{ $item -> id }}';
        var itemName = '{{ $item -> name }}';
    </script>


    <!-- Start your project here-->
<div style="height: 10vh">
    <div class="flex-center flex-column">
        <h1 class="animated fadeIn mb-4">Edit</h1>
    </div>
</div>
<!-- /Start your project here-->

<section class="section">

    <button class="btn peach-gradient btn-rounded waves-effect waves-light" id="btnItemUpdate">Save</button>
    <span class="autosave" id="span_autoUpdate">Auto update editor :</span>

    <div class="form-group basic-textarea rounded-corners shadow-textarea">
        <!--<label for="textarea_itemContent" class="active">Shadow and placeholder</label>-->
        <textarea id="textarea_itemContent" class="form-control z-depth-1" rows="7"
                  placeholder="Write something here..."></textarea>
    </div>

    <h3>Item tags</h3>
    <div style="display: none;" id="docTagContainer"></div>


    {{-- 添加 Tag --}}
    <button class="btn aqua-gradient btn-rounded waves-effect waves-light" id="button_add_tag">Add tag</button>

    {{--<div class="md-form" style="margin-top: 15px;">--}}
        {{--<i class="fa fa-tag prefix"></i>--}}
        {{--<input type="text" id="input_new_tag" class="form-control validate">--}}
        {{--<label for="form9" data-error="wrong" data-success="right">add a new tag</label>--}}
    {{--</div>--}}

    <div class="md-form">
        <i class="fa fa-tag prefix"></i>
        <input id="input_tag_queryKeyword" type="text" class="form-control">
        <label for="form2">标签关键字</label>
    </div>

    <h3>1、Tag query result</h3>
    <div id="div_tag_queryResult"></div>

    <h3>2、Recently used tags</h3>
    <div id="div_tag_recentlyUsed"></div>


</section>


@endsection



@section('myJavascript')
<script type="text/javascript" src="../../../public/js/item/edit.js"></script>
<script type="text/javascript" src="../../../public/js/itemTags/main.js"></script>
<script type="text/javascript" src="../../../public/js/tag/recentlyUsed.js"></script>
<script type="text/javascript" src="../../../public/js/tag/query.js"></script>
<script type="text/javascript" src="../../../public/js/tag/main.js"></script>



<script>

//    new SimpleMDE({
//        element: document.getElementById("demo1"),
//        spellChecker: false,
//    });

    // SMDE = SimpleMarkdownEditor
    var SMDE;
//    var SMDE = new SimpleMDE({
//        element: document.getElementById("textarea_itemContent"),
//        spellChecker: false,
//        autosave: {
//            enabled: true,
//            unique_id: "textarea_itemContent",
//        },
//    });
//
//    new SimpleMDE({
//        element: document.getElementById("demo3"),
//        status: false,
//        toolbar: false,
//    });
</script>


@endsection
