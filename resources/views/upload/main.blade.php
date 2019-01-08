@extends('layouts.master')

@section('pageTitle','上传图片 - TagMoon')


@section('myCss')

@endsection


@section('pageBody')


    <div style="height: 10vh">
        <div class="flex-center flex-column">
            <h1 class="animated fadeIn mb-4">Upload</h1>
        </div>
    </div>

    <form id="form_uploadImg" method="post" enctype="multipart/form-data">
        <div class="file-field">
            <div class="btn btn-primary btn-sm">
                <span>Choose files</span>
                <input name="filesToUpload[]" id="input_multifileSelect" type="file" multiple>
            </div>
        </div>
    </form>

    <br><br><br>
    {{--<hr>--}}

    <div id="div_readyForUploadImgs"></div>


    <!-- IMPORTANT:  FORM's enctype must be "multipart/form-data" -->
    {{--<form id="form_uploadImg" method="post" enctype="multipart/form-data">--}}
        {{--<input name="filesToUpload[]" id="filesToUpload" type="file" multiple />--}}
    {{--</form>--}}
    {{--<div id="fileList"></div>--}}
    {{--<button id="btn_submit" class="btn aqua-gradient btn-rounded waves-effect waves-light">UPLOAD</button>--}}
    {{--<br><br>--}}
    <div id="div_uploadedImgs"></div>

@endsection



@section('myJavascript')


    <script type="text/javascript" src="/jQuery/jquery.form-3.46.0.js"></script>


    <script>

        $(document).ready(function() {

            $('#btn_submit').click( function(){

// https://davidwalsh.name/multiple-file-upload
                //get the input and UL list
                var input = document.getElementById('input_multifileSelect');
//
                var ajax_option= {
                    url: "multiUploadImg", // 默认是 form action
                    success: function ( data ) {
                        console.log( data );
                        showUploadedImgs( data.uploadedFiles );
                    }
                }

                $('#form_uploadImg').ajaxSubmit( ajax_option );
//                $('#form_uploadImg').ajaxForm( ajax_option ).submit();

            })

            $('#input_multifileSelect').on('change', function(){

//                var imgList = document.getElementById('div_readyForUploadImgs');
////                var imgList = $('#input_readyForUploadImgs');
//                var input = document.getElementById('input_multifileSelect');

//                while (imgList.hasChildNodes()) {
//                    imgList.removeChild( imgList.firstChild);
//                }
//
//                for (var x = 0; x < this.files.length; x++) {
//                    //add to list
//                    var li = document.createElement('p');
//                    li.innerHTML = 'File ' + (x + 1) + ':  ' + input.files[x].name;
//                    imgList.append(li);
//                }

                var ajax_option= {
                    url: "multiUploadImg", // 默认是 form action
                    success: function ( data ) {
                        console.log( data );
                        showUploadedImgs( data.uploadedFiles );
                    }
                }

                $('#form_uploadImg').ajaxSubmit( ajax_option );

//                showFileName();

//                var ajax_option= {
//
//                    url: "multiUploadImg",//默认是form action
//
//                    success: function (data) {
//                        console.log();
//                    }
//                }
//
//                $('#form_uploadImg').ajaxSubmit(ajax_option);

            });

//            $('form[action="uploadImg"]').ajaxForm(options).submit();





            function showFileName() {
                console.log(" FileList Demo:");
                var file;
                //取得FileList取得的file集合
                for (var i = 0; i < document.getElementById("input_multifileSelect").files.length; i++) {
                    //file对象为用户选择的某一个文件
                    file = document.getElementById("input_multifileSelect").files[i];
                    //此时取出这个文件进行处理，这里只是显示文件名
                    console.log(file.name);
                }
            }


            var options = {
                beforeSubmit:  showRequest,
                success:       showResponse,
                dataType: 'json'
            };
            $('#image').on('change', function(){
                $('#upload-avatar').html('正在上传...');
                $('#upload').ajaxForm(options).submit();
            });
        });

        // 显示上传的图片
        function showUploadedImgs( imgs ){

            $.each( imgs, function(index, img ) {
                var pic = '<p><img src="{0}"  alt="" /><br>{0} （ {1} - {2} ）</p>';
                pic = pic.format( baseUrl + 'public/' + img.savedFile, img.name, img.size );
//                <img src="/i/eg_tulip.jpg"  alt="上海鲜花港 - 郁金香" />
//                var li = document.createElement('p');
//                li.innerHTML = baseUrl + 'public/' + img ;
                $('#div_uploadedImgs').prepend( pic );
            });
        }


        function showRequest() {
            $("#validation-errors").hide().empty();
            $("#output").css('display','none');
            return true;
        }

        function showResponse(response)  {
            if(response.success == false)
            {
                var responseErrors = response.errors;
                $.each(responseErrors, function(index, value)
                {
                    if (value.length != 0)
                    {
                        $("#validation-errors").append('<div class="alert alert-error"><strong>'+ value +'</strong><div>');
                    }
                });
                $("#validation-errors").show();
            } else {

                $('#user-avatar').attr('src',response.avatar);

            }
        }
    </script>

@endsection
