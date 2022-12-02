-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jun 2022 pada 13.12
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 7.3.28

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
-- Struktur dari tabel `baju_batik`
--

CREATE TABLE `baju_batik` (
  `id_baju_batik` int(11) NOT NULL,
  `ukuran_baju_batik` varchar(20) NOT NULL,
  `harga_baju_batik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `baju_batik`
--

INSERT INTO `baju_batik` (`id_baju_batik`, `ukuran_baju_batik`, `harga_baju_batik`) VALUES
(1, 'S', 75000),
(2, 'M', 80000),
(3, 'L', 85000),
(4, 'XL', 90000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `baju_olahraga`
--

CREATE TABLE `baju_olahraga` (
  `id_baju_olahraga` int(11) NOT NULL,
  `ukuran_baju_olahraga` varchar(100) NOT NULL,
  `harga_baju_olahraga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `baju_olahraga`
--

INSERT INTO `baju_olahraga` (`id_baju_olahraga`, `ukuran_baju_olahraga`, `harga_baju_olahraga`) VALUES
(1, 'S', 135000),
(2, 'M', 145000),
(3, 'L', 155000),
(4, 'XL', 165000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
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
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `judul_pengumuman`, `isi_pengumuman`, `nama_penulis`, `tanggal_pengumuman`, `foto_pengumuman`) VALUES
(2, 'Pengumuman Libur Hari Minggu', 'Pengumuman Libur Hari Minggu jangan ada kegiatan', 'Administrator', '2000-07-07', '2cmQOxssVfaC48TU2uSDogbgNW5mVF0yCtnmUGo2.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`iduserinc`, `id`, `username`, `password`, `email`, `no_telp`, `id_user_level`, `id_user_detail`, `is_active`) VALUES
(1, 'dd94709528bb1c83d08f3088d4043f4742891f4f', 'admin_utama', 'admin', 'admin@gmail.com', '0812718728', 3, 'dd94709528bb1c83d08f3088d4043f4742891f4f', 1),
(2, 'fba92459c5bbf723b2a5b79c5cf58a78d43d4d67', 'admin_panitia_1', 'admin123', 'admin@gmail.com', '0812718728', 1, 'fba92459c5bbf723b2a5b79c5cf58a78d43d4d67', 1),
(14, 'ab8ce84d489471b9e4b1e0d0eeca6ba27fb92f04', '061730700543', '26e0bd2', 'taufikyoungman@gmail.com', '08983912412', 2, 'ab8ce84d489471b9e4b1e0d0eeca6ba27fb92f04', NULL),
(15, 'b7c40b9c66bc88d38a59e554c639d743e77f1b65', '555', 'f1c6521', 'taufikyoungman@gmail.com', NULL, 2, 'b7c40b9c66bc88d38a59e554c639d743e77f1b65', NULL),
(16, '933c0241dbb6733f0b011a36b22fee4c6d2ce59d', 'panitia', 'panitia', 'panitia@gmail.com', '089412412124', 1, '933c0241dbb6733f0b011a36b22fee4c6d2ce59d', 1),
(17, '90394358c253085c02ab47e7485f3f14b716e8d6', NULL, NULL, NULL, NULL, 2, '90394358c253085c02ab47e7485f3f14b716e8d6', NULL),
(18, 'cc4fa2772017b5184d96f0b7ddee20eacaf912c6', NULL, NULL, NULL, NULL, 2, 'cc4fa2772017b5184d96f0b7ddee20eacaf912c6', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_detail`
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
-- Dumping data untuk tabel `user_detail`
--

INSERT INTO `user_detail` (`iduserdetailinc`, `id_user_detail`, `nomor_pendaftaran`, `nidn`, `nama_lengkap`, `nama_panggilan`, `sekolah_asal`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `kewarganegaraan`, `status_kekeluargaan`, `anak_ke`, `saudara_kandung`, `saudara_tiri`, `NIK`, `alamat`, `rt_rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `id_status_verifikasi`, `id_status_validasi`, `id_status_terdaftar`, `ijazah`, `skhun`, `kk`, `akta_kelahiran`, `foto`, `surat_keterangan_lulus`, `jalur_pendaftaran`, `nilai_ipa`, `nilai_ips`, `nilai_matematika`, `nilai_bahasa_inggris`, `nilai_bahasa_indonesia`, `kelas`, `id_baju_batik`, `id_baju_olahraga`, `nama_ayah`, `tempat_lahir_ayah`, `tanggal_lahir_ayah`, `agama_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `warga_negara_ayah`, `nomor_telepon_ayah`, `pendapatan_ayah`, `nama_ibu`, `tempat_lahir_ibu`, `tanggal_lahir_ibu`, `agama_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `warga_negara_ibu`, `nomor_telepon_ibu`, `pendapatan_ibu`) VALUES
(1, 'dd94709528bb1c83d08f3088d4043f4742891f4f', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'fba92459c5bbf723b2a5b79c5cf58a78d43d4d67', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'ab8ce84d489471b9e4b1e0d0eeca6ba27fb92f04', '061730700543', '061730700543', 'Sugeng', 'Sugeng', 'SMA Muhammadiyah 5', 'Laki-Laki', 'Palembang', '2000-07-07', 'Islam', 'Indonesia', 'Kandung', '3', '2', '-', '1671130700543', 'Jl', '45', 'Kalidoni', 'Kalidoni', 'Kalidoni', 'Sumatera Selatan', '30118', '2', '2', '2', 'lNCCszlvjO0sJIKkiFFmNidHtrKgnMXA79kvIDvZ.jpg', 'FTjSHqFsCcRKRyn5SV8sl6gXKNCdSNvvskV94yov.jpg', 'a0F0zDnbTeBpUMVhXZLX2OCIU3c1RVX9rJMLKkZh.jpg', '7MzAKYOVqEj7lRGsyE8BoQKvtm7zGWLXP1Om0SBf.jpg', 'RSEAYxUgvhM9NEfnB3iw0NJ15qJmgltpTur9eWLK.jpg', 'O2SzZRHYjkZnCUqvzTQXIdVTISIUdOZ0JTlo5Z3X.jpg', 'Zonasi', '80', '90', '90', '90', '90', 'X IPA 1', '1', '1', 'Suguan', 'Palembang', '2000-01-30', 'Islam', 'SMA', 'Programmer', 'Indonesia', '0894821412', '5000000', 'Claire', 'Palembang', '2000-01-07', 'Islam', 'SMA', 'Programmer', 'Indonesia', '08948219421', '5000000'),
(15, 'b7c40b9c66bc88d38a59e554c639d743e77f1b65', '555', '555', 'Leon', NULL, NULL, NULL, NULL, '2000-07-07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, '933c0241dbb6733f0b011a36b22fee4c6d2ce59d', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, '90394358c253085c02ab47e7485f3f14b716e8d6', '840912512', '09824214', 'Rara', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'cc4fa2772017b5184d96f0b7ddee20eacaf912c6', '521521', '512521', 'Rere', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_level`
--

CREATE TABLE `user_level` (
  `id_user_level` int(11) NOT NULL,
  `user_level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `baju_batik`
--
ALTER TABLE `baju_batik`
  ADD PRIMARY KEY (`id_baju_batik`);

--
-- Indeks untuk tabel `baju_olahraga`
--
ALTER TABLE `baju_olahraga`
  ADD PRIMARY KEY (`id_baju_olahraga`);

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduserinc`);

--
-- Indeks untuk tabel `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`iduserdetailinc`);

--
-- Indeks untuk tabel `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id_user_level`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `baju_batik`
--
ALTER TABLE `baju_batik`
  MODIFY `id_baju_batik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `baju_olahraga`
--
ALTER TABLE `baju_olahraga`
  MODIFY `id_baju_olahraga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `iduserinc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `iduserdetailinc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id_user_level` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
