-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28-Jun-2018 às 20:01
-- Versão do servidor: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xecsul_lojaonline`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `Tipo` varchar(15) NOT NULL,
  `N_serie` bigint(15) NOT NULL,
  `Modelo` varchar(30) NOT NULL,
  `Velocidade` varchar(20) NOT NULL,
  `Vol_MedImp` int(11) NOT NULL,
  `Qualidade` varchar(20) NOT NULL,
  `Formato_Max` varchar(20) NOT NULL,
  `Gramagem_Max` varchar(10) NOT NULL,
  `Duplex` varchar(5) NOT NULL,
  `Capacidade` int(6) NOT NULL,
  `Bandejas` int(3) NOT NULL,
  `Fax` varchar(5) NOT NULL,
  `Cores` varchar(5) NOT NULL,
  `Preto_Branco` varchar(5) NOT NULL,
  `Preco` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`Tipo`, `N_serie`, `Modelo`, `Velocidade`, `Vol_MedImp`, `Qualidade`, `Formato_Max`, `Gramagem_Max`, `Duplex`, `Capacidade`, `Bandejas`, `Fax`, `Cores`, `Preto_Branco`, `Preco`) VALUES
('multifuncoes', 0, 'WorkCentre6655', '35ppm', 100000, '2400x600dpi', '216x356mm', '220g', 'Sim', 1250, 3, 'Sim', 'Sim', 'Sim', 1200),
('multifuncoes', 1, 'WorkCentre7225', '25ppm', 60000, '2400x600dpi', '297x420mm', '250g', 'Sim', 2080, 4, 'NÃ£o', 'Sim', 'Sim', 2600),
('multifuncoes', 3, 'WorkCentre7220', '20ppm', 50000, '2400x600dpi', '297x420mm', '250g', 'Sim', 2080, 4, 'NÃ£o', 'Sim', 'Sim', 2600),
('multifuncoes', 4, 'WorkCentre6027', '18ppm', 30000, '1200x2400dpi', '216x356mm', '163g', 'Sim', 450, 3, 'Sim', 'Sim', 'Sim', 300),
('impressora', 5, 'Phaser7800', '45ppm', 225000, '2400x1200dpi', '320x1219mm', '350g', 'Sim', 620, 2, 'NÃ£o', 'Sim', 'Sim', 960),
('multifuncoes', 6, 'WorkCentre7830', '30ppm', 90000, '2400x1200dpi', '297x420mm', '300g', 'Sim', 2180, 4, 'Sim', 'Sim', 'Sim', 3100),
('multifuncoes', 7, 'WorkCentre3655', '45ppm', 150000, '1200x1200dpi', '216x356mm', '216g', 'Sim', 2350, 4, 'Sim', 'NÃ£o', 'Sim', 200),
('multifuncoes', 8, 'WorkCentre3325', '31ppm', 50000, '1200x1200', '216x356mm', '220g', 'NÃ£o', 820, 3, 'Sim', 'NÃ£o', 'Sim', 115),
('multifuncoes', 9, 'WorkCentre6605', '35ppm', 80000, '600x600x4dpi', '216x356mm', '220g', 'Sim', 1250, 3, 'Sim', 'Sim', 'Sim', 600),
('multifuncoes', 10, 'WorkCentre7970', '70ppm', 300000, '2400x1200dpi', '320x483mm', '300g', 'Sim', 5140, 6, 'Sim', 'Sim', 'Sim', 0),
('multifuncoes', 11, 'DocuColour560', '65ppm', 300000, '2400x2400dpi', '330x488mm', '300g', 'Sim', 7260, 5, 'Sim', 'Sim', 'Sim', 0),
('multifuncoes', 14, 'ColorQube9301', '95ppm', 150000, '600x600dpi', '320x457mm', '220g', 'Sim', 7300, 5, 'Sim', 'Sim', 'Sim', 0),
('multifuncoes', 15, 'WorkCentre7655', '55ppm', 200000, '2400x2400dpi', '304,8x482,6mm', '300g', 'Sim', 5260, 5, 'Sim', 'Sim', 'Sim', 2613),
('multifuncoes', 16, 'WorkCentre7755', '55ppm', 200000, '2400x2400dpi', '320x450mm', '300g', 'Sim', 5260, 6, 'Sim', 'Sim', 'Sim', 2613),
('multifuncoes', 2147483647, 'ColorQube9201', '60ppm', 150000, '600x600dpi', '320x450mm', '220g', 'Sim', 7300, 6, 'Sim', 'Sim', 'Sim', 0),
('multifuncoes', 3310952620, 'WorkCentre7132', '32ppm', 100000, '1200x600dpi', '139.7x182mm', '216g', 'Sim', 600, 4, 'Sim', 'Sim', 'Sim', 1900),
('multifunçoes', 3312621079, 'WorkCentre7232', '32ppm', 100000, '600x600x4bitsdpi', '297x420mm', '216g', 'Sim', 4720, 4, 'Sim', 'Sim', 'Sim', 1900),
('multifunçoes', 3312710586, 'WorkCentre7232', '32ppm', 100000, '600x600x4bitsdpi', '297x420mm', '216g', 'Sim', 4720, 4, 'Sim', 'Sim', 'Sim', 1900),
('multifunçoes', 3312756500, 'WorkCentre7232', '32ppm', 100000, '600x600x4bitsdpi', '297x420mm', '216g', 'Sim', 4720, 4, 'Sim', 'Sim', 'Sim', 1900),
('multifunçoes', 3312914556, 'WorkCentre7232', '32ppm', 100000, '600x600x4bitsdpi', '297x420mm', '216g', 'Sim', 4720, 4, 'Sim', 'Sim', 'Sim', 1900),
('multifunçoes', 3312916389, 'WorkCentre7232', '32ppm', 100000, '600x600x4bitsdpi', '297x420mm', '216g', 'Sim', 4720, 4, 'Sim', 'Sim', 'Sim', 1900),
('multifuncoes', 3312917580, 'WorkCentre7232', '32ppm', 100000, '600x600x4bitsdpi', '297x420mm', '216g', 'Sim', 4720, 4, 'Sim', 'Sim', 'Sim', 1900),
('multifunçoes', 3312925221, 'WorkCentre7232', '32ppm', 100000, '600x600x4bitsdpi', '297x420mm', '216g', 'Sim', 4720, 4, 'Sim', 'Sim', 'Sim', 1900),
('multifunçoes', 3312942126, 'WorkCentre7232', '32ppm', 100000, '600x600x4bitsdpi', '297x420mm', '216g', 'Sim', 4720, 4, 'Sim', 'Sim', 'Sim', 1900),
('multifunçoes', 3312976314, 'WorkCentre7232', '32ppm', 100000, '600x600x4bitsdpi', '297x420mm', '216g', 'Sim', 4720, 4, 'Sim', 'Sim', 'Sim', 1900),
('multifunçoes', 3312986042, 'WorkCentre7232', '32ppm', 100000, '600x600x4bitsdpi', '297x420mm', '216g', 'Sim', 4720, 4, 'Sim', 'Sim', 'Sim', 1900),
('multifunçoes', 3318508193, 'WorkCentre7232', '32ppm', 100000, '600x600x4bitsdpi', '297x420mm', '220g', 'Sim', 4720, 4, 'Sim', 'Sim', 'Sim', 1900),
('multifunçoes', 3318516994, 'WorkCentre7242', '42ppm', 100000, '600x600x4bitsdpi', '297x420mm', '216g', 'Sim', 4720, 4, 'Sim', 'Sim', 'Sim', 1900),
('multifuncoes', 3320035189, 'WorkCentre7120', '20ppm', 80000, '600x600x4 dpi', '297x432mm', '256g', 'Sim', 2130, 4, 'Sim', 'Sim', 'Sim', 2600);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `Nome` varchar(20) NOT NULL,
  `Apelido` varchar(20) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Pass` varchar(30) NOT NULL,
  `Country` varchar(20) NOT NULL,
  `Cargo` varchar(15) NOT NULL DEFAULT 'Cliente',
  `Morada` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`Nome`, `Apelido`, `Email`, `Pass`, `Country`, `Cargo`, `Morada`) VALUES
('adm', 'laaah', 'adm@xecsul.pt', 'xecsul', 'Bahamas', 'Admin', NULL),
('Jonas', 'Viegas', 'jonas@xecsul.pt', 'Eduardoed22', 'Portugal', 'Cliente', NULL),
('Marisa', 'Saias', 'msaias@xecsul.pt', 'XecM@risa', 'Portugal', '', NULL),
('Ana Teixeira Da Silv', '123', 'direcao@ael.edu.pt', '123', 'Portugal', 'Cliente', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`N_serie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
