<?php

// Obtener el archivo xml de la web
$xml = simplexml_load_file('https://inbound.digifianz.com/academy/rss.xml');


// Funcion para extraer src de imagen
function extraerSRC($str) {
    preg_match('@src="([^"]+)"@', $str, $array);
    $src = array_pop($array);
    return $src;
}