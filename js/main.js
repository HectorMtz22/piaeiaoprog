const redirect = (valor) => {
    if(valor == "productos") {
        location.href = "./productos/consultar.php";
    }
    if(valor == "usuarios") {
        location.href = "./usuarios/consultar.php";
    }
    if(valor == "ventas") {
        location.href = "./ventas/consultar.php";
    }
    if(valor == "detalles") {
        location.href = "./detalles/consultar.php";
    }
    if(valor == "login") {
        location.href = "./login.php";
    }
    if(valor == "register") {
        location.href = "./register.php";
    }
    if(valor == "logout") {
        location.href = "./logout.php";
    }
    if(valor == "index") {
        location.href = "./index.php";
    }
}
const redirectCRUD = (valor) => {
    if(valor == "productos") {
        location.href = "../productos/consultar.php";
    }
    if(valor == "usuarios") {
        location.href = "../usuarios/consultar.php";
    }
    if(valor == "ventas") {
        location.href = "../ventas/consultar.php";
    }
    if(valor == "detalles") {
        location.href = "../detalles/consultar.php";
    }
    if(valor == "login") {
        location.href = "../login.php";
    }
    if(valor == "register") {
        location.href = "../register.php";
    }
    if(valor == "logout") {
        location.href = "../logout.php";
    }
    if(valor == "index") {
        location.href = "../index.php";
    }
}

const message = (valor) => {
    if(valor == "sinproducto") {
        alert("No hay productos");
    }
    if(valor == "noencontrado") {
        alert("No se encontró el usuario");
    }
    if(valor == "datosincorrectos") {
        alert("Los datos son incorrectos");
    }
    if(valor == "noadmin") {
        alert("No eres usuario administrador");
    }
}

const local = (auth, isAdmin ,nombreUsuario) => {
    if(auth == true) {
        localStorage.setItem("auth", true);
    }
    if(isAdmin == true) {
        localStorage.setItem("isAdmin", true);
    } else {
        localStorage.setItem("isAdmin", false);
    }
    localStorage.setItem("nombre", nombreUsuario);
}