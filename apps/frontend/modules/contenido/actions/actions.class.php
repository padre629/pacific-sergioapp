<?php

/**
 * contenido actions.
 *
 * @package    pacific-sergioapp
 * @subpackage contenido
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class contenidoActions extends sfActions
{
  protected function setTituloPagina($string) {
    //metodo personal para establecer el titulo
    //de la pagina, sobrescribiendo la variable
    //"titulopagina" de app.yml
    $this->getResponse()->setTitle($string);
  }

  public function preExecute() {
    //primero ejecutar esta funcion siempre
    // que se ejecute cualquier otra
    $this->haysesion = $this->getUser()
      ->hasAttribute("usuariologueado");
  }

 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request) {
    if ($this->haysesion == true) {
      //si ya hay una sesion iniciada, ir al ver
      $this->redirect('contenido/ver');
    } else {
      //si no hay ninguna sesion 
      $this->formLogin2 = new IndexForm();

      if ($request->isMethod("post")) {
        //recibe los datos del index y procesa si son  validos o no
        //redirige a 404 si el $request NO es POST
        //$this->forward404Unless($request->isMethod("post"));

        //construir var con datos del formulario para ser enviado
        /*$params = array(
          "usuario" => $request->getParameter("usuario"), 
          "password" => $request->getParameter("password"), 
          "rolusu" => $request->getParameter("rolusu")
        );*/

        //realizar la validacion de un campo
        $this->formLogin2->bind($request->getParameter("contact"));
        if ($this->formLogin2->isValid()) {
          //si el formulario es valido
          //redirigir a executeVer y enviarle los $params
          //$this->redirect("contenido/ver?".http_build_query($params));
          $formValues = $this->formLogin2->getValues();
          $this->usu = $this->formLogin2->getValue("usuario");
          $this->getUser()->setAuthenticated(true);
          $this->getUser()->setAttribute("usuariologueado", 
            $this->usu);
          /*$this->redirect("contenido/ver?".
            http_build_query($formValues));*/
          $this->redirect("@ver_todos_los_articulos");
        }
      }
      //es posible des-centralizar estas acciones, colocandolas
      //en un nuevo action (executeVerificaindex, por ejemplo).
      //cambiar el action del formulario en el success
      //que apunte a esa accion
    }
  }

  public function executeVer(sfWebRequest $request) {
    //backend para el archivo frontend
    // ../templates/verSuccess.php
    if ($this->haysesion == false) {
      //NO hay sesion iniciada, ir a contenido/index
      $this->redirect('contenido/index');
    } else {
      //sesion iniciada, continuar

      //mostrado de articulos y demas
      $fechaYHoraActuales = date("d/m/Y H:m");
      $this->hora = $fechaYHoraActuales;
      //
      $this->marquita = sfConfig::get("app_marca");
      if ($this->marquita == "a") {
        //ir al modulo contenido:index
        //$this->forward('contenido', 'index');
        //$this->redirect('contenido/index');
        //$this->redirect('http://www.google.com.co');
        $this->forward404();
        //si ocurre un 404 el sistema pasa autom.
        //a la vista 404 / error404Success.php
        //en settings.yml se define que vista será 
        //la del 404
      }
      //traer en un array todos los datos de la 
      //tabla blog_articulos, es una especie  de
      //mysql fetch array
      $this->listaArticulos = Doctrine_Core::getTable(
        "blog_articulo")
        ->createQuery()
        ->execute();

      //formulario de registro de nuevos articulos
      $this->formRegArt = new ArticulosForm();
      if ($request->isMethod("post")) {
        //si se ha enviado el formulario / registrado un articulo
        $this->formRegArt->bind($request->getParameter("articulo"));

        if ($this->formRegArt->isValid()) {
          //formulario valido sin errores
          //obtener todos valores del formulario 
          $formValues = $this->formRegArt->getValues();
          //obtener valores individuales del formulario
          $this->titulo = $this->formRegArt->getValue("titulo");
          $this->contenido = $this->formRegArt->getValue("contenido");

          //ahora guardar en la BD
          $articulo = new blog_articulo();
          $articulo->setTitulo($this->titulo);
          $articulo->setContenido($this->contenido);
          $articulo->save();

          //redirigir a contenido/ver
          $this->redirect("contenido/ver");
        }
      }
    }
  }

  public function executeError404() {
    //vista 404 personalizada
  }

  public function executeVerarticulo(sfWebRequest $request) {
    //ver cada articulo
    $this->articulo = Doctrine_Core::getTable('blog_articulo')
      ->find(array($request->getParameter('id')));
    $this->forward404Unless($this->articulo);
    //establecer la variable titulo_articulo en 
    //app.yml dinamicamente, usando el metodo
    //"setTituloPagina"
    $this->setTituloPagina(
      $this->articulo->getTitulo(). " - Pacific");
  }

  public function executeCierresesion(sfWebRequest $request) {
    //cerrar la sesion e ir al index
    $this->getUser()->getAttributeHolder()->remove("usuariologueado");
    $this->getUser()->getAttributeHolder()->clear();
    $this->getUser()->setAuthenticated(false);
    //la ruta @index es equivalente a contenido/index
    $this->redirect('@index'); 
  }
}
