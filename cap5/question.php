<?php
/**
 * Função spl_autoload_register(function ($class_name)
 * Carrega uma classe quando ela é necessária, ou seja, quando ela é instanciada pela primeira vez.
 */
 spl_autoload_register(function ($class_name){
    include_once "../app.widgets/{$class_name}.class.php";
});

/**
 * classe Page 
 * demonstra o funcionamento deum diálogo de questão
 */
class Page extends TPage
{
    private $panel;
    
    /**
     * método construtor
     * instancia uma nova página
     */
    function __construct()
    {
        parent::__construct();

        // cria um novo painel
        $this->panel = new TPanel(400, 200);

        // coloca um novo texto na coluna:10 linha:10
        $this->panel->put(new TParagraph('Responda a pergunta'), 10, 10);
        
        // cria duas ações
        $action_1 = new TAction(array($this, 'onYes'));
        $action_2 = new TAction(array($this, 'onNo'));

        // exibe a pergunta ao usuário
        new TQuestion('Deseja realmente excluir este registro?', $action_1, $action_2);

        // adiciona o painel à janela
        parent::add($this->panel);
    }

    /**
     * método onYes
     * executado coso o usuário responda SIM para a pergunta
     */
    function onYes()
    {
        $this->panel->put(new TParagraph('Você escolheu a opção SIM'), 10, 40);
    }

    /**
     * método onNo
     * executado coso o usuário responda NÂO para a pergunta
     */
    function onNo()
    {
        $this->panel->put(new TParagraph('Você escolheu a opção NÂO'), 10, 40);
    }
}

// instancia a página
$pagina = new Page;
    
// exibe a página
$pagina->show();