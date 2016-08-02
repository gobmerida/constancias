<!DOCTYPE html>
<html lang="es">
<head>
	<title>Crear Usuarios Empleados</title>
	<meta charset="UTF-8">
	<style>
		body{
			background: #FFF;
		}
	</style>
</head>
<?php

?>
<body>
	<center>
	<a href="index.php" class="btn btn-warning"><span class="glyphicon glyphicon-home"></span></a><br>
		<h3 class="n">Crear Usuarios - Obreros</h3><br>
		<div class="msj"></div>
		<form class="form-horizontal" name="formulario" action="reg_obr.php" method="POST">
			<div class="form-group">
	    		<label for="cedula" class="col-sm-4 control-label">Cédula:</label>
	    		<div class="col-sm-7">
					<input type="text" name="cedula" class="form-control" id="cedula" autocomplete=off required minlength="2">
				</div>
			</div>
			<div class="form-group">
				<label for="cuenta" class="col-sm-4 control-label">Últimos Cuatro números de la cuenta nomina: </label>
				<div class="col-sm-7">
					<input type="number" name="cuenta" class="form-control" id="cuenta" autocomplete=off required minlength="2">
				</div>
			</div>
			<div class="form-group">
				<label for="correo" class="col-sm-4 control-label">Correo: </label>
				<div class="col-sm-7">
					<input type="email" name="correo" class="form-control" id="correo" autocomplete=off required minlength="2">
				</div>
			</div>
			<div class="form-group">
				<label for="correo2" class="col-sm-4 control-label">Confirmar correo: </label>
				<div class="col-sm-7">
					<input type="email" name="correo2" class="form-control" id="correo2" autocomplete=off required minlength="2">
				</div>
			</div>
			<div class="form-group">
				<label for="clave" class="col-sm-4 control-label">Clave: </label>
				<div class="col-sm-7">
					<input type="password" name="clave" class="form-control" id="clave" autocomplete=off required minlength="2">
				</div>
			</div>
			<div class="form-group">
				<label for="clave2" class="col-sm-4 control-label">Confirmar Clave: </label>
				<div class="col-sm-7">
					<input type="password" name="clave2" class="form-control" id="clave2" autocomplete=off required minlength="2">
				</div>
			</div>
			<div class="form-group">
  	  			<div class="col-sm-offset-2 col-sm-8">
  	    			<button type="submit" class="btn btn-success">Registrarse</button>
  	  			</div>
  			</div>
  			<div class="form-group">
  	  			<div class="col-sm-offset-2 col-sm-8">
  	    			<button type="reset" class="btn btn-info">Limpiar</button>
  	  			</div>
  			</div>
			<div id="suggestions"></div>
		</form><br>
		<center><span style='font-weight:bold'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

	<script>
	//validacion si ya se encuentra registrado en el sistema y si la cedula no se encuentra en la base de datos(no es empleado)
	var validate1=false;
		(function(){

				$("#cedula").focus();
			$("#cedula").blur(function(){
				$.ajax({

	         		url: "validaciones/ci_obr.php",
	         		type: "POST",
	         		data: $("#cedula").serialize(),
	         		success: function (resp) {
	         			if(resp == "ci1"){
	         				
	         				$("#cedula").addClass("invalid");
	         				$("#cedula").focus();
	         				$(".msj").html('<div class="alert alert-danger" role="alert">Cédula ya registrada en el sistema</div>');
	         				
	         			}
	         			else if (resp == "ci2") {
	         				$("#cedula").addClass("invalid");
		         			$("#cedula").focus();
	         				$(".msj").html('<div class="alert alert-danger" role="alert">Cédula no se encuentra en la base de datos de empleados</div>');

		         				

	         			}
	         			else {
	         				$(".msj").html('');
	         				$("#cedula").removeClass("invalid");
	         				validate1=true;


	         			}
	         			
	         			console.log(resp);
	         		},
	         		error: function (jqXHR,estado,error){
	         			alert("error");
	         			console.log(estado);
	         			console.log(error);
	         		},
	         		complete: function (jqXHR,estado){
	         			console.log(estado);
	         		}

	         		
	        	 })
				

			})

			//validacion si los datos de la cuenta no son correctos
			
				$("#cuenta").blur(function(){
					if (validate1==true){
						$.ajax({
			         		url: "validaciones/cuenta_obr.php",
			         		type: "POST",
			         		data: $(".form-horizontal").serialize(),
			         		success: function (resp) {
			         			if(resp == 0){
			         				//alert("datos de cuenta nomina no validos");
			         				$(".msj").html('<div class="alert alert-danger" role="alert">Datos de cuenta nomina no validos</div>');
			         				$("#cuenta").addClass("invalid");
			         				$("#cuenta").focus();
			         				
			         			}
			         			else {
			         				$(".msj").html('');
			         				$("#cuenta").removeClass("invalid");
			         			
			         			}
			         			console.log(resp);
			         		},
			         		error: function (jqXHR,estado,error){
			         			alert("error");
			         			console.log(estado);
			         			console.log(error);
			         		},
			         		complete: function (jqXHR,estado){
			         			console.log(estado);
			         		}

			         		
			        	 })
					}


				})


			var correo = formulario.correo;
			var correo2 = formulario.correo2;
			var clave = formulario.clave;
			var clave2 = formulario.clave2;
			var validar= function validar(e) {
			var formulario = document.formulario;
			if (correo.value != correo2.value) {
				alert("los correos no coinciden vuelva a introducirlos");
				e.preventDefault()
			}
			if (clave.value != clave2.value) {
				alert("las contraseñas no coinciden vuelva a introducirlas");
				e.preventDefault()
			}
			largopass = formulario.usuario_user.value.length;
        	 if(largopass < 5){
                  alert("La contraseña debe ser al menos de 5 caracteres.");
                  formulario.usuario_user.focus();
                  e.preventDefault()
         	}
		}

		formulario.addEventListener("submit", validar);
		})();
	</script>
</body>
</html>