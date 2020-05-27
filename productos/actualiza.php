<?php
session_start();
if(isset($_POST['id'])) {
    require "../classes/classProductos.php";
    $producto = new ApiProductos;
    $id = $_POST['id'];
    $total = $producto->get($id);
    foreach ($total["items"] as $clave => $valor) {
        $id = $valor['_id'];
        $nombre = $valor['nombre'];
        $tipo = $valor['tipo'];
        $desc = $valor['desc'];
        $precio = $valor['precio'];
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
        <h3>Actualizar productos</h3>
        <main>
            <input type="number" id="id" name="id" placeholder="Auto-Incremento">
            <label htmlFor="id" className="label-name">
                <span className="content-name">Id</span>
            </label>
        </main>
        <main>
            <input type="text" id="nombre" name="nombre" required>
            <label htmlFor="nombre" className="label-name">
                <span className="content-name">Nombre</span>
            </label>
        </main>
        <main>
            <input type="text" id="tipo" name="tipo" required>
            <label htmlFor="tipo" className="label-name">
                <span className="content-name">Tipo</span>
            </label>
        </main>
        <main>
            <input type="text" id="desc" name="desc" required>
            <label htmlFor="desc" className="label-name">
                <span className="content-name">Descripción</span>
            </label>
        </main>
        <main>
            <input type="text" id="precio" name="precio" required>
            <label htmlFor="precio" className="label-name">
                <span className="content-name">Precio</span>
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
        const ID = "<?php echo $id; ?>";
        const NOMBRE = "<?php echo $nombre; ?>";
        const TIPO = "<?php echo $tipo; ?>";
        const DESC = "<?php echo $desc; ?>";
        const PRECIO = "<?php echo $precio; ?>";

        const id = document.getElementById('id');
        id.setAttribute('value', ID);

        const nombre = document.getElementById('nombre');
        nombre.setAttribute('value', NOMBRE);

        const tipo = document.getElementById('tipo');
        tipo.setAttribute('value', TIPO);

        const desc = document.getElementById('desc');
        desc.setAttribute('value', DESC);

        const precio = document.getElementById('precio');
        precio.setAttribute('value', PRECIO);
    </script>
</body>

</html>

<?php
if (isset($_POST['ok2'])) {
    if (!empty($_SESSION['isAdmin'])) {
        $productos = new ApiProductos;

        $ID = $_POST['id'];
        $NOMBRE = $_POST['nombre'];
        $TIPO = $_POST['tipo'];
        $DESC = $_POST['desc'];
        $PRECIO = $_POST['precio'];

        $productos->update($ID, $NOMBRE, $TIPO, $DESC, $PRECIO);

        print "<script>redirectCRUD('productos')</script>";
    } else {
        print "<script>message('noadmin')</script>";
    }
}
?>