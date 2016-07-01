<?php
namespace Application\Controller;
use Application\Entity\Comentario;
use Zend\View\Model\ViewModel;
use	Zend\Mvc\Controller\AbstractActionController;
use Zend\Session\Container;

class ChatController extends AbstractActionController
{
    private $session;
    private $em;

    public function __construct(){
        $this->session = new Container('user');
    }

    public function indexAction(){
        $turma          = $this->params()->fromRoute("nome", 0);
        $query          = $this->getEM()->createQuery("SELECT t.id FROM Application\Entity\Turma t WHERE t.nome ='".$turma."'");
        $idTurma        = $query->getResult();
        $vars['turma']           = $turma;
        $vars['usuario_session'] = $this->session;

        //destiva layout
        $viewModel = new ViewModel($vars);
        $viewModel->setTerminal(true);
        return  $viewModel;


    }

    protected function getEm() {
        if (null === $this->em)
            $this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        return $this->em;
    }
}