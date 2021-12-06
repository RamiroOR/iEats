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
		$cliente = $_POST["cliente"] ;

		$query = "insert into clientes(name,email,username,cliente,pass) values('$name', '$email', '$username', '$cliente', '$pass')";

		$run = mysqli_query($conn,$query) or die (mysqli_error());

        if($run){
            $alert = '<script>alert("Se ha registrado con exito!")</script>';
			echo $alert;

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