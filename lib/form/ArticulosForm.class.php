<?php
  //formulario para gestion (agregar) articulos
  //apps/frontend/modules/contenido/actions/actions.class.php
  //apps/frontend/modules/contenido/templates/verSuccess.php

  class ArticulosForm extends BaseForm {
    public function configure() {
      $this->setWidgets(array(
        "titulo" => new sfWidgetFormInputText(), 
        "contenido" => new sfWidgetFormInputText()
      ));
      $this->widgetSchema->setNameFormat("articulo[%s]");
      $this->widgetSchema->setIdFormat("articulo_%s");
      $this->setValidators(array(
        "titulo" => new sfValidatorString(
          array(
            "min_length" => 10, 
            "max_length" => 255
          ), array(
          "required" => "El titulo es requerido", 
          "min_length" => "El titulo debe tener por lo menos 10 caracteres")
        ),
        "contenido" => new sfValidatorString(
          array(
            "min_length" => 10, 
            "max_length" => 1000
          ), array(
          "required" => "El comentario es requerido", 
          "min_length" => "El titulo debe tener por lo menos 10 caracteres")
        )
      ));
      $this->widgetSchema->setLabels(array(
        "titulo" => "Titulo del articulo",
        "contenido" => "Contenido del articulo"
      ));
    }
  }
?>