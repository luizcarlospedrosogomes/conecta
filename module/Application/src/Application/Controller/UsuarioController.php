<?php
namespace Application\Controller;
use Zend\View\Model\ViewModel;
use	Zend\Mvc\Controller\AbstractActionController;
use Zend\Session\Container;

class UsuarioController extends AbstractActionController{
	
	
	public function indexAction(){
		
	}
	
	public function iniciarSessaoAction(){
		$session = new Container('base');
		
		if($this->getRequest()->isPost()) {
			if($_REQUEST['id']){
				$session->offsetSet('id', $_REQUEST['id']);
				$session->offsetSet('nome', $_REQUEST['nome']);
				$session->offsetSet('foto', $_REQUEST['foto']);
			}
			var_dump($session->offsetGet('nome'));
		}
		return $this->response;
	}
}
