<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../css/style.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Ejercicio 1</title>
</head>

<body>
  <header>
    <h1>Ejercicios PHP - Relación 1</h1>
    <h3>Alumno: Carlos D. Vallejo Aranda</h3>
    <img src="../../img/yo-42-avatar-centrado.jpg" alt="">
  </header>
  <main>
    <div class="ejercicio">
      <h2>Ejercicio 3</h2>
      <h3>Aquí tiene su pedido</h3>
      <?php
      if (isset($_POST["pedido-realizado"])) {
        $pedido1 = $_POST["pedido1"];
        $pedido2 = $_POST["pedido2"];
        $pedido3 = $_POST["pedido3"];
        $pedido4 = $_POST["pedido4"];
        $pedido5 = $_POST["pedido5"];
        $pedido6 = $_POST["pedido6"];
        $pedido7 = $_POST["pedido7"];

        $pedidos = [
          "Hamburguesa vegetariana" => $pedido1,
          "Pasta al pesto" => $pedido2,
          "Pizza caprese" => $pedido3,
          "Quinoa con verdura" => $pedido4,
          "Agua" => $pedido5,
          "Cerveza" => $pedido6,
          "Refresco" => $pedido7,
        ];

        # php elimina en los float el cero final, por eso luego usamos number_format()
        $precios = [
          "Hamburguesa vegetariana" => 6.95,
          "Pasta al pesto" => 8.50,
          "Pizza caprese" => 7.90,
          "Quinoa con verdura" => 9.20,
          "Agua" => 1.20,
          "Cerveza" => 1.80,
          "Refresco" => 1.80,
        ];

      ?>
        <table>
          <tr>
            <th>Comida/bebida</th>
            <th>PVP</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
          </tr>

          <?php

          $subtotal = 0;
          $total = 0;
          $precioSinIva = 0;
          foreach ($pedidos as $producto => $cantidad) {
            if ($cantidad > 0) {
              $subtotal = $cantidad * $precios[$producto];
              $total += $subtotal;
              echo "<tr>";
              echo "<td>$producto</td>";
              echo "<td>", number_format($precios[$producto], 2), " €</td>"; 
              echo "<td>$cantidad</td>";
              echo "<td>", number_format($subtotal, 2), " €</td>";
              echo "</tr>";
            }
          }
          $baseImponible = $total / 1.21;
          $iva = $total - $baseImponible;
          ?>
          </tr>
        </table>
        
        <h3>Total: <?= number_format($total, 2) ?> €</h3> <!-- number_format redondea y fuerza para que haya dos decimales (round no fuerza los dos decimales -->
        <h4>Base imponible: <?= number_format($baseImponible, 2) ?> €</h4>
        <h4>IVA (21%): <?= number_format($iva, 2) ?> €</h4>
      <?php
      }
      ?>
    </div>
  </main>

  <div class="volver">
    <a href="../../index.php">Página principal</a>
  </div>

</body>

</html>