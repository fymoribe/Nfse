<?php

class AutenticacaoController extends Zend_Controller_Action
{

    public function init()
    {
        $this->initView();
    }

    public function indexAction()
    {
        $this->_redirect('/');
    }

    public function loginAction()
    {
    	$this->_helper->layout->disableLayout();
    	
        $form = new Application_Form_Login();
        $this->view->form = $form;
        
        if($this->getRequest()->isPost()){
        	$data = $this->getRequest()->getPost();
        	if($form->isValid($data)){
        		$user = $form->getValue('usuarioLogin');
        		$password = $form->getValue('senhaLogin');
        		
        		$authAdapter = $this->getAuthAdapter();
        		
        		$authAdapter->setIdentity($user);
        		$authAdapter->setCredential($password);
        		
        		$auth = Zend_Auth::getInstance();
            	$result = $auth->authenticate($authAdapter);
            	
            	if($result->isValid()){
            		$info = $authAdapter->getResultRowObject(null, 'senha');
                	$storage = $auth->getStorage();
                	$storage->write($info);
//                	foreach ($info as $store){
//                		echo $store;
//                		echo '<br />';
//                	}
//                	exit;
                	$this->_redirect('/empresas/info');
            	}else{
            		$this->view->messageError = 'Usuário ou senha inválidos';            		
            	}        		
        	} 
        }
    }

    public function logoutAction()
    {
        Zend_Auth::getInstance()->clearIdentity();
        $this->_redirect('/');
    }

	private function getAuthAdapter(){
        $authAdapter = new Zend_Auth_Adapter_DbTable(Zend_Db_Table::getDefaultAdapter());
        $authAdapter->setTableName('usuarios')
                    ->setIdentityColumn('usuario')
                    ->setCredentialColumn('senha');
        
        return $authAdapter;        
    }

}





