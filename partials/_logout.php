<?php
session_start();

echo "logging you out. please wait........";

session_destroy();

// header("Location: http://localhost/coincraft/");
header("Location: /coincraft/");


?>