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
			
			try{
				$sql = "INSERT INTO AddressBook(firstname, lastname, company, phone, email, url, address, birthday, add_date)
						VALUES ('".$_POST['fname']."', '".$_POST['lname']."','".$_POST['company']."', '".$_POST['phone']."',
						'".$_POST['email']."','".$_POST['url']."', '".$_POST['address']."', '".$_POST['birthday']."', 
						'".$_POST['add_date']."')";
				$conn->exec($sql);
				$last_id = $conn->lastInsertId();
				echo "New record created successfully. Last inserted ID is: ".$last_id;
				}
			catch(){
				echo $sql."<br>".$e->getMessage();
			}

		 ?>
		 <a href='AdminPage.php'>
			Go to mainpage</br>
		</a>
	</body>
</html>