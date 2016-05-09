<?php
namespace Application\Controller;
use Zend\View\Model\ViewModel;
use	Zend\Mvc\Controller\AbstractActionController;
use Doctrine\ORM\EntityManager;
use Application\Entity\Turma;
use Zend\Session\Container;

class TurmaController extends AbstractActionController{
	
	private $em;
	
	public function indexAction(){
		$session = new Container('usuario');
		if($this->getAlunoInstituicao($session->usuario))
		$vars['usuario'] =	$this->getAlunoInstituicao($session->usuario);
			}
		}else{
			//return $this->redirect()->toUrl('/conecta/public/usuario');
		}
		$vars['contents'] = $this->getTurmaCadastrada();
        return new ViewModel($vars);
	}
	
	public function cadastroAction(){
		if($this->getRequest()->isPost()) {
            $data = $this->params()->fromPost();
            if ($data['action'] == 'insert') {
            
                $entity = new Turma();
                $entity->setNome('Luiz')
					  ->setData($this->getDataAtual())
					 // ->setUsuario()
				;
                // Persist
                $this->getEm()->persist($entity);
                $this->getEm()->flush();
            }
        }
        return new ViewModel();
	}
	protected function getEm() {
        if (null === $this->em)
            $this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        return $this->em;
    }
	
	protected function getDataAtual(){
		date_default_timezone_set('Australia/Melbourne');
		$date = date('m/d/Y', time());
		return $date;
	}
	
	public function getTurmaCadastrada(){   
		$sql = " 
		select DISTINCT	ON(i.id) i.id
					, t.nome  as nome_turma
					, t.data_criacao
					, t.ativo
					, u.nome as nome_usuario
					, u.foto
					, i.descricao
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
}