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
        ?>        
    </body>
</html>