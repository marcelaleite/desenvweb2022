<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="meuicone.ico" type="image/x-icon">
    <script src='js/script.js'></script>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form action="acaologin.php" method="POST">
        <label for="user">Usuário:</label>
        <input type="text" name='user' id='user'>
        <label for="senha">Senha:</label>
        <input type="password" name='senha' id='senha'>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>