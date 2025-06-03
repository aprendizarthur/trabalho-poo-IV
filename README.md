# Enunciado do Exercício: Sistema de Gerenciamento de Eventos Esportivos

## Descrição Geral
Você deve desenvolver um sistema orientado a objetos em PHP para gerenciar eventos esportivos, como partidas de futebol e corridas de atletismo. O sistema permitirá o cadastro de eventos, a inscrição de participantes (atletas), e o controle de resultados das competições. O sistema deve utilizar os conceitos de POO, incluindo herança, interfaces, traits, e outros recursos avançados do PHP, como sobrecarga de propriedades e classes anônimas.

## Requisitos do Sistema

### 1. Estrutura do Projeto
- Organize as classes, interfaces e traits em uma estrutura de diretórios:
  - `src/Models`: Classes do sistema (ex.: `Evento`, `PartidaFutebol`, `CorridaAtletismo`, `Atleta`, `OrganizadorEventos`).
  - `src/Interfaces`: Interfaces (ex.: `Competivel`).
  - `src/Traits`: Traits (ex.: `Auditoria`, `Exibivel`).
- Use namespaces correspondentes (ex.: `App\Models`, `App\Interfaces`, `App\Traits`).
- Configure o Composer para autoload de classes, interfaces e traits com PSR-4.
- Crie um arquivo `index.php` na raiz do projeto para demonstrar o funcionamento do sistema.

### 2. Conceitos de POO e Requisitos Técnicos
- **Strict Types**: Use `declare(strict_types=1);` em todos os arquivos.
- **Classe Abstrata**: Crie uma classe abstrata `Evento` que represente eventos esportivos genéricos (partidas de futebol e corridas de atletismo), com:
  - Propriedades protegidas: `$nome` (string), `$data` (string), `$local` (string).
  - Uma constante: `CATEGORIA_EVENTO` (string, ex.: "Genérico").
  - Um método abstrato: `calcularResultado()` (retorna string com o resultado do evento).
  - Um método privado: `gerarCodigoInterno()` (string, ex.: "EVT-" . uniqid()).
- **Classes Concretas**:
  - Crie `PartidaFutebol` que herda de `Evento`, com:
    - Uma propriedade privada adicional: `$placar` (array, ex.: ["TimeA" => 2, "TimeB" => 1]).
    - Uma constante: `TIPO_PARTIDA` (string, ex.: "Futebol").
    - Implemente o método `calcularResultado()` para retornar o placar (ex.: "TimeA 2 x 1 TimeB").
  - Crie `CorridaAtletismo` que herda de `Evento`, com:
    - Uma propriedade privada adicional: `$tempoVencedor` (float, tempo em segundos).
    - Uma constante: `TIPO_CORRIDA` (string, ex.: "Atletismo").
    - **Não** implemente a interface `Competivel` (explicado abaixo).
- **Interface**: Crie uma interface `Competivel` com:
  - Método `iniciarCompeticao(): void`.
  - Método `finalizarCompeticao(): void`.
  - Apenas `PartidaFutebol` deve implementar essa interface.
- **Classe `Atleta`**:
  - Propriedades privadas: `$nome` (string), `$idade` (int), `$eventosInscritos` (array).
  - Use sobrecarga com `__get` e `__set` para acessar as propriedades.
  - Uma constante: `IDADE_MINIMA` (int, ex.: 16).
  - Um método privado: `validarIdade()` (verifica se a idade é >= `IDADE_MINIMA`).
- **Classe `OrganizadorEventos`**:
  - Gerencia eventos e atletas, com:
    - Propriedades privadas: `$eventos` (array), `$atletas` (array).
    - Métodos para adicionar eventos, inscrever atletas, e exibir resultados.
    - Use verificação de instância (`instanceof`) para garantir que apenas eventos `Competivel` possam ser iniciados/finalizados.
- **Traits**:
  - `Auditoria`: Registra logs de ações (ex.: "Evento X iniciado").
  - `Exibivel`: Formata informações para exibição (ex.: detalhes do evento).
  - Use os traits em pelo menos duas classes.
- **Classe Anônima**: No `index.php`, crie um objeto de uma classe anônima que represente um evento especial (ex.: "Maratona Beneficente").
- **Documentação com DocBlock**: Use DocBlock para documentar todas as classes, métodos e propriedades (ex.: `@param`, `@return`).
- **Métodos Estáticos e Constantes**: Inclua pelo menos um método estático em `Evento` (ex.: `getTotalEventos()` para contar eventos criados).

### 3. Arquivo `index.php`
- Demonstre o funcionamento do sistema:
  - Crie instâncias de `PartidaFutebol`, `CorridaAtletismo`, e `Atleta`.
  - Inscreva atletas em eventos.
  - Inicie e finalize competições (apenas para eventos `Competivel`).
  - Exiba resultados e logs usando os traits.
  - Use uma classe anônima para representar um evento especial.

### 4. Exemplo de Estrutura de Diretórios
