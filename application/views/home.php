<!DOCTYPE html>
<html>
	<head>
		<title>Shopping Cart</title>
		<meta charset="UTF-8">
		
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>	
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>

		<script src="<?php echo base_url("assets/js/main.js");?> "></script>
		<script src="<?php echo base_url("assets/js/empty_cart.js");?> "></script>
		<script src="<?php echo base_url("assets/js/node_select.js");?> "></script>
		<script src="<?php echo base_url("assets/js/node_select_mult.js");?> "></script>

        <script type="text/javascript">
		
   
		   function change_content(link_name) {
				url = '<?php echo base_url("index.php/ctest/");?>' + link_name;
				$('#myCats').load(url);
		   }
		   
   
		   
	   
        </script> 		

	
	</head>

	<body>
		
		<nav class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
				<a class="navbar-brand" href=<?php echo base_url("index.php/ctest/")?>>Home</a>
    
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav" onmouseover="" style="cursor: pointer;">
						<li class="mylinks" name="/number"><a>Number</a></li>
						<li class="mylinks" name="/algebra"><a>Algebra</a></li>	
						<li class="mylinks" name="/shape"><a>Shape and Space</a></li>
						<li class="mylinks" name="/data"><a>Data</a></li>		
							
					</ul>
					
					<ul class="nav navbar-nav navbar-right" onmouseover="" style="cursor: pointer;" >
						<li><a class="viewCart">Cart</a>
						</li>
		
							
					</ul>					
					
				</div>
			
			</div>
		
		</nav>
		


		
		<div id="myContainer" class="container">
		
				<div id="myCats_container" class="col-md-4">
					Categories
					<br><br>
					<div id="myCats" ></div>
				</div>
				
				<div id="myProducts_container" class="col-md-4">
					My products
					<br><br>
					<div id="myProducts" ></div>
				</div>		
				
				<div id="myPreview_container" class="col-md-4">
					My Preview
					<br><br>
					<div id="myPreview" ></div>
				</div>	

		</div>
		
		<script>

			$('.mylinks').click(function () {
				var link_name = $(this).attr('name');
				change_content(link_name);
			});
	

			$('.viewCart').click(function () {
				
				$('#myContainer').load('<?php echo base_url("index.php/ctest/cart");?>');

			});		
		
		
		</script>
	
	</body>
</html>