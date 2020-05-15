<form enctype="multipart/form-data" method="POST" autocomplete="off">
    <div class="form-row align-items-center">
      <div class="col-sm-12 my-1">
      	<div class="form-group">
	    	<label for="prod_nom">Nombre:</label>
		    <input type="text" name="prod_nom" class="form-control" id="add_prod_nom" required>
	    </div>
      </div>
    </div>
    <div class="form-row align-items-center">
      <div class="col-sm-12 my-1">
      	<div class="form-group">
	    	<label for="usua_est">Descripción:</label>
        <textarea name="prod_des" class="form-control" id="add_prod_desc"></textarea>
	    </div>
      </div>
  </div>
    <div class="form-row align-items-center">
      <div class="col-sm-6 my-1">
      	<div class="form-group">
	    	<label for="prod_cate_fk">Categoria</label>
          <select name="prod_cate_fk" class="form-control" id="add_prod_cate_fk" required>
          <?php
            $categoria      = new CategoriaController();
            $cate_data = $categoria->get();
            $num_cate    = count($cate_data);
            for ($regist = 0; $regist < $num_cate; $regist++) {
                echo '<option value="' . $cate_data[$regist]['cate_cod'].'" >'.$cate_data[$regist]['cate_nom']."</option>";
            }
          ?>
          </select>
        </div>
      </div>
      <div class="col-sm-6 my-1">
      	<div class="form-group">
	    	<label for="prod_pve">Precio de venta</label>
		    <input type="text" name="prod_pve" class="form-control" id="add_prod_pve" required> 
	    </div>
      </div>
    </div>      	
	<button type="submit" id="add-prod-btn_guardar" class="btn btn-success">Guardar</button>
	<input type="hidden" name="crud" value="add">
</form>