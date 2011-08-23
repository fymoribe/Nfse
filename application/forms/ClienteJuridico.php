<?php

class Application_Form_ClienteJuridico extends Zend_Form
{
	public function init()
    {    	    
    	$cnpjTomador = new Zend_Form_Element_Text('cnpjTomador');
        $cnpjTomador->setLabel('CNPJ: ');
        $cnpjTomador->setRequired();
		$cnpjTomador->addValidator(new Hazel_Validator_Cnpj());
		$cnpjTomador->addFilter('digits');
//        $cpfCnpjTomador->addValidator('Between', true,	
//        							array (11,14, 'messages' => array(Zend_Validate_Between::NOT_BETWEEN
//        							=> "O CNPJ/CPF '%value%' nao esta entre '%min%' e '%max%'"
//        															)	
//        							));
        //$cpfCnpjTomador->addFilter('digits');
        	
              			           
        $inscricaoMunicipalTomador = new Zend_Form_Element_Text('inscricaoMunicipalTomador');
        $inscricaoMunicipalTomador->setLabel('Inscrição Municipal: ')
        						  ->setRequired(true)
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
        						   ->setAttrib('maxLength', 60);
        
        $bairroTomador = new Zend_Form_Element_Text('bairroTomador');
        $bairroTomador->setLabel('Bairro: ')
        			  ->setRequired(true)
        			  ->setAttrib('maxLength', 60);
        
    	
        $ufTomador = new Zend_Form_Element_Select('ufTomador');
        $ufTomador->setLabel('UF: ');
        $ufTomador->setAttribs(array(
         			'onChange' => 'carregarCidadesByEstado(this.value)'));
        
        $uf = new Application_Model_Estados();
        $ufTomador->addMultiOption('', 'UF');        
        								
 		foreach ($uf->getEstados() as $row) { 			
    		$ufTomador->addMultiOption($row['uf'], $row['uf']);
 		}			  
          
        $cidadeTomador = new Zend_Form_Element_Select('cidadeTomador');
        $cidadeTomador->setLabel('Cidade: ');
        $cidadeTomador->addMultiOption('', 'Selecione...');
        $cidadeTomador->setRegisterInArrayValidator(false);
 		 			  		
        
        $paisTomador = new Zend_Form_Element_Select('paisTomador');
        $paisTomador->setLabel('Pais: ');
        $paisTomador->addMultiOption('', 'Escolha o Pa�s');
        $paisTomador->addMultiOption('1058', 'Brasil');
        
        			
        
        $cepTomador = new Zend_Form_Element_Text('cepTomador');
        $cepTomador->setLabel('CEP: ')
        		   ->setRequired(true);  
        $cepTomador->addFilter('digits');      
        
        $emailTomador = new Zend_Form_Element_Text('emailTomador');
        $emailTomador->setLabel('E-mail: ')
        			 ->setAttrib('maxLength', 80);
        $emailTomador->addValidator('emailAddress', true, array ('messages' => array(Zend_Validate_EmailAddress::INVALID_FORMAT
        							=> "E-Mail Invalido."
        															)	
        							));
        			 
        $telefoneTomador = new Zend_Form_Element_Text('telefoneTomador');
        $telefoneTomador->setLabel('Telefone: ')
        				->setRequired(true)
        				->setAttrib('maxLength', 20);
        
        $botaoAdicionar = new Zend_Form_Element_Submit('botaoAdicionar');
        $botaoAdicionar->setLabel('Adicionar');
        
        $botaoVoltar = new Zend_Form_Element_Submit('botaoVoltar');
        $botaoVoltar->setLabel('Voltar');
        
        $this->addElements(array($cnpjTomador, $inscricaoMunicipalTomador, $razaoSocialTomador, $enderecoTomador, $numeroEnderecoTomador, $complementoEnderecoTomador, $bairroTomador, $ufTomador, $cidadeTomador , $paisTomador, $cepTomador, $emailTomador, $telefoneTomador, $botaoAdicionar, $botaoVoltar));
        $this->setMethod('post');
        $this->setName('clientesAdd');
        $this->setAction(Zend_Controller_Front::getInstance()->getBaseUrl().'/clientes/addjuridico');
        //$this->setAction(Zend_Controller_Front::getInstance()->getBaseUrl().'/clientes/add');
        /* Form Elements & Other Definitions Here ... */
    }
	

}

