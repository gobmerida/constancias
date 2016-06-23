<style>
	body {
		background: #FFF;
	}
	.btn{

</style>
		
			<center>
				<h3>Elija la Opción para Entrar al Sistema o Verificar Constancia</h3>
				<br>
				<br>
					
					<button type="button" class="btn btn-primary btn-lg btn-block empleados">Empleados</button>
					<br>
					<button type="button" class="btn btn-success btn-lg btn-block obreros">Obreros</button>
					<br>
					<button type="button" class="btn btn-warning btn-lg btn-block jubilados">Jubilados <span class="hidden-xs">o Pensionados (EMP y OBR)</span></button>
			</center>
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
				});
			</script>


