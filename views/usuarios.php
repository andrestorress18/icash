<?php
if ($_SESSION['usua_rol']<>"Administrador") {
	$controller  = new ViewController();
	$controller->load_view('error401');
}else{
print('<title>Usuarios | iCash</title>');
/***********INICIO CUERPO***********/
$usuario_controller = new UsuarioController();
$usuario = $usuario_controller->get();
if ( is_array( $usuario ) ) {
	$num_usuario = empty($usuario) ? 0 : count($usuario);
}
$nada = 0;
$datos = array(
	0 => 'usua_cod',
	1 => 'usua_ced',
	2 => 'usua_nom',
	3 => 'usua_cor',
	4 => 'usua_pas',
	5 => 'usua_fot',
	6 => 'usua_rol',
	7 => 'usua_est'
	);
if ( is_array( $datos) ) {
$num_tit = empty($datos) ? 0 : count($datos);
}
print('
	<div class="container-cab">
		<h3>Usuarios</h3>
		<button type="button" class="btn btn-primary" data-toggle="modal" onClick="limpiar_add()" data-target="#Modal-add">
		  Añadir Usuario
		  <span class="badge badge-light">'.$num_usuario.'</span>
		</button>
	</div>
	<div class="cont-pad-tre">');
		if (isset($_GET['success'])) {
			echo '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>'.$_GET['success'].'</strong> 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>';
		}
		if (isset($_GET['error'])) {
			echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>'.$_GET['error'].'</strong> 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>';
		}
if ($_GET['r'] == 'usuarios' && !isset($_POST['crud'])) {
    $modal = new FunctionModel();
    $modal->ventana_modal("add",$datos, "", "Añadir usuario", "form-user-add");
    $modal->ventana_modal("edi",$datos, "", "Editar usuario", "form-user-edi");
    $modal->ventana_modal("del",$nada, "", "Eliminar usuario", "form-user-del");
}
if (empty($usuario)) {
    print('
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>USUARIOS</th>
				</tr>
			</thead>
			<tbody>
				<tr><td><p class="no-rows">No hay usuarios registrados en el sistema!</p></td></tr>
			</tbody>
		</table>
	');
} else {
    $template_usuario = '<div class="container-tabla">
		<table >
		<table id="tbl-usuario" class="table table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>Imagen</th>
					<th>Nombre</th>
					<th>N° Indentidad</th>
					<th>Correo</th>
					<th>Rol</th>
					<th>Estado</th>
					<th colspan="2">Opciones</th>
				</tr>
			</thead>
			<tbody>
	';
    $data = array();
    for ($n = 0; $n < $num_usuario; $n++) {
        $template_usuario .= '
			<tr>
				<td>' . $usuario[$n]['usua_cod'] . '</td>
				<td><div class="img-list img-size-uno"><img src="./' . $usuario[$n]['usua_fot'] . '" alt=""></div></td>
				<td>' . $usuario[$n]['usua_nom'] . '</td>
				<td>' . $usuario[$n]['usua_ced'] . '</td>
				<td>' . $usuario[$n]['usua_cor'] . '</td>
				<td>' . $usuario[$n]['usua_rol'] . '</td>
				<td>' . $usuario[$n]['usua_est'] . '</td>
				<td>
					<button type="button" class="btn btn-success btn-sm" data-toggle="modal" onClick="limpiar_edi();" data-target="#Modal-edi" data-name="'.$usuario[$n]['usua_nom'].'" ';
				for ($i=0; $i < $num_tit; $i++) { 
					$template_usuario .='data-'.$datos[$i].'="'.$usuario[$n][$datos[$i]].'" ';
				}
				$template_usuario .='">Editar</button>
				</td>
				<td>';
				if ($usuario[$n]['usua_cod'] <> $_SESSION['usua_id']) {
					$template_usuario .='<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Modal-del" data-name="'.$usuario[$n]['usua_nom'].'" ';
					for ($i=0; $i < $num_tit; $i++) { 
						$template_usuario .='data-'.$datos[$i].'="'.$usuario[$n][$datos[$i]].'" ';
					}
					$template_usuario .='">Eliminar</button>
					</td>';
				}
		$template_usuario .= '					
				</td>
			</tr>
		';
        $data[$n] = $usuario[$n]['usua_cod'];
    }
    $template_usuario .= '</tbody></table></div>';
    print($template_usuario);
}
/***********FIN CUERPO***********/
print('	</div>');
print("<script>
	$(document).ready( function () {
	    $('#tbl-usuario').DataTable();
	} );
</script>");
}