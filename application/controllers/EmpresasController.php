<?php

class EmpresasController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function infoAction()
    {
    	$user = Zend_Auth::getInstance()->getStorage()->read();
    	$model_empresa = new Application_Model_Empresas();
    	$empresa =  $model_empresa->getEmpresa($user->empresa_id);
    	
    	$model_cidade = new Application_Model_Cidades();
    	
    	if ($empresa['paisPrestador'] == NULL){
    		$empresa['paisPrestador'] = 'Brasil';
    	}  
    	
    	$btn_editar = new Zend_Form_Element_Button('btn_editar');
    	$btn_editar->setLabel('Editar');
    	$btn_editar->setAttrib('onClick', 'location.href = "editar"');
    	
    	$this->view->empresa = $empresa;
    	$this->view->cidade = $model_cidade->getNomeCidadeById($empresa['cidadePrestador']);
    	    	
    	$this->view->btn_editar = $btn_editar;
    }

    public function editarAction()
    {
    	$user = Zend_Auth::getInstance()->getStorage()->read();	
	    	
        $form = new Application_Form_Empresa();
	        
        $empresa = new Application_Model_Empresas();
        $form->populate($empresa->getEmpresa($user->empresa_id));
	        
        $this->view->form = $form;
         
    	if ($this->_request->isPost()){
    		if($form->isValid($this->_request->getPost())){
    			foreach ($this->_request->getPost() as $post){
    				echo $post;
    			}
    		}
    	}else{    	
	        
    	} 
    }


}





