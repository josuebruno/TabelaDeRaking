<link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="js/bootstrap.min.js"></script>
<!--<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/js/jquery.min.js"></script>-->

<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Game</title>

 
  	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.6.3/css/all.css' integrity='sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/' crossorigin='anonymous'>

  	<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script> 
  	
  
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-dark p-3">
 <i class="fas fa-futbol fa-3x" style="color:C0C0C0"></i>
</nav>
	<nav class="">
	</nav>
	<br>
		<div class="container">
			<form action="grava.php" method="POST" name="dados" >
				<div class="row expand-lg p-3 bg-light">
					
						<select class="form-control col-sm-2" name="player1" id="player1">
				  		
				  			<option>Selecione</option>
				  			<option>sp</option>
				  			<option>fla</option>
				  			<option>cor</option>
				  			<option>san</option>
				  			<option>spo</option>
				  			<option>gre</option>
				  			<option>pal</option>
				  			<option>flu</option>
				  			<option>bra</option>
				  			
						</select>

						<span class="col-sm-2"></span>
						<input class="form-control form-control-sm-1 col-sm" type="text" name="placar1" id="player1" required name=player1 pattern="[0-9]+$">
						<span class="col-sm"></span>
						<h5>VS</h5>
						<span class="col-sm"></span>
						<input class="form-control form-control-sm-1 col-sm" type="text" name="placar2" id="player2" required name=player2 pattern="[0-9]+$">
						<span class="col-sm"></span>

						<select class="form-control col-sm-2" name="player2" id="player2">
				  		
				  			<option>Selecione</option>
				  			<option>sp</option>
				  			<option>fla</option>
				  			<option>cor</option>
				  			<option>san</option>
				  			<option>spo</option>
				  			<option>gre</option>
				  			<option>pal</option>
				  			<option>flu</option>
				  			<option>bra</option>
						</select>	
				</div>
				<div class="col-sm-12">
	      			<button type="submit" class="btn btn-success" style="margin-left: 50%" >Gravar</button>
	    		</div>
			</form>

			<!--tabela-->
			<table class="table table-bordered">
			  <thead>
			    <tr>
			      <th scope="col">Raking</th>
			      <th scope="col">Nome_Do_Time</th>
			      <th scope="col">Pontos</th>
			      
			    </tr>
			  </thead>
			  <tbody>

			    <?php 
 
# Substitua abaixo os dados, de acordo com o banco criado
$user = "root"; 
$password = ""; 
$database = "classificacao"; 
 
# O hostname deve ser sempre localhost 
$hostname = "127.0.0.1"; 
 
# Conecta com o servidor de banco de dados 
$teste = mysqli_connect( $hostname, $user, $password, $database ) or die( ' Erro na conexão ' ); 
 
# Seleciona o banco de dados 
mysqli_select_db($teste, $database ) or die( 'Erro na seleção do banco' );
 
# Executa a query desejada 
$query = "SELECT * FROM tabelajogos ORDER BY `tabelajogos`.`pontos` DESC"; 
$result_query = mysqli_query($teste, $query ) or die(' Erro na query:' . $query . ' ' . mysqli_error() ); 
 
# Exibe os registros na tela
$cont = 0;
while ($row = mysqli_fetch_array( $result_query ))
	{

			$conta[$cont] = $cont . " + " .$row['nometime'];

		$cont=$cont+1;
		echo"<tr><td>";
		echo $cont; 
		echo "</td><td>" . $row['nometime'] . "</td><td>" . $row['pontos']."</td></tr>"; 

	}

	#echo $conta[0];
 ?>
			  </tbody>
			</table>
		</div>
<!-- Footer -->
<footer class="page-footer font-small bg-dark text-light">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright: FutGame
    
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
</body>

<!-- Footer -->
</html>