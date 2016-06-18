<?php
namespace Application\Controller;
use Application\Entity\Comentario;
use Zend\View\Model\ViewModel;
use	Zend\Mvc\Controller\AbstractActionController;
use Zend\Session\Container;

class ComentarioController extends AbstractActionController
{
    private $em;
    private $session;

    public function __construct(){
        $this->session = new Container('user');
    }

    public function indexAction()
    {
        $id = $this->params()->fromRoute("id", 0);

        $vars['id_post']         = $id;
        $vars['turma']           = $this->params()->fromRoute("nome", 0);
        $vars['conteudoPost']    = $this->getConteudoPost($id);
        $vars['comentarios']     = $this->getComentarioPost($id);
        $vars['usuario_session'] = $this->session;
        return new ViewModel($vars);
    }

    public function cadastrarAction(){

       if($this->params()->fromPost()){
            $data = $this->params()->fromPost();
            if(isset($data['id_usuario'])){
                $comentario = new Comentario();
                $comentario->setConteudo($data['conteudo_comentario']);
                $comentario->setDataComentario($this->getDataAtual());
                $comentario->setUsuario($data['id_usuario']);
                $comentario->setIdPost($data['id_post']);
                $this->getEm()->persist($comentario);
                $this->getEm()->flush();
            }

        }
         return $this->response;
        //return new ViewModel();
    }

    public function editarAction(){
        if($this->params()->fromPost()){
            $data = $this->params()->fromPost();
            $comentario = $this->getEm()->find('\Application\Entity\Comentario', $data['id_comentario']);
            //$usuario = $this->getEm()->getReference('Application\Entity\Usuario', $data['id_usuario']);
            //$turma =  $this->getEm()->getReference('Application\Entity\Turma',  $data['id_turma']);
            $comentario->setConteudo($data['conteudo_comentario']);
            $comentario->setDataComentario($this->getDataAtual());
            $comentario->setUsuario($data['id_usuario']);
            $this->getEm()->persist($comentario);
            $this->getEm()->flush();
        }
    }

    protected function  getConteudoPost($id){
        $sql = "
           select u.nome
                , u.foto
                , u.id_facebook as id_usuario
                , p.titulo
                , p.data_post
                , p.conteudo
                , t.nome as nome_turma
             from post p
            inner join turma t
               on t.id = p.id_turma
            inner join usuario u
                on u.id_facebook = p.usuario
              where p.id =".$id;
        $stmt = $this->getEm()->getConnection()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    protected function getComentarioPost($id){
        $sql = "
           select  c.id as id_comentario
                ,  u.id_facebook as id_usuario
                , c.conteudo
                , c.data_comentario
                , u.nome as autor
                , c.data_comentario
             from comentario c
            inner join post p
               on p.id = c.id_post
            inner join usuario u
               on c.usuario = u.id_facebook
               where p.id =".$id;

        $stmt = $this->getEm()->getConnection()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function excluirAction(){

        if($this->params()->fromPost()) {
            $data = $this->params()->fromPost();
            //var_dump($data['id_comentario']);
            if($this->session->id == $data['id_usuario']){
                $comentario = $this->getEM()->find("Application\Entity\Comentario", $data['id_comentario']);
                $this->getEM()->remove($comentario);
                $this->getEM()->flush();
            }

        }
       // die();
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