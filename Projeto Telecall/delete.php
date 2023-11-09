<?php 
 if(!empty($_GET['id']))
        {
        
        include_once('conectar.php');
        
        $usu_id = $_GET['id'];


        $sqlSelect = "SELECT * FROM usuarios WHERE usu_id=$usu_id";

        $result = $conn->query($sqlSelect);

        if($result->num_rows > 0 )
        {
        
        $sqlDelete = "DELETE FROM usuarios WHERE usu_id=$usu_id";

        $result = $conn->query($sqlDelete);

        }

    }
     header('location: sistema.php');
?>