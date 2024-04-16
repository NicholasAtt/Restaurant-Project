<?php
require('connessione.php');
$utente = new utente();
session_start();
$res=$utente->esci();
?>