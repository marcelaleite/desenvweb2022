<?php
  include_once "novo/acao.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="estilo.css">
    <title>Agenda de Contatos</title>
    <script src="js/script.js"></script>
</head>
<body class='container'>
    <h1>Meus Contatos</h1>
    <nav> <!-- menu -->
        <ul class="menu">
            <li id="cadastrar" class="itemenu"><a href="novo/">Cadastrar Contato</a></li>
            <li id="cadUsuario" class="itemenu"><a href="usuario/cadUsuario.php">Cadastrar Usuário</a></li>
            <li class="itemenu"><a href="extras/sobre.html">Sobre</a></li>
            <li>Favoritos</li>
        </ul>
    </nav>
    <section> <!-- pesquisa -->
        <div class='row'>
            <div class='col'>
                <form action="" id='pesquisa'>
                    <div class='row'>
                        <div class='col-6'></div>
                        <div class='col-4'>
                            <input class='form-control' type="search" name='busca' id='busca'>
                        </div>
                        <div class='col-2'>
                            <button class='btn btn-primary' type="submit">Filtrar</button>
                        </div>
                    </div>
                </form>            
            </div>
        </div>
    </section>
    <br>
    <section> <!-- tabela de contatos-->
        <div class='row'>
            <div class='col' id='listagem'>
                <table class="table lista-contatos" id='lista'>
                <thead>
                    <tr>
                        <th>Id</th><th>Nome</th><th>Sobrenome</th><th>Telefone</th><th>Alterar</th><th>Excluir</th>
                    </tr>
                </thead>
                <?php
                $dados = carregaDoArquivoParaVetor();
        
                foreach($dados as $contato){
                    $alterar = "<a href='novo/index.php?acao=editar&id=".$contato['id']."'>Alt</a>";
                    $excluir = "<a href='#' onclick=excluir('index.php?acao=excluir&id=".$contato['id']."','".$contato['nome']."')>Exc</a>";
                    echo "<tr><td>".$contato['id']."</td><td>".$contato['nome']."</td><td>".$contato['sobrenome']."</td><td>".$contato['telefone']."</td><td>".$alterar."</td><td>".$excluir."</td></tr>";
                }
                ?>
                </table>
            </div>
        </div>
       
    </section>
</body>
</html>

