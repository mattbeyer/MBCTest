
	
			<div class="row">
				

				<div class="col-md-4">
				
					<div id="products">
						<h4>Products</h4>
						
						<?php foreach ($cart as $product): ?>

						<form action="<?php echo base_url("index.php/ctest/add_or_update")?>" method="post" class="ajax">
						
						<div> <?php echo $product->name; ?> </div>
						<div> <?php echo $product->price; ?> </div>


						<?php echo form_hidden('id', $product->id); ?>
						<input class="form_submit" type="submit" action="Submit" value="Add to Cart">
						<?php echo form_close(); ?>
						<?php endforeach; ?>
						
						<a href='ctest/destroy'>Empty Cart</a>

					</div>				
				
				</div>				

				<div class="col-md-4">
				
					<ul>

						
						
						
						<div id="cart">
							<h4>Cart</h4>	
							<?php $contents = $this->cart->contents();?>

						<li class="row list-inline columnCaptions">
							<span>QTY</span>
							<span>ITEM</span>
							<span>Price</span>
						</li>							
							

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
				
				<div id="update">not updated</div>			

			
			</div>
	