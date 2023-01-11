<?php 

// carrega as classes necessárias
include_once '../app.ado/TExpression.class.php';
include_once '../app.ado/TCriteria.class.php';
include_once '../app.ado/TFilter.class.php';


// Aqui vemos um exemplo de critério utilizando o operdaor lógico OR
// a idade deve ser menor que 16 OU maior que 60

$criteria = new TCriteria;
$criteria->add(new TFilter('idade', '<', 16), TExpression::OR_OPERATOR);
$criteria->add(new TFilter('idade', '>', 60), TExpression::OR_OPERATOR);
echo $criteria->dump();
echo "\n";

// Aqui vemos uu exemplo de critério utilizando o operador lǵico AND
// juntamente com os operadores de conjunto IN(dentro do conjunto) e NOT IN(fora do conjunto)
// a idade deve estar dentro do conjunto (24, 25, 26) e deve estar fora do conjunto (10)

$criteria = new TCriteria;
$criteria->add(new TFilter('idade', 'IN',   array(24, 25, 26)));
$criteria->add(new TFilter('idade', ' NOT IN', array(10)));
echo $criteria->dump();
echo "\n";

// Aqui vemos um exemplo de critério utilizando o operador de comparação LIKE
// o nome deve iniciar por "pedro" ou deve iniciar po "maria"

$criteria = new TCriteria;
$criteria->add(new TFilter('nome', 'LIKE', 'pedro%'), TExpression::OR_OPERATOR);
$criteria->add(new TFilter('nome', 'LIKE', 'maria%'), TExpression::OR_OPERATOR);
echo $criteria->dump();
echo "\n";


// Aqui vemos um exemplo de critério utilizando operadores "=" e IS NOT
// neste caso, o telefone não pode conter valor nulo (IS NOT NULL)
// e o sexo deve ser feminino

$criteria = new TCriteria;
$criteria->add(new TFilter('telefone', 'IS NOT', 'NULL'));
$criteria->add(new TFilter('sexo', '=', 'F'));
echo $criteria->dump();
echo "\n";


// Aqui vemos o uso dos operadores de comparação IN e NOT IN juntamente com 
// conjuntos de strings, Neste caso, a UF deve estar entre (RS, SC, PR) e
// não deve estar entre (AC< PI).

$criteria = new TCriteria;
$criteria->add(new TFilter('UF', 'IN',   array('RS', 'SC', 'PR')));
$criteria->add(new TFilter('UF', ' NOT IN', array('AC', 'PI')));
echo $criteria->dump();
echo "\n";


// Neste caso temos o uso de um critéro composto
// o primeiro critério aponta para sexo='F'
// (sexo feminino) e a idade > 18 (maior de idade)

$criteria_1 = new TCriteria;
$criteria_1->add(new TFilter('sexo', '= ', 'F'));
$criteria_1->add(new TFilter('idade', '>', '18'));


// O segundo critério aponta para sexo=M (masculino)
// e idade < 16 (menor de idade)

$criteria_2 = new TCriteria;
$criteria_2->add(new TFilter('sexo', '= ', 'M'));
$criteria_2->add(new TFilter('idade', '<', '16'));


// Agora juntamos os dois critérios utilizando o operador lógico OR (ou).
// O resultaado deve conter "mulheres maiores de 18" OU "homens menores de 16 anos"


$criteria = new TCriteria;
$criteria->add($criteria_1, TExpression::OR_OPERATOR);
$criteria->add($criteria_2, TExpression::OR_OPERATOR);
echo $criteria->dump();
echo "\n";




