<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <link rel="icon" type="image/x-icon" href="../assets/iconoIE.png" />
    <title>Pedidos</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/album/">
    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet" />
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <div id="logo2">i </div><a class="navbar-brand" href="../indexUser.php" id="logo">Eats</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                </ul>
                <form class="d-flex">
                    <a class="btn btn-outline-dark" href="../cart.php" role="button">
                        <i class="bi-cart-fill me-1"></i>
                        Carrito
                        <span class="badge bg-dark text-white ms-1 rounded-pill">
                            <?php
                            session_start();
                            include('../php/conexion.php');
                            if (isset($_SESSION['carrito'])) {
                                $arreglo = $_SESSION['carrito'];
                                echo count($arreglo);
                            } else {
                                echo "0";
                            }
                            ?>
                        </span>
                    </a>
                    &nbsp; &nbsp; &nbsp;
                    <div class="dropdown">
                        <button class="btn btn-outline-dark" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $_SESSION['name']; ?>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="profile/index.php">Configuración</a>
                            <a class="dropdown-item" href="./pedidos/pedidos.php">Pedidos</a>
                            <a class="dropdown-item" href="login/logout.php">Cerrar Sesión</a>
                        </div>
                    </div>
            </div>
        </div>
    </nav>
    <!-- Header-->
    <header class="bg-dark py-5" id="header-wall">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-2 fw-bolder" id="header2">Tus pedidos</h1>
            </div>
        </div>
    </header>
    </header>

    <main>
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <?php
                    $idCliente = $_SESSION['id'];
                    $pedidoQ = $conexion->query("SELECT * FROM pedidos WHERE id_cliente = $idCliente") or die($conexion->error);
                    while ($filaPe = mysqli_fetch_array($pedidoQ)) {
                    ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                                <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em">
                                    <?php echo $filaPe['fecha'] ?>
                                </text>
                            </svg>

                            <div class="card-body">
                                <p class="card-text"><b>Direccion:</b>  <?php echo $filaPe['direccion'] ?></p>
                                <?php $total = $filaPe['total'] + $filaPe['total']*.10 ?>
                                <p class="card-text"><b>Total:</b> $<?php echo number_format($total, 2, '.', '') ?></p>
                                <?php $converted_pay = $filaPe['paymentStatus'] ? 'Pagado' : 'Pendiente' ?>
                                <p class="card-text"><b>Estado del pago:</b> <?php echo $converted_pay ?></p>
                                <?php $converted_arr = $filaPe['arriveStatus'] ? 'Entregado' : 'En proceso' ?>
                                <p class="card-text"><b>Estado de entrega:</b> <?php echo $converted_arr ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        </div>
    </main>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>