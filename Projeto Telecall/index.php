    <?php 
    session_start();
    //print_r($_SESSION);
   

    if((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        header('Location: login.php');

    }
    $logado = $_SESSION['login'];
    
// Verificar se o usuário está logado
if (isset($_SESSION['login']) && isset($_SESSION['senha'])) {
  // Conectar ao banco de dados e buscar informações do usuário
  include_once('conectar.php');
  $login = $_SESSION['login'];
  $senha = $_SESSION['senha'];

  $sql = "SELECT * FROM usuarios WHERE usu_login = '$login' and usu_senha = '$senha'";
  $result = $conn->query($sql);

  if ($result->num_rows == 1) {
    $usuario = $result->fetch_assoc();

    // Verificar se o usuário é um "master" (você pode usar o campo 'access_level_id' ou outro campo relevante)
    if ($usuario['access_level_id'] == 1) {
      // O usuário é "master", pode continuar
      $logado = $login;
    }   
} 
}

    ?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


  <title>CPaaS Telecall &#8211; Os melhores serviços de CPaaS</title>
  <style>
   body {
                        background-color: #ffff;
                      
                        font-size: 20px;
                        margin-top: 140px;
                        text-align: center;

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
                        height:80px;
                        left: -44%;
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
                        padding: 0px 30px;
                        position: relative;
                        left: 77px;
                        margin-bottom: 20%;
                      }

                      a:hover {
                        color: #2e71bd;
                        opacity: 20px;
                      }
                      a[id="link-1"]{
                    color: #000;
                    opacity: 20px;
                    text-decoration: none;
                  }
                      a:hover[id="link-1"]{
                        color: #fafafa;
                        opacity: 20px;
                      }
                      button{
                        border-radius: 28px;
                        padding: 8px 12px;
                        background-color:  #2e71bd;
                        border: none;
                        font-weight: bold;
                        font-size: 12px;
                        color:#ffff;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        cursor: pointer;
                      }
                      button[id="botao-1"]{
                        border-radius: 27px;
                        padding: 9px 1px;
                        background-color:  #1f34ad;
                        margin-top: 1%;
                        margin-right: 18%;
                        border: none;
                        font-weight: bold;
                        font-size: 20px;
                        color:#ffff;
                        display: flex;
                        cursor: pointer;
                      }
                      button[id="botao-2"]{
                        border-radius: 27px;
                        padding: 9px 1px;
                        background-color: #1f34ad;
                        margin-top: 20px;
                        margin-right: 50%;
                        border: none;
                        font-weight: bold;
                        font-size: 20px;
                        color:#ffff;
                        display: flex;
                        cursor: pointer;
                      }

                      .Main-sobre {
                          display: flex;
                          align-items: center;
                          justify-content: space-between;
                          background-color: #ffffff;
                        }
                        
                        .Main-sobre img {
                          width: 750px;
                          height: auto;
                        
                        }
                        
                        .text-container {
                          display: flex;
                          flex-direction: column;
                          margin-left: 10%;
                          
                          
                        }
                        
                        .text-container h1 {
                          font-size: 70px;
                          color: #1f34ad;
                          margin-top: 50px;
                        
                        }
                        .text-container h3 {
                          font-size: 25px;
                          color: #020001;
                          margin-top: -5px;
                          
                      
                          
                        }
                        .teste{
                          background: #191919;
                          width: 100%;
                          
                          
                          
                        }
                        .text-sobre {
                        width: 20%;
                        margin-left: 65%;



                        }
                        
                        .text-sobre h2 {
                          color: #cbccd6;
                          font-size: 44px;
                          text-transform: capitalize;
                          margin-left:15% ;
                          padding-top: 60px;
                        
                        }
                        .Icp img{
                          width: 600px;
                          height: auto;
                          margin-right: 1000px;
                          margin-top: -550px;
                      }

                        
                        .text-sobre p {
                          letter-spacing: 3px;
                          line-height: 30px;
                          font-weight: inherit;
                          color: #fff;
                          margin-top: 5%;
                          padding-left: 55px;
                          font-size: small;
                        }
                        .servicos{
                          margin-left: -87%;
                          margin-top: 50px;
                        }

                        .servicos h1{
                          color: #1f34ad;
                          font-size: 30px;
                          text-transform: capitalize;
                          text-decoration: underline,#1f34ad;
                      }
                      .card {
                          width: 300px;
                          height: 550px;
                          border: 1px solid #ccc;
                          padding: 20px;
                          margin-left: 10%;
                          margin-top: 2%;
                          float: left;
                          box-shadow: 3px 3px 1px 0px #645f5fa4;
                          background-color: #ffffff80;
                      }

                      p{
                        font-size: 14px;
                        margin-top: 2%;
                        margin-bottom: 5%;  
                        text-decoration: #000;
                      }
                      .card2 p{
                        font-size: 12px;
                        margin-top: 2%;
                        margin-bottom: 5%;
                        
                      }
                      .card h2{
                          font-size: 20px;
                      }
                      .card h2:hover{
                          color: #2e71bd;
                          opacity: 20px;
                      }
                      .card1 h2{
                          font-size: 20px;
                      }
                      .card1 h2:hover{
                          color: #2e71bd;
                          opacity: 20px;
                      }
                      .card2 h2{
                          font-size: 20px;
                      }
                      .card2 h2:hover{
                          color: #2e71bd;
                          opacity: 20px;
                      }

                      .card1 {
                          width: 300px;
                          border: 1px solid #ccc;
                          height: 550px;
                          padding: 20px;
                          padding-bottom: 60px;
                          margin-left: 6%;
                          margin-top: 2%;
                          float: left;
                          box-shadow: 3px 3px 1px 0px #645f5fa4;
                          background-color: #ffffff80;
                      }
                      .card2 {
                          width: 300px;
                          height: 550px;
                          border: 1px solid #ccc;
                          padding: 22px;
                          padding-bottom: 50px;
                          margin-left: 5%;
                          margin-top: 2%;
                        
                          float: left;
                          box-shadow: 3px 3px 1px 0px #645f5fa4;
                          background-color: #ffffff80;
                      }
                      .big{
                          width: 200px;
                          height: auto;
                          padding-top:2% ;
                          margin-left: 15%;
                      }
                      .big2{
                          width: 100px;
                          height: auto;
                          padding-top:11% ;
                          margin-left: 27%;
                      }
                      .big3{
                          width: 150px;
                          height: auto;
                          padding-top:13% ;
                          margin-left: 2%;
                      }
                      .big4{
                          width: 150px;
                          height: auto;
                          padding-top:22% ;
                        
                      }
                      .rodape {
                        background-color: #333;
                        color: #fff;
                        padding: 5px;
                        text-align: center;
                        margin-top: 35%;
                        height: 100px;
                      
                      }
                      .rodape p{
                        font-size: 17px;
                      }

                      a[id="sair"]{
                          position: relative; 
                          left: 800%;
                          top: -73px;
                        }
                          nav label{
                            position: relative;
                            left: 55%;
                          }
                          
                        


                  @media (max-width: 768px) {
                    
                    header{
                      background-color: #fff;
                    }
                    header img {
                      margin-top: -18px;
                      margin-left: 40px;
                      width: 350px;
                      background-color: #fff;
                    }
                    button[id="botao-1"],
                    button[id="botao-2"]{
                    display: none;
                    }
                      
                    

                    .Main-sobre img {
                    width: 350px;
                    margin-left: -350px;
                    margin-top: 100%;
                  
                    }
                    .text-container h1 {
                      font-size: 50px;
                      color: #1f34ad;
                      margin-bottom: 20px;
                    }
                    
                    .text-container h3 {
                      font-size: 20px;
                      color: #020001;
                      margin-top: 0;
                      margin-bottom: 150px;
                    }
                  
                  
                  
                    .Icp img{
                    display: none;

                    }
                    nav {
                    display: none;
                    }

                    .text-sobre {
                      width: 80%;
                      padding-left: 4%;
                      margin-top: 3%;
                    }

                    .servicos {
                      width: 80%;
                      padding-left: 10%;
                      margin-top: 8%;
                    }

                    .card,
                    .card1,
                    .card2 {
                      width: 80%;
                      margin-left: 20px;
                      margin-top: 10%;
                    }
                  p{
                    font-size: 15px;
                  }
                    .big,
                    .big2,
                    .big3,
                    .big4 {
                      margin-left: 20%;
                    }
                    .rodape {
                      background-color: #333;
                      color: #fff;
                      padding: 5px;
                      text-align: center;
                      margin-top: 600%;
                      height: 100px;
                    
                    }
                    
                    .rodape p {
                      margin-top: 13%;
                    
                    }
}



  

  </style>
</head>

<body>
  <script src="JS/index.js"></script>
  <header>
    <img src="img/cropped-navbartelecall-e1664888635140.png" alt="Telecall">
    <nav id="nav">
      <ul id="menu">
        <li><a href="#about">PRODUTOS</a></li>
        <li><a href="2fa.php">2FA</a></li>
        <li><a href="index.html">MODELO BD</a></li>
        <?php
        // Verifica se a variável $usuario está definida e se o nível de acesso é 1
        if (isset($usuario) && $usuario['access_level_id'] == 1) {
            echo '<li><a href="sistema.php">CONSULTA DE USUÁRIO</a></li>';
        } else {
            echo '<li><a href="index.html">CADASTRO</a></li>';
            echo '<li><a href="index.html">LOJA</a></li>';
        }

        if (!isset($usuario)) {
            echo '<li><a href="login.php">FAÇA LOGIN</a></li>';
            // Ou você pode mostrar uma mensagem convidando o usuário a fazer login
            // echo '<li><a href="login.php">FAÇA LOGIN PARA ACESSAR</a></li>';
}
?>

        


        <?php
      echo "<label class='btn btn-primary'>";
      echo "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='20' fill='currentColor' class='bi bi-person btn-bi ' viewBox='0 0 16 16'>";
      echo "<path d='M12.635 14.822c-1.408-0.426-3.175-1.272-4.635-2.352C6.275 13.55 4.408 14.396 3 14.822a.5.5 0 0 0-.282.59C3.324 16.09 4.145 17 5 17h6c.855 0 1.676-0.91 1.282-1.588a.5.5 0 0 0-.282-0.59z'/>";
      echo "<path d='M8 9a2.5 2.5 0 0 0 2.5-2.5A2.5 2.5 0 0 0 8 4a2.5 2.5 0 0 0-2.5 2.5A2.5 2.5 0 0 0 8 9m0 2a3.5 3.5 0 0 0 3.5-3.5A3.5 3.5 0 0 0 8 5.5A3.5 3.5 0 0 0 4.5 9.5A3.5 3.5 0 0 0 8 11z'/>";
      echo "</svg>";
      echo "$logado";
      echo "</label>";
      

?>

      </ul>
     
      <div class="d-flex">
        <a href="sair.php"    id="sair"  class="btn  btn-light  ">Sair</a>
  
        </div>
      </a>
    </nav>
  </header>

  <section class="frist">

    <div class="Main-sobre">
      <div class="text-container">
        <h1>CPaas Plat<span>form</span></h1>
        <h3>O futuro da comunicação já chegou!</h3>
        <button id="botao-1">
          <a id="link-1" href="cadastro.html" target="_blank">CADASTRE-SE E TESTE GRATUITAMENTE</a>
        </button>
        <button id="botao-2">
          <a id="link-1" href="#about">NOSSOS SERVIÇOS</a>
        </button>

      </div>



      <img
        src="img/Sangoma_Illustration-Enrich-your-business-applications-with-communications-platform_1920-X-1080-Px_JN_25-June_21_V01-01-e1624894914309.png">
    </div>


    <section class="teste">
      <div class="text-sobre">

        <h2>O que é CPaaS?</h2>
        <p>CPaaS é uma plataforma que permite às empresas integrar canais de comunicação em tempo real em seus
          aplicativos
          web e móveis existentes. Quando uma ação é iniciada, por exemplo, para fazer uma nova reserva, tentar fazer um
          login, registrar uma atualização para uma jornada de prestação ou reconhecimento de um compromisso próximo em
          uma agenda, a solução CPaaS irá acionar o contato desejado através do canal de comunicação preferido.</p>
      </div>
      <div class="Icp">
        <img src="img/Sangoma_llustration_1920x1080_01-Jul-2021_V1_R1-02-e1625673315418.png">
      </div>
    </section>
    <section class="servicos" id="about">
      <h1>Serviços</h1>
    </section>
    <div class="card">
      <h2>2FA</h2>
      <img class="big" src="img/Projeto 1.png">
      <p> Como funciona? Usuário acessa seu site ou aplicativo e digita a senha cadastrada para entrar em seu perfil ou
        completar uma transação.
        A Telecall recebe a tentativa de login e solicita que o usuário insira seu número de telefone para autorizar o
        acesso.

        Após inserir seu número, a Telecall envia para o usuário por SMS ou chamada de voz um código PIN de uso único.

        O usuário insere o código no site ou aplicativo para concluir o processo de verificação.</p>
    </div>
    <div class="card" id="part2">
      <h2>Número Máscara</h2>
      <img class="big2" src="img/images.png">
      <p>Usuário faz uma chamada através de um aplicativo.

        Ex.: usuário liga para o entregador ou motorista de taxi ou entra em contato com a central de atendimento.

        Plataforma mascara o número original.

        A plataforma recebe a chamada e mascara o número antes de conectar o destinatário.

        Ambas as partes são conectadas.

        A plataforma conecta ambas as partes mantendo a privacidade dos dois.</p>
    </div>

    <div class="card2">
      <h2>Google Verified Calls</h2>
      <img class="big3" src="img/25179.png">

      <p>
        O objetivo do serviço de chamadas verificadas do Google é aumentar a confiança nas empresas que entram em
        contato com os clientes. Isso é importante devido ao alto número de spams e fraudes telefônicas, que prejudicam
        a confiança nas empresas e aumentam os custos para os consumidores. O serviço exibe informações como o nome da
        pessoa que ligou, o logotipo da empresa, o motivo da chamada e um símbolo de verificação para indicar que a
        empresa foi autenticada pelo Google. É importante ressaltar que o Google não coleta nem armazena informações
        pessoais após a verificação.</p>

    </div>

    <div class="card1">
      <h2>Gerenciamento de Campanha</h2>
      <img class="big4" src="img/download.png">
      <p>É muito provável que você já tenha recebido uma
        mensagem de texto de uma empresa ou organização.

        Com as APIs de CPaaS Telecall, qualquer empresa pode enviar mensagens de texto ou voz e impactar clientes,
        prospects ou fornecedores como parte de seu processo comercial.

        Com essa ferramenta, você envia mensagens de SMS ou de voz com as informações que o seu cliente precisa e com a
        segurança, a velocidade e a confiabilidade que você espera.</p>
    </div>

  </section>


  <footer class="rodape">
    <p>&copy; 2023 CPaaS Telecall. Todos os direitos reservados.</p>


  </footer>

</body>

</html>