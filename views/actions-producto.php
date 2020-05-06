<?php
$function = new FunctionModel();
$producto_controller = new ProductoController();
if(isset($_POST['crud'])){
    if ($_POST['crud'] == 'add') {
        $new_prod = array(
            'prod_cod'  => 0,
            'prod_nom' => $_POST['prod_nom'],
            'prod_des' => $_POST['prod_des'],
            'prod_pve' => $_POST['prod_pve'],
            'prod_sto' =>0,
            'prod_cate_fk' => $_POST['prod_cate_fk']
        );
        //var_dump($new_prod);
        $producto_controller->add($new_prod);
        header('Location: ./productos&success=Producto guardado');
    } else if ($_POST['crud'] == 'del') {
        $producto_controller->del($_POST['prod_id']);
        header('Location: ./productos&success=producto eliminado');
    } else if ($_POST['crud'] == 'edi') {
        $act_prod = array(
            'prod_tit' => $_POST['prod_tit'],
            'prod_id'  => $_POST['prod_id'],
        );
        $producto_controller->set($act_prod);
        header('Location: ./productos&success=producto actualizada');
    }
}