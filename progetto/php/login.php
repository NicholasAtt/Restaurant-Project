<?php
require('connessione.php');
$utente = new utente();

$res=$utente->verificaLogin($_POST['email'], $_POST['password']);
if($res==true){
		session_start();
		$_SESSION['login']=TRUE;
		$_SESSION['email']= $_POST['email'];
		$email=$_SESSION['email'];
		$query = "SELECT amministratore FROM cliente where email = '$email';";
		$conn = new connessione();
		$res=mysqli_query($conn->getConn(),$query);
		$array = mysqli_fetch_row($res);
		if($array[0] == 0)//caso in cui � un cliente normale lo porto nell'ordine.
			header("location:../riservato/ordine.php");
		else header("location:../riservato/statistiche.php");
	
}
?>