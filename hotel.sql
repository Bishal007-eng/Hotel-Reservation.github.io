-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2022 at 04:27 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `S.no` int(11) NOT NULL,
  `admin_name` varchar(150) NOT NULL,
  `admin_password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`S.no`, `admin_name`, `admin_password`) VALUES
(1, 'bishal.thap3@gmail.com', 'Bishal_007');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `sr_no` int(11) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`sr_no`, `image`) VALUES
(3, 'IMG_79170.jpg'),
(4, 'IMG_39703.jpg'),
(6, 'IMG_92743.jpg'),
(14, 'IMG_54699.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE `carousel` (
  `sr_no` int(11) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contact_details`
--

CREATE TABLE `contact_details` (
  `sr_no` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `gmap` varchar(150) NOT NULL,
  `pn1` bigint(20) NOT NULL,
  `pn2` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fb` varchar(100) NOT NULL,
  `insta` varchar(100) NOT NULL,
  `tw` varchar(100) NOT NULL,
  `iframe` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_details`
--

INSERT INTO `contact_details` (`sr_no`, `address`, `gmap`, `pn1`, `pn2`, `email`, `fb`, `insta`, `tw`, `iframe`) VALUES
(1, ' The Soltee Hotel, Kathmandu, Nepal', 'https://g.page/TheSoalteeKathmandu?share', 9860461499, 9813351851, 'bishal.thap3@gmail.com', 'https://www.facebook.com/profile.php?id=100044386269936', 'https://www.instagram.com/bishal_thapa007/', 'https://twitter.com/Bishal_thapa007', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d28260.32281280835!2d85.291006!3d27.700598!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0:0x44edd8fc9a17af63!2sThe Soaltee Kathmandu!5e0!3m2!1sen!2snp!4v1644995302516!5m2!1sen!2snp');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` int(11) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id`, `icon`, `name`, `description`) VALUES
(7, 'IMG_15736.svg', 'Wi-Fi', 'Since the world is connecting and growing rapidly, Our customers wants to know the world better and connect with everyone. We at Soltee Hotel, Provide you with the best ISP with a blazing speed with which you can get online without any problem. you can get connected to the Wi-fi and be happily onlin'),
(8, 'IMG_28774.svg', 'Valet Parking', 'Valet parking facilities are secure and have professional members of staff who handle your car with care, meaning you will return to find your car in exactly the same condition as you left it. Make Your Reservation in Just 2 Minutes Once you have found your ideal parking, booking takes just a couple'),
(9, 'IMG_49371.svg', 'Swimming', 'Guests staying at hotel may use the swimming pool area free of charge. Current admission fees and detailed information is provided by the Swimming Pool Reception Desk. Proper swimming costume is a must for using the swimming pool facilities. Do not apply any lotion/cream on the body before entering '),
(10, 'IMG_26919.svg', 'Bar', 'Sample some fine vintages at our comfortable air-conditioned indoor main bar. Our wines perfectly complement the meals we serve and cater to all tastes and the icy cold beers help take the edge off a hot day. Pull up a chair and get yourself a great vantage point to experience all the current world '),
(11, 'IMG_68309.svg', 'Laundry', 'We also provide the Laundry Service for Our Guests. The best Laundry service yet, where all the dirty clothes of our guests are cleaned and provided back to the guests in a well mannered and in good condition. You can have a nice stay at The Soltee hotel and not worry about the dirty clothes as they'),
(21, 'IMG_21161.svg', 'Room Heater', 'To warm the room, we provide a room heater as well !'),
(22, 'IMG_61507.svg', 'A.C', 'AC is always provided'),
(23, 'IMG_75856.svg', 'Hot shower', 'For warm and delightful bath there is a Hot shower in the rooms');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `name`) VALUES
(14, 'Bathrooms'),
(15, 'Sofas'),
(16, 'Beds'),
(17, 'Chairs'),
(23, 'Spacious Living Area');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `area` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `adult` int(11) NOT NULL,
  `children` int(11) NOT NULL,
  `description` varchar(400) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `removed` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `area`, `price`, `quantity`, `adult`, `children`, `description`, `status`, `removed`) VALUES
(2, 'Executive Room', 150, 1500, 4, 1, 4, 'Welcome to the Executive Rooms of Soaltee Hotel Ltd.', 1, 0),
(3, 'Classic Heritage Room', 150, 1000, 1, 2, 2, 'This is a Classic heritage Room, equipped with the best interior design that gives a classic Nepali Heritage vibes to our Customers.', 1, 0),
(4, 'Club Room', 120, 1000, 2, 2, 4, 'This is a family room.', 1, 0),
(5, 'Executive Suite', 200, 2000, 1, 2, 2, 'This is an Executive Suite with well furnished interior, a huge living space, and multiple rooms.', 1, 0),
(6, 'Executive Room', 100, 1500, 4, 5, 4, 'Welcome to the Executive Room of SOALTEE HOTEL ltd.', 1, 1),
(8, 'Bishal dai', 1245, 4100000, 54, 1213, 5412, 'Testing deletion of features, facilities and Features attached with a room!', 1, 1),
(9, 'Deluxe Suite', 1200, 3000, 9, 2, 2, 'Welcome to one of the finest Rooms of our Hotel. This room is specially for your and your children perfect stay to enjoy your vacation here in Kathmandu, Nepal.', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `room_facilities`
--

CREATE TABLE `room_facilities` (
  `sr_no` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `facilities_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_facilities`
--

INSERT INTO `room_facilities` (`sr_no`, `room_id`, `facilities_id`) VALUES
(43, 3, 7),
(44, 3, 9),
(45, 3, 10),
(46, 3, 11),
(47, 3, 23),
(48, 4, 7),
(49, 4, 11),
(50, 4, 22),
(51, 4, 23),
(52, 5, 7),
(53, 5, 9),
(54, 5, 10),
(55, 5, 11),
(56, 5, 21),
(57, 5, 23),
(86, 9, 7),
(87, 9, 9),
(88, 9, 11),
(89, 9, 21),
(90, 9, 22),
(91, 9, 23),
(97, 2, 7),
(98, 2, 11),
(99, 2, 21),
(100, 2, 22),
(101, 2, 23);

-- --------------------------------------------------------

--
-- Table structure for table `room_features`
--

CREATE TABLE `room_features` (
  `sr_no` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `features_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_features`
--

INSERT INTO `room_features` (`sr_no`, `room_id`, `features_id`) VALUES
(79, 3, 14),
(80, 3, 15),
(81, 3, 16),
(82, 3, 17),
(83, 3, 23),
(84, 4, 14),
(85, 4, 15),
(86, 4, 16),
(87, 4, 23),
(88, 5, 14),
(89, 5, 15),
(90, 5, 16),
(91, 5, 17),
(92, 5, 23),
(113, 9, 14),
(114, 9, 15),
(115, 9, 16),
(116, 9, 17),
(117, 9, 23),
(123, 2, 14),
(124, 2, 15),
(125, 2, 16),
(126, 2, 17);

-- --------------------------------------------------------

--
-- Table structure for table `room_images`
--

CREATE TABLE `room_images` (
  `sr_no` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `image` varchar(150) NOT NULL,
  `thumb` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_images`
--

INSERT INTO `room_images` (`sr_no`, `room_id`, `image`, `thumb`) VALUES
(9, 2, 'IMG_90773.jpg', 1),
(11, 3, 'IMG_20201.jpg', 1),
(12, 3, 'IMG_17535.jpg', 0),
(13, 3, 'IMG_18756.jpg', 0),
(14, 2, 'IMG_54802.jpg', 0),
(15, 2, 'IMG_82901.jpg', 0),
(16, 2, 'IMG_67137.jpg', 0),
(17, 3, 'IMG_35002.jpg', 0),
(18, 4, 'IMG_22664.jpg', 1),
(19, 4, 'IMG_68268.jpg', 0),
(20, 4, 'IMG_26500.jpg', 0),
(21, 4, 'IMG_61156.jpg', 0),
(22, 5, 'IMG_77388.jpg', 0),
(23, 5, 'IMG_14448.jpg', 0),
(24, 5, 'IMG_24593.jpg', 1),
(25, 5, 'IMG_35581.jpg', 0),
(29, 9, 'IMG_63799.jpg', 1),
(30, 9, 'IMG_29008.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `sr_no` int(11) NOT NULL,
  `site_title` varchar(50) NOT NULL,
  `site_about` varchar(250) NOT NULL,
  `shutdown` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`sr_no`, `site_title`, `site_about`, `shutdown`) VALUES
(1, 'The Soaltee hotel', 'Pioneering Hospitality\nsince 1966', 0);

-- --------------------------------------------------------

--
-- Table structure for table `team_details`
--

CREATE TABLE `team_details` (
  `sr_no` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `picture` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team_details`
--

INSERT INTO `team_details` (`sr_no`, `name`, `picture`) VALUES
(14, 'Hemant Dangol', 'IMG_79798.JPG'),
(15, 'Pramesh Maharjan', 'IMG_29024.JPG'),
(16, 'Noyal Nakarmi', 'IMG_94181.JPG'),
(17, 'Subodh Barakoti', 'IMG_30031.JPG'),
(18, 'Ujwal Thapa', 'IMG_58178.JPG'),
(19, 'Kushal Rijal', 'IMG_42041.JPG'),
(22, 'Bishal Thapa', 'IMG_74119.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `user_cred`
--

CREATE TABLE `user_cred` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `address` varchar(150) NOT NULL,
  `phonenum` varchar(100) NOT NULL,
  `pincode` int(11) NOT NULL,
  `dob` date NOT NULL,
  `profile` varchar(200) NOT NULL,
  `password` varchar(250) NOT NULL,
  `is_verified` int(11) NOT NULL DEFAULT 0,
  `token` varchar(200) DEFAULT NULL,
  `t_expire` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `dateandtime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_cred`
--

INSERT INTO `user_cred` (`id`, `name`, `email`, `address`, `phonenum`, `pincode`, `dob`, `profile`, `password`, `is_verified`, `token`, `t_expire`, `status`, `dateandtime`) VALUES
(4, 'Bishal Thapa', 'bishal.thap3@gmail.com', 'Kirtipur-04, Kathmandu', '9860461499', 742147, '2055-09-07', 'IMG_94851.jpeg', '$2y$10$H9ysrwbZbCKD/NIViu3LaOaLpx9GWE9fIc22iURKYExTDJ982iuFS', 1, NULL, NULL, 1, '2022-07-24 11:21:56'),
(5, 'Sumi Bhatta', 'sumebhatta@gmail.com', 'Nayabazar', '9803435595', 74152, '2022-07-25', 'IMG_33788.jpeg', '$2y$10$4r8ZlKQru8J6izhvji1yvuAxt1JkCE/efXaH01lH5BB96tC3ZiFcy', 0, 'b23fcc4ca0d9c2bd54000a9f819ee019', NULL, 1, '2022-07-25 06:45:32'),
(6, 'Noyal Nakarmi', 'noyal12.nakarmi@gmail.com', 'Satungal', '9862425308', 12, '2000-07-30', 'IMG_52831.jpeg', '$2y$10$hjxqFTKlU/PrtzvyQBCM7ut5t0vruxIQwnfWCAjmP3kD3AMbIQjFe', 1, '1750682365e87deac98dae84729b6f0e', NULL, 1, '2022-07-25 08:05:05');

-- --------------------------------------------------------

--
-- Table structure for table `user_queries`
--

CREATE TABLE `user_queries` (
  `sr_no` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` varchar(500) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `seen` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_queries`
--

INSERT INTO `user_queries` (`sr_no`, `name`, `email`, `subject`, `message`, `date`, `seen`) VALUES
(22, 'Ujwal Thapa', 'ujwal.hatti@gmail.com', 'Review', 'They were extremely accommodating and allowed us to check in early at like 10am. We got to hotel super early and I didn’t wanna wait.  So this was a big plus. The service was exceptional as well. Would definitely send a friend there.', '2022-03-19', 1),
(23, 'Kushal Rijal', 'kushal.dari@gmail.com', 'Review', 'The staff was the nicest staff I have ever encountered at a hotel. They were always friendly and asked how our stay was going every time we walked in the door. They also were able to recommend places to get any type of meal that we needed as well.', '2022-03-19', 1),
(24, 'Pramesh Maharjan', 'pramesh.topper@gmail.com', 'Review', 'Beautiful downtown hotel with nice roof top bar. Rooms have historic feel with old hard wood floors, yet modern as bathrooms have white subway tiles with TVs in each bathroom. Staff is wonderful and accommodating providing upgrades when available.', '2022-03-19', 1),
(25, 'Pramila Bhandari', 'pramila.kali@gmail.com', 'Review', 'The staff at The Soltee Hotel was GREAT -- so helpful, friendly and accommodating! The food was terrific, we especially enjoyed our dinners there and looked forward to them every day! The only issue I had was that the internet was a bit week and patchy at times.', '2022-03-19', 1),
(26, 'Sumi Bhatta', 'sumi_depressed@gmail.com', 'Review', 'This hotel is perfect and matches all my expectations for what I paid. Friendly staff, nice cozy room. Breakfast is awesome. I will definitely come back here when I will be in Kathmandu. Recommended to everyone.', '2022-03-19', 1),
(27, 'Hemant Dangol', 'hemant.second_topper@gmail.com', 'Review', 'Rooms were clean, well equipped. Family friendly place. Location was great. Staffs were friendly. The bad side I faced was that there was not enough space for Parking. we were ensured we would get a proper parking during the night, but our car was left outside on the roadside for parking.', '2022-03-19', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`S.no`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `contact_details`
--
ALTER TABLE `contact_details`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_facilities`
--
ALTER TABLE `room_facilities`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `facilities id` (`facilities_id`),
  ADD KEY `room id` (`room_id`);

--
-- Indexes for table `room_features`
--
ALTER TABLE `room_features`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `features id` (`features_id`),
  ADD KEY `rm id` (`room_id`);

--
-- Indexes for table `room_images`
--
ALTER TABLE `room_images`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `team_details`
--
ALTER TABLE `team_details`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `user_cred`
--
ALTER TABLE `user_cred`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_queries`
--
ALTER TABLE `user_queries`
  ADD PRIMARY KEY (`sr_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `S.no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `contact_details`
--
ALTER TABLE `contact_details`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `room_facilities`
--
ALTER TABLE `room_facilities`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `room_features`
--
ALTER TABLE `room_features`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `room_images`
--
ALTER TABLE `room_images`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `team_details`
--
ALTER TABLE `team_details`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_cred`
--
ALTER TABLE `user_cred`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_queries`
--
ALTER TABLE `user_queries`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `room_facilities`
--
ALTER TABLE `room_facilities`
  ADD CONSTRAINT `facilities id` FOREIGN KEY (`facilities_id`) REFERENCES `facilities` (`id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `room id` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON UPDATE NO ACTION;

--
-- Constraints for table `room_features`
--
ALTER TABLE `room_features`
  ADD CONSTRAINT `features id` FOREIGN KEY (`features_id`) REFERENCES `features` (`id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `rm id` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON UPDATE NO ACTION;

--
-- Constraints for table `room_images`
--
ALTER TABLE `room_images`
  ADD CONSTRAINT `room_images_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
