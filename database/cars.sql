-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2020 at 08:19 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cars`
--

-- --------------------------------------------------------

--
-- Table structure for table `sqrun`
--

CREATE TABLE `sqrun` (
  `Sq` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `sqrun`
--

INSERT INTO `sqrun` (`Sq`) VALUES
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19);

-- --------------------------------------------------------

--
-- Table structure for table `tdoctmaestimation_tnc`
--

CREATE TABLE `tdoctmaestimation_tnc` (
  `XVEpyCode` int(5) NOT NULL,
  `XVMajDocNo` varchar(13) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tdoctmaestimation_tnc`
--

INSERT INTO `tdoctmaestimation_tnc` (`XVEpyCode`, `XVMajDocNo`) VALUES
(2, 'byymm-000002'),
(2, 'byymm-000003'),
(2, 'byymm-000004'),
(2, 'byymm-000005'),
(2, 'byymm-000006'),
(2, 'byymm-000007'),
(2, 'byymm-000008'),
(2, 'byymm-000009'),
(2, 'byymm-000010'),
(2, 'byymm-000011'),
(4, 'byymm-000001'),
(4, 'byymm-000002'),
(4, 'byymm-000003'),
(4, 'byymm-000004'),
(4, 'byymm-000008'),
(4, 'byymm-000009'),
(4, 'byymm-000010'),
(4, 'byymm-000011'),
(4, 'byymm-000017'),
(5, 'byymm-000002'),
(5, 'byymm-000003'),
(5, 'byymm-000004'),
(5, 'byymm-000009'),
(5, 'byymm-000010'),
(5, 'byymm-000011'),
(5, 'byymm-000017');

-- --------------------------------------------------------

--
-- Table structure for table `tdoctmajob`
--

CREATE TABLE `tdoctmajob` (
  `XVMajDocNo` varchar(13) COLLATE utf8_bin NOT NULL,
  `XVMajWhoInformant` varchar(100) COLLATE utf8_bin NOT NULL,
  `XVMajStatus` varchar(30) COLLATE utf8_bin NOT NULL,
  `XVMaCarStatus` varchar(200) COLLATE utf8_bin NOT NULL,
  `XVMajFinishRmk` varchar(150) COLLATE utf8_bin NOT NULL,
  `XVMajDocStatus` varchar(1) COLLATE utf8_bin NOT NULL,
  `XVMajNumber` varchar(100) COLLATE utf8_bin NOT NULL,
  `XVMajSub-district` varchar(100) COLLATE utf8_bin NOT NULL,
  `XVMajDistrict` varchar(100) COLLATE utf8_bin NOT NULL,
  `XVMajProvince` varchar(100) COLLATE utf8_bin NOT NULL,
  `XVVehCode` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tdoctmajob`
--

INSERT INTO `tdoctmajob` (`XVMajDocNo`, `XVMajWhoInformant`, `XVMajStatus`, `XVMaCarStatus`, `XVMajFinishRmk`, `XVMajDocStatus`, `XVMajNumber`, `XVMajSub-district`, `XVMajDistrict`, `XVMajProvince`, `XVVehCode`) VALUES
('byymm-000001', 'aa', 'รอนำรถเข้าซ่อม', 'กำหนดบำรุงรักษาตามรอบ 7 วัน', 'aa', '2', 'aa', 'aa', 'aa', 'aa', 3),
('byymm-000002', 'bb', 'รอนำรถเข้าซ่อม', 'เปลี่ยนยางล้อหมุน 7 วัน', 'bb', '2', 'bb', 'bb', 'bb', 'bb', 4),
('byymm-000003', 'ธุรการ', 'รออะไหล่', 'การซ่อมแซมทั่วไป 7 วัน', '', '2', 'ิิbbb', 'bbb', 'bbb', 'bbb', 4),
('byymm-000004', 'ธุรการ', 'รออะไหล่', 'การซ่อมแซมทั่วไป 7 วัน', '', '2', 'ิิbbb', 'bbb', 'bbb', 'bbb', 4),
('byymm-000005', 'ธุรการ', 'รออะไหล่', 'กำหนดบำรุงรักษาตามรอบ 7 วัน', '', '2', 'ิิbbb', 'bbb', 'bbb', 'bbb', 4),
('byymm-000006', 'ธุรการ', 'รออะไหล่', 'กำหนดบำรุงรักษาตามรอบ 7 วัน', '', '2', 'ิิbbb', 'bbb', 'bbb', 'bbb', 4),
('byymm-000007', 'ธุรการ', 'รออะไหล่', 'การซ่อมแซมทั่วไป 7 วัน', '', '2', 'ิิbbb', 'bbb', 'bbb', 'bbb', 4),
('byymm-000008', 'ธุรการ', 'รอช่างรับอะไหล่', 'การซ่อมแซมทั่วไป 7 วัน', '', '2', 'ิิbbb', 'bbb', 'bbb', 'bbb', 4),
('byymm-000009', 'ธุรการ', 'ปิดงาน', 'การซ่อมแซมทั่วไป 7 วัน', 'ดำเนินการซ่อมลุล่วง', '2', 'ิิbbb', 'bbb', 'bbb', 'bbb', 4),
('byymm-000010', 'ธุรการ', 'รออะไหล่', 'กำหนดบำรุงรักษาตามรอบ 7 วัน', '', '2', 'ิิbbb', 'bbb', 'bbb', 'bbb', 4),
('byymm-000011', 'ธุรการ', 'รอช่างรับอะไหล่', 'กำหนดบำรุงรักษาตามรอบ 7 วัน', '', '2', 'ิิbbb', 'bbb', 'bbb', 'bbb', 4),
('byymm-000012', 'ธุรการ', 'แจ้งซ่อม', '', '', '2', 'ิิbbb', 'bbb', 'bbb', 'bbb', 4),
('byymm-000013', 'ธุรการ', 'แจ้งซ่อม', '', '', '2', 'ิิbbb', 'bbb', 'bbb', 'bbb', 4),
('byymm-000014', 'ธุรการ', 'แจ้งซ่อม', '', '', '2', 'ิิbbb', 'bbb', 'bbb', 'bbb', 4),
('byymm-000015', 'ธุรการ', 'แจ้งซ่อม', '', '', '2', 'ิิbbb', 'bbb', 'bbb', 'bbb', 4),
('byymm-000016', 'ธุรการ', 'แจ้งซ่อม', '', '', '2', 'ิิbbb', 'bbb', 'bbb', 'bbb', 4),
('byymm-000017', 'ธุรการ', 'ปิดงาน', 'การซ่อมแซมทั่วไป 7 วัน', 'ดำเนินการซ่อมลุล่วง', '2', 'ิิbbb', 'bbb', 'bbb', 'bbb', 4);

--
-- Triggers `tdoctmajob`
--
DELIMITER $$
CREATE TRIGGER `Auto_DocMajob` BEFORE INSERT ON `tdoctmajob` FOR EACH ROW BEGIN
DECLARE V_ID int(13);
INSERT INTO sqrun VALUES (NULL);
SELECT COUNT(sq) INTO V_ID FROM sqrun;
IF V_ID is NULL THEN
SET new.XVMajDocNo = concat('byymm','-',LPAD('1',6,'0'));
ELSE
SET new.XVMajDocNo = concat('byymm','-',LPAD(V_ID,6,'0'));
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tdoctmajobdate`
--

CREATE TABLE `tdoctmajobdate` (
  `XVMajDocNo` varchar(13) COLLATE utf8_bin NOT NULL,
  `XDMajEstAppPlanDate` datetime NOT NULL,
  `XDMajEstActualDate` datetime NOT NULL,
  `XDMajDate` date NOT NULL,
  `XDMajSpareDate` date NOT NULL,
  `XDMaPickupAppPlanDate` datetime NOT NULL,
  `XDMajRepairAppPlanDate` datetime NOT NULL,
  `XDMajRepairActualDate` datetime NOT NULL,
  `XDMajPickupActualDate` datetime NOT NULL,
  `XDMajFinishDate` datetime NOT NULL,
  `XDMajConfirmDate` datetime NOT NULL,
  `XDMajSendTime` datetime NOT NULL,
  `XDMajKeyTime` datetime NOT NULL,
  `XDMajFinishRepairDate` datetime NOT NULL,
  `XDMajFinishEstDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tdoctmajobdate`
--

INSERT INTO `tdoctmajobdate` (`XVMajDocNo`, `XDMajEstAppPlanDate`, `XDMajEstActualDate`, `XDMajDate`, `XDMajSpareDate`, `XDMaPickupAppPlanDate`, `XDMajRepairAppPlanDate`, `XDMajRepairActualDate`, `XDMajPickupActualDate`, `XDMajFinishDate`, `XDMajConfirmDate`, `XDMajSendTime`, `XDMajKeyTime`, `XDMajFinishRepairDate`, `XDMajFinishEstDate`) VALUES
('byymm-000001', '2020-10-21 15:10:27', '2020-10-16 16:29:23', '2020-10-01', '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2020-10-08 15:09:34', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('byymm-000002', '2020-10-28 15:06:20', '2020-10-22 08:03:16', '2020-10-15', '0000-00-00', '0000-00-00 00:00:00', '2020-10-21 15:13:29', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1970-01-01 08:37:36', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('byymm-000003', '2020-10-31 13:36:49', '2020-11-01 13:37:08', '2020-10-30', '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2020-11-02 07:38:13', '0000-00-00 00:00:00', '2020-10-30 13:36:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('byymm-000004', '2020-10-30 15:20:56', '2020-10-31 15:21:27', '2020-10-30', '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2020-11-01 09:24:35', '0000-00-00 00:00:00', '2020-10-30 15:20:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('byymm-000005', '2020-10-30 15:29:29', '2020-10-30 15:29:38', '2020-10-30', '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2020-10-30 09:30:00', '0000-00-00 00:00:00', '2020-10-30 15:23:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('byymm-000006', '2020-10-30 16:27:40', '2020-10-30 16:27:49', '2020-10-30', '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2020-10-30 10:28:20', '0000-00-00 00:00:00', '2020-10-30 15:29:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('byymm-000007', '2020-10-30 16:26:00', '2020-10-31 16:26:20', '2020-10-30', '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2020-10-30 10:27:03', '0000-00-00 00:00:00', '2020-10-30 16:25:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('byymm-000008', '2020-10-30 18:22:38', '2020-10-31 18:22:49', '2020-10-30', '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2020-10-30 12:23:27', '0000-00-00 00:00:00', '2020-10-30 18:22:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('byymm-000009', '2020-11-05 11:16:25', '2020-11-06 11:16:52', '2020-10-31', '2020-11-08', '2020-11-20 12:27:28', '2020-11-07 20:36:29', '2020-11-08 12:10:18', '2020-11-02 13:32:44', '2020-11-02 13:32:44', '2020-11-07 05:19:20', '0000-00-00 00:00:00', '2020-10-31 11:15:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('byymm-000010', '2020-10-31 11:40:43', '2020-10-31 11:40:57', '2020-10-31', '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2020-10-31 05:42:01', '0000-00-00 00:00:00', '2020-10-31 11:40:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('byymm-000011', '2020-10-31 20:59:21', '2020-10-31 20:59:38', '2020-10-31', '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2020-10-31 03:00:27', '0000-00-00 00:00:00', '2020-10-31 20:59:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('byymm-000012', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2020-11-02', '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2020-11-02 13:39:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('byymm-000013', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2020-11-02', '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2020-11-02 13:42:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('byymm-000014', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2020-11-02', '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2020-11-02 13:51:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('byymm-000015', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2020-11-02', '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2020-11-02 14:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('byymm-000016', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2020-11-02', '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2020-11-02 14:01:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('byymm-000017', '2020-11-03 14:15:51', '2020-11-04 14:16:14', '2020-11-02', '2020-11-06', '2020-11-09 14:21:17', '2020-11-07 14:18:15', '2020-11-08 14:20:30', '2020-11-10 14:21:29', '2020-11-10 14:21:29', '2020-11-05 08:17:22', '0000-00-00 00:00:00', '2020-11-02 14:15:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tdoctmajobdetail`
--

CREATE TABLE `tdoctmajobdetail` (
  `XIMajdSeqNo` int(3) NOT NULL,
  `XVMajDocNo` varchar(13) COLLATE utf8_bin NOT NULL,
  `XVMajdSubject` varchar(150) COLLATE utf8_bin NOT NULL,
  `XVMajdCause` varchar(150) COLLATE utf8_bin NOT NULL,
  `XVMajConfirm` varchar(50) COLLATE utf8_bin NOT NULL,
  `XVPicturePath` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tdoctmajobdetail`
--

INSERT INTO `tdoctmajobdetail` (`XIMajdSeqNo`, `XVMajDocNo`, `XVMajdSubject`, `XVMajdCause`, `XVMajConfirm`, `XVPicturePath`) VALUES
(1, 'byymm-000001', 'aa', 'aa', 'aa', ''),
(1, 'byymm-000003', 'ไฟท้ายไม่ติด', 'หลอดขาด', 'confirm', ''),
(1, 'byymm-000004', 'ไฟท้ายไม่ติด', 'หลอดขาด', 'confirm', ''),
(1, 'byymm-000005', 'a', '1', 'confirm', 'byymm-000005/1/'),
(1, 'byymm-000006', 'ไฟเลี้ยวซ้ายไม่ติด', 'หลอดขาด', 'confirm', 'byymm-000006/1/'),
(1, 'byymm-000007', 'a', 'a', 'confirm', 'byymm-000007/1/'),
(1, 'byymm-000008', 'ไฟท้ายไม่ติด', 'หลอดขาด', 'confirm', 'byymm-000008/1/'),
(1, 'byymm-000009', 'ไฟท้ายไม่ติด', 'หลอดขาด', 'confirm', 'byymm-000009/1/'),
(1, 'byymm-000010', 'ไฟท้ายไม่ติด', 'หลอดขาด', '', 'byymm-000010/1/'),
(1, 'byymm-000011', 'ไฟท้ายไม่ติด', 'หลอดขาด', 'confirm', 'byymm-000011/1/'),
(1, 'byymm-000012', 'ไฟท้ายไม่ติด', 'หลอดขาด', '', ''),
(1, 'byymm-000013', 'ไฟท้ายไม่ติด', 'หลอดขาด', '', ''),
(1, 'byymm-000014', 'ไฟท้ายไม่ติด', 'หลอดขาด', '', ''),
(1, 'byymm-000015', 'ไฟท้ายไม่ติด', 'หลอดขาด', '', ''),
(1, 'byymm-000016', 'ไฟท้ายไม่ติด', 'หลอดขาด', '', ''),
(1, 'byymm-000017', 'ไฟท้ายไม่ติด', 'หลอดขาด', 'confirm', 'byymm-000017/1/'),
(2, 'byymm-000002', 'aaa', 'vvv', 'bbb', ''),
(2, 'byymm-000003', 'ไฟเลี้ยวซ้ายไม่ติด', 'หลอดขาด', 'confirm', 'byymm-000003/2/'),
(2, 'byymm-000004', 'ไฟท้ายไม่ติด', 'หลอดขาด', 'confirm', 'byymm-000004/2/'),
(2, 'byymm-000006', 'ไฟท้ายไม่ติด', 'หลอดขาด', 'confirm', 'byymm-000006/2/'),
(2, 'byymm-000007', 'a', 'a', 'confirm', 'byymm-000007/2/'),
(2, 'byymm-000008', 'ไฟเลี้ยวซ้ายไม่ติด', 'หลอดขาด', '', 'byymm-000008/2/'),
(2, 'byymm-000009', 'ไฟเลี้ยวซ้ายไม่ติด', 'หลอดขาด', 'confirm', 'byymm-000009/2/'),
(2, 'byymm-000010', 'ไฟเลี้ยวซ้ายไม่ติด', 'หลอดขาด', '', 'byymm-000010/2/'),
(2, 'byymm-000011', 'ไฟเลี้ยวซ้ายไม่ติด', 'หลอดขาด', 'confirm', 'byymm-000011/2/'),
(2, 'byymm-000016', 'ไฟเลี้ยวซ้ายไม่ติด', 'หลอดขาด', '', ''),
(2, 'byymm-000017', 'ไฟเลี้ยวซ้ายไม่ติด', 'หลอดขาด', '', 'byymm-000017/2/'),
(3, 'byymm-000002', 'aaa', 'vasxc', 'asc', ''),
(3, 'byymm-000009', 'เบรคไม่ติด', 'ผ้าเบรคหมด', 'confirm', 'byymm-000009/3/'),
(3, 'byymm-000010', 'ไฟเลี้ยวซ้ายไม่ติด', 'หลอดขาด', '', 'byymm-000010/3/'),
(3, 'byymm-000011', 'เบรคไม่ติด', 'ผ้าเบรคหมด', '', 'byymm-000011/3/'),
(3, 'byymm-000016', 'ไฟเลี้ยวซ้ายไม่ติด', 'หลอดขาด', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tdoctmamachine_parts_use`
--

CREATE TABLE `tdoctmamachine_parts_use` (
  `XIMachinePartsSeqNo` int(3) NOT NULL,
  `XIMajdSeqNo` int(3) NOT NULL,
  `XVMajDocNo` varchar(13) COLLATE utf8_bin NOT NULL,
  `XVMachinePartsCode` int(35) NOT NULL,
  `XVAmount` int(3) NOT NULL,
  `XVSource` varchar(100) COLLATE utf8_bin NOT NULL,
  `XVMachinePartsRmk` varchar(100) COLLATE utf8_bin NOT NULL,
  `XDMachinePartsReady` date NOT NULL,
  `XDMachinePartsUse` date NOT NULL,
  `XVPartsReady` int(1) NOT NULL,
  `XVNumOfDays` int(2) NOT NULL,
  `XVPickupParts` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tdoctmamachine_parts_use`
--

INSERT INTO `tdoctmamachine_parts_use` (`XIMachinePartsSeqNo`, `XIMajdSeqNo`, `XVMajDocNo`, `XVMachinePartsCode`, `XVAmount`, `XVSource`, `XVMachinePartsRmk`, `XDMachinePartsReady`, `XDMachinePartsUse`, `XVPartsReady`, `XVNumOfDays`, `XVPickupParts`) VALUES
(2, 2, 'byymm-000002', 7, 15, 'ฟฟ', 'ฟฟ', '0000-00-00', '2020-10-20', 0, 0, 0),
(3, 3, 'byymm-000002', 4, 15, 'aaaa', 'aaaa', '2020-10-08', '2020-10-08', 0, 0, 0),
(4, 1, 'byymm-000001', 4, 15, '', '', '0000-00-00', '0000-00-00', 0, 0, 0),
(5, 1, 'byymm-000001', 3, 1, '', '', '0000-00-00', '0000-00-00', 0, 0, 0),
(6, 1, 'byymm-000001', 6, 1, '', '', '0000-00-00', '0000-00-00', 0, 0, 0),
(7, 1, 'byymm-000003', 3, 1, 'สั่งซื้อ', '', '2020-11-01', '2020-10-30', 1, 2, 1),
(8, 1, 'byymm-000003', 4, 1, 'สั่งซื้อ', '', '2020-11-01', '2020-10-30', 1, 2, 1),
(9, 2, 'byymm-000003', 5, 1, 'สั่งซื้อ', '', '2020-11-01', '2020-10-30', 1, 2, 1),
(10, 1, 'byymm-000004', 3, 1, 'คลัง', '', '0000-00-00', '2020-10-30', 0, 0, 1),
(11, 2, 'byymm-000004', 3, 1, 'คลัง', '', '0000-00-00', '2020-10-30', 0, 0, 1),
(12, 1, 'byymm-000005', 3, 1, 'สั่งซื้อ', '', '2020-10-30', '2020-10-30', 0, 5, 1),
(13, 1, 'byymm-000007', 3, 1, 'คลัง', '', '0000-00-00', '2020-10-30', 1, 0, 1),
(14, 2, 'byymm-000007', 3, 1, 'คลัง', '', '2020-10-31', '2020-10-30', 1, 1, 1),
(15, 1, 'byymm-000006', 3, 1, '', '', '0000-00-00', '0000-00-00', 0, 0, 0),
(16, 2, 'byymm-000006', 3, 1, '', '', '0000-00-00', '0000-00-00', 0, 0, 0),
(17, 1, 'byymm-000008', 3, 1, 'คลัง', '', '2020-10-30', '2020-10-23', 1, 0, 1),
(18, 2, 'byymm-000008', 3, 1, '', '', '0000-00-00', '0000-00-00', 0, 0, 0),
(19, 1, 'byymm-000009', 3, 2, 'คลัง', '', '0000-00-00', '1970-01-01', 1, 0, 1),
(20, 1, 'byymm-000009', 4, 2, 'สั่งซื้อ', '', '2020-11-05', '1970-01-01', 1, 5, 1),
(21, 2, 'byymm-000009', 3, 1, 'สั่งซื้อ', '', '2020-11-05', '1970-01-01', 1, 5, 1),
(22, 2, 'byymm-000009', 4, 1, 'สั่งซื้อ', '', '2020-11-05', '1970-01-01', 1, 5, 1),
(23, 2, 'byymm-000009', 5, 1, 'สั่งซื้อ', '', '2020-11-06', '1970-01-01', 1, 6, 1),
(24, 3, 'byymm-000009', 3, 1, 'คลัง', '', '0000-00-00', '1970-01-01', 1, 0, 1),
(25, 3, 'byymm-000009', 4, 1, 'คลัง', '', '0000-00-00', '1970-01-01', 1, 0, 1),
(26, 3, 'byymm-000009', 5, 1, 'คลัง', '', '0000-00-00', '2020-10-31', 1, 0, 1),
(27, 1, 'byymm-000010', 3, 1, '', '', '0000-00-00', '0000-00-00', 0, 0, 0),
(28, 1, 'byymm-000010', 4, 1, '', '', '0000-00-00', '0000-00-00', 0, 0, 0),
(29, 1, 'byymm-000010', 5, 1, '', '', '0000-00-00', '0000-00-00', 0, 0, 0),
(30, 2, 'byymm-000010', 3, 1, '', '', '0000-00-00', '0000-00-00', 0, 0, 0),
(31, 2, 'byymm-000010', 4, 1, '', '', '0000-00-00', '0000-00-00', 0, 0, 0),
(32, 2, 'byymm-000010', 5, 1, '', '', '0000-00-00', '0000-00-00', 0, 0, 0),
(33, 3, 'byymm-000010', 3, 1, '', '', '0000-00-00', '0000-00-00', 0, 0, 0),
(34, 3, 'byymm-000010', 4, 1, '', '', '0000-00-00', '0000-00-00', 0, 0, 0),
(35, 3, 'byymm-000010', 5, 1, '', '', '0000-00-00', '0000-00-00', 0, 0, 0),
(36, 1, 'byymm-000011', 3, 1, '', '', '0000-00-00', '1970-01-01', 0, 0, 1),
(37, 1, 'byymm-000011', 4, 1, '', '', '0000-00-00', '1970-01-01', 0, 0, 1),
(38, 1, 'byymm-000011', 5, 1, '', '', '0000-00-00', '2020-10-31', 0, 0, 1),
(39, 2, 'byymm-000011', 3, 1, '', '', '0000-00-00', '1970-01-01', 0, 0, 1),
(40, 2, 'byymm-000011', 4, 1, '', '', '0000-00-00', '1970-01-01', 0, 0, 1),
(41, 3, 'byymm-000011', 3, 1, '', '', '0000-00-00', '0000-00-00', 0, 0, 0),
(42, 3, 'byymm-000011', 4, 1, '', '', '0000-00-00', '0000-00-00', 0, 0, 0),
(43, 3, 'byymm-000011', 5, 1, '', '', '0000-00-00', '0000-00-00', 0, 0, 0),
(44, 3, 'byymm-000011', 6, 1, '', '', '0000-00-00', '0000-00-00', 0, 0, 0),
(45, 3, 'byymm-000011', 7, 1, '', '', '0000-00-00', '0000-00-00', 0, 0, 0),
(46, 1, 'byymm-000017', 3, 1, 'คลัง', '', '0000-00-00', '2020-11-06', 1, 0, 1),
(47, 2, 'byymm-000017', 4, 1, '', '', '0000-00-00', '0000-00-00', 0, 0, 0);

--
-- Triggers `tdoctmamachine_parts_use`
--
DELIMITER $$
CREATE TRIGGER `check` AFTER UPDATE ON `tdoctmamachine_parts_use` FOR EACH ROW BEGIN
DECLARE num_b int(5);
DECLARE check_b int(5);

SELECT COUNT(*) into num_b FROM tdoctmajobdetail td,tdoctmamachine_parts_use tu WHERE td.XIMajdSeqNo = tu.XIMajdSeqNo AND td.XVMajDocNo = tu.XVMajDocNo AND td.XVMajConfirm = 'confirm' AND tu.XVMajDocNo = new.XVMajDocNo;

SELECT COUNT(*) l into check_b FROM tdoctmajobdetail td,tdoctmamachine_parts_use tu WHERE td.XIMajdSeqNo = tu.XIMajdSeqNo AND td.XVMajDocNo = tu.XVMajDocNo AND td.XVMajConfirm = 'confirm' AND tu.XVMajDocNo = new.XVMajDocNo AND XVPickupParts = 1;

IF (num_b = check_b) THEN
UPDATE tdoctmajob SET XVMajStatus = "รอช่างรับอะไหล่" WHERE XVMajDocNo = new.XVMajDocNo;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tdoctmarepair_tnc`
--

CREATE TABLE `tdoctmarepair_tnc` (
  `XVEpyCode` int(5) NOT NULL,
  `XVMajDocNo` varchar(13) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tdoctmarepair_tnc`
--

INSERT INTO `tdoctmarepair_tnc` (`XVEpyCode`, `XVMajDocNo`) VALUES
(4, 'byymm-000009'),
(4, 'byymm-000017'),
(5, 'byymm-000009'),
(5, 'byymm-000017');

-- --------------------------------------------------------

--
-- Table structure for table `tmstmdepartment`
--

CREATE TABLE `tmstmdepartment` (
  `XVDptCode` int(5) NOT NULL,
  `XVDptNumber` varchar(100) COLLATE utf8_bin NOT NULL,
  `XVDptSub-district` varchar(100) COLLATE utf8_bin NOT NULL,
  `XVDptDistrict` varchar(100) COLLATE utf8_bin NOT NULL,
  `XVDptProvince` varchar(100) COLLATE utf8_bin NOT NULL,
  `XVDptname` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tmstmdepartment`
--

INSERT INTO `tmstmdepartment` (`XVDptCode`, `XVDptNumber`, `XVDptSub-district`, `XVDptDistrict`, `XVDptProvince`, `XVDptname`) VALUES
(2, 'aaa', 'aaa', 'aaa', 'aaa', 'aaa'),
(3, 'ิิbbb', 'bbb', 'bbb', 'bbb', 'bbb');

-- --------------------------------------------------------

--
-- Table structure for table `tmstmmachine_parts`
--

CREATE TABLE `tmstmmachine_parts` (
  `XVMachinePartsCode` int(5) NOT NULL,
  `XVMachinePartsName` varchar(100) COLLATE utf8_bin NOT NULL,
  `XVMachinePartsTypeCode` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tmstmmachine_parts`
--

INSERT INTO `tmstmmachine_parts` (`XVMachinePartsCode`, `XVMachinePartsName`, `XVMachinePartsTypeCode`) VALUES
(3, 'แบตเตอรี่ 40v', 2),
(4, 'ผ้าลินิน116', 1),
(5, 'แบตเตอรี่ 15v', 1),
(6, 'aaaa', 1),
(7, 'aaaaa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tmstmmachine_parts_type`
--

CREATE TABLE `tmstmmachine_parts_type` (
  `XVMachinePartsTypeCode` int(5) NOT NULL,
  `XVMachinePartsTypeName` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tmstmmachine_parts_type`
--

INSERT INTO `tmstmmachine_parts_type` (`XVMachinePartsTypeCode`, `XVMachinePartsTypeName`) VALUES
(1, 'ผ้าเบรค1'),
(2, 'แบตเตอรี่');

-- --------------------------------------------------------

--
-- Table structure for table `tmstmtemployee`
--

CREATE TABLE `tmstmtemployee` (
  `XVEpyCode` int(5) NOT NULL,
  `XVEpyFirstname` varchar(100) COLLATE utf8_bin NOT NULL,
  `XVpyLastname` varchar(100) COLLATE utf8_bin NOT NULL,
  `XVIdCardNumber` bigint(13) NOT NULL,
  `XVEpyJobPosition` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tmstmtemployee`
--

INSERT INTO `tmstmtemployee` (`XVEpyCode`, `XVEpyFirstname`, `XVpyLastname`, `XVIdCardNumber`, `XVEpyJobPosition`) VALUES
(2, 'jinawadee', 'jinawadee', 2147483647, 'ช่าง'),
(4, 'naratip', 'naratip', 1730201338337, 'ช่าง'),
(5, 'plus', 'plus', 1730201338339, 'ช่าง');

-- --------------------------------------------------------

--
-- Table structure for table `tmstmvehicletype`
--

CREATE TABLE `tmstmvehicletype` (
  `XVVehTypeCode` int(5) NOT NULL,
  `XVVehTypeName` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tmstmvehicletype`
--

INSERT INTO `tmstmvehicletype` (`XVVehTypeCode`, `XVVehTypeName`) VALUES
(4, 'ไอน้ำ'),
(3, 'ไอฝุ่น');

-- --------------------------------------------------------

--
-- Table structure for table `tmstvehicle`
--

CREATE TABLE `tmstvehicle` (
  `XVVehCode` int(5) NOT NULL,
  `XVVehName` varchar(50) COLLATE utf8_bin NOT NULL,
  `XVVehRegistration` varchar(50) COLLATE utf8_bin NOT NULL,
  `XVVehNumber` varchar(50) COLLATE utf8_bin NOT NULL,
  `XVVehMango` varchar(50) COLLATE utf8_bin NOT NULL,
  `XVVehBrand` varchar(50) COLLATE utf8_bin NOT NULL,
  `XVVehModel` varchar(50) COLLATE utf8_bin NOT NULL,
  `XVVehChassisNumber` varchar(50) COLLATE utf8_bin NOT NULL,
  `XVVehEngineNumber` varchar(50) COLLATE utf8_bin NOT NULL,
  `XVVehTypeCode` int(5) DEFAULT NULL,
  `XVDptCode` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tmstvehicle`
--

INSERT INTO `tmstvehicle` (`XVVehCode`, `XVVehName`, `XVVehRegistration`, `XVVehNumber`, `XVVehMango`, `XVVehBrand`, `XVVehModel`, `XVVehChassisNumber`, `XVVehEngineNumber`, `XVVehTypeCode`, `XVDptCode`) VALUES
(3, 'a', 'aa', 'aaa', 'aaa', 'aa', 'aa', 'aa', 'aa', 4, 2),
(4, 'bb', 'bb', 'ab', 'ab', 'ab', 'ab', 'ab', 'ab', 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tsysuser`
--

CREATE TABLE `tsysuser` (
  `XVEpyCode` int(5) NOT NULL,
  `XVUsrName` varchar(50) COLLATE utf8_bin NOT NULL,
  `XVUsrPwd` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sqrun`
--
ALTER TABLE `sqrun`
  ADD PRIMARY KEY (`Sq`);

--
-- Indexes for table `tdoctmaestimation_tnc`
--
ALTER TABLE `tdoctmaestimation_tnc`
  ADD PRIMARY KEY (`XVEpyCode`,`XVMajDocNo`),
  ADD KEY `FK_DocTMaJob_EstTnc` (`XVMajDocNo`);

--
-- Indexes for table `tdoctmajob`
--
ALTER TABLE `tdoctmajob`
  ADD PRIMARY KEY (`XVMajDocNo`),
  ADD KEY `FK_DocTMaJob_stVehicle` (`XVVehCode`);

--
-- Indexes for table `tdoctmajobdate`
--
ALTER TABLE `tdoctmajobdate`
  ADD PRIMARY KEY (`XVMajDocNo`);

--
-- Indexes for table `tdoctmajobdetail`
--
ALTER TABLE `tdoctmajobdetail`
  ADD PRIMARY KEY (`XIMajdSeqNo`,`XVMajDocNo`),
  ADD KEY `FK_MaJobDetail_DocMaJob` (`XVMajDocNo`);

--
-- Indexes for table `tdoctmamachine_parts_use`
--
ALTER TABLE `tdoctmamachine_parts_use`
  ADD PRIMARY KEY (`XIMachinePartsSeqNo`,`XVMajDocNo`,`XIMajdSeqNo`),
  ADD KEY `FK_MachinepartsUse2_MaJobDetail2` (`XIMajdSeqNo`),
  ADD KEY `FK_MachinepartsUse_Machineparts` (`XVMachinePartsCode`),
  ADD KEY `FK_MachinepartsUse_MaJobDetail` (`XVMajDocNo`);

--
-- Indexes for table `tdoctmarepair_tnc`
--
ALTER TABLE `tdoctmarepair_tnc`
  ADD PRIMARY KEY (`XVEpyCode`,`XVMajDocNo`),
  ADD KEY `FK_RepairTnc_DocMaJob` (`XVMajDocNo`);

--
-- Indexes for table `tmstmdepartment`
--
ALTER TABLE `tmstmdepartment`
  ADD PRIMARY KEY (`XVDptCode`);

--
-- Indexes for table `tmstmmachine_parts`
--
ALTER TABLE `tmstmmachine_parts`
  ADD PRIMARY KEY (`XVMachinePartsCode`),
  ADD UNIQUE KEY `XVMachinePartsName_UQ` (`XVMachinePartsName`),
  ADD KEY `FK_Machinepartstype_Machineparts` (`XVMachinePartsTypeCode`);

--
-- Indexes for table `tmstmmachine_parts_type`
--
ALTER TABLE `tmstmmachine_parts_type`
  ADD PRIMARY KEY (`XVMachinePartsTypeCode`);

--
-- Indexes for table `tmstmtemployee`
--
ALTER TABLE `tmstmtemployee`
  ADD PRIMARY KEY (`XVEpyCode`),
  ADD UNIQUE KEY `XVIdCardNumber_UQ` (`XVIdCardNumber`);

--
-- Indexes for table `tmstmvehicletype`
--
ALTER TABLE `tmstmvehicletype`
  ADD PRIMARY KEY (`XVVehTypeCode`),
  ADD UNIQUE KEY `XVVehTypeName_UQ` (`XVVehTypeName`);

--
-- Indexes for table `tmstvehicle`
--
ALTER TABLE `tmstvehicle`
  ADD PRIMARY KEY (`XVVehCode`),
  ADD UNIQUE KEY `XVVehRegistration_UQ` (`XVVehRegistration`),
  ADD UNIQUE KEY `XVVehNumber_UQ` (`XVVehNumber`),
  ADD UNIQUE KEY `XVVehMango_UQ` (`XVVehMango`),
  ADD UNIQUE KEY `XVVehChassisNumber_UQ` (`XVVehChassisNumber`),
  ADD UNIQUE KEY `XVVehEngineNumber_UQ` (`XVVehEngineNumber`),
  ADD KEY `FK_tmstvehicle_tmstvehicletype` (`XVVehTypeCode`),
  ADD KEY `FK_TMstVehicle_stMDepartment` (`XVDptCode`);

--
-- Indexes for table `tsysuser`
--
ALTER TABLE `tsysuser`
  ADD PRIMARY KEY (`XVEpyCode`),
  ADD UNIQUE KEY `XVUsrName_UQ` (`XVUsrName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sqrun`
--
ALTER TABLE `sqrun`
  MODIFY `Sq` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tdoctmamachine_parts_use`
--
ALTER TABLE `tdoctmamachine_parts_use`
  MODIFY `XIMachinePartsSeqNo` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tmstmdepartment`
--
ALTER TABLE `tmstmdepartment`
  MODIFY `XVDptCode` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tmstmmachine_parts`
--
ALTER TABLE `tmstmmachine_parts`
  MODIFY `XVMachinePartsCode` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tmstmmachine_parts_type`
--
ALTER TABLE `tmstmmachine_parts_type`
  MODIFY `XVMachinePartsTypeCode` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tmstmtemployee`
--
ALTER TABLE `tmstmtemployee`
  MODIFY `XVEpyCode` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tmstmvehicletype`
--
ALTER TABLE `tmstmvehicletype`
  MODIFY `XVVehTypeCode` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tmstvehicle`
--
ALTER TABLE `tmstvehicle`
  MODIFY `XVVehCode` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tdoctmaestimation_tnc`
--
ALTER TABLE `tdoctmaestimation_tnc`
  ADD CONSTRAINT `FK_DocTMaJob_EstTnc` FOREIGN KEY (`XVMajDocNo`) REFERENCES `tdoctmajob` (`XVMajDocNo`),
  ADD CONSTRAINT `FK_employee_EstTnc` FOREIGN KEY (`XVEpyCode`) REFERENCES `tmstmtemployee` (`XVEpyCode`);

--
-- Constraints for table `tdoctmajob`
--
ALTER TABLE `tdoctmajob`
  ADD CONSTRAINT `FK_DocTMaJob_stVehicle` FOREIGN KEY (`XVVehCode`) REFERENCES `tmstvehicle` (`XVVehCode`);

--
-- Constraints for table `tdoctmajobdate`
--
ALTER TABLE `tdoctmajobdate`
  ADD CONSTRAINT `FK_MaJobDate_DocMaJob` FOREIGN KEY (`XVMajDocNo`) REFERENCES `tdoctmajob` (`XVMajDocNo`);

--
-- Constraints for table `tdoctmajobdetail`
--
ALTER TABLE `tdoctmajobdetail`
  ADD CONSTRAINT `FK_MaJobDetail_DocMaJob` FOREIGN KEY (`XVMajDocNo`) REFERENCES `tdoctmajob` (`XVMajDocNo`);

--
-- Constraints for table `tdoctmamachine_parts_use`
--
ALTER TABLE `tdoctmamachine_parts_use`
  ADD CONSTRAINT `FK_MachinepartsUse2_MaJobDetail2` FOREIGN KEY (`XIMajdSeqNo`) REFERENCES `tdoctmajobdetail` (`XIMajdSeqNo`),
  ADD CONSTRAINT `FK_MachinepartsUse_MaJobDetail` FOREIGN KEY (`XVMajDocNo`) REFERENCES `tdoctmajobdetail` (`XVMajDocNo`),
  ADD CONSTRAINT `FK_MachinepartsUse_Machineparts` FOREIGN KEY (`XVMachinePartsCode`) REFERENCES `tmstmmachine_parts` (`XVMachinePartsCode`);

--
-- Constraints for table `tdoctmarepair_tnc`
--
ALTER TABLE `tdoctmarepair_tnc`
  ADD CONSTRAINT `FK_RepairTnc_DocMaJob` FOREIGN KEY (`XVMajDocNo`) REFERENCES `tdoctmajob` (`XVMajDocNo`),
  ADD CONSTRAINT `FK_RepairTnc_employee` FOREIGN KEY (`XVEpyCode`) REFERENCES `tmstmtemployee` (`XVEpyCode`);

--
-- Constraints for table `tmstmmachine_parts`
--
ALTER TABLE `tmstmmachine_parts`
  ADD CONSTRAINT `FK_Machinepartstype_Machineparts` FOREIGN KEY (`XVMachinePartsTypeCode`) REFERENCES `tmstmmachine_parts_type` (`XVMachinePartsTypeCode`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tmstvehicle`
--
ALTER TABLE `tmstvehicle`
  ADD CONSTRAINT `FK_TMstVehicle_stMDepartment` FOREIGN KEY (`XVDptCode`) REFERENCES `tmstmdepartment` (`XVDptCode`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tmstvehicle_tmstvehicletype` FOREIGN KEY (`XVVehTypeCode`) REFERENCES `tmstmvehicletype` (`XVVehTypeCode`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tsysuser`
--
ALTER TABLE `tsysuser`
  ADD CONSTRAINT `FK_employee_user` FOREIGN KEY (`XVEpyCode`) REFERENCES `tmstmtemployee` (`XVEpyCode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
