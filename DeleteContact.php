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
				$id=$_GET['ContactID'];
				$sql = "DELETE FROM AddressBook WHERE id=".$id;
				$conn->query($sql);
			}	

			catch(PDOException $e){
				echo $sql."<br>".$e->getMessage();
			}
		 ?> 
		 <a href='AdminPage.php'>
			Go back</br>
		</a>
	</body>
</html>