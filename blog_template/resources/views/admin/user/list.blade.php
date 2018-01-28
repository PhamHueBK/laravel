@extends('admin/layouts/header_banner')
@section('script_post')
<script type="text/javascript" src="{{asset('js/admin/userIndex.js')}}"></script>
@endsection
@section('content')
	<div>
		<table class="table table-hover" id="table">
			<thead>
				<tr>
					<th colspan="5"><a href="#" class="btn btn-success">Add new user</a></th>
				</tr>
				<tr>
					<th>Name</th>
					<th>Avatar</th>
					<th>Mobile</th>
					<th>Address</th>
					<th>
						
					</th>
				</tr>
			</thead>
			<tbody>
				@foreach($data as $value)
				<tr>
					<td>{{$value['name']}}</td>
					<td>{{$value['avatar']}}</td>
					<td>{{$value['mobile']}}</td>
					<td>{{$value['address']}}</td>
					<td>
						<a onclick="btnShow('{{$value['id']}}')" class="btn btn-success">Show</a>
						<a onclick="btnEdit('{{$value['id']}}')" class="btn btn-primary">Edit</a>
						<a onclick="btnDelete('{{$value['id']}}')" class="btn btn-danger">Delete</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
		<!-- Modal -->
	<div class="modal fade" id="showUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  	<div class="modal-dialog" role="document">
		    <div class="modal-content">
		      	<div class="modal-header">
		        	<h5 class="modal-title" id="exampleModalLabel"><h2>Show user</h2></h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
		      	</div>
		      	<div class="modal-body">
		        	<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
		        		<form action="" method="POST" class="form-horizontal" role="form">	
		        				<div class="form-group">
	        						<label>Type</label>
        							<div>
        								<select name="addType" id="addType" class="form-control" required="required">
        									<option value="0">Truyện ngắn</option>
        									<option value="1">Truyện Blog</option>
        									<option value="2">Tâm sự</option>
        									<option value="3">Tản mản</option>
        									<option value="4">Cuộc sống</option>
        									<option value="5">Gia đình</option>
        									<option value="6">Bạn bè</option>
        								</select>
        							</div>
	        					</div>	        				
	        					<div class="form-group">
	        						<label>Title</label>
	        						<input type="text" class="form-control" id="addTitle" name="title" placeholder="title" required="true">
	        						<p id="add_title_error" style="color: red"></p>
	        					</div>
	        					<div class="form-group">
	        						<input type="hidden" class="form-control" id="author" name="author" value="{{Auth::user()->name}}">
	        					</div>

	        					<div class="form-group">
	        						<label>Description</label>
	        						<input type="text" class="form-control" id="addDescription" name="addDescription" placeholder="description" required="true">
	        						<p id="add_description_error" style="color: red"></p>
	        					</div>

	        					<div class="form-group">
									<label>Thumbnail</label>
									<div id="img_before">

									</div>
									<input type="file" class="form-control" id="file" name="file" onchange="upload()">
								</div>
								<input type="hidden" class="form-control" id="addThumbnail" name="addThumbnail">

	        					
	        					<div class="form-group">
		    						<label>Nội dung <span style="color: red">*</span></label>
		    						<textarea style="border:1px" class="form-control" id="addContent" name="addContent" required="true" cols="60" rows="10"></textarea>
		    					</div>
	        					<div class="form-group">
	        						<input type="hidden" class="form-control" id="addUserId" name="addContent" value="{{Auth::user()->id}}">
	        					</div>
	        					

	        					{{csrf_field()}}

	        					
	        					<div class="form-group">
	        						<label>Tag</label>
	        						<input type="text" value="" id="taginput" data-role="tagsinput" />
	        					</div>
		        		</form>
		        	</div>
		      	</div>
			      	<div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				        <button type="button" onclick="SaveNewPost()" class="btn btn-primary">Save changes</button>
			      	</div>
		    	</div>
	  	</div>
	</div>
@endsection