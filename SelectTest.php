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
                
            
            $sql = "SELECT * FROM AddressBook";
            $result = $conn->query($sql);
        
            while($row = $row = $result->fetch(PDO::FETCH_ASSOC) ){
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

                
         ?>
         </table>
    </body>
</html>