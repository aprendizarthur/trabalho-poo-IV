<?php
//declarando que a restrição de tipos vai ser usada
declare(strict_types=1);
//namespace para a classe
namespace App\Traits;

/**
 * Trait responsável por formatar informações para exibição
 * @package Traits
 * @author Arthur Borges Vieira <aprendizadoarthur@gmail.com>
 */
trait Exibivel
{
    /**
     * Método que exibe todos os eventos de um objeto organizador de eventos
     *
     * @return array
     */
    public function exibirEventos() : array{
        if(!property_exists($this, 'eventos')){
            throw new Exception("Esta classe não possui a propriedade eventos.");
        }
        
        $eventos = $this->eventos;
        $eventosFormatados = [];

        foreach($eventos as $evento){
            $formatado = $evento->getNome()." ".$evento->getLocal()." ".$evento->getData();
            $eventosFormatados[] = $formatado;
        }

        return $eventosFormatados;
    }

    /**
     * Método que retorna todos os dados de um atleta
     *
     * @return string
     */
    public function exibirDados() : string{
        return $this->nome." ".$this->idade;
    }
}