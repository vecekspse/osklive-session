<?php
session_start();
var_dump($_SESSION);
define('LOGIN', 'user');
define('PASS', 'tajneheslo');
if(isset($_POST['login_submit'])) {
    if(!empty($_POST['login']) && !empty($_POST['heslo'])) {
        if($_POST['login'] == LOGIN && $_POST['heslo'] == PASS) {
            $_SESSION['auth'] = true;
            $_SESSION['login'] = $_POST['login'];
            $_SESSION['role'] = "admin";
            $_SESSION['USER_AGENT'] = $_SERVER['HTTP_USER_AGENT'];
            $_SESSION['IP'] = $_SERVER['REMOTE_ADDR'];
            $_SESSION['flash'] = "<p class=\"success\">Povedlo se ti přihlášení!!</p>";
            header('Location: securepage.php');
            exit;
        } else {
            echo "Tak to zkus znovu a lépe...";
            $_SESSION['flash'] = "<p class=\"error\">Nepovedlo se ti přihlášení!!</p>";
        }
    } else {
        echo "To bys asi nejdříve musel vyplnit všechny údaje Jarmile.";
    }
}
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Session</title>
    <style>
        .success { color: green; }
        .error { color: crimson; }
    </style>
</head>
<body>
    <?php
    if(isset($_SESSION['flash'])) {
        echo $_SESSION['flash'];
        unset($_SESSION['flash']);
    }
    if(isset($_SESSION['auth'])) { ?>
        <h1>Uživatel je přihlášen jako <?= $_SESSION['login']; ?></h1>
        <a href="logout.php">Odhlásit</a>
    <?php
    } else {
    ?>
    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="text" name="login" placeholder="Přihlašovací jméno">
        <input type="password" name="heslo" placeholder="Přihlašovací heslo">
        <button type="submit" name="login_submit">Přihlásit</button>
    </form>
    <?php } ?>

</body>
</html>