<?php
include_once "../config/conf.inc.php";    // arquivo de configuração
// acao.php é responsável por inserir, editar e excluir um registro no banco de dados
$acao =  isset($_GET['acao'])?$_GET['acao']:"";

if ($acao == 'excluir'){ // exclui um registro do banco de dados
    try{
        $id =  isset($_GET['id'])?$_GET['id']:0;  // se for exclusão o ID vem via GET        
        excluir($id);
    }catch(PDOException $e){ // se ocorrer algum erro na execuçao da conexão com o banco executará o bloco abaixo
        print("Erro ao conectar com o banco de dados...<br>".$e->getMessage());
        die();
    }
}else{ // então é para inserir ou atualizar
    // cria a conexão com o banco de dados 
    $conexao = criaConexao();
    $usuario = dadosFormularioParaVetor();
    // montar consulta
    if ($usuario)
        if ($id > 0) // se o ID está informado é atualização
            editar($usuario);
        else // senão será inserido um novo registro
            inserir($usuario);
    else
        echo "Erro. Dados não preenchidos";
}

function dadosFormularioParaVetor(){
    if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha'])){
        $usuario = array('nome' =>  isset($_POST['nome'])?$_POST['nome']:"",
                        'email' =>  isset($_POST['email'])?$_POST['email']:"",
                        'senha' =>  isset($_POST['senha'])?$_POST['senha']:"",
                        'id' =>  isset($_POST['id'])?$_POST['id']:0);
        return $usuario;
    }else{
        return null;
    }
}

function criaConexao(){
    try{
        return new PDO(MYSQL_DSN,DB_USER,DB_PASSWORD);
    }catch(PDOException $e){ // se ocorrer algum erro na execuçao da conexão com o banco executará o bloco abaixo
            print("Erro ao conectar com o banco de dados...<br>".$e->getMessage());
            die();
    }catch(Exception $e){ // se ocorrer algum erro na execuçao da conexão com o banco executará o bloco abaixo
            print("Erro genérico...<br>".$e->getMessage());
            die();
    }
}


function excluir($id){
    // cria a conexão com o banco de dados 
    $conexao = criaConexao();
    $query = 'DELETE FROM usuario WHERE id = :id';
    $stmt = $conexao->prepare($query);
    $stmt->bindValue(':id',$id);
    // executar a consulta
    if ($stmt->execute())
        header('location: cadUsuario.php');
    else
        echo 'Erro ao excluir dados';
}

function inserir($usuario){
        // cria a conexão com o banco de dados 
        $conexao = criaConexao();
        // montar consulta

        $query = 'INSERT INTO usuario (nome, email, senha) 
                        VALUES (:nome, :email, :senha)';
        // preparar consulta
        $stmt = $conexao->prepare($query);
        // vincular variaveis com a consulta
        $stmt->bindValue(':nome',$usuario['nome']);        
        $stmt->bindValue(':email',$usuario['email']);        
        $stmt->bindValue(':senha',$usuario['senha']);

        // executar a consulta
        if ($stmt->execute())
            header('location: cadUsuario.php');
        else
            echo 'Erro ao inserir/editar dados';
}

function editar($usuario){
    // cria a conexão com o banco de dados 
    $conexao = criaConexao();
    // montar consulta

    $query = 'UPDATE usuario 
                SET nome = :nome, email = :email, senha = :senha
                WHERE id = :id';
    // preparar consulta
    $stmt = $conexao->prepare($query);
    // vincular variaveis com a consulta
    $stmt->bindValue(':nome',$usuario['nome']);        
    $stmt->bindValue(':email',$usuario['email']);        
    $stmt->bindValue(':senha',$usuario['senha']);
    $stmt->bindValue(':id',$usuario['id']);

    // executar a consulta
    if ($stmt->execute())
        header('location: cadUsuario.php');
    else
        echo 'Erro ao inserir/editar dados';
}
?>