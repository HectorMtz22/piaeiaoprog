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
    <form method="POST" class="form">
        <h3>Regístrate</h3>
        <main>
            <input type="text" name="name" required>
            <label htmlFor="name" className="label-name">
                <span className="content-name">Nombre</span>
            </label>
        </main>
        <main>
            <input type="text" name="correo" required>
            <label htmlFor="correo" className="label-name">
                <span className="content-name">Correo</span>
            </label>
        </main>
        <main>
            <input type="text" name="tel" required>
            <label htmlFor="tel" className="label-name">
                <span className="content-name">Teléfono</span>
            </label>
        </main>
        <main>
            <input type="password" id="pass" name="pass" required>
            <label htmlFor="pass" className="label-name">
                <span className="content-name">Contraseña</span>
            </label>
        </main>
        <main>
            <input type="password" id="cpass" name="cpass" required>
            <label htmlFor="cpass" className="label-name">
                <span className="content-name">Confirmar Contraseña</span>
            </label>
        </main>
        <button type="submit" name="ok">Enviar</button>
    </form>
    <footer>
        <h3>Héctor Mauricio Flores Martínez</h3>
        <h4>23/05/2020</h4>
    </footer>
    <script src="js/main.js"></script>
    <script src="js/register.js"></script>
</body>

</html>

<?php
    if(isset($_POST['ok'])) {
        require "classes/classUser.php";
        $name = $_POST['name'];
        $correo = $_POST['correo'];
        $tel = $_POST['tel'];
        $pass = $_POST['pass'];
        $cpass = $_POST['cpass'];

        $salida = new ApiUsuarios;

        if($pass == $cpass) {
            $salida->post($name, $correo, $tel, $pass);
        
            $resultado = $salida->get($correo, $pass);
            $lostotales = $resultado["items"][0];

            $_SESSION["auth"] = $lostotales["auth"];
            $_SESSION["isAdmin"] = $lostotales["isAdmin"];
            $_SESSION["nombreUsuario"] = $lostotales["nombreUsuario"];
            print "<script>redirect('productos')</script>";
        } else {
            print "<script>message('datosincorrectos')</script>";
        }

       
        
        
    }
?>