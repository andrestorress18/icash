<?php
/***********INICIO CUERPO***********/
$usuario_controller = new UsuarioController();
$usuario = $usuario_controller->get();
$num_usuario = empty($usuario) ? 0 : count($usuario);
$datos = array_keys($usuario[0]);
$num_tit = empty($datos) ? 0 : count($datos);
?>
<title>Clientes / Proveedores | iCash</title>
<div class="container-cab">
	<h3>Clientes / Proveedores</h3>
	<div class="cont-flex">
		<button type="button" class="btn btn-primary" data-toggle="modal" onClick="limpiar_add()" data-target="#Modal-add-clie">
		  Agregar Cliente
		</button>
		<button type="button" class="btn btn-primary" data-toggle="modal" onClick="limpiar_add()" data-target="#Modal-add-prov">
		  Agregar Proveedor
		</button>
	</div>	
</div>
<?php 
$datos = 1;
if ( is_array( $datos ) ) {
$num_tit = empty($datos) ? 0 : count($datos);
}
$modal = new FunctionModel();
$modal->ventana_modal("add-clie",$datos, "", "Agregar Cliente", "form-client-add");
$modal->ventana_modal("edi-clie",$datos, "", "Editar Cliente", "form-client-edi");
$modal->ventana_modal("del-clie",$datos, "", "Eliminar Cliente", "form-persona-del");
$modal->ventana_modal("add-prov",$datos, "", "Agregar proveedor", "form-proveedor-add");
$modal->ventana_modal("edi-prov",$datos, "", "Editar proveedor", "form-proveedor-edi");
$modal->ventana_modal("del-prov",$datos, "", "Eliminar proveedor", "form-persona-del");
 ?>
<div class="cont-pad-tre">
	<?php 
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
	 ?>
	<ul class="nav nav-tabs" id="myTab" role="tablist">
		<li class='nav-item'>
		    <a class='nav-link active' id='tab_1-tab' data-toggle='tab' href='#tab_1' role='tab' aria-controls='Clientes' aria-selected='true'>Clientes</a>
		</li>
		<li class='nav-item'>
		    <a class='nav-link' id='tab_2-tab' data-toggle='tab' href='#tab_2' role='tab' aria-controls='Proveedores' aria-selected='true'>Proveedores</a>
		</li>
	</ul>
<!-- Modal -->

	<div class="tab-content" id="myTabContent">
		<div class='tab-pane fade show active' id='tab_1' role='tabpanel' aria-labelledby='tab_1-tab'>
			<div class='container-tabla'>
				<table id='tbl_cate_1' class='table table-striped'>
				  <thead>
				    <tr>
				      <th scope='col'>Codigo</th>
				      <th scope='col'>N° Documento</th>
				      <th scope='col'>Nombre</th>
				      <th scope='col'>Correo</th>
				      <th scope='col'>Celular</th>
				      <th scope='col'>Opciones</th>
				    </tr>
				 	</thead>
 					<tbody>
 						<?php 
 							$clientes      = new PersonaController();
			                $clientes_data = $clientes->get('Cliente');
			                $num_clientes    = count($clientes_data); 
	 						for ($i=0; $i < $num_clientes; $i++) { 
	 							echo "<tr><td>".$clientes_data[$i]['clpr_cod']."</td>
	 							<td>".$clientes_data[$i]['clpr_doc']."</td>
	 							<td>".$clientes_data[$i]['clpr_nom']."</td>
								<td>".$clientes_data[$i]['clpr_cor']."</td>
								<td>".$clientes_data[$i]['clpr_cel']."</td>
								<td class='cont-flex'>
									<button type='button' class='btn btn-info'><i class='fa fa-pencil-alt'></i></button>
	      							<button type='button' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#Modal-del-clie' data-name='".$clientes_data[$i]['clpr_nom']."' data-clpr_cod='".$clientes_data[$i]['clpr_cod']."' data-clpr_nom='".$clientes_data[$i]['clpr_cod']."'><i class='fa fa-trash-alt'></i></button>
	      						</td>";
	      					}
 						 ?>
				  	</tbody>
				</table>
			</div>
			<script>
				$(document).ready(function () {
				  $('#tbl_cate_1').DataTable();
				  $('.dataTables_length').addClass('bs-select');
				});
			</script>
	  	</div>
	  	<div class='tab-pane fade show' id='tab_2' role='tabpanel' aria-labelledby='tab_2-tab'>
			<div class='container-tabla'>
				<table id='tbl_cate_2' class='table table-striped'>
				  <thead>
				    <tr>
				      <th scope='col'>Codigo</th>
				      <th scope='col'>C.C. Repre.</th>
				      <th scope='col'>Representante</th>
				      <th scope='col'>RUC/RUT</th>
				      <th scope='col'>Empresa</th>
				      <th scope='col'>Correo</th>
				      <th scope='col'>Telefono</th>
				      <th scope='col'>Opciones</th>
				    </tr>
				 	</thead>
 					<tbody>
 						<?php 
 							$proveedores      = new PersonaController();
			                $proveedores_data = $proveedores->get('Proveedor');
			                $num_proveedores    = count($proveedores_data); 
	 						for ($i=0; $i < $num_proveedores; $i++) { 
	 							echo "<tr><td>".$proveedores_data[$i]['clpr_cod']."</td>
	 							<td>".$proveedores_data[$i]['clpr_doc']."</td>
	 							<td>".$proveedores_data[$i]['clpr_nom']."</td>
	 							<td>".$proveedores_data[$i]['clpr_nit']."</td>
	 							<td>".$proveedores_data[$i]['clpr_emp']."</td>							
								<td>".$proveedores_data[$i]['clpr_cor']."</td>
								<td>".$proveedores_data[$i]['clpr_cel']."</td>
								<td class='cont-flex'>
									<button type='button' class='btn btn-info'><i class='fa fa-pencil-alt'></i></button>
	      							<button type='button' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#Modal-del-prov' data-name='".$proveedores_data[$i]['clpr_nom']."' data-clpr_cod='".$proveedores_data[$i]['clpr_cod']."' data-clpr_nom='".$proveedores_data[$i]['clpr_cod']."'><i class='fa fa-trash-alt'></i></button>
	      						</td>";
	      					}
 						 ?>
				  	</tbody>
				</table>
			</div>
			<script>
				$(document).ready(function () {
				  $('#tbl_cate_2').DataTable();
				  $('.dataTables_length').addClass('bs-select');
				});
			</script>
	  	</div>
	</div>
</div>