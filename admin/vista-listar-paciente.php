<?php 
     //require_once 'templates/funciones/sesiones.php';
	 require_once 'templates/funciones/funciones.php';
     require_once 'templates/header.php';
     require_once 'templates/navegacion.php';
     require_once 'templates/barra.php';
	
?>
<!-- Page header -->
<div class="full-box page-header">
				<h3 class="text-left">
					<i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE PACIENTES
				</h3>
				<p class="text-justify">
				En el sigiente apartado se encuentra la lista de todos los pacientes.	
				</p>
			</div>
			
			<div class="container-fluid">
				<ul class="full-box list-unstyled page-nav-tabs">
					<li>
						<a href="vista-agregar-paciente.php"><i class="fas fa-plus fa-fw"></i> &nbsp; NUEVO PACIENTE</a>
					</li>
					<li>
						<a class="active" href="vista-listar-paciente.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE PACIENTE</a>
					</li>
				</ul>	
			</div>

    <!-- Content -->
			<div class="container-fluid">
				<div class="table-responsive">
					<table class="table table-dark table-sm">
						<thead>
							<tr class="text-center roboto-medium">
								<th>Nombres</th>
								<th>Apellidos</th>
								<th>Fecha de nacimiento</th>
								<th>Sexo</th>
								<th>Dirección</th>
								<th>Latitud</th>
								<th>Longitud</th>
								<th>Cédula</th>
								<th>Convencional</th>
								<th>Celular</th>
								<th>Correo</th>
                                <th>Opciones</th>
							</tr>
						</thead>
						<tbody>                      
                          <?php
						  try {
							$sql = "SELECT nombres, apellidos, fecha_nacimiento, sexo, direccion, lat, lng, cedula, convencional, celular, correo FROM public.paciente";
							$resultado = $conn->query($sql); 
						} catch (Exception $e) {
							  $error = $e->getMessage();
						  }
                            while($paciente = $resultado->fetch(PDO::FETCH_ASSOC)) { ?>
                             <tr class="text-center">
                                <td><?php echo $paciente['nombres']; ?></td>
                                <td><?php echo $paciente['apellidos']; ?></td>
                                <td><?php echo $paciente['fecha_nacimiento']; ?></td>
								<td><?php echo $paciente['sexo']; ?></td>
								<td><?php echo $paciente['direccion']; ?></td>
                                <td><?php echo $paciente['lat']; ?></td>
                                <td><?php echo $paciente['lng']; ?></td>								
                                <td><?php echo $paciente['cedula']; ?></td>
                                <td><?php echo $paciente['convencional']; ?></td>
								<td><?php echo $paciente['celular']; ?></td>
                                <td><?php echo $paciente['correo']; ?></td>
                                <td>                                
                                <a href="" data-id="<?php echo $paciente['cedula']?>" data-tipo="paciente" class="btn btn-danger borrar_registro">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                                </td>
                            <tr>
                            <?php } ?>
                        
        			</tbody>
					</table>
				</div>
			</div>
 <?php
	require_once 'templates/footer.php';
?>      