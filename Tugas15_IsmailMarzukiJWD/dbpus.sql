-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Jul 2023 pada 08.00
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nm_admin` varchar(20) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nm_admin`, `username`, `password`) VALUES
(1, 'ISMAIL', 'jwd', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'ismail2', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbanggota`
--

CREATE TABLE `tbanggota` (
  `idanggota` varchar(5) NOT NULL,
  `foto` blob NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jeniskelamin` varchar(10) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbanggota`
--

INSERT INTO `tbanggota` (`idanggota`, `foto`, `nama`, `jeniskelamin`, `alamat`, `status`) VALUES
('AG002', '', 'Aini Rahmawati', 'Wanita', 'Jl.Anggrek No 45', 'Sedang Meminjam'),
('AG003', '', 'Rudi Hartono', 'Pria', 'Jl.Manggis 98', 'Sedang Meminjam'),
('AG004', '', 'Dino Riano', 'Pria', 'Jl.Melon No 33', 'Sedang Meminjam'),
('AG005', '', 'Agus Wardoyo', 'Pria', 'Jl.Cempedak No 88', 'Tidak Meminjam'),
('AG006', '', 'Shinta Riani', 'Wanita', 'JL.Jeruk No 1', 'Sedang Meminjam'),
('AG007', '', 'Irwan Hakim', 'Pria', 'Jl.Salak No 34', 'Tidak Meminjam'),
('AG008', '', 'Indah Dian', 'Wanita', 'Jl.Semangka No 23', 'Tidak Meminjam'),
('AG009', '', 'Rina Auliah', 'Wanita', 'Jl.Merpati No 44', 'Tidak Meminjam'),
('AG010', '', 'Septi Putri', 'Wanita', 'Jl.Beringin No 2', 'Tidak Meminjam'),
('AG014', '', 'Rangga', 'Pria', 'Jl.Manggis No 41', 'Tidak Meminjam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbbuku`
--

CREATE TABLE `tbbuku` (
  `idbuku` varchar(5) NOT NULL,
  `judulbuku` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `pengarang` varchar(40) NOT NULL,
  `penerbit` varchar(40) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbbuku`
--

INSERT INTO `tbbuku` (`idbuku`, `judulbuku`, `kategori`, `pengarang`, `penerbit`, `status`) VALUES
('BK001', 'Pengantar HTML', 'ilmukomputer', 'Ismail Marzuki', 'Baqarah', 'Tersedia'),
('BK002', 'Cerita Sofia', 'karyasastra', 'Ismail Marzuki', 'Baqarah', 'Dipinjam'),
('BK003', 'Saja Puisi', 'karyasastra', 'Anton.Dkk', 'Baqarah', 'Tersedia'),
('BK004', 'Tafsir hadist', 'ilmuagama', 'Ust. Buya ', 'Erlangga', 'Tersedia'),
('BK005', 'Akidah Akhlak', 'ilmuagama', 'dsi', 'Pt.PenpiloTT', 'Dipinjam'),
('BK006', 'Algoritma Pemrograman', 'ilmukomputer', 'Ismail Marzuki, dkk', 'PT.Baqarah', 'Tersedia'),
('BK007', 'Algoritma Pemrog2', 'ilmukomputer', 'Marzuki, dkk', 'Pt.PenpiloTT', 'Tersedia'),
('BK008', 'Saja Puisi2', 'karyasastra', 'Ismail Marzuki', 'Erlangga', 'Dipinjam'),
('BK009', 'Tafsir hadist 2', 'ilmuagama', 'Ismail Marzuki, dkk', 'Baqarah', 'Dipinjam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbtransaksi`
--

CREATE TABLE `tbtransaksi` (
  `idtransaksi` varchar(5) NOT NULL,
  `idanggota` varchar(5) NOT NULL,
  `idbuku` varchar(5) NOT NULL,
  `tglpinjam` date NOT NULL,
  `tglkembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbtransaksi`
--

INSERT INTO `tbtransaksi` (`idtransaksi`, `idanggota`, `idbuku`, `tglpinjam`, `tglkembali`) VALUES
('TR001', 'AG002', 'BK002', '2016-11-03', '0000-00-00'),
('TR002', 'AG003', 'BK003', '2016-11-04', '2016-11-04'),
('TR003', 'AG001', 'BK001', '2016-11-04', '0000-00-00'),
('TR004', 'AG003', 'BK003', '2016-11-04', '2016-11-04'),
('TR005', 'AG006', 'BK004', '2016-11-04', '2021-02-23'),
('TR006', 'AG003', 'BK005', '2016-11-05', '2016-11-05'),
('TR007', 'AG008', 'BK013', '2016-11-05', '2021-02-23'),
('TR008', 'AG003', 'BK001', '2023-07-14', '0000-00-00'),
('TR009', 'AG004', 'BK007', '2023-07-25', '0000-00-00'),
('TR010', 'AG009', 'BK001', '2023-07-09', '0000-00-00'),
('TR011', 'AG002', 'BK003', '2023-07-22', '0000-00-00'),
('TR012', 'AG002', 'BK007', '2023-05-04', '0000-00-00'),
('TR013', 'AG004', 'BK007', '2023-07-06', '0000-00-00'),
('TR51', 'AG001', 'BK008', '2023-07-27', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbuser`
--

CREATE TABLE `tbuser` (
  `iduser` varchar(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `password` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbuser`
--

INSERT INTO `tbuser` (`iduser`, `nama`, `alamat`, `password`) VALUES
('US001', 'Andi Rahman Hakim', 'Jl.Pramuka No 9', '1234');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tbanggota`
--
ALTER TABLE `tbanggota`
  ADD PRIMARY KEY (`idanggota`);

--
-- Indeks untuk tabel `tbbuku`
--
ALTER TABLE `tbbuku`
  ADD PRIMARY KEY (`idbuku`);

--
-- Indeks untuk tabel `tbtransaksi`
--
ALTER TABLE `tbtransaksi`
  ADD PRIMARY KEY (`idtransaksi`);

--
-- Indeks untuk tabel `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
