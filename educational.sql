-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 19/06/2018 às 17:01
-- Versão do servidor: 5.7.22
-- Versão do PHP: 7.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `educational`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `answers`
--

CREATE TABLE `answers` (
  `id` int(11) UNSIGNED NOT NULL,
  `content` varchar(5000) DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `thread_id` int(11) UNSIGNED DEFAULT NULL,
  `answer_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `attachments`
--

CREATE TABLE `attachments` (
  `id` int(11) NOT NULL,
  `creation_date` datetime DEFAULT NULL,
  `title` varchar(256) DEFAULT NULL,
  `description` varchar(5000) DEFAULT NULL,
  `topic_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `courses`
--

CREATE TABLE `courses` (
  `id` int(11) UNSIGNED NOT NULL,
  `creation_date` datetime NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` varchar(5000) DEFAULT NULL,
  `user_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `courses`
--

INSERT INTO `courses` (`id`, `creation_date`, `name`, `description`, `user_id`) VALUES
(1, '2018-02-15 15:49:19', 'Análise e Desenvolvimento de Sistemas', 'O Curso Superior de Tecnologia em Análise e Desenvolvimento de Sistemas da UNIP tem o objetivo de capacitar o aluno a projetar, documentar, especificar, implementar, testar, implantar e manter sistemas computacionais de informação. ', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `lessons`
--

CREATE TABLE `lessons` (
  `id` int(11) UNSIGNED NOT NULL,
  `creation_date` datetime NOT NULL,
  `description` varchar(5000) DEFAULT NULL,
  `title` varchar(256) NOT NULL,
  `topic_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `matters`
--

CREATE TABLE `matters` (
  `id` int(11) UNSIGNED NOT NULL,
  `creation_date` datetime NOT NULL,
  `halfyear` int(1) NOT NULL,
  `matter_key` varchar(64) DEFAULT NULL,
  `name` varchar(256) NOT NULL,
  `description` varchar(5000) DEFAULT NULL,
  `matter_year` year(4) NOT NULL,
  `course_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `matters`
--

INSERT INTO `matters` (`id`, `creation_date`, `halfyear`, `matter_key`, `name`, `description`, `matter_year`, `course_id`, `user_id`) VALUES
(1, '2018-02-19 11:54:30', 1, '', 'Lógica de Programação', 'Lógica de programação tem como objetivo desenvolver no aluno a habilidade de resolver problemas aplicando algoritmos de programação fazendo uso da tecnologia da informação.', 2017, 1, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `notices`
--

CREATE TABLE `notices` (
  `id` int(11) UNSIGNED NOT NULL,
  `creation_date` datetime DEFAULT NULL,
  `content` varchar(10000) DEFAULT NULL,
  `title` varchar(256) DEFAULT NULL,
  `matter_id` int(11) UNSIGNED DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `notices`
--

INSERT INTO `notices` (`id`, `creation_date`, `content`, `title`, `matter_id`, `user_id`) VALUES
(2, '2018-06-19 13:16:32', '<p>sadasdasdasd</p>\r\n', 'O segundo aviso da matéria', 1, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `threads`
--

CREATE TABLE `threads` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(256) DEFAULT NULL,
  `content` varchar(5000) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `matter_id` int(11) UNSIGNED DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `threads`
--

INSERT INTO `threads` (`id`, `title`, `content`, `user_id`, `matter_id`, `creation_date`) VALUES
(1, 'Lorem Ipsum', '', 2, 1, '2018-05-28 23:24:21'),
(2, 'Lorem Ipsum', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean vitae feugiat ligula. Pellentesque pretium egestas ante nec luctus. Aliquam eget tellus eget ipsum auctor luctus. Vestibulum vel dolor pulvinar, tincidunt mauris in, ornare nulla. Nulla nec nunc vel tellus cursus ultrices non at arcu. Aliquam erat volutpat. Suspendisse lacus sem, lobortis ac turpis a, blandit tincidunt quam. Sed sed neque augue. Ut sit amet mauris vitae lectus tincidunt scelerisque. Nam gravida massa vel enim commodo pellentesque. Fusce congue metus at felis laoreet, placerat congue dui sollicitudin. Morbi sit amet mi ut nisl cursus tincidunt. Aenean dignissim quam sed malesuada gravida. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin non metus eros. Pellentesque aliquet eros enim, sed consequat augue cursus in.</p>\r\n\r\n<p>Proin eu lacus ut mi sollicitudin ullamcorper viverra vel odio. Vestibulum vitae pharetra ante. In volutpat id mauris ut fringilla. Ut porta consequat mattis. Sed facilisis, nunc nec semper lacinia, sem est aliquam arcu, vitae scelerisque nisi tellus vitae magna. Vestibulum vehicula ac elit at placerat. In ac varius lectus, accumsan rutrum neque. Cras ultrices sem tempor nibh maximus sollicitudin.</p>\r\n', 2, 1, '2018-05-28 23:25:41');

-- --------------------------------------------------------

--
-- Estrutura para tabela `topics`
--

CREATE TABLE `topics` (
  `id` int(11) UNSIGNED NOT NULL,
  `creation_date` datetime NOT NULL,
  `content` varchar(10000) DEFAULT NULL,
  `title` varchar(256) NOT NULL,
  `matter_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `topics`
--

INSERT INTO `topics` (`id`, `creation_date`, `content`, `title`, `matter_id`, `user_id`) VALUES
(6, '2018-02-20 14:29:55', '<p>O&nbsp;<strong><a href=\"https://www.diolinux.com.br/search/label/Ubuntu\" target=\"_blank\">Ubuntu</a></strong>&nbsp;&eacute; um projeto amplo e existem v&aacute;rias formas diferentes de se utilizar o sistema. Dentre as chamadas &quot;flavors&quot;, ou &quot;sabores&quot;, temos as vers&otilde;es com interfaces diferentes, como o&nbsp;<strong><a href=\"https://www.diolinux.com.br/search/label/xubuntu\" target=\"_blank\">Xubuntu</a></strong>&nbsp;(Ubuntu+XFCE),&nbsp;<strong><a href=\"https://www.diolinux.com.br/search/label/kubuntu\" target=\"_blank\">Kubuntu</a></strong>&nbsp;(Ubuntu+KDE) e assim por diante, mas existe uma vari&aacute;vel que agora far&aacute; parte do instalador padr&atilde;o do Ubuntu 18.04 LTS que se chama &quot;<strong>Ubuntu Minimal</strong>&quot;.</p>\r\n\r\n<p><a href=\"https://1.bp.blogspot.com/-2KcVaTiWcAE/WogNxKNvwAI/AAAAAAAAm9g/ncxaRABtJs4_Gd7GJohP8LkgOnrQ1IeXwCLcBGAs/s1600/UBUNTU%2B1804%2BMINIMAL%2BINSTALLER.jpg\"><img alt=\"Ubuntu 18.04 LTS - Minimal Installation\" src=\"https://1.bp.blogspot.com/-2KcVaTiWcAE/WogNxKNvwAI/AAAAAAAAm9g/ncxaRABtJs4_Gd7GJohP8LkgOnrQ1IeXwCLcBGAs/s640/UBUNTU%2B1804%2BMINIMAL%2BINSTALLER.jpg\" /></a></p>\r\n\r\n<p>Com a aproxima&ccedil;&atilde;o do lan&ccedil;amento da nova LTS do Ubuntu (em Abril) a cada dia mais novidades s&atilde;o publicadas. Ontem tivemos o an&uacute;ncio de coleta de informa&ccedil;&otilde;es de hardware e pacotes dos usu&aacute;rios com a finalidade de melhorar o processo de desenvolvimento do sistema, semelhante ao que o Debian j&aacute; faz h&aacute; alguns anos, e que&nbsp;<strong><a href=\"https://www.diolinux.com.br/2018/02/ubuntu-1804-coleta-de-dados.html\" target=\"_blank\">voc&ecirc; pode ler mais neste artigo</a></strong>. Hoje temos mais uma novidade interessante e que a aproxima mais uma vez o Ubuntu do &quot;jeito Debian de ser&quot;.</p>\r\n', 'Instalação Ubuntu 18.04 LTS', 1, 2),
(8, '2018-02-24 14:50:14', '<p>Na&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Programa%C3%A7%C3%A3o\">programa&ccedil;&atilde;o</a>, uma&nbsp;<strong>vari&aacute;vel</strong>&nbsp;&eacute; um objeto (uma posi&ccedil;&atilde;o, frequentemente localizada na&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Mem%C3%B3ria_(computador)\">mem&oacute;ria</a>) capaz de reter e representar um valor ou express&atilde;o. Enquanto as vari&aacute;veis s&oacute; &quot;existem&quot; em&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Tempo_de_execu%C3%A7%C3%A3o\">tempo de execu&ccedil;&atilde;o</a>, elas s&atilde;o associadas a &quot;nomes&quot;, chamados&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Identificador\">identificadores</a>, durante o&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Tempo_de_compila%C3%A7%C3%A3o\">tempo de desenvolvimento</a>.</p>\r\n\r\n<p>Quando nos referimos &agrave; vari&aacute;vel, do ponto de vista da programa&ccedil;&atilde;o de computadores, estamos tratando de uma &ldquo;regi&atilde;o de mem&oacute;ria (do computador) previamente identificada cuja finalidade &eacute; armazenar os dados ou informa&ccedil;&otilde;es de um programa por um determinado espa&ccedil;o de tempo&rdquo;. A mem&oacute;ria do computador se organiza tal qual um arm&aacute;rio com v&aacute;rias divis&otilde;es. Sendo cada divis&atilde;o identificada por um endere&ccedil;o diferente em uma linguagem que o computador entende.</p>\r\n\r\n<p>O computador armazena os dados nessas divis&otilde;es, sendo que em cada divis&atilde;o s&oacute; &eacute; poss&iacute;vel armazenar um dado e toda vez que o computador armazenar um dado em uma dessas divis&otilde;es, o dado que antes estava armazenado &eacute; eliminado. O conte&uacute;do pode ser alterado, mas somente um dado por vez pode ser armazenado naquela divis&atilde;o.</p>\r\n\r\n<p>O computador identifica cada divis&atilde;o por interm&eacute;dio de um endere&ccedil;o no&nbsp;<a href=\"https://pt.wikipedia.org/wiki/Sistema_hexadecimal\">formato hexadecimal</a>, e as linguagens de programa&ccedil;&atilde;o permitem nomear cada endere&ccedil;o ou posi&ccedil;&atilde;o de mem&oacute;ria, facilitando a refer&ecirc;ncia a um endere&ccedil;o de mem&oacute;ria. Uma vari&aacute;vel &eacute; composta por dois elementos b&aacute;sicos: o conte&uacute;do,o valor da vari&aacute;vel e identificador, um nome dado &agrave; vari&aacute;vel para possibilitar sua utiliza&ccedil;&atilde;o.</p>\r\n', 'Variáveis', 1, 2),
(9, '2018-05-11 12:30:50', '<p>asdjashd</p>\r\n', 'Está funcionando', 1, 2),
(10, '2018-06-19 13:05:14', '<p>Este &eacute; o primeiro aviso</p>\r\n', 'O primeiro aviso', 1, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `creation_date` datetime NOT NULL,
  `name` varchar(256) NOT NULL,
  `password` varchar(64) NOT NULL,
  `register_code` varchar(256) DEFAULT NULL,
  `role` int(1) NOT NULL,
  `user_name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `users`
--

INSERT INTO `users` (`id`, `creation_date`, `name`, `password`, `register_code`, `role`, `user_name`) VALUES
(1, '2018-01-01 00:32:18', 'Administrador', '5f4dcc3b5aa765d61d8327deb882cf99', 'admin001', 2, 'administrador@email.com'),
(2, '2018-02-18 16:55:27', 'Professor', '5f4dcc3b5aa765d61d8327deb882cf99', 'professor', 1, 'professor@email.com'),
(3, '2018-04-11 09:11:21', 'Aluno', '5f4dcc3b5aa765d61d8327deb882cf99', 'aluno', 0, 'aluno@email.com');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_attachments_users` (`user_id`),
  ADD KEY `FK_attachments_topics` (`topic_id`) USING BTREE;

--
-- Índices de tabela `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_courses_users` (`user_id`);

--
-- Índices de tabela `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_lessons_topics` (`topic_id`),
  ADD KEY `FK_lessons_users` (`user_id`);

--
-- Índices de tabela `matters`
--
ALTER TABLE `matters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_matters_courses` (`course_id`),
  ADD KEY `FK_matters_users` (`user_id`);

--
-- Índices de tabela `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_notices_matters` (`matter_id`),
  ADD KEY `FK_notices_users` (`user_id`);

--
-- Índices de tabela `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_threads_users` (`user_id`),
  ADD KEY `FK_threads_matters` (`matter_id`);

--
-- Índices de tabela `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_topics_matters` (`matter_id`),
  ADD KEY `FK_topics_users` (`user_id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `matters`
--
ALTER TABLE `matters`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `threads`
--
ALTER TABLE `threads`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `attachments`
--
ALTER TABLE `attachments`
  ADD CONSTRAINT `FK_attachments_topics` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`),
  ADD CONSTRAINT `FK_attachments_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Restrições para tabelas `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `FK_courses_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Restrições para tabelas `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `FK_lessons_topics` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`),
  ADD CONSTRAINT `FK_lessons_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Restrições para tabelas `matters`
--
ALTER TABLE `matters`
  ADD CONSTRAINT `FK_matters_courses` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `FK_matters_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Restrições para tabelas `notices`
--
ALTER TABLE `notices`
  ADD CONSTRAINT `FK_notices_matters` FOREIGN KEY (`matter_id`) REFERENCES `matters` (`id`),
  ADD CONSTRAINT `FK_notices_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Restrições para tabelas `threads`
--
ALTER TABLE `threads`
  ADD CONSTRAINT `FK_threads_matters` FOREIGN KEY (`matter_id`) REFERENCES `matters` (`id`),
  ADD CONSTRAINT `FK_threads_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Restrições para tabelas `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `FK_topics_matters` FOREIGN KEY (`matter_id`) REFERENCES `matters` (`id`),
  ADD CONSTRAINT `FK_topics_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
