<?php

class Application_Form_ClienteEditar extends Zend_Form
{
	public function init()
    {    	    	
    	$cpfCnpjTomador = new Zend_Form_Element_Text('$cpfCnpjTomador');
        $cpfCnpjTomador->setLabel('CPF/CNPJ: ')
        			   ->setRequired(true);        			   
        
        $inscricaoMunicipalTomador = new Zend_Form_Element_Text('$inscricaoMunicipalTomador');
        $inscricaoMunicipalTomador->setLabel('Inscrição Municipal: ')
        						  ->setRequired(true);
        
        $razaoSocialTomador = new Zend_Form_Element_Text('$razaoSocialTomador');
        $razaoSocialTomador->setLabel('Razão Social: ')
        				   ->setRequired(true);
        
        $enderecoTomador = new Zend_Form_Element_Text('$enderecoTomador');
        $enderecoTomador->setLabel('Endereço: ')
        				->setRequired(true);
        
        $numeroEnderecoTomador = new Zend_Form_Element_Text('$numeroEnderecoTomador');
        $numeroEnderecoTomador->setLabel('Número: ')
        					  ->setRequired(true);
        
        $complementoEnderecoTomador = new Zend_Form_Element_Text('$complementoEnderecoTomador');
        $complementoEnderecoTomador->setLabel('Complemento: ');
        
        $bairroTomador = new Zend_Form_Element_Text('$bairroTomador');
        $bairroTomador->setLabel('Bairro: ')
        			  ->setRequired(true);
        
        $ufTomador = new Zend_Form_Element_Select('$ufTomador');
        $ufTomador->setLabel('UF: ');
        $ufTomador->setAttribs(array(
         			'onChange' => 'carregarCidadesByEstado(this.value)'));
     	$uf = new Application_Model_Estados();
        $ufTomador->addMultiOption('', 'UF');        
        								
 		foreach ($uf->getEstados() as $row) { 			
    		$ufTomador->addMultiOption($row['uf'], $row['uf']);
 		}
        			  
        $cidadeTomador = new Zend_Form_Element_Select('$cidadeTomador');
        $cidadeTomador->setLabel('Cidade: ');

        $cidadeTomador->addMultiOption('', 'Selecione...');		  		
        
        
        $cidHiddenTomador = new Zend_Form_Element_Hidden('$cidHiddenTomador');
        //$ufTomador->setLabel('UF: ')
        //		  ->setRequired(true);
        
        $paisTomador = new Zend_Form_Element_Text('$paisTomador');
        $paisTomador->setLabel('Pais: ')
        			->setRequired(true);
        
        $cepTomador = new Zend_Form_Element_Text('$cepTomador');
        $cepTomador->setLabel('CEP: ')
        		   ->setRequired(true);        
        
        $emailTomador = new Zend_Form_Element_Text('$emailTomador');
        $emailTomador->setLabel('E-mail: ')
        			 ->setRequired(true);
        
        $telefoneTomador = new Zend_Form_Element_Text('$telefoneTomador');
        $telefoneTomador->setLabel('Telefone: ')
        				->setRequired(true);
        
        $botaoSalvar = new Zend_Form_Element_Submit('$botaoSalvar');
        $botaoSalvar->setLabel('Salvar');
        
        $this->addElements(array($cpfCnpjTomador, $inscricaoMunicipalTomador, $razaoSocialTomador, $enderecoTomador, $numeroEnderecoTomador, $complementoEnderecoTomador, $bairroTomador, $ufTomador, $cidadeTomador, $cidHiddenTomador, $paisTomador, $cepTomador, $emailTomador, $telefoneTomador, $botaoSalvar));
        $this->setMethod('post');
        $this->setName('clientesAdd');
        $this->setAction(Zend_Controller_Front::getInstance()->getBaseUrl().'/clientes/editar');
        //$this->setAction(Zend_Controller_Front::getInstance()->getBaseUrl().'/clientes/add');
    
    }
}
