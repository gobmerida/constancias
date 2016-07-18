<style>
	body {
		background: #FFF;
	}
	.btn{

</style>
		
			
				<div class="col-md-6">
					<h3 align="center">Elija la Opción para Entrar al Sistema</h3>
					<br>
						
						<button type="button" class="btn btn-primary btn-lg btn-block empleados"><span class="glyphicon glyphicon-option-vertical" aria-hidden="true">Empleados</button>
						<br>
						<button type="button" class="btn btn-success btn-lg btn-block obreros"><span class="glyphicon glyphicon-option-vertical" aria-hidden="true">Obreros</button>
						<br>
						<button type="button" class="btn btn-warning btn-lg btn-block jubilados"><span class="glyphicon glyphicon-option-vertical" aria-hidden="true">Jubilados <span class="hidden-xs">o Pensionados (EMP y OBR)</span></button>
				</div>
				<div class="col-md-6">
				<h3 align="center">Modulo de Verificación</h3>
				<br>
					<button type="button" class="btn btn-info btn-lg btn-block verificar"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Verificar Constancia</button>
					<br>
				
				</div>
				<br><br><br><br><br><br>
			<script>
				$(function(){

					$(".empleados").click(function(){
						$("#main").load("login_empleados.php");
					});
					$(".obreros").click(function(){
						$("#main").load("login_obreros.php");
					});
					$(".jubilados").click(function(){
						$("#main").load("login_jubilados.php");
					});
					$(".verificar").click(function(){
						$("#main").load("verificar.php");
					});
				});
			</script>


