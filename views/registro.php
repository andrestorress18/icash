<?php
//$puc_controller = new CuentasController();
//$puc = $puc_controller->get(); 
//$num_puc = empty($puc) ? 0 : count($puc); 

print('<title>Registro | iCash</title>');?>
<div class="container-cab">
	<h3>Registro</h3>
	<div class="contenedor-flex">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal-addVenta">
		  Agregar Venta
		</button>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal-addCompra">
		  Agregar Compra
		</button>
	</div>
</div>
<?php 
$datos = 1;
$num_tit = empty($datos) ? 0 : count($datos);
	$modal = new FunctionModel();
    $modal->ventana_modal("addCompra",$datos, "", "Añadir Compra", "form-compra-add");
    $modal->ventana_modal("addVenta",$datos, "", "Añadir Venta", "form-venta-add");
    $modal->ventana_modal("edi",$datos, "", "Editar Compra", "form-product-edi");
    $modal->ventana_modal("del",$datos, "", "Eliminar Compra", "form-product-del");
 ?>
<div class="cont-pad-tre"><?php
	if (isset($_GET['success'])) {
		echo '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>'.$_GET['success'].'</strong> 
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>';
	}?>
<?php 
//$result_controller = new CuentasController();
//$result = $result_controller->get_resultados(); 
//$num_result = empty($result) ? 0 : count($result); 
 ?>
<div class="container-tabla">
	<table id="tbl_cuentas" class="table table-striped">
  <thead>
    <tr>
	      <th scope="col">Codigo</th>
	      <th scope="col">Fecha</th>
	      <th scope="col">Descripción</th>
	      <th scope="col">Tipo</th>
	      <th scope="col">Cliente / Proveedor</th>
	      <th scope="col">Valor</th>
		  <th scope="col">OPCIONES</th>
	    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">00001</th>
	      <td>12/03/2020</td>
	      <td>Compre de neumaticos</td>
	      <td>Compra</td>
	      <td>Michellin</td>
	      <td>3.000.000</td>
      	<td>	
      		<button type="button" class="btn btn-warning">Devolución</button>
      		<button type="button" class="btn btn-primary"><i class="fa fa-eye"></i></button>
	      	<button type="button" class="btn btn-info"><i class="fa fa-pencil-alt"></i></button>
	      	<button type="button" class="btn btn-danger"><i class="fa fa-trash-alt"></i></button>
	    </td>
    </tr>
    <tr>
      <th scope="row">00002</th>
	      <td>12/03/2020</td>
	      <td>Compre de neumaticos</td>
	      <td>Compra</td>
	      <td>Michellin</td>
	      <td>3.000.000</td>
      	<td>	
      		<button type="button" class="btn btn-warning">Devolución</button>
      		<button type="button" class="btn btn-primary"><i class="fa fa-eye"></i></button>
	      	<button type="button" class="btn btn-info"><i class="fa fa-pencil-alt"></i></button>
	      	<button type="button" class="btn btn-danger"><i class="fa fa-trash-alt"></i></button>
	    </td>
    </tr>
    <tr>
      <th scope="row">00003</th>
	      <td>12/03/2020</td>
	      <td>Compre de neumaticos</td>
	      <td>Compra</td>
	      <td>Michellin</td>
	      <td>3.000.000</td>
      	<td>	
      		<button type="button" class="btn btn-warning">Devolución</button>
      		<button type="button" class="btn btn-primary"><i class="fa fa-eye"></i></button>
	      	<button type="button" class="btn btn-info"><i class="fa fa-pencil-alt"></i></button>
	      	<button type="button" class="btn btn-danger"><i class="fa fa-trash-alt"></i></button>
	    </td>
    </tr>
    <tr>
      <th scope="row">00004</th>
	      <td>12/03/2020</td>
	      <td>Compre de neumaticos</td>
	      <td>Compra</td>
	      <td>Michellin</td>
	      <td>3.000.000</td>
      	<td>	
      		<button type="button" class="btn btn-warning">Devolución</button>
      		<button type="button" class="btn btn-primary"><i class="fa fa-eye"></i></button>
	      	<button type="button" class="btn btn-info"><i class="fa fa-pencil-alt"></i></button>
	      	<button type="button" class="btn btn-danger"><i class="fa fa-trash-alt"></i></button>
	    </td>
    </tr>
    <tr>
      <th scope="row">00005</th>
	      <td>12/03/2020</td>
	      <td>Compre de neumaticos</td>
	      <td>Compra</td>
	      <td>Michellin</td>
	      <td>3.000.000</td>
      	<td>	
      		<button type="button" class="btn btn-warning">Devolución</button>
      		<button type="button" class="btn btn-primary"><i class="fa fa-eye"></i></button>
	      	<button type="button" class="btn btn-info"><i class="fa fa-pencil-alt"></i></button>
	      	<button type="button" class="btn btn-danger"><i class="fa fa-trash-alt"></i></button>
	    </td>
    </tr>
    <tr>
      <th scope="row">00006</th>
	      <td>12/03/2020</td>
	      <td>Compre de neumaticos</td>
	      <td>Compra</td>
	      <td>Michellin</td>
	      <td>3.000.000</td>
      	<td>	
      		<button type="button" class="btn btn-warning">Devolución</button>
      		<button type="button" class="btn btn-primary"><i class="fa fa-eye"></i></button>
	      	<button type="button" class="btn btn-info"><i class="fa fa-pencil-alt"></i></button>
	      	<button type="button" class="btn btn-danger"><i class="fa fa-trash-alt"></i></button>
	    </td>
    </tr>
    <tr>
      <th scope="row">00007</th>
	      <td>12/03/2020</td>
	      <td>Compre de neumaticos</td>
	      <td>Compra</td>
	      <td>Michellin</td>
	      <td>3.000.000</td>
      	<td>	
      		<button type="button" class="btn btn-warning">Devolución</button>
      		<button type="button" class="btn btn-primary"><i class="fa fa-eye"></i></button>
	      	<button type="button" class="btn btn-info"><i class="fa fa-pencil-alt"></i></button>
	      	<button type="button" class="btn btn-danger"><i class="fa fa-trash-alt"></i></button>
	    </td>
    </tr>
    <tr>
      <th scope="row">00008</th>
	      <td>12/03/2020</td>
	      <td>Compre de neumaticos</td>
	      <td>Compra</td>
	      <td>Michellin</td>
	      <td>3.000.000</td>
      	<td>	
      		<button type="button" class="btn btn-warning">Devolución</button>
      		<button type="button" class="btn btn-primary"><i class="fa fa-eye"></i></button>
	      	<button type="button" class="btn btn-info"><i class="fa fa-pencil-alt"></i></button>
	      	<button type="button" class="btn btn-danger"><i class="fa fa-trash-alt"></i></button>
	    </td>
    </tr>
    <tr>
      <th scope="row">00009</th>
	      <td>12/03/2020</td>
	      <td>Compre de neumaticos</td>
	      <td>Compra</td>
	      <td>Michellin</td>
	      <td>3.000.000</td>
      	<td>	
      		<button type="button" class="btn btn-warning">Devolución</button>
      		<button type="button" class="btn btn-primary"><i class="fa fa-eye"></i></button>
	      	<button type="button" class="btn btn-info"><i class="fa fa-pencil-alt"></i></button>
	      	<button type="button" class="btn btn-danger"><i class="fa fa-trash-alt"></i></button>
	    </td>
    </tr>
    <tr>
      <th scope="row">00010</th>
	      <td>12/03/2020</td>
	      <td>Compre de neumaticos</td>
	      <td>Compra</td>
	      <td>Michellin</td>
	      <td>3.000.000</td>
      	<td>	
      		<button type="button" class="btn btn-warning">Devolución</button>
      		<button type="button" class="btn btn-primary"><i class="fa fa-eye"></i></button>
	      	<button type="button" class="btn btn-info"><i class="fa fa-pencil-alt"></i></button>
	      	<button type="button" class="btn btn-danger"><i class="fa fa-trash-alt"></i></button>
	    </td>
    </tr>
    <tr>
      <th scope="row">00011</th>
	      <td>12/03/2020</td>
	      <td>Compre de neumaticos</td>
	      <td>Compra</td>
	      <td>Michellin</td>
	      <td>3.000.000</td>
      	<td>	
      		<button type="button" class="btn btn-warning">Devolución</button>
      		<button type="button" class="btn btn-primary"><i class="fa fa-eye"></i></button>
	      	<button type="button" class="btn btn-info"><i class="fa fa-pencil-alt"></i></button>
	      	<button type="button" class="btn btn-danger"><i class="fa fa-trash-alt"></i></button>
	    </td>
    </tr>
    <tr>
      <th scope="row">00012</th>
	      <td>12/03/2020</td>
	      <td>Compre de neumaticos</td>
	      <td>Compra</td>
	      <td>Michellin</td>
	      <td>3.000.000</td>
      	<td>	
      		<button type="button" class="btn btn-warning">Devolución</button>
      		<button type="button" class="btn btn-primary"><i class="fa fa-eye"></i></button>
	      	<button type="button" class="btn btn-info"><i class="fa fa-pencil-alt"></i></button>
	      	<button type="button" class="btn btn-danger"><i class="fa fa-trash-alt"></i></button>
	    </td>
    </tr>
    <tr>
      <th scope="row">00013</th>
	      <td>12/03/2020</td>
	      <td>Compre de neumaticos</td>
	      <td>Compra</td>
	      <td>Michellin</td>
	      <td>3.000.000</td>
      	<td>	
      		<button type="button" class="btn btn-warning">Devolución</button>
      		<button type="button" class="btn btn-primary"><i class="fa fa-eye"></i></button>
	      	<button type="button" class="btn btn-info"><i class="fa fa-pencil-alt"></i></button>
	      	<button type="button" class="btn btn-danger"><i class="fa fa-trash-alt"></i></button>
	    </td>
    </tr>
    <tr>
      <th scope="row">00014</th>
	      <td>12/03/2020</td>
	      <td>Compre de neumaticos</td>
	      <td>Compra</td>
	      <td>Michellin</td>
	      <td>3.000.000</td>
      	<td>	
      		<button type="button" class="btn btn-warning">Devolución</button>
      		<button type="button" class="btn btn-primary"><i class="fa fa-eye"></i></button>
	      	<button type="button" class="btn btn-info"><i class="fa fa-pencil-alt"></i></button>
	      	<button type="button" class="btn btn-danger"><i class="fa fa-trash-alt"></i></button>
	    </td>
    </tr>
    <tr>
      <th scope="row">00015</th>
	      <td>12/03/2020</td>
	      <td>Compre de neumaticos</td>
	      <td>Compra</td>
	      <td>Michellin</td>
	      <td>3.000.000</td>
      	<td>	
      		<button type="button" class="btn btn-warning">Devolución</button>
      		<button type="button" class="btn btn-primary"><i class="fa fa-eye"></i></button>
	      	<button type="button" class="btn btn-info"><i class="fa fa-pencil-alt"></i></button>
	      	<button type="button" class="btn btn-danger"><i class="fa fa-trash-alt"></i></button>
	    </td>
    </tr>
    <tr>
      <th scope="row">00016</th>
	      <td>12/03/2020</td>
	      <td>Compre de neumaticos</td>
	      <td>Compra</td>
	      <td>Michellin</td>
	      <td>3.000.000</td>
      	<td>	
      		<button type="button" class="btn btn-warning">Devolución</button>
      		<button type="button" class="btn btn-primary"><i class="fa fa-eye"></i></button>
	      	<button type="button" class="btn btn-info"><i class="fa fa-pencil-alt"></i></button>
	      	<button type="button" class="btn btn-danger"><i class="fa fa-trash-alt"></i></button>
	    </td>
    </tr>
    <tr>
      <th scope="row">00017</th>
	      <td>12/03/2020</td>
	      <td>Compre de neumaticos</td>
	      <td>Compra</td>
	      <td>Michellin</td>
	      <td>3.000.000</td>
      	<td>	
      		<button type="button" class="btn btn-warning">Devolución</button>
      		<button type="button" class="btn btn-primary"><i class="fa fa-eye"></i></button>
	      	<button type="button" class="btn btn-info"><i class="fa fa-pencil-alt"></i></button>
	      	<button type="button" class="btn btn-danger"><i class="fa fa-trash-alt"></i></button>
	    </td>
    </tr>
  </tbody>
</table>
</div>
</div>
<script>
	$(document).ready(function () {
	  $('#tbl_cuentas').DataTable();
	  $('.dataTables_length').addClass('bs-select');
	});
</script>