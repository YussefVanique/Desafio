<h1>Editar</h1>
<?php
	$sql = "SELECT * FROM produto WHERE id_produto=".$_REQUEST["id_produto"];

	$res = $conn->query($sql) or die($conn->error);

	$row = $res->fetch_object();

?>
<form action="?index.php" method="POST">
	<input type="hidden" name="u" value="editar">
	<input type="hidden" name="id_produto" value="<?php print $row->id_produto; ?>">
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
		<button type="submit" class="btn btn-success">Enviar</button>
	</div>
</form>