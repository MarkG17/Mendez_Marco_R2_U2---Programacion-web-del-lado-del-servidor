<?php
// Ejercicio 4: Gestión de Menú
// Estructura original en pesos mexicanos

$menuOriginal = [
    ["platillo" => "Tacos al pastor", "categoria" => "Plato fuerte", "precioMXN" => 120],
    ["platillo" => "Guacamole", "categoria" => "Entrada", "precioMXN" => 90],
    ["platillo" => "Churros", "categoria" => "Postre", "precioMXN" => 80],
    ["platillo" => "Pozole", "categoria" => "Plato fuerte", "precioMXN" => 150],
    ["platillo" => "Quesadillas", "categoria" => "Plato fuerte", "precioMXN" => 110],
    ["platillo" => "Ceviche", "categoria" => "Entrada", "precioMXN" => 130],
    ["platillo" => "Flan", "categoria" => "Postre", "precioMXN" => 70],
    ["platillo" => "Sopes", "categoria" => "Plato fuerte", "precioMXN" => 100]
];

// Variable constante del sistema
$tasaCambioDolar = 18;

// Transformación de datos usando array_map
$menuUSD = array_map(function ($item) use ($tasaCambioDolar) {
    // Calculamos el precio en dólares
    $precioConvertido = $item["precioMXN"] / $tasaCambioDolar;
    return [
        "platillo" => $item["platillo"],
        "categoria" => $item["categoria"],
        "precioUSD" => round($precioConvertido, 2)
    ];
}, $menuOriginal);

// Renderizado de tabla HTML
echo "<h3>Resultados Ejercicio 4</h3>";
echo "<strong>Menú con los precios en dólares:</strong><br><br>";
echo "<table border='1' style='border-collapse: collapse; width: 50%;'>";
echo "<tr style='background-color: #f2f2f2;'><th>Platillo</th><th>Categoría</th><th>Precio (USD)</th></tr>";

// Inicializamos arreglos vacíos para la posterior categorización
$categoriaEntrada = [];
$categoriaPlatoFuerte = [];
$categoriaPostre = [];

// Imprimimos la tabla y al mismo tiempo categorizamos los datos para el segundo requerimiento
foreach ($menuUSD as $item) {
    echo "<tr>";
    echo "<td>" . $item["platillo"] . "</td>";
    echo "<td>" . $item["categoria"] . "</td>";
    // number_format asegura que siempre se muestren dos decimales
    echo "<td>$" . number_format($item["precioUSD"], 2) . "</td>";
    echo "</tr>";

    // Estructura condicional para agrupar
    if ($item["categoria"] === "Entrada") {
        $categoriaEntrada[] = $item;
    } elseif ($item["categoria"] === "Plato fuerte") {
        $categoriaPlatoFuerte[] = $item;
    } elseif ($item["categoria"] === "Postre") {
        $categoriaPostre[] = $item;
    }
}
echo "</table><br>";

// Impresión de datos categorizados
echo "<strong>Platillos por categoría:</strong><br><br>";

echo "Entrada<br>";
foreach ($categoriaEntrada as $item) {
    echo " * " . $item["platillo"] . " - Precio: $" . number_format($item["precioUSD"], 2) . "<br>";
}

echo "<br>Plato fuerte<br>";
foreach ($categoriaPlatoFuerte as $item) {
    echo " * " . $item["platillo"] . " - Precio: $" . number_format($item["precioUSD"], 2) . "<br>";
}

echo "<br>Postre<br>";
foreach ($categoriaPostre as $item) {
    echo " * " . $item["platillo"] . " - Precio: $" . number_format($item["precioUSD"], 2) . "<br>";
}
?>