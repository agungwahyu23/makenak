-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Mar 2021 pada 15.46
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `riverprawn_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank`
--

CREATE TABLE `bank` (
  `Id_Bank` int(11) NOT NULL,
  `Nama_Bank` text NOT NULL,
  `Nama_Pemilik` text NOT NULL,
  `Nomor_Rekening` text NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bank`
--

INSERT INTO `bank` (`Id_Bank`, `Nama_Bank`, `Nama_Pemilik`, `Nomor_Rekening`, `createdDate`) VALUES
(2, 'BCA', 'Ryan Hartadi', '01812031233', '2021-02-20 18:29:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `blok_rumah`
--

CREATE TABLE `blok_rumah` (
  `Id_Blok` varchar(40) NOT NULL,
  `Id_Kode_Rumah` int(1) NOT NULL,
  `Id_Rumah` text NOT NULL,
  `status` int(1) NOT NULL COMMENT '1 = Tersedia , 2 = Booking , 3 = Terjual'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `blok_rumah`
--

INSERT INTO `blok_rumah` (`Id_Blok`, `Id_Kode_Rumah`, `Id_Rumah`, `status`) VALUES
('2IDF11pESkVWt9tGnrj5vovqWxAErVz1', 9, 'dc8GkNlpurvzpZkr5SKKVyYdTRYAXLvC', 1),
('3PP02W8IzKa9bKNEMFPXGOqWBLdBJ2ic', 11, '17paz2fImggMSJjF4fbBcIj5FnJ5aeqO', 1),
('5wUj8jCdoKmB2Cw3MVbDyvIJwV0tGTCW', 5, 'aCecyvLuNS8oIEziRftEVrXEAWSj3a43', 1),
('B2vvLNTHnejsNAdqG1Mg8K3nxctPyHf2', 3, 'OZTUv9AFtyaqbbSNqIwp6kIfVIBvC4jD', 1),
('ChxEGDoA5jVWaclM8Krl1hxHdopQV1NM', 6, 'aCecyvLuNS8oIEziRftEVrXEAWSj3a43', 1),
('i0033pAGaqNQXOIeRMwvdvPWKbCuTxJU', 10, '17paz2fImggMSJjF4fbBcIj5FnJ5aeqO', 1),
('JhbX2oX0Z3ewsTCVQBYhWnoKW0mHw6yT', 2, 'OZTUv9AFtyaqbbSNqIwp6kIfVIBvC4jD', 2),
('JyAEiT1cbDjRXhq7hqA3CCSZTtalLygf', 1, 'OZTUv9AFtyaqbbSNqIwp6kIfVIBvC4jD', 1),
('NDn0c9l8HWMtl6ZEod9VprkXqAaqeGba', 7, 'dc8GkNlpurvzpZkr5SKKVyYdTRYAXLvC', 1),
('yIt0HrMYtuLCme1EjulvMC2lSMOIO0rg', 4, 'aCecyvLuNS8oIEziRftEVrXEAWSj3a43', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `desain_interior`
--

CREATE TABLE `desain_interior` (
  `id_desain_interior` varchar(225) NOT NULL,
  `id_kategori_interior` varchar(225) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(225) NOT NULL,
  `create_at` datetime NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `desain_interior`
--

INSERT INTO `desain_interior` (`id_desain_interior`, `id_kategori_interior`, `nama`, `deskripsi`, `foto`, `create_at`, `status`) VALUES
('dvbIHqW9O95A2GAhzK4hmkatFUuivgs9', 'M3b97SIXpnBATuVT5mQaZMHZoq4vyYVP', 'desain interior baru 1', '<p>desain interior baru ruko 1</p>\r\n', 'WhatsApp_Image_2021-03-11_at_18_56_41_(1).jpeg', '2021-03-12 21:18:55', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `Id_Galeri` varchar(40) NOT NULL,
  `Id_Rumah` varchar(40) NOT NULL,
  `Galeri` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`Id_Galeri`, `Id_Rumah`, `Galeri`) VALUES
('7hubY8gSgH04FBH1tYP66FwTKsAXJvp7', 'aCecyvLuNS8oIEziRftEVrXEAWSj3a43', 'pic6.png'),
('7wLht1emrwklH6jzGrmgC3XjRuRvOq4H', 'aCecyvLuNS8oIEziRftEVrXEAWSj3a43', 'pic71.png'),
('b8n8aK9x4EK04ckBJiAV5IFV7v8j38W9', 'OZTUv9AFtyaqbbSNqIwp6kIfVIBvC4jD', 'Rectangle_13.png'),
('CYJIJ4wxC5GRsEzYmxgDHGeFgGrSHAiJ', 'dc8GkNlpurvzpZkr5SKKVyYdTRYAXLvC', 'pic3.png'),
('krjltvfUGj3ZJsXwgD5T3S4lbEyvZ6NV', '17paz2fImggMSJjF4fbBcIj5FnJ5aeqO', 'Rectangle_3.jpg'),
('LDxWe1oBmJ6NwVKblDYRv3ZJW5OIZ6ik', 'OZTUv9AFtyaqbbSNqIwp6kIfVIBvC4jD', 'Rectangle_14.png'),
('LezTigG5myVfWj1gMk0IZh4Th4IK1Yrh', 'OZTUv9AFtyaqbbSNqIwp6kIfVIBvC4jD', 'Rectangle_11.png'),
('MMB2DBE6D2JywvtdJDWgikxc2jMu2ksd', '17paz2fImggMSJjF4fbBcIj5FnJ5aeqO', 'Rectangle_1.jpg'),
('o9kGu6ME1yA05nicPoKUVqMSVAzya1Qs', 'OZTUv9AFtyaqbbSNqIwp6kIfVIBvC4jD', 'Rectangle_12.png'),
('S3BozmRQb9QnqsC5238PTVWyu3gagY9M', '17paz2fImggMSJjF4fbBcIj5FnJ5aeqO', 'Rectangle_2.jpg'),
('tx5Wiz20K1Ra0yIRu6U4OHAMaB8Z7yEi', 'dc8GkNlpurvzpZkr5SKKVyYdTRYAXLvC', 'pic5.png'),
('V4E4qbvhTZocxBcdLhOPa6XDBGGMyGVA', 'dc8GkNlpurvzpZkr5SKKVyYdTRYAXLvC', 'pic4.png'),
('X3eTi0b6omYEhQdd8nk5Pkcrq8JtmelW', 'aCecyvLuNS8oIEziRftEVrXEAWSj3a43', 'pic51.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(225) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `status`) VALUES
('9Bbt6tmEV31nKAIFkKhI4yGWecAP51qx', 'ruko', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_desain_interior`
--

CREATE TABLE `kategori_desain_interior` (
  `id_kategori_interior` varchar(225) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_desain_interior`
--

INSERT INTO `kategori_desain_interior` (`id_kategori_interior`, `nama_kategori`, `status`) VALUES
('M3b97SIXpnBATuVT5mQaZMHZoq4vyYVP', 'desain interior', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_desain_rumah`
--

CREATE TABLE `kategori_desain_rumah` (
  `id_kategori_rumah` varchar(225) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_desain_rumah`
--

INSERT INTO `kategori_desain_rumah` (`id_kategori_rumah`, `nama_kategori`, `status`) VALUES
('YWS7pBtWpn7HvDrqtN1Riz2MemY7YMEn', 'desain rumah', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kode_rumah`
--

CREATE TABLE `kode_rumah` (
  `Id_Kode` int(11) NOT NULL,
  `Kode_Rumah` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kode_rumah`
--

INSERT INTO `kode_rumah` (`Id_Kode`, `Kode_Rumah`) VALUES
(1, 'A1'),
(2, 'A2'),
(3, 'A3'),
(4, 'B1'),
(5, 'B2'),
(6, 'B3'),
(7, 'C1'),
(9, 'C2\r\n'),
(10, 'D1'),
(11, 'D2\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `masukkan`
--

CREATE TABLE `masukkan` (
  `Id_Masukkan` varchar(40) NOT NULL,
  `Fullname` text NOT NULL,
  `Email` text NOT NULL,
  `Subject` text NOT NULL,
  `Deskripsi` text NOT NULL,
  `CreatedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `masukkan`
--

INSERT INTO `masukkan` (`Id_Masukkan`, `Fullname`, `Email`, `Subject`, `Deskripsi`, `CreatedDate`) VALUES
('MaA2jzoGBmtxZLwRvfxyptT1i2O4Vseb', 'Ryan Hartadi', 'Kominfo@admin.com', '123', '12', '2021-02-21 09:46:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `partners`
--

CREATE TABLE `partners` (
  `Id_Partners` varchar(40) NOT NULL,
  `Nama_Partners` text NOT NULL,
  `Logo` text NOT NULL,
  `CreatedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `partners`
--

INSERT INTO `partners` (`Id_Partners`, `Nama_Partners`, `Logo`, `CreatedDate`) VALUES
('qKr2xktlY5EpMFBpSYvLatjIfqPCAroE', 'Ryan Hartadi', 'Rectangle_101.png', '2021-02-16 10:33:23'),
('uMnepwrfUGU1iwkYoXHk9t2zxbrZkGbZ', 'My Ob', 'client-1.png', '2021-02-20 21:14:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `Id_User` varchar(40) NOT NULL,
  `Nama` text NOT NULL,
  `Email` text NOT NULL,
  `Password` varchar(128) NOT NULL,
  `Pekerjaan` text NOT NULL,
  `Alamat` text NOT NULL,
  `No_Hp` varchar(16) NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `Status` int(1) NOT NULL,
  `is_valid` int(1) NOT NULL COMMENT '0 = Off 1 = On'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`Id_User`, `Nama`, `Email`, `Password`, `Pekerjaan`, `Alamat`, `No_Hp`, `CreatedDate`, `Status`, `is_valid`) VALUES
('XcfnRCqI4jYy5pQokvFUTm1djT8mpjhN', 'Ryan Hartadi123', 'admin123@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'admin1', '1231', '1231', '2021-02-16 09:37:47', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `profile`
--

CREATE TABLE `profile` (
  `Id_Profile` int(11) NOT NULL,
  `Nama_Kantor` text NOT NULL,
  `Alamat_Kantor` text NOT NULL,
  `Email` text NOT NULL,
  `No_Telp` text NOT NULL,
  `No_Telp2` text NOT NULL,
  `Instagram` text NOT NULL,
  `Deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `profile`
--

INSERT INTO `profile` (`Id_Profile`, `Nama_Kantor`, `Alamat_Kantor`, `Email`, `No_Telp`, `No_Telp2`, `Instagram`, `Deskripsi`) VALUES
(1, 'River Prawn Residence Kaliurang Jember', 'Jl. Kaliurang, Kec. Sumbersari, Kabupaten Jember, Jawa Timur 68124', 'Ryanhartadi999@gmail.com', '+6281359652164', '+6281359652164', 'riverprawnresidence', '<p>Hunian modern bergaya Eropa pertama di Jember</p>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rumah`
--

CREATE TABLE `rumah` (
  `Id_Rumah` varchar(40) NOT NULL,
  `Judul` text NOT NULL,
  `Blok` text NOT NULL,
  `Tipe` varchar(10) NOT NULL,
  `Luas_Tanah` varchar(20) NOT NULL,
  `Harga` int(11) NOT NULL,
  `Banner` text NOT NULL,
  `Deskripsi` text NOT NULL,
  `Status` int(1) NOT NULL COMMENT '1 = kosong , 2 = booking , 3 = terjual\r\n',
  `CreatedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rumah`
--

INSERT INTO `rumah` (`Id_Rumah`, `Judul`, `Blok`, `Tipe`, `Luas_Tanah`, `Harga`, `Banner`, `Deskripsi`, `Status`, `CreatedDate`) VALUES
('17paz2fImggMSJjF4fbBcIj5FnJ5aeqO', 'Rumah Baik', '', '36', '6 m x 12 m', 295000000, 'dummy-house.jpeg', '<p>Rumah Tipe 6 m x 12 m</p>\r\n', 1, '2021-02-18 12:05:54'),
('aCecyvLuNS8oIEziRftEVrXEAWSj3a43', 'Tipe rumah 40', '', '40', '6 m x 14 m ', 350000000, 'dummy-house.jpeg', '<p>Rumah Bagus ukuran 6 x 14</p>\r\n', 1, '2021-02-20 19:01:53'),
('dc8GkNlpurvzpZkr5SKKVyYdTRYAXLvC', 'Rumah Tipe 45', '', '45', '7 m x 12 m', 395000000, 'dummy-house.jpeg', '<p>Rumah ala eropa ukuran 7 m x 12 m</p>\r\n', 1, '2021-02-18 12:57:08'),
('OZTUv9AFtyaqbbSNqIwp6kIfVIBvC4jD', 'Ruko', '', 'Ruko', '120 m x 120 m', 200000000, '6e2b434aa73f735a778d12bbc8edff7d.jpg', '<p>Ruko Besar, Siap untuk membuka bisnis baru</p>\r\n', 1, '2021-02-20 19:08:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_rumah`
--

CREATE TABLE `transaksi_rumah` (
  `Id_Transaksi` varchar(40) NOT NULL,
  `Id_Blok` varchar(40) NOT NULL,
  `Nama_Lengkap` text NOT NULL,
  `Email` text NOT NULL,
  `No_Telp` text NOT NULL,
  `Alamat` text NOT NULL,
  `Pekerjaan` text NOT NULL,
  `Foto_KTP` text NOT NULL,
  `Id_Bank` int(11) NOT NULL,
  `Foto_Bukti_TF` text NOT NULL,
  `Pembayaran` text NOT NULL,
  `Status` int(1) NOT NULL COMMENT '1 = Booked , 2 = Selesai , 3 = Batalkan 4 = Berlangsung',
  `Baru` int(1) NOT NULL COMMENT '1 = Baru 2 = Tidak',
  `CreatedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi_rumah`
--

INSERT INTO `transaksi_rumah` (`Id_Transaksi`, `Id_Blok`, `Nama_Lengkap`, `Email`, `No_Telp`, `Alamat`, `Pekerjaan`, `Foto_KTP`, `Id_Bank`, `Foto_Bukti_TF`, `Pembayaran`, `Status`, `Baru`, `CreatedDate`) VALUES
('CwMzAra5jUUwwHdcZpRPxN0HM9lqBdaB', 'JhbX2oX0Z3ewsTCVQBYhWnoKW0mHw6yT', 'Ryan Hartadi', 'Ryanhartadi999@gmail.com', '081359652164', 'Jl.Nias Raya2', 'admin', '6807873dcc6ff9f5b4bd9d0253aea3df.png', 2, '13e7c05a6bff63fbaa1e4bacd15b8bd6.png', 'Cash Tempo', 1, 2, '2021-03-02 15:41:04');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`Id_Bank`);

--
-- Indeks untuk tabel `blok_rumah`
--
ALTER TABLE `blok_rumah`
  ADD PRIMARY KEY (`Id_Blok`);

--
-- Indeks untuk tabel `desain_interior`
--
ALTER TABLE `desain_interior`
  ADD PRIMARY KEY (`id_desain_interior`),
  ADD KEY `id_kategori_interior` (`id_kategori_interior`);

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`Id_Galeri`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `kategori_desain_interior`
--
ALTER TABLE `kategori_desain_interior`
  ADD PRIMARY KEY (`id_kategori_interior`);

--
-- Indeks untuk tabel `kategori_desain_rumah`
--
ALTER TABLE `kategori_desain_rumah`
  ADD PRIMARY KEY (`id_kategori_rumah`);

--
-- Indeks untuk tabel `kode_rumah`
--
ALTER TABLE `kode_rumah`
  ADD PRIMARY KEY (`Id_Kode`);

--
-- Indeks untuk tabel `masukkan`
--
ALTER TABLE `masukkan`
  ADD PRIMARY KEY (`Id_Masukkan`);

--
-- Indeks untuk tabel `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`Id_Partners`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`Id_User`);

--
-- Indeks untuk tabel `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`Id_Profile`);

--
-- Indeks untuk tabel `rumah`
--
ALTER TABLE `rumah`
  ADD PRIMARY KEY (`Id_Rumah`);

--
-- Indeks untuk tabel `transaksi_rumah`
--
ALTER TABLE `transaksi_rumah`
  ADD PRIMARY KEY (`Id_Transaksi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bank`
--
ALTER TABLE `bank`
  MODIFY `Id_Bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kode_rumah`
--
ALTER TABLE `kode_rumah`
  MODIFY `Id_Kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `profile`
--
ALTER TABLE `profile`
  MODIFY `Id_Profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
