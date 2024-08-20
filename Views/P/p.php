<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form id="frmP">

        <input type="text" name="nombre" id="nombre" placeholder="Nombre" value="Franco2023">
        <input type="text" name="pass" id="pass" placeholder="Contraseña" value="123">
        <button type="submit" onclick="frmP(event);">Enviar</button>
    </form>
    <script src="<?php echo base_url; ?>Assets/js/p.js"></script>
    <script>
        const base_url = "<?php echo base_url; ?>";
    </script>
</body>

</html>