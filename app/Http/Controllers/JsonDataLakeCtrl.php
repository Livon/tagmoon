<?php


namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JsonDataLakeCtrl extends Controller
{

    public function __construct(){
        # http://www.w3school.com.cn/php/php_date.asp
        date_default_timezone_set("Asia/Shanghai");
    }

    public function getJsonData(){

//        $JsonData = { 'id' -> ''};

        $obj = (object) array('1' => 'foo');
        var_dump(isset($obj->{'1'})); // outputs 'bool(false)'
        var_dump(key($obj)); // outputs 'int(1)'

//        return ['jsonDataList' => $obj ];

        $jsonData = DB::table('json_data_lake')
            ->where('json_content->id', '1')
            ->get();

        return [ 'jsonData' => $jsonData ];
    }

    /**
     * 新增Tag
     */
    public static function tagNew( $tagName )
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
//    public function itemSearch( )
    public function itemSearch( Request $request )
    {
//        $arr_keyValues = $_POST['arr_keyValues'];
//        $arr_tagIds = $_POST['arr_tagIds'];

        $arr_keyValues = $request->input('arr_keyValues');
        $arr_tagIds = $request->input('arr_tagIds');

//        var_dump( $arr_tagIds );
//        var_dump( $arr_tagIds[0] );

        $itemQuery = \DB::table('item')
            -> select('item.id','item.name')->distinct();

        for($i = 0; $i < count( $arr_tagIds ); $i++)
        {
//            var_dump( $i );
            $itemQuery -> leftJoin('item_tags as it'.$i, 'it'.$i.'.itemId', '=', 'item.id' );
            $itemQuery -> where( 'it'.$i.'.tagId', '=', $arr_tagIds[$i] );
        }

        $arr_whereCondition =[];

        while ( $keyValue = each( $arr_keyValues )) {
            array_push( $arr_whereCondition, ['item.name', 'like', '%'. $keyValue[1] .'%'] );
        }

        $itemQuery -> where( $arr_whereCondition );

        $items = $itemQuery-> paginate(50);

//        var_dump( $itemQuery );


//        $items = \DB::table(\DB::raw("({ $itemQuery }) as sub "))
//            ->mergeBindings($itemQuery)
//            ->where( $arr_whereCondition )-> paginate(50);
////
//        var_dump( $items );

//        var_dump( $arr_keyValues );
//        var_dump( $arr_tagIds );

//        $users = DB::table('users')->where([
//            ['status', '=', '1'],
//            ['subscribed', '<>', '1'],
//        ])->get();



//        while ( $tagId = each( $arr_tagIds )) {
//            array_push( $arr_whereCondition, ['item_tags.tagId', '=', $tagId[1] ] );
//        }

//        if( $arr_tagIds != NULL ){
//            while ( $tagId = each( $arr_tagIds )) {
//                array_push( $arr_whereIn_tagIds, ['item_tags.tagId', '=', $tagId[1] ] );
//            }
//        }

//        var_dump( $arr_whereCondition );

//        $items = [];

        $itemSearchResult = 'Search Success!';
//        try {
//            $items = DB::table('item')
//                -> select('item.id','item.name')
//                -> join('item_tags', 'item.id', '=', 'item_tags.itemId')->distinct()
//                -> where( $arr_whereCondition )
//                -> whereIn( 'item_tags.tagId', $arr_tagIds )
//                -> paginate(50);
//        } catch (\Exception $e) {
//            $itemSearchResult = $e -> getMessage();
//        }

        //        (1) 查询 item_tags
//        $arr_obj_itemIds = \DB::table('item_tags')
//            -> select('itemId')->distinct()
//            -> whereIn( 'item_tags.tagId', $arr_tagIds )
//            -> get();

//        var_dump( $arr_obj_itemIds );
//        var_dump( $arr_obj_itemIds[0] -> itemId );

        $itemIds = [];

        foreach ( $items as $item) {
//            $item = $value * 2;
//            var_dump($item);
//            var_dump($item -> id );
            array_push( $itemIds, $item -> id );
        }

//        var_dump( $itemIds );

//        try {
//            $items = \DB::table('item')
//                -> select('item.id','item.name')->distinct()
//                -> where( $arr_whereCondition )
//                -> whereIn( 'item.id', $itemIds )
//                -> paginate(50);
//        } catch (\Exception $e) {
//            $itemSearchResult = $e -> getMessage();
//        }

//        var_dump( $arr_whereCondition );
//        var_dump( $items );

        $itemTags = [];

        $tagSearchResult = 'Search Success!';
        try {
            $itemTags = \DB::table('item_tags')
                ->select('item_tags.itemId','item_tags.tagId','tag.tagName')
//                ->leftJoin('item_tags', 'item.id', '=', 'item_tags.itemId')
                ->leftJoin('tag', 'item_tags.tagId', '=', 'tag.id')
                ->whereIn( 'item_tags.itemId', $itemIds )
                ->get();
        } catch (\Exception $e) {
            $tagSearchResult = $e -> getMessage();
        }

        $data = [
            'itemSearchResult' => $itemSearchResult,
            'tagSearchResult' => $tagSearchResult,
            '$arr_whereCondition' => $arr_whereCondition ,
            '$itemIds' => $itemIds ,
            'items' => $items,
            'itemTags' => $itemTags
        ];

        return $data;
    }

    /**
     * 修改
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function itemDelete( $itemId )
    {

        $result = 'Search Success!';

        try {

            DB::table('item')->where('id', $itemId )->delete();

        } catch (\Exception $e) {
            $result = $e -> getMessage();
        }

        return [ 'delResult' => $result ];
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

    public function insert( $name )
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
