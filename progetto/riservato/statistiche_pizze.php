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
				<h3> Statistiche pizze e pizzoli più venduti </h3>
			</div><br/><br/>
			<div style="width:100%">
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
						
						echo "Statistiche intervallo dal " . $_POST['data_da'] . " al " . $_POST['data_a'] . "<br/><br/><strong>Pizze vendute</strong>";
						$conn = new connessione();
						$data_da ="'" . $_POST['data_da']. "'" ;
						$data_a = "'" . $_POST['data_a']. "'";
						
						//Prendo la somma dei vari prezzi di tutti gli ordini..
						$query = "select p.nome, sum(cp.quantita) from pizze_pizzoli as p, ordine as o, contiene_p as cp, ordine_p as op, ha where ";
						$query .= "o.id_ordine = cp.id_ordine AND cp.id_ordine_p=op.id_ordine_p AND op.id_ordine_p= ha.id_ordine_p AND ha.id_pizze_pizzoli=p.id_pizze_pizzoli ";
						$query .= "and o.data_ordine between $data_da AND $data_a group by p.nome ORDER BY sum(cp.quantita) desc;";
						$res = mysqli_query($conn->getConn(),$query);
						if($res == false){
							echo "Errore nella query:<br/><br/> " . mysqli_error($conn->getConn()) . "<br/><br/><a href='statistiche.php'>Torna indietro </a> e contatta l'amministratore!";
						}
						else {	
								//tabella per pizze
								$out="<table style='width:30%;margin-left:35%;'>";
								$out.="<tr style='text-align:center;border:1px solid black;'>";
								$out.="<td style='width:50%'>Nome</td>";
								$out.="<td style='width:50%'>Quantita'</td>";
								$out.="</tr>";
								//Tabella per pizzoli
								$outp="<table style='width:30%;margin-left:35%;'>";
								$outp.="<tr style='text-align:center;border:1px solid black;'>";
								$outp.="<td style='width:50%'>Nome</td>";
								$outp.="<td style='width:50%'>Quantita'</td>";
								$outp.="</tr>";
								while($x = mysqli_fetch_row($res)){
									$nome = $x[0];
									if(stristr($x[0], 'P_')==false){
										$out.="<tr style='text-align:center;'>";
										$out.="<td style='width:50%'>$x[0]</td>";
										$out.="<td style='width:50%'>$x[1]</td>";
										$out.="</tr>";
									}
									else {
										$outp.="<tr style='text-align:center;'>";
										$outp.="<td style='width:50%'>$x[0]</td>";
										$outp.="<td style='width:50%'>$x[1]</td>";
										$outp.="</tr>";
									}
								}	
							$out.="</table>";
							$outp.="</table>";
							echo $out;
							echo "<br/><br/><strong>Pizzoli venduti</strong>";
							echo $outp;
							
						}
					}
				
				?>
				<br/><br/>
			</div>
			<div style="width=100%">
				<a href='statistiche.php'>Clicca qui</a> <br/>per tornare indietro
			</div>
		</div>
		
	</body>

</html>