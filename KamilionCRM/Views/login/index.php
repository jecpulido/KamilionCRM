<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">Ingresar al sistema</h3>
                </div>
                <div class="panel-body">
                    <form role="form" action="<?php echo URL."login"; ?>" method="post">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="contoso@gmail.com" name="usu_id" type="text" autocomplete="off" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="usu_pass" type="password" >
                            </div>
                            <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                        </fieldset>
                    </form>
                    <br>
                    <?php if (isset($_SESSION['Error'])){ ?>
                    <?php if (($_SESSION['Error'])){ ?>
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Error! <?php echo \Lib\Session::get('Error'); ?></strong>
                    </div>
                        <?php }?>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>

