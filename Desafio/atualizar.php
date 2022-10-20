<?php 
	switch ($_REQUEST["acao"]) {
		case 'editar':
			$nome = $_POST["nome_produto"];
			$valor  = $_POST["valor_energetico"];
			$carbo  = $_POST["carboidratos"];
			$prot  = $_POST["proteinas"];
			$gorduras  = $_POST["gorduras_totais"];
			$fabricacao  = $_POST["data_fabricacao"];
			$validade  = $_POST["data_validade"];

			$sql = "UPDATE produto SET
						nome_produto='{$nome}',
						valor_energetico='{$valor}',
						carboidratos='{$carbo}',
						proteinas='{$prot}',
						gorduras_totais='{$gorduras}',
						data_fabricacao='{$fabricacao}',
						data_validade='{$validade}'
					WHERE
						id_produto=".$_POST["id_produto"];

			$res = $conn->query($sql) or die($conn->error);

			if($res==true){
				print "<script>alert('Editado com sucesso!');</script>";
				print "<script>location.href='?index.php';</script>";
			}else{
				print "<script>alert('Não foi possível editar!');</script>";
				print "<script>location.href='?index.php';</script>";
			}
		}

/*//require_once('config/config.pgp.php');
	if (isset($_GET["u"])) {
		$id_produto = $_GET["u"];

		$sql = "SELECT * FROM produto WHERE id_produto = :id";
		$stmt = $pdo->prepare($sql);
		$stmt->bindParam(':id',$id_produto);
		$result = $stmt->execute();
		$rows= $stmt->fetchALL(PDO::FETCH_ASSOC);
	}


?>
<form method="POST">
	<div class="mb-3">
		<label>Nome do Produto: </label>
		<input class="form-control" type="text" name="nome_produto" value="<?php print $row->nome_produto; ?>">
	</div>
	<div class="mb-3">
		<label>Valor Energético: </label>
		<input class="form-control" type="text" name="valor_energetico" value="<?php print $row->valor_energetico; ?>">
	</div>
	<div class="mb-3">
		<label>Carboidratos(g): </label>
		<input class="form-control" type="text" name="carboidratos" value="<?php print $row->carboidratos; ?>">
	</div>
	<div class="mb-3">
		<label>Proteínas(g): </label>
		<input class="form-control" type="text" name="proteinas" value="<?php print $row->proteinas; ?>">
	</div>
	<div class="mb-3">
		<label>Gorduras totais(g): </label>
		<input class="form-control" type="text" name="gorduras_totais" value="<?php print $row->gorduras_totais; ?>">
	</div>
	<div class="mb-3">
		<label>Data de Fabricação</label>
		<input class="form-control" type="date" name="data_fabricacao" value="<?php print $row->data_fabricacao; ?>">
	</div>
	<div class="mb-3">
		<label>Data de Validade</label>
		<input class="form-control" type="date" name="data_validade" value="<?php print $row->data_validade; ?>">
	</div>
	<div class="mb-3">
	<button type="submit" class="btn btn-dark">Atualizar</button>
	<hr>
	</div>
</form>

<?php 
	if (isset($_POST["atualizar"])) {

		$nome_produto=$_POST["nome_produto"];
		$valor_energetico=$_POST["valor_energetico"];
		$carboidratos=$_POST["carboidratos"];
		$proteinas=$_POST["proteinas"];
		$gorduras_totais=$_POST["gorduras_totais"];
		$data_fabricacao=$_POST["data_fabricacao"];
		$data_validade=$_POST["data_validade"];

		$sql_update = "UPDATE produto SET nome_produto = :nome, UPDATE produto SET valor_energetico = :valor, UPDATE produto SET carboidratos = :carbo, UPDATE produto SET proteinas = :prot, UPDATE produto SET gorduras_totais = :gorduras, UPDATE produto SET data_fabricacao = :fabricacao, UPDATE produto SET data_validade = :validade WHERE id_produto = :id";

		$stmt_update = $pdo->prepare($sql_update);

		$stmt_update->bindParam(':id',$id_produto);
		$stmt_update->bindParam(':nome',$nome_produto);
		$stmt_update->bindParam(':valor',$valor_energetico);
		$stmt_update->bindParam(':carbo',$carboidratos);
		$stmt_update->bindParam(':prot',$proteinas);
		$stmt_update->bindParam(':gorduras',$gorduras_totais);
		$stmt_update->bindParam(':fabricacao',$data_fabricacao);
		$stmt_update->bindParam(':validade',$data_validade);

		$result_update = $stmt_update->execute();

		if (!$result_update) {
			var_dump($stmt_update->errorInfo());
			exit;
		}else{
			echo $stmt_update->rowCount() . "linha atualizada";
			header('Location: index.php');
		}

	}

*/