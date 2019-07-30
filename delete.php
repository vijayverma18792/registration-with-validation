<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "globalera";
//create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
//check connection
if(!$conn){
	echo "conneciton failed".mysqli_connect_error();
}else{
	echo "successfully connected";
}


if(isset($_POST['deleteid'])){
	$userid = $_POST['deleteid'];
	$deletequery = "delete from globaleratable where id = '$userid'";
	mysqli_query($conn,$deletequery);
}

?>