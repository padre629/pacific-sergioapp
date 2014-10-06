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

<?php
    /*echo link_to("busca en google", 
        "http://www.google.com.co", 
        "style='color: red;' confirm=seguro? absolute=true");
    echo "<br>";
    echo link_to("ir al inicio", "/"); */
?>

<br><br> <b>INSERTAR ARTICULOS</b> <br>

<form method="post" 
    action="<?php echo url_for('@ver_todos_los_articulos'); ?>">
    <!-- <?php echo $formRegArt; ?> -->
    <div style="width: 31em; background: #f3f3f4; overflow: auto;">
        <?php if ($formRegArt->isCSRFProtected()) : ?>
            <?php echo $formRegArt['_csrf_token']->render(); ?>
        <?php endif; ?> 
        <div style="border: 1px solid gray; float: left; width: 10em;">
            <div>
                <B> <?php 
                    echo $formRegArt['titulo']->renderLabel(); ?> 
                </B> 
            </div> <br>
            <div> <?php 
                echo $formRegArt['titulo']->render(); ?> 
            </div>
            <div style="color: red;"> <?php 
                echo $formRegArt['titulo']->renderError(); ?> 
            </div>
        </div>
        <div style="border: 1px solid gray; float: left; width: 10em;">
            <div>
                <B> <?php 
                    echo $formRegArt['contenido']->renderLabel(); ?> 
                </B> 
            </div> <br>
            <div> <?php 
                echo $formRegArt['contenido']->render(); ?> 
            </div>
            <div  style="color: red;"> <?php 
                echo $formRegArt['contenido']->renderError(); ?> 
            </div>
        </div>
        <div style="border: 1px solid gray; float: left; width: 10em;">
            <input type="submit" value="envia datos" />
        </div>
    </div>
</form>



<?php /*echo $formRegArt->renderFormTag(url_for('@'));*/ ?>





<br> <br> <b>ARTICULOS REGISTRADOS</b> <br>
<!-- <?php echo $marquita; ?> -->
<table>
    <tr>
        <td style="font-weight: bold;"> ID </td>
        <td style="font-weight: bold;"> TITULO </td>
    </tr>
    <?php foreach ($listaArticulos as $lista): ?>
        <tr>
            <td> <?php echo $lista->getId(); ?> </td>
            <td> <?php echo link_to($lista->getTitulo(), url_for('@articulo_segun_id?id='.$lista->getId())); ?> </td>
            <!-- <td> <a href="<?php echo url_for('contenido/verarticulo?id='.$lista->getId()) ?>">  -->
        </tr>
    <?php endforeach; ?>
</table>
<br> <br>
