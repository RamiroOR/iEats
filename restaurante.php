<?php
session_start();
include("./php/conexion.php");
if (isset($_GET['id_restaurante'])) {
    $resultado = $conexion->query("SELECT * FROM productos WHERE id_restaurante=" . $_GET['id_restaurante']);
    if ($resultado->num_rows > 0) {
    } else {
        header("Location index.php");
    }
} else {
    header("Location index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>iEats - Menu</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/iconoIE.png" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>

</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <div id="logo2">i </div><a class="navbar-brand" href="./indexUser.php" id="logo">Eats</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                </ul>
                <form class="d-flex">
                    <a class="btn btn-outline-dark" href="cart.php" role="button">
                        <i class="bi-cart-fill me-1"></i>
                        Carrito
                        <span class="badge bg-dark text-white ms-1 rounded-pill">
                            <?php
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

                </form>
            </div>
        </div>
    </nav>
    <!-- Header-->

    <header class="bg-dark py-5" id="header-wall">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder" id="header">Ha un paso</h1>
                <h1 class="display-2 fw-bolder" id="header2">de calmar tu hambre</h1>

            </div>
        </div>
    </header>
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <div class="col mb-5">
                    <?php
                    while ($fila = $resultado->fetch_assoc()) {
                    ?>
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?php echo $fila['nombre']; ?></h5>
                                    <!-- Product price-->
                                    <?php echo $fila['precio']; ?>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="cart.php?id_producto=<?php echo $fila['id_producto']; ?>">Añadir al
                                        carrito</a>
                                </div>
                            </div>
                        </div>
                </div>
            <?php } ?>
    </section>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>