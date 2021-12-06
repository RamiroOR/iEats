<?php
session_start();
?>

<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Editar perfil</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='' rel='stylesheet'>
    <link rel="icon" type="image/png" href="../assets/iconoIE.png">
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <style>
        body {
            background: linear-gradient(#21C08B, #AB88FF);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;

        }

        .form-control:focus {
            box-shadow: none;
            border-color: #BA68C8
        }

        .profile-button {
            background: linear-gradient(#21C08B, #AB88FF);
            box-shadow: none;
            border: none
        }

        .profile-button:hover {
            background: linear-gradient(#21C08B, #AB88FF);
        }

        .profile-button:focus {
            background: linear-gradient(#21C08B, #AB88FF);
            box-shadow: none
        }

        .profile-button:active {
            background: linear-gradient(#21C08B, #AB88FF);
            box-shadow: none
        }

        .back:hover {
            color: linear-gradient(#21C08B, #6c54a3);
            cursor: pointer
        }

        .labels {
            font-size: 11px
        }

        .add-experience:hover {
            background: #BA68C8;
            color: #fff;
            cursor: pointer;
            border: solid 1px #BA68C8
        }
    </style>
</head>

<body oncontextmenu='return false' class='snippet-body'>
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">
                        <?php echo $_SESSION["name"]; ?></span><span class="text-black-50"><?php echo $_SESSION["email"]; ?></span><span> </span></div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Configuración de perfil</h4>
                    </div>
                    <form action="edit.php" method="post">
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Nombre</label><input name="name" type="text" value="<?php echo $_SESSION["name"]; ?>" class="form-control" placeholder="Nombre">
                            </div>
                            <div class="col-md-12"><label class="labels">Nombre de usuario</label><input name="username" type="text" value="<?php echo $_SESSION["username"]; ?>" class="form-control" placeholder="Nombre de usuario" value=""></div>
                            <div class="col-md-12"><label class="labels">Email</label><input name="email" value="<?php echo $_SESSION["email"]; ?>" type="text" class="form-control" placeholder="Email"></div>
                            <div class="col-md-12"><label class="labels">Contraseña</label><input name="pass" value="<?php echo $_SESSION["pass"]; ?>" type="password" class="form-control" placeholder="********"></div>
                        </div>
                        <form>
                            <div class="mt-5 text-center"><button class="btn btn-primary profile-button" name="update" type="submit">Guardar cambios</button></div>
                </div>
            </div>
            <div class="col-md-4">

            </div>
        </div>
    </div>
    </div>
    </div>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js'></script>
    <script type='text/javascript' src=''></script>
    <script type='text/javascript'></script>
</body>

</html>

<?php



?>