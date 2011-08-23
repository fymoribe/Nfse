<?php

class Application_Model_Clientes extends Zend_Db_Table_Abstract
{
	protected $_name = 'clientes';
	protected $_primary = 'id';
	protected $_referenceMap = array(
 		"empresas" => array(
			"columns" => array("id"),
			"refTableClass" => "Application_Models_Empresas",
			"refColumns" => array("id")
		));
	
	function getId(){
		return $id;
	}
 
	function mostraTodos($id){
		$select = $this->select()
    					 ->from(array('c'=>'clientes'),
    							array('id','cpfCnpjTomador', 'razaoSocialTomador'));		
    	return $this->fetchAll($select);    	
	}	
	
	function removeByRazaoSocial($razaoSocialTomador) {
		$select = $this->getAdapter()->quoteInto('razaoSocialTomador = ?', $razaoSocialTomador);
    	$this->delete($select);
	}
	
	function getClienteByRazaoSocial($razaoSocialTomador){
 		$select = $this->_db->select()
 		               ->from('clientes',
 		                      array('cpfCnpjTomador', 'inscricaoMunicipalTomador',
 		                      'razaoSocialTomador', 'enderecoTomador', 'numeroEnderecoTomador',
 		                      'complementoEnderecoTomador', 'bairroTomador',
 		                      'cidadeTomador', 'ufTomador', 'paisTomador',
 		                      'cepTomador', 'emailTomador', 'telefoneTomador'))
 		               ->where('razaoSocialTomador = '.$razaoSocialTomador);

 		$result = $this->getAdapter()->fetchAll($select);
 		$result[0]['cidHiddenTomador'] = $result[0]['cidadeTomador']; 		
		return $result[0]; 		 		
    }
	    
	function getClienteById($id){
 		$select = $this->_db->select()
 		               ->from('clientes',
 		                      array('cpfCnpjTomador', 'inscricaoMunicipalTomador',
 		                      'razaoSocialTomador', 'enderecoTomador', 'numeroEnderecoTomador',
 		                      'complementoEnderecoTomador', 'bairroTomador',
 		                      'cidadeTomador', 'ufTomador', 'paisTomador',
 		                      'cepTomador', 'emailTomador', 'telefoneTomador'))
 		               ->where('id = '.$id);

 		$result = $this->getAdapter()->fetchAll($select); 	
 		$result[0]['cidHiddenTomador'] = $result[0]['cidadeTomador'];	
		return $result[0]; 		 		
    }
    
    function updateById($id, $valores){
//    	$valores = array(
// 	   			'cpfCnpjTomador' => $this->_request->getPost('cpfCnpjTomador'),
// 	   			'inscricaoMunicipalTomador' => $this->_request->getPost('inscricaoMunicipalTomador'),
// 	   			'razaoSocialTomador' => $this->_request->getPost('razaoSocialTomador'),
// 	   			'enderecoTomador' => $this->_request->getPost('enderecoTomador'),
// 	   			'numeroEnderecoTomador' => $this->_request->getPost('numeroEnderecoTomador'),
// 	   			'complementoEnderecoTomador' => $this->_request->getPost('complementoEnderecoTomador'),
// 	   			'bairroTomador' => $this->_request->getPost('bairroTomador'),
// 	   			'cidadeTomador' => $this->_request->getPost('cidadeTomador'),
// 	   			'ufTomador' => $this->_request->getPost('ufTomador'),
// 	   			'paisTomador' => $this->_request->getPost('paisTomador'),
// 	   			'cepTomador' => $this->_request->getPost('cepTomador'),
// 	   			'emailTomador' => $this->_request->getPost('emailTomador'),
// 	   			'telefoneTomador' => $this->_request->getPost('telefoneTomador')
// 	   		);
 	   	$where = $this->getAdapter()->quoteInto('id = ?', $id);
 	   	$this->update($valores, $where);
    }
    
    
}

