<?php 
// inclui as classes
include_once '../app.widgets/TElement.class.php';
include_once '../app.widgets/TParagraph.class.php';

// instancia objeto parágrafo
$texto_1 = new TParagraph('teste1<br>teste1<br>teste1');
$texto_1->setAlign('left');
$texto_1->show();

// instancia objeto parágrafo
$texto_2 = new TParagraph('teste2<br>teste2<br>teste2');
$texto_2->setAlign('center');
$texto_2->show();

// instancia objeto parágrafo
$texto_3 = new TParagraph('teste3<br>teste3<br>teste3');
$texto_3->setAlign('right');
$texto_3->show();
