<?php

$msg = null;
if (isset($_GET['msg'])) {
    if ($_GET['msg'] == 1) {
        $msg = 'Vous ne pouvez pas supprimer des messages l\'autre utilisateur';
    }
}

?>

<span><?=$msg; ?></span>
<form action="?module=message&action=create" method="post">
<input type="submit" name="createmessage" value="Ajouter un message">
</form>

<?php


foreach($data as $row) {
    echo '<section>';
    echo '<header>';
    echo '<div> Message ID: '.$row['mesID'].'</div>';
    echo '<div> Author: '.'<b>'.$row['user_name'].'</b>'.'</div>';
    echo '<div> Date: '.$row['date'].'</div>';
    echo '</header>';
    echo '<article>';
    echo '<h4>'.$row['title'].'</h4>';
    echo '<p>'.$row['article'].'</p>';
    echo '</article>';
    echo '<div class="message_footer"><div></div><a href="?module=message&action=show&id='.$row['mesID'].'">Modifier</a><form action="?module=message&action=delete&id='.$row['mesID'].'" method="post"><input type="hidden" name="userId" value="'.$row['userId'].'"><input type="submit" value="Effacer"></form></div>'; 
    echo '</section>';
  
}
?>

 
 
    
