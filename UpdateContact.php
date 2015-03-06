<!DOCTYPE html>

<html>
	<head>
	</head>
	<body>
		<?php
			$servername="lovett.usask.ca";
		    $username="cmpt350_roh919";
		    $password="npig97rako";
			$dbname="cmpt350_roh919";
			
		    $conn = new mysqli($servername, $username, $password, $dbname);

		    if($conn->connect_error)
				die("Connection failed".$conn->connect_error);
		    else
				echo "Connection successfully</br>";
				
			$sql = "UPDATE AddressBook 
					SET firstname = '".$_POST['fname']."',
						lastname = '".$_POST['lname']."',
						company = '".$_POST['company']."',
						phone = '".$_POST['phone']."',
						email = '".$_POST['email']."',
						url = '".$_POST['url']."',
						address = '".$_POST['address']."',
						birthday = '".$_POST['birthday']."',
						add_date = '".$_POST['add_date']."'	
					WHERE id=".$_POST['contact_id'];
			
			if($conn->query($sql)== TRUE)
				echo "Record Update successfully";
			else
				echo "Error updating record: " .$conn->error;
		 ?> 

	</body>
</html>