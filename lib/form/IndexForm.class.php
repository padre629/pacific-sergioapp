<?php
  //formulario para el index
  //apps/frontend/modules/contenido/actions/actions.class.php
  //apps/frontend/modules/contenido/templates/indexSuccess.php
  
  class IndexForm extends BaseForm {
    //array para un SELECT-OPTION
    //<option value="0">-- selecciona --</option>
    protected static $rolUsuario = array(
      0 => "-- selecciona --", 
      1 => "Usu. Normal", 
      2 => "Usu. Administrador"
    );

    //el metodo configure() es como el constructor
    public function configure() {
      //creacion del formulario
      $this->setWidgets(array(
        "usuario" => new sfWidgetFormInputText(),
        "password" => new sfWidgetFormInputPassword(), 
        "rolusu" => new sfWidgetFormSelect(array(
          "choices" => self::$rolUsuario
        ))
      ));
      //el name de cada widget tiene el formato 
      //contact[usuario / password / rolusu] ...
      $this->widgetSchema->setNameFormat("contact[%s]");
      //el ID de cada widget tiene el formato
      //login_usuario / login_password  ...
      $this->widgetSchema->setIdFormat("login_%s");
      //validaciones para el formulario
      $this->setValidators(array(
        "usuario" => new sfValidatorEmail(array(
          "min_length" => 10
        ), array(
          "required" => "Usuario / E-mail invalido",
          "min_length" => "El valor %value% debe tener minimo 10 caracteres")),
        "password" => new sfValidatorString(array(
          "min_length" => 10
        ), array(
          "required" => "Contraseña invalida", 
          "min_length" => "La contraseña debe tener minimo 10 caracteres")), 
        "rolusu" => new sfValidatorChoice(array(
          "choices" => array_keys(self::$rolUsuario)
        ))
      ));
      //establecer labels para c/widget del formulario
      $this->widgetSchema->setLabels(array(
        "usuario" => "Usuario / E-mail",
        "password" => "Contraseña", 
        "rolusu" => "Rol del usuario"
      ));
    }
  }
?>