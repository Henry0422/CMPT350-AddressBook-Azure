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
				
			$sql = "INSERT INTO AddressBook(firstname, lastname, company, phone, email, url, address, birthday, add_date)
					VALUES ('".$_POST['fname']."', '".$_POST['lname']."','".$_POST['company']."', '".$_POST['phone']."',
					'".$_POST['email']."','".$_POST['url']."', '".$_POST['address']."', '".$_POST['birthday']."', 
					'".$_POST['add_date']."')";
					
			if($conn->query($sql) == TRUE)
				echo "New address contact Create successfully: ".$sql.
				"<br/>with id:".$conn->insert_id."<br/>";
			else
				echo "Error with query: ".$sql."<br/>".$conn->error;
		 ?>
		 <a href='AdminPage.php'>
			Go to mainpage</br>
		</a>
	</body>
</html>