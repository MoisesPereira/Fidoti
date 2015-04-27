<?php
namespace Fidoti\Model;

use Zend\Db\TableGateway\TableGateway;

class FidotiTable
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }

    public function getFidoti($id)
    {
        $id  = (int) $id;
        $rowset = $this->tableGateway->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }

    public function saveFidoti(Fidoti $fidoti)
    {
        $data = array(
            'id' => $fidoti->id,
            'nome' => $fidoti->nome,
            'telefone'  => $fidoti->telefone,
            'celular'  => $fidoti->celular,
            'endereco'  => $fidoti->endereco,
            'email'  => $fidoti->email,
            'servico'  => $fidoti->servico,
            'descricao'  => $fidoti->descricao,
            'tipo'  => $fidoti->tipo,
            'produto'  => $fidoti->produto,
            'valor'  => $fidoti->valor,
            'data_retirada'  => $fidoti->data_retirada,
            'data_entrega'  => $fidoti->data_entrega,
            'forma_pagamento'  => $fidoti->forma_pagamento,
            'obs'  => $fidoti->obs,
            'data'  => $fidoti->data,
        );

        $id = (int)$fidoti->id;
        if ($id == 0) {
            $this->tableGateway->insert($data);
        } else {
            if ($this->getFidoti($id)) {
                $this->tableGateway->update($data, array('id' => $id));
            } else {
                throw new \Exception('Form id does not exist');
            }
        }
    }

    public function deleteFidoti($id)
    {
        $this->tableGateway->delete(array('id' => $id));
    }
}