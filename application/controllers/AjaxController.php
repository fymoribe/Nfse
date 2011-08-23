<?php

class AjaxController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function cidadesAction()
    {
    	$this->_helper->layout->disableLayout();
    	$this->_helper->viewRenderer->setNoRender();
    	
	    if ($this->_request->getParam('uf', 0)) {            
	        $uf = $this->_request->getParam('uf', 0);          
	        $cidades = new Application_Model_Cidades();
	        $rows = $cidades->getCidadesByEstados($uf);            
	        if (count($rows) <= 0) {
	            echo '<option value="">Cidade não encontrada.</option>';
	        } else {
	        	if($this->_hasParam('cid')){
	        		$cid = $this->_request->getParam('cid');
	        		foreach ($rows as $row) {
	        			if($row['id'] == $cid){
	        				echo '<option value="'.$row['id'].'" selected="selected">'.$row['nome'].'</option>';
	        			}else{
	                		echo '<option value="'.$row['id'].'">'.$row['nome'].'</option>';
	        			}
	            	}
	        	}else{
	            	foreach ($rows as $row) {
	                	echo '<option value="'.$row['id'].'">'.$row['nome'].'</option>';
	            	}
	        	}
	        }
	    } else {
	        echo '<option value="">Cidade não encontrada.</option>';
	    }
    }

    public function cidadeAction()
    {
        // action body
    }


}





