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
			$servername="lovett.usask.ca";
		    $username="cmpt350_roh919";
		    $password="npig97rako";
			$dbname="cmpt350_roh919";
			
		    $conn = new mysqli($servername, $username, $password, $dbname);

		    if($conn->connect_error)
				die("Connection failed".$conn->connect_error);
		    else
				echo "Connection successfully";
				
				
		    $id=$_GET['ContactID'];
			$sql = "SELECT * FROM AddressBook";
			$result = $conn->query($sql);
		
			if($result->num_rows >0){
				while($row = $result->fetch_assoc()){
					echo "<tr>
						<td>".$row["id"]."</td>
						<td>".$row["firstname"]." </td>
						<td>".$row["lastname"]."</td>
						<td>".$row["company"]."</td>
						<td>".$row["phone"]."</td>
						<td>".$row["email"]."</td>
						<td>".$row["url"]."</td>
						<td>".$row["address"]."</td>
						<td>".$row["birthday"]."</td>
						<td>".$row["add_date"]."</td>
						<td>".$row["note"]."</td>
						<td>
							<a href='update.php?ContactID=".$row["id"]."'>
								Update
							</a>
								<a href='DeleteContact.php?ContactID=".$row["id"]."'
								onclick='return confirm(\"Are you sure\")'>
								Delete
							</a>
						</td>
					</tr>";
				}
			
			}
			else{
				echo "0 result";
			}
				
		 ?>
		 </table>
	</body>
</html>