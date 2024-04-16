<?php
	require("connessione.php");
	session_start();
	$conn = new connessione();
	//Controlli preliminari
	
	$messaggio="";
	$messaggio="Ordine registrato correttamente.\n";
	$messaggio="Riepilogo ordine.\n";
	//Fare il controllo nel caso in cui tutto sia vuoto!!
	if($_POST['nome_bevanda1']==false && $_POST['nome_bevanda2']==false && $_POST['nome_bevanda3']==false && $_POST['nome_stuzzichino1']==false && $_POST['nome_stuzzichino2']==false && $_POST['nome_stuzzichino3']==false && $_POST['nome_pizza1']==false && $_POST['nome_pizza2']==false && $_POST['nome_pizza3']==false && $_POST['nome_pizza4']==false && $_POST['nome_pizza5']==false){
		echo "Ordine vuoto!!!! Ma che combini?? xD<br/>";
		echo "Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
		echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
		header( "refresh:3;url=../../riservato/ordine.php" );
		return;
	}
		
	//Bevande
	//se seleziona il nome allora deve selezionare anche la quantit� altrimenti errore.
	$bev1 = $_POST['nome_bevanda1'];
	$bev2 = $_POST['nome_bevanda2'];
	$bev3 = $_POST['nome_bevanda3'];
	$bevQuant1 = $_POST['bevanda1'];
	$bevQuant2 = $_POST['bevanda2'];
	$bevQuant3 = $_POST['bevanda3'];
	
	if($bev1 != 0 && $bevQuant1 == FALSE){
		echo ("Non hai selezionato la quantita' nella bevanda 1<br/>");
		echo "Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
		echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
		header( "refresh:3;url=../../riservato/ordine.php" );
		return;
	}
	if($bev2 != 0 && $bevQuant2 == FALSE){
		echo ("Non hai selezionato la quantita' nella bevanda 2<br/>");
		echo "Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
		echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
		header( "refresh:3;url=../../riservato/ordine.php" );
		return;
	}
	if($bev3 != 0 && $bevQuant3 == FALSE){
		echo ("Non hai selezionato la quantita' nella bevanda 3<br/>");
		echo "Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
		echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
		header( "refresh:3;url=../../riservato/ordine.php" );
		return;
	}
	
	//Stuzzichini
	//se seleziona il nome allora deve selezionare anche la quantit� altrimenti errore.
	$stuzz1 = $_POST['nome_stuzzichino1'];
	$stuzz2 = $_POST['nome_stuzzichino2'];
	$stuzz3 = $_POST['nome_stuzzichino3'];
	$stuzzQuant1 = $_POST['stuzzichino1'];
	$stuzzQuant2 = $_POST['stuzzichino2'];
	$stuzzQuant3 = $_POST['stuzzichino3'];
	
	if($stuzz1 != 0 && $stuzzQuant1 == FALSE){
		echo ("Non hai selezionato la quantita' nello stuzzichino 1<br/>");
		echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
		echo "Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
		header( "refresh:3;url=../../riservato/ordine.php" );
		return;
	}
	if($stuzz2 != 0 && $stuzzQuant2 == FALSE){
		echo ("Non hai selezionato la quantita' nello stuzzichino 2<br/>");
		echo "Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
		echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
		header( "refresh:3;url=../../riservato/ordine.php" );
		return;
	}
	if($stuzz3 != 0 && $stuzzQuant3 == FALSE){
		echo ("Non hai selezionato la quantita' nello stuzzichino 3<br/>");
		echo " Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
		echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
		header( "refresh:3;url=../../riservato/ordine.php" );
		return;
	}
	
	//Pizze/pizzoli
	//se seleziona il nome allora deve selezionare anche la quantit� altrimenti errore.
	$piz1 = $_POST['nome_pizza1'];
	$piz2 = $_POST['nome_pizza2'];
	$piz3 = $_POST['nome_pizza3'];
	$piz4 = $_POST['nome_pizza4'];
	$piz5 = $_POST['nome_pizza5'];
	$pizQuant1 = $_POST['pizza1q'];
	$pizQuant2 = $_POST['pizza2q'];
	$pizQuant3 = $_POST['pizza3q'];
	$pizQuant4 = $_POST['pizza4q'];
	$pizQuant5 = $_POST['pizza5q'];
	
	
	if($piz1 != 0 && $pizQuant1 == FALSE){
		echo ("Non hai selezionato la quantita' nella pizza 1<br/>");
		echo " Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
		echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
		header( "refresh:3;url=../../riservato/ordine.php" );
		return;
	}
	if($piz2 != 0 && $pizQuant2 == FALSE){
		echo ("Non hai selezionato la quantita' nella pizza 2<br/>");
		echo "Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
		echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
		header( "refresh:3;url=../../riservato/ordine.php" );
		return;
	}
	if($piz3 != 0 && $pizQuant3 == FALSE){
		echo ("Non hai selezionato la quantita' nella pizza 3<br/>");
		echo "Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
		echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
		header( "refresh:3;url=../../riservato/ordine.php" );
		return;
	}
	if($piz4 != 0 && $pizQuant4 == FALSE){
		echo ("Non hai selezionato la quantita' nella pizza 4<br/>");
		echo "Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
		echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
		header( "refresh:3;url=../../riservato/ordine.php" );
		return;
	}
	if($piz5 != 0 && $pizQuant5 == FALSE){
		echo ("Non hai selezionato la quantita' nella pizza 5<br/>");
		echo "Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
		echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
		header( "refresh:3;url=../../riservato/ordine.php" );
		return;
	}
	
	
	//Controllo che gli ingredienti tolti dalla pizza siano stati scelti tra quelli che ho dentro la pizza e non fuori
	
	
	//Controllo ingredienti da togliere pizza 1
	
	if($_POST['nome_ingrediente4'] !=FALSE || $_POST['nome_ingrediente5'] !=FALSE || $_POST['nome_ingrediente6'] !=FALSE){//In questo caso ho tolto un ingrediente.
		$id_pizza=$_POST['nome_pizza1'];
		
		$query = "select i.id_ingredienti from ingredienti as i, pizze_pizzoli as p, composte as c where";
		$query.= " i.id_ingredienti = c.id_ingredienti and c.id_pizze_pizzoli = p.id_pizze_pizzoli and p.id_pizze_pizzoli = $id_pizza;";
		//$conn = new connessione();
		$res = mysqli_query($conn->getConn(),$query);
		if($res == false ){
			echo "Problema durante la query di estrazione ingredienti pizza<br/>";
			echo mysqli_error($conn->getConn());
			echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
			echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
			header( "refresh:3;url=../../riservato/ordine.php" );
			return;
		}
		else {
			$cont1 = 0;
			$cont2 = 0;
			$cont3 = 0;
			while($x = mysqli_fetch_row($res)){//incremento il contatore se ingredientex non � falso e trovo un ingrediente nella lista x
				if($_POST['nome_ingrediente4']!= FALSE){
					if($x[0] == $_POST['nome_ingrediente4']) 
						$cont1++; 
				}
				if($_POST['nome_ingrediente5']!= FALSE){
					if($x[0] == $_POST['nome_ingrediente5']) 
						$cont2++; 
				}
				if($_POST['nome_ingrediente6']!= FALSE){
					if($x[0] == $_POST['nome_ingrediente6']) 
						$cont3++; 
				}
			}
			//Se uno degli ingredienti non � falso e il relativo contatore � rimasto a 0 allora ho selezionato un ingrediente diverso da quello che c'� nella pizza
			if($_POST['nome_ingrediente4']!= FALSE){
				if($cont1==0){
					echo "Hai tolto nella pizza 1 un ingrediente che non e' contenuto in essa. Ricompila l'ordine facendo piu' attenzione!";
					echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
					echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
					header( "refresh:3;url=../../riservato/ordine.php" );
					return;
				}
			}
			if($_POST['nome_ingrediente5']!= FALSE){
				if($cont2==0){
					echo "Hai tolto nella pizza 1 un ingrediente che non e' contenuto in essa. Ricompila l'ordine facendo piu' attenzione!";
					echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
					echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
					header( "refresh:3;url=../../riservato/ordine.php" );
					return;
				}
			}
			if($_POST['nome_ingrediente6']!= FALSE){
				if($cont3==0){
					echo "Hai tolto nella pizza 1 un ingrediente che non e' contenuto in essa. Ricompila l'ordine facendo piu' attenzione!";
					echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
					echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
					header( "refresh:3;url=../../riservato/ordine.php" );
					return;
				}
			}
		}
	}
	
	//Controllo ingredienti da togliere pizza 2
	
	if($_POST['nome_ingrediente10'] !=FALSE || $_POST['nome_ingrediente11'] !=FALSE || $_POST['nome_ingrediente12'] !=FALSE){//In questo caso ho tolto un ingrediente.
		$id_pizza=$_POST['nome_pizza2'];
		
		$query = "select i.id_ingredienti from ingredienti as i, pizze_pizzoli as p, composte as c where";
		$query.= " i.id_ingredienti = c.id_ingredienti and c.id_pizze_pizzoli = p.id_pizze_pizzoli and p.id_pizze_pizzoli = $id_pizza;";
		//$conn = new connessione();
		$res = mysqli_query($conn->getConn(),$query);
		if($res == false ){
			echo "Problema durante la query di estrazione ingredienti pizza<br/>";
			echo mysqli_error($conn->getConn());
			echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
			echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
			header( "refresh:3;url=../../riservato/ordine.php" );
			return;
		}
		else {
			$cont1 = 0;
			$cont2 = 0;
			$cont3 = 0;
			while($x = mysqli_fetch_row($res)){//incremento il contatore se ingredientex non � falso e trovo un ingrediente nella lista x
				if($_POST['nome_ingrediente10']!= FALSE){
					if($x[0] == $_POST['nome_ingrediente10']) 
						$cont1++; 
				}
				if($_POST['nome_ingrediente11']!= FALSE){
					if($x[0] == $_POST['nome_ingrediente11']) 
						$cont2++; 
				}
				if($_POST['nome_ingrediente12']!= FALSE){
					if($x[0] == $_POST['nome_ingrediente12']) 
						$cont3++; 
				}
			}
			//Se uno degli ingredienti non � falso e il relativo contatore � rimasto a 0 allora ho selezionato un ingrediente diverso da quello che c'� nella pizza
			if($_POST['nome_ingrediente10']!= FALSE){
				if($cont1==0){
					echo "Hai tolto nella pizza 1 un ingrediente che non e' contenuto in essa. Ricompila l'ordine facendo piu' attenzione!";
					echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
					echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
					header( "refresh:3;url=../../riservato/ordine.php" );
					return;
				}
			}
			if($_POST['nome_ingrediente11']!= FALSE){
				if($cont2==0){
					echo "Hai tolto nella pizza 1 un ingrediente che non e' contenuto in essa. Ricompila l'ordine facendo piu' attenzione!";
					echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
					echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
					header( "refresh:3;url=../../riservato/ordine.php" );
					return;
				}
			}
			if($_POST['nome_ingrediente12']!= FALSE){
				if($cont3==0){
					echo "Hai tolto nella pizza 1 un ingrediente che non e' contenuto in essa. Ricompila l'ordine facendo piu' attenzione!";
					echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
					echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
					header( "refresh:3;url=../../riservato/ordine.php" );
					return;
				}
			}
		}
	}
	
	//Controllo ingredienti da togliere pizza 3
	
	if($_POST['nome_ingrediente16'] !=FALSE || $_POST['nome_ingrediente17'] !=FALSE || $_POST['nome_ingrediente18'] !=FALSE){//In questo caso ho tolto un ingrediente.
		$id_pizza=$_POST['nome_pizza3'];
		
		$query = "select i.id_ingredienti from ingredienti as i, pizze_pizzoli as p, composte as c where";
		$query.= " i.id_ingredienti = c.id_ingredienti and c.id_pizze_pizzoli = p.id_pizze_pizzoli and p.id_pizze_pizzoli = $id_pizza;";
	//	$conn = new connessione();
		$res = mysqli_query($conn->getConn(),$query);
		if($res == false ){
			echo "Problema durante la query di estrazione ingredienti pizza<br/>";
			echo mysqli_error($conn->getConn());
			echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
			echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
			header( "refresh:3;url=../../riservato/ordine.php" );
			return;
		}
		else {
			$cont1 = 0;
			$cont2 = 0;
			$cont3 = 0;
			while($x = mysqli_fetch_row($res)){//incremento il contatore se ingredientex non � falso e trovo un ingrediente nella lista x
				if($_POST['nome_ingrediente16']!= FALSE){
					if($x[0] == $_POST['nome_ingrediente16']) 
						$cont1++; 
				}
				if($_POST['nome_ingrediente17']!= FALSE){
					if($x[0] == $_POST['nome_ingrediente17']) 
						$cont2++; 
				}
				if($_POST['nome_ingrediente18']!= FALSE){
					if($x[0] == $_POST['nome_ingrediente18']) 
						$cont3++; 
				}
			}
			//Se uno degli ingredienti non � falso e il relativo contatore � rimasto a 0 allora ho selezionato un ingrediente diverso da quello che c'� nella pizza
			if($_POST['nome_ingrediente16']!= FALSE){
				if($cont1==0){
					echo "Hai tolto nella pizza 1 un ingrediente che non e' contenuto in essa. Ricompila l'ordine facendo piu' attenzione!";
					echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
					echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
					header( "refresh:3;url=../../riservato/ordine.php" );
					return;
				}
			}
			if($_POST['nome_ingrediente17']!= FALSE){
				if($cont2==0){
					echo "Hai tolto nella pizza 1 un ingrediente che non e' contenuto in essa. Ricompila l'ordine facendo piu' attenzione!";
					echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
					echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
					header( "refresh:3;url=../../riservato/ordine.php" );
					return;
				}
			}
			if($_POST['nome_ingrediente18']!= FALSE){
				if($cont3==0){
					echo "Hai tolto nella pizza 1 un ingrediente che non e' contenuto in essa. Ricompila l'ordine facendo piu' attenzione!";
					echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
					echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
					header( "refresh:3;url=../../riservato/ordine.php" );
					return;
				}
			}
		}
	}
	
	//Controllo ingredienti da togliere pizza 4
	
	if($_POST['nome_ingrediente22'] !=FALSE || $_POST['nome_ingrediente23'] !=FALSE || $_POST['nome_ingrediente24'] !=FALSE){//In questo caso ho tolto un ingrediente.
		$id_pizza=$_POST['nome_pizza4'];
		
		$query = "select i.id_ingredienti from ingredienti as i, pizze_pizzoli as p, composte as c where";
		$query.= " i.id_ingredienti = c.id_ingredienti and c.id_pizze_pizzoli = p.id_pizze_pizzoli and p.id_pizze_pizzoli = $id_pizza;";
	//	$conn = new connessione();
		$res = mysqli_query($conn->getConn(),$query);
		if($res == false ){
			echo "Problema durante la query di estrazione ingredienti pizza<br/>";
			echo mysqli_error($conn->getConn());
			echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
			echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
			header( "refresh:3;url=../../riservato/ordine.php" );
			return;
		}
		else {
			$cont1 = 0;
			$cont2 = 0;
			$cont3 = 0;
			while($x = mysqli_fetch_row($res)){//incremento il contatore se ingredientex non � falso e trovo un ingrediente nella lista x
				if($_POST['nome_ingrediente22']!= FALSE){
					if($x[0] == $_POST['nome_ingrediente22']) 
						$cont1++; 
				}
				if($_POST['nome_ingrediente23']!= FALSE){
					if($x[0] == $_POST['nome_ingrediente23']) 
						$cont2++; 
				}
				if($_POST['nome_ingrediente24']!= FALSE){
					if($x[0] == $_POST['nome_ingrediente24']) 
						$cont3++; 
				}
			}
			//Se uno degli ingredienti non � falso e il relativo contatore � rimasto a 0 allora ho selezionato un ingrediente diverso da quello che c'� nella pizza
			if($_POST['nome_ingrediente22']!= FALSE){
				if($cont1==0){
					echo "Hai tolto nella pizza 1 un ingrediente che non e' contenuto in essa. Ricompila l'ordine facendo piu' attenzione!";
					echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
					echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
					header( "refresh:3;url=../../riservato/ordine.php" );
					return;
				}
			}
			if($_POST['nome_ingrediente23']!= FALSE){
				if($cont2==0){
					echo "Hai tolto nella pizza 1 un ingrediente che non e' contenuto in essa. Ricompila l'ordine facendo piu' attenzione!";
					echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
					echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
					header( "refresh:3;url=../../riservato/ordine.php" );
					return;
				}
			}
			if($_POST['nome_ingrediente24']!= FALSE){
				if($cont3==0){
					echo "Hai tolto nella pizza 1 un ingrediente che non e' contenuto in essa. Ricompila l'ordine facendo piu' attenzione!";
					echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
					echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
					header( "refresh:3;url=../../riservato/ordine.php" );
					return;
				}
			}
		}
	}
	
	//Controllo ingredienti da togliere pizza 5
	
	if($_POST['nome_ingrediente28'] !=FALSE || $_POST['nome_ingrediente29'] !=FALSE || $_POST['nome_ingrediente30'] !=FALSE){//In questo caso ho tolto un ingrediente.
		$id_pizza=$_POST['nome_pizza5'];
		
		$query = "select i.id_ingredienti from ingredienti as i, pizze_pizzoli as p, composte as c where";
		$query.= " i.id_ingredienti = c.id_ingredienti and c.id_pizze_pizzoli = p.id_pizze_pizzoli and p.id_pizze_pizzoli = $id_pizza;";
	//	$conn = new connessione();
		$res = mysqli_query($conn->getConn(),$query);
		if($res == false ){
			echo "Problema durante la query di estrazione ingredienti pizza<br/>";
			echo mysqli_error($conn->getConn());
			echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
			echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
			header( "refresh:3;url=../../riservato/ordine.php" );
			return;
		}
		else {
			$cont1 = 0;
			$cont2 = 0;
			$cont3 = 0;
			while($x = mysqli_fetch_row($res)){//incremento il contatore se ingredientex non � falso e trovo un ingrediente nella lista x
				if($_POST['nome_ingrediente28']!= FALSE){
					if($x[0] == $_POST['nome_ingrediente28']) 
						$cont1++; 
				}
				if($_POST['nome_ingrediente29']!= FALSE){
					if($x[0] == $_POST['nome_ingrediente29']) 
						$cont2++; 
				}
				if($_POST['nome_ingrediente30']!= FALSE){
					if($x[0] == $_POST['nome_ingrediente30']) 
						$cont3++; 
				}
			}
			//Se uno degli ingredienti non � falso e il relativo contatore � rimasto a 0 allora ho selezionato un ingrediente diverso da quello che c'� nella pizza
			if($_POST['nome_ingrediente28']!= FALSE){
				if($cont1==0){
					echo "Hai tolto nella pizza 1 un ingrediente che non e' contenuto in essa. Ricompila l'ordine facendo piu' attenzione!";
					echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
					echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
					header( "refresh:3;url=../../riservato/ordine.php" );
					return;
				}
			}
			if($_POST['nome_ingrediente29']!= FALSE){
				if($cont2==0){
					echo "Hai tolto nella pizza 1 un ingrediente che non e' contenuto in essa. Ricompila l'ordine facendo piu' attenzione!";
					echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
					echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
					header( "refresh:3;url=../../riservato/ordine.php" );
					return;
				}
			}
			if($_POST['nome_ingrediente30']!= FALSE){
				if($cont3==0){
					echo "Hai tolto nella pizza 1 un ingrediente che non e' contenuto in essa. Ricompila l'ordine facendo piu' attenzione!";
					echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
					echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
					header( "refresh:3;url=../../riservato/ordine.php" );
					return;
				}
			}
		}
	}
	
	
	
	
	//Inizio il vero inserimento dopo aver controllato che non vi siano problemi..!
	//Utilizzo le transazioni cos� in caso di problema durante l'inserimento annullo tutto!.
	
	//$query = "Set autocommit=0;";
	//$conn = new connessione();
	// $res = mysqli_query($conn->getConn(), $query);
	// if($res == false ){
		// echo "Problema durante SET COMMIT";
		// echo mysqli_error($conn->getConn());
		// echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
		// echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
		// header( "refresh:3;url=../../riservato/ordine.php" );
		// return;
	// }
	// $query = "START TRANSACTION;";
	//$conn = new connessione();
	// $res = mysqli_query($conn->getConn(), $query);
	// if($res == false ){
		// echo "Problema durante inizio transazione";
		// echo mysqli_error($conn->getConn());
		// echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
		// echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
		// header( "refresh:3;url=../../riservato/ordine.php" );
		// return;
	// }
	
	
	$prezzo_tot_bev = 0.00;
	$prezzo_tot_stuzz = 0;
	//Creo un nuovo ordine e lo collego al cliente.
	$data = date("y-m-d");
	//Creo l'ordine
	$query = "INSERT INTO `ordine`(`id_ordine`, `data_ordine`, `prezzo_b`, `prezzo_s`, `prezzo_pp`) VALUES (NULL, '$data', '0', '0', '0')";
	//$conn = new connessione();
	$res = mysqli_query($conn->getConn(), $query);
	if($res == false ){
		echo "Problema durante la creazione nuovo ordine";
		echo mysqli_error($conn->getConn());
		echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
		echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
		header( "refresh:3;url=../../riservato/ordine.php" );
		return;
	}
	//Estraggo l'ultimo ordine inserito per collegarlo al cliente e a tutto il resto
	$id_ordine = -1;
	$query = "select MAX(ordine.id_ordine) from ordine";
	//$conn = new connessione();
	$res = mysqli_query($conn->getConn(), $query);
	if($res == false ){
		echo "Problema durante la creazione nuovo ordine";
		echo mysqli_error($conn->getConn());
		echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
		echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
		header( "refresh:3;url=../../riservato/ordine.php" );
		return;
	}
	else {
		$x = mysqli_fetch_row($res);
		$id_ordine = $x[0];
	}
	//Lo collego al cliente
	$email = $_SESSION['Email'];
	$query = "INSERT INTO `compone`(`email`, `id_ordine`) VALUES ('$email', '$id_ordine')";
//	$conn = new connessione();
	$res = mysqli_query($conn->getConn(), $query);
	if($res == false ){
		echo "Problema durante l'inserimento in compone!";
		echo mysqli_error($conn->getConn());
		echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
		echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
		header( "refresh:3;url=../../riservato/ordine.php" );
		return;
	}
	$messaggio.="Riepilogo bevande:\n";
	//Inserisco le bevande
	if($_POST['nome_bevanda1']!=0){
		$nome = $_POST['nome_bevanda1'];
		$quantita = $_POST['bevanda1'];
		$messaggio.= "N� " . $quantita . " di " . $nome . "\n";
		$query = "INSERT INTO `contiene_b`(`id_ordine`, `id_bevande`, `quantita`) VALUES ('$id_ordine', '$nome', '$quantita');";
		//$conn = new connessione();
		$res = mysqli_query($conn->getConn(), $query);
		if($res == false ){
			echo "Problema durante l'inserimento in compone!";
			echo mysqli_error($conn->getConn());
			echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
			echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
			header( "refresh:3;url=../../riservato/ordine.php" );
			return;
		}
		//Recupero il prezzo, lo moltiplico per la quantit� e aggiorno la variabile prezzo_tot_bev in ordine.
		$query = "select * from bevande where bevande.id_bevande=$nome;";
		$res = mysqli_query($conn->getConn(), $query);
		if($res == false ){
			echo "Problema durante estrazione prezzo bevanda 1";
			echo mysqli_error($conn->getConn());
			echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
			echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
			header( "refresh:3;url=../../riservato/ordine.php" );
			return;
		}
		else {
			$x = mysqli_fetch_row($res);
			$prezzo_tot_bev += (floatVal($x[2]))*$quantita;
		}	
	}
	
	if($_POST['nome_bevanda2']!=0){
		$nome = $_POST['nome_bevanda2'];
		$quantita = $_POST['bevanda2'];
		$messaggio.= "N� " . $quantita . " di " . $nome . "\n";
		$query = "INSERT INTO `contiene_b`(`id_ordine`, `id_bevande`, `quantita`) VALUES ('$id_ordine', '$nome', '$quantita');";
		//$conn = new connessione();
		$res = mysqli_query($conn->getConn(), $query);
		if($res == false ){
			echo "Problema durante l'inserimento in compone!";
			echo mysqli_error($conn->getConn());
			echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
			echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
			header( "refresh:3;url=../../riservato/ordine.php" );
			return;
		}
		//Recupero il prezzo, lo moltiplico per la quantit� e aggiorno la variabile prezzo_tot_bev in ordine.
		$query = "select * from bevande where bevande.id_bevande=$nome;";
		$res = mysqli_query($conn->getConn(), $query);
		if($res == false ){
			echo "Problema durante estrazione prezzo bevanda 2";
			echo mysqli_error($conn->getConn());
			echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
			echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
			header( "refresh:3;url=../../riservato/ordine.php" );
			return;
		}
		else {
			$x = mysqli_fetch_row($res);
			$prezzo_tot_bev += (floatVal($x[2]))*$quantita;
		}
	}
	if($_POST['nome_bevanda3']!=0){
		$nome = $_POST['nome_bevanda3'];
		$quantita = $_POST['bevanda3'];
		$messaggio.= "N� " . $quantita . " di " . $nome ."\n";
		$query = "INSERT INTO `contiene_b`(`id_ordine`, `id_bevande`, `quantita`) VALUES ('$id_ordine', '$nome', '$quantita');";
		//$conn = new connessione();
		$res = mysqli_query($conn->getConn(), $query);
		if($res == false ){
			echo "Problema durante l'inserimento in compone!";
			echo mysqli_error($conn->getConn());
			echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
			echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
			header( "refresh:3;url=../../riservato/ordine.php" );
			return;
		}
		//Recupero il prezzo, lo moltiplico per la quantit� e aggiorno la variabile prezzo_tot_bev in ordine.
		$query = "select * from bevande where bevande.id_bevande=$nome;";
		$res = mysqli_query($conn->getConn(), $query);
		if($res == false ){
			echo "Problema durante estrazione prezzo bevanda 3";
			echo mysqli_error($conn->getConn());
			echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
			echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
			header( "refresh:3;url=../../riservato/ordine.php" );
			return;
		}
		else {
			$x = mysqli_fetch_row($res);
			$prezzo_tot_bev += (floatVal($x[2]))*$quantita;
		}
	}
	//Query update prezzo Bevande

	$query = "UPDATE `ordine` SET `prezzo_b`=$prezzo_tot_bev where ordine.id_ordine = $id_ordine";
	//$conn = new connessione();
	$res = mysqli_query($conn->getConn(), $query);
	if($res == false ){
		echo "Problema durante update prezzo bevande!";
		echo mysqli_error($conn->getConn());
		echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
		echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
		header( "refresh:3;url=../../riservato/ordine.php" );
		return;
	}



	$messaggio.="\nRiepilogo stuzzichini: \n";
	//Inserisco gli stuzzichini
	if($_POST['nome_stuzzichino1']!=0){
		$nome = $_POST['nome_stuzzichino1'];
		$quantita = $_POST['stuzzichino1'];
		$messaggio.= "N� " . $quantita . " di " . $nome . "\n";
		$query = "INSERT INTO `contiene_s`(`id_ordine`, `id_stuzzichini`, `quantita`) VALUES ('$id_ordine', '$nome', '$quantita');";
		//$conn = new connessione();
		$res = mysqli_query($conn->getConn(), $query);
		if($res == false ){
			echo mysqli_error($conn->getConn());
			echo "Problema durante l'inserimento in compone!";
			echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
			echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
			header( "refresh:3;url=../../riservato/ordine.php" );
			return;
		}
		//Recupero il prezzo, lo moltiplico per la quantit� e aggiorno la variabile prezzo_tot_bev in ordine.
		$query = "select * from stuzzichini where stuzzichini.id_stuzzichini=$nome;";
		$res = mysqli_query($conn->getConn(), $query);
		if($res == false ){
			echo "Problema durante estrazione prezzo stuzzichino 1";
			echo mysqli_error($conn->getConn());
			echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
			echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
			header( "refresh:3;url=../../riservato/ordine.php" );
			return;
		}
		else {
			$x = mysqli_fetch_row($res);
			$prezzo_tot_stuzz += (floatVal($x[2]))*$quantita;
		}	
	}
	if($_POST['nome_stuzzichino2']!=0){
		$nome = $_POST['nome_stuzzichino2'];
		$quantita = $_POST['stuzzichino2'];
		$messaggio.= "N� " . $quantita . " di " . $nome ."\n";
		$query = "INSERT INTO `contiene_s`(`id_ordine`, `id_stuzzichini`, `quantita`) VALUES ('$id_ordine', '$nome', '$quantita');";
		//$conn = new connessione();
		$res = mysqli_query($conn->getConn(), $query);
		if($res == false ){
			echo "Problema durante l'inserimento in compone!";
			echo mysqli_error($conn->getConn());
			echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
			echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
			header( "refresh:3;url=../../riservato/ordine.php" );
			return;
		}
		//Recupero il prezzo, lo moltiplico per la quantit� e aggiorno la variabile prezzo_tot_bev in ordine.
		$query = "select * from stuzzichini where stuzzichini.id_stuzzichini=$nome;";
		$res = mysqli_query($conn->getConn(), $query);
		if($res == false ){
			echo "Problema durante estrazione prezzo stuzzichino 2";
			echo mysqli_error($conn->getConn());
			echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
			echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
			header( "refresh:3;url=../../riservato/ordine.php" );
			return;
		}
		else {
			$x = mysqli_fetch_row($res);
			$prezzo_tot_stuzz += (floatVal($x[2]))*$quantita;
		}
	}
	if($_POST['nome_stuzzichino3']!=0){
		$nome = $_POST['nome_stuzzichino3'];
		$quantita = $_POST['stuzzichino3'];
		$messaggio.= "N� " . $quantita . " di " . $nome ."\n";
		$query = "INSERT INTO `contiene_s`(`id_ordine`, `id_stuzzichini`, `quantita`) VALUES ('$id_ordine', '$nome', '$quantita');";
		//$conn = new connessione();
		$res = mysqli_query($conn->getConn(), $query);
		if($res == false ){
			echo "Problema durante l'inserimento in compone!";
			echo mysqli_error($conn->getConn());
			echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
			echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
			header( "refresh:3;url=../../riservato/ordine.php" );
			return;
		}
		//Recupero il prezzo, lo moltiplico per la quantit� e aggiorno la variabile prezzo_tot_bev in ordine.
		$query = "select * from stuzzichini where stuzzichini.id_stuzzichini=$nome;";
		$res = mysqli_query($conn->getConn(), $query);
		if($res == false ){
			echo "Problema durante estrazione prezzo stuzzichino 3";
			echo mysqli_error($conn->getConn());
			echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
			echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
			header( "refresh:3;url=../../riservato/ordine.php" );
			return;
		}
		else {
			$x = mysqli_fetch_row($res);
			$prezzo_tot_stuzz += (floatVal($x[2]))*$quantita;
		}
	}
	
	//AggioRNO PREZZO STUZZICHINI IN ORDINE
	$query = "UPDATE `ordine` SET `prezzo_s`=$prezzo_tot_stuzz where ordine.id_ordine = $id_ordine";
	//$conn = new connessione();
	$res = mysqli_query($conn->getConn(), $query);
	if($res == false ){
		echo "Problema durante update prezzo bevande!";
		echo mysqli_error($conn->getConn());
		echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
		echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
		header( "refresh:3;url=../../riservato/ordine.php" );
		return;
	}
	
	
	//Inserisco le pizze
	//Prima creo il nuovo ordine_p
	//Per prima faccio inserimento tra ordine_p e pizze_pizzoli tramite la relazione ha.
	//Dopo inserisco gli eventuali ingredienti aggiunti/ sottratti
	// e alla fine li collego all'ordinee
	
	
	$prezzo_pizza1=0;
	
	$messaggio.="\nRiepilogo pizze:\n";
	if($_POST['nome_pizza1']!=0){
		//Nuovo ordine_p
		$maxi = $_POST['tipopizza1'];
		$query = "INSERT INTO `ordine_p`(`id_ordine_p`, `maxi`) VALUES(NULL,'$maxi')";
		//$conn = new connessione();
		$res = mysqli_query($conn->getConn(), $query);
		if($res == false ){
			echo "Problema durante la creazione nuovo ordine_p!";
			echo mysqli_error($conn->getConn());
			echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
			echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
			header( "refresh:3;url=../../riservato/ordine.php" );
			return;
		}
		//Prendo l'id del nuovo ordine p per poterlo collegare con il resto.
		$id_ordine_p = -1;
		$query = "select MAX(ordine_p.id_ordine_p) from ordine_p";
	//	$conn = new connessione();
		$res = mysqli_query($conn->getConn(), $query);
		if($res == false ){
			echo "Problema durante estrazione dell'ultimo ordine p";
			echo mysqli_error($conn->getConn());
			echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
			echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
			header( "refresh:3;url=../../riservato/ordine.php" );
			return;
		}
		else {//prendo ultimo id ordine p
			$x = mysqli_fetch_row($res);
			$id_ordine_p = $x[0];
		}
		//Adesso lo collego con la vera pizza tramite la relazione HA
		$nome = $_POST['nome_pizza1'];
		$quantita = $_POST['pizza1q'];
		$messaggio.= "N� " . $quantita . " di " . $nome . " a cui sono stati aggiunti ";
		$query = "INSERT INTO `ha`(`id_ordine_p`, `id_pizze_pizzoli`) values ('$id_ordine_p', '$nome');";
		//$conn = new connessione();
		$res = mysqli_query($conn->getConn(), $query);
		if($res == false ){
			echo "Problema durante inserimento nella relazione HA";
			echo mysqli_error($conn->getConn());
			echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
			echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
			header( "refresh:3;url=../../riservato/ordine.php" );
			return;
		}
		//Trovo il prezzo base della pizza e lo salvo nella variabile apposita
		$nome = $_POST['nome_pizza1'];
		$query = "select * from pizze_pizzoli where pizze_pizzoli.id_pizze_pizzoli=$nome;";
		//$conn = new connessione();
		$res = mysqli_query($conn->getConn(), $query);
		if($res == false ){
			echo "Problema durante aggiornamento prezzo pizza";
			echo mysqli_error($conn->getConn());
			echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
			echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
			header( "refresh:3;url=../../riservato/ordine.php" );
			return;
		}
		else {
			$x = mysqli_fetch_row($res);
			if($maxi==1)
				$prezzo_pizza1=$x[3];
			else $prezzo_pizza1=$x[2];
		}
		//se vi sono ingredienti da aggiungere, li aggiungo.
		if($_POST['nome_ingrediente1'] != 0){
			$ingr = $_POST['nome_ingrediente1'];
			$query = "INSERT INTO `farcisce`(`id_ordine_p`, `id_ingredienti`, `aggiunte`) VALUES  ('$id_ordine_p', '$ingr', '1');";
			$messaggio.= $ingr . ", ";
			//$conn = new connessione();
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema durante inserimento farcisce ingrediente 1";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			//Aggiorno il prezzo della pizza con l'aggiunta dell'ingrediente
			$query = "select * from ingredienti where ingredienti.id_ingredienti=$ingr;";
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema durante estrazione prezzo ingrediente 1";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			else {
				$x = mysqli_fetch_row($res);
				if($maxi==1)
					$prezzo_pizza1+=$x[2]*2;
				else $prezzo_pizza1+=$x[2];
			}	
		}
		//AGGIUNTA INGREDIENTE NUMERO 2
		if($_POST['nome_ingrediente2'] != 0){
			$ingr = $_POST['nome_ingrediente2'];
			$query = "INSERT INTO `farcisce`(`id_ordine_p`, `id_ingredienti`, `aggiunte`) VALUES  ('$id_ordine_p', '$ingr', '1');";
			$messaggio.= $ingr . ", ";
			//$conn = new connessione();
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema durante inserimento farcisce ingrediente 2";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			//Aggiorno il prezzo della pizza con l'aggiunta dell'ingrediente
			$query = "select * from ingredienti where ingredienti.id_ingredienti=$ingr;";
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema d durante estrazione prezzo ingrediente";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			else {
				$x = mysqli_fetch_row($res);
				if($maxi==1)
					$prezzo_pizza1+=$x[2]*2;
				else $prezzo_pizza1+=$x[2];
			}	
		}
		//AGGIUNTA INGREDIENTE NUMERO 3
		if($_POST['nome_ingrediente3'] != 0){
			$ingr = $_POST['nome_ingrediente3'];
			$query = "INSERT INTO `farcisce`(`id_ordine_p`, `id_ingredienti`, `aggiunte`) VALUES  ('$id_ordine_p', '$ingr', '1');";
			$messaggio.= $ingr . ", ";
			//$conn = new connessione();
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema durante inserimento farcisce ingrediente 3";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			//Aggiorno il prezzo della pizza con l'aggiunta dell'ingrediente
			$query = "select * from ingredienti where ingredienti.id_ingredienti=$ingr;";
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema durante estrazione prezzo ingrediente";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			else {
				$x = mysqli_fetch_row($res);
				if($maxi==1)
					$prezzo_pizza1+=$x[2]*2;
				else $prezzo_pizza1+=$x[2];
			}	
		}
		$messaggio.=" e sono stati tolti i seguinti ingredienti: ";
		//se vi sono ingredienti da togliere, li tolgo.
		//Sottraggo ingrediente numero 1
		if($_POST['nome_ingrediente4'] != 0){
			$ingr = $_POST['nome_ingrediente4'];
			$query = "INSERT INTO `farcisce`(`id_ordine_p`, `id_ingredienti`, `aggiunte`) VALUES  ('$id_ordine_p', '$ingr', '0');";
			$messaggio.= $ingr . ", ";
			//$conn = new connessione();
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema durante inserimento nella relazione farcisce ingrediente 4";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			//Aggiorno il prezzo della pizza con l'aggiunta dell'ingrediente
			$query = "select * from ingredienti where ingredienti.id_ingredienti=$ingr;";
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema durante estrazione del prezzo";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			else {
				$x = mysqli_fetch_row($res);
				if($maxi==1)
					$prezzo_pizza1-=$x[2]*2;
				else $prezzo_pizza1-=$x[2];
			}	
		}
		//SOTTRAGGO INGREDIENTE NUMERO 2
		if($_POST['nome_ingrediente5'] != 0){
			$ingr = $_POST['nome_ingrediente5'];
			$messaggio.= $ingr . ", ";
			$query = "INSERT INTO `farcisce`(`id_ordine_p`, `id_ingredienti`, `aggiunte`) VALUES  ('$id_ordine_p', '$ingr', '0');";
			//$conn = new connessione();
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema durante inserimento farcisce ingrediente 5";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			//Aggiorno il prezzo della pizza con l'aggiunta dell'ingrediente
			$query = "select * from ingredienti where ingredienti.id_ingredienti=$ingr;";
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema d durante estrazione prezzo ingrediente";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			else {
				$x = mysqli_fetch_row($res);
				if($maxi==1)
					$prezzo_pizza1-=$x[2]*2;
				else $prezzo_pizza1-=$x[2];
			}	
		}
		//SOTTRAGGO INGREDIENTE NUMERO 3
		if($_POST['nome_ingrediente6'] != 0){
			$ingr = $_POST['nome_ingrediente6'];
			$messaggio.= $ingr . ", ";
			$query = "INSERT INTO `farcisce`(`id_ordine_p`, `id_ingredienti`, `aggiunte`) VALUES  ('$id_ordine_p', '$ingr', '0');";
			//$conn = new connessione();
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema durante inserimento farcisce ingrediente 6";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			//Aggiorno il prezzo della pizza con l'aggiunta dell'ingrediente
			$query = "select * from ingredienti where ingredienti.id_ingredienti=$ingr;";
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema durante estrazione prezzo ingrediente";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			else {
				$x = mysqli_fetch_row($res);
				if($maxi==1)
					$prezzo_pizza1-=$x[2]*2;
				else $prezzo_pizza1-=$x[2];
			}	
		}
		
		//------------------AGGIUNGO ALLA RELAZIONE CONTIENE_P 
		$quantita = $_POST['pizza1q'];
		$query = "INSERT INTO `contiene_p`(`id_ordine`, `id_ordine_p`, `quantita`) VALUES ('$id_ordine', '$id_ordine_p', '$quantita');";
		//$conn = new connessione();
		$res = mysqli_query($conn->getConn(), $query);
		if($res == false ){
			echo "Problema durante l'inserimento in compone_p!";
			echo mysqli_error($conn->getConn());
			echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
			echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
			header( "refresh:3;url=../../riservato/ordine.php" );
			return;
		}
		$prezzo_pizza1=$prezzo_pizza1*$quantita;
	}
	
	
	
	
	//--------------------------INSERIMENTO PIZZA 2
		$prezzo_pizza2=0;
	
	
	if($_POST['nome_pizza2']!=0){
		//Nuovo ordine_p
		$maxi = $_POST['tipopizza2'];
		$query = "INSERT INTO `ordine_p`(`id_ordine_p`, `maxi`) VALUES(NULL,'$maxi')";
		//$conn = new connessione();
		$res = mysqli_query($conn->getConn(), $query);
		if($res == false ){
			echo "Problema durante la creazione nuovo ordine_p pizza 2!";
			echo mysqli_error($conn->getConn());
			echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
			echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
			header( "refresh:3;url=../../riservato/ordine.php" );
			return;
		}
		//Prendo l'id del nuovo ordine p per poterlo collegare con il resto.
		$id_ordine_p = -1;
		$query = "select MAX(ordine_p.id_ordine_p) from ordine_p";
	//	$conn = new connessione();
		$res = mysqli_query($conn->getConn(), $query);
		if($res == false ){
			echo "Problema durante estrazione dell'ultimo ordine p";
			echo mysqli_error($conn->getConn());
			echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
			echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
			header( "refresh:3;url=../../riservato/ordine.php" );
			return;
		}
		else {//prendo ultimo id ordine p
			$x = mysqli_fetch_row($res);
			$id_ordine_p = $x[0];
		}
		//Adesso lo collego con la vera pizza tramite la relazione HA
		$nome = $_POST['nome_pizza2'];
		$quantita = $_POST['pizza2q'];
		$messaggio.= "\nN� " . $quantita . " di " . $nome ." a cui sono stati aggiunti ";
		$query = "INSERT INTO `ha`(`id_ordine_p`, `id_pizze_pizzoli`) values ('$id_ordine_p', '$nome');";
		//$conn = new connessione();
		$res = mysqli_query($conn->getConn(), $query);
		if($res == false ){
			echo "Problema durante inserimento nella relazione HA pizza 2";
			echo mysqli_error($conn->getConn());
			echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
			echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
			header( "refresh:3;url=../../riservato/ordine.php" );
			return;
		}
		//Trovo il prezzo base della pizza e lo salvo nella variabile apposita
		$nome = $_POST['nome_pizza2'];
		$query = "select * from pizze_pizzoli where pizze_pizzoli.id_pizze_pizzoli=$nome;";
		//$conn = new connessione();
		$res = mysqli_query($conn->getConn(), $query);
		if($res == false ){
			echo "Problema durante aggiornamento prezzo pizza 2";
			echo mysqli_error($conn->getConn());
			echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
			echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
			header( "refresh:3;url=../../riservato/ordine.php" );
			return;
		}
		else {
			$x = mysqli_fetch_row($res);
			if($maxi==1)
				$prezzo_pizza2=$x[3];
			else $prezzo_pizza2=$x[2];
		}
		//se vi sono ingredienti da aggiungere, li aggiungo.
		if($_POST['nome_ingrediente7'] != 0){
			$ingr = $_POST['nome_ingrediente7'];
			$messaggio.= $ingr . ", ";
			$query = "INSERT INTO `farcisce`(`id_ordine_p`, `id_ingredienti`, `aggiunte`) VALUES  ('$id_ordine_p', '$ingr', '1');";
			//$conn = new connessione();
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema durante inserimento farcisce ingrediente 7";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			//Aggiorno il prezzo della pizza con l'aggiunta dell'ingrediente
			$query = "select * from ingredienti where ingredienti.id_ingredienti=$ingr;";
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema durante estrazione prezzo ingrediente 8";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			else {
				$x = mysqli_fetch_row($res);
				if($maxi==1)
					$prezzo_pizza2+=$x[2]*2;
				else $prezzo_pizza2+=$x[2];
			}	
		}
		//AGGIUNTA INGREDIENTE NUMERO 2
		if($_POST['nome_ingrediente8'] != 0){
			$ingr = $_POST['nome_ingrediente8'];
			$messaggio.= $ingr . ", ";
			$query = "INSERT INTO `farcisce`(`id_ordine_p`, `id_ingredienti`, `aggiunte`) VALUES  ('$id_ordine_p', '$ingr', '1');";
			//$conn = new connessione();
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema durante inserimento farcisce ingrediente 8";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			//Aggiorno il prezzo della pizza con l'aggiunta dell'ingrediente
			$query = "select * from ingredienti where ingredienti.id_ingredienti=$ingr;";
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema d durante estrazione prezzo ingrediente";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			else {
				$x = mysqli_fetch_row($res);
				if($maxi==1)
					$prezzo_pizza2+=$x[2]*2;
				else $prezzo_pizza2+=$x[2];
			}	
		}
		//AGGIUNTA INGREDIENTE NUMERO 3
		if($_POST['nome_ingrediente9'] != 0){
			$ingr = $_POST['nome_ingrediente9'];
			$messaggio.= $ingr . ", ";
			$query = "INSERT INTO `farcisce`(`id_ordine_p`, `id_ingredienti`, `aggiunte`) VALUES  ('$id_ordine_p', '$ingr', '1');";
			//$conn = new connessione();
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema durante inserimento farcisce ingrediente 9";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			//Aggiorno il prezzo della pizza con l'aggiunta dell'ingrediente
			$query = "select * from ingredienti where ingredienti.id_ingredienti=$ingr;";
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema durante estrazione prezzo ingrediente";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			else {
				$x = mysqli_fetch_row($res);
				if($maxi==1)
					$prezzo_pizza2+=$x[2]*2;
				else $prezzo_pizza2+=$x[2];
			}	
		}
		$messaggio.=" e sono stati tolti i seguinti ingredienti: ";
		//se vi sono ingredienti da togliere, li tolgo.
		//Sottraggo ingrediente numero 1
		if($_POST['nome_ingrediente10'] != 0){
			$ingr = $_POST['nome_ingrediente10'];
			$messaggio.= $ingr . ", ";
			$query = "INSERT INTO `farcisce`(`id_ordine_p`, `id_ingredienti`, `aggiunte`) VALUES  ('$id_ordine_p', '$ingr', '0');";
			//$conn = new connessione();
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema durante inserimento nella relazione farcisce ingrediente 10";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			//Aggiorno il prezzo della pizza con l'aggiunta dell'ingrediente
			$query = "select * from ingredienti where ingredienti.id_ingredienti=$ingr;";
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema durante estrazione del prezzo";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			else {
				$x = mysqli_fetch_row($res);
				if($maxi==1)
					$prezzo_pizza2-=$x[2]*2;
				else $prezzo_pizza2-=$x[2];
			}	
		}
		//SOTTRAGGO INGREDIENTE NUMERO 2
		if($_POST['nome_ingrediente11'] != 0){
			$ingr = $_POST['nome_ingrediente11'];
			$messaggio.= $ingr . ", ";
			$query = "INSERT INTO `farcisce`(`id_ordine_p`, `id_ingredienti`, `aggiunte`) VALUES  ('$id_ordine_p', '$ingr', '0');";
			//$conn = new connessione();
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema durante inserimento farcisce ingrediente 11";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			//Aggiorno il prezzo della pizza con l'aggiunta dell'ingrediente
			$query = "select * from ingredienti where ingredienti.id_ingredienti=$ingr;";
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema d durante estrazione prezzo ingrediente";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			else {
				$x = mysqli_fetch_row($res);
				if($maxi==1)
					$prezzo_pizza2-=$x[2]*2;
				else $prezzo_pizza2-=$x[2];
			}	
		}
		//SOTTRAGGO INGREDIENTE NUMERO 3
		if($_POST['nome_ingrediente12'] != 0){
			$ingr = $_POST['nome_ingrediente12'];
			$messaggio.= $ingr . ", ";
			$query = "INSERT INTO `farcisce`(`id_ordine_p`, `id_ingredienti`, `aggiunte`) VALUES  ('$id_ordine_p', '$ingr', '0');";
			//$conn = new connessione();
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema durante inserimento farcisce ingrediente 12";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			//Aggiorno il prezzo della pizza con l'aggiunta dell'ingrediente
			$query = "select * from ingredienti where ingredienti.id_ingredienti=$ingr;";
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema durante estrazione prezzo ingrediente";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			else {
				$x = mysqli_fetch_row($res);
				if($maxi==1)
					$prezzo_pizza2-=$x[2]*2;
				else $prezzo_pizza2-=$x[2];
			}	
		}
		
		//------------------AGGIUNGO ALLA RELAZIONE CONTIENE_P 
		$quantita = $_POST['pizza2q'];
		$query = "INSERT INTO `contiene_p`(`id_ordine`, `id_ordine_p`, `quantita`) VALUES ('$id_ordine', '$id_ordine_p', '$quantita');";
		//$conn = new connessione();
		$res = mysqli_query($conn->getConn(), $query);
		if($res == false ){
			echo "Problema durante l'inserimento in compone_p!";
			echo mysqli_error($conn->getConn());
			echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
			echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
			header( "refresh:3;url=../../riservato/ordine.php" );
			return;
		}
		$prezzo_pizza2=$prezzo_pizza2*$quantita;
		
	}
	
	
	//--------------------------INSERIMENTO PIZZA 3
		$prezzo_pizza3=0;
	
	
	if($_POST['nome_pizza3']!=0){
		//Nuovo ordine_p
		$maxi = $_POST['tipopizza3'];
		$query = "INSERT INTO `ordine_p`(`id_ordine_p`, `maxi`) VALUES(NULL,'$maxi')";
		//$conn = new connessione();
		$res = mysqli_query($conn->getConn(), $query);
		if($res == false ){
			echo "Problema durante la creazione nuovo ordine_p pizza 3!";
			echo mysqli_error($conn->getConn());
			echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
			echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
			header( "refresh:3;url=../../riservato/ordine.php" );
			return;
		}
		//Prendo l'id del nuovo ordine p per poterlo collegare con il resto.
		$id_ordine_p = -1;
		$query = "select MAX(ordine_p.id_ordine_p) from ordine_p";
	//	$conn = new connessione();
		$res = mysqli_query($conn->getConn(), $query);
		if($res == false ){
			echo "Problema durante estrazione dell'ultimo ordine p";
			echo mysqli_error($conn->getConn());
			echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
			echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
			header( "refresh:3;url=../../riservato/ordine.php" );
			return;
		}
		else {//prendo ultimo id ordine p
			$x = mysqli_fetch_row($res);
			$id_ordine_p = $x[0];
		}
		//Adesso lo collego con la vera pizza tramite la relazione HA
		$nome = $_POST['nome_pizza3'];
		$quantita = $_POST['pizza3q'];
		$messaggio.= "N� " . $quantita . " di " . $nome . " a cui sono stati aggiunti ";
		$query = "INSERT INTO `ha`(`id_ordine_p`, `id_pizze_pizzoli`) values ('$id_ordine_p', '$nome');";
		//$conn = new connessione();
		$res = mysqli_query($conn->getConn(), $query);
		if($res == false ){
			echo "Problema durante inserimento nella relazione HA pizza 3";
			echo mysqli_error($conn->getConn());
			echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
			echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
			header( "refresh:3;url=../../riservato/ordine.php" );
			return;
		}
		//Trovo il prezzo base della pizza e lo salvo nella variabile apposita
		$nome = $_POST['nome_pizza3'];
		$query = "select * from pizze_pizzoli where pizze_pizzoli.id_pizze_pizzoli=$nome;";
		//$conn = new connessione();
		$res = mysqli_query($conn->getConn(), $query);
		if($res == false ){
			echo "Problema durante aggiornamento prezzo pizza 3";
			echo mysqli_error($conn->getConn());
			echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
			echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
			header( "refresh:3;url=../../riservato/ordine.php" );
			return;
		}
		else {
			$x = mysqli_fetch_row($res);
			if($maxi==1)
				$prezzo_pizza3=$x[3];
			else $prezzo_pizza3=$x[2];
		}
		//se vi sono ingredienti da aggiungere, li aggiungo.
		if($_POST['nome_ingrediente13'] != 0){
			$ingr = $_POST['nome_ingrediente13'];
			$messaggio.= $ingr . ", ";
			$query = "INSERT INTO `farcisce`(`id_ordine_p`, `id_ingredienti`, `aggiunte`) VALUES  ('$id_ordine_p', '$ingr', '1');";
			//$conn = new connessione();
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema durante inserimento farcisce ingrediente 13";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			//Aggiorno il prezzo della pizza con l'aggiunta dell'ingrediente
			$query = "select * from ingredienti where ingredienti.id_ingredienti=$ingr;";
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema durante estrazione prezzo ingrediente 13";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			else {
				$x = mysqli_fetch_row($res);
				if($maxi==1)
					$prezzo_pizza3+=$x[2]*2;
				else $prezzo_pizza3+=$x[2];
			}	
		}
		//AGGIUNTA INGREDIENTE NUMERO 2
		if($_POST['nome_ingrediente14'] != 0){
			$ingr = $_POST['nome_ingrediente14'];
			$messaggio.= $ingr . ", ";
			$query = "INSERT INTO `farcisce`(`id_ordine_p`, `id_ingredienti`, `aggiunte`) VALUES  ('$id_ordine_p', '$ingr', '1');";
			//$conn = new connessione();
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema durante inserimento farcisce ingrediente 14";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			//Aggiorno il prezzo della pizza con l'aggiunta dell'ingrediente
			$query = "select * from ingredienti where ingredienti.id_ingredienti=$ingr;";
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema d durante estrazione prezzo ingrediente";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			else {
				$x = mysqli_fetch_row($res);
				if($maxi==1)
					$prezzo_pizza3+=$x[2]*2;
				else $prezzo_pizza3+=$x[2];
			}	
		}
		//AGGIUNTA INGREDIENTE NUMERO 3
		if($_POST['nome_ingrediente15'] != 0){
			$ingr = $_POST['nome_ingrediente15'];
			$messaggio.= $ingr . ", ";
			$query = "INSERT INTO `farcisce`(`id_ordine_p`, `id_ingredienti`, `aggiunte`) VALUES  ('$id_ordine_p', '$ingr', '1');";
			//$conn = new connessione();
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema durante inserimento farcisce ingrediente 15";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			//Aggiorno il prezzo della pizza con l'aggiunta dell'ingrediente
			$query = "select * from ingredienti where ingredienti.id_ingredienti=$ingr;";
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema durante estrazione prezzo ingrediente";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			else {
				$x = mysqli_fetch_row($res);
				if($maxi==1)
					$prezzo_pizza3+=$x[2]*2;
				else $prezzo_pizza3+=$x[2];
			}	
		}
		$messaggio.=" e sono stati tolti i seguinti ingredienti: ";
		//se vi sono ingredienti da togliere, li tolgo.
		//Sottraggo ingrediente numero 1
		if($_POST['nome_ingrediente16'] != 0){
			$ingr = $_POST['nome_ingrediente16'];
			$messaggio.= $ingr . ", ";
			$query = "INSERT INTO `farcisce`(`id_ordine_p`, `id_ingredienti`, `aggiunte`) VALUES  ('$id_ordine_p', '$ingr', '0');";
			//$conn = new connessione();
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema durante inserimento nella relazione farcisce ingrediente 16";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			//Aggiorno il prezzo della pizza con l'aggiunta dell'ingrediente
			$query = "select * from ingredienti where ingredienti.id_ingredienti=$ingr;";
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema durante estrazione del prezzo";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			else {
				$x = mysqli_fetch_row($res);
				if($maxi==1)
					$prezzo_pizza3-=$x[2]*2;
				else $prezzo_pizza3-=$x[2];
			}	
		}
		//SOTTRAGGO INGREDIENTE NUMERO 2
		if($_POST['nome_ingrediente17'] != 0){
			$ingr = $_POST['nome_ingrediente17'];
			$messaggio.= $ingr . ", ";
			$query = "INSERT INTO `farcisce`(`id_ordine_p`, `id_ingredienti`, `aggiunte`) VALUES  ('$id_ordine_p', '$ingr', '0');";
			//$conn = new connessione();
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema durante inserimento farcisce ingrediente 17";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			//Aggiorno il prezzo della pizza con l'aggiunta dell'ingrediente
			$query = "select * from ingredienti where ingredienti.id_ingredienti=$ingr;";
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema d durante estrazione prezzo ingrediente";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			else {
				$x = mysqli_fetch_row($res);
				if($maxi==1)
					$prezzo_pizza3-=$x[2]*2;
				else $prezzo_pizza3-=$x[2];
			}	
		}
		//SOTTRAGGO INGREDIENTE NUMERO 3
		if($_POST['nome_ingrediente18'] != 0){
			$ingr = $_POST['nome_ingrediente18'];
			$messaggio.= $ingr . ", ";
			$query = "INSERT INTO `farcisce`(`id_ordine_p`, `id_ingredienti`, `aggiunte`) VALUES  ('$id_ordine_p', '$ingr', '0');";
			//$conn = new connessione();
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema durante inserimento farcisce ingrediente 18";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			//Aggiorno il prezzo della pizza con l'aggiunta dell'ingrediente
			$query = "select * from ingredienti where ingredienti.id_ingredienti=$ingr;";
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema durante estrazione prezzo ingrediente";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			else {
				$x = mysqli_fetch_row($res);
				if($maxi==1)
					$prezzo_pizza3-=$x[2]*2;
				else $prezzo_pizza3-=$x[2];
			}	
		}
		
		//------------------AGGIUNGO ALLA RELAZIONE CONTIENE_P 
		$quantita = $_POST['pizza3q'];
		$query = "INSERT INTO `contiene_p`(`id_ordine`, `id_ordine_p`, `quantita`) VALUES ('$id_ordine', '$id_ordine_p', '$quantita');";
		//$conn = new connessione();
		$res = mysqli_query($conn->getConn(), $query);
		if($res == false ){
			echo "Problema durante l'inserimento in compone_p!";
			echo mysqli_error($conn->getConn());
			echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
			echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
			header( "refresh:3;url=../../riservato/ordine.php" );
			return;
		}
		$prezzo_pizza3=$prezzo_pizza3*$quantita;
		
	}
	
	//--------------------------INSERIMENTO PIZZA 4
		$prezzo_pizza4=0;
	
	
	if($_POST['nome_pizza4']!=0){
		//Nuovo ordine_p
		$maxi = $_POST['tipopizza4'];
		$query = "INSERT INTO `ordine_p`(`id_ordine_p`, `maxi`) VALUES(NULL,'$maxi')";
		//$conn = new connessione();
		$res = mysqli_query($conn->getConn(), $query);
		if($res == false ){
			echo "Problema durante la creazione nuovo ordine_p pizza 4!";
			echo mysqli_error($conn->getConn());
			echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
			echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
			header( "refresh:3;url=../../riservato/ordine.php" );
			return;
		}
		//Prendo l'id del nuovo ordine p per poterlo collegare con il resto.
		$id_ordine_p = -1;
		$query = "select MAX(ordine_p.id_ordine_p) from ordine_p";
	//	$conn = new connessione();
		$res = mysqli_query($conn->getConn(), $query);
		if($res == false ){
			echo "Problema durante estrazione dell'ultimo ordine p";
			echo mysqli_error($conn->getConn());
			echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
			echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
			header( "refresh:3;url=../../riservato/ordine.php" );
			return;
		}
		else {//prendo ultimo id ordine p
			$x = mysqli_fetch_row($res);
			$id_ordine_p = $x[0];
		}
		//Adesso lo collego con la vera pizza tramite la relazione HA
		$nome = $_POST['nome_pizza4'];
		$quantita = $_POST['pizza4q'];
		$messaggio.= "N� " . $quantita . " di " . $nome . " a cui sono stati aggiunti ";
		$query = "INSERT INTO `ha`(`id_ordine_p`, `id_pizze_pizzoli`) values ('$id_ordine_p', '$nome');";
		//$conn = new connessione();
		$res = mysqli_query($conn->getConn(), $query);
		if($res == false ){
			echo "Problema durante inserimento nella relazione HA pizza 4";
			echo mysqli_error($conn->getConn());
			echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
			echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
			header( "refresh:3;url=../../riservato/ordine.php" );
			return;
		}
		//Trovo il prezzo base della pizza e lo salvo nella variabile apposita
		$nome = $_POST['nome_pizza4'];
		$query = "select * from pizze_pizzoli where pizze_pizzoli.id_pizze_pizzoli=$nome;";
		//$conn = new connessione();
		$res = mysqli_query($conn->getConn(), $query);
		if($res == false ){
			echo "Problema durante aggiornamento prezzo pizza 4";
			echo mysqli_error($conn->getConn());
			echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
			echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
			header( "refresh:3;url=../../riservato/ordine.php" );
			return;
		}
		else {
			$x = mysqli_fetch_row($res);
			if($maxi==1)
				$prezzo_pizza4=$x[3];
			else $prezzo_pizza4=$x[2];
		}
		//se vi sono ingredienti da aggiungere, li aggiungo.
		if($_POST['nome_ingrediente19'] != 0){
			$ingr = $_POST['nome_ingrediente19'];
			$messaggio.= $ingr . ", ";
			$query = "INSERT INTO `farcisce`(`id_ordine_p`, `id_ingredienti`, `aggiunte`) VALUES  ('$id_ordine_p', '$ingr', '1');";
			//$conn = new connessione();
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema durante inserimento farcisce ingrediente 19";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			//Aggiorno il prezzo della pizza con l'aggiunta dell'ingrediente
			$query = "select * from ingredienti where ingredienti.id_ingredienti=$ingr;";
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema durante estrazione prezzo ingrediente 19";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			else {
				$x = mysqli_fetch_row($res);
				if($maxi==1)
					$prezzo_pizza4+=$x[2]*2;
				else $prezzo_pizza4+=$x[2];
			}	
		}
		//AGGIUNTA INGREDIENTE NUMERO 2
		if($_POST['nome_ingrediente20'] != 0){
			$ingr = $_POST['nome_ingrediente20'];
			$messaggio.= $ingr . ", ";
			$query = "INSERT INTO `farcisce`(`id_ordine_p`, `id_ingredienti`, `aggiunte`) VALUES  ('$id_ordine_p', '$ingr', '1');";
			//$conn = new connessione();
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema durante inserimento farcisce ingrediente 20";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			//Aggiorno il prezzo della pizza con l'aggiunta dell'ingrediente
			$query = "select * from ingredienti where ingredienti.id_ingredienti=$ingr;";
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema d durante estrazione prezzo ingrediente 20";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			else {
				$x = mysqli_fetch_row($res);
				if($maxi==1)
					$prezzo_pizza4+=$x[2]*2;
				else $prezzo_pizza4+=$x[2];
			}	
		}
		//AGGIUNTA INGREDIENTE NUMERO 3
		if($_POST['nome_ingrediente21'] != 0){
			$ingr = $_POST['nome_ingrediente21'];
			$messaggio.= $ingr . ", ";
			$query = "INSERT INTO `farcisce`(`id_ordine_p`, `id_ingredienti`, `aggiunte`) VALUES  ('$id_ordine_p', '$ingr', '1');";
			//$conn = new connessione();
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema durante inserimento farcisce ingrediente 21";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			//Aggiorno il prezzo della pizza con l'aggiunta dell'ingrediente
			$query = "select * from ingredienti where ingredienti.id_ingredienti=$ingr;";
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema durante estrazione prezzo ingrediente 21";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			else {
				$x = mysqli_fetch_row($res);
				if($maxi==1)
					$prezzo_pizza4+=$x[2]*2;
				else $prezzo_pizza4+=$x[2];
			}	
		}
		$messaggio.=" e sono stati tolti i seguinti ingredienti: ";
		//se vi sono ingredienti da togliere, li tolgo.
		//Sottraggo ingrediente numero 1
		if($_POST['nome_ingrediente22'] != 0){
			$ingr = $_POST['nome_ingrediente22'];
			$messaggio.= $ingr . ", ";
			$query = "INSERT INTO `farcisce`(`id_ordine_p`, `id_ingredienti`, `aggiunte`) VALUES  ('$id_ordine_p', '$ingr', '0');";
			//$conn = new connessione();
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema durante inserimento nella relazione farcisce ingrediente 22";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			//Aggiorno il prezzo della pizza con l'aggiunta dell'ingrediente
			$query = "select * from ingredienti where ingredienti.id_ingredienti=$ingr;";
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema durante estrazione del prezzo ingrediente 22";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			else {
				$x = mysqli_fetch_row($res);
				if($maxi==1)
					$prezzo_pizza4-=$x[2]*2;
				else $prezzo_pizza4-=$x[2];
			}	
		}
		//SOTTRAGGO INGREDIENTE NUMERO 2
		if($_POST['nome_ingrediente23'] != 0){
			$ingr = $_POST['nome_ingrediente23'];
			$messaggio.= $ingr . ", ";
			$query = "INSERT INTO `farcisce`(`id_ordine_p`, `id_ingredienti`, `aggiunte`) VALUES  ('$id_ordine_p', '$ingr', '0');";
			//$conn = new connessione();
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema durante inserimento farcisce ingrediente 23";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			//Aggiorno il prezzo della pizza con l'aggiunta dell'ingrediente
			$query = "select * from ingredienti where ingredienti.id_ingredienti=$ingr;";
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema d durante estrazione prezzo ingrediente 23";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			else {
				$x = mysqli_fetch_row($res);
				if($maxi==1)
					$prezzo_pizza4-=$x[2]*2;
				else $prezzo_pizza4-=$x[2];
			}	
		}
		//SOTTRAGGO INGREDIENTE NUMERO 3
		if($_POST['nome_ingrediente24'] != 0){
			$ingr = $_POST['nome_ingrediente24'];
			$messaggio.= $ingr . ", ";
			$query = "INSERT INTO `farcisce`(`id_ordine_p`, `id_ingredienti`, `aggiunte`) VALUES  ('$id_ordine_p', '$ingr', '0');";
			//$conn = new connessione();
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema durante inserimento farcisce ingrediente 24";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			//Aggiorno il prezzo della pizza con l'aggiunta dell'ingrediente
			$query = "select * from ingredienti where ingredienti.id_ingredienti=$ingr;";
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema durante estrazione prezzo ingrediente 24";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			else {
				$x = mysqli_fetch_row($res);
				if($maxi==1)
					$prezzo_pizza4-=$x[2]*2;
				else $prezzo_pizza4-=$x[2];
			}	
		}
		
		//------------------AGGIUNGO ALLA RELAZIONE CONTIENE_P 
		$quantita = $_POST['pizza4q'];
		$query = "INSERT INTO `contiene_p`(`id_ordine`, `id_ordine_p`, `quantita`) VALUES ('$id_ordine', '$id_ordine_p', '$quantita');";
		//$conn = new connessione();
		$res = mysqli_query($conn->getConn(), $query);
		if($res == false ){
			echo "Problema durante l'inserimento in compone_p!";
			echo mysqli_error($conn->getConn());
			echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
			echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
			header( "refresh:3;url=../../riservato/ordine.php" );
			return;
		}
		$prezzo_pizza4=$prezzo_pizza4*$quantita;
		
	}
	
		//--------------------------INSERIMENTO PIZZA 5
		$prezzo_pizza5=0;
	
	
	if($_POST['nome_pizza5']!=0){
		//Nuovo ordine_p
		$maxi = $_POST['tipopizza5'];
		$query = "INSERT INTO `ordine_p`(`id_ordine_p`, `maxi`) VALUES(NULL,'$maxi')";
		//$conn = new connessione();
		$res = mysqli_query($conn->getConn(), $query);
		if($res == false ){
			echo "Problema durante la creazione nuovo ordine_p pizza 5!";
			echo mysqli_error($conn->getConn());
			echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
			echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
			header( "refresh:3;url=../../riservato/ordine.php" );
			return;
		}
		//Prendo l'id del nuovo ordine p per poterlo collegare con il resto.
		$id_ordine_p = -1;
		$query = "select MAX(ordine_p.id_ordine_p) from ordine_p";
	//	$conn = new connessione();
		$res = mysqli_query($conn->getConn(), $query);
		if($res == false ){
			echo "Problema durante estrazione dell'ultimo ordine p 5";
			echo mysqli_error($conn->getConn());
			echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
			echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
			header( "refresh:3;url=../../riservato/ordine.php" );
			return;
		}
		else {//prendo ultimo id ordine p
			$x = mysqli_fetch_row($res);
			$id_ordine_p = $x[0];
		}
		//Adesso lo collego con la vera pizza tramite la relazione HA
		$nome = $_POST['nome_pizza5'];
		$quantita = $_POST['pizza2q'];
		$messaggio.= "N� " . $quantita . " di " . $nome . " a cui sono stati aggiunti ";
		$query = "INSERT INTO `ha`(`id_ordine_p`, `id_pizze_pizzoli`) values ('$id_ordine_p', '$nome');";
		//$conn = new connessione();
		$res = mysqli_query($conn->getConn(), $query);
		if($res == false ){
			echo "Problema durante inserimento nella relazione HA pizza 5";
			echo mysqli_error($conn->getConn());
			echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
			echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
			header( "refresh:3;url=../../riservato/ordine.php" );
			return;
		}
		//Trovo il prezzo base della pizza e lo salvo nella variabile apposita
		$nome = $_POST['nome_pizza5'];
		$query = "select * from pizze_pizzoli where pizze_pizzoli.id_pizze_pizzoli=$nome;";
		//$conn = new connessione();
		$res = mysqli_query($conn->getConn(), $query);
		if($res == false ){
			echo "Problema durante aggiornamento prezzo pizza 5";
			echo mysqli_error($conn->getConn());
			echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
			echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
			header( "refresh:3;url=../../riservato/ordine.php" );
			return;
		}
		else {
			$x = mysqli_fetch_row($res);
			if($maxi==1)
				$prezzo_pizza5=$x[3];
			else $prezzo_pizza5=$x[2];
		}
		//se vi sono ingredienti da aggiungere, li aggiungo.
		if($_POST['nome_ingrediente25'] != 0){
			$ingr = $_POST['nome_ingrediente25'];
			$messaggio.= $ingr . ", ";
			$query = "INSERT INTO `farcisce`(`id_ordine_p`, `id_ingredienti`, `aggiunte`) VALUES  ('$id_ordine_p', '$ingr', '1');";
			//$conn = new connessione();
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema durante inserimento farcisce ingrediente 25";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			//Aggiorno il prezzo della pizza con l'aggiunta dell'ingrediente
			$query = "select * from ingredienti where ingredienti.id_ingredienti=$ingr;";
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema durante estrazione prezzo ingrediente 25";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			else {
				$x = mysqli_fetch_row($res);
				if($maxi==1)
					$prezzo_pizza5+=$x[2]*2;
				else $prezzo_pizza5+=$x[2];
			}	
		}
		//AGGIUNTA INGREDIENTE NUMERO 2
		if($_POST['nome_ingrediente26'] != 0){
			$ingr = $_POST['nome_ingrediente26'];
			$messaggio.= $ingr . ", ";
			$query = "INSERT INTO `farcisce`(`id_ordine_p`, `id_ingredienti`, `aggiunte`) VALUES  ('$id_ordine_p', '$ingr', '1');";
			//$conn = new connessione();
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema durante inserimento farcisce ingrediente 26";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			//Aggiorno il prezzo della pizza con l'aggiunta dell'ingrediente
			$query = "select * from ingredienti where ingredienti.id_ingredienti=$ingr;";
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema d durante estrazione prezzo ingrediente 26";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			else {
				$x = mysqli_fetch_row($res);
				if($maxi==1)
					$prezzo_pizza5+=$x[2]*2;
				else $prezzo_pizza5+=$x[2];
			}	
		}
		//AGGIUNTA INGREDIENTE NUMERO 3
		if($_POST['nome_ingrediente27'] != 0){
			$ingr = $_POST['nome_ingrediente27'];
			$messaggio.= $ingr . ", ";
			$query = "INSERT INTO `farcisce`(`id_ordine_p`, `id_ingredienti`, `aggiunte`) VALUES  ('$id_ordine_p', '$ingr', '1');";
			//$conn = new connessione();
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema durante inserimento farcisce ingrediente 27";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			//Aggiorno il prezzo della pizza con l'aggiunta dell'ingrediente
			$query = "select * from ingredienti where ingredienti.id_ingredienti=$ingr;";
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema durante estrazione prezzo ingrediente 27";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			else {
				$x = mysqli_fetch_row($res);
				if($maxi==1)
					$prezzo_pizza5+=$x[2]*2;
				else $prezzo_pizza5+=$x[2];
			}	
		}
		$messaggio.=" e sono stati tolti i seguinti ingredienti: ";
		//se vi sono ingredienti da togliere, li tolgo.
		//Sottraggo ingrediente numero 1
		if($_POST['nome_ingrediente28'] != 0){
			$ingr = $_POST['nome_ingrediente28'];
			$messaggio.= $ingr . ", ";
			$query = "INSERT INTO `farcisce`(`id_ordine_p`, `id_ingredienti`, `aggiunte`) VALUES  ('$id_ordine_p', '$ingr', '0');";
			//$conn = new connessione();
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema durante inserimento nella relazione farcisce ingrediente 28";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			//Aggiorno il prezzo della pizza con l'aggiunta dell'ingrediente
			$query = "select * from ingredienti where ingredienti.id_ingredienti=$ingr;";
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema durante estrazione del prezzo ingrediente 28";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			else {
				$x = mysqli_fetch_row($res);
				if($maxi==1)
					$prezzo_pizza5-=$x[2]*2;
				else $prezzo_pizza5-=$x[2];
			}	
		}
		//SOTTRAGGO INGREDIENTE NUMERO 2
		if($_POST['nome_ingrediente23'] != 0){
			$ingr = $_POST['nome_ingrediente29'];
			$messaggio.= $ingr . ", ";
			$query = "INSERT INTO `farcisce`(`id_ordine_p`, `id_ingredienti`, `aggiunte`) VALUES  ('$id_ordine_p', '$ingr', '0');";
			//$conn = new connessione();
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema durante inserimento farcisce ingrediente 29";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			//Aggiorno il prezzo della pizza con l'aggiunta dell'ingrediente
			$query = "select * from ingredienti where ingredienti.id_ingredienti=$ingr;";
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema d durante estrazione prezzo ingrediente 29";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			else {
				$x = mysqli_fetch_row($res);
				if($maxi==1)
					$prezzo_pizza5-=$x[2]*2;
				else $prezzo_pizza5-=$x[2];
			}	
		}
		//SOTTRAGGO INGREDIENTE NUMERO 3
		if($_POST['nome_ingrediente30'] != 0){
			$ingr = $_POST['nome_ingrediente30'];
			$messaggio.= $ingr . ", ";
			$query = "INSERT INTO `farcisce`(`id_ordine_p`, `id_ingredienti`, `aggiunte`) VALUES  ('$id_ordine_p', '$ingr', '0');";
			//$conn = new connessione();
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema durante inserimento farcisce ingrediente 30";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			//Aggiorno il prezzo della pizza con l'aggiunta dell'ingrediente
			$query = "select * from ingredienti where ingredienti.id_ingredienti=$ingr;";
			$res = mysqli_query($conn->getConn(), $query);
			if($res == false ){
				echo "Problema durante estrazione prezzo ingrediente 30";
				echo mysqli_error($conn->getConn());
				echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
				echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
				header( "refresh:3;url=../../riservato/ordine.php" );
				return;
			}
			else {
				$x = mysqli_fetch_row($res);
				if($maxi==1)
					$prezzo_pizza5-=$x[2]*2;
				else $prezzo_pizza5-=$x[2];
			}	
		}		
		//------------------AGGIUNGO ALLA RELAZIONE CONTIENE_P 
		$quantita = $_POST['pizza4q'];
		$query = "INSERT INTO `contiene_p`(`id_ordine`, `id_ordine_p`, `quantita`) VALUES ('$id_ordine', '$id_ordine_p', '$quantita');";
		//$conn = new connessione();
		$res = mysqli_query($conn->getConn(), $query);
		if($res == false ){
			echo "Problema durante l'inserimento in compone_p!";
			echo mysqli_error($conn->getConn());
			echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
			echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
			header( "refresh:3;url=../../riservato/ordine.php" );
			return;
		}
		$prezzo_pizza5=$prezzo_pizza5*$quantita;
	}
	
	
	$prezzo_totale_pizze = $prezzo_pizza1 + $prezzo_pizza2 + $prezzo_pizza3 + $prezzo_pizza4 + $prezzo_pizza5;
	$query = "UPDATE `ordine` SET `prezzo_pp`=$prezzo_totale_pizze	where ordine.id_ordine = $id_ordine";
		//$conn = new connessione();
		$res = mysqli_query($conn->getConn(), $query);
		if($res == false ){
			echo "Problema durante update prezzo pizza 1!";
			echo mysqli_error($conn->getConn());
			echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
			echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
			header( "refresh:3;url=../../riservato/ordine.php" );
			return;
		}
	
	//Invio email per riepilogo dati..!
	$messaggio.="Ricever� tutto quello da lei ordinato al suo indirizzo entro Natale..!\n";
	$messaggio.="Il totale da pagare all'arrivo del fattorino �: " . $prezzo_totale_pizze;
	$messaggio.="\nGrazie per aver scelto Francesco Anastasio Progetto Database. Buona cena!\n!";
	//Invio email non funzionante in locale.
	mail($email,"Utente registrato",$messaggio,"From: ProgettoDbAnastasioFrancesco");
	echo "Ordine inserito con successo. SONO FELICE<br/> Riceverai a breve una e-mail di riepilogo con il totale dell'ordine..";
	echo "<br/>Verrai reindirizzato a breve alla pagine precedente. Ricompila ordine facendo maggiore attenzione, grazie!<br/>";
	echo "<br/>Se il reindirizzamento non funziona a causa del tuo browser, <a href='../../riservato/ordine.php'>clicca qui</a>";
	header( "refresh:3;url=../../riservato/ordine.php" );
	return;
	
	
	
?>