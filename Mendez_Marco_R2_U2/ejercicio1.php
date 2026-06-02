<?php
// Ejercicio 1: Puntuaciones de Jugadores
// Utilizamos un array indexado de arrays asociativos para estructurar los datos como si vinieran de una base de datos MySQL.

$puntuacionesJugadores = [
    ["nombre" => "pixel_hero96", "puntuacion" => 1200, "fecha" => "2024-06-15"],
    ["nombre" => "cyber_ninja22", "puntuacion" => 1500, "fecha" => "2024-07-02"],
    ["nombre" => "storm_wolf", "puntuacion" => 1800, "fecha" => "2024-07-10"],
    ["nombre" => "galactic_gamer", "puntuacion" => 1100, "fecha" => "2024-06-30"],
    ["nombre" => "arcade_master", "puntuacion" => 1600, "fecha" => "2024-07-15"],
    ["nombre" => "star_chaser91", "puntuacion" => 1400, "fecha" => "2024-05-25"],
    ["nombre" => "vortex_warrior", "puntuacion" => 1700, "fecha" => "2024-07-20"],
    ["nombre" => "lone_wolf47", "puntuacion" => 1300, "fecha" => "2024-06-05"],
    ["nombre" => "game_wizard99", "puntuacion" => 1450, "fecha" => "2024-07-28"],
    ["nombre" => "cosmic_rider22", "puntuacion" => 1550, "fecha" => "2024-04-10"]
];

// Inicialización de variables acumuladoras y de control
$sumaPuntuaciones = 0;
$totalJugadores = count($puntuacionesJugadores);

// Recorrido clásico para sumar y obtener el promedio
foreach ($puntuacionesJugadores as $jugador) {
    $sumaPuntuaciones += $jugador["puntuacion"];
}
$promedioTotal = $sumaPuntuaciones / $totalJugadores;

// Función de orden superior (array_filter) para limpiar los datos según el mes
$filtradosJulio = array_filter($puntuacionesJugadores, function ($jugador) {
    // strpos verifica si la cadena '2024-07' se encuentra al inicio (posición 0)
    return strpos($jugador["fecha"], "2024-07") === 0;
});

// Renderizado de la salida esperada en el navegador
echo "<h3>Resultados Ejercicio 1</h3>";
echo "Promedio de puntuaciones: " . $promedioTotal . "<br><br>";
echo "Resultado del filtro:<br>";
foreach ($filtradosJulio as $jugador) {
    echo $jugador["nombre"] . ": " . $jugador["puntuacion"] . ", fecha: " . $jugador["fecha"] . "<br>";
}
?>