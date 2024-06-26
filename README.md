## Documentação do Sistema - Gerenciamento de Eventos

## Visão Geral

O Sistema de Gerenciamento de Eventos é uma aplicação web que permite aos usuários criar, agendar e gerenciar eventos de
forma eficiente projeto desenvolvido para a matéria de Programação Orientada a Objetos para Web ministrada pelo
Professor Ozeas Nobre. Com uma interface intuitiva e recursos poderosos, o sistema ajuda organizadores de eventos a
planejar e
coordenar eventos de qualquer escala.

## Requisitos de Software

Servidor web (Apache, Nginx)
PHP 7.0 ou superior
MySQL 5.6 ou superior
Navegador web moderno (Chrome, Firefox, Safari)
Instalação
Clone ou baixe o repositório do Sistema de Gerenciamento de Eventos.
Configure um servidor web para hospedar a aplicação.
Importe o arquivo database.sql para criar o banco de dados.
Configure as credenciais do banco de dados no arquivo conexao.php.
Abra o sistema em seu navegador e siga as instruções para criar uma conta de usuário.
Arquitetura
O sistema segue uma arquitetura cliente-servidor, com o lado do servidor desenvolvido em PHP e MySQL para o banco de
dados. A interface do usuário é construída com HTML, CSS e JavaScript, utilizando o framework Bootstrap para o design
responsivo.

## Estrutura de Arquivos

- index.php: Página inicial do sistema.
- login.php: Página de login para os usuários administrativos.
- dashboard.php: Painel principal após o login, exibe os eventos do usuário.
- config.php: Arquivo de configuração com credenciais do banco de dados.
- functions.php: Funções auxiliares utilizadas em todo o sistema.
- /css: Diretório contendo arquivos CSS.
- /js: Diretório contendo arquivos JavaScript.
- /img: Diretório contendo imagens e ícones.

## Manual do Usuário

O Manual do Usuário fornece instruções detalhadas sobre como utilizar todas as funcionalidades do sistema, incluindo:

- Login: admin@admin.com senha: SenhaDaAdministracao
- Agendamento de eventos em datas específicas.
- Visualização e gerenciamento de eventos.
- Adição, edição, exclusão e listagem de salas.

## Notas de Versão

### v1.0.1 (06/04/2024)

Lançamento inicial do Sistema de Gerenciamento de Eventos.
Funcionalidades básicas de criação, edição e exclusão de eventos.
Adicionada funcionalidade de agendamento de eventos em datas específicas.
Melhorias na interface do usuário e experiência do usuário.
