<?php

class connessione{
	
	public $connessione;
	function __construct(){
		$host = "localhost";
		$user = "root";
		$pass = "";
		$db = "progetto_uni";
		$this->connessione=mysqli_connect($host,$user,$pass);
		if(!$this->connessione){
			echo("Errore durante la connessione " . mysqli_error());
		}

		$trovato=mysqli_select_db($this->connessione,$db);

		if(!$trovato){
			echo("Errore durante la selezione del database " . mysqli_error());
		}		
	}
	
	public function chiudi_conn(){
		mysqli_close($this->connessione);
		echo "Connessione chiusa con successo<br\>";
	}
	
	public function getConn(){
		return $this->connessione;
		
	}
		
}
?>