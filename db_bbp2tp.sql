-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 20 Agu 2018 pada 10.49
-- Versi Server: 5.5.32
-- Versi PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `db_bbp2tp`
--
CREATE DATABASE IF NOT EXISTS `db_bbp2tp` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `db_bbp2tp`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `idAdmin` int(4) NOT NULL AUTO_INCREMENT,
  `namaPengguna` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kataSandi` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idTingkat` int(4) NOT NULL,
  `idProvinsi` int(4) NOT NULL,
  PRIMARY KEY (`idAdmin`),
  KEY `idTingkat` (`idTingkat`),
  KEY `idProvinsi` (`idProvinsi`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=38 ;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`idAdmin`, `namaPengguna`, `nama`, `kataSandi`, `idTingkat`, `idProvinsi`) VALUES
(1, 'bbp2tp', 'BBP2TP', 'admin', 1, 32),
(2, 'program', 'Program dan Evaluasi', 'program2018', 2, 32),
(3, 'tatausaha', 'Tata Usaha', 'tatausaha2018', 3, 32),
(4, 'ksphp', 'KSPHP', 'ksphp2018', 4, 32),
(5, 'bptp_aceh', 'BPTP ACEH', 'aceh2018', 5, 11),
(6, 'bptp_sumut', 'BPTP SUMATERA UTARA', 'sumut2018', 5, 12),
(7, 'bptp_sumbar', 'BPTP SUMATERA BARAT', 'sumbar2018', 5, 13),
(8, 'bptp_riau', 'BPTP RIAU', 'riau2018', 5, 14),
(9, 'bptp_jambi', 'BPTP JAMBI', 'jambi2018', 5, 15),
(10, 'bptp_sumsel', 'BPTP SUMATERA SELATAN', 'sumsel2018', 5, 16),
(11, 'bptp_bengkulu', 'BPTP BENGKULU', 'bengkulu2018', 5, 17),
(12, 'bptp_lampung', 'BPTP LAMPUNG', 'lampung2018', 5, 18),
(13, 'bptp_babel', 'BPTP KEP. BANGKA BELITUNG', 'babel2018', 5, 19),
(14, 'bptp_kepri', 'BPTP KEP. RIAU', 'kepri2018', 5, 21),
(15, 'bptp_jkt', 'BPTP DKI JAKARTA', 'jkt2018', 5, 31),
(16, 'bptp_jabar', 'BPTP JAWA BARAT', 'jabar2018', 5, 32),
(17, 'bptp_jateng', 'BPTP JAWA TENGAH', 'jateng2018', 5, 33),
(18, 'bptp_jogja', 'BPTP DI YOGYAKARTA', 'jogja2018', 5, 34),
(19, 'bptp_jatim', 'BPTP JAWA TIMUR', 'jatim2018', 5, 35),
(20, 'bptp_banten', 'BPTP BANTEN', 'banten2018', 5, 36),
(21, 'bptp_bali', 'BPTP BALI', 'bali2018', 5, 51),
(22, 'bptp_ntb', 'BPTP NUSA TENGGARA BARAT', 'ntb2018', 5, 52),
(23, 'bptp_ntt', 'BPTP NUSA TENGGARA TIMUR', 'ntt2018', 5, 53),
(24, 'bptp_kalbar', 'BPTP KALIMANTAN BARAT', 'kalbar2018', 5, 61),
(25, 'bptp_kalteng', 'BPTP KALIMANTAN TENGAH', 'kalteng2018', 5, 62),
(26, 'bptp_kalsel', 'BPTP KALIMATAN SELATAN', 'kalsel2018', 5, 63),
(27, 'bptp_kaltim', 'BPTP KALIMANTAN TIMUR', 'kaltim2018', 5, 64),
(28, 'bptp_sulut', 'BPTP SULAWESI UTARA', 'sulut2018', 5, 71),
(29, 'bptp_sulteng', 'BPTP SULAWESI TENGAH', 'sulteng2018', 5, 72),
(30, 'bptp_sulsel', 'BPTP SULAWESI SELATAN', 'sulsel2018', 5, 73),
(31, 'bptp_sulteng', 'BPTP SULAWESI TENGGARA', 'sulteng2018', 5, 74),
(32, 'bptp_gorontalo', 'BPTP GORONTALO', 'gorontalo2018', 5, 75),
(33, 'bptp_sulbar', 'BPTP SULAWESI BARAT', 'sulbar2018', 5, 76),
(34, 'bptp_maluku', 'BPTP MALUKU', 'maluku2018', 5, 81),
(35, 'bptp_malut', 'BPTP MALUKU UTARA', 'malut2018', 5, 82),
(36, 'bptp_parat', 'BPTP PAPUA BARAT', 'parat2018', 5, 91),
(37, 'bptp_papua', 'BPTP PAPUA', 'papua2018', 5, 94);

-- --------------------------------------------------------

--
-- Struktur dari tabel `agenda`
--

CREATE TABLE IF NOT EXISTS `agenda` (
  `idAgenda` int(4) NOT NULL AUTO_INCREMENT,
  `judulKegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `peserta` int(11) NOT NULL,
  `tamuVIP` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pjKegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idAdmin` int(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idAgenda`),
  KEY `idAdmin` (`idAdmin`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=21 ;

--
-- Dumping data untuk tabel `agenda`
--

INSERT INTO `agenda` (`idAgenda`, `judulKegiatan`, `tempat`, `tanggal`, `peserta`, `tamuVIP`, `pjKegiatan`, `foto`, `idAdmin`) VALUES
(16, 'Kegiatan Perbenihan UPBS dan SL-Mandiri Benih I', 'Gedung Balitro', '2018-03-05', 100, 'Dr. Ir. Muhammad Syakir', 'Bapak Aji', 'IMG_21962.JPG', 1),
(17, 'Kegiatan Perbenihan UPBS dan SL-Mandiri Benih II', 'Gedung Rapat Utama', '2018-03-06', 100, 'Dr. Ir. Haris Syahbuddin, DEA', 'Bapak Aji', 'IMG_1681.JPG', 1),
(18, 'Rapat Koordinasi V', 'Gedung Balitro', '2018-04-23', 100, 'Bapak Menteri', 'Bapak Aji', 'IMG_16811.JPG', 1),
(20, 'Upacara Rutin', 'Halaman kantorf BBP2TP', '2018-07-09', 150, 'Dr. Ir. Haris Syahbuddin, DEA', '-', 'Upacara_rutin1.jpg', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE IF NOT EXISTS `berita` (
  `idBerita` int(4) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `idSubsektor` int(4) NOT NULL,
  `vub` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `varSpeklok` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idKomoditas` int(4) NOT NULL,
  `idKegiatan` int(4) NOT NULL,
  `idPrioritas` int(4) NOT NULL,
  `judulBerita` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isiBerita` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `berkas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idAdmin` int(4) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idBerita`),
  KEY `idSubsektor` (`idSubsektor`),
  KEY `idKomoditas` (`idKomoditas`),
  KEY `idKegiatan` (`idKegiatan`),
  KEY `idPrioritas` (`idPrioritas`),
  KEY `idAdmin` (`idAdmin`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=110 ;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`idBerita`, `tanggal`, `idSubsektor`, `vub`, `varSpeklok`, `idKomoditas`, `idKegiatan`, `idPrioritas`, `judulBerita`, `isiBerita`, `sumber`, `berkas`, `gambar`, `idAdmin`, `status`) VALUES
(34, '2018-07-04', 1, 'VUB', 'Var Speklok', 1, 2, 2, 'Lecutan Sergap Mentriger Naluri Bisnis', '<p>Lecutan SERGAP membuat perjalanan Tim Sergap BPTP Jambi menuju Desa Koto Kandis begitu ringan dan tidak terasa melelahkan. Walaupun disepanjang jalan yg dilalui jauh dari kata jalan mulus, penuh lubang di tengah-tengah jalan dan banyak kepingan dipinggir-pinggir jalan&nbsp; namun kendaraan yang membawa tim seakan-akan tidak kehilangan nyali melewati setiap rintangan demi menggapai titik tujuan, Desa Koto Kandis. Perjalanan makin lancar dengan&nbsp; dipandu oleh seorang PPL daerah tersebut. PPL wanita berprestasi itu, langsung mengarahkan Tim Sergap sampai di gudang/tempat penggilingan padi.</p>\r\n\r\n<p>Interaksi diantara kamipun terjadilah. Tanya jawab dan diskusi seakan makin membuat keakraban. Merekapun mulai terbuka memberikan informasi yang sebenarnya. Begitu juga maksud dan tujuan kedatangan Tim yg sebenarnya sudah pula diutarakan. Sampai akhirnya percakapan itu terfokus pada tujuan utama, yakni segala sesuatunya terkait SERGAP.</p>\r\n\r\n<p>Pak Hasanudin, Ketua Poktan dan beberapa petani yang kebetulan sedang berada di tempat penggilingan, mencoba memberi&nbsp; informasi yang kami butuhkan. Ketua Poktan itu menjelaskan bahwa luas lahan Poktan yg dipimpinnya&nbsp; ada sekitar 60 ha. Total luas lahan di sekitar desanya ada sekitar 1.000-an ha. Saat ini sedang memasuki masa panen, sebagian gabahnya sudah disimpan di gudang/penggilingan dan sebagian lagi masih berada di sawah menunggu selesai proses pengeringan. Para Petani jarang sekali menjual hasil panenan dalam bentuk gabah, umumnya dalam bentuk beras. Penjualan beras biasanya disesuaikan dengan kebutuhan, tidak dilakukan penjualan sekaligus. Gabah petani yang umumnya dititipkan/disimpan digudang/penggilingan, sewaktu-waktu digiling menjadi beras untuk dikonsumsi sendiri atau dijual untuk keperluan tambahan lainnya. Namun para petani mengaku bahwa mereka akan bersedia menjual dalam jumlah banyak apabila ada yang membeli dengan harga cukup tinggi.</p>\r\n\r\n<p>Saat ini, menurut petani harga jual beras relatif normal, yakni Rp 7.500-8.000/kg. Jika petani menjual beras ke pemilik gudang/pedagang di desa tersebut maka harganya sekitar Rp 7.500/kg. Sementara, jika petani/pemilik gudang/pedagang lokal menjual berasnya ke pedagang lain yang datang ke desa tersebut maka harga jualnya sekitar Rp 8.000/kg. Bagi Tim SERGAP, tentu saja informasi harga Rp 7.500-8.000/kg beras ini menjadi kabar gembira karena harga tersebut bisa masuk dalam kisaran harga pembelian Bulog.</p>\r\n\r\n<p>Kemudian Tim Sergap mencoba menghitung&nbsp; jumlah ketersediaan gabah/beras di desa itu. Jika 1 Poktan luas lahannya 60 ha dengan provitas sekitar 4 ton GKG/ha maka jumlah gabah ada sekitar 240 ton GKG, atau setara beras sekitar 120 ton. Angka ini tentu saja cukup menggiurkan bagi seseorang bernaluri bisnis. Bayangkan 1 poktan saja dengan luas lahan 60 ha, ada 120 ton beras maka 1.000 ha ada sekitar 2.000 ton beras. Wow....luar biasa, misalkan dari 2.000 ton beras, pebisnis hanya dapat seperempatnya saja atau sekitar 500 ton dengan harga pembelian Rp 8.000/kg kemudian ditambah biaya transpor ke gudang Bulog Rp 120/kg dengan harga pembelian Bulog Rp 8.760/kg maka masih ada margin Rp 640/kg. Dengan kata lain ada keuntungan Rp 640/kg x Rp 500.000 kg = Rp 320 juta. Sepertinya Tim Sergap berminat sekali untuk mencoba berbisnis tapi niat itu menjadi urung tatkala MODAL belum terbayangkan.</p>\r\n', 'https://jambi.litbang.pertanian.go.id/ind/index.php/berita/1102-lecutan-sergap-mentriger-naluri-bisnis', '', 'WhatsApp_Image_2018-03-10_at_12_29_59.jpeg', 1, 1),
(39, '2018-07-05', 1, ' ', ' ', 1, 2, 1, 'Identifikasi Potensi Mitra SERGAP Malut', '<p>Pada hari selasa (13/2), tim upsus sergap Malut yang terdiri dari Kepala BPTP Malut, Kasi pengadaan Bulog Subdivre Ternate (Malik abd Wahab), Kasdim 1508 Tobelo (Mayor inf Robi manuel), Kacab BRI Tobelo (Adi Nugroho), Kadistan Halut &amp; Kadis pangan Halut melakukan dialog identifikasi potensi mitra SERGAP di desa Makarti, kecamatan Kao Barat, Halmahera Utara. Kegiatan dihadiri oleh ketua Gapoktan, pengusaha penggilingan padi, petani, dan penyuluh. Kasi pengadaan bulog menjelaskan SERGAP Malut hanya menerima beras dengan harga 7300 per Kg. Menanggapi hal tersebut, beberapa petani dan kelompok penggilingan keberatan dengan harga tersebut karena di pasaran saat ini harga beras terendah masih sekitar 9300/kg. Namun, pihak distan meminta petani menghitung ulang BEP, karena dg mekanisasi seharusnya terjadi efisiensi biaya produksi yang berdampak harga jual beras tidak terlalu tinggi.</p>\r\n', 'www.malut.litbang.pertanian.go.id', '', 'IMG_20180313_132650.jpg', 1, 1),
(75, '2018-07-06', 1, '', '', 2, 1, 1, 'Ikuti Panen Raya Jagung di Tuban, Jokowi Disambati Kelangkaan Pupuk', '<p>TUBAN, <a href="http://bangsaonline.com/">BANGSAONLINE.com</a> - Ratusan petani yang mengikuti acara panen raya jagung di kawasan lahan hutan perhutani Desa Ngimbang, Kecamatan Palang, Kabupaten Tuban ramai-ramai wadul kepada Presiden Republik Indonesia (RI) Joko Widodo terkait permasalahan pupuk, Jum&#39;at (9/3).</p>\r\n\r\n<p>Di hadapan Presiden, para petani yang berasal dari Kabupaten Malang, Blitar, Bojonegoro dan Tuban tersebut sambat pupuk langka dan barangnya sulit dicari. Saat dipanggil Jokowi di panggung, perwakilan para petani tak tanggung-tanggung menyampaikan keluh kesah mereka selama menggarap lahan perhutani untuk mencukupi kebutuhan keluarganya.</p>\r\n\r\n<p>Seperti yang disampaikan Sujiem (42) petani asal Desa Ngimbang, Kecamatan Palang, Kabupaten Tuban. Di hadapan Presiden RI, ia terang-terangan mengaku sulit mendapatkan pupuk, apalagi saat musim tanam. Bahkan, yang dialami petani semakin parah ketika pupuk itu lebih dulu hutang pada tengkulak. Jika sudah seperti itu otomatis harga jual jagung tidak bisa mahal.</p>\r\n\r\n<p>&quot;Kalau di tengkulak ya gak bisa mahal pak, ini saja masih hutang,&quot; ungkap Sujiem yang mendapat sambutan tepul tangan petani lain.</p>\r\n\r\n<p>Lanjut dia menyampaikan, selain permasalahan pupuk yang menjadi kendala, yakni langkah bibit dan modal. Mulai proses tanam hingga panen juga menjadi momok petani. Belum lagi harga jagung anjlok yang tidak sesuai dengan biaya pengeluaran.</p>\r\n\r\n<p>Secara otomatis selama proses bercocok tanam masih merasa rugi. Akan tetapi, sejak adanya bantuan KUR dari pemerintah dan Surat Keputusan (SK) Perhutani Sosial petani lebih terbantu.</p>\r\n\r\n<p>&quot;Kalau sudah ada KUR ini kan bunganya murah. Jadi petani bisa menjangkaunya tanpa repot-repot pinjam tengkulak. Sedangkan, untuk pemberian SK kami sangat berterimakasih kepada pak Jokowi karena sudah peduli sama petani,&quot; imbuhnya.</p>\r\n\r\n<p>Petani lain, Supri (56) petani asal Kabupaten Malang juga blak-blakan wadul presiden tentang kendala yang dihadapi petani. Ia mewakili petani Kabupaten Malang meminta, agar Pemerintah Pusat membantu petani dalam persedian pupuk. Selama prosen tanam diharapkan pupuk selalu tersedia dan merasa bwrsyukur jika harganya murah.</p>\r\n\r\n<p>&quot;Selama ini harga pupuk juga malah pak Presiden, tolong kami dibantu,&quot; ungkap Supri dihadapan Jokowi semabri memdapay aplous dari petani yang lain.</p>\r\n\r\n<p>Kata Supri, pemberian SK perhutanan sosial ini dapat membantu para petani di kawasan hutan. Sebab, nantinya kawasan itu bakal digunakan oleh dirinya dan keluarganya.</p>\r\n\r\n<p>&quot;Lahan yang saya garap ada 2 hektar pak Jokowi, dan panennya sekitar 3 ton. Kalau harga jagung turun ya unungnya sedikit. Untuk itu, kami minta harga jagung ini bisa naik saat musim panen,&quot; ujar Supri.</p>\r\n\r\n<p>Mendengar keluhan para Petani, Presiden Republik Indonesia, Joko Widodo berjanji akan membantu petani agar hidup makmur. Terkait persedian pupuk yang langka dan harganya mahal, Jokowi memerintahkan pada Menteri BUMN agar mengecek persedian pupuk. Sebab, selama ini persedian pupuk dinilai aman-aman saja.</p>\r\n\r\n<p>&quot;Silakan bu menteri nanti dicek,&quot; ujar Jokowi sambil melihat ke menteri BUMN.</p>\r\n\r\n<p>Sementara terkait modal bertani, Jokowi berharap, KUR yang dikeluarkan dari bank milik negara tersebut bisa dinikmati oleh para petani. Selain bunganya kecil, syarat mendapatkan KUR juga cukup mudah. Jadi petani jangan sampai menyianyiakan kesempatan bagus ini. Sudah saatnya petani makmur dengan bantuan-bantuan dari pemerintah.</p>\r\n\r\n<p>&quot;Tapi kewajiban petani, kalau mengambil KUR harus bayar,&quot; timpal mantan Wali Kota Solo itu.</p>\r\n\r\n<p>Diketahui, dalam acara panen raya jagung di Desa Ngimbang, turut serta pemberian Surat Keputusan (SK) Perhutanan Sosial. Ada 3 kabupaten yang menerima SK tersebut.</p>\r\n\r\n<p>Diantaranya, petani asal Kabupaten Bojonegoro 2 yang mendapat 2 SK dengan luas lahan 1.49492 hektar yang dimiliki 1.342 KK. di Kabupaten Blitar diserahkan sebanyak 3 SK dengan luas lahan 1.3999,6 hektar yang diterimakan 1.284 KK. Terakhir, pemberian SK di Kabupaten Malang sebanyak 8 SK dengan luas lahan 6.092 hektar yang diterimakan 6.517 KK.</p>\r\n\r\n<p>Sementara itu, realisasi perhutanan sosial di Indonesia saat ini telah mencapai areal seluas 1,4 juta hektar. Kini masih prosea penyelesaian untuk pulau jawa dalam penyiapan kerja seluas 25.229,5 hektar yang tersebar di 46 titik di 16 Kabupaten. (gun/wan/ian)</p>\r\n', 'https://kumparan.com/bangsaonline/ikuti-panen-raya-jagung-di-tuban-jokowi-disambati-kelangkaan-pupuk', '', 'joko_ndi4u01.jpg', 1, 1),
(76, '2018-07-07', 1, '', '', 1, 1, 2, 'Menteri Rini Sumarno Panen Raya Padi di Mojokerto', '<p><strong>Mojokerto (beritajatim.com) -</strong>&nbsp;Menteri BUMN RI, Rini Sumarno panen raya padi di lahan pertanian Desa Gempolkrep, Kecamatan Gedeg, Kabupaten Mojokerto, Kamis (29/3/2018). Di lahan seluas 19 hektar, Menteri Rini mengecek hasil panen padi masyarakat yang telah bekerja sama dengan BUMN.<br />\r\n<br />\r\n&quot;Tujuan kami ke sini untuk mengecek hasil panen padi masyarakat yang telah bekerja sama dengan BUMN. Untuk BUMN, pemerintah sudah bekerja sama dengan BNI untuk membantu petani sehingga mendapatkan hasil yang maksimal,&quot; ungkapnya.&nbsp;<br />\r\n<br />\r\nMenteri Rini meminta agar semua harus sama-sama saling mendukung program pemerintah khusunya dalam bidang pertanian. Untuk para petani yang belum mempunyai Kartu Tani, Menteri RI meminta agar para petani datang ke BNI yang terdekat yaitu cabang Mojokerto.<br />\r\n<br />\r\n&quot;Untuk syarat mengajukan Kartu Tani hanya foto Copy KTP dan KK dan harus punya lahan atau sewa lahan. BUMN akan berusaha turun ke lapangan untuk membeli gabah secara langsung. Untuk para petani jangan sungkan ke BNI untuk membikin Kartu Tani atau KUR,&quot; katanya.&nbsp;<br />\r\n<br />\r\nMenteri Rini berharap kepada pihak BNI agar melayani masyarakat yang akan membikin Kartu Tani atau Kredit Usaha Rakyat (KUR). Di akhir kunjungannya di Mojokerto, Menteri Rini mengunjungi Panti Asuhan Anak Yatim Muhammadiyah di Kecamatan Gedeg, Kabupaten Mojokerto.<br />\r\n<br />\r\nHadir dalam kegiatan tersebut, Kasi Ops Dinas Pertanian Kabupaten Mojokerto, Kepala BNI Pimpinan wilayah Surabaya, Kepala BNI Cabang Mojokerto, Pasiter Kodim 0815/Mojokerto, muspika Kecamatan Gedeg dan Kelompok Tani Desa Gempolkrep.<strong>[tin/kun]</strong></p>\r\n', 'http://beritajatim.com/politik_pemerintahan/324679/menteri_rini_sumarno_panen_raya_padi_di_mojokerto.html', '', 'menteri1.jpg', 1, 1),
(77, '2018-07-08', 5, '', '', 32, 15, 3, 'Wakil Gubernur DKI Apresiasi Kerja Kementan', '<p><strong>JAKARTA&nbsp;</strong>- Wakil Gubernur Sandiaga Salahuddin Uno memastikan komoditas, pasokan dan distribusi sembako tetap terjaga dan berkeadilan untuk memenuhi kebutuhan menjelang Ramadhan hingga Lebaran. Hal ini terungkap usai menghadiri rapat dengan Menteri Pertanian (Mentan), Andi Amran Sulaiman beserta jajaran Pejabat Eselon I dan Direktur Utama PT. Food Station Tjipinang Jaya, Arief Prasetyo Adi di Kantor Pusat Kementerian Pertanian (Kementan), Jakarta, Rabu (28/3/2018)</p>\r\n\r\n<p>&ldquo;Rapat ini kami ingin memastikan kesiapan pasokan dan distribusi komoditas pangan. Pangan di bulan Ramadhan diperkirakan siap,&rdquo; demikian tegas Sandiaga Uno.</p>\r\n\r\n<p>Terbukti, akibat terjadi panen di mana khususnya Jawa Barat dan Jawa Tengah. Berdasarkan data PT. Food Station Tjipinang Jaya, stok beras di PIBC sampai dengan tanggal 28 Maret 2018 mencapai 40 ribu ton.</p>\r\n\r\n<p>Karena itu, Sandiaga Uno menyampaikan apresiasi atas kerja keras Kementerian Pertanian menyediakan pangan. Pasalnya, bulan Ramadhan setiap tahunnya identik dengan kenaikan harga pangan pokok.</p>\r\n\r\n<p>&ldquo;Pemprov DKI mengucapkan apresiasi yang sangat-sangat tinggi untuk Kementerian Pertanian. Mudah-mudahan silaturahim dan sinergi ini memberikan satu tujuan demi kemaslahatan masyarakat khususnya warga di DKI Jakarta,&rdquo; tegasnya.</p>\r\n\r\n<p>Lebih lanjut Sandiaga Uno menyebutkan selama bulan Ramadhan yang jatuh pada bulan Mei nanti, Pemerintah Provinsi DKI Jakarta berkomitkan untuk tidak sedikitpun memberikan celah yang berpotensi terjadinya gejolak harga pangan pokok. Begitu pun distribusi pangan akan dipastikan tetap terjaga.</p>\r\n\r\n<p>&ldquo;Rapat hari ini bentuk komitmen kami supaya tidak ada celah yang membuat harga tidak stabil terutama naik selama bulan Ramadhan dan Idul Fitri,&rdquo; ujarnya.</p>\r\n\r\n<p>Mentan Amran pun menegaskan harga pangan pokok menghadapi bulan Ramadhan hingga Idul Fitri dipastikan akan tetap stabil sehingga tidak ada lonjakan harga. Seperti pengalaman di tahun 2017 lalu, Kementan telah melakukan antisipasi seperti peningkatan produksi sehingga terjadi panen di mana-mana dan menjamin kelancaran distribusi.</p>\r\n\r\n<p>&ldquo;Di tahun 2017 lalu kita tahu, harga pangan stabil. Bahkan ada yang mengatakan paling stabil dalam 10 tahun terakhir. Begitu pun tahun ini, kita ingin lebih baik daripada tahun lalu. Itu mimpi kita,&quot; tegas Amran.</p>\r\n\r\n<p>Menurut Direktur Utama PIBC, Arief Prasetyo Adi, peningkatan stok di PIBC saat ini karena adanya panen raya yang terjadi di Jawa Barat dan Jawa Tengah. Beras masuk ke Cipinang mencapai 40 hingga 50 persen dari panen di Jawa Barat dan sisanya dari Jawa Tengah.</p>\r\n\r\n<p>Dia menyebutkan menjelang bulan puasa dan lebaran, PIBC membutuhkan pasokan beras sebanyak 25 sampai 30 ribu ton. Stok ini merupakan posisi aman untuk mengantisipasi kekurangan stok atau banyaknya permintaan.</p>\r\n\r\n<p>&ldquo;Kita menjaga stok di atas 25 hingga 30 ribu ton. Jadi itu adalah stok level. Kalau keluarnya 3.000 ton maka masuknya juga harus 3.000 ton. Nah itu stoknya kita jaga di atas 30.000 ton,&rdquo; tuturnya.</p>\r\n', 'https://news.okezone.com/read/2018/03/28/1/1879155/wakil-gubernur-dki-apresiasi-kerja-kementan', '', 'wakil-gubernur-dki-apresiasi-kerja-kementan-8UXh0Y5Tff2.jpg', 1, 1),
(99, '2018-07-09', 1, '', '', 1, 3, 7, 'Si Cantik Dari Perbatasan Kalimantan Barat', '<p><big><strong>P</strong></big>adi cantik merupakan padi lokal yang berasal dari wilayah perbatasan Kabupaten Sanggau. Padi ini tumbuh baik pada agroekosistem&nbsp; lahan kering dan sudah lama dikenal dan dibudidayakan&nbsp; oleh masyarakat suku Dayak dengan system budidaya ladang berpindah. Hampir 60 % varietas padi lokal&nbsp; lahan kering/gogo yang ditanam masyarakat di wilayah perbatasan terutama di Kecamatan Entikong, Sekayam, Noyan, Beduai, dan Kembayan Kabupaten Sanggau adalah padi Cantik dan hanya sebagian kecil yang ditanam &nbsp;dengan &nbsp;varietas padi lokal Lawi, Pemangkat, dan Sawering.</p>\r\n\r\n<p>Padi cantik&nbsp; umumnya dibudidayakan oleh masyarakat dengan system budidaya organik dan dengan potensi hasil sekitar 4 ton/ha. Padi Cantik berpotensi untuk dikembangkan karena memiliki nilai ekonomi yang cukup tinggi, dimana berasnya dijual ke negara tetangga Malaysia dengan harga Rp. 15.000,- - Rp. 25.000,-/kg. Tingginya nilai ekonomi padi Cantik ini disebabkan karena beberapa karakter unggul yang dimilikinya diantaranya tekstur nasi pulen dan aromatik.</p>\r\n\r\n<p>Dalam upaya untuk mengembangkan padi Cantik ini pada sekala luas, maka pada tahun 2018 &nbsp;Dinas Pertanian Kabupaten Sanggau bekerjasama dengan&nbsp; BPTP Kalimantan Barat dan BB-Padi &nbsp;akan melepas varietas padi lokal ini. Pada Saat ini telah dilakukan uji obervasi padi Cantik ini di tiga&nbsp; kecamatan yaitu Entikong, Sekayam, dan Beduai, dan ditargetkan pada akhir tahun 2018 sudah dapat dilepas.</p>\r\n', 'http://kalbar.litbang.pertanian.go.id/index.php/berita-mainmenu-93/975-si-cantik-dari-perbatasan-kalimantan-barat', '', 'si-cantik.jpg', 24, 1),
(105, '2018-07-09', 5, '', '', 32, 15, 7, 'Tata Usaha', '<p>Tata usaha</p>\r\n', 'www.tatausaha.com', '', 'tu.png', 3, 0),
(106, '2018-07-09', 5, '', '', 32, 15, 7, 'Kerjasama dan Pendayagunaan Hasil Pertanian (KSPHP)', '<p>Kerjasama dan Pendayagunaan Hasil Pertanian</p>\r\n', 'www.ksphp.com', '', 'ksphp.png', 4, 0),
(108, '2018-07-09', 3, '', '', 9, 3, 4, 'Benih Perkebunan Siap Disalurkan', '<p>Kendari. Tim supervisi Balai Besar Pengkajian dan Pengembangan Teknologi Pertanian (BBP2TP) melakukan kunjungan dan supervisi optimalisasi kegiatan Kebun Percobaan Onembute dan Kebun Percobaan Wawotobi.&nbsp;(Rabu,18/04/ 2018)</p>\r\n\r\n<p>Kunjungan Tim supervisi didampingi oleh Koordinator Kerjasama Sribananiek Sugiman, SP, MP dan Tim BPTP Balitbangtan Sulawesi Tenggara.</p>\r\n\r\n<p>Sri Bananiek Sugiman, MP selaku Koordinator Kerjasama menyampaikan bahwa BPTP Balitbangtan Sultra memiliki 2 Kebun Percobaan yaitu&nbsp; KP Onembute di Kab.&nbsp; Konawe Selatan dengan luas 18 ha dan KP&nbsp;Percobaan Wawotobi di Kabupaten Konawe yang memiliki luas 15,3 ha.</p>\r\n\r\n<p>KP Onembute dengan spesifik lahan kering dimanfaatkan untuk kegiatan peternakan, budidaya tanaman serta perbenihan tanaman perkebunan. Sedangkan KP Wawotobi dengan spesifik lahan basah/persawahan dimanfaatkan untuk kegiatan&nbsp;UPBS padi.</p>\r\n\r\n<p>Drs. Suyud menyampaikan bahwa Kebun Percobaan merupakan bagian yang sangat strategis untuk melakukan penelitian dan pengembangan di bidang pertanian, perkebunan, hortikultura dan peternakan.&nbsp;Kegiatan tersebut dapat menunjang pengembangan komoditas khususnya komoditas spesifik lokasi.</p>\r\n\r\n<p>Untuk mendukung terciptanya teknologi-teknologi perlu didukung sarana dan prasarana yang memadai&nbsp; sehingga mampu mendorong peningkatan produksi demi tercapainya swasembada pangan, sehingga mampu manarik minat stakeholder untuk melakukan kerjasama.</p>\r\n\r\n<p>Imran, SP, MP, Kepala Kebun Percobaan Onembute menyampaikan, untuk saat ini kegiatan yang dilakukan antara lain perbenihan kakao, jambu mete, cengkeh, tebu, serta kegiatan peternakan.</p>\r\n\r\n<p>Selanjutnya Imran menyampaikan bahwa sampai saat ini benih yang siap disalurkan dan telah disertifikasi diantaranya benih kakao sebanyak 16.000 pohon, benih mete 9.766 pohon, benih kelapa sebanyak 3.900 pohon dan benih cengkeh sebanyak 14.000 pohon. Benih tersebut akan disalurkan ke daerah yang mempunyai potensi pengembangan tanaman perkebunan pada komoditas tersebut di Sulawesi Tenggara</p>\r\n\r\n<p>Kepala KP Wawotobi, Samrin SP menyampaikan, perbenihan yang dikembangkan pada lahan 15,3 ha adalah varietas Inpari 33, Inpari 40, Mekongga,&nbsp; dan Ciherang dengan teknologi jajar legowa 2 : 1, pemupukan berdasarkan PUTS dan pengendalian OPT berdasarkan prinsip PHT.</p>\r\n', '', 'Benih_Perkebunan_Siap_Disalurkan.docx', 'Benih_Perkebunan_Siap_Disalurkan.jpg', 1, 1),
(109, '2018-07-09', 4, '', '', 23, 3, 5, 'Benih Petai dan Jengkol Produksi BPTP Banten Mulai Disalurkan ke Petani Sasaran', '<p>Bagi para penikmat petai dan jengkol, buah ini merupakan buah istimewa karena memberikan cita rasa tersendiri. Selain itu, keduanya memiliki bau yang khas. Bagi sebagian orang, terutama penikmatnya tidak keberatan dengan bau ini.</p>\r\n\r\n<p>Tahun 2017, BPTP Banten melakukan produksi benih petai dan jengkol masing-masing sebanyak 10.000 benih.</p>\r\n\r\n<p>Melalui proses panjang mulai dari karakterisasi pohon induk, penyiapan media, pemeliharaan hingga siap distribusi dengan pengawalan dan kerjasama dengan BPSB Provinsi Banten, kini benih-benih tersebut mulai didistribusikan ke petani sasaran sesuai daftar CPCL yang diterima dari Dinas Pertanian Provinsi Banten.</p>\r\n\r\n<p>Total benih petai yang sudah disebar adalah 350 batang benih petai dan 430 batang benih jengkol yang didistribusikan di dua kecamatan di Kabupaten Pandeglang yaitu Kecamatan Majasari dan Kecamatan Mandalawangi.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Distribusi dilakukan bersama dengan penyuluh kecamatan, Dinas Kabupaten Pandeglang dan kelompok tani sasaran. Distribusi akan terus berlanjut hingga benih habis terbagi ke masing-masing penerima sasaran.</p>\r\n\r\n<p>BPTP Banten mengharapkan dengan distribusi ini akan memperluas wilayah produksi petai dan jengkol khususnya di Kabupaten Pandeglang. Dampaknya, diharapkan produksi keduanya dapat meningkat dan tersedia di masyarakat luas.</p>\r\n\r\n<p>Selain itu, Kabupaten Pandeglang juga dapat memasok ketersediaan petai dan jengkol ke wilayah-wilayah sekitarnya termasuk ke Ibukota Negara, DKI Jakarta.</p>\r\n', 'http://banten.litbang.pertanian.go.id/new/index.php/berita/1320-benih-petai-dan-jengkol-produksi-bptp-banten-mulai-disalurkan-ke-petani-sasaran', 'Benih_Petai_dan_Jengkol_Produksi_BPTP_Banten_Mulai_Disalurkan_ke_Petani_Sasaran2.docx', 'jengkol-2018bb2.jpg', 20, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE IF NOT EXISTS `kegiatan` (
  `idKegiatan` int(4) NOT NULL AUTO_INCREMENT,
  `namaKegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`idKegiatan`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data untuk tabel `kegiatan`
--

INSERT INTO `kegiatan` (`idKegiatan`, `namaKegiatan`) VALUES
(1, 'UPSUS'),
(2, 'Serab Gabah'),
(3, 'Perbenihan'),
(4, 'SL Mandiri Benih'),
(5, 'Unit Pengelola Benih Sumber (UPBS)'),
(6, 'Pendampingan Kawasan'),
(7, 'Perbatasan'),
(8, 'Bio Industri'),
(9, 'Sumber Daya Genetik Lokal (SDG Lokal)'),
(10, 'Penyuluhan'),
(11, 'Sumber Daya Air (SDA)'),
(12, 'TTP/TSP'),
(13, 'Sapi Indukan Wajib Bunting (SIWAB)'),
(14, 'In House'),
(15, 'Kerjasama non Litbang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komoditas`
--

CREATE TABLE IF NOT EXISTS `komoditas` (
  `idKomoditas` int(4) NOT NULL AUTO_INCREMENT,
  `namaKomoditas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idSubsektor` int(4) NOT NULL,
  PRIMARY KEY (`idKomoditas`),
  KEY `idSubsektor` (`idSubsektor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=33 ;

--
-- Dumping data untuk tabel `komoditas`
--

INSERT INTO `komoditas` (`idKomoditas`, `namaKomoditas`, `idSubsektor`) VALUES
(1, 'Padi', 1),
(2, 'Jagung', 1),
(3, 'Kedelai', 1),
(4, 'Sapi', 2),
(5, 'Kerbau', 2),
(6, 'Kambing', 2),
(7, 'Domba', 2),
(8, 'Jambu Mete', 3),
(9, 'Cengkeh', 3),
(10, 'Tebu', 3),
(11, 'Pala', 3),
(12, 'Lada', 3),
(13, 'Kelapa', 3),
(14, 'Kakao', 3),
(15, 'Karet', 3),
(16, 'Kopi Arabika', 3),
(17, 'Kopi Robusta', 3),
(18, 'Kayu Manis', 3),
(19, 'Mangga', 4),
(20, 'Bawang Putih', 4),
(21, 'Pisang', 4),
(22, 'Jengkol', 4),
(23, 'Petai', 4),
(24, 'Kentang', 4),
(25, 'Pepaya', 4),
(26, 'Manggis', 4),
(27, 'Jeruk', 4),
(28, 'Salak', 4),
(29, 'Apel', 4),
(30, 'Durian', 4),
(31, 'Sukun', 4),
(32, 'Lain-Lain', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `prioritas`
--

CREATE TABLE IF NOT EXISTS `prioritas` (
  `idPrioritas` int(4) NOT NULL AUTO_INCREMENT,
  `namaPrioritas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`idPrioritas`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `prioritas`
--

INSERT INTO `prioritas` (`idPrioritas`, `namaPrioritas`) VALUES
(1, 'Presiden'),
(2, 'Menteri'),
(3, 'Gubernur'),
(4, 'Kepala Badan'),
(5, 'Eslon II'),
(6, 'Pemerintah Daerah (Pemda)'),
(7, 'Lain-Lain');

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinsi`
--

CREATE TABLE IF NOT EXISTS `provinsi` (
  `idProvinsi` int(4) NOT NULL AUTO_INCREMENT,
  `namaProvinsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`idProvinsi`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=95 ;

--
-- Dumping data untuk tabel `provinsi`
--

INSERT INTO `provinsi` (`idProvinsi`, `namaProvinsi`) VALUES
(11, 'Nanggroe Aeh Darussalam'),
(12, 'Sumatera Utara'),
(13, 'Sumatera Barat'),
(14, 'Riau'),
(15, 'Jambi'),
(16, 'Sumatera Selatan'),
(17, 'Bengkulu'),
(18, 'Lampung'),
(19, 'Kep. Bangka Belitung'),
(21, 'Kep. Riau'),
(31, 'DKI Jakarta'),
(32, 'Jawa Barat'),
(33, 'Jawa Tengah'),
(34, 'DI Yogyakarta'),
(35, 'Jawa Timur'),
(36, 'Banten'),
(51, 'Bali'),
(52, 'Nusa Tenggara Barat'),
(53, 'Nusa Tenggara Timur'),
(61, 'Kalimantan Barat'),
(62, 'Kalimantan Tengah'),
(63, 'Kalimantan Selatan'),
(64, 'Kalimantan Timur'),
(71, 'Sulawesi Utara'),
(72, 'Sulawesi Tengah'),
(73, 'Sulawesi Selatan'),
(74, 'Sulawesi Tenggara'),
(75, 'Gorontalo'),
(76, 'Sulawesi Barat'),
(81, 'Maluku'),
(82, 'Maluku Utara'),
(91, 'Papua Barat'),
(94, 'Papua');

-- --------------------------------------------------------

--
-- Struktur dari tabel `subsektor`
--

CREATE TABLE IF NOT EXISTS `subsektor` (
  `idSubsektor` int(4) NOT NULL AUTO_INCREMENT,
  `namaSubsektor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`idSubsektor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `subsektor`
--

INSERT INTO `subsektor` (`idSubsektor`, `namaSubsektor`) VALUES
(1, 'Tanaman Pangan'),
(2, 'Peternakan'),
(3, 'Perkebunan'),
(4, 'Hortikultura'),
(5, 'Lain-Lain');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tingkat`
--

CREATE TABLE IF NOT EXISTS `tingkat` (
  `idTingkat` int(4) NOT NULL AUTO_INCREMENT,
  `namaTingkat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`idTingkat`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `tingkat`
--

INSERT INTO `tingkat` (`idTingkat`, `namaTingkat`) VALUES
(1, 'Super Admin'),
(2, 'Program dan Evaluasi'),
(3, 'Tata Usaha'),
(4, 'KSPHP'),
(5, 'BPTP');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tstatistika`
--

CREATE TABLE IF NOT EXISTS `tstatistika` (
  `ip` varchar(20) CHARACTER SET latin1 NOT NULL,
  `tanggal` date NOT NULL,
  `hits` int(11) NOT NULL,
  `online` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tstatistika`
--

INSERT INTO `tstatistika` (`ip`, `tanggal`, `hits`, `online`) VALUES
('::1', '2018-03-04', 83, '1520178491'),
('::1', '2018-03-05', 17, '1520224062'),
('::1', '2018-03-06', 57, '1520309045'),
('::1', '2018-03-08', 73, '1520487626'),
('::1', '2018-03-10', 56, '1520652431'),
('::1', '2018-03-12', 6, '1520827382'),
('::1', '2018-03-19', 40, '1521463179'),
('::1', '2018-03-20', 168, '1521530671'),
('::1', '2018-03-21', 17, '1521619149'),
('::1', '2018-03-22', 82, '1521715839'),
('::1', '2018-03-23', 87, '1521810955'),
('::1', '2018-03-24', 1, '1521868979'),
('::1', '2018-03-25', 1, '1522000260'),
('::1', '2018-03-26', 1, '1522035991'),
('::1', '2018-03-28', 1, '1522218957'),
('::1', '2018-04-05', 2, '1522894168'),
('::1', '2018-04-08', 1, '1523182509'),
('::1', '2018-05-24', 1, '1527137747');

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`idTingkat`) REFERENCES `tingkat` (`idTingkat`),
  ADD CONSTRAINT `admin_ibfk_2` FOREIGN KEY (`idProvinsi`) REFERENCES `provinsi` (`idProvinsi`);

--
-- Ketidakleluasaan untuk tabel `agenda`
--
ALTER TABLE `agenda`
  ADD CONSTRAINT `agenda_ibfk_1` FOREIGN KEY (`idAdmin`) REFERENCES `admin` (`idAdmin`);

--
-- Ketidakleluasaan untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_3` FOREIGN KEY (`idKegiatan`) REFERENCES `kegiatan` (`idKegiatan`),
  ADD CONSTRAINT `berita_ibfk_4` FOREIGN KEY (`idPrioritas`) REFERENCES `prioritas` (`idPrioritas`),
  ADD CONSTRAINT `berita_ibfk_5` FOREIGN KEY (`idSubsektor`) REFERENCES `subsektor` (`idSubsektor`),
  ADD CONSTRAINT `berita_ibfk_6` FOREIGN KEY (`idKomoditas`) REFERENCES `komoditas` (`idKomoditas`),
  ADD CONSTRAINT `berita_ibfk_7` FOREIGN KEY (`idAdmin`) REFERENCES `admin` (`idAdmin`);

--
-- Ketidakleluasaan untuk tabel `komoditas`
--
ALTER TABLE `komoditas`
  ADD CONSTRAINT `komoditas_ibfk_1` FOREIGN KEY (`idSubsektor`) REFERENCES `subsektor` (`idSubsektor`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
