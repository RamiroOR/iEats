<?php
include('./php/conexion.php');
session_start();
if (isset($_SESSION['carrito'])) {
    if (isset($_GET['id_producto'])) {
        $arreglo = $_SESSION['carrito'];
        $encontro = false;
        $numero = 0;
        for ($i = 0; $i < count($arreglo); $i++) {
            if ($arreglo[$i]['id'] == $_GET['id_producto']) {
                $encontro = true;
                $numero = $i;
            }
        }
        if ($encontro == true) {
            $arreglo[$numero]['cantidad'] = $arreglo[$numero]['cantidad'] + 1;
            $_SESSION['carrito'] = $arreglo;
        } else {
            $nombre = "";
            $precio = "";
            $imagen = "";
            $res = $conexion->query('SELECT * FROM productos where id_producto =' . $_GET['id_producto']) or die($conexion->error);
            $fila = mysqli_fetch_row($res);
            $nombre = $fila['1'];
            $precio = $fila['2'];
            $imagen = $fila['4'];
            $arregloNuevo = array(
                'id' => $_GET['id_producto'],
                'nombre' => $nombre,
                'precio' => $precio,
                'imagen' => $imagen,
                'cantidad' => 1
            );
            array_push($arreglo, $arregloNuevo);
            $_SESSION['carrito'] = $arreglo;
        }
    }
} else {
    if (isset($_GET['id_producto'])) {
        $nombre = "";
        $precio = "";
        $imagen = "";
        $res = $conexion->query('SELECT * FROM productos where id_producto =' . $_GET['id_producto']) or die($conexion->error);
        $fila = mysqli_fetch_row($res);
        $nombre = $fila['1'];
        $precio = $fila['2'];
        $imagen = $fila['4'];
        $arreglo[] = array(
            'id' => $_GET['id_producto'],
            'nombre' => $nombre,
            'precio' => $precio,
            'imagen' => $imagen,
            'cantidad' => 1
        );
        $_SESSION['carrito'] = $arreglo;
    }
}
?>

<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>iEats - Menu</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/iconoIE.png" />
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <link href='./css/styleCart.css' rel='stylesheet'>
</head>

<body oncontextmenu='return false' class='snippet-body'>
    <div class="card">
        <div class="row">
            <div class="col-md-8 cart">
                <div class="title">
                    <div class="row">
                        <div class="col">
                            <h4><b>Tu carrito</b></h4>
                        </div>
                    </div>
                </div>
                <?php
                $total = 0;
                if (isset($_SESSION['carrito'])) {
                    $arregloCarrito = $_SESSION['carrito'];
                    for ($i = 0; $i < count($arregloCarrito); $i++) {
                        $total = $total + ($arregloCarrito[$i]['precio'] * $arregloCarrito[$i]['cantidad'])
                ?>
                <div class="row border-top border-bottom">
                    <div class="row main align-items-center">
                        <div class="col-2"><img class="img-fluid"
                                src="./assets/productoImagenes/<?php echo $arregloCarrito[$i]['imagen']; ?>">
                        </div>
                        <div class="col">
                            <div class="row text-muted"><?php echo $arregloCarrito[$i]['nombre']; ?></div>
                        </div>
                        <div class="col colInput"> 
                        <button class="js-btn-minus btnIncrementar" type="button">&minus;</button>
                        <input type="text" class="form-control text-center txtCantidad" data-precio="<?php echo $arregloCarrito[$i]['precio']; ?>" data-id="<?php echo $arregloCarrito[$i]['id']; ?>" value="<?php echo $arregloCarrito[$i]['cantidad']; ?>" placeholder="" aria-describedby="button-addon1">
                        <button class="js-btn-plus btnIncrementar" type="button">&plus;</button>
                        </div>
                        <div class="col cant<?php echo $arregloCarrito[$i]['id']; ?>">
                            $<?php echo $arregloCarrito[$i]['precio'] * $arregloCarrito[$i]['cantidad']; ?>
                            
                        </div>

                        <button class="close btnEliminar" data-id="<?php echo $arregloCarrito[$i]['id'] ?>">&#10005;</button>

                    </div>
                </div>
                <?php }
                } ?>

                <div class="back-to-shop"><a href="indexUser.php">&leftarrow;</a><span class="text-muted">Seguir comprando</span></div>
            </div>
            <div class="col-md-4 summary">
                <div>
                    <h5><b>Summary</b></h5>
                </div>
                <hr>
                <div class="row">
                    <div class="col" style="padding-left:0;"><?php echo count($arregloCarrito) ?> Productos</div>
                    <div class="col text-right">$<?php echo $total ?></div>
                </div>
                <form>
                    <p>Gastos de envio</p>
                    <div class="col text-right">$<?php echo ($total * .10) ?></div>
                </form>
                <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                    <div class="col">TOTAL</div>
                    <div class="col text-right">$<?php echo $total + ($total * .10) ?></div>
                </div> <button class="btn">Pagar ahora</button>
            </div>
        </div>
    </div>
    <script src="js/main.js"></script>
    <script>
    $(document).ready(function() {
        $(".btnEliminar").click(function(event) {
            event.preventDefault();
            var id = $(this).data('id');
            var boton = $(this);
            $.ajax({
                method: 'POST',
                url: 'php/eliminarCarrito.php',
                data: {
                    id: id
                }
            }).done(function(respuesta) {
                boton.parent('div').parent('div').remove();
            });
        });

        $(".txtCantidad").keyup(function() {
            var cantidad = $(this).val();
            var precio = $(this).data('precio');
            var id = $(this).data('id');
            var mult = parseFloat(cantidad)*parseFloat(precio);
            $(".cant"+id).text(mult);
            incrementar(cantidad, precio, id);
        });

        $(".btnIncrementar").click(function() {
            var precio = $(this).parent('div').parent('div').find('input').data('precio');
            var id = $(this).parent('div').parent('div').find('input').data('id');
            var cantidad = $(this).parent('div').parent('div').find('input').val();
            incrementar(cantidad, precio, id);
        });

        function incrementar(cantidad, precio, id) {
            var mult = parseFloat(cantidad) * parseFloat(precio);
            $(".cant" + id).text("$" + mult);
            $.ajax({
                method: 'POST',
                url: './php/actualizar.php',
                data: {
                    id: id,
                    cantidad: cantidad
                }
            }).done(function(respuesta) {
                boton.parent('td').parent('tr').remove();
            });
        }
    });
    </script>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'>
    </script>

</body>

</html>