<?php include 'feed.php' ?>
<!Doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <title>Feed Blog Post desde XML</title>
    </head>
    
    <body>
        <?php 
        // Captura de items
        $items = $xml->channel->item;

        // Recorrer los item del archivo
        $count = 0;

        foreach ($items as $item) {  
            
            // Detener el recorrido en el cuarto item
            if ($count === 4) break;
    
            $description = $item->description;
            $image = extraerSRC($description);
            $paragraph = explode('<p>', $description);

            // Mostrar Items
            $data = "";
            $data .= "
            <div class='card'>
                <div class='card-header'>
                    <a href='".$item->link."'>
                        <img src='".$image."'>
                    </a>
                </div>
                <div class='card-body'>
                    <h3 class='card-title'>".$item->title."</h3>
                    <p>".$paragraph[1]."</p>
                </div>
            </div>
            ";

            echo $data;
            $count++;
        } ?>        
    </body>
</html>