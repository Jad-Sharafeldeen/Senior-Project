<?php
session_start();

session_destroy();
$_SESSION = [];

header("Location: /slider-parallax-effect/dist/login-signup.php");
exit();
?>
