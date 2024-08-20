<?php require_once 'Views/Templeate/header.php'; ?>

<?php require_once 'Views/Templeate/nav_admin.php'; ?>
<div class="content-wrapper pt-5">

<div class="col-md-6 mx-auto mt-5 mt-4">
    <div class="card">
        <div class="card-header bg-olive text-white text-center">
            <?php echo $data['page_titile'];?>
        </div>    
        <div class="card-body ">
            <div class="roe">
                <form onsubmit="registrarPermisos(event);" id="fomularioPermiso">
                    <div class="row">
                        
                        
                        <?php foreach ($data['misPermisos'] as $row) { ?>
                        <div class="col-md-4 text-center text-capitalize p-2">
                           
                            <label for=""><?php echo $row['permiso'];?></label>
                                
                            <input type="checkbox" name="permisos[]" value="<?php echo $row['id'];?>" <?php echo isset($data['permidosAsignados'][$row['id']])? 'checked': '';?>  > 
                                 
                        </div>
                        <?php } ?>
                    </div>
        
                    <input type="hidden" name="usuario" id="usuario"  value="<?php echo $data['id_usuario'];?>" >

                    <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-outline-primary">Asignar permiso</button>
                    <a href="<?php echo base_url?>Usuarios" class="btn btn-outline-danger">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<?php require_once 'Views/Templeate/footer.php'; ?>