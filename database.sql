-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Jan-2022 às 04:21
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projetoDois`
--

-- --------------------------------------------------------
CREATE TABLE `salas`
(
    `id`                   int(11)      NOT NULL AUTO_INCREMENT,
    `nome`                 varchar(50)  NOT NULL,
    `localizacao`          varchar(100) NOT NULL,
    `status`               tinyint(1)   NOT NULL,
    `recursos_disponiveis` varchar(150) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;


--
-- Estrutura da tabela `events`
--

CREATE TABLE `events`
(
    `id`           int(11)      NOT NULL,
    `title`        varchar(30)  NOT NULL,
    `color`        varchar(15)  NOT NULL,
    `start`        datetime     NOT NULL,
    `end`          datetime     NOT NULL,
    `status`       tinyint(1)   NOT NULL,
    `description`  varchar(150) NOT NULL,
    `dataCadastro` datetime     NOT NULL,
    `sala_id`      int(11)      NOT NULL,
    CONSTRAINT `fk_events_salas_id` FOREIGN KEY (`sala_id`) REFERENCES `salas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;


-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users`
(
    `id`           int(11)     NOT NULL,
    `name`         varchar(50) NOT NULL,
    `user`         varchar(60) NOT NULL,
    `password`     varchar(40) NOT NULL,
    `permission`   tinyint(1)  NOT NULL,
    `dataCadastro` datetime    NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `user`, `password`, `permission`, `dataCadastro`)
VALUES (1, 'Administração', 'admin@admin.com', 'SenhaDaAdministracao', 1, '2024-4-5 21:22:04');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `events`
--
ALTER TABLE `events`
    ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `events`
--
ALTER TABLE `events`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 21;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
