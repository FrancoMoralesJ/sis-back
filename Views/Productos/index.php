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
                    <ol class="breadcrumb float-sm-right ">
                        <li class="breadcrumb-item "><a href="<?php echo base_url; ?>" class="text-olive">Inicio</a></li>
                        <li class="breadcrumb-item active"><?= $data['page_titile']; ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card  card-success card-outline">
                        <div class="card-header p-1">
                            <!--<h3 class="card-title">   Usuarios</h3>--->
                            <button type="submit" class="btn bg-olive font-weight-bold mb-2 " onclick="frmProductos();"> <i class="fas fa-plus"></i><small> Agregar Producto</small></button>
                        </div> <!-- /.card-header -->

                        <div class="card-body table-responsive p-1">
                            <table class="table table-striped border  text-nowrap  table-hover nowrap dt-responsive  dataTable no-footer dtr-inline collapsed" id="tblProductos" cellspacing="0" width="100%">
                                <thead class="bg-olive">
                                    <tr>
                                        <th>#</th>
                                        <th>Imagen</th>
                                        <th>Cod-producto</th>
                                        <th>Descipsión</th>
                                        <th>Precio-compra</th>
                                        <th>Precio-venta</th>
                                        <th>Stock</th>
                                        <th>Stados</th>
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
</div>


<?php require_once 'Views/Templeate/footer.php'; ?>




<div class="modal fade" id="nuevo_productos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog tbl-modal-producto modal_dialog_custom" >
        <div class="modal-content" >
            <div class="modal-header bg-olive">
                <h5 class=" text-white  modal-title" id="title_productos">Registro</h5>
                <button type="button" class="text-danger close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmProductos">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="codigo">Codigo de barras:</label>
                                <div class="input-group">
                                    <input type="hidden" name="id" id="id" class="form-control">
                                    <div class="input-group-prepend" onclick="getCodigo();" >
                                        <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                                    </div>
                                    <input type="text" name="codigo" id="codigo" class="form-control" max="8" placeholder="Ingrese código de barra...">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="descripcion">Descripcion Prod:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-file"></i></span>
                                    </div>
                                    <input type="text" name="descripcion" id="descripcion" class="form-control" max="8" placeholder="Ingrese descripcion...">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="preciocompra">Precio Compra:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-dollar-sign"></i>
                                        </span>
                                    </div>
                                    <input type="number" name="preciocompra" id="preciocompra" class="form-control" max="8" placeholder="Ingrese precio compra...">
                                </div>
                            </div>
                        </div><!-----col-md-6------>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="precioventa">Precio Venta:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-dollar-sign"></i>
                                        </span>
                                    </div>
                                    <input type="number" name="precioventa" id="precioventa" class="form-control" max="8" placeholder="Ingrese precio venta...">
                                </div>
                            </div>
                        </div><!-----col-md-6------>
                    </div><!-----row----->

                    <div class="row">
                    <div class="col-md-4">
                            <div class="form-group">
                                <label for="medida">Marca:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-code-branch"></i>
                                        </span>
                                    </div>
                                    <select name="marcas" id="marcas" class="form-control">
                                        <?php foreach ($data['marcas'] as $row) { ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre_marca']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                            </div>
                        </div><!-----col-md-4------>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="medida">Unidad:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-balance-scale-left"></i>
                                        </span>
                                    </div>
                                    <select name="medida" id="medida" class="form-control">
                                        <?php foreach ($data['medidas'] as $row) { ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                            </div>
                        </div><!-----col-md-4------>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="categoria">Categoría:</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-th"></i></span>
                                    </div>
                                    <select name="categoria" id="categoria" class="form-control ">
                                        <?php foreach ($data['categorias'] as $row) { ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                            </div>
                        </div><!-----col-md-4------>
                        <div class="col-md-12">
                            <div class="form-group ">
                                <label for="foto">Foto:</label>
                                <div class="card ">
                                    <div class="card-body border-success" style="border:1px solid">
                                        <label for="imagen" id="imagen-icon" class="btn bg-olive"><i class="fa fa-camera"></i></label>
                                        <span id="icon-cerrar"></span>
                                        <input type="file" name="imagen" id="imagen" class="d-none" onchange="preview(event);">
                                        <input type="hidden" id="foto_actual" name="foto_actual"></input>

                                        <input type="hidden"></input>
                                        <img class=" img_foto img-thumbnail" id="img-preview">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <button type="button" class="btn   bg-olive btn-block" onclick="registrarProductos(event);" id="btnAccionProductos">Registrar <i class="fas fa-ban"></i></button>
                        </div>
                        <div class="col-sm-6">
                            <button type="button" class="btn btn-danger btn-block" data-dismiss="modal"><b>Cancelar</b> <i class="fas fa-ban"></i></button>
                        </div>
                    </div>

                </form>
            </div><!-----Modal body-------------->

        </div>
    </div>
</div>