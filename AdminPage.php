<!DOCTYPE html>
<html>
<body>

<?php
echo "<table style='border: solid 1px black;'>";
  echo "<tr>
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
		</tr>";

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
         echo "</tr>"."\n";
     } 
} 

	$servername = "tcp:gpntf5hrgo.database.windows.net,1433";
	$username = "SQLAdmin";
	$password = "henry0422!";
	$dbname = "Assignment2";

try {
     $conn = new PDO("sqlsrv:Server= $servername ; Database = $dbname ", $username, $password);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $stmt = $conn->prepare("SELECT * FROM AddressBook"); 
     $stmt->execute();

     // set the resulting array to associative
     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

     foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
         echo $v;
         echo "<a href='update.php?ContactID=".$row["id"]."'>Update</a>".
 				"<a href='DeleteContact.php?ContactID=".$row["id"].
 				"'onclick='return confirm(\"Are you sure\")'>Delete</a>";
     }
}
catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>  

</body>
</html>