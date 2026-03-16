<?php
session_start(); // Fillojmë session-in për ta aksesuar

// 1. Fshijmë të gjitha vlerat e session-it
$_SESSION = array();

// 2. Shkatërrojmë session-in plotësisht
session_destroy();

// 3. E dërgojmë përdoruesin në ballinë (ose te login.php)
header("Location: index.php");
exit();
?>