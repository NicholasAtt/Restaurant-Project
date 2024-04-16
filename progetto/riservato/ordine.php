<html>
	<head>
		<title> Progetto</title>
		<link rel="stylesheet" type="text/css"  title="principale" href="../stile.css" />
		<script>
			function reload(){
				location.reload();
			}
			
			function changeIngr1(){
				var el = document.getElementById('ingr_pizza_1');
				var nome = document.ordine.nome_pizza1.value;
				if(nome == 0)
					el.innerHTML = "";
				else if (nome == 15)
					el.innerHTML = "Pom., Mozz.";
				else if (nome == 17)
					el.innerHTML = "Pom., Mozz., F. freschi, Cotto";
			}
			function changeIngr2(){
				var el = document.getElementById('ingr_pizza_2');
				var nome = document.ordine.nome_pizza2.value;
				if(nome == 0)
					el.innerHTML = "";
				else if (nome == 15)
					el.innerHTML = "Pom., Mozz.";
				else if (nome == 17)
					el.innerHTML = "Pom., Mozz., F. freschi, Cotto";
			}
			function changeIngr3(){
				var el = document.getElementById('ingr_pizza_3');
				var nome = document.ordine.nome_pizza3.value;
				if(nome == 0)
					el.innerHTML = "";
				else if (nome == 15)
					el.innerHTML = "Pom., Mozz.";
				else if (nome == 17)
					el.innerHTML = "Pom., Mozz., F. freschi, Cotto";
			}
			function changeIngr4(){
				var el = document.getElementById('ingr_pizza_4');
				var nome = document.ordine.nome_pizza4.value;
				if(nome == 0)
					el.innerHTML = "";
				else if (nome == 15)
					el.innerHTML = "Pom., Mozz.";
				else if (nome == 17)
					el.innerHTML = "Pom., Mozz., F. freschi, Cotto";
			}
			function changeIngr5(){
				var el = document.getElementById('ingr_pizza_5');
				var nome = document.ordine.nome_pizza5.value;
				if(nome == 0)
					el.innerHTML = "";
				else if (nome == 15)
					el.innerHTML = "Pom., Mozz.";
				else if (nome == 17)
					el.innerHTML = "Pom., Mozz., F. freschi, Cotto";
			}
		</script>
	</head>
	<body id="body">
		<?php
			require("../php/connessione.php");
			controllaSessioneOrdine();
		?>
		<div id="corpo" style="height:1200px">
			<div id="spazio"><br/><br/>
				<h1>
					Progetto database Anastasio Francesco
				</h1>
			</div>
			<form method="post" action='../php/processa_ordine.php' name="ordine">
				<h2> Inserisca il suo ordine sign. <?php echo $_SESSION['Nome']; ?> </h2>
					<table style="width:60%;margin-left:20%;text-align:center;">
						<tr>
							<td colspan="3">
								<h2><strong> Bevande </strong></h2>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<?php
									$conn = new connessione();
									//Prelevo tutte le bevande dal database
									$query = "select * from bevande order by nome;";
									$res = mysqli_query($conn->getConn(),$query);
									if($res==FALSE){
										echo "Errore imprevisto. Contattare l'amministratore del sistema<br/> " . mysqli_error($conn->getConn());
									}
									else {//allora stampo la checkbox con i dati che mi servono
										$out = "Seleziona bevanda: &nbsp&nbsp&nbsp&nbsp";
										$out1 = "Seleziona bevanda: &nbsp&nbsp&nbsp&nbsp";
										$out2 = "Seleziona bevanda: &nbsp&nbsp&nbsp&nbsp";
										$out .="<select name='nome_bevanda1' style='width:40%'>";
										$out1 .="<select name='nome_bevanda2' style='width:40%'>";
										$out2 .="<select name='nome_bevanda3' style='width:40%'>";
										$out .= "<option value='0' selected='selected' ></option>";
										$out1 .= "<option value='0' selected='selected' ></option>";
										$out2 .= "<option value='0' selected='selected' ></option>";
										while($x = mysqli_fetch_row($res)){
											$out .= "<option value='$x[0]'>$x[1] - $x[2] </option>";
											$out1 .= "<option value='$x[0]'>$x[1] - $x[2] </option>";
											$out2 .= "<option value='$x[0]'>$x[1] - $x[2] </option>";
										}
										$out .="</select>";
										$out1 .="</select>";
										$out2 .="</select>";
										echo $out;
										$_SESSION['outB1']=$out1;
										$_SESSION['outB2']=$out2;
									}
								?>
							</td>
							<td>
								Inserisci quantita' <input type="number" name="bevanda1" style="width:20%" min='1' />
							</td>
						</tr>
						<tr>
							<td colspan="2">
								
										<?php echo $_SESSION['outB1'];?>
								
							</td>
							<td>
								Inserisci quantita' <input type="number" name="bevanda2"  style="width:20%" min='1'/>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								
									<?php echo $_SESSION['outB2'];?>
								
							</td>
							<td>
								Inserisci quantita' <input type="number" name="bevanda3"  style="width:20%" min='1'/>
							</td>
						</tr>
						<tr>
						
						</tr>
						<tr>
							<td colspan="3">
								<h2><strong> Stuzzichini </strong></h2>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<?php
									$conn = new connessione();
									//Prelevo tutte le bevande dal database
									$query = "select * from stuzzichini order by nome;";
									$res = mysqli_query($conn->getConn(),$query);
									if($res==FALSE){
										echo "Errore imprevisto. Contattare l'amministratore del sistema<br/> " . mysqli_error($conn->getConn());
									}
									else {//allora stampo la checkbox con i dati che mi servono
										$out = "Seleziona stuzzichino: ";
										$out1 = "Seleziona stuzzichino: ";
										$out2 = "Seleziona stuzzichino: ";
										$out .="<select name='nome_stuzzichino1'  style='width:40%'>";
										$out1 .="<select name='nome_stuzzichino2'  style='width:40%'>";
										$out2 .="<select name='nome_stuzzichino3'  style='width:40%'>";
										$out .= "<option value='0' selected='selected'></option>";
										$out1 .= "<option value='0' selected='selected'></option>";
										$out2 .= "<option value='0' selected='selected'></option>";
										while($x = mysqli_fetch_row($res)){
											$out .= "<option value='$x[0]'>$x[1] - $x[2] </option>";
											$out1 .= "<option value='$x[0]'>$x[1] - $x[2] </option>";
											$out2 .= "<option value='$x[0]'>$x[1] - $x[2] </option>";
										}
										$out .="</select>";
										$out1 .="</select>";
										$out2 .="</select>";
										echo $out;
										$_SESSION['outS1']=$out1;
										$_SESSION['outS2']=$out2;
									}
								?>
							</td>
							<td>
								Inserisci quantita' <input type="number" name="stuzzichino1"  style="width:20%" min='1'/>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<?php echo $_SESSION['outS1'];?>
							</td>
							<td>
								Inserisci quantita' <input type="number" name="stuzzichino2"  style="width:20%" min='1'/>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<?php echo $_SESSION['outS2'];?>
							</td>
							<td>
								Inserisci quantita' <input type="number" name="stuzzichino3"  style="width:20%" min='1'/>
							</td>
						</tr>
					</table>					
					<h2>
						<strong> Pizze - Pizzoli </strong>
					</h2>			
						<?php
							$conn = new connessione();
							//Prelevo tutte le pizze/pizzoli dal database
							$query = "select * from pizze_pizzoli order by nome;";
							$res = mysqli_query($conn->getConn(),$query);
							if($res==FALSE){
								echo "Errore imprevisto. Contattare l'amministratore del sistema<br/> " . mysqli_error($conn->getConn());
							}
							else {//allora stampo la checkbox con i dati che mi servono
								//creo l'elenco delle pizze
								$pizze1 ="<select name='nome_pizza1' onChange='changeIngr1()'>";
								$pizze2 ="<select name='nome_pizza2' onChange='changeIngr2()'>";
								$pizze3 ="<select name='nome_pizza3' onChange='changeIngr3()'>";
								$pizze4 ="<select name='nome_pizza4' onChange='changeIngr4()'>";
								$pizze5 ="<select name='nome_pizza5' onChange='changeIngr5()'>";
								$pizze1 .= "<option value='0' selected='selected'></option>";
								$pizze2 .= "<option value='0' selected='selected'></option>";
								$pizze3 .= "<option value='0' selected='selected'></option>";
								$pizze4 .= "<option value='0' selected='selected'></option>";
								$pizze5 .= "<option value='0' selected='selected'></option>";
								while($x = mysqli_fetch_row($res)){
									$pizze1 .= "<option value='$x[0]'>$x[1] - $x[2] </option>";
									$pizze2 .= "<option value='$x[0]'>$x[1] - $x[2] </option>";
									$pizze3 .= "<option value='$x[0]'>$x[1] - $x[2] </option>";
									$pizze4 .= "<option value='$x[0]'>$x[1] - $x[2] </option>";
									$pizze5 .= "<option value='$x[0]'>$x[1] - $x[2] </option>";
								}
								$pizze1 .="</select>";
								$pizze2 .="</select>";
								$pizze3 .="</select>";
								$pizze4 .="</select>";
								$pizze5 .="</select>";
								//Creo lista ingredienti generica
								$query = "select * from ingredienti order by nome;";
								$res = mysqli_query($conn->getConn(),$query);
								if($res==FALSE){
									echo "Errore imprevisto. Contattare l'amministratore del sistema<br/> " . mysqli_error($conn->getConn());
								}
								else {
									$ingredienti1 = "<option value='0' selected='selected'></option>";
									
									while($x = mysqli_fetch_row($res)){
										$ingredienti1 .= "<option value='$x[0]'>$x[1] - $x[2] </option>";
									
									}
									$ingredienti1 .="</select>";
								}
								//Mostro il tutto in una tabella
								$out = "<table style='text-align:center;margin-left:7%;border-bottom:1px dashed black'>";	
								$out .="<tr>";
									$out .= "<td>Pizza N°</td>";
									$out .= "<td>Seleziona pizze o pizzoli</td>";
									$out .= "<td>Seleziona quantita'</td>";
									$out .= "<td>Classic o maxi</td>";
									$out .= "<td colspan='4'>Ingredienti da aggiungere - togliere</td>";
								$out .="</tr>";
								//Riga 1
								$out .="<tr >";//mostro l'elenco delle pizze!
									$out .="<td rowspan='2'>Pizza 1</td>";
									$out .="<td rowspan='2'> " . $pizze1 . "<br/><div id='ingr_pizza_1'></div></td>";
									$out .="<td rowspan='2'> <input type='number' name='pizza1q'  style='width:50%' min='1'/></td>";
									$out .="<td> Classic <br/><input type='radio' name='tipopizza1' value='0' checked></td>";
									$out .="<td> Aggiunte</td>";
									$out .="<td><select name='nome_ingrediente1'> " . $ingredienti1 . "</td>";
									$out .=" <td><select name='nome_ingrediente2'> " . $ingredienti1 . "</td>";
									$out .=" <td><select name='nome_ingrediente3'> " .  $ingredienti1 . "</td>";
								$out .="</tr>";
								$out .="<tr style=''>";
									$out .="<td> Maxi <br/><input type='radio' name='tipopizza1' value='1'></td>";
									$out .="<td> Da togliere</td>";
									$out .=" <td><select name='nome_ingrediente4'> " . $ingredienti1 . "</td>";
									$out .=" <td><select name='nome_ingrediente5'> " . $ingredienti1 . "</td>";
									$out .=" <td><select name='nome_ingrediente6'> " . $ingredienti1 . "</td>";
								$out .="</tr>";
								//Riga 2
								$out .="<tr>";//mostro l'elenco delle pizze!
									$out .="<td rowspan='2'>Pizza 2</td>";
									$out .="<td rowspan='2'> " . $pizze2 . "<div id='ingr_pizza_2'></div></td>";
									$out .="<td rowspan='2'> <input type='number' name='pizza2q'  style='width:50%' min='1'/></td>";
									$out .="<td> Classic <br/><input type='radio' name='tipopizza2' value='0' checked></td>";
									$out .="<td> Aggiunte</td>";
									$out .="<td><select name='nome_ingrediente7'> " . $ingredienti1 . "</td>";
									$out .=" <td><select name='nome_ingrediente8'> " . $ingredienti1 . "</td>";
									$out .=" <td><select name='nome_ingrediente9'> " .  $ingredienti1 . "</td>";
								$out .="</tr>";
								$out .="<tr>";
									$out .="<td> Maxi <br/><input type='radio' name='tipopizza2' value='1'></td>";
									$out .="<td> Da togliere</td>";
									$out .=" <td><select name='nome_ingrediente10'> " . $ingredienti1 . "</td>";
									$out .=" <td><select name='nome_ingrediente11'> " . $ingredienti1 . "</td>";
									$out .=" <td><select name='nome_ingrediente12'> " . $ingredienti1 . "</td>";
								$out .="</tr>";
								//Riga 3
								$out .="<tr>";//mostro l'elenco delle pizze!
									$out .="<td rowspan='2'>Pizza 3</td>";
									$out .="<td rowspan='2'> " . $pizze3 . "<div id='ingr_pizza_3'></div></td>";
									$out .="<td rowspan='2'> <input type='number' name='pizza3q'  style='width:50%' min='1'/></td>";
									$out .="<td> Classic <br/><input type='radio' name='tipopizza3' value='0' checked></td>";
									$out .="<td> Aggiunte</td>";
									$out .="<td><select name='nome_ingrediente13'> " . $ingredienti1 . "</td>";
									$out .=" <td><select name='nome_ingrediente14'> " . $ingredienti1 . "</td>";
									$out .=" <td><select name='nome_ingrediente15'> " .  $ingredienti1 . "</td>";
								$out .="</tr>";
								$out .="<tr>";
									$out .="<td> Maxi <br/><input type='radio' name='tipopizza3' value='1'></td>";
									$out .="<td> Da togliere</td>";
									$out .=" <td><select name='nome_ingrediente16'> " . $ingredienti1 . "</td>";
									$out .=" <td><select name='nome_ingrediente17'> " . $ingredienti1 . "</td>";
									$out .=" <td><select name='nome_ingrediente18'> " . $ingredienti1 . "</td>";
								$out .="</tr>";
								//Riga 4
								$out .="<tr>";//mostro l'elenco delle pizze!
									$out .="<td rowspan='2'>Pizza 4</td>";
									$out .="<td rowspan='2'> " . $pizze4 . "<div id='ingr_pizza_4'></div></td>";
									$out .="<td rowspan='2'> <input type='number' name='pizza4q'  style='width:50%' min='1'/></td>";
									$out .="<td> Classic <br/><input type='radio' name='tipopizza4' value='0' checked></td>";
									$out .="<td> Aggiunte</td>";
									$out .="<td><select name='nome_ingrediente19'> " . $ingredienti1 . "</td>";
									$out .=" <td><select name='nome_ingrediente20'> " . $ingredienti1 . "</td>";
									$out .=" <td><select name='nome_ingrediente21'> " .  $ingredienti1 . "</td>";
								$out .="</tr>";
								$out .="<tr>";
									$out .="<td> Maxi <br/><input type='radio' name='tipopizza4' value='1'></td>";
									$out .="<td> Da togliere</td>";
									$out .=" <td><select name='nome_ingrediente22'> " . $ingredienti1 . "</td>";
									$out .=" <td><select name='nome_ingrediente23'> " . $ingredienti1 . "</td>";
									$out .=" <td><select name='nome_ingrediente24'> " . $ingredienti1 . "</td>";
								$out .="</tr>";
								//Riga 5
								$out .="<tr>";//mostro l'elenco delle pizze!
									$out .="<td rowspan='2'>Pizza 5</td>";
									$out .="<td rowspan='2'> " . $pizze5 . "<div id='ingr_pizza_5'></div></td>";
									$out .="<td rowspan='2'> <input type='number' name='pizza5q'  style='width:50%' min='1'/></td>";
									$out .="<td> Classic <br/><input type='radio' name='tipopizza5' value='0' checked></td>";
									$out .="<td> Aggiunte</td>";
									$out .="<td><select name='nome_ingrediente25'> " . $ingredienti1 . "</td>";
									$out .=" <td><select name='nome_ingrediente26'> " . $ingredienti1 . "</td>";
									$out .=" <td><select name='nome_ingrediente27'> " .  $ingredienti1 . "</td>";
								$out .="</tr>";
								$out .="<tr>";
									$out .="<td> Maxi <br/><input type='radio' name='tipopizza5' value='1'></td>";
									$out .="<td> Da togliere</td>";
									$out .=" <td><select name='nome_ingrediente28'> " . $ingredienti1 . "</td>";
									$out .=" <td><select name='nome_ingrediente29'> " . $ingredienti1 . "</td>";
									$out .=" <td><select name='nome_ingrediente30'> " . $ingredienti1 . "</td>";
								$out .="</tr>";
								
								$out .= "</table>";
								echo $out;
								$_SESSION['outP']=$out;
							}
						?>
					<br/><br/><br/>
					<input type="submit" name="submit" value="Inserisci ordine"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					<input type="button" value="Resetta campi" onClick='reload()'>
			</form>
			<a href="../php/logout.php">Clicca qui per log out </a>
		</div>
	</body>

</html>