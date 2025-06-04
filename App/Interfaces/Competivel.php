<?php
//declarando que a restrição de tipos vai ser usada
declare(strict_types=1);
//namespace para a classe
namespace App\Interfaces;

/**
 * Interface para eventos que podem ser iniciados e finalizados 
 * 
 * @package Interfaces
 * @author Arthur Borges Vieira <aprendizadoarthur@gmail.com>
 */
interface Competivel
{
    /**
     * Método que vai iniciar a competição no evento que foi chamado
     * @return void
     */
    public function iniciarCompeticao():void;

    /**
     * Método que vai finalizar a competição no evento que foi chamado
     * @return void
     */
    public function finalizarCompeticao():void;
}