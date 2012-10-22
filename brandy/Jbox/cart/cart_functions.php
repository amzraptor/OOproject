<?php


class Product
{

	public $ID = '';


}

class Cart
{
 	// property declaration
    public $Inventory=array();


    // method declaration
    public function Add_to_Cart($Prod_ID) 
    {
		array_push($this->Inventory, $Prod_ID);
		print_r ($this->Inventory);
	}
}

/*
Get_ProductID()
{
	return 42512;
}

Add_to_Cart()
{}



Delete_from_Cart()
{}


Update_Cart()
{}

*/



?>