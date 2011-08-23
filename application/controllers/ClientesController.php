<?php

class ClientesController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $cid = new Application_Model_Cidades();
        $cid->getCidadesByEstados('PR');
    }

    public function addAction()
    {
	$form = new Application_Form_Clientes();        
        $this->view->form = $form;
        
        if ($this->_request->isPost()) {        	
            if($form->isValid($this->_request->getPost())){
        	$valores = array(
			 	'cpfCnpjTomador' => $form->cpfCnpjTomador->getValue(),
			 	'inscricaoMunicipalTomador' =>$form->inscricaoMunicipalTomador->getValue(),
			 	'razaoSocialTomador' =>$form->razaoSocialTomador->getValue(),
			 	'enderecoTomador' =>$form->enderecoTomador->getValue(),
			 	'numeroEnderecoTomador' =>$form->numeroEnderecoTomador->getValue(),
			 	'complementoEnderecoTomador' =>$form->complementoEnderecoTomador->getValue(),
			 	'bairroTomador' =>$form->bairroTomador->getValue(),
			 	'cidadeTomador' =>$form->cidadeTomador->getValue(),
			 	'ufTomador' => $form->ufTomador->getValue(),
			 	'paisTomador' =>$form->paisTomador->getValue(),
				'cepTomador' => $form->cepTomador->getValue(),
			 	'emailTomador' => $form->emailTomador->getValue(),
			 	'telefoneTomador' => $form->telefoneTomador->getValue()
	 	);
		$modelo = new Application_Model_Clientes();
	 	if($modelo->insert($valores)){ 
		    $this->_redirect('clientes/list');
	 	} else {
		    $form->populate($valores);
		    $this->view->formulario = $form;
		}		
            }	    
	} 
    }

    public function listAction()
    {
    	$modelo = new Application_Model_Clientes();
    	$cnte = $modelo->mostraTodos();
    	$this->view->assign('cnte', $cnte);
        // action body
    }

    public function removeAction()
    {
    	// verificamos se realmente foi informado algum ID
        if ( $this->_hasParam('razaoSocialTomador') == false )
        {
            $this->_redirect('clientes/list');
        }
 		$modelo = new Application_Model_Clientes();
        $razaoSocialTomador = $this->_getParam('razaoSocialTomador');
        $modelo->removeByRazaoSocial($razaoSocialTomador);

//        $cnte = $modelo->removeByRazaoSocial($razaoSocialTomador);
		$this->_redirect('clientes/list');
        // action body
    }

    public function editarAction()
    {
    	if ( $this->_hasParam('id') == false )
        {
            $this->_redirect('clientes/list');
        }
        
    	$form = new Application_Form_ClienteEditar();
    	$modelo = new Application_Model_Clientes();
    	
    	$id = $this->_getParam('id');
    	
    	$form->populate($modelo->getClienteById($id));      
        $this->view->form = $form;	
        // action body
    	if ($this->_request->isPost()) {        	
        	$valores = array(
	 			'cpfCnpjTomador' => $form->cpfCnpjTomador->getValue(),
			 	'inscricaoMunicipalTomador' =>$form->inscricaoMunicipalTomador->getValue(),
			 	'razaoSocialTomador' =>$form->razaoSocialTomador->getValue(),
			 	'enderecoTomador' =>$form->enderecoTomador->getValue(),
			 	'numeroEnderecoTomador' =>$form->numeroEnderecoTomador->getValue(),
			 	'complementoEnderecoTomador' =>$form->complementoEnderecoTomador->getValue(),
			 	'bairroTomador' =>$form->bairroTomador->getValue(),
			 	'cidadeTomador' =>$form->cidadeTomador->getValue(),
			 	'ufTomador' => $form->ufTomador->getValue(),
			 	'paisTomador' =>$form->paisTomador->getValue(),
				'cepTomador' => $form->cepTomador->getValue(),
			 	'emailTomador' => $form->emailTomador->getValue(),
			 	'telefoneTomador' => $form->telefoneTomador->getValue()
 	   		); 	   		
 	   		

 	   		$modelo->updateById($id, $valores);
 	   		
    	
    	}
    }
    
    public function addfisicoAction()
    {

    }

    public function addjuridicoAction()
    {
        $form = new Application_Form_ClienteJuridico();        
        $this->view->form = $form;
        
        if ($this->_request->isPost()) {        	
        	if($form->isValid($this->_request->getPost())){
        		$insere = true;
        	}
            echo $form->cepTomador->getValue();
	    	if ($insere == true) {
	      		$valores = array(
	 			'cpfCnpjTomador' => $form->cnpjTomador->getValue(),
	 			'inscricaoMunicipalTomador' =>$form->inscricaoMunicipalTomador->getValue(),
	 			'razaoSocialTomador' =>$form->razaoSocialTomador->getValue(),
	 			'enderecoTomador' =>$form->enderecoTomador->getValue(),
	 			'numeroEnderecoTomador' =>$form->numeroEnderecoTomador->getValue(),
	 			'complementoEnderecoTomador' =>$form->complementoEnderecoTomador->getValue(),
	 			'bairroTomador' =>$form->bairroTomador->getValue(),
	 			'cidadeTomador' =>$form->cidadeTomador->getValue(),
	 			'ufTomador' => $form->ufTomador->getValue(),
	 			'paisTomador' =>$form->paisTomador->getValue(),
				'cepTomador' => $form->cepTomador->getValue(),
	 	   		'emailTomador' => $form->emailTomador->getValue(),
	 	   		'telefoneTomador' => $form->telefoneTomador->getValue()
	 	   		);
	    		$modelo = new Application_Model_Clientes();
	 	   		if($modelo->insert($valores)){ 
	 	   			$this->_redirect('clientes/list');
	 	   		} else {
	      			$form->populate($valores);
	      			$this->view->formulario = $form;
				}
				$insere = false;
            }	    
		} 
    }


}















