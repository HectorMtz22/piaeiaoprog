<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/vnd.microsoft.icon" href="img/favicon.ico" sizes="64x48">
    <link rel="stylesheet" href="css/style.css">
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
        <h2><a href="index.php">Games & More</a></h2>
        <?php
        if (isset($_SESSION['nombreUsuario'])) {
            $name = $_SESSION['nombreUsuario'];
            print "<span>Hola $name</span>";
            print "<span><a href='logout.php'>Cerrar sesión</a></span>";
        }
        ?>
        <button class="hamburger">
            <img src="img/hamburger.svg" alt="hamburger">
        </button>
        <?php
        if (isset($_SESSION['auth'])) {
            if (isset($_SESSION['isAdmin'])) {
        ?>
                <div class="sidebar">
                    <section>
                        <h2>Productos</h2>
                        <p><a href="productos/consultar.php">Consultar</a></p>
                        <p><a href="productos/insertar.php">Insertar</a></p>
                        <p><a href="productos/actualizar.php">Actualizar</a></p>
                        <p><a href="productos/eliminar.php">Eliminar</a></p>
                    </section>
                    <section>
                        <h2>Ventas</h2>
                        <p><a href="ventas/consultar.php">Consultar</a></p>
                        <p><a href="ventas/insertar.php">Insertar</a></p>
                        <p><a href="ventas/actualizar.php">Actualizar</a></p>
                        <p><a href="ventas/eliminar.php">Eliminar</a></p>
                    </section>
                    <section>
                        <h2>Detalles de Venta</h2>
                        <p><a href="detalles/consultar.php">Consultar</a></p>
                        <p><a href="detalles/insertar.php">Insertar</a></p>
                        <p><a href="detalles/actualizar.php">Actualizar</a></p>
                        <p><a href="detalles/eliminar.php">Eliminar</a></p>
                    </section>
                    <section>
                        <h2>Usuarios</h2>
                        <p><a href="usuarios/consultar.php">Consultar</a></p>
                        <p><a href="usuarios/insertar.php">Insertar</a></p>
                        <p><a href="usuarios/actualizar.php">Actualizar</a></p>
                        <p><a href="usuarios/eliminar.php">Eliminar</a></p>
                    </section>
                </div>
            <?php
            } else {
            ?>
                <div class="sidebar">
                    <section>
                        <h2>Productos</h2>
                        <p><a href="productos/consultar.php">Consultar</a></p>
                    </section>
                    <section>
                        <h2>Mis Ventas</h2>
                        <p><a href="ventas/consultar.php">Consultar</a></p>
                        <p><a href="ventas/insertar.php">Insertar</a></p>
                        <p><a href="ventas/actualizar.php">Actualizar</a></p>
                        <p><a href="ventas/eliminar.php">Eliminar</a></p>
                    </section>
                    <section>
                        <h2>Mi detalle de Ventas</h2>
                        <p><a href="detalles/consultar.php">Consultar</a></p>
                        <p><a href="detalles/insertar.php">Insertar</a></p>
                        <p><a href="detalles/actualizar.php">Actualizar</a></p>
                        <p><a href="detalles/eliminar.php">Eliminar</a></p>
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
                    <p><a href="login.php">Inicia sesión</a></p>
                </section>
                <section>
                    <h2>¿Aún no tienes una cuenta?</h2>
                    <p><a href="register.php">Regístrate</a></p>
                </section>
            </div>
        <?php
        }
        ?>
    </header>
    <main class="grid">
        <section>
            <a href="productos/consultar.php">
                <h2>Play Station 4</h2>
                <img src="img/index/console1.jpg" alt="Consola">
            </a>
        </section>
        <section>
            <a href="productos/consultar.php">
                <h2>Xbox One</h2>
                <img src="img/index/console2.jpg" alt="Consola">
            </a>
        </section>
        <section>
            <a href="productos/consultar.php">
                <h2>PC "Red Devil"</h2>
                <img src="img/index/pc1.jpg" alt="PC">
            </a>
        </section>
        <section>
            <a href="productos/consultar.php">
                <h2>Play Station 3</h2>
                <img src="img/index/console3.jpg" alt="Consola">
            </a>
        </section>
        <section>
            <a href="productos/consultar.php">
                <h2>Nintendo NES</h2>
                <img src="img/index/console4.jpg" alt="Consola">
            </a>
        </section>
        <section>
            <a href="productos/consultar.php">
                <h2>PC "Minion"</h2>
                <img src="img/index/pc2.jpg" alt="PC">
            </a>
        </section>
        <section>
            <a href="productos/consultar.php">
                <h2>SEGA Master System II</h2>
                <img src="img/index/console5.jpg" alt="Consola">
            </a>
        </section>
        <section>
            <a href="productos/consultar.php">
                <h2>Nintendo Switch</h2>
                <img src="img/index/console6.jpg" alt="Consola">
            </a>
        </section>
        <section>
            <a href="productos/consultar.php">
                <h2>PC "Master Race"</h2>
                <img src="img/index/pc3.jpg" alt="PC">
            </a>
        </section>
    </main>
    <footer>
        <h3>Héctor Mauricio Flores Martínez</h3>
        <h4>23/05/2020</h4>
    </footer>
    <script src="js/main.js"></script>
</body>

</html>

<?php
if (isset($_POST['ok'])) {
    require "classes/classUser.php";
    $correo = $_POST['correo'];
    $contraseña = $_POST['pass'];
    $salida = new ApiUsuarios;

    $resultado = $salida->get($correo, $contraseña);
    $lostotales = $resultado["items"][0];

    $_SESSION["auth"] = $lostotales["auth"];
    $_SESSION["isAdmin"] = $lostotales["isAdmin"];
    $_SESSION["nombreUsuario"] = $lostotales["nombreUsuario"];
    print "<script>redirect('productos')</script>";
}
?>