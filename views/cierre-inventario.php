<title>Kardex | iCash</title>
<div class="container-cab">
	<h3>Cierre de inventario</h3>	
</div>
<div class="cont-pad-tre"><?php
	if (isset($_GET['success'])) {
		echo '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>'.$_GET['success'].'</strong> 
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>';
	}?>
	<!-- Search form -->
	<form class="form-inline d-flex justify-content-center md-form form-sm active-cyan-2 mt-2">
	  	<div class="col-sm-3 my-1">
      <div class="form-group">
        <label for="comp_fin">Fecha inicio:</label>
        <input type="date" name="comp_fin" class="form-control" id="comp_fin" value="<?php echo date("Y-m-d"); ?>" max="<?php echo date("Y-m-d"); ?>" required autocomplete="off"> 
      </div>
    </div>
    <div class="col-sm-3 my-1">
      <div class="form-group">
        <label for="comp_ffi">Fecha final:</label>
        <input type="date" name="comp_ffi" class="form-control" id="comp_ffi" value="<?php echo date("Y-m-d"); ?>" max="<?php echo date("Y-m-d"); ?>" required autocomplete="off"> 
      </div>
    </div>
    <div class="col-sm-2 my-1">
		<button class="btn btn btn-primary btn-rounded btn-sm my-0" type="submit"><i class="fas fa-search" aria-hidden="true"></i> Consultar</button>
	</div>
	</form><br>
	<div class="container-tabla">
		<table class="kardex table-sm table table-striped table-bordered">
		  	<thead>
			    <tr>
					<th scope="col" rowspan="2">#</th>
					<th scope="col" rowspan="2"><center>FECHA</center></th>
					<th scope="col" colspan="2"><center>DETALLE</center></th>
					<th scope="col" rowspan="2"><center>VALOR UNITARIO</center></th>
					<th scope="col" colspan="2"><center>ENTRADAS</center></th>
					<th scope="col" colspan="2"><center>SALIDAS</center></th>
					<th scope="col" colspan="2"><center>SALDOS</center></th>
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