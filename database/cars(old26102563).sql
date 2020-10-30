-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2020 at 07:08 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
(4);

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
(4, 'byymm-000002'),
(5, 'byymm-000002');

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
('byymm-000001', 'aa', 'รอนำรถประเมินอะไหล่', 'กำหนดบำรุงรักษาตามรอบ 7 วัน', 'aa', '2', 'aa', 'aa', 'aa', 'aa', 3),
('byymm-000002', 'bb', 'รอนำรถประเมินอะไหล่', 'เปลี่ยนยางล้อหมุน 7 วัน', 'bb', '2', 'bb', 'bb', 'bb', 'bb', 4);

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
  `XDMajKeyTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tdoctmajobdate`
--

INSERT INTO `tdoctmajobdate` (`XVMajDocNo`, `XDMajEstAppPlanDate`, `XDMajEstActualDate`, `XDMajDate`, `XDMajSpareDate`, `XDMaPickupAppPlanDate`, `XDMajRepairAppPlanDate`, `XDMajRepairActualDate`, `XDMajPickupActualDate`, `XDMajFinishDate`, `XDMajConfirmDate`, `XDMajSendTime`, `XDMajKeyTime`) VALUES
('byymm-000001', '2020-10-23 18:37:42', '2020-10-16 16:29:23', '2020-10-01', '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('byymm-000002', '2020-10-22 00:00:00', '2020-10-22 08:03:16', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
(2, 'byymm-000002', 'aaa', 'vvv', 'bbb', ''),
(3, 'byymm-000002', 'aaa', 'vasxc', 'asc', '');

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
  `XDMachinePartsUse` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tdoctmamachine_parts_use`
--

INSERT INTO `tdoctmamachine_parts_use` (`XIMachinePartsSeqNo`, `XIMajdSeqNo`, `XVMajDocNo`, `XVMachinePartsCode`, `XVAmount`, `XVSource`, `XVMachinePartsRmk`, `XDMachinePartsReady`, `XDMachinePartsUse`) VALUES
(1, 1, 'byymm-000001', 4, 15, 'aa', 'aa', '0000-00-00', '2020-10-20'),
(2, 1, 'byymm-000001', 7, 15, 'ฟฟ', 'ฟฟ', '0000-00-00', '2020-10-20');

-- --------------------------------------------------------

--
-- Table structure for table `tdoctmarepair_tnc`
--

CREATE TABLE `tdoctmarepair_tnc` (
  `XVEpyCode` int(5) NOT NULL,
  `XVMajDocNo` varchar(13) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
  MODIFY `Sq` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tdoctmamachine_parts_use`
--
ALTER TABLE `tdoctmamachine_parts_use`
  MODIFY `XIMachinePartsSeqNo` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
