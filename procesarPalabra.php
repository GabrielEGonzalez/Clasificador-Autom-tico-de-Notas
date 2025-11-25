<?php
header('Content-Type: application/json');

$mapa_categorias = [
    // --- Categorías principales que ya tenías ---
    "FINANZAS" => ["pagar", "costo", "dinero", "factura", "precio", "banco", "deuda", "presupuesto", "ingreso", "gasto", "ahorrar"],
    "ESTUDIOS" => ["examen", "tarea", "estudio", "clase", "proyecto"],
    "SALUD" => ["cita", "medicina", "doctor", "salud", "pastilla", "hospital", "dolor", "receta", "consulta", "síntomas"],
    // --- Categorías adicionales solicitadas ---
    "ESTUDIOS_TAREAS" => ["examen", "tarea", "proyecto", "estudiar", "clase", "profesor", "investigación", "entrega"],
    "TRABAJO_PROFESIONAL" => ["reunión", "jefe", "cliente", "reporte", "deadline", "documento", "presentación", "agenda"],
    "HOGAR" => ["limpiar", "cocinar", "comprar comida", "lavandería", "arreglar", "reparar", "hogar", "casa"],
    "TECNOLOGIA" => ["servidor", "error", "código", "actualizar", "instalar", "bug", "sistema", "red", "software"],
    "PERSONAL" => ["meta", "plan", "rutina", "diario", "reflexión", "recordatorio personal", "hábitos"],
    "EVENTOS_SOCIAL" => ["fiesta", "cumpleaños", "reunión social", "evento", "salida", "amigos", "invitación"],
    "CREATIVIDAD_IDEAS" => ["idea", "bosquejo", "plan creativo", "diseño", "boceto", "inspiración", "proyecto creativo"],
    "COMPRAS" => ["comprar", "pedido", "carrito", "tienda", "producto", "lista de compras", "oferta"],
    "VIAJES" => ["viajar", "vuelo", "hotel", "reservar", "itinerario", "equipaje", "pasaporte", "destino"],
    "ALIMENTACION" => ["comida", "dieta", "almuerzo", "cena", "cocina", "receta", "ingredientes", "menú"],
    "DEPORTES_EJERCICIO" => ["entrenar", "ejercicio", "rutina", "gimnasio", "correr", "estiramiento", "actividad física"],
    "MASCOTAS" => ["mascota", "perro", "gato", "veterinario", "comida para animales", "paseo", "baño"]
];


$listaNotas = file_get_contents("notas.json");
$listaNotasJSON = json_decode($listaNotas, true);
if(!$listaNotasJSON){
    $listaNotasJSON = [];
}

if($_SERVER['REQUEST_METHOD'] == "POST"){

    if(isset($_POST['titulo']) && isset($_POST['contenido'])){

        $titulo = $_POST['titulo'];
        $contenido = $_POST['contenido'];
        $categoria = buscarPalabra($contenido, $mapa_categorias);

        $nuevaNota = [
            "titulo" => $titulo,
            "contenido" => $contenido,
            "categoria" => $categoria
        ];

        // añadir a lista
        $listaNotasJSON[] = $nuevaNota;

        // guardar en archivo
        file_put_contents("notas.json", json_encode($listaNotasJSON, JSON_PRETTY_PRINT));

        echo json_encode([
            "message" => "Tus datos han sido guardados correctamente.",
            "datos" => $listaNotasJSON
        ]);
    }

} else if($_SERVER['REQUEST_METHOD'] == "GET") {

    echo json_encode($listaNotasJSON);

}


function buscarPalabra(string $cadena, array $mapa_palabras):string{
    $contenido = strtolower($cadena);
    foreach ($mapa_palabras as $categoria => $palabra) {
        foreach($palabra as $pal){
            if(str_contains($contenido,$pal)){
                return $categoria;
            }
        }
    }

    return "sin categoria";
}
