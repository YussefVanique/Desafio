<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Atacadão</title>
    <style type="text/css">
      body{
        background-color:   #F0F8FF;
      }
    </style>
  </head>
  <body>

    <h1>Atacadão</h1>

    <h3>Cadastro de Produtos</h3>
  


<?php
	$pdo = new PDO('mysql:host=localhost;dbname=db-desafio','root','');
	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	
	//delet
	if (isset($_GET['delete'])) {
		$id_produto = (int)$_GET['delete'];
		$pdo->exec("DELETE FROM produto WHERE id_produto=$id_produto");
		
	}

	//insert.
	if (isset($_POST['nome_produto'])) {
				$sql = $pdo->prepare("INSERT INTO produto VALUES (null,?,?,?,?,?,?,?)");
				$sql->execute(array($_POST['nome_produto'],$_POST['valor_energetico'],$_POST['carboidratos'],$_POST['proteinas'],$_POST['gorduras_totais'],$_POST['data_fabricacao'],$_POST['data_validade']));
				echo 'Inserido com sucesso!';
		
	}

?>
<form method="POST">
	<div class="mb-3">
		<label>Nome do Produto: </label>
		<input class="form-control" type="text" name="nome_produto">
	</div>
	<div class="mb-3">
		<label>Valor Energético: </label>
		<input class="form-control" type="text" name="valor_energetico">
	</div>
	<div class="mb-3">
		<label>Carboidratos(g): </label>
		<input class="form-control" type="text" name="carboidratos">
	</div>
	<div class="mb-3">
		<label>Proteínas(g): </label>
		<input class="form-control" type="text" name="proteinas">
	</div>
	<div class="mb-3">
		<label>Gorduras totais(g): </label>
		<input class="form-control" type="text" name="gorduras_totais">
	</div>
	<div class="mb-3">
		<label>Data de Fabricação</label>
		<input class="form-control" type="date" name="data_fabricacao">
	</div>
	<div class="mb-3">
		<label>Data de Validade</label>
		<input class="form-control" type="date" name="data_validade">
	</div>
	<div class="mb-3">
	<button type="submit" class="btn btn-dark">Cadastrar</button>
	<hr>
	</div>
</form>

		<div class="container col-sm-4">
				<td>
					<a href="editar.php?u=<?php echo $item["id_produto"];?>">Editar</a>
				</td>
		</div>	


	<tbody>
	<script src="js/bootstrap.bundle.min.js"></script>    
	</body>
</html>
<?php 

		//buscar
		$sql = $pdo->prepare("SELECT * FROM produto");
		$sql->execute();

		$fetchProduto = $sql->fetchALL();

		foreach ($fetchProduto as $key => $value) {
			echo '<a href="?delete='.$value['id_produto'].'">(EXCLUIR)</a>'.'<a href="editar.php?u='.$value['id_produto'].'">(Editar)</a>'.$value['nome_produto'].' | '.$value['valor_energetico'].' | '.$value['carboidratos'].' | '.$value['proteinas'].' | '.$value['gorduras_totais'].' | '.$value['data_fabricacao'].' | '.$value['data_validade'];
			echo'<hr>';
			/*echo '<a href="atualizar.php?u='.$value['id_produto'].'">(Editar)</a>'.$value['nome_produto'].' | '.$value['valor_energetico'].' | '.$value['carboidratos'].' | '.$value['proteinas'].' | '.$value['gorduras_totais'].' | '.$value['data_fabricacao'].' | '.$value['data_validade'];
			echo'<hr>';*/
		}


?>

