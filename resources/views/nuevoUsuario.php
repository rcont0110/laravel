<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>CREATE usuario</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	    <link rel="stylesheet" href="/resources/demos/style.css">
	    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		
		<script>
		
			$(document).ready( function() {   // Esta parte del código se ejecutará automáticamente cuando la página esté lista.
				$("#botonenviar").click( function() {     // Con esto establecemos la acción por defecto de nuestro botón de enviar.
					if(validaForm()){                               // Primero validará el formulario.
						$.post("enviar.php",$("#formdata").serialize(),function(res){
							$("#formulario").fadeOut("slow");   // Hacemos desaparecer el div "formulario" con un efecto fadeOut lento.
							if(res == 1){
								$("#exito").delay(500).fadeIn("slow");      // Si hemos tenido éxito, hacemos aparecer el div "exito" con un efecto fadeIn lento tras un delay de 0,5 segundos.
							} else {
								$("#fracaso").delay(500).fadeIn("slow");    // Si no, lo mismo, pero haremos aparecer el div "fracaso"
							}
						});
					}
				});    
			});
		
				function validaForm(){
					// Campos de texto
					if($("#nombre").val() == ""){
						alert("El campo Nombre no puede estar vacío.");
						$("#nombre").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
						return false;
					}
					if($("#apellidos").val() == ""){
						alert("El campo Apellidos no puede estar vacío.");
						$("#apellidos").focus();
						return false;
					}
					if($("#direccion").val() == ""){
						alert("El campo Dirección no puede estar vacío.");
						$("#direccion").focus();
						return false;
					}

					// Checkbox
					if(!$("#mayor").is(":checked")){
						alert("Debe confirmar que es mayor de 18 años.");
						return false;
					}

					return true; // Si todo está correcto
				}
		</script>
	
	</head>
	<body>

            
			<div class="row justify-content-center">
				<form method="post" id="regUser">
				<div class="col-md-5">
				
					<div class="row">
						<h2>NUEVO USUARIO:</h2>
					</div>
					<div class="row justify-content-center">
						<label for="nombre">Nombre (*): </label><input type="text" name="nombre" id="nombre" required="required">
					</div>
					<div class="row justify-content-center">
						<label for="apellidos">Apellidos (*): </label><input type="text" name="apellidos" id="apellidos" required="required"></br>
					</div>
					<div class="row justify-content-center">
						<label for="apellidos">Usuario (*): </label><input type="text" name="user" id="user" required="required"></br>
					<div>
					<div class="row justify-content-center">
						<label for="apellidos">Password (*): </label><input type="password" name="password" id="password" required="required"></br>
					</div>
					<div class="row justify-content-center">
						<label for="apellidos">Email (*): </label><input type="email" name="email" id="email" required="required"></br>
					</div>
					<div class="row justify-content-center">
						<input type="button" id="botonenviar" value="Enviar">
						<input type="button" id="botoncancelar" value="Cancelar">
					</div>
				</div>
				</form>
			</div>
			
           

	
	
	
	</body>
</html>