
  let url = "https://api.apis.net.pe/v1/dni?numero=71211127";

  let dni = fetch(url)
    .then(function (res) {
      return res.json();
    })
    .then(function (data) {
      console.log(data);
    });

  const mostrarData = function (data) {
    console.log(data);
  };



