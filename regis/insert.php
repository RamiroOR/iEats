<?php 

$user = "root";
$pass = "";
$db = "testbd";

$conn = mysqli_connect("localhost", $user, $pass, $db) or die("XD");
if(isset($_POST["submit"])){

	if(!empty($_POST["name"])){

		$name = $_POST['name'];
		$email = $_POST["email"] ;
		$username = $_POST["username"] ;
		$pass = $_POST["pass"] ;

		$query = "insert into clientes(name,email,username,pass) values('$name', '$email', '$username', '$pass')";

		$run = mysqli_query($conn,$query) or die (mysqli_error($conn));

        if($run){
            $alert = '<script>alert("Se ha registrado con exito!")</script>';
			echo $alert;
			header("Location: ../indexUser.php");

        }
        else{
            echo "valio kk";
        }
}

else{
	echo "all fileds requiered";
}
}




?>