<?php
/** 
 * Classe abstrata para gerenciar expressões
 */
abstract class TExpression
{
    // operadores lógicos
    const AND_OPERATOR = 'AND';
    const OR_OPERATOR = 'OR';

    // Marca o método dump() como obrigatório
    abstract public function dump();
}
