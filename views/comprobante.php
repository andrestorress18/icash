<div class="container-cab">
	<h3>Comprobante</h3>
	<div class="contenedor-flex">
		<button type="button" class="btn btn-primary" onclick="history.back()">
		  Atras
		</button>
	</div>
</div>
<div class="row justify-content-md-center">
	<div class="col-md-auto width-60-pto p-3">
<?php
if (isset($_POST["accion"])) {
 	$_SESSION['accion'] = $_POST["accion"];
 } 

switch ($_SESSION['accion']) {
	case 'venta':
		include'./views/forms/form-vent-add.php';
		break;
	case 'compra':
		include'./views/forms/form-comp-add.php';
		break;
	case 'devolucion':
		include'./views/forms/form-devo-add.php';
		break;
	default:
		include'./views/forms/form-vent-add.php';
		break;
}
 ?>
</div>
</div>
