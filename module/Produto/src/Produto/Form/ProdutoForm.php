<?php
namespace Produto\Form;

use Zend\Form\Form;

class ProdutoForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('produto');
        $this->setAttribute('method', 'post');
        $this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));
        $this->add(array(
            'name' => 'nome',
            'attributes' => array(
                'type'  => 'text',
                'id'    => 'campos',
            ),
            'options' => array(
                'label' => 'Nome',
            ),
        ));
        $this->add(array(
            'name' => 'codigo',
            'attributes' => array(
                'type'  => 'text',
                'id'    => 'campos2',
            ),
            'options' => array(
                'label' => 'Código',
            ),
        ));
        $this->add(array(
            'name' => 'genero',
            'attributes' => array(
                'type'  => 'text',
                'id'    => 'campos',
            ),
            'options' => array(
                'label' => 'Genero',
            ),
        ));
        $this->add(array(
            'name' => 'quantidade',
            'attributes' => array(
                'type'  => 'text',
                'id'    => 'campos2',
            ),
            'options' => array(
                'label' => 'Quantidade',
            ),
        ));
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Go',
                'id' => 'submitbutton',
            ),
        ));
    }
}