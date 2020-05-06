<?php
//$puc_controller = new CuentasController();
//$puc = $puc_controller->get(); 
//$num_puc = empty($puc) ? 0 : count($puc); 

print('<title>Kardex | iCash</title>');?>
<div class="container-cab">
	<h3>Kardex</h3>	
</div>
<div class="cont-pad-tre"><?php
	if (isset($_GET['success'])) {
		echo '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>'.$_GET['success'].'</strong> 
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>';
	}?>
<?php 
////$result_controller = new CuentasController();
////$result = $result_controller->get_resultados(); 
////$num_result = empty($result) ? 0 : count($result); 
 ?>
<div class="container-tabla">
	<table id="tbl_cuentas" class="table table-striped">
  <thead>
    <tr>
	      <th scope="col" rowspan="2">#</th>
	      <th scope="col" rowspan="2">FECHA</th>
	      <th scope="col" colspan="2">DETALLE</th>
	      <th scope="col" rowspan="2">VALOR UNITARIO</th>
	      <th scope="col" colspan="2">ENTRADAS</th>
	      <th scope="col" colspan="2">SALIDAS</th>
	      <th scope="col" colspan="2">SALDOS</th>
	    </tr>
	    <tr>
	      <th scope="col" >Concepto</th>
	      <th scope="col">N. Fact</th>
	      <th scope="col">Cantidad</th>
	      <th scope="col">Valores</th>
	      <th scope="col">Cantidad</th>
	      <th scope="col">Valores</th>
	      <th scope="col">Cantidad</th>
	      <th scope="col">Valores</th>
		</tr>
  </thead>
  <tbody>
  	<?php 
		for ($m = 0; $m < 5; $m++) {?>
    <tr>
      <th scope="row"></th>
	      <td></td>
	      <td></td>
	      <td> </td>
	      <td> </td>
	      <td> </td>
	      <td> </td>
	      <td> </td>
	      <td> </td>
	      <td> </td>
	      <td> </td>
    </tr>
<?php } ?>
    
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