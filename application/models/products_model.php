<?php

class Products_model extends CI_Model {

	function get_products () {
	
		$results = $this->db->get('products');
		
		return $results->result();
	
	}
	
	function get_product_by_id ($id) {
	
	$product = $this->db->get_where('products', array('id' => $id))->result();
	return $product[0];
	
	}


	
}


?>