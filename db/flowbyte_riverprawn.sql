-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 27, 2021 at 04:25 PM
-- Server version: 5.7.33-log
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flowbyte_riverprawn`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `Id_Bank` int(11) NOT NULL,
  `Nama_Bank` text NOT NULL,
  `Nama_Pemilik` text NOT NULL,
  `Nomor_Rekening` text NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`Id_Bank`, `Nama_Bank`, `Nama_Pemilik`, `Nomor_Rekening`, `createdDate`) VALUES
(2, 'BCA', 'Ryan Hartadi', '01812031233', '2021-02-20 18:29:25');

-- --------------------------------------------------------

--
-- Table structure for table `blok_rumah`
--

CREATE TABLE `blok_rumah` (
  `Id_Blok` varchar(40) NOT NULL,
  `Id_Kode_Rumah` int(1) NOT NULL,
  `Id_Rumah` text NOT NULL,
  `status` int(1) NOT NULL COMMENT '1 = Tersedia , 2 = Booking , 3 = Terjual'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blok_rumah`
--

INSERT INTO `blok_rumah` (`Id_Blok`, `Id_Kode_Rumah`, `Id_Rumah`, `status`) VALUES
('2IDF11pESkVWt9tGnrj5vovqWxAErVz1', 9, 'dc8GkNlpurvzpZkr5SKKVyYdTRYAXLvC', 1),
('3PP02W8IzKa9bKNEMFPXGOqWBLdBJ2ic', 11, '17paz2fImggMSJjF4fbBcIj5FnJ5aeqO', 3),
('5wUj8jCdoKmB2Cw3MVbDyvIJwV0tGTCW', 5, 'aCecyvLuNS8oIEziRftEVrXEAWSj3a43', 1),
('B2vvLNTHnejsNAdqG1Mg8K3nxctPyHf2', 3, 'OZTUv9AFtyaqbbSNqIwp6kIfVIBvC4jD', 1),
('ChxEGDoA5jVWaclM8Krl1hxHdopQV1NM', 6, 'aCecyvLuNS8oIEziRftEVrXEAWSj3a43', 1),
('i0033pAGaqNQXOIeRMwvdvPWKbCuTxJU', 10, '17paz2fImggMSJjF4fbBcIj5FnJ5aeqO', 1),
('JhbX2oX0Z3ewsTCVQBYhWnoKW0mHw6yT', 2, 'OZTUv9AFtyaqbbSNqIwp6kIfVIBvC4jD', 1),
('JyAEiT1cbDjRXhq7hqA3CCSZTtalLygf', 1, 'OZTUv9AFtyaqbbSNqIwp6kIfVIBvC4jD', 1),
('NDn0c9l8HWMtl6ZEod9VprkXqAaqeGba', 7, 'dc8GkNlpurvzpZkr5SKKVyYdTRYAXLvC', 1),
('yIt0HrMYtuLCme1EjulvMC2lSMOIO0rg', 4, 'aCecyvLuNS8oIEziRftEVrXEAWSj3a43', 1);

-- --------------------------------------------------------

--
-- Table structure for table `desain_interior`
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
-- Dumping data for table `desain_interior`
--

INSERT INTO `desain_interior` (`id_desain_interior`, `id_kategori_interior`, `nama`, `deskripsi`, `foto`, `create_at`, `status`) VALUES
('6QyeGO36Coo0cdUB8SyysuzOZo2L5EII', 'YnyrQBxdcN7cxtGfWt1KxGBxf8bBuKmJ', 'kamar 3', '<p>desain kamar tidur 3</p>\r\n', 'WhatsApp_Image_2021-03-14_at_11_11_27.jpeg', '2021-03-14 11:13:05', '1'),
('7eKMwQmtCNsfnQPYTA7vvyHHihhooDpW', 'YnyrQBxdcN7cxtGfWt1KxGBxf8bBuKmJ', 'kamar 1', '<p>desain kamar tidur 1</p>\r\n', 'WhatsApp_Image_2021-03-14_at_11_11_27_(2).jpeg', '2021-03-14 11:12:16', '1'),
('dvbIHqW9O95A2GAhzK4hmkatFUuivgs9', 'M3b97SIXpnBATuVT5mQaZMHZoq4vyYVP', 'desain interior baru 1', '<p>desain interior baru&nbsp;</p>\r\n', 'WhatsApp_Image_2021-03-14_at_10_30_18.jpeg', '2021-03-12 21:18:55', '2'),
('RQZTQZZ6B2RV30vVTwyzLGoUOIAtiuX9', 'lJjSaJTxO64gacIAlyPB6OQehTsWLqGv', 'dapur 1', '<p>desain dapur 1</p>\r\n', 'WhatsApp_Image_2021-03-14_at_11_51_17.jpeg', '2021-03-14 11:19:16', '1'),
('yiRyusIwOa8htBmfC0ccPlFf35H8lgoV', 'YnyrQBxdcN7cxtGfWt1KxGBxf8bBuKmJ', 'kamar 2', '<p>desain kamar tidur 2</p>\r\n', 'WhatsApp_Image_2021-03-14_at_11_11_27_(1).jpeg', '2021-03-14 11:12:38', '1');

-- --------------------------------------------------------

--
-- Table structure for table `desain_rumah`
--

CREATE TABLE `desain_rumah` (
  `id_desain_rumah` varchar(225) NOT NULL,
  `id_kategori_rumah` varchar(225) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `deskripsi` varchar(225) NOT NULL,
  `foto` varchar(225) NOT NULL,
  `create_at` datetime NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `desain_rumah`
--

INSERT INTO `desain_rumah` (`id_desain_rumah`, `id_kategori_rumah`, `nama`, `deskripsi`, `foto`, `create_at`, `status`) VALUES
('Ej7JlW9PqsNDhXVnwf0eRDS1rAaFjZcP', 'YWS7pBtWpn7HvDrqtN1Riz2MemY7YMEn', 'desain rumah baru', '<p>desain rumah deskripsi baru</p>\r\n', 'WhatsApp_Image_2021-02-14_at_19_45_35_(1).jpeg', '2021-03-13 18:16:43', '2'),
('l5tiVKSZxKHRn2S3Twq3ER7FeeamIVLB', 'YWS7pBtWpn7HvDrqtN1Riz2MemY7YMEn', 'desain rumah 2', '<p>deskripsi desain rumah 2&nbsp;</p>\r\n', 'WhatsApp_Image_2021-03-14_at_10_30_23.jpeg', '2021-03-14 11:59:04', '1'),
('QmQmHQTooKwMi53WhPxh7q2QF6IpSkzG', 'YWS7pBtWpn7HvDrqtN1Riz2MemY7YMEn', 'desain rumah 3', '<p>desain rumah baru 3</p>\r\n', 'WhatsApp_Image_2021-03-14_at_10_30_25.jpeg', '2021-03-14 11:59:24', '1'),
('RagoxyEk0riXcBQXGkXEAUnYiXKaNRai', 'NXfAZlPk36ebF53DVNrESmUIAIKsAo7A', 'house design', '<p>bagus</p>\r\n', 'WhatsApp_Image_2021-03-14_at_10_30_231.jpeg', '2021-03-17 19:54:08', '2');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `Id_Galeri` varchar(40) NOT NULL,
  `Id_Rumah` varchar(40) NOT NULL,
  `Galeri` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`Id_Galeri`, `Id_Rumah`, `Galeri`) VALUES
('2j0wqLhPzsqoATrkU6kSgKMWhocZ4AMW', 'dc8GkNlpurvzpZkr5SKKVyYdTRYAXLvC', 'WhatsApp_Image_2021-03-11_at_18_58_15_(1)1.jpeg'),
('2JZyG95OaQh77SVdB4C1WWwi3qQw42FS', '17paz2fImggMSJjF4fbBcIj5FnJ5aeqO', 'WhatsApp_Image_2021-02-14_at_19_45_35.jpeg'),
('90lz5CKRFXJ5qjaNwtnOqParOU44wcdL', 'dc8GkNlpurvzpZkr5SKKVyYdTRYAXLvC', 'WhatsApp_Image_2021-03-11_at_18_58_241.jpeg'),
('aWjUGgRpfcCmudQJPNTKvKyw8cGaPsQK', '17paz2fImggMSJjF4fbBcIj5FnJ5aeqO', 'WhatsApp_Image_2021-03-11_at_18_58_24.jpeg'),
('b8n8aK9x4EK04ckBJiAV5IFV7v8j38W9', 'OZTUv9AFtyaqbbSNqIwp6kIfVIBvC4jD', 'Rectangle_13.png'),
('b8UFnlyUEKQls0eKPwlM436VEi2ztoZ5', 'aCecyvLuNS8oIEziRftEVrXEAWSj3a43', 'WhatsApp_Image_2021-03-11_at_18_58_162.jpeg'),
('g7q0Hx7wbo2Mxm7XVJPB0ZH9LcxEhMVY', 'dc8GkNlpurvzpZkr5SKKVyYdTRYAXLvC', 'WhatsApp_Image_2021-03-11_at_18_58_151.jpeg'),
('grS84Xj675WekUaH2qjUIadk6LQgXyOl', 'aCecyvLuNS8oIEziRftEVrXEAWSj3a43', 'WhatsApp_Image_2021-02-14_at_19_45_352.jpeg'),
('HCMN5CAb0zwpOFplxJtxCAF4hQbwikbp', '17paz2fImggMSJjF4fbBcIj5FnJ5aeqO', 'dummy_rumah3.jpeg'),
('hKfWKZvqHunhprzeZKTJHlGt6xMZZxT2', 'dc8GkNlpurvzpZkr5SKKVyYdTRYAXLvC', 'WhatsApp_Image_2021-02-14_at_19_45_351.jpeg'),
('KR9eNmCR8yK5rmPnvp5D71U8AB6xTjAN', 'dc8GkNlpurvzpZkr5SKKVyYdTRYAXLvC', 'WhatsApp_Image_2021-03-11_at_18_56_441.jpeg'),
('LDxWe1oBmJ6NwVKblDYRv3ZJW5OIZ6ik', 'OZTUv9AFtyaqbbSNqIwp6kIfVIBvC4jD', 'Rectangle_14.png'),
('LezTigG5myVfWj1gMk0IZh4Th4IK1Yrh', 'OZTUv9AFtyaqbbSNqIwp6kIfVIBvC4jD', 'Rectangle_11.png'),
('LuuPPbAfRje7vlZ0FH07xTsOAV2RG0J1', 'aCecyvLuNS8oIEziRftEVrXEAWSj3a43', 'WhatsApp_Image_2021-03-11_at_18_58_14_(1)2.jpeg'),
('LXBY2Y3CK6yTSJGnDOCsMC48GLBhToud', 'aCecyvLuNS8oIEziRftEVrXEAWSj3a43', 'WhatsApp_Image_2021-03-11_at_18_56_442.jpeg'),
('MkuTDAwD77ivocfeUNDZqulHZCyonVZz', '17paz2fImggMSJjF4fbBcIj5FnJ5aeqO', 'WhatsApp_Image_2021-03-11_at_18_58_15_(1).jpeg'),
('o5XkM3lYUt0mA7gLLzvguAHMN2eYw0eI', 'dc8GkNlpurvzpZkr5SKKVyYdTRYAXLvC', 'WhatsApp_Image_2021-03-11_at_18_58_111.jpeg'),
('o9kGu6ME1yA05nicPoKUVqMSVAzya1Qs', 'OZTUv9AFtyaqbbSNqIwp6kIfVIBvC4jD', 'Rectangle_12.png'),
('puGwFpAEDkWspAzM8T1Cw3AnnpMyEzDZ', '17paz2fImggMSJjF4fbBcIj5FnJ5aeqO', 'WhatsApp_Image_2021-03-11_at_18_58_14_(1).jpeg'),
('QjpejZuxlEDNVOHeKCmhb22ECXvduCq1', 'aCecyvLuNS8oIEziRftEVrXEAWSj3a43', 'WhatsApp_Image_2021-03-11_at_18_58_242.jpeg'),
('rt3IyGwKdsXkxRlIWfzSoENdp5fxPXIc', 'dc8GkNlpurvzpZkr5SKKVyYdTRYAXLvC', 'WhatsApp_Image_2021-03-11_at_18_58_161.jpeg'),
('S7sg6KZ1FpXIsum36KyIdDn3XLmDI9GI', 'aCecyvLuNS8oIEziRftEVrXEAWSj3a43', 'WhatsApp_Image_2021-03-11_at_18_58_15_(1)2.jpeg'),
('tIRbRMdOjw9VwevXndTm9TmbIHFx8GM9', 'dc8GkNlpurvzpZkr5SKKVyYdTRYAXLvC', 'WhatsApp_Image_2021-03-11_at_18_58_14_(1)1.jpeg'),
('Tzn2zMRpVNy5Bs9b4SlDq2wLjcXh0CPx', '17paz2fImggMSJjF4fbBcIj5FnJ5aeqO', 'WhatsApp_Image_2021-03-11_at_18_58_15.jpeg'),
('uiFTUp7NfAM71YzKI4qA18Rpp4eTfFol', 'aCecyvLuNS8oIEziRftEVrXEAWSj3a43', 'dummy_rumah5.jpeg'),
('uxLTyR6POHAyZuW0p365YVZla1Dm8f58', 'aCecyvLuNS8oIEziRftEVrXEAWSj3a43', 'WhatsApp_Image_2021-03-11_at_18_58_152.jpeg'),
('v4lU2QzfNsThNrLvcSXHTe9N6z8uaE2I', '17paz2fImggMSJjF4fbBcIj5FnJ5aeqO', 'WhatsApp_Image_2021-03-11_at_18_56_44.jpeg'),
('VINTAP1zmH7G5aXiEBALn5cvoYghetBr', '17paz2fImggMSJjF4fbBcIj5FnJ5aeqO', 'WhatsApp_Image_2021-03-11_at_18_58_16.jpeg'),
('VkdxYYlP3dapIk38pe0LuhYv8oMEz3fL', '17paz2fImggMSJjF4fbBcIj5FnJ5aeqO', 'WhatsApp_Image_2021-03-11_at_18_58_11.jpeg'),
('YGKVBiPFCiQ4URrNv6tbcLvM89XpHmUZ', 'dc8GkNlpurvzpZkr5SKKVyYdTRYAXLvC', 'dummy_rumah4.jpeg'),
('ZSYCoaucoxHdgZq2NDnSjdpA166A2CZm', 'aCecyvLuNS8oIEziRftEVrXEAWSj3a43', 'WhatsApp_Image_2021-03-11_at_18_58_112.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(225) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `status`) VALUES
('9Bbt6tmEV31nKAIFkKhI4yGWecAP51qx', 'ruko', '1');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_desain_interior`
--

CREATE TABLE `kategori_desain_interior` (
  `id_kategori_interior` varchar(225) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_desain_interior`
--

INSERT INTO `kategori_desain_interior` (`id_kategori_interior`, `nama_kategori`, `status`) VALUES
('lJjSaJTxO64gacIAlyPB6OQehTsWLqGv', 'dapur', '1'),
('M3b97SIXpnBATuVT5mQaZMHZoq4vyYVP', 'desain interior', '1'),
('YnyrQBxdcN7cxtGfWt1KxGBxf8bBuKmJ', 'kamar tidur', '1');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_desain_rumah`
--

CREATE TABLE `kategori_desain_rumah` (
  `id_kategori_rumah` varchar(225) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_desain_rumah`
--

INSERT INTO `kategori_desain_rumah` (`id_kategori_rumah`, `nama_kategori`, `status`) VALUES
('NXfAZlPk36ebF53DVNrESmUIAIKsAo7A', 'desain rumah baru', '1'),
('YWS7pBtWpn7HvDrqtN1Riz2MemY7YMEn', 'desain rumah', '1');

-- --------------------------------------------------------

--
-- Table structure for table `kode_rumah`
--

CREATE TABLE `kode_rumah` (
  `Id_Kode` int(11) NOT NULL,
  `Kode_Rumah` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kode_rumah`
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
(11, 'D2\r\n'),
(13, 'D3');

-- --------------------------------------------------------

--
-- Table structure for table `masukkan`
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
-- Dumping data for table `masukkan`
--

INSERT INTO `masukkan` (`Id_Masukkan`, `Fullname`, `Email`, `Subject`, `Deskripsi`, `CreatedDate`) VALUES
('MaA2jzoGBmtxZLwRvfxyptT1i2O4Vseb', 'Ryan Hartadi', 'Kominfo@admin.com', '123', '12', '2021-02-21 09:46:40');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `Id_Partners` varchar(40) NOT NULL,
  `Nama_Partners` text NOT NULL,
  `Logo` text NOT NULL,
  `CreatedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`Id_Partners`, `Nama_Partners`, `Logo`, `CreatedDate`) VALUES
('qKr2xktlY5EpMFBpSYvLatjIfqPCAroE', 'Ryan Hartadi', 'Rectangle_101.png', '2021-02-16 10:33:23'),
('uMnepwrfUGU1iwkYoXHk9t2zxbrZkGbZ', 'My Ob', 'client-1.png', '2021-02-20 21:14:55');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
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
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`Id_User`, `Nama`, `Email`, `Password`, `Pekerjaan`, `Alamat`, `No_Hp`, `CreatedDate`, `Status`, `is_valid`) VALUES
('XcfnRCqI4jYy5pQokvFUTm1djT8mpjhN', 'Ryan Hartadi123', 'admin123@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'admin1', '1231', '1231', '2021-02-16 09:37:47', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengunjung`
--

CREATE TABLE `pengunjung` (
  `id_pengunjung` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengunjung`
--

INSERT INTO `pengunjung` (`id_pengunjung`, `tanggal`) VALUES
(1, '2021-01-15'),
(2, '2021-01-16'),
(3, '2021-02-16'),
(4, '2021-03-16'),
(5, '2021-03-16'),
(6, '2021-03-16'),
(7, '2021-03-16'),
(8, '2021-03-16'),
(9, '2021-03-16'),
(10, '2021-03-16'),
(11, '2021-03-16'),
(12, '2021-03-16'),
(13, '2021-03-16'),
(14, '2021-03-16'),
(15, '2021-03-16'),
(16, '2021-03-16'),
(17, '2021-03-16'),
(18, '2021-03-16'),
(19, '2021-03-16'),
(20, '2021-03-16'),
(21, '2021-03-16'),
(22, '2021-03-16'),
(23, '2021-03-17'),
(24, '2021-03-17'),
(25, '2021-03-17'),
(26, '2021-03-17'),
(27, '2021-03-17'),
(28, '2021-03-17'),
(29, '2021-03-17'),
(30, '2021-03-17'),
(31, '2021-03-18'),
(32, '2021-03-18'),
(33, '2021-03-18'),
(34, '2021-03-18'),
(35, '2021-03-18'),
(36, '2021-03-18'),
(37, '2021-03-18'),
(38, '2021-03-18'),
(39, '2021-03-18'),
(40, '2021-03-18'),
(41, '2021-03-18'),
(42, '2021-03-18'),
(43, '2021-03-18'),
(44, '2021-03-18'),
(45, '2021-03-18'),
(46, '2021-03-18'),
(47, '2021-03-18'),
(48, '2021-03-18'),
(49, '2021-03-18'),
(50, '2021-03-18'),
(51, '2021-03-18'),
(52, '2021-03-18'),
(53, '2021-03-18'),
(54, '2021-03-18'),
(55, '2021-03-18'),
(56, '2021-03-18'),
(57, '2021-03-18'),
(58, '2021-03-18'),
(59, '2021-03-18'),
(60, '2021-03-18'),
(61, '2021-03-18'),
(62, '2021-03-18'),
(63, '2021-03-18'),
(64, '2021-03-18'),
(65, '2021-03-19'),
(66, '2021-03-19'),
(67, '2021-03-19'),
(68, '2021-03-19'),
(69, '2021-03-19'),
(70, '2021-03-19'),
(71, '2021-03-19'),
(72, '2021-03-19'),
(73, '2021-03-19'),
(74, '2021-03-19'),
(75, '2021-03-19'),
(76, '2021-03-19'),
(77, '2021-03-19'),
(78, '2021-03-19'),
(79, '2021-03-19'),
(80, '2021-03-19'),
(81, '2021-03-19'),
(82, '2021-03-19'),
(83, '2021-03-19'),
(84, '2021-03-19'),
(85, '2021-03-19'),
(86, '2021-03-19'),
(87, '2021-03-19'),
(88, '2021-03-19'),
(89, '2021-03-19'),
(90, '2021-03-19'),
(91, '2021-03-19'),
(92, '2021-03-19'),
(93, '2021-03-19'),
(94, '2021-03-19'),
(95, '2021-03-19'),
(96, '2021-03-19'),
(97, '2021-03-19'),
(98, '2021-03-19'),
(99, '2021-03-19'),
(100, '2021-03-19'),
(101, '2021-03-19'),
(102, '2021-03-19'),
(103, '2021-03-19'),
(104, '2021-03-19'),
(105, '2021-03-19'),
(106, '2021-03-19'),
(107, '2021-03-19'),
(108, '2021-03-19'),
(109, '2021-03-19'),
(110, '2021-03-19'),
(111, '2021-03-19'),
(112, '2021-03-19'),
(113, '2021-03-19'),
(114, '2021-03-19'),
(115, '2021-03-19'),
(116, '2021-03-19'),
(117, '2021-03-19'),
(118, '2021-03-19'),
(119, '2021-03-19'),
(120, '2021-03-19'),
(121, '2021-03-19'),
(122, '2021-03-19'),
(123, '2021-03-19'),
(124, '2021-03-19'),
(125, '2021-03-19'),
(126, '2021-03-19'),
(127, '2021-03-19'),
(128, '2021-03-19'),
(129, '2021-03-19'),
(130, '2021-03-19'),
(131, '2021-03-19'),
(132, '2021-03-19'),
(133, '2021-03-19'),
(134, '2021-03-19'),
(135, '2021-03-19'),
(136, '2021-03-19'),
(137, '2021-03-19'),
(138, '2021-03-19'),
(139, '2021-03-19'),
(140, '2021-03-19'),
(141, '2021-03-19'),
(142, '2021-03-19'),
(143, '2021-03-19'),
(144, '2021-03-19'),
(145, '2021-03-19'),
(146, '2021-03-19'),
(147, '2021-03-19'),
(148, '2021-03-19'),
(149, '2021-03-19'),
(150, '2021-03-19'),
(151, '2021-03-19'),
(152, '2021-03-19'),
(153, '2021-03-19'),
(154, '2021-03-19'),
(155, '2021-03-19'),
(156, '2021-03-19'),
(157, '2021-03-19'),
(158, '2021-03-19'),
(159, '2021-03-19'),
(160, '2021-03-19'),
(161, '2021-03-19'),
(162, '2021-03-19'),
(163, '2021-03-20'),
(164, '2021-03-20'),
(165, '2021-03-20'),
(166, '2021-03-20'),
(167, '2021-03-20'),
(168, '2021-03-20'),
(169, '2021-03-20'),
(170, '2021-03-21'),
(171, '2021-03-21'),
(172, '2021-03-21'),
(173, '2021-03-21'),
(174, '2021-03-21'),
(175, '2021-03-21'),
(176, '2021-03-21'),
(177, '2021-03-21'),
(178, '2021-03-21'),
(179, '2021-03-22'),
(180, '2021-03-22'),
(181, '2021-03-22'),
(182, '2021-03-22'),
(183, '2021-03-22'),
(184, '2021-03-22'),
(185, '2021-03-23'),
(186, '2021-03-24'),
(187, '2021-03-24'),
(188, '2021-03-24'),
(189, '2021-03-26'),
(190, '2021-03-27'),
(191, '2021-03-27'),
(192, '2021-03-27'),
(193, '2021-03-27'),
(194, '2021-03-27'),
(195, '2021-03-27'),
(196, '2021-03-27'),
(197, '2021-03-27'),
(198, '2021-03-27'),
(199, '2021-03-27'),
(200, '2021-03-27');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
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
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`Id_Profile`, `Nama_Kantor`, `Alamat_Kantor`, `Email`, `No_Telp`, `No_Telp2`, `Instagram`, `Deskripsi`) VALUES
(1, 'River Prawn Residence Kaliurang Jember', 'Jl. Kaliurang, Kec. Sumbersari, Kabupaten Jember, Jawa Timur 68124', 'Ryanhartadi999@gmail.com', '+6281359652164', '+6281359652164', 'riverprawnresidence', '<p>Hunian modern bergaya Eropa pertama di Jember</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `rumah`
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
-- Dumping data for table `rumah`
--

INSERT INTO `rumah` (`Id_Rumah`, `Judul`, `Blok`, `Tipe`, `Luas_Tanah`, `Harga`, `Banner`, `Deskripsi`, `Status`, `CreatedDate`) VALUES
('17paz2fImggMSJjF4fbBcIj5FnJ5aeqO', 'Rumah Tipe 36+', '', '36', '6 m x 12 m', 295000000, 'dummy_rumah2.jpeg', '<ol>\r\n	<li>Rumah dengan luas tanah 6 m x 12 m</li>\r\n	<li>One gate system dengan kartu sebagai pembuka akses</li>\r\n	<li>Securty system 24 jam dengan tombol alarm dsetiap rumah yang terhubung dengan pos satpam</li>\r\n	<li>Pintu rumah dengan sistem keamanan yang modern</li>\r\n	<li>Kabel optic PLN underground</li>\r\n	<li>Rumah dengan spesifikasi Premium Vip</li>\r\n	<li>Jalan aspal lebar 8m</li>\r\n	<li>Mart dan Atm di depan Gate</li>\r\n</ol>\r\n', 1, '2021-02-18 12:05:54'),
('aCecyvLuNS8oIEziRftEVrXEAWSj3a43', 'Rumah Tipe 40', '', '40', '6 m x 14 m ', 350000000, 'dummy_rumah.jpeg', '<ol>\r\n	<li>Rumah dengan luas tanah 6 m x 14 m</li>\r\n	<li>One gate system dengan kartu sebagai pembuka akses</li>\r\n	<li>Securty system 24 jam dengan tombol alarm dsetiap rumah yang terhubung dengan pos satpam</li>\r\n	<li>Pintu rumah dengan sistem keamanan yang modern</li>\r\n	<li>Kabel optic PLN underground</li>\r\n	<li>Rumah dengan spesifikasi Premium Vip</li>\r\n	<li>Jalan aspal lebar 8m</li>\r\n	<li>Mart dan Atm di depan Gate</li>\r\n</ol>\r\n', 1, '2021-02-20 19:01:53'),
('dc8GkNlpurvzpZkr5SKKVyYdTRYAXLvC', 'Rumah Tipe 45', '', '45', '7 m x 12 m', 395000000, 'dummy_rumah1.jpeg', '<ol>\r\n	<li>Rumah dengan luas tanah 7 m x 12 m</li>\r\n	<li>One gate system dengan kartu sebagai pembuka akses</li>\r\n	<li>Securty system 24 jam dengan tombol alarm dsetiap rumah yang terhubung dengan pos satpam</li>\r\n	<li>Pintu rumah dengan sistem keamanan yang modern</li>\r\n	<li>Kabel optic PLN underground</li>\r\n	<li>Rumah dengan spesifikasi Premium Vip</li>\r\n	<li>Jalan aspal lebar 8m</li>\r\n	<li>Mart dan Atm di depan Gate</li>\r\n</ol>\r\n', 1, '2021-02-18 12:57:08'),
('OZTUv9AFtyaqbbSNqIwp6kIfVIBvC4jD', 'Ruko', '', 'Ruko', '120 m x 120 m', 200000000, 'dummy_ruko.jpeg', '<p>Ruko besar, siap untuk membuka bisnis baru Anda</p>\r\n', 1, '2021-02-20 19:08:10');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_rumah`
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
-- Dumping data for table `transaksi_rumah`
--

INSERT INTO `transaksi_rumah` (`Id_Transaksi`, `Id_Blok`, `Nama_Lengkap`, `Email`, `No_Telp`, `Alamat`, `Pekerjaan`, `Foto_KTP`, `Id_Bank`, `Foto_Bukti_TF`, `Pembayaran`, `Status`, `Baru`, `CreatedDate`) VALUES
('1IfejhKsntVJW9br0Dx6S7ZU1aRP2njH', 'NDn0c9l8HWMtl6ZEod9VprkXqAaqeGba', 'huhu', 'huhu@gmail.com', '075757', 'jdfa djfalkdf a', 'jdfk adjf;la', '3099c62fc100394f095254ce3d0a5793.png', 2, 'b9a89a731d06350fe2db7effb872c943.png', 'Cash', 1, 2, '2021-03-19 20:30:33'),
('524AW3TFK3xD0rMpTLg3j2BQdKefQl4z', 'yIt0HrMYtuLCme1EjulvMC2lSMOIO0rg', 'Dimas', 'pdimas1711@gmail.com', '082337407247', 'Jl manggar', 'Mahasiswa', 'fd387171f546b3c75dd80f0200eaba72.jpg', 2, 'e57f73c0f8341f0ba326124bd0241e76.jpg', 'Cash', 1, 1, '2021-03-19 09:32:42'),
('6skONsmfCBQO9tGCr5kFWLOJ7qtilYAQ', 'B2vvLNTHnejsNAdqG1Mg8K3nxctPyHf2', 'tes', 'gulam@gmail.com', '08999', 'jember', 'designer', '52a8095fdf30611b596a03c29c475555.png', 2, '53c8ff205bf2462d7b433dea19ea5827.png', 'Cash', 1, 2, '2021-03-22 13:27:39'),
('baic7WV7EDZmdg1hkWsfqyoUgdXEB2tY', 'yIt0HrMYtuLCme1EjulvMC2lSMOIO0rg', 'Dimas wahyu Pratama', 'pdimas1711@gmail.com', '082337407247', 'JL.Koroncong', 'kerjo', '26600c406f37c23b83573c373cbdb3c2.png', 2, '2d6adf529a246bd6ceb37a3aad7099aa.png', 'KPR', 3, 2, '2021-03-16 20:16:20'),
('BvUcRxN4bK4BOJqniq1O9eekxzvfgyRo', '3PP02W8IzKa9bKNEMFPXGOqWBLdBJ2ic', 'tes', 'agungwahyu23699@gmail.com', '08999', 'jember', 'mahasiswa', '7227805b50738ac951c9129cc29734fa.jpeg', 2, '62bb83906424c1bd8bdf76512c364d7f.jpeg', 'Cash', 2, 2, '2021-03-19 20:28:55'),
('CwMzAra5jUUwwHdcZpRPxN0HM9lqBdaB', 'JhbX2oX0Z3ewsTCVQBYhWnoKW0mHw6yT', 'Ryan Hartadi', 'Ryanhartadi999@gmail.com', '081359652164', 'Jl.Nias Raya2', 'admin', '6807873dcc6ff9f5b4bd9d0253aea3df.png', 2, '13e7c05a6bff63fbaa1e4bacd15b8bd6.png', 'Cash Tempo', 3, 2, '2021-03-02 15:41:04'),
('jXsbb41C9lldO7BOxLHb0BD9fraIbeyj', 'i0033pAGaqNQXOIeRMwvdvPWKbCuTxJU', 'Dimas Wahyu', 'Pdimas429@gmail.com', '082337407267', 'JL.Ambarawa', 'mahasiswa', '1f0485d44d1ad3030be3564fbd5b8463.png', 2, '6376ab346fc117fa0beb8d8b511d930d.png', 'Cash Tempo', 1, 1, '2021-03-16 21:44:51'),
('rvN26NV7YLhFId46LRhQWzpbycMafBj6', '2IDF11pESkVWt9tGnrj5vovqWxAErVz1', 'Asdasd', 'asdasd@gmail.com', '0852580796413', 'Asdasd', 'Asdasd', '97d99e2d8ed6184723f8a558379d056c.jpg', 2, 'fd6cf029fb5e4f9ef8c1274d84493303.jpg', 'Cash', 1, 1, '2021-03-19 11:00:19'),
('SVYczbz85lRWqgrsHOhc3LXtR09VQlFo', 'i0033pAGaqNQXOIeRMwvdvPWKbCuTxJU', 'Dimas Wahyu', 'Pdimas429@gmail.com', '082337407267', 'JL.Ambarawa', 'mahasiswa', 'be1212db53e5c0c16c53adca1137e4eb.png', 2, 'a13d9a4cc3b7038535475e95c43c2e59.png', 'Cash', 1, 2, '2021-03-16 20:24:12'),
('uARd6YHJCc6Bj18WYy9pBNEgyHt4BdEY', 'i0033pAGaqNQXOIeRMwvdvPWKbCuTxJU', 'Dimas Wahyu', 'Pdimas429@gmail.com', '082337407247', 'JL.Manggar 4', 'mahasiswa', 'ff72bbd9b4cb433491bb94ce3ec928aa.png', 2, '6372f1a35f7cf561d213cb6ec4aaf6d1.png', 'Cash', 3, 2, '2021-03-16 20:11:14'),
('UeHIaJzWuoLV2mC1kHoBfqEiK4aZMjQe', 'i0033pAGaqNQXOIeRMwvdvPWKbCuTxJU', 'Dimas Wahyu', 'Pdimas429@gmail.com', '082337407267', 'JL.Ambarawa', 'mahasiswa', 'cf20822505b22091ee5d96b68067eb5a.png', 2, 'eda5fbb7cc67566de3e8a40948c9f39b.png', 'Cash', 1, 1, '2021-03-17 07:57:49'),
('wfQrLcMdHke0o5Al5NXG8xjQ3R8c5MOn', '3PP02W8IzKa9bKNEMFPXGOqWBLdBJ2ic', 'Dimas Pratama', 'Pdimas429@gmail.com', '082337407267', 'JL.Ambarawa', 'mahasiswa', '2ac33d1543dbde9c526b8f6820e82f9d.png', 2, 'b0897d15df27b946de8a6bce16d2c81e.png', 'Cash', 1, 1, '2021-03-16 20:37:23'),
('ww6UKGUiYUpb3y9B5VTJ8B2ranjoLTEJ', 'yIt0HrMYtuLCme1EjulvMC2lSMOIO0rg', 'Ryan', 'ryanhartadi999@gmail.com', '082337407247', 'Jember', 'mahasiswa', '711b1151c4a385d31242454b8ef158da.png', 2, 'b0eb03f7f1f50e6358b5314f88b5d486.png', 'Cash Tempo', 1, 1, '2021-03-16 21:47:38'),
('ZtADbSO6bF2otOLe6jUDjrRIFv4jvhfd', '3PP02W8IzKa9bKNEMFPXGOqWBLdBJ2ic', 'Ryan', 'Ryanhartadi06@gmail.com', '081359652164', 'Jl Bunga Mawar Asique', 'admin', '46fff3d82f77deee9d2dbbccf8ac5e38.jpg', 2, 'e1633ca8a495b1742f8cc077f4949c45.jpg', 'KPR', 1, 1, '2021-03-19 09:21:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`Id_Bank`);

--
-- Indexes for table `blok_rumah`
--
ALTER TABLE `blok_rumah`
  ADD PRIMARY KEY (`Id_Blok`);

--
-- Indexes for table `desain_interior`
--
ALTER TABLE `desain_interior`
  ADD PRIMARY KEY (`id_desain_interior`),
  ADD KEY `id_kategori_interior` (`id_kategori_interior`);

--
-- Indexes for table `desain_rumah`
--
ALTER TABLE `desain_rumah`
  ADD PRIMARY KEY (`id_desain_rumah`),
  ADD KEY `id_kategori_rumah` (`id_kategori_rumah`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`Id_Galeri`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kategori_desain_interior`
--
ALTER TABLE `kategori_desain_interior`
  ADD PRIMARY KEY (`id_kategori_interior`);

--
-- Indexes for table `kategori_desain_rumah`
--
ALTER TABLE `kategori_desain_rumah`
  ADD PRIMARY KEY (`id_kategori_rumah`);

--
-- Indexes for table `kode_rumah`
--
ALTER TABLE `kode_rumah`
  ADD PRIMARY KEY (`Id_Kode`);

--
-- Indexes for table `masukkan`
--
ALTER TABLE `masukkan`
  ADD PRIMARY KEY (`Id_Masukkan`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`Id_Partners`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`Id_User`);

--
-- Indexes for table `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`id_pengunjung`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`Id_Profile`);

--
-- Indexes for table `rumah`
--
ALTER TABLE `rumah`
  ADD PRIMARY KEY (`Id_Rumah`);

--
-- Indexes for table `transaksi_rumah`
--
ALTER TABLE `transaksi_rumah`
  ADD PRIMARY KEY (`Id_Transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `Id_Bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kode_rumah`
--
ALTER TABLE `kode_rumah`
  MODIFY `Id_Kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `id_pengunjung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `Id_Profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
