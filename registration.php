<?php
//session_start();
//header('location:login.php');
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
//mysqli_select_db($conn, 'sessionpractical');
/*echo "<pre>";
print_r($_POST);
die();*/

$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$password = crypt($_POST['password']);
$city = $_POST['city'];
$state = $_POST['state'];
$pin = $_POST['pin'];


/*$sql = "SELECT * FROM globaleratable WHERE name='".$name."' AND email='".$email."' AND mobile='".$mobile."' AND password='".$password."' AND city='".$city."' AND state='".$state."' AND pin='".$pin."' ";
//echo $sql;
//die();
$result = mysqli_query($conn, $sql);
//print_r(mysqli_fetch_assoc($result));
//die();

$num = mysqli_num_rows($result);
echo $num;
die();

if($num == 1){
	echo "duplicate data";
}else{
*/
	if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['mobile']) && isset($_POST['password']) && isset($_POST['city']) && isset($_POST['state']) && isset($_POST['pin']))
	{
	$query = "INSERT INTO globaleratable (name,email,mobile,password,city,state,pin) VALUES('$name','$email','$mobile','$password','$city','$state','$pin' ) "; 

	if($result = mysqli_query($conn,$query)){
			exit(mysqli_error());
		}else{
			echo "1 record added";
		}
	}
//}




?>