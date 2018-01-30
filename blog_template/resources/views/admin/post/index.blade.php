@extends('admin/layouts/header_banner')
@section('script_post')
<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-tagsinput.css')}}">
<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

<script type="text/javascript" src="{{asset('js/ckeditor.js')}}"></script>
<script type="text/javascript">
    $(function () {
        CKEDITOR.replace('addContent');
        CKEDITOR.replace('editContent');
    })
</script>
<script type="text/javascript" src="{{asset('js/admin/postIndex.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap-tagsinput.js')}}"></script>
@endsection
@section('content')
	
	

	<div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 5%; margin-bottom: 5%">
		<table class="table table-hover" id="table">
			<thead>
				<tr>
					<th colspan="8"><h2>{{$controllTitle}}</h2></th>
				</tr>
				<tr>
					<th colspan="8"><a class="btn btn-success" onclick="btnAddNew()">Thêm mới</a></th>
				</tr>
				<tr>
					<th>Title</th>
					<th>Description</th>
					<th>Type</th>
					<th>Thumbnail</th>
					<th>Author</th>
					<th>Views</th>
					<th>Post day</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody id="menu">
				@foreach($data as $item)
				<tr id="post_{{$item->id}}">
					<td>{{$item->title}}</td>
					<td>{{$item->description}}</td>
					<td>{{$item->type}}</td>
					<td><img src="{{$item->thumbnail}}" width="100px"/></td>
					<td>{{$item->author}}</td>
					<td>{{$item->views}}</td>
					<td>{{$item->created_at}}</td>
					<td>
						<a href="{{url('admin/post/show/?title='.$item->slug)}}" class="btn btn-primary" style="width: 100%">Show</a>
						<a class="btn btn-success" onclick="btnEdit('{{$item->slug}}')" style="width: 100%">
						@if($controllTitle == "Post List")
						Edit
						@else
						Approve
						@endif
						</a>
						<a onclick="btnDelete({{$item->id}})" class="btn btn-danger" style="width: 100%">Delete</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="addPost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  	<div class="modal-dialog" role="document">
		    <div class="modal-content">
		      	<div class="modal-header">
		        	<h5 class="modal-title" id="exampleModalLabel"><h2>Add New Post</h2></h5>
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
	        						<input type="hidden" class="form-control" id="author" name="author" value="{{Auth::guard('admin')->user()->name}}">
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
	        						<input type="hidden" class="form-control" id="addUserId" name="addContent" value="{{Auth::guard('admin')->user()->id}}">
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

	<!-- Modal -->
	<div class="modal fade" id="editPost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  	<div class="modal-dialog" role="document">
		    <div class="modal-content">
		      	<div class="modal-header">
		        	<h5 class="modal-title" id="exampleModalLabel"><h2>Update Post</h2></h5>
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
        								<select name="addType" id="editType" class="form-control" required="required">
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
	        						<input type="text" class="form-control" id="editTitle" name="title" placeholder="title" required="true">
	        						<p id="add_title_error" style="color: red"></p>
	        					</div>
	        					<div class="form-group">
	        						<input type="hidden" class="form-control" id="editId" name="id">
	        					</div>
	        					<div class="form-group">
									<label>Thumbnail</label>
									<div id="img_before_edit">

									</div>
									<input type="file" class="form-control" id="file_edit" name="file" onchange="uploadEdit()">
								</div>
								<input type="hidden" class="form-control" id="editThumbnail" name="editThumbnail">
	        					<div class="form-group">
	        						<label>Description</label>
	        						<input type="text" class="form-control" id="editDescription" name="addDescription" placeholder="description" required="true">
	        						<p id="add_description_error" style="color: red"></p>
	        					</div>

	        					<div class="form-group">
		    						<label>Nội dung <span style="color: red">*</span></label>
		    						<!--<input type="text" class="form-control" id="editContent" required="true">-->
		    						<textarea style="border:1px" class="form-control" id="editContent" name="editContent" required="true" cols="60" rows="10"></textarea>
		    					</div>
	        					<div class="form-group">
	        						<input type="hidden" class="form-control" id="addUserId" name="addContent" value="{{Auth::guard('admin')->user()->id}}">
	        					</div>
	        					<div class="form-group">
	        						<input type="hidden" class="form-control" id="status">
	        					</div>

	        					{{csrf_field()}}

	        					
	        					<div class="form-group">
	        						<div id="tagInputDiv"></div>
	        						<label>Tag</label>
	        						<input type="text" value="" id="edittaginput" data-role="tagsinput" />
	        					</div>
		        		</form>
		        	</div>
		      	</div>
			      	<div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				        <button type="button" onclick="UpdatePost()" class="btn btn-primary">Save changes</button>
			      	</div>
		    	</div>
	  	</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="deletePost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  	<div class="modal-dialog" role="document">
		    <div class="modal-content">
		      	<div class="modal-header">
		        	<h5 class="modal-title" id="exampleModalLabel"><h2>Delete post</h2></h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
		      	</div>
		      	<div class="modal-body">
		        	<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
		        		<form action="" method="POST" class="form-horizontal" role="form">		        				
	        					<div class="form-group">
	        						<input type="hidden" class="form-control" id="deleteId">
	        					</div>


	        					<div class="form-group">
	        						<label>Are you sure?</label>
	        					</div>
	        					{{csrf_field()}}

		        		</form>
		        	</div>
		      	</div>
			      	<div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				        <button type="button" onclick="DeletePost()" class="btn btn-primary">Delete</button>
			      	</div>
		    	</div>
	  	</div>
	</div>
@endsection