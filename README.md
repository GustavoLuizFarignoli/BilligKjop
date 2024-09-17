# BilligKjop
Sistema de e-commerce desenvolvido com as tecnologias PHP, HTML, CSS, REACT e MYSQL.
## Índice
- [Descrição](#descrição)
- [Requisitos](#requisitos)
- [Configuração](#configuração)
- [Uso](#uso)

## Descrição
O projeto BilligKjop foi desenvolvido com base no padrão arquitetural MVC, onde as diferentes tarefas são particionadas em camadas diferentes. Essas camadas são caracterizadas por cuidar de maneira separada da **Recuperação de dados *(Model)***, **Visualização *(View)*** e **Lógica da aplicação *(Control)***. Para tornar o nosso controle de dependências dentro do projeto mais eficiente, utilizamos a tecnologia **Composer**, que é o responsável pela gerência de dependências em projetos **PHP**. Além disso, o projeto utiliza um banco de dados **MYSQL** para o armazenamento dos dados.

## Requisitos
Será necessário realizar a instalação dos seguintes componentes a fim de inicializar a aplicação:
- [PHP 8.1](https://www.php.net/downloads) (Não testado para versões anteriores)
- [Composer 2.6.5](https://getcomposer.org/download/) (Não testado para versões anteriores)
- [MYSQL](https://dev.mysql.com/downloads/) (Versão não especificada)

## Configuração
Para que o projeto funcione como esperado, você deve criar um banco de dados com o nome `billigkjop`, atualizar o nome de usuário e a senha para acessar o banco de dados. Essas informações estão presentes no arquivo **Conexao.php** localizado na pasta **config**:
```
├── config/
│   └── Conexao.php
```

## Uso
Você deve abrir um terminal local no endereço da pasta onde o projeto foi clonado e digitar os comandos:
### Instalando as dependências do projeto:
```
composer install
```
### Inicializando o servidor local na porta 80:
```
php -S localhost:80
```
