<!-- <a href="http://localhost:8082/KamilionCRM/trunk/KamilionCRM/admin/"><i class="fa fa-user fa-fw"></i> Perfil</a> -->
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no,initial-scale=1.0, maxium-scale=1.0, minimum-scale=1.0 ">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Views/template/css/bootstrap.css">
    <!-- <link rel="stylesheet" href="Views/template/assets/bower_components/bootstrap/dist/css/bootstrap.css"> -->
    <!-- <link rel="stylesheet" href="Views/template/assets/bower_components/metisMenu/dist/metisMenu.min.css">
    <link rel="stylesheet" href="Views/template/assets/dist/css/sb-admin-2.css">
    <link rel="stylesheet" href="Views/template/css/jquery-confirm.min.css">
    <link rel="stylesheet" href="Views/template/assets/bower_components/font-awesome/css/font-awesome.min.css">-->
    <link rel="stylesheet" href="Views/template/css/general.css">
    <title>Document</title>
  </head>
  <body class="default">
    <header>
      <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">{CodeCoding}</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
           <ul class="nav navbar-nav navbar-right">
               <li><a href="#mision">Mision</a></li>
                  <li><a href="https://www.w3schools.com/">Vision</a></li>
                  <li><a href="">Servicios</a></li>
                  <li><a href="">Contacto</a></li>
                  <li><a href="login/">Login</a></li>
                  <li class="hidden dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"> iniciar sesion <span class="glyphicon glyphicon-user "></span>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a href="a">Configuracion</a></li>
                      <li><a href="a">Mis cursos</a></li>
                      <li class="divider"></li>
                      <li><a href="a">Salir</a></li>
                    </ul>
                  </li>
               </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    </header>
    <div class="container-fluid">
      <div class="row">
          <div class="jumbotron">
            <div class="container">
                <h3>{CodeCoding}</h3>
                <p>Da el primer paso para aprender lo que te apasiona, aqui encontraras las bases para desarrollar las aplicaciones que desees en las plataformas que prefieras .</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>

          </div>
        </div>
        <div class="row">
            <div class="jumbotron">
              <div class="container">
                  <h3>{CodeCoding}</h3>
                  <p>Da el primer paso para aprender lo que te apasiona, aqui encontraras las bases para desarrollar las aplicaciones que desees en las plataformas que prefieras .</p>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              </div>

            </div>
          </div>
      <div class="row">
        <div class="jumbotron containerdefault">
          <div class="container">
            <div class="col-md-6" >
              <legend><a name="mision" id="a">Mision</a></legend>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
            <div class="col-md-6">
              <legend>Vision</legend>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

            </div>

          </div>
        </div>

      </div>
    </div>
    <footer class="">
      JOrge
    </footer>
    <script src="Views/template/assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="Views/template/assets/js/jquery-confirm.min.js"></script>
    <script src="Views/template/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="Views/template/assets/bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <script src="Views/template/assets/dist/js/sb-admin-2.js"></script>
    <script>
    $(function(){

   $('a[href*=#]').click(function() {

   if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
       && location.hostname == this.hostname) {
           var $target = $(this.hash);
           $target = $target.length && $target || $('[name=' + this.hash.slice(1) +']');
           if ($target.length) {
               var targetOffset = $target.offset().top;
               $('html,body').animate({scrollTop: targetOffset}, 1000);
               return false;
          }
     }
 });
});
    </script>
  </body>
</html>
