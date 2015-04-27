<?php
namespace Fidoti\Form;

use Zend\Form\Form;

class FidotiForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('fidoti');
        $this->setAttribute('method', 'post');
        $this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'OS:',
            ),
        ));
        $this->add(array(
            'name' => 'nome',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Nome:',
            ),
        ));
        $this->add(array(
            'name' => 'telefone',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Telefone:',
            ),
        ));
        $this->add(array(
            'name' => 'celular',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Celular:',
            ),
        ));
        $this->add(array(
            'name' => 'endereco',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Endereço:',
            ),
        ));
        $this->add(array(
            'name' => 'email',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Email:',
            ),
        ));        
        $this->add(array(
            'name' => 'servico',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Serviço:',
            ),
        ));
        $this->add(array(
            'name' => 'descricao',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Descrição:',
            ),
        ));
        $this->add(array(
            'name' => 'tipo',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Tipo:',
            ),
        )); 
        $this->add(array(
            'name' => 'produto',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Produto:',
            ),
        ));        
        $this->add(array(
            'name' => 'valor',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Valor:',
            ),
        ));
        $this->add(array(
            'name' => 'data_retirada',
            'attributes' => array(
                'type' => 'text',
            ),            
            'options' => array(
                'label' => 'Data Retirada:',
            ),
        ));   
        $this->add(array(
            'name' => 'data_entrega',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Data Entrega:',
            ),
        )); 
        $this->add(array(
            'name' => 'forma_pagamento',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Forma Pagamento:',
            ),
        ));
        $this->add(array(
            'name' => 'obs',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Obs:',
            ),
        ));    
        $this->add(array(
            'name' => 'data',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Data:',
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