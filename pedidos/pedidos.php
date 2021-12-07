<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>iEats - Pedidos</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/iconoIE.png" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>

</head>

<body>
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <div class="col mb-5">
                    <?php 
                        session_start();
                        include ('../php/conexion.php');
                        $idCliente = $_SESSION['id'];
                        $resultado = $conexion->query("SELECT * FROM pedidos WHERE id_cliente = $idCliente") or die($conexion->error);
                        while($fila = mysqli_fetch_array($resultado)){
                    ?>
                    <div class="card h-100">
                        <!-- Restaurant image-->
                        <h5 class="fw-bolder"><?php echo $fila['id_pedido']; ?></h5>
                        <!-- Restaurant details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Restaurant name-->
                                <h5 class="fw-bolder"><?php echo $fila['direccion']; ?></h5>
                                <h5 class="fw-bolder"><?php echo $fila['paymentStatus']; ?></h5>
                                <h5 class="fw-bolder"><?php echo $fila['arriveStatus']; ?></h5>
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