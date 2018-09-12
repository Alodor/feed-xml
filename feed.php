<?php

// Obtener el archivo xml de la web
$xml = simplexml_load_file('https://inbound.digifianz.com/academy/rss.xml');


// Funcion para extraer src de imagen
function extraerSRC($string) {
    preg_match('@src="([^"]+)"@', $string, $array);
    $src = array_pop($array);
    return $src;
}


// Captura de items
$items = $xml->channel->item;


echo "<h1>Últimos Artículos</h1>";



$count = 0;

foreach ($items as $item) {  
    
    if ($count === 1)
        break;
    
    $description = $item->description;
    
    echo extraerSRC($description);
    
    $explode = explode("<p>", $description);
    echo '<br><br>';
    echo $explode[1];
    
    //echo $description;
    
    /*
    $data = "";
    $data .= "
    <script>
        const image = document
    </script>
    ";
    */
    
    //echo $item->title;
    
    //echo $item->link;
    //echo $item->description;
    //echo '<br>';
    $count++;
}