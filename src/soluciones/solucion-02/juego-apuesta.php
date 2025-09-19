<?php
session_start();
if (isset($_POST["apuesta"])) {
  $_SESSION["apuesta"] = $_POST["apuesta"];
}
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

      <?php
      $ruleta = ["limón", "turboAbuela", "calavera"];
      // echo $_SESSION["apuesta"];

      $ruletaResultado = $ruleta[array_rand($ruleta)]; // array_rand elige al azar un idex del array

      if (($ruletaResultado != "calavera")) {
        if ($ruletaResultado == "limón") {
          $_SESSION["apuesta"] /= 2;
          echo "<h3>Ha perdido la mitad del dinero</h3>";
          echo "<h3>Ahora tiene ", $_SESSION["apuesta"], " €</h3>";
          echo "<img src='img/mediolimon.jpg' alt='limon'>";
        } else if ($ruletaResultado == "turboAbuela") {
          $_SESSION["apuesta"] = $_SESSION["apuesta"] * 2;
          echo "<h3>Ha doblado la apuesta</h3>";
          echo "<h3>Ahora tiene ", $_SESSION["apuesta"], " €</h3>";
          echo "<img src='img/turboabuela.jpg' alt='turboabuela'>";
        }
      ?> <!-- Formulario para continuar el juego o plantarse -->
        <form action="juego-apuesta.php" method="post">
          <input type="submit" name="sigoJugando" value="Sigo jugando">
        </form>
        <br>
        <form action="fin-juego.php">
          <input type="submit" name="mePlanto" value="Me planto">
        </form>
      <?php
      } else { // Ha salido calavera
        echo "<img src='img/calavera.png' alt='calavera'>";
        echo "Lo siento, has perdido";
      ?>
        <form action="index.html" method="post">
          <a href="reset.php"><button>Volver a</button></a>
          <br>
        </form>
      <?php
      }

      ?>
  </main>

  <div class="volver">
    <a href="../../index.php">Página principal</a>
  </div>

</body>

</html>