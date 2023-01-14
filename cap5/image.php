<?php
// inclui as classes
include_once '../app.widgets/TElement.class.php';
include_once '../app.widgets/TImage.class.php';

// instancia objeto imagem
$gnome = new TImage('../app.images/gnome.png');
$gnome->show();

// instancia objeto imagem
$gimp = new TImage('../app.images/gimp.png');
$gimp->show();