<?php

function user_controller_index() {
    require_once(MODEL_DIR.'/user.php');
    $data = user_model_index();
    render(VIEW_DIR.'/user/login.php');
}

function user_controller_login($request) {
    require_once(MODEL_DIR.'/user.php');
    $data = user_model_login($request);
    render(VIEW_DIR.'/user/auth.php');
}

function user_controller_create(){
    render(VIEW_DIR.'/user/create.php');
}

function user_controller_insert($request) {
    require_once(MODEL_DIR.'/user.php');
    user_model_insert($request);
    header("Location: ?module=user&action=index");
}
function user_controller_logout() {
    require_once(MODEL_DIR.'/user.php');
    user_model_logout();
}
?>