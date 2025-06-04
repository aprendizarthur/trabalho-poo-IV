<?php
//declarando que a restrição de tipos vai ser usada
declare(strict_types=1);
//namespace para a classe
namespace App\Classes;

//usando a classe exception nativa do php pois usamos namespaces
use Exception;

/**
 * Esta classe inicializa um objeto OrganizadorEvento responsável por gerenciar eventos, atletas e exibir resultados
 * 
 * @package Classes
 * @author Arthur Borges Vieira <aprendizadoarthur@gmail.com>
 */
class OrganizadorEvento
{
    /**
     * Propriedade que armazena os eventos criados
     * @var array
     */
    protected array $eventos = [];

    //constante adicionando limite de eventos por organizador de eventos
    const LIMITE_EVENTOS = 20;

    //adicionando trait responsável pelos logs
    use \App\Traits\Auditoria;

    //adicionando trait responsável por exibir todos os eventos
    use \App\Traits\Exibivel;

    /**
     * Método para criar uma corrida de atletismo que herda de evento
     *
     * @param integer $distancia distância da corrida
     * @param string $nome nome da corrida
     * @param string $data data da corrida
     * @param string $local local da corrida
     * @return Corrida
     */
    public function criarCorrida(int $distancia, string $nome, string $data, string $local) : CorridaAtletismo{
        //composição para instanciar a classe corrida dentro de organizadorevento e armazenar nos eventos criados
        $evento = new CorridaAtletismo($distancia, $nome, $data, $local);
        $this->eventos[] = $evento;

        $mensagem = "Corrida ".$evento->getNome()." código ".$evento->getCodigoInterno()." agendado para ".$evento->getData()." no local ".$evento->getLocal();
        $this->adicionarLog($mensagem);

        return $evento;
    }

    /**
     * Método para criar uma partida de futebol que herda de evento
     *
     * @param string $nome  nome da partida
     * @param string $data  data da partida
     * @param string $local local da partida
     * @return PartidaFutebol
     */
    public function criarPartida(string $nome, string $data, string $local) : PartidaFutebol{
        $evento = new PartidaFutebol ($nome, $data, $local);
        $this->eventos[] = $evento;

        $mensagem = "Partida ".$evento->getNome()." código ".$evento->getCodigoInterno()." agendado para ".$evento->getData()." no estádio ".$evento->getLocal();
        $this->adicionarLog($mensagem);

        return $evento;
    }

    /**
     * Método que inscreve um atleta em um evento e realiza as devidas validações
     *
     * @param Evento $evento
     * @param Atleta $atleta
     * @return void
     */
    public function inscreverAtleta(Evento $evento, Atleta $atleta) : void{
        //verificando se o atleta ja é inscrito no evento
        $eventosAtleta = $atleta->getEventosAtleta();
        foreach($eventosAtleta as $inscrito){
            if($inscrito === $evento){
                throw new Exception("O atleta ".$atleta->getNome()." já é inscrito no evento ".$evento->getNome());
            }
        }

        $evento->adicionarAtleta($atleta);
        $atleta->adicionarEvento($evento);

        $mensagem = "Atleta ".$atleta->getNome()." inscrito no evento ".$evento->getNome();
        $this->adicionarLog($mensagem);
    }

    /**
     * Método get retornando array com todos os eventos deste organizador
     * @return array
     */
    public function getTodosEventos() : array{
        return $this->eventos;
    }

    /**
     * Método que exibe o resultado do evento passado (usando método da subclasse que retorna o resultado já formatado)
     *
     * @param Evento $evento
     * @return void
     */
    public function exibirResultado(Evento $evento) : void{
        echo $evento->calcularResultado(),"<br>";
    }

    /**
     * Método que inicia a competição para algum evento
     *
     * @param Evento $evento objeto evento que vai ser iniciada a competição
     * @return void
     */
    public function iniciar(Evento $evento) : void{
        if($evento instanceof PartidaFutebol){
            $evento->iniciarCompeticao();
            $mensagem = "Partida de futebol ".$evento->getNome()." iniciada";
            $this->adicionarLog($mensagem);
            return;
        }

        if($evento instanceof CorridaAtletismo){
            throw new Exception("Este tipo de evento não pode ser iniciado");
        }
    }


    /**
     * Método que finaliza a competição para algum evento
     *
     * @param Evento $evento objeto evento que vai ser finalizada a competição
     * @return void
     */
    public function finalizar(Evento $evento) : void{
        if($evento instanceof PartidaFutebol){
            $evento->finalizarCompeticao();
            $mensagem = "Partida de futebol ".$evento->getNome()." finalizada";
            $this->adicionarLog($mensagem);
            return;
        }

        if($evento instanceof CorridaAtletismo){
            throw new Exception("Este tipo de evento não pode ser iniciado");
        }
    }
}