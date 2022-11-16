<?php
include_once "../config/conf.inc.php";    

$nome =  isset($_POST['nome'])?$_POST['nome']:"";
$email =  isset($_POST['email'])?$_POST['email']:"";
$senha =  isset($_POST['senha'])?$_POST['senha']:"";
$id =  isset($_POST['id'])?$_POST['id']:0;

$acao =  isset($_GET['acao'])?$_GET['acao']:"";

if ($acao == 'excluir'){
    try{
        $id =  isset($_GET['id'])?$_GET['id']:0;
        
        // cria a conexão com o banco de dados 
        $conexao = new PDO(MYSQL_DSN,DB_USER,DB_PASSWORD);
        $query = 'DELETE FROM usuario WHERE id = :id';
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id',$id);
        // executar a consulta
        if ($stmt->execute())
            header('location: cadUsuario.php');
        else
            echo 'Erro ao excluir dados';
    }catch(PDOException $e){ // se ocorrer algum erro na execuçao da conexão com o banco executará o bloco abaixo
        print("Erro ao conectar com o banco de dados...<br>".$e->getMessage());
        die();
    }
}else{

    if ($nome != "" && $senha != "" && $email != ""){
        // salvar no banco de dados    
        try{
            // cria a conexão com o banco de dados 
            $conexao = new PDO(MYSQL_DSN,DB_USER,DB_PASSWORD);
            // montar consulta
            if ($id > 0) // atualização
                $query = 'UPDATE usuario SET nome = :nome, email = :email, senha = :senha
                        WHERE id = :id';
            else
                $query = 'INSERT INTO usuario (nome, email, senha) VALUES (:nome, :email, :senha)';
            // preparar consulta
            $stmt = $conexao->prepare($query);
            // vincular variaveis com a consulta
            $stmt->bindValue(':nome',$nome);        
            $stmt->bindValue(':email',$email);        
            $stmt->bindValue(':senha',$senha);
            if ($id > 0) // atualização
                $stmt->bindValue(':id',$id);

            // executar a consulta
            if ($stmt->execute())
                header('location: cadUsuario.php');
            else
                echo 'Erro ao inserir/editar dados';
        }catch(PDOException $e){ // se ocorrer algum erro na execuçao da conexão com o banco executará o bloco abaixo
            print("Erro ao conectar com o banco de dados...<br>".$e->getMessage());
            die();
        }catch(Exception $e){ // se ocorrer algum erro na execuçao da conexão com o banco executará o bloco abaixo
            print("Erro genérico...<br>".$e->getMessage());
            die();
        }
    }
}
?>