<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC</title>
    <link rel="stylesheet" href="resources/css/style.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="?module=message&action=index">Messages</a></li>
            <li><a href="?module=user&action=index">Se connecter</a></li>
        </ul>
    </nav>
    <header>
        <?php
        if (!isset($_SESSION['name'])) {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            echo '<div>'.'<span>'.'Utilisateur: '.'</span>'.'<strong>'. (isset($_SESSION['name']) ? $_SESSION['name'] : '').'</strong>'.'</div>';
            if (isset($_SESSION['name'])) {
                echo '<div>'.'<a href="?module=user&action=logout">Quiter</a>'.'</div>';
            }
        }
        ?>
    </header>
    <main>
        <?php
        echo $content;
        ?>
    </main>
</body>
</html>