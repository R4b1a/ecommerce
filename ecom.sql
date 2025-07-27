-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2025 at 06:57 PM
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
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `message`, `submitted_at`) VALUES
(1, 'rabia', 'rabiafakhara@gmail.com', 'hello', '2025-07-20 11:55:15');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `fathername` varchar(100) DEFAULT NULL,
  `cnic` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `fullname`, `fathername`, `cnic`, `address`, `payment_method`, `created_at`) VALUES
(1, 'rabia', 'fakhar ali', '35302-6121718-8', '123456', 'paypal', '2025-07-20 16:52:51'),
(2, 'rabia', 'fakhar ali', '35302-6121718-8', '1234', 'cash', '2025-07-20 16:53:13');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `description`, `category`) VALUES
(1, 'Evara Embroidered Shirt', 14000.00, 'black dress.webp', 'Elegant Evara Embroidered Shirt with fine details.', 'wardrobe'),
(2, 'Wisteria Floral Co Ord Set', 6950.00, 'wisteria-floral-co-ord-set.webp', 'Stylish floral co-ord set, soft and breezy.', 'wardrobe'),
(3, 'Biscotti Long Dress', 3950.00, 'caster-lace-long-dress.webp', 'Graceful long dress in soft Biscotti tone.', 'wardrobe'),
(4, 'Fiora Pink Dress', 12950.00, 'fiora-pink-dress-and-upper.webp', 'Charming pink dress with matching upper.', 'wardrobe'),
(5, 'Rua Beige Long Dress', 6950.00, 'rua-beige-muslin-long-dress.webp', 'Elegant long muslin dress in beige tone.', 'wardrobe'),
(6, 'Mousse Ruffle Shirt', 5950.00, 'mousse ruffle shirt.webp', 'Trendy ruffle shirt in creamy mousse color.', 'wardrobe'),
(7, 'Feeha Cinched Silk Shirt', 4950.00, 'Feeha Cinched Silk Shirt.webp', 'Luxury cinched-fit silk shirt by Feeha.', 'wardrobe'),
(8, 'Muskell Gathered Shirt', 4950.00, 'Muskell Gathered Shirt.webp', 'Stylish gathered shirt with soft fabric.', 'wardrobe'),
(9, 'Enigma Perfume For Women', 3434.00, 'enigma_1_.webp', 'Elegant floral scent for women.', 'fragrances'),
(10, 'Euphoria Perfume For Men', 3434.00, 'euphoria_1_.webp', 'Fresh and bold scent for men.', 'fragrances'),
(11, 'Ignite Perfume For Men', 7190.00, 'ignite.webp', 'Strong and spicy fragrance.', 'fragrances'),
(12, 'Apex Perfume For Women', 3390.00, 'apex_perfume_for_women_2_.webp', 'Soft and sweet scent for women.', 'fragrances'),
(13, 'Adore Bliss Perfume for Women', 4990.00, 'adore_bliss_2_.webp', 'Romantic and blissful fragrance.', 'fragrances'),
(14, 'Lattafa Yara for Women', 5300.00, 'Lattafa_Yara_for_Women.webp', 'Luxurious daily wear fragrance.', 'fragrances'),
(15, 'Narciso Rodriquez Bleu Noir', 10000.00, 'bleu-noir-1.jpg', 'Long-lasting musky fragrance.', 'fragrances'),
(16, 'Rue Broca League Arena', 3000.00, 'rue broca league arena.webp', 'Affordable fragrance with bold notes.', 'fragrances'),
(17, 'Silver Stainless Steel Black Dial Automatic Watch for Gents', 47000.00, 'watch 1.webp', 'Stylish automatic silver gents watch.', 'watches'),
(18, 'Gold Stainless Steel Black Dial Automatic Watch for Gents', 45495.00, 'watch2.webp', 'Elegant gold watch for formal wear.', 'watches'),
(19, 'Rolex Datejust II Black Dial Gents Watch', 167900.00, 'watch3.webp', 'Premium Rolex timepiece for men.', 'watches'),
(20, 'Emporio Armani Diver Silver Stainless Steel Mesh Blue Dial Quartz Watch for Gents', 75390.00, 'watch4.jpg', 'Luxury diving watch with mesh strap.', 'watches'),
(21, 'Tommy Hilfiger for Ladies', 14990.00, 'watch5.jpg', 'Trendy and sleek ladies watch.', 'watches'),
(22, 'VIVIENNE WESTWOOD for Ladies', 55300.00, 'watch6.jpg', 'Designer piece with elegant finish.', 'watches'),
(23, 'Tissot Classic Dream Lady', 20000.00, 'watch7.png', 'Timeless classic lady’s watch.', 'watches'),
(24, 'Tissot PR516 Powermatic 80', 30000.00, 'watch8.png', 'Power reserve and elegant design.', 'watches'),
(25, 'Slumber party gel based sleep mask', 2600.00, 'skincare1.webp', 'Hydrating overnight gel mask.', 'skincare'),
(26, 'Medicube - Deep VIT C Pad -150g', 8700.00, 'skincare2.webp', 'Brightening Vitamin C facial pads.', 'skincare'),
(27, 'Medicube - Collagen Night Wrapping Mask - 75ml', 8800.00, 'skincare3.webp', 'Firming collagen night mask.', 'skincare'),
(28, 'Savannah - Beauté Oil Control Aloe Vera Facewash - 100 ml', 399.00, 'skincare4.webp', 'Aloe-based oil control cleanser.', 'skincare'),
(29, 'Cosrx - Low Ph Good Morning Gel Cleanser - 150ml', 5138.00, 'skincare5.webp', 'Gentle low pH cleanser.', 'skincare'),
(30, 'Refining Bomb Mist With Watermelon', 690.00, 'skincare6.jpg', 'Refreshing watermelon face mist.', 'skincare'),
(31, 'Anua - Peach 77 Niacin Essence Toner - 250ml', 9000.00, 'skincare7.webp', 'Brightening peach toner.', 'skincare'),
(32, 'Janssen - Brightening Night Care 50ml', 5450.00, 'skincare8.webp', 'Night cream for glowing skin.', 'skincare'),
(33, 'Cat-Eye Glasses', 4600.00, 'eyewear1.avif', 'Stylish cat-eye frame perfect for everyday chic.', 'eyewear'),
(34, 'Cat-Eye Glasses', 7700.00, 'eyewear2.avif', 'Elegant cat-eye glasses with premium finish.', 'eyewear'),
(35, 'Aviator Glasses', 78000.00, 'eyewear3.avif', 'Luxury aviator-style glasses for a bold look.', 'eyewear'),
(36, 'Aviator Glasses', 5399.00, 'eyewear4.avif', 'Trendy aviator frames with a sleek design.', 'eyewear'),
(37, 'Sepulveda Round Glasses', 5183.00, 'eyewear5.avif', 'Classic round glasses with a modern touch.', 'eyewear'),
(38, 'Bravo Browline', 4690.00, 'eyewear6.avif', 'Sharp browline frames to elevate your style.', 'eyewear'),
(39, 'World View', 3000.00, 'eyewear7.avif', 'Lightweight and versatile eyewear for daily use.', 'eyewear'),
(40, 'Browline Glasses', 3600.00, 'eyewear8.avif', 'Retro-inspired browline glasses for every face.', 'eyewear');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`) VALUES
(1, 1, 'evara-embriodered-shirt-2.webp'),
(2, 1, 'evara-embriodered-shirt-3.webp'),
(3, 1, 'evara-embriodered-shirt-4.webp'),
(4, 1, 'evara-embriodered-shirt-5.webp'),
(5, 2, 'wisteria1.webp'),
(6, 2, 'wisteria2.webp'),
(7, 2, 'wisteria3.webp'),
(8, 2, 'wisteria4.webp'),
(9, 3, 'caster-lace-long-dress-1.webp'),
(10, 3, 'caster-lace-long-dress-2.webp'),
(11, 3, 'caster-lace-long-dress-3.webp'),
(12, 3, 'caster-lace-long-dress-4.webp'),
(13, 4, 'fiora-pink-dress-and-upper-1.webp'),
(14, 4, 'fiora-pink-dress-and-upper-2.webp'),
(15, 4, 'fiora-pink-dress-and-upper-3.webp'),
(16, 4, 'fiora-pink-dress-and-upper-4.webp'),
(17, 5, 'rua-beige-muslin-long-dress-1.webp'),
(18, 5, 'rua-beige-muslin-long-dress-2.webp'),
(19, 5, 'rua-beige-muslin-long-dress-3.webp'),
(20, 5, 'rua-beige-muslin-long-dress-4.webp'),
(21, 6, 'mousse ruffle shirt1.webp'),
(22, 6, 'mousse ruffle shirt2.webp'),
(23, 6, 'mousse ruffle shirt3.webp'),
(24, 6, 'mousse ruffle shirt4.webp'),
(25, 7, 'Feeha Cinched Silk Shirt1.webp'),
(26, 7, 'Feeha Cinched Silk Shirt2.webp'),
(27, 7, 'Feeha Cinched Silk Shirt3.webp'),
(28, 7, 'Feeha Cinched Silk Shirt4.webp'),
(29, 8, 'muskell-gathered-shirt-1.webp'),
(30, 8, 'muskell-gathered-shirt-2.webp'),
(31, 8, 'muskell-gathered-shirt-3.webp'),
(32, 8, 'muskell-gathered-shirt-4.webp'),
(33, 9, '1.webp'),
(34, 9, '2.webp'),
(35, 9, '3.jpg'),
(36, 9, 'enigma_1_.webp'),
(37, 10, 'euphoria1.webp'),
(38, 10, 'euphoria2.webp'),
(39, 10, 'euphoria_1_.webp'),
(40, 10, 'euphoria1.webp'),
(41, 11, 'ignite1.webp'),
(42, 11, 'ignite2.webp'),
(43, 11, 'ignite3.webp'),
(44, 11, 'ignite4.webp'),
(45, 12, 'apex_perfume_for_women_2-1.webp'),
(46, 12, 'apex_perfume_for_women_2-2.webp'),
(47, 12, 'apex_perfume_for_women_2_.webp'),
(48, 12, 'apex_perfume_for_women_2-1.webp'),
(49, 13, 'adore_bliss1.webp'),
(50, 13, 'adore_bliss2.webp'),
(51, 13, 'adore_bliss3.webp'),
(52, 13, 'adore_bliss_2_.webp'),
(53, 14, 'Lattafa Yara for Women 1.jpg'),
(54, 14, 'Lattafa Yara for Women 2.webp'),
(55, 14, 'Lattafa Yara for Women 3.jpg'),
(56, 14, 'Lattafa Yara for Women 4.jpg'),
(57, 15, 'bleu-noir-1-1.jpg'),
(58, 15, 'bleu-noir-1-2.jpg'),
(59, 15, 'bleu-noir-1-3.jpg'),
(60, 15, 'bleu-noir-1-4.jpg'),
(61, 16, 'rue broca 1.jpg'),
(62, 16, 'rue broca 2.jpg'),
(63, 16, 'rue broca 3.jpg'),
(64, 16, 'rue broca 4.jpg'),
(65, 21, 'watch5-1.jpg'),
(66, 21, 'watch5-2.jpg'),
(67, 21, 'watch5-3.jpg'),
(68, 21, 'watch5-4.jpg'),
(69, 22, 'watch6-1.avif'),
(70, 22, 'watch6-2.avif'),
(71, 22, 'watch6-3.avif'),
(72, 22, 'watch6-4.avif'),
(73, 23, 'watch7-1.png'),
(74, 23, 'watch7-2.png'),
(75, 23, 'watch7-3.png'),
(76, 23, 'watch7-4.png'),
(77, 24, 'watch8-1.png'),
(78, 24, 'watch8-2.png'),
(79, 24, 'watch8-3.png'),
(80, 24, 'watch8-4.png'),
(81, 25, 'sklincare1-1.webp'),
(82, 25, 'skincare1-2.webp'),
(83, 25, 'skincare1-3.webp'),
(84, 25, 'skincare1.webp'),
(85, 33, 'eyewear1-1.avif'),
(86, 33, 'eyewear1-2.avif'),
(87, 33, 'eyewear1-3.avif'),
(88, 33, 'eyewear1-4.avif'),
(89, 34, 'eyewear2-1.avif'),
(90, 34, 'eyewear2-2.avif'),
(91, 34, 'eyewear2-3.avif'),
(92, 34, 'eyewear2-4.avif'),
(93, 35, 'eyewear3-1.avif'),
(94, 35, 'eyewear3-2.avif'),
(95, 35, 'eyewear3-3.avif'),
(96, 35, 'eyewear3-4.avif'),
(97, 36, 'eyewear4-1.avif'),
(98, 36, 'eyewear4-2.avif'),
(99, 36, 'eyewear4-3.avif'),
(100, 36, 'eyewear4-4.webp'),
(101, 37, 'eyewear5-1.avif'),
(102, 37, 'eyewear5-2.avif'),
(103, 37, 'eyewear5-3.avif'),
(104, 37, 'eyewear5.avif'),
(105, 38, 'eyewear6-1.avif'),
(106, 38, 'eyewear6-2.avif'),
(107, 38, 'eyewear6-3.avif'),
(108, 38, 'eyewear6.avif'),
(109, 39, 'eyewear7-1.avif'),
(110, 39, 'eyewear7-2.avif'),
(111, 39, 'eyewear7-3.avif'),
(112, 39, 'eyewear7-4.avif'),
(113, 40, 'eyewear8-1.avif'),
(114, 40, 'eyewear8-2.avif'),
(115, 40, 'eyewear8-3.avif'),
(116, 40, 'eyewear8-4.avif');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `phone`, `password`, `created_at`) VALUES
(1, 'rabia', 'rabiafakhara@gmail.com', '123234', '$2y$10$rp82PqOP0gjRPgF9Q7uBVuP3FJllih6qUhK4CAxyh9ZUNmqxf09ry', '2025-07-20 11:52:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
