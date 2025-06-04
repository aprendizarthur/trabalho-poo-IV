<?php
//declarando que a restrição de tipos vai ser usada
declare(strict_types=1);
//namespace para a classe
namespace App\Classes;
/**
 * Classe abstrata que representa eventos genéricos

 * @package Classes
 * @author Arthur Borges Vieira <aprendizadoarthur@gmail.com>
 */
abstract class Evento
{

    /**
     * Propriedade estática que armazena o total de eventos criados
     * @var integer
     */
    public static int $totalEventos = 0;
    
    //Constante que armazena a categoria do evento
    const CATEGORIA_EVENTO = "Genérico";

    /**
     * Propriedade que armazena todos os atletas inscritos no evento
     * @var array
     */
    private array $atletasInscritos = [];

    public function __construct(protected string $nome, protected string $data, protected string $local){
        self::$totalEventos++;
    }

    /**
     * Método abstrato para calcular os resultados do evento em subclasses
     * @return string
     */
    abstract public function calcularResultado() : string;

    /**
     * Método abstrato para gerar um código único para o evento em subclasses
     * @return string
     */
    abstract public function gerarCodigoInterno() : string;

    /**
     * Método get que retorna o nome do evento
     *
     * @return string
     */
    public function getNome() : string{
        return $this->nome;
    }

    /**
     * Método get que retorna a data do evento
     *
     * @return string
     */
    public function getData() : string{
        return $this->data;
    }

    /**
     * Método get que retorna o local do evento
     *
     * @return string
     */
    public function getLocal() : string{
        return $this->local;
    }
    
    /**
     * Método que inscreve um atleta (validado pelo organizador de evento) no evento
     *
     * @param Atleta $atleta
     * @return void
     */
    public function adicionarAtleta(Atleta $atleta) : void{
        $this->atletasInscritos[] = $atleta;
    }

    //método estática getTotalEventos
    public static function getTotalEventos() : int{
        return self::$totalEventos;
    }
}