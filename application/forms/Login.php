<?php

class Application_Form_Login extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
    	$this->setName('login');
    	$this->setMethod('post');
    	$this->setAction(Zend_Controller_Front::getInstance()->getBaseUrl().'/autenticacao/login');
    	
    	$usuario = new Zend_Form_Element_Text('usuarioLogin');
    	$usuario->setLabel('Usuário:');
    	$usuario->setRequired(TRUE);
    	
    	$senha = new Zend_Form_Element_Password('senhaLogin');
    	$senha->setLabel('Senha:');
    	$senha->setRequired(TRUE);
    	
    	$submit = new Zend_Form_Element_Submit('submitLogin');
    	$submit->setLabel('OK');
    	
    	$this->addElements(array($usuario, $senha, $submit));
    }


}

