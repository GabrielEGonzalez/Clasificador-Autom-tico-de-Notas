<?php

header('Content-Type: application/json');


$mapa_categorias = [
    "FINANZAS",
    "ESTUDIOS",
    "SALUD",
    "ESTUDIOS_TAREAS",
    "TRABAJO_PROFESIONAL",
    "HOGAR",
    "TECNOLOGIA",
    "PERSONAL",
    "EVENTOS_SOCIAL",
    "CREATIVIDAD_IDEAS",
    "COMPRAS",
    "VIAJES",
    "ALIMENTACION",
    "DEPORTES_EJERCICIO",
    "MASCOTAS"
];

$metodo = $_SERVER['REQUEST_METHOD'];

switch ($metodo) {
    case "POST":
        http_response_code(201);
        break;

    case "GET":
        echo json_encode(["catPopular"=>obtenerMAXCategoria($mapa_categorias), "totalNotas"=>obtenerCategoria(), "ultimaNota"=>obtenerUltimaNotas()]);
        break;

    default:
        http_response_code(405); 
        echo json_encode(["error" => "Method not supported"]);
        break;
}

function lecturaJSON()
{
    $listaNotas = file_get_contents("notas.json");
    return json_decode($listaNotas, true);
}

function obtenerMAXCategoria(array $mapa_categorias)
{   
    $listaNotasJSON = lecturaJSON();
    $max = "";
    $maxCount = 0;
    foreach ($mapa_categorias as $categoria) {
        $count = 0;
        foreach ($listaNotasJSON as $nota) {
            if ($nota['categoria'] === $categoria) {
                $count++;
            }
        }
        if ($count > $maxCount) {
            $maxCount = $count;
            $max = $categoria;
        }
    }       
    return $max;
}
function obtenerCategoria()
{
    // Implementación pendiente
    $list = lecturaJSON(); 
    return count($list);
}

function obtenerUltimaNotas()
{
    $list = lecturaJSON(); 
    return end($list);
}