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
            <h2>Ejercicio 2</h2>
            <p>Crea el juego “Apuesta y gana”. El usuario debe introducir inicialmente una cantidad de
                dinero. A continuación aparecerá por pantalla una imagen de forma aleatoria. Si sale una
                calavera, el usuario pierde todo su dinero y termina el juego. Si sale medio limón, el usuario
                pierde la mitad del dinero y puede seguir jugando con esa cantidad o puede dejar de jugar. Si
                sale el gato chino de la suerte, el usuario multiplica por dos su dinero y puede seguir jugando
                con esa cantidad o puede dejar de jugar.</p>

            <form action="index.php" method="post">
                <input type="submit" name="comenzar" value="Comenzar">
            </form>

            <?php
                if (isset($_POST["comenzar"])) { 
                    $palos = ["copas", "espadas", "bastos", "oros"];
                    $valores = ["as", "2", "3", "4", "5", "6", "7", "sota", "caballo", "rey"];

                    $puntos = [
                        "as" => 11,
                        "3" => 10,
                        "rey" => 4,
                        "caballo" => 3,
                        "sota" => 2,
                        "2" => 0,
                        "4" => 0,
                        "5" => 0,
                        "6" => 0,
                        "7" => 0,
                    ];
                    echo "<br>";

                    $cartasSacadas = [];
                    $sumaPuntos = 0;
                    for ($i = 1; $i <= 10; $i++) {
                        $nPalo = rand(0, 3);
                        $nValor = rand(0, 9);

                        // guardamos el palo y el valor sacado en un nuevo array asociativo para guardar las cartas sacadas
                        $valorSacado = $valores[$nValor];
                        $paloSacado = $palos[$nPalo];
                        $carta = "$valorSacado de $paloSacado"; 

                        if (!in_array($carta, $cartasSacadas)) {
                            $cartasSacadas[] = $carta; // vamos agregando las cartas al array
                            echo "<b>Carta $i</b>", $carta, " > ", $puntos[$valores[$nValor]]; // con el array asociativo sacamos los puntos de cada valor
                            echo "<br><br>";
                            $sumaPuntos += $puntos[$valores[$nValor]]; 
                        } else {
                            $i--; // que repita esa iteración porque la carta se ha repetido
                        }
                    }
                    echo "<br><b>Total puntuación: </b> $sumaPuntos";
                }
            ?>
    </main>

    <div class="volver">
        <a href="../../index.html">Página principal</a>
    </div>
    
</body>

</html>
