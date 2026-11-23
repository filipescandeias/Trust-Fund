<?php
$hostname='localhost';
$username='root';
$passwor='';
$basedados='trust-fund';
$bd=mysqli_connect($hostname, $username, $passwor);
mysqli_select_db ($bd, $basedados);

?>