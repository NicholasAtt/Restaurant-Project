<html>
	<head>
		<title> Progetto</title>
		<link rel="stylesheet" type="text/css"  title="principale" href="stile.css" />
	</head>
	<body id="body">
		<?php
			require("php/connessione.php");
			controllaSessione();
		?>
		<div id="corpo">
			<div id="spazio"><br/><br/>
				<h1>
					Progetto
				</h1>
			</div>
			<form method="post" action="php/login.php">
					<h2>
						Dati per il log in
					</h2>
					Inserisci email<br>
						<input type="email" name="email" size="25" required ><br/><br/>
					Inserisci password<br>
						<input type="password" name="password" size="25" required><br/><br/>
					<input type="submit" name="submit" value="Accedi">
					<br/>
					<h4>
						Sei un nuovo utente? <a href="registrazione.php"> Clicca qui per registrarti! </a>
					</h4>
					<h4>
						Hai dimenticato la password? <a href="recupera.php"> Clicca qui per recuperarla! </a>
					</h4>
			</form>
		</div>
	</body>

</html>