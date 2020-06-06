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
		            echo '<option value="' . $product_data[$a]['prod_cod'] . '" >'.$product_data[$a]['prod_cod'].' - '.$product_data[$a]['prod_nom']."</option>";
		        }
	      	?>
	    </select>
	    <input type="hidden" name="busca" value="si" placeholder="">
		<button class="btn btn btn-primary btn-rounded btn-sm my-0" type="submit">Consultar <i class="fas fa-search" aria-hidden="true"></i></button>
	</form><br>
	<?php if (isset($_POST['code_prod_fk'])) {
		$producto = new ProductoController();
        $producto_data = $producto->get($_POST['code_prod_fk']);
        $num_producto    = count($producto_data);
        for ($x = 0; $x < $num_producto; $x++) {
	?>
	<div class="form-row align-items-center">
	    <div class="col-sm-1 my-1">
	        <div class="input-group">
				<div class="input-group-prepend">
					<div class="input-group-text"><b>Cod</b></div>
				</div>
				<input type="text" disabled class="form-control" value="<?php echo $producto_data[$x]['prod_cod'] ?>">
	        </div>
	    </div>
	    <div class="col-sm-4 my-1">
	        <div class="input-group">
				<div class="input-group-prepend">
					<div class="input-group-text"><b>Nombre</b></div>
				</div>
				<input type="text" disabled class="form-control" value="<?php echo $producto_data[$x]['prod_nom'] ?>">
	        </div>
	    </div>
	    <div class="col-sm-3 my-1">
	        <div class="input-group">
				<div class="input-group-prepend">
					<div class="input-group-text"><b>Pr. Venta</b></div>
				</div>
				<input type="text" disabled class="form-control" value="$ <?php echo number_format($producto_data[$x]['prod_pve']); ?>">
	        </div>
	    </div>
	    <div class="col-sm-3 my-1">
	        <div class="input-group">
				<div class="input-group-prepend">
					<div class="input-group-text"><b>Pr. Compra</b></div>
				</div>
				<input type="text" disabled class="form-control" value="$ <?php echo number_format($producto_data[$x]['prod_pco']); ?>">
	        </div>
	    </div>
	    <div class="col-sm-1 my-1">
	        <div class="input-group">
				<div class="input-group-prepend">
					<div class="input-group-text"><b>Inv</b></div>
				</div>
				<input type="text" disabled class="form-control" value="<?php echo $producto_data[$x]['prod_sto']; ?>">
	        </div>
	    </div>
	</div>
	<?php }
	} ?>
	<div class="container-tabla">
		<table class="kardex table-sm table table-striped table-bordered">
		  	<thead>
			    <tr>
					<th scope="col" rowspan="2">#</th>
					<th scope="col" rowspan="2"><center>FECHA</center></th>
					<th scope="col" colspan="2"><center>DETALLE</center></th>
					<th scope="col" colspan="3"><center>ENTRADAS</center></th>
					<th scope="col" colspan="2"><center>SALIDAS</center></th>
					<th scope="col" colspan="3"><center>EXISTENCIAS</center></th>
				</tr>
				<tr>
					<th scope="col" >Concepto</th>
					<th scope="col">N. Fact</th>
					<th scope="col">Cant.</th>
					<th scope="col">Val. Unitario</th>
					<th scope="col">Val. Total</th>
					<th scope="col">Cant.</th>
					<th scope="col">Val. Total</th>
					<th scope="col">Cant.</th>
					<th scope="col">Valor Uni.</th>
					<th scope="col">Val. Total</th>
				</tr>
		  	</thead>
		  	<tbody>
		  		<?php 
		  		if (isset($_POST['code_prod_fk'])) {
		  			$compDevo = new ComprobanteController();
			        $comprobante = new ComprobanteController();
			        $comprobante_data = $comprobante->get($_POST['code_prod_fk']);
			        $num_comprobante    = count($comprobante_data);
			        $totalValor = 0;
			        $totalCantidad = 0;
			        $valorUnitario = 0;
			        $precioProm = 0;
			        for ($a = 0; $a < $num_comprobante; $a++) {
			            echo "
			            <tr>
			      		<th scope='row'> ".($a+1)." </th>
						<td>".$comprobante_data[$a]['comp_fec']."</td><!--fecha-->
						<td>".$comprobante_data[$a]['tipo_nom']."</td><!--Concepto-->
						<td>";
						$precioProm = $comprobante_data[$a]['code_prt']/$comprobante_data[$a]['code_can'];
						echo ($comprobante_data[$a]['comp_tipo_fk'] != 1)?$comprobante_data[$a]['comp_ref']:" ";
						echo "</td><!--N factura-->";
						if ($comprobante_data[$a]['comp_tipo_fk']==4){ //Devolución
							
			        		$compDevo_data = $compDevo->get_deta_prod($comprobante_data[$a]['comp_comp_fk'],$_POST['code_prod_fk']);
			        		
							if($compDevo_data[0]['comp_tipo_fk'] == 2){//Devolucion de compra
			        			$totalValor = ($precioProm*$comprobante_data[$a]['code_can']) - $totalValor;
								$totalCantidad = $totalCantidad-$comprobante_data[$a]['code_can'];
								$precioProm = $comprobante_data[$a]['code_prt']/$comprobante_data[$a]['code_can'];
								echo "
								<td>-".$comprobante_data[$a]['code_can']."</td><!--E-cantidad-->
								<td>$ ".number_format($precioProm)."</td><!--E-valor unitario-->
								<td>- $ ".number_format($precioProm*$comprobante_data[$a]['code_can'])."</td><!--E-valor-->";
			        		}else{
								echo "<td></td><!--E-cantidad--><td></td><td></td><!--E-valor-->";
							}
							if($compDevo_data[0]['comp_tipo_fk'] == 3){//Devolucion de venta
			        			$totalValor = $totalValor + ($valorUnitario*$comprobante_data[$a]['code_can']);
								$totalCantidad = $totalCantidad + $comprobante_data[$a]['code_can'];
								echo "
								<td>-".$comprobante_data[$a]['code_can']."</td><!--S-cantidad-->
								<td>-$ ".number_format($valorUnitario*$comprobante_data[$a]['code_can'])."</td><!--S-valor-->";
			        		}else{
								echo "<td></td><!--S-cantidad--><td></td><!--S-valor-->";
							}
						}else{
							if ($comprobante_data[$a]['comp_tipo_fk'] ==1){ //Stock inicial
								$totalValor = ($precioProm*$comprobante_data[$a]['code_can']) + $totalValor;
								$totalCantidad = $totalCantidad+$comprobante_data[$a]['code_can'];
								$valorUnitario = $precioProm;
								echo "
								<td>".$comprobante_data[$a]['code_can']."</td><!--E-cantidad-->
								<td>$ ".number_format($precioProm)."</td><!--E-valor unitario-->
								<td>$ ".number_format($totalValor)."</td><!--E-valor-->";
							}else if ($comprobante_data[$a]['comp_tipo_fk'] ==2){ //Compra
								$totalValor = ($precioProm*$comprobante_data[$a]['code_can']) + $totalValor;
								$totalCantidad = $totalCantidad+$comprobante_data[$a]['code_can'];
								$precioProm = $comprobante_data[$a]['code_prt']/$comprobante_data[$a]['code_can'];
								echo "
								<td>".$comprobante_data[$a]['code_can']."</td><!--E-cantidad-->
								<td>$ ".number_format($precioProm)."</td><!--E-valor unitario-->
								<td>$ ".number_format($precioProm*$comprobante_data[$a]['code_can'])."</td><!--E-valor-->";
							}else{
								echo "<td></td><!--E-cantidad--><td></td><td></td><!--E-valor-->";
							}
							if ($comprobante_data[$a]['comp_tipo_fk']==3){ //Venta
								$totalValor = $totalValor - ($valorUnitario*$comprobante_data[$a]['code_can']);
								$totalCantidad = $totalCantidad - $comprobante_data[$a]['code_can'];
								echo "
								<td>".$comprobante_data[$a]['code_can']."</td><!--S-cantidad-->
								<td>$ ".number_format($valorUnitario*$comprobante_data[$a]['code_can'])."</td><!--S-valor-->";
							}else{
								echo "<td></td><!--S-cantidad--><td></td><!--S-valor-->";
							}

						}
						
						

						if($comprobante_data[$a]['comp_tipo_fk']==2){
							$valorUnitario = $totalValor/$totalCantidad;
						}else if($comprobante_data[$a]['comp_tipo_fk']==3){

						}
						
						echo "
						<td>".$totalCantidad."</td><!--SA-cantidad-->
						<td>$ ".number_format($valorUnitario)."</td>
						<td>$ ".number_format($valorUnitario*$totalCantidad)."</td><!--SA-valor-->				
			    		</tr>
			            ";
			        }
		    	}else{
			        echo "
			        <tr>
			 		<th scope='row'></th><td></td><!--fecha--><td></td><!--Concepto--><td></td><!--N factura--><td></td><!--S-cantidad--><td></td><!--S-valor--><td></td><!--S-cantidad--><td></td><!--S-valor--><td> </td><td> </td><!--SA-cantidad--><td> </td><td> </td><!--SA-valor-->					
			    	</tr>
			    	<tr>
			 		<th scope='row'></th><td></td><!--fecha--><td></td><!--Concepto--><td></td><!--N factura--><td></td><!--S-cantidad--><td></td><!--S-valor--><td></td><!--S-cantidad--><td></td><!--S-valor--><td> </td><td> </td><!--SA-cantidad--><td> </td><td> </td><!--SA-valor-->					
			    	</tr>
			    	<tr>
			 		<th scope='row'></th><td></td><!--fecha--><td></td><!--Concepto--><td></td><!--N factura--><td></td><!--S-cantidad--><td></td><!--S-valor--><td></td><!--S-cantidad--><td></td><!--S-valor--><td> </td><td> </td><!--SA-cantidad--><td> </td><td> </td><!--SA-valor-->					
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