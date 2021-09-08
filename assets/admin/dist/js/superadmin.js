
	$(".approved").on('click', function(e){
		var idValue = $(this).attr('data-id');

		var trcount = $(this).attr('data-tr');
		      $.ajax({
		            url: baseURL+'Admin/approved',
		            type: 'POST',
		            data: {'id': idValue},
		            success: function (data) {
		            	var retData = JSON.parse(data);
		            	if(retData.status == 1){
		            		$('#'+trcount).remove();

/*		            		 $("#example1 tbody").empty();
		            		 $("#example1 tbody").html(retData.data);*/
		            	}

		            }
			});

	  });


	$(".pending").on('click', function(e){
		var idValue = $(this).attr('data-id');

		var trcount = $(this).attr('data-tr');
		console.log(trcount);
		      $.ajax({
		            url: baseURL+'Admin/unapproved',
		            type: 'POST',
		            data: {'id': idValue},
		            success: function (data) {
		            	var retData = JSON.parse(data);
		            	if(retData.status == 1){
		            		$('#'+trcount).remove();
/*		            		 $("#example1 tbody").empty();
		            		 $("#example1 tbody").html(retData.data);*/
		            	}

		            }
			});

	  }); 