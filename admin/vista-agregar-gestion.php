<?php 
    //require_once 'templates/funciones/sesiones.php';
    require_once 'templates/funciones/funciones.php';
	require_once 'templates/header.php';
    require_once 'templates/navegacion.php';
    require_once 'templates/barra.php';
?>
<head>
<script type="text/javascript">
function ejemplo() {
	window.location.href = 'vista-listar-gestion.php';
}
</script>
</head>
<!-- Page header -->
<div class="full-box page-header">
		<h3 class="text-left">
			<i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR GESTIÓN PACIENTE
		</h3>
		<p class="text-justify">
			En el siguiente apartado podra ingresar la gestión de un paciente.
		</p>
	</div>

	<div class="container-fluid">
		<ul class="full-box list-unstyled page-nav-tabs">
			<li>
				<a class="active" href="vista-agregar-gestion.php"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR GESTIÓN PACIENTE</a>
			</li>
			<li>
				<a href="vista-listar-gestion.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE GESTIONES PANDEMIA</a>
			</li>			
		</ul>	
	</div>
	
	<!-- Content here-->
	<div class="container-fluid">
		<form action="modelo-gestion.php" method="POST" name="guardar-registro" id="guardar-registro"  class="form-neon" autocomplete="off">
			<fieldset>
				<legend><i class="fas fa-user"></i> &nbsp; Información básica</legend>
				<div class="container-fluid">
					<div class="row">						
						<div class="col-12 col-md-6">
					    	<div class="form-group">
			 		 		  <label for="id_paciente" class="bmd-label-floating">Paciente</label>
								 <select class="form-control" name="id_paciente">
                                 <option value="" selected="" disabled="">Seleccione un Paciente</option>
                                       <?php
                                       
                                       try {
                                           $sql = "SELECT * FROM paciente";
                                           $resultado = $conn->query($sql);
                                           while($paciente = $resultado->fetch(PDO::FETCH_ASSOC)) { ?>
                                            <option value="<?php echo $paciente['cedula'] ?>">
                                             <?php echo $paciente['nombres']; ?> <?php echo $paciente['apellidos']; ?>
                                             </option>
                                           <?php } 
                                       } catch (Exception $e) {
                                        echo "Error: " . $e->getMessage();
                                       }
                                       
                                       ?>
								  </select>
							 </div>
						</div>	
						
						<div class="col-12 col-md-6">
							<div class="form-group">
								<label for="num_personas_vive" class="bmd-label-floating">Número de personas con las que vive</label>
								<input type="number" class="form-control" name="num_personas_vive" id="num_personas_vive">
							</div>
						</div>
						<div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="trabaja" class="bmd-label-floating">Trabaja</label>
                                    <select class='form-control' name="trabaja" id="trabaja">
                                    <option value="" selected="" disabled="">Seleccione una opción</option>
                                        <option value="Si">Si</option>
                                        <option value="No">No</option>
                                    </select>    
                                </div>
                            </div> 
						<div class="col-12 col-md-6">
							<div class="form-group">
								<label for="institucion_trabaja" class="bmd-label-floating">Lugar donde trabaja</label>
								<input type="text" class="form-control" name="institucion_trabaja" id="institucion_trabaja">
							</div>
						</div>
						<div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="estudia" class="bmd-label-floating">Estudia</label>
                                    <select class='form-control' name="estudia" id="estudia">
                                    <option value="" selected="" disabled="">Seleccione una opción</option>
                                        <option value="Si">Si</option>
                                        <option value="No">No</option>
                                    </select>    
                                </div>
                            </div>
						<div class="col-12 col-md-6">
							<div class="form-group">
								<label for="institucion_estudia" class="bmd-label-floating">Lugar donde estudia</label>
								<input type="text" class="form-control" name="institucion_estudia" id="institucion_estudia">
							</div>
						</div>
						<div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="enfermedad" class="bmd-label-floating">Tiene alguna enfermedad catastrófica</label>
                                    <select class='form-control' name="enfermedad" id="enfermedad">
                                    <option value="" selected="" disabled="">Seleccione una opción</option>
                                        <option value="Si">Si</option>
                                        <option value="No">No</option>
                                    </select>    
                                </div>
                            </div>
							<div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="diabetes" class="bmd-label-floating">Diabetes</label>
                                    <select class='form-control' name="diabetes" id="diabetes">
                                    <option value="" selected="" disabled="">Seleccione una opción</option>
                                        <option value="Si">Si</option>
                                        <option value="No">No</option>
                                    </select>    
                                </div>
                            </div>
							<div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="sobrepeso" class="bmd-label-floating">Sobrepeso</label>
                                    <select class='form-control' name="sobrepeso" id="sobrepeso">
                                    <option value="" selected="" disabled="">Seleccione una opción</option>
                                        <option value="Si">Si</option>
                                        <option value="No">No</option>
                                    </select>    
                                </div>
                            </div>
							<div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="asegurado_iess" class="bmd-label-floating">Asegurado al IESS</label>
                                    <select class='form-control' name="asegurado_iess" id="asegurado_iess">
                                    <option value="" selected="" disabled="">Seleccione una opción</option>
                                        <option value="Si">Si</option>
                                        <option value="No">No</option>
                                    </select>    
                                </div>
                            </div>
						<div class="col-12 col-md-6">
							<div class="form-group">
								<label for="nombre_contacto_emergencia" class="bmd-label-floating">Nombre de contacto de emergencia</label>
								<input type="text" class="form-control" name="nombre_contacto_emergencia" id="nombre_contacto_emergencia">
							</div>
						</div>
						<div class="col-12 col-md-6">
							<div class="form-group">
								<label for="celular_contacto_emergencia" class="bmd-label-floating">Celular de contacto de emergencia</label>
								<input type="text" class="form-control" name="celular_contacto_emergencia" id="celular_contacto_emergencia">
							</div>
						</div>
						<div class="col-12 col-md-6">
							<div class="form-group">
								<label for="mail_contacto_emergencia" class="bmd-label-floating">Email de contacto de emergencia</label>
								<input type="text" class="form-control" name="mail_contacto_emergencia" id="mail_contacto_emergencia">
							</div>
						</div>
                    </div>
				</div>
			</fieldset>
			<br><br><br>
			<p class="text-center" style="margin-top: 40px;">
				<input type="hidden" name="registro" value="nuevo">
				<button type="submit" onclick="ejemplo()" class="btn btn-raised btn-info btn-sm"><i class="far fa-save"></i> &nbsp; GUARDAR</button>
			</p>
		</form>
	</div>

<?php
	require_once 'templates/footer.php';
?>