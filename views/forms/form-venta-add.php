<script>
    $(function(){
        $("#adicionarVen").on('click',function(){
            $("#tablaVen tbody tr:eq(0)").clone().removeClass('fila-fija').appendTo("#tablaVen");
        });
        $(document).on("click",".eliminar",function(){
            var parent = $(this).parents().get(0);
            $(parent).remove();
        });
    });

</script>
<form enctype="multipart/form-data" method="POST" autocomplete="off">
   <div class="form-row align-items-center">
      <div class="col-sm-8 my-1">
        <div class="form-group">
          <label for="cuen_des">Nombre del cliente:</label>
          <input type="text" name="cuen_fec" class="form-control" id="add_cuen_fec"  required autocomplete="off">
        </div>
      </div>
      <div class="col-sm-4 my-1">
        <div class="form-group">
          <label for="cuen_val">Documento:</label>
          <input type="text" name="cuen_val" class="form-control" id="add_cuen_val"  required autocomplete="off"> 
        </div>
      </div>
    </div>
    <div class="form-row align-items-center">
      <div class="col-sm-12 my-1">
        <div class="form-group">
          <label for="cuen_est">Descripción</label>
          <input type="text" name="cuen_fec" class="form-control" id="add_cuen_fec"  required autocomplete="off">
        </div>
      </div>
    </div>
    <div class="form-row align-items-center">
      <table id="tablaVen">
          <tr class="fila-fija">
              <td class="width-80-pto">
                  <select class="form-control" id="fdet_sdet_fk" onchange="seleccion(this)" required name="fdet_sdet_fk[]" >
                      <option value="">Seleccione el producto</option>
                      <option value="">Producto 1</option>
                      <option value="">Producto 2</option>
                      <option value="">Producto 3</option>
                  </select>
              </td>
              <td class="width-30-pto">
                  <input class="form-control" type="text" required placeholder="Cantidad" name="fdet_pre[]">
              </td>
              <td class="eliminar"><button type="button" class="btn btn-danger"><i class="fa fa-times"></i></button></td>
          </tr>
      </table>
      <button id="adicionarVen" type="button" class="btn btn-primary"><i class="fas fa-plus"></i>  Adicionar</button>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">X</button>
      <button type="button" class="btn btn-primary">Crear</button>
    </div>
</form>