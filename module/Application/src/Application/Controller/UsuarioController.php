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
		//$this->session = new Container();
	}

	public function indexAction(){
		$user = new Container('user');
	//	var_dump($user);
		//var_dump($user->id);
		$vars['turma']   = $this->getTurmaIngressa($user->id);
		$vars['usuario_session'] = $user;

		return new ViewModel($vars);
	}
	
	protected function iniciarSessaoAction(){
	 	$data = $this->params()->fromPost();
			//var_dump($data);
			if ($data['id_usuario']) {
				$ver_user = $this->verificarUsuario($_REQUEST['id_usuario']);
				//var_dump($_REQUEST['id_usuario']);
				if (!$ver_user[0]['id_facebook']) {
					$entity = new Usuario();
					$entity->setIdFacebook($_REQUEST['id_usuario']);
					$entity->setNome($_REQUEST['nome']);
					$entity->setFoto($_REQUEST['foto']);
					// $instituicao =  $this->getEm()->getReference('Application\Entity\Instituicao', $_REQUEST['faculdade']);
					$entity->setInstituicao(1);
					$this->getEm()->persist($entity);
					$this->getEm()->flush();
				}
				$user = new Container('user');
				$user->id = $data['id_usuario'];
				$user->usuario =$data['nome'];
				//$user->foto = $_REQUEST['foto'];
				$user->instituicao = 1;
				return $this->response;
				//$this->redirect()->toRoute('usuario');
			}
			//die();
			//$this->redirect()->toRoute('usuario');
	}

	protected function verificarUsuario($id){
		$sql = " 
			 select id_facebook
			  from usuario
  			 where id_facebook = '".$id."'
		";
		$stmt = $this->getEm()->getConnection()->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();

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
			      , (select count(id)  from post p  where p.id_turma = t.id) as n_post
			  from usuario_turma ut
 			 inner join usuario u
 				on u.id_facebook = ut.id_usuario
 			 inner join turma t
 				on t.id = ut.id_turma
 			 inner join instituicao i
 				on i.id = t.instituicao
  			 where ut.id_usuario = '".$idAluno."'";
		$stmt = $this->getEm()->getConnection()->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();

	}
	
	public function logoutAction(){
		$sessao = new Container;
		$sessao->getManager()->getStorage()->clear();
		return$this->redirect()->toRoute('home');
	}

}
