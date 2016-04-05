@extends('layouts.master')

@section('post')
    <form>
        Name: <br>
        <input type="text" name="enterName"/><br>
        Message: <br>
        <input type="textarea" name="enterMessage"/><br>
        <button>Submit</button>
    </form>
@stop

@section('content')
Number of posts is: {{{ $postamount }}}
@foreach($posts as $post)

    <table style="width:200px">
        <tr>
            <th rowspan="2"><img src="{{{ $post['image'] }}}" width='50' height ='50'></img></th>
            <td>{{{ $post['date'] }}}</td>
        </tr>
    <tr>
        <td>{{{ $post['message'] }}}</td>
    </tr>
    </table></br></br>
@endforeach
@stop
