<?php

class Products_Test
{
	$this->load->library('unit_test');
	$p1 = new Products;
	
	$test1 = $p1->getProduct(1);
	$test2 = $p1->getAllProducts();
	$test3 = $p1->newProduct('TestProd','TestDescription',13.37,1);
	$test4 = $p1->deleteProduct(1);
	
	$this->unit->run($test1,'is_array','Test getting product');
	$this->unit->run($test2,'is_array','Test getting all products');
	$this->unit->run($test3, true, 'Test adding product');
	$this->unit->run($test4, true, 'Test deleting product');
}

?>