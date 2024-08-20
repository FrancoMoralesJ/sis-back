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
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-olive">
                        <div class="card-header">
                            <!--<h3 class="card-title">   Usuarios</h3>--->
                            <button type="submit" class="btn bg-olive font-weight-bold mb-2" onclick="frmMedidas();"> <i class="fas fa-plus"></i><small> Agregar Medidas</small></button>
                        </div> <!-- /.card-header -->

                        <div class="card-body table-responsive ">
                            <table class="table table-striped border  text-nowrap  table-hover nowrap dt-responsive  dataTable no-footer dtr-inline collapsed" id="tblMedidas" cellspacing="0" width="100%">
                                <thead class="bg-olive">
                                    <tr>
                                        <th>Id</th>
                                        <th>Medida</th>
                                        <th>Nom-Corto</th>
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
</div><!--cont-fluid--->
</section>
<!-- /.content -->

<!-- /.content -->
</div>

<?php require_once 'Views/Templeate/footer.php'; ?>



<div class="modal fade" id="nuevo_medidas" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-olive ">
                <h5 class="modal-title text-white text-nowrap text-center" id="title_medidas">Registrar Cajas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" id="frmMedidas">
                    <div class="form-group">
                        <label for="dni">Nom-Medidas:</label>
                        <input type="hidden" name="id" id="id" class="form-control">
                        <input type="text" name="nombre" id="nombre" class="form-control" max="8" placeholder="Ingresa nombre de medida...">
                    </div>
                    <div class="form-group">
                        <label for="dni">Nom-Corto-Medidas:</label>
                        <input type="text" name="nombre_corto" id="nombre_corto" class="form-control" max="8" placeholder="Ingresa nombre corte de medida...">
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <button type="button" class="btn bg-olive btn-block" onclick="registrarMedidas(event);" id="btnAccion">Registrar Caja</button>
                        </div>
                        <div class="col-sm-6">
                            <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>





                </form>


            </div>


        </div>
    </div>