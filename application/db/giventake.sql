

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";



CREATE TABLE `bantuan` (
  `bantuan_id` int(11) NOT NULL,
  `bantuan_type` varchar(128) NOT NULL,
  `bantuan_status` varchar(128) NOT NULL,
  `donatur_id` int(11) NOT NULL,
  `ss_id` int(11) NOT NULL,
  `bb_id` int(11) NOT NULL,
  `bu_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bantuan`
--

INSERT INTO `bantuan` (`bantuan_id`, `bantuan_type`, `bantuan_status`, `donatur_id`, `ss_id`, `bb_id`, `bu_id`) VALUES
(1, 'Barang', 'Disimpan', 7, 1, 2, NULL),
(2, 'Barang', 'Disimpan', 7, 1, 3, NULL),
(3, 'Barang', 'Disimpan', 7, 1, 4, NULL),
(4, 'Barang', 'Disimpan', 7, 1, 5, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bantuan_barang`
--

CREATE TABLE `bantuan_barang` (
  `bb_id` int(11) NOT NULL,
  `bb_jenis` varchar(128) NOT NULL,
  `bb_nama` varchar(128) NOT NULL,
  `bb_satuan` varchar(128) NOT NULL,
  `bb_jumlah` int(11) NOT NULL,
  `bb_img_attachement` varchar(256) DEFAULT NULL,
  `bb_pickup_loc` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bantuan_barang`
--

INSERT INTO `bantuan_barang` (`bb_id`, `bb_jenis`, `bb_nama`, `bb_satuan`, `bb_jumlah`, `bb_img_attachement`, `bb_pickup_loc`) VALUES
(2, 'Pakaian', 'Celana', 'Helai', 2, NULL, 'Jakarta Utara'),
(3, 'Minuman', 'Coca-Cola', 'Botol', 2, NULL, 'Jakarta Utara'),
(4, 'Makanan', 'Beras', 'KG', 2, NULL, 'Jakarta Utara'),
(5, 'Makanan', 'Beras Matii', 'Karung', 123, NULL, 'Jakarta Utara');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bantuan_uang`
--

CREATE TABLE `bantuan_uang` (
  `bu_id` int(11) NOT NULL,
  `bu_nominal` int(11) NOT NULL,
  `bu_img_proof` varchar(256) NOT NULL,
  `bu_bank` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `donatur`
--

CREATE TABLE `donatur` (
  `id` int(11) NOT NULL,
  `status` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `donatur`
--

INSERT INTO `donatur` (`id`, `status`) VALUES
(7, 'on');

-- --------------------------------------------------------

--
-- Struktur dari tabel `identity`
--

CREATE TABLE `identity` (
  `identity_id` int(11) NOT NULL,
  `identity_name` varchar(256) NOT NULL,
  `identity_created` int(11) NOT NULL,
  `identity_username` varchar(256) NOT NULL,
  `identity_password` varchar(256) NOT NULL,
  `identity_email` varchar(256) NOT NULL,
  `identity_address` varchar(256) NOT NULL,
  `identity_phone_number` varchar(256) NOT NULL,
  `relawan_id` int(11) DEFAULT NULL,
  `donatur_id` int(11) DEFAULT NULL,
  `penyintas_id` int(11) DEFAULT NULL,
  `identity_role` int(11) NOT NULL,
  `identity_is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `identity`
--

INSERT INTO `identity` (`identity_id`, `identity_name`, `identity_created`, `identity_username`, `identity_password`, `identity_email`, `identity_address`, `identity_phone_number`, `relawan_id`, `donatur_id`, `penyintas_id`, `identity_role`, `identity_is_active`) VALUES
(12, 'test', 1672320613, 'test144241', '$2y$10$o/V0VEofsYsH1lK81ileQeskizSt67Dm/PqamY4a6xK.WW3w26Pba', 'testo@yopmail.com', 'test', '123', NULL, 7, NULL, 1, 1),
(13, 'Mukio', 1672380123, 'Mukio477992', '$2y$10$rf6mouVwy8FhCKMfNqdD6OXF61UgvXSw.XvfIJOlvc7RXoOwL3Bzm', 'testomen@yopmail.com', 'Kalasan, Abepura, Jayapura', '0967378129', 8, NULL, NULL, 2, 1),
(14, 'Narumi', 1672397097, 'Narumi314703', '$2y$10$zZL.BzvP8DhjrmkVrOZ6geT5J9Q4XmQ1uErK/G.dxziiOpbW7CXN6', 'narumi@yopmail.com', 'Jepang', '08129388123', NULL, NULL, 1, 3, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `message`
--

CREATE TABLE `message` (
  `msg_id` int(11) NOT NULL,
  `msg_body` text DEFAULT NULL,
  `msg_created` int(11) NOT NULL,
  `msg_is_attached` int(11) DEFAULT NULL,
  `msg_sender` varchar(128) NOT NULL,
  `msg_attachement` varchar(256) DEFAULT NULL,
  `relawan_id` int(11) DEFAULT NULL,
  `donatur_id` int(11) DEFAULT NULL,
  `penyintas_id` int(11) DEFAULT NULL,
  `ss_id` int(11) NOT NULL,
  `msg_is_opened` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `message`
--



-- --------------------------------------------------------

--
-- Struktur dari tabel `migi`
--

CREATE TABLE `migi` (
  `id` int(11) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `migi`
--

INSERT INTO `migi` (`id`, `nama`, `kelas`) VALUES
(1, '0', 2),
(2, '0', 10),
(3, 'valentino', 10),
(4, 'dfgs', 0),
(5, 'Vincent', 3),
(6, 'titus', 10),
(7, 'KIMIGAYO', 100),
(8, '', 0),
(9, '', 0),
(10, 'halo valentinoi', 2),
(11, 'Valentino', 2),
(12, 'imasdasdassa', 2),
(13, 'valentino', 2),
(14, 'Anjingg', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyintas`
--

CREATE TABLE `penyintas` (
  `id` int(11) NOT NULL,
  `penyintas_no_rek` varchar(256) DEFAULT NULL,
  `status` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penyintas`
--

INSERT INTO `penyintas` (`id`, `penyintas_no_rek`, `status`) VALUES
(1, NULL, 'on');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permohonan_bantuan`
--

CREATE TABLE `permohonan_bantuan` (
  `pb_id` int(11) NOT NULL,
  `pb_deskripsi_tambahan` varchar(256) DEFAULT NULL,
  `pb_tingkat_urgensi` varchar(128) DEFAULT NULL,
  `pb_satuan_barang` varchar(128) NOT NULL,
  `pb_jumlah_barang` int(11) NOT NULL,
  `pb_jumlah_donasi` int(11) DEFAULT NULL,
  `pb_barang_kebutuhan` varchar(128) NOT NULL,
  `pb_status` varchar(128) NOT NULL,
  `pb_jawaban` varchar(256) DEFAULT NULL,
  `pb_drop_loc` varchar(256) NOT NULL,
  `pb_jenis_bantuan` varchar(128) DEFAULT NULL,
  `penyintas_id` int(11) NOT NULL,
  `ss_id` int(11) NOT NULL,
  `pb_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `permohonan_bantuan`
--

INSERT INTO `permohonan_bantuan` (`pb_id`, `pb_deskripsi_tambahan`, `pb_tingkat_urgensi`, `pb_satuan_barang`, `pb_jumlah_barang`, `pb_jumlah_donasi`, `pb_barang_kebutuhan`, `pb_status`, `pb_jawaban`, `pb_drop_loc`, `pb_jenis_bantuan`, `penyintas_id`, `ss_id`, `pb_created`) VALUES
(3, 'Tolong di tambah es', NULL, 'Gelas', 122, NULL, 'Air Minum', 'Denied', 'Mohon maaf, sedang tidak ada bantuan yang tersedia untuk permohonan ini.', 'Kalasan, Yogyakarta', 'Barang', 1, 1, 1672830865),
(4, '', NULL, 'KG', 2, NULL, 'Beras', 'Denied', 'Mohon maaf, sedang tidak ada bantuan yang tersedia untuk permohonan ini.', 'Kaliurang, RT 01, RW 17', 'Barang', 1, 1, 1672831104),
(5, '', NULL, 'Kardus', 23, NULL, 'Obat Batuk', 'Denied', 'Mohon maaf ya', 'No where', 'Barang', 1, 1, 1672831287),
(6, '', NULL, 'Gelas', 12, NULL, 'Coca-Cola', 'Denied', '', '21', 'Barang', 1, 1, 1672891617);

-- --------------------------------------------------------

--
-- Struktur dari tabel `relawan`
--

CREATE TABLE `relawan` (
  `id` int(11) NOT NULL,
  `status` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `relawan`
--

INSERT INTO `relawan` (`id`, `status`) VALUES
(8, 'on'),
(9, 'on');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ss`
--

CREATE TABLE `ss` (
  `ss_id` int(11) NOT NULL,
  `ss_password` varchar(256) NOT NULL,
  `ss_name` varchar(128) NOT NULL,
  `ss_username` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ss`
--

INSERT INTO `ss` (`ss_id`, `ss_password`, `ss_name`, `ss_username`) VALUES
(1, 'admin', 'Admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `task`
--

CREATE TABLE `task` (
  `task_id` int(11) NOT NULL,
  `task_status` varchar(256) NOT NULL,
  `task_time_ddl` int(11) NOT NULL,
  `relawan_id` int(11) NOT NULL,
  `ss_id` int(11) NOT NULL,
  `bantuan_id` int(11) NOT NULL,
  `pb_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `token`
--

CREATE TABLE `token` (
  `tkn_id` int(11) NOT NULL,
  `tkn_email` varchar(256) NOT NULL,
  `tkn_token` varchar(256) NOT NULL,
  `tkn_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `token`
--

INSERT INTO `token` (`tkn_id`, `tkn_email`, `tkn_token`, `tkn_created`) VALUES
(10, 'testo@yopmail.com', 'OsFhMRAtlM6Uh3EnEOcP/uI2A3m3ps+vzcQcrv2jw7Q=', 1672320613),
(11, 'testomen@yopmail.com', 'YoNNgXTQuuLhJIeQMltj8/uvZmABChkp7e0T27l4/qc=', 1672380123),
(12, 'narumi@yopmail.com', 'Q66za6apaloSfsDpTLM09ADnTIgDOFkefcjohQti6UI=', 1672397097);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bantuan`
--
ALTER TABLE `bantuan`
  ADD PRIMARY KEY (`bantuan_id`),
  ADD KEY `donatur_id` (`donatur_id`),
  ADD KEY `ss_id` (`ss_id`),
  ADD KEY `bb_id` (`bb_id`),
  ADD KEY `bu_id` (`bu_id`);

--
-- Indeks untuk tabel `bantuan_barang`
--
ALTER TABLE `bantuan_barang`
  ADD PRIMARY KEY (`bb_id`);

--
-- Indeks untuk tabel `bantuan_uang`
--
ALTER TABLE `bantuan_uang`
  ADD PRIMARY KEY (`bu_id`);

--
-- Indeks untuk tabel `donatur`
--
ALTER TABLE `donatur`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `identity`
--
ALTER TABLE `identity`
  ADD PRIMARY KEY (`identity_id`),
  ADD KEY `relawan_id` (`relawan_id`),
  ADD KEY `donatur_id` (`donatur_id`),
  ADD KEY `penyintas_id` (`penyintas_id`);

--
-- Indeks untuk tabel `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`msg_id`),
  ADD KEY `relawan_id` (`relawan_id`),
  ADD KEY `donatur_id` (`donatur_id`),
  ADD KEY `penyintas_id` (`penyintas_id`),
  ADD KEY `ss_id` (`ss_id`);

--
-- Indeks untuk tabel `migi`
--
ALTER TABLE `migi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penyintas`
--
ALTER TABLE `penyintas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `permohonan_bantuan`
--
ALTER TABLE `permohonan_bantuan`
  ADD PRIMARY KEY (`pb_id`),
  ADD KEY `penyintas_id` (`penyintas_id`),
  ADD KEY `ss_id` (`ss_id`);

--
-- Indeks untuk tabel `relawan`
--
ALTER TABLE `relawan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ss`
--
ALTER TABLE `ss`
  ADD PRIMARY KEY (`ss_id`);

--
-- Indeks untuk tabel `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `relawan_id` (`relawan_id`),
  ADD KEY `ss_id` (`ss_id`),
  ADD KEY `bantuan_id` (`bantuan_id`),
  ADD KEY `pb_id` (`pb_id`);

--
-- Indeks untuk tabel `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`tkn_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bantuan`
--
ALTER TABLE `bantuan`
  MODIFY `bantuan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `bantuan_barang`
--
ALTER TABLE `bantuan_barang`
  MODIFY `bb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `bantuan_uang`
--
ALTER TABLE `bantuan_uang`
  MODIFY `bu_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `donatur`
--
ALTER TABLE `donatur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `identity`
--
ALTER TABLE `identity`
  MODIFY `identity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `message`
--
ALTER TABLE `message`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=825;

--
-- AUTO_INCREMENT untuk tabel `migi`
--
ALTER TABLE `migi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `penyintas`
--
ALTER TABLE `penyintas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `permohonan_bantuan`
--
ALTER TABLE `permohonan_bantuan`
  MODIFY `pb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `relawan`
--
ALTER TABLE `relawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `ss`
--
ALTER TABLE `ss`
  MODIFY `ss_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `task`
--
ALTER TABLE `task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `token`
--
ALTER TABLE `token`
  MODIFY `tkn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bantuan`
--
ALTER TABLE `bantuan`
  ADD CONSTRAINT `bantuan_ibfk_1` FOREIGN KEY (`donatur_id`) REFERENCES `donatur` (`id`),
  ADD CONSTRAINT `bantuan_ibfk_2` FOREIGN KEY (`ss_id`) REFERENCES `ss` (`ss_id`),
  ADD CONSTRAINT `bantuan_ibfk_3` FOREIGN KEY (`bb_id`) REFERENCES `bantuan_barang` (`bb_id`),
  ADD CONSTRAINT `bantuan_ibfk_4` FOREIGN KEY (`bu_id`) REFERENCES `bantuan_uang` (`bu_id`);

--
-- Ketidakleluasaan untuk tabel `identity`
--
ALTER TABLE `identity`
  ADD CONSTRAINT `identity_ibfk_1` FOREIGN KEY (`relawan_id`) REFERENCES `relawan` (`id`),
  ADD CONSTRAINT `identity_ibfk_2` FOREIGN KEY (`donatur_id`) REFERENCES `donatur` (`id`),
  ADD CONSTRAINT `identity_ibfk_3` FOREIGN KEY (`penyintas_id`) REFERENCES `penyintas` (`id`);

--
-- Ketidakleluasaan untuk tabel `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`relawan_id`) REFERENCES `relawan` (`id`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`donatur_id`) REFERENCES `donatur` (`id`),
  ADD CONSTRAINT `message_ibfk_3` FOREIGN KEY (`penyintas_id`) REFERENCES `penyintas` (`id`),
  ADD CONSTRAINT `message_ibfk_4` FOREIGN KEY (`ss_id`) REFERENCES `ss` (`ss_id`);

--
-- Ketidakleluasaan untuk tabel `permohonan_bantuan`
--
ALTER TABLE `permohonan_bantuan`
  ADD CONSTRAINT `permohonan_bantuan_ibfk_1` FOREIGN KEY (`penyintas_id`) REFERENCES `penyintas` (`id`),
  ADD CONSTRAINT `permohonan_bantuan_ibfk_2` FOREIGN KEY (`ss_id`) REFERENCES `ss` (`ss_id`);

--
-- Ketidakleluasaan untuk tabel `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`relawan_id`) REFERENCES `relawan` (`id`),
  ADD CONSTRAINT `task_ibfk_2` FOREIGN KEY (`ss_id`) REFERENCES `ss` (`ss_id`),
  ADD CONSTRAINT `task_ibfk_3` FOREIGN KEY (`bantuan_id`) REFERENCES `bantuan` (`bantuan_id`),
  ADD CONSTRAINT `task_ibfk_4` FOREIGN KEY (`pb_id`) REFERENCES `permohonan_bantuan` (`pb_id`);
COMMIT;

