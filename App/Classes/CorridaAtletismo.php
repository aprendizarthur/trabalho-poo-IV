<?php
//declarando que a restrição de tipos vai ser usada
declare(strict_types=1);
//namespace para a classe
namespace App\Classes;
//usando a classe exception nativa do php pois usamos namespaces
use Exception;

/**
 * Classe concreta que herda de evento e inicializa um objeto corrida

 * @package Classes
 * @author Arthur Borges Vieira <aprendizadoarthur@gmail.com>
 */
class CorridaAtletismo extends Evento
{
   
    //Constante que armazena limite de KM's que a corrida pode ter
    const LIMITE_KM = 10;

    /**
    * Propriedade que armazena o código interno do evento
    * @var string
    */
    private string $codigoInterno = "";

    /**
     * Propriedade que armazena o tempo do vencedor da corrida
     * @var string
     */
    private string $tempoVencedor = "";

    public function __construct(protected int $distancia, protected string $nome, protected string $data, protected string $local){
        $this->validaDistancia($distancia);
        $this->codigoInterno = $this->gerarCodigoInterno();
        parent::__construct($nome, $data, $local);
    }

    /**
     * Método privado que valida a quantidade de KM's que a corrida pode ter
     * 
     * @param integer $distancia
     * @return void
     */
    private function validaDistancia(int $distancia) : void{
        if($distancia > self::LIMITE_KM){
            //lançando exception e não capturando com try catch para interromper criação do objeto atleta incompleto 
            throw new Exception("Corrida ".$this->nome." ultrapassou o limite de KM's");
        }
    }

   /**
    * Método herdado da classe abstrata Evento que retorna o resultado do evento
    * @return string
    */
   public function calcularResultado():string{
        return "Tempo do vencedor: ".$this->tempoVencedor;
   }

   /**
    * Método herdado da classe abstrata Evento que cria um código único para o evento
    * @return string
    */
   public function gerarCodigoInterno() : string{
        return "COR-".uniqid();
   }

   /**
    * Método que retorna o código único do evento
    * @return string
    */
   public function getCodigoInterno() : string{
        return $this->codigoInterno;
   }

   /**
    * Método set para adicionar o tempo do vencedor da corrida
    *
    * @param string $tempo
    * @return void
    */
   public function adicionarTempoVencedor(string $tempo) : void{
        $this->tempoVencedor = $tempo;
   }
}