<!-- archivo ejecutado gracias a -->
<!-- ../actions/actions.class.php:executeVer -->

<br>
BIENVENIDO/A <br>
<?php echo $sf_user->getAttribute("usuariologueado"); ?> <br>
<a href="cierresesion"> cerrar sesion </a>
<br> <br>

<p> hola mundo <br> </p>
<?php echo "fecha y hora actuales: ".$hora; ?>

<!-- es posible ver variables del sistema -->
<!-- como $sf_context, $sf_request, -->
<!-- $sf_params, $sf_user -->

<br> <br>

<?php
    echo link_to("busca en google", 
        "http://www.google.com.co", 
        "style='color: red;' confirm=seguro? absolute=true");
    echo "<br>";
    echo link_to("ir al inicio", "/");
?>

<br> <br>
<form method="post" action="recibirnombre">
    <input type="text" name="nombre" placeholder="nombre" />
    <input type="text" name="direccion" placeholder="direccion" />
    <input type="text" name="telefono" placeholder="telefono" />
    <input type="submit" value="envia datos" />
</form>

<br> <br>
<?php echo $marquita; ?>

<br> <br>
