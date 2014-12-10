	$('#categories').change(function(){
	    $('#makeloading').show();
	    $('#makeframe').hide();
	        var category = $('#categories').val();
	        $.get('/brandlistbycategory/'+category,function(data){
	          	var result='<option value="">Select Brand</option>';
	          	for (var i = 0; i < data.length; i++) {
	              	result += '<option value="'+data[i].id+'">'+data[i].make+'</option>';
            	}
		        $('#make').html(result);
		        $('#make').select2();
	    		$('#makeframe').show();
		        $('#makeloading').hide();

		    });
	});

	$('#make').change(function(){
	    $('#modelloading').show();
	    $('#modelframe').hide();
	        var make = $('#make').val();
	        $.get('/modellistbybrand/'+make,function(data){
	          var result='<option value="">Select Model</option>';
	          for (var i = 0; i < data.length; i++) {
	              result += '<option value="'+data[i].id+'">'+data[i].model+'</option>';
	            }
	        $('#model').html(result);
	        $('#model').select2();
	        $('#modelloading').hide();
	    	$('#modelframe').show();
	    });
	});