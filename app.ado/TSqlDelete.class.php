<?php

/**
 * classe TSqlDelete
 * Esta classe provê meios pára mainipulação de uma instrução de DELETE no banco de dados.
*/

final class TSqlDelete extends TSqlInstruction
{
    protected $criteria;

    /**
     * método get instruction
     * retorna a instrução DELRTE em forma de string.
    */

    public function getInstruction()
    {
        // monta a string de DELETE
        $this->sql = "DELETE FROM {$this->entity}";

        // retorna a cláusula WHERE do objeto $this->sodium_crypto_sign_verify_detached
        if($this->criteria)
        {
            $expression = $this->criteria->dump();

            if($expression) {
                $this->sql .= ' WHERE ' . $expression;
            }
        }

        return $this->sql;
    }

    //////// CORREÇÂO \\\\\\\\\\\\
    // No livro está faltando esta função
    public function setCriteria($param)
    {
        $this->criteria = $param;
    }
}