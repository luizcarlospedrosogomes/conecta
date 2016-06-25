<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Session\Container;

class IndexController extends AbstractActionController
{
    private $session;
    private $em;

    public function __construct()
    {
        $this->session = new Container('user');
    }
        public function indexAction()  {
            //var_dump($this->session->id);
            if(is_null($this->session->id)) {
                //var_dump($this->session->id);
                $vars['titulo'] = "UTFPR";
                return new ViewModel();
            }else{
                return $this->redirect()->toRoute('timeline');

        }
    }

    public function  timelineAction(){
        $vars['session'] = $this->session;
        $vars['titulo'] = $this->session->nome;
        $vars['posts'] = $this->getPostTurma();
        return new ViewModel($vars);
    }

    protected function getPostTurma(){
        $sql = "
              select p.id as id_post
                     , p.titulo
                     , p.conteudo
                     , p.id as id_post
                     , p.data_post
                     , u.id_facebook as id_usuario
                     , u.nome
                     , u.foto
                     , (select count(c.id) from comentario c where c.id_post = p.id ) as n_comentario
                     , t.nome as turma
                  from post p
                 inner join usuario u               
                    on p.usuario = u.id_facebook
                  inner join turma t
	                  on p.id_turma = t.id
                    order by id_post desc";

        $stmt = $this->getEm()->getConnection()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }


    protected function getEm() {
        if (null === $this->em)
            $this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        return $this->em;
    }

}
