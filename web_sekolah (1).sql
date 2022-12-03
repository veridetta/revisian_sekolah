-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2022 at 03:21 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `baju_batik`
--

CREATE TABLE `baju_batik` (
  `id_baju_batik` int(11) NOT NULL,
  `ukuran_baju_batik` varchar(20) NOT NULL,
  `harga_baju_batik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `baju_batik`
--

INSERT INTO `baju_batik` (`id_baju_batik`, `ukuran_baju_batik`, `harga_baju_batik`) VALUES
(1, 'S', 75000),
(2, 'M', 80000),
(3, 'L', 85000),
(4, 'XL', 90000);

-- --------------------------------------------------------

--
-- Table structure for table `baju_olahraga`
--

CREATE TABLE `baju_olahraga` (
  `id_baju_olahraga` int(11) NOT NULL,
  `ukuran_baju_olahraga` varchar(100) NOT NULL,
  `harga_baju_olahraga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `baju_olahraga`
--

INSERT INTO `baju_olahraga` (`id_baju_olahraga`, `ukuran_baju_olahraga`, `harga_baju_olahraga`) VALUES
(1, 'S', 135000),
(2, 'M', 145000),
(3, 'L', 155000),
(4, 'XL', 165000);

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `judul_pengumuman` text NOT NULL,
  `isi_pengumuman` longtext NOT NULL,
  `nama_penulis` text NOT NULL,
  `tanggal_pengumuman` date NOT NULL,
  `foto_pengumuman` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `judul_pengumuman`, `isi_pengumuman`, `nama_penulis`, `tanggal_pengumuman`, `foto_pengumuman`) VALUES
(9, 'Pembayar Tagihan Siswa', 'Pembayaran', 'Bernad', '2022-12-16', 'BDHgQmSZ7SL4iLZdycQAJDJdpY7cv1Z7NteBiQf1.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduserinc` int(11) NOT NULL,
  `id` varchar(256) NOT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `id_user_level` int(120) NOT NULL,
  `id_user_detail` varchar(256) NOT NULL,
  `is_active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduserinc`, `id`, `username`, `password`, `email`, `no_telp`, `id_user_level`, `id_user_detail`, `is_active`) VALUES
(1, 'dd94709528bb1c83d08f3088d4043f4742891f4f', 'tu_utama', '$2y$10$qqA3EAeZ/sK8dlXrCHUa9eCTmJe4DBY4fngacAJEIOB5IIlAck3VC', 'admin@gmail.com', '0812718728', 3, 'dd94709528bb1c83d08f3088d4043f4742891f4f', 1),
(20, 'b520bc9250628485c0f4cdadb98c3184eacedd21', '12345', '$2y$10$0026NwbBLhWowpkvP8kgf.hP.u0brUdk.BReJIyEtGU9xrfl3A1va', 'nanda.meliana@si.ukdw.ac.id', '089712345868', 2, 'b520bc9250628485c0f4cdadb98c3184eacedd21', NULL),
(21, 'c6d21b0c1291fdd221f9e4092f49ca2fde2a07ab', '89898991', '$2y$10$J./Qsa0nz9eq3GI5VRfkcuFP54XTDR67hDjVrCn1R17gdJ6X37aLW', 'nandameliana15@gmail.com', NULL, 2, 'c6d21b0c1291fdd221f9e4092f49ca2fde2a07ab', NULL),
(22, '39b94a57d78d4a8ad352ba802efe9fd62cced467', '1357801', '$2y$10$hvyZaR7cZ4QYrndcJfA5c.bjTjexBHn2NHYEbFq4EKk1sM6DHff32', 'marchelinafebiyola@gmail.com', NULL, 2, '39b94a57d78d4a8ad352ba802efe9fd62cced467', NULL),
(24, '77ea2acfe1040909cd2f47d9b267d047272c95a0', '12345600', '$2y$10$nAfyYuLKwpfhOY2Vh2fDPesldvy8S.TfkB90fljslOpk4e8NXyjMa', 'meliana.nanda2020@gmail.com', '089611437700', 2, '77ea2acfe1040909cd2f47d9b267d047272c95a0', NULL),
(25, 'd144c239a20d4bd2a64199c47e4344fb4149f37c', '06091990123', '$2y$10$a182ha.de54nwvmZP1LUv.jOoQSW5hNueMd2Mk7gtbU/sPyz3OVnS', 'christianyuu2022@gmail.com', '0896114312400', 2, 'd144c239a20d4bd2a64199c47e4344fb4149f37c', NULL),
(26, '379e9ce869616384162b59d5940b6723c4ec80cf', 'Bernata Tarigan', '$2y$10$OPDoyrqVoP3kUYvpw2K4J.qcm/CASLcyXnfs8KswMFT95YqJlITLK', 'bernatatarigan@gmail.com', '089611438800', 1, '379e9ce869616384162b59d5940b6723c4ec80cf', 1),
(27, '60b46565acbeb0a913ad87bee1bf0bd430feb750', '00998877', '$2y$10$OKFlIJi7Z3X7MxxuL5LYaOVpkhzttyWIziRtW6itaYQA4eGDSkLse', 'nandakabanjahe15@gmail.com', '0896114312200', 2, '60b46565acbeb0a913ad87bee1bf0bd430feb750', NULL),
(28, 'ac1888343a59e79acdc8fd00a2c99cf56f2d3390', NULL, NULL, NULL, NULL, 2, 'ac1888343a59e79acdc8fd00a2c99cf56f2d3390', NULL),
(29, '7fcd56f47704c7b1015936e3f787a716766426d8', '1234511', '$2y$10$v8WqH1Qr/RhXTyeJcvf1dejsaGwSaBbqb9dGAboBIcDVDERfuGRUa', 'yolafebiyola@gmail.com', NULL, 2, '7fcd56f47704c7b1015936e3f787a716766426d8', NULL),
(30, '9483e9b4652d35d4a94f9563ae8560c5b20dca72', NULL, NULL, 'agnestompel@gmail.com', NULL, 2, '9483e9b4652d35d4a94f9563ae8560c5b20dca72', NULL),
(31, '56773d396ca74e512e9e1094633ee3d52c1e9b7d', NULL, NULL, 'docilaidokecil@gmail.com', NULL, 2, '56773d396ca74e512e9e1094633ee3d52c1e9b7d', NULL),
(32, '9b20c2f0f595f26e9592cce2f186068cb3f446af', NULL, NULL, 'tompel.agnes@gmail.com', NULL, 2, '9b20c2f0f595f26e9592cce2f186068cb3f446af', NULL),
(33, 'd5d4860d75641711efd958ae2745f6f93741f785', '13578000', '$2y$10$KR3841OF6qOtQmwvBRRNy.zBeq6dNoShsphfmC7wk2jCXh1o4TyJ.', 'sitompul.agnes2020@gmail.com', NULL, 2, 'd5d4860d75641711efd958ae2745f6f93741f785', NULL),
(34, '1313e7ef86800c6a69d54fe82f284db69c323747', '1357801122', '$2y$10$xfKgWeV5f8m40pf6hb7hpeVZh7MGZ.vWx7O0iiHLKGCZxeT5eWrf.', 'sitompul.agnes2022@gmail.com', '089611437711', 2, '1313e7ef86800c6a69d54fe82f284db69c323747', NULL),
(35, '835baf870839b6f59b27d3271bd9d360a3d5ec66', 'Guntur Tarigan', '$2y$10$ir76pqrtcNAUpSEUVw2RHOB0Xr3PnXCpKA4kXK87DGhvuKHXw0nDC', 'gunturtarigan@gmail.com', '089611437711', 1, '835baf870839b6f59b27d3271bd9d360a3d5ec66', 1),
(36, 'fbc4d3444b14a76000d71e2afab395392cc51f93', 'nanda meliana', '$2y$10$fGHuABdSoj/0f5lO.U0emeYGnHwdh0J63NrQxfdPgmCQTONIV0/rS', 'melianananda@gmail.com', '089611437700', 1, 'fbc4d3444b14a76000d71e2afab395392cc51f93', 1),
(37, 'a33125e7579ef48496c3ff74881c2bb20374fb59', 'Sakty Rivana', '$2y$10$UmRM7o8.onZ2B/IG9ecejuFxYnEFRg.wXUcmSzX8CMw6fqQeKBhzK', 'saktyrivana@gmail.com', '089611437711', 1, 'a33125e7579ef48496c3ff74881c2bb20374fb59', 0),
(38, '225ef1e55e4218209b850ab584a87a2487165bd6', 'Todi Ramdhan', '$2y$10$dJQZXVpG9SarPRFVHC4df.Hf8HM3k.waVXH1mWHVCq5FYE97l9Z7u', 'todi@gmail.com', '0896114312400', 1, '225ef1e55e4218209b850ab584a87a2487165bd6', 1),
(39, '372af1d27eacf0dfdea6ca900e17dafd63d1b6d4', '1112131456', '$2y$10$Cj4WyyEkTufs60ga58iV2O0hxTNlZl0Ib2K8tt91A7lW0to8Dy.aS', 'erinco.udi@gmail.com', '089716354261', 2, '372af1d27eacf0dfdea6ca900e17dafd63d1b6d4', NULL),
(40, 'eba18fb6dbf6bc023ad5d5859f9c2f461928736a', '0987654567', '$2y$10$HhG.I7PhF7cN9N.4igV4SuknaEZHoaP.//eRZmvd/nrEAdSAK4vum', 'pujaaa@gmail.com', '089611437700', 2, 'eba18fb6dbf6bc023ad5d5859f9c2f461928736a', NULL),
(41, '982a5ea6a28339d43b43cd91de7a64b06aaa359d', NULL, NULL, NULL, NULL, 2, '982a5ea6a28339d43b43cd91de7a64b06aaa359d', NULL),
(42, '8740f0e154e66fadd962a7448696ad43c2e90273', NULL, NULL, NULL, NULL, 2, '8740f0e154e66fadd962a7448696ad43c2e90273', NULL),
(43, '1bf8df01f14356b12341f2cab052a7f4a5504a68', '009998888', '$2y$10$xBm1bKZT0I1ON9S0IjPr6ujMoFSVfQg2V3vy6uQFjcPc0PohX0yh6', 'oktavani@gmail.com', NULL, 2, '1bf8df01f14356b12341f2cab052a7f4a5504a68', NULL),
(44, '2dd35a00ddda84f38e85bfc7a60dbba7d9c5091c', NULL, NULL, NULL, NULL, 2, '2dd35a00ddda84f38e85bfc7a60dbba7d9c5091c', NULL),
(45, 'de212057dc8b4c7ab8855cf7d4b1fc3ecc23ad68', 'Ika Muziah', '$2y$10$/kyqTKRmspwgmAvj4KpSq..ev4sq67elMnVq3n2Ov90gt/P/Jb/YC', 'ikamuziah@gmail.com', '0897653234677', 1, 'de212057dc8b4c7ab8855cf7d4b1fc3ecc23ad68', 1),
(46, 'fec433ad98bf609566196addbd4270601622d85d', '224466', '$2y$10$auxRjTm5hJgVDP0fdE3tUOu91EJ9Y/O0PJXOXdOsr1TgZGocC0Amu', 'abianwiyono2022@gmail.com', '765345678', 2, 'fec433ad98bf609566196addbd4270601622d85d', NULL),
(47, 'f8865b92b58d3850d8171294f111e1a0678ac489', NULL, NULL, NULL, NULL, 2, 'f8865b92b58d3850d8171294f111e1a0678ac489', NULL),
(48, 'bf7f76cb9dc50130b02a5c31e82e22f5dde8d7a5', NULL, NULL, NULL, NULL, 2, 'bf7f76cb9dc50130b02a5c31e82e22f5dde8d7a5', NULL),
(49, '806147112fd8a0dbdca32d7361e9eecf0ee69184', NULL, NULL, NULL, NULL, 2, '806147112fd8a0dbdca32d7361e9eecf0ee69184', NULL),
(50, '37844cbbf03ffaff90edf779e5910cafed16dc57', '0009990099', '$2y$10$HcpHJKP9krDJl/KcQj1nwuNYKzI8fd8/HLJxZDlcMJSyUN0fNgUQO', 'nanda.angkat@students.ukdw.ac.', NULL, 2, '37844cbbf03ffaff90edf779e5910cafed16dc57', NULL),
(51, 'ed3e446ddfeb15126c13afb5f949302a925ee94b', NULL, NULL, NULL, NULL, 2, 'ed3e446ddfeb15126c13afb5f949302a925ee94b', NULL),
(52, 'da5bac491deddde919abeee837384312d55dbb45', NULL, NULL, NULL, NULL, 2, 'da5bac491deddde919abeee837384312d55dbb45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `iduserdetailinc` int(11) NOT NULL,
  `id_user_detail` text NOT NULL,
  `nomor_pendaftaran` text DEFAULT NULL,
  `nidn` text DEFAULT NULL,
  `nama_lengkap` text DEFAULT NULL,
  `nama_panggilan` text DEFAULT NULL,
  `sekolah_asal` text DEFAULT NULL,
  `jenis_kelamin` text DEFAULT NULL,
  `tempat_lahir` text DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `agama` text DEFAULT NULL,
  `kewarganegaraan` text DEFAULT NULL,
  `status_kekeluargaan` text DEFAULT NULL,
  `anak_ke` text DEFAULT NULL,
  `saudara_kandung` text DEFAULT NULL,
  `saudara_tiri` text DEFAULT NULL,
  `NIK` text DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `rt_rw` text DEFAULT NULL,
  `kelurahan` text DEFAULT NULL,
  `kecamatan` text DEFAULT NULL,
  `kabupaten` text DEFAULT NULL,
  `provinsi` text DEFAULT NULL,
  `kode_pos` text DEFAULT NULL,
  `id_status_verifikasi` text DEFAULT NULL,
  `id_status_validasi` text DEFAULT NULL,
  `id_status_terdaftar` text DEFAULT NULL,
  `ijazah` text DEFAULT NULL,
  `skhun` text DEFAULT NULL,
  `kk` text DEFAULT NULL,
  `akta_kelahiran` text DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `surat_keterangan_lulus` text DEFAULT NULL,
  `jalur_pendaftaran` text DEFAULT NULL,
  `nilai_ipa` text DEFAULT NULL,
  `nilai_ips` text DEFAULT NULL,
  `nilai_matematika` text DEFAULT NULL,
  `nilai_bahasa_inggris` text DEFAULT NULL,
  `nilai_bahasa_indonesia` text DEFAULT NULL,
  `kelas` text DEFAULT NULL,
  `id_baju_batik` text DEFAULT NULL,
  `id_baju_olahraga` text DEFAULT NULL,
  `nama_ayah` text DEFAULT NULL,
  `tempat_lahir_ayah` text DEFAULT NULL,
  `tanggal_lahir_ayah` date DEFAULT NULL,
  `agama_ayah` text DEFAULT NULL,
  `pendidikan_ayah` text DEFAULT NULL,
  `pekerjaan_ayah` text DEFAULT NULL,
  `warga_negara_ayah` text DEFAULT NULL,
  `nomor_telepon_ayah` text DEFAULT NULL,
  `pendapatan_ayah` text DEFAULT NULL,
  `nama_ibu` text DEFAULT NULL,
  `tempat_lahir_ibu` text DEFAULT NULL,
  `tanggal_lahir_ibu` date DEFAULT NULL,
  `agama_ibu` text DEFAULT NULL,
  `pendidikan_ibu` text DEFAULT NULL,
  `pekerjaan_ibu` text DEFAULT NULL,
  `warga_negara_ibu` text DEFAULT NULL,
  `nomor_telepon_ibu` text DEFAULT NULL,
  `pendapatan_ibu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`iduserdetailinc`, `id_user_detail`, `nomor_pendaftaran`, `nidn`, `nama_lengkap`, `nama_panggilan`, `sekolah_asal`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `kewarganegaraan`, `status_kekeluargaan`, `anak_ke`, `saudara_kandung`, `saudara_tiri`, `NIK`, `alamat`, `rt_rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `id_status_verifikasi`, `id_status_validasi`, `id_status_terdaftar`, `ijazah`, `skhun`, `kk`, `akta_kelahiran`, `foto`, `surat_keterangan_lulus`, `jalur_pendaftaran`, `nilai_ipa`, `nilai_ips`, `nilai_matematika`, `nilai_bahasa_inggris`, `nilai_bahasa_indonesia`, `kelas`, `id_baju_batik`, `id_baju_olahraga`, `nama_ayah`, `tempat_lahir_ayah`, `tanggal_lahir_ayah`, `agama_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `warga_negara_ayah`, `nomor_telepon_ayah`, `pendapatan_ayah`, `nama_ibu`, `tempat_lahir_ibu`, `tanggal_lahir_ibu`, `agama_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `warga_negara_ibu`, `nomor_telepon_ibu`, `pendapatan_ibu`) VALUES
(20, 'b520bc9250628485c0f4cdadb98c3184eacedd21', '123456', '12345', 'Yopita', 'Yopit', 'SMP NEGERI 1 KABANJAHE', 'Laki-Laki', 'KABANJAHE', '2000-11-30', 'Kong Hu Cu', 'Indonesia', 'Kandung', '2', '2', '0', '12345689876431', 'Asrama polisi simpang 6', '0/0', 'Gung Negeri', 'Kabanjahe', 'karo', 'Sumatera Utara', '22112', '2', '2', '2', 'h3dZ6dEdjckwYZlmSx46bFqaDybhuvZjcEhIWz7h.jpg', 'XJJy7Qf1UDPRcM11jSMhZJuQvD4DQAZqtfubCV2h.jpg', 'uAIvLR5MUkFD1AmS6LcRbMsJzxDjmTxat3PLBOh6.jpg', 'DF4dksCYhduGh6wmaPQR920TLjEkpcQCNDZwG2CN.jpg', 'Ka9NzeaBg0JiOnClXn2rpWxDVE28tUHhof5XOgt8.jpg', 'JgUgzH3ob1cDRCgPBRIEThEeqXICfJaRRaHFz5wA.png', 'Prestasi', '80', '90', '75', '70', '98', 'X IPA 2', '1', '1', 'Lukas', 'Berastagi', '2020-09-23', 'Khatolik', 'SMA', 'Polisi', 'Indonesia', '0989865321', '5000000', 'Jani', 'Lau Baleng', '2022-10-16', 'Khatolik', 'S1', 'Wiraswasta', 'Indonesia', '098765432345678', '5000000'),
(24, '77ea2acfe1040909cd2f47d9b267d047272c95a0', '12345654', '12345600', 'ELINA', 'Purnama', 'SMP NEGERI 1 KABANJAHE', 'Laki-Laki', 'KABANJAHE', '2022-11-07', 'Katholik', 'Indonesia', 'Kandung', '2', '2', '0', '12345689876432', 'Asrama polisi simpang 9', '0/0', 'Gung Negeri', 'Kabanjahe', 'Karo', 'Sumatera Utara', '22112', '2', '2', '2', '1FW3oR4O9HKbPIT4TLSJpRzscbtta1u1imvBtzyV.jpg', 'PR9MajEAxFYj6hvvftIzIliKlFrENhmVF9GN9JF9.jpg', '9sObPGlv2BpIJcJpR0zHArlTFo9J5fzIDIRboNsq.jpg', 'Gmb15hSqm5rp4Z1D39qXrtOE8VbT7FZOJbtMHUXG.jpg', '2adP8fjEGsRX1cQZbVDo5dXLPIxmDq7x7dOEXKGI.jpg', 'jKmaHl1op3MA1h3VAaX0Wd5nfjROofUuoixDclDE.png', 'Prestasi', '90', '80', '75', '70', '98', 'X IPS 3', '2', '3', 'Matius', 'Suka', '1964-06-14', 'Khatolik', 'SMA', 'PETANI', 'Indonesia', '09898653216', '5000000', 'Marchelina', 'Suka Tendel', '1979-07-13', 'Kristen', 'S1', 'Wiraswasta', 'Indonesia', '098765432345678', '6000000'),
(25, 'd144c239a20d4bd2a64199c47e4344fb4149f37c', '06091990', '06091990123', 'Christian Yu', 'Ian', 'SMP 1 METODHIS KABANJAHE', 'Laki-Laki', 'MEDAN', '2011-09-06', 'Katholik', 'Indonesia', 'Kandung', '1', '0', '0', '12345689876432', 'Gang Tarigan No.26 A, Jalan Mariam Ginting', '0/0', 'Gung Negeri', 'Kabanjahe', 'karo', 'Sumatera Utara', '22112', '2', '2', '2', 'CwcOPpkyJiEjtnCYDbvfWefzQOPJqhF29weVMdBY.jpg', 'gpYk00yzJNlmrYHBJlUa3cHzEkv1KY9XLZuYjisx.jpg', 'kIdrXOSSDYnkhP629ezHZjRyUi5UDYqOdkCqwSYt.jpg', 'cnXhuYU0QkPp2IiFDmTvWjSrTRa5lm7t00dXWQaH.jpg', 'maSFVrxNdxRbc4jQqA3zq7OHdcifKV7wFZY8WOZB.jpg', 'jWCImd2JXY9IV2u63wrwxN1IHtkduXyYOBH0tRBl.png', 'Zonasi', '87', '98', '75', '98', '87', 'X IPA 2', '3', '3', 'Philip Yu', 'Binjai', '1988-03-01', 'Khatolik', 'MAGISTER', 'DOSEN', 'Indonesia', '098986532112', '15000000', 'Eveline Yang', 'Medan', '1983-10-17', 'Khatolik', 'S1', 'Guru', 'Indonesia', '0987654323489', '7000000'),
(27, '60b46565acbeb0a913ad87bee1bf0bd430feb750', '11333356', '00998877', 'Resti Rahmawati', 'Eti', 'SMP Muhammadiyah 1 Kabanjahe', 'Perempuan', 'Berastagi', '2005-06-30', 'Islam', 'Indonesia', 'Kandung', '2', '1', '0', '123456898764321', 'Jalan Jamin Ginting, GG. Brahmana No. 25a', '0/0', 'Gung Leto', 'Kabanjahe', 'Karo', 'Sumatera Utara', '22112', '2', '2', '2', 'YWwv5Leoz34ei6NqKzB7eT5kqkrffjfZMRInyhsz.jpg', 'eR5Fe4GkFQj8Bdf3ffSq9UpyFdVsw8vnuktmd1hE.jpg', 'J5Ak9D1QFSbyaTCcupzBlyeo74eeKR4HLb9re2FM.jpg', 'Tx182LDPoVTqwCGM2icjjHmcwVMEUCC2ksvkOPoU.jpg', 'z5UtepufsyVmk8ASUOpImrEwolbqqIiKO8yUKqCk.jpg', 'bkyL7Si6CLRpfHujciLsEpCoYJ9UszQk3sBQbVQY.png', 'Afirmasi', '76', '76', '87', '76', '98', 'X IPS 2', '3', '3', 'Muhammad', 'Suka', '1980-10-22', 'Islam', 'SMA', 'PETANI', 'Indonesia', '09898653216', '5000000', 'Jani', 'Lau Baleng', '1976-06-30', 'Islam', 'S1', 'Guru', 'Indonesia', '09876543234', '7000000'),
(29, '7fcd56f47704c7b1015936e3f787a716766426d8', '1234567611', '1234511', 'Febiyola Marchelina PA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, '1313e7ef86800c6a69d54fe82f284db69c323747', '1234567688', '1357801122', 'Agnes Kristanti', 'Agnes', 'SMP SANTO XAVERIUS 1 KABANJAHE', 'Perempuan', 'KABANJAHE', '2005-06-23', 'Kristen', 'Indonesia', 'Kandung', '2', '4', '0', '1234568987643211', 'Gang Brahmana, Prumnas No.8', '0/0', 'Gung Leto', 'Kabanjahe', 'Karo', 'Sumatera Utara', '22112', '2', '2', '2', 'NbWveD44f82R61n80Y7rTP0uOYPlC90vYYX98NYI.jpg', 'EayULCm5KTFuzSXxENqhSaefu4ygpDm7mmuBzzNm.jpg', 'orK4rT4p3VVB2UgJKiv2Z5QbhOqEo456B1tdSPKz.jpg', 'yYN7XxL1Tzws9uh1xJuTxAm5XHLOuPoZFaSknNhC.jpg', '26EOHdzJhy5E0opt643iyHWekkCi5p8tZwBy74Mh.jpg', '5qJ9JxV7lU6Qj2It5f4Ib2cJa4wqYiF9opyHSLNL.png', 'Prestasi', '90', '76', '87', '98', '87', 'X IPA 5', '2', '3', 'Maringan', 'Balige', '1982-03-02', 'Kristen', 'SMA', 'BUMN', 'Indonesia', '0989865321100', '15000000', 'Nila', 'Padang Sidempuan', '1971-01-22', 'Kristen', 'S1', 'Bidan', 'Indonesia', '098765432345678', '7000000'),
(35, '835baf870839b6f59b27d3271bd9d360a3d5ec66', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 'fbc4d3444b14a76000d71e2afab395392cc51f93', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 'a33125e7579ef48496c3ff74881c2bb20374fb59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, '225ef1e55e4218209b850ab584a87a2487165bd6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, '372af1d27eacf0dfdea6ca900e17dafd63d1b6d4', '101010123', '1112131456', 'Odi Erinco', 'Odi', 'SMP SANTA MARIA 1 KABANJAHE', 'Laki-Laki', 'KABANJAHE', '2005-06-26', 'Kristen', 'Indonesia', 'Kandung', '1', '2', '0', '12345689876431', 'Jalan Sudirman No. 12', '0/0', 'Gung Leto', 'Kabanjahe', 'karo', 'Sumatera Utara', '22111', '2', '2', '2', 'uE1ZaEMn3gcPirXIvULfmOoZU1UhUg8DWDql6N0X.jpg', 'k0tv5VZA85a8xPPyOTLJyKRKGgklbNBDefH6Tvh4.jpg', 'br9fWO0Q2Rt5HNQxFduRt8GoDOQxBvHjThwotWgv.jpg', 'GmHFOLfXMKFBRDxLCsSPBZPZOVBP7iIg8peEzODy.jpg', 'YsAiC4XCtxMIlYSkp0J2YNKFgjJLuvH1uoeUjVq5.jpg', 'xIrL91pnkZvvhpbtkJjy62XFBE9Zk0tRpFaqrOAB.png', 'Prestasi', '78', '87', '90', '89', '76', 'X IPA 4', '1', '1', 'Johanes', 'Sidikalang', '1984-07-26', 'Kristen', 'SMA', 'Wiraswasta', 'Indonesia', '098986532113', '8000000', 'Ruli', 'Tarutung', '1993-04-15', 'Kristen', 'S1', 'Guru', 'Indonesia', '0987654323411', '7000000'),
(40, 'eba18fb6dbf6bc023ad5d5859f9c2f461928736a', '12345432', '0987654567', 'Puja Krista Kembaren', 'Yopit Keren', 'SMP NEGERI 1 KABANJAHE', 'Laki-Laki', 'MEDAN', '2022-12-16', 'Kirsten', 'Indonesia', 'Kandung', '1', '2', '0', '12345689876432', 'Jalan Sekata No. 25a', '0/0', 'Gung Negeri', 'Kabanjahe', 'karo', 'Sumatera Utara', '22112', '1', '2', '2', '2LGnrokfCFBLdYAVf7gNdNDKwlh83vrmf0fiDNYl.png', 'uAOHPAKEIbLblUsQVX173RuXHE53KvbnDMh8SOyK.png', 'm8GBH17z91LdckVw7ma8XR7ygPsa3xKvGdIhxF7h.png', 'ZiiWpBzCvM1ZaPJXB8tkaa4Ps2FDPeD2VLpLYwHp.png', 'snvTntycP82v5jRk1mgkIOw6L2CZVklHbXABdBkq.png', 'kUR7QjMFJQYKMyLd5gd8dUT5hyZGfCBQIni76CmW.png', 'Zonasi', '90', '80', '75', '70', '98', NULL, '1', '1', 'Minton', 'Suka', '2022-12-16', 'Kirsten', 'SMA', 'Wiraswasta', 'Indonesia', '098986532113', '5000000', 'Ruli', 'Suka Tendel', '2022-12-30', 'Kirsten', 'S1', 'Bidan', 'ytyuikjh', '09876543234', '5000000'),
(42, '8740f0e154e66fadd962a7448696ad43c2e90273', '098765456', '09876534567', 'Angelina Christi Bangun', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, '1bf8df01f14356b12341f2cab052a7f4a5504a68', '223334444', '009998888', 'Debora Rosana Ginting', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, '2dd35a00ddda84f38e85bfc7a60dbba7d9c5091c', '234568654', '987654567', 'Oktavani', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, '37844cbbf03ffaff90edf779e5910cafed16dc57', '1133335600', '0009990099', 'Yanti', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, 'ed3e446ddfeb15126c13afb5f949302a925ee94b', '11012000', '92393', 'nandaaa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 'da5bac491deddde919abeee837384312d55dbb45', '074752424', '02938476543728', 'Putri', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `id_user_level` int(11) NOT NULL,
  `user_level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baju_batik`
--
ALTER TABLE `baju_batik`
  ADD PRIMARY KEY (`id_baju_batik`);

--
-- Indexes for table `baju_olahraga`
--
ALTER TABLE `baju_olahraga`
  ADD PRIMARY KEY (`id_baju_olahraga`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduserinc`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`iduserdetailinc`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id_user_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baju_batik`
--
ALTER TABLE `baju_batik`
  MODIFY `id_baju_batik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `baju_olahraga`
--
ALTER TABLE `baju_olahraga`
  MODIFY `id_baju_olahraga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduserinc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `iduserdetailinc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id_user_level` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD CONSTRAINT `user_detail_ibfk_1` FOREIGN KEY (`iduserdetailinc`) REFERENCES `user` (`iduserinc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
