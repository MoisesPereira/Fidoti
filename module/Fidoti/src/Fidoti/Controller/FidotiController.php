<?php
namespace Fidoti\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Fidoti\Model\Fidoti;          
use Fidoti\Form\FidotiForm;       


class FidotiController extends AbstractActionController
{
    protected $fidotiTable;

    public function indexAction()
    {
        return new ViewModel(array(
            'fidotis' => $this->getFidotiTable()->fetchAll(),
        ));
    }

    public function addAction()
    {

        $form = new FidotiForm();
        $form->get('submit')->setValue('Adicionar');

        $request = $this->getRequest();

        if ($request->isPost()) {
            $fidoti = new Fidoti();
            $form->setInputFilter($fidoti->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $fidoti->exchangeArray($form->getData());
                $this->getFidotiTable()->saveFidoti($fidoti);

                return $this->redirect()->toRoute('fidoti');
            }
        }
        return array('form' => $form);
    }

    public function editAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id){
            return $this->redirect()->toRoute('fidoti', array(
                'action' => 'add'
                ));
        }

        try{
            $fidoti = $this->getFidotiTable()->getFidoti($id);
        }
        catch(\Exception $ex){
            return $this->redirect()->toRoute('fidoti', array(
                'action' => 'index'
                ));
        }

        $form = new FidotiForm();
        $form->bind($fidoti);
        $form->get('submit')->setAttribute('value', 'Editar');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter($fidoti->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $this->getFidotiTable()->saveFidoti($fidoti);

                return $this->redirect()->toRoute('fidoti');
            }
        }

        return array(
            'id' => $id,
            'form' => $form,
            );
    }

    public function selecionarAction()
    {
        //var_dump('get in here!!!');
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id){
            return $this->redirect()->toRoute('fidoti', array(
                'action' => 'index'
                ));
        }

        try{
            $fidoti = $this->getFidotiTable()->getFidoti($id);
        }
        catch(\Exception $ex){
            return $this->redirect()->toRoute('fidoti', array(
                'action' => 'index'
                ));
        }

        $form = new FidotiForm();
        $form->bind($fidoti);
        $form->get('submit')->setAttribute('value', 'Voltar');

        return array(
            'id' => $id,
            'form' => $form,
            );

        return $this->redirect()->toRoute('fidoti');

        /*$request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter($fidoti->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $this->getFidotiTable()->saveFidoti($fidoti);

                return $this->redirect()->toRoute('fidoti');
            }
        }

        return array(
            'id' => $id,
            'form' => $form,
            );*/
    }

    public function deleteAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('fidoti');
        }

        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost('del', 'No');

            if ($del == 'Yes') {
                $id = (int) $request->getPost('id');
                $this->getFidotiTable()->deleteFidoti($id);
            }

            return $this->redirect()->toRoute('fidoti');
        }

        return array(
            'id' => $id,
            'fidoti' => $this->getFidotiTable()->getFidoti($id)
            );
    }

    public function getFidotiTable()
    {
        if (!$this->fidotiTable) {
            $sm = $this->getServiceLocator();
            $this->fidotiTable = $sm->get('Fidoti\Model\FidotiTable');
        }
        return $this->fidotiTable;
    }
}