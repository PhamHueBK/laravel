$(document).ready(function() {
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
  	$(document).on('click', '.editProfile', function() {
        $('#editProfile').modal('show');
    });

    $("#saveProfile").click(function() {
    	var token = $('input[name=_token]').val();
    	console.log(token);
        $.ajax({
            type: 'post',
            url: '/profile/update',
            data: {
                '_token': $('input[name=_token]').val(),
                'name': $('#name').val(),
                'email': $('#email').val(),
                'mobile': $('#mobile').val(),
                'birthday': $('#birthday').val(),
                'address': $('#address').val(),
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
