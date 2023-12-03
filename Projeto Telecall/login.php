
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
 
  

  <title>Login</title>
  <style>
          @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
      * {
        font-family: 'Roboto', sans-serif;
      }
      
      body {
        background-color: #ffffff;
        align-items: center;
        color: #2667b1;
        font-size: 18px; 
        margin-top: 110px;
        
      }
      img{
        position: relative;
        top: -15px;
        height:80px !important;
        left:43%;
        object-fit: cover;
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
        p{
          color: #2667b1;
          font-size: 14pt;
          text-align: center;
          margin-top: 30px;
        }
        a{
          color: #e01d2d;
          margin-top: 20px;
          font-weight: bold;
          text-decoration: none;
          transition: all .3s ease-out;
        }
        form {
          width: 500px;
          padding: 15px 40px 40px;
          border: 1px solid #ccc;
          border-radius: 5px;
          background-color: #fff;
          margin-top: 25px;
          margin-left: 400px;
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
          position: flex;
          margin-left: 16%;
          margin-top: -50px;
          transition: all .2s ease-out;
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
          margin-left: 15%;
          transition: all .2s ease-out;
        }
        .fa-eye {
        position: flex;
        top: 0%;
        right: 30px;
        transform: translateY(-50%);
        cursor: pointer;
        color: #2667b1;
        }
      .fa-eye-slash{
        position: absolute;
        top: 50%;
        right: 30px;
        transform: translateY(-50%);
        cursor: pointer;
        color: #2667b1;
      }


        input[id="botao-2"]:hover {
          background-color: #af0e1b ;
          border-color:  #af0e1b  ;
        }
        input[id="limpar"]:hover {
          background-color: #af0e1b ;
          border-color:  #af0e1b  ;
        }
        

        
        input[type="text"],
        input[type="password"] {
          border: 1px solid #ccc;
          padding: 5px;
          display: flex;
          width: 100%;
          box-sizing: border-box;
          border-radius: 2px;
          background-color: #a9bae64a;

        }
        input[type="text"]:focus,
        input[type="password"]:focus {
          outline: none;
        }
        
        
        label {
          display: flex;
          margin-bottom: 5px;
        
        }
        .box {
          position: flex;
          padding-bottom: 10px;
        }
        
        .error-message {
          color: red;
          font-size: 15px;
          position: block;
          bottom: 0;
          left: 0;
          top: 44%;
        }
        
        .error-label {
          color: red;
        }
      .rodape p{
        color: #2667b1;
        margin-top: 2%;

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
        img{

        height:80px !important;
        left:25%;
        
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
       
        margin-left: 32px;
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
          margin-top: 4%;
          background: transparent;
          color: #000;
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
  
  <img src="img/Só O LOGO.png" alt="Telecall">
  <div class='container'> 
    
<form id="form" action="testelogin.php" method="POST" onsubmit="return validaLogin(event)">
         
      <h1>Entrar</h1>
      <div class="box">
        <label for="login" id="labelLogin" class="container">Login</label>
        <input type="text" id="login" name="login" class="input-padrao">
        <span id="loginError" class="error-message"></span>
      </div>

      <div class="box">
        <label for="senha" id="labelSenha" class="container">Senha</label>
        <input type="password" id="senha" name="senha" class="input-padrao">
        <span id="senhaError" class="error-message"></span>
        <i class="fa fa-eye senha-toggle" onclick="toggleSenhaVisibility()"></i>
      </div>

      <br>
      <input id="botao-2" type="submit" name="sbt" value="Enviar"/>
      <input type="button" id="limpar" value="Limpar" onClick="limparForm()" />

      <p> Não tem uma conta?
      <a href="cadastro.php" target="_blank"> Cadastre-se </a>

      </p>
    </form>
  </div>

  <footer class="rodape">
    <p>&copy; 2023 CPaaS Telecall. Todos os direitos reservados.</p>
  </footer>
 <script src="js/login.js"></script>
</body>

</html>
