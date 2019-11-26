<?php
$hostname='localhost'; //local server name default localhost
$username='root';  //mysql username default is root.
$password='';       //blank if no password is set for mysql.
$database='xecsul_lojaonline';  //database name which you created
$con=mysqli_connect($hostname,$username,$password,$database);



if(! $con)
{
	echo "<javascript>alert('Connection Failed.mysqli_error()');</javascript>";
}
 
?>
