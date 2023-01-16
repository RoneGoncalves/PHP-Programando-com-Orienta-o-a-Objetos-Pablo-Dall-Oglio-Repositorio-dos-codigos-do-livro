<?php
// inclui as classes necessárias
include_once '../app.widgets/TStyle.class.php';
include_once '../app.widgets/TElement.class.php';
include_once '../app.widgets/TPanel.class.php';
include_once '../app.widgets/TImage.class.php';
include_once '../app.widgets/TParagraph.class.php';


// instancia novo painel
$painel = new TPanel(400,300);

// coloca objeto parágrafo na posição 10,10
$texto = new TParagraph('isso é um teste, x:10,y:10');
$painel->put($texto, 10, 10);

// coloca objeto parágrafo na posição 200,200
$texto = new TParagraph('outro teste, x:200,y:200');
$painel->put($texto, 200, 200);

// coloca objeto imagem na posição 10,180
$texto = new TImage('../app.images/gnome.png');
$texto->width = 120;
$texto->height = 100;
$painel->put($texto, 10, 180);

// coloca objeto imagem na posição240, 10
$texto = new TImage('../app.images/gimp.png');
$texto->width = 120;
$texto->height = 100;
$painel->put($texto, 240, 10);
$painel->show();