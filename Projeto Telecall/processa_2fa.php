<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_SESSION['login']; // Recupere o nome de usuário do usuário

    // Recupere a resposta do usuário
    $pergunta_id = $_POST['pergunta_id'];
    $answer = $_POST['answer'];

    // Consulta o banco de dados para obter a pergunta e a coluna correspondente
    include_once('conectar.php');
    $sql = "SELECT pergunta, coluna_resposta FROM perguntas_seguranca WHERE id = '$pergunta_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $pergunta_data = $result->fetch_assoc();
        $pergunta = $pergunta_data['pergunta'];
        $coluna_resposta = $pergunta_data['coluna_resposta'];

        // Consulte a tabela de usuários para obter a resposta correspondente
        $sql = "SELECT $coluna_resposta FROM usuarios WHERE usu_login = '$login'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $resposta_correta = $result->fetch_assoc()[$coluna_resposta];
            if ($answer === $resposta_correta) {
                // Autenticação de 2FA bem-sucedida
                header('Location: index.php');
                // Aqui você pode redirecionar o usuário para a página de destino.
            } else {
                echo "Resposta à pergunta de segurança incorreta.";
            }
        }
    }
}

?>
