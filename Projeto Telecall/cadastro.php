<?php
if(isset($_POST['sbt'])) {
    include_once('conectar.php');

    function validar_dados($dados) {
        $erros = array();

        $campos_obrigatorios = array('nome', 'datanasc', 'sexo', 'materno', 'cpf', 'cel', 'fixo', 'endereco', 'login', 'senha', 'confirme');
        foreach ($campos_obrigatorios as $campo) {
            if (empty($dados[$campo])) {
                $erros[] = "*O campo $campo é obrigatório.*";
            }
        }

        if (strlen($dados['nome']) < 15 || strlen($dados['nome']) > 80 || !preg_match('/^[A-Za-z ]+$/', $dados['nome'])) {
          $erros[] = "*O campo nome deve ter entre 15 e 80 caracteres alfabéticos.*";
      }

        $regex_telefone = "/^\(\+55\)\d{2}-\d{9}$/";
        if (!preg_match($regex_telefone, $dados['cel']) || !preg_match($regex_telefone, $dados['fixo'])) {
            $erros[] = "*Os campos Celular e Fixo devem ter o formato (+55)XX-XXXXXXXX.*";
        }

        if (strlen($dados['login']) !== 6 || !ctype_alpha($dados['login'])) {
            $erros[] = "*O campo Login deve ter exatamente 6 caracteres alfabéticos.*";
        }

        if (strlen($dados['senha']) !== 8 || !ctype_alpha($dados['senha'])) {
            $erros[] = "*O campo Senha deve ter exatamente 8 caracteres alfabéticos.*";
        }

        if ($dados['senha'] !== $dados['confirme']) {
            $erros[] = "*Os campos Senha e Confirme devem ser iguais.*";
        }

        return $erros;
    }

    $erros = validar_dados($_POST);

    if (empty($erros)) {
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
    } else {
        // Exibir mensagens de erro com classes para estilização
        $mensagens_erro = $erros;
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
  color: #2667b1;
}
form {
  position: flex;
  width: 1000px;
  padding: 15px 40px 40px;
  border: 1px solid #ccc;
  border-radius: 5px;
  background-color: #fff;
  margin-top: 50px;
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

input[id="botao-2"] {

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

input[id="botao-2"]:hover {
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
 
 form{
  width: 400px;
 }

 input[type="date"]{
  width: 48%;
 }

 input[id="limpar"]{

  margin-left: -65px;
 }



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
    position: relative;
  
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
  background-color: #2667b1;
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
.menu-btn {
      background-color: #2667b1; /* Cor desejada para os botões do menu */
      padding: 10px;
      border: none;
      border-radius: 5px;
      margin-bottom: 10px; /* Adicione espaço entre os botões */
    }

    .menu-btn a {
      color: #ffffff; /* Cor do texto do link */
      text-decoration: none;
    }

    .menu-btn:hover {
      background-color: #1c4c89; /* Cor ao passar o mouse sobre o botão */
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
    position: relative;

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
<body>
</head>

  <header>
    <img src="img/cropped-navbartelecall-e1664888635140.png" alt="Telecall">
    <nav>
      <ul class="side">
        <li><a href="index.php">PRODUTOS</a></li>
        <li><a href="modelobd.php">MODELO BD</a></li>
        <li><a href="index.html">CONTATO</a></li>
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

    <button class="menu-btn">
        <a href="index.php">
            <span>
                <i class="material-symbols-outlined">home</i>
            </span>
            <span class="mobile-text">Produtos</span>
        </a>
    </button>

    <button class="menu-btn">
        <a href="modelobd.php">
            <span>
                <i class="material-symbols-outlined">tag</i>
            </span>
            <span class="mobile-text">Modelo BD</span>
        </a>
    </button>

    <button class="menu-btn">
        <a href="contato.html">
            <span>
                <i class="material-symbols-outlined">email</i>
            </span>
            <span class="mobile-text">Contato</span>
        </a>
    </button>

    <button class="menu-btn">
        <a href="login.php">
            <span>
                <i class="material-symbols-outlined">person</i>
            </span>
            <span class="mobile-text">Login</span>
        </a>
    </button>
</nav>

  </header>
  <?php
        if (!empty($mensagens_erro)) {
            echo '<div class="error-messages">';
            foreach ($mensagens_erro as $erro) {
                echo '<p class="error-message">' . $erro . '</p>';
            }
            echo '</div>';
        }
        ?>
  
  
  
  <div class="container">


      
    <form id="form" action="cadastro.php" method="POST" onsubmit="return validaForm()">
    
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
      <input id="botao-2" type="submit" name="sbt" value="Enviar">
      <input type="button" id="limpar" value="Limpar" onClick="limparForm()" />
      

    </form>
   
  <div class="rodape">
  <footer>
      <p>&copy; 2023 CPaaS Telecall. Todos os direitos reservados.</p>
    </footer>
  </div>
    <script src="JS/cadastro.js"></script>
</body>

</html>
