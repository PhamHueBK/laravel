function btnAddCategory(){
    $('#addCategory').modal('show');
}
function btnCreateCategory(){
    var name = $('#addName').val();
    $.ajax({
        type: 'post',
        url: 'addCategory',
        data: {
            '_token': $('input[name=_token]').val(),
            'name': name,
            'slug': name,
        },
        success: function(data) {
            console.log(data);
            var html = '<tr id="category_'+data.id+'"><td id="name_"'+data.id+'>'+data.name+'</td><td></td><td><a onclick="btnEditCategory('+data.slug+')" class="btn btn-success">Edit</a><a onclick="btnDeleteCategory('+data.id+')" class="btn btn-danger">Delete</a></td>';  
            
            $('#menu').append(html);

            $('#addCategory').modal('hide');
        }
    });
    //alert("HELLO");
}
function btnEditCategory(id){
    $('#editCategory').modal('show');
    $.ajax({
        type: 'get',
        url: 'findCategory?title='+id,
        data: {
            
        },
        success: function(data) {
            console.log(data);
            $('#editName').val(data.name);
            $('#editId').val(data.id);

        }
    });
}

function btnUpdateCategory(){
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

            var html = '<td id="name_'+data.id+'">'+data.name+'</td>';
            
            document.getElementById('name_'+data.id).innerHTML = data.name;
            console.log($('#name_'+data.id).val());
            $('#editCategory').modal('hide');
        }
    });
}

function btnDeleteCategory(id){
    $('#deleteId').val(id);
    $('#deleteCategory').modal('show');
}

function DeleteCategory(){
    $.ajax({
        type: 'post',
        url: 'deleteCategory',
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $('#deleteId').val(),
        },
        success: function(id) {
            console.log(id);
            $('#category_'+id).remove();
            $('#deleteCategory').modal('hide');
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
