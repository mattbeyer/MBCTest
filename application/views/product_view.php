

<div>

<img src="/mbctest<?php echo $result['img_url']; ?>">

	

</div>

<div>

	<?php

	echo $result['description'];

	?>

</div>




				<form action="<?php echo base_url("index.php/ctest/add_or_update")?>" method="post" class="add_to_cart">
				
					<?php echo form_hidden('id', $result['id']); ?>
					
					<input class="form_submit" type="submit" action="Submit" value="Add to Cart">
				</form>
				

