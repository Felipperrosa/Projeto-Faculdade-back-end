
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet"
  href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link rel="stylesheet" href="Styles/login.css">
  

  <title>Login</title>
</head>

<body>

  <header>
    <img src="img/cropped-navbartelecall-e1664888635140.png" alt="Telecall">
    <nav>
      <ul class="side">
        <li><a href="index.php">PRODUTOS</a></li>
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
  <div class='container'>
    <form id="form" action="testelogin.php" method="POST">

      <h1>Entrar</h1>
      <div class="box">
        <label id="labelLogin" class="container">Login</label>
        <input type="text" id="login" name=" login"   class="input-padrao">
        <span id="loginError" class="error-message"></span>
      </div>

      <div class="box">
        <label id="labelSenha" class="container">Senha</label>
        <input type="password" id="senha" name="senha" class="input-padrao"> 
        <span id="senhaError" class="error-message"></span>
        <i class="fa fa-eye senha-toggle" onclick="toggleSenhaVisibility()"></i>
      </div>


      <br>
      <input id="botao-2" type="submit" name="sbt" value="Enviar" >
      
     <input type="button" id="limpar" value="Limpar">


      <p> Não tem uma conta?
        <a href="cadastro.php" target="_blank"> Cadastre-se </a>
      </p>
    </form>



  </div>
  </div>
  <footer class="rodape">
    <p>&copy; 2023 CPaaS Telecall. Todos os direitos reservados.</p>
  </footer>

</body>

</html>