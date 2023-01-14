<?php
// inclui classe TStyle
include_once '../app.widgets/TStyle.class.php';

// instancia objeto TStyle
// define características de um estilo chamado texto
$estilo_1 = new TStyle('texto');
$estilo_1->font_family = 'arial ,verdana,sans-serif';
$estilo_1->font_style      = 'normal';
$estilo_1->font_weight     = 'bold';
$estilo_1->font_size       = '10pt';
$estilo_1->color           = 'white';
$estilo_1->text_decoration = 'none';

// instancia objeto TStyle
// define características de um estilo chamado celula
$estilo_2 = new TStyle('celula');
$estilo_2->background_color = 'white';
$estilo_2->padding_top      = '10px';
$estilo_2->padding_bottom   = '10px';
$estilo_2->padding_left     = '10px';
$estilo_2->padding_right    = '10px';
$estilo_2->margin_left      = '5px';
$estilo_2->width            = '142px';
$estilo_2->height           = '154px';


// exibe estilos na tela
$estilo_2->show();
$estilo_1->show();


// exibe estilos na tela
$estilo_1->show();
$estilo_2->show();




