@extends('layouts.master')

@section('title')
Library pms results page
@stop

@section('content')

<div id="banner">
<h2>Library pms</h2>
</div>
<div id="content">
<h3>Results for "{{{ $pmSearch }}}"</h3>

@if (count($pms) == 0)

<p>No results found.</p>

@else 

<table class="bordered">
<thead>
<tr><th>Index</th><th>Name</th><th>From</th><th>To</th><th>Party</th><th>Duration</th><th>State</th></tr>
</thead>
<tbody>

@foreach($pms as $pm)
  <tr><td>{{{ $pm->number }}}</td><td>{{{ $pm->name }}}</td><td>{{{ $pm->start }}}</td><td>{{{ $pm->finish }}}</td><td>{{{ $pm->party }}}</td><td>{{{ $pm->duration }}}</td><td>{{{ $pm->state }}}</td></tr>
@endforeach

</tbody>
</table>
@endif

<p><a href="{{ secure_url('/') }}">New search</a></p>
</div>
@stop