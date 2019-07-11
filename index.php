<?php
include 'function/api_call.php';
ini_set('display_errors', 1); 
header("Content-Type: text/html");
?>
<head>
<link rel="stylesheet" type="text/css" href="inc/style.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myDIV *").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
</head>
<body>



<input id="myInput" type="text" placeholder="Search..">
<br><br>
<div id='myDIV'>

<?php
///////////////////// create menu by return array from api call/////////////////////////////
foreach($arr as $row) {
       foreach($row as $level_1) {

			$str_id='';
			$str_name ='';
			$str_id = $level_1['id'];
			$str_name = $level_1['name'];
			echo "<p class='indent0'><a href=cat_item.php?case=get_menu_items&cat_id=".$str_id.">" .$str_name."</a></p>";	
						
	if (array_key_exists('children', $level_1)) {
	   
	   $children_level1 = $level_1['children'];

		  foreach($children_level1 as $children_level2) {
			  
		  
						$str_id = $children_level2['id'];
						$str_name = $children_level2['name'];
						
						echo "<p class='indent1'><a href=cat_item.php?case=get_menu_items&cat_id=".$str_id.">" .$str_name."</a></p>";
					//	 print_r($children_level2);
						
					if (array_key_exists('children', $children_level2)) {
		   
						 foreach($children_level2 as $children_level3 => $children_3_object ) {
							if (is_array($children_3_object) || is_object($children_3_object))
							{	 
								 
									 foreach($children_3_object as $children_3_arr) {

									 
												$str_id = $children_3_arr['id'];
												$str_name = $children_3_arr['name'];
												echo "<p class='indent2'><a href=cat_item.php?case=get_menu_items&cat_id=".$str_id.">" .$str_name."</p>";
									
									 }
								 
							 }
						 }
					}			
						
		   }
	   
		
	   
	}		
       }
}			  
///////////////////// create menu by calling api/////////////////////////////
?>

</div>

</body>