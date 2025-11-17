

---

# 📌 **Clasificador Automático de Notas**

Sistema básico que permite crear notas y clasificarlas automáticamente según su contenido.
El objetivo es detectar palabras clave dentro del texto y asignar una categoría adecuada sin usar IA avanzada.

---

## 🚀 **Características principales**

* Crear notas con **título** y **contenido**.
* Clasificación automática basada en palabras clave.
* Categorías configurables desde la base de datos.
* Sistema sencillo, rápido y ampliable.
* Implementado con:

  * **PHP** (backend)
  * **MySQL** (base de datos)
  * HTML/CSS (frontend básico, si aplicas uno)

---

## 🧠 **Cómo funciona la clasificación**

El sistema analiza **solo el contenido** de la nota (no el título) y busca coincidencias con palabras clave asociadas a cada categoría.

Ejemplo:
Si el contenido dice:

> "Tengo que pagar la factura del internet"

El sistema encuentra:

* pagar → Finanzas
* factura → Finanzas

Resultado → Categoría: **Finanzas**

---

## 🗂️ **Categorías disponibles**

Estas son las categorías base del sistema:

* Finanzas
* Estudios
* Salud
* Trabajo
* Hogar
* Tecnología
* Personal
* Eventos Sociales
* Creatividad
* Compras
* Viajes
* Alimentación
* Deportes
* Mascotas

Tú puedes agregar más según tus necesidades.

---

## 📦 **Estructura de la Base de Datos**

### **Tabla: categorias**

| Campo  | Tipo    | Descripción            |
| ------ | ------- | ---------------------- |
| id     | INT     | ID de la categoría     |
| nombre | VARCHAR | Nombre de la categoría |

### **Tabla: palabras_clave**

| Campo        | Tipo    | Descripción                  |
| ------------ | ------- | ---------------------------- |
| id           | INT     | ID de la palabra             |
| categoria_id | INT     | Relación con una categoría   |
| palabra      | VARCHAR | Palabra clave para detección |

### **Tabla: notas**

| Campo        | Tipo    | Descripción                         |
| ------------ | ------- | ----------------------------------- |
| id           | INT     | ID de la nota                       |
| titulo       | VARCHAR | Título de la nota                   |
| contenido    | TEXT    | Contenido de la nota                |
| categoria_id | INT     | Categoría detectada automáticamente |

---

## 🔍 **Flujo de análisis**

1. Recibir la nota (título + contenido).
2. Convertir contenido a minúsculas.
3. Buscar palabras clave por categoría.
4. Contar cuántas coincidencias tiene cada categoría.
5. Escoger la categoría con más coincidencias.
6. Guardar la nota junto con la categoría detectada.

---

## 📁 **Estructura sugerida del proyecto**

```
/public
    index.php
/src
    /Controllers
    /Models
    /Services
/database
    schema.sql
README.md
```

---

## 🛠️ **Tecnologías usadas**

* PHP 8+
* MySQL 5.7+
* Composer (opcional)
* Apache o Nginx

---

## 🎯 **Objetivo del proyecto**

Este sistema sirve como:

* Reto personal de backend.
* Práctica de lógica y diseño.
* Ejemplo para portafolio.
* Paso inicial para sistemas más avanzados de clasificación.

---

## 📌 **Estado del proyecto**

💡 *En desarrollo.*
Más funciones serán añadidas según mi aprendizaje y práctica.

---

## 🤝 **Contribuciones**

Se aceptan ideas, mejoras y sugerencias mediante *issues* o *pull requests*.

---

## 📄 **Licencia**

Este proyecto usa la licencia **MIT**, lo cual permite modificar y usar libremente.

---
