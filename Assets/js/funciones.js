let tblUsuario, tblClientes, tblCajas, tblCategorias, tblMedidas, tblProductos, tblHistorial, tblHistorialVenta, tblMarcas, tbl_cajaApertura, tblSinStock;

$(document).ready(function () {

});


document.addEventListener("DOMContentLoaded", function () {
  $("#buscarCliente").select2({ focus: true });
  verificarBtn();
  tblSinStock = $("#tblSinStock").DataTable();

  tblUsuario = $("#tblUsuarios").DataTable({
    ajax: {
      url: base_url + "/Usuarios/listar",
      dataSrc: "",
    },
    columns: [
      {
        data: "id",
      },
      {
        data: "usuario",
      },
      {
        data: "nombre",
      },
      {
        data: "caja",
      },
      {
        data: "estado",
      },
      {
        data: "acciones",
      },
    ],
    language: {
      lengthMenu: "Mostrar _MENU_ registros",
      zeroRecords: "No se encontraron resultados",
      info: "",
      infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      infoFiltered: "(filtrado de un total de _MAX_ registros)",
      sSearch: "Buscar:",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      sProcessing: "Procesando...",
    },
    //para usar los botones
    responsive: "true",
    dom: "Bfrtilp",
    buttons: [
      {
        extend: "excelHtml5",
        text: '<i class="fas fa-file-excel"></i> ',
        titleAttr: "Exportar a Excel",
        className: "btn btn-success",
      },
      {
        extend: "pdfHtml5",
        text: '<i class="fas fa-file-pdf"></i> ',
        titleAttr: "Exportar a PDF",
        className: "btn btn-danger",
      },
      {
        extend: "print",
        text: '<i class="fa fa-print"></i> ',
        titleAttr: "Imprimir",
        className: "btn btn-info",
      },
    ],
  });
  //clientes
  tblClientes = $("#tblClientes").DataTable({
    ajax: {
      url: base_url + "/Clientes/listar",
      dataSrc: "",
    },
    columns: [
      {
        data: "id",
      },
      {
        data: "dni",
      },
      {
        data: "nombre",
      },
      {
        data: "telefono",
      },
      {
        data: "direccion",
      },
      {
        data: "estado",
      },
      {
        data: "acciones",
      },
    ],
    dom: "Bfrtilp",
    buttons: [
      {
        extend: "excelHtml5",
        text: '<i class="fas fa-file-excel"></i> ',
        titleAttr: "Exportar a Excel",
        className: "btn btn-success",
      },
      {
        extend: "pdfHtml5",
        text: '<i class="fas fa-file-pdf"></i> ',
        titleAttr: "Exportar a PDF",
        className: "btn btn-danger",
      },
      {
        extend: "print",
        text: '<i class="fa fa-print"></i> ',
        titleAttr: "Imprimir",
        className: "btn btn-info",
      },
    ],
    language: {
      lengthMenu: "Mostrar _MENU_ registros",
      zeroRecords: "No se encontraron resultados",
      info: "",
      infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      infoFiltered: "(filtrado de un total de _MAX_ registros)",
      sSearch: "Buscar:",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      sProcessing: "Procesando...",
    },
  });
  tblCajas = $("#tblCajas").DataTable({
    ajax: {
      url: base_url + "/Cajas/listar",
      dataSrc: "",
    },
    columns: [
      {
        data: "id",
      },
      {
        data: "caja",
      },
      {
        data: "estado",
      },
      {
        data: "acciones",
      },
    ],
    language: {
      lengthMenu: "Mostrar _MENU_ registros",
      zeroRecords: "No se encontraron resultados",
      info: "",
      infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      infoFiltered: "(filtrado de un total de _MAX_ registros)",
      sSearch: "Buscar:",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      sProcessing: "Procesando...",
    },
  });


  tbl_cajaApertura = $("#tbl_cajaApertura").DataTable({
    ajax: {
      url: base_url + "/Cajas/listar_arqueo",
      dataSrc: "",
    },
    columns: [
      {
        data: "id",
      },
      // id,monto_inicial,monto_final,fecha_apertura,fecha_cierre,total_ventas,monto_total,estado
      {
        data: "monto_inicial",
      },
      {
        data: "monto_final",
      },
      {
        data: "fecha_apertura",
      },
      {
        data: "fecha_cierre",
      },
      {
        data: "total_ventas",
      },
      {
        data: "monto_total",
      },
      {
        data: "estado",
      },
    ],
    language: {
      lengthMenu: "Mostrar _MENU_ registros",
      zeroRecords: "No se encontraron resultados",
      info: "",
      infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      infoFiltered: "(filtrado de un total de _MAX_ registros)",
      sSearch: "Buscar:",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      sProcessing: "Procesando...",
    },
  });


  tblCategorias = $("#tblCategorias").DataTable({
    ajax: {
      url: base_url + "/Categorias/listar",
      dataSrc: "",
    },
    columns: [
      {
        data: "id",
      },
      {
        data: "nombre",
      },
      {
        data: "estado",
      },
      {
        data: "acciones",
      },
    ],
    dom: "Bfrtilp",
    buttons: [
      {
        extend: "excelHtml5",
        text: '<i class="fas fa-file-excel"></i> ',
        titleAttr: "Exportar a Excel",
        className: "btn btn-success",
      },
      {
        extend: "pdfHtml5",
        text: '<i class="fas fa-file-pdf"></i> ',
        titleAttr: "Exportar a PDF",
        className: "btn btn-danger",
      },
      {
        extend: "print",
        text: '<i class="fa fa-print"></i> ',
        titleAttr: "Imprimir",
        className: "btn btn-info",
      },
    ],
    language: {
      lengthMenu: "Mostrar _MENU_ registros",
      zeroRecords: "No se encontraron resultados",
      info: "",
      infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      infoFiltered: "(filtrado de un total de _MAX_ registros)",
      sSearch: "Buscar:",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      sProcessing: "Procesando...",
    },
  });
  tblMedidas = $("#tblMedidas").DataTable({
    ajax: {
      url: base_url + "/Medidas/listar",
      dataSrc: "",
    },
    columns: [
      {
        data: "id",
      },
      {
        data: "nombre",
      },
      {
        data: "nombre_corto",
      },
      {
        data: "estado",
      },
      {
        data: "acciones",
      },
    ],
    dom: "Bfrtilp",
    buttons: [
      {
        extend: "excelHtml5",
        text: '<i class="fas fa-file-excel"></i> ',
        titleAttr: "Exportar a Excel",
        className: "btn btn-success",
      },
      {
        extend: "pdfHtml5",
        text: '<i class="fas fa-file-pdf"></i> ',
        titleAttr: "Exportar a PDF",
        className: "btn btn-danger",
      },
      {
        extend: "print",
        text: '<i class="fa fa-print"></i> ',
        titleAttr: "Imprimir",
        className: "btn btn-info",
      },
    ],
    pageLength: 4,
    destroy: true,
    language: {
      lengthMenu: "Mostrar _MENU_ registros",
      zeroRecords: "No se encontraron resultados",
      info: "",
      infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      infoFiltered: "(filtrado de un total de _MAX_ registros)",
      sSearch: "Buscar:",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      sProcessing: "Procesando...",
    },
  });



  tblProductos = $("#tblProductos").DataTable({
    ajax: {
      url: base_url + "/Productos/listar",
      dataSrc: "",
    },
    columns: [
      {
        data: "id",
      },
      {
        data: "imagen",
      },
      {
        data: "codigo",
      },
      {
        data: "descripcion",
      },
      {
        data: "precio_compra",
      },
      {
        data: "precio_venta",
      },
      {
        data: "cantidad",
      },
      {
        data: "estado",
      },
      {
        data: "acciones",
      },
    ],

    columnDefs: [
      {
        targets: 0,
        width: "2%",
        className: "dt-body-center",
        responsivePriority: 1 // Prioridad alta

      },
      {
        targets: 1,
        width: "5%",
        className: "dt-body-left",

      },
      {
        targets: 2,
        width: "2%",
        className: "dt-body-left",

      },
      {
        targets: 6,
        width: "10%",
        className: "dt-body-left",
        responsivePriority: 1 // Prioridad alta
      },
      {
        targets: [3, 4, 5, 7, 8]


      }
    ],
    responsive: {

      breakpoints: [
        { name: 'desktop', width: Infinity },
        { name: 'tablet', width: 1024 },
        { name: 'fablet', width: 768 },
        { name: 'phone', width: 400 }
      ]
    },
    dom: "Bfrtilp",
    buttons: [
      {
        extend: "excelHtml5",
        text: '<i class="fas fa-file-excel"></i> ',
        titleAttr: "Exportar a Excel",
        className: "btn btn-success",
      },
      {
        extend: "pdfHtml5",
        text: '<i class="fas fa-file-pdf"></i> ',
        titleAttr: "Exportar a PDF",
        className: "btn btn-danger",
      },
      {
        extend: "print",
        text: '<i class="fa fa-print"></i> ',
        titleAttr: "Imprimir",
        className: "btn btn-info",
      },
    ],
    language: {
      lengthMenu: "Mostrar _MENU_ registros",
      zeroRecords: "No se encontraron resultados",
      info: "",
      infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      infoFiltered: "(filtrado de un total de _MAX_ registros)",
      sSearch: "Buscar:",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      sProcessing: "Procesando...",
    },
  });

  tblHistorial = $("#tblHistorial").DataTable({
    ajax: {
      url: base_url + "/Compras/listar_historial",
      dataSrc: "",

    },
    columns: [
      {
        data: "id",
      },
      {
        data: "total",
      },
      {
        data: "fecha",
      },
      {
        data: "estado",
      },
      {
        data: "acciones",
      },
    ],
    dom: "Bfrtilp",
    buttons: [
      {
        extend: "excelHtml5",
        text: '<i class="fas fa-file-excel"></i> ',
        titleAttr: "Exportar a Excel",
        className: "btn btn-success",
      },
      {
        extend: "pdfHtml5",
        text: '<i class="fas fa-file-pdf"></i> ',
        titleAttr: "Exportar a PDF",
        className: "btn btn-danger",
      },
      {
        extend: "print",
        text: '<i class="fa fa-print"></i> ',
        titleAttr: "Imprimir",
        className: "btn btn-info",
      },
    ],
    language: {
      lengthMenu: "Mostrar _MENU_ registros",
      zeroRecords: "No se encontraron resultados",
      info: "",
      infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      infoFiltered: "(filtrado de un total de _MAX_ registros)",
      sSearch: "Buscar:",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      sProcessing: "Procesando...",
    },
  });
  tblHistorialVenta = $("#tblHistorialVenta").DataTable({
    ajax: {
      url: base_url + "/Compras/listar_historialVentas",
      dataSrc: "",
    },
    columns: [
      {
        data: "id",
      },
      {
        data: "nombre",
      },

      {
        data: "total",
      },
      {
        data: "fecha",
      },
      {
        data: "estado",
      },
      {
        data: "acciones",
      },
    ],
    dom: "Bfrtilp",
    buttons: [
      {
        extend: "excelHtml5",
        text: '<i class="fas fa-file-excel"></i> ',
        titleAttr: "Exportar a Excel",
        className: "btn btn-success",
      },
      {
        extend: "pdfHtml5",
        text: '<i class="fas fa-file-pdf"></i> ',
        titleAttr: "Exportar a PDF",
        className: "btn btn-danger",
      },
      {
        extend: "print",
        text: '<i class="fa fa-print"></i> ',
        titleAttr: "Imprimir",
        className: "btn btn-info",
      },
    ],
    language: {
      lengthMenu: "Mostrar _MENU_ registros",
      zeroRecords: "No se encontraron resultados",
      info: "",
      infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      infoFiltered: "(filtrado de un total de _MAX_ registros)",
      sSearch: "Buscar:",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      sProcessing: "Procesando...",
    },
  });
});


tblMarcas = $("#tblMarcas").DataTable({
  ajax: {
    url: base_url + "/Marcas/listar",
    dataSrc: "",
  },
  columns: [
    {
      data: "id",
    },
    {
      data: "nombre_marca",
    },
    {
      data: "estado",
    },
    {
      data: "acciones",
    },
  ],
  dom: "Bfrtilp",
  buttons: [
    {
      extend: "excelHtml5",
      text: '<i class="fas fa-file-excel"></i> ',
      titleAttr: "Exportar a Excel",
      className: "btn btn-success",
    },
    {
      extend: "pdfHtml5",
      text: '<i class="fas fa-file-pdf"></i> ',
      titleAttr: "Exportar a PDF",
      className: "btn btn-danger",
    },
    {
      extend: "print",
      text: '<i class="fa fa-print"></i> ',
      titleAttr: "Imprimir",
      className: "btn btn-info",
    },
  ],
  pageLength: 4,
  destroy: true,
  language: {
    lengthMenu: "Mostrar _MENU_ registros",
    zeroRecords: "No se encontraron resultados",
    info: "",
    infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
    infoFiltered: "(filtrado de un total de _MAX_ registros)",
    sSearch: "Buscar:",
    oPaginate: {
      sFirst: "Primero",
      sLast: "Último",
      sNext: "Siguiente",
      sPrevious: "Anterior",
    },
    sProcessing: "Procesando...",
  },
});

function frmUsuario() {
  document.getElementById("title").innerHTML = "Registrar Usuario";
  document.getElementById("btnAccion").innerHTML = "Registrar  Usuario";
  document.getElementById("claves").classList.remove("d-none");
  document.getElementById("frmUsuarios").reset();
  document.getElementById("id").value = "";
  $("#nuevo_usuario").modal("show");
}

function registrarUser(e) {
  e.preventDefault();

  const usuario = document.getElementById("usuario");
  const nombre = document.getElementById("nombre");

  const caja = document.getElementById("caja");

  if (usuario.value == "" || nombre.value == "" || caja.value == "") {
    alertas("Todos los campos son obligatorios..", "error");
  } else {
    const url = base_url + "Usuarios/registrar";
    const frm = document.getElementById("frmUsuarios");
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(new FormData(frm));
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        const res = JSON.parse(this.responseText);
        frm.reset();
        alertas(res.msg, res.icono);
        $("#nuevo_usuario").modal("hide");
        tblUsuario.ajax.reload();
      }
    };
  }
}

function btnActualizarUsuario(id) {
  document.getElementById("title").innerHTML = "Editar Usuario";
  document.getElementById("btnAccion").innerHTML = "Editar Usuario";

  const url = base_url + "Usuarios/editar/" + id;

  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      document.getElementById("id").value = res.id;
      document.getElementById("usuario").value = res.usuario;
      document.getElementById("nombre").value = res.nombre;
      document.getElementById("caja").value = res.id_caja;
      document.getElementById("claves").classList.add("d-none");
      $("#nuevo_usuario").modal("show");
    }
  }
}

function btnEliminar(id) {

  Swal.fire({
    title: "Estas seguro de dar de baja al Usuario?",
    text: "El usuario no se eliminara de forma permanente, solo se desactivará!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si!",
    cancelButtonText: "NO",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Usuarios/eliminar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          alertas(res.msg, res.icono);
          tblUsuario.ajax.reload();
        }
      };
    }
  });

}

function btnReingresarUser(id) {
  Swal.fire({
    title: "Estas seguro de reingresar?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si!",
    cancelButtonText: "NO",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Usuarios/reingresar/" + id;

      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          alertas(res.msg, res.icono);
          tblUsuario.ajax.reload();
        }
      };
    }
  });
}

//FIN USUARIO

//=================================CLIENTES========================================
function frmCliente() {
  document.getElementById("title_cliente").innerHTML = "Registrar CLiente";
  document.getElementById("btnAccion").innerHTML = "Registrar  CLiente";

  document.getElementById("frmCLiente").reset();
  document.getElementById("id").value = "";
  $("#nuevo_cliente").modal("show");
}

function registrarCliente(e) {
  e.preventDefault();

  const dni = document.getElementById("dni");
  const nombre = document.getElementById("nombre");
  const telefono = document.getElementById("telefono");
  const direccion = document.getElementById("direccion");

  if (
    dni.value == "" ||
    nombre.value == "" ||
    telefono.value == "" ||
    direccion.value == ""
  ) {
    Swal.fire({
      position: "top-end",
      icon: "error",
      title: "Todos los campos son obligatorios",
      showConfirmButton: false,
      timer: 3000,
    });
  } else {
    const url = base_url + "Clientes/registrar";
    const frm = document.getElementById("frmCLiente");
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(new FormData(frm));
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        const res = JSON.parse(this.responseText);
        if (res == "si") {
          Swal.fire({
            position: "top-end",
            icon: "success",
            title: "El cliente se registro correctamente",
            showConfirmButton: false,
            timer: 1500,
          });
          frm.reset();
          $("#nuevo_cliente").modal("hide");
          tblClientes.ajax.reload();
        } else if (res == "modificado") {
          Swal.fire({
            position: "top-end",
            icon: "success",
            title: "El cliente modificado con Exito",
            showConfirmButton: false,
            timer: 1500,
          });

          $("#nuevo_cliente").modal("hide");
          tblClientes.ajax.reload();
        } else {
          Swal.fire({
            position: "top-end",
            icon: "error",
            title: res,
            showConfirmButton: false,
            timer: 3000,
          });
        }
      }
    };
  }
}

function btnActualizarCliente(id) {
  const url = base_url + "Clientes/editar/" + id;

  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      document.getElementById("id").value = res.id;
      document.getElementById("dni").value = res.dni;
      document.getElementById("nombre").value = res.nombre;
      document.getElementById("telefono").value = res.telefono;
      document.getElementById("direccion").value = res.direccion;

      $("#nuevo_cliente").modal("show");
    }
  };
}

function btnEliminarCliente(id) {
  Swal.fire({
    title: "Estas seguro de eliminar?",
    text: "El cliente no se eliminara de forma permanente, solo se desactivará!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si!",
    cancelButtonText: "NO",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Clientes/eliminar/" + id;

      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);

          if (res == "ok") {
            Swal.fire("Mensaje!", "Cliente eliminado con éxito.", "success");
          } else {
            Swal.fire("Mensaje!", res, "error");
          }
          tblClientes.ajax.reload();
        }
      };
    }
  });
}

function btnReingresarCliente(id) {
  Swal.fire({
    title: "Estas seguro de reingresar?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si!",
    cancelButtonText: "NO",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Clientes/reingresar/" + id;

      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);

          if (res == "ok") {
            Swal.fire("Mensaje!", "Cliente reingresado con éxito.", "success");

          } else {
            Swal.fire("Mensaje!", res, "error");
          }
          tblClientes.ajax.reload();
        }
      };
    }
  });
}

//FIN CLIENTES

function frmCaja() {
  document.getElementById("title_caja").innerHTML = "Registrar Caja";
  document.getElementById("btnAccion").innerHTML = "Registrar  Caja";

  document.getElementById("frmCaja").reset();
  document.getElementById("id").value = "";
  $("#nuevo_caja").modal("show");
}

function registrarCaja(e) {
  e.preventDefault();

  const caja = document.getElementById("caja");

  if (caja.value == "") {
    Swal.fire({
      position: "top-end",
      icon: "error",
      title: "Todos los campos son obligatorios",
      showConfirmButton: false,
      timer: 3000,
    });
  } else {
    const url = base_url + "Cajas/registrar";
    const frm = document.getElementById("frmCaja");
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(new FormData(frm));
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        const res = JSON.parse(this.responseText);
        if (res == "si") {
          Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Caja se registro correctamente",
            showConfirmButton: false,
            timer: 1500,
          });
          frm.reset();
          $("#nuevo_caja").modal("hide");
          tblCajas.ajax.reload();
        } else if (res == "modificado") {
          Swal.fire({
            position: "top-end",
            icon: "success",
            title: "El Caja modificado con Exito",
            showConfirmButton: false,
            timer: 1500,
          });

          $("#nuevo_caja").modal("hide");
          tblCajas.ajax.reload();
        } else {
          Swal.fire({
            position: "top-end",
            icon: "error",
            title: res,
            showConfirmButton: false,
            timer: 3000,
          });
        }
      }
    };
  }
}

function btnActualizarCaja(id) {
  document.getElementById("title_caja").innerHTML = "Actualizar Caja";
  document.getElementById("btnAccion").innerHTML = "Actualizar Caja";

  const url = base_url + "Cajas/editar/" + id;

  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      document.getElementById("id").value = res.id;
      document.getElementById("caja").value = res.caja;
      $("#nuevo_caja").modal("show");
    }
  };
}

function btnEliminarCaja(id) {
  Swal.fire({
    title: "Estas seguro de eliminar?",
    text: "El Caja no se eliminara de forma permanente, solo se desactivará!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si!",
    cancelButtonText: "NO",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Cajas/eliminar/" + id;

      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);

          if (res == "ok") {
            Swal.fire("Mensaje!", "Caja eliminado con éxito.", "success");
          } else {
            Swal.fire("Mensaje!", res, "error");
          }
          tblCajas.ajax.reload();
        }
      };
    }
  });
}

function btnReingresarCaja(id) {
  Swal.fire({
    title: "Estas seguro de reingresar cajas?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si!",
    cancelButtonText: "NO",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Cajas/reingresar/" + id;

      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);

          if (res == "ok") {
            Swal.fire("Mensaje!", "Caja reingresado con éxito.", "success");
          } else {
            Swal.fire("Mensaje!", res, "error");
          }
          tblCajas.ajax.reload();
        }
      };
    }
  });
}
//Fin cajas

function frmCategorias() {
  document.getElementById("title_categorias").innerHTML =
    "Registrar Categorías";
  document.getElementById("btnAccion").innerHTML = "Registrar  Categorías";

  document.getElementById("frmCategorias").reset();
  document.getElementById("id").value = "";
  $("#nuevo_categorias").modal("show");
}

function registrarCategorias(e) {
  e.preventDefault();

  const categoria = document.getElementById("nombre");

  if (categoria.value == "") {
    Swal.fire({
      position: "top-end",
      icon: "error",
      title: "Todos los campos son obligatorios",
      showConfirmButton: false,
      timer: 3000,
    });
  } else {
    const url = base_url + "Categorias/registrar";
    const frm = document.getElementById("frmCategorias");
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(new FormData(frm));
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        const res = JSON.parse(this.responseText);
        if (res == "si") {
          Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Categoria se registro correctamente",
            showConfirmButton: false,
            timer: 1500,
          });
          frm.reset();
          $("#nuevo_categorias").modal("hide");
          tblCategorias.ajax.reload();
        } else if (res == "modificado") {
          Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Categoria modificado con Exito",
            showConfirmButton: false,
            timer: 1500,
          });

          $("#nuevo_categorias").modal("hide");
          tblCategorias.ajax.reload();
        } else {
          Swal.fire({
            position: "top-end",
            icon: "error",
            title: res,
            showConfirmButton: false,
            timer: 3000,
          });
        }
      }
    };
  }
}

function btnActualizarCategorias(id) {
  document.getElementById("title_categorias").innerHTML =
    "Actualizar Categoria";
  document.getElementById("btnAccion").innerHTML = "Actualizar Categorias";

  const url = base_url + "Categorias/editar/" + id;

  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      document.getElementById("id").value = res.id;
      document.getElementById("nombre").value = res.nombre;

      $("#nuevo_categorias").modal("show");
    }
  };
}

function btnEliminarCategorias(id) {
  Swal.fire({
    title: "Estas seguro de eliminar?",
    text: "El Categoria no se eliminará de forma permanente, solo se desactivará!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si!",
    cancelButtonText: "NO",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Categorias/eliminar/" + id;

      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);

          if (res == "ok") {
            Swal.fire("Mensaje!", "Categoria eliminado con éxito.", "success");
          } else {
            Swal.fire("Mensaje!", res, "error");
          }
          tblCategorias.ajax.reload();
        }
      };
    }
  });
}

function btnReingresarCategorias(id) {
  Swal.fire({
    title: "¿Estas seguro de reingresar Categoria?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si!",
    cancelButtonText: "NO",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Categorias/reingresar/" + id;

      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);

          if (res == "ok") {
            Swal.fire(
              "Mensaje!",
              "Categoria reingresado con éxito!!",
              "success"
            );
          } else {
            Swal.fire("Mensaje!", res, "error");
          }
          tblCategorias.ajax.reload();
        }
      };
    }
  });
}

//Fin Categorías -------------------------------------------------------------------------------------------------------------

function frmMedidas() {
  document.getElementById("title_medidas").innerHTML = "Registrar Medidas";
  document.getElementById("btnAccion").innerHTML = "Registrar  Medidas";

  document.getElementById("frmMedidas").reset();
  document.getElementById("id").value = "";
  $("#nuevo_medidas").modal("show");
}

function registrarMedidas(e) {
  e.preventDefault();

  const nombre = document.getElementById("nombre");
  const nombre_conto = document.getElementById("nombre_corto");

  if (nombre.value == "" || nombre_conto.value == "") {
    Swal.fire({
      position: "top-end",
      icon: "error",
      title: "Todos los campos son obligatorios",
      showConfirmButton: false,
      timer: 3000,
    });
  } else {
    const url = base_url + "Medidas/registrar";
    const frm = document.getElementById("frmMedidas");
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(new FormData(frm));
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        const res = JSON.parse(this.responseText);
        if (res == "si") {
          Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Se registro correctamente!!",
            showConfirmButton: false,
            timer: 1500,
          });
          frm.reset();
          $("#nuevo_medidas").modal("hide");
          tblMedidas.ajax.reload();
        } else if (res == "modificado") {
          Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Se modificó con Exito!!",
            showConfirmButton: false,
            timer: 1500,
          });

          $("#nuevo_medidas").modal("hide");
          tblMedidas.ajax.reload();
        } else {
          Swal.fire({
            position: "top-end",
            icon: "error",
            title: res,
            showConfirmButton: false,
            timer: 3000,
          });
        }
      }
    };
  }
}

function btnActualizarMedidas(id) {
  document.getElementById("title_medidas").innerHTML = "Actualizar Medidas";
  document.getElementById("btnAccion").innerHTML = "Actualizar Medidas";

  const url = base_url + "Medidas/editar/" + id;

  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      document.getElementById("id").value = res.id;
      document.getElementById("nombre").value = res.nombre;
      document.getElementById("nombre_corto").value = res.nombre_corto;
      $("#nuevo_medidas").modal("show");
    }
  };
}

function btnEliminarMedidas(id) {
  Swal.fire({
    title: "Estas seguro de eliminar?",
    text: "Medida no se eliminará de forma permanente, solo se desactivará..!!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si!",
    cancelButtonText: "NO",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Medidas/eliminar/" + id;

      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);

          if (res == "ok") {
            Swal.fire("Mensaje!!", "Medida eliminado con éxito!!", "success");
          } else {
            Swal.fire("Mensaje!", res, "error");
          }
          tblMedidas.ajax.reload();
        }
      };
    }
  });
}

function btnReingresarMedidas(id) {
  Swal.fire({
    title: "¿Estas seguro de reingresar esta medida?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si!",
    cancelButtonText: "NO",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Medidas/reingresar/" + id;

      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);

          if (res == "ok") {
            Swal.fire("Mensaje!", "Medida reingresado con éxito!!", "success");
          } else {
            Swal.fire("Mensaje!", res, "error");
          }
          tblMedidas.ajax.reload();
        }
      };
    }
  });
}

//Fin Medidas -------------------------------------------------------------------------------------------------------------

function frmProductos() {
  document.getElementById("title_productos").innerHTML = "Registrar Productos";
  document.getElementById("btnAccionProductos").innerHTML =
    "<b>Registrar </b></b><il class='fas fa-save'></il>";

  document.getElementById("frmProductos").reset();
  document.getElementById("id").value = "";
  deleteImg();
  getCodigo();
  $("#nuevo_productos").modal("show");

}

function registrarProductos(e) {
  e.preventDefault();

  const codigo = document.getElementById("codigo");
  const descripcion = document.getElementById("descripcion");
  const precio_compra = document.getElementById("preciocompra");
  const precio_venta = document.getElementById("precioventa");
  //const cantidad=document.getElementById("cantidad");
  const id_marca = document.getElementById("marcas");
  const id_medida = document.getElementById("medida");
  const id_categoria = document.getElementById("categoria");
  const imagen = document.getElementById("imagen");
  if (
    codigo.value == "" ||
    descripcion.value == "" ||
    precio_compra.value == "" ||
    precio_venta.value == "" ||
    id_marca.value == "" ||
    id_medida.value == "" ||
    id_categoria.value == ""
  ) {
    Swal.fire({
      position: "top-end",
      icon: "error",
      title: "Todos los campos son obligatorios",
      showConfirmButton: false,
      timer: 3000,
    });
  } else {
    const url = base_url + "Productos/registrar";
    const frm = document.getElementById("frmProductos");
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(new FormData(frm));
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {

        const res = JSON.parse(this.responseText);


        if (res == "si") {
          Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Se registro correctamente el producto!!",
            showConfirmButton: false,
            timer: 1500,
          });
          frm.reset();
          $("#nuevo_productos").modal("hide");
          tblProductos.ajax.reload();
        } else if (res == "modificado") {
          Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Se modificó con Exito!!",
            showConfirmButton: false,
            timer: 1500,
          });

          $("#nuevo_productos").modal("hide");
          tblProductos.ajax.reload();
        } else {
          Swal.fire({
            position: "top-end",
            icon: "error",
            title: res,
            showConfirmButton: false,
            timer: 3000,
          });
        }
      }
    };
  }
}

function btnActualizarProductos(id) {
  document.getElementById("title_productos").innerHTML = "Actualizar Productos";
  document.getElementById("btnAccionProductos").innerHTML =
    "Modificar  <i class='fas fa-edit'></i>";

  const url = base_url + "Productos/editar/" + id;

  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      document.getElementById("id").value = res.id;
      document.getElementById("codigo").value = res.codigo;
      document.getElementById("descripcion").value = res.descripcion;
      document.getElementById("preciocompra").value = res.precio_compra;
      document.getElementById("precioventa").value = res.precio_venta;
      //const cantidad=document.getElementById("cantidad");
      document.getElementById("medida").value = res.id_medida;
      document.getElementById("categoria").value = res.id_categoria;

      document.getElementById("imagen-icon").classList.add("d-none"); //label

      document.getElementById("icon-cerrar").innerHTML = `
      <buttom class="btn btn-danger" onclick="deleteImg(event);"><i class="fas fa-times"></i></buttom>`;
      const foto = res.foto ? res.foto : "default.png";
      document.getElementById("img-preview").src =
        base_url + "Assets/img/productos/" + foto;

      document.getElementById("foto_actual").value = res.foto;

      $("#nuevo_productos").modal("show");
    }
  };
}
function btnEliminarProductos(id, nombre = "asd") {
  Swal.fire({
    title: "Necesitamos de tu Confirmación",
    text: "Desea eliminar al producto : \n" + nombre,
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3d9970",
    cancelButtonColor: "#dc3545",
    confirmButtonText: "Si",
    cancelButtonText: "No",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Productos/eliminar/" + id;

      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);

          if (res == "ok") {
            Swal.fire("Mensaje!!", "Producto eliminado con éxito!!", "success");
          } else {
            Swal.fire("Mensaje!", res, "error");
          }
          tblProductos.ajax.reload();
        }
      };
    }
  });
}

function btnReingresarProductos(id) {
  Swal.fire({
    title: "¿Estas seguro de reingresar este producto?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3d9970",
    cancelButtonColor: "#dc3545",
    confirmButtonText: "Si",
    cancelButtonText: "No",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Productos/reingresar/" + id;

      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);

          if (res == "ok") {
            Swal.fire(
              "Mensaje!",
              "Productos reingresado con éxito!!",
              "success"
            );
          } else {
            Swal.fire("Mensaje!", res, "error");
          }
          tblProductos.ajax.reload();
        }
      };
    }
  });
}



function buscar_productos(e) {
  e.preventDefault();
  const buscarProductos = document.getElementById("buscarProductos");
  buscarProductos.addEventListener('click', () => {
    $("#buscar_productos").modal("show");
  });

}
function setBuscar() {

}


function buscarProducto(e) {
  const tipo = e.target.name;
  const valor = encodeURIComponent(e.target.value);
  let url;
  const tblbuscar = document.getElementById('tblbuscarContent');

  if (tipo === 'txt_codigo') {

    url = `${base_url}Productos/filtrarProductos?id=${valor}&tipo=1`;

  } else if (tipo === 'txt_nombreProducto') {

    url = `${base_url}Productos/filtrarProductos?id=${valor}&tipo=2`;

  } else if (tipo === 'txt_marca') {

    url = `${base_url}Productos/filtrarProductos?id=${valor}&tipo=3`;

  }

  if (valor == '') {
    tblbuscar.innerHTML = '';
    return;
  }

  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);

      let datos = ``;


      res['Productos'].forEach(($row) => {
        datos += `
              <tr>
             
              <td>${$row['codigo']}</td>
              <td> <button class="btn bg-olive" onclick="buscarCodigo('${$row['codigo']}');"> Seleccionar </button> </td>
              <td> <img src="${base_url}Assets/img/productos/${$row['foto']}" alt="producto" class="img-thumbnail" width="50px"></td>
              <td>${$row['descripcion']}</td>
              <td>${$row['nombre_marca']}</td>
              <td>${$row['cantidad']}</td>
              <td>${$row['estado']}</td>
              </tr>
            `;


      });

      tblbuscar.innerHTML = datos;

    }
  }

}


function preview(e) {
  const url = e.target.files[0];
  const urlTemp = URL.createObjectURL(url);
  document.getElementById("imagen-icon").classList.add("d-none"); //label
  document.getElementById("img-preview").src = urlTemp; //img
  document.getElementById("icon-cerrar").innerHTML = `
    <buttom class="btn btn-danger" onclick="deleteImg();"><i class="fas fa-times"></i></buttom>
    ${url["name"]}`; //buttom
  console.log(urlTemp);
}
function deleteImg() {
  document.getElementById("imagen-icon").classList.remove("d-none");
  document.getElementById("icon-cerrar").innerHTML = "";
  document.getElementById("img-preview").src = "";
  document.getElementById("imagen").value = "";
  document.getElementById("foto_actual").value = "";
}

/**COMPRAS */
function buscarCodigo(cod) {




  if (cod != "") {

    const url = base_url + "Compras/buscarCodigo/" + cod;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {

        const res = JSON.parse(this.responseText);

        if (res) {
          document.getElementById("id").value = res.id;
          // document.getElementById("codigo").value = res.codigo;
          document.getElementById("descripcion").value = res.descripcion;
          document.getElementById("precio").value = res.precio_compra;
          document.getElementById("cantidad").removeAttribute("disabled");
          document.getElementById("cantidad").focus();
          $('#buscar_productos').modal('hide');
          document.getElementById("cantidad").focus();

          tblbuscarContent.innerHTML = '';
          document.getElementById("txt_nombreProducto").value = "";
          document.getElementById("txt_codigo").value = "";
          document.getElementById("txt_marca").selectedIndex = 0;
        } else {
          alertas("No existe el producto", "warning");
          document.getElementById("id").value = "";
          document.getElementById("descripcion").value = "";
          document.getElementById("precio").value = "";
          document.getElementById("cantidad").value = "";

          // document.getElementById("codigo").value = "";
          // document.getElementById("codigo").focus();
        }
      }
    };

  } else {
    alertas("Ingrese un Código..", "warning");
  }
}

function calcularPrecio(e) {


  const pre = document.getElementById("precio").value;
  const cant = document.getElementById("cantidad").value;
  document.getElementById("sub_total").value = pre * cant;

  if (e.which == 13) {
    e.preventDefault();  // Prevent default form submission behavior


    if (cant > 0) {
      const url = base_url + "Compras/ingresar";
      const frm = document.getElementById("frmCompras");
      const http = new XMLHttpRequest();
      http.open("POST", url, true);
      http.send(new FormData(frm));
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          alertas(res.msg, res.icono);
          frm.reset(res);
          cargarDetalle();
          document
            .getElementById("cantidad")
            .setAttribute("disabled", "disabled");
          document.getElementById("codigo").focus();

        }
      };
    }

  }
}

if (document.getElementById("tblDetalle")) {
  cargarDetalle();

}

function cargarDetalle() {
  const url = base_url + "Compras/listar/detalle";
  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      let html = "";
      //alt + 96 ``
      res["detalle"].forEach((row) => {
        html += `
          <tr>
          <td>${row["id"]}</td>
          <td>${row["descripcion"]}</td>
          <td>${row["cantidad"]}</td>
          <td>S/ ${row["precio"]}</td>
          <td>S/ ${row["sub_total"]}</td>
          <td>
          <button class="btn btn-info" ><b><i class="fas fa-minus"></i></b></button>
            <button class="btn btn-warning "><b><i class="fas fa-plus"></i></b></button>
            <button class="btn btn-danger" onclick="deleteDetalle(${row["id"]},1);">
              <I class="fa fa-times">
              </I>
            </button>
          </td>
          </tr>
        `;
      });
      const total = res["total_pagar"].total ? res["total_pagar"].total : 0.0;
      document.getElementById("totalP").value = "S/ " + total;
      document.getElementById("tblDetalles").innerHTML = html;

    }
  };
}

function deleteDetalle(id, del) {
  let url;

  if (del == 1) {
    url = base_url + "Compras/delete/" + id;
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send();
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        const res = JSON.parse(this.responseText);
        if (res == "ok") {
          alertas("Se eliminó correctamente el detalle Compra..", "success");
          cargarDetalle();
        } else {
          alertas("Error al eliminar detalle Compra.", "error");
          cargarDetalle();
        }
      }
    };
  } else {
    url = base_url + "Compras/deleteVenta/" + id;
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send();
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        const res = JSON.parse(this.responseText);
        if (res == "ok") {
          alertas("Se eliminó correctamente el detalle Venta..", "success");
          cargarDetalleVenta();
        } else {
          alertas("Error al eliminar detalle Venta..", "error");
          cargarDetalleVenta();
        }
      }
    };
  }
}

//=====================================COMPRAAS===============================

function procesar(accion) {

  let url;
  let titulo = '';
  if (accion == 1) {
    titulo = "¿Estas seguro de Realizar la Compra?";
  } else {
    titulo = "¿Estas seguro de Realizar la Venta?";
  }
  Swal.fire({
    title: titulo,
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3d9970",
    cancelButtonColor: "#dc3545",
    confirmButtonText: "Si",
    cancelButtonText: "No",
  }).then((result) => {
    if (result.isConfirmed) {
      let url;
      if (accion == 1) {
        url = base_url + "Compras/registrarCompra/";
      } else {
        const id_cliente = document.getElementById("buscarCliente").value;
        url = base_url + "Compras/registrarVenta/" + id_cliente;
      }
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          console.log(this.responseText);
          const res = JSON.parse(this.responseText);
          if (res.msg == "ok") {
            let ruta = '';
            if (accion == 1) {

              alertas('Se generó una nueva Compra..', 'success');
              ruta = base_url + "Compras/generarPDF/" + res.id_compra;
              imprimir(ruta, 'compra');

              $("#id_imprimir_compra").on('hidden.bs.modal', function () {
                cargarDetalleVenta();

              });

            } else {
              alertas('Se generó una nueva Venta..', 'success');
              ruta = (base_url + "Compras/generarPdfVenta/" + res.id_venta);
              imprimir(ruta, "venta");


            }



            // setTimeout(() => {
            //   //recarga la pagina en 3 segundos
            //   window.location.reload();
            // }, 300);

          } else {
            Swal.fire("Mensaje!", res.msg, "Error");
          }


        }

      };

    }
  });
}

//=====================================EMPRESA CONFIG====================================================================

function modificarEmpresa(e) {
  e.preventDefault();
  const frm = document.getElementById("frmEmpresa");
  const url = base_url + "Administracion/modificar/";
  const h = new XMLHttpRequest();
  h.open("POST", url, true);
  h.send(new FormData(frm));
  h.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      switch (res) {
        case "ok":
          Swal.fire(
            "Mensaje!",
            "Se Actualizó correctamente los datos de la empresa",
            "success"
          );
          break;
        default:
          Swal.fire(
            "Mensaje!",
            "Error al actializar los datos de la empresa",
            "success"
          );
      }
    }
  };
}
//=====================================ALERTAS====================================================================
function alertas(mensaje, icono) {
  let textColor = "text-dark";
  let back = "#ffff";

  if (icono == "success") {
    textColor = "text-white";
    back = "#28a745";
  } else if (icono == "warning") {
    textColor = "text-white";
    back = "#ffc107";
  } else {
    textColor = "text-white";
    back = "#d53343";
  }

  Swal.fire({
    position: "center",
    icon: icono,
    title: "<i class=" + textColor + ">" + mensaje + "</i>",
    showConfirmButton: false,
    timer: 3000,
    toast: true,
    background: back,
    iconColor: "#ffff",
  });
}
//==========================VENTAS====================================================

/**COMPRAS */
function buscarCodigoVenta(e) {
  e.preventDefault();
  const cod = document.getElementById("codigo").value;

  if (cod != "") {
    if (e.which == 13) {
      const url = base_url + "Compras/buscarCodigo/" + cod;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);

          if (res) {
            document.getElementById("id").value = res.id;
            document.getElementById("codigo").value = res.codigo;
            document.getElementById("descripcion").value = res.descripcion;
            document.getElementById("precio").value = res.precio_venta;

            document.getElementById("cantidad").removeAttribute("disabled");
            document.getElementById("cantidad").focus();
          } else {
            alertas("No existe el producto", "warning");
            document.getElementById("id").value = "";
            document.getElementById("descripcion").value = "";
            document.getElementById("precio").value = "";
            document.getElementById("cantidad").value = "";

            document.getElementById("codigo").value = "";
            document.getElementById("codigo").focus();
          }
        }
      };
    }
  } else {
    alertas("Ingrese un Código..", "warning");
  }
}

function calcularPrecioVenta(e) {


  e.preventDefault();

  const pre = document.getElementById("precio").value;
  const cant = document.getElementById("cantidad").value;
  document.getElementById("sub_total").value = pre * cant;

  if (e.which == 13) {
    if (cant > 0) {



      const url = base_url + "Compras/ingresarVenta";
      const frm = document.getElementById("frmVenta");
      const http = new XMLHttpRequest();


      http.open("POST", url, true);
      http.send(new FormData(frm));
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);


          alertas(res.msg, res.icono);
          frm.reset(res);

          document.getElementById("cantidad").setAttribute("disabled", "disabled");
          document.getElementById("codigo").focus();
          cargarDetalleVenta();

        }
      };

    }
  }
}
if (document.getElementById("tblDetalleVenta")) {
  this.cargarDetalleVenta();
}
function cargarDetalleVenta() {
  const url = base_url + "Compras/listar/detalle_temp";
  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {

      const res = JSON.parse(this.responseText);

      let html = '';
      //alt + 96 ``

      res["detalle"].forEach((row) => {
        html += `
          <tr>
          <td>${row["id"]}</td>
          <td>${row["descripcion"]}</td>
          <td>${row["cantidad"]}</td>
          <td><input type="text" class="form-control" placeholder="0"  onkeyup="calcularDescuento(event,${row["id"]
          });"></td>
          <td class="text-center"><b>${row["descuento"] == ".00" ? "0" : row["descuento"]
          }</b></td>
          <td>S/ ${row["precio"]}</td>
          <td>S/ ${row["sub_total"]}</td>
          <td>
          <button class="btn btn-info" ><b><i class="fas fa-minus"></i></b></button>
            <button class="btn btn-warning "><b><i class="fas fa-plus"></i></b></button>
            <button class="btn btn-danger" onclick="deleteDetalle(${row["id"]
          },2);">
              <I class="fa fa-times">
              </I>
            </button>
          </td>
          </tr>
        `;
      });


      const total = res["total_pagar"].total ? res["total_pagar"].total : 0.0;
      document.getElementById("totalV").value = "S/ " + total;
      document.getElementById("tblDetalleVentas").innerHTML = html;

    }
  }
}

function calcularDescuento(e, id) {
  e.preventDefault();
  if (e.target.value == "") {
    alertas("Ingrese el descuento", "warning");
  } else {
    if (e.which == 13) {
      const url =
        base_url + "Compras/calcularDescuento/" + id + "," + e.target.value;

      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          console.log(this.responseText);
          const res = JSON.parse(this.responseText);
          alertas(res.msg, res.icono);
          cargarDetalleVenta();
        }
      };
    }
  }
}

function frmCambiarPass(e) {
  e.preventDefault();
  const passActual = document.getElementById("passActual").value;
  const passNuevo = document.getElementById("passNuevo").value;
  const passConfirm = document.getElementById("passConfirm").value;
  if (passActual == "" || passNuevo == "" || passConfirm == "") {
    alertas("LLenar Todos los campos son abligatorios..", "warning");
  } else {
    if (passNuevo != passConfirm) {
      alertas("Las constraseñas no son IGUALES..", "warning");
    } else {
      const url = base_url + "Usuarios/cambiarPass";
      const frm = document.getElementById("frmCambiarPass");
      const http = new XMLHttpRequest();
      http.open("POST", url, true);
      http.send(new FormData(frm));
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          console.log(this.responseText);
          const res = JSON.parse(this.responseText);
          alertas(res.msg, res.icono);

          $("#nuevaClave").modal("hide");
          frm.reset();
        }
      };
    }
  }
}

if (document.getElementById("id_stock")) {
  getStockMin();
  productoMasVend();
  producotosVendidosendias();
  productoSinStock();
}

function getStockMin() {
  const url = base_url + "Administracion/getStokcMinProductos";
  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      let descripcion = [];
      let cantidad = [];

      for (let i = 0; i < res.length; i++) {
        descripcion.push(res[i]["descripcion"]);
        cantidad.push(res[i]["cantidad"]);
      }
      var ctxp = document.getElementById("id_stock");
      var myPieChart = new Chart(ctxp, {
        type: "pie",
        data: {
          labels: descripcion,
          datasets: [
            {
              data: cantidad,
              backgroundColor: [
                "#ffb3e6",  // pastel pink
                "#c2c2f0",  // pastel lavender
                "#ffb3b3",  // pastel light red
                "#c2f0c2",  // pastel light green
                "#ffebcc",  // pastel peach
                "#e6e6ff",  // pastel light blue
                "#f9e3e3",  // pastel light rose
                "#d1e0e0",  // pastel light teal
                "#f2c6c6",  // pastel blush
                "#d9d9f3",  // pastel soft blue
                "#e6e6d1",  // pastel light tan
                "#f2f2f2",  // pastel off-white
                "#d9f2d9",  // pastel mint
                "#e5e5d4",  // pastel cream
                "#e3d9f3",  // pastel lilac
                "#c4e1f2",  // pastel sky blue
                "#f3c6e6",  // pastel light magenta
                "#f7d3c4",  // pastel coral
                "#d9f2e5",  // pastel pale green
                "#e0d9f2",  // pastel pale lavender
                "#f5f2d1",  // pastel soft yellow
                "#d9e5f2",  // pastel light periwinkle
                "#f2e6d1",  // pastel beige
                "#d0e2d9",  // pastel sage green
                "#f2c2e0",  // pastel cotton candy
                "#d9c2e0",  // pastel light mauve
                "#f5d3c4",  // pastel light peach
                "#d2f2e5",  // pastel light mint green
                "#e0d1f2",  // pastel pale violet
                "#e6d9c4",  // pastel soft tan
                "#f2e0d9",  // pastel soft salmon
                "#c4e5f2",  // pastel soft azure
                "#f2c4c4",  // pastel light rose pink
              ],
            },
          ],
        },
      });
    }
  };
}

// ====================

function productoMasVend() {
  const url = base_url + "Administracion/getProductosV";
  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      let descripcion = [];
      let TOTAL = [];

      for (let i = 0; i < res.length; i++) {
        descripcion.push(res[i]["descripcion"]);
        TOTAL.push(res[i]["TOTAL"]);
      }
      var pv = document.getElementById("pvendidos");
      var myPieChart = new Chart(pv, {
        type: "doughnut",
        data: {
          labels: descripcion,
          datasets: [
            {
              data: TOTAL,
              backgroundColor: [
                "#99bbff",  // pastel blue
                "#ff9999",  // pastel red
                "#ffeb99",  // pastel yellow
                "#ff9999",  // pastel red
                "#99ff99",  // pastel green
                "#9999ff",  // pastel blue
                "#ffff99",  // pastel yellow
                "#ff99ff",  // pastel magenta
                "#99ffff",  // pastel cyan
                "#cc9999",  // pastel maroon
                "#99cc99",  // pastel green
                "#9999cc",  // pastel navy
                "#cccc99",  // pastel olive
                "#cc99cc",  // pastel purple
                "#99cccc",  // pastel teal
                "#e0e0e0",  // pastel silver
                "#c0c0c0",  // pastel gray
                "#ffd699",  // pastel orange
                "#ffcccb",  // pastel pink
                "#cc99cc",  // pastel purple
                "#ffec99",  // pastel gold
                "#99cc99",  // pastel green
                "#999999",  // pastel black (gray)
                "#a3b8e5",  // pastel medium blue
                "#e5d2a4",  // pastel medium brown
                "#bb99cc",  // pastel purple
                "#b399b3",  // pastel medium purple
                "#aaccd9",  // pastel medium cyan
                "#ffa3e5",  // pastel fuchsia
                "#d7a3d7",  // pastel medium light purple
                "#d7a3c3",  // pastel medium light pink
                "#b3e8d6",  // pastel medium light cyan
                "#c799d9",  // pastel medium dark purple
                "#ff99d9",  // pastel medium pink
                "#73856b",  // pastel medium olive green
                "#d7ccb2",  // pastel medium beige
                "#f5a3f4",  // pastel medium light purple-pink
                "#a3d7a3",  // pastel medium light green
                "#a399e5",  // pastel medium dark blue
                "#a3e5c4",  // pastel medium light cyan-green
                "#a3a3a3",  // pastel medium dark gray
                "#e5d899",  // pastel medium light gold
                "#c7e5b3",  // pastel medium light green
              ],
            },
          ],
        },
      });
    }
  };
}
function producotosVendidosendias() {
  const url = base_url + "Administracion/getVentasPorDia";
  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      let fechas = [];
      let totalVentas = [];

      for (let i = 0; i < res.length; i++) {
        fechas.push(res[i]["descripcion"]);
        totalVentas.push(res[i]["total_ventas"]);
      }

      var ctx = document.getElementById("id_vendidos_dias").getContext("2d");
      var myBarChart = new Chart(ctx, {
        type: "bar",
        data: {
          labels: fechas,
          datasets: [
            {
              label: "Total de Ventas",
              data: totalVentas,
              backgroundColor: "rgba(75, 192, 192, 0.2)",
              borderColor: "rgba(75, 192, 192, 1)",
              borderWidth: 1
            }
          ]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true

            }
          }
        }
      });
    }
  };
}


async function productoSinStock() {
  try {
    const url = base_url + "Administracion/getProductoSinStock";
    const res = await fetch(url, {
      method: 'GET'
    });
    if (res.ok) {
      const data = await res.json();
      let html = '';

      data.forEach((row) => {
        html += `


              <tr>
                <th scope="row"> <img class="img-thumbnail" src='${row.foto}' style="width:50px"> </th>
                <td class="text-danger">${row.descripcion}</td>
                
              </tr>
           


`;
      });

      $("#sinStock").html(html);

    }
  } catch (error) {

  }
}


function totalVentas() {
  const url = base_url + "Administracion/getVentas";
  const http = new XMLHttpRequest();

}


//=====================================COMPRAAS===============================

function anularVenta(id) {

  Swal.fire({
    title: "¿Estas seguro de anular la Compra? ",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3d9970",
    cancelButtonColor: "#dc3545",
    confirmButtonText: "Si",
    cancelButtonText: "No",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Compras/anularCompra/" + id;

      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

          const res = JSON.parse(this.responseText);
          if (res.msg === 'ok') {
            alertas('Se anulo correctamente la Compra', res.icono);
            tblHistorial.ajax.reload();
          } else {
            alertas('Error al anular  la Compra', 'Error');

          }
        }
      };
    }
  });
}

// =======================MARCA=========================


function nuevaMarca() {
  document.getElementById("title_marca").innerHTML = "Registrar Marca";
  document.getElementById("btnAccionMarca").innerHTML = "Registrar Marca";
  $('#nuevo_marca').modal('show');
}

function registrarMarcas(e) {
  e.preventDefault();

  const nombre = document.getElementById("nombre_marca");


  if (nombre.value == "") {
    Swal.fire({
      position: "top-end",
      icon: "error",
      title: "Todos los campos son obligatorios",
      showConfirmButton: false,
      timer: 3000,
    });
  } else {
    const url = base_url + "Marcas/registrar";
    const frm = document.getElementById("frmMarcas");
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(new FormData(frm));
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {

        const res = JSON.parse(this.responseText);
        if (res == "si") {
          Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Se registro correctamente!!",
            showConfirmButton: false,
            timer: 1500,
          });
          frm.reset();
          $("#nuevo_marca").modal("hide");
          tblMarcas.ajax.reload();
        } else if (res == "modificado") {
          Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Se modificó con Exito!!",
            showConfirmButton: false,
            timer: 1500,
          });

          $("#nuevo_marca").modal("hide");
          tblMarcas.ajax.reload();
        } else {
          Swal.fire({
            position: "top-end",
            icon: "error",
            title: res,
            showConfirmButton: false,
            timer: 3000,
          });
        }
      }
    };
  }



}


function btnActualizarMarca(id) {
  document.getElementById("title_marca").innerHTML = "Actualizar Marca";
  document.getElementById("btnAccionMarca").innerHTML = "Actualizar Marca";
  $("#nuevo_marca").modal("show");
  const url = base_url + "Marcas/editar/" + id;

  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      const res = JSON.parse(this.responseText);
      document.getElementById("id").value = res.id;
      document.getElementById("nombre_marca").value = res.nombre_marca;
      $("#nuevo_marca").modal("show");



    }
  };
}


function btnEliminarMarca(id) {
  Swal.fire({
    title: "Estas seguro de eliminar?",
    text: "Marca no se eliminará de forma permanente, solo se desactivará..!!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si!",
    cancelButtonText: "NO",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Marcas/eliminar/" + id;

      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);

          if (res == "ok") {
            Swal.fire("Mensaje!!", "Marca eliminada con éxito!!", "success");
          } else {
            Swal.fire("Mensaje!", res, "error");
          }
          tblMarcas.ajax.reload();
        }
      };
    }
  });
}


function btnReingresarMarca(id) {
  Swal.fire({
    title: "¿Estas seguro de reingresar esta marca?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si!",
    cancelButtonText: "NO",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Marcas/reingresar/" + id;

      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);

          if (res == "ok") {
            Swal.fire("Mensaje!", "Marca reingresado con éxito!!", "success");
          } else {
            Swal.fire("Mensaje!", res, "error");
          }
          tblMarcas.ajax.reload();
        }
      };
    }
  });
}



// ######################Apertura caja ################

function frmAbrirCaja() {
  document.getElementById("title_caja_apertura").innerHTML = "Abrir Caja";
  const informes = document.getElementById('informes');
  document.getElementById("txt_caja_apertura").value = '';
  informes.classList.add('d-none');
  document.getElementById("btn_caja").textContent = 'Abrir Caja';
  document.getElementById("title_caja_apertura").textContent = 'Abrir Caja';
  document.getElementById("id").value = '';
  $('#apertura_caja').modal('show');
}

function abriCaja(e) {
  e.preventDefault();
  const caja = document.getElementById('txt_caja_apertura').value;
  if (caja == '') {
    alertas('El campo caja esta vacía!!', 'warning');
  } else {
    const url = base_url + "Cajas/abrirArqueo";
    const form = document.getElementById("frmCajaApertura");
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(new FormData(form));
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {

        console.log(this.responseText);
        const res = JSON.parse(this.responseText);

        tbl_cajaApertura.ajax.reload();
        $('#apertura_caja').modal('hide');
        verificarBtn();
        alertas(res.msg, res.icon);


      }
    }
  }


}
function frmCerrarCaja() {
  const url = base_url + "Cajas/getVentas";
  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      const res = JSON.parse(this.responseText);
      //  
      const informes = document.getElementById('informes');
      informes.classList.remove('d-none');

      document.getElementById("txt_montoFinal").value = res.monto_total_ventas.cantidad_ventas;
      document.getElementById("txt_totalVentas").value = res.cantidad_ventas.total_ventas;
      document.getElementById("txt_caja_apertura").value = res.total_montoInicial.monto_inicial;
      document.getElementById("txt_totalMontoFinal").value = res.total_montoFinal;
      document.getElementById("id").value = res.total_montoInicial.id;
      document.getElementById("btn_caja").textContent = 'Cerrar Caja';
      document.getElementById("title_caja_apertura").textContent = 'Cerrar Caja';
      verificarBtn();
      $('#apertura_caja').modal('show');

    }
  };
}
function verificarBtn() {

  const url = base_url + "Cajas/verificarBtn";
  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {

      const res = JSON.parse(this.responseText);
      const btnCerrar = document.getElementById("btnCerrar");
      if (res.msg == 'error') {
        btnCerrar.classList.add('d-none');
      } else {
        btnCerrar.classList.remove('d-none');
      }



    }
  };
}
// =====================Anular Venta=======================

function anularVenta(id) {
  Swal.fire({
    title: "¿¡Estas seguro de anular la Venta!? ",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3d9970",
    cancelButtonColor: "#dc3545",
    confirmButtonText: "Si",
    cancelButtonText: "No",
  }).then((result) => {

    if (result.isConfirmed) {

      const url = base_url + "Compras/anularVenta/" + id;

      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

          const res = JSON.parse(this.responseText);
          if (res.msg === 'ok') {
            alertas('Se anulo correctamente la Venta', res.icono);
            tblHistorialVenta.ajax.reload();
          } else {
            alertas('Error al anular  la Venta', 'error');

          }
        }
      };
    }
  });
}

function imprimir(ruta, tipo) {
  const misVentas = document.getElementById("misVentas");
  const modalc = document.getElementById('imprimirCompra');

  if (tipo == 'venta') {
    misVentas.innerHTML = `
    <iframe  src="${ruta}"  style="width: 100%; height:80vh;" frameborder="0"></iframe>
    `;

    $('#modalImprimiarVenta').modal('show');
    $("#modalImprimiarVenta").on('hidden.bs.modal', function () {
      cargarDetalleVenta();
    });
  } else if (tipo == 'compra') {

    modalc.src = ruta;
    $('#modalImprimirCompra').modal('show');
  }

}

function registrarPermisos(e) {
  e.preventDefault();

  const form = document.getElementById("fomularioPermiso");
  const url = base_url + 'Usuarios/registrarPermisos'
  const http = new XMLHttpRequest();
  http.open("POST", url, true);
  http.send(new FormData(form));
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {

      const res = JSON.parse(this.responseText);
      if (res.msg != '') {
        alertas(res.msg, res.icono);
      } else {
        alertas('Error no identificado', 'Error');
      }

    }
  }
}


function getCodigo() {


  const url = base_url + "Productos/generarCodigo";

  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      document.getElementById("codigo").value = (res);

    }
  }



}

async function buscarProductos(e) {
  const tipo = e.target.name;

 
  const valor = encodeURIComponent(e.target.value);
  let url;
  const tblbuscar = document.getElementById('tblDetalleBuscarVentas');
 

  if (tipo === 'Bmarcas') {

    url = `${base_url}Compras/getFiltrarProductos?id=${valor}&tipo=1`;

  } else if (tipo === 'bCategoria') {

    url = `${base_url}Compras/getFiltrarProductos?id=${valor}&tipo=2`;

  } else if (tipo === 'txt_marca') {

    url = `${base_url}Compras/getFiltrarProductos?id=${valor}&tipo=3`;

  }
  
  // // if (valor == '') {
  // //   tblbuscar.innerHTML = '';
  // //   return;
  // // }

  try {
     const res= await fetch(url,{
      method:'GET'
     })
     if(res.ok){
      const data=await res.json();

      console.log(data['Productos']);

      let html='';
      data['Productos'].forEach((row)=>{
        html +=`
            <tr>
              <td>${row['codigo']}</td>
              <td> <img src="${row['foto']}" class="img-thumbnail" style="width:50px" ></td>
              <td>${row['descripcion']}</td>
              <td>${row['nombre_marca']}</td>
              <td>${row['cantidad']}</td>
              <td>${row['precio_venta']}</td>
            </tr>
        `;
      });
      
     
      $("#tblDetalleBuscarVentas").html(html);
     }
  } catch (error) {
    
  }
}