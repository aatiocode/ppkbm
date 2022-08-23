CREATE TABLE artikel_kategori (
	id serial NOT NULL,
	nama varchar(255) NOT NULL UNIQUE,
	status BOOLEAN NOT NULL DEFAULT TRUE,
	created_by varchar(10) NULL,
	created_at TIMESTAMP DEFAULT NOW(),
	updated_by varchar(10) NULL,
	updated_at TIMESTAMP NULL,
	CONSTRAINT artikel_kategorikey_1 PRIMARY KEY (id)
);

CREATE TABLE galeri_event (
	id serial NOT NULL,
	nama varchar(255) NOT NULL UNIQUE,
	status BOOLEAN NOT NULL DEFAULT TRUE,
	created_by varchar(10) NULL,
	created_at TIMESTAMP DEFAULT NOW(),
	updated_by varchar(10) NULL,
	updated_at TIMESTAMP NULL,
	CONSTRAINT galeri_eventkey_1 PRIMARY KEY (id)
);

CREATE TABLE `artikel` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) not null,
  `deskripsi_singkat` text null,
  `deskripsi` text null,
  `alamat` varchar(255) null,
  `email` varchar(255) null,
  `phone` varchar(255) null,
  `nama` varchar(255) null,
  `jabatan` varchar(255) null,
  `kota` varchar(255) null,
  `id_kategori` bigint(20) unsigned NOT NULL,
  `foto` varchar(255) NULL,
  `video` varchar(255) NULL,
  `status` BOOLEAN NOT NULL DEFAULT TRUE,
  `maps` varchar(255) null,
  `facebook` varchar(255) null,
  `twitter` varchar(255) null,
  `linkedin` varchar(255) null,
  `youtube` varchar(255) null,
  `instagram` varchar(255) null,
  `created_at` datetime NOT NULL,
  `created_by` varchar(10) NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(10) NULL,
  PRIMARY KEY (`id`),
  KEY `id_kategori` (`id_kategori`),
  CONSTRAINT `artikel_ibfk_1`
  FOREIGN KEY (`id_kategori`) REFERENCES `artikel_kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=471 DEFAULT CHARSET=utf8;

CREATE TABLE `galeri` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) not null,
  `id_event` bigint(20) unsigned NOT NULL,
  `foto` varchar(255) NULL,
  `video` varchar(255) NULL,
  `status` BOOLEAN NOT NULL DEFAULT TRUE,
  `created_at` datetime NOT NULL,
  `created_by` varchar(10) NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(10) NULL,
  PRIMARY KEY (`id`),
  KEY `id_event` (`id_event`),
  CONSTRAINT `galeri_ibfk_1`
  FOREIGN KEY (`id_event`) REFERENCES `galeri_event` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=471 DEFAULT CHARSET=utf8;

CREATE TABLE admin (
	id serial NOT NULL,
	nip varchar(255) NULL,
	nama_lengkap varchar(255) NULL,
	email varchar(255) NULL,
	password varchar(255) NOT NULL,
	status boolean NOT NULL DEFAULT true,
	created_at TIMESTAMP DEFAULT NOW(),
	updated_at TIMESTAMP NULL,
	created_by varchar(255) NULL,
	updated_by varchar(255) NULL,
	CONSTRAINT admin_pkey PRIMARY KEY (id)
);

INSERT INTO `admin` (`id`, `nip`, `nama_lengkap`, `email`, `password`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`)
VALUES
	(1, 'P123', 'test123', 'test@mail.com', '$2y$10$XY9Ppw1m2Om3gOY.EVVItOFmCKm7gy2by6csn0pZQUex5jGyeMy76', 1, '2022-08-15 15:31:15', NULL, NULL, NULL);


INSERT INTO `artikel_kategori` (`id`, `nama`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`)
VALUES
	(1, 'tentang kami', 1, 'P123', '2022-08-15 15:56:05', 'P123', '2022-08-15 15:56:05'),
	(2, 'paket pendidikan', 1, 'P123', '2022-08-15 15:59:06', 'P123', '2022-08-15 15:59:06'),
	(3, 'testimoni', 1, 'P123', '2022-08-15 16:06:30', 'P123', '2022-08-15 16:06:30'),
	(4, 'identitas sekolah', 1, 'P123', '2022-08-16 02:02:21', 'P123', '2022-08-16 02:04:34'),
	(5, 'visi dan misi', 1, 'P123', '2022-08-16 02:06:17', 'P123', '2022-08-16 02:06:17'),
	(6, 'program belajar', 1, 'P123', '2022-08-16 02:10:20', 'P123', '2022-08-16 02:10:20'),
	(7, 'header logo', 1, 'P123', '2022-08-19 03:25:57', 'P123', '2022-08-19 03:25:57'),
	(8, 'lokasi sekolah', 1, 'P123', '2022-08-19 04:10:02', 'P123', '2022-08-19 04:10:02'),
	(9, 'pengajar dan staff', 1, 'P123', '2022-08-19 05:50:11', 'P123', '2022-08-19 05:50:11');

	

