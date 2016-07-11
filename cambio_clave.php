<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Sistemas de Constancias y Recibos de Pagos</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body>
	
	<header>
		<nav class="navbar navbar-inverse navbar-fixed-top">
  		<div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
			    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			    </button>
		      	<a class="navbar-brand" href="#">RRHH</a>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		    	<ul class="nav navbar-nav">
			        <li class="active inicio"><a href="#">Inicio <span class="sr-only">(current)</span></a></li>
			        <li><a href="#" class="empleados">Empleados</a></li>
			        <li><a href="#" class="obreros">Obreros</a></li>
			        <li><a href="#" class="jubilados">Jubilados</a></li>
			        <li><a href="#" class="verificar">Verificar Constancia</a></li>
			        <li><a href="#">Ayuda</a></li>
		        </ul>
		    </div><!-- /.navbar-collapse -->
  		</div><!-- /.container-fluid -->
	</nav>
			<div class="jumbotron">
			<img src="img/header4.jpg" class="img-responsive" alt="">
			</div>
		
	</header>
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
			<div class="form-group" align="center">
  	  			<div class="col-sm-offset-2 col-sm-8">
  	    			<button type="submit" class="btn btn-success">Cambiar Clave</button>
  	  			</div>
  			</div>
  			<div class="form-group" align="center">
  	  			<div class="col-sm-offset-2 col-sm-8">
  	    			<button type="reset" class="btn btn-info">Limpiar</button>
  	  			</div>
  			</div>
		</form>
		<script src="js/jquery-1.12.3.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/magicslideshow.js"></script>
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