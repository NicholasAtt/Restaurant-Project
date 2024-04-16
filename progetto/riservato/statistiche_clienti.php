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
					Progetto database Anastasio Francesco
				</h1>
				<h3> Statistiche frequenza clienti </h3>
			</div><br/><br/>
			<form method='post' action='<?php echo $_SERVER['PHP_SELF']; ?>' name='incassi'>
				<h4> Inserire l'intervallo di date </h4>
				Da <input type="date" name="data_da" size =" 20" required>
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				A <input type="date" name="data_a" size =" 20"  required>
				<br/><br/>
				<input type="submit" name="submit" value="Mostra statistiche"><br/><br/>
			</form>
			<?php
				if(isset($_POST['submit']) && $_POST['submit']==TRUE){	
					
					echo "Statistiche intervallo dal " . $_POST['data_da'] . " al " . $_POST['data_a'] . "<br/>Ordini effettuati dai clienti<br/><br/>";
					$conn = new connessione();
					$data_da ="'" . $_POST['data_da']. "'" ;
					$data_a = "'" . $_POST['data_a']. "'";
					
					//Prendo la somma dei vari prezzi di tutti gli ordini..
					$query = "select c.email, c.nome, c.cognome, c.indirizzo, count(comp.email) from cliente as c, compone as comp, ordine as o where o.id_ordine=comp.id_ordine ";
					$query .= "AND c.email = comp.email AND data_ordine between $data_da AND $data_a group by c.email, c.nome, c.cognome, c.indirizzo ORDER BY count(comp.email) desc;";

					$res = mysqli_query($conn->getConn(),$query);
					if($res == false){
						echo "Errore nella query:<br/><br/> " . mysqli_error($conn->getConn()) . "<br/><br/><a href='statistiche.php'>Torna indietro </a> e contatta l'amministratore!";
					}
					else {
						$out="<table style='width:80%;margin-left:10%;'>";
						$out.="<tr style='text-align:center;border:1px solid black;'>";
						$out.="<td style='width:20%'>Email</td>";
						$out.="<td style='width:20%'>Nome</td>";
						$out.="<td style='width:20%'>Cognome</td>";
						$out.="<td style='width:20%'>Indirizzo</td>";
						$out.="<td style='width:20%'>N° di acquisti</td>";
						$out.="</tr>";
						
						while($x = mysqli_fetch_row($res)){
							$out.="<tr style='text-align:center;'>";
							$out.="<td style='width:20%'>$x[0]</td>";
							$out.="<td style='width:20%'>$x[1]</td>";
							$out.="<td style='width:20%'>$x[2]</td>";
							$out.="<td style='width:20%'>$x[3]</td>";
							$out.="<td style='width:20%'>$x[4]</td>";
							$out.="</tr>";
						}
						$out.="</table>";
						echo $out;
					}
				}
			
			?>
			<br/><br/>
			<a href='statistiche.php'>Clicca qui</a> <br/>per tornare indietro
		</div>
	</body>

</html>