<?php
// constrói matriz com os dados
$dados[] = array(1, 'Maria do Rosário', 'http://www.maria.com.br', 1200);
$dados[] = array(2, 'Pedro Cardoso', 'http://www.pedro.com.br', 800);
$dados[] = array(3, 'João de Barro' , 'http://www.joao.com.br', 1500);
$dados[] = array(4, 'Joana Pereira' , 'http://www.joana.com.br', 700);
$dados[] = array(5, 'Erasmo Carlos', 'http://www.erasmo.com.br', 2500);

// abre a tabela
echo '<table border=1 width=600>';

// exibe linha com cabeçalho
echo '<tr bgcolor="#aOaOaO">';
echo '<td> Código   </td>';
echo '<td> Nome     </td>';
echo '<td> Site     </td>';
echo '<td> Salario  </td>';
echo '</tr>';


$i = 0;
$total = 0;

// percorre os dados
foreach($dados as $pessoa)
{
    // verificar qual a cor  utilizada para o fundo
    $bgcolor = ($i % 2) == 0 ? '#d0d0d0' : '#ffffff';

    // imprime a linha
    echo "<tr bgcolor= '$bgcolor'>";

    // exibe o código
    echo "<td>{$pessoa[0]}<ltd>";

    // exibe o nome
    echo "<td>{$pessoa[1]}<ltd>";

    // exibe o site
    echo "<td>{$pessoa[2]}<ltd>";

    // exibe o salário
    echo "<td align='right'>{$pessoa[3]}<ltd>";
    echo '</tr>';

    $total += $pessoa[3]; // soma o salário
    $i++;
}

// exibe células vazias mescladas
echo '<tr>';
echo '<td colspan=3>Total<ltd>';

// exibe linha com totalizador
echo '<td align="right" bgcolor="#aOaOaO">';
echo $total;
echo '<ltd>' ;
echo '<ltr>';

// finaliza a tabela
echo '<ltable>';
?>


