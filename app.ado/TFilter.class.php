<?php
/** 
 * Classe TFilter
 * Esta classe provê uma interface para definição de filtros de seleção
 */
 
 class TFilter extends TExpression
 {
    private $variable; // variavel
    private $operator; // operador
    private $value; // valor

    /** 
     * método __construct()
     * instancia um novo filtro
     * @para, $variable = variável
     * @param $operator = operador(>,<)
     * @param $value = valor a ser comparado
     */

    public function __construct($variable, $operator, $value)
    {
        // armazana as propriedades
        $this->variable = $variable;
        $this->operator = $operator;
        // transforma o valor de acordo com certas regras
        // antes de atribuir á propriedade $this->value
        $this->value = $this->transform($value);
    }

    /** 
     * método transform()
     * recebe um valor que faz as modificações necessárias para ele ser 
     * interpretado pelo banco de dados podendo ser integer/string/boolean ou array
     * @param $value = valor a ser transformado
     */
    private function transform($value)
    {
        // caso haja um array
        if(is_array($value))
        {
            // percorre os valores
            foreach($value as $x)
            {
                // se for um inteiro
                if(is_integer($x))
                {
                    $foo[] = $x;
                }
                else
                {
                    // se for string adiciana as aspas
                    $foo[] = "'$x'";
                }
            } 
            // converte p array em string sepoarada por ",'
            $result = '('. implode(',',$foo). ')'; 
           
        }
        // caso haja uma string
        else if (is_string($value))
        {
            // adiciona as aspas
            $result = "'$value'";

        }
        // caso haja valor nulo
        else if(is_null($value))
        {
            // armazena NULL
            $result = 'NULL';
        }
        // caso haja boolean
        else if (is_bool($value))
        {
            // armazena TRUE ou FALSE
            $result = $value ? 'TRUE' : 'FALSE';
        }
        else
        {
            $result = $value;
        }

        // retorna o valor
        return $result;
    }
    /** 
    * método dump()
    * retorna o filtro em forma de expressão
    */
    public function dump()
    {
        // concatena a expressão
        return "{$this->variable} {$this->operator} {$this->value}";
    }  
 }
 
?>
