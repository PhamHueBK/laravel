$(document).ready(function() {
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
  	$(document).on('click', '.newPost', function() {
        $('#newPost').modal('show');
    });

    $("#createPost").click(function() {
    	var token = $('input[name=_token]').val();
    	console.log(token);
    	console.log($('#title').val());
    	console.log($('#description').val());
    	console.log($('#content').val());
    	console.log($('#type').val());
        $.ajax({
            type: 'post',
            url: '/profile/create/post',
            data: {
                '_token': $('input[name=_token]').val(),
                'title': $('#title').val(),
                'description': $('#description').val(),
                'content': $('#content').val(),
                'type': $('#type').val(),
                'view': 0,
            },
            
            success: function(data) {
                if ((data.errors)){
                	console.log('Cập nhật thất bại');
                }
                else {
                	console.log("Cập nhật thành công");
                	console.log(data);
                    //$('#table').append("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.name + "</td><td>" + data.price + "</td><td>" + data.quantity + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.name + "' data-price='" + data.price + "' data-quantity='" + data.quantity + "'> Edit</button> <button class='detail-modal btn btn-primary' data-id='" + data.id + "' data-name='" + data.name + "' data-price='" + data.price + "' data-quantity='" + data.quantity + "'> Show</button><button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name='" + data.name + "' data-price='" + data.price + "'data-quantity='" + data.quantity + "'> Delete</button></td></tr>");
                }
            },

        });
    });
});
