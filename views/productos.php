<title>Productos | iCash</title>
<div class="container-cab">
	<h3>Productos</h3>
	<div class="contenedor-flex">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal-add-categoria">
		  Agregar categoria
		</button>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal-add">
		  Agregar producto
		</button>
	</div>
</div>
<?php 
$datos = 1;
$num_tit = empty($datos) ? 0 : count($datos);
$modal = new FunctionModel();
$modal->ventana_modal("add",$datos, "", "Añadir producto", "form-product-add");
$modal->ventana_modal("edi",$datos, "", "Editar producto", "form-product-edi");
$modal->ventana_modal("del",$datos, "", "Eliminar producto", "form-product-del");
$modal->ventana_modal("add-categoria",$datos, "", "Añadir categoria", "form-category-add");
$modal->ventana_modal("edi-categoria",$datos, "", "Editar categoria", "form-category-edi");
$modal->ventana_modal("del-categoria",$datos, "", "Eliminar categoria", "form-category-del");
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
		    <a class='nav-link active' id='tab_1-tab' data-toggle='tab' href='#tab_1' role='tab' aria-controls='Productos' aria-selected='true'>Productos</a>
		</li>
		<li class='nav-item'>
		    <a class='nav-link' id='tab_2-tab' data-toggle='tab' href='#tab_2' role='tab' aria-controls='Categorias' aria-selected='true'>Categorias</a>
		</li>
	</ul>
	<div class="tab-content" id="myTabContent">
		<div class='tab-pane fade show active' id='tab_1' role='tabpanel' aria-labelledby='tab_1-tab'>
			<div class='container-tabla'>
				<table id='tbl_cate_1' class='table table-striped'>
				  <thead>
				    <tr>
				      <th scope='col'>Codigo</th>
				      <th scope='col'>Nombre</th>
				      <th scope='col'>Descripción</th>
				      <th scope='col'>Stock</th>
				      <th scope='col'>Precio venta</th>
				      <th scope='col'>Opciones</th>
				    </tr>
				 	</thead>
						<tbody>
						<?php  
							$productos      = new ProductoController();
			                $productos_data = $productos->get();
			                $num_productos    = count($productos_data); 
 						for ($i=0; $i < $num_productos; $i++) { 
 							echo "<tr><td>".$productos_data[$i]['prod_cod']."</td>
 							<td>".$productos_data[$i]['prod_nom']."</td>
							<td>".$productos_data[$i]['prod_des']."</td>
							<td>".$productos_data[$i]['prod_sto']."</td>
							<td>".$productos_data[$i]['prod_pve']."</td>
							<td>
								<button type='button' class='btn btn-info'><i class='fa fa-pencil-alt'></i></button>
		  						<button type='button' class='btn btn-danger'><i class='fa fa-trash-alt'></i></button>
							</td></tr>
 							";
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
			<?php  
				$categorias      = new CategoriaController();
                $categorias_data = $categorias->get();
                $num_categorias    = count($categorias_data); 
            ?>
			<div class='container-tabla'>
				<table id='tbl_cate_2' class='table table-striped'>
				  <thead>
				    <tr>
				      <th scope='col'>Codigo</th>
				      <th scope='col'>Nombre</th>
				      <th scope='col'>Descripción</th>
				      <th scope='col'>Opciones</th>
				    </tr>
				 	</thead>
 					<tbody>
 						<?php 
 						for ($i=0; $i < $num_categorias; $i++) { 
 							echo "
 						<tr>
 							<td>".$categorias_data[$i]['cate_cod']."</td>
 							<td>".$categorias_data[$i]['cate_nom']."</td>
							<td>".$categorias_data[$i]['cate_des']."</td>
							<td>
								<button type='button' class='btn btn-info'><i class='fa fa-pencil-alt'></i></button>
		  						<button type='button' class='btn btn-danger'><i class='fa fa-trash-alt'></i></button>
							</td>
						</tr>
 							";
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


