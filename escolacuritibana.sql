-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 28-Nov-2016 às 11:48
-- Versão do servidor: 5.7.11-log
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `escolacuritibana`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `Id` int(11) NOT NULL,
  `Categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`Id`, `Categoria`) VALUES
(4, 'Gastronomia'),
(5, 'Computacao'),
(6, 'Fitness'),
(7, 'Fotografia'),
(8, 'Direito'),
(9, 'Arquitetura');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE `contato` (
  `Id` int(11) NOT NULL,
  `Texto` text NOT NULL,
  `Endereço` varchar(500) NOT NULL,
  `Telefone` varchar(20) NOT NULL,
  `Website` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `contato`
--

INSERT INTO `contato` (`Id`, `Texto`, `Endereço`, `Telefone`, `Website`, `Email`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ', 'Rua do aprendizado, 1128', '(41) 3232-5856', 'www.escolacuritibana.com.br', 'escolacuritibana@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE `cursos` (
  `Id` int(11) NOT NULL,
  `Curso` varchar(30) NOT NULL,
  `Duracao` int(11) NOT NULL,
  `Preco` float NOT NULL,
  `Local` varchar(30) NOT NULL,
  `CategoriaId` int(11) NOT NULL,
  `Inicio` date NOT NULL,
  `Texto` varchar(400) NOT NULL,
  `Foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`Id`, `Curso`, `Duracao`, `Preco`, `Local`, `CategoriaId`, `Inicio`, `Texto`, `Foto`) VALUES
(19, 'Direito BÃ¡sico', 12, 1500, 'Curitiba, PR', 8, '2016-11-27', '																																																																																																																								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet quod nisi quisquam modi dolore, dicta obcaecati architecto quidem ullam quia.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Quo est itaque vero porro quasi illo ex consequuntur ad animi commodi, ipsam p', '8e2e33bc8a07fd75da3b1356bc1f3ba0.jpeg'),
(20, 'Culinaria', 16, 1000, 'Curitiba, PR', 4, '2017-12-30', '																				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet quod nisi quisquam modi dolore, dicta obcaecati architecto quidem ullam quia.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Quo est itaque vero porro quasi illo ex consequuntur ad animi commodi, ipsam provident voluptas vel adipisci. Minima repellendus vel est, sequi labore quo ipsa voluptatem officii', 'dc64e6212ca3b95a93a7cc7ce9824949.gif'),
(21, 'Instrutor de Academia', 8, 500, 'Curitiba, PR', 6, '2017-11-27', '																				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet quod nisi quisquam modi dolore, dicta obcaecati architecto quidem ullam quia.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Quo est itaque vero porro quasi illo ex consequuntur ad animi commodi, ipsam provident voluptas vel adipisci. Minima repellendus vel est, sequi labore quo ipsa voluptatem officii', '64f7b2280188b61ccc19cf75ec9a0de8.jpg'),
(22, 'Fotagrafia BÃ¡sico', 4, 800, 'Curitiba, PR', 7, '2017-01-05', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet quod nisi quisquam modi dolore, dicta obcaecati architecto quidem ullam quia.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Quo est itaque vero porro quasi illo ex consequuntur ad animi commodi, ipsam provident voluptas vel adipisci. Minima repellendus vel est, sequi labore quo ipsa voluptatem officiis ex fuga nemo quas. E', '6cf1ea10e0067fbe294f3d73cfca55a7.jpg'),
(23, 'Arquiteto I', 24, 3500, 'Curitiba, PR', 9, '2017-01-05', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet quod nisi quisquam modi dolore, dicta obcaecati architecto quidem ullam quia.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Quo est itaque vero porro quasi illo ex consequuntur ad animi commodi, ipsam provident voluptas vel adipisci. Minima repellendus vel est, sequi labore quo ipsa voluptatem officiis ex fuga nemo quas.', 'c2a43b07979e3386db637c8df6ef0cf0.jpg'),
(24, 'ProgramaÃ§Ã£o I', 8, 1000, 'Curitiba, PR', 5, '2017-01-05', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo est itaque vero porro quasi illo ex consequuntur ad animi commodi, ipsam provident voluptas vel adipisci. Minima repellendus vel est, sequi labore quo ipsa voluptatem officiis ex fuga nemo quas. Eligendi inventore ducimus omnis, maxime, alias accusantium similique minus! Labore facilis qui, sunt, ipsam consectetur minus sapiente saepe n', '8cc0dd959860cf05f0b8cc78d0f3d30b.jpg'),
(25, 'ProgramaÃ§Ã£o II', 10, 1200, 'Curitiba, PR', 5, '2017-12-25', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo est itaque vero porro quasi illo ex consequuntur ad animi commodi, ipsam provident voluptas vel adipisci. Minima repellendus vel est, sequi labore quo ipsa voluptatem officiis ex fuga nemo quas. Eligendi inventore ducimus omnis, maxime, alias accusantium similique minus! Labore facilis qui, sunt, ipsam consectetur minus sapiente saepe n', 'c3ec2cce6eced273fa6b6e84ab4f6eb1.jpg'),
(26, 'ProgramaÃ§Ã£o III', 16, 2000, 'Curitiba, PR', 5, '2017-01-05', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo est itaque vero porro quasi illo ex consequuntur ad animi commodi, ipsam provident voluptas vel adipisci. Minima repellendus vel est, sequi labore quo ipsa voluptatem officiis ex fuga nemo quas. Eligendi inventore ducimus omnis, maxime, alias accusantium similique minus! Labore facilis qui, sunt, ipsam consectetur minus sapiente saepe n', 'fc09e7ecba42a3593ef56e4a0792893f.jpg'),
(27, 'Chefe de Cozinha', 20, 4000, 'Curitiba, PR', 4, '2017-11-27', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo est itaque vero porro quasi illo ex consequuntur ad animi commodi, ipsam provident voluptas vel adipisci. Minima repellendus vel est, sequi labore quo ipsa voluptatem officiis ex fuga nemo quas. Eligendi inventore ducimus omnis, maxime, alias accusantium similique minus! Labore facilis qui, sunt, ipsam consectetur minus sapiente saepe n', 'b626efe68ec20475b0fe3d4723fd2572.gif'),
(28, 'Arquiteto II', 24, 2000, 'Curitiba, PR', 9, '2017-11-27', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo est itaque vero porro quasi illo ex consequuntur ad animi commodi, ipsam provident voluptas vel adipisci. Minima repellendus vel est, sequi labore quo ipsa voluptatem officiis ex fuga nemo quas. Eligendi inventore ducimus omnis, maxime, alias accusantium similique minus! Labore facilis qui, sunt, ipsam consectetur minus sapiente saepe n', 'ef28f5b2766cbdff415ad273b5193e08.jpg'),
(29, 'Fotografia Avançado', 12, 2000, 'Curitiba, PR', 7, '2017-11-27', '										Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus non dolorem excepturi libero itaque sint labore similique maxime natus eum														', '02e2d9fe7ecdaa800ecf934cad99bc93.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `Id` int(11) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `Senha` varchar(32) NOT NULL,
  `Nivel` int(1) NOT NULL,
  `Nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`Id`, `Email`, `Senha`, `Nivel`, `Nome`) VALUES
(3, 'ViniciusCruz', '827ccb0eea8a706c4c34a16891f84e7b', 1, 'Vinicius'),
(5, 'vini4842', '827ccb0eea8a706c4c34a16891f84e7b', 0, 'Vinicius Cruz'),
(6, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 0, 'Admin'),
(7, 'vinicius@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 0, 'Vinicius Cruz');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `contato`
--
ALTER TABLE `contato`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cursos`
--
ALTER TABLE `cursos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
