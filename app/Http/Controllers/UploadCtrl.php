<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UploadCtrl extends Controller
{

    public function __construct(){
        # http://www.w3school.com.cn/php/php_date.asp
        date_default_timezone_set("Asia/Shanghai");
    }

    public function uploadImg( Request $request ){

        $file = $request->file('photo');
//        $name = Request::input('name');

        var_dump( $file );

        $name = "abc";

        $allowed_extensions = ["png", "jpg", "gif"];
        if ($file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(), $allowed_extensions)) {
            return ['error' => 'You may only upload png, jpg or gif.'];
        }
        $destinationPath = 'storage/uploads/'; //public 文件夹下面建 storage/uploads 文件夹
        $extension = $file->getClientOriginalExtension();
        $fileName = str_random(10).'.'.$extension;
        $file->move($destinationPath, $fileName);
        $filePath = asset($destinationPath.$fileName);
//        $info=DB::insert('insert into photo(pname,photo) VALUES (?,?)',[$name,$filePath]);
//        if($info){
//            return Redirect('/show');
//        }else{
//            echo "no";
//        }
        return ['filePath'=> $filePath ];
    }




    /**
     * 接收上传文件
     * @param Request $request
     * @return array
     */
    public function multiUploadImg( Request $request ){

        function reArrayFiles( $file_post ) {

            $file_ary = array();
            $file_count = count($file_post['name']);
            $file_keys = array_keys($file_post);

            for ($i=0; $i<$file_count; $i++) {
                foreach ($file_keys as $key) {
                    $file_ary[$i][$key] = $file_post[$key][$i];
                }
            }

            return $file_ary;
        }

        $imgFiles = $_FILES['filesToUpload'];
        $uploadedFiles = array();


        if(!empty($imgFiles))
        {
            $img_desc = reArrayFiles( $imgFiles );
//            print_r('- - - - - - - - - - - - ');
//            print_r($img_desc);
//            printf('= = = = = = = = ');

            $destinationPath = 'storage/uploads/'; //public 文件夹下面建 storage/uploads 文件夹

            foreach( $img_desc as $img )
            {
//                $newname = date('YmdHis',time()).mt_rand().'.jpg';
//                print_r( '- - - - - - - - - - - ' );
//                print_r( $img['name'] );
//                print_r( pathinfo( $img['name'], PATHINFO_EXTENSION ) );
                $savedFile = $destinationPath.date('YmdHis',time()).mt_rand().'.'.pathinfo( $img['name'], PATHINFO_EXTENSION );
                move_uploaded_file($img['tmp_name'],  $savedFile);
//                var_dump( $destinationPath.$newname );
//                array_push( $img, 'savedFile' -> $savedFile );
                $img['savedFile'] = $savedFile ;
//                print_r( $img );
                array_push( $uploadedFiles, $img );
            }
        }

        $allowed_extensions = ["png", "jpg", "gif"];

//        $file_ary = array();
//        $file_ary = reArrayFiles( $_FILES['filesToUpload'] );
//
//        var_dump( $_FILES );
//        var_dump( $file_ary );
//
////        if(count($_FILES['uploads']['filesToUpload'])) {
//        if(count($_FILES['filesToUpload'])) {
//            foreach ($_FILES['filesToUpload'] as $file) {
//
//                //do your upload stuff here
//                array_push( $file_ary, $file );
////                print 'File Name: ' . $file['name'];
////                print 'File Type: ' . $file['type'];
////                print 'File Size: ' . $file['size'];
////
////                $destinationPath = 'storage/uploads/'; //public 文件夹下面建 storage/uploads 文件夹
////
////                $fileName = str_random(10).'.jpg';
////                $file->move($destinationPath, $fileName);
////                $filePath = asset($destinationPath.$fileName);
//
//            }
//
//            var_dump( $file_ary );

//            return ['files' => $file_ary ];
//    }

        return ['uploadedFiles' => $uploadedFiles ];
    }

//https://segmentfault.com/a/1190000002962210
    public function wrongTokenAjax()
    {
        if ( Session::token() !== Request::get('_token') ) {
            $response = [
                'status' => false,
                'errors' => 'Wrong Token',
            ];

            return Response::json($response);
        }

    }

}
