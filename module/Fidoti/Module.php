<?php
namespace Fidoti;

// Add these import statements:
use Fidoti\Model\Fidoti;
use Fidoti\Model\FidotiTable;
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
                'Fidoti\Model\FidotiTable' =>  function($sm) {
                    $tableGateway = $sm->get('FidotiTableGateway');
                    $table = new FidotiTable($tableGateway);
                    return $table;
                },
                'FidotiTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Fidoti());
                    return new TableGateway('fidoti', $dbAdapter, null, $resultSetPrototype);
                },
            ),
        );
    }
}