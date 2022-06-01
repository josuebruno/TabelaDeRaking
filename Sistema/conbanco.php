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
while ($row = mysqli_fetch_array( $result_query )) {$cont=$cont+1; "<tr><th scope='row'>". print $cont . " </th><td> " . $row['nometime'] . " </td><td> " . $row['pontos']."</td></tr>"; }
 
?>