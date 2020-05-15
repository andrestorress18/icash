<title>Registro | iCash</title>
<div class="container-cab">
	<h3>Registro</h3>
	<div class="cont-flex">
		<form action="comprobante" method="POST">
			<input type="hidden" name="accion" value="devolucion" placeholder="">
			<button type="submit" class="btn btn-primary">
		  Agregar Devolución
		</button>
		</form>
		<form action="comprobante" method="POST">
			<input type="hidden" name="accion" value="venta" placeholder="">
			<button type="submit" class="btn btn-primary">
		  Agregar Venta
		</button>
		</form>
		<form action="comprobante" method="POST">
			<input type="hidden" name="accion" value="compra" placeholder="">
			<button type="submit" class="btn btn-primary">
		  Agregar Compra
		</button>
		</form>
	</div>
</div>
<?php 
$datos = 1;
if ( is_array( $datos ) ) {
$num_tit = empty($datos) ? 0 : count($datos);
}
$modal = new FunctionModel();
$modal->ventana_modal("add-comp",$datos, "", "Añadir Compra", "form-comp-add");
$modal->ventana_modal("add-vent",$datos, "", "Añadir Venta", "form-vent-add");
$modal->ventana_modal("add-devo",$datos, "", "Añadir Devolución", "form-devo-add");
$modal->ventana_modal("edi",$datos, "", "Editar Compra", "form-product-edi");
$modal->ventana_modal("del",$datos, "", "Eliminar Compra", "form-product-del");
?>
<div class="cont-pad-tre">
	<?php
	if (isset($_GET['success'])) {
		echo '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>'.$_GET['success'].'</strong> 
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>';
	}?>
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
					<th scope="col">Opciones</th>
				</tr>
		  	</thead>
  			<tbody>
  				<?php 
				$comprobante = new ComprobanteController();
		        $comprobante_data = $comprobante->get_comp();
		        $num_comprobante    = count($comprobante_data);
		        $totalValor = 0;
		        for ($a = 0; $a < $num_comprobante; $a++) {
			        	echo "
			        	<th scope='row'>".$comprobante_data[$a]['comp_ref']."</th>
						<td>".$comprobante_data[$a]['comp_fec']."</td>
						<td>".$comprobante_data[$a]['comp_des']."</td>
						<td>".$comprobante_data[$a]['tipo_nom']."</td>
						<td>".$comprobante_data[$a]['clpr_nom']."</td>
						<td>".$comprobante_data[$a]['comp_val']."</td>
				      	<td class='cont-flex'>	
				      		<button type='button' class='btn btn-primary'><i class='fa fa-eye'></i></button>
					      	<button type='button' class='btn btn-info'><i class='fa fa-pencil-alt'></i></button>
					      	<button type='button' class='btn btn-danger'><i class='fa fa-trash-alt'></i></button>
					    </td>
					</tr>";
				}?>
  			</tbody>
		</table>
	</div>
	<div class="modal fade" id="staplesbmincart" >
        <div class="modal-dialog modal-dialog-centered" role="document" >
            <div class="modal-content" >
                <div class="modal-header" >
                    <h4>Cart
                         <button type="button" data-dismiss="modal" class="close" ><i class="fa fa-close" ></i ></button >
                    </h4 >
                </div >
                <div class="modal-body" >
                    <div class="row" id="myCart" >

                    </div >
                </div >
                <div class="modal-footer" >
                    <div class="col-md-6" >
                        <a  ID="hlCart" runat="server" class="btn btn-success pull-left" >View Shipment <i class="fa fa-truck" ></i ></a >
                     </div >
                <div class="col-md-6" >
                    <button type="button" data-dismiss="modal" onclick="cart.clean()" class="btn btn-link" >Clear</button >
                </div >
            </div >
        </div >
    </div >
 </div >
</div>
<script>
	$(document).ready(function () {
	  $('#tbl_cuentas').DataTable();
	  $('.dataTables_length').addClass('bs-select');
	});
	var cart = new Cart('[nombre del carro]');
	$('.buy-item').click(function(){
    var item = {
        'id': $(this).attr('data-id'),
        'product': $(this).attr('data-product'),
        'qty': $(this).attr('data-qty'),
        // M's propiedades aqui...
        'price': parseFloat($(this).attr('data-price'))
    }
    cart.add(item);
});
</script>