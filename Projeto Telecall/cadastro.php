<?php 



if(isset($_POST['sbt']))
{
   //print_r('Nome: ' .$_POST['nome']);
   //print_r('<br>');
   //print_r('Data de Nascimento: '.$_POST['datanasc']);
   //print_r('<br>');
   //print_r('Sexo: '.$_POST['sexo']);
   //print_r('<br>');
   //print_r('Nome Materno:'.$_POST['materno']);
   //print_r('<br>');
   //print_r('Celular: '.$_POST['cel']);
   //print_r('<br>');
   //print_r('fixo: '.$_POST['fixo']);
   //print_r('<br>');
   //print_r('endereço: '.$_POST['endereco']);
   //print_r('<br>');
   //print_r('Login: '.$_POST['login']);
   //print_r('<br>');
  // print_r('Senha: '.$_POST['senha']);
   //print_r('<br>');
   //print_r('Confirme a senha: '.$_POST['confirme']);
   
   include_once('conectar.php');
   
   $nome = $_POST['nome'];
   $data_nasc = $_POST['datanasc'];
   $sexo = $_POST['sexo'];
   $nome_materno = $_POST['materno'];
   $cpf = $_POST['cpf'];
   $telefone_celular = $_POST['cel'];
   $telefone_fixo = $_POST['fixo'];
   $endereco = $_POST['endereco'];
   $login = $_POST['login'];
   $senha = $_POST['senha'];
   $confirme_senha = $_POST['confirme'];

   $result = mysqli_query($conn, "INSERT INTO usuarios (usu_nome, usu_dataNacs, usu_sexo, usu_nomeMaterno, usu_cpf, usu_celular, usu_telefoneFixo, usu_endereco, usu_login, usu_senha, usu_confirmarsenha) VALUES ('$nome', '$data_nasc', '$sexo', '$nome_materno', '$cpf', '$telefone_celular', '$telefone_fixo', '$endereco', '$login', '$senha', '$confirme_senha')");
   
   header('Location: login.php');

}


?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet"
  href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link rel="stylesheet" href="Styles/cadastro.css">

  <title>Cadastro</title>
</head>

<body>
  <script src="JS/cadastro.js"></script>
  <header>
    <img src="img/cropped-navbartelecall-e1664888635140.png" alt="Telecall">
    <nav>
      <ul class="side">
        <li><a href="index.html">PRODUTOS</a></li>
        <li><a href="index.html">TARIFAS</a></li>
        <li><a href="index.html">2FA</a></li>
        <li><a href="index.html">CONTATO</a></li>
        <li><a href="index.html">LOJA</a></li>
        <li><a href="cadastro.php" target="_blank">CADASTRE-SE</a></li>
        <li><a href="login.php">LOGIN</a></li>
      </ul>
        
         <!--Menu Mobile-->
         <button    class="button-mobile" onclick="toggleMenu()">
          <i class="material-symbols-outlined">menu</i>
          
      </button>
      
      <nav class="menu-mobile" id="menu-mobile">
          <button id="mobile" class="button-close" onclick="toggleMenu()">
              <span>
                  <i class="material-symbols-outlined">close</i>
              </span>
          </button>
          <button>
              <span>
                  <i class="material-symbols-outlined">home</i>
              </span>
              <span class="mobile-text">Home</span>
          </button>
      
          <button>
              <span>
                  <i class="material-symbols-outlined">tag</i>
              </span>
              <span class="mobile-text">Explorar</span>
          </button>
      
          <button>
              <span>
                  <i class="material-symbols-outlined">email</i>
              </span>
              <span class="mobile-text">Mensagens</span>
          </button>
      
          <button>
              <span>
                  <i class="material-symbols-outlined">person</i>
              </span>
              <span class="mobile-text">Profile</span>
          </button>
      </nav>
      
      </a>
    </nav>
  </header>
  <div class="container">


    <form id="form" action="cadastro.php" method="POST">

      <h1>Crie sua conta</h1>

      <div class="box">
        <label id="labelNome" class="container">Nome e Sobrenome</label>
        <input type="text" id="nome" name="nome" class="input-padrao">
        <span id="nomeError" class="error-message"></span>
      </div>

      <div class="box">
        <label class="container" for="data-de-nascimento" id="labelDate">Data de Nascimento</label>
        <input type="date" id="data" name="datanasc" class="input-padrao">
        <span id="dataError" class="error-message"></span>
      </div>

      <div class="box">
        <label id="labelSexo">Sexo</label>
        <div class="form-box" id="Sexo">
          <input type="radio" name="sexo" value="Masculino" id="masc" class="input-padrao2"> Masculino
          <input type="radio" name="sexo" value="Feminino" id="fem" class="input-padrao2"> Feminino
          <input type="radio" name="sexo" value="Outro" id="out" class="input-padrao2"> Outro
          <span id="sexoErro" class="error-message2"></span>
        </div>
      </div>
      <div class="box">
        <label id="labelMaterno" class="nome-materno">Nome materno</label>
        <input type="text" id="materno" name="materno" class="input-padrao">
        <span id="maternoError" class="error-message"></span>
      </div>

      <div class="box">
        <label id="labelCPF" class="container" >CPF</label>
        
        <input type="text" id="cpf"  name="cpf" class="input-padrao">
        
        <span id="cpfError" class="error-message"></span>
      </div>

      <div class="box">
        <label id="labelCel" class="container">Telefone Celular</label>
        <input type="text" id="cel"  name="cel"   class="input-padrao">
        <span id="celError" class="error-message"></span>
      </div>

      <div class="box">
        <label id="labelFixo" class="container">Telefone Fixo</label>
        <input type="text" id="fixo"  name="fixo" class="input-padrao">
        <span id="fixoError" class="error-message"></span>
      </div>

      <div class="box">
        <label id="labelEnde" class="container">Endereço Completo</label>
        <input type="text" id="endereco" name="endereco" class="input-padrao">
        <span id="enderecoError" class="error-message"></span>
      </div>

      <div class="box">
        <label id="labelLogin" class="container">Login</label>
        <input type="text" id="login"  name="login" class="input-padrao">
        <span id="loginError" class="error-message"></span>
      </div>

      <div class="box">
        <label id="labelSenha" class="container">Senha</label>
        <input type="password" id="senha" name="senha"  class="input-padrao">
        <span id="senhaError" class="error-message"></span>
      </div>

      <div class="box">
        <label id="labelConfi" class="container">Confirme sua Senha</label>
        <input type="text" id="confirm" name="confirme" class="input-padrao">
        <span id="confirmeError" class="error-message"></span>
      </div>

      <br>
      <input id="botao-2" type="submit" name="sbt" value="Enviar" onClick="validaForm()" />
      <input type="button" id="limpar" value="Limpar">

    </form>
   
    <footer class="rodape">
      <p>&copy; 2023 CPaaS Telecall. Todos os direitos reservados.</p>
    </footer>
</body>

</html>
