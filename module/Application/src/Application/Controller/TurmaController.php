<?php
namespace Application\Controller;
use Application\Entity\UsuarioTurma;
use Zend\View\Model\ViewModel;
use	Zend\Mvc\Controller\AbstractActionController;
use Doctrine\ORM\EntityManager;
use Application\Entity\Turma;
use Zend\Session\Container;
use Zend\Mvc\Controller\Plugin\FlashMessenger;

class TurmaController extends AbstractActionController{
	
	private $em;
	private $session;
	
	public function __construct(){
		$this->session = new Container('user');
	}
	public function indexAction(){
		//var_dump($this->getAlunoInstituicao($this->session->id));
		$vars['usuario_turma']   = $this->getAlunoInstituicao($this->session->id);
		$vars['usuario_session'] = $this->session;
		$vars['contents']        = $this->getTurmaCadastrada();

        return new ViewModel($vars);
	}
	
	public function cadastroAction(){
		//if($_REQUEST['nome_turma']) {
            $data = $this->params()->fromPost();
                $entity = new Turma();
                $entity->setNome($data['nome_turma'])
					  ->setDataCriacao($this->getDataAtual())
					  ->setUsuario($data['id_usuario'])
					  ->setInstituicao($data['id_instituicao'])
					  ->setAtivo(1)
				;
                $this->getEm()->persist($entity);
                $this->getEm()->flush();

        //}
		  //return $this->response;
        return $this->redirect()->toRoute('application/default',
											array('controller' => 'turma', 'action' => 'index'));
	}

	public function ingressarAction(){
		if($this->getRequest()->isPost()) {
			$data = $this->params()->fromPost();
			$entity = new UsuarioTurma();
			$entity->setIdUsuario($data['id_usuario'])
					->setIdTurma($data['id_turma'])
			;
			$this->getEm()->persist($entity);
			$this->getEm()->flush();
		}
		return $this->response;
		return $this->redirect()->toRoute('application/default',
		array('controller' => 'usuario', 'action' => 'index'));
	}

	protected function getEm() {
        if (null === $this->em)
            $this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        return $this->em;
    }
	
	protected function getDataAtual(){
		date_default_timezone_set('Australia/Melbourne');
		$date = date('d/m/Y', time());
		return $date;
	}
	
	public function getTurmaCadastrada(){
		$sql = " 
			select  i.id
					, t.id as id_turma
					, t.nome  as nome_turma
					, t.data_criacao
					, t.ativo
					, u.nome as nome_usuario
					, u.foto
					, i.descricao
					, u.id as id_usuario
				 from turma t
		   inner join usuario u
				   on t.usuario = u.id
		   inner join instituicao i
				   on u.instituicao = i.id
			 group by i.id, t.nome 
					, t.data_criacao
					, t.ativo
					, u.nome
					, u.foto
					, i.descricao
					, u.id
					, t.id
		";
		$stmt = $this->getEm()->getConnection()->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
	} 
	
	public function getAlunoInstituicao($idAluno){   
		$sql = " 
		select * 
		  from usuario u
	inner join instituicao i
			on u.instituicao = i.id
		 where u.id = '".$idAluno."'
		";
		$stmt = $this->getEm()->getConnection()->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
	} 
	
	public function excluirAction(){
		echo "Excluir<br>";
		echo $this->params()->fromRoute("id", 0);
		if($this->session->id){
			$id          = $this->params()->fromRoute("id", 0);
			$funcionario = $this->getEM()->find("Application\Entity\Turma", $id);        
			$this->getEM()->remove($funcionario);
			$this->getEM()->flush();
			return $this->redirect()->toRoute('application/default', 
											array('controller' => 'turma', 'action' => 'index'));
		}
	}
}