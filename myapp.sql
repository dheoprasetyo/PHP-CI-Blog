-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Agu 2018 pada 16.49
-- Versi server: 10.1.30-MariaDB
-- Versi PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myapp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `blog`
--

INSERT INTO `blog` (`id`, `title`, `content`, `url`, `cover`, `date`) VALUES
(1, 'Artikel Pertama Sayaa', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'artikel-pertama-sayaa', '', '2018-08-20 09:44:41'),
(2, 'Artikel Kedua', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'artikel-kedua', '', '2018-08-13 12:40:52'),
(3, 'Artikel Ketigaaa', '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&lt;/p&gt;', 'artikel-ketiga-sayaa', 'penggaris1.jpg', '2018-08-25 14:38:54'),
(4, 'Blog TErbaru', 'shsrfbbbbbbrrrrrrrrrrrrrrrrhhhhhhhhhhhhhhhhbbbbbbbbbbbbbbbbfffffffffffffffhhhhhhhhhhhhhhffffff', 'blog-terbaru', '', '2018-08-19 15:05:26'),
(5, 'aa', 'aa', 'aa', '', '2018-08-19 15:48:41'),
(8, 'aaaaaaaaaaaaaaaa', 'aaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaa', '', '2018-08-20 06:52:35'),
(9, 'aaaaaaaaa', 'a', 'aaaaaaaaaaaaaaaaaaaaaaaaaa', '', '2018-08-20 06:55:50'),
(13, 'a', 'a', 'aa', '', '2018-08-20 07:23:05'),
(14, 'uuuu', 'uu', 'uu', 'penggaris.jpg', '2018-08-20 07:33:20'),
(15, 'aaaa', 'rrrr', 'rrr', 'jangka_sorong.JPG', '2018-08-20 07:35:10');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
