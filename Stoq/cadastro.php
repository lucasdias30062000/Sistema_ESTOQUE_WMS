<?php
$titulo = 'STOQ';
require_once 'header.php';
session_start();
?>
<!-- Conteúdo -->
<main class="col-sm-9">
	<div class="principal">
		<div class="titulo">
			Cadastro de Produto 
		</div>
		<div class="conteudo">
			<div class="item">

			<div class = tela1>
				<div class="form">
					<form method="post" action="L_cadastro.php">
						<input class="form-control" type="search" style="position: absolute; width: 350px; top: 100px; font-family:'calibri';" name="nm" placeholder="Nome" required><br><br>
						<input class="form-control" type="search" style="position: absolute; width: 350px; top: 150px; font-family:'calibri';" name="vl" placeholder="Valor" required><br><br>
						<input class="form-control" type="search" style="position: absolute; width: 350px; top: 200px; font-family:'calibri';"  name="desc" placeholder="Descrição do produtos" required><br><br>
						<input class="form-control" type="search" style="position: absolute; width: 350px; top: 250px; font-family:'calibri';"  name="comp" placeholder="Comprimento" required><br><br>
						<input class="form-control" type="search" style="position: absolute; width: 350px; top: 300px; font-family:'calibri';"  name="alt" placeholder="Altura" required><br><br>
						<input class="form-control" type="search" style="position: absolute; width: 350px; top: 350px; font-family:'calibri';"  name="larg" placeholder="Largura" required><br><br>						
						<button class="btn btn-outline-primary " type="submit" style="font-family:'calibri';" id='btn_cadastrar' class='botao' onclick="alert('Produto cadastrado com sucesso')" >Cadastrar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</main>