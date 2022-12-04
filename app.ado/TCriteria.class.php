<?php

/**
 * classe TCriteria
 * Esta classe provẽ uma interface utilizada para definição de critérios
 */

Class TCriteria extends TExpression
{
    private $expressions;   // armazena a lista de expressões
    private $operators;     // armazena a lista de operadors
    private $properties;    // propriedades do critério
    

    /**
     * metodo add()
     * adiciona uma expressão ao critério
     * @param $expression = expressão (objeto TExpression)
     * @param $operator   = operador lógico de comunicação
     */

    public function add(TExpression $expression, $operator = self::AND_OPERATOR)
    {
        // na primeira vex, não precisamos de operador lógico para concatenar
        if(empty($this->expressions))
        {
            unset($operator);
        }

        // agrega o resultado da expressão à lista de espressões
        $this->expressions[] = $expression;

        ///////////-----CORREÇÂO-----\\\\\\\\\\\\\
        // Correção na linha abaixo, pq como o autor deu um "unset($operator)" na condicional if() acima
        // o php não vai mais reconhecer a variavel $operator e vai lançar um erro de 
        // undefined variable, mas o problema foi corrigido com o oerador ternario abaixo
        // Linha como está no livro --->> $this->operators[] = $operator; <<----
        $this->operators[] = (isset($operator)) ? $operator : '';
    }

    
    /**
    * método dump()
    * retorna a espressão final
    */

    public function dump()
    {
        // concatena a lsita de expressões
        if(is_array($this->expressions))
        {
            $result = '';
            foreach($this->expressions as $i => $expression)
            {
                $operator = $this->operators[$i];
                // catena o operador a respectiva expressão
                $result .= $operator. ' '.$expression->dump(). ' ';
            }

            $result = trim($result);
            return "({$result})";
        }
    }

    /**
     * método setProperty()
     * define o valor de uma propriedade
     * @param $property = propriedade
     * @param $value    = valor
     */

    public function setProperty($property, $value)
    
    {
        $this->properties[$property] = $value;
    }

    /**
     * métodp getProperty()
     * retorna o valor de uma propriedade
     */

    public function getProperty($property)
    {
        return $this->properties[$property];
    }



} 
