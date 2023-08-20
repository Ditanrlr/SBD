-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2022 at 02:00 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_smk`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen_guru`
--

CREATE TABLE `absen_guru` (
  `id_absen_guru` int(10) UNSIGNED NOT NULL,
  `guru_id_guru` int(10) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `keterangan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absen_guru`
--

INSERT INTO `absen_guru` (`id_absen_guru`, `guru_id_guru`, `nama_lengkap`, `tanggal`, `keterangan`) VALUES
(1, 3, 'Yuliani, S.Pd.', '2022-09-09', 'hadir'),
(2, 4, 'Apriani, S.Pd.', '2022-09-09', 'Sakit');

-- --------------------------------------------------------

--
-- Table structure for table `absen_siswa`
--

CREATE TABLE `absen_siswa` (
  `id_absen_siswa` int(10) UNSIGNED NOT NULL,
  `Siswa_id_Siswa` int(10) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `keterangan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absen_siswa`
--

INSERT INTO `absen_siswa` (`id_absen_siswa`, `Siswa_id_Siswa`, `nama_lengkap`, `tanggal`, `keterangan`) VALUES
(1, 4, 'Aditya', '2022-07-09', 'hadir');

-- --------------------------------------------------------

--
-- Table structure for table `ekstrakulikuler`
--

CREATE TABLE `ekstrakulikuler` (
  `id_ekstrakulikuler` int(10) UNSIGNED NOT NULL,
  `Siswa_id_Siswa` int(10) UNSIGNED NOT NULL,
  `Nama_siswa` varchar(255) DEFAULT NULL,
  `nama_ekstrakulikuler` varchar(20) DEFAULT NULL,
  `tingkat_kelas` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ekstrakulikuler`
--

INSERT INTO `ekstrakulikuler` (`id_ekstrakulikuler`, `Siswa_id_Siswa`, `Nama_siswa`, `nama_ekstrakulikuler`, `tingkat_kelas`) VALUES
(1, 5, 'Aulia', 'Osis', 11);

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
--

CREATE TABLE `gaji` (
  `id_gaji` int(10) UNSIGNED NOT NULL,
  `Staff_id_Staff` int(10) UNSIGNED NOT NULL,
  `kepala_sekolah_id_kepala_sekolah` int(10) UNSIGNED NOT NULL,
  `guru_id_guru` int(10) UNSIGNED NOT NULL,
  `Nama` varchar(255) DEFAULT NULL,
  `jabatan` varchar(20) DEFAULT NULL,
  `tanggal` int(10) UNSIGNED DEFAULT NULL,
  `jumlah` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(10) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `NIP` int(10) UNSIGNED DEFAULT NULL,
  `alamat` varchar(45) DEFAULT NULL,
  `tempat_tanggal_lahir` char(25) DEFAULT NULL,
  `mata_pelajaran` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nama_lengkap`, `NIP`, `alamat`, `tempat_tanggal_lahir`, `mata_pelajaran`) VALUES
(1, 'Eva Fauziah,S.Pd', 4294967295, 'Garut', 'Garut, 23 Juni 1995', 'Bahasa Indonesia'),
(2, 'Apriani, S.Pd.', 4294967295, 'Tasik Malaya', 'Tasik Malaya, 15 Mei 1989', 'Bahasa Sunda'),
(3, 'Yuliani, S.Pd.', 3173678319, 'Garut', 'Garut, 11 April 1986', 'PKN'),
(4, 'Suparto, S.Pd.', 4294967295, 'Garut', 'Garut, 1 Januari 1975', 'PJOK'),
(5, 'Edy Mardayo, S.Ag.', 4294967295, 'Garut', 'Garut, 7 Juli 1989', 'Pendidikan Agama Islam');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_pelajaran`
--

CREATE TABLE `jadwal_pelajaran` (
  `id_Jadwal_pelajaran` int(10) UNSIGNED NOT NULL,
  `mata_pelajaran_id_mata_pelajaran` int(10) UNSIGNED NOT NULL,
  `nama_mata_pelajaran` varchar(20) DEFAULT NULL,
  `kelas_yang_diajar` varchar(20) DEFAULT NULL,
  `guru_yang_mengajar` varchar(255) DEFAULT NULL,
  `tingkat_kelas` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_Jurusan` int(10) UNSIGNED NOT NULL,
  `Siswa_id_Siswa` int(10) UNSIGNED NOT NULL,
  `ruang_prakrek_id_ruang_prakrek` int(10) UNSIGNED NOT NULL,
  `lab_id_lab` int(10) UNSIGNED NOT NULL,
  `nama_jurusan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kantin`
--

CREATE TABLE `kantin` (
  `id_kantin` int(10) UNSIGNED NOT NULL,
  `Siswa_id_Siswa` int(10) UNSIGNED NOT NULL,
  `Nama_makanan` varchar(45) DEFAULT NULL,
  `harga_makanan` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(10) UNSIGNED NOT NULL,
  `Siswa_id_Siswa` int(10) UNSIGNED NOT NULL,
  `wali_kelas` varchar(255) DEFAULT NULL,
  `tingkat_kelas` char(10) DEFAULT NULL,
  `jurusan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `Siswa_id_Siswa`, `wali_kelas`, `tingkat_kelas`, `jurusan`) VALUES
(1, 2, 'Eva Fauziah, S.Pd.', '11', 'TKJ');

-- --------------------------------------------------------

--
-- Table structure for table `kepala_sekolah`
--

CREATE TABLE `kepala_sekolah` (
  `id_kepala_sekolah` int(10) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `NIP` int(10) UNSIGNED DEFAULT NULL,
  `tempat_tanggal_lahir` char(25) DEFAULT NULL,
  `alamat` varchar(45) DEFAULT NULL,
  `Agama` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kepala_sekolah`
--

INSERT INTO `kepala_sekolah` (`id_kepala_sekolah`, `nama_lengkap`, `NIP`, `tempat_tanggal_lahir`, `alamat`, `Agama`) VALUES
(1, 'Ahmad Jon Areli, S.Pd.,M.Pd.', 4294967295, 'Garut, 2 Juni 1963', 'Garut', 'islam');

-- --------------------------------------------------------

--
-- Table structure for table `kurikulum`
--

CREATE TABLE `kurikulum` (
  `id_kurikulum` int(10) UNSIGNED NOT NULL,
  `mata_pelajaran_id_mata_pelajaran` int(10) UNSIGNED NOT NULL,
  `mata_pelajaran` varchar(45) DEFAULT NULL,
  `nama_kurikulum` varchar(20) DEFAULT NULL,
  `status_kurikulum` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kurikulum`
--

INSERT INTO `kurikulum` (`id_kurikulum`, `mata_pelajaran_id_mata_pelajaran`, `mata_pelajaran`, `nama_kurikulum`, `status_kurikulum`) VALUES
(1, 1, 'Pendidikan Agama Islam', 'Kurikulum Merdeka', 'baik');

-- --------------------------------------------------------

--
-- Table structure for table `lab`
--

CREATE TABLE `lab` (
  `id_lab` int(10) UNSIGNED NOT NULL,
  `Nama_lab` varchar(20) DEFAULT NULL,
  `Nama_jurusan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lapangan`
--

CREATE TABLE `lapangan` (
  `id_Lapangan` int(10) UNSIGNED NOT NULL,
  `ekstrakulikuler_id_ekstrakulikuler` int(10) UNSIGNED NOT NULL,
  `Nama_lapangan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id_mata_pelajaran` int(10) UNSIGNED NOT NULL,
  `nama_mata_pelajaran` varchar(20) DEFAULT NULL,
  `guru_pengajar` varchar(20) DEFAULT NULL,
  `tingkat_kelas` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id_mata_pelajaran`, `nama_mata_pelajaran`, `guru_pengajar`, `tingkat_kelas`) VALUES
(1, 'Bahasa Indonesia', 'Eva Fauziah, S.Pd.', 11),
(2, 'PJOK', 'Suparto, S.Pd.', 10),
(3, 'Pendidikan Agama Isl', 'Edy Mardayo', 12);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(10) UNSIGNED NOT NULL,
  `Nama_siswa` varchar(255) DEFAULT NULL,
  `mata_pelajaran` varchar(20) DEFAULT NULL,
  `Semester` varchar(20) DEFAULT NULL,
  `Nama_jurusan` varchar(20) DEFAULT NULL,
  `bobot_nilai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `Nama_siswa`, `mata_pelajaran`, `Semester`, `Nama_jurusan`, `bobot_nilai`) VALUES
(1, 'Erika', 'Bahasa Indonesia', '2(dua)', 'Multimedia', 85),
(2, 'Anisa', 'PKN', '2(dua)', 'Akutansi', 90);

-- --------------------------------------------------------

--
-- Table structure for table `orang_tua`
--

CREATE TABLE `orang_tua` (
  `id_orang_tua` int(10) UNSIGNED NOT NULL,
  `Siswa_id_Siswa` int(10) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `alamat` varchar(45) DEFAULT NULL,
  `pekerjaan` varchar(20) DEFAULT NULL,
  `tempat_tanggal_lahir` char(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orang_tua`
--

INSERT INTO `orang_tua` (`id_orang_tua`, `Siswa_id_Siswa`, `nama_lengkap`, `alamat`, `pekerjaan`, `tempat_tanggal_lahir`) VALUES
(1, 1, 'Joni', 'Garut', 'Pedangang', 'Garut, 15 Mei 1977'),
(2, 2, 'Dani', 'Garut', 'Wiraswasta', 'Garut, 2 Juni 1973'),
(3, 3, 'Kartini', 'Garut', 'IRT', 'Garut, 1 Januari 1977'),
(4, 4, 'lala', 'Garut', 'IRT', 'Garut, 2 Juli 1963'),
(5, 5, 'euis', 'Garut', 'penjahit', 'Garut, 1 Januari 1988');

-- --------------------------------------------------------

--
-- Table structure for table `parkir`
--

CREATE TABLE `parkir` (
  `Siswa_id_Siswa` int(10) UNSIGNED NOT NULL,
  `kepala_sekolah_id_kepala_sekolah` int(10) UNSIGNED NOT NULL,
  `guru_id_guru` int(10) UNSIGNED NOT NULL,
  `Staff_id_Staff` int(10) UNSIGNED NOT NULL,
  `Nama_pemilik` varchar(255) DEFAULT NULL,
  `No_polisi` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran_siswa`
--

CREATE TABLE `pendaftaran_siswa` (
  `id_pendaftaran_siswa` int(10) UNSIGNED NOT NULL,
  `data_diri_calon_siswa` varchar(255) DEFAULT NULL,
  `data_orang_tua_siswa` varchar(255) DEFAULT NULL,
  `biaya` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `perpustakaan`
--

CREATE TABLE `perpustakaan` (
  `id_perpustakaan` int(10) UNSIGNED NOT NULL,
  `Staff_id_Staff` int(10) UNSIGNED NOT NULL,
  `Nama_buku` varchar(255) DEFAULT NULL,
  `jumlah_buku` int(10) UNSIGNED DEFAULT NULL,
  `Anggota_perpustakaan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ruang_prakrek`
--

CREATE TABLE `ruang_prakrek` (
  `id_ruang_prakrek` int(10) UNSIGNED NOT NULL,
  `Nama_ruangan` varchar(20) DEFAULT NULL,
  `Nama_jurusan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_Siswa` int(10) UNSIGNED NOT NULL,
  `Nama_lengkap` varchar(255) DEFAULT NULL,
  `NISN` int(10) UNSIGNED DEFAULT NULL,
  `Tempat_tanggal_lahir` char(25) DEFAULT NULL,
  `Jurusan` varchar(20) DEFAULT NULL,
  `nama_orang_tua` varchar(255) DEFAULT NULL,
  `alamat` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_Siswa`, `Nama_lengkap`, `NISN`, `Tempat_tanggal_lahir`, `Jurusan`, `nama_orang_tua`, `alamat`) VALUES
(1, 'Aulia ', 201001, 'garut, 21 September 2004', 'Tata Busana', 'Euis', 'Garut'),
(2, 'Aditya', 201002, 'Garut,7 April 2004', 'multimedia', 'lala', 'Garut'),
(3, 'Anisa', 201110, 'Garut,8 agustus 2005', 'Akutansi', 'Kartini', 'Garut'),
(4, 'Anton Fredy', 201500, 'Garut,28 Juli 2004', 'TKJ', 'Dani', 'Garut'),
(5, 'Erika', 204930, 'Garut,5 Mei 2004', 'multimedia', 'Joni', 'Garut');

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `id_SPP` int(10) UNSIGNED NOT NULL,
  `Siswa_id_Siswa` int(10) UNSIGNED NOT NULL,
  `Nama_siswa` varchar(255) DEFAULT NULL,
  `bulan` date DEFAULT NULL,
  `jumlah` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`id_SPP`, `Siswa_id_Siswa`, `Nama_siswa`, `bulan`, `jumlah`) VALUES
(1, 1, 'Erika', '2022-06-12', 250000);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id_Staff` int(10) UNSIGNED NOT NULL,
  `Nama_lengkap` varchar(255) DEFAULT NULL,
  `Jabatan` varchar(20) DEFAULT NULL,
  `alamat` varchar(45) DEFAULT NULL,
  `tempat_tanggal_lahir` char(25) DEFAULT NULL,
  `Agama` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id_Staff`, `Nama_lengkap`, `Jabatan`, `alamat`, `tempat_tanggal_lahir`, `Agama`) VALUES
(1, 'Nur Latifah', 'Pustakawan', 'Garut', 'Garut, 15 Mei 1989', 'islam'),
(2, 'Lilis Suryati', 'Operator sekolah', 'Bandung', 'Bandung, 25 Januari 1977', 'islam'),
(3, 'Wanda', 'Karyawan', 'Garut', 'Garut, 2 Juni 1963', 'islam'),
(4, 'Nurjanah', 'Karyawan', 'Garut', 'Garut, 23 Juni 1989', 'islam'),
(5, 'Dadang ', 'Satpam', 'Garut', 'Garut, 5 Oktober 1983', 'islam');

-- --------------------------------------------------------

--
-- Table structure for table `tunjangan`
--

CREATE TABLE `tunjangan` (
  `id_Tunjangan` int(10) UNSIGNED NOT NULL,
  `guru_id_guru` int(10) UNSIGNED NOT NULL,
  `Staff_id_Staff` int(10) UNSIGNED NOT NULL,
  `kepala_sekolah_id_kepala_sekolah` int(10) UNSIGNED NOT NULL,
  `Nama` varchar(255) DEFAULT NULL,
  `jabatan` int(10) UNSIGNED DEFAULT NULL,
  `status_2` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen_guru`
--
ALTER TABLE `absen_guru`
  ADD PRIMARY KEY (`id_absen_guru`,`guru_id_guru`),
  ADD KEY `absen_guru_FKIndex1` (`guru_id_guru`);

--
-- Indexes for table `absen_siswa`
--
ALTER TABLE `absen_siswa`
  ADD PRIMARY KEY (`id_absen_siswa`,`Siswa_id_Siswa`),
  ADD KEY `absen_siswa_FKIndex1` (`Siswa_id_Siswa`);

--
-- Indexes for table `ekstrakulikuler`
--
ALTER TABLE `ekstrakulikuler`
  ADD PRIMARY KEY (`id_ekstrakulikuler`),
  ADD KEY `ekstrakulikuler_FKIndex1` (`Siswa_id_Siswa`);

--
-- Indexes for table `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id_gaji`,`Staff_id_Staff`,`kepala_sekolah_id_kepala_sekolah`),
  ADD KEY `gaji_FKIndex1` (`guru_id_guru`),
  ADD KEY `gaji_FKIndex2` (`kepala_sekolah_id_kepala_sekolah`),
  ADD KEY `gaji_FKIndex3` (`Staff_id_Staff`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
  ADD PRIMARY KEY (`id_Jadwal_pelajaran`,`mata_pelajaran_id_mata_pelajaran`),
  ADD KEY `Jadwal_pelajaran_FKIndex1` (`mata_pelajaran_id_mata_pelajaran`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_Jurusan`,`Siswa_id_Siswa`,`ruang_prakrek_id_ruang_prakrek`,`lab_id_lab`),
  ADD KEY `Jurusan_FKIndex1` (`Siswa_id_Siswa`),
  ADD KEY `Jurusan_FKIndex2` (`ruang_prakrek_id_ruang_prakrek`),
  ADD KEY `Jurusan_FKIndex3` (`lab_id_lab`);

--
-- Indexes for table `kantin`
--
ALTER TABLE `kantin`
  ADD PRIMARY KEY (`id_kantin`,`Siswa_id_Siswa`),
  ADD KEY `kantin_FKIndex1` (`Siswa_id_Siswa`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`,`Siswa_id_Siswa`),
  ADD KEY `kelas_FKIndex1` (`Siswa_id_Siswa`);

--
-- Indexes for table `kepala_sekolah`
--
ALTER TABLE `kepala_sekolah`
  ADD PRIMARY KEY (`id_kepala_sekolah`);

--
-- Indexes for table `kurikulum`
--
ALTER TABLE `kurikulum`
  ADD PRIMARY KEY (`id_kurikulum`),
  ADD KEY `kurikulum_FKIndex1` (`mata_pelajaran_id_mata_pelajaran`);

--
-- Indexes for table `lab`
--
ALTER TABLE `lab`
  ADD PRIMARY KEY (`id_lab`);

--
-- Indexes for table `lapangan`
--
ALTER TABLE `lapangan`
  ADD PRIMARY KEY (`id_Lapangan`),
  ADD KEY `Lapangan_FKIndex2` (`ekstrakulikuler_id_ekstrakulikuler`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id_mata_pelajaran`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `orang_tua`
--
ALTER TABLE `orang_tua`
  ADD PRIMARY KEY (`id_orang_tua`),
  ADD KEY `orang_tua_FKIndex2` (`Siswa_id_Siswa`);

--
-- Indexes for table `parkir`
--
ALTER TABLE `parkir`
  ADD PRIMARY KEY (`Siswa_id_Siswa`,`kepala_sekolah_id_kepala_sekolah`),
  ADD KEY `parkir_FKIndex1` (`Siswa_id_Siswa`),
  ADD KEY `parkir_FKIndex3` (`kepala_sekolah_id_kepala_sekolah`),
  ADD KEY `parkir_FKIndex4` (`Staff_id_Staff`),
  ADD KEY `parkir_FKIndex2` (`guru_id_guru`);

--
-- Indexes for table `pendaftaran_siswa`
--
ALTER TABLE `pendaftaran_siswa`
  ADD PRIMARY KEY (`id_pendaftaran_siswa`);

--
-- Indexes for table `perpustakaan`
--
ALTER TABLE `perpustakaan`
  ADD PRIMARY KEY (`id_perpustakaan`,`Staff_id_Staff`),
  ADD KEY `perpustakaan_FKIndex1` (`Staff_id_Staff`);

--
-- Indexes for table `ruang_prakrek`
--
ALTER TABLE `ruang_prakrek`
  ADD PRIMARY KEY (`id_ruang_prakrek`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_Siswa`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`id_SPP`,`Siswa_id_Siswa`),
  ADD KEY `SPP_FKIndex1` (`Siswa_id_Siswa`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id_Staff`);

--
-- Indexes for table `tunjangan`
--
ALTER TABLE `tunjangan`
  ADD PRIMARY KEY (`id_Tunjangan`,`guru_id_guru`),
  ADD KEY `Tunjangan_FKIndex1` (`guru_id_guru`),
  ADD KEY `Tunjangan_FKIndex2` (`kepala_sekolah_id_kepala_sekolah`),
  ADD KEY `Tunjangan_FKIndex3` (`Staff_id_Staff`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen_guru`
--
ALTER TABLE `absen_guru`
  MODIFY `id_absen_guru` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `absen_siswa`
--
ALTER TABLE `absen_siswa`
  MODIFY `id_absen_siswa` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ekstrakulikuler`
--
ALTER TABLE `ekstrakulikuler`
  MODIFY `id_ekstrakulikuler` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gaji`
--
ALTER TABLE `gaji`
  MODIFY `id_gaji` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
  MODIFY `id_Jadwal_pelajaran` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_Jurusan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kantin`
--
ALTER TABLE `kantin`
  MODIFY `id_kantin` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kepala_sekolah`
--
ALTER TABLE `kepala_sekolah`
  MODIFY `id_kepala_sekolah` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kurikulum`
--
ALTER TABLE `kurikulum`
  MODIFY `id_kurikulum` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lab`
--
ALTER TABLE `lab`
  MODIFY `id_lab` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lapangan`
--
ALTER TABLE `lapangan`
  MODIFY `id_Lapangan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id_mata_pelajaran` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orang_tua`
--
ALTER TABLE `orang_tua`
  MODIFY `id_orang_tua` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `parkir`
--
ALTER TABLE `parkir`
  MODIFY `Siswa_id_Siswa` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pendaftaran_siswa`
--
ALTER TABLE `pendaftaran_siswa`
  MODIFY `id_pendaftaran_siswa` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `perpustakaan`
--
ALTER TABLE `perpustakaan`
  MODIFY `id_perpustakaan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ruang_prakrek`
--
ALTER TABLE `ruang_prakrek`
  MODIFY `id_ruang_prakrek` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_Siswa` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `id_SPP` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id_Staff` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tunjangan`
--
ALTER TABLE `tunjangan`
  MODIFY `id_Tunjangan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absen_guru`
--
ALTER TABLE `absen_guru`
  ADD CONSTRAINT `absen_guru_ibfk_1` FOREIGN KEY (`guru_id_guru`) REFERENCES `guru` (`id_guru`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `absen_siswa`
--
ALTER TABLE `absen_siswa`
  ADD CONSTRAINT `absen_siswa_ibfk_1` FOREIGN KEY (`Siswa_id_Siswa`) REFERENCES `siswa` (`id_Siswa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ekstrakulikuler`
--
ALTER TABLE `ekstrakulikuler`
  ADD CONSTRAINT `ekstrakulikuler_ibfk_1` FOREIGN KEY (`Siswa_id_Siswa`) REFERENCES `siswa` (`id_Siswa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `gaji`
--
ALTER TABLE `gaji`
  ADD CONSTRAINT `gaji_ibfk_1` FOREIGN KEY (`guru_id_guru`) REFERENCES `guru` (`id_guru`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `gaji_ibfk_2` FOREIGN KEY (`kepala_sekolah_id_kepala_sekolah`) REFERENCES `kepala_sekolah` (`id_kepala_sekolah`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `gaji_ibfk_3` FOREIGN KEY (`Staff_id_Staff`) REFERENCES `staff` (`id_Staff`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
  ADD CONSTRAINT `jadwal_pelajaran_ibfk_1` FOREIGN KEY (`mata_pelajaran_id_mata_pelajaran`) REFERENCES `mata_pelajaran` (`id_mata_pelajaran`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD CONSTRAINT `jurusan_ibfk_1` FOREIGN KEY (`Siswa_id_Siswa`) REFERENCES `siswa` (`id_Siswa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `jurusan_ibfk_2` FOREIGN KEY (`ruang_prakrek_id_ruang_prakrek`) REFERENCES `ruang_prakrek` (`id_ruang_prakrek`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `jurusan_ibfk_3` FOREIGN KEY (`lab_id_lab`) REFERENCES `lab` (`id_lab`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `kantin`
--
ALTER TABLE `kantin`
  ADD CONSTRAINT `kantin_ibfk_1` FOREIGN KEY (`Siswa_id_Siswa`) REFERENCES `siswa` (`id_Siswa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`Siswa_id_Siswa`) REFERENCES `siswa` (`id_Siswa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `kurikulum`
--
ALTER TABLE `kurikulum`
  ADD CONSTRAINT `kurikulum_ibfk_1` FOREIGN KEY (`mata_pelajaran_id_mata_pelajaran`) REFERENCES `mata_pelajaran` (`id_mata_pelajaran`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `lapangan`
--
ALTER TABLE `lapangan`
  ADD CONSTRAINT `lapangan_ibfk_1` FOREIGN KEY (`ekstrakulikuler_id_ekstrakulikuler`) REFERENCES `ekstrakulikuler` (`id_ekstrakulikuler`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `orang_tua`
--
ALTER TABLE `orang_tua`
  ADD CONSTRAINT `orang_tua_ibfk_1` FOREIGN KEY (`Siswa_id_Siswa`) REFERENCES `siswa` (`id_Siswa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `parkir`
--
ALTER TABLE `parkir`
  ADD CONSTRAINT `parkir_ibfk_1` FOREIGN KEY (`Siswa_id_Siswa`) REFERENCES `siswa` (`id_Siswa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `parkir_ibfk_2` FOREIGN KEY (`kepala_sekolah_id_kepala_sekolah`) REFERENCES `kepala_sekolah` (`id_kepala_sekolah`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `parkir_ibfk_3` FOREIGN KEY (`Staff_id_Staff`) REFERENCES `staff` (`id_Staff`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `parkir_ibfk_4` FOREIGN KEY (`guru_id_guru`) REFERENCES `guru` (`id_guru`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `perpustakaan`
--
ALTER TABLE `perpustakaan`
  ADD CONSTRAINT `perpustakaan_ibfk_1` FOREIGN KEY (`Staff_id_Staff`) REFERENCES `staff` (`id_Staff`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `spp`
--
ALTER TABLE `spp`
  ADD CONSTRAINT `spp_ibfk_1` FOREIGN KEY (`Siswa_id_Siswa`) REFERENCES `siswa` (`id_Siswa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tunjangan`
--
ALTER TABLE `tunjangan`
  ADD CONSTRAINT `tunjangan_ibfk_1` FOREIGN KEY (`guru_id_guru`) REFERENCES `guru` (`id_guru`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tunjangan_ibfk_2` FOREIGN KEY (`kepala_sekolah_id_kepala_sekolah`) REFERENCES `kepala_sekolah` (`id_kepala_sekolah`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tunjangan_ibfk_3` FOREIGN KEY (`Staff_id_Staff`) REFERENCES `staff` (`id_Staff`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
