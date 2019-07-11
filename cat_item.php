<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="inc/style.css">

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

</head>

<body>


<input id="myInput" type="text" placeholder="Search..">
<br><br>

<?php
ini_set('display_errors', 1);
include 'function/api_call.php';
			

		$array_count_item = count($arr['items']);		
//echo "<a href='cat_item.php?cat_id=".$cat_id."&next=20'>next</a>";


echo "<br>Total: ";
echo $array_count_item;
echo "<br>";
echo "<br>Total Pages: ";
echo $arr['totalPages'];
echo "<br>";
echo "<br>";
?>

<table>
  <thead>
  <tr>
  
    <th>ID</th>
    <th>name</th>
    <th>pic</th>
    <th>stock</th>
  </tr>
  </thead>
  <tbody id="myTable">
<?php
///////////////////// get category items by return array from api call/////////////////////////////
for($i = 0; $i < $array_count_item ; $i++) {
	echo "<tr>";
	$ids = $arr['items'][$i]['itemId'];
	echo "<td>".$ids."</td>";
	echo "<td><a href='display_item.php?case=display_item&ids=".$ids."'>".$arr['items'][$i]['name']."</a></td>";
$img = $arr['items'][$i]['thumbnailImage'];
	echo "<td><img src=".$img."></td>";	
	echo "<td>".$arr['items'][$i]['stock']."</td>";
	echo "</tr>";
}
///////////////////// get category items by return array from api call/////////////////////////////			
?>
  </tbody>
</table>

</body>
