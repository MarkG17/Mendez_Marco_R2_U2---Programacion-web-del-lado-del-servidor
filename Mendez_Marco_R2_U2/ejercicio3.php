<?php
// Ejercicio 3: Calificaciones de Cursos
// Consolidamos a los usuarios agrupando sus múltiples calificaciones en arrays indexados dentro de un array asociativo.

$calificacionesUsuarios = [
    "Miguel" => [85, 88],
    "Carlos" => [78, 55],
    "Melva" => [65, 75],
    "Silvia" => [92],
    "Dulce" => [60],
    "Karla" => [70]
];

// Array asociativo para almacenar el estado (aprobado/reprobado) dinámicamente
$estadoAprobacion = [];

echo "<h3>Resultados Ejercicio 3</h3>";
echo "<strong>Promedio de calificaciones por usuario:</strong><br>";

// Iteración para cálculo de promedios y validación de estado
foreach ($calificacionesUsuarios as $usuario => $calificaciones) {
    // array_sum simplifica la suma total de elementos de un arreglo
    $promedio = array_sum($calificaciones) / count($calificaciones);

    // Operador ternario para asignar estado de manera limpia
    $estadoAprobacion[$usuario] = ($promedio >= 70) ? "aprobado" : "reprobado";

    echo $usuario . ": " . $promedio . "<br>";
}

echo "<br><strong>Estado de aprobación:</strong><br>";
foreach ($estadoAprobacion as $usuario => $estado) {
    echo $usuario . ": " . $estado . "<br>";
}

// Funciones de orden superior (array_reduce) para consolidar contadores sin usar variables bandera
$totalAprobados = array_reduce($estadoAprobacion, function ($acumulador, $estado) {
    return $acumulador + ($estado === "aprobado" ? 1 : 0);
}, 0);

$totalReprobados = array_reduce($estadoAprobacion, function ($acumulador, $estado) {
    return $acumulador + ($estado === "reprobado" ? 1 : 0);
}, 0);

echo "<br>Total de aprobados: " . $totalAprobados . "<br>";
echo "Total de reprobados: " . $totalReprobados . "<br>";
?>