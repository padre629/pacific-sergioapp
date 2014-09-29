<!-- archivo ejecutado gracias a -->
<!-- ../actions/actions.class.php:executeRecibirnombre -->

<p> <?php 
    if (($sf_params->has("nombre") == true) && 
        ($sf_params->has("direccion") == true) && 
        ($sf_params->has("telefono") == true)) {
        echo "nombre: ".$sf_params->get("nombre");
        echo "direccion: ".$sf_params->get("direccion");
        echo "telefono: ".$sf_params->get("telefono");
    } else {
        echo "N/A";
    }
?> </p>