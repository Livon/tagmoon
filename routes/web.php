<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|


Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/item/search','ItemCtrl@search');

//Route::get('/item/new','TagController@itemNew');
Route::get('/item/newBlank','ItemCtrl@newBlank');
//Route::post('/item/insert','ItemCtrl@insert');
//Route::match( array('GET','POST'), '/item/insert','ItemCtrl@insert');

//Route::get('/item/list','TagController@itemList');
Route::get('/item/detail/{id}','TagController@itemDetail');

Route::get('/article/view/{id}','ArticleCtrl@articleView');

Route::get('/item/edit/{id}','TagController@itemEdit');
Route::post('/item/update','TagController@itemUpdate');
Route::post('/item/query','ItemCtrl@itemQuery');
Route::get('/item/delete/{id}','ItemCtrl@itemDelete');

Route::post('/tag/query','TagCtrl@query');
Route::get('/tag/recentlyUsed/logging/{id}','TagRecentlyUsedCtrl@logging');
Route::get('/tag/recentlyUsed/getList','TagRecentlyUsedCtrl@getList');

Route::post('/itemTags/insert','ItemTagsCtrl@insert');
Route::get('/itemTags/getTagsByItemId/{itemId}','ItemTagsCtrl@getTagsByItemId');
Route::get('/itemTags/tag/add/{itemId}/{tagId}','ItemTagsCtrl@getTagsByItemId');
Route::get('/itemTags/tag/remove/{itemId}/{tagId}','ItemTagsCtrl@tag_remove');

Route::get('/JsonDataLake/get','JsonDataLakeCtrl@getJsonData');

/*
 * http://www.cnblogs.com/foreversun/p/5629129.html
 */
Route::post('/tagMoon/itemNew','TagsController@itemNew_responseInsertedIdJson' );

Route::get('/editor', function(){

    return view('item.markdown-editor');
} );

//图片上传
Route::post('/upload/uploadImg','UploadCtrl@uploadImg');
Route::post('/multiUploadImg','UploadCtrl@multiUploadImg');
Route::get('/upload', function(){
   return view('upload.main');
});

/*
 * Livon 2017.11.18
 *
 * [ Laravel 5.4 文档 ] HTTP层 —— 路由
 * http://laravelacademy.org/post/6732.html
 */
Route::get('/tasks',['as'=>'tasks.index','uses'=>'TasksController@index']);

Route::get('/tasks/insert/{name}',['as'=>'tasks.index','uses'=>'TasksController@insert']);
Route::get('/tasks/insertGetId/{name}',['as'=>'tasks.insertGetId','uses'=>'TasksController@insertGetId']);
Route::get('/tasks/insertGetIdJson/{name}','TasksController@insertGetIdJson' );

Route::get('/tasks/insert/{name}.html',['as'=>'tasks.index','uses'=>'TasksController@insert']);

Route::get('/', function () {
    return 'Hello World';
});
