<?php
ini_set('default_charset','iso-8859-1');
$con = mysqli_connect("localhost","root","9856","petshop");

// Check connection
if (mysqli_connect_errno($con))
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
} 
/*else 
{ 
	echo "Connection was OK!\n";
}*/

function closeConection($con) 
{ 
	mysqli_close($con);
}
?>