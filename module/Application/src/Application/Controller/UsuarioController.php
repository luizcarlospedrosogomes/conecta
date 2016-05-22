<?php
namespace Application\Controller;
use Zend\View\Model\ViewModel;
use	Zend\Mvc\Controller\AbstractActionController;
use Zend\Session\Container;
use Doctrine\ORM\EntityManager;
use Application\Entity\Usuario;
use Application\Entity\Instituicao;
use Zend\Mvc\Controller\Plugin\FlashMessenger;
use Zend\Session\SessionManager;

class UsuarioController extends AbstractActionController{
	
	private $id;
	private $session;
	private $em;

	public function __construct(){
		$this->session = new Container('user');
	}

	public function onDispatch(\Zend\Mvc\MvcEvent $e)
	{
		if($this->session->id == null) {
			$this->redirect()->toRoute('home');
		}
		return parent::onDispatch($e);
	}
	
	public function indexAction(){
		$vars['turma']   = $this->getTurmaIngressa($this->session->id);
		$vars['usuario_session'] = $this->session;

		return new ViewModel($vars);
	}
	
	protected function iniciarSessaoAction(){
		
		if($this->getRequest()->isPost()) {
			if($_REQUEST['id']){
				if($this->verificarUsuario($_REQUEST['id']) === NULL){
					$entity = new Usuario();
					$entity->setId($_REQUEST['id']);
				    $entity->setNome($_REQUEST['nome']);
				    $entity->setFoto($_REQUEST['foto']);
                    $instituicao =  $this->getEm()->getReference('Application\Entity\Instituicao', $_REQUEST['faculdade']);
                    $entity->setInstituicao($instituicao);
                    $this->getEm()->persist($entity);
					$this->getEm()->flush();
				}
			}
			$this->sessionUsuario($_REQUEST['id'],  $_REQUEST['nome'], $_REQUEST['foto'], $_REQUEST['faculdade']);
			return $this->redirect()->toRoute('usuario');
			//return $this->response;
		}

	}

	protected function verificarUsuario($id){
		$usuario = $this->getEm()->find('\Application\Entity\Usuario', $id);
		return $usuario;
	}

	protected function sessionUsuario($id, $nome, $foto, $instituicao){
		$session = new Container('user');
		$session->id = $id;
		$session->usuario = $nome;
		$session->foto = $foto;
		$session->instituicao =  $instituicao;
	}
	
	protected function getEm() {
        if (null === $this->em)
            $this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        return $this->em;
    }

	protected  function getTurmaIngressa($idAluno){
		$sql = " 
			 select t.id as id_turma 
			 	  ,	t.nome
			      , ut.id_usuario
			      , t.data_criacao
			  from usuario_turma ut
 			 inner join usuario u
 				on u.id = ut.id_usuario
 			 inner join turma t
 				on t.id = ut.id_turma
 			 inner join instituicao i
 				on i.id = t.instituicao
  			 where ut.id_usuario = '".$idAluno."'
		";
		$stmt = $this->getEm()->getConnection()->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();

	}
	
	public function logoutAction(){
		$sessionManager = new SessionManager();
		$array_of_sessions = $sessionManager->getStorage();
		unset($array_of_sessions['user']);
		$this->redirect()->toRoute('home');
	}

}
