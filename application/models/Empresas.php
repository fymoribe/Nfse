<?php

class Application_Model_Empresas extends Zend_Db_Table_Abstract
{
	protected $_name = 'empresas';
	protected $_primary = 'id';	
	protected $_dependentTables = array("clientes");
	
	public function getEmpresa($id){
 		
 		$select = $this->_db->select()
 		               ->from('empresas',
 		                      array('razaoSocialPrestador', 'nomeFantasiaPrestador',
 		                      'cpfCnpjPrestador', 'inscricaoPrestador', 'enderecoPrestador',
 		                      'complementoEnderecoPrestador', 'numeroEnderecoPrestador',
 		                      'bairroPrestador', 'cepPrestador', 'cidadePrestador',
 		                      'ufPrestador', 'paisPrestador', 'telefonePrestador',
 		                      'emailPrestador' ))
 		               ->where('id = '.$id);

 		$result = $this->getAdapter()->fetchAll($select);
 		$result[0]['cidHiddenPrestador'] = $result[0]['cidadePrestador'];	

		return $result[0];
 			
    }
}

