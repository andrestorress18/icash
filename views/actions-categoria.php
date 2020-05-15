<?php
$function = new FunctionModel();
$cate_controller = new CategoriaController();
if(isset($_POST['crud'])){
    if ($_POST['crud'] == 'add-cate') {
        $new_cate = array(
            'cate_cod'  => 0,
            'cate_nom' => $_POST['cate_nom'],
            'cate_des' => $_POST['cate_des']
        );
        //var_dump($new_cate);
        $cate_controller->set($new_cate);
        header('Location: ./productos&success=Categoría guardada');
        
    }else if ($_POST['crud'] == 'edi-cate') {
        $act_cate = array(
            'cate_nom' => $_POST['cate_nom'],
            'cate_des' => $_POST['cate_des'],
            'cate_id'  => $_POST['cate_id'],
        );
        $cate_controller->set($act_vive);
        header('Location: ./productos&success=Categoría actualizada');
    }else if ($_POST['crud'] == 'del-cate') {
        $cate_controller->del($_POST['cate_cod']);
        header('Location: ./productos&success=Categoría eliminado');
    } 
}