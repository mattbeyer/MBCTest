<?php

class Ctest_model extends CI_Model {


	
	function get_products_by_cat_id($cat_id) {
	
	$this->load->database();
	$query = $this->db->query('SELECT * FROM products WHERE cat_id =' . $cat_id);
	

	
	$results = [];
	
	if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				$name = $row->name;
				$id = $row->id;
				$results[] = array(
					'name' => $name,
					'id' => $id
				); 
			  

			}
		}
	

	return $results;
	
	}

	function get_product_by_item_id($item_id) {
	
	$this->load->database();
	$query = $this->db->query('SELECT * FROM products WHERE id =' . $item_id);

	
	$result = [];
	
	if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				$description = $row->description;
				$img_url = $row->img_url;
				$id = $row->id;
				$result[] = array(
					'description' => $description,
					'img_url' => $img_url,
					'id' => $id
				); 
			  

			}
		}
	

	return $result[0];
	
	}	
	
	
}

?>