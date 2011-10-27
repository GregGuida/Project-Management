<?php

class Products_Test
{
	$this->load->library('unit_test');
	
	$p1 = new Products;
	
	$test1 = $p1->getProduct(1);
	$test2 = $p1->getAllProducts();
	
	$this->unit->run($test1,'is_array','GetProductTest');
	$this->unit->run($test2,'is_array','GetAllProductsTest');
	
}

?>