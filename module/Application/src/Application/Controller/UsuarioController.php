<?php
namespace Application\Controller;
use Zend\View\Model\ViewModel;
use	Zend\Mvc\Controller\AbstractActionController;
use Zend\Session\Container;
use Doctrine\ORM\EntityManager;
use Application\Entity\Usuario;
use Zend\Mvc\Controller\Plugin\FlashMessenger;

class UsuarioController extends AbstractActionController{
	
	private $id;
	private $session;
	private $em;

	public function indexAction(){
	}
	
	public function iniciarSessaoAction(){
		
		if($this->getRequest()->isPost()) {
			$this->sessionUsuario($_REQUEST['id'],  $_REQUEST['nome'], $_REQUEST['foto']);
			if($_REQUEST['id']){
				if($this->verificarUsuario($_REQUEST['id']) === NULL){
					$entity = new Usuario();
					$entity->setId($_REQUEST['id'])
				       ->setNome($_REQUEST['nome'])
				       ->setFoto($_REQUEST['foto'])
			           ->setInstituicao($_REQUEST['faculdade'])
					;
                    $this->getEm()->persist($entity);
					$this->getEm()->flush();
				}
			//	$this->sessionUsuario($_REQUEST['id'],  $_REQUEST['nome'], $_REQUEST['foto']);
				
			}
		}
		// nao retorna view //	
		//return $this->response;
		return $this->redirect()->toUrl('/conecta/public/turma');
	}
	
	protected function verificarUsuario($id){
		  $usuario = $this->getEm()->find('\Application\Entity\Usuario', $id);
		  return $usuario;
	}
	
	protected function sessionUsuario($id, $nome, $foto){
		$session = new Container('user');
		$session->id = $id;
		$session->usuario = $nome;
		$session->foto = $foto;
	}
	
	protected function getEm() {
        if (null === $this->em)
            $this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        return $this->em;
    }
}
