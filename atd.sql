-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 16/01/2018 às 00:05
-- Versão do servidor: 5.7.20-0ubuntu0.16.04.1
-- Versão do PHP: 7.0.27-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `atendimento`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `atd`
--

CREATE TABLE `atd` (
  `id_atd` int(11) NOT NULL,
  `prot_atd` bigint(20) NOT NULL,
  `nome_cliente` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefone_cliente` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notas` text COLLATE utf8_unicode_ci,
  `id_tecnologia` int(11) NOT NULL,
  `id_bairro` int(11) NOT NULL,
  `id_cidade` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `id_problema` int(11) NOT NULL,
  `id_radios` int(11) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `atd`
--

INSERT INTO `atd` (`id_atd`, `prot_atd`, `nome_cliente`, `telefone_cliente`, `notas`, `id_tecnologia`, `id_bairro`, `id_cidade`, `id_users`, `id_status`, `id_problema`, `id_radios`, `data`, `hora`) VALUES
(1, 180101070031, 'Wulf Erich Hackler', NULL, 'Alteração de canal e de DNS', 1, 68, 4, 5, 1, 13, 1, '2018-01-01', '07:00:21'),
(2, 180101100155, 'Davi da Costa Domingos', NULL, 'OUTROS', 2, 84, 4, 5, 11, 13, 26, '2018-01-01', '10:01:44'),
(3, 180101104043, 'Elivelton Alves de Sousa', NULL, 'OUTROS', 2, 77, 4, 5, 11, 13, 26, '2018-01-01', '10:40:40'),
(4, 180101114534, 'Beatriz Daniel Gomes da Silva', NULL, 'OUTROS', 2, 86, 4, 5, 11, 13, 26, '2018-01-01', '11:45:36'),
(5, 180102063014, 'Gilson José da Silva', NULL, 'OUTROS', 2, 95, 13, 5, 11, 13, 26, '2018-01-02', '06:30:38'),
(6, 180102070048, 'José Silva dos Santos', NULL, 'Transferir ligação para o Financeiro', 1, 95, 13, 5, 1, 5, 1, '2018-01-02', '07:00:42'),
(7, 180102072010, 'Valdenir Costa Coelho', NULL, 'ONU piscando vermelho', 1, 18, 5, 5, 12, 13, 1, '2018-01-02', '07:20:29'),
(8, 180102073025, 'Washington Luiz Barroso', NULL, 'OUTROS', 2, 61, 4, 5, 11, 13, 26, '2018-01-02', '07:30:32'),
(9, 180102094325, 'Marcos Fábio Loureiro da Rocha', NULL, 'Transferir ligação para o Financeiro', 1, 18, 5, 5, 1, 5, 1, '2018-01-02', '09:43:25'),
(10, 180102100225, 'Lucia André Silvestre', NULL, 'Desligar/ligar roteador e ONU', 1, 83, 4, 5, 1, 13, 1, '2018-01-02', '10:02:46'),
(11, 180102110214, 'Rhodger Fernandes Vasconcelos Goes', NULL, 'Reiniciar roteador', 1, 89, 8, 5, 1, 8, 1, '2018-01-02', '11:02:50'),
(12, 180102112151, 'Carlos Eduardo Santos Lessa', NULL, 'OUTROS', 1, 89, 8, 5, 1, 13, 1, '2018-01-02', '11:21:11'),
(13, 180102113536, 'Mauro Viana do Nascimento Filho', NULL, 'Transferir ligação para o Financeiro', 1, 0, 0, 5, 1, 5, 1, '2018-01-02', '11:35:54'),
(14, 180102114512, 'Jacqueline Araújo da Silva Matos', NULL, 'Reconfigurar roteador', 1, 35, 4, 5, 1, 13, 1, '2018-01-02', '11:45:53'),
(15, 180103073247, 'Cinthia Gomes de Carvalho', NULL, 'Reconfigurar roteador', 1, 64, 4, 5, 1, 8, 1, '2018-01-03', '07:32:15'),
(16, 180103075852, 'Colégio Moreira Xavier', NULL, 'Transferir ligação para o Financeiro', 1, 19, 4, 5, 3, 13, 1, '2018-01-03', '07:58:35'),
(17, 180103082237, 'Protecta Saúde Ambiental Ltda', NULL, 'OUTROS', 1, 63, 8, 5, 1, 14, 1, '2018-01-03', '08:22:29'),
(18, 180103082324, 'Geilson de Sousa Xavier', NULL, 'Aguardando Ordem de Serviço', 1, 37, 4, 5, 1, 3, 1, '2018-01-03', '08:23:43'),
(19, 180103082732, 'Cleane da Silva Barbosa', NULL, 'OUTROS', 2, 67, 4, 5, 11, 13, 12, '2018-01-03', '08:27:45'),
(20, 180103083124, 'Chistian Alencar Lourenço', NULL, 'OUTROS', 2, 35, 4, 5, 1, 13, 12, '2018-01-03', '08:31:32'),
(21, 180103083425, 'Márcia Lima Dantas', NULL, 'OUTROS', 2, 35, 4, 5, 11, 13, 12, '2018-01-03', '08:34:55'),
(22, 180103083739, 'Ana Beatriz Serafim Silva', NULL, 'OUTROS', 2, 88, 4, 5, 1, 5, 24, '2018-01-03', '08:37:29'),
(23, 180103085051, 'Aleksandro Pereira Silva', NULL, 'Alteração de canal', 1, 34, 8, 5, 1, 13, 1, '2018-01-03', '08:50:31'),
(24, 180103085430, 'Marilane Torres da Silva', NULL, 'Desligar/ligar roteador e ONU', 1, 45, 4, 5, 1, 13, 1, '2018-01-03', '08:54:22'),
(25, 180103091124, 'Eberli Vieira Alves', NULL, 'Desligar/Ligar Rádio', 2, 77, 4, 5, 1, 13, 21, '2018-01-03', '09:11:25'),
(26, 180103092851, 'Aila Maria Costa', NULL, 'Desligar/ligar roteador e ONU', 1, 83, 4, 5, 1, 13, 1, '2018-01-03', '09:28:41'),
(27, 180103100651, 'Antônia Rosinelia Sousa Sena', NULL, 'Aguardando Ordem de Serviço', 1, 19, 4, 5, 1, 3, 1, '2018-01-03', '10:06:39'),
(28, 180103104320, 'Pedro Paulo Câmara de Freitas', NULL, 'OUTROS', 1, 33, 4, 5, 9, 13, 1, '2018-01-03', '10:43:17'),
(29, 180103105714, 'Maria Eunice da Silva Lima', NULL, 'Reiniciar roteador', 2, 37, 4, 5, 1, 13, 2, '2018-01-03', '10:57:52'),
(30, 180103110731, 'Maria Alda da Silva Costa', NULL, 'Senha do wifi alterada', 1, 45, 4, 5, 1, 18, 1, '2018-01-03', '11:07:13'),
(31, 180103111713, 'José Fábio Alves da Silva', NULL, 'Reconfigurar roteador', 1, 61, 4, 5, 1, 13, 1, '2018-01-03', '11:17:24'),
(32, 180103114119, 'Camila Avelino de Andrade', NULL, 'Comando reset na ONU', 1, 19, 4, 5, 4, 13, 1, '2018-01-03', '11:41:35'),
(33, 180103114632, 'Valdenio Barros de Oliveira 1° Ponto', NULL, 'Reconfigurar roteador', 1, 45, 4, 5, 1, 13, 1, '2018-01-03', '11:46:49'),
(34, 180104062018, 'Lucivania da Silva', NULL, 'Desligar/ligar roteador e ONU', 1, 45, 4, 5, 1, 13, 1, '2018-01-04', '06:20:18'),
(35, 180104063155, 'João Bosco Paula Pereira', NULL, 'Desligar/ligar roteador e ONU', 1, 27, 4, 5, 1, 13, 1, '2018-01-04', '06:31:48'),
(36, 180104064558, 'Cintia Gomes de Carvalho', NULL, 'Desligar/ligar roteador e ONU', 1, 64, 4, 5, 1, 13, 1, '2018-01-04', '06:45:21'),
(37, 180104064955, 'Francisco Cleilson Gomes Meneses', NULL, 'Desligar/ligar roteador e ONU', 1, 49, 4, 5, 1, 13, 1, '2018-01-04', '06:49:52'),
(38, 180104070231, 'Antônio Linkon da Silva Camara', NULL, 'Desligar/ligar roteador e ONU', 1, 33, 4, 5, 1, 13, 1, '2018-01-04', '07:02:39'),
(39, 180104071639, 'Reginaldo Bezerra de Sousa', NULL, 'Desligar/ligar roteador e ONU', 1, 58, 4, 5, 1, 13, 1, '2018-01-04', '07:16:26'),
(40, 180104072510, 'George Antônio Ripardo', NULL, 'Desligar/ligar roteador e ONU', 1, 35, 4, 5, 1, 13, 1, '2018-01-04', '07:25:26'),
(41, 180104073159, 'Rogerio Ramos Ferreira', NULL, 'Desligar/ligar roteador e ONU', 1, 38, 4, 5, 1, 13, 1, '2018-01-04', '07:31:54'),
(42, 180104074013, 'PMA EMEF Escola José Almir', NULL, 'Desligar/ligar roteador e ONU', 1, 49, 4, 5, 1, 13, 1, '2018-01-04', '07:40:44'),
(43, 180104074121, 'Maria Lima Rocha', NULL, 'Desligar/ligar roteador e ONU', 1, 68, 4, 5, 1, 13, 1, '2018-01-04', '07:41:58'),
(44, 180104075333, 'Renário Freitas Silva', NULL, 'Desligar/ligar roteador e ONU', 1, 70, 4, 5, 1, 13, 1, '2018-01-04', '07:53:46'),
(45, 180104080253, 'Vicente Flávio de Castro', NULL, 'Reconfigurar roteador', 1, 38, 4, 5, 1, 13, 1, '2018-01-04', '08:02:57'),
(46, 180104081811, 'Arlindo Gomes da Costa', NULL, 'Desligar/ligar roteador e ONU', 1, 70, 4, 5, 1, 13, 1, '2018-01-04', '08:18:55'),
(47, 180104082014, 'Rafael Costa de Sousa', NULL, 'Desligar/ligar roteador e ONU', 1, 60, 4, 5, 1, 13, 1, '2018-01-04', '08:20:41'),
(48, 180104082930, 'Rafael Meneses Cavalcante', NULL, 'Transferir ligação para o Financeiro', 1, 19, 4, 5, 1, 20, 1, '2018-01-04', '08:29:49'),
(49, 180104083017, 'Ana Vanessa Costa Duarte', NULL, 'Desligar/ligar roteador e ONU', 1, 19, 4, 5, 1, 13, 1, '2018-01-04', '08:30:35'),
(50, 180104084118, 'Maria Socorro Nogueira da Silva', NULL, 'OUTROS', 2, 79, 11, 5, 11, 13, 22, '2018-01-04', '08:41:46'),
(51, 180104084238, 'Josileide Alves Viana', NULL, 'OUTROS', 2, 41, 4, 5, 11, 13, 22, '2018-01-04', '08:42:21'),
(52, 180104084745, 'FRancisco Celso Oliveira Mota', NULL, 'Desligar/ligar roteador e ONU', 1, 25, 4, 5, 1, 13, 1, '2018-01-04', '08:47:33'),
(53, 180104085334, 'Leidiane Sousa de Queiroz', NULL, 'OUTROS', 2, 77, 4, 5, 11, 13, 22, '2018-01-04', '08:53:29'),
(54, 180104085739, 'Morgania Misturine Chaves Araripe', NULL, 'Desligar/ligar roteador e ONU', 1, 21, 4, 5, 1, 13, 1, '2018-01-04', '08:57:45'),
(55, 180104085955, 'Vivian Matos Martins', NULL, 'Desligar/ligar roteador e ONU', 1, 68, 4, 5, 1, 13, 1, '2018-01-04', '08:59:41'),
(56, 180104090542, 'Márcio José Florencio da Silva 1° Ponto', NULL, 'Desligar/ligar roteador e ONU', 1, 35, 4, 5, 1, 13, 1, '2018-01-04', '09:05:18'),
(57, 180104092421, 'José Eurialo de Sousa Martins Carvalho', NULL, 'Comando reset na ONU', 1, 2, 4, 5, 1, 13, 1, '2018-01-04', '09:24:51'),
(58, 180104094224, 'Rosana de Oliveira Felipe', NULL, 'Senha do wifi alterada', 1, 1, 10, 5, 1, 18, 1, '2018-01-04', '09:42:15'),
(59, 180104094427, 'Joceli da Silva Cosme', NULL, 'Transferir ligação para o Financeiro', 2, 30, 4, 5, 1, 20, 11, '2018-01-04', '09:44:42'),
(60, 180104100817, 'Osvaldo Euclides de Araújo 1° Ponto', NULL, 'OUTROS', 2, 78, 4, 5, 11, 13, 22, '2018-01-04', '10:08:47'),
(61, 180104101925, 'Osvaldo Euclides de Araújo 2° Ponto', NULL, 'OUTROS', 2, 78, 4, 5, 11, 13, 22, '2018-01-04', '10:19:17'),
(62, 180104101937, 'Paulo Carlos do Nascimento Barbosa', NULL, 'Desligar/ligar roteador e ONU', 1, 35, 4, 5, 1, 13, 1, '2018-01-04', '10:19:50'),
(63, 180104102024, 'Paulo Guaraci Moraes Cardoso', NULL, 'Alteração de canal e de DNS', 1, 11, 4, 5, 1, 13, 1, '2018-01-04', '10:20:28'),
(64, 180104102040, 'David Emanuel da Silva', NULL, 'Desligar/ligar roteador e ONU', 1, 45, 4, 5, 1, 13, 1, '2018-01-04', '10:20:54'),
(65, 180104102222, 'Bianca Fonteles de Sousa Costa', NULL, 'Desligar/ligar roteador e ONU', 1, 19, 4, 5, 1, 13, 1, '2018-01-04', '10:22:27'),
(66, 180104102929, 'C Napoleão Bastos Tigre Me', NULL, 'Reiniciar rádio', 2, 87, 8, 5, 1, 13, 18, '2018-01-04', '10:29:43'),
(67, 180104104441, 'João Eduardo Pires de Sousa', NULL, 'Desligar/ligar roteador e ONU', 1, 19, 4, 5, 1, 13, 1, '2018-01-04', '10:44:26'),
(68, 180104104720, 'Associação Biblica Cultural de Fortaleza', NULL, 'Desligar/ligar roteador e ONU', 1, 19, 4, 5, 1, 13, 1, '2018-01-04', '10:47:35'),
(69, 180104105314, 'Marilane Torres da Silva', NULL, 'Resetar e reconfigurar roteador', 1, 45, 4, 5, 1, 13, 1, '2018-01-04', '10:53:38'),
(70, 180104110340, 'Joelma da Silva Santana', NULL, 'Senha do wifi alterada', 1, 25, 4, 5, 1, 18, 1, '2018-01-04', '11:03:42'),
(71, 180104111040, 'Ivone Vale de Sousa', NULL, 'Potência baixa', 1, 9, 8, 5, 12, 8, 1, '2018-01-04', '11:10:20'),
(72, 180104112622, 'Luis Tales da Silva', NULL, 'Desligar/ligar roteador e ONU', 1, 19, 4, 5, 1, 13, 1, '2018-01-04', '11:26:39'),
(73, 180104113642, 'Francisco Thalyson Carneiro Vasconcelos', NULL, 'Transferir ligação para o Financeiro', 1, 87, 8, 5, 1, 20, 1, '2018-01-04', '11:36:45'),
(74, 180104113654, 'Luciana Fonteneles Barros de Paula 2° Ponto', NULL, 'Alteração de canal e de DNS', 1, 20, 8, 5, 1, 8, 1, '2018-01-04', '11:36:18'),
(75, 180104115058, 'Carlos Edson Ferreira Gomes', NULL, 'Desligar/ligar roteador e ONU', 1, 19, 4, 5, 1, 13, 1, '2018-01-04', '11:50:18'),
(76, 180104115240, 'Sebastião Junior Oliveira dos Santos', NULL, 'Transferir ligação para o Financeiro', 1, 19, 4, 5, 1, 20, 1, '2018-01-04', '11:52:29'),
(77, 180104120454, 'Claudemir Pereira de Sousa', NULL, 'OUTROS', 2, 77, 4, 5, 11, 13, 22, '2018-01-04', '12:04:59'),
(78, 180105072936, 'Erleandia Rocha Teixeira', NULL, 'Desligar/ligar roteador e ONU', 1, 70, 4, 5, 1, 13, 1, '2018-01-05', '07:29:50'),
(79, 180105075347, 'Liss Daiane Lima Raulino', NULL, 'Problema no Roteador', 1, 23, 8, 5, 12, 13, 1, '2018-01-05', '07:53:53'),
(80, 180105085749, 'VC Batista Eireli', NULL, 'OUTROS', 1, 37, 4, 5, 9, 13, 1, '2018-01-05', '08:57:37'),
(81, 180105104529, 'Nutrientes Mede Distribuidora Ltda', NULL, 'Reiniciar rádio', 2, 92, 8, 5, 1, 13, 4, '2018-01-05', '10:45:52'),
(82, 180106070317, 'José Audebir Alves de Sousa', NULL, 'Não quis realizar os procedimentos', 1, 45, 4, 5, 12, 7, 1, '2018-01-06', '07:03:42'),
(83, 180106072631, 'Raiza Kelle de Almeida de Souza', NULL, 'Reconfigurar roteador', 1, 27, 4, 5, 1, 13, 1, '2018-01-06', '07:26:39'),
(84, 180106074649, 'Francisco Sérgio de Sousa Alves', NULL, 'Não sabe realizar os procedimentos', 1, 73, 4, 5, 12, 13, 1, '2018-01-06', '07:46:37'),
(85, 180106075833, 'Marcia Alves Marques', NULL, 'Alteração de canal e de DNS', 1, 56, 8, 5, 1, 8, 1, '2018-01-06', '07:58:45'),
(86, 180106081544, 'Derivania Costa da Silva', NULL, 'Aguardando Ordem de Serviço', 2, 84, 4, 5, 1, 3, 9, '2018-01-06', '08:15:48'),
(87, 180106081539, 'Ana Lucia Lourenço da Silva', NULL, 'Transferir ligação para o Financeiro', 1, 56, 8, 5, 1, 5, 1, '2018-01-06', '08:15:51'),
(88, 180106081634, 'Maria Iolanda da Silva', NULL, 'Aguardando Ordem de Serviço', 1, 37, 4, 5, 1, 3, 1, '2018-01-06', '08:16:40'),
(89, 180106083747, 'Retul Representações e Turismo', NULL, 'ONU piscando vermelho', 1, 38, 4, 5, 12, 13, 1, '2018-01-06', '08:37:58'),
(90, 180106085734, 'Emanuele Monteiro Coelho', NULL, 'Transferir ligação para Vendas', 1, 19, 4, 5, 1, 3, 1, '2018-01-06', '08:57:30'),
(91, 180106090026, 'Fabio Vieira da Silva', NULL, 'Reiniciar rádio', 2, 35, 4, 5, 1, 13, 12, '2018-01-06', '09:00:21'),
(92, 180106090641, 'Luiz Renan Nogueira da Silva', NULL, 'Alteração de canal e de DNS', 1, 3, 8, 5, 1, 8, 1, '2018-01-06', '09:06:56'),
(93, 180106092932, 'Francisco de Assis Gomes da Silva', NULL, 'Site survey', 2, 30, 4, 5, 1, 8, 11, '2018-01-06', '09:29:14'),
(94, 180106093443, 'João Alves da Silva Neto', NULL, 'Alteração de canal e de DNS', 1, 71, 3, 5, 1, 8, 1, '2018-01-06', '09:34:53'),
(95, 180106103035, 'Maria Leidedalva de Souza', NULL, 'Aguardando Ordem de Serviço', 1, 34, 8, 5, 1, 3, 1, '2018-01-06', '10:30:23'),
(96, 180106103144, 'Luis Henrique Rodrigues Barros', NULL, 'Aguardando Ordem de Serviço', 1, 56, 8, 5, 1, 3, 1, '2018-01-06', '10:31:43'),
(97, 180106103243, 'Maria Dalila Costa da Silva', NULL, 'OUTROS', 1, 73, 4, 5, 2, 13, 1, '2018-01-06', '10:32:58'),
(98, 180106103628, 'Carlos Magno da Silveira Toscano', NULL, 'Alteração de canal e de DNS', 1, 20, 8, 5, 1, 13, 1, '2018-01-06', '10:36:23'),
(99, 180106110314, 'Alex Jhon Gomes de Lima', NULL, 'Desconectar/conectar cabos de rede', 2, 8, 4, 5, 1, 13, 7, '2018-01-06', '11:03:18'),
(100, 180106110550, 'Wellington Sousa de Oliveira', NULL, 'Adicionar usuário PPPoE no roteador', 1, 34, 8, 5, 1, 13, 1, '2018-01-06', '11:05:21'),
(101, 180106112624, 'Josineudo Pereira Sousa', NULL, 'Resetar e reconfigurar roteador', 1, 21, 4, 5, 1, 13, 1, '2018-01-06', '11:26:19'),
(102, 180106115557, 'Avila Neves Correia', NULL, 'OUTROS', 1, 65, 4, 5, 9, 13, 1, '2018-01-06', '11:55:37'),
(103, 180108070655, 'Talis Silva Bernardo', NULL, 'Reconfigurar roteador', 1, 52, 8, 5, 1, 13, 1, '2018-01-08', '07:06:19'),
(104, 180108072555, 'Deividiane Ramos Bernardo', NULL, 'Reconfigurar roteador', 1, 52, 8, 5, 1, 13, 1, '2018-01-08', '07:25:46'),
(105, 180108074759, 'Manuel Geremias', NULL, 'Desligar/ligar roteador e ONU', 1, 0, 0, 5, 1, 8, 1, '2018-01-08', '07:47:26'),
(106, 180108075541, 'VC Batista Eireli', NULL, 'Reconfigurar roteador', 1, 37, 4, 5, 1, 13, 1, '2018-01-08', '07:55:22'),
(107, 180108081053, 'Luis Carlos Gomes da Silva', NULL, 'OUTROS', 1, 76, 8, 5, 1, 6, 1, '2018-01-08', '08:10:34'),
(108, 180108082535, 'Adriana Cavalcante de Sousa', NULL, 'Aguardando Ordem de Serviço', 1, 0, 0, 5, 1, 3, 1, '2018-01-08', '08:25:43'),
(109, 180108082837, 'Antônio Kaubi Lopes da Silva', NULL, 'Aguardando Ordem de Serviço', 1, 37, 4, 5, 1, 3, 1, '2018-01-08', '08:28:30'),
(110, 180108083349, 'José Edmilson da Silva', NULL, 'Comando reset na ONU', 1, 0, 0, 5, 1, 13, 1, '2018-01-08', '08:33:11'),
(111, 180108084526, 'Eryca Fernanda da Silva Fernandes', NULL, 'Reiniciar rádio', 2, 60, 4, 5, 1, 8, 2, '2018-01-08', '08:45:23'),
(112, 180108085517, 'Francicleide Santos de Oliveira', NULL, 'Transferir ligação para o Financeiro', 1, 1, 10, 5, 1, 20, 1, '2018-01-08', '08:55:20'),
(113, 180108090142, 'Antônio José do Nascimento', NULL, 'Processamento alto no servidor', 1, 56, 8, 5, 7, 13, 1, '2018-01-08', '09:01:29'),
(114, 180108092835, 'Tiago Melo Freire', NULL, 'Processamento alto no servidor', 1, 87, 8, 5, 7, 13, 1, '2018-01-08', '09:28:13'),
(115, 180108093012, 'Julia Guedes Jales de Carvalho 2° Ponto', NULL, 'Resetar e reconfigurar roteador', 1, 19, 4, 5, 1, 13, 1, '2018-01-08', '09:30:46'),
(116, 180108102448, 'Solar Soluções Administrativas Ltda', NULL, 'Feito o redirecionamento de portas', 1, 63, 8, 5, 1, 0, 1, '2018-01-08', '10:24:10'),
(117, 180108102813, 'Elegance Móveis', NULL, 'Feito o redirecionamento de portas', 1, 19, 4, 5, 1, 0, 1, '2018-01-08', '10:28:22'),
(118, 180108103659, 'Francileide Silva Souza', NULL, 'Reiniciar rádio', 2, 37, 4, 5, 1, 8, 10, '2018-01-08', '10:36:51'),
(119, 180108104623, 'José Maria Soares Junior', NULL, 'OUTROS', 1, 20, 8, 5, 12, 17, 1, '2018-01-08', '10:46:48'),
(120, 180108105546, 'Eliane Oliveira Batista', NULL, 'Reconfigurar roteador', 1, 44, 8, 5, 1, 13, 1, '2018-01-08', '10:55:34'),
(121, 180108110719, 'João Mota da Silva Silva', NULL, 'Transferir ligação para o Financeiro', 1, 0, 0, 5, 1, 5, 1, '2018-01-08', '11:07:39'),
(122, 180108110818, 'Valdete Silva de Sousa', NULL, 'Aguardando Ordem de Serviço', 2, 45, 4, 5, 1, 3, 16, '2018-01-08', '11:08:12'),
(123, 180108111412, 'Raileide Cupertino Ferreira', NULL, 'Desligar/ligar roteador e ONU', 1, 89, 8, 5, 1, 13, 1, '2018-01-08', '11:14:54'),
(124, 180108112412, 'Jayme Rodrigues dos Santos Neto', NULL, 'Transferir ligação para o Financeiro', 1, 89, 8, 5, 1, 5, 1, '2018-01-08', '11:24:31'),
(125, 180108113842, 'Janiele da Silva Santos', NULL, 'Transferir ligação para o Financeiro', 1, 19, 4, 5, 1, 5, 1, '2018-01-08', '11:38:42'),
(126, 180108115311, 'Carmosa da Silva Thomas', NULL, 'Reiniciar rádio', 2, 66, 4, 5, 1, 13, 7, '2018-01-08', '11:53:46'),
(127, 180109073758, 'Joicilene de Meneses Santos', NULL, 'Processamento alto no servidor', 1, 49, 4, 5, 7, 13, 1, '2018-01-09', '07:37:57'),
(128, 180109074551, 'Ednardo Oliveira Maciel', NULL, 'Processamento alto no servidor', 1, 45, 4, 5, 7, 13, 1, '2018-01-09', '07:45:20'),
(129, 180109074341, 'Maria Marileuza Lopes Silva', NULL, 'Problema na ONU', 1, 33, 4, 5, 12, 13, 1, '2018-01-09', '07:43:12'),
(130, 180109081128, 'Stone N Soul Marmores e Rochas', NULL, 'Transferir ligação para Vendas', 1, 82, 8, 5, 1, 3, 1, '2018-01-09', '08:11:44'),
(131, 180109085252, 'Aline Rocha Lopes Lemos', NULL, 'Reiniciar rádio', 2, 83, 4, 5, 1, 13, 23, '2018-01-09', '08:52:40'),
(132, 180109091239, 'Eldo Pereira Silva', NULL, 'Transferir ligação para o Financeiro', 1, 18, 5, 5, 1, 5, 1, '2018-01-09', '09:12:34'),
(133, 180109092050, 'Leidiana de Sousa Silva', NULL, 'OUTROS', 2, 23, 8, 5, 11, 13, 3, '2018-01-09', '09:20:18'),
(134, 180109103829, 'Claudio Alves Araújo', NULL, 'Aguardando Ordem de Serviço', 2, 0, 0, 5, 1, 3, 19, '2018-01-09', '10:38:59'),
(135, 180109110620, 'Francisco Wagner Oliveira da Silva 3° Ponto', NULL, 'Aguardando Ordem de Serviço', 1, 44, 8, 5, 1, 3, 1, '2018-01-09', '11:06:55'),
(136, 180109114640, 'Maria Aldaniza Silvestre Moura', NULL, 'Senha do wifi alterada', 1, 5, 8, 5, 1, 18, 1, '2018-01-09', '11:46:35'),
(137, 180110070347, 'Ravelly Abreu Feitoza', NULL, 'Site survey', 2, 23, 8, 5, 1, 13, 3, '2018-01-10', '07:03:38'),
(138, 180110083532, 'Metalúrgica Brasil Indústria Ltda', NULL, 'Transferir ligação para o Financeiro', 1, 9, 8, 5, 1, 5, 1, '2018-01-10', '08:35:57'),
(139, 180110084327, 'Cecília Maria de Melo', NULL, 'Senha do wifi alterada', 1, 69, 8, 5, 1, 18, 1, '2018-01-10', '08:43:40'),
(140, 180110085153, 'Stone N Soul Marmores e Rochas', NULL, 'Transferir ligação para Vendas', 1, 82, 8, 5, 1, 3, 1, '2018-01-10', '08:51:16'),
(141, 180110090230, 'Brena Keccy Lima Lopes', NULL, 'Transferir ligação para o Financeiro', 2, 0, 0, 5, 1, 5, 14, '2018-01-10', '09:02:53'),
(142, 180110090531, 'José Maria Soares Junior', NULL, 'Transferir ligação para Vendas', 1, 34, 8, 5, 1, 3, 1, '2018-01-10', '09:05:10'),
(143, 180110091024, 'Raimundo Pinto Carvalho', NULL, 'Desligar/ligar roteador e ONU', 1, 89, 8, 5, 1, 13, 1, '2018-01-10', '09:10:24'),
(144, 180110092057, 'Mardoni Sousa da Costa', NULL, 'Transferir ligação para o Financeiro', 1, 87, 8, 5, 1, 5, 1, '2018-01-10', '09:20:36'),
(145, 180110092729, 'Luana Virginia Lima da Silva', NULL, 'Resetar e reconfigurar roteador', 1, 1, 10, 5, 1, 13, 1, '2018-01-10', '09:27:54'),
(146, 180110101725, 'Maria Conceição Nunes Silva', NULL, 'Senha do wifi alterada', 1, 45, 4, 5, 1, 18, 1, '2018-01-10', '10:17:25'),
(147, 180110102035, 'Edna Maria Carvalho Solto Brasileiro', NULL, 'Processamento alto no servidor', 1, 19, 4, 5, 1, 13, 1, '2018-01-10', '10:20:13'),
(148, 180110105451, 'Maria Juliana Nunes de Almeida', NULL, 'Alteração de canal e de DNS', 1, 5, 8, 5, 1, 7, 1, '2018-01-10', '10:54:35'),
(149, 180110115838, 'João Victor Alves de Sousa', NULL, 'Alteração de canal e de DNS', 1, 23, 8, 5, 1, 13, 1, '2018-01-10', '11:58:54'),
(150, 180110115842, 'Francisco Victor de Sousa Barbosa', NULL, 'OUTROS', 2, 5, 8, 5, 11, 13, 3, '2018-01-10', '11:58:54'),
(151, 180111061815, 'Elizeu Albano da Silva', NULL, 'Comando reset na ONU', 1, 11, 4, 5, 1, 13, 1, '2018-01-11', '06:18:45'),
(152, 180111080031, 'Jackson de Freitas Barros', NULL, 'Problema no Roteador', 1, 19, 4, 5, 12, 7, 1, '2018-01-11', '08:00:34'),
(153, 180111081957, 'Ester Ferreira de Sousa', NULL, 'ONU piscando vermelho', 1, 2, 4, 5, 12, 13, 1, '2018-01-11', '08:19:23'),
(154, 180111084339, 'Alexandre Pereira Serpa', NULL, 'Desligar/ligar roteador e ONU', 1, 59, 10, 5, 1, 13, 1, '2018-01-11', '08:43:23'),
(155, 180111094153, 'Francisco Jonatha Sousa Pereira', NULL, 'Senha do wifi alterada', 1, 71, 3, 5, 1, 18, 1, '2018-01-11', '09:41:42'),
(156, 180111095739, 'Claudio Alves Araújo', NULL, 'Aguardando Ordem de Serviço', 2, 0, 0, 5, 1, 3, 19, '2018-01-11', '09:57:50'),
(157, 180111104132, 'Renata Felix Lima', NULL, 'Transferir ligação para o Financeiro', 1, 45, 4, 5, 1, 5, 1, '2018-01-11', '10:41:57'),
(158, 180111105039, 'TR Construtora', NULL, 'OUTROS', 2, 16, 4, 5, 10, 13, 7, '2018-01-11', '10:50:38'),
(159, 180111105838, 'Francisco Ernades Ferreira', NULL, 'Transferir ligação para o Financeiro', 1, 56, 8, 5, 1, 1, 1, '2018-01-11', '10:58:33'),
(160, 180111110146, 'João Eduardo Pires de Sousa 2° Ponto', NULL, 'ONU piscando vermelho', 1, 45, 4, 5, 12, 13, 1, '2018-01-11', '11:01:26'),
(161, 180111111435, 'Josenildo dos Santos Ribeiro', NULL, 'OUTROS', 2, 66, 4, 5, 10, 13, 21, '2018-01-11', '11:14:11'),
(162, 180111111823, 'Walnivia Assunção de Sousa', NULL, 'OUTROS', 2, 77, 4, 5, 10, 13, 21, '2018-01-11', '11:18:53'),
(163, 180111114325, 'Karla Nobre de Oliveira 2° Ponto', NULL, 'Alteração de canal e de DNS', 1, 73, 4, 5, 1, 13, 1, '2018-01-11', '11:43:33'),
(164, 180111114550, 'Karla Nobre de Oliveira 1° Ponto', NULL, 'Reiniciar rádio', 2, 73, 4, 5, 1, 13, 25, '2018-01-11', '11:45:56'),
(165, 180112074757, 'Quelilene Chagas Nascimento', NULL, 'ONU piscando vermelho', 1, 12, 10, 5, 12, 13, 1, '2018-01-12', '07:47:43'),
(166, 180112075533, 'Antônia Djailde da Silva Mariane', NULL, 'Alteração de canal e de DNS', 1, 56, 8, 5, 1, 13, 1, '2018-01-12', '07:55:38'),
(167, 180112080753, 'Gessica Bruna Soares Candida', NULL, 'Transferir ligação para o Financeiro', 2, 77, 4, 5, 1, 5, 22, '2018-01-12', '08:07:15'),
(168, 180112081038, 'Karla Nobre de Oliveira 1° Ponto', NULL, 'Reiniciar rádio', 2, 73, 4, 5, 1, 13, 25, '2018-01-12', '08:10:43'),
(169, 180112091343, 'Rafael Menezes Cavalcante', NULL, 'Reconfigurar roteador', 1, 19, 4, 5, 1, 13, 1, '2018-01-12', '09:13:49'),
(170, 180112112830, 'Marcileuda Ferreira dos Santos', NULL, 'Aguardando Ordem de Serviço', 2, 37, 4, 5, 12, 18, 15, '2018-01-12', '11:28:43'),
(171, 180112113143, 'Jerson José dos Santos Oliveira', NULL, 'Aguardando Ordem de Serviço', 2, 88, 4, 5, 1, 3, 24, '2018-01-12', '11:31:24'),
(172, 180112113650, 'Custódio Dantas da Silva', NULL, 'Alteração de canal', 2, 49, 4, 5, 9, 8, 12, '2018-01-12', '11:36:22');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `atd`
--
ALTER TABLE `atd`
  ADD PRIMARY KEY (`id_atd`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `atd`
--
ALTER TABLE `atd`
  MODIFY `id_atd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
