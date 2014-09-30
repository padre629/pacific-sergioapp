<!-- archivo ejecutado gracias a -->
<!-- ../actions/actions.class.php:executeVer -->

<br>
BIENVENIDO/A <br>
<?php echo $sf_user->getAttribute("usuariologueado"); ?> <br>
<a href="cierresesion"> cerrar sesion </a>
<br> <br>

<!-- <p> hola mundo <br> </p>
<?php echo "fecha y hora actuales: ".$hora; ?> -->

<!-- es posible ver variables del sistema -->
<!-- como $sf_context, $sf_request, -->
<!-- $sf_params, $sf_user -->

<!-- <br> <br> -->

<!-- <?php
    echo link_to("busca en google", 
        "http://www.google.com.co", 
        "style='color: red;' confirm=seguro? absolute=true");
    echo "<br>";
    echo link_to("ir al inicio", "/");
?> -->

<br><br> INSERTAR ARTICULOS <br>
<form method="post" action="recibirnombre">
    <!-- <input type="text" name="nombre" placeholder="nombre" />
    <input type="text" name="direccion" placeholder="direccion" />
    <input type="text" name="telefono" placeholder="telefono" />-->
    <input type="text" name="titulo" placeholder="titulo" />
    <textarea name="contenido" style="margin-bottom: -6px;"></textarea>
    <input type="submit" value="envia datos" />
</form>

<br> <br>
<!-- <?php echo $marquita; ?> -->
<table>
    <tr>
        <td style="font-weight: bold;"> ID </td>
        <td style="font-weight: bold;"> TITULO </td>
        <td style="font-weight: bold;"> CONTENIDO </td>
        <td style="font-weight: bold;"> CREADO </td>
    </tr>
    <?php foreach ($listaArticulos as $lista): ?>
        <tr>
            <td> <?php echo $lista->getId(); ?> </td>
            <td> <?php echo $lista->getTitulo(); ?> </td>
            <td> <?php echo $lista->getContenido(); ?> </td>
            <td> <?php echo $lista->getCreatedAt(); ?> </td>
        </tr>
    <?php endforeach; ?>
</table>
<br> <br>
