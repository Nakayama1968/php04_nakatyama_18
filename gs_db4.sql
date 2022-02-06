-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:8889
-- 生成日時: 2022 年 2 月 04 日 23:58
-- サーバのバージョン： 5.7.34
-- PHP のバージョン: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_db4`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_an_table`
--

CREATE TABLE `gs_an_table` (
  `id` int(12) NOT NULL,
  `shimei` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `naiyou` text COLLATE utf8_unicode_ci NOT NULL,
  `indate` datetime NOT NULL,
  `age` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_an_table`
--

INSERT INTO `gs_an_table` (`id`, `shimei`, `email`, `naiyou`, `indate`, `age`) VALUES
(1, '山崎大助', 'test0@test.jp', '教室ちょっと暑いです。', '2022-02-05 08:20:20', 40),
(3, '徳川家康', 'test2@test.jp', 'メモ', '2020-09-22 16:06:42', 30),
(4, '伊達政宗', 'test4@test.jp', 'メモ', '2022-02-05 07:59:44', 30),
(5, 'デンゼル・ワシントン', 'test5@test.jp', 'メモ', '2020-09-22 16:07:48', 40),
(6, 'ディカプリオ', 'test6@test.jp', 'タイタニック', '2022-02-05 08:23:04', 40),
(7, '山田太郎', 'test7@test.jp', 'テスト', '2020-09-22 17:14:36', 20),
(8, '服部半蔵', 'test8@test.jp', '服部くん', '2022-02-05 07:59:40', 10),
(9, '吉田慎三', 'test09@test.jp', '自分', '2022-02-05 08:00:35', 88),
(20, '中山晋平', 'test10@test.jp', '変更\r\n', '2022-02-05 08:01:21', 45),
(22, '富田勲', 'test11@test.jp', '展覧会の絵', '2022-02-05 08:01:56', 44),
(23, '坂本龍一', 'test12@test.jp', '戦メリ', '2022-02-05 08:02:54', 71);

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_bm_table`
--

CREATE TABLE `gs_bm_table` (
  `id` int(12) NOT NULL,
  `bookname` text NOT NULL,
  `bookurl` text NOT NULL,
  `comment` text NOT NULL,
  `date` datetime NOT NULL,
  `author` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `gs_bm_table`
--

INSERT INTO `gs_bm_table` (`id`, `bookname`, `bookurl`, `comment`, `date`, `author`) VALUES
(68, '青い絨毯', 'https://www.aozora.gr.jp/cards/001095/files/56797_56917.html', '', '2022-02-05 08:44:39', '坂口安吾'),
(70, '五重塔', 'https://www.aozora.gr.jp/cards/000051/files/50351_36759.html', '', '2022-01-30 13:22:18', '幸田露伴'),
(71, '山月記', 'https://www.aozora.gr.jp/cards/000119/files/624_14544.html', '', '2022-01-30 13:22:23', '中島敦'),
(72, '父', 'https://www.aozora.gr.jp/cards/000879/files/30_15215.html', '', '2022-01-30 13:22:26', '芥川龍之介'),
(74, '木々の精、谷の精', 'https://www.aozora.gr.jp/cards/001095/files/45844_60119.html', '', '2022-01-30 13:22:14', '坂口安吾'),
(75, '銀の匙', 'https://www.aozora.gr.jp/cards/001799/files/56638_61335.html', '', '2022-01-30 14:19:22', '中勘助');

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_user_table`
--

CREATE TABLE `gs_user_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `lid` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `lpw` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `kanri_flg` int(1) NOT NULL,
  `life_flg` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_user_table`
--

INSERT INTO `gs_user_table` (`id`, `name`, `lid`, `lpw`, `kanri_flg`, `life_flg`) VALUES
(1, 'テスト１管理者', 'test1', 'test1', 1, 0),
(2, 'テスト2一般', 'test2', 'test2', 0, 0),
(3, 'テスト３', 'test3', 'test3', 0, 0);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_an_table`
--
ALTER TABLE `gs_an_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `gs_user_table`
--
ALTER TABLE `gs_user_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `gs_an_table`
--
ALTER TABLE `gs_an_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- テーブルの AUTO_INCREMENT `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- テーブルの AUTO_INCREMENT `gs_user_table`
--
ALTER TABLE `gs_user_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
