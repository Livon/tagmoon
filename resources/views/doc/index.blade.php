@extends('layouts.master')

@section('title','峰')

@section('myCss')
    <link rel="stylesheet" href="https://pandao.github.io/editor.md/examples/css/style.css" />
    <link rel="stylesheet" href="https://pandao.github.io/editor.md/css/editormd.css" />
@endsection

@section('pageBody')

    <div id="layout">
        <header>
            <h1>Simple example</h1>
        </header>
        <div id="test-editormd">
                <textarea style="display:none;">[TOC]

#### Disabled options

- TeX (Based on KaTeX);
- Emoji;
- Task lists;
- HTML tags decode;
- Flowchart and Sequence Diagram;

#### Editor.md directory

    editor.md/
            lib/
            css/
            scss/
            tests/
            fonts/
            images/
            plugins/
            examples/
            languages/
            editormd.js
            ...

```html
&lt;!-- English --&gt;
&lt;script src="../dist/js/languages/en.js"&gt;&lt;/script&gt;

&lt;!-- 繁體中文 --&gt;
&lt;script src="../dist/js/languages/zh-tw.js"&gt;&lt;/script&gt;
```
</textarea>
        </div>
    </div>

    <button id="getContent">getContent</button>

    <br>
    <!-- url()通过路由的名称生成url -->
    <a href="{{ url('url') }}">url()</a>
    <br>
    <!-- action()通过制定控制器及方法名生成url -->
    <a href="{{ action('DocController@store') }}">action()</a>
    <br>
    <!-- route()通过路由的别名生成url -->
    <a href="{{ route('rootPath') }}">route()</a>

    <div id="test-editormd-view">
        <textarea style="display:none;" name="test-editormd-markdown-doc">###Hello world!</textarea>
    </div>



@endsection

@section('myJavascript')

    <script src="/editor.md-master/lib/marked.min.js"></script>
    <script src="/editor.md-master/lib/prettify.min.js"></script>

    <script src="/editor.md-master/lib/raphael.min.js"></script>
    <script src="/editor.md-master/lib/underscore.min.js"></script>
    <script src="/editor.md-master/lib/sequence-diagram.min.js"></script>
    <script src="/editor.md-master/lib/flowchart.min.js"></script>
    <script src="/editor.md-master/lib/jquery.flowchart.min.js"></script>


    <script src="https://pandao.github.io/editor.md/editormd.min.js"></script>
    <script src="{{asset('js/doc/index.js')}}"></script>

    <script type="text/javascript">

        doc.url = {
            doc : '{{ url('doc') }}' // xxxx/public/doc
        };

    </script>

    @endsection


