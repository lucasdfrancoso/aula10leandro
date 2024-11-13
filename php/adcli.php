<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<form method="POST" action="adcli.php">
		CPF: <input type="text" name="cpfcli" maxlength="20" placeholder="digite o cpf">
		<br/><br/>
		Nome do Cliente: <input type="text" name="nomecli" maxlength="50" placeholder="digite o nome">		
		<input type="submit" value="salvar" name="botao">
	</form>

</body>
</html>

<?php 
if(isset($_POST["botao"])){

	require("conecta.php");

	//$nome=$_POST["nome"];
	$cpfcli=htmlentities($_POST["cpfcli"]);	
	$nomecli=htmlentities($_POST["nomecli"]);

	// gravando dados
	$mysqli->query("insert into tb_clientes values('', '$cpfcli', '$nomecli')");
	echo $mysqli->error;

	if($mysqli->error == ""){

		echo "<br />Inserido com sucesso<br /></br />";

		echo "<a href='clientes.php'> Voltar</a>";
	}

}
?>