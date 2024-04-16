<?php
require('connessione.php');

$utente = new utente();

//Controllo se la sessione � gi� aperta!
session_start();
//isset mi dice se una variabile � null. Quindi se � diversa da NULL allora vuol dire che c'� una sessione aperta e mi deve portare nella pagina dell'ordine.
if(isset($_SESSION['email'])){
		//Controllare se utente normale o amministratore per decidere dove reindirizzarlo.
		header("location:../ordine.php");
		return;
}
else{
		//Lanciare metodo di registrazione contenuto tra le funzioni della classe utente.
		//Controllo che non sia gi� registrato
		$ris=$utente->giaRegistrato($_POST['email']);
		if($ris==TRUE){//vuol dire gi� registrato
			echo "L'indirizzo email risulta gia' registrato! <a href='recuperapassword.php'> Clicca qui </a> se vuoi recuperare la password oppure <a href='../index.php'> clicca qui </a> se vuoi tornare alla home!";
		}
		else {//In questo caso invoco metodo registra.
			$utente->registra($_POST['email'],$_POST['nome'], $_POST['cognome'], $_POST['indirizzo'], $_POST['telefono'], $_POST['password']); 
		}
}



?>

