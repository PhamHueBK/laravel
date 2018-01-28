function btnNewPost(){
    $('#addPost').modal('show');
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

function btnEditProfile(id){
    $('#editProfile').modal('show');
    
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

function saveProfile(){
    var name = $('#name').val();
    var email = $('#email').val();
    var mobile = $('#mobile').val();
    var address = $('#address').val();
    var birthday = $('#birthday').val();
    var avatar = $('#avatar').val();
    $.ajax({
        type: 'post',
        url: 'update',
        data: {
            '_token': $('input[name=_token]').val(),
            'name': name,
            'email': email,
            'mobile': mobile,
            'address': address,
            'birthday': birthday,
            'avatar': avatar,
        },
        success: function(data) {
            console.log(data);
            document.getElementById('user_address').innerHTML = 'Address: '+data.address;
            document.getElementById('user_mobile').innerHTML = 'Mobile: '+data.mobile;
            document.getElementById('user_birthday').innerHTML = 'Birthday: '+data.birthday;
            document.getElementById('user_name').innerHTML = data.name;
            $('#editProfile').modal('hide');
            toastr.success('Cập nhật thông tin thành công!', 'Nafosted',{timeOut: 1000});
            
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

            var trangThai = "";
            if(data.status == 1)
                trangThai = "Đã duyệt";
            else if(data.status == 0)
                trangThai = "Chờ duyệt";
            else
                trangThai = "Đã xóa";

            $('#addPost').modal('hide');
            var html = '<div class="post-image"><img src="'+data.thumbnail+'" alt="post image 1"></div><div class="category"><a href="#">IMG</a></div><div class="post-text"><span class="date">'+data.created_at+'</span><h2>'+data.title+'</h2></div><div class="post-text text-content"><div class="post-by">Post By <a href="#">'+data.author+'</a></div><br<div class="post-by" style="font-size: 20px">Trạng thái: <b>'+trangThai+'</b></div><div class="text"><p>'+data.description+'<a href="blog/detail?title='+data.slug+'"><i class="icon-arrow-right2"></i></a></p><div class="clearfix"></div></div></div><div class="social-post"><a href="#"><i class="icon-facebook5"></i></a><a href="#"><i class="icon-twitter4"></i></a><a href="#"><i class="icon-google-plus"></i></a><a href="#"><i class="icon-vimeo4"></i></a><a href="#"><i class="icon-linkedin2"></i></a></div>';  
            $(html).insertAfter('#post_list_of_user');
            console.log(html);
            var html2 = '<tr><td>'+data.title+'</td><td>'+type+'</td><td>'+data.description+'</td><td>'+data.created_at+'</td><td>'+data.updated_at+'</td><td>'+data.views+'</td><td>'+trangThai+'</td></tr>';
            $(html2).insertAfter('#menu');
            toastr.success('Đăng bài viết thành công!', 'Nafosted',{timeOut: 1000});
        }
    });
}
function upload_thumbnail(){
    var file_data = $('#img').prop('files')[0];
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
                $('#addThumbnail').val('http://phamhue.dev:8190/'+res);
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
$(function(){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
});
