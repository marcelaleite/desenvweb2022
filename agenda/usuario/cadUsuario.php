<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
</head>
<body>
    <h1>Cadastrar novo Usuário</h1>
    <form action="acao.php" method="post">
        <label for="name">Nome:</label>
        <input type="text" name='nome' id='nome' placeholder="Informe seu nome completo...">
        <label for="email">E-mail:</label>
        <input type="email" name='email' id='email' placeholder="usuario@mail.com...">
        <label for="name">Senha:</label>
        <input type="password" name='senha' id='senha' placeholder="Informe uma senha ...">
        <button type='submit' name='acao' value='salvar'>Enviar</button>
    </form>
</body>
</html>