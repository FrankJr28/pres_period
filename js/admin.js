var nvbtn = document.getElementById("nvbtn");
var ext = document.getElementById("navbarExternalCont");

nvbtn.addEventListener('click', function(e) {
    if (ext.classList.contains("show")) {
        ext.classList.remove('show');
    } else {
        ext.classList.add('show');
    }
});

window.addEventListener('resize', evaTam);

function evaTam() {
    if (ext.classList.contains("show")) {
        ext.classList.remove('show');
    }
}


/*
function enviar()
{
   document.getElementsByName("forma").submit();
}
*/

window.addEventListener("load", function() {
    actualizar();
});

function actualizar() {

    var req = new XMLHttpRequest();
    req.onreadystatechange = function() {
        if (req.readyState == 4 && req.status == 200) {

            document.getElementById('ttable').innerHTML = req.responseText;
            console.log("En actualizar");
        }
    }
    req.open('POST', 'componentes/admin/obtenerSolicitudes.php', true);
    req.send();

    var req1 = new XMLHttpRequest();
    req1.onreadystatechange = function() {
        if (req1.readyState == 4 && req1.status == 200) {

            document.getElementById('ttable-a').innerHTML = req1.responseText;
            console.log("En actualizar");
        }
    }
    req1.open('POST', 'componentes/admin/obtenerSolicitudesA.php', true);
    req1.send();

}

/* Definir Método On */
const on = (element, event, selector, handler) => {
    element.addEventListener(event, e => {
        if (e.target.closest(selector)) {
            handler(e);
        }
    })
}

on(document, 'click', '.checkUsuario', e => {
    //alert("edit pressed");
    const fila = e.target;
    var fn = fila.parentNode.id;

    document.getElementById(fn).submit();
});


on(document, 'click', '.acept', e => {
    //alert("edit pressed");
    const fila = e.target.parentNode.parentNode.parentNode
    const id = fila.firstElementChild.firstElementChild.firstElementChild.firstElementChild.value;
    if (id > 0) {
        var respuesta = confirm("¿Desea aceptar la solicitud " + id + "?");
        if (respuesta) {
            aceptarPrestamo(id);
        }
    }
});

function aceptarPrestamo(i) {
    var req1 = new XMLHttpRequest();
    req1.onreadystatechange = function() {
        //alert("a continuacion la respuesta");
        if (req1.readyState == 4 && req1.status == 200) {
            //document.getElementById('chat-button').innerHTML = req1.responseText;
            if (req1.responseText == "correcto") {

                actualizar();

                alert("El prestamo con el id: " + i + ", ha sido aceptado");

            } else if (req1.responseText == "ocupado") {

                alert("No se ha podida aceptar el prestamo debido a que el material no esta disponible");
            } else {
                alert("Ocurrió un error");
            }
        }
    }
    req1.open('POST', 'componentes/admin/aceptarSolicitud.php', true);
    req1.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    req1.send("id_pres=" + i);
}

on(document, 'click', '.finish', e => {
    //alert("edit pressed");
    const fila = e.target.parentNode.parentNode.parentNode
    const id = fila.firstElementChild.firstElementChild.firstElementChild.firstElementChild.value;

    if (id > 0) {
        var respuesta = confirm("¿Desea concluir el prestamo con el id: " + id + "?");
        if (respuesta) {
            finalizarPrestamo(id);
        }
    }
});

function finalizarPrestamo(i) {
    var req1 = new XMLHttpRequest();
    req1.onreadystatechange = function() {
        //alert("a continuacion la respuesta");
        if (req1.readyState == 4 && req1.status == 200) {
            //document.getElementById('chat-button').innerHTML = req1.responseText;
            if (req1.responseText == "correcto") {
                actualizar();
                alert("El prestamo con el id: " + i + ", ha finalizado");
            } else {
                alert("Ocurrió un error");
            }
        }
    }
    req1.open('POST', 'componentes/admin/finalizarSolicitud.php', true);
    req1.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    req1.send("id_pres=" + i);
}



on(document, 'click', '.delete', e => {
    //alert("edit pressed");
    const fila = e.target.parentNode.parentNode.parentNode;
    const id = fila.firstElementChild.firstElementChild.firstElementChild.firstElementChild.value;
    console.log(id);
    if (id > 0) {
        var respuesta = confirm("¿Desea eliminar la solicitud " + id + "?");
        if (respuesta) {
            eliminarPrestamo(id);
        }
    }
});

function eliminarPrestamo(i) {
    var req1 = new XMLHttpRequest();
    req1.onreadystatechange = function() {
        //alert("a continuacion la respuesta");
        if (req1.readyState == 4 && req1.status == 200) {
            //document.getElementById('chat-button').innerHTML = req1.responseText;
            if (req1.responseText == "correcto") {
                actualizar();
                alert("El incidente con el id: " + i + ", se eliminó satisfactoriamente");
            } else {
                alert("Ocurrió un error");
            }
        }
    }
    req1.open('POST', 'componentes/admin/eliminarSolicitud.php', true);
    req1.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    req1.send("id_pres=" + i);
}