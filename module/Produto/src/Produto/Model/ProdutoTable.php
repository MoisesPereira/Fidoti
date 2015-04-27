<?php
namespace Produto\Model;

use Zend\Db\TableGateway\TableGateway;

class ProdutoTable
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

    public function getProduto($id)
    {
        $id  = (int) $id;
        $rowset = $this->tableGateway->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }

    public function saveProduto(Produto $produto)
    {
        $data = array(
            'nome' => $produto->nome,
            'codigo'  => $produto->codigo,
            'genero'  => $produto->genero,
            'quantidade'  => $produto->quantidade,
        );

        $id = (int)$produto->id;
        if ($id == 0) {
            $this->tableGateway->insert($data);
        } else {
            if ($this->getProduto($id)) {
                $this->tableGateway->update($data, array('id' => $id));
            } else {
                throw new \Exception('Form id does not exist');
            }
        }
    }

    public function deleteProduto($id)
    {
        $this->tableGateway->delete(array('id' => $id));
    }
}