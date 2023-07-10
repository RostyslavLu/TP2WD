<?php
$msg = null;
if (isset($_GET['msg'])) {
    if ($_GET['msg'] == 1) {
        $msg = 'Utilisateur n\'exist pas';
    }
    if ($_GET['msg'] == 2) {
        $msg = 'Mot de passe n\'est pas correct';
    }
    if ($_GET['msg'] == 3) {
        $msg = 'Pour ecrit le message if d\'abord autoriser';
    }
    if ($_GET['msg'] == 4) {
        $msg = 'Vous ne pouvez pas modifier message de l\'autre utilisateur';
    }
}

?>


<form action="?module=user&action=login" method="post">
        <h2>Connexion</h2>
        <span><?=$msg; ?></span>
        <div>
            <label>Nom utilisateur
                <input type="text" name="username" maxlength="45">
            
            </label><br>
            <label>Mot de passe
                <input type="password" name="password" minlength="6" maxlength="20">
            </label><br>
            
        </div>
        <div>
            <input type="submit" value="login">
            <p>Vous n'avez pas encore de compte?</p>
            <a href="?module=user&action=create">Créez-en un maintenant</a>
        </div>
    </form>