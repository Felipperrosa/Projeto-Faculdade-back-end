<?php
session_start();

$logado = false;

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

        // Se o usuário está logado, definir $logado como o nome de usuário
        $logado = $login;
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Modelo BD</title>
<style>
        body {
                        background-color: #ffff;
                      
                        font-size: 18px;
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
                        height: 80px;
                        left: -44%;
                        object-fit: cover;

                      }

                      nav {
                        position: absolute;
                        display: flex;
                        align-items: center;
                        justify-content: flex-start;
                        margin-left: 24%;
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

                      a[id="sair"]{
                          position: relative; 
                          left: 930%;
                          top: -85px;
                        }
                      
                          nav label{
                            position: relative;
                            left: 55%;
                          }
                          .rodape {
                      background-color: #333;
                      color: #fff;
                      padding: 5px;
                      text-align: center;
                      margin-top: 1%;
                      height: 100px;
                    
                    }

                  @media (max-width: 768px) {
                    
                    body {
                      overflow-x: hidden;
                  }
                  .hidden-on-small-screen {
                         display: none;
                    }
                  header{
                    background-color: #fff;
                  }
                  header img {
                    margin-top: -18px;
                    margin-left: 150px;
                    width: 350px;
                    background-color: #fff;
                  }
                  button[id="botao-1"],
                  button[id="botao-2"]{
                  display: none;
                  }
                    
                  nav ul li a{
                    color: #CA1C2A;
                    margin-top: 50px;
                    margin-left: -50px;
                    
                  }
                 



                }              

    </style>
</head>
<body>
<header>
    <img src="img/cropped-navbartelecall-e1664888635140.png" alt="Telecall">
    <nav id="nav">
      <ul id="menu">
        
      <?php
        // Verifica se a variável $usuario está definida
        if (isset($usuario)) {
            // Verifica se o nível de acesso é 1 (usuário master)
            if ($usuario['access_level_id'] == 1) {
                echo '<li class="hidden-on-small-screen"><a href="sistema.php">PRODUTOS</a></li>';
                echo '<li class="hidden-on-small-screen"><a href="sistema.php">2FA</a></li>';
                echo '<li class="hidden-on-small-screen"><a href="sistema.php">MODELO BD</a></li>';
                echo '<li class="hidden-on-small-screen"><a href="sistema.php">CONSULTA DE USUÁRIO</a></li>';
            }
            // Verifica se o nível de acesso é null (usuário comum)
            elseif ($usuario['access_level_id'] === null) {
                echo '<li class="hidden-on-small-screen"><a href="#about">PRODUTOS</a></li>';
                echo '<li class="hidden-on-small-screen"><a href="perfil.php">PERFIL</a></li>';
                echo '<li class="hidden-on-small-screen"><a href="sistema.php">MODELO BD</a></li>';
                echo '<li class="hidden-on-small-screen"><a href="sistema.php">CONSULTA DE CLIENTES</a></li>';
               
            }
        } else {
            // Se não houver usuário, trata-se de um convidado
            echo '<li class="hidden-on-small-screen"><a href="#about">PRODUTOS</a></li>';
            echo '<li class="hidden-on-small-screen"><a href="modelobd.php">MODELO BD</a></li>';
            echo '<li class="hidden-on-small-screen" ><a href="sistema.php">CONTATO</a></li>';
            echo '<li><a href="cadastro.php" target="_blank">CADASTRE-SE</a></li>';
            echo '<li><a href="login.php">LOGIN</a></li>';
            
            // Ou você pode mostrar uma mensagem convidando o usuário a fazer login
            // echo '<li><a href="login.php">FAÇA LOGIN PARA ACESSAR</a></li>';
        }
        ?>

        <?php
      if ($logado) {
        echo "<label class='btn btn-primary'>";
        echo "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='20' fill='currentColor' class='bi bi-person btn-bi' viewBox='0 0 16 16'>";
        echo "<path d='M12.635 14.822c-1.408-0.426-3.175-1.272-4.635-2.352C6.275 13.55 4.408 14.396 3 14.822a.5.5 0 0 0-.282.59C3.324 16.09 4.145 17 5 17h6c.855 0 1.676-0.91 1.282-1.588a.5.5 0 0 0-.282-0.59z'/>";
        echo "<path d='M8 9a2.5 2.5 0 0 0 2.5-2.5A2.5 2.5 0 0 0 8 4a2.5 2.5 0 0 0-2.5 2.5A2.5 2.5 0 0 0 8 9m0 2a3.5 3.5 0 0 0 3.5-3.5A3.5 3.5 0 0 0 8 5.5A3.5 3.5 0 0 0 4.5 9.5A3.5 3.5 0 0 0 8 11z'/>";
        echo "</svg>";
        echo "$logado";
        echo "</label>";
    }
      

?>
      </ul>
     
      <div class="d-flex">
      <?php
        if ($logado) {
          echo '<a href="sair.php" id="sair" class="btn btn-light ">Sair</a>';
         
        }
        ?>
        </div>
      </a>
    </nav>
  </header>
    
  <div class="modelo" >
        <img src="img/Modelo Bd.png" alt="" width="1500">
      </div>
      
      <footer class="rodape">
    <p>&copy; 2023 CPaaS Telecall. Todos os direitos reservados.</p>


  </footer>
    
</body>
</html>