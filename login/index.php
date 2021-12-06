<!DOCTYPE html>
<html>
<head>
	<title>Iniciar sesion</title>
	<link rel="stylesheet" type="text/css" href="main.css" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
	<link rel="icon" type="image/png" href="../iconoIE.png">
</head>
<body>
     <form action="login.php" method="post" class="container-login100">
     	<h2>Iniciar sesion</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

		 <div class="form1" id = "form1">
		 <i class="icon" data-feather="mail"></i>
     	<input class="input100" type="text" name="email" placeholder="Email" id="emailxd" onchange="validation()">
		 <span id="text"></span>
		 </div>
		 <div class="form1">
		 <i class="icon" data-feather="lock"></i>
     	<input class="input100" type="password" name="pass" placeholder="Contraseña"><br>
		 </div>
		 <div class = "form2" style="width:158px;">
			 
     	<button type="submit">Iniciar sesion</button>
		 </div>
		 <div class = "form2">
		 <br>
		 ¿Aun no tienes tu cuenta?&nbsp;
		 <a style="color:#13E02C;" href = "../regis/mainregis.php">
		 ¡Registrate!
		 </a>
		 </div>
     </form>

</body>
<script src = "https://unpkg.com/feather-icons"></script>
    <script>
      feather.replace()
    </script>
<script type="text/javascript">
function validation(){
	var form = document.getElementById("form1");
	var email = document.getElementById("emailxd").value;
	var text = document.getElementById("text");
	var pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

	if(email.match(pattern))
	{
		form.classList.add("valido");
		form.classList.remove("invalido");
		text.innerHTML = "Tu Email es valido";
		text.style.color = "#00ff00";
	}
	else
	{
		form.classList.remove("valido");
		form.classList.add("invalido");
		text.innerHTML = "Tu Email no es valido";
		text.style.color = "#ff0000";
	}

	if (email == ""){
		form.classList.remove("valido");
		form.classList.remove("invalido");
		text.innerHTML = "";
		text.style.color = "#ff0000";
	}

}
		 </script>
</html>