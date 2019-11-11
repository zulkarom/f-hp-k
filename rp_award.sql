-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 05, 2019 at 03:54 PM
-- Server version: 10.1.41-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fhpkumkedu_portalapps`
--

-- --------------------------------------------------------

--
-- Table structure for table `rp_award`
--

CREATE TABLE `rp_award` (
  `id` int(11) NOT NULL,
  `awd_staff` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `awd_name` varchar(300) NOT NULL,
  `awd_level` tinyint(1) NOT NULL,
  `awd_type` varchar(100) NOT NULL,
  `awd_by` varchar(300) NOT NULL,
  `awd_date` date NOT NULL,
  `awd_file` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  `reviewed_at` datetime NOT NULL,
  `reviewed_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rp_award`
--

INSERT INTO `rp_award` (`id`, `awd_staff`, `status`, `awd_name`, `awd_level`, `awd_type`, `awd_by`, `awd_date`, `awd_file`, `created_at`, `modified_at`, `reviewed_at`, `reviewed_by`) VALUES
(1, 2, 0, 'Anugerah Perkhidmatan Cemerlang', 1, 'No Type', 'Universiti Malaysia Kelantan (UMK)', '2016-12-29', '', '2019-10-24 14:14:07', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(2, 51, 20, 'Karnival Inovasi Pembelajaran dan Pengajaran K-NOVASI, UKM, 2019', 1, 'Gold', 'UKM', '2019-01-02', '2019/erpd/award/awd_15719810345db286ea5a6203.76312675.pdf', '2019-10-25 12:27:34', '2019-10-25 13:24:02', '0000-00-00 00:00:00', 0),
(3, 51, 20, 'Innovation Award', 2, 'Silver', 'MTE', '2019-02-21', '2019/erpd/award/awd_15719812315db287afbe7db2.44717973.pdf', '2019-10-25 13:27:02', '2019-10-25 13:27:13', '0000-00-00 00:00:00', 0),
(4, 51, 20, 'Innovation Award', 1, 'Silver', 'UUM (PIP)', '2019-07-30', '2019/erpd/award/awd_15719815395db288e3835722.11272133.pdf', '2019-10-25 13:29:44', '2019-10-25 13:32:23', '0000-00-00 00:00:00', 0),
(5, 51, 20, 'Innovation Award', 2, 'Bronze', 'UNIMAS (IUCEL)', '2019-08-20', '2019/erpd/award/awd_15719816435db2894bc8fd92.09797670.pdf', '2019-10-25 13:33:53', '2019-10-25 13:34:05', '0000-00-00 00:00:00', 0),
(6, 51, 20, 'Innovation Award', 1, 'Gold', 'Universiti Malaysia Kelantan (UMK) TELIC', '2019-05-20', '2019/erpd/award/awd_15719819335db28a6d7b08e3.44625579.pdf', '2019-10-25 13:38:28', '2019-10-25 13:38:55', '0000-00-00 00:00:00', 0),
(7, 51, 20, 'Innovation Award', 1, 'Silver', 'Universiti Malaysia Kelantan (UMK)', '2019-05-20', '2019/erpd/award/awd_15719819935db28aa9dc34c3.50748959.pdf', '2019-10-25 13:39:42', '2019-10-25 13:39:55', '0000-00-00 00:00:00', 0),
(8, 51, 50, 'Innovation Award', 1, 'Silver', 'Universiti Malaysia Kelantan (UMK)', '2019-05-20', '2019/erpd/award/awd_15719821565db28b4cd6f059.02053900.pdf', '2019-10-25 13:40:52', '2019-10-25 13:42:39', '2019-10-28 12:50:14', 28),
(9, 51, 20, 'Best Practitioner E-assessment', 1, 'No Type', 'Universiti Malaysia Kelantan (UMK)', '2018-11-27', '2019/erpd/award/awd_15719822535db28bad30b7d6.05925015.pdf', '2019-10-25 13:43:58', '2019-10-25 13:44:26', '0000-00-00 00:00:00', 0),
(10, 51, 50, 'Anugerah kecemerlangan Staff 2018 ', 1, 'No Type', 'Universiti Malaysia Kelantan (UMK)', '2019-12-17', '2019/erpd/award/awd_15719823915db28c37383c26.34041313.pdf', '2019-10-25 13:46:18', '2019-10-25 13:46:34', '2019-10-28 12:48:15', 28),
(11, 25, 0, 'Anugerah Perkhidmatan Cemerlang', 1, 'No Type', 'Universiti Malaysia Kelantan (UMK)', '2016-06-09', '', '2019-10-28 11:23:36', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(12, 25, 20, 'Anugerah Jasa Bakti (AJU)', 1, '999', 'Universiti Malaysia Kelantan (UMK)', '2019-07-07', '2019/erpd/award/awd_15722348035db66633587407.81358853.pdf', '2019-10-28 11:52:36', '2019-10-28 11:53:26', '0000-00-00 00:00:00', 0),
(13, 25, 20, 'Carnival Innovation in Teaching & Learning 2019 (K-Novasi)', 1, 'Gold', 'Universiti Kebangsaan Malaysia', '2019-02-21', '2019/erpd/award/awd_15722348935db6668d6093c8.27438378.pdf', '2019-10-28 11:54:29', '2019-10-28 11:54:57', '0000-00-00 00:00:00', 0),
(14, 25, 20, 'Carnival Innovation in Teaching & Learning 2019 (K-Novasi)', 1, 'Gold', 'Universiti Kebangsaan Malaysia', '2019-02-21', '2019/erpd/award/awd_15722349405db666bc70a3c3.00930565.pdf', '2019-10-28 11:55:33', '2019-10-28 11:55:43', '0000-00-00 00:00:00', 0),
(15, 25, 20, 'Carnival Innovation in Teaching & Learning 2019 (K-Novasi)', 1, 'Bronze', 'Universiti Kebangsaan Malaysia', '2019-02-21', '2019/erpd/award/awd_15722350115db66703de2ff7.07497542.pdf', '2019-10-28 11:56:11', '2019-10-28 11:57:09', '0000-00-00 00:00:00', 0),
(16, 25, 30, 'Innovation Award', 1, 'Gold', 'Malaysian Technology Expo (MTE) ', '2019-03-30', '2019/erpd/award/awd_15722351345db6677e8b3591.12887681.pdf', '2019-10-28 11:58:47', '2019-10-28 12:53:15', '2019-10-28 12:51:02', 28),
(17, 25, 30, 'Innovation Award at Teaching Enhancement and Learning Innovation Carnival 2019 (TeLiC)', 1, 'Gold', 'Universiti Malaysia Kelantan (UMK)', '2019-05-21', '2019/erpd/award/awd_15722388265db675ea43c0a6.74757338.pdf', '2019-10-28 12:01:50', '2019-10-28 13:00:28', '2019-10-28 12:50:27', 28),
(18, 25, 30, 'Innovation Award at Teaching Enhancement and Learning Innovation Carnival 2019 (TeLiC)', 1, 'Gold', 'Universiti Malaysia Kelantan (UMK)', '2019-05-21', '2019/erpd/award/awd_15722353915db6687f2aca12.72107350.pdf', '2019-10-28 12:03:02', '2019-10-28 12:59:44', '2019-10-28 12:50:37', 28),
(19, 25, 30, 'Innovation Award at Teaching Enhancement and Learning Innovation Carnival 2019 (TeLiC)', 1, 'Gold', 'Universiti Malaysia Kelantan (UMK)', '2019-05-21', '2019/erpd/award/awd_15722354555db668bf1fe370.52501403.pdf', '2019-10-28 12:03:50', '2019-10-28 12:58:53', '2019-10-28 12:49:20', 28),
(20, 25, 30, '“GoFire: Nation’s Identity Enhancement Tools for teaching and Learning Activities”  at Teaching Enhancement and Learning Innovation Carnival 2019 (TeLiC)', 1, 'Silver', 'Universiti Malaysia Kelantan (UMK)', '2019-05-21', '2019/erpd/award/awd_15722355485db6691c3270e3.14827861.pdf', '2019-10-28 12:05:40', '2019-10-28 12:56:41', '2019-10-28 12:50:48', 28),
(21, 25, 50, 'Innovation Award ', 2, 'Silver', 'International Carnival on E-Learning in Teaching & Learning (IUCEL)', '2019-09-21', '2019/erpd/award/awd_15722511795db6a62b350126.80155808.pdf', '2019-10-28 12:07:07', '2019-10-28 16:26:22', '2019-10-30 16:06:41', 20),
(22, 25, 20, '“Interactive Learning for Club Course Management”', 2, 'Silver', ' International University Carnival Education and Learning (IUCEL) ', '2018-09-24', '2019/erpd/award/awd_15722358155db66a276c3a02.95275403.pdf', '2019-10-28 12:09:14', '2019-10-28 12:10:18', '0000-00-00 00:00:00', 0),
(23, 25, 30, 'Innovation Award', 1, 'Bronze', 'Malaysia Expo Technology (MTE) ', '2018-06-09', '2019/erpd/award/awd_15722359275db66a97301d52.01582420.pdf', '2019-10-28 12:11:14', '2019-10-28 12:56:06', '2019-10-28 12:52:05', 28),
(24, 25, 20, 'MOOC for Entrepreneurship', 1, 'Bronze', '1st International on Media Literacy for Social Change Conference 2018 (MedLite) ', '2018-10-30', '2019/erpd/award/awd_15722360475db66b0f52ddc9.62787233.pdf', '2019-10-28 12:13:56', '2019-10-28 12:14:10', '0000-00-00 00:00:00', 0),
(25, 25, 20, '2nd Tourism, Hospitality & Wellness Colloquium FHPK 2018, ', 1, 'Gold', 'Universiti Malaysia Kelantan (UMK)', '2018-12-02', '2019/erpd/award/awd_15722361235db66b5bd547b4.70948756.pdf', '2019-10-28 12:14:54', '2019-10-28 12:15:26', '0000-00-00 00:00:00', 0),
(26, 25, 20, 'Best Paper Award', 1, 'Gold', '2nd Tourism, Hospitality & Wellness Colloquium FHPK 2018', '2018-12-02', '2019/erpd/award/awd_15722363205db66c20baf207.01133151.pdf', '2019-10-28 12:18:33', '2019-10-28 12:18:43', '0000-00-00 00:00:00', 0),
(27, 25, 30, 'Poster Presentation', 1, 'Silver', '2nd Tourism, Hospitality & Wellness Colloquium FHPK 2018, ', '2018-12-02', '2019/erpd/award/awd_15722363755db66c57846281.17979877.pdf', '2019-10-28 12:19:24', '2019-10-28 12:57:54', '2019-10-28 12:51:36', 28),
(28, 25, 20, 'Anugerah Gemilang Universiti (AGU) Kategori Pengajaran dan Pembelajaran', 1, 'No Type', 'Universiti Malaysia Kelantan (UMK)', '2018-06-09', '2019/erpd/award/awd_15722364565db66ca8e8d4a1.11040295.pdf', '2019-10-28 12:20:35', '2019-10-28 12:21:00', '0000-00-00 00:00:00', 0),
(29, 25, 20, 'Sijil Kecemerlangan Pingat Perak IUCEL 2018', 1, 'No Type', 'Universiti Malaysia Kelantan (UMK)', '2018-10-13', '2019/erpd/award/awd_15722365105db66cde5c45e1.69330990.pdf', '2019-10-28 12:21:39', '2019-10-28 12:21:53', '0000-00-00 00:00:00', 0),
(30, 25, 20, 'Sijil Kecemerlangan Pingat Gangsa - Malaysia Expo Technology (MTE) 2018', 1, 'No Type', 'Universiti Malaysia Kelantan (UMK)', '2018-10-13', '2019/erpd/award/awd_15722365555db66d0bc0b2e5.11819713.pdf', '2019-10-28 12:22:27', '2019-10-28 12:22:38', '0000-00-00 00:00:00', 0),
(31, 25, 20, 'Sijil Penghargaan Cemerlang', 1, 'No Type', 'Universiti Malaysia Kelantan (UMK)', '2018-10-13', '2019/erpd/award/awd_15722366135db66d45485097.50558222.pdf', '2019-10-28 12:23:18', '2019-10-28 12:23:53', '0000-00-00 00:00:00', 0),
(32, 25, 10, '“Student Engagement through Interactive Learning System”', 1, 'Silver', 'International University Carnival on E-Learning (IUCEL) ', '2017-09-19', '2019/erpd/award/awd_15722367815db66ded93e718.29263128.pdf', '2019-10-28 12:24:47', '2019-10-28 12:26:25', '2019-10-28 12:52:31', 28),
(33, 25, 20, '“Proposing Basic Guideline towards Green Practices of Malaysia Homestay”. ', 2, 'Bronze', 'International Intellectual Exposition (IIEX) 2017', '2017-05-17', '2019/erpd/award/awd_15722368605db66e3cf3f9b0.44752484.pdf', '2019-10-28 12:27:12', '2019-10-28 12:27:43', '0000-00-00 00:00:00', 0),
(34, 41, 20, 'GOLD MEDAL', 2, 'Gold', 'THE 1ST INTERNATIONAL MALAYSIA-INDONESIA-THAILAND SYMPOSIUM ON INNOVATION & CREATIVITY 2017', '2017-07-26', '2019/erpd/award/awd_15723025635db76ee3aa4e23.38915683.pdf', '2019-10-29 06:42:31', '2019-10-29 06:42:45', '0000-00-00 00:00:00', 0),
(35, 41, 20, 'SPECIAL AWARD', 2, '999', 'THE 1ST INTERNATIONAL MALAYSIA-INDONESIA-THAILAND SYMPOSIUM ON INNOVATION & CREATIVITY 2017', '2017-07-26', '2019/erpd/award/awd_15723026415db76f31d0ec11.48408985.pdf', '2019-10-29 06:43:57', '2019-10-29 06:44:03', '0000-00-00 00:00:00', 0),
(36, 41, 20, 'SILVER MEDAL', 1, 'Silver', 'Universiti Malaysia Kelantan (UMK)', '2018-05-16', '2019/erpd/award/awd_15723027655db76fad69a120.20050255.pdf', '2019-10-29 06:46:01', '2019-10-29 06:46:06', '0000-00-00 00:00:00', 0),
(37, 41, 20, 'GOLD MEDAL', 2, 'Gold', 'Asia Innovation Show 2018', '2018-04-27', '2019/erpd/award/awd_15723030055db7709dacd294.17047054.pdf', '2019-10-29 06:49:45', '2019-10-29 06:50:07', '0000-00-00 00:00:00', 0),
(38, 57, 0, 'Innovation Award', 1, 'Gold', 'Universiti Malaysia Kelantan (UMK)', '2019-07-08', '', '2019-11-01 17:49:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(39, 57, 0, 'Innovation Award', 1, 'Gold', 'Universiti Kebangsaan Malaysia', '2019-10-28', '', '2019-11-01 17:49:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(40, 57, 0, 'Innovation Award', 1, 'Gold', 'Universiti Kebangsaan Malaysia', '2019-11-04', '', '2019-11-01 17:50:24', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(41, 57, 0, 'Innovation Award', 1, 'Bronze', 'Universiti Utara Malaysia', '2019-11-25', '', '2019-11-01 17:51:10', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(42, 57, 0, 'Innovation Award', 2, 'Silver', 'Universiti Malaysia Sarawak', '2019-11-24', '', '2019-11-01 17:51:53', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(43, 57, 0, 'Top Up Assistant Program Scholarship ', 2, '999', 'University of Queensland Australia', '2018-02-20', '', '2019-11-01 17:53:18', '2019-11-01 17:53:30', '0000-00-00 00:00:00', 0),
(44, 57, 0, 'Skim Latihan Akademik Bumiputera (SLAB) scholarship ', 2, '999', 'Kementerian Pengajian Tinggi (KPT)', '2015-04-01', '', '2019-11-01 17:54:27', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rp_award`
--
ALTER TABLE `rp_award`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rp_award`
--
ALTER TABLE `rp_award`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
