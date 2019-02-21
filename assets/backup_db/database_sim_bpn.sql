#
# TABLE STRUCTURE FOR: tb_album
#

DROP TABLE IF EXISTS tb_album;

CREATE TABLE `tb_album` (
  `no_album` int(11) NOT NULL AUTO_INCREMENT,
  `no_rak` int(225) DEFAULT NULL,
  `no_lemari` int(225) DEFAULT NULL,
  `nama_album` varchar(200) DEFAULT NULL,
  `document` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`no_album`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO tb_album (`no_album`, `no_rak`, `no_lemari`, `nama_album`, `document`) VALUES (1, 27, 17, '1', 'warkah');
INSERT INTO tb_album (`no_album`, `no_rak`, `no_lemari`, `nama_album`, `document`) VALUES (2, 27, 17, '1', 'buku_tanah');


#
# TABLE STRUCTURE FOR: tb_buku_tanah
#

DROP TABLE IF EXISTS tb_buku_tanah;

CREATE TABLE `tb_buku_tanah` (
  `id_bukutanah` int(11) NOT NULL AUTO_INCREMENT,
  `id_hak` int(11) DEFAULT NULL,
  `no_hakbuku` varchar(10) DEFAULT NULL,
  `tahun` int(225) DEFAULT NULL,
  `luas` bigint(225) DEFAULT NULL,
  `id_kecamatan` int(11) DEFAULT NULL,
  `id_desa` int(11) DEFAULT NULL,
  `no208` int(225) DEFAULT NULL,
  `status_buku` enum('Y','N') DEFAULT NULL,
  `status_entry` enum('Y','N') DEFAULT NULL,
  `pemilik_awal` varchar(100) DEFAULT NULL,
  `catatan_buku` text NOT NULL,
  PRIMARY KEY (`id_bukutanah`)
) ENGINE=InnoDB AUTO_INCREMENT=20006 DEFAULT CHARSET=latin1;

INSERT INTO tb_buku_tanah (`id_bukutanah`, `id_hak`, `no_hakbuku`, `tahun`, `luas`, `id_kecamatan`, `id_desa`, `no208`, `status_buku`, `status_entry`, `pemilik_awal`, `catatan_buku`) VALUES (20005, 1, '10002', 2014, 3535, 1, 2, 102, 'Y', 'Y', '', '');


#
# TABLE STRUCTURE FOR: tb_desa
#

DROP TABLE IF EXISTS tb_desa;

CREATE TABLE `tb_desa` (
  `id_desa` int(11) NOT NULL AUTO_INCREMENT,
  `id_kecamatan` int(11) DEFAULT NULL,
  `nama_desa` varchar(300) DEFAULT NULL,
  `slug_desa` varchar(300) NOT NULL,
  PRIMARY KEY (`id_desa`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (1, 1, 'Arung Dalam', 'arung-dalam');
INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (2, 1, 'Berok', 'berok');
INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (3, 1, 'Guntung', 'guntung');
INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (4, 1, 'Koba', 'koba');
INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (5, 1, 'Kurau', 'kurau');
INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (6, 1, 'Kurau Barat', 'kurau-barat');
INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (7, 1, 'Kurau Timur', 'kurau-timur');
INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (8, 1, 'Nibung', 'nibung');
INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (9, 1, 'Padang Mulia', 'padang-mulia');
INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (10, 1, 'Penyak', 'penyak');
INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (11, 1, 'Simpang Perlang', 'simpang-perlang');
INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (12, 1, 'Terentang', 'terentang');
INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (13, 2, 'Batu Beriga', 'batu-beriga');
INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (14, 2, 'Kulur', 'kulur');
INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (15, 2, 'Kulur Hilir', 'kulur-hilir');
INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (16, 2, 'Lubuk Besar', 'lubuk-besar');
INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (17, 2, 'Lubuk Lingkuk', 'lubuk-lingkuk');
INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (18, 2, 'Lubuk Pabrik', 'lubuk-pabrik');
INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (19, 2, 'Perlang', 'perlang');
INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (20, 2, 'Trubus', 'trubus');
INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (21, 3, 'Baskara Bakti/Bhakti', 'baskara-baktibhakti');
INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (22, 3, 'Bukit Kijang', 'bukit-kijang');
INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (23, 3, 'Belilik', 'belilik');
INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (24, 3, 'Cambai', 'cambai');
INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (25, 3, 'Jelutung', 'jelutung');
INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (26, 3, 'Kayu Besi', 'kayu-besi');
INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (27, 3, 'Namang', 'namang');
INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (28, 4, 'Air Mesu', 'air-mesu');
INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (29, 4, 'Batu Belubang', 'batu-belubang');
INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (30, 4, 'Beluluk', 'beluluk');
INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (31, 4, 'Benteng', 'benteng');
INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (32, 4, 'Dul', 'dul');
INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (33, 4, 'Jeruk', 'jeruk');
INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (34, 4, 'Mangkol', 'mangkol');
INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (35, 4, 'Padang Baru', 'padang-baru');
INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (36, 4, 'Pelindang (Selindung)', 'pelindang-selindung');
INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (37, 4, 'Tanjung Gunung', 'tanjung-gunung');
INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (38, 5, 'Beruas', 'beruas');
INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (39, 5, 'Celuak', 'celuak');
INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (40, 5, 'Katis', 'katis');
INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (41, 5, 'Pasir Garam', 'pasir-garam');
INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (42, 5, 'Pinang Sebatang', 'pinang-sebatang');
INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (43, 5, 'Puput', 'puput');
INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (44, 5, 'Simpang Katis', 'simpang-katis');
INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (45, 5, 'Sungkap', 'sungkap');
INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (46, 5, 'Terak', 'terak');
INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (47, 5, 'Teru', 'teru');
INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (48, 6, 'Kemingking', 'kemingking');
INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (49, 6, 'Kerakas', 'kerakas');
INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (50, 6, 'Kerantai', 'kerantai');
INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (51, 6, 'Keretak', 'keretak');
INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (52, 6, 'Lampur', 'lampur');
INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (53, 6, 'Munggu', 'munggu');
INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (54, 6, 'Ramadhon (Romadhoni)', 'ramadhon-romadhoni');
INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (55, 6, 'Sarangmandi', 'sarangmandi');
INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (56, 6, 'Sungai Selan', 'sungai-selan');
INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (57, 6, 'Sungai Selan Atas', 'sungai-selan-atas');
INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (58, 6, 'Tanjung Pura', 'tanjung-pura');
INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (59, 4, 'Air Mesu Timur', 'air-mesu-timur');
INSERT INTO tb_desa (`id_desa`, `id_kecamatan`, `nama_desa`, `slug_desa`) VALUES (60, 7, 'Bangka Tengah', 'bangka-tengah');


#
# TABLE STRUCTURE FOR: tb_file_buku
#

DROP TABLE IF EXISTS tb_file_buku;

CREATE TABLE `tb_file_buku` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_bukutanah` int(11) NOT NULL,
  `nama_file` varchar(300) NOT NULL,
  `mime_type` varchar(50) NOT NULL,
  `file_ext` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: tb_file_warkah
#

DROP TABLE IF EXISTS tb_file_warkah;

CREATE TABLE `tb_file_warkah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_warkah` int(11) NOT NULL,
  `nama_file` varchar(300) NOT NULL,
  `mime_type` varchar(50) NOT NULL,
  `file_ext` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: tb_hak_milik
#

DROP TABLE IF EXISTS tb_hak_milik;

CREATE TABLE `tb_hak_milik` (
  `id_hak` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_hak` varchar(300) DEFAULT NULL,
  `slug_jenis_hak` varchar(300) NOT NULL,
  PRIMARY KEY (`id_hak`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO tb_hak_milik (`id_hak`, `jenis_hak`, `slug_jenis_hak`) VALUES (1, 'Milik', 'milik');
INSERT INTO tb_hak_milik (`id_hak`, `jenis_hak`, `slug_jenis_hak`) VALUES (2, 'Guna Bangunan', 'guna-bangunan');
INSERT INTO tb_hak_milik (`id_hak`, `jenis_hak`, `slug_jenis_hak`) VALUES (3, 'Pakai', 'pakai');
INSERT INTO tb_hak_milik (`id_hak`, `jenis_hak`, `slug_jenis_hak`) VALUES (4, 'Pengelolaan', 'pengelolaan');
INSERT INTO tb_hak_milik (`id_hak`, `jenis_hak`, `slug_jenis_hak`) VALUES (5, 'Tanggungan', 'tanggungan');
INSERT INTO tb_hak_milik (`id_hak`, `jenis_hak`, `slug_jenis_hak`) VALUES (6, 'Guna Usaha', 'guna-usaha');
INSERT INTO tb_hak_milik (`id_hak`, `jenis_hak`, `slug_jenis_hak`) VALUES (7, 'Wakaf', 'wakaf');


#
# TABLE STRUCTURE FOR: tb_halaman
#

DROP TABLE IF EXISTS tb_halaman;

CREATE TABLE `tb_halaman` (
  `id_halaman` int(11) NOT NULL AUTO_INCREMENT,
  `no_halaman` int(11) DEFAULT NULL,
  `no_album` int(11) DEFAULT NULL,
  `no_rak` int(11) DEFAULT NULL,
  `no_lemari` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_halaman`)
) ENGINE=InnoDB AUTO_INCREMENT=3251 DEFAULT CHARSET=latin1;

INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3101, 1, 1, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3102, 2, 1, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3103, 3, 1, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3104, 4, 1, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3105, 5, 1, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3106, 6, 1, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3107, 7, 1, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3108, 8, 1, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3109, 9, 1, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3110, 10, 1, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3111, 11, 1, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3112, 12, 1, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3113, 13, 1, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3114, 14, 1, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3115, 15, 1, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3116, 16, 1, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3117, 17, 1, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3118, 18, 1, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3119, 19, 1, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3120, 20, 1, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3121, 21, 1, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3122, 22, 1, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3123, 23, 1, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3124, 24, 1, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3125, 25, 1, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3126, 26, 1, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3127, 27, 1, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3128, 28, 1, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3129, 29, 1, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3130, 30, 1, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3131, 31, 1, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3132, 32, 1, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3133, 33, 1, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3134, 34, 1, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3135, 35, 1, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3136, 36, 1, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3137, 37, 1, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3138, 38, 1, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3139, 39, 1, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3140, 40, 1, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3141, 41, 1, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3142, 42, 1, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3143, 43, 1, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3144, 44, 1, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3145, 45, 1, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3146, 46, 1, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3147, 47, 1, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3148, 48, 1, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3149, 49, 1, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3150, 50, 1, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3151, 1, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3152, 2, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3153, 3, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3154, 4, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3155, 5, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3156, 6, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3157, 7, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3158, 8, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3159, 9, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3160, 10, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3161, 11, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3162, 12, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3163, 13, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3164, 14, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3165, 15, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3166, 16, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3167, 17, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3168, 18, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3169, 19, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3170, 20, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3171, 21, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3172, 22, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3173, 23, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3174, 24, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3175, 25, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3176, 26, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3177, 27, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3178, 28, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3179, 29, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3180, 30, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3181, 31, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3182, 32, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3183, 33, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3184, 34, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3185, 35, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3186, 36, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3187, 37, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3188, 38, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3189, 39, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3190, 40, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3191, 41, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3192, 42, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3193, 43, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3194, 44, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3195, 45, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3196, 46, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3197, 47, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3198, 48, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3199, 49, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3200, 50, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3201, 51, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3202, 52, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3203, 53, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3204, 54, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3205, 55, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3206, 56, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3207, 57, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3208, 58, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3209, 59, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3210, 60, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3211, 61, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3212, 62, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3213, 63, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3214, 64, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3215, 65, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3216, 66, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3217, 67, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3218, 68, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3219, 69, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3220, 70, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3221, 71, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3222, 72, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3223, 73, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3224, 74, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3225, 75, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3226, 76, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3227, 77, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3228, 78, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3229, 79, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3230, 80, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3231, 81, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3232, 82, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3233, 83, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3234, 84, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3235, 85, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3236, 86, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3237, 87, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3238, 88, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3239, 89, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3240, 90, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3241, 91, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3242, 92, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3243, 93, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3244, 94, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3245, 95, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3246, 96, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3247, 97, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3248, 98, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3249, 99, 2, 27, 17);
INSERT INTO tb_halaman (`id_halaman`, `no_halaman`, `no_album`, `no_rak`, `no_lemari`) VALUES (3250, 100, 2, 27, 17);


#
# TABLE STRUCTURE FOR: tb_history
#

DROP TABLE IF EXISTS tb_history;

CREATE TABLE `tb_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(50) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `time` timestamp NULL DEFAULT NULL,
  `bulan` int(11) DEFAULT NULL,
  `tahun` int(225) DEFAULT NULL,
  `id_bukutanah` bigint(11) NOT NULL,
  `deskripsi` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

INSERT INTO tb_history (`id`, `nip`, `tanggal`, `time`, `bulan`, `tahun`, `id_bukutanah`, `deskripsi`) VALUES (2, '1411500174', '2016-12-29', '2016-12-29 11:39:55', 12, 2016, 20005, 'Menambahkan dokumen buku tanah');
INSERT INTO tb_history (`id`, `nip`, `tanggal`, `time`, `bulan`, `tahun`, `id_bukutanah`, `deskripsi`) VALUES (3, '1411500174', '2016-12-30', '2016-12-30 00:20:25', 12, 2016, 20005, 'Mencari Dokumen Buku Tanah.');
INSERT INTO tb_history (`id`, `nip`, `tanggal`, `time`, `bulan`, `tahun`, `id_bukutanah`, `deskripsi`) VALUES (4, '1411500174', '2016-12-30', '2016-12-30 00:21:03', 12, 2016, 20005, 'Mencari Dokumen Buku Tanah.');
INSERT INTO tb_history (`id`, `nip`, `tanggal`, `time`, `bulan`, `tahun`, `id_bukutanah`, `deskripsi`) VALUES (5, '1411500174', '2016-12-30', '2016-12-30 00:21:08', 12, 2016, 20005, 'Mencari Dokumen Buku Tanah.');
INSERT INTO tb_history (`id`, `nip`, `tanggal`, `time`, `bulan`, `tahun`, `id_bukutanah`, `deskripsi`) VALUES (6, '1411500174', '2016-12-30', '2016-12-30 00:21:09', 12, 2016, 20005, 'Mencari Dokumen Buku Tanah.');
INSERT INTO tb_history (`id`, `nip`, `tanggal`, `time`, `bulan`, `tahun`, `id_bukutanah`, `deskripsi`) VALUES (7, '1411500174', '2016-12-30', '2016-12-30 00:21:11', 12, 2016, 20005, 'Mencari Dokumen Buku Tanah.');
INSERT INTO tb_history (`id`, `nip`, `tanggal`, `time`, `bulan`, `tahun`, `id_bukutanah`, `deskripsi`) VALUES (8, '1411500174', '2016-12-30', '2016-12-30 00:23:01', 12, 2016, 20005, 'Mencari Dokumen Buku Tanah.');
INSERT INTO tb_history (`id`, `nip`, `tanggal`, `time`, `bulan`, `tahun`, `id_bukutanah`, `deskripsi`) VALUES (9, '1411500175', '2016-12-30', '2016-12-30 16:38:53', 12, 2016, 20005, 'Mencari Dokumen Buku Tanah.');
INSERT INTO tb_history (`id`, `nip`, `tanggal`, `time`, `bulan`, `tahun`, `id_bukutanah`, `deskripsi`) VALUES (10, '1411500174', '2017-01-02', '2017-01-02 11:51:42', 1, 2017, 20005, 'Mencari Dokumen Buku Tanah.');
INSERT INTO tb_history (`id`, `nip`, `tanggal`, `time`, `bulan`, `tahun`, `id_bukutanah`, `deskripsi`) VALUES (11, '1411500174', '2017-01-02', '2017-01-02 11:51:48', 1, NULL, 20005, 'Mengeluarkan dokumen buku tanah.');
INSERT INTO tb_history (`id`, `nip`, `tanggal`, `time`, `bulan`, `tahun`, `id_bukutanah`, `deskripsi`) VALUES (12, '1411500174', '2017-01-02', '2017-01-02 11:51:48', 1, 2017, 20005, 'Mencari Dokumen Buku Tanah.');
INSERT INTO tb_history (`id`, `nip`, `tanggal`, `time`, `bulan`, `tahun`, `id_bukutanah`, `deskripsi`) VALUES (13, '1411500174', '2017-02-15', '2017-02-15 21:24:01', 2, 2017, 20005, 'Mencari dokumen warkah.');
INSERT INTO tb_history (`id`, `nip`, `tanggal`, `time`, `bulan`, `tahun`, `id_bukutanah`, `deskripsi`) VALUES (14, '1411500174', '2017-02-15', '2017-02-15 21:24:05', 2, 2017, 20005, 'Mencari dokumen warkah.');
INSERT INTO tb_history (`id`, `nip`, `tanggal`, `time`, `bulan`, `tahun`, `id_bukutanah`, `deskripsi`) VALUES (15, '1411500174', '2017-02-15', '2017-02-15 21:24:11', 2, 2017, 20005, 'Mencari dokumen warkah.');


#
# TABLE STRUCTURE FOR: tb_kecamatan
#

DROP TABLE IF EXISTS tb_kecamatan;

CREATE TABLE `tb_kecamatan` (
  `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kecamatan` varchar(300) DEFAULT NULL,
  `slug_kecamatan` varchar(300) NOT NULL,
  PRIMARY KEY (`id_kecamatan`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO tb_kecamatan (`id_kecamatan`, `nama_kecamatan`, `slug_kecamatan`) VALUES (1, 'Koba', 'koba');
INSERT INTO tb_kecamatan (`id_kecamatan`, `nama_kecamatan`, `slug_kecamatan`) VALUES (2, 'Lubuk Besar', 'lubuk-besar');
INSERT INTO tb_kecamatan (`id_kecamatan`, `nama_kecamatan`, `slug_kecamatan`) VALUES (3, 'Namang', 'namang');
INSERT INTO tb_kecamatan (`id_kecamatan`, `nama_kecamatan`, `slug_kecamatan`) VALUES (4, 'Pangkalan Baru', 'pangkalan-baru');
INSERT INTO tb_kecamatan (`id_kecamatan`, `nama_kecamatan`, `slug_kecamatan`) VALUES (5, 'Simpang Katis', 'simpang-katis');
INSERT INTO tb_kecamatan (`id_kecamatan`, `nama_kecamatan`, `slug_kecamatan`) VALUES (6, 'Sungai Selan', 'sungai-selan');
INSERT INTO tb_kecamatan (`id_kecamatan`, `nama_kecamatan`, `slug_kecamatan`) VALUES (7, 'Prop. Kep. Bangka Belitung', 'prop-kep-bangka-belitung');


#
# TABLE STRUCTURE FOR: tb_lemari
#

DROP TABLE IF EXISTS tb_lemari;

CREATE TABLE `tb_lemari` (
  `no_lemari` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lemari` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`no_lemari`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

INSERT INTO tb_lemari (`no_lemari`, `nama_lemari`) VALUES (17, '1');


#
# TABLE STRUCTURE FOR: tb_pinjam_buku
#

DROP TABLE IF EXISTS tb_pinjam_buku;

CREATE TABLE `tb_pinjam_buku` (
  `id_pinjam_buku` int(11) NOT NULL AUTO_INCREMENT,
  `id_bukutanah` int(11) NOT NULL,
  `tgl_peminjaman` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `kegiatan` text NOT NULL,
  `peminjam` varchar(300) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `status_pinjam` enum('Y','N') NOT NULL,
  PRIMARY KEY (`id_pinjam_buku`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO tb_pinjam_buku (`id_pinjam_buku`, `id_bukutanah`, `tgl_peminjaman`, `tgl_kembali`, `kegiatan`, `peminjam`, `nip`, `bulan`, `tahun`, `status_pinjam`) VALUES (1, 20005, '2017-01-02', '0000-00-00', 'ewfewf', 'dsfsf', '1411500174', 1, '2017', 'N');


#
# TABLE STRUCTURE FOR: tb_pinjam_warkah
#

DROP TABLE IF EXISTS tb_pinjam_warkah;

CREATE TABLE `tb_pinjam_warkah` (
  `id_pinjam_warkah` int(11) NOT NULL AUTO_INCREMENT,
  `id_warkah` int(11) NOT NULL,
  `tgl_peminjaman` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `kegiatan` text NOT NULL,
  `peminjam` varchar(300) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `status_pinjam` enum('Y','N') NOT NULL,
  PRIMARY KEY (`id_pinjam_warkah`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: tb_rak
#

DROP TABLE IF EXISTS tb_rak;

CREATE TABLE `tb_rak` (
  `no_rak` int(11) NOT NULL AUTO_INCREMENT,
  `no_lemari` int(225) DEFAULT NULL,
  `nama_rak` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`no_rak`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

INSERT INTO tb_rak (`no_rak`, `no_lemari`, `nama_rak`) VALUES (27, 17, '1');


#
# TABLE STRUCTURE FOR: tb_simpan_buku
#

DROP TABLE IF EXISTS tb_simpan_buku;

CREATE TABLE `tb_simpan_buku` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_bukutanah` int(11) NOT NULL,
  `no_lemari` int(11) NOT NULL,
  `no_rak` int(11) NOT NULL,
  `no_album` int(11) NOT NULL,
  `no_halaman` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO tb_simpan_buku (`id`, `id_bukutanah`, `no_lemari`, `no_rak`, `no_album`, `no_halaman`) VALUES (2, 20005, 17, 27, 2, 2);


#
# TABLE STRUCTURE FOR: tb_simpan_warkah
#

DROP TABLE IF EXISTS tb_simpan_warkah;

CREATE TABLE `tb_simpan_warkah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_warkah` int(11) NOT NULL,
  `no_lemari` int(11) NOT NULL,
  `no_rak` int(11) NOT NULL,
  `no_album` int(11) NOT NULL,
  `no_halaman` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: tb_tong_sampah
#

DROP TABLE IF EXISTS tb_tong_sampah;

CREATE TABLE `tb_tong_sampah` (
  `id_tong_sampah` int(11) NOT NULL,
  `id_bukutanah` int(11) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `jenis_delete` varchar(50) NOT NULL,
  `waktu_delete` datetime NOT NULL,
  PRIMARY KEY (`id_tong_sampah`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: tb_users
#

DROP TABLE IF EXISTS tb_users;

CREATE TABLE `tb_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(50) DEFAULT NULL,
  `nama_lengkap` varchar(200) DEFAULT NULL,
  `pass_login` varchar(200) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `login_terakhir` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `level_akses` enum('super_admin','operator','admin','viewer') DEFAULT NULL,
  `status_user` enum('valid','not') DEFAULT NULL,
  `status` enum('online','offline') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO tb_users (`id`, `nip`, `nama_lengkap`, `pass_login`, `foto`, `login_terakhir`, `level_akses`, `status_user`, `status`) VALUES (1, '1411500174', 'Vicky Nitinegoro', '$2y$10$3I.sqvEmaX0kgoQeXU/V/.YKF79PVAPsP4tX1Q5K5wnYUPRigU.wK', '1fe5d7812bc7f8cfe4747a4decd46fa2.jpg', '2017-02-17 15:08:07', 'super_admin', 'valid', 'online');
INSERT INTO tb_users (`id`, `nip`, `nama_lengkap`, `pass_login`, `foto`, `login_terakhir`, `level_akses`, `status_user`, `status`) VALUES (7, '1411500175', 'Makanan Khas', '$2y$10$bJv2HnP1tE5qo0EPztnqB.8IDdt3r9n7BAqylfguU57pjDCvCwmBm', '9adc7109e6f365d657b5f1aa36dcacdf.png', '2016-12-30 16:42:12', 'viewer', 'valid', 'online');


#
# TABLE STRUCTURE FOR: tb_warkah
#

DROP TABLE IF EXISTS tb_warkah;

CREATE TABLE `tb_warkah` (
  `id_warkah` int(11) NOT NULL AUTO_INCREMENT,
  `tahun` int(225) DEFAULT NULL,
  `no208` int(225) DEFAULT NULL,
  `status_warkah` enum('Y','N') DEFAULT NULL,
  `status_entry` enum('Y','N') DEFAULT NULL,
  `id_bukutanah` int(11) NOT NULL,
  `catatan_warkah` text NOT NULL,
  PRIMARY KEY (`id_warkah`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO tb_warkah (`id_warkah`, `tahun`, `no208`, `status_warkah`, `status_entry`, `id_bukutanah`, `catatan_warkah`) VALUES (2, 2014, 102, 'Y', 'Y', 20005, '');


