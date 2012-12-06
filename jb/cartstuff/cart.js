$(document).ready(function() //this is to pull the backend
{
 
   $.post('cart_backend.php',{},function(data){
          //start of function
          //after reciving answer
                   
           
          $('#cart').html(data);  
      
            
            
              
           }//end of function
        );//end of $.post
        
 
 });


//the functions
var checked_items=[];
	 
function cart(id,action,qty)
{

			 
	$.post('cart_backend.php',{id:id,action:action,qty:qty},function(data)
	{
	//start of function
	//after reciving answer
	                   
	           
	$('#cart').html(data);  
	});//end of post
	    
}//end of cart

function empty_cart()
{
		//if user answers yes, action gets sent as empty
	 	var answer = confirm("Are you sure you want to empty your cart?")
	 	if (answer)
	 	{
		cart(0,"empty");
		}
	 	
	 } //end of empty_cart    
	

function chkbx_array(product_id,chkbx_id)
{
		
	if( $('#'+chkbx_id ).attr('checked') )
	{
	  checked_items.push(product_id);
	}
	else
	{
			//find product_id in checked_items and remove it
		 var aLen = ( checked_items.length   ); 
		 for ( var x = 0;x<aLen; x++ ) 
		 {
			 
			 if (checked_items[ x ]==product_id)
			 {
				 checked_items.splice(x,1);

					 
			 }
		 }// Removing all 500 items from the bigArray.
		
	}//end of else
 

}//end of chkbx_array
	
function remove_checked()
{

	var aLen = ( checked_items.length   ); 
	for ( var x = 0;x<aLen; x++ ) 
	{

		cart(checked_items[x], "remove");

	}//end of for

	var aLen = ( checked_items.length - 1 ); 
	for ( var x = aLen; checked_items[ x ]; x-- ) 
	{ // Removing all 500 items from the bigArray.
		checked_items.pop( x ); 
	}//end for


}//end of remove_checked
	
	
function add_to_cart(id)
{
			
	var aLen = ( checked_items.length - 1 ); 
	for ( var x = aLen; checked_items[ x ]; x-- ) 
	{ // Removing all 500 items from the bigArray.
	  checked_items.pop( x ); 
	}	

	cart(id,"add");
		   
			
}

function qty_update(product_id,qtybx_id,old_qty)
{
	var new_qty= $('#'+qtybx_id).val();
	if(new_qty<=0)
	{
		if(new_qty==0) //if new qty is zero, just remove it completly
		{
		cart(product_id, "remove");
		}
		if(new_qty<0) //if new qty is less than zero, set it back to what it was and Alert user
		{
			new_qty = old_qty;
			alert("Please use positive numbers");
			var value = new_qty - old_qty;
			cart(product_id, "update", value);
		}
	}
	else	//if all okay , just update
	{
		var value = new_qty - old_qty;
		cart(product_id, "update", value);
	}	
	
}

function save_cart()
{
	cart(0,"save");
}

function load_cart()
{
	cart(0,"load");
}
