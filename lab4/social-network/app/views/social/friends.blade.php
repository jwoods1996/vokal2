@extends('layouts.master')

@section('title')
Friends
@stop

@section('content')

<h2>Friends</h2>
@foreach($friendsList as $friend)
    <table style="width:200px">
        <tr>
            <th rowspan="2"><img src='{{{ $friend['icon'] }}}' width='50'></img></th>
            <td>{{{ $friend['name'] }}}</td>
        </tr>
    <tr>
        <td>{{{ $friend['status'] }}}</td>
    </tr>
    </table></br></br>
@endforeach
@stop