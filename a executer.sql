-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2022 at 02:04 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pagination`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `name`, `phone`, `email`) VALUES
(1, 'Claire Bright', '1-825-586-2560', 'mi.aliquam.gravida@protonmail.org'),
(2, 'Brandon Malone', '1-673-871-1648', 'ut.mi@yahoo.couk'),
(3, 'Ivan Gallegos', '1-653-492-2783', 'eros@hotmail.com'),
(4, 'Paloma Lara', '1-201-262-6488', 'curabitur.ut@outlook.com'),
(5, 'Shaeleigh Gallagher', '1-759-476-5142', 'lectus.cum.sociis@google.org'),
(6, 'Lacota Osborne', '1-618-343-3008', 'nec@hotmail.org'),
(7, 'Tiger Carpenter', '1-876-554-4418', 'faucibus@aol.ca'),
(8, 'Kiayada Dillard', '1-726-332-0621', 'magna.a@aol.edu'),
(9, 'Andrew Trujillo', '1-813-432-1154', 'nec@google.edu'),
(10, 'Gisela Lancaster', '1-126-782-3268', 'non@outlook.com'),
(11, 'Hoyt Owen', '1-168-480-0551', 'vitae.odio@google.couk'),
(12, 'Bruce Wade', '1-424-148-4444', 'proin.velit.sed@outlook.net'),
(13, 'Dexter Wolf', '1-779-821-1747', 'risus.duis@outlook.ca'),
(14, 'Hakeem Bryan', '1-403-953-3923', 'eros@outlook.com'),
(15, 'Hilary Beck', '1-562-958-4232', 'sed@hotmail.ca'),
(16, 'Kareem Hudson', '1-889-292-2374', 'cras@yahoo.net'),
(17, 'Duncan Hall', '1-247-597-8351', 'et.magnis@protonmail.edu'),
(18, 'Wing Erickson', '1-885-574-7118', 'in.lorem@outlook.couk'),
(19, 'Stacey Willis', '1-467-620-2153', 'mattis@protonmail.couk'),
(20, 'Dylan Terrell', '1-412-839-5438', 'lacus.cras.interdum@google.com'),
(21, 'Diana Hardy', '1-719-453-2226', 'nullam.enim@yahoo.couk'),
(22, 'Kay Rhodes', '1-264-305-6404', 'arcu.nunc.mauris@yahoo.couk'),
(23, 'Nita Montgomery', '1-341-276-5791', 'et.rutrum@yahoo.net'),
(24, 'Allistair Henderson', '1-464-263-3727', 'blandit.mattis.cras@hotmail.com'),
(25, 'Keith Riley', '1-156-959-0800', 'nec.orci@aol.org'),
(26, 'Calvin Santos', '1-261-253-2125', 'lacinia.orci@protonmail.edu'),
(27, 'Katell Gilbert', '1-773-174-5830', 'mi.felis@hotmail.ca'),
(28, 'Zeph Allen', '1-154-715-2169', 'at.libero@aol.com'),
(29, 'Troy Glass', '1-412-818-5822', 'elit@outlook.couk'),
(30, 'Judah Goff', '1-734-734-3890', 'magna.suspendisse.tristique@aol.edu'),
(31, 'Brielle King', '1-524-583-8623', 'mauris.eu@protonmail.edu'),
(32, 'Hop York', '1-888-394-2118', 'lorem.vehicula.et@hotmail.ca'),
(33, 'Jermaine King', '1-621-642-1537', 'justo.sit.amet@hotmail.net'),
(34, 'Stuart Baldwin', '1-411-232-2065', 'risus.quisque@google.org'),
(35, 'Mechelle Pacheco', '1-311-242-1517', 'eros.non@aol.couk'),
(36, 'Forrest Bonner', '1-336-105-6343', 'ullamcorper.velit@aol.org'),
(37, 'Martha Monroe', '1-285-267-1327', 'nascetur.ridiculus.mus@outlook.org'),
(38, 'Beau Park', '1-246-328-5520', 'conubia@protonmail.com'),
(39, 'Dennis Cruz', '1-482-364-5721', 'nulla.cras@hotmail.com'),
(40, 'Jolene Miller', '1-548-768-7458', 'amet.massa@yahoo.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
