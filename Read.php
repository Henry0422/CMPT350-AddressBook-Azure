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
				echo "Connection successfully";
				
			$id=$_GET['GuestID'];
			$sql = "SELECT * FROM HotelGuest1 WHERE id=".$id;
			$result = $conn->query($sql);
			
			if($result->num_rows > 0){
				$row = $result->fetch_assoc();
				echo "<table>
					<tr>
						<td>ID:</td>
						<td>".$row["id"]."</td>
					</tr>
					<tr>
						<td>Name:</td>
						<td>".$row["firstname"]." ".$row["lastname"]."</td>
					</tr>
					<tr>
						<td>Credit Card info:</td>
						<td>".$row["CreditCard"]."</td>
					</tr>
					<tr>
						<td>Check out Day:</td>
						<td>".$row["CheckoutDay"]."</td>
					</tr>
				</table>";
			}
			else{
				echo "<br/>0 result";
			}
		 ?> 
	</body>
</html>