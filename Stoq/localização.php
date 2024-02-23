<?php
$titulo = 'STOQ';
require_once 'header.php';
session_start();
?>

<!-- Conteúdo -->
<main class="col-sm-9">
	<div class="principal">
		<div class="titulo">
			Cadastro de Armazem
		</div>
		<div class="conteudo">
			<div class="item">

			<div class = tela1>
				<div class="form">
					<form method="post" action="L_localizacao.php">
						<input class="form-control" type="search" style="position: absolute; width: 350px; top: 100px; font-family:'calibri';" name="am" placeholder="Armazém" required><br><br>
						<input class="form-control" type="search" style="position: absolute; width: 350px; top: 150px; font-family:'calibri';"  name="rua" placeholder="Rua" required><br><br>
						<input class="form-control" type="search" style="position: absolute; width: 350px; top: 200px; font-family:'calibri';"  name="baia" placeholder="Baia" required><br><br>
						<input class="form-control" type="search" style="position: absolute; width: 350px; top: 250px; font-family:'calibri';"  name="nv" placeholder="Nível" required><br><br>
						<input class="form-control" type="search" style="position: absolute; width: 350px; top: 300px; font-family:'calibri';"  name="vao" placeholder="vao" required><br><br>
						<input class="form-control" type="search" style="position: absolute; width: 350px; top: 350px; font-family:'calibri';"  name="comp" placeholder="Comprimento" required><br><br>
						<input class="form-control" type="search" style="position: absolute; width: 350px; top: 400px; font-family:'calibri';"  name="alt" placeholder="Altura" required><br><br>
						<input class="form-control" type="search" style="position: absolute; width: 350px; top: 450px; font-family:'calibri';"  name="larg" placeholder="Largura" required><br><br>
						<button class="btn btn-outline-primary " type="submit" style="font-family:'calibri';" id='btn_cadastrar' class='botao' onclick="alert('Localização cadastrada com sucesso')" >Cadastrar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</main>

<?php
include 'footer.php';
?>
