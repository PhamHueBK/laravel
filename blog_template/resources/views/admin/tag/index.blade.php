@extends('admin/layouts/header_banner')
@section('content')
	<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="{{asset('js/admin/tagIndex.js')}}"></script>
	<div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 5%; margin-bottom: 5%">
		<table class="table table-hover" id="table">
			<thead>
				<tr>
					<th colspan="3">Tag Manager</th>
				</tr>
				<tr>
					<th>Name</th>
					<th>Post</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($data as $item)
				<tr>
					<td>{{$item['name']}}</td>
					<td>
					@if(isset($post[$item['id']]))
					@foreach($post[$item['id']] as $value)
						<a href="{{url('admin/post/show/?title='.$value['slug'])}}">{{$value['title']}}</a><br>
					@endforeach
					@endif
					</td>
					<td>
						<a onclick="btnEditTag('{{$item['slug']}}')" class="btn btn-success">Edit</a>
						<a onclick="btnDeleteTag()" class="btn btn-danger">Delete</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

	<!--Modal Edit Tag-->
	<!-- Modal -->
	<div class="modal fade" id="editTag" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  	<div class="modal-dialog" role="document">
		    <div class="modal-content">
		      	<div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Update Tag</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
		     	</div>
		      	<div class="modal-body">
		        	<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
		        		<form action="" method="POST" class="form-horizontal" role="form">
		        			<div class="form-group">
								<input type="hidden" class="form-control" id="editId" name="editId">
							</div>		
							<div class="form-group">
								<label >Name</label>
								<input type="text" class="form-control" id="editName" name="editName" placeholder="Name Tag">
							</div>
							{{csrf_field()}}
		        		</form>
		        	</div>
		      	</div>
		      	<div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
			        <button type="button" onclick="btnUpdateTag()" class="btn btn-primary">Save changes</button>
		      	</div>
		    </div>
	  	</div>
	</div>
@endsection