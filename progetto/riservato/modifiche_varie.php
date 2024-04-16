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
		<div id="corpo" style="font-size:20px; width: 80%;">
			<div id="spazio"><br/><br/>
				<h1>
					Progetto
				</h1>
				<div style="width:50%; float:left;color:black;">
					<h4>Modifica ingredienti inseriti</h4>
					<?php
						$conn = new connessione();
						$query = "select * from ingredienti;";
						$res = mysqli_query($conn->getConn(), $query);
						if($res == false)
							echo "Problema grave: <br/> " . mysqli_error($conn->getConn()) . "<br/>";
						else {
							$output ="<form method='post' action='../php/statistiche/modifica_ingrediente.php' name='mod_ingredienti'>";
							$output .="<table style='margin-left:10%;'>";
								$output .= "<tr>";
									$output .= "<th colspan='2'>Attuale</th>";
									$output .= "<th colspan='2'>Nuovi</th>";
								$output .= "</tr>";
								$output .= "<tr style='text-align:center;'>";
									$output .= "<td>Nome</td>";
									$output .= "<td>Prezzo</td>";
									$output .= "<td>Nome</td>";
									$output .= "<td>Prezzo</td>";
								$output .= "</tr>";
								$x=0;
								while ($row=mysqli_fetch_row($res)){
									$output .= "<tr>";
										$output .= "<td>$row[1]</td>";
										$output .= "<td>$row[2]</td>";
										$nome = "nome" . $x;
										$prezzo = "prezzo" . $x;
										$x++;
										$output .= "<td><input type='text' size='15' name='$nome'/></td>";
										$output .= "<td><input type='text' size='15' name='$prezzo'/></td>";
									$output .= "</tr>";
								}
							$output .= "</table>";
							$output .= "<br/><br/><input type='submit' value='Modifica ingredienti'/>";
							$output .= "</form>";
							echo $output;
						}
					?>
				</div>
				<div style="width:50%; float:right;color:black;">
					<h4>Modifica bevande inserite</h4>
					<?php
						$conn = new connessione();
						$query = "select * from bevande;";
						$res = mysqli_query($conn->getConn(), $query);
						if($res == false)
							echo "Problema grave: <br/> " . mysqli_error($conn->getConn()) . "<br/>";
						else {
							$output ="<form method='post' action='../php/statistiche/modifica_bevande.php' name='mod_bevande'>";
							$output .="<table style='margin-left:10%;'>";
								$output .= "<tr>";
									$output .= "<th colspan='2'>Attuale</th>";
									$output .= "<th colspan='2'>Nuovi</th>";
								$output .= "</tr>";
								$output .= "<tr style='text-align:center;'>";
									$output .= "<td>Nome</td>";
									$output .= "<td>Prezzo</td>";
									$output .= "<td>Nome</td>";
									$output .= "<td>Prezzo</td>";
								$output .= "</tr>";
								$x=0;
								while ($row=mysqli_fetch_row($res)){
									$output .= "<tr>";
										$output .= "<td>$row[1]</td>";
										$output .= "<td>$row[2]</td>";
										$nome = "nome" . $x;
										$prezzo = "prezzo" . $x;
										$x++;
										$output .= "<td><input type='text' size='15' name='$nome'/></td>";
										$output .= "<td><input type='text' size='15' name='$prezzo'/></td>";
									$output .= "</tr>";
								}
							$output .= "</table>";
							$output .= "<br/><br/><input type='submit' value='Modifica bevande'/>";
							$output .= "</form>";
							echo $output;
						}
					?>
				</div>
			</div><br/><br/>
			<div style="width:60%; float:left;color:black;">
					<h4>Modifica pizze/pizzoli inseriti</h4>
					<?php
						$conn = new connessione();
						$query = "select * from pizze_pizzoli;";
						$res = mysqli_query($conn->getConn(), $query);
						if($res == false)
							echo "Problema grave: <br/> " . mysqli_error($conn->getConn()) . "<br/>";
						else {
							$output ="<form method='post' action='../php/statistiche/modifica_pizze.php' name='mod_pizze'>";
							$output .="<table style='margin-left:10%;'>";
								$output .= "<tr>";
									$output .= "<th colspan='3'>Attuale</th>";
									$output .= "<th colspan='3'>Nuovi</th>";
								$output .= "</tr>";
								$output .= "<tr style='text-align:center;'>";
									$output .= "<td>Nome</td>";
									$output .= "<td>Prezzo classic</td>";
									$output .= "<td>Prezzo maxi</td>";
									$output .= "<td>Nome</td>";
									$output .= "<td>Prezzo classic</td>";
									$output .= "<td>Prezzo maxi</td>";
								$output .= "</tr>";
								$x=0;
								while ($row=mysqli_fetch_row($res)){
									$output .= "<tr>";
										$output .= "<td>$row[1]</td>";
										$output .= "<td style='text-align:center;'>$row[2]</td>";
										$output .= "<td>$row[3]</td>";
										$nome = "nome" . $x;
										$prezzo = "prezzo" . $x;
										$prezzom = "prezzom" . $x;
										$x++;
										$output .= "<td><input type='text' size='15' name='$nome'/></td>";
										$output .= "<td><input type='text' size='15' name='$prezzo'/></td>";
										$output .= "<td><input type='text' size='15' name='$prezzom'/></td>";
									$output .= "</tr>";
								}
							$output .= "</table>";
							$output .= "<br/><br/><input type='submit' value='Modifica pizza_pizzolo'/>";
							$output .= "</form>";
							echo $output;
						}
					?>
				</div>
			<div style="width:40%; float:left;color:black;">
					<h4>Modifica stuzzichini inseriti</h4>
					<?php
						$conn = new connessione();
						$query = "select * from stuzzichini;";
						$res = mysqli_query($conn->getConn(), $query);
						if($res == false)
							echo "Problema grave: <br/> " . mysqli_error($conn->getConn()) . "<br/>";
						else {
							$output ="<form method='post' action='../php/statistiche/modifica_stuzzichini.php' name='mod_stuzzichini'>";
							$output .="<table style='margin-left:10%;'>";
								$output .= "<tr>";
									$output .= "<th colspan='2'>Attuale</th>";
									$output .= "<th colspan='2'>Nuovi</th>";
								$output .= "</tr>";
								$output .= "<tr style='text-align:center;'>";
									$output .= "<td>Nome</td>";
									$output .= "<td>Prezzo</td>";
									$output .= "<td>Nome</td>";
									$output .= "<td>Prezzo</td>";
								$output .= "</tr>";
								$x=0;
								while ($row=mysqli_fetch_row($res)){
									$output .= "<tr>";
										$output .= "<td>$row[1]</td>";
										$output .= "<td>$row[2]</td>";
										$nome = "nome" . $x;
										$prezzo = "prezzo" . $x;
										$x++;
										$output .= "<td><input type='text' size='15' name='$nome'/></td>";
										$output .= "<td><input type='text' size='15' name='$prezzo'/></td>";
									$output .= "</tr>";
								}
							$output .= "</table>";
							$output .= "<br/><br/><input type='submit' value='Modifica stuzzichini'/>";
							$output .= "</form>";
							echo $output;
						}
					?>
				</div>
				
			<div style="width:100%;float:left;">
				<br><a href="statistiche.php">Torna indietro </a>
			</div>
		</div>
	</body>

</html>