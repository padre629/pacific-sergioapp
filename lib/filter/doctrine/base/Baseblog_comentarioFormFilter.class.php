<?php

/**
 * blog_comentario filter form base class.
 *
 * @package    pacific-sergioapp
 * @subpackage filter
 * @author     Sergio A Guzman (sagg629@hotmail.com)
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class Baseblog_comentarioFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'titulo'           => new sfWidgetFormFilterInput(),
      'blog_articulo_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('blog_articulo'), 'add_empty' => true)),
      'autor'            => new sfWidgetFormFilterInput(),
      'contenido'        => new sfWidgetFormFilterInput(),
      'created_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'titulo'           => new sfValidatorPass(array('required' => false)),
      'blog_articulo_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('blog_articulo'), 'column' => 'id')),
      'autor'            => new sfValidatorPass(array('required' => false)),
      'contenido'        => new sfValidatorPass(array('required' => false)),
      'created_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('blog_comentario_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'blog_comentario';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'titulo'           => 'Text',
      'blog_articulo_id' => 'ForeignKey',
      'autor'            => 'Text',
      'contenido'        => 'Text',
      'created_at'       => 'Date',
      'updated_at'       => 'Date',
    );
  }
}
