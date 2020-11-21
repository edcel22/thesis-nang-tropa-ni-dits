$('#sunsetContactForm').on('submit', function(e){
	e.preventDefault();

	let formdata = new FormData(document.getElementById('sunsetContactForm')),
		fullname = formdata.get('fullname'),
		phonenumber = formdata.get('phonenumber'),
		email = formdata.get('email'),
		message = formdata.get('message')
		
	
		var form = $(this).serialize()

        $.ajax({
            url: aparams.ajaxurl,
            type: 'POST',
            data: form,
            dataType: 'json',
            cache: false,
            beforeSend: function() {
            	console.log('before send')
            },
            success: function(data) {

				if (data.status == 'error') {
					console.log('error status')
				} else {
					console.log('message sent')
					$('#sunsetContactForm')[0].reset();
				}
            },
            error: function() {
                

            }
        })
        return false;
	});
