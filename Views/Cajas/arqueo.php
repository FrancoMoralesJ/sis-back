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
                            <button  class="btn bg-olive font-weight-bold mb-2" onclick="frmAbrirCaja();"> <i class="fas fa-plus text-white "></i> <small class="text-white ">Abrir Caja</small></button>
                            <button  class="btn bg-warning font-weight-bold mb-2" onclick="frmCerrarCaja();" id="btnCerrar" > <i class="fas fa-plus  "></i> <small class="">Cerrar Caja</small></button>
                             <style>
                                input[type="checkbox"] {
    position: relative;
    width: 60px;
    height: 30px;
    -webkit-appearance: none;
    appearance: none; /* Asegura compatibilidad con todos los navegadores */
    background: rgb(168, 168, 168);
    outline: none;
    border-radius: 15px;
    box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.5);
    cursor: pointer; /* Agrega un cursor de puntero para indicar que es interactivo */
}

input[type="checkbox"]:checked {
    background: rgb(0, 123, 255);
}

input[type="checkbox"]::before {
    content: "";
    position: absolute;
    width: 30px;
    height: 30px;
    border-radius: 20px;
    top: 0;
    left: 0;
    background: white;
    transition: 0.5s;
}

input[type="checkbox"]:checked::before {
    left: 30px;
}
                             </style>
                          
                        </div> <!-- /.card-header -->

                        <div class="card-body table-responsive p-1">
                            <table class="table table-striped border  text-nowrap  table-hover nowrap dt-responsive 
                             dataTable no-footer dtr-inline collapsed" id="tbl_cajaApertura" cellspacing="0" width="100%">
                                <thead class="bg-olive">
                                    <tr>
                                        <th>Id</th>
                                        <th>Monto-Inicial</th>
                                        <th>Monto-Final</th>
                                        <th>Fecha-apertura</th>
                                        <th>Fecha-cierre</th>
                                        <th>Total-Ventas</th>
                                        <th>Monto-total</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>

                                <tfoot class="bg-olive">
                                <tr>
                                        <th>Id</th>
                                        <th>Monto-Inicial</th>
                                        <th>Monto-Final</th>
                                        <th>Fecha-apertura</th>
                                        <th>Fecha-cierre</th>
                                        <th>Total-Ventas</th>
                                        <th>Monto-total</th>
                                        <th>Estado</th>
                                    </tr>
                                </tfoot>
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


<div class="modal fade" id="apertura_caja" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header bg-olive ">
                <h5 class="modal-title text-white text-nowrap text-center" id="title_caja_apertura">Abrir Cajas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" id="frmCajaApertura" onsubmit="abriCaja(event);">
                   

                    <div class="form-group">
                        <label for="txt_fecha_apertura">Fecha:</label>
                        <input type="hidden" name="id" id="id" class="form-control">
                        <input type="date" name="txt_fecha_apertura" id="txt_fecha_apertura" class="form-control" value="<?php echo date('Y-m-d');?>">
                    </div> 
                    <div class="form-group">
                        <label for="txt_caja_apertura">Monto Inicial:</label>
                        <input type="text" name="txt_caja_apertura" id="txt_caja_apertura" class="form-control" max="8" placeholder="Ingrese">
                    </div>

                    <div class="row" id="informes">
                        <div class="col-md-6">
                            
                            <div class="form-group">
                                <label for="txt_totalVentas">Total Ventas:</label>
                                <input type="text" name="txt_totalVentas" id="txt_totalVentas" class="form-control" max="8" placeholder="00.00" disabled>
                            </div>
                            <div class="form-group">
                                <label for="txt_montoFinal">Monto Final:</label>
                                <input type="text" name="txt_montoFinal" id="txt_montoFinal" class="form-control" max="8" placeholder="00.00" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            
                            <div class="form-group">
                                <label for="txt_totalMontoFinal">Monto Final:</label>
                                <input type="text" name="txt_totalMontoFinal" id="txt_totalMontoFinal" class="form-control" max="8" placeholder="00.00" disabled>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn bg-olive"  id="btn_caja"  > Abrir Caja</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>


                </form>


            </div>


        </div>
    </div>