<?php 
session_start();
$user = "root";
$pass = "";
$db = "testbd";
$idxd = $_SESSION['id'];

$conn = mysqli_connect("localhost", $user, $pass, $db) or die("XD");
if(isset($_POST["update"])){

	if(!empty($_POST["name"])){

		$name = $_POST['name'];
		$email = $_POST["email"] ;
		$username = $_POST["username"] ;
		$pass = $_POST["pass"] ;
        

		$query = "update clientes set name = '$name', email = '$email', username = '$username', pass = '$pass'   where id= '$idxd' "; 

		$run = mysqli_query($conn,$query) or die (mysqli_error());

        if($run){
            
            if ( $pkt < 1 OR $user_id == 0) {
                $message = 'Se ha registrado con exito!';
            
                echo "<SCRIPT> //not showing me this
                    alert('$message')
                    window.location.replace('index.php');
                </SCRIPT>";
                mysql_close();
            }
         
        }
        else{
            echo "error";   
        }
}

else{
	echo "all fileds requiered";
}
}




?>