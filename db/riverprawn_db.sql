-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `Bank`;
CREATE TABLE `Bank` (
  `Id_Bank` int(11) NOT NULL AUTO_INCREMENT,
  `Nama_Bank` text NOT NULL,
  `Nama_Pemilik` text NOT NULL,
  `Nomor_Rekening` text NOT NULL,
  `createdDate` datetime NOT NULL,
  PRIMARY KEY (`Id_Bank`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `Bank` (`Id_Bank`, `Nama_Bank`, `Nama_Pemilik`, `Nomor_Rekening`, `createdDate`) VALUES
(2,	'BCA',	'Ryan Hartadi',	'01812031233',	'2021-02-20 18:29:25');

DROP TABLE IF EXISTS `Blok_Rumah`;
CREATE TABLE `Blok_Rumah` (
  `Id_Blok` varchar(40) NOT NULL,
  `Id_Kode_Rumah` int(1) NOT NULL,
  `Id_Rumah` text NOT NULL,
  `status` int(1) NOT NULL COMMENT '1 = Tersedia , 2 = Booking , 3 = Terjual',
  PRIMARY KEY (`Id_Blok`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `Blok_Rumah` (`Id_Blok`, `Id_Kode_Rumah`, `Id_Rumah`, `status`) VALUES
('2IDF11pESkVWt9tGnrj5vovqWxAErVz1',	9,	'dc8GkNlpurvzpZkr5SKKVyYdTRYAXLvC',	1),
('3PP02W8IzKa9bKNEMFPXGOqWBLdBJ2ic',	11,	'17paz2fImggMSJjF4fbBcIj5FnJ5aeqO',	1),
('5wUj8jCdoKmB2Cw3MVbDyvIJwV0tGTCW',	5,	'aCecyvLuNS8oIEziRftEVrXEAWSj3a43',	1),
('B2vvLNTHnejsNAdqG1Mg8K3nxctPyHf2',	3,	'OZTUv9AFtyaqbbSNqIwp6kIfVIBvC4jD',	1),
('ChxEGDoA5jVWaclM8Krl1hxHdopQV1NM',	6,	'aCecyvLuNS8oIEziRftEVrXEAWSj3a43',	1),
('i0033pAGaqNQXOIeRMwvdvPWKbCuTxJU',	10,	'17paz2fImggMSJjF4fbBcIj5FnJ5aeqO',	1),
('JhbX2oX0Z3ewsTCVQBYhWnoKW0mHw6yT',	2,	'OZTUv9AFtyaqbbSNqIwp6kIfVIBvC4jD',	2),
('JyAEiT1cbDjRXhq7hqA3CCSZTtalLygf',	1,	'OZTUv9AFtyaqbbSNqIwp6kIfVIBvC4jD',	1),
('NDn0c9l8HWMtl6ZEod9VprkXqAaqeGba',	7,	'dc8GkNlpurvzpZkr5SKKVyYdTRYAXLvC',	1),
('yIt0HrMYtuLCme1EjulvMC2lSMOIO0rg',	4,	'aCecyvLuNS8oIEziRftEVrXEAWSj3a43',	1);

DROP TABLE IF EXISTS `Galeri`;
CREATE TABLE `Galeri` (
  `Id_Galeri` varchar(40) NOT NULL,
  `Id_Rumah` varchar(40) NOT NULL,
  `Galeri` text NOT NULL,
  PRIMARY KEY (`Id_Galeri`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `Galeri` (`Id_Galeri`, `Id_Rumah`, `Galeri`) VALUES
('7hubY8gSgH04FBH1tYP66FwTKsAXJvp7',	'aCecyvLuNS8oIEziRftEVrXEAWSj3a43',	'pic6.png'),
('7wLht1emrwklH6jzGrmgC3XjRuRvOq4H',	'aCecyvLuNS8oIEziRftEVrXEAWSj3a43',	'pic71.png'),
('b8n8aK9x4EK04ckBJiAV5IFV7v8j38W9',	'OZTUv9AFtyaqbbSNqIwp6kIfVIBvC4jD',	'Rectangle_13.png'),
('CYJIJ4wxC5GRsEzYmxgDHGeFgGrSHAiJ',	'dc8GkNlpurvzpZkr5SKKVyYdTRYAXLvC',	'pic3.png'),
('krjltvfUGj3ZJsXwgD5T3S4lbEyvZ6NV',	'17paz2fImggMSJjF4fbBcIj5FnJ5aeqO',	'Rectangle_3.jpg'),
('LDxWe1oBmJ6NwVKblDYRv3ZJW5OIZ6ik',	'OZTUv9AFtyaqbbSNqIwp6kIfVIBvC4jD',	'Rectangle_14.png'),
('LezTigG5myVfWj1gMk0IZh4Th4IK1Yrh',	'OZTUv9AFtyaqbbSNqIwp6kIfVIBvC4jD',	'Rectangle_11.png'),
('MMB2DBE6D2JywvtdJDWgikxc2jMu2ksd',	'17paz2fImggMSJjF4fbBcIj5FnJ5aeqO',	'Rectangle_1.jpg'),
('o9kGu6ME1yA05nicPoKUVqMSVAzya1Qs',	'OZTUv9AFtyaqbbSNqIwp6kIfVIBvC4jD',	'Rectangle_12.png'),
('S3BozmRQb9QnqsC5238PTVWyu3gagY9M',	'17paz2fImggMSJjF4fbBcIj5FnJ5aeqO',	'Rectangle_2.jpg'),
('tx5Wiz20K1Ra0yIRu6U4OHAMaB8Z7yEi',	'dc8GkNlpurvzpZkr5SKKVyYdTRYAXLvC',	'pic5.png'),
('V4E4qbvhTZocxBcdLhOPa6XDBGGMyGVA',	'dc8GkNlpurvzpZkr5SKKVyYdTRYAXLvC',	'pic4.png'),
('X3eTi0b6omYEhQdd8nk5Pkcrq8JtmelW',	'aCecyvLuNS8oIEziRftEVrXEAWSj3a43',	'pic51.png');

DROP TABLE IF EXISTS `Kode_Rumah`;
CREATE TABLE `Kode_Rumah` (
  `Id_Kode` int(11) NOT NULL AUTO_INCREMENT,
  `Kode_Rumah` text NOT NULL,
  PRIMARY KEY (`Id_Kode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `Kode_Rumah` (`Id_Kode`, `Kode_Rumah`) VALUES
(1,	'A1'),
(2,	'A2'),
(3,	'A3'),
(4,	'B1'),
(5,	'B2'),
(6,	'B3'),
(7,	'C1'),
(9,	'C2\r\n'),
(10,	'D1'),
(11,	'D2\r\n');

DROP TABLE IF EXISTS `Masukkan`;
CREATE TABLE `Masukkan` (
  `Id_Masukkan` varchar(40) NOT NULL,
  `Fullname` text NOT NULL,
  `Email` text NOT NULL,
  `Subject` text NOT NULL,
  `Deskripsi` text NOT NULL,
  `CreatedDate` datetime NOT NULL,
  PRIMARY KEY (`Id_Masukkan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `Masukkan` (`Id_Masukkan`, `Fullname`, `Email`, `Subject`, `Deskripsi`, `CreatedDate`) VALUES
('MaA2jzoGBmtxZLwRvfxyptT1i2O4Vseb',	'Ryan Hartadi',	'Kominfo@admin.com',	'123',	'12',	'2021-02-21 09:46:40');

DROP TABLE IF EXISTS `Partners`;
CREATE TABLE `Partners` (
  `Id_Partners` varchar(40) NOT NULL,
  `Nama_Partners` text NOT NULL,
  `Logo` text NOT NULL,
  `CreatedDate` datetime NOT NULL,
  PRIMARY KEY (`Id_Partners`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `Partners` (`Id_Partners`, `Nama_Partners`, `Logo`, `CreatedDate`) VALUES
('qKr2xktlY5EpMFBpSYvLatjIfqPCAroE',	'Ryan Hartadi',	'Rectangle_101.png',	'2021-02-16 10:33:23'),
('uMnepwrfUGU1iwkYoXHk9t2zxbrZkGbZ',	'My Ob',	'client-1.png',	'2021-02-20 21:14:55');

DROP TABLE IF EXISTS `Pengguna`;
CREATE TABLE `Pengguna` (
  `Id_User` varchar(40) NOT NULL,
  `Nama` text NOT NULL,
  `Email` text NOT NULL,
  `Password` varchar(128) NOT NULL,
  `Pekerjaan` text NOT NULL,
  `Alamat` text NOT NULL,
  `No_Hp` varchar(16) NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `Status` int(1) NOT NULL,
  `is_valid` int(1) NOT NULL COMMENT '0 = Off 1 = On',
  PRIMARY KEY (`Id_User`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `Pengguna` (`Id_User`, `Nama`, `Email`, `Password`, `Pekerjaan`, `Alamat`, `No_Hp`, `CreatedDate`, `Status`, `is_valid`) VALUES
('XcfnRCqI4jYy5pQokvFUTm1djT8mpjhN',	'Ryan Hartadi123',	'admin123@admin.com',	'21232f297a57a5a743894a0e4a801fc3',	'admin1',	'1231',	'1231',	'2021-02-16 09:37:47',	1,	1);

DROP TABLE IF EXISTS `Profile`;
CREATE TABLE `Profile` (
  `Id_Profile` int(11) NOT NULL AUTO_INCREMENT,
  `Nama_Kantor` text NOT NULL,
  `Alamat_Kantor` text NOT NULL,
  `Email` text NOT NULL,
  `No_Telp` text NOT NULL,
  `No_Telp2` text NOT NULL,
  `Instagram` text NOT NULL,
  `Deskripsi` text NOT NULL,
  PRIMARY KEY (`Id_Profile`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `Profile` (`Id_Profile`, `Nama_Kantor`, `Alamat_Kantor`, `Email`, `No_Telp`, `No_Telp2`, `Instagram`, `Deskripsi`) VALUES
(1,	'River Prawn Residence Kaliurang Jember',	'Jl. Kaliurang, Kec. Sumbersari, Kabupaten Jember, Jawa Timur 68124',	'Ryanhartadi999@gmail.com',	'+6281359652164',	'+6281359652164',	'riverprawnresidence',	'<p>Hunian modern bergaya Eropa pertama di Jember</p>\r\n');

DROP TABLE IF EXISTS `rumah`;
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
  `CreatedDate` datetime NOT NULL,
  PRIMARY KEY (`Id_Rumah`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `rumah` (`Id_Rumah`, `Judul`, `Blok`, `Tipe`, `Luas_Tanah`, `Harga`, `Banner`, `Deskripsi`, `Status`, `CreatedDate`) VALUES
('17paz2fImggMSJjF4fbBcIj5FnJ5aeqO',	'Rumah Baik',	'',	'36',	'6 m x 12 m',	295000000,	'dummy-house.jpeg',	'<p>Rumah Tipe 6 m x 12 m</p>\r\n',	1,	'2021-02-18 12:05:54'),
('aCecyvLuNS8oIEziRftEVrXEAWSj3a43',	'Tipe rumah 40',	'',	'40',	'6 m x 14 m ',	350000000,	'dummy-house.jpeg',	'<p>Rumah Bagus ukuran 6 x 14</p>\r\n',	1,	'2021-02-20 19:01:53'),
('dc8GkNlpurvzpZkr5SKKVyYdTRYAXLvC',	'Rumah Tipe 45',	'',	'45',	'7 m x 12 m',	395000000,	'dummy-house.jpeg',	'<p>Rumah ala eropa ukuran 7 m x 12 m</p>\r\n',	1,	'2021-02-18 12:57:08'),
('OZTUv9AFtyaqbbSNqIwp6kIfVIBvC4jD',	'Ruko',	'',	'Ruko',	'120 m x 120 m',	200000000,	'6e2b434aa73f735a778d12bbc8edff7d.jpg',	'<p>Ruko Besar, Siap untuk membuka bisnis baru</p>\r\n',	1,	'2021-02-20 19:08:10');

DROP TABLE IF EXISTS `Transaksi_Rumah`;
CREATE TABLE `Transaksi_Rumah` (
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
  `CreatedDate` datetime NOT NULL,
  PRIMARY KEY (`Id_Transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `Transaksi_Rumah` (`Id_Transaksi`, `Id_Blok`, `Nama_Lengkap`, `Email`, `No_Telp`, `Alamat`, `Pekerjaan`, `Foto_KTP`, `Id_Bank`, `Foto_Bukti_TF`, `Pembayaran`, `Status`, `Baru`, `CreatedDate`) VALUES
('CwMzAra5jUUwwHdcZpRPxN0HM9lqBdaB',	'JhbX2oX0Z3ewsTCVQBYhWnoKW0mHw6yT',	'Ryan Hartadi',	'Ryanhartadi999@gmail.com',	'081359652164',	'Jl.Nias Raya2',	'admin',	'6807873dcc6ff9f5b4bd9d0253aea3df.png',	2,	'13e7c05a6bff63fbaa1e4bacd15b8bd6.png',	'Cash Tempo',	1,	2,	'2021-03-02 15:41:04');

-- 2021-03-11 01:56:28
