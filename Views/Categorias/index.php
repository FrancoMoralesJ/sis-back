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
                        <div class="card-header p-2">
                            <!--<h3 class="card-title">   Usuarios</h3>--->
                            <button type="submit" class="btn bg-olive font-weight-bold mb-2" onclick="frmCategorias();"> <i class="fas fa-plus"></i><small> Agregar Categorías</small></button>
                        </div> <!-- /.card-header -->

                        <div class="card-body table-responsive p-2 ">
                            <table class="table table-striped border  text-nowrap  table-hover nowrap dt-responsive  dataTable no-footer dtr-inline collapsed" id="tblCategorias" cellspacing="0" width="100%">
                                <thead class="bg-olive">
                                    <tr>
                                        <th>ID</th>
                                        <th>NOM-CATEGORIAS</th>
                                        <th>ESTADO</th>
                                        <th></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div><!----car-boy---->

                </div>
            </div> <!-- /.col-->
        </div><!--row--->
</div><!--cont-fluit--->
</section>
<!-- /.content -->

<!-- /.content -->
</div>



<?php require_once 'Views/Templeate/footer.php'; ?>

<div class="modal fade" id="nuevo_categorias" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-olive ">
                <h5 class="modal-title text-white text-nowrap text-center" id="title_categorias">Registrar </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" id="frmCategorias">
                    <div class="form-group">
                        <label for="dni">Nom-Categoría:</label>
                        <input type="hidden" name="id" id="id" class="form-control">
                        <input type="text" name="nombre" id="nombre" class="form-control" max="8" placeholder="Ingresar-Nueva-Categorias">
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <button type="button" class="btn bg-olive btn-block" onclick="registrarCategorias(event);" id="btnAccion">Registrar Caja</button>
                        </div>

                        <div class="col-sm-6">
                            <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>