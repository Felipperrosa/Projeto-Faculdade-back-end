<?php
session_start();

if (isset($_POST['sbt']) && !empty($_POST['login']) && !empty($_POST['senha'])) {
    // Acesso após o login
    include_once('conectar.php');
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE usu_login = '$login' and usu_senha = '$senha'";
    $result = $conn->query($sql);

    if (mysqli_num_rows($result) < 1) {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        header('Location: login.php');
    } else {
        $_SESSION['login'] = $login;
        $_SESSION['senha'] = $senha;
        header('Location: 2fa.php');
    }
    
    $usuario = $result->fetch_assoc();
    if ($usuario['access_level_id'] == '1') {
        // Redireciona para a página "sistema.php" para usuários "master"
        header('Location: index.php');
    }
} else {
    // Acesso sem login
    // Redireciona para a página "index.php" independentemente de estar logado ou não
    header('Location: index.php');
}
?>
