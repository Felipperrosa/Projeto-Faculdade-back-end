<?php 



  if(!empty($_GET['id']))
  {
    
    include_once('conectar.php');
    
    $usu_id = $_GET['id'];


    $sqlSelect = "SELECT * FROM usuarios WHERE usu_id=$usu_id";

    $result = $conn->query($sqlSelect);

    if($result->num_rows > 0 )
    {
      while($user_data = mysqli_fetch_assoc($result))
      {
          $nome = $user_data['usu_nome'];
          $data_nasc = $user_data['usu_dataNacs'];
          $sexo = $user_data['usu_sexo'];
          $nome_materno = $user_data['usu_nomeMaterno'];
          $cpf = $user_data['usu_cpf'];
          $telefone_celular = $user_data['usu_celular'];
          $telefone_fixo = $user_data['usu_telefoneFixo'];
          $endereco = $user_data['usu_endereco'];
          $login = $user_data['usu_login'];
          $senha = $user_data['usu_senha'];
          $confirme_senha = $user_data['usu_confirmarsenha'];
      }
      
    
  
    }
    else{
      header('location: sistema.php');

    }

  } else{
    header('location: sistema.php');
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
<title>Cadastro</title>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
        * {
          font-family: 'Roboto', sans-serif;
        }
        
        body {
          background-color: #ffffff;
          color: #2667b1;
          font-size: 20px; 
          margin-top: 180px;
          
        }
        header {
          background-color:#CA1C2A;
          color: #fff;
          padding: 20px;
          position: fixed;
          top: 0;
          left: 0;
          width: 100%;
          height:56px;
          
        }
        header img {
          position: relative;
          top: -22px;
          height: 98px;
          left: -2%;
          object-fit: cover;
          
        }

        nav {
        position: absolute;
        display: flex;
        align-items: center;
        justify-content:flex-start;
        margin-left: 30%;
        top: 18%;


        }

              
        nav ul li a{
            color: #ffffff;
            text-decoration:none ;
            font-weight: lighter;
            text-transform: capitalize;
            font-family: sans-serif;
            font-size: 13px;
            transition: all 0.35s;

            
            
        }
        nav ul li{
            display: inline-block;
            padding: 0px 30px;
            margin-left: 0%;
            margin-bottom: 20%;
        }
        a:hover{
            color: #2e71bd;
            opacity: 20px;
        }
        button[id="botao-1"]{
            border-radius: 28px;
            padding: 9px 15px;
            background-color:#2e71bd;
            border: none;
            font-weight: bold;
            font-size: 12px;
            color:#ffff;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            position: absolute;
            top: 18px;
            right: -3 px;
          }
        
          
          .form{
            width: 150%;
            position: relative;
          
          }
        h1{
          text-align: center;
          margin-bottom: 25px;
          color: #2667b1
        }
        form {
          width: 500px;
          padding: 15px 40px 40px;
          border: 1px solid #ccc;
          border-radius: 5px;
          background-color: #fff;
          margin-top: px;
          margin-left: auto;
          margin-right: auto;
        }


        .input-padrao {
          display: flex;
          margin-bottom: 15px;

        }


        .button-eviar {
          padding: 10px;
          background-color: #f1f1f1;

        }

        input[id="update"] {

          background-color: #CA1C2A;
          box-shadow: #7e1019;
          color: #fff;
          padding: 8px 12px;
          border: none;
          border-radius: 1px;
          text-transform: uppercase;
          font-size: 12px;
          width: 100px;
          height: 40px;
          cursor: pointer;
          font-weight: bolder;
          position: relative;
          left: 55%;
          transition: all .2s ease-out;
        }

        input[id="update"]:hover {
          background-color: #af0e1b ;
          border-color:  #af0e1b  ;
        }
        input[id="limpar"] {

          background-color: #CA1C2A;
          box-shadow: #7e1019;
          color: #fff;
          padding: 8px 12px;
          border: none;
          border-radius: 1px;
          text-transform: uppercase;
          font-size: 12px;
          width: 100px;
          height: 40px;
          cursor: pointer;
          font-weight: bolder;
          position: relative;

          transition: all .2s ease-out;
        }

        input[id="limpar"]:hover {
          background-color: #af0e1b ;
          border-color:  #af0e1b  ;
        }


        .nome-materno {
          margin-top: 1em;

        }



        input[type="text"],
        input[type="password"] {
          border: 1px solid #ccc;
          padding: 10px;
          display: block;
          width: 100%;
          box-sizing: border-box;
          border-radius: 2px;
          background-color: #a9bae64a;
        }
        input[type="text"]:focus,
        input[type="password"]:focus,
        input[type="date"]:focus {
          outline: none;
        }


        input[type="date"] {
          padding: 0.5em;
          border-radius: 1px;
          border: 1px solid  #ccc;
          width: 35%;
          box-sizing: border-box;
          margin-bottom: 1em;
          background-color: #a9bae64a
        }

        label {
          display: block;
          margin-bottom: 5px

        }
        .box {
          padding-bottom: 10px;
        }



        .error-message {
          color: red;
          font-size: 15px;
          position: block;
          bottom: 13px;


        }
        .error-message2 {
          color: red;
          font-size: 15px;
          position: relative;
          top: 25px;
          right: 53%;


        }

        .error-label {
          color: red;
        }
        .rodape {
          padding: 10px;
          text-align: center;
          margin-top: 6%;



        }


        .menu-mobile{
          display: none;
        }
        .menu .menu-mobile-active{
          display: none;
        ;
        }
        @media (width < 920px){
        
          .side{
            display: none;
            position: fixed;
            
          }
          button[id="botao-1"]{
            display: none;
          }
          header img {
            position: relative;
            top: -22px;
            height: 98px;
            left: -5%;
            object-fit: cover;
          }


          .menu-mobile-active button{
            background: transparent;
            border:0;
            color:inherit;
            margin-bottom: 16px;
            margin-left: -30%;
            position: relative;
            top: -15%;
          }
        .mobile-text{
          font-size: 22px;
          margin-left: 8px;
        }


        .menu-mobile-active button > span{
          display: inline-flex;
          align-items: center;
        
        }
        .menu-mobile-active{
          width: 100vw;
          height: 100vh;
          background-color: #ffffff;
          z-index: 99;
          position: fixed;
          top: 0;
          left: 0;
          display: flex;
          flex-direction: column;
          align-items: center;
          justify-content: center;
          overflow: hidden;

        }
        .button-mobile{
        display: none;
          
        }
        .menu-mobile-active button{
          background: transparent;
          border:0;
          color:inherit;
          margin-bottom: 16px;
          margin-left: -30%;
          position: relative;
          top: -15%;
          transition: margin 1s;
        }
        .mobile-text{
        font-size: 22px;
        margin-left: 8px;
        }


        
        }
        
        @media (max-width :488px){
            
          form {
            width: 350px;
            padding: 15px 40px 40px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            margin-top: px;
            margin-left: auto;
            margin-right: auto;
          }
          input[id="limpar"] {

            position: relative;
            right: 50px;
          }
          

          .menu-mobile-active{
            width: 100vw;
            height: 100vh;
            background-color: #ffffff;
            z-index: 99;
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            transition: margin 0.4s;

          }
          .menu-mobile-active button{
            background: transparent;
            border:0;
            color:inherit;
            margin-bottom: 16px;
            margin-left: -30%;
            position: relative;
            top: -15%;
        }
        .mobile-text{
          font-size: 22px;
          margin-left: 8px;
        }


        .menu-mobile-active button > span{
          display: inline-flex;
          align-items: center;
          transition: margin 0.4s;
        
        }
        }

          .button-mobile{
            display:block;
            align-self: flex-start;
            align-items: center;
            margin-left: 245px;
            margin-top: 4%;
            background: transparent;
            color: #ffffff;
            border: 0;
            
            
          }

          header img {
            position: relative;
            top: -22px;
            height: 98px;
            right: 5%;
            object-fit: cover;
          }
          
        
          
  
  
  
  </style>

</head>

<body>
  <a href="sistema.php">Voltar</a>
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
      <a>
        <button class="menu-mobile" id="botao-1">
          <i class="bi bi-bag"></i>
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
          </svg>
        </button>
        
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


    <form id="form" action="saveEdit.php" method="POST">

      <h1>Crie sua conta</h1>

      <div class="box">
        <label id="labelNome" class="container">Nome e Sobrenome</label>
        <input type="text" id="nome" name="nome" class="input-padrao"  value="<?php echo $nome ?>">
        <span id="nomeError" class="error-message"></span>
      </div>

      <div class="box">
        <label class="container" for="data-de-nascimento" id="labelDate">Data de Nascimento</label>
        <input type="date" id="data" name="datanasc" value="<?php echo $data_nasc ?>"class="input-padrao">
        <span id="dataError" class="error-message"></span>
      </div>

      <div class="box">
        <label id="labelSexo">Sexo</label>
        <div class="form-box" id="Sexo">
        <input type="radio" name="sexo" value="masculino" <?php echo ($sexo == 'masculino') ? 'checked' : ''; ?> id="masc" class="input-padrao2"> Masculino
        <input type="radio" name="sexo" value="feminino" <?php echo ($sexo == 'feminino') ? 'checked' : ''; ?> id="fem" class="input-padrao2"> Feminino
        <input type="radio" name="sexo" value="outro" <?php echo ($sexo == 'outro') ? 'checked' : ''; ?> id="out" class="input-padrao2"> Outro

          <span id="sexoErro" class="error-message2"></span>
        </div>
      </div>
      <div class="box">
        <label id="labelMaterno" class="nome-materno">Nome materno</label>
        <input type="text" id="materno" name="materno" value="<?php echo $nome_materno ?>" class="input-padrao">
        <span id="maternoError" class="error-message"></span>
      </div>

      <div class="box">
        <label id="labelCPF" class="container" >CPF</label>
        
        <input type="text" id="cpf" value="<?php echo $cpf ?>" name="cpf" class="input-padrao">
        
        <span id="cpfError" class="error-message"></span>
      </div>

      <div class="box">
        <label id="labelCel" class="container">Telefone Celular</label>
        <input type="text" id="cel"  name="cel"  value="<?php echo $telefone_celular ?>" class="input-padrao">
        <span id="celError" class="error-message"></span>
      </div>

      <div class="box">
        <label id="labelFixo" class="container">Telefone Fixo</label>
        <input type="text" id="fixo"  name="fixo" value="<?php echo $telefone_fixo?>"class="input-padrao">
        <span id="fixoError" class="error-message"></span>
      </div>

      <div class="box">
        <label id="labelEnde" class="container">Endereço Completo</label>
        <input type="text" id="endereco" value="<?php echo $endereco ?>" name="endereco" class="input-padrao">
        <span id="enderecoError" class="error-message"></span>
      </div>

      <div class="box">
        <label id="labelLogin" class="container">Login</label>
        <input type="text" id="login"value="<?php echo $login ?>" name="login" class="input-padrao">
        <span id="loginError" class="error-message"></span>
      </div>

      <div class="box">
        <label id="labelSenha" class="container">Senha</label>
        <input type="text" id="senha" value="<?php echo $senha ?>" name="senha"  class="input-padrao">
        <span id="senhaError" class="error-message"></span>
      </div>

      <div class="box">
        <label id="labelConfi" class="container">Confirme sua Senha</label>
        <input type="text" id="confirm" name="confirme" value="<?php echo $confirme_senha ?>" class="input-padrao">
        <span id="confirmeError" class="error-message"></span>
      </div>

      <br>
      <input type="hidden" name="id" value="<?php echo $usu_id ?>">
      <input id="update" type="submit" name="update" value="Enviar" onClick="validaForm()" />
      <input type="button" id="limpar" value="Limpar">

    </form>
   
    <footer class="rodape">
      <p>&copy; 2023 CPaaS Telecall. Todos os direitos reservados.</p>
    </footer>
</body>

</html>
