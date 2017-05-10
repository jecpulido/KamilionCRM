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
    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> NOMBRE USUARIO <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href=""><i class="fa fa-user fa-fw"></i> Perfil</a>
                </li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Configuración</a>
                </li>
                <li class="divider"></li>
                <li><a href="#"><i class="fa fa-sign-out fa-fw"></i> Salir</a>
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
                        <input type="text" class="form-control" placeholder="Buscar caso...">
                        <span class="input-group-btn">
                          <button class="btn btn-default" type="button">Buscar</i></button>
                        </span>
                      </div>
                    </div>
                </li>
                <li>
                    <a href="#">Personal</a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?php echo URL;?>admin/agregarPersona"> Agregar</a></li>
                        <li><a href="<?php echo URL;?>admin/listarPersona"> Listar</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-wrench fa-fw"></i> Usuarios</a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?php echo URL;?>admin/listarUsuario">Listado</a></li>
                        <li><a href="<?php echo URL;?>admin/agregarUsuario">Agregar</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
</nav>