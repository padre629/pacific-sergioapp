<?php

/**
 * blog_comentario form base class.
 *
 * @method blog_comentario getObject() Returns the current form's model object
 *
 * @package    pacific-sergioapp
 * @subpackage form
 * @author     Sergio A Guzman (sagg629@hotmail.com)
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class Baseblog_comentarioForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'titulo'           => new sfWidgetFormInputText(),
      'blog_articulo_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('blog_articulo'), 'add_empty' => true)),
      'autor'            => new sfWidgetFormInputText(),
      'contenido'        => new sfWidgetFormTextarea(),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'titulo'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'blog_articulo_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('blog_articulo'), 'required' => false)),
      'autor'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'contenido'        => new sfValidatorString(array('required' => false)),
      'created_at'       => new sfValidatorDateTime(),
      'updated_at'       => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('blog_comentario[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'blog_comentario';
  }

}
