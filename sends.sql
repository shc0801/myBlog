-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 20-05-31 10:53
-- 서버 버전: 10.1.34-MariaDB
-- PHP 버전: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `local-convention-c`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `sends`
--

CREATE TABLE `sends` (
  `id` int(11) NOT NULL,
  `build_id` int(11) NOT NULL,
  `sender_id` varchar(150) NOT NULL,
  `sender_name` varchar(150) NOT NULL,
  `user_id` varchar(150) NOT NULL,
  `user_name` varchar(150) NOT NULL,
  `date` date NOT NULL,
  `content` text NOT NULL,
  `state` tinyint(1) NOT NULL,
  `volume` int(11) NOT NULL,
  `price` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `sends`
--

INSERT INTO `sends` (`id`, `build_id`, `sender_id`, `sender_name`, `user_id`, `user_name`, `date`, `content`, `state`, `volume`, `price`) VALUES
(3, 1, 'specialist2', '전문가2', 'specialist1', '전문가1', '2020-08-01', '생일기념 인테리어', 0, 1, '321321');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `sends`
--
ALTER TABLE `sends`
  ADD PRIMARY KEY (`id`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `sends`
--
ALTER TABLE `sends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
