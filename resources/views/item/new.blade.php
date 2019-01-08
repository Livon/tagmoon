@extends('layouts.master')

@section('pageTitle','新增 - TagMoon')




@section('pageBody')


    <!-- Start your project here-->
<div style="height: 10vh">
    <div class="flex-center flex-column">
        <h1 class="animated fadeIn mb-4">新增</h1>
    </div>
</div>
<!-- /Start your project here-->

<section class="section">

    <button class="btn aqua-gradient btn-rounded waves-effect waves-light" id="button_提交">添加</button>

    <div class="form-group basic-textarea rounded-corners shadow-textarea">
        <!--<label for="textarea_itemContent" class="active">Shadow and placeholder</label>-->
        <textarea id="textarea_itemContent" class="form-control z-depth-1" rows="7"
                  placeholder="Write something here..."></textarea>
    </div>


</section>

<div id="div_itemNew_response"></div>




<div class="flex-center flex-column">
    <p>Livon 2018.01</p>
</div>


<!-- /*
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
-->

@endsection



@section('myJavascript')
<script type="text/javascript" src="../../public/js/item/new.js"></script>
@endsection
