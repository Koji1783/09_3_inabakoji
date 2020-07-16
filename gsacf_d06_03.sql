-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2020 年 7 月 16 日 15:47
-- サーバのバージョン： 10.4.11-MariaDB
-- PHP のバージョン: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gsacf_d06_03`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `like_sns_table`
--

CREATE TABLE `like_sns_table` (
  `id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `comment_id` int(12) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `like_sns_table`
--

INSERT INTO `like_sns_table` (`id`, `user_id`, `comment_id`, `created_at`) VALUES
(2, 3, 2, '2020-07-16 07:42:23'),
(3, 3, 1, '2020-07-16 07:42:29'),
(8, 3, 5, '2020-07-16 07:54:24'),
(10, 3, 3, '2020-07-16 07:58:36'),
(11, 1, 3, '2020-07-16 07:58:58'),
(12, 1, 6, '2020-07-16 07:58:59'),
(13, 1, 5, '2020-07-16 07:59:04'),
(14, 1, 2, '2020-07-16 08:00:33'),
(15, 1, 4, '2020-07-16 08:00:34'),
(16, 9, 9, '2020-07-16 22:18:47'),
(17, 10, 10, '2020-07-16 22:20:28'),
(18, 10, 6, '2020-07-16 22:20:29'),
(19, 10, 7, '2020-07-16 22:20:35'),
(20, 3, 12, '2020-07-16 22:20:56'),
(22, 3, 13, '2020-07-16 22:21:01'),
(23, 11, 1, '2020-07-16 22:21:29'),
(24, 11, 3, '2020-07-16 22:21:30'),
(25, 11, 6, '2020-07-16 22:21:30'),
(26, 11, 10, '2020-07-16 22:21:31'),
(27, 11, 13, '2020-07-16 22:21:35'),
(28, 11, 9, '2020-07-16 22:21:36'),
(29, 11, 7, '2020-07-16 22:21:36'),
(30, 11, 5, '2020-07-16 22:21:37'),
(31, 11, 11, '2020-07-16 22:21:42'),
(32, 11, 8, '2020-07-16 22:21:42'),
(33, 11, 4, '2020-07-16 22:21:42'),
(34, 11, 2, '2020-07-16 22:21:43');

-- --------------------------------------------------------

--
-- テーブルの構造 `like_table`
--

CREATE TABLE `like_table` (
  `id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `todo_id` int(12) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `like_table`
--

INSERT INTO `like_table` (`id`, `user_id`, `todo_id`, `created_at`) VALUES
(2, 3, 8, '2020-07-11 15:16:57'),
(3, 3, 3, '2020-07-11 15:35:55'),
(4, 3, 4, '2020-07-11 15:36:29'),
(6, 8, 2, '2020-07-11 15:43:41'),
(7, 8, 4, '2020-07-11 15:43:59'),
(8, 8, 7, '2020-07-11 15:44:00'),
(9, 8, 9, '2020-07-11 15:44:02'),
(10, 8, 5, '2020-07-11 16:19:35'),
(12, 8, 3, '2020-07-11 16:19:42'),
(15, 8, 8, '2020-07-11 16:20:05'),
(16, 8, 12, '2020-07-11 16:20:15'),
(17, 8, 6, '2020-07-11 17:25:54'),
(18, 8, 11, '2020-07-11 17:25:55'),
(19, 1, 3, '2020-07-11 17:26:07'),
(20, 1, 4, '2020-07-11 17:26:08'),
(21, 1, 8, '2020-07-11 17:26:10'),
(22, 3, 5, '2020-07-14 00:45:47'),
(23, 3, 7, '2020-07-14 00:46:00'),
(24, 0, 2, '2020-07-14 01:50:05'),
(27, 3, 2, '2020-07-16 07:32:05');

-- --------------------------------------------------------

--
-- テーブルの構造 `sns_table`
--

CREATE TABLE `sns_table` (
  `id` int(12) NOT NULL,
  `g_id` int(12) NOT NULL,
  `username` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `comment` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `hashtag` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `commentdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `sns_table`
--

INSERT INTO `sns_table` (`id`, `g_id`, `username`, `comment`, `hashtag`, `commentdate`) VALUES
(1, 3, 'test', '課題の合体', '#トムブラウン', '2020-06-30 16:11:36'),
(2, 1, 'koji', '忙しい', '#busy', '2020-07-04 04:01:36'),
(3, 3, 'koji', '課題終わった', '#テスト', '2020-07-04 04:02:15'),
(4, 1, 'test', '第８課題', '#順調？', '2020-07-09 12:23:27'),
(5, 2, 'test', 'お題２', '#テスト', '2020-07-09 12:23:45'),
(6, 3, 'test', 'お題３', '#これで最後', '2020-07-09 12:23:57'),
(7, 2, 'test', 'ボタン変更', '#テスト', '2020-07-09 13:06:28'),
(8, 1, 'taro', '楽しい', '#ピクニック', '2020-07-16 13:18:15'),
(9, 2, 'taro', '悲しい', '#バラード', '2020-07-16 13:18:39'),
(10, 3, 'taro', '笑った', '#人生', '2020-07-16 13:19:03'),
(11, 1, 'mio', 'ふられた', '#失恋', '2020-07-16 13:19:48'),
(12, 3, 'mio', '結婚した', '#幸せ', '2020-07-16 13:19:59'),
(13, 2, 'mio', '運命の出会い！', '#奇跡', '2020-07-16 13:20:20');

-- --------------------------------------------------------

--
-- テーブルの構造 `todo_table`
--

CREATE TABLE `todo_table` (
  `id` int(12) NOT NULL,
  `todo` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `deadline` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `todo_table`
--

INSERT INTO `todo_table` (`id`, `todo`, `deadline`, `created_at`, `updated_at`) VALUES
(2, '愛を叫ぶ', '2020-12-31', '2020-06-20 15:29:16', '2020-06-20 15:29:16'),
(3, 'セカイをかえる', '2020-09-30', '2020-06-20 15:30:24', '2020-06-20 15:30:24'),
(4, '美女と付き合う', '2020-10-19', '2020-06-20 15:31:44', '2020-06-20 15:31:44'),
(5, 'ゴミを拾う', '2020-08-01', '2020-06-20 15:32:34', '2020-06-20 15:32:34'),
(6, '編集する', '2020-06-28', '2020-06-20 16:49:55', '2020-06-27 16:09:12'),
(7, 'PHP欠席', '2020-06-13', '2020-06-20 17:18:16', '2020-06-20 17:18:16'),
(8, '講義中', '2020-06-27', '2020-06-27 14:42:29', '2020-06-27 14:42:29'),
(9, '寝る', '2020-06-27', '2020-06-27 15:06:56', '2020-06-27 15:06:56'),
(11, 'test2', '2020-07-14', '2020-07-04 16:28:16', '2020-07-04 16:28:16'),
(12, 'aaaaaaaa', '2020-07-23', '2020-07-11 15:43:38', '2020-07-11 15:43:38');

-- --------------------------------------------------------

--
-- テーブルの構造 `users_table`
--

CREATE TABLE `users_table` (
  `id` int(12) NOT NULL,
  `username` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `is_admin` int(1) NOT NULL,
  `is_deleted` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `users_table`
--

INSERT INTO `users_table` (`id`, `username`, `password`, `is_admin`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'kanri', 'kanri', 1, 0, '2020-06-27 23:42:28', '2020-06-30 17:59:32'),
(3, 'test', 'test', 0, 0, '2020-06-30 18:07:32', '2020-06-30 18:07:32'),
(4, 'test1', 'test1', 0, 1, '2020-06-30 18:13:34', '2020-06-30 18:47:08'),
(5, 'koji', 'koji', 0, 1, '2020-07-04 13:01:11', '2020-07-04 13:08:08'),
(6, 'testman', 'kkkk', 1, 0, '2020-07-04 13:07:01', '2020-07-09 21:25:09'),
(8, 'kojikoji', 'kojikoji', 0, 0, '2020-07-11 15:43:04', '2020-07-11 15:43:04'),
(9, 'taro', 'taro', 0, 0, '2020-07-16 22:17:46', '2020-07-16 22:17:46'),
(10, 'mio', 'mio', 0, 0, '2020-07-16 22:19:26', '2020-07-16 22:19:26'),
(11, 'masa', 'masa', 0, 0, '2020-07-16 22:21:18', '2020-07-16 22:21:18');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `like_sns_table`
--
ALTER TABLE `like_sns_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `like_table`
--
ALTER TABLE `like_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `sns_table`
--
ALTER TABLE `sns_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `todo_table`
--
ALTER TABLE `todo_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `like_sns_table`
--
ALTER TABLE `like_sns_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- テーブルのAUTO_INCREMENT `like_table`
--
ALTER TABLE `like_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- テーブルのAUTO_INCREMENT `sns_table`
--
ALTER TABLE `sns_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- テーブルのAUTO_INCREMENT `todo_table`
--
ALTER TABLE `todo_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- テーブルのAUTO_INCREMENT `users_table`
--
ALTER TABLE `users_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
