<?php

$player1 = $_POST['player1'];
$player2 = $_POST['player2'];

$placar1 = $_POST['placar1'];
$placar2 = $_POST['placar2'];




if ($player1 == $player2) {
	
	
	header("Location: redirecterror1.php");
	exit('Fim do Comando');

}

if ($player1 == "Selecione" or $player2 == "Selecione") {
	
	
	header("Location: redirecterror2.php");
	exit('Fim do Comando');

}



#echo $player1."  =  ";
#echo $placar1;
#echo " VS ";
#echo $placar2;
#echo " ".$player2;


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
$query = "SELECT * FROM `tabelajogos` WHERE nometime = '$player1'"; 
$result_query = mysqli_query($teste, $query ) or die(' Erro na query:' . $query . ' ' . mysqli_error() ); 


$row = mysqli_fetch_array( $result_query );
	if (isset($row[1])) {
		#echo "string";
	}else{

		$sql = "INSERT INTO `tabelajogos` (`id`, `nometime`, `pontos`, `vitorias`, `derrotas`, `empates`, `reg_date`) VALUES (NULL, '$player1', '0', '0', '0', '0', current_timestamp());";

				if (mysqli_query($teste, $sql)) {
     				#echo "New record created successfully";
				} else {
      				#echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}


	}

$query2 = "SELECT * FROM `tabelajogos` WHERE nometime = '$player2'";
	$result_query2 = mysqli_query($teste, $query2 ) or die(' Erro na query:' . $query2 . ' ' . mysqli_error() );

	$row2 = mysqli_fetch_array( $result_query2 );
	if (isset($row2[1])) {
		#echo "string";
	}else{

		$sql1 = "INSERT INTO `tabelajogos` (`id`, `nometime`, `pontos`, `vitorias`, `derrotas`, `empates`, `reg_date`) VALUES (NULL, '$player2', '0', '0', '0', '0', current_timestamp());";

				if (mysqli_query($teste, $sql1)) {
     				#echo "New record created successfully";
				} else {
      				#echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}

		
	}	




$queryor = "SELECT * FROM tabelajogos ORDER BY `tabelajogos`.`pontos` DESC"; 
$result_queryor = mysqli_query($teste, $queryor ) or die(' Erro na query:' . $queryor . ' ' . mysqli_error() ); 
 
# Exibe os registros na tela
$cont = 0;
while ($row = mysqli_fetch_array( $result_queryor ))
	{

			$conta[$cont] = $row['nometime'];

		$cont=$cont+1; 
		

	}
$var = $player1;
$e = 0;
foreach ($conta as &$value) {
    #echo $value;
    $e = $e + 1; ;

    if ($var != $value)
     {
    	#echo "sim";
   	}else{

   		#echo $e;
   		$PosiPlayer1 = $e;
   	}

}

$queryor1 = "SELECT * FROM tabelajogos ORDER BY `tabelajogos`.`pontos` DESC"; 
$result_queryor1 = mysqli_query($teste, $queryor1 ) or die(' Erro na query:' . $queryor1 . ' ' . mysqli_error() ); 
 
# Exibe os registros na tela
$cont = 0;
while ($row = mysqli_fetch_array( $result_queryor1 ))
	{

			$conta[$cont] = $row['nometime'];

		$cont=$cont+1; 
		

	}
$var = $player2;
$e = 0;
foreach ($conta as &$value) {
    #echo $value;
    $e = $e + 1; ;

    if ($var != $value)
     {
    	#echo "sim";
   	}else{

   		
   		#echo $e;
   		$PosiPlayer2 = $e;
   	}

}


#echo $player1. " marcou: ". $placar1 . " VS " . $placar2 ." marcados pelo ". $player2." ";
#echo $player1 ." esta na posicao ".$PosiPlayer1 ." e o ". $player2." esta na posicao ". $PosiPlayer2;


# Conecta com o servidor de banco de dados 
$teste = mysqli_connect( $hostname, $user, $password, $database ) or die( ' Erro na conexão ' ); 
 
# Seleciona o banco de dados 
mysqli_select_db($teste, $database ) or die( 'Erro na seleção do banco' );
 
# Executa a query desejada 
$queryns = "SELECT * FROM `tabelajogos` WHERE nometime = '$player1'"; 
$result_queryns = mysqli_query($teste, $queryns ) or die(' Erro na query:' . $queryns . ' ' . mysqli_error() );

while ($row = mysqli_fetch_array( $result_queryns ))
	{

		$pontos1 = $row['pontos'];
		$vitorias1 = $row['vitorias'];
		$derrotas1 = $row['derrotas'];
		$empates1 = $row['empates'];
		$jogos = $vitorias1 + $derrotas1 + $empates1;

	}



$queryns1 = "SELECT * FROM `tabelajogos` WHERE nometime = '$player2'"; 
$result_queryns1 = mysqli_query($teste, $queryns1 ) or die(' Erro na query:' . $queryns1 . ' ' . mysqli_error() );


while ($row = mysqli_fetch_array( $result_queryns1 ))
	{

		$pontos2 = $row['pontos'];
		$vitorias2 = $row['vitorias'];
		$derrotas2 = $row['derrotas'];
		$empates2 = $row['empates'];
		$jogos2 = $vitorias2 + $derrotas2 + $empates2;
		#echo $jogos2;

	}
	#echo $pontos2;

if ($placar1 > $placar2) {
	#echo $player1." Ganhou!!";

		if ($jogos == 0) {
			
			$pvi=1;

				if ($jogos2 == 0) {
					
					$imp = 5;

				}else{

						if ($PosiPlayer2 <= 5 ) {
							
							$imp = 25;

						}elseif ($PosiPlayer2 <= 10 and $PosiPlayer2 > 5) {
							
							$imp = 20;

						}elseif ($PosiPlayer2 <= 20 and $PosiPlayer2 > 10 ) {
							
							$imp = 15;

						}elseif ($PosiPlayer2 <= 40 and $PosiPlayer2 > 20 ) {
							
							$imp = 10;

						}elseif ($PosiPlayer2 > 40){
							# code...
						

							$imp = 5;

						}
				}

			$pontostv1 = $pontos1+$imp+1;
			#echo $pontostv1;

		}else{

			$pvi=1;

					if ($PosiPlayer2 <= 5 ) {
						
						$imp = 25;


					}elseif ($PosiPlayer2 <= 10 and $PosiPlayer2 > 5) {
						
						$imp = 20;

					}elseif ($PosiPlayer2 <= 20 and $PosiPlayer2 > 10 ) {
						
						$imp = 15;

					}elseif ($PosiPlayer2 <= 40 and $PosiPlayer2 > 20 ) {
						
						$imp = 10;

					}elseif ($PosiPlayer2 > 40){
						# code...
					

						$imp = 5;

					}
				$pontostv1 = $pontos1+$imp+1;
				echo "quando ja tem jogos registrados ".$pontostv1;

		}


}elseif ($placar2 > $placar1) {
	#echo $player2."Ganhou";

if ($jogos2 == 0) {
			
			$pvi=1;

					if ($jogos==0) {
						if ($PosiPlayer1 <= 5 ) {
							
							$imp = 25;


						}elseif ($PosiPlayer1 <= 10 and $PosiPlayer1 > 5) {
							
							$imp = 20;

						}elseif ($PosiPlayer1 <= 20 and $PosiPlayer1 > 10 ) {
							
							$imp = 15;

						}elseif ($PosiPlayer1 <= 40 and $PosiPlayer1 > 20 ) {
							
							$imp = 10;

						}elseif ($PosiPlayer1 > 40){
							
						

							$imp = 5;

						}
					}
			$pontostv1 = $pontos2+$imp+1;
			#echo "player2 ganhou essa".$pontostv1;

		}else{

			$pvi=1;

					if ($PosiPlayer2 <= 5 ) {
						
						$imp = 25;


					}elseif ($PosiPlayer2 <= 10 and $PosiPlayer2 > 5) {
						
						$imp = 20;

					}elseif ($PosiPlayer2 <= 20 and $PosiPlayer2 > 10 ) {
						
						$imp = 15;

					}elseif ($PosiPlayer2 <= 40 and $PosiPlayer2 > 20 ) {
						
						$imp = 10;

					}elseif ($PosiPlayer2 > 40){
						# code...
					

						$imp = 5;

					}
				$pontostv1 = $pontos2+$imp+1;
				#echo "quando ja tem jogos registrados e o playwer 2 ganhou ".$pontostv1;

		}


}else{
	
	if ($jogos == 0 or $jogos2 == 0) {
		
		$imp = 5;
		#$pontostv1 = $pontos2+$imp+0.5;
		#$pontostv2 = $pontos1+$imp+0.5;

		#echo $pontostv1." ".$pontostv2;

	}else{
		
			if ($PosiPlayer1 < $PosiPlayer2) {
				
					if ($PosiPlayer1 <= 5 ) {
							
							$imp = 25/2;


						}elseif ($PosiPlayer1 <= 10 and $PosiPlayer1 > 5) {
							
							$imp = 20/2;

						}elseif ($PosiPlayer1 <= 20 and $PosiPlayer1 > 10 ) {
							
							$imp = 15/2;

						}elseif ($PosiPlayer1 <= 40 and $PosiPlayer1 > 20 ) {
							
							$imp = 10/2;

						}elseif ($PosiPlayer1 > 40){
							
						

							$imp = 5/2;
						}

						
						#echo $pontostv1;

			}elseif ($PosiPlayer2 < $PosiPlayer1) {
					
					if ($PosiPlayer2 <= 5 ) {
							
							$imp = 25/2;


						}elseif ($PosiPlayer2 <= 10 and $PosiPlayer2 > 5) {
							
							$imp = 20/2;

						}elseif ($PosiPlayer2 <= 20 and $PosiPlayer2 > 10 ) {
							
							$imp = 15/2;

						}elseif ($PosiPlayer2 <= 40 and $PosiPlayer2 > 20 ) {
							
							$imp = 10/2;

						}elseif ($PosiPlayer2 > 40){
							

							$imp = 5/2;

						}

						#$pontostve1 = $pontos1+$imp+0.5;
						#$pontostve2 = $pontos2+$imp+0.5;

						#echo $pontostv1;
			}


	}




}


$queryorfim = "SELECT * FROM tabelajogos WHERE nometime = '$player1'"; 
$result_queryorfim = mysqli_query($teste, $queryorfim ) or die(' Erro na query:' . $queryorfim . ' ' . mysqli_error() ); 

# ===========================================================
$cont = 0;
while ($row = mysqli_fetch_array( $result_queryorfim ))
	{

	$pontos1 = $row['pontos'];
	$vitorias1 = $row['vitorias'];
	$derrotas1 = $row['derrotas'];
	$empates1 = $row['empates'];
	$jogos = $vitorias1 + $derrotas1 + $empates1;
		

	}

$queryorfim2 = "SELECT * FROM tabelajogos WHERE nometime = '$player2'"; 
$result_queryorfim2 = mysqli_query($teste, $queryorfim2 ) or die(' Erro na query:' . $queryorfim . ' ' . mysqli_error() ); 

# =============================================================

$cont = 0;
while ($row = mysqli_fetch_array( $result_queryorfim2 ))
	{

	$pontos2 = $row['pontos'];
	$vitorias2 = $row['vitorias'];
	$derrotas2 = $row['derrotas'];
	$empates2 = $row['empates'];
	$jogos2 = $vitorias1 + $derrotas1 + $empates1;
		

	}


if ($placar1 > $placar2) {

$vitorias1 = $vitorias1 + 1;
$derrotas2 =$derrotas2 + 1;
echo $player1;

			$sql = "UPDATE tabelajogos SET pontos = '$pontostv1', vitorias = '$vitorias1' WHERE tabelajogos. nometime = '$player1';";

			if (mysqli_query($teste, $sql)) {
     				echo "inserido";
			} else {
      				echo "Error: " ;
			}
			
			$sql2 = "UPDATE tabelajogos SET derrotas = '$derrotas2' WHERE tabelajogos . nometime = '$player2';";

			if (mysqli_query($teste, $sql2)) {
     				echo "inserido";
			} else {
      				echo "Error: " ;
			}
}elseif ($placar2 > $placar1) {

			$vitorias2 = $vitorias2 + 1;
			$derrotas1 = $derrotas1 + 1;

			$sql = "UPDATE tabelajogos SET pontos = '$pontostv1', vitorias = '$vitorias2' WHERE tabelajogos. nometime = '$player2';";

			if (mysqli_query($teste, $sql)) {
     				echo "inserido";
			} else {
      				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
			
			$sql2 = "UPDATE tabelajogos SET derrotas = '$derrotas1' WHERE tabelajogos . nometime = '$player1';";

			if (mysqli_query($teste, $sql2)) {
     				echo "inserido ";
			} else {
      				echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
			}
}else{

$pontos2 = $pontos2 + $imp + 0.5;
$empates2 = $empates2 + 1;
$pontos1 = $pontos1 + $imp + 0.5;
$empates1 = $empates1 + 1;


			$sql = "UPDATE tabelajogos SET pontos = '$pontos2', empates = '$empates2' WHERE tabelajogos. nometime = '$player2';";

			if (mysqli_query($teste, $sql)) {
     				echo "inserido";
			} else {
      				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
			$sql = "UPDATE tabelajogos SET pontos = '$pontos1', empates = '$empates1' WHERE tabelajogos. nometime = '$player1';";

			if (mysqli_query($teste, $sql)) {
     				echo "inserido";
			} else {
      				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
			
}


header("Location: http://127.0.0.1/Projetos/Sistemas/ranking/");

?>
