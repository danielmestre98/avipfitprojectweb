-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: avipfit.mysql.dbaas.com.br
-- Generation Time: 05-Dez-2019 às 07:42
-- Versão do servidor: 5.6.40-84.0-log
-- PHP Version: 5.6.40-0+deb8u7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `avipfit`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda`
--

CREATE TABLE `agenda` (
  `dia` varchar(15) CHARACTER SET utf8 NOT NULL,
  `evento` varchar(25) CHARACTER SET utf8 NOT NULL,
  `horario` time NOT NULL,
  `filial` int(15) NOT NULL,
  `cpffunc` varchar(15) CHARACTER SET utf8 NOT NULL,
  `id` int(11) NOT NULL,
  `horafim` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `agendamento`
--

CREATE TABLE `agendamento` (
  `data` date NOT NULL,
  `descricaoCancelamento` varchar(1022) DEFAULT NULL,
  `status` varchar(25) NOT NULL,
  `horario` time NOT NULL,
  `horafim` time NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `idFilial` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `agendamentoaulaexp`
--

CREATE TABLE `agendamentoaulaexp` (
  `data` date NOT NULL,
  `email` varchar(50) COLLATE utf8_general_mysql500_ci NOT NULL,
  `IdFilial` varchar(30) COLLATE utf8_general_mysql500_ci NOT NULL,
  `modalidadeTreinamento` varchar(20) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `nome` varchar(40) COLLATE utf8_general_mysql500_ci NOT NULL,
  `telefone` varchar(20) COLLATE utf8_general_mysql500_ci NOT NULL,
  `horario` time NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `agendamentoavalfisicamensal`
--

CREATE TABLE `agendamentoavalfisicamensal` (
  `data` date NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `horario` time NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `avalfisica`
--

CREATE TABLE `avalfisica` (
  `id` int(11) NOT NULL,
  `massaCorporal` float NOT NULL,
  `estatura` int(11) NOT NULL,
  `subescapular` float NOT NULL,
  `triceps` float NOT NULL,
  `peitoral` float NOT NULL,
  `axilarMedial` float NOT NULL,
  `supraIliaca` float NOT NULL,
  `biceps` float NOT NULL,
  `abdominal` float NOT NULL,
  `abdominalPer` float NOT NULL,
  `coxaProximal` float NOT NULL,
  `coxaMedial` float NOT NULL,
  `panturrilha` float NOT NULL,
  `torax` float NOT NULL,
  `cintura` float NOT NULL,
  `quadril` float NOT NULL,
  `antebracoD` float NOT NULL,
  `antebracoE` float NOT NULL,
  `bracoRD` float NOT NULL,
  `bracoRE` float NOT NULL,
  `bracoCD` float NOT NULL,
  `bracoCE` float NOT NULL,
  `protocolo` int(11) NOT NULL,
  `data` date NOT NULL,
  `cpf` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `ideal` float NOT NULL,
  `meta` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `cpf` varchar(15) NOT NULL,
  `filial` int(15) NOT NULL,
  `sexo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contem`
--

CREATE TABLE `contem` (
  `Exercicio` varchar(255) NOT NULL,
  `NomeTreinamento` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `depoimentos`
--

CREATE TABLE `depoimentos` (
  `cpf` varchar(15) NOT NULL,
  `descricao` varchar(1022) NOT NULL,
  `status` varchar(25) NOT NULL,
  `id` int(11) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `exercicio`
--

CREATE TABLE `exercicio` (
  `NomeExercicio` varchar(255) NOT NULL,
  `descricao` varchar(1022) NOT NULL,
  `url` varchar(100) DEFAULT NULL,
  `id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `filial`
--

CREATE TABLE `filial` (
  `cnpj` varchar(25) NOT NULL,
  `IdFilial` int(15) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `rua` varchar(255) NOT NULL,
  `numero` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `cpf` varchar(15) NOT NULL,
  `IdFilial` int(15) NOT NULL,
  `funcao` varchar(15) NOT NULL,
  `salario` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `horario`
--

CREATE TABLE `horario` (
  `cpf` varchar(16) NOT NULL,
  `segunda` varchar(5) DEFAULT NULL,
  `terca` varchar(5) DEFAULT NULL,
  `quarta` varchar(5) DEFAULT NULL,
  `quinta` varchar(5) DEFAULT NULL,
  `sexta` varchar(5) DEFAULT NULL,
  `sabado` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `log`
--

CREATE TABLE `log` (
  `id` int(25) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `data` datetime NOT NULL,
  `tabela` varchar(500) NOT NULL,
  `usuario` varchar(60) NOT NULL,
  `codigo` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `manual`
--

CREATE TABLE `manual` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `caminho` varchar(255) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensalidade`
--

CREATE TABLE `mensalidade` (
  `cpf` varchar(15) NOT NULL,
  `valor` varchar(8) NOT NULL,
  `DataVencimento` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `meses`
--

CREATE TABLE `meses` (
  `comp` varchar(10) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamentos`
--

CREATE TABLE `pagamentos` (
  `cpf` varchar(15) CHARACTER SET utf8 NOT NULL,
  `status` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `competencia` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `parceiro`
--

CREATE TABLE `parceiro` (
  `cnpj` varchar(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `telefone` varchar(16) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `rua` varchar(150) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `bairro` varchar(80) NOT NULL,
  `numero` varchar(35) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `cpf` varchar(15) NOT NULL,
  `dataNascimento` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `TipoPessoa` varchar(15) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `bairro` varchar(255) NOT NULL,
  `rua` varchar(255) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `inativo` tinyint(1) NOT NULL,
  `cadastro` date NOT NULL,
  `datasaida` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `realiza`
--

CREATE TABLE `realiza` (
  `Treinamento` varchar(50) NOT NULL,
  `cpf` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `recuperacao`
--

CREATE TABLE `recuperacao` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `token` varchar(60) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `relatorio`
--

CREATE TABLE `relatorio` (
  `id` int(11) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `IdFilial` varchar(30) NOT NULL,
  `treinamento` varchar(50) NOT NULL,
  `datainicio` date NOT NULL,
  `datafim` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `classificacao` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `status` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `prioridade` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `usuario` varchar(255) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ticketRespostas`
--

CREATE TABLE `ticketRespostas` (
  `id` int(11) NOT NULL,
  `ticket` int(11) NOT NULL,
  `descricao` varchar(1022) COLLATE latin1_general_ci NOT NULL,
  `imagem` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `datahora` datetime NOT NULL,
  `tipo` varchar(10) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `token`
--

CREATE TABLE `token` (
  `token` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `datahora` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `treinamento`
--

CREATE TABLE `treinamento` (
  `Id` int(12) NOT NULL,
  `NomeTreinamento` varchar(50) NOT NULL,
  `inativo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cpfunc` (`cpffunc`),
  ADD KEY `idfilialag` (`filial`);

--
-- Indexes for table `agendamento`
--
ALTER TABLE `agendamento`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agendamentoaulaexp`
--
ALTER TABLE `agendamentoaulaexp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agendamentoavalfisicamensal`
--
ALTER TABLE `agendamentoavalfisicamensal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agendamentoavalfisicamensal_ibfk_1` (`cpf`);

--
-- Indexes for table `avalfisica`
--
ALTER TABLE `avalfisica`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cpf`);

--
-- Indexes for table `contem`
--
ALTER TABLE `contem`
  ADD PRIMARY KEY (`Exercicio`,`NomeTreinamento`) USING BTREE,
  ADD KEY `trei` (`NomeTreinamento`);

--
-- Indexes for table `depoimentos`
--
ALTER TABLE `depoimentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cpffkdep` (`cpf`);

--
-- Indexes for table `exercicio`
--
ALTER TABLE `exercicio`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `NomeExercicio` (`NomeExercicio`);

--
-- Indexes for table `filial`
--
ALTER TABLE `filial`
  ADD PRIMARY KEY (`IdFilial`),
  ADD UNIQUE KEY `cnpj` (`cnpj`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`cpf`),
  ADD KEY `idfilialfinc` (`IdFilial`);

--
-- Indexes for table `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`cpf`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manual`
--
ALTER TABLE `manual`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mensalidade`
--
ALTER TABLE `mensalidade`
  ADD PRIMARY KEY (`cpf`);

--
-- Indexes for table `meses`
--
ALTER TABLE `meses`
  ADD PRIMARY KEY (`comp`);

--
-- Indexes for table `pagamentos`
--
ALTER TABLE `pagamentos`
  ADD PRIMARY KEY (`cpf`,`competencia`) USING BTREE;

--
-- Indexes for table `parceiro`
--
ALTER TABLE `parceiro`
  ADD PRIMARY KEY (`cnpj`);

--
-- Indexes for table `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`cpf`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `realiza`
--
ALTER TABLE `realiza`
  ADD PRIMARY KEY (`cpf`),
  ADD KEY `treinameona` (`Treinamento`);

--
-- Indexes for table `recuperacao`
--
ALTER TABLE `recuperacao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `relatorio`
--
ALTER TABLE `relatorio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IdFilial` (`IdFilial`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticketRespostas`
--
ALTER TABLE `ticketRespostas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkidticket` (`ticket`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `treinamento`
--
ALTER TABLE `treinamento`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `agendamento`
--
ALTER TABLE `agendamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `agendamentoaulaexp`
--
ALTER TABLE `agendamentoaulaexp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `agendamentoavalfisicamensal`
--
ALTER TABLE `agendamentoavalfisicamensal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `avalfisica`
--
ALTER TABLE `avalfisica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `depoimentos`
--
ALTER TABLE `depoimentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `exercicio`
--
ALTER TABLE `exercicio`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `filial`
--
ALTER TABLE `filial`
  MODIFY `IdFilial` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `manual`
--
ALTER TABLE `manual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `recuperacao`
--
ALTER TABLE `recuperacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `relatorio`
--
ALTER TABLE `relatorio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ticketRespostas`
--
ALTER TABLE `ticketRespostas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `treinamento`
--
ALTER TABLE `treinamento`
  MODIFY `Id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `agenda`
--
ALTER TABLE `agenda`
  ADD CONSTRAINT `cpfunc` FOREIGN KEY (`cpffunc`) REFERENCES `funcionario` (`cpf`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idfilialag` FOREIGN KEY (`filial`) REFERENCES `filial` (`IdFilial`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `agendamentoaulaexp`
--
ALTER TABLE `agendamentoaulaexp`
  ADD CONSTRAINT `fkidaulaexp` FOREIGN KEY (`id`) REFERENCES `agendamento` (`id`);

--
-- Limitadores para a tabela `agendamentoavalfisicamensal`
--
ALTER TABLE `agendamentoavalfisicamensal`
  ADD CONSTRAINT `fkidagendamento` FOREIGN KEY (`id`) REFERENCES `agendamento` (`id`);

--
-- Limitadores para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_cpf` FOREIGN KEY (`cpf`) REFERENCES `pessoa` (`cpf`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `contem`
--
ALTER TABLE `contem`
  ADD CONSTRAINT `exerciciooo` FOREIGN KEY (`Exercicio`) REFERENCES `exercicio` (`NomeExercicio`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `depoimentos`
--
ALTER TABLE `depoimentos`
  ADD CONSTRAINT `cpffkdep` FOREIGN KEY (`cpf`) REFERENCES `cliente` (`cpf`);

--
-- Limitadores para a tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `cpf func` FOREIGN KEY (`cpf`) REFERENCES `pessoa` (`cpf`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idfilialfinc` FOREIGN KEY (`IdFilial`) REFERENCES `filial` (`IdFilial`);

--
-- Limitadores para a tabela `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `fkcpf` FOREIGN KEY (`cpf`) REFERENCES `cliente` (`cpf`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `mensalidade`
--
ALTER TABLE `mensalidade`
  ADD CONSTRAINT `cpfm` FOREIGN KEY (`cpf`) REFERENCES `cliente` (`cpf`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  ADD CONSTRAINT `fkmensalidade` FOREIGN KEY (`cpf`) REFERENCES `cliente` (`cpf`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `realiza`
--
ALTER TABLE `realiza`
  ADD CONSTRAINT `cpf` FOREIGN KEY (`cpf`) REFERENCES `cliente` (`cpf`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `ticketRespostas`
--
ALTER TABLE `ticketRespostas`
  ADD CONSTRAINT `fkidticket` FOREIGN KEY (`ticket`) REFERENCES `ticket` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
