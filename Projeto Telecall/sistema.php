<?php
session_start();
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
      
    } else {
      // O usuário não é "master", redirecione para a página de login
      header('Location: login.php');
      exit;
    }
  } else {
    // Dados de login inválidos, redirecione para a página de login
    header('Location: login.php');
    exit;
  }
} else {
  // Usuário não está logado, redirecione para a página de login
  header('Location: login.php');
  exit;
}
if(!empty($_GET['search']))
  {
    $data = $_GET['search'];
    $sql = "SELECT * FROM usuarios WHERE usu_id LIKE '%$data%' OR usu_nome LIKE '%$data%' OR usu_cpf LIKE '%$data%' ORDER BY usu_id DESC";


  }
  else
  {
   $sql = "SELECT * FROM usuarios ORDER BY usu_id DESC";
  }


$result = $conn->query($sql);
//print_r($result);



?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Sistema</title>

  <style>
    body {
      background-color: #ffff;
      color: #2667b1;
      font-size: 20px;
      margin-top: 0px;
      text-align: center;
     

    }

    header {
      background-color: #CA1C2A;
      color: #fff;
      padding: 20px;
      position: relative;
      top: 0px;
      left: 0;
      width: 100%;
      height: 56px;

    }
    h1{
      margin-top: 80px;
    } 
    header img {
      position: relative;
      top: -22px;
      height: 58px;
      left: -46%;
      object-fit: cover;

    }

    nav {
      position: absolute;
      display: flex;
      align-items: center;
      justify-content: flex-start;
      margin-left: 26%;
      top: 18%;


    }


    nav ul li a {
      color: #ffff;
      text-decoration: none;
      font-weight: lighter;
      text-transform: capitalize;
      font-family: sans-serif;
      font-size: 13px;
      transition: all 0.35s;



    }

    nav ul li {
      display: inline-block;
      padding: 0px 30px;
      padding-left: 70px;
      margin-bottom: 20%;
    }

    a:hover {
      color: #2e71bd;
      opacity: 20px;
    }

  
   .table{

    margin-top: 2%;
    font-size:medium;
    background: rgb(0, 0, 0, 0.6);
    width: 100%;
    border-radius: 15px 15px 0 0;
  
   } 

   a[id="botao-2"]{
    margin-left: 450px;
   }
    .box-search{
      display: flex;
      justify-content: center;
      margin-top: 250px;
      gap: .1%;


    }
    .rodape p {
  position: relative;
  padding: 10px;
  text-align: center;
  margin-top: 1000px; 
}
    @media (max-width : 920px){
 
  nav{
    display:none;
  }
     
  .table{
        width: 80%;
      }


    }

    .rodape p{
      margin-top: 1100px;
    }








    </style>



</head>

<body>
  <header>
    <img src="img/cropped-navbartelecall-e1664888635140.png" alt="Telecall">
    <nav>
      <ul class="side">
        <li><a href="index.php">PRODUTOS</a></li>
        <li><a href="index.html">2FA</a></li>
        <li><a href="index.html">MODELO BD</a></li>
        <li><a href="sistema.php">CONSULTA DE USUÁRIO</a></li>
        <a href="sair.php"    id="botao-2"      class="btn  btn-light  ">Sair</a>
 
      </ul>
  </nav>


     
      <div>
      
              <div class="box-search">

        <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar" >
        <button  onclick="searchData()" class="btn btn-primary">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
        </svg>
        </button>

        </div>


        <table class="table text-white table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nome</th>
              <th scope="col">Data de Nascimento</th>
              <th scope="col">Sexo</th>
              <th scope="col">Nome Materno</th>
              <th scope="col">CPF</th>
              <th scope="col"> Telefone Celular</th>
              <th scope="col"> Telefone Fixo</th>
              <th scope="col"> Endereço</th>
              <th scope="col"> Login</th>
              <th scope="col"> Senha</th>
              <th scope="col"> Confirmar Senha</th>
              <th scope="col"> ...</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            
            while($user_data = mysqli_fetch_assoc($result))
            {
              echo "<tr>";
              echo "<td>".$user_data['usu_id']."</td>";
              echo "<td>".$user_data['usu_nome']."</td>";
              echo "<td>".$user_data['usu_dataNacs']."</td>";
              echo "<td>".$user_data['usu_sexo']."</td>";
              echo "<td>".$user_data['usu_nomeMaterno']."</td>";
              echo "<td>".$user_data['usu_cpf']."</td>";
              echo "<td>".$user_data['usu_celular']."</td>";
              echo "<td>".$user_data['usu_telefoneFixo']."</td>";
              echo "<td>".$user_data['usu_endereco']."</td>";
              echo "<td>".$user_data['usu_login']."</td>";
              echo "<td>".$user_data['usu_senha']."</td>";
              echo "<td>".$user_data['usu_confirmarsenha']."</td>";
              echo "<td>
                   <a class='btn btn-sm btn-primary' href='edit.php?id=$user_data[usu_id]'>
                   <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                </svg>
                </a>
                <a  class='btn btn-sm btn-danger' href='delete.php?id=$user_data[usu_id]'>
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
              </svg>
                </a>
              
              </td>";
              echo "</td>";








            }
            
            ?>
          </tbody>
        </table>
      </div>

      </svg>
      </button>
  </header>

  <?php
  echo "<h1>Bem Vindo! <h3>$logado</h3></h1>";

  ?>
<script>
  var search = document.getElementById('pesquisar');
  
  search.addEventListener("keydown", function(event) {
    if (event.key === "Enter") {
      event.preventDefault(); // Para evitar o comportamento padrão de Enter (enviar formulário)
      searchData();
    }
  });

  function searchData() {
    window.location = 'sistema.php?search=' + search.value;
  }
</script>

</script>
 
<footer class="rodape">
    <p>&copy; 2023 CPaaS Telecall. Todos os direitos reservados.</p>


  </footer>

</body>

</html>