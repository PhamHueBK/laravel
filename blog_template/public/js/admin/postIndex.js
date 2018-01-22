function btnAddNew(){
    $('#addPost').modal('show');
}
function btnEdit(id){
    $.ajax({
        type: 'get',
        url: 'findPost?title='+id,
        data: {
            
        },
        success: function(data) {
            console.log(data);
            $('#editTitle').val(data.title);
            $('#editDescription').val(data.description);
            $('#editContent').val(data.content);
            $('#editType').val(data.type);
            $('#editId').val(data.id);
            $('#status').val(data.status);
            $('#editPost').modal('show');

        }
    });
    
}

function btnDelete(id){
    $('#deleteId').val(id);
    $('#deletePost').modal('show');
}

function DeletePost(){
    $.ajax({
        type: 'post',
        url: 'deletePost',
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $('#deleteId').val(),
        },
        success: function(id) {
            console.log(id);
            $('#post_'+id).remove();
            $('#deletePost').modal('hide');
        }
    });
}

function UpdatePost(){
    var title = $('#editTitle').val();
    var id = $('#editId').val();
    var description = $('#editDescription').val();
    var content = $('#editContent').val();
    var type = $('#editType').val();
    var status = $('#status').val();
    $.ajax({
        type: 'post',
        url: 'update',
        data: {
            '_token': $('input[name=_token]').val(),
            'id': id,
            'title': title,
            'description': description,
            'content': content,
            'type': type,
        },
        success: function(data) {
            console.log(data);
            if(status == 1)
            {
                var html = '<tr id="post_'+data.id+'"><td>'+data.title+'</td><td>'+data.description+'</td><td>'+data.type+'</td><td><img src="'+data.thumbnail+'" width="100px" /></td><td>'+data.user_id+'</td><td>'+data.views+'</td><td>'+data.created_at+'</td><td><a href="" class="btn btn-primary" width="100%">Show</a><a href="" class="btn btn-success" width="100%">Edit</a><a href="" class="btn btn-danger" width="100%">Delete</a></td></tr>';  
                $('#post_'+data.id).remove();
                $('#menu').append(html);
            }
            else
                $('#post_'+data.id).remove();
            $('#editPost').modal('hide');
        }
    });
}

function SaveNewPost(){
    
    var title = $('#addTitle').val();
    var description = $('#addDescription').val();
    var content = $('#addContent').val();
    var type = $('#addType').val();
    var user_id = $('#addUserId').val();

    $.ajax({
        type: 'post',
        url: 'addPost',
        data: {
            '_token': $('input[name=_token]').val(),
            'title': title,
            'description': description,
            'content': content,
            'type': type,
            'views': 0,
            'status': 1,
            'user_id': user_id,
        },
        success: function(data) {
            console.log(data);
            $('#addPost').modal('hide');
            var html = '<tr id="post_'+data.id+'"><td>'+data.title+'</td><td>'+data.description+'</td><td>'+data.type+'</td><td><img src="'+data.thumbnail+'" width="100px" /></td><td>'+data.user_id+'</td><td>'+data.views+'</td><td>'+data.created_at+'</td><td><a href="" class="btn btn-primary" width="100%">Show</a><a href="" class="btn btn-success" width="100%">Edit</a><a href="" class="btn btn-danger" width="100%">Delete</a></td></tr>';  
            $('#menu').append(html);
        }
    });
}
$(function(){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
});
