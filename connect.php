<?php
$login = 'mbouhaja';
$db_pwd = 'mohamedmdf1234@zdeath@**@';
/* Creation de l’objet qui gere la connexion: */
$connection = new mysqli("localhost:3306", $login, $db_pwd, $login);
if(!$connection) {
echo 'error';
}
?>