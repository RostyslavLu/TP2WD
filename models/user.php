<?php

function user_model_index() {
    
    require(CONNEX_DIR);
    //print_r($request);

    render(VIEW_DIR.'/user/login.php');
}

function user_model_login($request) {
    
    require_once(CONNEX_DIR);
    
    //print_r($request); //зчитані дані з інпут
    $userlog = $request['username'];
    $userpass = $request['password'];

    $sql = "SELECT * FROM user WHERE user_name='$userlog';";
    $result = mysqli_query($connex, $sql);

    $count = mysqli_num_rows($result);

    if ($count == 1) {
        //check pasword
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $dbPassword = $user['password'];
        //
        if (password_verify($userpass, $dbPassword)) {
            session_start();
            session_regenerate_id();
            //$_SESSION['logon'] = true;
            $_SESSION['id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
           
            $salt = 'gfdg/$%';
            $_SESSION['finger_print'] = md5($_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR'].$salt);
            

            render(VIEW_DIR.'/user/auth.php');
    
        } else {
            header("Location: ?module=user&action=index&msg=2");
        }
    } else {
        header("Location: ?module=user&action=index&msg=1");
    }

}

function user_model_insert($request) {
    require_once(CONNEX_DIR);
    foreach($request as $key=>$value) {
        $$key = mysqli_real_escape_string($connex, $value);
    }
    $password_hash = password_hash($password, PASSWORD_BCRYPT);
    $sql = "INSERT INTO user (name, user_name, password, birthday) VALUES ('$name', '$username', '$password_hash', '$birthday')";
    $result = mysqli_query($connex, $sql);
    mysqli_close($connex);
}

function user_model_logout() {
    render(VIEW_DIR.'/user/logout.php');
}

?>