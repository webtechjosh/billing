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
		            	if(retData['msg'] == "ok") {
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
	     	var otp     = $('#resetotp').val();
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


	$("#newregistration").on('submit', function(e){
	     e.preventDefault();

	     var regData = $("#newregistration").serializeArray();

		      $.ajax({
		            url: baseURL+'Common/register',
		            type: 'POST',
		            data: regData,
		            success: function (data) {
		            	var retData = JSON.parse(data);
		            	if(retData['erromail'] == "ok") {
		            		$('#myModal2').modal('hide');
		            		$('#myModal5').modal('show');
		            	} else {
		            		$('#regerror').text('Email Exits with Us');
		            	}
		            }
			});
	  });



	$("#regotpverify").on('submit', function(e){
	     e.preventDefault();
	     var otp = $("#regotpvalid").val();
	     var regData = $("#newregistration").serializeArray();
		      $.ajax({
		            url: baseURL+'Common/registerwithopt',
		            type: 'POST',
		            data: {regData, otp},
		            success: function (data) {
		            	var retData = JSON.parse(data);
		            	console.log(retData);
		            	if(retData['msg'] == "ok") {
		            		$('#myModal5').modal('hide');
		            		window.location.reload();
		            	} else {
		            		$('#regotperror').text('Unable to Register Now');
		            	}
		            	if(retData['msg'] == "invalid"){
		            	    $('#regotperror').text('Invalid OTP');
		            	}
		            }
			});
	  });




});

 