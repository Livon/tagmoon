@extends('layouts.master')

@section('title','峰')

@section('content')
杨<br>
Yang
@endsection
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
|@foreach( $ids as $id )
|
|    <p>{{ $id }}</p>
|
|@endforeach
*/


@foreach($tasks as $task)

    <p>

    {{ $task->id }} - {{ $task->name }}

    @if(!$task->done)
        <span style="color: #d58512">{{$task->done}}</span>
    @endif

    <span style="color: #77ee77">{{ ($task->done)?'完成啦！':'再等等' }}</span>

    </p>

@endforeach

<p>Livon</p>

<p>http://php.net/manual/zh/control-structures.foreach.php</p>
