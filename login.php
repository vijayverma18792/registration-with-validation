<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="bootstrap.css">
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<h2> Sign In Form </h2>
					<form action="registration.php" id="contact_form" method="post" name="myform" onsubmit="return valid()">
						<div class="form-group">
							<label> Name </label>
							<input type="text" name="name" id="name" class="form-control">
						</div>
						<div class="form-group">
							<label> Email </label>
							<input type="email" name="email" id="email" class="form-control">
						</div>
						<div class="form-group">
							<label> Mobile Number </label>
							<input type="text" name="mobile" id="phone" class="form-control">
						</div>
						<div class="form-group">
							<label> Password </label>
							<input type="password" name="password" id="pass" class="form-control">
						</div>
						<div class="form-group">
							<label> City </label>
							<input type="text" name="city" class="form-control">
						</div>
						<div class="form-group">
							<label> State </label>
							<input type="text" name="state" class="form-control">
						</div>
						<div class="form-group">
							<label> Pin Code </label>
							<input type="text" name="pin" id="pin"class="form-control">
						</div>
						<button type="submit" class="btn btn-primary">SUBMIT</button>

					</form>
				</div>
			</div>
		</div>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

		<?php 
	//if(isset($_POST['readrecords'])){

			$servername = "localhost";
			$username = "root";
			$password = "root";
			$dbname = "globalera";
			//create connection
			$conn = mysqli_connect($servername, $username, $password, $dbname);
			//check connection
			if(!$conn){
				echo "conneciton failed".mysqli_connect_error();
			}
			echo "<br>";
			echo "<br>";

			echo  '<table class="table table-bordered table-striped ">
						<tr class="bg-dark text-white">
							<th>No.</th>
							<th>Name</th>
							<th>Email Address</th>
							<th>Mobile Number </th>
							<th>Password </th>
							<th>city </th>
							<th>state </th>
							<th>pin </th> 
							<th>Delete Action</th>
						</tr>'; 

				$displayquery = " SELECT * FROM `globaleratable` "; 
				$result = mysqli_query($conn,$displayquery);

				if(mysqli_num_rows($result) > 0){

					$number = 1;
					while ($row = mysqli_fetch_array($result)) {
						
						$data .= '<tr>  
							<td>'.$number.'</td>
							<td>'.$row['name'].'</td>
							<td>'.$row['email'].'</td>
							<td>'.$row['mobile'].'</td>
							<td>'.$row['password'].'</td>
							<td>'.$row['city'].'</td>
							<td>'.$row['state'].'</td>
							<td>'.$row['pin'].'</td>
							
							<td>
								<button onclick="DeleteUser('.$row['id'].')" class="btn btn-danger">Delete</button>
							</td>
			    		</tr>';
			    		$number++;

					}
				} 
				 $data .= '</table>';
			    	echo $data;
//}
		?>
		
 
		<script type="text/javascript">


			function valid()
			{
			var pin_code=document.getElementById("pin");
			var user_mobile=document.getElementById("phone");
			var user_id=document.getElementById("email");
			var name=document.myform.name.value;  
			var password=document.myform.password.value;
			var pat1=/^\d{6}$/;
			var pattern=/^\d{10}$/;
			var filter=/^([a-z A-Z 0-9 _\.\-])+\@(([a-z A-Z 0-9\-])+\.)+([a-z A-z 0-9]{3,3})+$/;

			var nameval = document.getElementById("name");
			var pass = document.getElementById("pass");

			var str = $("#name").val();
			if( str.indexOf(" ") !== -1 )
			{
			    alert("space is not allow");
			    return false;
			}
		    if(nameval.value.length <= 10 && nameval.value.length >= 3){
		    }
		    else{
		        alert("name length should be 3-10 characters");
		        return false;
		    }
		    if(pass.value.length < 8){  
				  alert("Password must be at least 8 characters long.");  
				  return false; 
			}
			if(!filter.test(user_id.value))
			{
			alert("Email id should be abc@gmail.com format");
			user_id.focus();
			return false;
			}
			if(!pattern.test(user_mobile.value))
			{
			alert("mobile number should be 10 digit");
			user_mobile.focus();
			return false;
			}
			if(!pat1.test(pin_code.value))
			{
			alert("Pin code should be 6 digits ");
			pin_code.focus();
			return false;
			}
			}


			function DeleteUser(deleteid){
		      var conf = confirm("are you sure you want to delete");
		      if(conf == true){
		        $.ajax({
		          url : "delete.php",
		          type : "post",
		          data : {deleteid : deleteid},
		          success : function(data, status){
		            //readRecords();
		          }
		        });
		      }

		    }

		</script>
	</body>
</html>
