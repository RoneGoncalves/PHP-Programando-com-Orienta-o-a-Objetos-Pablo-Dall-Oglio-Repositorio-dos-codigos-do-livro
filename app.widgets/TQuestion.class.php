<?php
/**
 * classe TQuestion
 * exibe perguntas ao usuário
 */
class TQuestion
{
    /**
     * método construtor
     * instancia objeto TQuestion
     * @param $message = pergunta para o usuário
     * @param $action_yes = ação para resposta positiva
     * @param $action_no = ação para resposta negativa
     */
    function __construct($message, TAction $action_yes, TAction $action_no)
    {
        $style = new TStyle('tquestion');
        $style->position = 'absolute';
        $style->left = '30%';
        $style->top = '30%';
        $style->width = '300';
        $style->height = '150';
        $style->color = 'black';
        $style->background = '#DDDDDD';
        $style->border = '4px solid #000000';
        $style->border_color = "grey";
        $style->border_width = "1px";
        $style->z_index = '10000000000000000';

        // converte os nomes de métodos em URL's
        $url_yes = $action_yes->serialize();
        $url_no = $action_no->serialize();

        // instancia o painel para exibir o diálogo
        $painel = new TElement('div');
        $painel->class = 'tquestion';

        // cria um botão para a resposta positiva
        $button_1 = new TElement('input');
        $button_1->type = 'button';
        $button_1->value = 'Sim';
        $button_1->onclick = "javascript:location='$url_yes'";

        // cria um botão para a resposta negativa
        $button_2 = new TElement('input');
        $button_2->type = 'button';
        $button_2->value = 'Não';
        $button_2->onclick = "javascript:location='$url_no'";

        // cria uma tabela para organizar o layout
        $table = new TTable;
        $table->align = 'center';
        $table->cellspacing = 10;

        // instancia objeto TImage para seleciona a imagem que será utilizada
        $img = new TImage("../app.images/question.png");
        $img->width = 80;
        $img->height = 80;

        // cria uma linha para o ícone e a mensagem
        $row = $table->addRow();
        $row->addCell($img);
        $row->addCell($message);

        // cria uma linha para os botões
        $row = $table->addRow();
        $row->addCell($button_1);
        $row->addCell($button_2);

        // adiciona a tabela ao painel
        $painel->add($table);

        // exibe o painel
        $painel->show();








    }
}