<?php
  $limitedValue = "";  // Inicialize a variável para evitar erros
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputValue = $_POST["inputField"];
    $maxLength = 10;

    // Limita o número de caracteres
    $limitedValue = substr($inputValue, 0, $maxLength);
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Limite de Caracteres</title>
</head>
<body>

  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="inputField">Digite algo:</label>
    <input type="text" id="inputField" name="inputField">
    <input type="submit" value="Enviar">
  </form>

  <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      echo "<label>Texto limitado: " . htmlspecialchars($limitedValue) . "</label>";
    }
  ?>

</body>
</html>
