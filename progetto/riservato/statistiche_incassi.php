<html>
	<head>
		<title> Progetto</title>
		<link rel="stylesheet" type="text/css"  title="principale" href="../stile.css" />
	</head>
	<body id="body">
		<?php
			require("../php/connessione.php");
			controllaSessioneStatistiche();
		?>
		<div id="corpo" style="font-size:20px;">
			<div id="spazio"><br/><br/>
				<h1>
					Progetto
				</h1>
				<h3> Statistiche incassi </h3>
			</div><br/><br/>
			<form method='post' action='statistiche_incassi.php' name='incassi'>
				<h4> Inserire l'intervallo di date </h4>
				Da <input type="date" name="data_da" size =" 20" required>
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				A <input type="date" name="data_a" size =" 20"  required>
				<br/><br/>
				<input type="submit" name="submit" value="Mostra statistiche"><br/><br/>
			</form>
			<?php
				if(isset($_POST['submit']) && $_POST['submit']==TRUE){	
					
					echo "Statistiche intervallo dal " . $_POST['data_da'] . " al " . $_POST['data_a'] . "<br/>";
					$conn = new connessione();
					$data_da ="'" . $_POST['data_da']. "'" ;
					$data_a = "'" . $_POST['data_a']. "'";
					
					//Prendo la somma dei vari prezzi di tutti gli ordini..
					$query = "select sum(prezzo_b), sum(prezzo_s), sum(prezzo_pp) from ordine where data_ordine between $data_da AND $data_a ;";

					$res = mysqli_query($conn->getConn(),$query);
					if($res == false){
						echo "Errore nella query:<br/><br/> " . mysqli_error($conn->getConn()) . "<br/><br/><a href='statistiche.php'>Torna indietro </a> e contatta l'amministratore!";
					}
					else {
						$res = mysqli_fetch_row($res);
						$tot = $res[0] + $res[1] + $res[2];
						echo "<p> Incasso totale derivante dall'attivita' --> " . $tot . " €</p>"; 
						echo "<p> Incasso derivante dalla vendita di pizze e pizzoli --> " . $res[2] . " €</p>"; 
						echo "<p> Incasso derivante dalla vendita di bevande --> " . $res[0] . " €</p>"; 
						echo "<p> Incasso derivante dalla vendita di stuzzichini --> " . $res[1] . " €</p>"; 
					}
				}
			
			?>
			<br/><br/>
			<a href='statistiche.php'>Clicca qui</a> <br/>per tornare indietro
		</div>
	</body>

</html>