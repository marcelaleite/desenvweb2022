
<?php
// verificar dados enviados
// echo 'Dados enviados:<br>';
// echo '<pre>';
// var_dump($_GET);
// echo '</pre>';
$nome = isset($_GET['nome'])?$_GET['nome']:'';
$sobrenome = isset($_GET['sobrenome'])?$_GET['sobrenome']:'';

if (isset($_GET['nome'])){
    echo 'Olá '.$_GET['nome'];
}else
    header('location: contato.html');


?> 
