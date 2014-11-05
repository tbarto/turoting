@extends('layouts.master')

<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">

@section('content')
	<h1>Welcome {{$user->username}}.</h1>
@stop