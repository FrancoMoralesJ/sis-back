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


    <section class="content mb-0">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-olive">
                        <div class="card-header bg-olive">
                            <div class="col-sm-6">
                                <h1 class="my-0 h6"><?= $data['page_titile']; ?> <small><i class="fab fa-shopify"></i></small></h1>
                            </div>
                        </div>

                        <div class="card-body ">


                            <div class="row">
                                <form id="frmCompras">
                                    <div class="row p-1">

                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <label for="codigo">Código de barras:</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <small class="input-group-text">
                                                            <li class="fas fa-barcode"></li>
                                                        </small>
                                                    </div>
                                                    <input type="hidden" name="id" id="id">
                                                    <input type="text" name="codigo" id="codigo" class="form-control" placeholder="Código.." onkeyup="buscarCodigoVenta(event);">
                                                </div>


                                            </div>
                                        </div><!--1-col-md-3--->
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">
                                                <label for="descripcion">Descripción:</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <small class="input-group-text">
                                                            <i class="fa fa-file-alt"></i>
                                                        </small>
                                                    </div>
                                                    <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Descripción.." disabled>
                                                </div>
                                            </div>
                                        </div><!--2-col-md-3--->
                                        <div class="col-md-2 col-sm-12">
                                            <div class="form-group">
                                                <label for="cantidad">Cantidad:</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <small class="input-group-text">
                                                            <i class="fas fa-sort-amount-up-alt"></i>
                                                        </small>
                                                    </div>
                                                    <input type="number" name="cantidad" id="cantidad" class="form-control" placeholder="Cantidad.." onkeyup="calcularPrecio(event);" disabled>
                                                </div>
                                            </div>
                                        </div><!--3-col-md-3--->
                                        <div class="col-md-2 col-sm-12">
                                            <div class="form-group">
                                                <label for="precioV">Precio:</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <small class="input-group-text">
                                                            <i class="fas fa-money-bill-alt"></i>
                                                        </small>
                                                    </div>
                                                    <input type="number" name="precioV" id="precioV" class="form-control" placeholder="Precio Venta.." disabled>
                                                </div>
                                            </div>
                                        </div><!--4-col-md-3--->
                                        <div class="col-md-2 col-sm-12">
                                            <div class="form-group">
                                                <label for="sub_total">Sub-Total:</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <small class="input-group-text">
                                                            <i class="fas fa-dollar-sign"></i>
                                                        </small>
                                                    </div>

                                                    <input type="number" name="sub_total" id="sub_total" class="form-control" placeholder="Sub total.." disabled>
                                                </div>
                                            </div>
                                        </div><!--5-col-md-3--->



                                    </div><!--row --->
                                </form>
                            </div>


                        </div><!----car-boy---->


                    </div>
                </div> <!-- /.col-->

            </div><!--row--->
        </div><!--cont-fluit--->

    </section><!----Fin Section---------->

    <section class="content mt-0">
        <!-------tabla----------->
        <div class="container-fluid">

            <div class="card">
                <div class="card-body p-2 ">
                    <div class="table-responsive">
                        <table class="table  table-striped border  table-hover text-nowrap  table-hover text-nowrap dt-responsive  " id="tblDetalle" cellspacing="0" width="100%">
                            <thead class="bg-olive">
                                <tr>
                                    <th>#</th>
                                    <th>Descipsión-p</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th>Sub-total</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody id="tblDetalles">

                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                            <div class="col-md-3">
                                    <div class="form-group">

                                        <label for="buscarCliente" class="font-weight-bolt">Buscar Cliente:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <small class="input-group-text"><i class="fas fa-user"></i></small>
                                            </div>
                                            <input type="text" id="buscarCliente" name="buscarCliente" class="form-control" placeholder="Buscar Cliente...">
                                        </div>
                                        
                                    </div>
                            </div>
                            <div class="col-md-3 ">
                                <div class="form-group">
                                    <label for="telefonoCliente" class="font-weight-bolt">Teléfono:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <small class="input-group-text">
                                                <i class="fas fa-phone"></i>
                                            </small>
                                        </div>
                                        <input type="number" name="telefonoCliente" id="telefonoCliente" class="form-control" placeholder="Teléfono..." disabled>
                                    </div>

                                </div>
                            </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="direccionCliente" class="font-weight-bolt">Dirección:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <small class="input-group-text">
                      
                      
                                        <li class="fas fa-home"></li>
                                        </small>
                                    </div>
                                    <input type="text" name="direccionCliente" id="direccionCliente" class="form-control" placeholder="Dirección..." disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 ">
                            <div class="form-group">
                                <label for="total" class="font-weight-bolt">Total:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <small class="input-group-text">
                                            <i class="fas fa-coins"></i>
                                        </small>
                                    </div>
                                    <input type="text" id="totalV" class="form-control" placeholder="TOTAL.." disabled>
                                    <button class="btn btn-block bg-olive mt-1" type="button" onclick="generarVenta();">Generar Venta <small><i class="fas fa-calculator"></i></small></button>
                                </div>
                            </div>
                        </div><!--total-col-md-3--->
                    </div><!--row--->

                    <!-----/tablaa-------->
                </div>
            </div>
        </div><!-----cont-fluid-------->

    </section>


    <!-- /.content -->
</div>



<?php require_once 'Views/Templeate/footer.php'; ?>