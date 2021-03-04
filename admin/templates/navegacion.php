<section class="full-box nav-lateral">
			<div class="full-box nav-lateral-bg show-nav-lateral"></div>
			<div class="full-box nav-lateral-content">
				<figure class="full-box nav-lateral-avatar">
					<i class="far fa-times-circle show-nav-lateral"></i>
					<img src="./assets/avatar/sig.png" class="img-fluid" alt="Avatar">
					<figcaption class="roboto-medium text-center">
						<?php //echo $_SESSION['nombre']." ". $_SESSION['apellido']; ?> <br><small class="roboto-condensed-light"><?php //echo $_SESSION['usuario']; ?></small>
					</figcaption>
				</figure>
				<div class="full-box nav-lateral-bar"></div>
				<nav class="full-box nav-lateral-menu">
					<ul>
						<li>
						<a href="admin-area.php"><i class="fab fa-dashcube fa-fw"></i> &nbsp; Inicio</a>
						</li>
						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-book"></i> &nbsp; Pacientes <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="vista-agregar-paciente.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Agregar Paciente</a>
								</li>
								<li>
									<a href="vista-listar-paciente.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de Pacientes</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-book"></i> &nbsp; Gestión Pandemia <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="vista-agregar-gestion.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Agregar gestión Paciente</a>
								</li>
								<li>
									<a href="vista-listar-gestion.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de Gestiones Pacientes</a>
								</li>
							</ul>
						</li>
						 <?php// if($_SESSION['nivel'] == 1){ ?> 
						
					 <?php// } ?>							
					</ul>
				</nav>
			</div>
		</section>
