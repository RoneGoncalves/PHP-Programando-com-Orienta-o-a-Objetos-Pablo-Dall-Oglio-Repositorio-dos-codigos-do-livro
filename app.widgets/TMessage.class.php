<?php
/**
 * classe TMessage
 * exibe mensagem ao usuário
 */
class TMessage
{
    /**
     * método costrutor
     * instancia um objeto TMessage
     *  @param $type = tipo de mensagem(info, erro)
     *  @param $message = mensagem ao usuário
     */
    public function __construct($type, $message)
    {
        switch($type)
        {
            case 'info':
            $color = 'blue';
            break;

            case 'error':
                $color = 'red';
            break;

            case 'success':
                $color = 'green';
            break;
        }

        $style = new TStyle('tmessage');
        $style->position = 'absolute';
        $style->left = '30%';
        $style->top = '30%';
        $style->width = '300';
        $style->height = '150';
        $style->color = 'black';
        $style->background = '#DDDDDD';
        $style->border = '4px solid #000000';
        $style->border_color = "$color";
        $style->z_index = '10000000000000000';

        // exibe o estilo na tela
        $style->show();

        // instancia o painel para exibir o diálogo
        $painel = new TElement('div');
        $painel->class = "tmessage";
        $painel->id = "tmessage";

        // cria um botão qie vai fechar o diálogo
        $button = new TElement('input');
        $button->type = 'button';
        $button->value = 'Fechar';
        $button->onclick="document.getElementById('tmessage').style.display='none'";

        // instancia objeto TImage para seleciona a imagem que será utilizada
        $img = new TImage("../app.images/{$type}.png");
        $img->width = 80;
        $img->height = 80;

        // cria uma tabela para organizar o layout
        $table = new TTable;
        $table->align = 'center';

        // cria uma linha para o ícne da menssagem
        $row = $table->addRow();
        $row->addCell($img);
        $row->addCell($message);

        // cria uma linha para o botão 
        $row = $table->addRow();
        $row->addCell('');
        $row->addCell($button);

        // adiciona a tablea ao painel
        $painel->add($table);

        // exibe o painel
        $painel->show();
    }
}