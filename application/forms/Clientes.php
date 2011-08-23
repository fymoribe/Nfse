<?php

class Application_Form_Clientes extends Zend_Form
{   
//	protected $_messageTemplates = array(
//        self::BETWEEN => "O valor '%value%' deve estar entre '%min%' e '%max%'",
//    );
    public function init()
    {    	    
    	$cpfCnpjTomador = new Zend_Form_Element_Text('cpfCnpjTomador');
        $cpfCnpjTomador->setLabel('CPF/CNPJ:');
        $cpfCnpjTomador->setRequired();
		$cpfCnpjTomador->addValidator(new Hazel_Validator_Cpf());         
        $cpfCnpjTomador->addFilter('digits');

        $inscricaoMunicipalTomador = new Zend_Form_Element_Text('inscricaoMunicipalTomador');
        $inscricaoMunicipalTomador->setLabel('Inscrição Municipal: ')
        			              ->setAttrib('maxLength', 15);
        
        $razaoSocialTomador = new Zend_Form_Element_Text('razaoSocialTomador');
        $razaoSocialTomador->setLabel('Raz#o Social: ')
        				   ->setRequired(true)
        				   ->setAttrib('maxLength', 150);			   
//        
        $enderecoTomador = new Zend_Form_Element_Text('enderecoTomador');
        $enderecoTomador->setLabel('Endere#o: ')
        				->setRequired(true)
        				->setAttrib('maxLength', 125);
        
        $numeroEnderecoTomador = new Zend_Form_Element_Text('numeroEnderecoTomador');
        $numeroEnderecoTomador->setLabel('N#mero: ')
        					  ->setRequired(true)
        					  ->setAttrib('maxLength', 10);							  
        
        $complementoEnderecoTomador = new Zend_Form_Element_Text('complementoEnderecoTomador');
        $complementoEnderecoTomador->setLabel('Complemento: ')
        						   ->setRequired(true)
        						   ->setAttrib('maxLength', 60);
        
        $bairroTomador = new Zend_Form_Element_Text('bairroTomador');
        $bairroTomador->setLabel('Bairro: ')
        			  ->setRequired(true)
        			  ->setAttrib('maxLength', 60);
        
    	
        $ufTomador = new Zend_Form_Element_Select('ufTomador');
        $ufTomador->setLabel('UF: ');
        $ufTomador->setAttribs(array(
         			'onChange' => 'carregarCidadesByEstado(this.value)'));
        $ufTomador->addMultiOption('', 'UF'); 
        $uf = new Application_Model_Estados();        								
 		foreach ($uf->getEstados() as $row) { 			
    		$ufTomador->addMultiOption($row['uf'], $row['uf']);
 		}			  
          
        $cidadeTomador = new Zend_Form_Element_Select('cidadeTomador');
        $cidadeTomador->setLabel('Cidade: ');
        $cidadeTomador->addMultiOption('', 'Selecione...');
        $cidadeTomador->setRegisterInArrayValidator(false);
 		 			  		
        
        $paisTomador = new Zend_Form_Element_Select('paisTomador');
        $paisTomador->setLabel('Pais: ');
        $paisTomador->addMultiOption('', 'Escolha o País');
        $paisTomador->addMultiOption('1058', 'Brasil');
        
        			
        
        $cepTomador = new Zend_Form_Element_Text('cepTomador');
        $cepTomador->setLabel('CEP: ')
        		   ->setRequired(true);  
        $cepTomador->addFilter('digits');      
        
        $emailTomador = new Zend_Form_Element_Text('emailTomador');
        $emailTomador->setLabel('E-mail: ')
        			 ->setAttrib('maxLength', 80);
        $emailTomador->addValidator('emailAddress', true, array ('messages' => array(Zend_Validate_EmailAddress::INVALID_FORMAT
        							=> "E-Mail Invalido."	)	));
        			 
        $telefoneTomador = new Zend_Form_Element_Text('telefoneTomador');
        $telefoneTomador->setLabel('Telefone: ')
        				->setRequired(true)
        				->setAttrib('maxLength', 20);
        
        $botaoAdicionar = new Zend_Form_Element_Submit('botaoAdicionar');
        $botaoAdicionar->setLabel('Adicionar');
        
        $botaoVoltar = new Zend_Form_Element_Submit('botaoVoltar');
        $botaoVoltar->setLabel('Voltar');
        
        $this->addElements(array($cpfCnpjTomador, $inscricaoMunicipalTomador, $razaoSocialTomador, $enderecoTomador, $numeroEnderecoTomador, $complementoEnderecoTomador, $bairroTomador, $ufTomador, $cidadeTomador , $paisTomador, $cepTomador, $emailTomador, $telefoneTomador, $botaoAdicionar, $botaoVoltar));
        $this->setMethod('post');
        $this->setName('clientesAdd');
        $this->setAction(Zend_Controller_Front::getInstance()->getBaseUrl().'/clientes/add');
        //$this->setAction(Zend_Controller_Front::getInstance()->getBaseUrl().'/clientes/add');
        /* Form Elements & Other Definitions Here ... */
    }


}

