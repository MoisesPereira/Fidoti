<?php
namespace Album\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Album\Model\Album;          // <-- Add this import
use Album\Form\AlbumForm;       // <-- Add this import


class AlbumController extends AbstractActionController
{
    protected $albumTable;

    public function indexAction()
    {
        
        return new ViewModel(array(
            'albums' => $this->getAlbumTable()->fetchAll(),
        ));
    }

    public function homeFacAction()
    {
        return new ViewModel(array(
            'albums' => $this->getAlbumTable()->fetchAll(),
        ));
    }    

    public function addAction()
    {
        $form = new AlbumForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $album = new Album();
            $form->setInputFilter($album->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $album->exchangeArray($form->getData());
                $this->getAlbumTable()->saveAlbum($album);

                return $this->redirect()->toRoute('album');
            }
        }
        return array('form' => $form);
    }

    public function addFacAction()
    {
        $form = new AlbumForm();
        $form->get('submit')->setValue('Adicionar');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $album = new Album();
            $form->setInputFilter($album->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $album->exchangeArray($form->getData());
                $this->getAlbumTable()->saveAlbum($album);

                return $this->redirect()->toRoute('album');
            }
        }
        return array('form' => $form);
    }

    public function editAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id){
            return $this->redirect()->toRoute('album', array(
                'action' => 'add'
                ));
        }

        try{
            $album = $this->getAlbumTable()->getAlbum($id);
        }
        catch(\Exception $ex){
            return $this->redirect()->toRoute('album', array(
                'action' => 'index'
                ));
        }

        $form = new AlbumForm();
        $form->bind($album);
        $form->get('submit')->setAttribute('value', 'Edit');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter($album->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $this->getAlbumTable()->saveAlbum($album);

                //Redireciona para a lista de albuns
                return $this->redirect()->toRoute('album');
            }
        }

        return array(
            'id' => $id,
            'form' => $form,
            );
    }

    public function editFacAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id){
            return $this->redirect()->toRoute('album', array(
                'action' => 'add'
                ));
        }

        try{
            $album = $this->getAlbumTable()->getAlbum($id);
        }
        catch(\Exception $ex){
            return $this->redirect()->toRoute('album', array(
                'action' => 'index'
                ));
        }

        $form = new AlbumForm();
        $form->bind($album);
        $form->get('submit')->setAttribute('value', 'Editar');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter($album->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $this->getAlbumTable()->saveAlbum($album);

                //Redireciona para a lista de albuns
                return $this->redirect()->toRoute('album');
            }
        }

        return array(
            'id' => $id,
            'form' => $form,
            );
    }

    public function deleteAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('album');
        }

        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost('del', 'No');

            if ($del == 'Yes') {
                $id = (int) $request->getPost('id');
                $this->getAlbumTable()->deleteAlbum($id);
            }

            return $this->redirect()->toRoute('album');
        }

        return array(
            'id' => $id,
            'album' => $this->getAlbumTable()->getAlbum($id)
            );
    }

    public function deleteFacAction()
    {   
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('album');
        }

        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost('del', 'Não');

            if ($del == 'Sim') {
                $id = (int) $request->getPost('id');
                $this->getAlbumTable()->deleteAlbum($id);
            }

            return $this->redirect()->toRoute('album');
        }

        return array(
            'id' => $id,
            'album' => $this->getAlbumTable()->getAlbum($id)
            );
    }

    public function getAlbumTable()
    {
        if (!$this->albumTable) {
            $sm = $this->getServiceLocator();
            $this->albumTable = $sm->get('Album\Model\AlbumTable');
        }
        return $this->albumTable;
    }
}