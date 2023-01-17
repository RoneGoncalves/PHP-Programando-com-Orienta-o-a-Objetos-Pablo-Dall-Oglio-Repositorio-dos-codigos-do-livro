<?php
include_once '../app.widgets/TAction.class.php';

class Receptor
{
    function acao($parameter)
    {
        echo "Ação exectada com sucesso \n<br>";
    }
}

$receptor = new Receptor;
$action_1 = new TAction(array($receptor, 'acao'));
$action_1->setParameter('nome', 'Ronaldo');
echo $action_1->serialize();
echo "<br>\n";

$action_2 = new TAction('strtoup');
$action_2->setParameter('nome', 'ronaldo');
echo $action_2->serialize();