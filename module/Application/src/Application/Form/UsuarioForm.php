<?php
namespace Application\Form;
use Zend\Form\Form;
use Zend\Form\Element\Text;
use Zend\Form\Element\Hidden;

class UsuarioForm extends Form{
	
	public function __construct(){
		parent::__construct('usuario');
		$id   = new Hidden('id');
		$nome = new Text('nome');
		$nome->setLabel('Nome:')
			 ->setAttributes(array(
				'style' =>'width:150px';
				));
		
		$senha = new Text('senha');
		$senha->setLabel('Senha:')
			 ->setAttributes(array(
				'style' =>'width:150px';
				));
				
		$submit = new Button();
		$submit->setLabel('Cadastrar')
			 ->setAttributes(array(
				'type' =>'submit';
				));
	}
}