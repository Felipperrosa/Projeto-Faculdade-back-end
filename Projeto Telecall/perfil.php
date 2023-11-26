<?php
session_start();

$logado = false;

// Verificar se o usuário está logado
if (isset($_SESSION['login']) && isset($_SESSION['senha'])) {
    // Conectar ao banco de dados e buscar informações do usuário
    include_once('conectar.php');
    $login = $_SESSION['login'];
    $senha = $_SESSION['senha'];

    $sql = "SELECT * FROM usuarios WHERE usu_login = '$login' and usu_senha = '$senha'";
    $result = $conn->query($sql);

        // Se o usuário está logado, definir $logado como o nome de usuário
        $logado = $login;
    
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Trocar Senha</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 100px;
        }

        .box {
            border: 1px solid #ccc;
            padding: 20px;
            width: 300px;
            margin: 0 auto;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }

        .card{
           margin-left: 600px;
        }


    </style>
</head>
<body> 
    
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="img/Só O LOGO.png" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Troca de Senha</h5>
    <p class="card-text">Lembre-se de que, ao trocar a senha, você será redirecionado para a tela de login. É importante destacar que a senha deve conter exatamente 8 caracteres alfabéticos.</p>
    <?php 
                    while($user_data_Commum = mysqli_fetch_assoc($result))
                    
                    {
                    echo "<p>Você deseja trocar sua senha?</p>";
                    echo "<a class='btn btn-primary' href='changepassword.php?id=$user_data_Commum[usu_id]' role='button'>Clique aqui</a>";
                    } 
                    ?>
  </div>
</div>
 
</body>



   

</html>
