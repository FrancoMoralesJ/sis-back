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
                                <form id="frmVenta">
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
                                                    <input type="number" name="cantidad" id="cantidad" class="form-control" placeholder="Cantidad.." onkeyup="calcularPrecioVenta(event);" disabled>
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
                                                    <input type="number" name="precio" id="precio" class="form-control" placeholder="Precio Venta.." disabled>
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
                        <table class="table  table-striped border  table-hover text-nowrap  table-hover text-nowrap dt-responsive  " id="tblDetalleVenta" cellspacing="0" width="100%">
                            <thead class="bg-olive">
                                <tr>
                                    <th>#</th>
                                    <th>Descipsión-p</th>
                                    <th>Cantidad</th>
                                    <th>Aplicar</th>
                                    <th>Descuento</th>
                                    <th>Precio</th>
                                    <th>Sub-total</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody id="tblDetalleVentas">

                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="buscarCliente" class="font-weight-bolt">Buscar Cliente:</label>
                                <div class="input-group input-group-custom">
                                    <div class="input-group-prepend">
                                        <small class="input-group-text"><i class="fas fa-user"></i></small>
                                    </div>
                                    <select name="buscarCliente" id="buscarCliente" class="form-control border">
                                        <?php foreach ($data['clientes'] as $row) { ?>
                                            <option value="<?php echo $row['id']; ?>"> <?php echo $row['nombre']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-4 ml-auto">
                            <div class="form-group">
                                <label for="total" class="font-weight-bolt">Total:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <small class="input-group-text">
                                            <i class="fas fa-coins"></i>
                                        </small>
                                    </div>
                                    <input type="text" id="totalV" class="form-control" placeholder="TOTAL.." disabled>
                                    <button class="btn btn-block bg-olive mt-1" type="button" onclick="procesar(2);">Generar Venta <small><i class="fas fa-print"></i></small></button>
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



<div class="modal fade" id="modalImprimiarVenta" tabindex="-1" aria-labelledby="modalVenta" aria-hidden="true">
    <div class="modal-dialog tbl-modal-producto" >
        <div class="modal-content" >
            <div class="modal-header bg-olive">
                <h5 class=" text-white  modal-title" id="title_imprimir">Imprimiar Venta</h5>
                <button type="button" class="text-danger close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="misVentas">
                
            </div><!-----Modal body-------------->

        </div>
    </div>
</div>