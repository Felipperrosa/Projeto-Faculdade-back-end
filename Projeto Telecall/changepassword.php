<?php 
  if (!empty($_GET['id'])) {
      include_once('conectar.php');
  
      $usu_id = $_GET['id'];
  
      $sqlSelect = "SELECT * FROM usuarios WHERE usu_id=$usu_id";
  
      $result = $conn->query($sqlSelect);

  
      if ($result->num_rows > 0) {
          while ($user_data_Comum = mysqli_fetch_assoc($result)) {
              $senha = $user_data_Comum['usu_senha'];
              $confirme_senha = $user_data_Comum['usu_confirmarsenha'];
          }
      } else {
          header('location: changepassword.php');
      }
  }

  // Inicializa o array de erros
  $erros = array();

  // Verifica se o formulário foi enviado
  if (isset($_POST['update'])) {
      // Obtém as senhas do formulário
      $senhaNova = $_POST['senha'];
      $confirmeSenha = $_POST['confirme'];

      // Verifica se a senha tem exatamente 8 caracteres alfabéticos
      if (strlen($senhaNova) !== 8 || !ctype_alpha($senhaNova)) {
          $erros[] = "O campo Senha deve ter exatamente 8 caracteres alfabéticos.";
      }

      // Verifica se as senhas são iguais
      if ($senhaNova !== $confirmeSenha) {
          $erros[] = "Os campos Senha e Confirme devem ser iguais.";
      }

      // Se não houver erros, pode prosseguir com o restante do código para atualizar no banco de dados
      if (empty($erros)) {
          // ...

          // Exemplo: Atualizar no banco de dados
          $sqlUpdate = "UPDATE usuarios SET usu_senha='$senhaNova', usu_confirmarsenha='$confirmeSenha' WHERE usu_id=$usu_id";
          $conn->query($sqlUpdate);

          // Redirecionar para a página de perfil ou outra página desejada
          header('location: perfil.php');
      }
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  
<title>Cadastro</title>

 <style>@import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
* {
  font-family: 'Roboto', sans-serif;
}
 



body {
  background-color: #ffff;
  color: #2e71bd;
  font-size: 20px;
  margin-top: 140px;
 

}

header {
  background-color: #CA1C2A;
  color: #fff;
  padding: 20px;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 78px;

}

header img {
  position: relative;
  top: -22px;
  height:80px !important;
  left:-20px;
  object-fit: cover;

}

nav {
  position: absolute;
  display: flex;
  align-items: center;
  justify-content: flex-start;
  margin-left: 27%;
  top: 25%;


}


nav ul li a {
  color: #ffff;
  text-decoration: none;
  font-weight: lighter;
  text-transform: capitalize;
  font-family: sans-serif;
  font-size: 13px;
  transition: all 0.35s;
    text-decoration: none;



}

nav ul li {
  display: inline-block;
  padding: 0px 47px;
  position: relative;
  left: 120px;
  margin-bottom: 20%;
}

a:hover {
  color: #2e71bd;
  opacity: 20px;
}

  
  .form{
    width: 150%;
    position: relative;
  
  }
h1{
  text-align: center;
  font-size: 40px;
  margin-bottom: 25px;
  color: #2667b1
}
form {
  position: flex;
  width: 500px;
  padding: 15px 40px 40px;
  border: 1px solid #ccc;
  border-radius: 5px;
  background-color: #fff;
  margin-top: 0px;
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
  left: 35%;
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
  margin-left: 15%;

  transition: all .2s ease-out;
}

input[id="limpar"]:hover {
  background-color: #af0e1b ;
  border-color:  #af0e1b  ;
}


.nome-materno {
  margin-top: 1em;
  

}

input [type="radio"]{
  padding: 10px;
}

input[type="text"],
input[type="password"] {
  border: 1px solid #ccc;
  padding: 5px;
  display: block;
  width: 100%;
  height: -80px;
  box-sizing: border-box;
  border-radius: 3px;
  background-color: #a9bae64a;
}
input[type="text"]:focus,
input[type="password"]:focus,
input[type="date"]:focus {
  outline: none;
}


input[type="date"] {
  padding: 0.8em;
  padding: 5px;
  border-radius: 1px;
  border: 1px solid  #ccc;
  width: 35%;
  box-sizing: border-box;
  margin-bottom: 1em;
  background-color: #a9bae64a;
  color: #2667b1;

}

label {
  display: block;
  margin-bottom: 5px;

}
.box {
  padding-bottom: 10px;
}



.menu-mobile{
  display: none;
}
.menu .menu-mobile-active{
  display: none;
;
}
.button-mobile{
  display: none;
}
.rodape p {
  position: relative;
  padding: 10px;
  text-align: center;
  margin-top: 50px; 
}

@media (max-width : 920px){
 
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

form{
  width: 400px;

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
    margin-left: 250px;
    margin-top: 7%;
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
   

  .error-messages {
    background-color: #ffdddd; /* Fundo vermelho claro para mensagens de erro */
    border: 3px solid #ff9999; /* Borda vermelha para indicar erro */
    padding: 10px;
    width: 400px;
    margin-top: 20px;
    margin-left: 39%;
  }
  
  .error-message {
    color: #ff0000; /* Texto vermelho para mensagens de erro */
    margin-left: 70px;
   
    font-size: small;
  }</style>
 
</head>

<body>

  <script src="JS/cadastro.js"></script>
  <header>
    <img src="img/cropped-navbartelecall-e1664888635140.png" alt="Telecall">
    <nav>
      <ul class="side">
        <li><a href="index.php">PRODUTOS</a></li>
        <li><a href="index.html">LOJAS</a></li>
        <li><a href="perfil.php">PERFIL</a></li>
        <li><a href="modelo.php">MODELO BD</a></li>
        <li><a href="index.html">CONSULTA DE CLIENTES</a></li>
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


     <form id="form" action="saveEditcomum.php" method="POST">
        <!-- Exibição de erros -->
        <?php
        if (!empty($erros)) {
            echo '<ul>';
            foreach ($erros as $erro) {
                echo "<li>$erro</li>";
            }
            echo '</ul>';
        }
        ?>


      <h1>Troque sua senha</h1>
      
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
      
      <input id="update" type="submit" name="update" value="Enviar">


    </form>
   
    <footer class="rodape">
      <p>&copy; 2023 CPaaS Telecall. Todos os direitos reservados.</p>
    </footer>
</body>

</html>
