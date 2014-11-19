@extends('layouts.login')

@section('content')

<div class="container">
	<div class="col-md-6 col-md-offset-6">
		<div class="omb_login">
			<h3 class="omb_authTitle">Login or <a href="#">Sign up</a></h3>
			<div class="row omb_row-sm-offset-3 omb_socialButtons">
				<div class="col-xs-4 col-sm-2">
					<a href="anvard/login/facebook" class="btn btn-lg btn-block omb_btn-facebook">
						<i class="fa fa-facebook visible-xs"></i>
						<span class="hidden-xs"><i class="fa fa-facebook-square"></i></span>
					</a>
				</div>
				<div class="col-xs-4 col-sm-2">
					<a href="anvard/login/twitter" class="btn btn-lg btn-block omb_btn-twitter">
						<i class="fa fa-twitter visible-xs"></i>
						<span class="hidden-xs"><i class="fa fa-twitter-square"></i></span>
					</a>
				</div>	
				<div class="col-xs-4 col-sm-2">
					<a href="#" class="btn btn-lg btn-block omb_btn-google">
						<i class="fa fa-google-plus visible-xs"></i>
						<span class="hidden-xs"><i class="fa fa-google-plus-square"></i></span>
					</a>
				</div>	
			</div>

			<div class="row omb_row-sm-offset-3 omb_loginOr">
				<div class="col-xs-12 col-sm-6">
					<hr class="omb_hrOr">
					<span class="omb_spanOr">or</span>
				</div>
			</div>

			<div class="row omb_row-sm-offset-3">
				<div class="col-xs-12 col-sm-6">
					{{Form::open(array('route'=>'sessions.store','class'=>'omb_loginForm', 'role'=>'form'))}}
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user"></i></span>
							<input type="email" class="form-control" name="username" placeholder="Username or Email" required="" autofocus="autofocus">
						</div>
						<span class="help-block"></span>

						<div class="input-group clearfix">
							<span class="input-group-addon"><i class="fa fa-lock"></i></span>
							<input type="password" class="form-control" name="password" placeholder="Password">
						</div>
						@if(Session::has('message'))
							<span class = "{{Session::get('alert-class') }}"> {{Session::get('message')}}</span>
						@else
							<br>
						@endif
						<button class="btn btn-sm btn-primary btn-block" type="submit">Login</button>
					{{Form::close()}}
				</div>
			</div>
			<div class="row omb_row-sm-offset-3">
				<div class="col-xs-12 col-sm-3">
					<label class="checkbox">
						<input type="checkbox" value="remember-me">Remember Me
					</label>
				</div>
				<div class="col-xs-12 col-sm-3">
					<p class="omb_forgotPwd">
						<a href="#">Forgot password?</a>
					</p>
				</div>
			</div>	    	
		</div>
	</div>
</div>
@stop