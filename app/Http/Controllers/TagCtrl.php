<?php


namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TagCtrl extends Controller
{

    public function __construct(){
        # http://www.w3school.com.cn/php/php_date.asp
        date_default_timezone_set("Asia/Shanghai");
    }

    /**
     * 新增Tag
     */
    public static function insert( $tagName )
    {

        $insertedId = DB::table('tag')->insertGetId(
            ['tagName' => $tagName ]
        );

//        http://douyasi.com/laravel/first_pluck_lists.html
//        var_dump($insertedId);

        return $insertedId;
    }

    public static function getId_by_TagName( $tagName )
    {
        $tag = DB::table('tag')->where('tagName', $tagName )->first();

        $id = DB::table('tag')->where('tagName', $tagName )->pluck('id');

//        var_dump( $tag, $id, sizeof( $id ));

        if( sizeof( $id ) > 0 ){
            return $id[0];
        } else {
            return 0 ;
        }
    }

    /**
     * 列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function itemList()
    {
        $items = Item::orderBy('id', 'desc')->paginate(50);

//        $articles = Article::select('id', 'title')->orderBy('id', 'desc')->paginate(5);
//        http://www.cnblogs.com/timeismoney/p/7082444.html

        $data = [
            'items' => $items
        ];

        return view('item.list', $data);
    }

    /**
     * 详情
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function itemDetail( $itemId )
    {
//        https://laravel.com/docs/5.5/queries#raw-expressions
//        $item = DB::table('item')
//            ->select( 'id', 'name' )
//            ->where('id', '=', $itemId )
//            ->get();

//        http://laravelacademy.org/post/6955.html
        $item = DB::table('item')->where('id', $itemId )->first();
//        echo $user->name;
//        echo $item;

        return view('item.detail', [ 'item' => $item ] );
    }

    /**
     * 修改
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function itemEdit( $itemId )
    {
//        https://laravel.com/docs/5.5/queries#raw-expressions
//        $item = DB::table('item')
//            ->select( 'id', 'name' )
//            ->where('id', '=', $itemId )
//            ->get();

//        http://laravelacademy.org/post/6955.html
        $item = DB::table('item')->where('id', $itemId )->first();
//        echo $user->name;
//        echo $item;

        return view('item.edit', [ 'item' => $item ] );
    }

    /**
     * 修改
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function itemUpdate( )
    {
        $itemId = $_POST['itemId'];
        $itemName = $_POST['itemName'];

//        https://laravel.com/docs/5.5/queries#updates
//        $updateResult = DB::table('item')
        DB::table('item')
            ->where('id', $itemId )
            ->update(['name' => $itemName ]);

        $item = DB::table('item')->where('id', $itemId )->first();
//        echo $user->name;
//        echo $item;

        return [ 'updateResult' => 'success' ];
    }



    /**
     * 修改
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function query( Request $request )
    {

        $arr_keyValues = $request->input('arr_keyValues');

        $result = 'Search Success!';

//        var_dump( $arr_keyValues );
//        var_dump( $arr_tagIds );

//        $users = DB::table('users')->where([
//            ['status', '=', '1'],
//            ['subscribed', '<>', '1'],
//        ])->get();

        $arr_whereCondition =[];

//        for($i = 0; $i < count( $arr_keyValues ); $i++)
//        {
//            array_push( $arr_whereCondition, ['name', 'like', '%'. $arr_keyValues[$i] .'%'] );
//        }

        if( $arr_keyValues != NULL ){
            while ( $keyValue = each( $arr_keyValues )) {
                array_push( $arr_whereCondition, ['tagName', 'like', '%'. $keyValue["value"] .'%'] );
            }
        }

        $result = 'Search Success!';

        $tags = [];

        try {
            $tags = DB::table('tag')
                ->where( $arr_whereCondition )
                ->paginate(50);
        } catch (\Exception $e) {
            $result = $e -> getMessage();
        }

        $data = ['result' => $result, 'items' => $tags ];

        return $data;
    }




    //
    public function index()
    {


        $tasks = Item::orderBy('id', 'asc')->get();

        $data = [
            'tasks' => $tasks,
        ];

        $insertId = '333';


        DB::table('tasks')->insert(
            ['name' => 'john@example.com'.' - '.date("Y-m-d h:i:sa"), 'done' => 0]
        );

        $insertedId = DB::table('tasks')->insertGetId(
            ['name' => 'john', 'done' => 0]
        );

        $ids = [ $insertedId ];


        return view('tasks.index', $data );
    }

    public function insert1( $name )
    {

        $tasks = Task::orderBy('id', 'asc')->get();

        DB::table('tasks')->insert(
            ['name' => $name.' - '.date("Y-m-d h:i:sa"), 'done' => 0]
        );

        $data = [
            'tasks' => $tasks
        ];


        return view('tasks.index', $data );
    }

    public function insertGetId( $name )
    {

        $insertedId = DB::table('tasks')->insertGetId(
            ['name' => $name.' - '.date("Y-m-d h:i:sa"), 'done' => 0]
        );

        $data = [
            'insertedId' => $insertedId
        ];

        return view('tasks.insertGetId', $data );
    }

    /**
     * 返回 int
     * ------------------
     * @param $name
     * @return mixed
     */
    public function insertGetId_int( $name )
    {

        $insertedId = DB::table('tasks')->insertGetId(
            ['name' => $name.' - '.date("Y-m-d h:i:sa"), 'done' => 0]
        );

        return $insertedId;
    }


    /**
     * 返回 Json
     * ------------------
     * @param $name
     * @return Json
     */
    public function insertGetIdJson( $name )
    {

        $insertedId = DB::table('tasks')->insertGetId(
            ['name' => $name.' - '.date("Y-m-d h:i:sa"), 'done' => 0]
        );

        return ['insertedId' => $insertedId ];
    }


    /**
     * 返回 Json
     * ------------------
     * @param $itemContent
     * @return Json
     */
    public function itemNew_responseInsertedIdJson_A( $itemContent )
    {

        $insertedId = DB::table('tasks')->insertGetId(
            ['name' => $itemContent.' - '.date("Y-m-d h:i:sa"), 'done' => 0]
        );

        return ['insertedId' => $insertedId ];
    }

    /**
     * @return array
     * http://www.cnblogs.com/foreversun/p/5629129.html
     */
    public function itemNew_responseInsertedIdJson()
    {
        $itemContent = $_POST['itemContent'];

        $insertedId = DB::table('item')->insertGetId(
            ['name' => $itemContent.' - '.date("Y-m-d h:i:sa"), 'done' => 0]
        );

        $result = [
            'insertedId' => $insertedId,
            'itemContent' => $itemContent
        ];

        return $result;
    }
}
