<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['login'])) {
    $login = $_SESSION['login'];
    $pergunta_id = $_POST['pergunta_id'];
    $answer = $_POST['answer'];

    include_once('conectar.php');

    // Verificar se a pergunta_id é um número válido
    if (!is_numeric($pergunta_id)) {
        header('Location: error2fa.php');
        exit();
    }

    // Prevenção contra SQL Injection usando prepared statements
    $sql = "SELECT pergunta, coluna_resposta FROM perguntas_seguranca WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $pergunta_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $pergunta_data = $result->fetch_assoc();
        $pergunta = $pergunta_data['pergunta'];
        $coluna_resposta = $pergunta_data['coluna_resposta'];

        $sql = "SELECT $coluna_resposta FROM usuarios WHERE usu_login = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $login);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $resposta_correta = $result->fetch_assoc()[$coluna_resposta];

            // Verifica se a resposta fornecida é igual à resposta correta
            if (!empty($answer) && hash_equals($answer, $resposta_correta)) {
                // Autenticação de 2FA bem-sucedida

                // Você pode adicionar uma variável de sessão para indicar que a autenticação foi bem-sucedida
                $_SESSION['autenticacao_bem_sucedida'] = true;

                header('Location: index.php');
                exit();
            }
        }
    }

    // Se chegou aqui, a resposta está incorreta ou faltando
    $_SESSION['autenticacao_bem_sucedida'] = false;
    header('Location: erro2fa.php');
    exit();
} elseif (isset($_SESSION['login'])) {
    // Se o usuário está autenticado, redirecione para index.php
    header('Location: index.php');
    exit();
} else {
    // Requisição inválida ou não autorizada
    header('Location: erro2fa.php');
    exit();
}
?>
