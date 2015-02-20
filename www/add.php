<?php


if (!empty($_POST)){

    $data=[];

    if (!empty($_POST['title'])){
        $data['title'] = $_POST['title'];
    }

    if (!empty($_FILES)){
        $res = file_upload('image');
        if (false !== $res){
            $data['image'] = $res;
        }
    }
}

include __DIR__ . '/view/add.php';