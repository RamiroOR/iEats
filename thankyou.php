<?php
session_start();
include 'php/conexion.php';
$arregloCarrito = $_SESSION['carrito'];
$idCliente = $_SESSION['id'];
$total = 0;
for ($i = 0; $i < count($arregloCarrito); $i++) {
    $total = $total + $arregloCarrito[$i]['precio'] * $arregloCarrito[$i]['cantidad'];
}
$direccion = $_REQUEST["direccion"];
$fecha = date('Y-m-d h:m:s');
$conexion -> query("INSERT INTO pedidos (direccion,fecha,total,paymentStatus,arriveStatus,id_cliente) values ('$direccion','$fecha',$total,'0','0',$idCliente)") or die($conexion->error);
$id_pedido = $conexion->insert_id;
for ($i = 0; $i < count($arregloCarrito); $i++) {
    $conexion -> query("INSERT INTO producto_pedido (id_pedido,id_producto,id_restaurante,cantidad,precio,subtotal)
        values(
        $id_pedido,
        ".$arregloCarrito[$i]['id'].",
        ".$arregloCarrito[$i]['id_restaurante'].",
        ".$arregloCarrito[$i]['cantidad'].",
        ".$arregloCarrito[$i]['precio'].",
        ".$arregloCarrito[$i]['cantidad'] * $arregloCarrito[$i]['precio']."
        ) ") or die($conexion->error);
}
    unset($_SESSION['carrito']);
?>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400|Montserrat:700' rel='stylesheet' type='text/css'>
    <style>
        @import url(//cdnjs.cloudflare.com/ajax/libs/normalize/3.0.1/normalize.min.css);
        @import url(//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css);
    </style>
    <link rel="stylesheet" href="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/default_thank_you.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/html5shiv.js"></script>
</head>

<body>
    <header class="site-header" id="header">
        <h1 class="site-header__title" data-lead-id="site-header-title">THANK YOU!</h1>
    </header>

    <div class="main-content">
        <i class="fa fa-check main-content__checkmark" id="checkmark"></i>
        <p class="main-content__body" data-lead-id="main-content-body">Thanks a bunch for filling that out. It means a
            lot to us, just like you do! We really appreciate you giving us a moment of your time today. Thanks for
            being you.</p>
    </div>

    <footer class="site-footer" id="footer">
        <p class="site-footer__fineprint" id="fineprint">Copyright ©2014 | All Rights Reserved</p>
    </footer>
</body>

</html>