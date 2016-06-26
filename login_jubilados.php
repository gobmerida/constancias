<style>
	body {
		background: #FFF;
	}
</style>
<center>
	<h3>Sistema - Jubilados o Pensionados</h3>
</center>
<form class="form-horizontal" method="POST" action="session/sesiones2.php">
  <div class="form-group">
    <label for="cedula" class="col-sm-2 control-label">Cédula:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" name="cedula" id="cedula" placeholder="Cedula" required autocomplete="off" maxlength="8">
    </div>
  </div>
  <div class="form-group">
    <label for="clave" class="col-sm-2 control-label">Contraseña:</label>
    <div class="col-sm-8">
      <input type="password" class="form-control" name="clave" id="clave" placeholder="Contraseña" required autocomplete="off" maxlength="15">
    </div>
  </div>
  <div class="form-group">
   
  </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-8">
        <button type="submit" class="btn btn-success">Ingresar</button>
    <a  class="btn btn-warning">¿Olvido su Contraseña?</a>
      </div>
    </div>
    
      <center>
        <a class="btn btn-primary registrar">Registrarse</a>
      </center>
  
</form>
<script>
  $(function(){
      $(".registrar").click(function(){
        $("#main").load("registrar_jubilados.php");
      });
      
    });
</script>

