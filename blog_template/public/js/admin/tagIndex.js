function btnEditTag(id){
    $('#editTag').modal('show');
    $.ajax({
        type: 'get',
        url: 'findTag?title='+id,
        data: {
            
        },
        success: function(data) {
            console.log(data);
            $('#editName').val(data.name);
            $('#editId').val(data.id);

        }
    });
}

function btnUpdateTag(){
    var name = $('#editName').val();
    var id = $('#editId').val();
    $.ajax({
        type: 'post',
        url: 'update',
        data: {
            '_token': $('input[name=_token]').val(),
            'id': id,
            'name': name,
        },
        success: function(data) {
            console.log(data);
            /*if(status == 1)
            {
                var html = '<td>'+data.title+'</td><td>'+data.description+'</td><td>'+data.type+'</td><td><img src="'+data.thumbnail+'" width="100px" /></td><td>'+data.user_id+'</td><td>'+data.views+'</td><td>'+data.created_at+'</td><td><a href="http://phamhue.dev:8190/admin/post/show/?title='+data.slug+'" class="btn btn-primary" width="100%">Show</a><a onclick="btnEdit(\''+data.slug+'\')" class="btn btn-success" width="100%">Edit</a><a onclick="btnDelete('+data.id+')" class="btn btn-danger" width="100%">Delete</a></td>';  
                
                $('#post_'+data.id).html(html);
            }
            else
                $('#post_'+data.id).remove();*/
            $('#editTag').modal('hide');
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
