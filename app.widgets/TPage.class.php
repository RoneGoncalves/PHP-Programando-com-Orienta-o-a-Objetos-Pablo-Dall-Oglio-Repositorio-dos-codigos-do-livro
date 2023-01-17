<?php
/**
 * classe TPage
 * classe para controlo de fluxo de execução
 */
class TPage extends TElement
{
    /**
     * método construct()
     */
    public function __construct()
    {
        // define o elemento que irá representar
        parent::__construct('html');
    }

    /**
     * metodo show()
     * exibe o conteudo da página
     */
    public function show()
    {
        $this->run();
        parent::show();
    }

    /**
     * método run()
     * executa determinado métodp de acordo com os paramentros recebidos
     */
    public function run()
    {
        if($_GET)
        {
            $class = $_GET['class'];
            $method = $_GET['method'];

            if($class)
            {
                $object = $class == get_class($this) ? $this : new $class;
                if (method_exists($object, $method))
                {
                    call_user_func(array($object, $method), $_GET);
                }
            }
            else if (function_exists($method))
            {
                call_user_func($method, $_GET);
            }
        }
    }
}