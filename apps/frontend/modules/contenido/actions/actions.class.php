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

    public function preExecute() {
        //primero ejecutar esta funcion siempre
        // que se ejecute cualquier otra
        $this->haysesion = $this->getUser()->hasAttribute("usuariologueado");
    }

 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    //$this->forward('default', 'module');
    if ($this->haysesion == true) {
        //sesion iniciada, ir a contenido/ver
        $this->redirect('contenido/ver');
    } else {
        $this->pass = $request->getParameter("contra");
        $this->user = $request->getParameter("usuario");
        if ($this->user != "") {
            $this->getUser()->setAttribute("usuariologueado", 
                $this->user);
            $this->getUser()->setAuthenticated(true);
            $this->redirect('contenido/ver');
            //$this->forward("contenido", "ver");
        }
    }
  }

  public function executeVer(sfWebRequest $request) {
    //backend para el archivo frontend
    // ../templates/verSuccess.php
    if ($this->haysesion == false) {
        //sesion iniciada, ir a contenido/ver
        $this->redirect('contenido/index');
    } else {
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
        $this->listaArticulos = Doctrine_Core::getTable("blog_articulo")
            ->createQuery()
            ->execute();
        /*$this->arrListaTitulos = array();
        $this->arrListaCont = array();
        foreach ($this->listaArticulos as $lista) {
            $this->arrListaTitulos[$lista->getId()] = $lista->getTitulo();
            $this->arrListaCont[$lista->getId()] = $lista->getContenido();
        }*/
    }
  }

  public function executeRecibirnombre(sfWebRequest $request) {
    //backend para el archivo frontend
    // ../templates/recibirnombreSuccess.php
    //recuperar datos de la peticion dentro de una acción
    //$this->nombre = $request->getParameter("nombre");
    //$this->direccion = $request->getParameter("direccion");
    //$this->telefono = $request->getParameter("telefono");
    $this->titulo = $request->getParameter("titulo");
    $this->contenido = $request->getParameter("contenido");
    //ahora guardar en la BD
    $articulo = new blog_articulo();
    $articulo->setTitulo($this->titulo);
    $articulo->setContenido($this->contenido);
    $articulo->save();
    $this->redirect('contenido/ver');
  }

  public function executeError404() {
    //vista 404 personalizada
  }

  public function executeCierresesion(sfWebRequest $request) {
    //cerrar la sesion e ir al index
    $this->getUser()->getAttributeHoldeR()->remove("usuariologueado");
    $this->getUser()->getAttributeHoldeR()->clear();
    $this->getUser()->setAuthenticated(false);
    $this->redirect('contenido/index');
  }
}
