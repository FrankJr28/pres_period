var myModal = document.getElementById('modal')
var myInput = document.getElementById('myInput')

var btnAbrirModal = document.getElementById('btnSeleccionar');

btnAbrirModal.addEventListener("click", () => {

    var req = new XMLHttpRequest();

    req.onreadystatechange = function() {

        if (req.readyState == 4 && req.status == 200) {

            document.getElementById('camaras-s').innerHTML = req.responseText;

            console.log("En actualizar Camaras");

        }

    }

    req.open('POST', 'componentes/usuario/obtenerCamarasDisponibles.php', true);

    req.send();

    var req1 = new XMLHttpRequest();

    req1.onreadystatechange = function() {

        if (req1.readyState == 4 && req1.status == 200) {

            document.getElementById('microfonos-s').innerHTML = req1.responseText;

            console.log("En actualizar Microfonos");

        }

    }

    req1.open('POST', 'componentes/usuario/obtenerMicrofonosDisponibles.php', true);

    req1.send();

    var req2 = new XMLHttpRequest();

    req2.onreadystatechange = function() {

        if (req2.readyState == 4 && req2.status == 200) {

            document.getElementById('lamparas-s').innerHTML = req2.responseText;

            console.log("En actualizar Lamparas");

        }
    }

    req2.open('POST', 'componentes/usuario/obtenerLamparasDisponibles.php', true);

    req2.send();



    var req3 = new XMLHttpRequest();

    req3.onreadystatechange = function() {

        if (req3.readyState == 4 && req3.status == 200) {

            document.getElementById('proyectores-s').innerHTML = req3.responseText;

        }
    }

    req3.open('POST', 'componentes/usuario/obtenerProyectoresDisponibles.php', true);

    req3.send();



    var req4 = new XMLHttpRequest();

    req4.onreadystatechange = function() {

        if (req4.readyState == 4 && req4.status == 200) {

            document.getElementById('flash-s').innerHTML = req4.responseText;

        }
    }

    req4.open('POST', 'componentes/usuario/obtenerFlashDiponibles.php', true);

    req4.send();



    var req5 = new XMLHttpRequest();

    req5.onreadystatechange = function() {

        if (req5.readyState == 4 && req5.status == 200) {

            document.getElementById('deslizadores-s').innerHTML = req5.responseText;

        }
    }

    req5.open('POST', 'componentes/usuario/obtenerDeslizadoresDisponibles.php', true);

    req5.send();



    var req6 = new XMLHttpRequest();

    req6.onreadystatechange = function() {

        if (req6.readyState == 4 && req6.status == 200) {

            document.getElementById('camarasgopro-s').innerHTML = req6.responseText;

        }
    }

    req6.open('POST', 'componentes/usuario/obtenerCamarasGoProDisponibles.php', true);

    req6.send();



    var req7 = new XMLHttpRequest();

    req7.onreadystatechange = function() {

        if (req7.readyState == 4 && req7.status == 200) {

            document.getElementById('maletines-s').innerHTML = req7.responseText;

        }
    }

    req7.open('POST', 'componentes/usuario/obtenerMaletinesDisponibles.php', true);

    req7.send();



    var req8 = new XMLHttpRequest();

    req8.onreadystatechange = function() {

        if (req8.readyState == 4 && req8.status == 200) {

            document.getElementById('tripies-s').innerHTML = req8.responseText;

        }
    }

    req8.open('POST', 'componentes/usuario/obtenerTripiesDiponibles.php', true);

    req8.send();



    var req9 = new XMLHttpRequest();

    req9.onreadystatechange = function() {

        if (req9.readyState == 4 && req9.status == 200) {

            document.getElementById('grabadoras-s').innerHTML = req9.responseText;

        }
    }

    req9.open('POST', 'componentes/usuario/obtenerGrabadorasDisponibles.php', true);

    req9.send();


});


var solicitarModal = document.getElementById('modalSolicitud');

var btnAbrirSolicitarModal = document.getElementById('btnSolicitar');

btnAbrirSolicitarModal.addEventListener('click', () => {

    var req = new XMLHttpRequest();

    req.onreadystatechange = function() {

        if (req.readyState == 4 && req.status == 200) {

            document.getElementById('docente_select').innerHTML = req.responseText;

        }

    }

    req.open('POST', 'componentes/usuario/obtenerDocentes.php', true);

    req.send();

});

/* Definir Método On */
const on = (element, event, selector, handler) => {
    element.addEventListener(event, e => {
        if (e.target.closest(selector)) {
            handler(e);
        }
    })
}

on(document, 'click', '.deleteCamara', e => {
    //alert("edit pressed");
    const fila = e.target.parentNode.parentNode.parentNode
    const id = fila.children[1].innerHTML
        //console.log(id);
        //modal.style.display = 'block';
    if (id > 0) {

        var respuesta = confirm("¿Desea eliminar la camara con el id: " + id + " de su solicitud?");

        if (respuesta) {

            eliminarCamaraC(id);

        }

    }

});

on(document, 'click', '.checkTicket', e => {
    //alert("edit pressed");
    const fila = e.target;
    var fn = fila.parentNode.id;
    console.log(fila);
    console.log(fn);
    document.getElementById(fn).submit();
});

function eliminarCamaraC(i) {
    var req1 = new XMLHttpRequest();
    req1.onreadystatechange = function() {
        //alert("a continuacion la respuesta");
        if (req1.readyState == 4 && req1.status == 200) {
            //document.getElementById('chat-button').innerHTML = req1.responseText;
            if (req1.responseText == "correcto") {
                location.reload();
            } else {
                alert("Ocurrió un error");
            }
        }
    }
    req1.open('POST', 'componentes/usuario/eliminarCamaraC.php', true);
    req1.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    req1.send("id_c=" + i);
}

on(document, 'click', '.deleteLampara', e => {

    const fila = e.target.parentNode.parentNode.parentNode

    const id = fila.children[1].innerHTML

    if (id > 0) {

        var respuesta = confirm("¿Desea eliminar la Lampara con el id: " + id + " de su solicitud?");

        if (respuesta) {

            eliminarLamparaC(id);

        }

    }

});

function eliminarLamparaC(i) {
    var req1 = new XMLHttpRequest();
    req1.onreadystatechange = function() {
        //alert("a continuacion la respuesta");
        if (req1.readyState == 4 && req1.status == 200) {
            //document.getElementById('chat-button').innerHTML = req1.responseText;
            if (req1.responseText == "correcto") {
                location.reload();
            } else {
                alert("Ocurrió un error");
            }
        }
    }
    req1.open('POST', 'componentes/usuario/eliminarLamparaC.php', true);
    req1.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    req1.send("id_l=" + i);
}


on(document, 'click', '.deleteMicrofono', e => {

    const fila = e.target.parentNode.parentNode.parentNode

    const id = fila.children[1].innerHTML

    if (id > 0) {

        var respuesta = confirm("¿Desea eliminar el microfono con el id: " + id + " de su solicitud?");

        if (respuesta) {

            eliminarMicrofonoC(id);

        }

    }

});

function eliminarMicrofonoC(i) {
    var req1 = new XMLHttpRequest();
    req1.onreadystatechange = function() {
        //alert("a continuacion la respuesta");
        if (req1.readyState == 4 && req1.status == 200) {
            if (req1.responseText == "correcto") {
                location.reload();
            } else {
                alert("Ocurrió un error");
            }
        }
    }
    req1.open('POST', 'componentes/usuario/eliminarMicrofonoC.php', true);
    req1.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    req1.send("id_m=" + i);
}

on(document, 'click', '.deleteProy', e => {

    const fila = e.target.parentNode.parentNode.parentNode

    const id = fila.children[1].innerHTML

    if (id > 0) {

        var respuesta = confirm("¿Desea eliminar el proyector con el id: " + id + " de su solicitud?");

        if (respuesta) {

            eliminarProyectorC(id);

        }

    }

});

function eliminarProyectorC(i) {
    var req1 = new XMLHttpRequest();
    req1.onreadystatechange = function() {
        //alert("a continuacion la respuesta");
        if (req1.readyState == 4 && req1.status == 200) {
            if (req1.responseText == "correcto") {
                location.reload();
            } else {
                alert("Ocurrió un error");
            }
        }
    }
    req1.open('POST', 'componentes/usuario/eliminarProyectorC.php', true);
    req1.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    req1.send("id_p=" + i);
}


on(document, 'click', '.deleteFlash', e => {

    const fila = e.target.parentNode.parentNode.parentNode

    const id = fila.children[1].innerHTML

    if (id > 0) {

        var respuesta = confirm("¿Desea eliminar el flash con el id: " + id + " de su solicitud?");

        if (respuesta) {

            eliminarFlashC(id);

        }

    }

});

function eliminarFlashC(i) {
    var req1 = new XMLHttpRequest();
    req1.onreadystatechange = function() {
        //alert("a continuacion la respuesta");
        if (req1.readyState == 4 && req1.status == 200) {
            if (req1.responseText == "correcto") {
                location.reload();
            } else {
                alert("Ocurrió un error");
            }
        }
    }
    req1.open('POST', 'componentes/usuario/eliminarFlashC.php', true);
    req1.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    req1.send("id_f=" + i);
}

on(document, 'click', '.deleteDesl', e => {

    const fila = e.target.parentNode.parentNode.parentNode

    const id = fila.children[1].innerHTML

    if (id > 0) {

        var respuesta = confirm("¿Desea eliminar el deslizador con el id: " + id + " de su solicitud?");

        if (respuesta) {

            eliminarDeslC(id);

        }

    }

});

function eliminarDeslC(i) {
    var req1 = new XMLHttpRequest();
    req1.onreadystatechange = function() {
        //alert("a continuacion la respuesta");
        if (req1.readyState == 4 && req1.status == 200) {
            if (req1.responseText == "correcto") {
                location.reload();
            } else {
                alert("Ocurrió un error");
            }
        }
    }
    req1.open('POST', 'componentes/usuario/eliminarDeslC.php', true);
    req1.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    req1.send("id_d=" + i);
}

on(document, 'click', '.deleteCamGoPro', e => {

    const fila = e.target.parentNode.parentNode.parentNode

    const id = fila.children[1].innerHTML

    if (id > 0) {

        var respuesta = confirm("¿Desea eliminar el deslizador con el id: " + id + " de su solicitud?");

        if (respuesta) {

            eliminarCamGoProC(id);

        }

    }

});

function eliminarCamGoProC(i) {
    var req1 = new XMLHttpRequest();
    req1.onreadystatechange = function() {
        //alert("a continuacion la respuesta");
        if (req1.readyState == 4 && req1.status == 200) {
            if (req1.responseText == "correcto") {
                location.reload();
            } else {
                alert("Ocurrió un error");
            }
        }
    }
    req1.open('POST', 'componentes/usuario/eliminarCamGoProC.php', true);
    req1.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    req1.send("id_c=" + i);
}

on(document, 'click', '.deleteMaletin', e => {

    const fila = e.target.parentNode.parentNode.parentNode

    const id = fila.children[1].innerHTML

    if (id > 0) {

        var respuesta = confirm("¿Desea eliminar el deslizador con el id: " + id + " de su solicitud?");

        if (respuesta) {

            eliminarMaletinC(id);

        }

    }

});

function eliminarMaletinC(i) {
    var req1 = new XMLHttpRequest();
    req1.onreadystatechange = function() {
        //alert("a continuacion la respuesta");
        if (req1.readyState == 4 && req1.status == 200) {
            if (req1.responseText == "correcto") {
                location.reload();
            } else {
                alert("Ocurrió un error");
            }
        }
    }
    req1.open('POST', 'componentes/usuario/eliminarMaletinC.php', true);
    req1.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    req1.send("id_m=" + i);
}

/* */

on(document, 'click', '.deleteTripie', e => {

    const fila = e.target.parentNode.parentNode.parentNode

    const id = fila.children[1].innerHTML

    if (id > 0) {

        var respuesta = confirm("¿Desea eliminar el artículo: " + id + "?");

        if (respuesta) {

            eliminarTripieC(id);

        }

    }

});

function eliminarTripieC(i) {
    var req1 = new XMLHttpRequest();
    req1.onreadystatechange = function() {
        //alert("a continuacion la respuesta");
        if (req1.readyState == 4 && req1.status == 200) {
            if (req1.responseText == "correcto") {
                location.reload();
            } else {
                alert("Ocurrió un error");
            }
        }
    }
    req1.open('POST', 'componentes/usuario/eliminarTripieC.php', true);
    req1.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    req1.send("id_t=" + i);
}

/**/

on(document, 'click', '.deleteGrabadora', e => {

    const fila = e.target.parentNode.parentNode.parentNode

    const id = fila.children[1].innerHTML

    if (id > 0) {

        var respuesta = confirm("¿Desea eliminar el artículo: " + id + "?");

        if (respuesta) {

            eliminarGrabadoraC(id);

        }

    }

});

function eliminarGrabadoraC(i) {
    var req1 = new XMLHttpRequest();
    req1.onreadystatechange = function() {
        //alert("a continuacion la respuesta");
        if (req1.readyState == 4 && req1.status == 200) {
            if (req1.responseText == "correcto") {
                location.reload();
            } else {
                alert("Ocurrió un error");
            }
        }
    }
    req1.open('POST', 'componentes/usuario/eliminarGrabadoraC.php', true);
    req1.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    req1.send("id_g=" + i);
}

/**/

on(document, 'click', '.deleteOtro', e => {

    const fila = e.target.parentNode.parentNode.parentNode

    const id = fila.children[0].innerHTML

    var respuesta = confirm("¿Desea eliminar el artículo: " + id + "?");

    if (respuesta) {

        eliminarOtroC(id);

    }

});

function eliminarOtroC(i) {
    var req1 = new XMLHttpRequest();
    req1.onreadystatechange = function() {
        //alert("a continuacion la respuesta");
        if (req1.readyState == 4 && req1.status == 200) {
            if (req1.responseText == "correcto") {
                location.reload();
            } else {
                alert("Ocurrió un error");
            }
        }
    }
    req1.open('POST', 'componentes/usuario/eliminarOtroC.php', true);
    req1.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    req1.send("id_otro=" + i);
}