<form enctype="multipart/form-data" method="POST" autocomplete="off">
    <div class="form-row align-items-center">
      <div class="col-sm-8 my-1">
      	<div class="form-group">
	    	<label for="clpr_nom">Nombre</label>
		    <input type="text" name="clpr_nom" class="form-control" id="edi-prov_clpr_nom" required>
	    </div>
      </div>
      <div class="col-sm-4 my-1">
      	<div class="form-group">
	    	<label for="clpr_doc">Cedula</label>
		    <input type="text" name="clpr_doc" class="form-control" id="edi-prov_clpr_doc" required pattern="[0-9]{6,12}" title="Cedula es un campo numerico">
	    </div>
      </div>
    </div>
    <div class="form-row align-items-center">
      	<div class="col-sm-8 my-1">
	      	<div class="form-group">
		    	<label for="clpr_cor">Correo</label>
			    <input type="email" name="clpr_cor" class="form-control" id="edi-prov_clpr_cor" required>
		    </div>
      	</div>
      	<div class="col-sm-4 my-1">
	      	<div class="form-group">
		    	<label for="clpr_cel">Celular</label>
			    <input type="number" name="clpr_cel" class="form-control" id="edi-prov_clpr_cel" required  title="Celular es un campo numerico">
		    </div>
      	</div>
    </div>
    <div class="form-row align-items-center">
	    <div class="col-sm-6 my-1">
	      	<div class="form-group">
		    	<label for="clpr_emp">Empresa</label>
			    <input type="text" name="clpr_emp" class="form-control" id="edi-prov_clpr_emp" required>
		    </div>
	      </div>
	      <div class="col-sm-6 my-1">
	      	<div class="form-group">
		    	<label for="clpr_nit">Nit</label>
			    <input type="text" name="clpr_nit" class="form-control" id="edi-prov_clpr_nit" required>
		    </div>
	      </div>
	  </div>
	<button type="submit" id="edi-prov-btn_guardar" class="btn btn-success">Guardar</button>
	<input type="hidden" name="clpr_tip" id="edi-prov_clpr_tip">
	<input type="hidden" name="clpr_cod" id="edi-prov_clpr_cod">
	<input type="hidden" name="crud" value="edi-proveedor">
</form>
