<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        $this->initView();
    }

    public function indexAction()
    {
    	// action body
    }
    
	public function preDispatch()
	{
		$auth = Zend_Auth::getInstance();
		if (!$auth->hasIdentity()) {
			
			$this->_redirect('autenticacao/login');
		}
	}


}

