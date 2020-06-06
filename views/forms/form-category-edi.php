<form enctype="multipart/form-data" method="POST" autocomplete="off">
    <div class="form-row align-items-center">
      <div class="col-sm-12 my-1">
      	<div class="form-group">
  	    	<label for="cate_nom">Nombre</label>
  		    <input type="text" name="cate_nom" class="form-control" id="edi-cate_cate_nom" required>
  	    </div>
      </div>
    </div>
    <div class="form-row align-items-center">
      <div class="col-sm-12 my-1">
      	<div class="form-group">
  	    	<label for="cate_des">Descripción</label>
          <textarea name="cate_des" class="form-control" id="edi-cate_cate_desc" required></textarea>
  	    </div>
      </div>
    </div>     	
	<button type="submit" id="edi-cate-btn_guardar" class="btn btn-success">Guardar</button>
	<input type="hidden" name="crud" value="edi-cate">
</form>