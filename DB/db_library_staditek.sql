-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Des 2022 pada 00.15
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_library_staditek`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `isbn` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `synopsis` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `author` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `publisher` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `language` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cover_book` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `books`
--

INSERT INTO `books` (`id`, `isbn`, `title`, `synopsis`, `author`, `publisher`, `category`, `language`, `cover_book`, `created_at`, `updated_at`) VALUES
(4, ' 9786020655765', 'Mrs. Dalloway', '“She had a perpetual sense, as she watched the taxi cabs, of being out, out, far out to sea and alone; she always had the feeling that it was very, very dangerous to live even one day.”', 'Woolf, Virginia', ' Jakarta : Gramedia Pustaka Utama, 2021', 'FIKSI INGGRIS', 'INDONESIAN', '5d33403bead73697e3af7fc884257664.png', '2022-12-04 13:50:12', '2022-12-04 14:04:34'),
(5, '-', 'Dan Senja Pun Turun', 'The relationship between men and women is the main problem of this novel. On the one hand, he is viewed as routine, underestimated. On the other hand, he became the base of search and thought. In the first group stand: Mia, Tience, Mini, and Tini. In the second group stood Anwar and Nuning. Nasjah Djamin\'s novel can be grouped together with his other novels, such as Passion for Life and for Death, and The Strands of Fallen Sakura, all departing from the issue of sex.', 'Nasjah Djamin', ' Jakarta : Sinar Harapan, 1981', 'NOVEL INDONESIA', 'ENGLISH', 'c38bdd71ce9110b47de7310945bbeb48.jpg', '2022-12-04 14:06:21', NULL),
(6, '-', 'Siti Nurbaya : Kasih Tak Sampai', 'Kasih Tak Sampai adalah sebuah novel Indonesia yang ditulis oleh Marah Rusli. Novel ini diterbitkan oleh Balai Pustaka, penerbit nasional negeri Hindia Belanda, pada 1922.', 'Marah Rusli', 'Jakarta : Balai Pustaka, 1985', 'FIKSI INDONESIA', 'INDONESIAN', '63a97e237ef06ef8adf8ea9ee30b7213.jpg', '2022-12-04 14:07:58', NULL),
(7, '9786230030178', 'One Piece : Defeat The Pirate Ganzack', 'Ternyata Plesiosaurus tersebut dikendalikan oleh bajak laut Ganzack yang menguasai sebuah pulau kecil untuk suatu alasan. Luffy dan Zoro yang terdampar di pulau tersebut bertemu dengan Medaka, gadis kecil berbaju zirah yang ingin menyelamatkan ayahnya, yang bersama para penduduk desa sedang diperbudak Ganzack. Apa sebenarnya rencana Ganzack, sang bajak laut bangsawan!?', 'Hamazaki, Tatsuya ; Oda, Eiichiro (cerita asli) ; Juan Hadrianus (penerjemah) ; Adisti (editor)', 'Jakarta : PT Elex Media Komputindo, 022; © 1999 by Eiichiro Oda, Tatsuya Hamazaki, Production I.G.; ', 'FIKSI JEPANG / LIGHT NOVEL', 'INDONESIAN', '927d1d1403304fb2df6002da9982c8de.jpg', '2022-12-04 14:09:15', NULL),
(8, ' 978-979-018-588-3', 'Senang Makan', 'Belum ada catatan', 'Ali Muakhir (Pengarang)', ' Solo : Tiga Serangkai, 2008', 'anak-anak', 'INDONESIAN', 'b0dfa5e3232b1c36c0e14735191d3669.png', '2022-12-04 14:10:56', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `book_trxs`
--

CREATE TABLE `book_trxs` (
  `id` int(11) NOT NULL,
  `detail_id` int(11) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `type` enum('fine','borrow') COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `book_trxs`
--

INSERT INTO `book_trxs` (`id`, `detail_id`, `member_id`, `type`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'borrow', 5000, '2022-12-04 17:55:22', NULL),
(2, 2, 3, 'borrow', 5000, '2022-12-04 17:55:22', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `borrow_books`
--

CREATE TABLE `borrow_books` (
  `id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `trx_date` datetime DEFAULT current_timestamp(),
  `deadline_at` datetime DEFAULT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `borrow_books`
--

INSERT INTO `borrow_books` (`id`, `member_id`, `trx_date`, `deadline_at`, `note`, `created_at`, `updated_at`) VALUES
(1, 3, '2022-12-05 00:27:15', '2022-12-10 00:26:23', 'NONEE', '2022-12-04 17:27:15', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `borrow_details`
--

CREATE TABLE `borrow_details` (
  `id` int(11) NOT NULL,
  `book_id` int(11) DEFAULT NULL,
  `borrow_id` int(11) DEFAULT NULL,
  `deadline_at` datetime DEFAULT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `borrow_details`
--

INSERT INTO `borrow_details` (`id`, `book_id`, `borrow_id`, `deadline_at`, `note`, `created_at`, `updated_at`) VALUES
(1, 5, 1, '2022-12-10 00:26:23', 'tidak ada', '2022-12-04 17:36:10', NULL),
(2, 4, 1, '2022-12-10 00:26:23', 'tidak ada', '2022-12-04 17:36:10', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `borrow_return`
--

CREATE TABLE `borrow_return` (
  `id` int(11) NOT NULL,
  `book_id` int(11) DEFAULT NULL,
  `detail_id` int(11) DEFAULT NULL,
  `return_at` datetime DEFAULT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `librarians`
--

CREATE TABLE `librarians` (
  `id` int(11) NOT NULL,
  `username` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `librarians`
--

INSERT INTO `librarians` (`id`, `username`, `name`, `email`, `password`, `avatar`, `created_at`, `updated_at`) VALUES
(31, 'aryakk', 'ARYA TIO WASESA', 'aryatiowasesa1306@gmail.com', '$2y$10$RvsFfjGcya4twI8H66cc3u9LG5OOjoVndFtwHSkmPcDJniP0eH2wu', '19523583e9bfddbdcc649b6172db1678.jpg', '2022-12-04 13:10:13', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `nik` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '62',
  `address` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `born_place` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `born_date` date NOT NULL,
  `gender` enum('L','P','O') COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nationality` enum('WNI','WNA') COLLATE utf8_unicode_ci DEFAULT 'WNI',
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `members`
--

INSERT INTO `members` (`id`, `nik`, `full_name`, `phone`, `address`, `born_place`, `born_date`, `gender`, `country`, `nationality`, `is_active`, `created_at`, `updated_at`) VALUES
(3, '123456789098', 'ARYA TIO WASESA', '0987654311', 'BOYOLALI', 'WONOGIRI', '2004-11-14', 'L', 'INDONESIA', 'WNI', 1, '2022-12-04 17:25:14', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `member_trxs`
--

CREATE TABLE `member_trxs` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `subs_id` int(11) DEFAULT NULL,
  `trx_date` datetime DEFAULT NULL,
  `active_at` date DEFAULT NULL,
  `expire_at` date DEFAULT NULL,
  `status` enum('paid','unpaid') COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_order` double DEFAULT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `month` tinyint(6) NOT NULL,
  `price` float NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `book_trxs`
--
ALTER TABLE `book_trxs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_borrow_detail` (`detail_id`),
  ADD KEY `memberr_fk` (`member_id`);

--
-- Indeks untuk tabel `borrow_books`
--
ALTER TABLE `borrow_books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_member` (`member_id`),
  ADD KEY `deadline_at` (`deadline_at`);

--
-- Indeks untuk tabel `borrow_details`
--
ALTER TABLE `borrow_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_deadline` (`deadline_at`),
  ADD KEY `fk_borrow` (`borrow_id`),
  ADD KEY `fk_book` (`book_id`);

--
-- Indeks untuk tabel `borrow_return`
--
ALTER TABLE `borrow_return`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `librarians`
--
ALTER TABLE `librarians`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `member_trxs`
--
ALTER TABLE `member_trxs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `book_trxs`
--
ALTER TABLE `book_trxs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `borrow_books`
--
ALTER TABLE `borrow_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `borrow_details`
--
ALTER TABLE `borrow_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `borrow_return`
--
ALTER TABLE `borrow_return`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `librarians`
--
ALTER TABLE `librarians`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `member_trxs`
--
ALTER TABLE `member_trxs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `book_trxs`
--
ALTER TABLE `book_trxs`
  ADD CONSTRAINT `fk_borrow_detail` FOREIGN KEY (`detail_id`) REFERENCES `borrow_details` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `memberr_fk` FOREIGN KEY (`member_id`) REFERENCES `borrow_books` (`member_id`);

--
-- Ketidakleluasaan untuk tabel `borrow_books`
--
ALTER TABLE `borrow_books`
  ADD CONSTRAINT `fk_member` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`);

--
-- Ketidakleluasaan untuk tabel `borrow_details`
--
ALTER TABLE `borrow_details`
  ADD CONSTRAINT `fk_book` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_borrow` FOREIGN KEY (`borrow_id`) REFERENCES `borrow_books` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_deadline` FOREIGN KEY (`deadline_at`) REFERENCES `borrow_books` (`deadline_at`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
