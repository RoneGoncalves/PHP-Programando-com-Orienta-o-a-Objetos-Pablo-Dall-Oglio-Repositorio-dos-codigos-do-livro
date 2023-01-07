<?php
/**
 * Função spl_autoload_register(function ($class_name)
 * Carrega uma classe quando ela é necessária, ou seja, quando ela é instanciada pela primeira vez.
 */

 spl_autoload_register(function ($class_name) {
    include_once "/var/www/html/livro_php/app.ado/{$class_name}.class.php";
});

/**
 * cria as classes Active Record para manipular os registros das tabelas correspomdentes
 */
class CidadeRecord extends TRecord {}
class EstadoRecord extends TRecord {}
class PessoaRecord extends TRecord {}

// obtém objetos do banco de dados
try
{
    //inicia transação com o banco 'pg_livro'
    TTransaction::open('pg_livro');

    // Define o arquivo para LOG
    TTransaction::setLogger(new TLoggerTXT('/var/www/html/livro_php/tmp/log6.txt'));

    ####################################################################
    # primeiro exemplo, lista todas cidade com população menor que
    # 1 milhão de habitantes de um determinado estado
    ####################################################################

    $estado = 13;

    // Cria um critéro de seleção
    $criteria = new TCriteria;

    //filtra por populacao e estado
    $criteria->add(new TFilter('populacao', '<', 1000000 )) ;
    $criteria->add(new TFilter('id_estado','=', $estado));

    // instancia um repositório para Cidade
    $repository = new TRepository('Cidade');

    // retorna todos objetos que satisfazem o critério
    $cidades = $repository->load($criteria);

    // verifica se retornou alguma cidade
    if($cidades)
    {
        echo "Cidades retornadas para o estado de ID {$estado} e população abaixo de 1 Milhão<br>\n";
        echo "------------------------------------------------------------------------------ <br>\n";

        // percorre todas cidades retornada
        foreach($cidades as $cidade)
        {
            echo 'ID: '. $cidade->id. ' - ';
            echo 'Nome: '. $cidade->nome. ' - ';
            echo 'População: '. $cidade->populacao;
            echo "<br>\n";
        }
        echo "<br>\n";
    }

    ####################################################################
    # primeiro exemplo, lista todas cidade em uma determinada região e
    # mostra o nome da cidade a população e a sigla do estado.
    ####################################################################
    $regiao = 'ND';

    // instancia um critério de seleção
    $criteria = new TCriteria;
    $criteria->add(new TFilter('regiao', '=', $regiao));

    // instancia um repositório para Inscricao
    $repository = new TRepository('Estado');

    // retorna todos objetos que satisfazem o critério
    $estados = $repository->load($criteria);

    // verifica se retornou alguma inscrição
    if($estados)
    {
        echo "Dados das cidades da região {$regiao} com população acima de i milhão de habitantes<br>\n";

        // percorre todos estados retornadas
        foreach($estados as $estado)
        {
            // instancia um critério de seleção
            $criteria = new TCriteria;
            $criteria->add(new TFilter('id_estado', '=', $estado->id));
            $criteria->add(new TFilter('populacao', '>', 1000000 ));

            // instancia um repositório para Cidade
            $repository = new TRepository('Cidade');

            //Obtém dados relacionados ás cidades
            $cidades = $repository->load($criteria);

            foreach($cidades as $cidade)
            {
                echo "<br>\n";
                echo("Cidade: {$cidade->nome} {$estado->sigla} - População: {$cidade->populacao}");
                //echo $estado->sigla;
            }
        }
    }
}
catch (Exception $e) // em caso de exceção
{
    //Exibe a mensagem gerada pela exceção
    echo "<b>Erro</b>". $e->getMessage();

    // Desfaz todas as alterações no BD
    TTransaction::rollback();
}