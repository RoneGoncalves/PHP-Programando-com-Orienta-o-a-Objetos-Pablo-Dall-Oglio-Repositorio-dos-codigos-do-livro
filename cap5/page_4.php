<?php
/**
 * Função spl_autoload_register(function ($class_name)
 * Carrega uma classe quando ela é necessária, ou seja, quando ela é instanciada pela primeira vez.
 */
 spl_autoload_register(function ($class_name){
    include_once "../app.widgets/{$class_name}.class.php";
});

class Page extends TPage
{
    private $table;
    private $content;

    /**
     * método __costruct()
     * instancia umanova págiana
     */
    function __construct()
    {
        parent::__construct();

        // cria uma tabela
        $this->table = new TTable;

        // define algumas propriedades para a tabela
        $this->table->border = 1;
        $this->table->width = 500;
        $this->table->style = 'border-collapse:collapse';

        // adiciona uma linha na tabela
        $row = $this->table->addRow();
        $row->bgcolor = '#d0d0d0';

        // cria três ações
        $action_1 = new TAction(array($this, 'onProducts'));
        $action_2 = new TAction(array($this, 'onContact'));
        $action_3 = new TAction(array($this, 'onCompany'));

        // cria os três links
        $link_1 = new TElement('a');
        $link_2 = new TElement('a');
        $link_3 = new TElement('a');

        // define a ação dos links
        $link_1->href = $action_1->serialize();
        $link_2->href = $action_2->serialize();
        $link_3->href = $action_3->serialize();

        // define o rótulo de texto dos links
        $link_1->add('Produtos');
        $link_2->add('Contato');
        $link_3->add('Empresa');

        // //  adiciona os links na linha
        $row->addCell($link_1);
        $row->addCell($link_2);
        $row->addCell($link_3);

        // cria uma linha para cada conteúdo
        $this->content = $this->table->addRow();

        // adiciona a tabela na página
        parent::add($this->table);
    }

    /**
     * método OnProducts()
     * executado quando o usuário clicar em "Produtos"
     *  @param $get = $__GET
     */
    function onProducts($get)
    {
        $texto= "Nesta seção você vai conhecer os produtos da nossa empresa 
            Temos desde pintos, frangos, porcos, bois, vacas e todo tipo de animal 
            que você pode imaginar na nossa fazenda.";

        // adiciona o texto na linha de conteúdo da tabela
        $celula = $this->content->addCell($texto);
        $celula->colspan = 3;

        // cria uma janela
        $win = new TWindow('Promoção');

        // define posição e tamanho
        $win->setPosition(200,100); 
        $win->setSize(240,100);

        // adiciona o texto na janela
        $win->add('Temos cogumelos recém colhidos e também ovos de codorna fresquinhos');

        // exibe a janela 
        $win->show();
    }

    /**
     * método onContact()
     * executado quando o usuário clicar no link "Contato"
     *  @param $get = $_GET
     */
    function onContact($get)
    {
        $texto = "Para entrar em contato com nossa empresa,
            ligue para 0800-1234-5678 ou mande uma carta endereçada para
            Linha alto coqueiro baixo, fazenda recanto escondido.";

        // adiciona o texto na linha de conteúdo da tabela
        $celula = $this->content->addCell($texto);
        $celula->colspan = 3;
    }

    /**
     * método onCompany()
     * executado quando o usuário clicar em "Epresa"
     *  @param $get = $_GET
     */
    function onCompany($get)
    {
        $texto = "Aqui na fazenda recanto escondido fazemos eco-turismo,
            você vai poder conhecer nossas instalações, tirar leite diretamente da vaca,
            recolher os ovos do galinheiro e o mais importante, vai poder limpar as instalações dos suínos,
            o que é o auge do passeio. Não deixe de conhecer nossa fazenda, temos lindas cabanas
            equipadas com cama de casal, fogão a lenha e banheiro.";

        // adiciona o texto na linha de conteúdo da tabela
        $celula = $this->content->addCell($texto);
        $celula->colspan = 3;
    }
}

// instancia nova página
$pagina = new Page;

// exibe a página juntamente com seu conteúdo e interpreta a URL
$pagina->show();