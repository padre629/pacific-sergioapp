<!-- archivo ejecutado gracias a -->
<!-- ../actions/actions.class.php:executeIndex -->

BIENVENIDOS A PACIFIC
<br>
QUE GRANDIOSO DIA PARA SERVIRLE 
<br>

<form method="POST" action="<?php echo url_for('@index'); ?>">
    <?php echo $formLogin2; ?>
    <br>
    <input type="submit" value="inicia" />
</form>

<?php 
    //echo $formLogin->renderFormTag("");
    //echo $formLogin;

    /*echo $formLogin["usuario"]->renderRow(array(
        "placeholder" => "Nombre de usuario"
    ));
    echo $formLogin["password"]->renderRow(array(
        "placeholder" => "Contraseña"
    ));*/

    //echo $formLogin2->renderFormTag(url_for("@verifica_index"));
    //echo $formLogin2;
?>
