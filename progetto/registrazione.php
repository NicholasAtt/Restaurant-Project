<html>
	<head>
		<title> Progetto </title>
		<link rel="stylesheet" type="text/css"  title="principale" href="stile.css" />
		<script>
			function checkDati(){
				var pass=document.iscrizione.password.value;
				var pass1=document.iscrizione.password1.value;
				
				if(pass!=pass1){
					alert("La password di conferma e' diversa da quella scelta, controllare!");
					document.iscrizione.password1.value = "";
					document.iscrizione.password1.focus();
					return false;
				}
				else{
					document.iscrizione.action = "php/iscrizione.php";
					document.iscrizione.submit();
				}
				
			}
		</script>
		
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
			<form method="post" action="php/iscrizione.php" name="iscrizione" id="iscrizione">
					<h2>
						Inserisci i tuoi dati. 
					</h2>
					<h4>
						NB: tutti i campi sono obbligatori!
					</h4>
					<table style="margin-left:33%; margin-right:30%; text-align:center;">
						<tr>
							<td>
								Inserisci indirizzo email
							</td>
							<td>
								Inserisci password
							</td>
						</tr>
						<tr>
							<td>
								<input type="email" name="email" size="25" required autocomplete=on>
							</td>
							<td>
								<input type="password" name="password" size="25" required autocomplete=on>
							</td>
						</tr>
						<tr>
						</tr>
						<tr>
							<td>
								Conferma password
							</td>
							<td>
								Nome
							</td>
						</tr>
						<tr>
							<td>
								<input type="password" name="password1" size="25" required autocomplete=on>
							</td>
							<td>
								<input type="text" name="nome" size="25" required autocomplete=on>
							</td>
						</tr>
						</tr>
						<tr>
						</tr>
						<tr>
							<td>
								Cognome
							</td>
							<td>
								Indirizzo
							</td>
						</tr>
						<tr>
							<td>
								<input type="text" name="cognome" size="25" required autocomplete=on>
							</td>
							<td>
								<input type="text" name="indirizzo" size="25" required autocomplete=on>
							</td>
						</tr>
					</table>
					<br/>
					Telefono<br>
						<input type="number" name="telefono" size="25" required autocomplete=on><br/><br/>		
						
					<input type="submit" name="submit" value="Iscriviti" onClick="checkDati()" >
					
					<br/><br/>
					<a href="index.php">Torna alla home page </a>
			</form>
		</div>
	</body>

</html>