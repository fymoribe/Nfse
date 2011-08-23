<?php

class Application_Model_Estados extends Zend_Db_Table_Abstract
{
	protected $_name = 'estados';
	protected $_primary = 'uf';

	function getEstados(){
		$select = $this->_db->select()
    					 ->from('estados');   							
    	$estados = $this->getAdapter()->fetchAll($select); 
    	//echo $a[0]['uf'];
    	return $estados;
	}
	
//	function getSigla($sigla){
//		$select = $this->select()
//    					 ->from(array('e'=>'estados'),
//    							array('id', 'sigla', 'estado')) 
//    					 ->where('sigla = ' .$sigla);  							
//    	return $this->fetchAll($select);
//	}
}