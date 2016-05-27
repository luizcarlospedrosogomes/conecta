<?php
/**
 * Created by PhpStorm.
 * User: usuario
 * Date: 20/05/2016
 * Time: 14:57
 */
namespace Application\Controller;
use Application\Entity\Post;
use Application\Entity\UsuarioTurma;
use Zend\View\Model\ViewModel;
use	Zend\Mvc\Controller\AbstractActionController;
use Doctrine\ORM\EntityManager;
use Application\Entity\Turma;
use Zend\Session\Container;
use Zend\Mvc\Controller\Plugin\FlashMessenger;

class PostController extends AbstractActionController
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

        $queryIngressar = $this->getEM()->createQuery("SELECT t.id FROM Application\Entity\UsuarioTurma t WHERE t.idTurma =".$idTurma[0]['id']." and t.idUsuario = '".$this->session->id."'");
        $ingressar      = $queryIngressar->getResult();

        $vars['turma']           = $turma;
        $vars['ingressar']       = $ingressar[0]['id'];
        $vars['post']            = $this->getPostTurma($idTurma[0]['id']);
        $vars['usuario_session'] = $this->session;
        $vars['id_turma']        = $idTurma[0]['id'];

        return new ViewModel($vars);
        
    }

    public function cadastrarAction(){
        if($this->params()->fromPost()){
            $data = $this->params()->fromPost();
            if(isset($data['id_usuario'])){
                $usuario = $this->getEm()->getReference('Application\Entity\Usuario', $data['id_usuario']);
                $turma =  $this->getEm()->getReference('Application\Entity\Turma',  $data['id_turma']);
                $post = new Post();
                $post->setConteudo($data['assunto']);
                $post->setDataPost($this->getDataAtual());
                $post->setTitulo($data['titulo']);
                $post->setUsuario($usuario);
                $post->setIdTurma($turma);
                $this->getEm()->persist($post);
                $this->getEm()->flush();
            }

        }
        return $this->response;
        //return new ViewModel();
    }

    public function editarAction(){
        if($this->params()->fromPost()){
            $data = $this->params()->fromPost();
            $post = $this->getEm()->find('\Application\Entity\Post', $data['id_post']);
            $usuario = $this->getEm()->getReference('Application\Entity\Usuario', $data['id_usuario']);
            $turma =  $this->getEm()->getReference('Application\Entity\Turma',  $data['id_turma']);
            $post->setConteudo($data['assunto']);
            $post->setDataPost($this->getDataAtual());
            $post->setTitulo($data['titulo']);
            $post->setUsuario($usuario);
            $post->setIdTurma($turma);
            $this->getEm()->persist($post);
            $this->getEm()->flush();
        }
    }

    public function excluirAction(){

        if($this->params()->fromPost()) {
            $data = $this->params()->fromPost();
            $query = $this->getEM()->createQuery("SELECT IDENTITY(p.usuario) as usuario FROM Application\Entity\Post p WHERE p.id =".$data['id_post']);
            $idUsuarioPost = $query->getResult();
            if($this->session->id == $idUsuarioPost[0]['usuario']){
               $post = $this->getEM()->find("Application\Entity\Post", $data['id_post']);
               $this->getEM()->remove($post);
               $this->getEM()->flush();
            }

        }
    }

    protected function getPostTurma($idTurma){
        $sql = "select p.id as id_post
                     , p.titulo
                     , p.conteudo
                     , p.id as id_post
                     , p.data_post
                     , u.id as id_usuario
                     , u.nome
                     , u.foto
                  from post p
                 inner join usuario u
                    on p.usuario = u.id
                    where p.id_turma =".$idTurma;
        $stmt = $this->getEm()->getConnection()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
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
}