<?php
include_once '../app.widgets/TElement.class.php';

// inicia o documento html
$html = new TElement('html');

// instancia seção head
$head =new TElement('head');
$html->add($head);   // adiciona ao html
 
// define o titulo da página
$title = new TElement('title');
$title->add('Título da página');
$head->add($title); // adiciona ao head

// inicia o body do html
$body = new TElement('body');
$body->bgcolor='#ffffdd';
$html->add($body);  // adiciona ao html

$center = new TElement('center');
$body->add($center);

// instancia um parágrafo
$p = new TElement('p');
$p->aling = 'center';
$p->add('Cruzeiro Esporte Clube');
$center->add($p);  // adiciona ao body

// instancia uma imagem
$img = new TElement('img');
$img->src = '../app.images/cruzeiro.png';
$img->width = '300';
$img->height = '300';
$center->add($img); // adiciona ao body

// instancia um separador horizontal
$hr = new TElement('hr');
$hr->width = '150';
$hr->align = 'center';
$center->add($hr); // adiciona ao body

// instacia um link
$a = new TElement('a');
$a->href = 'https://www.cruzeiro.com.br/';
$a->add('Visite o Site Oficial do Maior de Minas');
$center->add($a); // adiciona ao body

// instancia uma quebra de linhas
$br = new TElement('br');
$center->add($br); // adiciona ao body

// instancia um botão
$input = new TElement('input');
$input->type = 'button';
$input->value = 'Clique aqui para sabr mais!'; 
$input->onclick = "alert('O Maior de Minas!!!')";
$center->add($input); // adiciona ao body

// exibe o html com todos seus elementos filhos
$html->show();