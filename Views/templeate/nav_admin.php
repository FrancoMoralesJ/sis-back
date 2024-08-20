<!-- Main Sidebar Container sidebar-dark-primary-->
<aside class="main-sidebar sidebar-background elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url . 'Administracion/home'; ?>" class="brand-link user-panel-modific ">
        <img src="<?php echo base_url; ?>Assets/img/icons3.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <!-- <span class="brand-text text-white simple-text logo-normal"> -->
            <!-- $data['nombre_empresa']['nombre'] ? $data['nombre_empresa']['nombre'] :  'SYSTEM-FM';   -->
        <!-- </span>  -->
        <span class="brand-text text-white simple-text logo-normal"><?= 'SYS-PRO'; ?></span>
    </a>

    <!-- Sidebar -->
    <div class=" sidebar-fondo sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel-modific  user-panel  mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo base_url; ?>Assets/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block text-white" id="lol" > <?php echo $_SESSION['nombre']  ;?> </a>
            </div>
        </div>
        


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <!-- <li class="nav-item ">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt text-olive"></i>
                        <p>
                            Panel
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<phpecho base_url . 'Administracion/home'; ?>" class="nav-link">
                                <i class="far fa-circle nav-icon text-olive"></i>
                                <p>Tablero</p>
                            </a>
                        </li>

                    </ul>
                </li>-->

                <?php  if($_SESSION['modulo_tablero']=="Tablero") {?>
                    
                         <li class="nav-item"> 
                             <a href="<?php echo base_url . 'Administracion/home'; ?>" class="nav-link">
                               <i class="nav-icon fas fa-tachometer-alt text-olive"></i>
                               <p>  Dashboard  </p>
                              </a>
                         </li> 
                <?php } ?>

            




                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tools text-olive"></i>
                        
                        <p>
                            Administración
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                     <?php  if($_SESSION['modulo_empresa']=="Empresa") {?>
                        <li class="nav-item">
                            <a href="<?php echo base_url ?>Administracion" class="nav-link">
                                <i class="far fa-circle nav-icon text-white "></i>
                                <p>Empresa</p>
                            </a>
                        </li>

                        <?php } ?>   
                      <?php  if($_SESSION['modulo_usario']=="Usuario") {?>
                        <li class="nav-item">
                            <a href="<?php echo base_url ?>/Usuarios" class="nav-link">
                                <i class="far fa-circle nav-icon text-white"></i>
                                <p>Usuarios </p>
                            </a>
                        </li>
                        <?php } ?>   

                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tools text-olive"></i>
                        <p>
                            Cajas
                            <i class="fas fa-angle-left right"></i>
                           
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                    <?php  if($_SESSION['modulo_cajas']=="Cajas") {?>
                        <li class="nav-item">
                            <a href="<?php echo base_url ?>Cajas" class="nav-link">
                                <i class="far fa-circle nav-icon text-white "></i>
                                <p>Cajas</p>
                            </a>
                        </li>
                        <?php } ?>   
                        <?php  if($_SESSION['modulo_arqueo_cajas']=="Arqueo_Caja") {?>
                        <li class="nav-item">
                            <a href="<?php echo base_url ?>Cajas/arqueo" class="nav-link">
                                <i class="far fa-circle nav-icon text-white"></i>
                                <p>Arqueo caja </p>
                            </a>
                        </li>
                        <?php } ?>  

                    </ul>
                </li>
                
                <?php  if($_SESSION['modolo_clientes']=="Clientes") {?>           
                 <li class="nav-item">
                        <a href="<?php echo base_url; ?>Clientes" class="nav-link">
                            <i class="nav-icon fa fa-users text-olive"></i>
                            <p>
                                Clientes
                            </p>
                        </a>
                    </li>
                <?php } ?> 



                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tools text-olive"></i>
                        <p>
                               Productos
                            <i class="fas fa-angle-left right"></i>
                           
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                    <?php  if($_SESSION['modulo_productos']=="Productos") {?>  
                        <li class="nav-item">
                         <a href="<?php echo base_url; ?>Productos" class="nav-link">
                                <i class="far fa-circle nav-icon text-white "></i>
                                <p>Nuevo productos</p>
                            </a>
                        </li>

                     <?php } ?> 
                     <?php  if($_SESSION['modulo_categorias']=="Categorias") {?>
                        <li class="nav-item">
                            <a href="<?php echo base_url; ?>Categorias" class="nav-link">
                            <i class="far fa-circle nav-icon text-white "></i>
                                <p>
                                    Categorias
                                </p>
                            </a>
                        </li>
                      <?php } ?>
                      <?php  if($_SESSION['modulo_medidas']=="Medidas") {?>
                        <li class="nav-item">
                            <a href="<?php echo base_url; ?>Medidas" class="nav-link">
                                <i class="far fa-circle nav-icon text-white "></i>
                                <p>
                                    Medidas
                                </p>
                            </a>
                        </li>
                     <?php } ?>

                     <?php  if($_SESSION['modulo_marca']=="Marcas") {?>
                        <li class="nav-item">
                            <a href="<?php echo base_url; ?>Marcas" class="nav-link">
                                <i class="far fa-circle nav-icon text-white "></i>
                                <p>
                                    
                                    Marca
                                </p>
                            </a>
                        </li>
                     <?php } ?>

                    </ul>
                </li>



                <li class="nav-item ">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-cart-plus text-olive"></i>
                        <p>
                            Entrada
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        
                    



                    <?php  if($_SESSION['modulo_compra']=="Nueva_Compra") {?>
                        <li class="nav-item">
                            <a href="<?php echo base_url; ?>Compras" class="nav-link">
                                <i class="far fa-circle nav-icon text-white"></i>
                                <p>Nueva Compra</p>
                            </a>
                        </li>
                   <?php } ?>
                   
                   <?php  if($_SESSION['modulo_historial_compras']=="Historial_Compra") {?>
                        <li class="nav-item">
                            <a href="<?php echo base_url; ?>Compras/historial" class="nav-link">
                                <i class="far fa-circle nav-icon text-white"></i>
                                <p>Historial Compra</p>
                            </a>
                        </li>
                   <?php } ?>
                      

                    </ul>
                </li>
                <li class="nav-item ">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-cart-plus text-olive"></i>
                        <p>
                            Salida
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

               

                    <ul class="nav nav-treeview">
                    <?php  if($_SESSION['modulo_venta']=="Nueva_Venta") {?>
                        <li class="nav-item">
                            <a href="<?php echo base_url; ?>Compras/Ventas" class="nav-link">
                                <i class="far fa-circle nav-icon text-white"></i>
                                <p>Nueva Venta</p>
                            </a>
                        </li>
                   <?php } ?>

                            
                   <?php  if($_SESSION['modulo_historial_venta']=="Historial_Venta") {?>

                        <li class="nav-item">
                            <a href="<?php echo base_url; ?>Compras/historialVentas" class="nav-link">
                                <i class="far fa-circle nav-icon text-white"></i>
                                <p>Historial Venta</p>
                            </a>
                        </li>
                   <?php } ?>
                        

                    </ul>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>