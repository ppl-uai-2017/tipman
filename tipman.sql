-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2017 at 04:34 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tipman`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `username` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `actor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`username`, `password`, `actor`) VALUES
('ghinarh', 'ghina', 'parents'),
('nasiahur', 'nurasiah', 'parents');

-- --------------------------------------------------------

--
-- Table structure for table `childcare`
--

CREATE TABLE `childcare` (
  `id` int(11) NOT NULL,
  `businessname` varchar(140) NOT NULL,
  `nosertifikasi` varchar(140) NOT NULL,
  `contactfirstname` varchar(140) NOT NULL,
  `contactlastname` varchar(140) NOT NULL,
  `contactphone` varchar(15) NOT NULL,
  `contactemail` varchar(140) NOT NULL,
  `contactwebsite` varchar(140) NOT NULL,
  `companyaddress` varchar(140) NOT NULL,
  `companyregion` varchar(140) NOT NULL,
  `companypostcode` varchar(10) NOT NULL,
  `companydesc` varchar(1000) NOT NULL,
  `foto1` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `childcare`
--

INSERT INTO `childcare` (`id`, `businessname`, `nosertifikasi`, `contactfirstname`, `contactlastname`, `contactphone`, `contactemail`, `contactwebsite`, `companyaddress`, `companyregion`, `companypostcode`, `companydesc`, `foto1`) VALUES
(1, 'LittleBee DayCare', '1', 'Bernadette', '', '021-8298083', 'littlebee.daycare.jakarta@gmail.com', 'http://littlebee-daycare.com', 'Jl. Bromo No.19, RT.4/RW.2', 'Guntur 12980', '', 'LittleBee adalah tempat penitipan anak dengan program belajar melalui aktivitas yang menyenangkan menstimulasi perkembangan dan pertumbuhan anak melalui layanan dari para staff yang penuh kasih sayang.', 'littlebee.jpg'),
(2, 'Lovely Sunshine Daycare', '2', '', '', '021-22536195', 'lovelysunshinedaycare@gmail.com', 'https://www.lovelysunshinedaycare.com/', 'Jalan Danau Poso No.157', 'Bendungan Hilir 10210', '', 'Lovely Sunshine aspires to be a child-centered community of learners where children, their families and educators work in concert with one another. This partnership creates a trusting, nurturing and reciprocally supportive environment where joy, play and learning are celebrated.', 'lovelysunshinedaycare.jpg'),
(3, 'My Tootsie Bear', '3', '', '', '(021) 30029893', 'info@mytootsiebear.com', 'https://mytootsiebear.com/', 'Bellagio Residence, Tower B Ground Floor Unit OG-20, Area Mega Kuningan Barat Kav E4.3', 'Kuningan Timur', '12950', 'We just like other normal women, graduate from our university and then had been blessed with several years opportunity to be a career woman. Married and then having the baby was a miracle for us, but in the other hand created a problem as well. We have been experiencing struggle in finding the best baby sitter, worried and having unsafe feeling if something happened to our baby. Some women are luckier by having option to be a full day mom since their husband is able to manage the family financial burden, but many couple nowadays have to struggle together to finance all family needed. We understood this kind of feeling and come up with the idea to create a child care which will be incorporated with an integrated program appropriate for your little one. This program will prepare your child to be ready for regular school.\r\n', 'mytootsiebear.jpg'),
(4, 'Taman Main Daycare', '4', '', '', '0813 1413 6300', 'info@tamanmain.co.id', 'www.tamanmain.co.id', 'Jl. Wijaya XVI No.23, RT.5/RW.7', 'Melawai', '12160', 'Taman Main tak sekadar menyediakan shelter untuk anak-anak mandi, makan, tidur dan bermain seadanya. Taman main menyediakan layanan pendidikan terbaik bagi setiap anak, dengan pendekatan kepribadian dan fokus pada life skills sesuai dengan milestones (standar tahapan tumbuh kembang).\r\n\r\nAnak-anak adalah generasi harapan bangsa, dan agama yang dinanti, untuk mampu membangun. Untuk itu, mereka harus lah cerdas, kuat, mandiri, kreatif dan taat kepada Allah SWT. Kepekaan, kemandirian dan kecerdasan itu harus dipupuk sejak dini. Tentunya dengan cara yang efektif dan menyenangkan bagi mereka yang masih harus memuaskan diri lewat bermain.', 'tamanmaindaycare.jpg'),
(5, 'TinyToes Childcare Centre', '5', '', '', '021- 5795 1900', 'tinytoesjakarta@gmail.com', 'http://tinytoesindonesia.com/', 'Sampoerna Strategic Square LG-33 Jl. Jendral Sudirman Kav 45', 'Karet Semanggi', '12930', 'Tiny Toes Childcare Centre is a full-service establishment that cares for children from age 3 months to 4 years old. It operates under the philosophy that children need to be treated with warmth and respect.', 'tinytoes.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`first_name`, `last_name`, `email`, `username`) VALUES
('Ghina', 'Resti', 'ghinarh@gmail.com', 'ghinarh');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `idpemesanan` int(11) NOT NULL,
  `idchildcare` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(140) NOT NULL,
  `date` date NOT NULL,
  `starttime` varchar(15) NOT NULL,
  `finishtime` varchar(15) NOT NULL,
  `childincare` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `companyregion` varchar(100) NOT NULL,
  `companypostcode` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`companyregion`, `companypostcode`) VALUES
('Gambir', '10110'),
('Kebon Kelapa', '10120'),
('Petojo Selatan', '10130'),
('Duri Pulo', '10140'),
('Cideng', '10150'),
('Bendungan Hilir', '10210'),
('Karet Tengsin', '10220'),
('Kebon Melati', '10230'),
('Kebon Kacang', '10240'),
('Kampung Bali', '10250'),
('Petamburan', '10260'),
('Gelora', '10270'),
('Menteng', '10310'),
('Pegangsaan', '10320'),
('Cikini', '10330'),
('Kebon Sirih', '10340'),
('Gondangdia', '10350'),
('Senen', '10410'),
('Kwitang', '10420'),
('Kenari', '10430'),
('Paseban', '10440'),
('Kramat', '10450'),
('Bungur', '10460'),
('Cempaka Putih Timur', '10510'),
('Cempaka Putih Barat', '10520'),
('Rawasari', '10570'),
('Galur', '10530'),
('Tanah Tinggi', '10540'),
('Kampung Rawa', '10550'),
('Johar Baru', '10560');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `childcare`
--
ALTER TABLE `childcare`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`idpemesanan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `childcare`
--
ALTER TABLE `childcare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `idpemesanan` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
