-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 31-Dez-2018 às 01:51
-- Versão do servidor: 10.1.36-MariaDB
-- versão do PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";



CREATE TABLE `posts` (
  `id` int(20) NOT NULL,
  `id_postador` int(20) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `data` varchar(200) NOT NULL,
  `postagem` text NOT NULL,
  `visitas` int(200) NOT NULL,
  `imagem` varchar(200) NOT NULL,
  `curtidas` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `posts` (`id`, `id_postador`, `titulo`, `data`, `postagem`, `visitas`, `imagem`, `curtidas`) VALUES
(1, 1, 'Hackathon', '03/12/2022', 'Projeto hackathon', 4, 'images/uploads/hac.png', 2);



CREATE TABLE `usuarios` (
  `id` int(20) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `usuario` varchar(200) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `nivel` int(20) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `usuarios` (`id`, `nome`, `usuario`, `senha`, `nivel`) VALUES
(1, 'Hackathon', 'Hackathon', '123456', 1);

ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `posts`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


ALTER TABLE `usuarios`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;
