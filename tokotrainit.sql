-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 24 Jan 2019 pada 09.16
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tokotrainit`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `alamat_admin` text NOT NULL,
  `jenis_kelamin_admin` char(1) NOT NULL,
  `email_admin` varchar(50) NOT NULL,
  `password_admin` varchar(150) NOT NULL,
  `foto_admin` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `alamat_admin`, `jenis_kelamin_admin`, `email_admin`, `password_admin`, `foto_admin`) VALUES
(3, 'Rifqy Kurniawan', 'Perum BKD', 'l', 'admin1@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'rifqy.jpg'),
(4, 'Rin Nohara', 'Jalan Condong Catur', 'p', 'admin2@gmail.com', '348162101fc6f7e624681b7400b085eeac6df7bd', 'rin.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
`id_blog` int(11) NOT NULL,
  `nama_blog` varchar(50) NOT NULL,
  `deskripsi_pendek` text NOT NULL,
  `deskripsi_panjang` text NOT NULL,
  `tanggal_blog` date NOT NULL,
  `foto_blog` varchar(150) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `blog`
--

INSERT INTO `blog` (`id_blog`, `nama_blog`, `deskripsi_pendek`, `deskripsi_panjang`, `tanggal_blog`, `foto_blog`) VALUES
(1, 'Ekonomi', 'Ekonomi Indonesia sedang dalam krisis', 'Ekonomi Indonesi sedang dalam krisis karena dollar naik', '2019-01-12', 'saham.jpg'),
(2, 'Olah Raga', 'Masalah sepak bola Indonesia tentang pangaturan skor', 'Masalah sepak bola Indonesia tentang pangaturan skor oleh sejumlah oknum', '2019-01-12', 'sport.jpg'),
(3, 'Teknologi', 'Sistem operasi baru dari xiaomi', '<p>Sistem operasi baru dari xiaomi yaitu MIUI 11 yang akan hadir tahun 2019</p>\r\n', '2019-01-12', 'tekkno.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
`id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `jenis_kategori` enum('','laptop','pc','') NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `jenis_kategori`) VALUES
(1, 'RAM', 'laptop'),
(2, 'LCD', 'laptop'),
(3, 'Keyboard', 'laptop'),
(7, 'SSD', 'laptop'),
(8, 'HDD', 'laptop'),
(9, 'RAM', 'pc'),
(10, 'LCD', 'pc'),
(11, 'Keyboard', 'pc'),
(12, 'SSD', 'pc'),
(13, 'HDD', 'pc');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
`id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `password_pelanggan` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `telepon_pelanggan` varchar(15) NOT NULL,
  `alamat_pelanggan` text NOT NULL,
  `foto_pelanggan` varchar(150) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`, `alamat_pelanggan`, `foto_pelanggan`) VALUES
(1, 'rifqykrn@gmail.com', '348162101fc6f7e624681b7400b085eeac6df7bd', 'Mark Zukeberg', '085974044101', 'Jl. ketapang', '2019-01-13-19-25-13-mark.jpg'),
(2, 'nohara1@gmail.com', '898326bedd5df2711a7ab2be519e8026201a5488', 'Rin Nohara', '084567282910', 'jl.Jawa', 'rin.jpg'),
(3, 'randy@gmail.com', '348162101fc6f7e624681b7400b085eeac6df7bd', 'Steve Jobs', '09876489000', 'Perum BKD', '2019-01-13-19-27-20-steve.jpg'),
(7, 'ani1@gmail.com', '9f537aeb751ec72605f57f94a2f6dc3e3958e1dd', 'Ani abcd', '087543578900', 'Perum abcd ', '2019-01-05-05-52-31-896569.png'),
(8, 'nohara@gmail.com', '20eabe5d64b0e216796e834f52d61fd0b70332fc', 'Nohara', '086543778986', 'Perum', '2019-01-19-04-54-03-871169.png'),
(9, 'budi@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'Budi Haryanto', '09876787654', 'Jalan Godean', '2019-01-19-04-56-00-821092.png'),
(10, 'tes@gmail.com', 'd1c056a983786a38ca76a05cda240c7b86d77136', 'tes', '086543778986', 'Jogja', '2019-01-19-05-25-32-810496.png'),
(11, 'rifqysvn@gmail.com', '20eabe5d64b0e216796e834f52d61fd0b70332fc', 'Rifqy', '0987876765', 'BKD', '2019-01-19-05-57-47-871169.png'),
(12, 'kaka@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'Kakashi', '08766576564', 'jalan jalan', '2019-01-23-14-03-22-'),
(14, 'anjani@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'Anjani', '098775746', 'Jalan Perum', '2019-01-23-14-12-38-871169.png'),
(16, 'paijo@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'Paijo', '098765', 'Jlan Perum', '2019-01-23-14-20-11-871169.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE IF NOT EXISTS `pembayaran` (
`id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `tanggal_konfirmasi` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `bukti` varchar(150) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `tanggal_bayar`, `tanggal_konfirmasi`, `jumlah`, `bukti`) VALUES
(1, 1, 'Rifqy', 'Mandiri', '2019-01-11', '2019-01-12', 120000, 'bukti.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE IF NOT EXISTS `pembelian` (
`id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tanggal_pembelian` datetime NOT NULL,
  `status_pembelian` varchar(50) NOT NULL,
  `total_belanja` int(11) NOT NULL,
  `total_ongkir` int(11) NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `provinsi` varchar(150) NOT NULL,
  `distrik` varchar(150) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `kodepos_pengiriman` varchar(10) NOT NULL,
  `ekspedisi_pengiriman` varchar(100) NOT NULL,
  `paket_pengiriman` varchar(100) NOT NULL,
  `lama_pengiriman` int(50) NOT NULL,
  `nama_penerima` varchar(100) NOT NULL,
  `telepon_penerima` varchar(25) NOT NULL,
  `alamat_penerima` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `tanggal_pembelian`, `status_pembelian`, `total_belanja`, `total_ongkir`, `total_pembelian`, `provinsi`, `distrik`, `tipe`, `kodepos_pengiriman`, `ekspedisi_pengiriman`, `paket_pengiriman`, `lama_pengiriman`, `nama_penerima`, `telepon_penerima`, `alamat_penerima`) VALUES
(1, 1, '2019-01-11 08:24:24', 'terbayar', 100000, 20000, 120000, 'jawa tengah', 'cilacap', 'kabupaten', '53235', 'pos indonesia', 'kilat', 2, 'fatonah', '081327556205', 'Perum BKD Blok 1 NO A110 Kebonmanis'),
(2, 3, '2019-01-11 09:15:29', 'pending', 250000, 23000, 273000, 'jawa barat', 'ciamis', 'kabupaten', '53421', 'jne', 'reguler', 4, 'heidy pratomo', '087705016309', 'Jalan rancaekek no 5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembeliandetail`
--

CREATE TABLE IF NOT EXISTS `pembeliandetail` (
`id_pembeliandetail` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `jumlah_produk` int(11) NOT NULL,
  `subberat_produk` int(11) NOT NULL,
  `subharga_produk` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `pembeliandetail`
--

INSERT INTO `pembeliandetail` (`id_pembeliandetail`, `id_pembelian`, `nama_produk`, `harga_produk`, `berat_produk`, `jumlah_produk`, `subberat_produk`, `subharga_produk`) VALUES
(1, 1, 'samsung', 750000, 100, 1, 100, 750000),
(2, 1, 'LCD Acer E5', 1500000, 250, 1, 250, 1500000),
(3, 2, 'samsung', 750000, 100, 1, 100, 750000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaturan`
--

CREATE TABLE IF NOT EXISTS `pengaturan` (
`id_pengaturan` int(5) NOT NULL,
  `kolom` varchar(255) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `pengaturan`
--

INSERT INTO `pengaturan` (`id_pengaturan`, `kolom`, `isi`) VALUES
(1, 'email perusahaan', 'warunghrdwr@gmaul.com'),
(2, 'rekening perusahaan', 'Silahkan melakukan pembayaran ke Bank BRI 01-337-222-543-01 atas nama Rifqy Kurniawan'),
(3, 'tentang kami', '<p>\r\n						Kami adalah perusahaan yang bergerak dibidang penjualan hardware dan accesories komputer dan laptop. Perusahaan kami berdiri sejak tahun 2018.\r\n					</p>'),
(4, 'pelanggan', '<ul>\r\n						<li><a href="">Login</a></li>\r\n						<li><a href="">daftar</a></li>\r\n						<li><a href="">Akun Saya</a></li>\r\n						<li><a href="">Riwayat Belanja</a></li>\r\n						<li><a href="">Logout</a></li>\r\n					</ul>'),
(5, 'kontak kami', '<ul>\r\n						<li>Telp: 085974044101</li>\r\n						<li>Email: rifqykrn@gmail.com</li>\r\n						<li>Alamat: Perum BKD Blok 1 Kebonmanis Cilacap Kode Pos.53235</li>\r\n					</ul>'),
(6, 'panduan', '<ul>\r\n						<li><a href="">Daftar Membership</a></li>\r\n						<li><a href="">Cara Berbelanja</a></li>\r\n						<li><a href="">Konfirmasi Pembayaran</a></li>\r\n						<li><a href="">Syarat & Ketentuan</a></li>\r\n					</ul>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
`id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `foto_produk` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga_produk`, `berat_produk`, `deskripsi_produk`, `foto_produk`) VALUES
(1, 1, 'vengeance 2gb ddr4', 750000, 200, 'Ram terbaik banget', '2019-01-13-18-45-30-ram5.jpg'),
(4, 2, 'LCD Acer E5', 1500000, 250, 'LCD untuk type Acer E5', '2019-01-13-19-00-24-lcd1.jpg'),
(5, 1, 'Ram Crucial', 500000, 10, 'Ram pc', '2019-01-13-19-02-03-ram2.jpg'),
(6, 1, 'Ram Corsair 4gb', 900000, 10, 'Ram kecepatan tinggi', '2019-01-13-19-03-10-ram4.jpg'),
(7, 7, 'SSD Samsung 970 Pro 1tb', 2000000, 100, 'SSD Samsung', '2019-01-13-19-04-14-ssd1.jpg'),
(8, 7, 'Goldenfir 500b', 600000, 50, 'SSD SATA ', '2019-01-13-19-05-21-ssd2.jpg'),
(9, 7, 'SSD Samsung 1tb', 1500000, 100, 'SSD external Samsung', '2019-01-13-19-06-34-ssd3.jpg'),
(10, 7, 'SSD Intel Dell 800gb', 1200000, 100, 'SSD intel internal', '2019-01-13-19-07-37-ssd4.jpg'),
(11, 7, 'SSD Sandisk Ultra 1tb', 1400000, 150, 'SSD Sandisk External', '2019-01-13-19-08-48-ssd5.jpg'),
(12, 3, 'Keyboard internal Acer', 900000, 200, 'Keyboard internal untuk acer type E5', '2019-01-13-19-09-56-key1.jpg'),
(13, 3, 'Keyboard internal Asus', 950000, 200, 'Keyboard internal khusus Asus type X5', '2019-01-13-19-11-00-key2.jpg'),
(14, 2, 'LCD Asus X5', 1100000, 500, 'LCD internal Asus X5', '2019-01-13-19-12-06-lcd2.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimoni`
--

CREATE TABLE IF NOT EXISTS `testimoni` (
`id_testimoni` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `isi_testimoni` text NOT NULL,
  `foto_testimonni` varchar(150) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `testimoni`
--

INSERT INTO `testimoni` (`id_testimoni`, `id_pelanggan`, `isi_testimoni`, `foto_testimonni`) VALUES
(1, 3, 'produk sudah sampai', 'testi.jpg'),
(2, 1, 'Terima kasih gan', 'testi1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
 ADD PRIMARY KEY (`id_blog`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
 ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
 ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
 ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
 ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembeliandetail`
--
ALTER TABLE `pembeliandetail`
 ADD PRIMARY KEY (`id_pembeliandetail`);

--
-- Indexes for table `pengaturan`
--
ALTER TABLE `pengaturan`
 ADD PRIMARY KEY (`id_pengaturan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
 ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
 ADD PRIMARY KEY (`id_testimoni`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
MODIFY `id_blog` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pembeliandetail`
--
ALTER TABLE `pembeliandetail`
MODIFY `id_pembeliandetail` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pengaturan`
--
ALTER TABLE `pengaturan`
MODIFY `id_pengaturan` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
MODIFY `id_testimoni` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
