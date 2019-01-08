<?php


namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TasksController extends Controller
{

    public function __construct(){
        # http://www.w3school.com.cn/php/php_date.asp
        date_default_timezone_set("Asia/Shanghai");
    }

    //
    public function index()
    {


        $tasks = Task::orderBy('id', 'asc')->get();

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
}
