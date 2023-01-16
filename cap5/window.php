<?php
/**
 * Função spl_autoload_register(function ($class_name)
 * Carrega uma classe quando ela é necessária, ou seja, quando ela é instanciada pela primeira vez.
 */
 spl_autoload_register(function ($class_name){
    include_once "../app.widgets/{$class_name}.class.php";
});

// instancia um objeto TWindow nas coordenadas 20,20 contendo um texto
$janela_1 = new TWindow('janela_1');
$janela_1->setPosition(20,20);
$janela_1->setSize(200,200);
$janela_1->add(new TParagraph('conteúdo da janela 1'));
$janela_1->show();

// instancia uma imagem
$img_1 = new TImage('../app.images/gimp.png');
$img_1->width = 180;
$img_1->height =130;

// instancia uma imagem
$img_2 = new TImage('../app.images/gnome.png');
$img_2->width = 100;
$img_2->height = 100;

// instancia um objeto TWindow nas coordenadas 300,20 contendo uma imagem
$janela_2 = new TWindow('janela_2');
$janela_2->setPosition(300,20);
$janela_2->setSize(200,200);
//$janela_2->add(new Timage('../app.images/gimp.png'));
$janela_2->add($img_1);
$janela_2->show();

// instancia um objeto painel
// coloca dentro do painel um texto e uma imagem
$painel = new TPanel(210,130);
$painel->put(new TParagraph('<b>texto 1</b>'), 10,10);
//$painel->put(new Timage('../app.images/gnome.png'), 80, 20);
$painel->put($img_2, 80, 20);

// instancia um objeto TWindow nas coordenadas 140,120 contendo um painel
$janela_3 = new TWindow('janela_3');
$janela_3->setPosition(140,120);
$janela_3->setSize(220,160);
$janela_3->add($painel);
$janela_3->show();