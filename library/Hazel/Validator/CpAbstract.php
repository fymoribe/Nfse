<?php 
abstract class Hazel_Validator_CpAbstract extends Zend_Validate_Abstract
{
    /**
     * Tamanho Inválido
     * @var string
     */
    const SIZE = 'size';
 
    /**
     * Números Expandidos
     * @var string
     */
    const EXPANDED = 'expanded';
 
    /**
     * Dígito Verificador
     * @var string
     */
    const DIGIT = 'digit';
 
    /**
     * Tamanho do Campo
     * @var int
     */
    protected $_size = 0;
    protected $_size1 = 0;
 
    /**
     * Modelos de Mensagens
     * @var string
     */
    protected $_messageTemplates = array(
        self::SIZE     => "Necessario 11(CPF) ou 14(CNPJ) numeros. ",
        self::EXPANDED => "'%value%' não possui um formato aceitável",
        self::DIGIT    => "CPF/CNPJ Invalido"
    );
 
    /**
     * Modificadores de Dígitos
     * @var array
     */
    
    protected $_modifiers = array();
    protected $_modifiers1 = array();
 
    /**
    * Validação Interna do Documento
    * @param string $value Dados para Validação
    * @return boolean Confirmação de Documento Válido
    */
    protected function _check($value)
    {
        // Captura dos Modificadores
        foreach ($this->_modifiers as $modifier) {
            $result = 0; // Resultado Inicial
            $size = count($modifier); // Tamanho dos Modificadores
            for ($i = 0; $i < $size; $i++) {
                $result += $value[$i] * $modifier[$i]; // Somatório
            }
            $result = $result % 11;
            $digit  = ($result < 2 ? 0 : 11 - $result); // Dígito
            // Verificação
            if ($value[$size] != $digit) {
                return false;
            }
        }
        return true;
    }
 
/**
    * Validação Interna do Documento
    * @param string $value Dados para Validação
    * @return boolean Confirmação de Documento Válido
    */
    protected function _check1($value)
    {
        // Captura dos Modificadores
        foreach ($this->_modifiers1 as $modifier1) {
            $result = 0; // Resultado Inicial
            $size = count($modifier1); // Tamanho dos Modificadores
            for ($i = 0; $i < $size; $i++) {
                $result += $value[$i] * $modifier1[$i]; // Somatório
            }
            $result = $result % 11;
            $digit  = ($result < 2 ? 0 : 11 - $result); // Dígito
            // Verificação
            if ($value[$size] != $digit) {
                return false;
            }
        }
        return true;
    }
    
    public function isValid($value)
    {
        // Filtro de Dados
        $data = preg_replace('/[^0-9]/', '', $value);
        
        if (strlen($data) == 11) {
        	if (!$this->_check($data)) {
            	$this->_error(self::DIGIT, $value);
           		return false;
        	}
        } else if (strlen($data) == 14){
        	if (!$this->_check1($data)) {
            	$this->_error(self::DIGIT, $value);
            	return false;
        	}
        } else {
        	$this->_error(self::SIZE, $value);
            return false;
        }

        return true; // Todas Verificações Executadas
    }
 
}