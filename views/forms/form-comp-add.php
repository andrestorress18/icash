<script>
    $(function(){
        $("#adicionar").on('click',function(){
            $("#tabla tbody tr:eq(0)").clone().removeClass('fila-fija').appendTo("#tabla");
        });
        $(document).on("click",".eliminar",function(){
            var parent = $(this).parents().get(0);
            $(parent).remove();
        });
    });
</script>
  <form enctype="multipart/form-data" id="form-venta" method="POST" autocomplete="off">
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
        <h2>Compra</h2>
      </div>
    </div>

    <div class="form-row align-items-center">
      <div class="col-sm-8 my-1">
        <div class="form-group">
          <label for="add-vent_comp_clpr_fk">Proveedor:</label>
          <select name="comp_clpr_fk" class="form-control" onclick="proveedor();" id="comp_clpr_fk" required>
            
            
            <option value="">Seleccione el proveedor</option>
            <?php
              $proveedor      = new PersonaController();
              $client_data = $proveedor->get('proveedor');
              $num_client    = count($client_data);
              for ($regist = 0; $regist <$num_client; $regist++) {
                  echo '<option value="' . $client_data[$regist]['clpr_cod'] . '" >' . $client_data[$regist]['clpr_doc']." - ". $client_data[$regist]['clpr_nom']."</option>";
              }
            ?>
          </select>
        </div>
        <?php 
          if (isset($_SESSION['clie'])) {
            echo "<script>
            document.getElementById('comp_clpr_fk').selectedIndex = ".$_SESSION['clie'].";
            </script>";
          }?>
        
      </div>
      <div class="col-sm-4 my-1">
        <div class="form-group">
          <label for="comp_fec">Fecha:</label>
          <input type="date" name="comp_fec" class="form-control" id="add-vent_comp_fec" value="<?php echo date("Y-m-d"); ?>" max="<?php echo date("Y-m-d"); ?>" required autocomplete="off"> 
        </div>
      </div>
    </div>
    <div class="form-row align-items-center">
      <div class="col-sm-12 my-1">
        <div class="form-group">
          <label for="comp_des">Descripción:</label>
          <textarea name="comp_des1" class="form-control" onclick="descrip();" onkeyup="descrip();" id="comp_des1"><?php if (isset($_SESSION['desc'])) {echo $_SESSION['desc'];}?>
          </textarea>
        </div>
      </div>
    </div>
    <input type="hidden" name="crud" value="venta">
  </form>
    <h5>Agregar productos:</h5>
    <div class="form-row align-items-center">
      <form method="post" accept-charset="utf-8">
        <div class="form-row align-items-center">
          <div class="col-sm-4 my-1">
            <select name="code_prod" class="form-control" onclick="actualiza();" id="code_prod" required>
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
            <select style="display: none" name="codpre"  class="form-control" id="codpre">   
            <option value="0"></option>           
              <?php
                $productoPre = new ProductoController();
                $product_data = $productoPre->get();
                $num_product    = count($product_data);
                for ($a = 0; $a < $num_product; $a++) {
                    echo '<option value="' . $product_data[$a]['prod_cod'] . '" >' . $product_data[$a]['prod_pve']."</option>";
                }
              ?>
            </select>
          </div>
          <div class="col-sm-2 my-1">
            <input type="text" class="form-control"  readonly name="code_prec" id="code_prec" value="0.00">
          </div>
          <div class="col-sm-2 my-1">
            <input class="form-control" onclick="calcular()" onkeyup="calcular()" type="number" name="code_cant" id="code_cant" min="1"  placeholder="Cantidad">
          </div>
          <div class="col-sm-2 my-1">
            <input class="form-control" type="number" readonly name="code_subt" id="code_subt"  value="0.00">
          </div>
          <div class="col-sm-2 my-1">
            <input type="hidden" name="deta" value="venta">
            <button type="submit" class="form-control btn-primary"><i class="fas fa-plus"></i> Agregar</button>  
          </div>
        </div>
        <select name="comp_clie" style="display: none" class="form-control" id="comp_clie">
            <option value="">Seleccione el proveedor</option>
            <?php
              $proveedor      = new PersonaController();
              $client_data = $proveedor->get('proveedor');
              $num_client    = count($client_data);
              for ($regist = 0; $regist <$num_client; $regist++) {
                  echo '<option value="' . $client_data[$regist]['clpr_cod'] . '" >' . $client_data[$regist]['clpr_doc']." - ". $client_data[$regist]['clpr_nom']."</option>";
              }
            ?>
          </select>
          <textarea style="display: none" name="comp_des" class="form-control" id="comp_des"></textarea>
        <script>
          function actualiza(){
            
            var indice = document.getElementById("code_prod").value; 
            var indice2 =document.getElementById("codpre").selectedIndex = indice;
            //var textSel = document.getElementById("code_prod").options[indice].text;
            var precio = document.getElementById("codpre").options[indice2].text;
            document.getElementById("code_prec").value = precio;          
          }
          function proveedor(){
            var clie1 = document.getElementById("comp_clpr_fk").value; 
            var clie2 =document.getElementById("comp_clie").selectedIndex = clie1;
          }
          function descrip(){
            var desp1 = document.getElementById("comp_des1").value; 
            var desp2 =document.getElementById("comp_des").value = desp1;
          }
          function calcular(){
            var prod = document.getElementById("code_prec").value;
            var cant = document.getElementById("code_cant").value;
            r = prod*cant;
          document.getElementById("code_subt").value = r;
          }
        </script>
      </form>

    </div>
    <hr/>
    <div class="form-row align-items-center">
      <?php 
      $deta = 0;
      if (isset($_SESSION['detalle'])) {
        if (is_array($_SESSION['detalle'])) {
          $deta = count($_SESSION['detalle']);
        }else{
          $deta = 0;
        }
      }
      
      if($deta>0){
        ?>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Producto</th>
              <th>Cantidad</th>
              <th>Subtotal</th>
              <th>X</th>
            </tr>
          </thead>
        <?php
        $total = 0;
        foreach($_SESSION['detalle'] as $k => $detalle){ 
          $total += $detalle['code_subt'];
          ?>
          <tr>
            <td>
              <?php echo $detalle['code_prod']; ?>
            </td>
            <td>
              <?php echo $detalle['prod_nom']; ?>
            </td>
            <td>
                <?php echo $detalle['code_cant']; ?>
            </td>
            <td>
              $ <?php echo number_format($detalle['code_subt']); ?>
            </td>
            <td class="eliminar"><button type="button" class="btn btn-danger"><i class="fa fa-times"></i></button></td>
          </tr>
        <?php } ?>
        <tr>
            <td colspan="3" class="text-right"><b>Total: </b></td>
            <td>$ <?php echo number_format($total);?></td>
            <td></td>
          </tr>
        </table>

      <?php }else{
        echo '<div class="col-sm-12 my-1"><center><h5>No hay productos agregados</h5></center></div>';
      } ?>
    </div>
    
    <hr/>
    <div class="col-sm-3 my-1">
      <button type="submit" class="form-control btn-primary" form="form-venta"><i class="fas fa-save"></i> Guardar</button>  
    </div>