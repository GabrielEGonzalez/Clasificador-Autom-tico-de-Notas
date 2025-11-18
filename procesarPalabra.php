<?php

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

if($_REQUEST['POST'] == "POST"){
    if(isset($_POST['titulo']) && isset($_POST['contenido'])){
        $titulo = $_POST['titulo'];
        $contenido = $_POST['contenido'];
        $categoria = buscarPalabra($contenido,$mapa_categorias);
    }
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