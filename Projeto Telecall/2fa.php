<!DOCTYPE html>
<html>

<head>
    <title>Autenticação de 2FA</title>
</head>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
* {
  font-family: 'Roboto', sans-serif;
}
 
body {
  background-color: #ffffff;
  color: #2667b1;
  font-size: 20px; 
  margin-top: 80px;
  
}
  
  .form{
    width: 150%;
    position: relative;
  
  }
  h2{
    margin-left: 40%;
    font-weight: bold;
    margin-top: auto;
   color: #2667b1;
  }
  p{
    color: #2667b1;
    font-size: larger;
    text-align: center;
  }
  a{
    color: #e01d2d;
    font-weight: bold;
    text-decoration: none;
    transition: all .3s ease-out;
  }
  form {
    width: 370px;
    padding: 15px 40px 40px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #fff;
    margin-top: 180px;
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
    position: flex;
    margin-left: 16%;
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
 
  
  input[type="text"],
  input[type="password"] {
    border: 1px solid #ccc;
    padding: 10px;
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
    margin-top: 4%;
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
   
 
</style>
<body>
    <h2>Autenticação de 2 Fatores</h2>
    <form method="post" action="processa_2fa.php">
        <?php
        // Conecte-se ao banco de dados e recupere uma pergunta aleatória
        include_once('conectar.php');
        $sql = "SELECT * FROM perguntas_seguranca ORDER BY RAND() LIMIT 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $pergunta = $result->fetch_assoc();
            $pergunta_id = $pergunta['id'];
            $pergunta_texto = $pergunta['pergunta'];
        ?>
        <input type="hidden" name="pergunta_id" value="<?php echo $pergunta_id; ?>">
        <p>Pergunta de Segurança: <?php echo $pergunta_texto; ?></p>
        <label for="answer">Sua resposta:</label>
        <input type="text" name="answer" id="answer" required><br>
        <?php
        } else {
            // Caso não haja perguntas disponíveis, exiba uma mensagem de erro
            echo "Desculpe, não foi possível recuperar uma pergunta de segurança. Entre em contato com o suporte.";
        }
        ?>
        <button type="submit">Autenticar</button>
    </form>
</body>
</html>


