<?php
//declarando que a restrição de tipos vai ser usada
declare(strict_types=1);
//namespace para a classe
namespace App\Classes;

//usando a interface competivel
use \App\Interfaces\Competivel;
//usando a classe exception nativa do php pois usamos namespaces
use Exception;

/**
 * Classe concreta que herda de evento e inicializa um objeto partida de futebol implementando a interface competivel

 * @package Classes
 * @author Arthur Borges Vieira <aprendizadoarthur@gmail.com>
 */
class PartidaFutebol extends Evento implements Competivel
{

     /**
      * Propriedade que armazena o estado do evento, se está sendo realizado ou não para gerenciar com a interface competível
      * @var boolean
      */
     private bool $competindo = false;

     /**
     * Propriedade que armazena o resultado de uma partida de futebol
     * @var array
     */
     private array $placar = ['Casa' => 0, 'Visitante' => 0];
   
     /**
     * Propriedade que armazena o código interno do evento
     * @var string
     */
     private string $codigoInterno = "";

     //Constante que armazena o tipo de partida do evento
     const TIPO_PARTIDA = "Futebol";

     public function __construct(string $nome, string $data, string $local){
          $this->codigoInterno = $this->gerarCodigoInterno();
          $this->competindo = false;
          parent::__construct($nome, $data, $local);
     }

     /**
     * Método herdado da classe abstrata Evento que retorna o resultado do evento
     * @return string
     */
     public function calcularResultado():string{
          return "O placar do jogo foi Time de Casa ".$this->placar['Casa']." x ".$this->placar['Visitante']." Time Visitante";
     }

     /**
     * Método herdado da classe abstrata Evento que cria um código único para o evento
     * @return string
     */
     public function gerarCodigoInterno() : string{
          return "FUT-".uniqid();
     }

     /**
     * Método que retorna o código único do evento
     * @return string
     */
     public function getCodigoInterno() : string{
          return $this->codigoInterno;
     }

     public function adicionarPlacar(int $casa, int $visitante) : void {
          if($this->competindo == false){
               throw new Exception("Não é possível adicionar placar a um evento que não foi iniciado ou finalizado.");
          }
          $this->placar['Casa'] = $casa;
          $this->placar['Visitante'] = $visitante;
     }

     /**
     * Método que vai iniciar a competição 
     * @return void
     */
     public function iniciarCompeticao() : void{
          if($this->competindo == true){
               throw new Exception("Este evento já foi iniciado.");
          }
          $this->competindo = true;
     }

     /**
     * Método que vai finalizar a competição 
     * @return void
     */
     public function finalizarCompeticao() : void{
          if($this->competindo == false){
               throw new Exception("Este evento ainda não foi iniciado.");
          }
          $this->competindo = false;
     }
}