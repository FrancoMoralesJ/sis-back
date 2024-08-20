<div class="modal fade" id="nuevaClave" tabindex="-1" role="dialog" aria-labelledby="nuevaClave" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-olive">
                <h5 class="modal-title" id="exampleModalLabel">Modificar Contraseña</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="form-group" id="frmCambiarPass" onsubmit="frmCambiarPass(event);">

                    <div class="form-group">
                        <label for="passActual">Contraseña Actual:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
                            </div>
                            <input type="text" name="passActual" id="passActual" class="form-control" max="8" placeholder="Ingrese contraseña actual...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="passNuevo">Nueva Contraseña:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="text" name="passNuevo" id="passNuevo" class="form-control" max="8" placeholder="Ingrese neuva contraseña...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="passConfirm">Confirmar Contraseña:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="text" name="passConfirm" id="passConfirm" class="form-control" max="8" placeholder="Confirme nueva contraseña...">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <button type="submit" class="btn   bg-olive btn-block" id="btnAccion">Modificar <i class="fas fa-pencil-alt"></i></button>
                        </div>
                        <div class="col-sm-6">
                            <button type="button" class="btn btn-danger btn-block" data-dismiss="modal"><b>Cancelar</b> <i class="fas fa-ban"></i></button>
                        </div>
                    </div><!-----row-------------->

                </form>
            </div><!-----Modal body-------------->

        </div>
    </div>
</div>


<footer class="main-footer footer mt-5">
    <strong>Copyright &copy; 2023 <a href="#">FM-System</a>.</strong>
    Todos los derechos reservados.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
    </div>
</footer>


<script>
    const base_url = "<?php echo base_url; ?>";
</script>


<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="<?php echo base_url; ?>Assets/js/plugins/jquery/jquery.min.js"
 integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url; ?>Assets/js/plugins/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url; ?>Assets/js/plugins/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url; ?>Assets/js/plugins/Chart.min.js"></script>
<!-- Sparkline -->
<!--<script src="<php echo base_url; ?>Assets/js/plugins/sparkline.js"></script>---->
<!-- JQVMap -->
<!--<script src="<php echo base_url; ?>Assets/js/plugins/jquery.vmap.min.js"></script>-->

<!--<script src="<?php echo base_url; ?>Assets/js/plugins/jquery.vmap.usa.js"></script>-------------->
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url; ?>Assets/js/plugins/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url; ?>Assets/js/plugins/moment.min.js"></script>
<script src="<?php echo base_url; ?>Assets/js/plugins/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url; ?>Assets/js/plugins/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url; ?>Assets/js/plugins/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url; ?>Assets/js/plugins/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url; ?>Assets/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<!---<script src="<?php echo base_url; ?>Assets/js/demo.js"></script>------------>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url; ?>Assets/js/dashboard.js"></script>


<script src="<?php echo base_url; ?>Assets/js/plugins/jquery.dataTables.min.js"></script>

<script src="<?php echo base_url; ?>Assets/js/dataTables.responsive.min.js"></script>
<!----<script src="<phpecho base_url; ?>Assets/js/plugins/jquery.dataTables.min.js"></script>--------->

<script src="<?php echo base_url; ?>Assets/js/sweetalert2.all.min.js"></script>

<!-- DataTable -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="<?php echo base_url; ?>Assets/js/plugins/ajax/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="<?php echo base_url; ?>Assets/js/plugins/ajax/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="<?php echo base_url; ?>Assets/js/plugins/ajax/vfs_fonts.js"></script>


<script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script src="<?php echo base_url; ?>Assets/js/plugins/datatable/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.3/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url; ?>Assets/js/plugins/datatable/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.3/js/buttons.bootstrap5.min.js"></script>
<script src="<?php echo base_url; ?>Assets/js/plugins/datatable/buttons.bootstrap5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.3/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url; ?>Assets/js/plugins/datatable/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.3/js/buttons.print.min.js"></script>
<script src="<?php echo base_url; ?>Assets/js/plugins/datatable/buttons.print.min.js"></script>

<!-- SELECT 2 -->
<script src="<?php echo base_url; ?>Assets/js/plugins/select2.min.js"></script>

<script src="<?php echo base_url; ?>Assets/js/funciones.js"></script>










</body>

</html>