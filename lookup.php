<?php

mysql_connect("127.0.0.1", "root", "root") or die(mysql_error());
mysql_select_db("district") or die(mysql_error());

$result = mysql_query("SELECT * FROM district") or die(mysql_error());  

while($row = mysql_fetch_array( $result )) {

	$json = file_get_contents('http://congress.mcommons.com/districts/lookup.json?lat='.$row['Latitude'].'&lng='.$row['Longitude']);
	$data = json_decode($json);

	$update = mysql_query("UPDATE district SET `State Upper District`='".$data->state_upper->district."' WHERE id=".$row['ID']); 
	$update = mysql_query("UPDATE district SET `State Lower District`='".$data->state_lower->district."' WHERE id=".$row['ID']); 
	$update = mysql_query("UPDATE district SET `Federal District`='".$data->federal->district."' WHERE id=".$row['ID']); 
	$update = mysql_query("UPDATE district SET `State`='".$data->federal->state."' WHERE id=".$row['ID']); 

	echo "Updated ".$row['ID']."\n";
}

?>