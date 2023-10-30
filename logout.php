<?php

session_start();
 
session_destroy();

echo "<center><p> La sesión fue finalizada";

 header ('Location:login.php');

?>