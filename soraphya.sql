-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Jul-2022 às 13:55
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `soraphya`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.online`
--

CREATE TABLE `tb_admin.online` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `ultima_atualizacao` datetime NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.usuarios`
--

CREATE TABLE `tb_admin.usuarios` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_admin.usuarios`
--

INSERT INTO `tb_admin.usuarios` (`id`, `user`, `password`, `nome`, `cargo`) VALUES
(1, 'empresatal', '123', 'Empresa Tal', 0),
(17, 'joaobatista', '123456', 'João Batista', 3),
(18, 'empresatal', '123123', 'Empresa Tal', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.visitas`
--

CREATE TABLE `tb_admin.visitas` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `data_visita` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_control.clientes`
--

CREATE TABLE `tb_control.clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `data_nascimento` varchar(255) NOT NULL,
  `empresa` varchar(255) NOT NULL,
  `cnpj` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `whatsapp` varchar(255) NOT NULL,
  `host` varchar(255) DEFAULT NULL,
  `nome_banco` varchar(255) DEFAULT NULL,
  `user` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `vencimento_dia` int(11) DEFAULT NULL,
  `parceiro` varchar(255) DEFAULT NULL,
  `login_id` int(11) NOT NULL,
  `data_cadastro` date DEFAULT NULL,
  `ativo` char(1) DEFAULT NULL,
  `isento` char(1) NOT NULL,
  `cupom_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_control.financeiro`
--

CREATE TABLE `tb_control.financeiro` (
  `id` int(11) NOT NULL,
  `empresa_id` int(11) NOT NULL,
  `valor` decimal(11,2) NOT NULL,
  `vencimento` date NOT NULL,
  `link` varchar(255) NOT NULL,
  `status` char(1) NOT NULL,
  `pagamento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_control.indicacoes`
--

CREATE TABLE `tb_control.indicacoes` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `empresa` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `whatsapp` varchar(255) NOT NULL,
  `parceiro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_control.licencas`
--

CREATE TABLE `tb_control.licencas` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `nivel` int(11) NOT NULL,
  `indicacoes` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `cashback` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_control.licencas`
--

INSERT INTO `tb_control.licencas` (`id`, `nome`, `nivel`, `indicacoes`, `valor`, `cashback`, `quantidade`) VALUES
(1, 'Bronze', 1, 0, 60, 0, 0),
(2, 'Bronze', 2, 1, 50, 0, 0),
(3, 'Bronze', 3, 2, 45, 0, 0),
(4, 'Bronze', 4, 3, 30, 0, 0),
(5, 'Bronze', 5, 4, 15, 0, 0),
(6, 'Prata', 1, 5, 0, 0, 0),
(7, 'Prata', 2, 6, 0, 15, 0),
(8, 'Prata', 3, 7, 0, 30, 0),
(9, 'Prata', 4, 8, 0, 45, 0),
(10, 'Prata', 5, 9, 0, 60, 0),
(11, 'Ouro', 1, 10, 0, 75, 0),
(12, 'Ouro', 2, 11, 0, 90, 0),
(13, 'Ouro', 3, 12, 0, 105, 0),
(14, 'Ouro', 4, 13, 0, 120, 0),
(15, 'Ouro', 5, 14, 0, 135, 0),
(16, 'Platina', 1, 15, 0, 150, 0),
(17, 'Platina', 2, 16, 0, 165, 0),
(18, 'Platina', 3, 17, 0, 180, 0),
(19, 'Platina', 4, 18, 0, 195, 0),
(20, 'Platina', 5, 19, 0, 210, 0),
(21, 'Diamante', 1, 20, 0, 225, 0),
(22, 'Diamante', 2, 21, 0, 240, 0),
(23, 'Diamante', 3, 22, 0, 255, 0),
(24, 'Diamante', 4, 23, 0, 270, 0),
(25, 'Diamante', 5, 24, 0, 285, 0),
(26, 'Star', 0, 25, 0, 300, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_control.parceiros`
--

CREATE TABLE `tb_control.parceiros` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `chave_pix` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `data_pagamento` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `cupom_id` varchar(255) NOT NULL,
  `ativo` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_control.respostas`
--

CREATE TABLE `tb_control.respostas` (
  `id` int(11) NOT NULL,
  `suporte_id` varchar(255) NOT NULL,
  `remetente` varchar(255) NOT NULL,
  `mensagem` text NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_control.suporte`
--

CREATE TABLE `tb_control.suporte` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `mensagem` text NOT NULL,
  `data` date NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_admin.online`
--
ALTER TABLE `tb_admin.online`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_admin.usuarios`
--
ALTER TABLE `tb_admin.usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_admin.visitas`
--
ALTER TABLE `tb_admin.visitas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_control.clientes`
--
ALTER TABLE `tb_control.clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_control.financeiro`
--
ALTER TABLE `tb_control.financeiro`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_control.indicacoes`
--
ALTER TABLE `tb_control.indicacoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_control.licencas`
--
ALTER TABLE `tb_control.licencas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_control.parceiros`
--
ALTER TABLE `tb_control.parceiros`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_control.respostas`
--
ALTER TABLE `tb_control.respostas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_control.suporte`
--
ALTER TABLE `tb_control.suporte`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_admin.online`
--
ALTER TABLE `tb_admin.online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de tabela `tb_admin.usuarios`
--
ALTER TABLE `tb_admin.usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `tb_admin.visitas`
--
ALTER TABLE `tb_admin.visitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_control.clientes`
--
ALTER TABLE `tb_control.clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_control.financeiro`
--
ALTER TABLE `tb_control.financeiro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_control.indicacoes`
--
ALTER TABLE `tb_control.indicacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tb_control.licencas`
--
ALTER TABLE `tb_control.licencas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `tb_control.parceiros`
--
ALTER TABLE `tb_control.parceiros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_control.respostas`
--
ALTER TABLE `tb_control.respostas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_control.suporte`
--
ALTER TABLE `tb_control.suporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
