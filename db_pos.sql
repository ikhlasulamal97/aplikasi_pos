-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Sep 2019 pada 18.49
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pos`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `kode_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `harga_beli` int(20) NOT NULL,
  `stock` int(10) NOT NULL,
  `harga_jual` int(20) NOT NULL,
  `profit` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`kode_barang`, `nama_barang`, `satuan`, `harga_beli`, `stock`, `harga_jual`, `profit`) VALUES
('23364645645', 'mouse', 'Pcs', 50000, 0, 100000, 50000),
('3453346', 'rgereg', 'Pcs', 3346436, 4, 436346, -2910090),
('346346', 'erterg', 'Pcs', 5466, 4, 343634636, 343629170),
('435346346', '436334', 'Pack', 35364346, -13463, 345346, -35019000),
('457745745745', 'laptop', 'Pack', 2000000, 0, 2500000, 500000),
('46436', '4t63', 'Pack', 325235, 235, 235235235, 234910000),
('4645645', 'gfhfdhdf', '', 3546, 3, 2147483647, 2147483647),
('47453543635', 'Hp', 'Pcs', 1300000, 9, 2000000, 700000),
('5353535', 'speaker', 'Pack', 50000, 3, 70000, 20000),
('r5fd534636', 'dgdgds', '', 43636, 3, 454453, 410818),
('rtytffhfhdfh', 'dfhdfhd', 'Pcs', 43646346, 4, 43536334, -110012);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `kode_pelanggan` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`kode_pelanggan`, `nama`, `alamat`, `telepon`, `email`) VALUES
(1, 'ikhlasul Amal', 'jln halat gg makmur no 11', '085361547225', 'ikhlasul.amal93@gmail.com'),
(2, 'ramadan', 'dfgdfg', '535345353', 'iinsyahri10@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id`, `username`, `nama`, `password`, `level`, `foto`) VALUES
(1, 'admin', 'amal', 'densus889', 'Admin', 'SGA_34.jpg'),
(2, '15210030@itm.ac.id', 'Suep', '15210030', 'Kasir', 'buku sakti hacker_73.jpg'),
(3, 'suep', 'Suep', '123456', 'Kasir', '2_75.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `id` int(11) NOT NULL,
  `kode_penjualan` varchar(80) NOT NULL,
  `kode_barang` varchar(80) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tgl_penjualan` text NOT NULL,
  `id_pelanggan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_penjualan`
--

INSERT INTO `tb_penjualan` (`id`, `kode_penjualan`, `kode_barang`, `jumlah`, `total`, `tgl_penjualan`, `id_pelanggan`) VALUES
(1, 'PJ-5639459263', '23364645645', 3, 300000, '07-09-2019', 1),
(2, 'PJ-3030165841', '23364645645', 1, 100000, '07-16-2019', 0),
(3, 'PJ-5400954720', '47453543635', 3, 6000000, '07-16-2019', 1),
(4, 'PJ-8784975250', '47453543635', 1, 2000000, '07-16-2019', 2),
(5, 'PJ-9304687123', '5353535', 2, 140000, '07-16-2019', 1),
(6, 'PJ-9423236206', '457745745745', 1, 2500000, '08-02-2019', 0),
(7, 'PJ-1848373403', '457745745745', 1, 2500000, '09-05-2019', 1),
(8, 'PJ-7599331819', '457745745745', 1, 2500000, '09-05-2019', 0),
(9, 'PJ-9481246926', '457745745745', 1, 2500000, '09-05-2019', 0),
(10, 'PJ-9219077172', '457745745745', 1, 2500000, '09-05-2019', 0),
(11, 'PJ-9219077172', '457745745745', 1, 2500000, '09-05-2019', 0),
(12, 'PJ-1919922708', '457745745745', 1, 2500000, '09-05-2019', 0);

--
-- Trigger `tb_penjualan`
--
DELIMITER $$
CREATE TRIGGER `jual` AFTER INSERT ON `tb_penjualan` FOR EACH ROW BEGIN
UPDATE tb_barang
SET stock = stock - NEW.jumlah
WHERE kode_barang= NEW.kode_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penjualan_detail`
--

CREATE TABLE `tb_penjualan_detail` (
  `kode_penjualan` varchar(40) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembali` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `potongan` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_penjualan_detail`
--

INSERT INTO `tb_penjualan_detail` (`kode_penjualan`, `bayar`, `kembali`, `diskon`, `potongan`, `sub_total`) VALUES
('PJ-1848373403', 0, 0, 0, 0, 0),
('PJ-5400954720', 6000000, 600000, 10, 600000, 5400000),
('PJ-5639459263', 200000, 20000, 40, 120000, 180000),
('PJ-8784975250', 2000000, 400000, 20, 400000, 1600000),
('PJ-9304687123', 500000, 360000, 0, 0, 140000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indeks untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`kode_pelanggan`);

--
-- Indeks untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_penjualan_detail`
--
ALTER TABLE `tb_penjualan_detail`
  ADD PRIMARY KEY (`kode_penjualan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `kode_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
