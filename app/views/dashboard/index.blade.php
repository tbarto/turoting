@extends('layouts.dashboard')

@section('content')

@stop

@section('footerCustomJS')
	{{ HTML::script('/js/dashboard/plugin.js') }}
@stop