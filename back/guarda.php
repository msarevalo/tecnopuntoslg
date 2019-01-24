<?php

foreach($_FILES["archivo"]['tmp_name'] as $key => $tmp_name)
{
    //Validamos que el archivo exista
    if($_FILES["archivo"]["name"][$key]) {
        $filename = $_FILES["archivo"]["name"][$key]; //Obtenemos el nombre original del archivo
        $source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo

        $offset = -18000; //UTC -5 horas Bogota, Lima, Quito (3.600s * -5 horas)
        $fechaDia1 = "Ymd"; //formato fecha
        $fdia1 = gmdate($fechaDia1, time() + $offset);

        //echo $fdia1;

        $directorio = '../recursos/' . $fdia1; //Declaramos un  variable con la ruta donde guardaremos los archivos

        //Validamos si la ruta de destino existe, en caso de no existir la creamos
        if(!file_exists($directorio)){
            mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");
        }

        $dir=opendir($directorio); //Abrimos el directorio de destino
        $target_path = $directorio.'/'.$filename; //Indicamos la ruta de destino, así como el nombre del archivo

        //Movemos y validamos que el archivo se haya cargado correctamente
        //El primer campo es el origen y el segundo el destino
        if(move_uploaded_file($source, $target_path)) {
            echo "El archivo $filename se ha almacenado en forma exitosa.<br>";
        } else {
            echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
        }
        closedir($dir); //Cerramos el directorio de destino
    }
}
echo "<a href='../public/links.php?dir=" . $fdia1 . "' style='text-decoration: none'>Ver URL's</a>";
?>