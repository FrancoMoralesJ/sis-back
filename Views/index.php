<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in (v2)</title>
    <link rel="shortcut icon" href="<?php echo base_url; ?>Assets/img/logo.png" type="image/x-icon">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url; ?>Assets/css/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url; ?>Assets/css/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url; ?>Assets/css/adminlte.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url; ?>Assets/css/estilos.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo <p class="login-box-msg">Iniciar Session</p>-->
        <div class="card card-outline  ">
            <div class="card-header text-center">
                

                <div class="d-flex justify-content-center">
                    <img src="<?php base_url; ?>Assets/img/icons3.png" alt="" width="100">
                </div>

                <p class="h5 text-secondary"><b>Sistema</b>Ventas</a></p>
            </div>
            <div class="card-body ">
                <!--<p class="login-box-msg">Iniciar Session</p>-->

                <form method="post" id="frmLogin">
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <div class="input-group-text bg-olive">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        <input type="text" class="form-control" id="User" name="User" placeholder="Usuario">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <div class="input-group-text bg-olive">
                                <span class=" fas fa-lock"></span>
                            </div>
                        </div>
                        <input type="password" class="form-control" id="Pass" name="Pass" type="password" placeholder="Contraseña">
                    </div>
                    <div class="alert alert-danger text-center d-none " id="alerta" role="alert">
                    </div>

                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn bg-olive btn-block" onclick="frmLogin(event);">
                                Ingresar</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>





            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->
    <script>
        const base_url = "<?php echo base_url; ?>";
    </script>
    <!-- jQuery -->
    <script src="<?php echo base_url; ?>Assets/js/plugins/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url; ?>Assets/js/plugins/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url; ?>Assets/js/plugins/adminlte.min.js"></script>

    <script src="<?php echo base_url; ?>Assets/js/login.js"></script>
</body>

</html>