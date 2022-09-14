
<?php
// verificar dados enviados
// echo 'Dados enviados:<br>';
// echo '<pre>';
// var_dump($_GET);
// echo '</pre>';
$nome = isset($_POST['nome'])?$_POST['nome']:'';
$sobrenome = isset($_POST['sobrenome'])?$_POST['sobrenome']:'';

if (isset($_POST['nome'])){
    echo 'Olá '.$_POST['nome'];
}else
    header('location: contato.html');

    $dados = array('Nome'=>$nome,'Sobrenome'=>$sobrenome);

   $arquivo = fopen('contatos.txt','w+');
   fwrite($arquivo,json_encode($dados));
   fclose($arquivo);
?> 
