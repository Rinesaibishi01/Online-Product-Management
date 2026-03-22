-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2026 at 07:39 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekti`
--

-- --------------------------------------------------------

--
-- Table structure for table `perdoruesit`
--

CREATE TABLE `perdoruesit` (
  `id` int(11) NOT NULL,
  `emri` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `roli` enum('admin','perdorues') DEFAULT 'perdorues'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perdoruesit`
--

INSERT INTO `perdoruesit` (`id`, `emri`, `email`, `password`, `roli`) VALUES
(11, 'jjjjjjj', 'ri73600@ubt-uni.net', '$2y$10$JRX9K8.lxlzddvPtr/17cuqxVergNtt7gf6MmywGFuDck8Ue4nsRq', 'perdorues'),
(13, 'Rinesa', 'rinarinesa079@gmail.com', '$2y$10$y9rM/4hfFA1jrnZzoCzWD.SbjPlMx2TF7N3/jpJx7I/nW6VeDoWOO', 'admin'),
(14, 'Rina', 'rinesa@work-email.com', '$2y$10$kRjEjf3kea5qy1BQAo6T2OcLcIAlOoCPhYZXp.miMHHZigAEG./FW', 'perdorues');

-- --------------------------------------------------------

--
-- Table structure for table `produkte`
--

CREATE TABLE `produkte` (
  `id` int(11) NOT NULL,
  `emri` varchar(255) NOT NULL,
  `pershkrimi` text DEFAULT NULL,
  `cmimi` decimal(10,2) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `krijuar_me` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produkte`
--

INSERT INTO `produkte` (`id`, `emri`, `pershkrimi`, `cmimi`, `foto`, `krijuar_me`) VALUES
(3, 'Laptop', 'Laptop MSI Cyborg 15 A13VE-1613XPL, 15.6\", Intel Core i5-13420H, 16GB RAM, 512GB SSD, NVIDIA GeForce RTX 4050, i zi\r\n', 799.99, '5787ac24-f0f9-4b35-a6b1-a1898e00257c.webp', '2026-03-14 13:55:04'),
(4, 'Laptop', 'Laptop ASUS TUF Gaming F16 FX607VU-I5165W, 16\", Intel Core 5-210H, 16GB RAM, 512GB SSD, NVIDIA GeForce RTX 4050, i hirtë', 1079.50, '0680823b-daf1-4670-9eef-71d85f3f6f52.webp', '2026-03-14 13:56:34'),
(5, 'Dëgjuese Blow', 'Dëgjuese Blow BTE200, të zeza', 7.99, '73802694-1699-47f7-856d-c3f039f57608.webp', '2026-03-14 14:02:36'),
(6, 'Televizor', 'Televizor LG Oled 65G51Lw, 65\'\'', 3499.00, 'ac285dbf-2106-48ce-9d33-f143e4f4ac8e.webp', '2026-03-14 14:03:43'),
(7, 'Printer', 'Printer multifunksional HP DeskJet 2820e, Inkjet termal, i hirtë', 54.99, '36a48fbb-9f63-49d0-992b-6b974044efea.webp', '2026-03-14 14:05:05'),
(8, 'Kamerë digjitale', 'Kamerë digjitale AgfaPhoto DC5200, rozë', 93.50, '54e4ef91-17c9-45a4-af06-05abee228228.webp', '2026-03-14 14:06:12'),
(9, 'Smartwatch', 'Smartwatch Huawei Watch Fit 3, 1.82\" AMOLED, Bluetooth, i zi', 145.50, '16dea08d-69ef-4b43-b64c-438cfeb89df8.webp', '2026-03-14 14:09:04'),
(10, 'Smartwatch', 'Smartwatch Huawei Watch Fit 3, 1.82\" AMOLED, Bluetooth, rozë', 116.99, 'b140a244-f484-41b2-98d1-7d42b7196949.webp', '2026-03-14 14:10:09'),
(11, 'Kufje ', 'Kufje Jbl Tune 520Bt Black', 64.99, 'b80265a3-d5db-428a-9837-d78aafe572bb.webp', '2026-03-14 17:30:28'),
(12, 'Maus', 'Maus Logitech G PRO X SuperLight 2, i zi', 119.50, '5bd87fa4-0c57-40f0-9f68-1fee61a486f1.webp', '2026-03-14 17:31:39'),
(13, 'Kufje Me Kabëll', 'Kufje Me Kabëll MARVO H8325 PK', 19.98, '018dd0bb-5978-4425-891d-d98731072054.webp', '2026-03-14 17:32:53'),
(14, 'Apple iPad ', 'Apple iPad (A16), 11\", Wi-Fi, 128GB, Pink', 369.00, '8fe048a2-ffa5-4199-91fc-e350b9fe8d0f.webp', '2026-03-14 17:34:10'),
(15, 'Adapter', 'Apple 20W USB-C Power Adapter', 39.50, 'be6ac213-ed81-4ad8-8ac3-16f4ca939f59.webp', '2026-03-14 17:35:09'),
(16, 'Apple iPhone 16', 'Apple iPhone 16, 128GB, Pink', 999.50, 'c7a2ffb0-d25e-4377-90b0-2fc9751b9777.webp', '2026-03-14 17:36:11'),
(17, 'Powerbank', 'Powerbank Joyroom JR-W020 Mini Magnetic MagSafe Wireless 10000 mAh (JYR037BLK), i zi', 39.50, 'c746e064-60ea-49bb-88fc-01a863528b60.webp', '2026-03-14 17:37:16'),
(18, 'Stabilizues për celular ', 'Stabilizues për celular DJI Mobile SE Gimbal, i hirtë', 109.50, '1603e3c6-6b28-47e7-8af2-c0de2b835b79.webp', '2026-03-14 17:39:25'),
(19, 'Lexues Kindle', 'Lexues Kindle 12th gen, 7\", 16 GB, Wi-Fi, i gjelbërt', 234.50, '82241526-60d4-41f6-ad79-99a8c59aa50c.webp', '2026-03-14 17:40:55'),
(20, 'Dritë unazë LED', 'Dritë unazë LED Puluz, 20cm, + tripod/ mbajtëse telefoni, e zezë', 23.50, 'd32ad8e4-338a-4980-8168-3cf8b6347463.webp', '2026-03-14 17:42:17'),
(21, 'Kuti mbrojtëse', 'Kuti mbrojtëse 3mk Smoke MagCase për iPhone 15 Pro, MagSafe, gjysmë transparente, e zezë', 21.50, 'c94ea060-b71f-4ea0-8ae7-f58f01be9c53.webp', '2026-03-16 17:22:35'),
(22, 'ggggg', '', 6.00, '5bd87fa4-0c57-40f0-9f68-1fee61a486f1.webp', '2026-03-17 06:17:04');

-- --------------------------------------------------------

--
-- Table structure for table `produktet`
--

CREATE TABLE `produktet` (
  `id` int(11) NOT NULL,
  `emri` varchar(100) NOT NULL,
  `cmimi` decimal(10,2) NOT NULL,
  `sasia` int(11) NOT NULL,
  `pershkrimi` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `perdoruesit`
--
ALTER TABLE `perdoruesit`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `produkte`
--
ALTER TABLE `produkte`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produktet`
--
ALTER TABLE `produktet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `perdoruesit`
--
ALTER TABLE `perdoruesit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `produkte`
--
ALTER TABLE `produkte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `produktet`
--
ALTER TABLE `produktet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
