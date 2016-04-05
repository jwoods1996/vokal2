@extends('layouts.master')

@section('title')
Library users results page
@stop

@section('content')

<div id="banner">
<h2>Library Users</h2>
</div>
<div id="content">
<h3>Results for "{{{ $userSearch }}}"</h3>

@if (count($users) == 0)

<p>No results found.</p>

@else 

<table class="bordered">
<thead>
<tr><th>Name</th><th>Address</th><th>Phone Number</th><th>Email</th></tr>
</thead>
<tbody>

@foreach($users as $user)
  <tr><td>{{{ $user['name'] }}}</td><td>{{{ $user['address'] }}}</td><td>{{{ $user['phone'] }}}</td><td>{{{ $user['email'] }}}</td></tr>
@endforeach

</tbody>
</table>
@endif

<p><a href="{{ secure_url('/') }}">New search</a></p>
</div>
@stop