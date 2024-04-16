<?php
	require('../dati_accesso_db.php');
	$indietro = false;
	$conn = new connessione();
	$query = "select * from pizze_pizzoli";
	$res = mysqli_query($conn->getConn(), $query);
	$num = -1;
	if($res == false)
		echo "Problema grave: <br/> " . mysqli_error($conn->getConn()) . "<br/>per tornare indietro <a href='../../riservato/modifiche_varie.php'> clicca qui</a>";
	else {//salvo numero di righe per fare ciclo for
		$num = mysqli_num_rows($res);
	}
	//dentro ciclo for controllo che i campi arrivato sono vuoti. Se lo sono non faccio nulla altrimenti invoco query di modifica!
	for($i=0;$i<$num;$i++){
		//per prendere i vari campi di input 
		$x = "nome" . $i;
		$y = "prezzo" . $i;
		$z = "prezzom" . $i;
		$nome = $_POST[$x];
		$prezzo = $_POST[$y];
		$prezzom = $_POST[$z];
		$next = mysqli_fetch_row($res);
		$id = $next[0];
		
		if(strlen($nome)>0 && strlen($prezzo)>0 && strlen($prezzom)>0){//caso in cui entrambe sono state inserite. quindi modifica di entrambi i campi.!
			$query = "UPDATE `pizze_pizzoli` SET `nome`= '$nome',`prezzo_classic`=$prezzo,`prezzo_maxi`=$prezzom WHERE  `id_pizze_pizzoli`= $id;";
			$risultato = mysqli_query($conn->getConn(), $query);
			if($risultato == false){
				echo "<br/>Problema grave: <br/> " . mysqli_error($conn->getConn()) . "<br/>per tornare indietro <a href='../../riservato/modifiche_varie.php'> clicca qui</a><br/>";
				echo "Verrai reindirizzato automaticamente tra pochi secondi!";
				header( "refresh:3;url=../../riservato/modifiche_varie.php" );
			}
			else {
				echo "<br/>Modifica effettuata con successo. Per tornare indietro <a href='../../riservato/modifiche_varie.php'> clicca qui</a><br/>";
				echo "Verrai reindirizzato automaticamente tra pochi secondi!";
				header( "refresh:3;url=../../riservato/modifiche_varie.php" );
			}
			$indietro = true;
		}
		else if(strlen($nome)>0 && strlen($prezzo)>0){
			$query = "UPDATE `pizze_pizzoli` SET `nome`= '$nome',`prezzo_classic`=$prezzo WHERE  `id_pizze_pizzoli`= $id;";			$risultato = mysqli_query($conn->getConn(), $query);
			
			if($risultato == false){
				echo "<br/>Problema grave: <br/> " . mysqli_error($conn->getConn()) . "<br/>per tornare indietro <a href='../../riservato/modifiche_varie.php'> clicca qui</a><br/>";
				echo "Verrai reindirizzato automaticamente tra pochi secondi!";
				header( "refresh:3;url=../../riservato/modifiche_varie.php" );
			}
			else {
				echo "<br/>Modifica effettuata con successo. Per tornare indietro <a href='../../riservato/modifiche_varie.php'> clicca qui</a><br/>";
				echo "Verrai reindirizzato automaticamente tra pochi secondi!";
				header( "refresh:3;url=../../riservato/modifiche_varie.php" );
			}		
			$indietro = true;
		}
		else if(strlen($nome)>0 && strlen($prezzom)>0){
			$query = "UPDATE `pizze_pizzoli` SET `nome`= '$nome',`prezzo_maxi`=$prezzom WHERE  `id_pizze_pizzoli`= $id;";
			$risultato = mysqli_query($conn->getConn(), $query);
			if($risultato == false){
				echo "<br/>Problema grave: <br/> " . mysqli_error($conn->getConn()) . "<br/>per tornare indietro <a href='../../riservato/modifiche_varie.php'> clicca qui</a><br/>";
				echo "Verrai reindirizzato automaticamente tra pochi secondi!";
				header( "refresh:3;url=../../riservato/modifiche_varie.php" );
			}
			else {
				echo "<br/>Modifica effettuata con successo. Per tornare indietro <a href='../../riservato/modifiche_varie.php'> clicca qui</a><br/>";
				echo "Verrai reindirizzato automaticamente tra pochi secondi!";
				header( "refresh:3;url=../../riservato/modifiche_varie.php" );
			}
			$indietro = true;
		}
		else if(strlen($prezzo)>0 && strlen($prezzom)>0){
			$query = "UPDATE `pizze_pizzoli` SET `prezzo_classic`=$prezzo,`prezzo_maxi`=$prezzom WHERE  `id_pizze_pizzoli`= $id;";
			$risultato = mysqli_query($conn->getConn(), $query);
			if($risultato == false){
				echo "<br/>Problema grave: <br/> " . mysqli_error($conn->getConn()) . "<br/>per tornare indietro <a href='../../riservato/modifiche_varie.php'> clicca qui</a><br/>";
				echo "Verrai reindirizzato automaticamente tra pochi secondi!";
				header( "refresh:3;url=../../riservato/modifiche_varie.php" );
			}
			else {
				echo "<br/>Modifica effettuata con successo. Per tornare indietro <a href='../../riservato/modifiche_varie.php'> clicca qui</a><br/>";
				echo "Verrai reindirizzato automaticamente tra pochi secondi!";
				header( "refresh:3;url=../../riservato/modifiche_varie.php" );
			}
			$indietro = true;
		}
		else if(strlen($nome)>0){
			$query = "UPDATE `pizze_pizzoli` SET `nome`= '$nome' WHERE  `id_pizze_pizzoli`= $id;";
			$risultato = mysqli_query($conn->getConn(), $query);
			if($risultato == false){
				echo "<br/>Problema grave: <br/> " . mysqli_error($conn->getConn()) . "<br/>per tornare indietro <a href='../../riservato/modifiche_varie.php'> clicca qui</a><br/>";
				echo "Verrai reindirizzato automaticamente tra pochi secondi!";
				header( "refresh:3;url=../../riservato/modifiche_varie.php" );
			}
			else {
				echo "<br/>Modifica effettuata con successo. Per tornare indietro <a href='../../riservato/modifiche_varie.php'> clicca qui</a><br/>";
				echo "Verrai reindirizzato automaticamente tra pochi secondi!";
				header( "refresh:3;url=../../riservato/modifiche_varie.php" );
			}
			$indietro = true;
		}
		else if(strlen($prezzo)>0){
			$query = "UPDATE `pizze_pizzoli` SET `prezzo_classic`=$prezzo WHERE  `id_pizze_pizzoli`= $id;";
			$risultato = mysqli_query($conn->getConn(), $query);
			if($risultato == false){
				echo "<br/>Problema grave: <br/> " . mysqli_error($conn->getConn()) . "<br/>per tornare indietro <a href='../../riservato/modifiche_varie.php'> clicca qui</a><br/>";
				echo "Verrai reindirizzato automaticamente tra pochi secondi!";
				header( "refresh:3;url=../../riservato/modifiche_varie.php" );
			}
			else {
				echo "<br/>Modifica effettuata con successo. Per tornare indietro <a href='../../riservato/modifiche_varie.php'> clicca qui</a><br/>";
				echo "Verrai reindirizzato automaticamente tra pochi secondi!";
				header( "refresh:3;url=../../riservato/modifiche_varie.php" );
			}
			$indietro = true;
		}
		else if(strlen($prezzom)>0){
			$query = "UPDATE `pizze_pizzoli` SET `prezzo_maxi`=$prezzom WHERE  `id_pizze_pizzoli`= $id;";
			$risultato = mysqli_query($conn->getConn(), $query);
			if($risultato == false){
				echo "<br/>Problema grave: <br/> " . mysqli_error($conn->getConn()) . "<br/>per tornare indietro <a href='../../riservato/modifiche_varie.php'> clicca qui</a><br/>";
				echo "Verrai reindirizzato automaticamente tra pochi secondi!";
				header( "refresh:3;url=../../riservato/modifiche_varie.php" );
			}
			else {
				echo "<br/>Modifica effettuata con successo. Per tornare indietro <a href='../../riservato/modifiche_varie.php'> clicca qui</a><br/>";
				echo "Verrai reindirizzato automaticamente tra pochi secondi!";
				header( "refresh:3;url=../../riservato/modifiche_varie.php" );
			}
			$indietro = true;
		}
		
	}
	if($indietro == false){
		echo "<br/>Nessuna modifica effettuata. Per tornare indietro <a href='../../riservato/modifiche_varie.php'> clicca qui</a><br/>";
		echo "Verrai reindirizzato automaticamente tra pochi secondi!";
		header( "refresh:3;url=../../riservato/modifiche_varie.php" );
	}
	

	
?>