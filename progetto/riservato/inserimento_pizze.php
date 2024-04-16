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
					<br><a href="statistiche.php">Torna indietro </a>
				</h1>
			</div>
			<div style="width:50%; float:left">
				<form method="post" action="../php/statistiche/inserisci_pizza.php" name="pizza">
						Nuova pizza:<br/><br/>
						Inserisci il nome:<br/> <input type="text" size="20" name="pizza" required /> 
						<br/><br/> Inserisci il prezzo classic:<br/> <input type="text" size="20" name="prezzoc" required />
						<br/><br/> Inserisci il prezzo maxi:<br/> <input type="text" size="20" name="prezzom" required />
						<br/><br/>
						<h3>Inserisci gli ingredienti che compongono la pizza!</h3>
						<br/>Ingrediente 1: <?php
									$conn = new connessione();
									$query = "select * from ingredienti;";
									$res = mysqli_query($conn->getConn(), $query);
									$output = "<select name='ingrediente1'>" ;
									$output .= "<option value='0'> </option>";
									while ($row=mysqli_fetch_row($res)){
										$output .= "<option value='";
										$output .= "$row[0]'>$row[1]</option>";
									}
									$output .= "</select>";
									echo $output;
								?>
						<br/>
						<br/>Ingrediente 2: <?php
									$res = mysqli_query($conn->getConn(), $query);
									$output = "<select name='ingrediente2'>" ;
									$output .= "<option value='0'> </option>";
									while ($row=mysqli_fetch_row($res)){
										$output .= "<option value='";
										$output .= "$row[0]'>$row[1]</option>";
									}
									$output .= "</select>";
									echo $output;
								?>
						<br/>
						<br/>Ingrediente 3: <?php
									$res = mysqli_query($conn->getConn(), $query);
									$output = "<select name='ingrediente3'>" ;
									$output .= "<option value='0'> </option>";
									while ($row=mysqli_fetch_row($res)){
										$output .= "<option value='";
										$output .= "$row[0]'>$row[1]</option>";
									}
									$output .= "</select>";
									echo $output;
								?>
						<br/>
						<br/>Ingrediente 4: <?php
									$res = mysqli_query($conn->getConn(), $query);
									$output = "<select name='ingrediente4'>" ;
									$output .= "<option value='0'> </option>";
									while ($row=mysqli_fetch_row($res)){
										$output .= "<option value='";
										$output .= "$row[0]'>$row[1]</option>";
									}
									$output .= "</select>";
									echo $output;
								?>
						<br/>
						<br/>Ingrediente 5: <?php
									$res = mysqli_query($conn->getConn(), $query);
									$output = "<select name='ingrediente5'>" ;
									$output .= "<option value='0'> </option>";
									while ($row=mysqli_fetch_row($res)){
										$output .= "<option value='";
										$output .= "$row[0]'>$row[1]</option>";
									}
									$output .= "</select>";
									echo $output;
								?>
						<br/>
						<br/>Ingrediente 6: <?php
									$res = mysqli_query($conn->getConn(), $query);
									$output = "<select name='ingrediente6'>" ;
									$output .= "<option value='0'> </option>";
									while ($row=mysqli_fetch_row($res)){
										$output .= "<option value='";
										$output .= "$row[0]'>$row[1]</option>";
									}
									$output .= "</select>";
									echo $output;
						?>
						<br/><br/>
						<input type="submit" value="Inserisci pizza" />
				</form>
			</div>
			<div style="width:50%; float:right">
				<form method="post" action="../php/statistiche/inserisci_pizza.php" name="pizzolo">
						Nuovo pizzolo:<br/><br/>
						Inserisci il nome:<br/> <input type="text" size="20" name="pizzolo" required /> 
						<br/><br/> Inserisci il prezzo classic:<br/> <input type="text" size="20" name="prezzocp" required />
						<br/><br/> Inserisci il prezzo maxi:<br/> <input type="text" size="20" name="prezzomp" required />
						<h3>Inserisci gli ingredienti che compongono il pizzolo!</h3>
						<br/>Ingrediente 1: <?php
									$conn = new connessione();
									$query = "select * from ingredienti;";
									$res = mysqli_query($conn->getConn(), $query);
									$output = "<select name='ingrediente1p'>" ;
									$output .= "<option value='0'> </option>";
									while ($row=mysqli_fetch_row($res)){
										$output .= "<option value='";
										$output .= "$row[0]'>$row[1]</option>";
									}
									$output .= "</select>";
									echo $output;
								?>
						<br/>
						<br/>Ingrediente 2: <?php
									$res = mysqli_query($conn->getConn(), $query);
									$output = "<select name='ingrediente2p'>" ;
									$output .= "<option value='0'> </option>";
									while ($row=mysqli_fetch_row($res)){
										$output .= "<option value='";
										$output .= "$row[0]'>$row[1]</option>";
									}
									$output .= "</select>";
									echo $output;
								?>
						<br/>
						<br/>Ingrediente 3: <?php
									$res = mysqli_query($conn->getConn(), $query);
									$output = "<select name='ingrediente3p'>" ;
									$output .= "<option value='0'> </option>";
									while ($row=mysqli_fetch_row($res)){
										$output .= "<option value='";
										$output .= "$row[0]'>$row[1]</option>";
									}
									$output .= "</select>";
									echo $output;
								?>
						<br/>
						<br/>Ingrediente 4: <?php
									$res = mysqli_query($conn->getConn(), $query);
									$output = "<select name='ingrediente4p'>" ;
									$output .= "<option value='0'> </option>";
									while ($row=mysqli_fetch_row($res)){
										$output .= "<option value='";
										$output .= "$row[0]'>$row[1]</option>";
									}
									$output .= "</select>";
									echo $output;
								?>
						<br/>
						<br/>Ingrediente 5: <?php
									$res = mysqli_query($conn->getConn(), $query);
									$output = "<select name='ingrediente5p'>" ;
									$output .= "<option value='0'> </option>";
									while ($row=mysqli_fetch_row($res)){
										$output .= "<option value='";
										$output .= "$row[0]'>$row[1]</option>";
									}
									$output .= "</select>";
									echo $output;
								?>
						<br/>
						<br/>Ingrediente 6: <?php
									$res = mysqli_query($conn->getConn(), $query);
									$output = "<select name='ingrediente6p'>" ;
									$output .= "<option value='0'> </option>";
									while ($row=mysqli_fetch_row($res)){
										$output .= "<option value='";
										$output .= "$row[0]'>$row[1]</option>";
									}
									$output .= "</select>";
									echo $output;
						?>
						<br/><br/>
						<input type="submit" value="Inserisci pizzolo"/>
				</form>
			</div>
			<br/><br/><br/><br/>
			
				
		</div>
	</body>

</html>