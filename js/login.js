formularioL = document.getElementById("formlogin");

formularioL.addEventListener('submit', (e) => {
    e.preventDefault();

    let data = new FormData(formularioL) //obtenemos el contenido del formulario
        //data.append("id", id);
    var req = new XMLHttpRequest();
    req.onreadystatechange = function() { //Actualizaa los usuarios en linea 
        if (req.readyState == 4 && req.status == 200) {
            switch (req.responseText) {
                case "a":
                    window.location.href = "http://localhost/pres_period/admin.php";
                    break;
                case "u":
                    window.location.href = "http://localhost/pres_period/usuario.php";
                    break;
                case "d":
                    window.location.href = "http://localhost/pres_period/docente.php";
                    break;
                default:
                    alert("Datos incorrectos");
                    formularioL.reset();
                    break;
            }


        }
    }
    req.open('POST', 'componentes/login/obtenerUsuarios.php', true);
    req.send(data);
});