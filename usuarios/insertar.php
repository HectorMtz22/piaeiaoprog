<?php
session_start();
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
        <h3>Insertar Usuarios</h3>
        <main>
            <input type="number" name="id" placeholder="Auto-Incremento">
            <label htmlFor="id" className="label-name">
                <span className="content-name">Id</span>
            </label>
        </main>
        <main>
            <input type="text" name="nombre" required>
            <label htmlFor="nombre" className="label-name">
                <span className="content-name">Nombre</span>
            </label>
        </main>
        <main>
            <input type="text" name="email" required>
            <label htmlFor="email" className="label-name">
                <span className="content-name">Email</span>
            </label>
        </main>
        <main>
            <input type="number" name="tel" required>
            <label htmlFor="tel" className="label-name">
                <span className="content-name">Teléfono</span>
            </label>
        </main>
        <main>
            <input type="password" name="contra" required>
            <label htmlFor="contra" className="label-name">
                <span className="content-name">Contraseña</span>
            </label>
        </main>
        <button type="submit" name="ok">Enviar</button>
    </form>
    <footer>
        <h3>Héctor Mauricio Flores Martínez</h3>
        <h4>23/05/2020</h4>
    </footer>
    <script src="../js/main.js"></script>
</body>

</html>

<?php
if (isset($_POST['ok'])) {
    if (!empty($_SESSION['isAdmin'])) {
        require "../classes/classAdminUsuarios.php";
        $usuarios = new ApiUsuarios;

        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $contra = $_POST['contra'];

        $usuarios->post($nombre, $email, $tel, $contra);

        print "<script>redirectCRUD('usuarios')</script>";
    } else {
        print "<script>message('noadmin')</script>";
    }
}
?>