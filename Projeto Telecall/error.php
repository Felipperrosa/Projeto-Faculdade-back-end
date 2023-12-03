<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erro de Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            text-align: center;
            padding: 50px;
        }

        .error-box {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .error-message {
            color: #ff0000;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .back-to-login {
            display: inline-block;
            padding: 10px 20px;
            background-color: #2e71bd;
            color: #fff;
            text-decoration: none;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="error-box">
        <h2>Erro de Login</h2>
        
        <div class="error-message">
            <?php
            session_start();

            if (isset($_SESSION['error_message'])) {
                echo $_SESSION['error_message'];
                unset($_SESSION['error_message']); // Limpa a mensagem de erro após exibi-la
            } else {
                echo "Ocorreu um erro durante o login.";
            }
            ?>
        </div>

        <a href="login.php" class="back-to-login">Voltar para a página de login</a>
    </div>
</body>
</html>
