<?php


$nome =  isset($_POST['nome'])?$_POST['nome']:"";
$email =  isset($_POST['email'])?$_POST['email']:"";
$senha =  isset($_POST['senha'])?$_POST['senha']:"";
if ($nome != "" && $senha != "" && $email != ""){
    // salvar no banco de dados    
    include_once "../config/conf.inc.php";    
    try{
        // cria a conexão com o banco de dados 
        $conexao = new PDO(MYSQL_DSN,DB_USER,DB_PASSWORD);
        // montar consulta
        $query = 'INSERT INTO usuario (nome, email, senha) VALUES (:nome, :email, :senha)';
        // preparar consulta
        $stmt = $conexao->prepare($query);
        // vincular variaveis com a consulta
        $stmt->bindValue(':nome',$nome);        
        $stmt->bindValue(':email',$email);        
        $stmt->bindValue(':senha',$senha);
        // executar a consulta
        if ($stmt->execute())
            header('location: cadUsuario.php');
        else
            echo 'Erro ao inserir dados';
    }catch(PDOException $e){ // se ocorrer algum erro na execuçao da conexão com o banco executará o bloco abaixo
        print("Erro ao conectar com o banco de dados...<br>".$e->getMessage());
        die();
    }
}
?>