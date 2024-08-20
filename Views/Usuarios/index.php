<?php require_once 'Views/Templeate/header.php'; ?>

<?php require_once 'Views/Templeate/nav_admin.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper pt-5">



    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="font-weight-light"><?= $data['page_titile']; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url; ?>" class="text-olive">Inicio</a></li>
                        <li class="breadcrumb-item enable"><?= $data['page_titile']; ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-olive">
                        <div class="card-header p-1 pt-3">
                            <!--<h3 class="card-title">   Usuarios</h3>--->
                            <button type="submit" class="btn  bg-olive font-weight-bold mb-2" onclick="frmUsuario();"> <i class="fas fa-plus"></i> <small>Agregar Usuarios</small></button>
                        </div> <!-- /.card-header -->

                        <div class="card-body table-responsive p-1">
                            <table class="table table-striped border  text-nowrap  table-hover nowrap dt-responsive  dataTable no-footer dtr-inline collapsed" id="tblUsuarios" cellspacing="0" width="100%">
                                <thead class="bg-olive">
                                    <tr>
                                        <th style="width: 50px;">Id</th>
                                        <th>Usuario</th>
                                        <th>Nombre</th>
                                        <th>Caja</th>
                                        <th>Estado</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div><!----car-boy---->

                </div>
            </div> <!-- /.col-->
        </div><!--row--->
</div><!--row--->

</section>
<!-- /.content -->

<!-- /.content -->
</div>



<?php require_once 'Views/Templeate/footer.php'; ?>

<div class="modal fade" id="nuevo_usuario" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-olive">
                <h5 class="modal-title text-white text-nowrap text-center" id="title">Registrar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" id="frmUsuarios">
                    <div class="form-group">
                        <label for="usuario">Usuario:</label>
                        <input type="hidden" name="id" id="id" class="form-control">
                        <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Usuario">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre de usuario">
                    </div>

                    <div class="row" id="claves">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="clave">Contraseña:</label>
                                <input type="text" name="clave" id="clave" class="form-control" placeholder="Contraseña">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="confirmar">Confirmar contraseña:</label>
                                <input type="text" name="confirmar" id="confirmar" class="form-control" placeholder="Confirmar contraseña">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="caja">Caja:</label>
                        <select name="caja" id="caja" class="form-control">
                            <?php foreach ($data['cajas'] as $row) { ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['caja']; ?></option>
                            <?php } ?>

                        </select>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <button type="button" class="btn  bg-olive btn-block" onclick="registrarUser(event);" id="btnAccion">Registrar Usuario</button>
                        </div>
                        <div class="col-sm-6">
                            <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>




                </form>


            </div>


        </div>
    </div>