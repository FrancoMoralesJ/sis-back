function frmLogin(e) {


  e.preventDefault();

  const usuario = document.getElementById("User");
  const clave = document.getElementById("Pass");

  if (usuario.value == "") {
    usuario.focus();
    clave.classList.remove("is-invalid");
    usuario.classList.add("is-invalid");
  } else if (clave.value == "") {
    clave.focus();
    usuario.classList.remove("is-invalid");
    clave.classList.add("is-invalid");
  } else {
    const url = base_url + "Usuarios/validar";
    const frm = document.getElementById("frmLogin");
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(new FormData(frm));
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
   
        
        const res = JSON.parse(this.responseText);
        console.log(res);
        switch (res) {
          case "ok":
            // window.location=
            window.location.href = base_url + "Administracion/home";
            console.log(res);
            break;
          case "error":
            document.getElementById("alerta").classList.remove("d-none");
            document.getElementById("alerta").innerHTML =
              "Usuario o contraseña incorrecta";
            break;
        }
      }
    }
  }
}
