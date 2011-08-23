<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	protected function _initAutoload()
	{
	    $autoloader = new Zend_Application_Module_Autoloader(array(
	            'basePath' => APPLICATION_PATH,
	            'namespace' => ''
	    ));
	    return $autoloader;
	}

	protected function _initNavigation() {
        $this->bootstrap ( 'layout' );
        $layout = $this->getResource ( 'layout' );
        $view = $layout->getView ();
        $config = new Zend_Config_Ini ( APPLICATION_PATH . '/configs/navigation.ini' ); // caso tenha trocado o nome ou local do arquivo, modifique esta linha
        $navigation = new Zend_Navigation ( $config );
        $view->navigation ( $navigation );
    }
    
}

