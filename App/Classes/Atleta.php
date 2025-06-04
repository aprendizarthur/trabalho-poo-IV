<?php
//declarando que a restrição de tipos vai ser usada
declare(strict_types=1);
//namespace para a classe
namespace App\Classes;

//usando a classe exception nativa do php pois usamos namespaces
use Exception;

/**
 * Classe concreta que inicializa um objeto Atleta 
 * 
 * @package Classes
 * @author Arthur Borges Vieira <aprendizadoarthur@gmail.com>
 */
class Atleta
{
    //Constante que armazena a idade mínima para ser considerado atleta
    const IDADE_MINIMA = 16;

    /**
     * Propriedade que armazena os eventos em que o Atleta se inscreveu
     * @var array
     */
    private array $eventosInscrito = [];
    
    //adicionando trait responsável pelos logs
    Use \App\Traits\Auditoria;

    //adicionando trait responsável por exibir todos os eventos
    use \App\Traits\Exibivel;
    
    /**
     * Este construtor inicializa um novo objetvo Atleta 
     * 
     * Ele está vazio de propósito para que as propriedades sejam definidas usando __set
     */
    public function __construct(){

    }

    /**
     * Método privado validando se o atleta tem mais de 16 anos de idade
     * @return void
     */
    private function validarIdade($valorPropriedade): void{
        if((int)$valorPropriedade < self::IDADE_MINIMA){
            //lançando exception e não capturando com try catch para interromper criação do objeto atleta incompleto 
            throw new Exception('Idade mínima não atendida');
        } 
    }

    /**
     * Método que adiciona ao atleta o evento que ele foi inscrito pelo organizador de eventos
     *
     * @param Evento $evento
     * @return void
     */
    public function adicionarEvento(Evento $evento) : void{
        $this->eventosInscrito[] = $evento;
    }

    /**
     * Método Mágico __set para definir valores da classe Atleta que são inacessíveis ou inexistentes
     * 
     * Isso não é comum de utilizar e nem recomendado, só está sendo implementado para que eu entenda o conceito de criar propriedades dinamicamente
     *
     * @param string $nomePropriedade
     * @param mixed $valorPropriedade
     * @return void
     */
    public function __set(string $nomePropriedade, mixed $valorPropriedade) : void{
        if($nomePropriedade === "idade"){$this->validarIdade($valorPropriedade);}
        $this->$nomePropriedade = $valorPropriedade;

        $mensagem = "Propriedade ".$nomePropriedade." definida como ".$valorPropriedade." para um atleta.";
        $this->adicionarLog($mensagem);
    }

    /**
     * Método Mágico __get para recuperar valores da classe Atleta que são inacessíveis
     *
     * @param string $nomePropriedade
     * @return mixed
     */
    public function __get(string $nomePropriedade) : mixed{
        //verificando se a propriedade chamada existe para retornar algo
        if(property_exists($this, $nomePropriedade)){
            return $this->$nomePropriedade;
        }
        throw new Exception('Propriedade '.$nomePropriedade." não existe.");
    }

    /**
     * Método get que retorna o nome do atleta
     *
     * @return string
     */
    public function getNome() : string{
        if(property_exists($this, "nome")){
            return $this->nome;    
        }
        throw new Exception("A propriedade nome ainda não existe neste atleta");
    }

    /**
     * Método get que retorna a idade do atleta
     *
     * @return int
     */
    public function getIdade() : int{
        if(property_exists($this, "idade")){
            return $this->idade;    
        }
        throw new Exception("A propriedade idade ainda não existe neste atleta");
    }

    /**
     * Método get que retorna os eventos em que o atleta é inscrito
     *
     * @return array
     */
    public function getEventosAtleta() : array{
        return $this->eventosInscrito;    
    }
}