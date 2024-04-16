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
				<h3> Area riservata al titolare </h3>
			</div><br/><br/>
			<h2>
				Modifiche - Inserimenti
			</h2>
				<a href="inserimento_pizze.php">Inserimento pizze</a><br/>
				<a href="inserimento_ingredienti.php">Inserimento ingredienti</a><br/>
				<a href="inserimento_bevande.php">Inserimento bevande</a><br/>
				<a href="inserimento_stuzzichini.php">Inserimento stuzzichini</a><br/>
				<a href="modifiche_varie.php">Modifiche voci esistenti</a><br/>
			<h2>
				Statistiche
			</h2>
				<a href="statistiche_incassi.php">Statistiche varie incassi</a><br/>
				<a href="statistiche_clienti.php">Statistiche sui clienti</a><br/>
				<a href="statistiche_pizze.php">Statistiche pizze/pizzoli</a><br/>
				<a href="statistiche_bevande.php">Statistiche bevande</a><br/>
				<a href="statistiche_stuzzichini.php">Statistiche stuzzichini</a><br/><br/>
			<a href="../php/logout.php">Clicca qui per log out </a>
		</div>
	</body>

</html>