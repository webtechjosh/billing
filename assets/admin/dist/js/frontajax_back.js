$(document).ready(function(e) {
	$("#emaiverify").on('submit', function(e){
	     e.preventDefault();
	     	var emailV = $('#verifyemail').val();
		      $.ajax({
		            url: baseURL+'Common/emailVerificationOtp',
		            type: 'POST',
		            data: {'email': emailV},
		            success: function (data) {
		            	var retData = JSON.parse(data);
		            	console.log(retData);
		            	if(retData['msg'] == "ok") {
		            		console.log(retData['otp']);
		            		$('#myModal3').modal('hide');
		            		$('#myModal4').modal('show');
		            	} else {
		            		$('#error').text('Email NOT exits with us');
		            	}
		            }
			});
	  });


	$("#verifyotp").on('submit', function(e){
	     e.preventDefault();
	     	var newpass = $('#new_password').val();
	     	var otp     = $('#verification').val();
		      $.ajax({
		            url: baseURL+'Common/resetpassword',
		            type: 'POST',
		            data: {'newpass': newpass, 'otp': otp},
		            success: function (data) {
		            	var retData = JSON.parse(data);
		            	console.log(retData);
		            	if(retData['msg'] == "ok") {
		            		$('#myModal4').modal('hide');
		            		window.location.reload();
		            	} else {
		            		$('#opterror').text('Incorrect OTP');
		            	}
		            }
			});
	  });



});

 