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

    <div class="form-group basic-textarea rounded-corners shadow-textarea">
        <!--<label for="textarea_itemContent" class="active">Shadow and placeholder</label>-->
        <textarea id="textarea_itemContent" class="form-control z-depth-1" rows="7"
                  placeholder="Write something here..."></textarea>
    </div>

    <h3>Item tags</h3>
    <div style="display: none;" id="div_ItemTags"></div>


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

    <div class="alert alert-warning">
        <a href="#" class="close" data-dismiss="alert">
            &times;
        </a>
        <strong>警告！</strong>您的网络连接有问题。
    </div>

    <div class="container">
        <h2>警告错误</h2>
        <div class="row">
            <div class="span4">
                <div class="alert">
                    <a class="close" data-dismiss="alert">×</a>
                    <strong>
                        Warning
                    </strong>这里是警告提示信息
                </div>
                <div class="alert alert-success">
                    <a class="close" data-dismiss="alert">×</a>
                    <strong>
                        Success
                    </strong>这里是成功提示信息
                </div>
                <div class="alert alert-info">
                    <a class="close" data-dismiss="alert">×</a>
                    <strong>
                        Info
                    </strong>这里是信息提示信息
                </div>
            </div>
        </div>
    </div>


    <div class="chip blue lighten-4">
        <img src="https://mdbootstrap.com/img/Photos/Avatars/img(7).jpg" alt="Contact Person"> Caroline Smith
        <i class="close fa fa-times"></i>
    </div>
    <div class="chip chip-md cyan darken-2 white-text">
        <img src="https://mdbootstrap.com/img/Photos/Avatars/img(28).jpg" alt="Contact Person"> Martha Lores
    </div>
    <div class="chip chip-lg success-color white-text">
        <img src="https://mdbootstrap.com/img/Photos/Avatars/img(21).jpg" alt="Contact Person">The Sylvester
    </div>
    <div class="chip teal lighten-2 white-text">
        Martha
        <i class="close fa fa-times"></i>
    </div>
    <div class="chip chip-md indigo lighten-4 indigo-text">
        24.08.2016
        <i class="close fa fa-times"></i>
    </div>
    <div class="chip chip-lg aqua-gradient white-text">
        Aqua color
        <i class="close fa fa-times"></i>
    </div>



    <button class="btn purple-gradient btn-rounded waves-effect waves-light">Purple</button>
    <button class="btn blue-gradient btn-rounded waves-effect waves-light">Blue</button>
    <button class="btn aqua-gradient btn-rounded waves-effect waves-light">Aqua</button>

    <div class="md-form">
        <i class="fa fa-envelope prefix"></i>
        <input type="email" id="form9" class="form-control validate">
        <label for="form9" data-error="wrong" data-success="right">Type your email</label>
    </div>



    <div class="md-form">
        <i class="fa fa-lock prefix"></i>
        <input type="password" id="form10" class="form-control validate">
        <label for="form10" data-error="wrong" data-success="right">Type your password</label>
    </div>

    <div class="input-group margin-bottom-sm">
        <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
        <input class="form-control" type="text" placeholder="Email address">
    </div>
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
        <input class="form-control" type="password" placeholder="Password">
    </div>


</section>

<div id="div_post_response"></div>


    <div class="container" style="padding: 100px 50px 10px;" >
        <button type="button" class="btn btn-default" title="Popover title"
                data-container="body" data-toggle="popover" data-placement="left"
                data-content="左侧的 Popover 中的一些内容">
            左侧的 Popover
        </button>
        <button type="button" class="btn btn-primary" title="Popover title"
                data-container="body" data-toggle="popover" data-placement="top"
                data-content="顶部的 Popover 中的一些内容">
            顶部的 Popover
        </button>
        <button type="button" class="btn btn-success" title="Popover title"
                data-container="body" data-toggle="popover" data-placement="bottom"
                data-content="底部的 Popover 中的一些内容">
            底部的 Popover
        </button>
        <button title="Popover title"
                data-container="body" data-toggle="popover" data-placement="bottom"
                data-content="底部的 Popover 中的一些内容">
            底部的 Popover
        </button>
        <button type="button" class="btn btn-warning" title="Popover title"
                data-container="body" data-toggle="popover" data-placement="right"
                data-content="右侧的 Popover 中的一些内容">
            右侧的 Popover
        </button>
    </div>


    {{--https://mdbootstrap.com/javascript/modals/--}}
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Launch demo modal
    </button>

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
<script type="text/javascript" src="../../../public/js/item/edit.js"></script>
<script type="text/javascript" src="../../../public/js/itemTags/main.js"></script>
<script type="text/javascript" src="../../../public/js/tag/recentlyUsed.js"></script>
<script type="text/javascript" src="../../../public/js/tag/query.js"></script>
<script type="text/javascript" src="../../../public/js/tag/main.js"></script>


<script src="../../../../markdown\sparksuite-simplemde-markdown-editor-1.11.2-0-g6abda7a\dist\simplemde.min.js"></script>

<script src="../../../../markdown/highlight/highlight.min.js"></script>
<link rel="stylesheet" href="../../../../markdown/highlight/github.min.css">

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
                                                                                                                                          
