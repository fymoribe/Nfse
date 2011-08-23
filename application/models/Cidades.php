<?php

class Application_Model_Cidades extends Zend_Db_Table_Abstract
{
	protected $_name = 'cidades';
	protected $_primary = 'id';

	function getCidadesByEstados($estado){
				
		$select = $this->select()
    					 ->from('cidades')
    					 ->where('cidades.uf = "'.$estado.'"');
    					 
        
        $a = $this->getAdapter()->fetchAll($select);		
    	return $a;	
	}
	
	function getNomeCidadeById($id){
		$select = $this->select()
    					 ->from('cidades', array('nome'))
    					 ->where('cidades.id = "'.$id.'"');
    					 
        
        $cidade = $this->getAdapter()->fetchAll($select);
    	return $cidade[0]['nome'];	
	}
}

