**AVALIADO 97/100**

Você deve desenvolver um sistema orientado a objetos em PHP para gerenciar eventos esportivos, como partidas de futebol e corridas de atletismo. O sistema permitirá o cadastro de eventos, a inscrição de participantes (atletas), e o controle de resultados das competições. O sistema deve utilizar os conceitos de POO, incluindo herança, interfaces, traits, e outros recursos avançados do PHP, como sobrecarga de propriedades.

**Requisitos**:  
1. Crie uma estrutura de diretórios com **App/Classes** para as classes do sistema (ex.: **Evento**, **PartidaFutebol**, **CorridaAtletismo**, **Atleta**, **OrganizadorEventos**), **App/Interfaces** para interfaces (ex.: **Competivel**) e **App/Traits** para traits (ex.: **Auditoria**, **Exibivel**). Use namespaces correspondentes (ex.: **App\Classes**, **App\Interfaces**, **App\Traits**). Configure o **Composer** para autoload de classes, interfaces e traits com PSR-4. Crie um arquivo **index.php** na raiz do projeto para demonstrar o funcionamento do sistema.  
2. **Strict Types**: Use **declare(strict_types=1);** em todos os arquivos.  
3. **Classe Abstrata**: Crie uma classe abstrata **Evento** que represente eventos esportivos genéricos (partidas de futebol e corridas de atletismo), com:  
   - Propriedades protegidas: **$nome** (string), **$data** (string), **$local** (string).  
   - Uma constante: **CATEGORIA_EVENTO** (string, ex.: "Genérico").  
   - Um método abstrato: **calcularResultado()** (retorna string com o resultado do evento).  
   - Um método privado: **gerarCodigoInterno()** (string, ex.: "EVT-" . uniqid()).  
4. **Classes Concretas**:  
   - Crie **PartidaFutebol** que herda de **Evento**, com:  
     - Uma propriedade privada adicional: **$placar** (array, ex.: ["TimeA" => 2, "TimeB" => 1]).  
     - Uma constante: **TIPO_PARTIDA** (string, ex.: "Futebol").  
     - Implemente o método **calcularResultado()** para retornar o placar (ex.: "TimeA 2 x 1 TimeB").  
   - Crie **CorridaAtletismo** que herda de **Evento**, com:  
     - Uma propriedade privada adicional: **$tempoVencedor** (float, tempo em segundos).  
     - Uma constante: **TIPO_CORRIDA** (string, ex.: "Atletismo").  
     - **Não** implemente a interface **Competivel** (explicado abaixo).  
5. **Interface**: Crie uma interface **Competivel** com:  
   - Método **iniciarCompeticao(): void**.  
   - Método **finalizarCompeticao(): void**.  
   - Apenas **PartidaFutebol** deve implementar essa interface.  
6. **Classe 'Atleta'**:  
   - Propriedades privadas: **$nome** (string), **$idade** (int), **$eventosInscritos** (array).  
   - Use sobrecarga com **__get** e **__set** para acessar as propriedades.  
   - Uma constante: **IDADE_MINIMA** (int, ex.: 16).  
   - Um método privado: **validarIdade()** (verifica se a idade é >= **IDADE_MINIMA**).  
7. **Classe 'OrganizadorEventos'**:  
   - Gerencia eventos e atletas, com:  
     - Propriedades privadas: **$eventos** (array), **$atletas** (array).  
     - Métodos para adicionar eventos, inscrever atletas, e exibir resultados.  
     - Use verificação de instância (**instanceof**) para garantir que apenas eventos **Competivel** possam ser iniciados/finalizados.  
8. **Traits**:  
   - **Auditoria**: Registra logs de ações (ex.: "Evento X iniciado").  
   - **Exibivel**: Formata informações para exibição (ex.: detalhes do evento).  
   - Use os traits em pelo menos duas classes.  
9. **Documentação com DocBlock**: Use DocBlock para documentar todas as classes, métodos e propriedades (ex.: **@param**, **@return**).  
10. **Métodos Estáticos e Constantes**: Inclua pelo menos um método estático em **Evento** (ex.: **getTotalEventos()** para contar eventos criados).  

**Arquivo 'index.php'**:  
Demonstre o funcionamento do sistema: crie instâncias de **PartidaFutebol**, **CorridaAtletismo** e **Atleta**; inscreva atletas em eventos; inicie e finalize competições (apenas para eventos **Competivel**); exiba resultados e logs usando os traits.

**Avaliação**:  
- Corretude na implementação dos conceitos de orientação a objetos, incluindo herança, interfaces, constantes e métodos/propriedades estáticas (40%).  
- Uso adequado de *strict types*, encapsulamento, getters/setters e **Composer** com autoload (25%).  
- Implementação e uso correto de **traits** para reutilização de código (15%).  
- Organização do código, clareza dos comentários e estrutura do projeto (20%).  

**Notas Adicionais**:  
O código deve funcionar sem erros de execução. A documentação em DocBlock deve ser clara e seguir o padrão PHPDoc (ex.: **@param string $nome**, **@return string**). Use verificação de instância (**instanceof**) para garantir que apenas eventos **Competivel** possam ser iniciados/finalizados.  
