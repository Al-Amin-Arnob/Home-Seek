-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2020 at 02:00 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `renthouse`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_property`
--

CREATE TABLE `add_property` (
  `property_id` int(10) NOT NULL,
  `country` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `city` varchar(100) NOT NULL,
  `contact_no` bigint(10) NOT NULL,
  `property_type` varchar(50) NOT NULL,
  `asking_price` bigint(10) NOT NULL,
  `total_rooms` int(10) NOT NULL,
  `bedroom` int(10) NOT NULL,
  `living_room` int(10) NOT NULL,
  `kitchen` int(10) NOT NULL,
  `bathroom` int(10) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `latitude` decimal(9,6) NOT NULL,
  `longitude` decimal(9,6) NOT NULL,
  `owner_id` int(10) NOT NULL,
  `booked` varchar(10) NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_property`
--

INSERT INTO add_property (property_id, country, district, upazila, contact_no, property_type, asking_price, total_rooms, bedroom, living_room, kitchen, bathroom, description, latitude, longitude, owner_id) VALUES
(1, 'Bangladesh', 'Dhaka', 'Dhaka Sadar', 8801711000001, 'Apartment', 8500000, 5, 3, 1, 1, 2, 'Spacious apartment in the heart of Dhaka city.', 23.8103, 90.4125, 101),
(2, 'Bangladesh', 'Chattogram', 'Chattogram Sadar', 8801711000002, 'House', 12500000, 6, 4, 1, 1, 3, 'Modern house with sea view in Chattogram.', 22.3569, 91.7832, 102),
(3, 'Bangladesh', 'Khulna', 'Khulna Sadar', 8801711000003, 'Apartment', 7500000, 4, 2, 1, 1, 2, 'Cozy apartment near Khulna University.', 22.8456, 89.5403, 103),
(4, 'Bangladesh', 'Rajshahi', 'Rajshahi Sadar', 8801711000004, 'House', 9500000, 5, 3, 1, 1, 2, 'Family house close to Rajshahi Medical College.', 24.3745, 88.6042, 104),
(5, 'Bangladesh', 'Barishal', 'Barishal Sadar', 8801711000005, 'Apartment', 6800000, 4, 2, 1, 1, 2, 'Apartment with river view in Barishal.', 22.7010, 90.3535, 105),
(6, 'Bangladesh', 'Sylhet', 'Sylhet Sadar', 8801711000006, 'House', 11000000, 6, 4, 1, 1, 3, 'Luxurious house near Sylhet Airport.', 24.8949, 91.8687, 106),
(7, 'Bangladesh', 'Mymensingh', 'Mymensingh Sadar', 8801711000007, 'Apartment', 7200000, 4, 2, 1, 1, 2, 'Modern apartment in Mymensingh city center.', 24.7471, 90.4203, 107),
(8, 'Bangladesh', 'Rangpur', 'Rangpur Sadar', 8801711000008, 'House', 8800000, 5, 3, 1, 1, 2, 'Spacious house near Rangpur Medical College.', 25.7460, 89.2752, 108),
(9, 'Bangladesh', 'Comilla', 'Comilla Sadar', 8801711000009, 'Apartment', 7000000, 4, 2, 1, 1, 2, 'Apartment close to Comilla University.', 23.4607, 91.1809, 109),
(10, 'Bangladesh', 'Jessore', 'Jessore Sadar', 8801711000010, 'House', 9300000, 5, 3, 1, 1, 2, 'Family house in a quiet neighborhood of Jessore.', 23.1667, 89.2089, 110),
(11, 'Bangladesh', 'Bogra', 'Bogra Sadar', 8801711000011, 'Apartment', 6500000, 4, 2, 1, 1, 2, 'Affordable apartment near Bogra city center.', 24.8510, 89.3697, 111),
(12, 'Bangladesh', 'Narayanganj', 'Narayanganj Sadar', 8801711000012, 'House', 9800000, 5, 3, 1, 1, 2, 'Modern house with garden in Narayanganj.', 23.6238, 90.5000, 112),
(13, 'Bangladesh', 'Gazipur', 'Gazipur Sadar', 8801711000013, 'Apartment', 7700000, 4, 2, 1, 1, 2, 'Apartment close to Gazipur Industrial Area.', 23.9999, 90.4203, 113),
(14, 'Bangladesh', 'Tangail', 'Tangail Sadar', 8801711000014, 'House', 8600000, 5, 3, 1, 1, 2, 'Spacious house near Tangail city center.', 24.2513, 89.9167, 114),
(15, 'Bangladesh', 'Pabna', 'Pabna Sadar', 8801711000015, 'Apartment', 6900000, 4, 2, 1, 1, 2, 'Affordable apartment in Pabna town.', 24.0064, 89.2372, 115),
(16, 'Bangladesh', 'Barisal', 'Barisal Sadar', 8801711000016, 'House', 9100000, 5, 3, 1, 1, 2, 'Family house with backyard in Barisal.', 22.7010, 90.3535, 116),
(17, 'Bangladesh', 'Dinajpur', 'Dinajpur Sadar', 8801711000017, 'Apartment', 6400000, 4, 2, 1, 1, 2, 'Apartment near Dinajpur Medical College.', 25.6270, 88.6336, 117),
(18, 'Bangladesh', 'Kushtia', 'Kushtia Sadar', 8801711000018, 'House', 8700000, 5, 3, 1, 1, 2, 'Modern house in Kushtia city.', 23.9013, 89.1200, 118),
(19, 'Bangladesh', 'Moulvibazar', 'Moulvibazar Sadar', 8801711000019, 'Apartment', 6800000, 4, 2, 1, 1, 2, 'Apartment with scenic view in Moulvibazar.', 24.4828, 91.7774, 119),
(20, 'Bangladesh', 'Noakhali', 'Noakhali Sadar', 8801711000020, 'House', 9200000, 5, 3, 1, 1, 2, 'Spacious house near Noakhali Science and Technology University.', 22.8240, 91.1000, 120);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`) VALUES
(1, 'arnob.radyat@gmail.com', '12345'),
(2, 'jakaria@gmail.com', '12345'),
(3,'joy@gmail.com','12345');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `owner_id` int(10) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone_no` bigint(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `id_type` varchar(100) NOT NULL,
  `id_photo` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`owner_id`, `full_name`, `email`, `password`, `phone_no`, `address`, `id_type`, `id_photo`) 
VALUES
(1,  'Al Amin Arnob',      'arnob.radyat@gmail.com',     '12345',     1711000001, 'Mirpur-2',        'Citizenship', 'owner-photo/arnob.png'),
(2,  'Tania Rahman',       'tania.rahman@mail.com',      'tania123',  1711000002, 'Uttara',          'NID',         'owner-photo/tania.png'),
(3,  'Farhan Islam',       'farhan.islam@mail.com',      'farhan21',  1711000003, 'Dhanmondi',       'Citizenship', 'owner-photo/farhan.png'),
(4,  'Rafiq Hossain',      'rafiq.hossain@mail.com',     'rafiq22',   1711000004, 'Banani',          'NID',         'owner-photo/rafiq.png'),
(5,  'Nusrat Jahan',       'nusrat.jahan@mail.com',      'nusrat99',  1711000005, 'Mirpur DOHS',     'Passport',    'owner-photo/nusrat.png'),
(6,  'Hasib Mahmud',       'hasib.mahmud@mail.com',      'hasib88',   1711000006, 'Shyamoli',        'Citizenship', 'owner-photo/hasib.png'),
(7,  'Shamima Akter',      'shamima.akter@mail.com',     'shamima77', 1711000007, 'Khilgaon',        'NID',         'owner-photo/shamima.png'),
(8,  'Kazi Saif',          'kazi.saif@mail.com',         'kazi66',    1711000008, 'Tejgaon',         'Passport',    'owner-photo/kazi.png'),
(9,  'Mehzabin Chowdhury', 'mehzabin.c@mail.com',        'mehzabin55',1711000009, 'Baridhara',       'NID',         'owner-photo/mehzabin.png'),
(10, 'Imran Hossain',      'imran.hossain@mail.com',     'imran44',   1711000010, 'Gulshan',         'Citizenship', 'owner-photo/imran.png'),
(11, 'Sadia Noor',         'sadia.noor@mail.com',        'sadia33',   1711000011, 'Uttara Sector-6', 'NID',         'owner-photo/sadia.png'),
(12, 'Rashed Kabir',       'rashed.kabir@mail.com',      'rashed22',  1711000012, 'Motijheel',       'Passport',    'owner-photo/rashed.png'),
(13, 'Mithila Khan',       'mithila.khan@mail.com',      'mithila11', 1711000013, 'Mohammadpur',     'NID',         'owner-photo/mithila.png'),
(14, 'Arif Ahmed',         'arif.ahmed@mail.com',        'arif10',    1711000014, 'Pallabi',         'Citizenship', 'owner-photo/arif.png'),
(15, 'Ruma Sultana',       'ruma.sultana@mail.com',      'ruma09',    1711000015, 'Bashundhara',     'NID',         'owner-photo/ruma.png'),
(16, 'Fahim Hasan',        'fahim.hasan@mail.com',       'fahim08',   1711000016, 'Dhanmondi-32',     'Passport',    'owner-photo/fahim.png'),
(17, 'Jannat Ara',         'jannat.ara@mail.com',        'jannat07',  1711000017, 'Niketan',         'Citizenship', 'owner-photo/jannat.png'),
(18, 'Ovi Rahman',         'ovi.rahman@mail.com',        'ovi06',     1711000018, 'Kakrail',         'NID',         'owner-photo/ovi.png'),
(19, 'Sultana Jahan',      'sultana.jahan@mail.com',     'sultana05', 1711000019, 'Agargaon',        'Citizenship', 'owner-photo/sultana.png'),
(20, 'Tamim Chowdhury',    'tamim.chowdhury@mail.com',   'tamim04',   1711000020, 'Shantinagar',     'Passport',    'owner-photo/tamim.png');


-- --------------------------------------------------------

--
-- Table structure for table `property_photo`
--

CREATE TABLE `property_photo` (
  `property_photo_id` int(12) NOT NULL,
  `p_photo` varchar(500) NOT NULL,
  `property_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property_photo`
--

INSERT INTO `property_photo` (`property_photo_id`, `p_photo`, `property_id`) 
VALUES
(1, 'product-photo/apartment1.jpg', 1),
(2, 'product-photo/apartment2.jpg', 2),
(3, 'product-photo/apartment3.jpg', 3),
(4, 'product-photo/apartment4.jpg', 4),
(5, 'product-photo/apartment5.jpg', 5),
(6, 'product-photo/apartment6.jpg', 6),
(7, 'product-photo/apartment7.jpg', 7),
(8, 'product-photo/apartment8.jpg', 8),
(9, 'product-photo/apartment9.jpg', 9),
(10, 'product-photo/apartment10.jpg', 10),
(11, 'product-photo/apartment11.jpg', 11),
(12, 'product-photo/apartment12.jpg', 12),
(13, 'product-photo/apartment13.jpg', 13),
(14, 'product-photo/apartment14.jpg', 14),
(15, 'product-photo/apartment15.jpg', 15),
(16, 'product-photo/apartment16.jpg', 16),
(17, 'product-photo/apartment17.jpg', 17),
(18, 'product-photo/apartment18.jpg', 18),
(19, 'product-photo/apartment19.jpg', 19),
(20, 'product-photo/apartment20.jpg', 20);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(10) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `rating` int(5) NOT NULL,
  `property_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `comment`, `rating`, `property_id`) 
VALUES
(1,  'Spacious and well-maintained. Loved the peaceful environment.',                         5, 1),
(2,  'Nice place but the kitchen is a bit small.',                                            4, 2),
(3,  'Not satisfied with the bathroom condition.',                                            2, 3),
(4,  'Excellent location and great views from the balcony!',                                 5, 4),
(5,  'Affordable price, but needs some interior upgrades.',                                  3, 5),
(6,  'Perfect for a small family. Clean and well lit.',                                       4, 6),
(7,  'Too noisy neighborhood, not ideal for working from home.',                              2, 7),
(8,  'Elegant design, fully furnished and comfortable.',                                      5, 8),
(9,  'Basic amenities are missing. Could be better.',                                         3, 9),
(10, 'Owner was cooperative. Overall, a smooth renting process.',                             4, 10),
(11, 'Loved the garden space. Very relaxing and quiet.',                                      5, 11),
(12, 'The bathroom leaked frequently. Needs repair.',                                         2, 12),
(13, 'Location is central and convenient, near major markets.',                               4, 13),
(14, 'Not recommended. Damp walls and poor ventilation.',                                     1, 14),
(15, 'Neat and tidy. Safe neighborhood.',                                                     4, 15),
(16, 'Felt overpriced for the size and condition of the property.',                          2, 16),
(17, 'Highly recommended! Perfect for bachelors or couples.',                                 5, 17),
(18, 'Parking space is very limited. Otherwise, a good property.',                            3, 18),
(19, 'Modern interiors and well-designed layout. Great investment.',                          5, 19),
(20, 'Too far from main road. Accessibility is an issue.',                                    3, 20);


-- --------------------------------------------------------

--
-- Table structure for table `tenant`
--

CREATE TABLE `tenant` (
  `tenant_id` int(10) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone_no` bigint(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `id_type` varchar(100) NOT NULL,
  `id_photo` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tenant`
--

INSERT INTO `tenant` (`tenant_id`, `full_name`,            `email`,                      `password`,    `phone_no`,   `address`,               `id_type`,     `id_photo`) 
VALUES
( 1,  'Ali Ahmed',            'ali.ahmed@mail.com',          '12345',       1712000001,  'Badda',                 'NID',          'tenant-photo/ali.png'),
( 2,  'Sabrina Noor',         'sabrina.noor@mail.com',       '12345',  1712000002,  'Gulshan',               'Passport',     'tenant-photo/ali.png'),
( 3,  'Jamil Khan',           'jamil.khan@mail.com',         '12345',    1712000003,  'Uttara Sector-6',       'Citizenship',  'tenant-photo/ali.png'),
( 4,  'Farzana Yeasmin',      'farzana.yeasmin@mail.com',    '12345',  1712000004,  'Dhanmondi',             'NID',          'tenant-photo/ali.png'),
( 5,  'Rashedul Islam',       'rashedul.islam@mail.com',     '12345', 1712000005,  'Mirpur',                'Passport',     'tenant-photo/ali.png'),
( 6,  'Tasnova Rahman',       'tasnova.rahman@mail.com',     '12345',  1712000006,  'Banani',                'NID',          'tenant-photo/ali.png'),
( 7,  'Noman Karim',          'noman.karim@mail.com',        '12345',    1712000007,  'Mohammadpur',           'Citizenship',  'tenant-photo/ali.png'),
( 8,  'Laila Akhtar',         'laila.akhtar@mail.com',       '12345',    1712000008,  'Mohammadpur',           'NID',          'tenant-photo/ali.png'),
( 9,  'Imtiaz Ahmed',         'imtiaz.ahmed@mail.com',       '12345',   1712000009,  'Baridhara',             'Passport',     'tenant-photo/ali.png'),
(10,  'Sadia Khan',           'sadia.khan@mail.com',         '12345',    1712000010,  'Uttara',                'NID',          'tenant-photo/ali.png'),
(11,  'Mukta Chowdhury',      'mukta.chowdhury@mail.com',    '12345',    1712000011,  'Mirpur-2',              'Citizenship',  'tenant-photo/ali.png'),
(12,  'Tanvir Ahmed',         'tanvir.ahmed@mail.com',       '12345',   1712000012,  'Shantinagar',           'Passport',     'tenant-photo/ali.png'),
(13,  'Shorna Das',           'shorna.das@mail.com',         '12345',   1712000013,  'Motijheel',             'NID',          'tenant-photo/ali.png'),
(14,  'Mahbub Morshed',       'mahbub.morshed@mail.com',     '12345',   1712000014,  'Tejgaon',               'Citizenship',  'tenant-photo/ali.png'),
(15,  'Nusrat Fatema',        'nusrat.fatema@mail.com',      '12345',   1712000015,  'Banasree',              'Passport',     'tenant-photo/ali.png'),
(16,  'Enamul Hoque',         'enamul.hoque@mail.com',       '12345',   1712000016,  'Khilgaon',              'NID',          'tenant-photo/ali.png'),
(17,  'Parul Islam',          'parul.islam@mail.com',        '12345',    1712000017,  'Mirpur DOHS',           'Citizenship',  'tenant-photo/ali.png'),
(18,  'Khalid Hossain',       'khalid.hossain@mail.com',     '12345',   1712000018,  'Gulshan-1',             'Passport',     'tenant-photo/ali.png'),
(19,  'Rita Sultana',         'rita.sultana@mail.com',       '12345',     1712000019,  'Dhanmondi-32',          'NID',          'tenant-photo/ali.png'),
(20,  'Arifur Rahman',        'arifur.rahman@mail.com',      '12345',   1712000020,  'Mohammadpur',           'Citizenship',  'tenant-photo/ali.png');


--booking table--
CREATE TABLE `booking` (
  `booking_id`   INT(10)      NOT NULL AUTO_INCREMENT,
  `tenant_id`    INT(10)      NOT NULL,
  `property_id`  INT(10)      NOT NULL,
  `booking_date` DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status`       VARCHAR(20)  NOT NULL DEFAULT 'Confirmed',
  PRIMARY KEY (`booking_id`),
  KEY `tenant_id` (`tenant_id`),
  KEY `property_id` (`property_id`),
  CONSTRAINT `booking_ibfk_1`
    FOREIGN KEY (`tenant_id`) REFERENCES `tenant`(`tenant_id`)
    ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `booking_ibfk_2`
    FOREIGN KEY (`property_id`) REFERENCES `add_property`(`property_id`)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_property`
--
ALTER TABLE `add_property`
  MODIFY `property_id` INT(10) NOT NULL AUTO_INCREMENT,
  ADD PRIMARY KEY (`property_id`),
  ADD KEY `owner_id` (`owner_id`),
  ADD CONSTRAINT `add_property_ibfk_1`
    FOREIGN KEY (`owner_id`) REFERENCES `owner`(`owner_id`)
    ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` INT(10) NOT NULL AUTO_INCREMENT,
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  MODIFY `owner_id` INT(10) NOT NULL AUTO_INCREMENT,
  ADD PRIMARY KEY (`owner_id`);

--
-- Indexes for table `property_photo`
--
ALTER TABLE `property_photo`
  ADD PRIMARY KEY (`property_photo_id`),
  ADD KEY `property_id` (`property_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `property_id` (`property_id`);

--
-- Indexes for table `tenant`
--
ALTER TABLE `tenant`
  MODIFY `tenant_id` INT(10) NOT NULL AUTO_INCREMENT,
  ADD PRIMARY KEY (`tenant_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_property`
--
ALTER TABLE `add_property`
  MODIFY `property_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `owner_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `property_photo`
--
ALTER TABLE `property_photo`
  MODIFY `property_photo_id` INT(12) NOT NULL AUTO_INCREMENT,
  ADD PRIMARY KEY (`property_photo_id`),
  ADD KEY `property_id` (`property_id`),
  ADD CONSTRAINT `property_photo_ibfk_1`
    FOREIGN KEY (`property_id`) REFERENCES `add_property`(`property_id`)
    ON DELETE CASCADE ON UPDATE CASCADE;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` INT(10) NOT NULL AUTO_INCREMENT,
  ADD PRIMARY KEY (`review_id`),
  ADD COLUMN `tenant_id` INT(10) NOT NULL AFTER `property_id`,
  ADD COLUMN `review_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `tenant_id`,
  ADD KEY `property_id` (`property_id`),
  ADD KEY `tenant_id` (`tenant_id`),
  ADD CONSTRAINT `review_ibfk_1`
    FOREIGN KEY (`property_id`) REFERENCES `add_property`(`property_id`)
    ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ibfk_2`
    FOREIGN KEY (`tenant_id`) REFERENCES `tenant`(`tenant_id`)
    ON DELETE CASCADE ON UPDATE CASCADE;

--
-- AUTO_INCREMENT for table `tenant`
--
ALTER TABLE `tenant`
  MODIFY `tenant_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `add_property`
--
ALTER TABLE `add_property`
  ADD CONSTRAINT `add_property_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `owner` (`owner_id`);

--
-- Constraints for table `property_photo`
--
ALTER TABLE `property_photo`
  ADD CONSTRAINT `property_photo_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `add_property` (`property_id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `add_property` (`property_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
