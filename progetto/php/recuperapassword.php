<?php
	require('connessione.php');
	$conn = new connessione();
	$email=$_POST['email'];
	$query = "Select * from cliente where email= '$email';";
	$res = mysqli_query($conn->getConn(),$query);//vuol dire che la mail c'è quindi ha sbagliato password. Altrimenti o email errata o non presente.
	if(mysqli_num_rows($res)==0) echo "Indirizzo email errato o non registrato. <a href='../recupera.php'> Clicca qui</a> per riprovare. ";
	else{
		$password="";
		for ($x=1; $x<=6; $x++)
		{ 
		  if (($x+rand(0,6)) % 2){
			$password .= chr(rand(97,122));
		  }
		  else{
			$password .=rand(0,9);
		  }
		}
		$messaggio="La tua nuova password per accedere a Progetto Database di Anastasio Francesco è: \n";
		$messaggio.= $password;
		$messaggio="\nGrazie per averci scelto!\n";
		echo ($password . "<br/>");
		$password = sha1($password);
		$query = "UPDATE cliente SET password = '$password' where email = '$email'";
		$res = mysqli_query($conn->getConn(),$query);
		if($res==TRUE){
			mail($email,"Utente registrato",$messaggio,"From: noreply");
			echo "La nuova password è stata inviata via email. <a href ='../index.php'> Clicca qui</a> per effettuare l'accesso.!";
		}
		else echo "Ho avuto qualche problema. <a href ='../recupera.php'> Clicca qui</a> per riprovare...!";
		
	}
?>