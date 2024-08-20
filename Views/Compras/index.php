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
                        <div class="col-md-3 col-sm-12">
                        <div class="form-group">
                                                <label for="buscarProductos">Filtro:</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <small class="input-group-text">
                                                        <i class="fas fa-search-plus"></i>
                                                        </small>
                                                    </div>
                                                   
                                                    <button  class="form-control btn bg-olive"  onclick="buscar_productos(event);" id="buscarProductos"> Buscar producto </button>
                                                </div>
                                       </div>
                             </div>   <!--1-col-md-3--->
                        </div> 

                            <div class="row">
                            
                            
                                <form id="frmCompras">
                                    <div class="row p-1">

                                        <!-- <div class="col-md-3 col-sm-12"> -->
                                            <!-- <div class="form-group">
                                                <label for="codigo">Código de barras:</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <small class="input-group-text">
                                                            <li class="fas fa-barcode"></li>
                                                        </small>
                                                    </div>
                                                    <input type="hidden" name="id" id="id">
                                                    <input type="text" name="codigo" id="codigo" class="form-control" placeholder="Código.."
                                                     onkeyup="buscarCodigo(event);">
                                                </div>


                                            </div> -->
                                            <!-- <div class="form-group">
                                                <label for="buscarProductos" id="buscar__Productos">Filtro:</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <small class="input-group-text">
                                                        <i class="fas fa-search-plus"></i>
                                                        </small>
                                                    </div>
                                                    <input type="hidden" name="id" id="id">
                                                    <button  class="form-control btn bg-olive"  onclick="buscar_productos(event);" id="buscarProductos"> Buscar producto </button>
                                                </div>


                                            </div>


                                        </div> -->
                                        <!--1-col-md-3--->







                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label for="descripcion">Descripción:</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <small class="input-group-text">
                                                            <i class="fa fa-file-alt"></i>
                                                        </small>
                                                    </div>
                                                    <input type="hidden" name="id" id="id">
                                                    <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Descripción.." disabled>
                                                </div>
                                            </div>
                                        </div><!--2-col-md-3--->
                                        <div class="col-md-4 col-sm-12">
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
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label for="precio">Precio:</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <small class="input-group-text">
                                                            <i class="fas fa-money-bill-alt"></i>
                                                        </small>
                                                    </div>
                                                    <input type="number" name="precio" id="precio" class="form-control" placeholder="Precio Compra.." disabled>
                                                </div>
                                            </div>
                                        </div><!--4-col-md-3--->
                                        <div class="col-md-4 col-sm-12">
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
                        <div class="col-md-4 ml-auto">
                            <div class="form-group">
                                <label for="total" class="font-weight-bolt">Total:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <small class="input-group-text">
                                            <i class="fas fa-coins"></i>
                                        </small>
                                    </div>
                                    <input type="text" id="totalP" class="form-control" placeholder="TOTAL.." disabled>
                                    <button class="btn btn-block bg-olive mt-1" type="button" onclick="procesar(1);">Generar Compras <small><i class="fas fa-calculator"></i></small></button>
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


<div class="modal fade" id="buscar_productos" tabindex="-1" role="dialog" aria-hidden="true">
            <div class=" tbl-modal-producto modal-dialog  modal_dialog_custom" role="document" >

                    <div class="modal-content">
                        <div class="modal-header bg-olive ">
                            <h5 class="modal-title text-white text-nowrap text-center" id="title_buscar">Buscar Productos</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                
                            <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label for="txt_codigo">Buscar por código:</label>
                                            <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <small class="input-group-text">
                                                        <li class="fas fa-barcode"></li>
                                                        </small>
                                                        </div>
                                                    
                                                    <input type="text" name="txt_codigo" id="txt_codigo" class="form-control"
                                                    oninput="buscarProducto(event);" placeholder="Código prod.." >
                                                </div>                                                   


                                        </div>
                                </div><!--1-col-md-3--->  

                            <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label for="txt_nombrePoducto">Buscar por nombre:</label>
                                            <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <small class="input-group-text">
                                                        <i class="fas fa-box"></i>
                                                        </small>
                                                        </div>
                                                    
                                                    <input type="text" name="txt_nombreProducto" id="txt_nombreProducto" class="form-control"
                                                    oninput="buscarProducto(event);" placeholder="Nombre prod.." >
                                                </div>                                                   


                                        </div>
                                </div><!--1-col-md-3--->     
                                            

                            <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label for="">Buscar por marca:</label>
                                            <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <small class="input-group-text">
                                                        <i class="fas fa-code-branch"></i>
                                                        </small>
                                                        </div>
                                                    
                                                    <select name="txt_marca" id="txt_marca" class="form-control" onchange="buscarProducto(event);">
                                                        <option value="">Seleccione una marca</option>
                                                        <?php foreach ($data['marcas'] as $row) { ?>
                                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre_marca']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>                                                   


                                        </div>
                                </div><!--1-col-md-3--->     
                                            
            
                                            
                            </div><!--row--->  
                            
                            <div class="row">
                            <div class="table-responsive">
                                    <table class="table  table-striped border  table-hover text-nowrap  table-hover text-nowrap dt-responsive  " id="tblbuscar" cellspacing="0" width="100%">
                                        <thead class="bg-olive">
                                            <tr>
                                                
                                                <th>Codigo</th>
                                                <th>Acción</th>
                                                <th>Foto</th>
                                                <th>Descripción</th>
                                                <th>Marca</th>
                                                <th>Stock</th>
                                                <th>Estado</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tblbuscarContent">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row mt-5">
                                    <div class="col-sm-8">
                                    </div>
                                    <div class="col-sm-4">
                                            <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Cancelar</button>
                                    </div>
                            </div><!--row--->  

                        </div>


                    </div>
                </div>
</div>



<div class="modal fade" id="modalImprimirCompra" tabindex="-1" aria-labelledby="compra" aria-hidden="true">
    <div class="modal-dialog " >
        <div class="modal-content" > 
            <div class="modal-header bg-olive">
                <h5 class=" text-white  modal-title" id="title_imprimir_compra">Imprimiar Compra</h5>
                <button type="button" class="text-danger close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe class="imprimir" id="imprimirCompra"  style="width: 100%; height:80vh;" >

                </iframe>
            </div><!-----Modal body-------------->

        </div>
    </div>
</div>










    
    