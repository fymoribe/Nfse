<?php

class Application_Form_Empresa extends Zend_Form
{

    public function init()
    {
        $this->setName('empresaInfo');
    	$this->setMethod('post');
    	$this->setAction(Zend_Controller_Front::getInstance()->getBaseUrl().'/empresas/editar');
    	
    	$razaoSocial = new Zend_Form_Element_Text('razaoSocialPrestador');
    	
        $razaoSocial->setLabel('Razão Social: ')
                    ->setRequired();
        
        $nomeFantasia = new Zend_Form_Element_Text('nomeFantasiaPrestador');
        $nomeFantasia->setLabel('Nome Fantasia: ');
        			// ->setRequired();
        
        $cnpj = new Zend_Form_Element_Text('cpfCnpjPrestador');
//        $cnpj->setDecorators(array(
//    					'ViewHelper',
//    					'Description',
//    					'Errors',
//    					array(array('data'=>'HtmlTag'), array('tag' => 'td')),
//    					array('Label', array('tag' => 'td')),
//    					array(array('row'=>'HtmlTag'),array('tag'=>'tr', 'openOnly'=>true)) 
//    	));
        $cnpj->setLabel('CNPJ: ')
        ->setRequired();
        
        $im = new Zend_Form_Element_Text('inscricaoPrestador');
//        $im->setDecorators(array(
//    					'ViewHelper',
//    					'Description',
//    					'Errors',
//    					array(array('data'=>'HtmlTag'), array('tag' => 'td')),
//    					array('Label', array('tag' => 'td')) 
//    	));
        $im ->setLabel('Inscrição Municipal: ');        
        
        $logradouro = new Zend_Form_Element_Text('enderecoPrestador');
//        $logradouro->setDecorators(array(
//    					'ViewHelper',
//    					'Description',
//    					'Errors',
//    					array(array('data'=>'HtmlTag'), array('tag' => 'td')),
//    					array('Label', array('tag' => 'td')),
//    					array(array('row'=>'HtmlTag'),array('tag'=>'tr', 'closeOnly'=>true)) 
//    	));
        $logradouro->setLabel('Logradouro: ');
        
        $numero = new Zend_Form_Element_Text('numeroEnderecoPrestador');
        $numero->setLabel('Número: ');
        
        $cep = new Zend_Form_Element_Text('cepPrestador');
        $cep->setLabel('CEP: ');
        
        $complemento = new Zend_Form_Element_Text('complementoEnderecoPrestador');
        $complemento->setLabel('Complemento: ');
        
        $bairro = new Zend_Form_Element_Text('bairroPrestador');
        $bairro->setLabel('Bairro: ');
        
        $cidade = new Zend_Form_Element_Select('cidadePrestador');
        $cidade->setLabel('Cidade: ');
        $cidade->addMultiOption('', 'Selecione...');;
        
        $cidHiddenPrestador = new Zend_Form_Element_Hidden('$cidHiddenPrestador');
        
        $estado = new Zend_Form_Element_Select('ufPrestador');
        $estado->setLabel('UF: ');
        $estado->setAttribs(array(
         			'onChange' => 'carregarCidadesByEstado(this.value)'));
        $estado->addMultiOption('', 'UF'); 
        $uf = new Application_Model_Estados();        								
 		foreach ($uf->getEstados() as $row) { 			
    		$estado->addMultiOption($row['uf'], $row['uf']);
 		}	
        
        $pais = new Zend_Form_Element_Text('paisPrestador');
        $pais->setLabel('País: ');
        
        $email = new Zend_Form_Element_Text('emailPrestador');
        $email->setLabel('Email: ');        
        
        $fone = new Zend_Form_Element_Text('telefonePrestador');
        $fone->setLabel('Telefone: ');
        
//        $editar = new Zend_Form_Element_Button('botaoEditar');
//        $editar->setLabel('Editar');
        
        $salvar = new Zend_Form_Element_Button('botaoSalvar');
        $salvar->setLabel('Salvar');
        $salvar->setAttrib('class', 'btnSalvar');
        $salvar->setAttrib('type', 'submit');
        
        $this->addElements(array($razaoSocial, $nomeFantasia, $cnpj, $im, $logradouro,
                                 $complemento, $numero, $bairro, $cep, $estado, $cidade, $cidHiddenPrestador, $pais, $fone, $email, $salvar/*, $editar*/));

        $this->clearDecorators();
//  	    $this->addDecorator('FormElements')
//      		->addDecorator('HtmlTag', array('tag' => '<ul>'))
//      		->addDecorator('Form');
//        
        $this->setElementDecorators(array(
            array('ViewHelper'),
            array('Errors'),
            array('Description'),
            array('Label', array('class'=>'labels')),
            array('HtmlTag', array('tag' => 'li', 'class'=>'elements')),
        ));

        // buttons do not need labels
        $salvar->setDecorators(array(
            array('ViewHelper'),
            array('Description'),
            array('HtmlTag', array('tag' => 'li', 'style'=>'list-style-type: none;')),
        ));
    }


}

