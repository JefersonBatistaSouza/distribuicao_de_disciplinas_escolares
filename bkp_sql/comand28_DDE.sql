-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 16/03/2021 às 18:18
-- Versão do servidor: 5.7.23-23
-- Versão do PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `comand28_DDE`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `ACESSOTAE`
--

CREATE TABLE `ACESSOTAE` (
  `IDTAE` int(11) NOT NULL,
  `NOME` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `EMAIL` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `SENHA` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ACESSOPERMITIDO` char(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NAO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `ACESSOTAE`
--

INSERT INTO `ACESSOTAE` (`IDTAE`, `NOME`, `EMAIL`, `SENHA`, `ACESSOPERMITIDO`) VALUES
(1, 'ADMIN_DEV', 'comandaariquemes@gmail.com', '202cb962ac59075b964b07152d234b70', 'SIM'),
(3, 'ANDREY TAE', 'andrey.quadros@ifro.edu.br', '7604d0087f35a649147a815b3b781b1e', 'SIM');

-- --------------------------------------------------------

--
-- Estrutura para tabela `CURSO`
--

CREATE TABLE `CURSO` (
  `IDCURSO` int(11) NOT NULL,
  `NOME` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `SIGLA` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `CARGAHORARIA` int(11) NOT NULL,
  `NIVELCURSO` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `QUANTIDADE_PERIODO` int(11) NOT NULL DEFAULT '1',
  `CORDENADOR_IDPROFESSOR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `CURSODISCIPLINA`
--

CREATE TABLE `CURSODISCIPLINA` (
  `PERIODOMINISTRADO` int(11) NOT NULL DEFAULT '1',
  `DISCIPLINA_IDDISCIPLINA` int(11) NOT NULL,
  `CURSO_IDCURSO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `DISCIPLINA`
--

CREATE TABLE `DISCIPLINA` (
  `IDDISCIPLINA` int(11) NOT NULL,
  `NOME` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `SIGLA` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `CARGAHORARIA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `DISTRIBUICAODISCIPLINA`
--

CREATE TABLE `DISTRIBUICAODISCIPLINA` (
  `IDDISTRIBUICAO` int(11) NOT NULL,
  `QUANTIDADEAULA` int(11) NOT NULL DEFAULT '1',
  `TURMA_IDTURMA` int(11) NOT NULL,
  `PROFESSOR_IDPROFESSOR` int(11) NOT NULL,
  `DISCIPLINA_IDDISCIPLINA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `FUNCAOPROFESSOR`
--

CREATE TABLE `FUNCAOPROFESSOR` (
  `FUNCAO_ADM_IDFUNCAO` int(11) NOT NULL,
  `PROFESSOR_IDPROFESSOR` int(11) NOT NULL,
  `SENHA` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ACESSOPERMITIDO` char(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NÃO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `FUNCAOPROFESSOR`
--

INSERT INTO `FUNCAOPROFESSOR` (`FUNCAO_ADM_IDFUNCAO`, `PROFESSOR_IDPROFESSOR`, `SENHA`, `ACESSOPERMITIDO`) VALUES
(1, 1, '7604d0087f35a649147a815b3b781b1e', 'SIM'),
(1, 2, '202cb962ac59075b964b07152d234b70', 'NAO');

-- --------------------------------------------------------

--
-- Estrutura para tabela `FUNCAO_ADM`
--

CREATE TABLE `FUNCAO_ADM` (
  `IDFUNCAO` int(11) NOT NULL,
  `FUNCAO` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `FUNCAO_ADM`
--

INSERT INTO `FUNCAO_ADM` (`IDFUNCAO`, `FUNCAO`) VALUES
(1, 'COORDENADOR');

-- --------------------------------------------------------

--
-- Estrutura para tabela `HORARIO`
--

CREATE TABLE `HORARIO` (
  `IDHORARIO` int(11) NOT NULL,
  `DATA` date NOT NULL,
  `HORA` time NOT NULL,
  `DISTRIBUICAODISCIPLINA_IDDISTRIBUICAO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `PROFESSOR`
--

CREATE TABLE `PROFESSOR` (
  `IDPROFESSOR` int(11) NOT NULL,
  `NOME` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `EMAIL` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `PROFESSOR`
--

INSERT INTO `PROFESSOR` (`IDPROFESSOR`, `NOME`, `EMAIL`) VALUES
(1, 'ANDREY ALENCAR', 'andrey.quadros@ifro.edu.br'),
(2, 'JEFERSON SOUZA', 'tratormagdeveloper@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura para tabela `PROFESSORDISCIPLINA`
--

CREATE TABLE `PROFESSORDISCIPLINA` (
  `PROFESSOR_IDPROFESSOR` int(11) NOT NULL,
  `DISCIPLINA_IDDISCIPLINA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `TURMA`
--

CREATE TABLE `TURMA` (
  `IDTURMA` int(11) NOT NULL,
  `SIGLA` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `ANOINICIO` year(4) NOT NULL,
  `ANOTERMINO` year(4) NOT NULL,
  `NOME` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ORIENTADOR_IDPROFESSOR` int(11) NOT NULL,
  `CURSO_IDCURSO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `ACESSOTAE`
--
ALTER TABLE `ACESSOTAE`
  ADD PRIMARY KEY (`IDTAE`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`);

--
-- Índices de tabela `CURSO`
--
ALTER TABLE `CURSO`
  ADD PRIMARY KEY (`IDCURSO`),
  ADD KEY `fk_CURSO_PROFESSOR1_idx` (`CORDENADOR_IDPROFESSOR`);

--
-- Índices de tabela `CURSODISCIPLINA`
--
ALTER TABLE `CURSODISCIPLINA`
  ADD KEY `fk_CURSODISCIPLINA_DISCIPLINA1_idx` (`DISCIPLINA_IDDISCIPLINA`),
  ADD KEY `fk_CURSODISCIPLINA_CURSO1_idx` (`CURSO_IDCURSO`);

--
-- Índices de tabela `DISCIPLINA`
--
ALTER TABLE `DISCIPLINA`
  ADD PRIMARY KEY (`IDDISCIPLINA`);

--
-- Índices de tabela `DISTRIBUICAODISCIPLINA`
--
ALTER TABLE `DISTRIBUICAODISCIPLINA`
  ADD PRIMARY KEY (`IDDISTRIBUICAO`),
  ADD KEY `fk_DISTRBUICAODISCIPLINA_TURMA1_idx` (`TURMA_IDTURMA`),
  ADD KEY `fk_DISTRBUICAODISCIPLINA_PROFESSOR1_idx` (`PROFESSOR_IDPROFESSOR`),
  ADD KEY `fk_DISTRIBUICAODISCIPLINA_DISCIPLINA1_idx` (`DISCIPLINA_IDDISCIPLINA`);

--
-- Índices de tabela `FUNCAOPROFESSOR`
--
ALTER TABLE `FUNCAOPROFESSOR`
  ADD KEY `fk_FUNCAOPROFESSOR_FUNCAO_ADM1_idx` (`FUNCAO_ADM_IDFUNCAO`),
  ADD KEY `fk_FUNCAOPROFESSOR_PROFESSOR1_idx` (`PROFESSOR_IDPROFESSOR`);

--
-- Índices de tabela `FUNCAO_ADM`
--
ALTER TABLE `FUNCAO_ADM`
  ADD PRIMARY KEY (`IDFUNCAO`);

--
-- Índices de tabela `HORARIO`
--
ALTER TABLE `HORARIO`
  ADD PRIMARY KEY (`IDHORARIO`),
  ADD KEY `fk_HORARIO_DISTRIBUICAODISCIPLINA1_idx` (`DISTRIBUICAODISCIPLINA_IDDISTRIBUICAO`);

--
-- Índices de tabela `PROFESSOR`
--
ALTER TABLE `PROFESSOR`
  ADD PRIMARY KEY (`IDPROFESSOR`);

--
-- Índices de tabela `PROFESSORDISCIPLINA`
--
ALTER TABLE `PROFESSORDISCIPLINA`
  ADD KEY `fk_PROFESSORDISCIPLINA_PROFESSOR1_idx` (`PROFESSOR_IDPROFESSOR`),
  ADD KEY `fk_PROFESSORDISCIPLINA_DISCIPLINA1_idx` (`DISCIPLINA_IDDISCIPLINA`);

--
-- Índices de tabela `TURMA`
--
ALTER TABLE `TURMA`
  ADD PRIMARY KEY (`IDTURMA`),
  ADD KEY `fk_TURMA_PROFESSOR1_idx` (`ORIENTADOR_IDPROFESSOR`),
  ADD KEY `fk_TURMA_CURSO1_idx` (`CURSO_IDCURSO`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `ACESSOTAE`
--
ALTER TABLE `ACESSOTAE`
  MODIFY `IDTAE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `CURSO`
--
ALTER TABLE `CURSO`
  MODIFY `IDCURSO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `DISCIPLINA`
--
ALTER TABLE `DISCIPLINA`
  MODIFY `IDDISCIPLINA` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `DISTRIBUICAODISCIPLINA`
--
ALTER TABLE `DISTRIBUICAODISCIPLINA`
  MODIFY `IDDISTRIBUICAO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `FUNCAO_ADM`
--
ALTER TABLE `FUNCAO_ADM`
  MODIFY `IDFUNCAO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `HORARIO`
--
ALTER TABLE `HORARIO`
  MODIFY `IDHORARIO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `PROFESSOR`
--
ALTER TABLE `PROFESSOR`
  MODIFY `IDPROFESSOR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `TURMA`
--
ALTER TABLE `TURMA`
  MODIFY `IDTURMA` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `CURSO`
--
ALTER TABLE `CURSO`
  ADD CONSTRAINT `fk_CURSO_PROFESSOR1` FOREIGN KEY (`CORDENADOR_IDPROFESSOR`) REFERENCES `PROFESSOR` (`IDPROFESSOR`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `CURSODISCIPLINA`
--
ALTER TABLE `CURSODISCIPLINA`
  ADD CONSTRAINT `fk_CURSODISCIPLINA_CURSO1` FOREIGN KEY (`CURSO_IDCURSO`) REFERENCES `CURSO` (`IDCURSO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_CURSODISCIPLINA_DISCIPLINA1` FOREIGN KEY (`DISCIPLINA_IDDISCIPLINA`) REFERENCES `DISCIPLINA` (`IDDISCIPLINA`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `DISTRIBUICAODISCIPLINA`
--
ALTER TABLE `DISTRIBUICAODISCIPLINA`
  ADD CONSTRAINT `fk_DISTRBUICAODISCIPLINA_PROFESSOR1` FOREIGN KEY (`PROFESSOR_IDPROFESSOR`) REFERENCES `PROFESSOR` (`IDPROFESSOR`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_DISTRBUICAODISCIPLINA_TURMA1` FOREIGN KEY (`TURMA_IDTURMA`) REFERENCES `TURMA` (`IDTURMA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_DISTRIBUICAODISCIPLINA_DISCIPLINA1` FOREIGN KEY (`DISCIPLINA_IDDISCIPLINA`) REFERENCES `DISCIPLINA` (`IDDISCIPLINA`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `FUNCAOPROFESSOR`
--
ALTER TABLE `FUNCAOPROFESSOR`
  ADD CONSTRAINT `fk_FUNCAOPROFESSOR_FUNCAO_ADM1` FOREIGN KEY (`FUNCAO_ADM_IDFUNCAO`) REFERENCES `FUNCAO_ADM` (`IDFUNCAO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_FUNCAOPROFESSOR_PROFESSOR1` FOREIGN KEY (`PROFESSOR_IDPROFESSOR`) REFERENCES `PROFESSOR` (`IDPROFESSOR`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `HORARIO`
--
ALTER TABLE `HORARIO`
  ADD CONSTRAINT `fk_HORARIO_DISTRIBUICAODISCIPLINA1` FOREIGN KEY (`DISTRIBUICAODISCIPLINA_IDDISTRIBUICAO`) REFERENCES `DISTRIBUICAODISCIPLINA` (`IDDISTRIBUICAO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `PROFESSORDISCIPLINA`
--
ALTER TABLE `PROFESSORDISCIPLINA`
  ADD CONSTRAINT `fk_PROFESSORDISCIPLINA_DISCIPLINA1` FOREIGN KEY (`DISCIPLINA_IDDISCIPLINA`) REFERENCES `DISCIPLINA` (`IDDISCIPLINA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_PROFESSORDISCIPLINA_PROFESSOR1` FOREIGN KEY (`PROFESSOR_IDPROFESSOR`) REFERENCES `PROFESSOR` (`IDPROFESSOR`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `TURMA`
--
ALTER TABLE `TURMA`
  ADD CONSTRAINT `fk_TURMA_CURSO1` FOREIGN KEY (`CURSO_IDCURSO`) REFERENCES `CURSO` (`IDCURSO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TURMA_PROFESSOR1` FOREIGN KEY (`ORIENTADOR_IDPROFESSOR`) REFERENCES `PROFESSOR` (`IDPROFESSOR`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
