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
				
			$id=$_GET['ContactID'];
			$sql = "DELETE FROM AddressBook WHERE id=".$id;
			
			if($conn->query($sql) == TRUE)
				echo "Record delete Successfully</br>";
			else
				echo "Error Delete record: ".$conn->error;
		 ?> 
		 <a href='AdminPage.php'>
			Go back</br>
		</a>
	</body>
</html>