<?php 
ob_start();
$connection = mysqli_connect('localhost', 'begemotm_blackli', 'begemotm_blacklist', 'begemotm_blacklist');
mysqli_set_charset($connection, "utf8");
 ?>