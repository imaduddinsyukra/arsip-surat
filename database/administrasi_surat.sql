-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2020 at 09:05 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `administrasi_surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_disposisi`
--

CREATE TABLE IF NOT EXISTS `tbl_disposisi` (
`id_disposisi` int(6) NOT NULL,
  `no_surat` varchar(100) NOT NULL,
  `jenis_surat` varchar(20) NOT NULL,
  `tujuan_disposisi` varchar(50) NOT NULL,
  `isi_disposisi` varchar(250) NOT NULL,
  `sifat` varchar(50) NOT NULL,
  `batas_waktu` date NOT NULL,
  `catatan` varchar(250) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_disposisi`
--

INSERT INTO `tbl_disposisi` (`id_disposisi`, `no_surat`, `jenis_surat`, `tujuan_disposisi`, `isi_disposisi`, `sifat`, `batas_waktu`, `catatan`, `id_user`) VALUES
(1, 'XVII/II/03/2020', 'Surat Masuk', 'Kepala Sekolah', 'Ini ada surat masuk pak', 'Perlu Perhatian Khusus', '2020-03-21', '', 1),
(2, 'IVIIX/ST/03/2020', 'Surat Keluar', 'Kepala Sekolah', 'Berikut surat keluar mengenai liburan pak', 'Biasa', '2020-03-25', '', 1),
(3, 'XVII/II/03/2020', 'Surat Masuk', 'Kesiswaan', 'Segera ditindak lanjuti', 'Segera', '2020-03-25', '', 5),
(4, 'IVIIX/ST/03/2020', 'Surat Keluar', 'Perpustakaan', 'Test aja', 'Segera', '2020-02-04', '', 5),
(5, 'IVIIX/ST/03/2020', 'Surat Keluar', 'Humas', 'Segera ditindak lanjuti', 'Biasa', '2020-03-24', 'Infokan ke siswa-siswi', 5),
(6, 'IVX/LBR01/02/2020', 'Surat Keluar', 'Kepala Sekolah', 'Pak, berikut adalah surat libur yang bapak minta', 'Biasa', '2020-03-26', 'TIdak ada', 1),
(7, '8081013jjkjk', 'Surat Masuk', 'Kepala Sekolah', 'Ini adalah surat trial pak', 'Biasa', '2010-10-10', 'Hahaha', 1),
(8, 'IVX/LBR01/02/2020', 'Surat Keluar', 'Humas', 'Harap ditindak lanjut', 'Biasa', '2020-03-27', 'Umumkan ke siswa-siswi', 5),
(9, '8081013jjkjk', 'Surat Masuk', 'Keuangan', 'Ini cuma trial cuy', 'Perhatian Batas Waktu', '2020-03-24', 'Gk ada cuy', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_surat_keluar`
--

CREATE TABLE IF NOT EXISTS `tbl_surat_keluar` (
`id_surat_keluar` int(6) NOT NULL,
  `no_agenda` varchar(7) NOT NULL,
  `perihal` text NOT NULL,
  `tujuan` varchar(150) NOT NULL,
  `no_surat` varchar(100) NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_catat` date NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `id_user` int(11) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_surat_keluar`
--

INSERT INTO `tbl_surat_keluar` (`id_surat_keluar`, `no_agenda`, `perihal`, `tujuan`, `no_surat`, `tgl_surat`, `tgl_catat`, `keterangan`, `id_user`, `gambar`) VALUES
(2, 'ea', 'ea ', 'ea', 'ea', '2017-12-25', '2017-12-26', 'ea ', 1, '../assets/gambar/5932253231102.jpg'),
(3, 'newbie', 'Test', 'Dinas Pendidikan', 'newbie', '2017-12-21', '2017-12-21', 'newbie', 1, '../assets/gambar/5932253231102.jpg'),
(4, '8912', 'Hari Libur ', 'Staf dan Karyawan', 'IVIIX/ST/03/2020', '2020-01-16', '2020-03-19', 'Gk ada   ', 1, '../assets/gambar/surat_keluarIVIIXST032020.jpeg'),
(5, '2893123', 'Libur Semester ', 'Staf dan Karyawan', 'IVX/LBR01/02/2020', '2020-03-02', '2020-03-02', ' ', 1, '../assets/gambar/surat_keluarIVXLBR01022020.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_surat_masuk`
--

CREATE TABLE IF NOT EXISTS `tbl_surat_masuk` (
`id_surat_masuk` int(6) NOT NULL,
  `no_agenda` varchar(7) NOT NULL,
  `indek_berkas` varchar(100) NOT NULL,
  `perihal` text NOT NULL,
  `pengirim` varchar(150) NOT NULL,
  `no_surat` varchar(100) NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_diterima` date NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `id_user` int(11) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_surat_masuk`
--

INSERT INTO `tbl_surat_masuk` (`id_surat_masuk`, `no_agenda`, `indek_berkas`, `perihal`, `pengirim`, `no_surat`, `tgl_surat`, `tgl_diterima`, `keterangan`, `id_user`, `gambar`) VALUES
(60, 'alexale', 'alexalex falegas', ' alexalex falegas', 'alexalex falegas', 'alexalex falegas', '2017-12-21', '2017-12-21', ' alexalex falegas', 1, '../assets/gambar/green-check-mark-clip-art-5575.jpg'),
(68, 'aulia', 'aulia', 'aulia ', 'aulia', 'aulia', '2017-12-27', '2017-12-24', 'aulia ', 1, '../assets/gambar/5932253231102.jpg'),
(69, '1234asd', 'haha', 'Coba Aja ', 'Fulan', 'asd/123/xii', '2020-03-02', '2020-03-09', ' as', 1, '../assets/gambar/Jellyfish.jpg'),
(70, '4321', 'coba', 'trial sistem', 'suradi', '8081013jjkjk', '2020-03-05', '2020-03-09', ' ', 1, '../assets/gambar/Tulips.jpg'),
(71, '129', 'Gk ada', 'Instruksi Gubernur mengenai kabut asap', 'Dinas Pendidikan Kota Pekanbaru', 'XVII/II/03/2020', '2020-03-16', '2020-03-19', ' Mohon Dilaksanakan', 1, '../assets/gambar/surat_masukXVIIII032020.jpeg'),
(72, 'COBA', 'COBA', 'COBA ', 'COBA', 'COBA', '2010-10-10', '2010-10-10', 'COBA ', 1, '../assets/gambar/surat_masukCOBA.jpeg'),
(73, '212haha', 'hihi', 'huhu ', 'hehe', 'hoho', '2001-01-01', '2001-11-01', 'hahahahaha             ', 1, '../assets/gambar/surat_masukhoho.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
`id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama`, `username`, `password`, `level`, `status`) VALUES
(1, 'Admin Tata Usaha', 'admin', 'c93ccd78b2076528346216b3b2f701e6', 'Umum', '1'),
(4, 'Admin Bagian Keuangan', 'keuangan', '2396542b90ad72668d61ff55a8db0176', 'Keuangan', '1'),
(5, 'Kepsek SMK Muhammadiyah 3', 'kepsek', '4b4ba135852bd151e5931cce7b352944', 'Kepala Sekolah', '1'),
(6, 'Admin Humas', 'humas', '8d64a8ac348751820468565f2cd74eb7', 'Humas', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_disposisi`
--
ALTER TABLE `tbl_disposisi`
 ADD PRIMARY KEY (`id_disposisi`);

--
-- Indexes for table `tbl_surat_keluar`
--
ALTER TABLE `tbl_surat_keluar`
 ADD PRIMARY KEY (`id_surat_keluar`);

--
-- Indexes for table `tbl_surat_masuk`
--
ALTER TABLE `tbl_surat_masuk`
 ADD PRIMARY KEY (`id_surat_masuk`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
 ADD PRIMARY KEY (`id_user`), ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_disposisi`
--
ALTER TABLE `tbl_disposisi`
MODIFY `id_disposisi` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_surat_keluar`
--
ALTER TABLE `tbl_surat_keluar`
MODIFY `id_surat_keluar` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_surat_masuk`
--
ALTER TABLE `tbl_surat_masuk`
MODIFY `id_surat_masuk` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
