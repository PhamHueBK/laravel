@extends('Blog/layouts/content')
@section('content')
	<div class="col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2" style="margin-top:3%; margin-bottom:3%">
		<form action="{{url('register')}}" method="POST" class="form-horizontal" role="form">
			<div class="form-group">
				<legend>Register</legend>
			</div>
	
			<div class="form-group">
				<label>Name</label>
				<input type="text" class="form-control" id="name" name="name" placeholder="Your name" value="{{old('name')}}">
			</div>
			@if($errors->has('name'))
				<p style="color:red">{{$errors->first('name')}}</p>
			@endif
			<div class="form-group">
				<label>Avatar</label>
				<div id="img_before">

				</div>
				<input type="file" class="form-control" id="file" name="file" onchange="upload()">
			</div>

			<div class="form-group">
				<label>Email</label>
				<input type="email" class="form-control" id="email" name="email" placeholder="Your email" value="{{old('email')}}">
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
			<div class="form-group">
				<label>Address</label>
				<input type="text" class="form-control" id="address" name="address" placeholder="Your address" value="{{old('address')}}">
			</div>
			<div class="form-group">
				<label>Mobile</label>
				<input type="text" class="form-control" id="mobile" name="mobile" placeholder="Your mobile" value="{{old('mobile')}}">
			</div><div class="form-group">
				<label>Birthday</label>
				<input type="date" class="form-control" id="birthday" name="birthday" placeholder="Your birthday" value="{{old('birthday')}}">
			</div>
			{!! csrf_field() !!}
	
			<div class="form-group">
				<div class="col-sm-10 col-sm-offset-2">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</div>
		</form>
	</div>
	<script language="javascript">
		$(document).ready(function() {
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			
		});
		function upload(){
			var file_data = $('#file').prop('files')[0];
		    //lấy ra kiểu file
		    var type = file_data.type;
		    //console.log(type);
		    //Xét kiểu file được upload
		    var match= ["image/gif","image/png","image/jpg", "image/jpeg"];
		    var form_data = new FormData();
		        
		    //kiểm tra kiểu file
		    if(type == match[0] || type == match[1] || type == match[2] || type == match[3])
		    {
		        //khởi tạo đối tượng form data
		        //thêm files vào trong form data
		        form_data.append('file', file_data);
		        //sử dụng ajax post
		        $.ajax({
		            url: 'upload_img', // gửi đến file upload.php 
		            dataType: 'text',
		            cache: false,
		            contentType: false,
		            processData: false,
		            data: form_data,                       
		            type: 'post',
		            success: function(res){
		            	var html = "<img src='"+res+"' width='250px'/>";
		                $('#img_before').append(html);
		                console.log(html);
		        	}
		    	});
		    } else{
		        $('.status').text('Chỉ được upload file ảnh');
		        //
		    }

		} 
	</script>
@endsection