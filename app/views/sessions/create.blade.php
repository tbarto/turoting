@extends('layouts.master')

@section('css')
{{ HTML::style("//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css")}}
{{ HTML::style('css/login/mystyles.css') }}
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-7">
            <div class="panel panel-default">
                <div class="panel-heading"> <strong class="">Login</strong>

                </div>
                <div class="panel-body">
                    @if(Session::has('message'))
                        <p class = "alert {{Session::get('alert-class') }}"> {{Session::get('message')}}</p>
                    @endif

                    {{Form::open(array('route'=>'sessions.store','class'=>'form-horizontal', 'role'=>'form'))}}
                        <div class="form-group">
                            <label for="useremail" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" name="useremail" id="useremail" placeholder="Email" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <div class="checkbox">
                                    <label class="">
                                        <input type="checkbox" name="remember" class="">Remember me</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group last">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" name="submit" class="btn btn-success btn-sm">Sign in</button>
                            </div>
                        </div>
                    {{Form::close()}}
                </div>
                <div class="panel-footer">Not Registered? <a href="#" class="">Register here</a>
                </div>
            </div>
        </div>
    </div>
</div>
@stop