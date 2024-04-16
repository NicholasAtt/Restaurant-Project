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
		<div id="corpo">
			<div id="spazio"><br/><br/>
				<h1>
					Progetto

				</h1>
			</div>
				<form method="post" action="../php/statistiche/inserisci_stuzzichino.php" name="pizza">
						<h2>Inserimento nuovo stuzzichino</h2>
						<br/><br/>
						Nome: <br/><input type="text" size="20" name="nome" required>
						<br/><br/>Prezzo: <br/><input type="text" size="20" name="prezzo" required><br/><br/>
						<input type="submit" value="Inserisci stuzzichino"/>
				</form>
			<br/><br/>
			<br><a href="statistiche.php">Torna indietro </a>
				
		</div>
	</body>

</html>