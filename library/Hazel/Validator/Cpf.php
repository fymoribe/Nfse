<?php
/**
 * Validador para Cadastro de Pessoa Física
 *
 * @author   Wanderson Henrique Camargo Rosa
 * @category Hazel
 * @package  Hazel_Validator
 */
class Hazel_Validator_Cpf extends Hazel_Validator_CpAbstract
{
    /**
     * Tamanho do Campo
     * @var int
     */
    protected $_size = 11;
 
    /**
     * Modificadores de Dígitos
     * @var array
     */
    protected $_modifiers = array(
        array(10,9,8,7,6,5,4,3,2),
        array(11,10,9,8,7,6,5,4,3,2)
    );
    
        /**
     * Tamanho do Campo
     * @var int
     */
    protected $_size1 = 14;
 
    /**
     * Modificadores de Dígitos
     * @var array
     */
    protected $_modifiers1 = array(
        array(5,4,3,2,9,8,7,6,5,4,3,2),
        array(6,5,4,3,2,9,8,7,6,5,4,3,2)
    );
}