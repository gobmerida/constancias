<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cambio de Clave</title>
</head>
<body>	<form class="form-horizontal" name="formulario" action="cc.php" method="POST">
			<div class="form-group">
				<label for="clavea" class="col-sm-4 control-label">Clave Actual: </label>
				<div class="col-sm-7">
					<input type="password" name="clavea" class="form-control" id="clavea" autocomplete=off required minlength="2">
				</div>
			</div>
			<div class="form-group">
				<label for="clave" class="col-sm-4 control-label">Nueva Clave: </label>
				<div class="col-sm-7">
					<input type="password" name="clave" class="form-control" id="clave" autocomplete=off required minlength="2">
				</div>
			</div>
			<div class="form-group">
				<label for="clave2" class="col-sm-4 control-label">Repita nueva Clave: </label>
				<div class="col-sm-7">
					<input type="password" name="clave2" class="form-control" id="clave2" autocomplete=off required minlength="2">
				</div>
			</div>
			<div class="form-group">
  	  			<div class="col-sm-offset-2 col-sm-8">
  	    			<button type="submit" class="btn btn-success">Cambiar Clave</button>
  	  			</div>
  			</div>
  			<div class="form-group">
  	  			<div class="col-sm-offset-2 col-sm-8">
  	    			<button type="reset" class="btn btn-info">Limpiar</button>
  	  			</div>
  			</div>
		</form>
</body>
<script>
		(function(){
			var clave = formulario.clave;
			var clave2 = formulario.clave2;
			var validar= function validar(e) {
				if (clave.value != clave2.value) {
					alert("las contraseñas no coinciden vuelva a introducirlas");
					e.preventDefault()
				}

			}

		formulario.addEventListener("submit", validar);
		})();
	</script>
</html>