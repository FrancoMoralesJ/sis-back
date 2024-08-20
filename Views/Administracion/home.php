<?php require_once 'Views/templeate/header.php'; ?>

<?php require_once 'Views/templeate/nav_admin.php'; ?>
<div class="content-wrapper pt-5">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="font-weight-light"><?php echo $data['page_name']; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url; ?>" class="text-olive">Inicio</a></li>
                        <li class="breadcrumb-item enable"><?php echo $data['page_title']; ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="conteiner-fluid">
            <div class="row">

                <div class="col-lg-3 col-sm-3">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?php echo $data['total_user']['total']; ?></h3>
                            <p>Usuarios</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <a href="#" class="small-box-footer">Ver detalle.. <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div><!---col-lg-3 "--------------->
                <div class="col-lg-3 col-sm-3">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?php echo $data['total_clientes']['total']; ?></h3>
                            <p>Clientes</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="#" class="small-box-footer">Ver detalle.. <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div><!---col-lg-3 "--------------->
                <div class="col-lg-3  col-sm-3">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3><?php echo $data['total_productos']['total']; ?></h3>
                            <p>Productos</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-box"></i>
                        </div>
                        <a href="#" class="small-box-footer">Ver detalle.. <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div><!---col-lg-3"--------------->
                <div class="col-lg-3 col-sm-3">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?php echo  $data['total_Ventas']['total']; ?></h3>
                            <p>Ventas del día</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        <a href="#" class="small-box-footer">Ver detalle.. <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div><!---col-lg-3 col-6"--------------->

            </div><!---ROW--------------->
        </div>

    </section>
    <section class="content">
        <div class="conteiner-fluid">
            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header bg-olive">
                            Productos con menor stock
                        </div>
                        <div class="card-body ">
                            <canvas id="id_stock" width="400" height="280"> </canvas>
                        </div>
                    </div>
                </div><!---col-xl-6--------------->
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header bg-olive">
                            Productos Mas Vendidos
                        </div>
                        <div class="card-body">
                            <canvas id="pvendidos" width="400" height="280"> </canvas>
                        </div>
                    </div>
                </div><!---col-xl-6--------------->
            </div><!---ROW--------------->
        </div><!---cconteiner-fluid--------------->
    </section>
    <section class="content">
        <div class="conteiner-fluid">
            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header bg-olive">
                            Los productos más vendidos de los últimos 7 días
                        </div>
                        <div class="card-body">
                            <canvas id="id_vendidos_dias" width="400" height="280"></canvas>
                        </div>
                    </div>
                </div><!---col-xl-6--------------->
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header bg-olive">
                            Productos sin stock
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="tblSinStock">
                                <thead>
                                    <tr>
                                        <th scope="col">Foto</th>
                                        <th scope="col">Producto</th>
                                    </tr>
                                </thead>

                                <tbody id="sinStock">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!---col-xl-6--------------->
            </div><!---ROW--------------->
        </div><!---cconteiner-fluid--------------->
    </section>
</div>


<?php require_once 'Views/Templeate/footer.php'; ?>