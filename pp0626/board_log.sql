-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018-06-26 08:04:32
-- 伺服器版本: 10.1.31-MariaDB
-- PHP 版本： 7.0.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `myphp_2018_06`
--

-- --------------------------------------------------------

--
-- 資料表結構 `board_log`
--

CREATE TABLE `board_log` (
  `board_log_seq` int(10) NOT NULL COMMENT '索引鍵',
  `board_log_name` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '名稱',
  `board_log_cont` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '內容',
  `board_log_no` bigint(20) NOT NULL COMMENT '場次',
  `board_log_time` datetime NOT NULL COMMENT '時間',
  `board_log_ip` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'IP'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `board_log`
--

INSERT INTO `board_log` (`board_log_seq`, `board_log_name`, `board_log_cont`, `board_log_no`, `board_log_time`, `board_log_ip`) VALUES
(1, 'bz', '6456', 20180621160306, '2018-06-21 16:05:24', '127.0.0.1'),
(2, 'bz', '65464534210', 20180621160306, '2018-06-21 16:05:26', '127.0.0.1'),
(3, 'bz', '4444444444444', 20180621160306, '2018-06-21 16:05:27', '127.0.0.1'),
(4, 'bz', '趕羚羊啦！', 20180621160306, '2018-06-21 16:21:36', '127.0.0.1'),
(5, 'bz', '4564', 20180626095242, '2018-06-26 13:41:24', '127.0.0.1'),
(6, 'bz', '654', 20180626095242, '2018-06-26 13:41:25', '127.0.0.1'),
(7, 'bz', '7897', 20180626095242, '2018-06-26 13:41:26', '127.0.0.1'),
(8, 'bz', '耖你媽爛客服', 20180626095242, '2018-06-26 13:42:18', '127.0.0.1');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `board_log`
--
ALTER TABLE `board_log`
  ADD PRIMARY KEY (`board_log_seq`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `board_log`
--
ALTER TABLE `board_log`
  MODIFY `board_log_seq` int(10) NOT NULL AUTO_INCREMENT COMMENT '索引鍵', AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
