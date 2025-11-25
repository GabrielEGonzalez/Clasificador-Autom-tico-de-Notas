<?php

header('location: application/json');


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

match ($metodo) {
    "POST" => function () {

        },
    "GET" => function () {

        },
};

function lecturaJSON()
{
    $listaNotas = file_get_contents("notas.json");
    return json_decode($listaNotas, true);
}

function obtenerMAXCategoria()
{

}