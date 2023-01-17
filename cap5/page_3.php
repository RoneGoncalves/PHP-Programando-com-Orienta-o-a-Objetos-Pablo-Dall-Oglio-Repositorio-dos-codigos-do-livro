<?php
/**
 * Função spl_autoload_register(function ($class_name)
 * Carrega uma classe quando ela é necessária, ou seja, quando ela é instanciada pela primeira vez.
 */
 spl_autoload_register(function ($class_name){
    include_once "../app.widgets/{$class_name}.class.php";
});

/**
 * método OnProducts()
 * executado quando o usuário clicar em "Produtos"
 *  @param $get = $__GET
 */
function onProducts($get)
{
    echo "<br>\n";
    echo "Nesta seção você vai conhecer os produtos da nossa empresa <br>
         Temos desde pintos, frangos, porcos, bois, vacas e todo tipo de animal <br>
         que você pode imaginar na nossa fazenda.";
}

/**
 * método onContato()
 * executado quando o usuário clicar no link "Contato"
 *  @param $get = $_GET
 */
function onContact($get)
{
    echo "<br>\n";
    echo "Para entrar em contato com nossa empresa, <br>
        ligue para 0800-1234-5678 ou mande uma carta endereçada para <br>
        Linha alto coqueiro baixo, fazenda recanto escondido.";
}

/**
 * método onEmpresa()
 * executado quando o usuário clicar em "Epresa"
 *  @param $get = $_GET
 */
function onCompany($get)
{
    echo "<br>\n";
    echo "Aqui na fazenda recanto escondido fazemos eco-turismo, <br>
        você vai poder conhecer nossas instalações, tirar leite diretamente da vaca, <br>
        recolher os ovos do galinheiro e o mais importante, vai poder limpar as instalações dos suínos,<br>
        o que é o auge do passeio. Não deixe de conhecer nossa fazenda, temos lindas cabanas <br>
        equipadas com cama de casal, fogão a lenha e banheiro.";
}

// exibe alguns links
echo "<a href='?method=onProducts'>Produtos</a><br>";
echo "<a href='?method=onContact'>Contato</a><br>";
echo "<a href='?method=onCompany'>Empresa</a><br>";

// interpreta a página
$pagina = new TPage;
$pagina->show();
