-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jul 2021 pada 19.28
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
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(85, '2021-07-11-073339', 'App\\Database\\Migrations\\AddTbRole', 'default', 'App', 1626355740, 1),
(86, '2021-07-11-073345', 'App\\Database\\Migrations\\AddTbAdmin', 'default', 'App', 1626355740, 1),
(87, '2021-07-11-073357', 'App\\Database\\Migrations\\AddTbHasil', 'default', 'App', 1626355740, 1),
(88, '2021-07-11-073409', 'App\\Database\\Migrations\\AddTbKategori', 'default', 'App', 1626355741, 1),
(89, '2021-07-11-073417', 'App\\Database\\Migrations\\AddTbMahasiswa', 'default', 'App', 1626355741, 1),
(90, '2021-07-11-073423', 'App\\Database\\Migrations\\AddTbSoal', 'default', 'App', 1626355741, 1),
(91, '2021-07-13-095623', 'App\\Database\\Migrations\\AddTbJenisSoal', 'default', 'App', 1626355741, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role_name` enum('mahasiswa','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `role_name`) VALUES
(1, 'admin'),
(2, 'mahasiswa'),
(3, 'admin'),
(4, 'mahasiswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `id_role`, `username`, `password`) VALUES
(1, 1, 'admin', '$2y$10$XCqf3pHFIPv7e8C.eOPBlOLrgebVAIbhdFaX2qG8DeEbLHeVdgYne'),
(2, 1, 'admin', '$2y$10$TzycW.lq7ebbYAFQvnXr3uTf1G.gquRgfEw5kvw63S.eNRHan7ml6');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_hasil`
--

CREATE TABLE `tb_hasil` (
  `id` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `jawaban` text NOT NULL,
  `skor` varchar(255) NOT NULL,
  `scp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_hasil`
--

INSERT INTO `tb_hasil` (`id`, `id_mahasiswa`, `jawaban`, `skor`, `scp`) VALUES
(1, 10, '', '485', 'Research'),
(2, 7, '', '500', 'Internship'),
(3, 9, '', '685', 'student exchange'),
(4, 8, '', '755', 'Research'),
(5, 5, '', '485', 'Internship'),
(6, 6, '', '355', 'Internship');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis_soal`
--

CREATE TABLE `tb_jenis_soal` (
  `id` int(11) NOT NULL,
  `jenis_soal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_jenis_soal`
--

INSERT INTO `tb_jenis_soal` (`id`, `jenis_soal`) VALUES
(1, 'Sinonim'),
(2, 'Antonim'),
(3, 'Analogi'),
(4, 'Logika Aritmatika'),
(5, 'Matematika'),
(6, 'Logika Umum'),
(7, 'Logika Penalaran '),
(8, 'Gambar/ Spasial'),
(9, 'Sinonim'),
(10, 'Antonim'),
(11, 'Analogi'),
(12, 'Logika Aritmatika'),
(13, 'Matematika'),
(14, 'Logika Umum'),
(15, 'Logika Penalaran '),
(16, 'Gambar/ Spasial');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id`, `kategori`) VALUES
(1, 'Verbal'),
(2, 'Kuantitatif'),
(3, 'Logika');

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_soal`
--

CREATE TABLE `tb_soal` (
  `id` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `paragraf` text NOT NULL,
  `soal` longtext NOT NULL,
  `opsi_a` longtext NOT NULL,
  `opsi_b` longtext NOT NULL,
  `opsi_c` longtext NOT NULL,
  `opsi_d` longtext NOT NULL,
  `jawaban` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `status` enum('aktif','mati') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_soal`
--

INSERT INTO `tb_soal` (`id`, `id_kategori`, `id_jenis`, `paragraf`, `soal`, `opsi_a`, `opsi_b`, `opsi_c`, `opsi_d`, `jawaban`, `gambar`, `status`) VALUES
(345, 1, 1, '', 'Objektif : ', 'A. Faktual', 'B. Berpihak', 'C. Kenyataan', 'D. Dugaan', 'A', '', 'aktif'),
(346, 1, 1, '', 'Hulubalang :', 'A. Hansip', 'B. Polisi Desa', 'C. Ketua RT', 'D. Kepala Dusun', 'B', '', 'aktif'),
(347, 1, 1, '', 'Remisi :', 'A. Pengampunan', 'B. Penghukuman', 'C. Bantuan', 'D. Penghapusan', 'A', '', 'aktif'),
(348, 1, 1, '', 'Heterogen :', 'A. Homogen', 'B. Khusus', 'C. Plural', 'D. Banyak', 'C', '', 'aktif'),
(349, 1, 1, '', 'Monoton :', 'A. Terus - Menerus', 'B. Berubah - Ubah', 'C. Berganti - Ganti', 'D. Berulang - Ulang', 'D', '', 'aktif'),
(350, 1, 1, '', 'Kontribusi :', 'A. Pajak', 'B. Hibah', 'C. Sumbangan', 'D. Bunga', 'C', '', 'aktif'),
(351, 1, 1, '', 'Limit : ', 'A. Batas', 'B. Cukup', 'C. Surplus', 'D. Kontinu', 'A', '', 'aktif'),
(352, 1, 1, '', 'Maestro : ', 'A. Tukang Sulap', 'B. Komponis', 'C. Profesor', 'D. Asisten', 'B', '', 'aktif'),
(353, 1, 1, '', 'Konveks :', 'A. Cekung', 'B. Cekung Cembung', 'C. Cembung', 'D. Datar', 'C', '', 'aktif'),
(354, 1, 1, '', 'Bebal :', 'A. Pintar', 'B. Pemarah', 'C. Beban', 'D. Keras Kepala', 'C', '', 'aktif'),
(355, 1, 1, '', 'Gambaran :', 'A. Dimensi', 'B. Imajinasi', 'C. Harapan', 'D. Citra', 'D', '', 'aktif'),
(356, 1, 1, '', 'Tempat :', 'A. Piringan Hitam', 'B. Loka', 'C. Kebun', 'D. Bulan', 'B', '', 'aktif'),
(357, 1, 1, '', 'Nabati : ', 'A. Hewani', 'B. Kodrati', 'C. Botani', 'D. Hayati', 'C', '', 'aktif'),
(358, 1, 1, '', 'Baku :', 'A. Standar', 'B. Khusus', 'C. Normal', 'D. Asli', 'A', '', 'aktif'),
(359, 1, 1, '', 'Relatif :', 'A. Biasa', 'B. Statis', 'C. Pasti', 'D. Nisbi', 'D', '', 'aktif'),
(360, 1, 1, '', 'Delusi : ', 'A. Kekecewaan', 'B. Khawatir', 'C. Ilusi', 'D. Nyata', 'C', '', 'aktif'),
(361, 1, 2, '', 'Mutakhir :', 'A. Canggih', 'B. Usang', 'C. Baru', 'D. Kuno', 'D', '', 'aktif'),
(362, 1, 2, '', 'Isolator :', 'A. Penghantar', 'B. Penyelia', 'C. Pengangkut', 'D. Penghambat', 'A', '', 'aktif'),
(363, 1, 2, '', 'Angsur :', 'A. Tunai', 'B. Kredit', 'C. Inden', 'D. Cicil', 'A', '', 'aktif'),
(364, 1, 2, '', 'Statis :', 'A. Dinamis', 'B. Stabil', 'C. Limit', 'D. Staganan', 'A', '', 'aktif'),
(365, 1, 2, '', 'Labil :', 'A. Mantap', 'B. Goyang', 'C. Getar', 'D. Goyah', 'A', '', 'aktif'),
(366, 1, 2, '', 'Onar :', 'A. Amuk', 'B. Rebut', 'C. Damai', 'D. Ramai', 'C', '', 'aktif'),
(367, 1, 2, '', 'Optimis :', 'A. Ragu', 'B. Pasti', 'C. Acuh', 'D. Yakin', 'A', '', 'aktif'),
(368, 1, 2, '', 'Prefiks :', 'A. Sisipan', 'B. Awalan', 'C. Kutipan', 'D. Akhiran', 'D', '', 'aktif'),
(369, 1, 2, '', 'Fiksi :', 'A. Rekaan', 'B. Ilmiah', 'C. Nyata', 'D. Khayalan', 'C', '', 'aktif'),
(370, 1, 2, '', 'Amatir :', 'A. Palsu', 'B. Canggih', 'C. Ahli', 'D. Anasir', 'C', '', 'aktif'),
(371, 1, 2, '', 'Tinggi :', 'A. Rendah', 'B. Pendek', 'C. Sedang', 'D. Bongsor', 'A', '', 'aktif'),
(372, 1, 2, '', 'Imigrasi :', 'A. Emigrasi', 'B. Migrasi', 'C. Transportasi', 'D. Koalisi', 'A', '', 'aktif'),
(373, 1, 2, '', 'Induksi :', 'A. Reduksi', 'B. Konduksi', 'C. Deduksi', 'D. Residu', 'C', '', 'aktif'),
(374, 1, 2, '', 'Penting :', 'A. Keras', 'B. Tinggi', 'C. Remeh', 'D. Utama', 'C', '', 'aktif'),
(375, 1, 2, '', 'Berongga :', 'A. Bernafas', 'B. Rapat', 'C. Berlubang', 'D. Bersisip', 'B', '', 'aktif'),
(376, 1, 2, '', 'Senang : ', 'A. Gersang', 'B. Subur', 'C. Merana', 'D. Tertawa', 'C', '', 'aktif'),
(377, 1, 3, '', 'Senin : Rabu = Januari : . . .  ', 'A. Februari', 'B. Maret', 'C. April', 'D. Mei', 'B', '', 'aktif'),
(378, 1, 3, '', 'Ramai : Ribut = . . . : . . . ', 'A. Sorak : Teriak', 'B. Telinga : Tuli', 'C. Sepi : Lengang', 'D. Terik : Panas', 'C', '', 'aktif'),
(379, 1, 3, '', 'Topi : Panas = . . . : . . ', 'A. Palu : Paku', 'B. Sungai : Air', 'C. Imbalan : Kerja keras', 'D. Payung : Hujan', 'D', '', 'aktif'),
(380, 1, 3, '', 'Pencopet : Penjahat = Guru : . . ', 'A. Profesi', 'B. Pakar', 'C. Mengajar', 'D. Ahli', 'A', '', 'aktif'),
(381, 1, 3, '', 'Jurang : Pegunungan = . . .  : . . .', 'A. Hutan : Tanaman', 'B. Kabut : Gunung', 'C. Radio : Komunikasi', 'D. Mata : Kepala  ', 'D', '', 'aktif'),
(382, 1, 3, '', 'Basket : Bola = . . . : . . ', 'A. Atap : Rumah', 'B. Bulu tangkis : Kok ', 'C. Komputer : Prosesor', 'D. Pucat : Wajah', 'B', '', 'aktif'),
(383, 1, 3, '', 'Kicau : Burung = Kokok : . . . ', 'A. Ayam', 'B. Sapi', 'C. Kambing', 'D. Kijang', 'A', '', 'aktif'),
(384, 1, 3, '', ' Sakit : Pucat = . . . : . . .  ', 'A. Mendung : Cerah', 'B. Penjahat : Hukuman', 'C. Kepanasan : Keringatan', 'D. Sampah : Bau', 'D', '', 'aktif'),
(385, 1, 3, '', 'Belajar : Pintar = . . . : . . ', 'A. Hidung : Bau', 'B. Panas : Haus', 'C. Makan : Kenyang', 'D. Melihat : Melirik  ', 'C', '', 'aktif'),
(386, 1, 3, '', 'KITA : SAYA = ....', 'A. Kami : Kamu', 'B. Kalian : Beliau', 'C. Dia : Kalian', 'D. Mereka : Dia', 'D', '', 'aktif'),
(387, 1, 3, '', 'TINGGI: DALAM = AWAN:....', 'A. Matahari', 'B. Minyak Tanah', 'C. Batu - Batuan', 'D. Pohon', 'B', '', 'aktif'),
(388, 1, 3, '', 'Rokok : Asbak = Air : ....', 'A. Ember', 'B. Pancur', 'C. Selokan', 'D. Selang', 'A', '', 'aktif'),
(389, 1, 3, '', 'POHON : BERLINDUNG = .... : ....', 'A. Rambut : Hitam', 'B. Telinga : Anting', 'C. Kaki : Melangkah', 'D. Kepala : Kaki', 'C', '', 'aktif'),
(390, 1, 3, '', 'Bulan : Tahun = ... : ...', 'A. Jam : Menit', 'B. Buah : Daun', 'C. Luluh : Utuh', 'D. Detik : Menit', 'D', '', 'aktif'),
(391, 1, 3, '', '1 Minggu : 7 hari = 1 hari : ....', 'A. 1.440 menit', 'B. 3.600 menit', 'C. 60 detik', 'D. 68.400 detik', 'A', '', 'aktif'),
(392, 1, 3, '', 'Bugil : Pakaian =', 'A. Kepala : Botak', 'B. Rambut : Cukur', 'C. Gungul : Rambut', 'D. Basah : Pakaian', 'C', '', 'aktif'),
(393, 1, 3, '', 'Bintang : Galaksi : Alam semesta = ..', 'A. Buah : Kilo : Karung', 'B. Saya : Kita : Mereka ', 'C. Lapar : Makan : Minum', 'D. Huruf : Kata : Cerita', 'D', '', 'aktif'),
(394, 1, 3, '', 'Lampu : Gelap : Terang = ...', 'A. Makanan : Kenyang : Lapar', 'B. Minuman : Dahaga : Haus', 'C. Bulan : Bintang : Malam', 'D. Makanan : Lapar : Kenyang', 'D', '', 'aktif'),
(395, 2, 4, '', '70, 10, 80, 7, 90, 4, 100, A. Berapakah A?', 'A. 1', 'B. 2', 'C. 90', 'D. 110', 'A', '', 'aktif'),
(396, 2, 4, '', 'P – Q – 9 – 16 – 25 – 36 – 49. Berapakah nilai P dan Q?', 'A. 0 dan 2', 'B. 1 dan 4', 'C. 2 dan 5', 'D. 3 dan 6', 'B', '', 'aktif'),
(397, 2, 4, '', 'Suatu seri huruf terdiri dari: C B A D E F I H G J K L O…..  Huruf seri selanjutnya adalah :', 'A. M N', 'B. N M', 'C. O M', 'D. M O', 'B', '', 'aktif'),
(398, 2, 4, '', 'Suatu seri huruf terdiri dari:   a b b c d e e f g h h i … Huruf/seri selanjutnya adalah', 'A. I', 'B. J', 'C. K', 'D. L', 'B', '', 'aktif'),
(399, 2, 4, '', 'Tiga angka berikutnya untuk rangkaian 1 2 9 3 4 9 5, adalah', 'A. 6 9 7', 'B. 7 9 8', 'C. 9 7 8', 'D. 6 7 8', 'A', '', 'aktif'),
(400, 2, 4, '', 'Sebuah rangkaian angka adalah seperti beri‐kut: 11 19 27 9 17 25 7. Tiga angka berikutnya adalah:', 'A. 12 23 5 ', 'B. 23 31 39', 'C. 23 31 5', 'D. 23 5 13', 'A', '', 'aktif'),
(401, 2, 4, '', 'Suatu seri angka terdiri dari: 2 3 4 4 8 6 10 7 14 9 16 10 20 12. Dua angka berikutnya adalah', 'A. 13, 22', 'B. 22, 13', 'C. 20, 12', 'D. 24, 12', 'B', '', 'aktif'),
(402, 2, 4, '', 'Suatu seri: 0, 6, 6, 20, 20, .... seri selanjutnya adalah……', 'A. 34', 'B. 38', 'C. 42', 'D. 46', 'C', '', 'aktif'),
(403, 2, 4, '', '26  27  29  32  ...  ... 40  38  35  31  26', 'A. 34 dan 40', 'B. 40 dan 36', 'C. 41 dan 30', 'D. 36 dan 41', 'D', '', 'aktif'),
(404, 2, 4, '', '625 – 1296 – 25 – 36 – 5 – ....', 'A. 8', 'B. 4', 'C. 6', 'D. 10', 'C', '', 'aktif'),
(405, 2, 4, '', '50 – 40 – 100 – 90 – 50 –  .... ', 'A.  140', 'B. 100', 'C. 80', 'D. 60', 'A', '', 'aktif'),
(406, 2, 4, '', 'Suatu seri : 3‐3‐6‐9‐15‐24‐...‐... seri selanjutnya :', 'A. 33 55 ', 'B. 31 51', 'C. 36 73', 'D. 39 63', 'D', '', 'aktif'),
(407, 2, 5, '', 'Berapa umur nenek 10 tahun ke depan, apabila 3 tahun yang lalu umurnya 60 tahun?', 'A. 60 Tahun', 'B. 64 Tahun', 'C. 70 Tahun', 'D. 73 Tahun', 'D', '', 'aktif'),
(408, 2, 5, '', 'Pada tes masuk perguruan tinggi, nilai untuk jawaban benar adalah 3, jawaban\nsalah adalah ‐1, dan tidak dijawab adalah 0 (nol). Ririn menjawab dengan benar\nsebanyak 65 soal dan tidak menjawab 8 soal dari 100 soal yang diberikan. Total\nskor yang diperoleh Ririn adalah ....', 'A. 125', 'B. 130', 'C. 155', 'D. 168', 'D', '', 'aktif'),
(409, 2, 5, '', 'Seorang pedagang menjual barang dagangan seharga Rp 80.000,‐ dan ia memperoleh laba 25% dari harga beli. Berapakah harga beli tersebut?', 'A. 100.000', 'B. 96.000', 'C. Rp. 64.000', 'D. Rp. 80.000', 'C', '', 'aktif'),
(410, 2, 5, '', 'Nilai ujian Tono termasuk dalam urutan 12 dari atas dan dari bawah. Ada berapa siswa di kelas Tono?', 'A. 20', 'B. 22', 'C. 23 ', 'D. 28', 'D', '', 'aktif'),
(411, 2, 5, '', '204,9 : 54,7 = ....', 'A. 4,77', 'B. 3,74', 'C. 4,07', 'D. 3,87', 'B', '', 'aktif'),
(412, 2, 5, '', 'Pak Didi membagikan 288 buah buku kepada 8  kelompok. Masing‐masing kelompok beranggotakan 4 anak. Maka, setiap anggota menerima ….', 'A. 9 Buku', 'B. 11 Buku', 'C. 12 Buku', 'D. 13 Buku', 'A', '', 'aktif'),
(413, 2, 5, '', 'Skala pada peta adalah 1 : 500.000. Jarak kota X ke kota Y adalah 20 cm, maka jarak sebenarnya adalah ... cm', 'A. 1000 km', 'B. 500 km', 'C. 250 km', 'D. 100 km', 'D', '', 'aktif'),
(414, 2, 5, '', 'Tuti memperoleh nilai sebagai berikut 7, 6, 6, 8, 7, 9, 6, 7 dalam delapan mata pelajaran. Nilai rata‐rata Tuti adalah ..', 'A. 5', 'B. 6', 'C. 7', 'D. 8', 'C', '', 'aktif'),
(415, 2, 5, '', 'Sebuah mobil berangkat dari kota G ke kota F dengan kecepatan 120 km/jam selam 3 jam. Mobil yang lain berangkat dari kota F ke kota G selama 4 jam. Berapa km/jam kecepatan mobil yang berangkat dari kota F?', 'A. 180 km/jam', 'B. 160 km/jam', 'C. 110 km/jam', 'D. 90 km/jam', 'D', '', 'aktif'),
(416, 2, 5, '', 'Karyo adalah seorang penjahit. Ia mampu membuat sebuah kemeja dalam waktu 3 jam. Berapa banyak kemeja yang mampu ia buat selama satu minggu?', 'A. 49 buah', 'B. 52 buah', 'C. 56 buah', 'D. 58 buah', 'C', '', 'aktif'),
(417, 2, 5, '', 'Fandy membeli 1 lusin kaos. Harga setiap lusin Rp 150.000. Jika Fandy membeli 28 kaos, berapa ia harus membayar?', 'A. Rp. 425.000', 'B. Rp. 380.000', 'C. Rp. 350.000', 'D. Rp. 295.000', 'C', '', 'aktif'),
(418, 2, 5, '', '3 x 92 – 42 = ....', 'A. 25', 'B. 11', 'C. -12', 'D. -17', 'C', '', 'aktif'),
(419, 2, 5, '', 'Jika Anda menabung Rp 7.000,00 sebulan selama 4 bulan. Berapa banyak yang yang ditabung?', 'A. Rp. 47.000', 'B. Rp. 280.000', 'C. Rp. 28.000', 'D. Rp. 17.000', 'C', '', 'aktif'),
(420, 3, 6, '', 'Semua mahasiswa Perguruan Tinggi memiliki Nomor Induk Mahasiswa. Andi seorang mahasiswa. Jadi..?', 'A. Andi mungkin memiliki nomor induk mahasiswa', 'B. Belum tentu Andi memiliki nomor induk mahasiswa', 'C. Andi memiliki nomor induk mahasiswa', 'D. Andi tidak memiliki nomor induk mahasiswa', 'C', '', 'aktif'),
(421, 3, 6, '', 'Sebagian perajin tempe mengeluhkan harga kedelai naik. Pak Anto seorang perajin tempe.', 'A. Pak Anto pasti mengeluhkan harga kedelai naik.', 'B. Pak Anto tidak mengeluhkan harga kedelai naik.', 'C. Harga kedelai bukanlah keluhan Pak Anto', 'D. Pak Anto mungkin ikut mengeluhkan harga kedelai \nnaik', 'D', '', 'aktif'),
(422, 3, 6, '', 'Semua pemain sepakbola yang berkebangsaan Italia berwajah tampan. John adalah pemain sepakbola berkebangsaan Inggris.', 'A. John bukanlah pemain sepakbola yang tampan', 'B. John adalah pemain sepakbola yang tampan', 'C. Meskipun bukan berkebangsaan Italia, John pasti berwajah tampan ', 'D. Tidak dapat ditarik kesimpulan', 'D', '', 'aktif'),
(423, 3, 6, '', 'Sebagian orang yang berminat menjadi politikus hanya menginginkan harta dan tahta. Rosyid tidak berminat menjadi politikus.', 'A. Rosyid tidak menginginkan harta dan tahta', 'B. Tahta bukanlah keinginan Rosyid, tapi harta \nmungkin ya', 'C. Rosyid menginginkan tahta tapi tidak berminat \nmenjadi politikus.', 'D. Tidak dapat ditarik kesimpulan', 'D', '', 'aktif'),
(424, 3, 6, '', 'Ivan lebih ringan beratnya daripada Wawan. Andika lebih berat daripada wawan.', 'A. Wawan adalah yang paling ringan dari ketiganya', 'B. Ivan mungkin saja sama beratnya dengan andika', 'C. Jika wawan memiliki berat 65 Kg. Mustahil andika \nmemiliki berat lebih dari 65 K', 'D. Jika ivan memiliki berat 65Kg. Mungkin saja \nandika memiliki berat lebih dari 65 Kg. ', 'D', '', 'aktif'),
(425, 3, 6, '', 'Tidak ada ikan lele yang punya sisik. Ikan lele memiliki sungut', 'A.  Ikan yang tidak bersisik pasti punya sungut', 'B. Ikan yang bersungut pasti tidak punya sisik', 'C. Sisik ada hubungannya dengan sungut ', 'D. Tidak bisa ditarik kesimpulan ', 'D', '', 'aktif'),
(426, 3, 6, '', 'Mustahil seorang wanita punya jenggot. Tidak setiap pria punya jenggot. A berada di kamar gelap dan hanya terlihat dagunya yang tidak berjenggot. Maka', 'A. A bukan pria ', 'B. Mustahil A adalah seorang wanita', 'C. A pasti seorang pria', 'D. A bisa seorang pria dan bisa pula seorang wanita', 'D', '', 'aktif'),
(427, 3, 6, '', 'Sebagian siswa SDN 02 suka bakso. Semua siswa SDN 02 suka soto. Jadi...', 'A. Siswa SDN 02 yang suka bakso pasti juga suka \nsoto', 'B. Siswa SDN 02 yang tidak suka soto suka bakso ', 'C. Belum tentu Siswa SDN 02 yang tidak suka bakso \nsuka soto ', 'D. Siswa SDN 02 yang suka soto pastilah juga suka \nbakso ', 'A', '', 'aktif'),
(428, 3, 6, '', 'Bila makan di warung Mbak Via harus bayar kontan. Erick lapar dan tidak punya uang siang ini...', 'A. Erick harus cari akal supaya bisa berhutang di \nwarung Mbak Via', 'B. Mbak Via pelit tidak mau dihutang', 'C. Erick bukanlah saudara Mbak Via, jadi tidak boleh \nmakan dengan cara berhutang', 'D. Erick tidak dapat makan di warung Mbak Via \nsiang ini', 'D', '', 'aktif'),
(429, 3, 6, '', 'Bowo menyukai program komputer Delphi. Ageng menyukai program komputer Visual Basic', 'A. Karena gengsi, Bowo tidak memilih program \nVisual Basic karena Ageng sudah memilihnya', 'B. Ageng ingin berbeda dari Bowo dalam hal \npenguasaan program komputer', 'C. Ageng tidak suka Delphi untuk menjaga citra \ndirinya agar tak ingin dikira ikut-ikutan Bowo \n', 'D. Tidak dapat diambil kesimpulan', 'E', '', 'aktif'),
(430, 3, 6, '', 'Indah lebih tinggi dari Ade, dan Sulastri lebih pendek dari Indah. Kesimpulan yang dapat diambil dari pernyataan di atas adalah?', 'A. a. Sulastri lebih tinggi dari Ade', 'B. b. Sulastri lebih pendek dari Ade', 'C. Sulastri sama tingginya dengan Ade', 'D. Sulastri dan Ade lebih pendek dari Indah', 'D', '', 'aktif'),
(431, 3, 7, '', 'Soal untuk no. 87 - 90. Ada 8 kotak peti, masing-masing diberi nomor 1 sampai 7. Buah jambu, melon, semangka, jeruk, mangga dan durian akan dimasukkan kedalam peti-peti tersebut dengan aturan sebagai berikut : • Durian harus dimasukkan ke peti nomor 4 • Semangka tidak boleh diletakkan tepat disamping melon  • Jeruk harus diletakkan disamping mangga.  Jika melon diletakkan di peti nomor 2, maka mana yang tidak boleh dilakukan ?:', 'A. Semangka diletakkan di nomor 3 ', 'B. Jeruk diletakkan di peti nomor 5', 'C. Mangga diletakkan di peti nomor 7', 'D. Semangka diletakkan di peti nomor 5', 'A', '', 'aktif'),
(432, 3, 7, '', 'Jika semangka diletakkan di peti nomor 6, dan jambu diletakkan di peti nomor 7, maka peti mana yang kosong ?', 'A. Peti nomor 5', 'B. Peti nomor 1', 'C. Peti nomor 2', 'D. Peti nomor 3', 'A', '', 'aktif'),
(433, 3, 7, '', 'Jika semangka diletakkan di peti nomor 5 dan jambu di nomor 6, dan melon di nomor 7, maka ada berapa kemungkinan pengaturan letak buah sesuai dengan aturan diatas ?', 'A. 3', 'B. 5', 'C. 6', 'D. 4', 'D', '', 'aktif'),
(434, 3, 7, '', 'Jika jambu diletakkan di nomor 1. jeruk di nomor 2, maka manakah yang tidak boleh ?', 'A. Semangka di nomor 3', 'B. Mangga di nomor 3', 'C. Semangka di nomor 5', 'D. Melon di nomor 7', 'A', '', 'aktif'),
(435, 3, 7, '', 'Sebuah perusahaan swasta yang tengah menawarkan pekerjaan memiliki satu dari enam kantor konsultan yang masing‐masing diwakili oleh Anwar, Bahtiar, Charles, Dadang, Endang dan Fahrial untuk melakukan presentasi mengenai penawaran mereka di hadapan pimpinan perusahaan swasta tersebut. Untuk menyamakan dengan masalah yang ditawarkan, maka masing‐masing wakil perusahaan hanya akan melakukan presentasi satu kali dan dibuat urutan sebagai berikut:\n\n‐  Bahtiar akan presentasi sebelum Charles\n‐  Charles akan presentasi pada urutan ke empat atau terakhir\n‐  Dadang akan presentasi setelah Anwar\n‐  Fahrial akan presentasi sebelum Dadang\n\n Dari urutan berikut ini, manakah yang memenuhi persyaratan tersebut:', 'A. Anwar, Fahrial, Charles, Dadang, Bahtiar, Endang', 'B. Bahtiar, Anwar, Fahrial, Endang, Dadang, Charles', 'C. Endang, Fahrial, Anwar, Bahtiar, Dadang, Charles', 'D. Endang, Fahrial, Anwar, Charles, Bahtiar, Dadang', 'B', '', 'aktif'),
(436, 3, 7, '', 'Manakah dari pernyataan berikut ini yang benar mengenai konsultan yang dapat presentasi setelah Charles?', 'A. Dadang', 'B. Endang', 'C. Dadang, Endang, Anwar ', 'D. Dadang, Endang, Fahrial', 'B', '', 'aktif'),
(437, 3, 7, '', 'Manakah dari pernyataan berikut ini yang kurang benar?', 'A. Anwar akan presentasi pada urutan pertama', 'B. Dadang akan presentasi pada urutan ke tiga', 'C. Endang akan presentasi pada urutan ke enam', 'D. Fahrial akan presentasi pada urutan ke enam', 'D', '', 'aktif'),
(438, 3, 7, '', 'Apabila Endang presentasi pada urutan ke empat, manakah dari pernyataan berikut ini yang benar mengenai urutan presentasi Fahrial?', 'A. Pertama, ke tiga', 'B. Ke dua, ke tiga', 'C. Pertama, ke dua, ke tiga', 'D. Pertama, ke dua, ke tiga, ke lima', 'C', '', 'aktif'),
(439, 3, 7, '', 'Apabila Bahtiar presentasi pada urutan ke lima, manakah dari pernyataan berikut ini yang paling tidak mungkin', 'A. Anwar presentasi pada urutan ke tiga', 'B. Faisal presentasi pada urutan ke empat', 'C. Dadang presentasi pada urutan ke empat', 'D. Endang presentasi pada urutan ke dua', 'B', '', 'aktif'),
(440, 3, 8, '', '<img src=\"http://localhost:8080/assets/img/tpa/1.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/1a.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/1b.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/1c.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/1d.png\" style=\"width:100px;height:100px\">', 'D', '', 'aktif'),
(441, 3, 8, '', '<img src=\"http://localhost:8080/assets/img/tpa/2.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/2a.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/2b.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/2c.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/2d.png\" style=\"width:100px;height:100px\">', 'C', '', 'aktif'),
(442, 3, 8, '', 'Perhatikan deretan gambar di bawah ini kemudian carilah satu gambar yang tidak sesuai dengan yang lainnya', '<img src=\"http://localhost:8080/assets/img/tpa/3a.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/3b.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/3c.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/3d.png\" style=\"width:100px;height:100px\">', 'B', '', 'aktif'),
(443, 3, 8, '', 'Pada gambar di bawah ini terdapat satu gambar yang tidak sesuai. Gambar manakah itu?', '<img src=\"http://localhost:8080/assets/img/tpa/4a.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/4b.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/4c.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/4d.png\" style=\"width:100px;height:100px\">', 'D', '', 'aktif'),
(444, 3, 8, '', 'Dari lima buah gambar di bawah ini terdapat satu gambar yang tidak sesuai dengan yang lainnya. Tunjukkan gambar yang tidak sesuai itu.', '<img src=\"http://localhost:8080/assets/img/tpa/5a.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/5b.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/5c.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/5d.png\" style=\"width:100px;height:100px\">', 'C', '', 'aktif'),
(445, 3, 8, '', 'Dari lima gambar di bawah ini, manakah gambar yang berbeda?', '<img src=\"http://localhost:8080/assets/img/tpa/6a.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/6b.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/6c.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/6c.png\" style=\"width:100px;height:100px\">', 'D', '', 'aktif'),
(446, 3, 8, '', '<img src=\"http://localhost:8080/assets/img/tpa/7.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/7a.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/7b.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/7c.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/7d.png\" style=\"width:100px;height:100px\">', 'A', '', 'aktif'),
(447, 3, 8, '', 'Pada gambar‐gambar di bawah ini terdapat satu buah gambar yang tidak sesuai dengan gambar yang lainnya. Gambar manakah itu?', '<img src=\"http://localhost:8080/assets/img/tpa/8a.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/8b.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/8c.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/8d.png\" style=\"width:100px;height:100px\">', 'D', '', 'aktif'),
(448, 3, 8, '', 'Dari gambar di bawah ini, manakah yang berbeda?', '<img src=\"http://localhost:8080/assets/img/tpa/9a.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/9b.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/9c.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/9d.png\" style=\"width:100px;height:100px\">', 'D', '', 'aktif'),
(449, 3, 8, '', 'Manakah gambar di bawah ini yang berbeda polanya?', '<img src=\"http://localhost:8080/assets/img/tpa/10a.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/10b.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/10c.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/10d.png\" style=\"width:100px;height:100px\">', 'D', '', 'aktif'),
(450, 3, 8, '', '<img src=\"http://localhost:8080/assets/img/tpa/11.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/11a.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/11b.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/11c.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/11d.png\" style=\"width:100px;height:100px\">', 'D', '', 'aktif'),
(451, 3, 8, '', '<img src=\"http://localhost:8080/assets/img/tpa/12.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/12a.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/12b.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/12c.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/12d.png\" style=\"width:100px;height:100px\">', 'B', '', 'aktif'),
(452, 3, 8, '', '<img src=\"http://localhost:8080/assets/img/tpa/13.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/13a.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/13b.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/13c.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/13d.png\" style=\"width:100px;height:100px\">', 'B', '', 'aktif'),
(453, 3, 8, '', '<img src=\"http://localhost:8080/assets/img/tpa/14.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/14a.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/14b.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/14c.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/14d.png\" style=\"width:100px;height:100px\">', 'D', '', 'aktif'),
(454, 3, 8, '', '<img src=\"http://localhost:8080/assets/img/tpa/15.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/15a.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/15b.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/15c.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/15d.png\" style=\"width:100px;height:100px\">', 'C', '', 'aktif'),
(455, 3, 8, '', '<img src=\"http://localhost:8080/assets/img/tpa/16.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/16a.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/16b.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/16c.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/16d.png\" style=\"width:100px;height:100px\">', 'B', '', 'aktif'),
(456, 3, 8, '', '<img src=\"http://localhost:8080/assets/img/tpa/17.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/17a.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/17b.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/17c.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/17d.png\" style=\"width:100px;height:100px\">', 'A', '', 'aktif'),
(457, 3, 8, '', '<img src=\"http://localhost:8080/assets/img/tpa/18.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/18a.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/18b.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/18c.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/18d.png\" style=\"width:100px;height:100px\">', 'D', '', 'aktif'),
(458, 3, 8, '', 'Tunjukkanlah salah satu gambar yang tidak sesuai dengan gambar‐gambar lainnya.', '<img src=\"http://localhost:8080/assets/img/tpa/19a.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/19b.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/19c.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/19d.png\" style=\"width:100px;height:100px\">', 'A', '', 'aktif'),
(459, 3, 8, '', '<img src=\"http://localhost:8080/assets/img/tpa/20.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/20a.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/20b.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/20c.png\" style=\"width:100px;height:100px\">', '<img src=\"http://localhost:8080/assets/img/tpa/20d.png\" style=\"width:100px;height:100px\">', 'A', '', 'aktif');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_admin_id_role_foreign` (`id_role`);

--
-- Indeks untuk tabel `tb_hasil`
--
ALTER TABLE `tb_hasil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_hasil_id_mahasiswa_foreign` (`id_mahasiswa`);

--
-- Indeks untuk tabel `tb_jenis_soal`
--
ALTER TABLE `tb_jenis_soal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_mahasiswa_id_role_foreign` (`id_role`);

--
-- Indeks untuk tabel `tb_soal`
--
ALTER TABLE `tb_soal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_soal_id_kategori_foreign` (`id_kategori`),
  ADD KEY `tb_soal_id_jenis_foreign` (`id_jenis`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_hasil`
--
ALTER TABLE `tb_hasil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_jenis_soal`
--
ALTER TABLE `tb_jenis_soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_soal`
--
ALTER TABLE `tb_soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=461;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD CONSTRAINT `tb_admin_id_role_foreign` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`);

--
-- Ketidakleluasaan untuk tabel `tb_hasil`
--
ALTER TABLE `tb_hasil`
  ADD CONSTRAINT `tb_hasil_id_mahasiswa_foreign` FOREIGN KEY (`id_mahasiswa`) REFERENCES `tb_mahasiswa` (`id`);

--
-- Ketidakleluasaan untuk tabel `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD CONSTRAINT `tb_mahasiswa_id_role_foreign` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`);

--
-- Ketidakleluasaan untuk tabel `tb_soal`
--
ALTER TABLE `tb_soal`
  ADD CONSTRAINT `tb_soal_id_jenis_foreign` FOREIGN KEY (`id_jenis`) REFERENCES `tb_jenis_soal` (`id`),
  ADD CONSTRAINT `tb_soal_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
