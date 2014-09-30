<!-- archivo ejecutado gracias a -->
<!-- ../actions/actions.class.php:executeRecibirnombre -->

<p> <?php 
    if (//($sf_params->has("nombre") == true) && 
        //($sf_params->has("direccion") == true) && 
        //($sf_params->has("telefono") == true) &&
        ($sf_params->has("titulo") == true) && 
        ($sf_params->has("contenido") == true)) {
        //echo "nombre: ".$sf_params->get("nombre");
        //echo "direccion: ".$sf_params->get("direccion");
        //echo "telefono: ".$sf_params->get("telefono");
        echo "titulo: ".$sf_params->get("titulo");
        echo "contenido: ".$sf_params->get("contenido");
    } else {
        echo "N/A";
    }
?> </p>