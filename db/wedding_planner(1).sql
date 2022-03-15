-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Mar 2022 pada 12.01
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wedding_planner`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama`, `username`, `password`, `status`) VALUES
(1, 'Mira A', 'mira', 'mira123', 'Admin'),
(2, 'Mira', 'mira10', 'mira321', 'Pemilik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `chat`
--

CREATE TABLE `chat` (
  `id` int(50) NOT NULL,
  `id_pelanggan` int(50) NOT NULL,
  `pesan_masuk` text NOT NULL,
  `pesan_keluar` text NOT NULL,
  `time` datetime DEFAULT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `chat`
--

INSERT INTO `chat` (`id`, `id_pelanggan`, `pesan_masuk`, `pesan_keluar`, `time`, `status`) VALUES
(1, 1, '<b>Bukti Pembayaran berhasil diupload!</b><br> Pembayaran kamu akan dikonfirmasi oleh SUSIE Make Up.', '', '2021-11-28 07:24:25', 'Read'),
(2, 1, 'Terima kasih telah melaukan pembayaran.', '', '2021-11-28 07:32:10', 'Read'),
(3, 1, '<b>Bukti Pembayaran berhasil diupload!</b><br> Pembayaran kamu akan dikonfirmasi oleh SUSIE Make Up.', '', '2021-11-28 07:42:31', 'Read'),
(4, 1, '<b>Bukti Pembayaran berhasil diupload!</b><br> Pembayaran kamu akan dikonfirmasi oleh SUSIE Make Up.', '', '2021-11-30 11:24:23', 'Read'),
(5, 2, '<b>Bukti Pembayaran berhasil diupload!</b><br> Pembayaran kamu akan dikonfirmasi oleh SUSIE Make Up.', '', '2021-11-30 12:03:26', 'Read'),
(6, 2, 'Terima kasih telah melaukan pembayaran.', '', '2021-12-01 07:45:33', 'Read'),
(7, 2, '<b>Bukti Pembayaran berhasil diupload!</b><br> Pembayaran kamu akan dikonfirmasi oleh SUSIE Make Up.', '', '2022-01-20 05:51:52', 'Read'),
(8, 2, 'Terima kasih telah melaukan pembayaran.', '', '2022-01-20 05:52:33', 'Read'),
(9, 4, '<b>Bukti Pembayaran berhasil diupload!</b><br> Pembayaran kamu akan dikonfirmasi oleh SUSIE Make Up.', '', '2022-01-30 08:26:12', 'Read'),
(10, 4, '', 'baik kak', '2022-01-30 08:26:49', 'Read'),
(11, 4, 'Terima kasih telah melaukan pembayaran.', '', '2022-01-30 08:34:45', 'Read'),
(12, 4, '<b>Bukti Pembayaran berhasil diupload!</b><br> Pembayaran kamu akan dikonfirmasi oleh SUSIE Make Up.', '', '2022-01-30 08:42:52', 'Read'),
(13, 4, 'Terima kasih telah melaukan pembayaran.', '', '2022-01-30 08:43:22', 'Read'),
(14, 4, '<b>Bukti Pembayaran berhasil diupload!</b><br> Pembayaran kamu akan dikonfirmasi oleh SUSIE Make Up.', '', '2022-01-30 08:48:11', 'Read'),
(15, 4, 'Terima kasih telah melaukan pembayaran.', '', '2022-01-30 08:49:02', 'Read'),
(16, 4, '<b>Bukti Pembayaran berhasil diupload!</b><br> Pembayaran kamu akan dikonfirmasi oleh SUSIE Make Up.', '', '2022-01-30 04:22:09', 'Read'),
(17, 4, 'Terima kasih telah melaukan pembayaran.', '', '2022-01-30 04:22:49', 'Read'),
(18, 3, '<b>Bukti Pembayaran berhasil diupload!</b><br> Pembayaran kamu akan dikonfirmasi oleh SUSIE Make Up.', '', '2022-01-30 09:39:14', 'Read'),
(19, 3, 'Terima kasih telah melaukan pembayaran.', '', '2022-01-30 09:39:35', 'Read'),
(20, 3, '<b>Bukti Pembayaran berhasil diupload!</b><br> Pembayaran kamu akan dikonfirmasi oleh SUSIE Make Up.', '', '2022-01-30 09:41:03', 'Read'),
(21, 3, 'Terima kasih telah melaukan pembayaran.', '', '2022-01-30 09:41:33', 'Read'),
(22, 5, '<b>Bukti Pembayaran berhasil diupload!</b><br> Pembayaran kamu akan dikonfirmasi oleh SUSIE Make Up.', '', '2022-01-30 10:04:03', 'Read'),
(23, 5, 'Terima kasih telah melaukan pembayaran.', '', '2022-01-30 10:06:23', 'Read'),
(24, 5, '<b>Bukti Pembayaran berhasil diupload!</b><br> Pembayaran kamu akan dikonfirmasi oleh SUSIE Make Up.', '', '2022-01-30 10:07:03', 'Read'),
(25, 5, 'Terima kasih telah melaukan pembayaran.', '', '2022-01-30 10:07:35', 'Read'),
(26, 5, '<b>Bukti Pembayaran berhasil diupload!</b><br> Pembayaran kamu akan dikonfirmasi oleh SUSIE Make Up.', '', '2022-01-30 10:08:40', 'Read'),
(27, 5, 'Terima kasih telah melaukan pembayaran.', '', '2022-01-30 10:08:52', 'Read'),
(28, 6, '<b>Bukti Pembayaran berhasil diupload!</b><br> Pembayaran kamu akan dikonfirmasi oleh SUSIE Make Up.', '', '2022-01-31 09:00:01', 'Read'),
(29, 6, 'Terima kasih telah melaukan pembayaran.', '', '2022-01-31 09:03:43', 'Read'),
(30, 6, '<b>Bukti Pembayaran berhasil diupload!</b><br> Pembayaran kamu akan dikonfirmasi oleh SUSIE Make Up.', '', '2022-01-31 09:05:58', 'Read'),
(31, 6, 'Terima kasih telah melaukan pembayaran.', '', '2022-01-31 09:07:28', 'Read'),
(32, 7, '<b>Bukti Pembayaran berhasil diupload!</b><br> Pembayaran kamu akan dikonfirmasi oleh SUSIE Make Up.', '', '2022-01-31 02:19:21', 'Read'),
(33, 7, 'Terima kasih telah melaukan pembayaran.', '', '2022-01-31 02:21:05', 'Read'),
(34, 8, '<b>Bukti Pembayaran berhasil diupload!</b><br> Pembayaran kamu akan dikonfirmasi oleh SUSIE Make Up.', '', '2022-03-15 05:54:10', 'Read'),
(35, 8, 'Terima kasih telah melaukan pembayaran.', '', '2022-03-15 05:55:50', 'Read');

-- --------------------------------------------------------

--
-- Struktur dari tabel `diskon`
--

CREATE TABLE `diskon` (
  `id` int(50) NOT NULL,
  `id_katalog` varchar(100) NOT NULL,
  `nama_diskon` varchar(100) NOT NULL,
  `ket` text NOT NULL,
  `diskon` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `diskon`
--

INSERT INTO `diskon` (`id`, `id_katalog`, `nama_diskon`, `ket`, `diskon`) VALUES
(1, 'BRG006', 'Diskon Awal Tahun', '', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `feedback`
--

CREATE TABLE `feedback` (
  `id` int(50) NOT NULL,
  `id_penyewaan` int(50) NOT NULL,
  `id_pelanggan` int(50) NOT NULL,
  `ulasan` text NOT NULL,
  `rate` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `feedback`
--

INSERT INTO `feedback` (`id`, `id_penyewaan`, `id_pelanggan`, `ulasan`, `rate`) VALUES
(1, 1, 1, 'Dekorasi Bagus', 5),
(3, 5, 6, 'good', 5),
(4, 2, 2, 'sangat memuaskan', 5),
(5, 4, 4, 'sangat puas ', 5),
(6, 3, 3, 'bagus', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery`
--

CREATE TABLE `gallery` (
  `id` int(50) NOT NULL,
  `id_katalog` varchar(50) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gallery`
--

INSERT INTO `gallery` (`id`, `id_katalog`, `img`) VALUES
(1, 'BRG001', 'wedding1.jpg,wedding2.jpg'),
(2, 'BRG002', 'olivia-bauso-30UOqDM5QW0-unsplash.jpg,photos-by-lanty-O38Id_cyV4M-unsplash.jpg'),
(4, 'BRG001', 'WhatsApp Image 2021-07-28 at 2.18.40 PM.jpeg'),
(5, 'BRG001', '1636285662766.jpg,1636285991279.jpg'),
(6, 'BRG001', '1636285066982.jpg,1636285066999.jpg,1636285067013.jpg,1636285067027.jpg,1636285067039.jpg,1636285067057.jpg,1636285067076.jpg,1636285067094.jpg,1636285991279.jpg'),
(7, 'BRG001', '1636288134378.jpg,1636288134394.jpg,1636288134411.jpg'),
(8, 'BRG004', '1636285067114.jpg,1636285067128.jpg,1636285067148.jpg,1636285067171.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `katalog_produk`
--

CREATE TABLE `katalog_produk` (
  `id` varchar(100) NOT NULL,
  `katalog_produk` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` bigint(50) NOT NULL,
  `stok` int(50) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `katalog_produk`
--

INSERT INTO `katalog_produk` (`id`, `katalog_produk`, `deskripsi`, `harga`, `stok`, `gambar`) VALUES
('BRG001', 'Paket Make Up + Attire (9 Jt)', '<h3><strong>MAKE UP + ATTIRE</strong></h3>\r\n\r\n<ol>\r\n	<li>Kebaya Akad 1 Set</li>\r\n	<li>Gaun Resepsi 1 Set</li>\r\n	<li>Beskap / Jas Resepsi 1 Set</li>\r\n	<li>Kebaya Orang Tua + Make Up</li>\r\n	<li>Beskap / Jas Orang Tua</li>\r\n	<li>Kebaya Ibu Besan + Make Up</li>\r\n	<li>Beskap / Jas Bapak Besan</li>\r\n	<li>Pagar Ayu 2</li>\r\n	<li>Pagar Bagus 1</li>\r\n	<li>Kawih / Kidung Tunggal</li>\r\n	<li>Melati Fresh</li>\r\n</ol>\r\n', 10000000, 1, 'banner.jpg'),
('BRG002', 'Paket Make Up + Attire 2  (12 Jt)', '<h3><strong>MAKE UP + ATTIRE</strong></h3>\r\n\r\n<ol>\r\n	<li>Kebaya Akad 1 Set</li>\r\n	<li>Gaun Resepsi 2 Set</li>\r\n	<li>Beskap / Jas Akad 1 Set</li>\r\n	<li>Beskap / Jas Resepsi 2 Set</li>\r\n	<li>Kebaya Orang Tua + Make Up</li>\r\n	<li>Beskap / Jas Orang Tua</li>\r\n	<li>Kebaya Ibu besan + Make Up</li>\r\n	<li>Beskap / Jas Bapak Besan</li>\r\n	<li>Pagar Ayu 4</li>\r\n	<li>Pagar Bagus 1</li>\r\n	<li>Kawih / Kidung Tunggal</li>\r\n	<li>Melati Fresh</li>\r\n</ol>\r\n', 12000000, 1, 'b2.jpg'),
('BRG003', 'Paket Rumah 14 Jt (Dekorasi+Make Up+Attire)', '<p><strong>DEKORASI+ MAKE UP + ATTIRE</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ol>\r\n	<li>&nbsp;&nbsp;&nbsp; Dekorasi Pelaminan 6 Meter</li>\r\n	<li>&nbsp;&nbsp;&nbsp; Dekorasi Kamar Pengantin</li>\r\n	<li>&nbsp;&nbsp;&nbsp; Gate Masuk</li>\r\n	<li>&nbsp;&nbsp;&nbsp; Taman Minimalis</li>\r\n	<li>&nbsp;&nbsp;&nbsp; Kabaya Akad 1 Set, 2 Kebaya / Gaun Resepsi</li>\r\n	<li>&nbsp;&nbsp;&nbsp; Beskap / Jas Akad 1 Set,&nbsp; Resepsi 2 Set</li>\r\n	<li>&nbsp;&nbsp;&nbsp; Kebaya Ibu Hajat, ibu Besan + Make Up</li>\r\n	<li>&nbsp;&nbsp;&nbsp; Beskap Pak Hajat dan Besan</li>\r\n	<li>&nbsp;&nbsp;&nbsp; Pagar Ayu 2 ( Make up + Kebaya)</li>\r\n	<li>&nbsp;&nbsp;&nbsp; Pagar Bagus 1</li>\r\n	<li>&nbsp;&nbsp;&nbsp; Kidung Tunggal</li>\r\n	<li>&nbsp;&nbsp;&nbsp; Melati Fresh</li>\r\n	<li>&nbsp;&nbsp;&nbsp; Payung</li>\r\n	<li>&nbsp;&nbsp;&nbsp; Free Hand Bouqet</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n', 14000000, 10, 'wedding1.jpg'),
('BRG004', 'Paket Rumah 17 Jt (Dekorasi+Make Up+Attire)', '<h3><strong>DEKORASI + MAKE UP + ATTIRE</strong></h3>\r\n\r\n<ol>\r\n	<li>Dekorasi Pelaminan 6 Meter</li>\r\n	<li>Dekorasi Kamar Pengantin</li>\r\n	<li>Gate Masuk</li>\r\n	<li>Taman Minimaslis</li>\r\n	<li>Foto Booth</li>\r\n	<li>Siraman (alat, team pemandu, melati, baju, make up)</li>\r\n	<li>Dekorasi SIraman</li>\r\n	<li>Kebaya Akad 1 Set</li>\r\n	<li>2 Kebaya / Gaun Resepsi</li>\r\n	<li>Beskap / Jas Akad 1 Set</li>\r\n	<li>Beskap / Jas Resepsi 2 Set</li>\r\n	<li>Kebaya Ibu Hajat, Besan + Make up</li>\r\n	<li>Beskap Bapak Hajat, Besan</li>\r\n	<li>Pagar Ayu 4 (Make Up + Kebaya)</li>\r\n	<li>Pagar Bagus 1, Kidung Tunggal</li>\r\n	<li>Melati Fresh, Payung, (Free Hand Bouqet)</li>\r\n</ol>\r\n', 17000000, 9, 'wedding1.jpg'),
('BRG005', 'Paket Gedung 18 Jt  (Dekorasi+Make Up+Attire)', '<h3><strong>DEKORASI + MAKE UP + ATTIRE</strong></h3>\r\n\r\n<ol>\r\n	<li>Dekorasi Pelaminan 8 Meter</li>\r\n	<li>Dekorasi Kamar Pengantin</li>\r\n	<li>Gate Masuk</li>\r\n	<li>Taman + Bunga Hidup</li>\r\n	<li>Foto Booth</li>\r\n	<li>Karpet Jalan</li>\r\n	<li>Set Akad</li>\r\n	<li>Kebaya Akad 1 Set</li>\r\n	<li>2 Kebaya / Gaun Resepsi</li>\r\n	<li>Beskap / Jas Akad 1 Set</li>\r\n	<li>Beskap / Jas Resepsi 2 Set</li>\r\n	<li>Kebaya Ibu Hajat, Besan + Make up</li>\r\n	<li>Beskap Bapak Hajat, Besan</li>\r\n	<li>Pagar Ayu 4 (Make Up + Kebaya)</li>\r\n	<li>Pagar Bagus 1, Kidung Tunggal</li>\r\n	<li>Melati Fresh, Payung, Hand Bouqet, Softlens</li>\r\n</ol>\r\n', 18000000, 10, 'wedding1.jpg'),
('BRG006', 'Paket Gedung 20 Jt (Dekorasi+Make Up+Attire) ', '<h3><strong>DEKORASI + MAKE UP + ATTIRE</strong></h3>\r\n\r\n<ol>\r\n	<li>Dekorasi Pelaminan 8 Meter</li>\r\n	<li>Dekorasi Kamar Pengantin</li>\r\n	<li>Gate Masuk</li>\r\n	<li>Taman + Bunga Hidup</li>\r\n	<li>Foto Booth, Standing Flower</li>\r\n	<li>Karpet Jalan, Center Point</li>\r\n	<li>Set Akad</li>\r\n	<li>Kebaya Akad 1 Set</li>\r\n	<li>2 Kebaya / Gaun Resepsi</li>\r\n	<li>Beskap / Jas Akad 1 Set</li>\r\n	<li>Beskap / Jas Resepsi 2 Set</li>\r\n	<li>Kebaya Ibu Hajat, Besan + Make up</li>\r\n	<li>Beskap Bapak Hajat, Besan</li>\r\n	<li>Pagar Ayu 4 (Make Up + Kebaya)</li>\r\n	<li>Pagar Bagus 1, Kidung Tunggal</li>\r\n	<li>Melati Fresh, Payung, Hand Bouqet, Softlens</li>\r\n</ol>\r\n', 20000000, 10, 'wedding1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `username`, `email`, `password`, `alamat`, `telp`) VALUES
(1, 'Mira anggraeni', 'miraanggraeni', 'miraanggrae@gmail.com', '123456', 'Jl.Ramajaksa Rt.03/01 Winduherang Kec.cigugur', '089775123654'),
(2, 'Noviyanti', 'noviyanti', 'asrikuningan27@gmail.com', '123456', 'Kunigan', '089771432654'),
(3, 'chika', 'chika1', 'asrikuningan27@gmail.com', '123456', 'kuningan', '089765431234'),
(4, 'dita', 'dita22', 'dita@gmail.com', 'dita123', 'Kuningan jawa barat', '087765432123'),
(5, 'DINI LIDYA', 'dini123', 'miraanggrae@gmail.com', 'dini123', 'ancaran kuningan jawa barat', '085667897543'),
(6, 'zulfa afifah', 'zulfaafifah', 'zulfaalfifah@gmail.com', 'zulfa123', 'kuningan jawa barat', '087654325667'),
(7, 'fauziah', 'fauziah', 'fauziah@gmail.com', '123456', 'Kuningan jawa barat', '085432789543'),
(8, 'serly', 'serly1234', 'serly@gmail.com', '123456', 'kuningan ', '089776543456');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(50) NOT NULL,
  `id_pelanggan` int(50) NOT NULL,
  `id_penyewaan` int(50) NOT NULL,
  `tgl_bayar` date DEFAULT NULL,
  `harga_total` bigint(20) NOT NULL,
  `bukti` varchar(100) NOT NULL,
  `bukti_lunas` text NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `id_pelanggan`, `id_penyewaan`, `tgl_bayar`, `harga_total`, `bukti`, `bukti_lunas`, `status`) VALUES
(1, 1, 1, '2021-11-28', 20000000, '1636286695674.jpg', '', 'Dibayar'),
(2, 2, 2, '2022-01-20', 20000000, '1636286678833.jpg', '1636286678810.jpg', 'Lunas'),
(3, 3, 3, '2021-12-06', 10000000, '1636286678810.jpg', '1636286678833.jpg', 'Lunas'),
(4, 4, 4, '2022-01-30', 17000000, '1636286678810.jpg', '1636286678833.jpg', 'Lunas'),
(5, 4, 5, '2022-01-30', 18000000, '1636286678810.jpg', '1636286695674.jpg', 'Lunas'),
(6, 3, 6, '2022-01-30', 18000000, '1636286678810.jpg', '1636286678833.jpg', 'Lunas'),
(7, 5, 7, '2022-01-30', 20000000, '1636286678833.jpg', '1636286678810.jpg', 'Lunas'),
(8, 5, 8, '2022-01-30', 10000000, '1636286678781.jpg', '', 'Dibayar'),
(9, 6, 9, '2022-01-31', 18000000, '1636286678810.jpg', '1636286695674.jpg', 'Lunas'),
(10, 7, 10, '2022-01-31', 18000000, '1636286678810.jpg', '', 'Dibayar'),
(11, 8, 11, '2022-03-15', 14000000, '1636286695674.jpg', '', 'Dibayar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyewaan`
--

CREATE TABLE `penyewaan` (
  `id` int(50) NOT NULL,
  `id_pelanggan` int(50) NOT NULL,
  `id_katalog` varchar(50) NOT NULL,
  `tgl_sewa` date NOT NULL,
  `alamat` text NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penyewaan`
--

INSERT INTO `penyewaan` (`id`, `id_pelanggan`, `id_katalog`, `tgl_sewa`, `alamat`, `status`) VALUES
(1, 1, 'BRG006', '2022-01-23', 'Jln. Ramajaksa Rt003/001 Kel. Winduherang', 'Dibayar'),
(2, 2, 'BRG006', '2022-01-08', 'jl. ramajaksa rt 03 rw 01 kel.winduherang ', 'Lunas'),
(3, 3, 'BRG001', '2022-01-07', 'KUNINGAN JAWA BARAT', 'Lunas'),
(4, 4, 'BRG004', '2022-04-20', 'kuningan jawa barat', 'Lunas'),
(5, 4, 'BRG005', '2022-03-23', 'perumahan cirendang kuningan jawa barat\r\n', 'Lunas'),
(6, 3, 'BRG005', '2022-03-02', 'kuningan jawa barat\r\n', 'Lunas'),
(7, 5, 'BRG006', '2022-04-30', 'ancaran kuningan jawa barat', 'Lunas'),
(8, 5, 'BRG001', '2022-04-29', 'ancaran kuningan', 'Dibayar'),
(9, 6, 'BRG005', '2022-03-27', 'kuningan jawa barat\r\n', 'Lunas'),
(10, 7, 'BRG005', '2022-03-14', 'kuningan jawa barat', 'Dibayar'),
(11, 8, 'BRG003', '2022-05-11', 'kuningan ', 'Dibayar');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `diskon`
--
ALTER TABLE `diskon`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `katalog_produk`
--
ALTER TABLE `katalog_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_penyewaan` (`id_penyewaan`);

--
-- Indeks untuk tabel `penyewaan`
--
ALTER TABLE `penyewaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id`),
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`id_penyewaan`) REFERENCES `penyewaan` (`id`);

--
-- Ketidakleluasaan untuk tabel `penyewaan`
--
ALTER TABLE `penyewaan`
  ADD CONSTRAINT `penyewaan_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
