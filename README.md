# Sistema_ESTOQUE_WMS
Sistema Web para Gerenciar e Otimizar Espaço no Estoque.

Siga o passo a passo para instalar e usar o sistema de Estoque.
1 - Baixar todos arquivos do Github.
2- Baixar o Xampp no Google.
3- Após isso executar o Xampp, apertar em start Sql e start Apache. 
4- Clicar no botão admin que fica do lado do botão start do SQL, onde será direcionado a pagina do banco de dados(PhpMyAdmin).
5- Será necessário criar um novo banco de dados com o nome "dtbStoq". Para isso clique em novo e escreva o nome.
6- Após isso terá que importar o arquivo "dtbStoq" cllicando em importar escolher arquivo, selecione o arquivo "dtbstoq", assim será importado os arquivos de banco de dados, contendo as tabelas e os campos do banco. 
7- Proximo passo será necessario salvar a pasta "Stoq" que voces baixaram do github e inserir no seguinte caminho "C:Xampp/htdocs/Stoq".  Apos isso com Xampp executado e banco instalado, basta digitar na Url do navegador: localhost/stoq/cadastro.php 

E assim poderá criar produtos, localizacões, visualizar historico de movimentação, consultas, dar entrada em produtos e saida. Sendo possivel, realizar a entrada e saída de apenas uma unidade por vez de cada produto, onde será apresentado a localização que terá menor sobra de espaço para o produto armazenado, tendo melhor aproveitamento do espaço e diminuindo o volume desnecessário de produtos no estoque. Observação: Esse Sistema foi meu TCC, mas irei continuar personalizando e criando melhorias em breve estarei atualizando aqui no Github.
