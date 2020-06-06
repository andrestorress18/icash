<title>Devolución | iCash</title>
<div class="form-row align-items-center">
  <div class="col-sm-2 my-1">
    <img src="<?php echo $_SESSION['empr_log']; ?>" width="80" alt="">
  </div>
  <div class="col-sm-7 my-1">
    <h3><?php echo $_SESSION['empr_nom']; ?></h3>        
    <?php echo $_SESSION['empr_des']; ?><br>
    <b>NIT: <?php echo $_SESSION['empr_nit']; ?></b>
  </div>
  <div class="col-sm-3 my-1">
    <h2>Devolución</h2>
  </div>
</div>
<form method="POST" action="comprobante" autocomplete="off">
  <label >Comprobante Compra / Venta:</label>
  <div class="form-row align-items-center">
    <div class="col-sm-8 my-1">
      <div class="form-group">
        <input type="text" name="comp_sear" class="form-control" value=""  placeholder="000002" required autocomplete="off"> 
      </div>        
    </div>
    <div class="col-sm-2 my-1">
      <button type="submit" class="form-control btn-primary"><i class="fas fa-search"></i> Buscar</button>
    </div>
    <input type="hidden" name="search" value="devo-sear" autocomplete="off">
  </div>
</form>
<?php
if (isset($_POST['search'])) {
  $comprobante      = new ComprobanteController();
  $compr = $comprobante->get_comp($_POST['comp_sear']);
?>
<form method="POST" autocomplete="off">
  <div class="form-row align-items-center">
    <div class="col-sm-2 my-1">
      <div class="form-group">
        <label for="add-devo_comp_clpr_fk">Comprobante:</label>
        <input type="text" name="comp_ref" readonly class="form-control" id="add-devo_comp_ref" value="<?php echo $compr[0]['comp_ref'] ?>" required autocomplete="off"> 
      </div>        
    </div>
    <div class="col-sm-4 my-1">
      <div class="form-group">
        <label for="add-devo_comp_clpr_fk">Cliente / Proveedor:</label>
        <input type="text" name="comp_clpr_nom" readonly class="form-control" id="add-devo_comp_clpr_fk" value="<?php echo $compr[0]['clpr_nom'] ?>" required autocomplete="off"> 
        <input type="hidden" name="comp_clpr_fk" value="<?php echo $compr[0]['comp_clpr_fk'] ?>">
      </div>        
    </div>
    <div class="col-sm-3 my-1">
      <div class="form-group">
        <label for="add-devo_comp_clpr_fk">Tipo:</label>
        <input type="text" name="comp_tipo" readonly class="form-control" id="add-devo_comp_tipo" value="<?php echo $compr[0]['tipo_nom'] ?>" required autocomplete="off"> 
        <input type="hidden" name="comp_tipo_fk" value="<?php echo $compr[0]['comp_tipo_fk'] ?>"> 
      </div>        
    </div>
    <div class="col-sm-3 my-1">
      <div class="form-group">
        <label for="comp_fec">Fecha:</label>
        <input type="date" name="comp_fec" class="form-control" id="add-devo_comp_fec" value="<?php echo date("Y-m-d"); ?>" max="<?php echo date("Y-m-d"); ?>" required autocomplete="off"> 
      </div>
    </div>
  </div>
  <div class="form-row align-items-center">
    <div class="col-sm-12 my-1">
      <div class="form-group">
        <label for="comp_des">Descripción:</label>
        <textarea name="comp_des" class="form-control" id="comp_des"></textarea>
      </div>
    </div>
  </div>
  <input type="hidden" name="crud" value="add-devo">
  <div class="form-row align-items-center">
    <table class='table table-striped tbl-comp-deta'>
      <thead>
          <tr>
            <th>#</th>
            <th>Producto</th>
            <th>Valor Unitario</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
          </tr>
      </thead>
      <tbody>

        <?php
        $comprobante_deta      = new ComprobanteController();
        $comprobante_data = $comprobante_deta->get_deta($_POST['comp_sear']);
        $num_client    = count($comprobante_data);
        for ($y = 0; $y <$num_client; $y++) {
          echo '<tr>
            <td>
                '.$comprobante_data[$y]['prod_cod'].'
                <input type="hidden" name="code_prod_fk[]" value="'.$comprobante_data[$y]['prod_cod'].'">
            </td>
            <td style="width: 150px">
                '.$comprobante_data[$y]['prod_nom'].'
            </td>
            <td>

              <input type="number" class="monto input form-control" readonly value="'.($comprobante_data[$y]['code_prt']/$comprobante_data[$y]['code_can']).'">
            </td>
            <td>
              <input type="number" class="monto input form-control" name="code_can[]" value="'.$comprobante_data[$y]['code_can'].'" min="0" max="'.$comprobante_data[$y]['code_can'].'">
            </td>
            <td>
              <input type="text" class="monto total form-control" name="code_prt[]" readonly value="'.$comprobante_data[$y]['code_prt'].'">
            </td>
          </tr>';
        }
        ?>
        <tr>
          <td colspan="3"></td>
          <td>Total</td>
          <td>
            <input type="text" class="monto totales form-control" name="comp_val" value="<?php echo $compr[0]['comp_val'] ?>" readonly>
          </td>
        </tr>    
      </tbody>
    </table>  
    </div>
    <hr/>
    <div class="col-sm-3 my-1">
      <button type="submit" class="form-control btn-primary"><i class="fas fa-save"></i> Guardar</button>  
    </div>
  </form>
<?php } ?>
<script>
  var input=document.querySelectorAll(".input");
  input.forEach(function(e) {
      e.addEventListener("click",multiplica);
      e.addEventListener("keyup",multiplica);
  });
 
  function multiplica() {
    var tr=this.closest("tr");
    var total=1;
    var inputs=tr.querySelectorAll(".input");
    inputs.forEach(function(e) {
        total*=e.value;
    });
    tr.querySelector(".total").value=total.toFixed(0);
    calcularTotal(this.closest("table"));
  }

  function calcularTotal(e) {
    var total=0;
    var totales=e.querySelectorAll(".total");
    totales.forEach(function(e) {
        total+=parseFloat(e.value);
    });
    e.getElementsByClassName("totales")[0].value=total.toFixed(0);
  }
</script>