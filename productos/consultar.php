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
    <main class="main">
    <a href='consultar.php'>Actualizar tabla...</a>
		<h1>Consulta de la tabla de productos </h1>
		<main class="grid-5">
			<section>Clave</section>     
			<section>Nombre</section>
			<section>Tipo</section>
			<section>Descripción</section>
			<section>Precio</section>
			<?php
                require "../classes/classProductos.php";
                $productos = new ApiProductos;
                $total = $productos->getAll();
                foreach ($total["items"] as $clave => $valor) {
                    print "<section>$valor[_id]</section>";
                    print "<section>$valor[nombre]</section>";
                    print "<section>$valor[tipo]</section>";
                    print "<section>$valor[desc]</section>";
                    print "<section>$valor[precio]</section>";
                }
				print "</main>";
                $num_Col = count($total["items"]);
                print "<p>El número de registros es: $num_Col</p>";
			?>
        <?php
            if(!empty($_SESSION['isAdmin'])) {
        ?>
            <a href='insertar.php'>
                <button class="button">
                    Insertar un dato
                </button>
            </a>
            <a href='actualizar.php'>
                <button class="button">
                    Actualizar un dato
                </button>
            </a>
            <a href='eliminar.php'>
                <button class="button">
                    Eliminar un dato
                </button>
            </a>
        <?php
            }
        ?>
    </main>
    <footer>
        <h3>Héctor Mauricio Flores Martínez</h3>
        <h4>23/05/2020</h4>
    </footer>
    <script src="../js/main.js"></script>
</body>

</html>