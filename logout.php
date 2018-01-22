<?php 
session_start();
session_destroy();
echo "<script type= 'text/javascript'>location.href = 'index.php';</script>";
session_start();
$_SESSION['username'] = 'guest';
$_SESSION['actor'] = 'parents';
?>