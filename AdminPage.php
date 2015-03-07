<!DOCTYPE html>

<html>
	<head>
	</head>
	<body>
		<a href='add.php'>
			Add New Contact</br>
		</a>
		<table>
			<tr>
				<th>ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Company</th>
				<th>Phone No.</th>
				<th>Email</th>
				<th>URL</th>
				<th>Address</th>
				<th>Birthday</th>
				<th>Date</th>
				<th>Note</th>
			</tr>
		<?php

			class TableRows extends RecursiveIteratorIterator { 
			     function __construct($it) { 
			         parent::__construct($it, self::LEAVES_ONLY); 
			     }

			     function current() {
			         return "<td style='width: 150px; border: 1px solid black;'>" . parent::current(). "</td>";
			     }

			     function beginChildren() { 
			         echo "<tr>"; 
			     } 

			     function endChildren() { 
			         echo "</tr>" . "\n";
			     } 
			} 
			$server = "tcp:gpntf5hrgo.database.windows.net,1433";
			$user = "SQLAdmin";
			$pwd = "henry0422!";
			$db = "Assignment2";
			try{
				$conn = new PDO( "sqlsrv:Server= $server ; Database = $db ", $user, $pwd);
				$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
				$stmt = $conn->prepare("SELECT * FROM AddressBook");
				$stmt->execute();

				$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

				foreach(new TableRows(new RecursiveIteratorIterator($stmt->fetchAll())) as $k=>$v){
					echo $v;
				}
			}
			catch(PDOException $e) {
			     echo "Error: " . $e->getMessage();
			}
			$conn = null;
		 ?>
		 </table>
	</body>
</html>