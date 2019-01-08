@extends('layouts.master')

@section('pageTitle','View - TagMoon')


@section('myCss')

<link rel="stylesheet" href="../../../../markdown\sparksuite-simplemde-markdown-editor-1.11.2-0-g6abda7a\demo\font-awesome.min.css">
<link rel="stylesheet" href="../../../../markdown\sparksuite-simplemde-markdown-editor-1.11.2-0-g6abda7a\dist\simplemde.min.css">

@endsection


@section('pageBody')

    <script type="text/javascript">
        var articleId = '{{ $article -> id }}';
        var articleContent = '{{ $article -> name }}';
    </script>


    <!-- Start your project here-->
<div style="height: 10vh">
    <div class="flex-center flex-column">
        <h1 class="animated fadeIn mb-4">View</h1>
    </div>
</div>
<!-- /Start your project here-->



    {{--<h3>Item tags</h3>--}}
    <div id="div_articleTags"></div>

    <div id="div_article"></div>


@endsection



@section('myJavascript')

<script src="../../../public/js/article/view.js" type="text/javascript"></script>
<script src="../../../public/js/itemTags/main.js" type="text/javascript"></script>

<script>

    // SMDE = SimpleMarkdownEditor
    var SMDE;
</script>

@endsection
