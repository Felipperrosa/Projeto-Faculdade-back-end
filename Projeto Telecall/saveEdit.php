<?php 

include_once('conectar.php');

if(isset($_POST['update']))

{  
   $id = $_POST['id'];
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

   $sqlUpdate = "UPDATE usuarios SET usu_nome = '$nome', usu_dataNacs = '$data_nasc', usu_sexo ='$sexo', usu_nomeMaterno = '$nome_materno ', usu_cpf = '$cpf', usu_celular = '$telefone_celular', usu_telefoneFixo = '$telefone_fixo', usu_endereco = '$endereco', usu_login ='$login', usu_senha = '$senha', usu_confirmarsenha = '$confirme_senha'  WHERE  usu_id='$id' ";

   $result = $conn->query($sqlUpdate);


}
header('Location: sistema.php');



?>