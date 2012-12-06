<?php
reset($array);
$array = (array) json_decode(base64_decode($_POST['cart_final'])); var_dump($array);
	if($array)
    	echo "array : <pre>".print_r($array,true)."</pre><br />\n"; //best way to print multi-dim array!

?>
