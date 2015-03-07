<!DOCTYPE html>

<html>
	<head>
	</head>
	<body>
		<a href='add.php'>
			Add New Contact</br>
		</a>
		<?php

			$server = "tcp:gpntf5hrgo.database.windows.net,1433";
			$user = "SQLAdmin";
			$pwd = "henry0422!";
			$db = "Assignment2";
			try{
				$conn = new PDO( "sqlsrv:Server= $server ; Database = $db ", $user, $pwd);
				$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
				$stmt = $conn->prepare("SELECT * FROM AddressBook");
				$stmt->execute();
			}
			catch(Exception $e){
				die("Connection failed: ".print_r($e));
			}
			
		    //$id=$_GET['ContactID'];
		    try{
			    $sql = "SELECT * FROM AddressBook";
				$result = $conn->query($sql);
			
				}
		    }
			catch(Exception $e){
				echo $sql."<br>".$e->getMessage();
			}
				
		 ?>
	</body>
</html>