<?php

class Application_Form_Declaracoes extends Zend_Form
{

public function init()
    {    	    
    	$numeroRps = new Zend_Form_Element_Text('numeroRps');
        $numeroRps->setLabel('N#mero RPS:')
        		  ->setAttrib('maxLength', 60);
        $numeroRps->setRequired();
        $numeroRps->addFilter('digits');

		$serieRps = new Zend_Form_Element_Text('serieRps');
        $serieRps->setLabel('S#rie RPS:')
        		  ->setAttrib('maxLength', 5);
        $serieRps->setRequired();
         
        $tipoRps = new Zend_Form_Element_Select('tipoRps');
        $tipoRps->setLabel('Tipo RPS:');
        $tipoRps->addMultiOption('1', 'Recibo Provis#rio de Servi#o');
        $tipoRps->addMultiOption('2', 'RPS Nota Fiscal Conjugada - Mista');
        $tipoRps->addMultiOption('3', 'Cupom');

        $dataEmissao = new Zend_Form_Element_Text('dataEmissao');
        $dataEmissao->setLabel('Data de Emiss#o:')
        		    ->setAttrib('maxLength', 8);
        $dataEmissao->setRequired();
        
        $statusRps = new Zend_Form_Element_Select('statusRps');
        $statusRps->setLabel('Status RPS:');
        $statusRps->addMultiOption('1', 'Normal');
        $statusRps->addMultiOption('2', 'Cancelado');
        
        $numeroRpsSubstituido = new Zend_Form_Element_Text('numeroRpsSubstituido');
        $numeroRpsSubstituido->setLabel('N#mero RPS Substituido:')
        		  ->setAttrib('maxLength', 60);        
        $numeroRpsSubstituido->addFilter('digits');
        
        $serieRpsSubstituido = new Zend_Form_Element_Text('serieRpsSubstituido');
        $serieRpsSubstituido->setLabel('S#rie RPS Substituido:')
        		  ->setAttrib('maxLength', 5);
         
        $tipoRpsSubstituid = new Zend_Form_Element_Select('tipoRpsSubstituid');
        $tipoRpsSubstituid->setLabel('Tipo RPS Substituido:');
        $tipoRpsSubstituid->addMultiOption('', '');
        $tipoRpsSubstituid->addMultiOption('1', 'Recibo Provis#rio de Servi#o');
        $tipoRpsSubstituid->addMultiOption('2', 'RPS Nota Fiscal Conjugada - Mista');
        $tipoRpsSubstituid->addMultiOption('3', 'Cupom');
        
        $botaoProximo = new Zend_Form_Element_Submit('botaoProximo');
        $botaoProximo->setLabel('Proximo');
        
        $this->addElements(array($numeroRps, $serieRps, $tipoRps, $dataEmissao, $statusRps, $numeroRpsSubstituido, $serieRpsSubstituido, $tipoRpsSubstituid, $botaoProximo));
        $this->setMethod('post');
        $this->setName('declaracoes');
        $this->setAction(Zend_Controller_Front::getInstance()->getBaseUrl().'/declaracoes/add');
        //$this->setAction(Zend_Controller_Front::getInstance()->getBaseUrl().'/clientes/add');
        /* Form Elements & Other Definitions Here ... */
    }


}

