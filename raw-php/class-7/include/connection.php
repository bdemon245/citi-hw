<?php
session_start();
echo "<pre>";
echo "<h1 style=\"color: green;\">🎉Congrats!Registration Successful🎈</h1><p>User Info</p>";
var_dump($_SESSION['data']);
echo "</pre>";
?>