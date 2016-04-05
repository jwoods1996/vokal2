@extends('layouts.master')

@section('title')
Library User Search
@stop

@section('content')
  <div id='banner'>
  <h2>Library Users</h2>
  </div>
  <div id='content'>
  <h3>Query</h3>
  
  <form method="get" action="search">
  <table>
    <tr><td>Query: </td><td><input type="text" name="searchTerm"></td></tr>
    <tr><td colspan=2><input type="submit" value="Search">
                      <input type="reset" value="Reset"></td></tr>
  <table>
  </form>
  </div>

@stop




