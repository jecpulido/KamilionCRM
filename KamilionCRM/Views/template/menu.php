<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php">crm kamilion</a>
		</div>
		<!-- /.navbar-header -->

		<ul class="nav navbar-top-links navbar-right">

			<!-- /.dropdown -->
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">
					<i class="fa fa-user fa-fw"></i> NOMBRE USUARIO <i class="fa fa-caret-down"></i>
				</a>
				<ul class="dropdown-menu dropdown-user">
					<li><a href="<?php echo URL; ?>admin/"><i class="fa fa-user fa-fw"></i> Perfil</a>
					</li>
					<li><a href="#"><i class="fa fa-gear fa-fw"></i> Configuración</a>
					</li>
					<li class="divider"></li>
					<li><a href="<?php echo URL?>"><i class="fa fa-sign-out fa-fw"></i> Salir</a>
					</li>
				</ul>
				<!-- /.dropdown-user -->
			</li>
			<!-- /.dropdown -->
		</ul>
		<!-- /.navbar-top-links -->

		<div class="navbar-default sidebar" role="navigation">
			<div class="sidebar-nav navbar-collapse">
				<ul class="nav" id="side-menu">
					<li class="sidebar-search">
						<div class="input-group custom-search-form">
							<input type="text" class="form-control" placeholder="Buscar caso..." >
							<span class="input-group-btn">
								<button class="btn btn-default" type="button">
									<i class="fa fa-search"></i>
								</button>
							</span>
						</div>
						<!-- /input-group -->
					</li>
					<li>
						<a href="#"><i class="fa fa-gear"></i> Administracion<span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
							<li>
								<a href="#"><i class="fa fa-male"></i> Personal<span class="fa arrow"></span></a>
								<ul class="nav nav-third-level">
									<li><a href="<?php echo URL; ?>admin/agregarPersona" class="fa fa-plus"> Agregar</a></li>
					        <li><a href="<?php echo URL; ?>admin/listarPersona" class="fa fa-list-alt"> Listar</a></li>
								</ul>
							</li>
							<li>
								<a href="#"><i class="fa fa-user"></i> Usuarios<span class="fa arrow"></span></a>
								<ul class="nav nav-third-level">
									<li><a href="<?php echo URL; ?>admin/agregarUsuario" class="fa fa-plus"> Agregar</a></li>
					        <li><a href="<?php echo URL; ?>admin/listarUsuario" class="fa fa-list-alt"> Listar</a></li>
								</ul>
							</li>
						</ul>

						<!-- /.nav-second-level -->
					</li>

					<li>
						<a href="#"><i class="fa fa-pencil"></i> Inbound<span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
							<li><a href="<?php echo URL; ?>inbound/asignar" class="fa fa-list-alt"> Asignar</a></li>
							<li><a href="<?php echo URL; ?>inbound/registro" class="fa fa-edit"> Registro</a></li>
            	<li><a href="<?php echo URL; ?>inbound/consulta" class="fa fa-search"> Consulta</a></li>
						</ul>
						<!-- /.nav-second-level -->
					</li>
					<li>
						<a href="#"><i class="fa fa-level-up"></i> Escalamiento<span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
							<li><a href="<?php echo URL; ?>escalamiento/asignacion" class="fa fa-list-alt"> Asignacion</a></li>
							<li><a href="<?php echo URL; ?>escalamiento/registro" class="fa fa-edit"> Registro</a></li>
							<li><a href="<?php echo URL; ?>escalamiento/consulta" class="fa fa-search"> Consulta</a></li>
						</ul>
						<!-- /.nav-second-level -->
					</li>
					<li>
						<a href="#"><i class="fa fa-bar-chart-o"></i> Informes<span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
							<li><a href="#" class="fa fa-list-ol"> Productividad</a></li>
						</ul>
						<!-- /.nav-second-level -->
					</li>
				</ul>
			</div>
			<!-- /.sidebar-collapse -->
		</div>
		<!-- /.navbar-static-side -->
	</nav>
