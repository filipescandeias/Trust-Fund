<?php
session_start(); 


session_unset();


session_destroy();


header("Location: ../../Principal Page/index.php");
exit();
?>
