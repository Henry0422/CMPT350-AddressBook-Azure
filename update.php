<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Azure Online Contact</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
  
  </head>
<!-- NAVBAR
================================================== -->
  <body>
    
    <?php include_once("header.php");?>

    <div class="container">

      <!-- Three columns of text below the carousel -->
      <div class="row">
		<?php
			$server = "tcp:gpntf5hrgo.database.windows.net,1433";
            $user = "SQLAdmin";
            $pwd = "henry0422!";
            $db = "Assignment2";
            try{
                $conn = new PDO( "sqlsrv:Server= $server ; Database = $db ", $user, $pwd);
                $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
                //echo "Connection successfully</br>";
            }
            catch(Exception $e){
                die("Connection failed: ".print_r($e));
            }
			
			if($_POST['contact_id'] == ""){
                echo "<div class='alert alert-danger' role='alert'>403 Forbidden<br>
                    You are not able to access update.php directly</br>
                    Automatically redirect to home page in 5 seconds</div>
                    <a href='home.php' class='alert-link'>Go Home.</a>";
            }

            else{
                try{
                    $sql = "Update AddressBook 
                        SET firstname = '".$_POST['fname']."',
                            lastname = '".$_POST['lname']."',
                            company = '".$_POST['company']."',
                            phone = '".$_POST['phone']."',
                            email = '".$_POST['email']."',
                            url = '".$_POST['url']."',
                            address = '".$_POST['address']."',";

                    if(!empty($_POST["birthday"])){
                        $sql .= "birthday = '".$_POST['birthday']."',";
                    }

                    $sql .= "add_date = '".$_POST['add_date']."',
                                note ='".$_POST["note"]."'
                        WHERE id=".$_POST['contact_id'];
                        $conn->query($sql);
                    
                        echo "<div class='alert alert-success' role='alert'><h1>Contact ".$_POST['fname']." ".$_POST['lname']." has been updated</h1></br>You are being redirected
                              <a href='home.php' class='alert-link'>Home.</a>
                            </div>";
                }

                catch(PDOException $e){
                    echo "<div class='alert alert-danger' role='alert'>Error updating contact :".$e->getMessage()."
                            </div><a href='home.php' class='alert-link'>Go Home.</a>";
                }
            }


			header("Refresh: 5; url=home.php");
		 ?> 
        
      </div><!-- /.row -->


      


      <!-- FOOTER -->
      <footer>
       
      </footer>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>