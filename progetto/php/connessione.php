<?php
require('dati_accesso_db.php');

function controllaSessione(){
	session_start();
	if(isset($_SESSION['login'])){
		//controllo se è un amministratore o meno per decidere dove portarlo.!
		$email=$_SESSION['email'];
		$query = "SELECT amministratore FROM cliente where email = '$email';";
		$conn = new connessione();
		$res=mysqli_query($conn->getConn(),$query);
		$array = mysqli_fetch_row($res);
		if($array[0] == 0)//caso in cui è un cliente normale lo porto nell'ordine.
			header("location:../riservato/ordine.php");
		else header("location:../riservato/statistiche.php");
	}
}

function controllaSessioneStatistiche(){
	session_start();
	if(isset($_SESSION['login'])){
		//controllo se è un amministratore o meno per decidere dove portarlo.!
		$email=$_SESSION['email'];
		$query = "SELECT amministratore FROM cliente where email = '$email';";
		$conn = new connessione();
		$res=mysqli_query($conn->getConn(),$query);
		$array = mysqli_fetch_row($res);
		if($array[0] == 0)//caso in cui è un cliente normale lo porto nell'ordine.
			header("location:../riservato/ordine.php");
	}
}

function controllaSessioneOrdine(){
	session_start();
	if(isset($_SESSION['login'])){
		//controllo se è un amministratore o meno per decidere dove portarlo.!
		$email=$_SESSION['email'];
		$query = "SELECT amministratore FROM cliente where email = '$email';";
		$conn = new connessione();
		$res=mysqli_query($conn->getConn(),$query);
		$array = mysqli_fetch_row($res);
		if($array[0] == 1)//caso in cui è un cliente normale lo porto nell'ordine.
			header("location:../riservato/statistiche.php");
	}
}

class utente{
	private $conn;	
	public function __construct(){
		$this->conn=new connessione();	
	}	
	/////////////////////////////////////////////////////////////////////Forse bisogna passare come parametro anche la connessione!!
	public function giaRegistrato($email){
		//query controllo che la mail non sia già registrata.
		$query="SELECT * FROM Cliente WHERE email='$email';";
		$res=mysqli_query($this->conn->getConn(), $query);
		$righe=mysqli_num_rows($res);
		if($righe>0)//Vuol dire che  è registrato
			return TRUE;
		else return FALSE ; // vuol dire che non è registrato.
	}
	
	public function registra($email, $nome, $cognome, $indirizzo, $telefono, $password){
		$data = date("Y-m-d H:i:s");

		$pass = $password;
		
		$password = sha1($password);
		$telefono = trim($telefono);
		$amm = 0;
		$query = "INSERT INTO `cliente` (`email`, `nome`, `cognome`, `indirizzo`, `telefono`, `data_registrazione`, `amministratore`, `password`) VALUES ('$email', '$nome', '$cognome', '$indirizzo', '$telefono', '$data', '$amm', '$password')";
		
		$res = mysqli_query($this->conn->getConn(), $query);
		if($res==TRUE){
			echo "Cliente registrato correttamente! Riceverai a breve una e-mail di riepilogo. <a href='../index.php'> Clicca qui per il log in </a>";
			//Invio email per riepilogo dati..!
			$messaggio="Riepilogo dati registrazione\n";
			$messaggio.="Nome: " .$nome."\n";
			$messaggio.="Cognome: " .$cognome."\n";
			$messaggio.="Indirizzo: " .$indirizzo."\n";
			$messaggio.="Telefono: " .$telefono."\n";
			$messaggio.="Email: " .$email."\n";
			
			$messaggio.="Password: " . $pass ."\n!";
			//Invio email non funzionante in locale.
			mail($email,"Utente registrato",$messaggio,"From: ProgettoDbAnastasioFrancesco");
			return true;
		}
		else { 
			echo "Registrazione non riuscita. <a href='../registrazione.php'> Clicca qui per tornare indietro. </a> ";
			echo ("<br/>" . mysqli_error());
			return false;
		}
	}
	
	
	public function verificaLogin($email, $password){
		$password= sha1($password);
		
		$query = "Select * from cliente where email= '$email' && password = '$password';";
		
		$res = mysqli_query($this->conn->getConn(),$query);
		//se vi è una riga con questi parametri allora login si può accettare!
		if(mysqli_num_rows($res)==1){
			session_start();
			$x = mysqli_fetch_row($res);
			$_SESSION['Nome'] = $x[1];
			$_SESSION['Email'] = $email;//La salvo per collegare il cliente al nuovo ordine!
			return true;
		}
		else {
			$query = "Select * from cliente where email= '$email';";
			$res = mysqli_query($this->conn->getConn(),$query);//vuol dire che la mail c'è quindi ha sbagliato password. Altrimenti o email errata o non presente.
			if(mysqli_num_rows($res)==1) echo "Password errata. <a href='../index.php'> Clicca qui</a> per riprovare. Se hai dimenticato la password <a href='../recupera.php'>clicca qui</a>";
			else echo "Indirizzo email errato o non registrato. <a href='../index.php'> Clicca qui</a> per riprovare. Se sei un nuovo utente per registrarti <a href='../registrazione.php'>clicca qui";
			return false;
		}
	}
	
	public function esci(){
		session_unset();
		session_destroy();
		header("location:../index.php");
	}
	
}
?>

