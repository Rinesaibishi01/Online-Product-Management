<?php
session_start(); // Fillojme sesionin per tu bere login

//  Fshin vlerat e sesionit
$_SESSION = array();

// Shkaterrojm sesionin
session_destroy();

//  E dergojme perdoruesin ne faqen kryesore
header("Location: index.php");
exit();
?>