<?php require_once 'Views/Templeate/header.php'; ?>

<?php require_once 'Views/Templeate/nav_admin.php'; ?>

<div class="content-wrapper pt-5">


    <section class="content-header">
        <div class="container-fluid">
            <div class="row ">
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

    <!----------------=================================================------------------->


    <section class="content mb-0">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header bg-olive">
                    <div class="col-sm-6">
                        <h1 class="my-0 h6"><?= $data['page_titile']; ?> <small><i class="fas fa-building"></i></small></h1>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" id="frmEmpresa">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="">Ruc:</label>
                                        <input type="number" id="ruc" name="ruc" class="form-control" value="<?php echo $data['empresa']['ruc']; ?>" placeholder="Telefono.....">
                                    </div>
                                </div>
                            </div> <!-- /.col-md-6--->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nombre:</label>
                                    <input type="hidden" name="id" id="id" value="<?php echo $data['empresa']['id'] ?>">
                                    <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $data['empresa']['nombre']; ?>" placeholder="Nombre.....">
                                </div>
                            </div> <!-- /.col-md-6--->
                        </div><!--row-1-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="">Telefono:</label>
                                        <input type="number" id="telefono" name="telefono" class="form-control" value="<?php echo $data['empresa']['telefono']; ?>" placeholder="Telefono.....">
                                    </div>
                                </div>
                            </div> <!-- /.col-md-6--->
                            <div class="col-md-6"><!-- /.col-md-6--->
                                <div class="form-group">
                                    <label for="">Dirección:</label>
                                    <input type="text" id="direccion" name="direccion" class="form-control" value="<?php echo $data['empresa']['direccion']; ?>" placeholder="Dirección.....">
                                </div>
                            </div> <!-- /.col-md-6--->
                        </div><!--row--2--->
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="">Mensaje:</label>
                                        <textarea name="mensaje" id="mensaje" cols="10" rows="2" class="form-control" placeholder="Mensaje....."><?php echo $data['empresa']['mensaje']; ?></textarea>
                                    </div>
                                </div>
                            </div> <!-- /.col-md-6--->

                        </div><!--row--2--->


                        <button type="button" class="btn bg-olive" onclick="modificarEmpresa(event);" id="btnModificarEmp">Modificar</button>
                    </form>
                </div>
            </div>
        </div><!--cont-fluit--->

    </section><!----Fin Section---------->
</div>
<?php require_once 'Views/Templeate/footer.php'; ?>