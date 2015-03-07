<!DOCTYPE html>

<html>
	<head>
	</head>
	<body>
		<?php
			$server = "tcp:gpntf5hrgo.database.windows.net,1433";
			$user = "SQLAdmin";
			$pwd = "henry0422!";
			$db = "Assignment2";
			try{
				$conn = new PDO( "sqlsrv:Server= $server ; Database = $db ", $user, $pwd);
				$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
				echo "Connection successfully</br>";
			}
			catch(Exception $e){
				die("Connection failed: ".print_r($e));
			}
				
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