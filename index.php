<?php include 'feed.php' ?>
<!Doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <link rel="stylesheet" href="css/style.css">
        <title>Feed Blog Post desde XML</title>
    </head>
    
    <body>
        <section class="container">
            <h1 class="title">Feed Blog Post desde XML</h1>
            
            <div class="card-container">
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
                                <img class='thumbnail' src='".$image."'>
                            </a>
                        </div>
                        <div class='card-body'>
                            <h3 class='card-title'>".$item->title."</h3>
                            <p class='card-text'>".$paragraph[1]."</p>
                            <p><a class='read-more' href='".$item->link."'>Leer Más</a></p>
                        </div>
                    </div>
                    ";

                    echo $data;
                    $count++;
                } ?>        
            </div>
        </section>
    </body>
</html>