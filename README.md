# Teste: aplicação com cadastro simples em PHP puro

Este foi um teste realizado a partir de um processo seletivo. O teste consiste na construção de uma pequena aplicação
para cadastro de usuários sem o uso de qualquer framework, apenas PHP com biblioteca de terceiros.

## Enunciado
_O NIS (Número de Identificação Social) é um identificador único atribuído pela Caixa Econômica Federal aos cidadãos. Composto por 11 dígitos, é utilizado para realizar o pagamento de benefícios sociais, assim como chave de identificação nas Políticas Públicas, emissão de documentos, dentre outras utilidades._

1. Crie uma aplicação contendo um formulário para cadastrar cidadãos. O formulário deve conter um único campo para informar o nome do cidadão. Ao ser cadastrado, um número NIS deve ser gerado automaticamente, atribuído a esta pessoa e então exibido na tela junto de uma mensagem de sucesso.
2. Deve ser possível também pesquisar os registros já existentes através do número NIS. Caso o NIS informado já esteja cadastrado, a aplicação deve exibir o nome do cidadão e seu número NIS. Caso não esteja, deve exibir: “Cidadão não encontrado”.

### Tecnologia Exigida

- Banco de Dados: livre escolha;
- Framework: Nenhum;
- Código deverá ser escrito com paradigma da POO.

### Critérios de Avaliação

- O funcionamento correto da aplicação de acordo com os requisitos do desafio;
- A arquitetura da aplicação;
- A qualidade, clareza e organização do código entregue;
- A utilização de boas práticas de desenvolvimento.

### Bônus

- Utilização de padrões arquiteturais e de projeto;
- ~~Testes automatizados;~~
- A utilização de um gerenciador de pacotes.

## Ambiente Local Utilizado

No banco de dados resolvi utilizar o **MySQL**. Usei também o **NGINX** como
servidor HTTP e utilizei o **PHP em sua versão 8.1**. Como esperado, usei o **Docker a partir do phpdocker**,
que já trás um ambiente robusto e completamente configurado.
Rodei isso no **WSL2 com Ubuntu** e o docker instalado nele, nativamente.

### Observações
Todas as configurações a seguir (portas de acesso, banco de dados e etc) estão configuradas no arquivo
[docker-compose](https://github.com/gabrielmath/desafio_gesuas/blob/main/docker-compose.yml).
Altere-as conforme a sua necessidade (se for preciso).

## Instalação

Após clonar o projeto em seu aparelho, suba os containers via docker-compose:

```bash
docker-compose up -d
```

Depois que tudo estiver rodando, acesse o container do php-fpm:

```bash
docker-compose exec php-fpm bash
```

Após, basta rodar o comando do composer para instalar as dependências:

```bash
composer install
```

Com todas as dependências instaladas, finalmente criaremos a tabela no nosso banco de dados:

```bash
php src/Core/Database/Eloquent/Migrations/CreateUserTable.php
```

## Pacotes utilizados
- Template Engine:
    - [PlatesPHP](https://platesphp.com) - Default;
    - [Twig](https://twig.symfony.com) - instalado e podendo ser usado como segunda opção;
- Rotas:
    - [Leaf 3 - Router](https://leafphp.dev/docs/routing);
- ORM:
    - [Eloquent](https://packagist.org/packages/illuminate/database) (o mesmo do [Laravel](https://laravel.com/docs/9.x/eloquent));
- ~~Testes:~~
    - ~~[PHPUnit](https://phpunit.readthedocs.io/pt_BR/latest/)~~

## Resumo da aplicação
A respeito do ciclo de vida, a aplicação faz o que é solicitado:
 na tela principal é exibida uma listagem com todos os cidadãos e um campo de busca
pelo NIS. Caso o usuário não exista, a mensagem é exibida informando que não existe cidadão com aquele NIS.

Na mesma tela há um modal onde inserimos o nome da pessoa e cadastramos um novo usuário.
Seu NIS será gerado automaticamente e de forma que não se repita entre os usuários.
Após o cadastro, o usuário volta para a listagem atualizada e com uma mensagem de usuário cadastrado
com sucesso.


## Padrões utilizados
 Foi utilizado o paradigma da Orientação a Objetos e alguns dos princípios do SOLID, como responsabilidade única nas classes, inversão de dependência (uso da classe `View` no controller a depender de um contrato e não da implementação do template engine de fato).

Agora vindo de encontro ao `ORM`, utilizei o `Repository Pattern` visando a facilidade na troca para outro ORM ou conexão nativa seguindo as regras estipuladas por este Padrão.

O único ponto que não tive tanto sucesso foi no uso dos testes automatizados.

E claro, no geral, utilizei do padrão MVC para rodar a aplicação.

## Considerações Finais

Este foi um teste que me desafiou em relembrar como usar PHP sem depender de algum framework. Espero ter conseguido passar um pouco da ideia que tive
pra solucionar o problema e como me organizei, como estruturei o código para deixá-lo melhor manutenível,
com fácil compreensão e rápida leitura.

### Obrigado!
