<!DOCTYPE html>
<html>
	<head>
		<title>Shopping Cart</title>
		<meta charset="UTF-8">
		
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

		<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.5.1.min.js"></script>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>

        <script type="text/javascript">
		
   
		   function change_content(link_name) {
				url = "http://localhost/mbctest/assets/cats/" + link_name;
				$('#selectedTarget').load(url);
		   }
		   
		    function get_new_cart() {
				
				<?php 
				
				$contents = 6;
								
				?>
				
				var contents = <?php echo $contents;?>
				
				return contents;



		   
		   }
		   
		   
		   function update_cart() {
					
				    document.getElementById("fish").innerHTML = get_new_cart();
		   }

		   
        </script> 		

	
	</head>

	<body>
		
		<nav class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
				<a class="navbar-brand" href="cats6.html">Home</a>
    
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="mylinks" name="number.html"><a>Number</a></li>
						<li class="mylinks" name="algebra2.html"><a>Algebra</a></li>	
						<li class="mylinks" name="shape.html"><a>Shape and Space</a></li>
						<li class="mylinks" name="data.html"><a>Data</a></li>		
							
					</ul>
				</div>
			
			</div>
		
		</nav>
		


		<div class="container text-left">
			<h4>Cart</h4>

		
			<div class="col-md-7 col-sm-12 text-left">
			
				<ul>
					<li class="row list-inline columnCaptions">
						<span>QTY</span>
						<span>ITEM</span>
						<span>Price</span>
					</li>
					
					
					
					<div id="cart">
						<?php $contents = $this->cart->contents();?>


						<?php foreach ($contents as $item): ?> 
						<li class="row">
							<span class="quantity"> <?php echo $item['qty']; ?> </span>
							<span class="itemName"> <?php echo $item['name']; ?></span>
							<span class="popbtn"><a class="arrow"></a></span>
							<span class="price"><?php echo $item['price']; ?></span>
						</li>
						<?php endforeach; ?>
					
					</div>


				</ul>
			</div>

		</div>		
		

	
	

	<div id="selectedTarget">
	</div>

		
		
		
	</body>
</html>


<div id="products">
	<p>Products</p>
	<?php foreach ($cart_view as $product): ?>
	<?php echo form_open('ctest/add_or_update'); ?>
	<div> <?php echo $product->name; ?> </div>
	<div> <?php echo $product->price; ?> </div>


	<?php echo form_hidden('id', $product->id); ?>
	
	<div class="add_item"></div>
	
	<div class="add_item">CART</div>
	
	<?php echo form_submit('action', 'Add to Cart'); ?>
	
	<?php echo form_close(); ?>

	<?php endforeach; ?>

	<a href='ctest/destroy'>Empty Cart</a>

</div>

	<script>
	
			  
			$('.mylinks').click(function () {
				var link_name = $(this).attr('name');
				change_content(link_name);
			});
	
			$('.add_item').click(function () {
			
				update_cart();
			});
	
	</script>
	
