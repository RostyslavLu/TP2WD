<?php

session_start();


if (isset($_SESSION['finger_print']) && $_SESSION['finger_print'] === md5($_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR'].'gfdg/$%')) {
    
    $name_session = $_SESSION['name'];
} else {
    header("Location: ?module=user&action=index&msg=3");
    die();
}


?>

<form class="createmessage" action="?module=message&action=insert" method="post">
    <label>Sujet</label><br>
    <input type="text" name="title" require><br>
    
    <label >Message</label><br>
    <textarea cols="50" rows="10" minlength="6" maxlength="1000" name="article"></textarea>
    <input type="submit" value="Envoyer">
    
</form>