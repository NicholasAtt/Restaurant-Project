<?php
	require('../dati_accesso_db.php');
	
	$conn = new connessione();
	$nome = $_POST['nome'];
	$prezzo = $_POST['prezzo'];
	
	$query = "INSERT INTO `stuzzichini` (`id_stuzzichini`, `nome`, `prezzo`) VALUES (NULL, '$nome', '$prezzo');";
	$res = mysqli_query($conn->getConn(),$query);
	if($res == false)
		echo "Problema durante l'inserimento <br/>" . mysqli_error($conn->getConn()) . "<br/>Probabilmente hai inserito male il prezzo. <a href='../../riservato/inserimento_stuzzichini.php'>Clicca qui</a> per riprovare!";
	else
		echo "Inserimento avvenuto con successo. <a href='../../riservato/inserimento_stuzzichini.php'>Torna indietro</a>";
?>