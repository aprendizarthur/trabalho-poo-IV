## Descrição Geral
Você deve desenvolver um sistema orientado a objetos em PHP para gerenciar eventos esportivos, como partidas de futebol e corridas de atletismo. O sistema permitirá o cadastro de eventos, a inscrição de participantes (atletas), e o controle de resultados das competições. O sistema deve utilizar os conceitos de POO, incluindo herança, interfaces, traits, e outros recursos avançados do PHP, como sobrecarga de propriedades.

## Requisitos do Sistema

### 1. Estrutura do Projeto
Organize as classes, interfaces e traits em uma estrutura de diretórios com App/Classes para as classes do sistema (ex.: Evento, PartidaFutebol, CorridaAtletismo, Atleta, OrganizadorEventos), App/Interfaces para interfaces (ex.: Competivel) e App/Traits para traits (ex.: Auditoria, Exibivel). Use namespaces correspondentes (ex.: App\Classes, App\Interfaces, App\Traits). Configure o Composer para autoload de classes, interfaces e traits com PSR-4. Crie um arquivo index.php na raiz do projeto para demonstrar o funcionamento do sistema.

### 2. Conceitos de POO e Requisitos Técnicos
- **Strict Types**: Use declare(strict_types=1); em todos os arquivos.
- **Classe Abstrata**: Crie uma classe abstrata Evento que represente eventos esportivos genéricos (partidas de futebol e corridas de atletismo), com:
  - Propriedades protegidas: $nome (string), $data (string), $local (string).
  - Uma constante: CATEGORIA_EVENTO (string, ex.: "Genérico").
  - Um método abstrato: calcularResultado() (retorna string com o resultado do evento).
  - Um método privado: gerarCodigoInterno() (string, ex.: "EVT-" . uniqid()).
- **Classes Concretas**:
  - Crie PartidaFutebol que herda de Evento, com:
    - Uma propriedade privada adicional: $placar (array, ex.: ["TimeA" => 2, "TimeB" => 1]).
    - Uma constante: TIPO_PARTIDA (string, ex.: "Futebol").
    - Implemente o método calcularResultado() para retornar o placar (ex.: "TimeA 2 x 1 TimeB").
  - Crie CorridaAtletismo que herda de Evento, com:
    - Uma propriedade privada adicional: $tempoVencedor (float, tempo em segundos).
    - Uma constante: TIPO_CORRIDA (string, ex.: "Atletismo").
    - **Não** implemente a interface Competivel (explicado abaixo).
- **Interface**: Crie uma interface Competivel com:
  - Método iniciarCompeticao(): void.
  - Método finalizarCompeticao(): void.
  - Apenas PartidaFutebol deve implementar essa interface.
- **Classe Atleta**:
  - Propriedades privadas: $nome (string), $idade (int), $eventosInscritos (array).
  - Use sobrecarga com __get e __set para acessar as propriedades.
  - Uma constante: IDADE_MINIMA (int, ex.: 16).
  - Um método privado: validarIdade() (verifica se a idade é >= IDADE_MINIMA).
- **Classe OrganizadorEventos**:
  - Gerencia eventos e atletas, com:
    - Propriedades privadas: $eventos (array), $atletas (array).
    - Métodos para adicionar eventos, inscrever atletas, e exibir resultados.
    - Use verificação de instância (instanceof) para garantir que apenas eventos Competivel possam ser iniciados/finalizados.
- **Traits**:
  - Auditoria: Registra logs de ações (ex.: "Evento X iniciado").
  - Exibivel: Formata informações para exibição (ex.: detalhes do evento).
  - Use os traits em pelo menos duas classes.
- **Documentação com DocBlock**: Use DocBlock para documentar todas as classes, métodos e propriedades (ex.: @param, @return).
- **Métodos Estáticos e Constantes**: Inclua pelo menos um método estático em Evento (ex.: getTotalEventos() para contar eventos criados).

### 3. Arquivo index.php
Demonstre o funcionamento do sistema: crie instâncias de PartidaFutebol, CorridaAtletismo e Atleta; inscreva atletas em eventos; inicie e finalize competições (apenas para eventos Competivel); exiba resultados e logs usando os traits.

## Critérios de Avaliação

O projeto será avaliado com base nos seguintes critérios, totalizando 100 pontos:

### 1. Corretude na Implementação dos Conceitos de Orientação a Objetos (40%)
- **Herança (10 pontos)**: Classes concretas (PartidaFutebol e CorridaAtletismo) devem herdar corretamente de Evento.
- **Interfaces (10 pontos)**: Apenas PartidaFutebol deve implementar Competivel, e CorridaAtletismo não deve.
- **Constantes (10 pontos)**: Cada classe deve ter pelo menos uma constante relevante.
- **Métodos de Propriedades Estáticas (10 pontos)**: Deve haver pelo menos um método estático e uma propriedade estática.

### 2. Uso Adequado de Strict Types, Encapsulamento, Getters/Setters e Composer com Autoload (25%)
- **Strict Types (6 pontos) Todos os arquivos devem usar declare(strict_types=1);.
- **Encapsulamento (6 pontos)**: Propriedades devem ser private ou protected, com acesso via __get/__set ou métodos específicos.
- **Getters/Setters (6 pontos)**: Uso correto de __get e __set em Atleta.
- **Composer com Autoload (7 pontos)**: Autoload deve estar configurado e funcionando corretamente.

### 3. Implementação e Uso Correto de Traits para Reutilização de Código (15%)
- **Traits (7 pontos)**: Auditoria e Exibivel devem ser implementados e usados por pelo menos duas classes.
- **Correção (8 pontos)**: Traits devem funcionar sem erros e ser bem aplicados.

### 4. Organização do Código, Clareza dos Comentários e Estrutura do Projeto (20%)
- **Organização do Código (6 pontos)**: Estrutura de diretórios e namespaces devem estar corretos.
- **Clareza dos Comentários (7 pontos)**: DocBlock deve ser usado para documentar classes, métodos e propriedades.
- **Estrutura do Projeto (7 pontos)**: O sistema deve ser funcional, com index.php para os recursos.

## Notas Adicionais
O código deve funcionar sem erros de execução. A documentação em DocBlock deve ser clara e seguir o padrão PHPDoc (ex.: @param string $nome, @return string). Use verificação de instância (instanceof) para garantir que apenas eventos Competivel possam ser iniciados/finalizados.
