<title>Kardex | iCash</title>
<div class="container-cab">
	<h3>Kardex</h3>	
	<div>
		<form action="cierre-inventario" method="POST" autocomplete="off">
			<input type="hidden" name="comp" value="venta" placeholder="">
			<button type="submit" class="btn btn-primary">
		  Cierre de inventario
		</button>
		</form>
	</div>
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
	<form method="POST" class="form-inline d-flex justify-content-center md-form form-sm active-cyan-2 mt-2">
	  	<select name="code_prod_fk" class="form-control" id="a" required>
	      	<option value="">Seleccione el producto</option>                  
	      	<?php
		        $producto = new ProductoController();
		        $product_data = $producto->get();
		        $num_product    = count($product_data);
		        for ($a = 0; $a < $num_product; $a++) {
		            echo '<option value="' . $product_data[$a]['prod_cod'] . '" >' . $product_data[$a]['prod_nom']."</option>";
		        }
	      	?>
	    </select>
	    <input type="hidden" name="busca" value="si" placeholder="">
		<button class="btn btn btn-primary btn-rounded btn-sm my-0" type="submit">Consultar <i class="fas fa-search" aria-hidden="true"></i></button>
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
		  		if (isset($_POST['code_prod_fk'])) {
			        $comprobante = new ComprobanteController();
			        $comprobante_data = $comprobante->get($_POST['code_prod_fk']);
			        $num_comprobante    = count($comprobante_data);
			        $totalValor = 0;
			        $totalCantidad = 0;
			        for ($a = 0; $a < $num_comprobante; $a++) {
			            echo "
			            <tr>
			      		<th scope='row'> ".($a+1)." </th>
						<td>".$comprobante_data[$a]['comp_fec']."</td><!--fecha-->
						<td>".$comprobante_data[$a]['tipo_nom']."</td><!--Concepto-->
						<td>".$comprobante_data[$a]['comp_ref']."</td><!--N factura-->
						<td>".$comprobante_data[$a]['prod_pve']."</td><!--valor unitario-->";
						if ($comprobante_data[$a]['comp_tipo_fk'] ==2){ //Compra
							$totalValor = ($comprobante_data[$a]['prod_pve']*$comprobante_data[$a]['code_can']) + $totalValor;
							$totalCantidad = $totalCantidad+$comprobante_data[$a]['code_can'];
							echo "
							<td>".$comprobante_data[$a]['code_can']."</td><!--E-cantidad-->
							<td>".($comprobante_data[$a]['prod_pve']*$comprobante_data[$a]['code_can'])."</td><!--E-valor-->";
						}else{
							echo "<td></td><!--E-cantidad--><td></td><!--E-valor-->";
						}
						if ($comprobante_data[$a]['comp_tipo_fk']==3){ //Venta
							$totalValor = $totalValor - ($comprobante_data[$a]['prod_pve']*$comprobante_data[$a]['code_can']);
							$totalCantidad = $totalCantidad - $comprobante_data[$a]['code_can'];
							echo "
							<td>".$comprobante_data[$a]['code_can']."</td><!--S-cantidad-->
							<td>".($comprobante_data[$a]['prod_pve']*$comprobante_data[$a]['code_can'])."</td><!--S-valor-->";
						}else{
							echo "<td></td><!--S-cantidad--><td></td><!--S-valor-->";
						}

						echo "
						<td>".$totalCantidad."</td><!--SA-cantidad-->
						<td>".$totalValor."</td><!--SA-valor-->					
			    		</tr>
			            ";
			        }
		    	}else{
			        echo "
			        <tr>
			 		<th scope='row'></th><td></td><!--fecha--><td></td><!--Concepto--><td></td><!--N factura--><td></td><!--valor unitario--><td></td><!--S-cantidad--><td></td><!--S-valor--><td></td><!--S-cantidad--><td></td><!--S-valor--><td> </td><!--SA-cantidad--><td> </td><!--SA-valor-->					
			    	</tr>
			    	<tr>
			 		<th scope='row'></th><td></td><!--fecha--><td></td><!--Concepto--><td></td><!--N factura--><td></td><!--valor unitario--><td></td><!--S-cantidad--><td></td><!--S-valor--><td></td><!--S-cantidad--><td></td><!--S-valor--><td> </td><!--SA-cantidad--><td> </td><!--SA-valor-->					
			    	</tr>
			    	<tr>
			 		<th scope='row'></th><td></td><!--fecha--><td></td><!--Concepto--><td></td><!--N factura--><td></td><!--valor unitario--><td></td><!--S-cantidad--><td></td><!--S-valor--><td></td><!--S-cantidad--><td></td><!--S-valor--><td> </td><!--SA-cantidad--><td> </td><!--SA-valor-->					
			    	</tr>
			            "; 
		    	}?>
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