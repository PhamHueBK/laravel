@extends('Blog/layouts/content')
@section('content')
	<div class="col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2" style="margin-top:3%; margin-bottom:3%">
		<form action="{{url('login')}}" method="POST" class="form-horizontal" role="form">
			<div class="form-group">
				<legend>Login</legend>
			</div>
	
			
			<div class="form-group">
				<label>Email</label>
				<input type="email" class="form-control" id="email" name="email" placeholder="Your email" value="{{old('name')}}">
			</div>
			@if($errors->has('email'))
				<p style="color:red">{{$errors->first('email')}}</p>
			@endif
			<div class="form-group">
				<label>Password</label>
				<input type="password" class="form-control" id="password" name="password" value="{{old('password')}}">
			</div>
			@if($errors->has('password'))
				<p style="color:red">{{$errors->first('password')}}</p>
			@endif
			{!! csrf_field() !!}
	
			<div class="form-group">
				<div class="col-sm-10 col-sm-offset-2">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</div>
		</form>
	</div>
@endsection