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
        var_dump($new_cate);
        $id_cate = $cate_controller->set($new_cate);
        if ($id_cate == -1) {
            header('Location: ./productos&success=Categoria guardado');
        }else{
            header('Location: ./productos&success=Error al guardar la categoria');
        }
    }else if ($_POST['crud'] == 'edi-cate') {
        $act_vive = array(
            'vive_tit' => $_POST['vive_tit'],
            'vive_id'  => $_POST['vive_id'],
        );
        $vivero_controller->set($act_vive);
        header('Location: ./productos&success=Vivero actualizada');
    }else if ($_POST['crud'] == 'del-cate') {
        $vivero_controller->del($_POST['vive_id']);
        header('Location: ./productos&success=Vivero eliminado');
    } 
}