<?php 

include_once('conectar.php');

if(isset($_POST['update'])){

   $id = $_POST['id']; 
   $senha = $_POST['senha'];
   $confirme_senha = $_POST['confirme'];

   $sqlUpdate = "UPDATE usuarios SET usu_senha = '$senha', usu_confirmarsenha = '$confirme_senha'  WHERE  usu_id='$id' ";

   $result = $conn->query($sqlUpdate);

 // Verifique se usu_senha e usu_confirmarsenha não estão vazios
 if (empty($senha) || empty($confirme_senha)) {
   // Se estiverem vazios, redirecione para a página de erro
   header('location: error.php');
   exit();
} 

}
header('Location: login.php');



?>