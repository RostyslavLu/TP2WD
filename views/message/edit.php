<?php
session_status();
session_start();


if ($_SESSION['id'] !== $data['userId']) {
    header("Location: ?module=user&action=index&msg=4");
    die();
}


?>

<form class="createmessage" action="?module=message&action=update" method="post">
    <label>Sujet</label><br>
    <input type="text" name="title" value="<?=$data['title']; ?>"><br>
    
    <label >Message</label><br>
    
    <textarea cols="50" rows="10" minlength="6" maxlength="1000" name="article"><?=$data['article']; ?></textarea>
    <label ><input type="text" name="id" value="<?=$data['id']; ?>"></label>
    <input type="submit" value="Envoyer">
    
</form>