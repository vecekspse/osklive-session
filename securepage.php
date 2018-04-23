<?php
session_start();  
if(isset($_SESSION['flash'])) {
    echo $_SESSION['flash'];
    unset($_SESSION['flash']);
}
if(isset($_SESSION['auth'])) {
    echo "Jsi přihlášen jako uživatel:  " . $_SESSION['login'];
} else {
    echo "Nejsi přihlášen, odstup satane.";
}
/*
$text = addslashes("Hello guys, I am \"great\"");
echo $text;*/

$str = "Běžela ovečka hore do kopečka...";
$pole = explode(" ", $str);
var_dump(implode("---", $pole));

$cislo = 55555555555.77754457847;
echo number_format($cislo, 2, '.', ' ');

$t = "Ve třídě %s, je %d lidí";
printf($t, "4.F", 16);

mb_internal_encoding('UTF-8');
var_dump(mb_strlen("čau"));

$mail = "nekdo@spse.cz";
echo substr($mail, strpos($mail, "@") + 1);
echo "<br>";
echo strstr($mail, "@");

if(preg_match("/Zel./i", "Je v zelí tomtom stringu zelinka, , zelenáč, zelouš?", $pole)) {
    echo "ANO";
} else {
    echo "NE";
}
var_dump($pole);


