<?php
session_start();
if(isset($_SESSION["email"])){

?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <h1>Hello</h1>
</body>
</html>

<?php
}else{
    print_r("");
    exit();
}
?>