<?php
//declarando que a restrição de tipos vai ser usada
declare(strict_types=1);
//namespace para a classe
namespace App\Traits;

/**
 * Trait responsável por registro de logs das ações
 * @package Traits
 * @author Arthur Borges Vieira <aprendizadoarthur@gmail.com>
 */
trait Auditoria
{
    /**
     * Propriedade que armazena todos os logs gerados pela auditoria
     * @var array
     */
    private array $logs = [];

    /**
     * Método que adiciona um novo log para a auditoria
     *
     * @param string $mensagem Mensagem de log gerada pelo objeto
     * @return void
     */
    public function adicionarLog(string $mensagem) : void{
        $this->logs[] = $mensagem;
    }
    
    /**
     * Método get que retorna os logs da classe

     * @return array
     */
    public function getLogs() : array{
        return $this->logs;
    }
}