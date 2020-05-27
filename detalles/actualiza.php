<?php
session_start();
if(isset($_POST['id'])) {
    include_once "../classes/classDetalles.php";
    $detalles = new ApiDetallesAdmin;
    $id = $_POST['id'];
    $total = $detalles->get($id);
    foreach ($total["items"] as $clave => $valor) {
        $idDetalles = $valor['idDetalles'];
        $idProducto = $valor['idProducto'];
        $idUsuario = $valor['idUsuario'];
        $cantVenta = $valor['cantVenta'];
        $fechaVenta = $valor['fechaVenta'];
        $totalVenta = $valor['totalVenta'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/vnd.microsoft.icon" href="../img/favicon.ico" sizes="64x48">
    <link rel="stylesheet" href="../css/style.css">
    <title>PIA</title>
</head>

<body>
    <div class="area">
        <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
    <header>
        <h2><a href="../index.php">Games & More</a></h2>
        <?php
        if (isset($_SESSION['nombreUsuario'])) {
            $name = $_SESSION['nombreUsuario'];
            print "<span>Hola $name</span>";
            print "<span><a href='../logout.php'>Cerrar sesión</a></span>";
        }
        ?>
        <button class="hamburger">
            <img src="../img/hamburger.svg" alt="hamburger">
        </button>
        <?php
        if (isset($_SESSION['auth'])) {
            if (!empty($_SESSION['isAdmin'])) {
        ?>
                <div class="sidebar">
                    <section>
                        <h2>Productos</h2>
                        <p><a href="../productos/consultar.php">Consultar</a></p>
                        <p><a href="../productos/insertar.php">Insertar</a></p>
                        <p><a href="../productos/actualizar.php">Actualizar</a></p>
                        <p><a href="../productos/eliminar.php">Eliminar</a></p>
                    </section>
                    <section>
                        <h2>Ventas</h2>
                        <p><a href="../ventas/consultar.php">Consultar</a></p>
                        <p><a href="../ventas/insertar.php">Insertar</a></p>
                        <p><a href="../ventas/actualizar.php">Actualizar</a></p>
                        <p><a href="../ventas/eliminar.php">Eliminar</a></p>
                    </section>
                    <section>
                        <h2>Detalles de Venta</h2>
                        <p><a href="../detalles/consultar.php">Consultar</a></p>
                        <p><a href="../detalles/insertar.php">Insertar</a></p>
                        <p><a href="../detalles/actualizar.php">Actualizar</a></p>
                        <p><a href="../detalles/eliminar.php">Eliminar</a></p>
                    </section>
                    <section>
                        <h2>Usuarios</h2>
                        <p><a href="../usuarios/consultar.php">Consultar</a></p>
                        <p><a href="../usuarios/insertar.php">Insertar</a></p>
                        <p><a href="../usuarios/actualizar.php">Actualizar</a></p>
                        <p><a href="../usuarios/eliminar.php">Eliminar</a></p>
                    </section>
                </div>
            <?php
            } else {
            ?>
                <div class="sidebar">
                    <section>
                        <h2>Productos</h2>
                        <p><a href="../productos/consultar.php">Consultar</a></p>
                    </section>
                    <section>
                        <h2>Mis Ventas</h2>
                        <p><a href="../ventas/consultar.php">Consultar</a></p>
                        <p><a href="../ventas/insertar.php">Insertar</a></p>
                        <p><a href="../ventas/actualizar.php">Actualizar</a></p>
                        <p><a href="../ventas/eliminar.php">Eliminar</a></p>
                    </section>
                    <section>
                        <h2>Mi detalle de Ventas</h2>
                        <p><a href="../detalles/consultar.php">Consultar</a></p>
                        <p><a href="../detalles/insertar.php">Insertar</a></p>
                        <p><a href="../detalles/actualizar.php">Actualizar</a></p>
                        <p><a href="../detalles/eliminar.php">Eliminar</a></p>
                    </section>
                </div>
            <?php
            }
            ?>

        <?php
        } else {
        ?>
            <div class="sidebar">
                <section>
                    <h2>Por favor</h2>
                    <p><a href="../login.php">Inicia sesión</a></p>
                </section>
                <section>
                    <h2>¿Aún no tienes una cuenta?</h2>
                    <p><a href="../register.php">Regístrate</a></p>
                </section>
            </div>
        <?php
        }
        ?>
    </header>
    <form class="form" method="POST">
        <h3>Actualizar Detalles</h3>
        <main>
            <input type="number" id="idDetalles" name="idDetalles" placeholder="Auto-Incremento">
            <label htmlFor="idDetalles" className="label-name">
                <span className="content-name">IdVenta</span>
            </label>
        </main>
        <main>
            <input type="text" id="idProducto" name="idProducto" required>
            <label htmlFor="idProducto" className="label-name">
                <span className="content-name">IdProducto</span>
            </label>
        </main>
        <main>
            <input type="text" id="idUsuario" name="idUsuario" required>
            <label htmlFor="idUsuario" className="label-name">
                <span className="content-name">IdUsuario</span>
            </label>
        </main>
        <main>
            <input type="text" id="cantVenta" name="cantVenta" required>
            <label htmlFor="cantVenta" className="label-name">
                <span className="content-name">Cantidad</span>
            </label>
        </main>
        <main>
            <input type="text" id="fechaVenta" name="fechaVenta" required>
            <label htmlFor="fechaVenta" className="label-name">
                <span className="content-name">Fecha</span>
            </label>
        </main>
        <main>
            <input type="text" id="totalVenta" name="totalVenta" required>
            <label htmlFor="totalVenta" className="label-name">
                <span className="content-name">Total</span>
            </label>
        </main>
        <button type="submit" name="ok2">Enviar</button>
    </form>
    <footer>
        <h3>Héctor Mauricio Flores Martínez</h3>
        <h4>23/05/2020</h4>
    </footer>
    <script src="../js/main.js"></script>
    <script>
        const IDDETALLES = "<?php echo $idDetalles; ?>";
        const IDPRODUCTO = "<?php echo $idProducto; ?>";
        const IDUSUARIO = "<?php echo $idUsuario; ?>";
        const CANTVENTA = "<?php echo $cantVenta; ?>";
        const FECHAVENTA = "<?php echo $fechaVenta; ?>";
        const TOTALVENTA = "<?php echo $totalVenta; ?>";

        const idDetalles = document.getElementById('idDetalles');
        idDetalles.setAttribute('value', IDDETALLES);

        const idProducto = document.getElementById('idProducto');
        idProducto.setAttribute('value', IDPRODUCTO);

        const idUsuario = document.getElementById('idUsuario');
        idUsuario.setAttribute('value', IDUSUARIO);

        const cantVenta = document.getElementById('cantVenta');
        cantVenta.setAttribute('value', CANTVENTA);

        const fechaVenta = document.getElementById('fechaVenta');
        fechaVenta.setAttribute('value', FECHAVENTA);

        const totalVenta = document.getElementById('totalVenta');
        totalVenta.setAttribute('value', TOTALVENTA);
    </script>
</body>

</html>

<?php
if (isset($_POST['ok2'])) {

    include_once "../classes/classDetalles.php";
        $detalles = new ApiDetallesAdmin;

        $IDDETALLES = $_POST['idDetalles'];
        $IDPRODUCTO = $_POST['idProducto'];
        $IDUSUARIO = $_POST['idUsuario'];
        $CANTVENTA = $_POST['cantVenta'];
        $FECHAVENTA = $_POST['fechaVenta'];
        $TOTALVENTA = $_POST['totalVenta'];

        $detalles->update($IDDETALLES, $IDPRODUCTO, $IDUSUARIO, $CANTVENTA, $FECHAVENTA, $TOTALVENTA);

        print "<script>redirectCRUD('detalles')</script>";
}
?>