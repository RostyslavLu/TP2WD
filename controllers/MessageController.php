<?php

function message_controller_index() {
    require_once(MODEL_DIR.'/message.php');
    $data = message_model_list();
    //return print_r($data);
    //http://localhost:7080/2395286/MVC/index.php?module=message&action=index
    render(VIEW_DIR.'/message/select.php', $data);

}

function  message_controller_create(){
    render(VIEW_DIR.'/message/create.php');
}

function message_controller_insert($request) {
    require_once(MODEL_DIR.'/message.php');
    message_model_insert($request);
    header("Location: ?module=message&action=index");
}


function message_controller_show($request) {
   
    require_once(MODEL_DIR.'/message.php');
    $data = message_model_show($request);
    render(VIEW_DIR.'/message/edit.php', $data);
}

function message_controller_update($request) {
    
    require_once(MODEL_DIR.'/message.php');
    message_model_update($request);
    header("Location: ?module=message&action=index");
 }

 function message_controller_delete($request) {
    require_once(MODEL_DIR.'/message.php');
    message_model_delete($request);
    header("Location: ?module=message&action=index");
 }

?>