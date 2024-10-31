"use strict"

function validar() {
	var nombre = document.formu.nombre.value;
	var apellido = document.formu.apellido.value;
	var telefono = document.formu.telefono.value;
	var fecha_naci = document.formu.fecha_naci.value;
	var radios = document.formu.genero;
    var generoSeleccionado = false;


	if (!v1.test(nombre)){
		alert("El nombre es incorrecto o el campo esta vacio");
		document.formu.nombre.focus();
		return;
	}


	if (!v1.test(apellido)) {
        alert("El apellido es incorrecto o el campo esta vacio");
        document.formu.apellido.focus();
        return;
    }

	if (!v2.test(telefono) || telefono === "") {
        alert("El telefono es incorrecto o el campo esta vacio");
        document.formu.telefono.focus();
        return;
    }

	if (fecha_naci === "") {
		alert("Por favor ingresar una fecha");
		document.formu.fecha_naci.focus();
		return;
	}
	
	for (var i = 0; i < radios.length; i++) {
		if (radios[i].checked) {
			generoSeleccionado = true;
			break;
		}
	}

	if (!generoSeleccionado) {
		alert("Por favor, seleccione su género.");
		return;
	}
	
	document.formu.submit()  
}

