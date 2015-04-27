<?php
namespace Fidoti\Model;

use Zend\InputFilter\Factory as InputFactory;     
use Zend\InputFilter\InputFilter;                 
use Zend\InputFilter\InputFilterAwareInterface;   
use Zend\InputFilter\InputFilterInterface;        

class Fidoti implements InputFilterAwareInterface
{
    public $id;
    public $nome;
    public $telefone;
    public $celular;
    public $endereco;
    public $email;
    public $servico;
    public $descricao;
    public $tipo;
    public $produto;
    public $valor;
    public $data_retirada;
    public $data_entrega;
    public $forma_pagamento;
    public $obs;
    public $data;

    protected $inputFilter;

    public function exchangeArray($data)
    {
        $this->id = (isset($data['id'])) ? $data['id'] : null;
        $this->nome = (isset($data['nome'])) ? $data['nome'] : null;
        $this->telefone  = (isset($data['telefone'])) ? $data['telefone'] : null;
        $this->celular  = (isset($data['celular'])) ? $data['celular'] : null;
        $this->endereco  = (isset($data['endereco'])) ? $data['endereco'] : null;
        $this->email  = (isset($data['email'])) ? $data['email'] : null;
        $this->servico  = (isset($data['servico'])) ? $data['servico'] : null;
        $this->descricao  = (isset($data['descricao'])) ? $data['descricao'] : null;
        $this->tipo  = (isset($data['tipo'])) ? $data['tipo'] : null;
        $this->produto  = (isset($data['produto'])) ? $data['produto'] : null;
        $this->valor  = (isset($data['valor'])) ? $data['valor'] : null;
        $this->data_retirada  = (isset($data['data_retirada'])) ? $data['data_retirada'] : null;
        $this->data_entrega  = (isset($data['data_entrega'])) ? $data['data_entrega'] : null; 
        $this->forma_pagamento  = (isset($data['forma_pagamento'])) ? $data['forma_pagamento'] : null;
        $this->obs  = (isset($data['obs'])) ? $data['obs'] : null;        
        $this->data  = (isset($data['data'])) ? $data['data'] : null; 
    }

    public function getArrayCopy()
     {
         return get_object_vars($this);
     }

    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }

    public function getInputFilter()
    {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();
            $factory     = new InputFactory();

            $inputFilter->add($factory->createInput(array(
                'name'     => 'id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name'     => 'nome',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 100,
                        ),
                    ),
                ),
            )));

            // $inputFilter->add($factory->createInput(array(
            //     'name'     => 'telefone',
            //     'required' => true,
            //     'filters'  => array(
            //         array('name' => 'StripTags'),
            //         array('name' => 'StringTrim'),
            //     ),
            //     'validators' => array(
            //         array(
            //             'name'    => 'StringLength',
            //             'options' => array(
            //                 'encoding' => 'UTF-8',
            //                 'min'      => 1,
            //                 'max'      => 100,
            //             ),
            //         ),
            //     ),
            // )));

            // $inputFilter->add($factory->createInput(array(
            //     'name'     => 'endereco',
            //     'required' => true,
            //     'filters'  => array(
            //         array('name' => 'StripTags'),
            //         array('name' => 'StringTrim'),
            //     ),
            //     'validators' => array(
            //         array(
            //             'name'    => 'StringLength',
            //             'options' => array(
            //                 'encoding' => 'UTF-8',
            //                 'min'      => 1,
            //                 'max'      => 100,
            //             ),
            //         ),
            //     ),
            // )));

            // $inputFilter->add($factory->createInput(array(
            //     'name'     => 'servico',
            //     'required' => true,
            //     'filters'  => array(
            //         array('name' => 'StripTags'),
            //         array('name' => 'StringTrim'),
            //     ),
            //     'validators' => array(
            //         array(
            //             'name'    => 'StringLength',
            //             'options' => array(
            //                 'encoding' => 'UTF-8',
            //                 'min'      => 1,
            //                 'max'      => 100,
            //             ),
            //         ),
            //     ),
            // )));

            // $inputFilter->add($factory->createInput(array(
            //     'name'     => 'descricao',
            //     'required' => true,
            //     'filters'  => array(
            //         array('name' => 'StripTags'),
            //         array('name' => 'StringTrim'),
            //     ),
            //     'validators' => array(
            //         array(
            //             'name'    => 'StringLength',
            //             'options' => array(
            //                 'encoding' => 'UTF-8',
            //                 'min'      => 1,
            //                 'max'      => 100,
            //             ),
            //         ),
            //     ),
            // )));  

            // $inputFilter->add($factory->createInput(array(
            //     'name'     => 'quantidade',
            //     'required' => true,
            //     'filters'  => array(
            //         array('name' => 'StripTags'),
            //         array('name' => 'StringTrim'),
            //     ),
            //     'validators' => array(
            //         array(
            //             'name'    => 'StringLength',
            //             'options' => array(
            //                 'encoding' => 'UTF-8',
            //                 'min'      => 1,
            //                 'max'      => 100,
            //             ),
            //         ),
            //     ),
            // )));

            // $inputFilter->add($factory->createInput(array(
            //     'name'     => 'valor',
            //     'required' => true,
            //     'filters'  => array(
            //         array('name' => 'StripTags'),
            //         array('name' => 'StringTrim'),
            //     ),
            //     'validators' => array(
            //         array(
            //             'name'    => 'StringLength',
            //             'options' => array(
            //                 'encoding' => 'UTF-8',
            //                 'min'      => 1,
            //                 'max'      => 100,
            //             ),
            //         ),
            //     ),
            // )));            

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }
}