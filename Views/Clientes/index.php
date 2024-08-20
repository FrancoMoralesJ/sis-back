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
                            <button type="submit" class="btn bg-olive font-weight-bold mb-2" onclick="frmCliente();"> <i class="fas fa-plus"></i> <small> Agregar Clientes</small></button>

                        </div> <!-- /.card-header -->
                        <!---table table-bordered  table-head-fixed table-hover text-nowrap  dt-responsive dataTable no-footer dtr-inline collapsed -->
                        <div class="card-body table-responsive p-1">
                            <table class=" table table-striped border  text-nowrap  table-hover nowrap dt-responsive  dataTable no-footer dtr-inline collapsed" id="tblClientes" cellspacing="0" width="100%">
                                <thead class="bg-olive">
                                    <tr>
                                        <th>Id</th>
                                        <th>Dni</th>
                                        <th>Nombre</th>
                                        <th>Telefono</th>
                                        <th>Direccion</th>
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
</div><!--cont-flu--->

</section>
<!-- /.content -->

<!-- /.content -->
</div>



<?php require_once 'Views/Templeate/footer.php'; ?>

<div class="modal fade" id="nuevo_cliente" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-olive ">
                <h5 class="modal-title text-white text-nowrap text-center" id="title_cliente">Registrar cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" id="frmCLiente">
                    <div class="form-group">
                        <label for="dni">Dni:</label>
                        <input type="hidden" name="id" id="id" class="form-control">
                        <input type="number" name="dni" id="dni" class="form-control" max="8" placeholder="Documento de identidad">

                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre de cliente">
                    </div>

                    <div class="form-group">
                        <label for="telefono">Teléfono:</label>
                        <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Teléfono de cliente">
                    </div>
                    <div class="form-group">
                        <label for="direccion">Direccion:</label>
                        <textarea name="direccion" id="direccion" cols="30" rows="3" placeholder="Dirección" class="form-control"></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <button type="button" class="btn bg-olive btn-block" onclick="registrarCliente(event);" id="btnAccion">Registrar Usuario</button>
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Cancelar</button>
                        </div>

                    </div>




                </form>

            </div>


        </div>
    </div>


    <script>
        /*
        function dni() {
            e.preventDefault();
            let url = "https://api.apis.net.pe/v1/dni?numero=71211127";

            let dni = fetch(url)
                .then(function(res) {
                    return res.json();
                })
                .then(function(data) {
                    console.log(data);
                }).catch(function(error) {
                    console.log(error)
                });

            const mostrarData = function(data) {
                console.log(data);
            };
        }
        dni();*/
    </script>