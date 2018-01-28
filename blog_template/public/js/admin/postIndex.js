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
            //$('#editContent').val(data.content);
            CKEDITOR.instances.editContent.setData(data.content);
            $('#editType').val(data.type);
            $('#editId').val(data.id);
            $('#status').val(data.status);
            $('#editPost').modal('show');
            $('#edittaginput').val(data.tag);
            $('#tagInputDiv').html('<p style="margin-left:3%">'+data.tag+'</p>');
            console.log($('#edittaginput').val());
            var html = "<img src='"+data.thumbnail+"' width='450px'/>";
            $('#img_before_edit').html(html);
            $('#editThumbnail').val("");

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
    var content = CKEDITOR.instances.editContent.getData();
    var type = $('#editType').val();
    var status = $('#status').val();
    var thumbnail = $('#editThumbnail').val();
    var tagArr = $("#edittaginput").val();
    console.log(tagArr);
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
            'thumbnail': thumbnail,
            'tag': tagArr,
        },
        success: function(data) {
            console.log(data);
            if(status == 1)
            {
                var html = '<td>'+data.title+'</td><td>'+data.description+'</td><td>'+data.type+'</td><td><img src="'+data.thumbnail+'" width="100px" /></td><td>'+data.user_id+'</td><td>'+data.views+'</td><td>'+data.created_at+'</td><td><a href="http://phamhue.dev:8190/admin/post/show/?title='+data.slug+'" class="btn btn-primary" width="100%">Show</a><a onclick="btnEdit(\''+data.slug+'\')" class="btn btn-success" width="100%">Edit</a><a onclick="btnDelete('+data.id+')" class="btn btn-danger" width="100%">Delete</a></td>';  
                
                $('#post_'+data.id).html(html);
                toastr.success('Cập nhật bài viết thành công!', 'Nafosted',{timeOut: 1000});
            }
            else{
                $('#post_'+data.id).remove();
                toastr.success('Phê duyệt bài viết thành công!', 'Nafosted',{timeOut: 1000});
            }
            $('#editPost').modal('hide');
        }
    });
}

function SaveNewPost(){
    
    var title = $('#addTitle').val();
    var description = $('#addDescription').val();
    //var content = $('#addContent').val();
    var content = CKEDITOR.instances.addContent.getData();
    var type = $('#addType').val();
    var thumbnail = $('#addThumbnail').val();
    var tagArr = $("#taginput").val();
    var user_id = $('#addUserId').val();

    $.ajax({
        type: 'post',
        url: 'addPost',
        data: {
            '_token': $('input[name=_token]').val(),
            'title': title,
            'description': description,
            'content': content,
            'thumbnail': thumbnail,
            'type': type,
            'views': 0,
            'user_id': user_id,
            'tag': tagArr,
        },
        success: function(data) {
            console.log(data);
            var type = "";
            if(data.type == 0)
                type = 'Truyện ngắn';
            else if(data.type == 1)
                type = "Truyện Blog";
            else if(data.type == 2)
                type = "Tâm sự";
            else if(data.type == 3)
                type = "Tản mản";
            else if(data.type == 4)
                type = "Cuộc sống";
            else if(data.type == 5)
                type = "Gia đình";
            else
                type = "Bạn bè";

            $('#addPost').modal('hide');
            var html = '<tr id="post_'+data.id+'"><td>'+data.title+'</td><td>'+data.description+'</td><td>'+type+'</td><td><img src="'+data.thumbnail+'" width="100px" /></td><td>'+$('#author').val()+'</td><td>'+data.views+'</td><td>'+data.created_at+'</td><td><a href="http://phamhue.dev:8190/admin/post/show/?title='+data.slug+'" class="btn btn-primary" width="100%">Show</a><a onclick="btnEdit(\''+data.slug+'\')" class="btn btn-success" width="100%">Edit</a><a onclick="btnDelete('+data.id+')" class="btn btn-danger" width="100%">Delete</a></td></tr>';  
            $('#menu').append(html);
            toastr.success('Đăng bài viết thành công!', 'Nafosted',{timeOut: 1000});
        }
    });
}

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
                var html = "<img src='http://phamhue.dev:8190/"+res+"' width='450px'/>";
                $('#img_before').append(html);
                $('#avatar').val('http://phamhue.dev:8190/'+res);
                console.log(html);
            }
        });
    } else{
        $('.status').text('Chỉ được upload file ảnh');
        //
    }

} 
function uploadEdit(){
    var file_data = $('#file_edit').prop('files')[0];
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
                var html = "<img src='http://phamhue.dev:8190/"+res+"' width='450px'/>";
                $('#img_before_edit').html(html);
                $('#editThumbnail').val('http://phamhue.dev:8190/'+res);
                console.log(html);
            }
        });
    } else{
        $('.status').text('Chỉ được upload file ảnh');
        //
    }

} 
$(function(){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
});
