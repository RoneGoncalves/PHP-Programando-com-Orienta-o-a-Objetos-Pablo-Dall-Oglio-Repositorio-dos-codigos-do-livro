<?php
/**
 * classe Pessoa
 */

 class Pessoa
 {
    private $nome; // nome a pessoa
    private $cidade; // ID da cidade

    /**
     * método contrutor
     * instancia o objeto, define alguns atributos
     * @param $nome = nemo da pessoa
     * @param $cidade = código as cidade
     */
    function __construct($nome, $cidade)
    {
        $this->nome = $nome;
        $this->cidade = $cidade;
    }

    /**
     * método __get
     * intercepta a obtenção de propriedades
     * @param $propriedade = nome da propriedade 
     */
    function __get($propriedade)
    {
        if($propriedade == 'cidade')
        {
            return new Cidade($this->cidade);
        }
    }
 }

 class Cidade
 {
    private $id;
    private$nome; // nome da cidade

    /**
     * métudo construtor
     * instancia o objeto
     * @param $id = ID da cidade
     */
    function __construct($id)
    {
        $data[1] = 'Porto Alegre';
        $data[2] = 'São Paulo';
        $data[3] = 'Rio de Janeiro';
        $data[4] = 'Belo Horizonte';

        // atribui o id
        $this->id = $id;

        //define seu nome
        $this->setNome($data[$id]);
    }

    /**
     * método setNome
     * define o nome da cidade
     * @param $nome = nome da cidade
     */
    function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * método getNome
     * retorna o nome da cidade
     */
    function getNome()
    {
        return $this->nome;
    }
}

 // instancia dois objetos Pessoa
$maria = new Pessoa('Maria da Silva', 1);
$jose  = new Pessoa('José Osvaldo', 2);

 // exibe o nome da cidade de cada pessoa
echo $maria->cidade->getNome() . "<br>\n";
echo $jose->cidade->getNome() . "<br>\n";

 // exibir o atributo cidade
print_r($maria->cidade);
