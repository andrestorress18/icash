<?php
if ($_SESSION['Sesion'] == true) {
	header('Location: ./kardex');
}
print('
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta property="og:url" content="http://" />
	<meta property="og:title" content="" />
	<meta property="og:type" content="" />
	<meta property="og:description" content="" />
	<meta name="descripcion" content="" />
	<meta property="og:image" content="https://develtec.net/" />
	<meta name="theme-color" content="#FF6600">
	<meta name="keywords" content="jquery, css3, java, sliding, box, menu, cube, navigation, portfolio, thumbnails" />
	<link rel="icon" type="image/png" href="public/img/system/iCash-logo-ico.png" />
	<meta name="viewport" content="width=device-width, user=scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
	<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
	<link rel="stylesheet" href="./public/css/style.css">
	<script src="./public/js/icash.js"></script>
</head>
<body>
	<title>Iniciar sesión | iCash</title>
	<div class="contenedor-fixed">
		<div class="contenedor-color">
			<div class="contenedor-login">
				<div class="login-form">
					<div class="container">
					  <form method="post">
					  	<center>
					  		<div class="login-img">
					  			<img class="img-1" src="./public/img/system/iCash-logo-h.png" width="100" alt="">
					  			<img class="img-2" src="./public/img/system/iCash-logo-h.png" width="100" alt="">
					  		</div>
					    <br>
					        <input type="email" class="form-control" name="email" id="inputEmail3" placeholder="Correo"><br>
					        <input type="password" class="form-control" name="pass" id="inputPassword3" placeholder="Contraseña"><br>
					        <button type="submit" class="btn btn-primary">Ingresar</button>');
if (!empty($_GET["error"])) {
    $template = '
		<br><br><div class="alert alert-danger" role="alert>
			<div class="item  error">%s</div>
		</div>
	';

    printf($template, $_GET['error']);
}
print('					    <center>
					  </form>
					</div>
				</div>
			</div>
		</div>
	</div>
	</body>
	</html>
');
