<?php
session_start();
if (!isset($_SESSION['carrito'])) {
    echo '<script language="javascript">alert("Tu carrito se encuentra vacio");window.location.href="cart.php"</script>';
}

$arreglo = $_SESSION['carrito'];
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Checkout example · Bootstrap v5.1</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/checkout/">
    <script src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>


    <!-- Bootstrap core CSS -->
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

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
    <!-- Custom styles for this template -->
    <link href="css/form-validation.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container">
        <main>
            <div class="py-5 text-center">
                <h2>Detalles del pedido</h2>
            </div>
            <div class="row g-5">
                <div class="col-md-5 col-lg-4 order-md-last">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-primary">Tu carrito</span>
                        <span class="badge bg-primary rounded-pill"><?php echo count($arreglo) ?></span>
                    </h4>
                    <?php
                    $total = 0;
                    for ($i = 0; $i < count($arreglo); $i++) {
                        $total = $total + ($arreglo[$i]['precio'] * $arreglo[$i]['cantidad']);
                    ?>
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0"><?php echo $arreglo[$i]['cantidad']; ?> x
                                    <?php echo $arreglo[$i]['nombre']; ?></h6>
                            </div>
                            <span
                                class="text-muted">$<?php echo number_format($arreglo[$i]['precio'], 2, '.', ''); ?></span>
                        </li>
                        <?php } ?>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (MXN)</span>
                            <strong>$ <?php echo number_format($total, 2, '.', ''); ?></strong>
                        </li>
                    </ul>
                </div>
                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3">Datos de entrega</h4>
                    <form class="needs-validation formDatos" action="thankyou.php" method="POST" novalidate>
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="address" class="form-label">Direccion</label>
                                <input type="text" class="form-control" name="direccion" required>
                                <div class="invalid-feedback">
                                    Por favor ingresa una direccion de entrega.
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="zip" class="form-label">C.P.</label>
                                <input type="text" class="form-control" id="zip" placeholder="" required>
                                <div class="invalid-feedback">
                                    Codigo postal requerido.
                                </div>
                            </div>
                        </div>
                        <hr class="my-4">
                        <h4 class="mb-3">Datos de pago</h4>
                        <div class="my-3">
                            <div class="form-check">
                                <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked
                                    required>
                                <label class="form-check-label" for="credit">Tarjeta de credito</label>
                            </div>
                            <div class="form-check">
                                <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required>
                                <label class="form-check-label" for="debit">Tarjeta de debito</label>
                            </div>
                        </div>
                        <div class="row gy-3">
                            <div class="col-md-6">
                                <label for="cc-name" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="cc-name" placeholder="" required>
                                <small class="text-muted">Nombre completo como en la tarjeta</small>
                                <div class="invalid-feedback">
                                    Nombre en tarjeta requerido
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="cc-number" class="form-label">Numero de tarjeta</label>
                                <input type="text" class="form-control" id="cc-number" placeholder="" required>
                                <div class="invalid-feedback">
                                    Numero de tarjeta requerido
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="cc-expiration" class="form-label">Fecha de exp.</label>
                                <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                                <div class="invalid-feedback">
                                    Fecha de expiracion requerido
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="cc-cvv" class="form-label">CVV</label>
                                <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                                <div class="invalid-feedback">
                                    Codigo de seguridad requerido
                                </div>
                            </div>
                        </div>
                        <hr class="my-4">
                        <button class="w-100 btn btn-primary btn-lg btnEnviar" type="submit">Pagar ahora</button>
                    </form>
                </div>
            </div>
        </main>

        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">&copy; 2017–2021 Company Name</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Privacy</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Support</a></li>
            </ul>
        </footer>
    </div>

    <script type="text/javascript">
    $('#formDatos').submit(function(ev) {
        $.ajax({
            type: $('#formDatos').attr('method'),
            url: $('#formDatos').attr('action'),
            data: $('#formDatos').serialize(),
            success: function(data) {
                alert('Datos enviados !!!');
            }
        });
        ev.preventDefault();
    });
    </script>

    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/form-validation.js"></script>
</body>

</html>