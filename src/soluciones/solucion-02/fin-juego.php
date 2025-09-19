<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../css/style.css">
  <title>Ejercicio 2</title>
</head>

<body>
  <header>
    <h1>Ejercicios PHP - Relación 2</h1>
    <h3>Alumno: Carlos D. Vallejo Aranda</h3>
    <img src="../../img/yo-42-avatar-centrado.jpg" alt="">
  </header>
  <main>
    <div class="ejercicio">

      <form action="index.html" method="post">
        <h1>Apuesta y gana</h1>
        <h3>¡Ha conseguido: <?= $_SESSION["apuesta"] ?> €!</h3>
        <img src="img/win.png" alt="turboabuela win">
        <a href="reset.php"><button>Volver a jugar</button></a>
        <br>
      </form>
  </main>

  <div class="volver">
    <a href="../../index.php">Página principal</a>
  </div>

</body>

</html>