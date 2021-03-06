<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand title-nav-bar" href="<?php echo URL; ?>admin/">CRM KAMILION</a>
    </div>
    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <?php if (isset($_SESSION['usu_id'])) {
                    echo $_SESSION['usu_id'];
                } else {
                    header("Location:" . URL . "login/");
                } ?> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="<?php echo URL; ?>admin/"><i class="fa fa-user fa-fw"></i> Perfil</a>
                </li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Configuración</a>
                </li>
                <li class="divider"></li>
                <li><a href="<?php echo URL; ?>login/logout"><i class="fa fa-sign-out fa-fw"></i> Salir</a>
                </li>
            </ul>
        </li>
    </ul>
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="form-group">
                        <div class="input-group">
                            <!-- <span class="input-group-addon">$</span> -->
                            <input type="text" class="form-control" id="casoMenu" placeholder="Buscar caso..."
                                   style="border: 1px solid gray !important; border-radius: 2px; padding: 10px">
                            <label id="url" hidden><?php echo URL; ?></label>
                            <span class="input-group-btn">
                          <button class="btn btn-primary" id="buscarCaso" type="button"><i
                                      class="fa fa-search"></i></button>
                        </span>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="#"><i class="fa fa-male"></i> Personal</a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?php echo URL; ?>admin/agregarPersona"> Agregar</a></li>
                        <li><a href="<?php echo URL; ?>admin/listarPersona"> Listar</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-user"></i> Usuarios</a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?php echo URL; ?>admin/listarUsuario">Listado</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-arrow-down"></i> Inbound</a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?php echo URL; ?>inbound/">Asignados</a></li>
                        <li><a href="<?php echo URL; ?>inbound/registroInbound">Registro</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-bar-chart-o"></i> Informes</a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?php echo URL; ?>informe/">Solicitado</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
</nav>
