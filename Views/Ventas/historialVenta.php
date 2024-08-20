<?php require_once 'Views/Templeate/header.php'; ?>

<?php require_once 'Views/Templeate/nav_admin.php'; ?>
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
    <section class="content table-responsive mt-0">
        <!-------tabla----------->

        <div class="card">
            <div class="card-body">
                <table class="table table-striped border  text-nowrap  table-hover nowrap dt-responsive  dataTable no-footer dtr-inline collapsed  " id="tblHistorial" cellspacing="0" width="100%">
                    <thead class="bg-olive">
                        <tr>
                            <th>#</th>
                            <th>Total-p</th>
                            <th>F-Compra</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody id="tblDetalle">

                    </tbody>
                </table>
                <!-----/tablaa-------->
            </div>
    </section>
</div>
<?php require_once 'Views/Templeate/footer.php'; ?>