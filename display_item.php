<head>
<link rel="stylesheet" type="text/css" href="inc/style.css">
</head>
<?php
ini_set('display_errors', 1);
include 'function/api_call.php';

		$array_count_item = count($arr['items']);		
		

echo "<br>Total: ";
echo $array_count_item;
echo "<br>";

///////////////////// get products details by return array from api call/////////////////////////////
for($i = 0; $i < $array_count_item ; $i++) {
 echo $arr['items'][$i]['itemId']."<br>";
echo $arr['items'][$i]['name']."<br>";
$img = $arr['items'][$i]['largeImage'];
	echo "<img src=".$img."><br>";	
	 echo $arr['items'][$i]['categoryPath']."<br>";
	 echo $arr['items'][$i]['categoryNode']."<br>";
	 
	 $addToCartUrl = $arr['items'][$i]['addToCartUrl'];
	 echo "<a href ='".$addToCartUrl."'>Add to Cart<br>";
}

///////////////////// get products details by return array from api call/////////////////////////////	

	
?>