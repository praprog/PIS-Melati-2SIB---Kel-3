-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Des 2023 pada 01.34
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pis_melati`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_murid` varchar(255) NOT NULL,
  `nama_murid` varchar(35) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(35) NOT NULL,
  `data_khusus_murid` varchar(40) NOT NULL,
  `riwayat_medis_murid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_murid`, `nama_murid`, `tanggal_lahir`, `alamat`, `data_khusus_murid`, `riwayat_medis_murid`) VALUES
('0338b2e2-875d-11ee-bd82-9c7bef3cd7c1', 'Reiva', '2023-10-31', 'jl Patria sari', 'tuna rungu', 'mental tidak stabil'),
('5862a0ed-875f-11ee-bd82-9c7bef3cd7c1', 'naufal', '2023-11-09', 'rumbai', 'tuna wicara', 'tidak bisa berbicara sejak umur 5 tahun');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_murid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
