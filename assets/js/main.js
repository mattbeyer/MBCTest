$(document).on('submit', 'form.ajax', function(event) {

		event.preventDefault();
		var that = $(this),
		url = that.attr('action'),
		type = that.attr('method'),

		data = {};
	
		that.find('[name]').each(function(index, value) {
	
			var that = $(this),
				name = that.attr('name'),
				value = that.val();
				
			data[name] = value;
		
		});
	
		console.log(data);

		$.ajax({
			url: url,
			type: type,
			data: data,
			success: function(response) {

				$('#myContainer').load('/mbctest/index.php/ctest/cart');
			}
		});

	
	return false; 

});  


$(document).on('submit', 'form.add_to_cart', function(event) {

		event.preventDefault();
		var that = $(this),
		url = that.attr('action'),
		type = that.attr('method'),

		data = {};
	
		that.find('[name]').each(function(index, value) {
	
			var that = $(this),
				name = that.attr('name'),
				value = that.val();
				
			data[name] = value;
		
		});
	
		console.log(data);

		$.ajax({
			url: url,
			type: type,
			data: data,
			success: function(response) {

				//$('#myCart').load('/mbctest/index.php/ctest/cart');
			}
		});

	
	return false; 

}); 

$(document).on('click', 'button.checkout', function(event) {

	$('#myContainer').load('/mbctest/index.php/ctest/checkout');

});  
