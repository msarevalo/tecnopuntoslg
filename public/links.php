<?php

$directorio = null;
if (isset($_GET['dir'])){
    $directorio = $_GET['dir'];
}

echo "carpeta: " . $directorio. "<br><a href='cargar_imagenes.php'>Volver</a>";
$prueba = $directorio;
$rutas = $directorio;
function obtener_estructura_directorios($rutas){
    // Se comprueba que realmente sea la ruta de un directorio
    echo "<table border='1'><thead><tr><th>Nombre Archivo</th><th>Imagen</th><th>URL</th></tr></thead>";
    $ruta = "../recursos/" . $rutas;
    if (is_dir($ruta)){
        // Abre un gestor de directorios para la ruta indicada
        $gestor = opendir($ruta);
        //echo "<ul>";

        // Recorre todos los elementos del directorio
        while (($archivo = readdir($gestor)) !== false)  {

            $ruta_completa = $ruta . "/" . $archivo;

            // Se muestran todos los archivos y carpetas excepto "." y ".."
            if ($archivo != "." && $archivo != "..") {
                // Si es un directorio se recorre recursivamente
                if (is_dir($ruta_completa)) {
                    echo "<li>" . $archivo . "</li>";
                    obtener_estructura_directorios($ruta_completa);
                } else {
                    echo "<tr>";
                    echo "<td>" . $archivo . "</td>";
                    echo "<td><img src='".$ruta."/".$archivo."' width='100px' alt='".$archivo."' title='".$archivo."'></td>";
                    $var = str_replace(" ", "%20", $archivo);
                    $host = $_SERVER['HTTP_HOST'];
                    //echo "<td><a href='" . $host . "/" . $ruta . "/" . $var . "' target='_blank'>http://" . $host . "/tecnopuntos/recursos/" . $rutas . "/" .  $var . "</a></td>";
                    echo "<td><a href='" . $host . "/tecnopuntos/" . $ruta . "/" . $var . "' target='_blank'>http://" . $host . "/tecnopuntos/recursos/" . $rutas . "/" .  $var . "</a></td>";
                    echo "</tr>";
                }
            }
        }

        // Cierra el gestor de directorios
        closedir($gestor);
        echo "</ul>";
        echo "</table>";
    } else {
        echo "No es una ruta de directorio valida<br/>";
    }
}


/**
 * Funcion que muestra las imagenes que hay en la ruta pasada como parametro
 */
function mostrar_imagenes($ruta){
    // Se comprueba que realmente sea la ruta de un directorio
    if (is_dir($ruta)){
        // Abre un gestor de directorios para la ruta indicada
        $gestor = opendir($ruta);

        // Recorre todos los archivos del directorio
        while (($archivo = readdir($gestor)) !== false)  {
            // Solo buscamos archivos sin entrar en subdirectorios
            if (is_file($ruta."/".$archivo)) {
                echo "<img src='".$ruta."/".$archivo."' width='200px' alt='".$archivo."' title='".$archivo."'>";
            }
        }

        // Cierra el gestor de directorios
        closedir($gestor);
    } else {
        echo "No es una ruta de directorio valida<br/>";
    }
}

// Ruta de la carpeta en la que se encuentra el archivo desde el que
// se hace esta llamada
obtener_estructura_directorios($rutas);

