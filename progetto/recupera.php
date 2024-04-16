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
			<form method="post" action="php/recuperapassword.php">
					<h2>
						Recupera password
					</h2>
					Inserisci email<br>
						<input type="email" name="email" size="25" required ><br/><br/>
					
					<input type="submit" name="submit" value="Recupera">
					<br/>
					<h4>
						Ti verrà inviata una email con una nuova password generata casualmente!
					</h4>
					<h4>
						<a href="index.php">Clicca qui</a> per tornare alla home.
					</h4>
			</form>
		</div>
	</body>

</html>