-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2020 at 11:01 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `tdoctmaestimation_tnc`
--

CREATE TABLE `tdoctmaestimation_tnc` (
  `XVEpyCode` int(5) NOT NULL,
  `XVMajDocNo` varchar(13) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
  `XVVehCode` int(5) NOT NULL,
  `XVDptCode` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
  `XDMajConfirmDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `tdoctmajobdetail`
--

CREATE TABLE `tdoctmajobdetail` (
  `XIMajdSeqNo` int(3) NOT NULL,
  `XVMajDocNo` varchar(13) COLLATE utf8_bin NOT NULL,
  `XVMajdSubject` varchar(150) COLLATE utf8_bin NOT NULL,
  `XVMajdCause` varchar(150) COLLATE utf8_bin NOT NULL,
  `XVMajConfirm` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `tdoctmamachine_parts_use`
--

CREATE TABLE `tdoctmamachine_parts_use` (
  `XVMajDocNo` varchar(13) COLLATE utf8_bin NOT NULL,
  `XIMajdSeqNo` int(3) NOT NULL,
  `XVMachinePartsCode` int(35) NOT NULL,
  `XVAmount` int(3) NOT NULL,
  `XVSource` int(100) NOT NULL,
  `XVMachinePartsRmk` int(100) NOT NULL,
  `XDMachinePartsReady` date NOT NULL,
  `XDMachinePartsUse` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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

-- --------------------------------------------------------

--
-- Table structure for table `tmstmmachine_parts`
--

CREATE TABLE `tmstmmachine_parts` (
  `XVMachinePartsCode` int(5) NOT NULL,
  `XVMachinePartsName` varchar(100) COLLATE utf8_bin NOT NULL,
  `XVMachinePartsTypeCode` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `tmstmmachine_parts_type`
--

CREATE TABLE `tmstmmachine_parts_type` (
  `XVMachinePartsTypeCode` int(5) NOT NULL,
  `XVMachinePartsTypeName` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `tmstmtemployee`
--

CREATE TABLE `tmstmtemployee` (
  `XVEpyCode` int(5) NOT NULL,
  `XVEpyFirstname` varchar(100) COLLATE utf8_bin NOT NULL,
  `XVpyLastname` varchar(100) COLLATE utf8_bin NOT NULL,
  `XVIdCardNumber` int(13) NOT NULL,
  `XVEpyJobPosition` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
(2, 'กระบะตอนเดียว'),
(3, 'กระบะตอนครึ่ง'),
(4, 'รถเก๋ง');

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
  `XVVehTypeCode` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tmstvehicle`
--

INSERT INTO `tmstvehicle` (`XVVehCode`, `XVVehName`, `XVVehRegistration`, `XVVehNumber`, `XVVehMango`, `XVVehBrand`, `XVVehModel`, `XVVehChassisNumber`, `XVVehEngineNumber`, `XVVehTypeCode`) VALUES
(2, 'รถกระบะ', 'บล-8953', 'CT04', 'บล-8953', 'TOYOTA', 'TGN16R-TRMDKT A8', 'MR0CX12G900108711', '2TR-7581404', 2),
(3, 'รถเก๋ง สีดำเงา', 'กน-2168รบ', 'CT42', 'MR2BT9F3X01181813', 'TOYOTA', 'VIOS', 'MR2BT9F3X01181813', '1NZZ216809', 4);

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
  ADD KEY `FK_DocMaJob_stMDepartment` (`XVDptCode`),
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
  ADD PRIMARY KEY (`XVMajDocNo`,`XIMajdSeqNo`),
  ADD KEY `FK_MachinepartsUse2_MaJobDetail2` (`XIMajdSeqNo`),
  ADD KEY `FK_MachinepartsUse_Machineparts` (`XVMachinePartsCode`);

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
  ADD PRIMARY KEY (`XVEpyCode`);

--
-- Indexes for table `tmstmvehicletype`
--
ALTER TABLE `tmstmvehicletype`
  ADD PRIMARY KEY (`XVVehTypeCode`);

--
-- Indexes for table `tmstvehicle`
--
ALTER TABLE `tmstvehicle`
  ADD PRIMARY KEY (`XVVehCode`),
  ADD KEY `FK_Vehicle_VehicleType` (`XVVehTypeCode`);

--
-- Indexes for table `tsysuser`
--
ALTER TABLE `tsysuser`
  ADD PRIMARY KEY (`XVEpyCode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sqrun`
--
ALTER TABLE `sqrun`
  MODIFY `Sq` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tmstmdepartment`
--
ALTER TABLE `tmstmdepartment`
  MODIFY `XVDptCode` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tmstmmachine_parts`
--
ALTER TABLE `tmstmmachine_parts`
  MODIFY `XVMachinePartsCode` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tmstmmachine_parts_type`
--
ALTER TABLE `tmstmmachine_parts_type`
  MODIFY `XVMachinePartsTypeCode` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tmstmtemployee`
--
ALTER TABLE `tmstmtemployee`
  MODIFY `XVEpyCode` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tmstmvehicletype`
--
ALTER TABLE `tmstmvehicletype`
  MODIFY `XVVehTypeCode` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tmstvehicle`
--
ALTER TABLE `tmstvehicle`
  MODIFY `XVVehCode` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  ADD CONSTRAINT `FK_DocMaJob_stMDepartment` FOREIGN KEY (`XVDptCode`) REFERENCES `tmstmdepartment` (`XVDptCode`),
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
  ADD CONSTRAINT `FK_Machinepartstype_Machineparts` FOREIGN KEY (`XVMachinePartsTypeCode`) REFERENCES `tmstmmachine_parts_type` (`XVMachinePartsTypeCode`);

--
-- Constraints for table `tmstvehicle`
--
ALTER TABLE `tmstvehicle`
  ADD CONSTRAINT `FK_Vehicle_VehicleType` FOREIGN KEY (`XVVehTypeCode`) REFERENCES `tmstmvehicletype` (`XVVehTypeCode`);

--
-- Constraints for table `tsysuser`
--
ALTER TABLE `tsysuser`
  ADD CONSTRAINT `FK_employee_user` FOREIGN KEY (`XVEpyCode`) REFERENCES `tmstmtemployee` (`XVEpyCode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
