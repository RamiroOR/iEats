<!DOCTYPE html>
<html lang="en">
<head>
	<title>Registro</title>
	<meta charset="UTF-8">
	<link rel="icon" type="image/png" href="../iconoIE.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.scss">
<!--===============================================================================================-->



</head>
<body style="background-color: #999999;">
	
	<div class="limiter">
	
		<div class="container-login100">
			<div class="login100-more" style="background-image: url('images/bg-01.jpg');"></div>

			<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
			
				<form class="login100-form validate-form" action="insert.php" method="post">
					<div class = "logo" id="logoo"> 
          		<a href= "../main/mainlogin1.php"><h1> i<span>Eats</span> </h1> </a>
       		 </div>
					<span class="login100-form-title p-b-59">
						Registrarse
					</span>

					<div class="wrap-input100 validate-input" data-validate="Se necesita un nombre">
						<span class="label-input100">
							Nombre completo</span>
						<input class="input100" type="text" name="name" placeholder="Nombre...">
						<span class="focus-input100"></span>
					</div>
					<div class= "a">
					<div class="wrap-input100 validate-input" data-validate = "Los correos validos: ex@abc.xyz">
						<span class="label-input100">
							Email</span>
						<input class="input100" type="text" name="email" placeholder="Direccion de correo..." onkeyup="return forzar(this);">
						<span class="focus-input100"></span>
					</div>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Nombre de usuario requerido">
						<span class="label-input100">
							Nombre de usuario</span>
						<input class="input100" type="text" name="username" placeholder="Usuario...">
						<span class="focus-input100"></span>
					</div>
					<!--
					<div class="wrap-input100 validate-input" data-validate="Nombre de usuario requerido">
						<span class="label-input100">
							Tipo de usuario</span>
							<br>
							<div class = "panel">
						<select name = "tipo" id="ddselect" onchange="selected();">
							<option>Seleccione un tipo</option>
							<option value = "Cliente">Cliente</option>
							<option value = "Negocio">Negocio</option>
							<option value = "Repartidor">Repartidor</option>
						</select>
							</div>
                            <input type="text" id = "txtvalue" name="cliente">
                         </input>
					</div>
					-->

					<div class="wrap-input100 validate-input" data-validate = "Contrase??a requerida">
						<span class="label-input100">
							Contrase??a</span>
						<input class="input100" type="text" name="pass" placeholder="*************">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Repetir la contrase??a es requerido">
						<span class="label-input100">
							Repita la contrase??a</span>
						<input class="input100" type="text" name="repeat-pass" placeholder="*************">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-m w-full p-b-33">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								<span class="txt1">
									Estoy de acuerdo
									<a href="#" class="txt2 hov1">
										con los terminos
									</a>
								</span>
							</label>
						</div>

						
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" name="submit" class="login100-form-btn">
								Registrarse
							</button>
						</div>
						<a href="../login/index.php" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
								Iniciar sesion
							<i class="fa fa-long-arrow-right m-l-5"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<script>
		function selected()
		{
			var d = document.getElementById("ddselect");
            $("#select").val(d);
			var displaytext=d.options[d.selectedIndex].text;
			document.getElementById("txtvalue").value=displaytext;
		}
		function forzar(strInput)
		{
			strInput.value=strInput.value.toLowerCase();
		}
		</script>


<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>

</html>


