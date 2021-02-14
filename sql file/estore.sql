-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2021 at 06:54 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estore`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `status` enum('A','I') NOT NULL DEFAULT 'A',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'mobiles', 'A', '2021-02-13 10:57:47', '2021-02-13 10:57:47'),
(2, 'fashion', 'A', '2021-02-13 10:58:26', '2021-02-13 11:01:44'),
(3, 'sports', 'A', '2021-02-13 11:07:06', '2021-02-13 11:07:06'),
(4, 'electronic', 'A', '2021-02-14 15:17:01', '2021-02-14 15:17:20'),
(5, 'foods', 'A', '2021-02-14 17:41:54', '2021-02-14 17:42:08');

-- --------------------------------------------------------

--
-- Table structure for table `customer_product_management`
--

CREATE TABLE `customer_product_management` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` blob NOT NULL,
  `status` enum('A','I') NOT NULL DEFAULT 'A',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_product_management`
--

INSERT INTO `customer_product_management` (`id`, `customer_id`, `product_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 26, 0x613a353a7b693a303b733a313a2233223b693a313b733a313a2234223b693a323b733a313a2235223b693a333b733a313a2236223b693a343b733a313a2239223b7d, 'A', '2021-02-14 17:47:10', '2021-02-14 17:50:43');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1613026723),
('m130524_201442_init', 1613026733),
('m190124_110200_add_verification_token_column_to_user_table', 1613026734);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_sdesc` text NOT NULL,
  `product_desc` text NOT NULL,
  `images` text NOT NULL,
  `status` enum('A','I') NOT NULL DEFAULT 'A',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `product_name`, `product_sdesc`, `product_desc`, `images`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Nokia 5.4', '6 GB RAM | 64 GB ROM | Expandable Upto 512 GB', 'This mobile phone features a 48 MP quad camera, a 16 MP front camera, and also supports 60 fps video recording so that you can take photos, motion shots, record videos, shoot movies, etc., with proper colour grading.', 'img/5-4-hq5020m514000-nokia-original-imagy5bqcnefyzdk.jpg~img/5-4-hq5020m514000-nokia-original-imagy5bqyxp7t4se.jpg', 'I', '2021-02-13 11:12:58', '2021-02-14 17:49:32'),
(2, 1, 'Apple iPhone 12 Pro Max ', '17.02 cm (6.7 inch) Super Retina XDR Display', 'Super Retina XDR Display, 6.7 inch (Diagonal) All Screen OLED Display, HDR Display, True Tone, Wide Colour, Haptic Touch, 2000000:1 Contrast Ratio (Typical), 800 nits Max Brightness (Typical); 1200 nits Max Brightness (HDR), Fingerprint-resistant Oleophobic Coating, Support for Display of Multiple Languages and Characters Simultaneously', 'img/apple-iphone-12-pro-max-dummyapplefsn-original-imafwgcyauknkgwh.jpg~img/apple-iphone-12-pro-max-dummyapplefsn-original-imafwgcyhmehwy2z.jpg', 'I', '2021-02-13 11:17:02', '2021-02-14 15:20:53'),
(3, 2, 'T-Shirt', 'Striped Men Round Neck Black ', 'ecru and elastic cords are sturdy..it has two inside pockets. The reflective line is bright with light. Dual colour', 'img/m-40663green-wildcraft-original-imaftjuddzvkfucd.jpg~img/m-40663green-wildcraft-original-imaftjudmtnsmatm.jpg', 'A', '2021-02-13 11:20:57', '2021-02-13 17:34:18'),
(4, 2, 'shoes', 'Running Shoes For Men', 'A true streetwear staple, the classic beanie is so much more than just a utilitarian head-warmer. Add the heritage look of the adidas Trefoil, and you\'ve got your sporty look locked down. Turn up the cuff and head out the door.', 'img/combo-sandoz-blk-mapro-r-bl-8-jabra-black-royal-blue-original-imafy49utsthmqgx.jpg~img/mapro-r-blue-6-jabra-blue-original-imafxwdhhp4nvrdh.jpg', 'A', '2021-02-13 11:23:20', '2021-02-13 17:34:19'),
(5, 3, 'Bat Grip', 'Nodens Cricket Bat Grip, (Multicolour Pack of 6) Mesh Grip', 'The batsman in the game of cricket has an exceptionally challenging role to play as he is the one who takes the game forward for his team. Having a cricket bat with the right grip can make a world of difference to the player\'s ability to hit everything from singles to sixers. ', 'img/cricket-bat-grip-6-multicolour-pack-of-6-nodens-original-imafjyahe8gs9hmt.jpg~img/cricket-bat-grip-multicolour-pack-of-6-6-cricket-bat-grip-nodens-original-imafjyzfsed6ag29.jpg', 'A', '2021-02-13 11:25:14', '2021-02-13 17:34:20'),
(6, 3, 'Road Cycle', 'HERCULES Storm NV 26 T Road Cycle', 'With the HERCULES Storm NV 26 T Road Cycle, you can explore the beauty of nature, night, and rough terrains with comfort and safety. This cycle features Anti-skid Pedals for safety, a Steel Frame for sturdiness and comfort, and a Quick Release Seat Post to adjust the seat as per your need.', 'img/storm-nv-17-hercules-single-speed-original-imafwftqdt9w64bf.jpg~img/storm-nv-17-hercules-single-speed-original-imafwftqsjfzwyca.jpg', 'A', '2021-02-13 11:26:50', '2021-02-13 17:34:23'),
(7, 1, 'Realme 7', '8 GB RAM | 128 GB ROM | Expandable Upto 256 GB', 'Take advantage of this realme smartphone’s 64 MP quad camera and click stunning photos. This phone also comes with a bunch of cool filters that’ll make night photography all the more amazing. In addition, this smartphone’s Helio G95 Gaming Processor makes it one powerful performer.', 'img/realme-7-rmx2151-original-imafv7fzhnxkmdhx.jpeg~img/realme-7-rmx2151-original-imafv7236kaudjhk.jpeg', 'A', '2021-02-13 15:23:32', '2021-02-13 17:34:25'),
(8, 1, ' iPhone SE 2', 'Apple iPhone SE (White, 64 GB) (Includes EarPods, Power Adapter)', 'iPhone SE is the most powerful 11.94-cm (4.7) iPhone ever. It features the incredibly-fast A13 Bionic for incredible performance in apps, games, and photography, Portrait mode for studio-quality portraits and six lighting effects, Next-generation Smart HDR for incredible detail across highlights and shadows, Cinematic-quality 4K video, and all the advanced features of iOS. With long battery life and water resistance, it’s so much of the iPhone you love, in a not-so-big size.', 'img/apple-iphone-se-mxd12hn-a-original-imafrcqfftzjrwbr.jpeg~img/apple-iphone-se-mxd12hn-a-original-imafrcqfsuzwa3dz.jpeg', 'A', '2021-02-13 16:29:06', '2021-02-13 17:34:27'),
(9, 4, 'Washing machine', 'Washing machine is a good product', 'Washing machine is a good product', 'img/storm-nv-17-hercules-single-speed-original-imafwftqdt9w64bf.jpg~img/storm-nv-17-hercules-single-speed-original-imafwftqsjfzwyca.jpg', 'A', '2021-02-14 15:18:07', '2021-02-14 15:18:07'),
(10, 5, 'japan food', 'japan food is good in taste', 'snake food is super & higenic', 'img/m-40663green-wildcraft-original-imaftjuddzvkfucd.jpg~img/m-40663green-wildcraft-original-imaftjudmtnsmatm.jpg', 'I', '2021-02-14 17:44:06', '2021-02-14 17:48:53');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_type` enum('A','U') COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('A','I') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'A',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `user_type`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `address`, `city`, `state`, `country`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'admin', 'A', '6025150dad0ba', '$2y$13$fnL4VxFMdLSf0egIGfHk9Ohiwq5qIz9cfpNl6W5IAU.PzLDTfBGbu', NULL, 'admin@gmail.com', 'chennai', 'chennai', 'chennai', 'chennai', 'A', '2021-02-11 11:29:17', '2021-02-14 15:55:22', NULL),
(26, 'jagan', 'U', '602961f13c315', '$2y$13$9mg/1ieX97JEZi83LK9KrenHUM8e.KTiZ.ejGIrIZ6/wgfsMB7p6W', NULL, 'jagan@gmail.com', 'chennai', 'chennai', 'tn', 'in', 'A', '2021-02-14 17:46:25', '2021-02-14 17:46:25', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `customer_product_management`
--
ALTER TABLE `customer_product_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_name` (`product_name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer_product_management`
--
ALTER TABLE `customer_product_management`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
