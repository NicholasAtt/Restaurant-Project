<?php
    require('../dati_accesso_db.php');
	$conn = new connessione();
	
	if(isset($_POST['pizza']))
		$nome = $_POST['pizza'];
	else $nome = "";
	$prezzoc = 0;
	$prezzom = 0;
	if(strlen($nome)!=0){ // In questo caso il metodo è stato invocato per l'inserimento di una pizza.
		 $prezzoc = $_POST['prezzoc'];
		 $prezzom = $_POST['prezzom'];
	}
	else{
		$nome = "P_";
		$nome .= $_POST['pizzolo'];
		$prezzoc = $_POST['prezzocp'];
		$prezzom = $_POST['prezzomp'];
	}
	
	//Inserisco la nuova pizza
	$query = "INSERT INTO `pizze_pizzoli` (`id_pizze_pizzoli`, `nome`, `prezzo_classic`, `prezzo_maxi`) VALUES (NULL, '$nome', '$prezzoc', '$prezzom');";
	$res = mysqli_query($conn->getConn(), $query);
	if($res == true) 
			echo "Inserimento avvenuto con successo. <a href='../../riservato/inserimento_pizze.php'>Clicca qui</a> per tornare indietro.";
	else echo "Problema durante l'inserimento<br/>" . mysqli_error($conn->getConn()) . "    <a href='../../riservato/inserimento_pizze.php'>Clicca qui</a> per tornare indietro.";
	
	//Estraggo l'ultimo id che poi mi serve ad inserire i vari ingredienti!
	$query = "select max(id_pizze_pizzoli) from pizze_pizzoli;";
	$res = mysqli_query($conn->getConn(), $query);
	$res = mysqli_fetch_array($res);
	$id = $res[0];
	
	//Inserisco i vari ingredienti
	if(isset($_POST['ingrediente1']) && $_POST['ingrediente1']!=0){
		$id_ingr = $_POST['ingrediente1'];
		$query = "INSERT INTO `composte` (`id_pizze_pizzoli`, `id_ingredienti`) VALUES ('$id', '$id_ingr');";
		$res = mysqli_query($conn->getConn(), $query);
		if($res == false)
			echo "Problema inserimento ingredienti <br/> " . mysqli_error($conn->getConn()) . "<br/>";
	}
	if(isset($_POST['ingrediente2']) && $_POST['ingrediente2']!=0){
		$id_ingr = $_POST['ingrediente2'];
		$query = "INSERT INTO `composte` (`id_pizze_pizzoli`, `id_ingredienti`) VALUES ('$id', '$id_ingr');";
		$res = mysqli_query($conn->getConn(), $query);
		if($res == false)
			echo "Problema inserimento ingredienti <br/> " . mysqli_error($conn->getConn()). "<br/>";
	}
	if(isset($_POST['ingrediente3']) && $_POST['ingrediente3']!=0){
		$id_ingr = $_POST['ingrediente3'];
		$query = "INSERT INTO `composte` (`id_pizze_pizzoli`, `id_ingredienti`) VALUES ('$id', '$id_ingr');";
		$res = mysqli_query($conn->getConn(), $query);
		if($res == false)
			echo "Problema inserimento ingredienti <br/> " . mysqli_error($conn->getConn()). "<br/>";
	}
	if(isset($_POST['ingrediente4']) && $_POST['ingrediente4']!=0){
		$id_ingr = $_POST['ingrediente4'];
		$query = "INSERT INTO `composte` (`id_pizze_pizzoli`, `id_ingredienti`) VALUES ('$id', '$id_ingr');";
		$res = mysqli_query($conn->getConn(), $query);
		if($res == false)
			echo "Problema inserimento ingredienti <br/> " . mysqli_error($conn->getConn()). "<br/>";
	}
	if(isset($_POST['ingrediente5']) && $_POST['ingrediente5']!=0){
		$id_ingr = $_POST['ingrediente5'];
		$query = "INSERT INTO `composte` (`id_pizze_pizzoli`, `id_ingredienti`) VALUES ('$id', '$id_ingr');";
		$res = mysqli_query($conn->getConn(), $query);
		if($res == false)
			echo "Problema inserimento ingredienti <br/> " . mysqli_error($conn->getConn()). "<br/>";
	}
	if(isset($_POST['ingrediente6']) && $_POST['ingrediente6']!=0){
		$id_ingr = $_POST['ingrediente6'];
		$query = "INSERT INTO `composte` (`id_pizze_pizzoli`, `id_ingredienti`) VALUES ('$id', '$id_ingr');";
		$res = mysqli_query($conn->getConn(), $query);
		if($res == false)
			echo "Problema inserimento ingredienti <br/> " . mysqli_error($conn->getConn()). "<br/>";
	}
	
	//Ingredienti pizzolo
	if(isset($_POST['ingrediente1p']) && $_POST['ingrediente1p']!=0){
		$id_ingr = $_POST['ingrediente1p'];
		$query = "INSERT INTO `composte` (`id_pizze_pizzoli`, `id_ingredienti`) VALUES ('$id', '$id_ingr');";
		$res = mysqli_query($conn->getConn(), $query);
		if($res == false)
			echo "Problema inserimento ingredienti <br/> " . mysqli_error($conn->getConn()). "<br/>";
	}
	if(isset($_POST['ingrediente2p']) && $_POST['ingrediente2p']!=0){
		$id_ingr = $_POST['ingrediente2p'];
		$query = "INSERT INTO `composte` (`id_pizze_pizzoli`, `id_ingredienti`) VALUES ('$id', '$id_ingr');";
		$res = mysqli_query($conn->getConn(), $query);
		if($res == false)
			echo "Problema inserimento ingredienti <br/> " . mysqli_error($conn->getConn()). "<br/>";
	}
	if(isset($_POST['ingrediente3p']) && $_POST['ingrediente3p']!=0){
		$id_ingr = $_POST['ingrediente3p'];
		$query = "INSERT INTO `composte` (`id_pizze_pizzoli`, `id_ingredienti`) VALUES ('$id', '$id_ingr');";
		$res = mysqli_query($conn->getConn(), $query);
		if($res == false)
			echo "Problema inserimento ingredienti <br/> " . mysqli_error($conn->getConn()). "<br/>";
	}
	if(isset($_POST['ingrediente4p']) && $_POST['ingrediente4p']!=0){
		$id_ingr = $_POST['ingrediente4p'];
		$query = "INSERT INTO `composte` (`id_pizze_pizzoli`, `id_ingredienti`) VALUES ('$id', '$id_ingr');";
		$res = mysqli_query($conn->getConn(), $query);
		if($res == false)
			echo "Problema inserimento ingredienti <br/> " . mysqli_error($conn->getConn()). "<br/>";
	}
	if(isset($_POST['ingrediente5p']) && $_POST['ingrediente5p']!=0){
		$id_ingr = $_POST['ingrediente5p'];
		$query = "INSERT INTO `composte` (`id_pizze_pizzoli`, `id_ingredienti`) VALUES ('$id', '$id_ingr');";
		$res = mysqli_query($conn->getConn(), $query);
		if($res == false)
			echo "Problema inserimento ingredienti <br/> " . mysqli_error($conn->getConn()). "<br/>";
	}
	if(isset($_POST['ingrediente6p']) && $_POST['ingrediente6p']!=0){
		$id_ingr = $_POST['ingrediente6p'];
		$query = "INSERT INTO `composte` (`id_pizze_pizzoli`, `id_ingredienti`) VALUES ('$id', '$id_ingr');";
		$res = mysqli_query($conn->getConn(), $query);
		if($res == false)
			echo "Problema inserimento ingredienti <br/> " . mysqli_error($conn->getConn()). "<br/>";
	}

?>