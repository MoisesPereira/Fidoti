<?php
namespace Produto;

// Add these import statements:
use Produto\Model\Produto;
use Produto\Model\ProdutoTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class Module
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

        // Add this method:
    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Produto\Model\ProdutoTable' =>  function($sm) {
                    $tableGateway = $sm->get('ProdutoTableGateway');
                    $table = new ProdutoTable($tableGateway);
                    return $table;
                },
                'ProdutoTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Produto());
                    return new TableGateway('produto', $dbAdapter, null, $resultSetPrototype);
                },
            ),
        );
    }
}