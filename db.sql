-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jul 2021 pada 18.07
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exam`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mahasiswa`
--

CREATE TABLE `tb_mahasiswa` (
  `id` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `nama_mhs` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `ttl` varchar(255) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `prodi` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`id`, `id_role`, `nim`, `nama_mhs`, `password`, `ttl`, `jenis_kelamin`, `prodi`, `email`, `no_hp`, `foto`) VALUES
(5, 2, 17185034, 'Eva Siti Nurjanah', '$2y$10$AR4CCp2pjfjIwZ8QwqKG2OlNI6EwJjC9iQiurXaJNQpw0ZgO26gBe', '1997-01-10', 'P', 'Sistem Informasi', 'eva.nurjanah_si17@nusaputra.ac.id', '6287870393902', 'http://example.com/assets/img/profil/emilia.png'),
(6, 2, 17185035, 'Fitri Andriani', '$2y$10$laX9V9tPsSPkHq9ThSn96OD/kPdoHa15Hmk3gMLI1fSt23Y7cQg3e', '1997-03-16', 'P', 'Sistem Informasi', 'fitri.andriani_si17@nusaputra.ac.id', '0810298300129', 'http://example.com/assets/img/profil/emilia.png'),
(7, 2, 17185015, 'Atika Fauzia Akbari', '$2y$10$fUv07QHz59DOnvjNl7TZsuZeToiropXBV6pGMkFgWUwtNyBDfA51m', '1998-03-29', 'P', 'Sistem Informasi', 'atika.fauzia_si17@nusaputra.ac.id', '6283818182294', 'http://example.com/assets/img/profil/emilia.png'),
(8, 2, 17185030, 'Elsa Yulia Rahman', '$2y$10$fXWHDRuZHgAY3EDJjHx0DuQ4xihxdh6IOyMNcUIFRtOlLzDFOPfry', '1997-08-20', 'P', 'Sistem Informasi', 'elsa.yulia_si17@nusaputra.ac.id', '6285524834187', 'http://example.com/assets/img/profil/emilia.png'),
(9, 2, 17185007, 'Dea Siti Rahima Juliansa', '$2y$10$nJQt/9GoKMQYHmiL6gPW/u72Vaihc2rP6/4Zgn9ueku/nOfgi5ZSi', '1998-07-08', 'P', 'Sistem Informasi', 'dea.siti_si17@nusaputra.ac.id', '6285862724922', 'http://example.com/assets/img/profil/BAKA.png'),
(10, 2, 17185063, 'Monika Gultom', '$2y$10$GyrlcRB8KPxNlpd5N8UiL.MoXzy/Zmet.P.uQxhvW2W4/KtT/Ebp.', '1998-06-10', 'L', 'Sistem Informasi', 'monika.gultom_si17@nusaputra.ac.id', '621311386006', 'http://example.com/assets/img/profil/unyu.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_mahasiswa_id_role_foreign` (`id_role`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD CONSTRAINT `tb_mahasiswa_id_role_foreign` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
