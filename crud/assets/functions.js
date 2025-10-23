function objectAjax() {
	var xmlhttp = false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		try {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (E) {
			xmlhttp = false;
		}
	}
	if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}

// Inicializo automáticamente la función read al entrar o recargar la página
addEventListener('load', read, false);

function read() {
	$.ajax({
		type: 'POST',
		url: '?c=administrator&m=table_users',
		beforeSend: function () {
			$("#information").html("Procesando, espere por favor...");
		},
		success: function (response) {
			$("#information").html(response);
		}
	});
}

function register() {
	name = document.formUser.name.value;
	last_name = document.formUser.last_name.value;
	email = document.formUser.email.value;
	password = document.formUser.password.value; // 🔹 Nuevo campo agregado

	ajax = objectAjax();
	ajax.open("POST", "?c=administrator&m=registeruser", true);
	ajax.onreadystatechange = function () {
		if (ajax.readyState == 4) {
			read();
			alert('Los datos se guardaron correctamente.');
			$('#addUser').modal('hide');
		}
	};
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send(
		"name=" + encodeURIComponent(name) +
		"&last_name=" + encodeURIComponent(last_name) +
		"&email=" + encodeURIComponent(email) +
		"&password=" + encodeURIComponent(password) // 🔹 Se envía al backend
	);
}

function update() {
	id = document.formUserUpdate.id.value;
	name = document.formUserUpdate.name.value;
	last_name = document.formUserUpdate.last_name.value;
	email = document.formUserUpdate.email.value;

	ajax = objectAjax();
	ajax.open("POST", "?c=administrator&m=updateuser", true);
	ajax.onreadystatechange = function () {
		if (ajax.readyState == 4) {
			read();
			$('#updateUser').modal('hide');
		}
	};
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send(
		"name=" + encodeURIComponent(name) +
		"&last_name=" + encodeURIComponent(last_name) +
		"&email=" + encodeURIComponent(email) +
		"&id=" + encodeURIComponent(id)
	);
}

function deleteUser(id) {
	if (confirm('¿Está seguro de eliminar este registro?')) {
		ajax = objectAjax();
		ajax.open("POST", "?c=administrator&m=deleteuser", true);
		ajax.onreadystatechange = function () {
			if (ajax.readyState == 4) {
				read();
			}
		};
		ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		ajax.send("id=" + id);
	}
}

function ModalRegister() {
	$('#addUser').modal('show');
}

function ModalUpdate(id, name, last_name, email) {
	document.formUserUpdate.id.value = id;
	document.formUserUpdate.name.value = name;
	document.formUserUpdate.last_name.value = last_name;
	document.formUserUpdate.email.value = email;
	$('#updateUser').modal('show');
}
