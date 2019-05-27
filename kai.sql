-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Bulan Mei 2019 pada 06.22
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kai`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data`
--

CREATE TABLE `data` (
  `idbarang` int(20) NOT NULL,
  `penerima` text NOT NULL,
  `penemu` char(100) NOT NULL,
  `milikka` varchar(50) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `jenispengenal` char(100) NOT NULL,
  `nopengenal` char(50) NOT NULL,
  `lainnya` varchar(20000) NOT NULL,
  `tglditemukan` date NOT NULL,
  `tgldiambil` date NOT NULL,
  `status` enum('terklaim','belum diklaim','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data`
--

INSERT INTO `data` (`idbarang`, `penerima`, `penemu`, `milikka`, `jenis`, `jenispengenal`, `nopengenal`, `lainnya`, `tglditemukan`, `tgldiambil`, `status`) VALUES
(1, 'Dara', 'Dino', 'KA Agrowillis', 'Tas', 'KTP', '765432345677', 'Warna merah, berisi barang berharga', '2018-06-08', '2018-06-29', 'terklaim'),
(4, 'lara', 'Dino', 'KA Agrowillis', 'df', 'KTP', '09876543233', 'Berwarna merah', '2018-06-12', '2018-06-26', 'terklaim'),
(7, 'siri', 'Dadang', 'KA Agrowillis', 'Buku', 'KTP', '5645645656', 'Warna merah, berisi barang berharga', '2018-06-01', '2018-06-06', 'terklaim'),
(8, 'Bagas', 'Dadang', 'KA Agrowillis', 'Handphone', 'KTP', '34554545', 'ss', '2018-06-05', '2018-06-13', 'terklaim'),
(9, 'Dina', 'Dino', 'KA Agrowillis', 'Buku', 'KTP', '786787654356', 'note', '2018-06-06', '2018-06-30', 'terklaim'),
(10, 'Dara', 'Dino', 'KA Agrowillis', 'aa', 'KTP', '045545545345343242', 'mm', '2018-06-05', '2018-06-30', 'terklaim'),
(11, 'Dara', 'Dino', 'KA Agrowillis', 'Handphone', 'KTP', '5012349585892', '', '2018-06-07', '2018-06-30', 'terklaim'),
(12, 'jasmin', 'Dino', 'KA Agrowillis', 'Makanan', 'ktp', '0989786754', 'MAKANAN', '2018-05-17', '2019-04-25', 'terklaim'),
(13, '', 'Dino', 'KA Agrowillis', 'Handphone', '', '', 'sss', '2018-05-25', '0000-00-00', 'belum diklaim');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kehilangan`
--

CREATE TABLE `kehilangan` (
  `iddata` int(20) NOT NULL,
  `nama` char(100) NOT NULL,
  `petugas` varchar(100) NOT NULL,
  `telpon` char(20) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `deskripsi` varchar(20000) NOT NULL,
  `noka` int(20) NOT NULL,
  `ka` varchar(100) NOT NULL,
  `asal` varchar(100) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `noduduk` char(20) NOT NULL,
  `tglkejadian` date NOT NULL,
  `waktukejadian` time NOT NULL,
  `notiket` char(20) NOT NULL,
  `tanggal` date NOT NULL,
  `tglproses` date NOT NULL,
  `status` enum('Terproses','Belum diproses','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kehilangan`
--

INSERT INTO `kehilangan` (`iddata`, `nama`, `petugas`, `telpon`, `jenis`, `deskripsi`, `noka`, `ka`, `asal`, `tujuan`, `noduduk`, `tglkejadian`, `waktukejadian`, `notiket`, `tanggal`, `tglproses`, `status`) VALUES
(1, 'Lara lara', 'Dadang', '082219191919', 'Handphone', 'samsung galaxy a5 berwarna hitam', 0, 'Lodaya', '', '', '0', '2018-07-09', '00:00:00', '', '2018-07-03', '2018-07-04', 'Terproses'),
(2, 'Fikka Raudiya', '', '08128282882', 'Tas punggung', 'warna hitam', 0, 'Lodaya', '', '', '0', '2018-07-09', '00:00:00', '', '2018-07-05', '0000-00-00', 'Terproses'),
(3, 'Kania', 'Dadang', '099999332332', 'Handphone', 'LG G3 berwarna gold', 11, 'Lodaya', 'bandung', 'yogyakarta', '0', '2018-07-09', '00:00:00', '', '2018-07-04', '2018-07-09', 'Terproses'),
(4, 'KARTIKA', 'Dadang', '08112223444', 'Buku', 'BUKU TULIS', 23, 'Lodaya', 'bandung', 'yogyakarta', 'A12', '2018-07-09', '00:00:00', '', '2018-07-04', '2018-07-09', 'Terproses'),
(5, 'Fikka Raudiya', 'Dadang', '08128282882', 'Laptop', 'whatever', 11, 'Lodaya', 'bandung', 'yogyakarta', 'A12', '0000-00-00', '00:00:00', '', '2018-07-09', '2018-07-13', 'Terproses'),
(6, 'Lara lara', 'dadang', '08128282882', 'Handphone', 'bgcb', 11, 'Lodaya', 'bandung', 'yogyakarta', 'A12', '0000-00-00', '00:00:00', '', '2018-07-09', '2019-04-25', 'Terproses'),
(7, 'KARTIKA', '', '099999332332', 'Buku', 'gfgh', 23, 'Lodaya', 'bandung', 'yogyakarta', 'A12', '2018-07-02', '15:59:00', '111', '2018-07-09', '0000-00-00', 'Belum diproses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `iduser` int(11) NOT NULL,
  `username` char(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` enum('admin','user') NOT NULL,
  `nama` char(100) NOT NULL,
  `nipp` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`iduser`, `username`, `password`, `level`, `nama`, `nipp`) VALUES
(1, '@kaniafikka97', 'kania123', 'admin', 'kania', '00000000'),
(2, 'kai@daop2', 'kai123', 'user', 'kaidaop2bandung', '1111111'),
(5, 'lara@larasati', 'lara123', 'user', 'Lara lara', '87878688789'),
(6, 'kartika@123', 'kartika123', 'user', 'KARTIKA', '90909090');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`idbarang`);

--
-- Indeks untuk tabel `kehilangan`
--
ALTER TABLE `kehilangan`
  ADD PRIMARY KEY (`iddata`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data`
--
ALTER TABLE `data`
  MODIFY `idbarang` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `kehilangan`
--
ALTER TABLE `kehilangan`
  MODIFY `iddata` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
