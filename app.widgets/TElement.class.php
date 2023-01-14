<?php
/** 
 * classe TElement
 * classe para abstração de tags HTML
 */
class TElement
{
    private $name; // nome da TAG
    private $properties; // propriedades da TAG
    private $children;  // adicionado para eliminar o prblema de varial não declarada

    /**
     * método constructor
     * instancia uma tag html
     *  @param $name = nome da TAG
     */
    public function __construct($name)
    {
        // define o nome d o elemento
        $this->name = $name;
    }

    /**
     * método __set()
     * inercepta as atribuições á propriedade do objeto
     *  @param $name = nome da propriedade
     *  @param $value = valor
     */
    public function __set($name, $value)
    {
        // Armazena os valores atribuidos ao array properties
        $this->properties[$name] = $value;
    }

    /**
     * método add()
     * adiciona um elemento filho 
     *  @param $child = objeto filho
     */
    public function add($child)
    {
        $this->children[] = $child;
    }

    /**
     * método open()
     * exibe a tag de abertura na tela
     */
    private function open()
    {
        // exibe a teg de abertura 
        echo "<{$this->name}";

        if($this->properties)
        {
            // percorre as propridedades 
            foreach ($this->properties as $name => $value)
            {
                echo" {$name}=\"{$value}\"";
            }
        }
        echo '>';
    }

    /**
     * método show()
     * exibe a tag na tela, juntamente com seu conteúdo
     */
    public function show()
    {
        // abre a tag
        $this->open();
        echo "\n";
        
        // se possui conteúdo
        if($this->children)
        {
            // percorre a tods os objtos filhos
            foreach ($this->children as $child)
            {
                // se for objeto
                if(is_object($child))
                {
                    $child->show();
                }
                elseif((is_string($child)) or (is_numeric($child)))
                {
                    // se for texto ou se for número
                    echo $child;
                }
            }
            // fecha a tag
            $this->close();
        }
    }

    /**
     * mẃtodo close()
     * fecha uam tag HTML
     */
    private function close()
    {
        echo "</{$this->name}>\n";
    }
}