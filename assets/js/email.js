$(document).ready(function () {
    // I Use delegate function so that the submit will still work even we append an html
    $('body').delegate('#email_sub', 'click', function (e) {
        $( ".alert" ).remove();
        var email = $('#email_input').val();
        if (!email.trim()) {
            Swal.fire(
                'Please Enter Email',
                'Please Try Again',
                'error'
            )
        }
        else {
            $.ajax({
                url: './rest/emailverifaction.php',
                type: 'POST',
                dataType: 'JSON',
				data:{email:email},
				success:function(data){
                    if (data[0].error) {
                        $( "#emailHelp" ).append( '<p class="alert alert-danger p-3">Email is not Validated</p>' );
                    }
                    else {
                         $( "#emailHelp" ).append( '<p class="alert alert-success p-3">Email is Validated</p>' );
                    }
				}

			});
        }

	});
});