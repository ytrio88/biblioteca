-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Dez-2019 às 00:33
-- Versão do servidor: 10.4.8-MariaDB
-- versão do PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `copia`
--

CREATE TABLE `copia` (
  `id` int(11) NOT NULL,
  `idlivro` int(11) NOT NULL,
  `status` varchar(4) NOT NULL,
  `obs` varchar(250) NOT NULL,
  `data` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `copia`
--

INSERT INTO `copia` (`id`, `idlivro`, `status`, `obs`, `data`) VALUES
(1, 1, '0', 'Capa com mancha acinzentada', '2019-11-28'),
(2, 1, '0', '', '2019-11-28'),
(3, 1, '0', '', '2019-11-28'),
(4, 1, '0', '', '2019-11-28'),
(5, 1, '0', '', '2019-11-28'),
(6, 1, '0', '', '2019-11-28'),
(7, 1, '0', '', '2019-11-28'),
(8, 1, '0', '', '2019-11-28'),
(9, 1, '0', '', '2019-11-28'),
(10, 1, '0', '', '2019-11-28'),
(11, 1, '0', '', '2019-11-28'),
(12, 1, '0', '', '2019-11-28'),
(13, 1, '0', '', '2019-11-28'),
(14, 1, '1', '', '2019-11-29'),
(15, 1, '0', '', '2019-11-29'),
(16, 1, '0', '', '2019-11-29'),
(17, 1, '0', '', '2019-11-29'),
(18, 2, '0', '', '2019-11-29'),
(19, 2, '0', '', '2019-11-29'),
(20, 2, '1', '', '2019-11-30');

-- --------------------------------------------------------

--
-- Estrutura da tabela `emprestimo`
--

CREATE TABLE `emprestimo` (
  `id` int(11) NOT NULL,
  `idpes` int(11) NOT NULL,
  `idcopia` int(11) NOT NULL,
  `idfun` int(11) NOT NULL,
  `dtemp` date NOT NULL,
  `dtdev` date NOT NULL,
  `obs` varchar(250) DEFAULT NULL,
  `status` varchar(1) NOT NULL,
  `dtdev2` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `emprestimo`
--

INSERT INTO `emprestimo` (`id`, `idpes`, `idcopia`, `idfun`, `dtemp`, `dtdev`, `obs`, `status`, `dtdev2`) VALUES
(6, 2, 14, 1, '2019-11-15', '2019-11-22', '', '1', NULL),
(5, 2, 2, 1, '2019-11-15', '2019-11-22', '', '0', '2019-12-15'),
(3, 1, 19, 2, '2019-11-13', '2019-11-20', '', '0', '2019-12-15'),
(2, 1, 5, 2, '2019-11-13', '2019-11-20', '', '0', '2019-12-15'),
(4, 2, 20, 1, '2019-11-15', '2019-11-22', '', '1', NULL),
(1, 1, 2, 2, '2019-11-13', '2019-11-20', '', '0', '2019-12-13');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `dtnasc` date NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `rg` varchar(15) NOT NULL,
  `cargo` varchar(1) NOT NULL,
  `tel1` varchar(15) NOT NULL,
  `tel2` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `numero` varchar(5) NOT NULL,
  `complemento` varchar(100) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `status` varchar(1) NOT NULL,
  `dtcad` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id`, `nome`, `dtnasc`, `cpf`, `rg`, `cargo`, `tel1`, `tel2`, `email`, `cep`, `cidade`, `estado`, `endereco`, `numero`, `complemento`, `bairro`, `status`, `dtcad`) VALUES
(1, 'Vanya Bastov', '1987-04-15', '123.456.789-01', '14.588.696-0', '0', '(11)266859592', '', 'vanyabastov@gmail.com', '05220-000', 'São Paulo', '24', 'Avenida Raimundo Pereira de Magalhães', '2003', '', 'Vila Santa Cruz', '1', '2019-12-01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE `livro` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `editora` varchar(50) NOT NULL,
  `isbn` varchar(15) NOT NULL,
  `cdd` varchar(3) NOT NULL,
  `edicao` varchar(2) NOT NULL,
  `ano` varchar(4) NOT NULL,
  `obs` varchar(250) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `livro`
--

INSERT INTO `livro` (`id`, `nome`, `autor`, `editora`, `isbn`, `cdd`, `edicao`, `ano`, `obs`, `status`) VALUES
(1, 'Garimon a Pera sem Face', 'Gerofano Stev', 'Palazzo', '1626226262626', '002', '3', '1998', '', '1'),
(2, 'Maquete Romana para Iniciantes', 'Heitor Klein', 'Aprile', '4592224165555', '008', '1', '2018', '', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `dtnasc` date NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `rg` varchar(13) NOT NULL,
  `tel1` varchar(15) NOT NULL,
  `tel2` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `numero` varchar(5) NOT NULL,
  `complemento` varchar(100) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `status` varchar(1) NOT NULL,
  `dtcad` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`id`, `nome`, `dtnasc`, `cpf`, `rg`, `tel1`, `tel2`, `email`, `cep`, `cidade`, `estado`, `endereco`, `numero`, `complemento`, `bairro`, `status`, `dtcad`) VALUES
(1, 'Heitor Batista', '1987-11-02', '352.626.262-62', '12.256.854-9', '(12)15590002', '', 'heitorbatista@yahoo.com', '04155-000', 'São Paulo', '24', 'Rua Rosa de Morais', '352', '', 'Vila Água Funda', '1', '2019-11-30'),
(2, 'Krios Stevson', '1998-05-14', '252.626.262-55', '', '(14)226265995', '', 'kstevson@gmail.com', '11750-000', 'Peruíbe', '24', 'Rua T', '1023', '', 'centro', '1', '2019-12-01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `senha` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(1) NOT NULL,
  `idpes` int(11) NOT NULL,
  `perg` varchar(50) NOT NULL,
  `resp` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `login`, `senha`, `sub`, `tipo`, `idpes`, `perg`, `resp`) VALUES
(1, 'admin', '8d553f046e10af4c78f7109b1c9bfec51d645caf', '3b5a0cca614f09cdd94d5846bca795fb', '9', 0, '', ''),
(2, 'vanyabastov', 'c03cb29a330440232b7a968a903fae6dd37c3ef9', '3b5a0cca614f09cdd94d5846bca795fb', '1', 1, '1', '1');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `copia`
--
ALTER TABLE `copia`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `emprestimo`
--
ALTER TABLE `emprestimo`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
