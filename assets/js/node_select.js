$(document).on('click', '.number_node', function() {

	var cat_id = $(this).attr('cat_id');
	
	$.ajax({
	  type: "POST",
	  url: "ctest/node_select",
	  data: { cat_id: cat_id}
	})
	  .success(function() {
				
		$('#myProducts').load('/mbctest/index.php/ctest/my_browsing');
	  });


	
	
});	

$(document).on('click', '.product', function() {

	var item_id = $(this).attr('item_id');

	$.ajax({
	  type: "POST",
	  url: "ctest/get_item_id",
	  data: { item_id: item_id}
	})
	
	.success(function() {
		
		$('#myPreview').load('/mbctest/index.php/ctest/load_item_view');	
	
	});


	


	
	
});	


