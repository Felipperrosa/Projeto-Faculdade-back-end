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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  
  <link rel="stylesheet"
  href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
<title>Cadastro</title>
<style>
  
  @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
* {
  font-family: 'Roboto', sans-serif;
}
 



body {
  background-color: #ffff;
  color: #2e71bd;
  font-size: 20px;
  margin-top: 5px;
 

}



  
  .form{
    width: 150%;
    position: relative;
    margin-top: -10px;
  
  }
h1{
  text-align: center;
  font-size: 40px;
  margin-bottom: 25px;
  color: #2667b1
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
  }
  
  </style>

</head>

<body>
<a class="btn btn-primary " href="sistema.php" role="button">Voltar</a>
  <script src="JS/cadastro.js"></script>
        </button>
        
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
