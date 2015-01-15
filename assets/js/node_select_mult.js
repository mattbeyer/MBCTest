$(document).on('click', '#number_sub', function() {

	
	$.ajax({
	  type: "POST",
	  url: "ctest/node_select",
	  data: { node: "int_sub"}
	})
	  .done(function() {
				
		$('#myCart').load('/mbctest/index.php/ctest/load_mycart');
	  });


	
	
});	

