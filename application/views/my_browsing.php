<?php


foreach ($results as $result) {

	$id = $result['id'];

	
	
	echo "<div onmouseover='' style='cursor: pointer;' class='product' item_id='$id'>";
	echo $result['name'];
	echo "</div>";
	echo "<br>";
		


};	


?>
