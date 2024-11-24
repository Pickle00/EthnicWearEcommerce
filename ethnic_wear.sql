-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2024 at 03:04 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ethnic_wear`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `name`, `email`, `password`) VALUES
(1, 'Nikita', 'admin@gmail.com', '123'),
(2, 'Podu', 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `oid` int(255) NOT NULL,
  `uid` int(255) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `order_date` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`oid`, `uid`, `pname`, `price`, `size`, `fname`, `lname`, `email`, `order_date`, `address`, `phone_no`, `img`, `status`) VALUES
(1, 1, 'Heavy Embroidered Magar Cultural Dress', 20000, 'medium', 'Nitika', 'Rumal', 'nitika@gmail.com', '2024-09-18', 'Bhutandevi', '9865500240', 'Heavy Embroidered Magar Cultural Dress.jpg', 'Confirmed'),
(2, 1, 'Magar Gurung Hand Embroidered Traditional Lehenga Dress', 20000, 'large', 'Nitika', 'Rumal', 'nitika@gmail.com', '2024-09-18', 'Bhutandevi', '9865500240', 'Magar Gurung Designer Hand Embroidered Traditional Lehenga Dress.jpg', 'Confirmed'),
(3, 1, 'Nepali Traditional Daura Suruwal for Men – Lopho (grey)', 2000, 'medium', 'Nitika', 'Rumal', 'nitika@gmail.com', '2024-09-19', 'Bhutandevi road', '9865500240', 'Nepali Traditional Daura Suruwal for Men – Lopho (grey).png', 'Processing'),
(4, 1, 'Bhadgaule topi', 500, '', 'Nitika', 'Rumal', 'nitika@gmail.com', '2024-09-19', 'Bhutandevi road', '9865500240', 'Bhadgaule topi.png', 'Processing'),
(5, 1, 'Badge Cross Khukuri with Flag and Map of Nepal', 2000, '', 'Nitika', 'Rumal', 'nitika@gmail.com', '2024-09-19', 'Bhutandevi road', '9865500240', 'Badge Cross Khukuri with Flag and Map of Nepal.png', 'Processing'),
(6, 2, 'Nepali Traditional Daura Suruwal for Men – Lopho (grey)', 2000, 'medium', 'Bikal', 'Rumba', 'bikal@gmail.com', '2024-09-19', 'Bhutandevi road', '9821298813', 'Nepali Traditional Daura Suruwal for Men – Lopho (grey).png', 'Confirmed'),
(7, 2, 'Tamang Topi', 1000, '', 'Bikal', 'Rumba', 'bikal@gmail.com', '2024-09-19', 'Bhutandevi road', '9821298813', 'Tamang Topi.jpeg', 'Confirmed'),
(8, 2, 'Bhadgaule topi', 500, '', 'Bikal', 'Rumba', 'bikal@gmail.com', '2024-09-19', 'Bhutandevi road', '9821298813', 'Bhadgaule topi.png', 'Processing'),
(9, 2, 'Magar Gurung Hand Embroidered Traditional Lehenga Dress', 20000, 'medium', 'Bikal', 'Rumba', 'bikal@gmail.com', '2024-09-21', 'ktm imadol', '9821298813', 'Magar Gurung Designer Hand Embroidered Traditional Lehenga Dress.jpg', 'Processing'),
(10, 2, 'Newari Traditional Dress Hakupatasi Baby Gown set', 7000, 'medium', 'Bikal', 'Rumba', 'bikal@gmail.com', '2024-09-21', 'Hupra', '9821298813', 'Newari Traditional Dress Hakupatasi Baby Gown set.jpg', 'Processing'),
(11, 2, 'Heavy Embroidered Magar Cultural Dress', 20000, 'medium', 'Bikal', 'Rumba', 'bikal@gmail.com', '2024-09-21', 'Bhutandevi road', '9821298813', 'Heavy Embroidered Magar Cultural Dress.jpg', 'Processing');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(255) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `pname`, `price`, `category`, `description`, `gender`, `image`) VALUES
(1, 'Bhotto', 1200, 'Dress', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor voluptates quaerat dignissimos labore nesciunt repellat deserunt id error vitae excepturi repudiandae, in voluptatum totam veniam et quod incidunt saepe enim?\r\n        Exercitationem quam veli', 'male', 'bhoto.jpg'),
(2, 'Heavy Embroidered Magar Cultural Dress', 20000, 'Dress', 'Stunning Heavy Embroidered Magar Cultural Dress, beautifully handcrafted with intricate patterns. This traditional attire reflects the rich heritage of the Magar community, featuring vibrant colors and detailed embroidery. Perfect for cultural events, fes', 'female', 'Heavy Embroidered Magar Cultural Dress.jpg'),
(3, 'Tamang Waist Coat', 1000, 'Dress', 'Elegant Tamang Waist Coat, crafted with traditional design elements that highlight the rich culture of the Tamang community. Made from high-quality fabric, this waistcoat features intricate patterns and a comfortable fit, making it perfect for cultural ev', 'male', 'Tamang Waist Coat.jpeg'),
(4, 'Magar Gurung Hand Embroidered Traditional Lehenga Dress', 20000, 'Dress', 'Exquisite Magar Gurung Designer Hand Embroidered Traditional Lehenga Dress, a stunning blend of cultural heritage and modern design. This beautifully handcrafted lehenga features detailed embroidery that celebrates the rich traditions of the Magar and Gur', 'female', 'Magar Gurung Designer Hand Embroidered Traditional Lehenga Dress.jpg'),
(6, 'Embroidered Dhaka Chaubandi and Saree Set', 25000, 'Dress', 'Embroidered Dhaka Chaubandi and Saree Set, beautifully crafted with intricate patterns. This traditional outfit combines the elegance of a saree with the cultural charm of Dhaka fabric, perfect for special occasions and cultural events.', 'female', 'Embroidered Dhaka Chaubandi and Saree Set.jpg'),
(7, 'Chandrama', 500, 'Head', 'Chandrama Headwear Accessory, a beautifully crafted piece that adds a touch of elegance and sophistication. This accessory features intricate detailing inspired by traditional designs, making it a perfect complement for formal attire or cultural outfits. ', 'female', 'Chandrama.jpeg'),
(8, 'Dhimal Kantha', 250, 'Other', 'Handcrafted with traditional Dhimal patterns, this lightweight and comfortable Kantha adds a touch of cultural elegance to your wardrobe.', 'female', 'Dhimal Kantha.jpeg'),
(9, 'Tamang Topi', 1000, 'Head', 'This handwoven topi showcases the rich cultural heritage of the Tamang community, featuring intricate patterns and durable fabric. Perfect for adding a touch of tradition to your wardrobe, it combines comfort and style, making it suitable for both festive', 'male', 'Tamang Topi.jpeg'),
(10, 'Newari Traditional Dress Hakupatasi Baby Gown set', 7000, 'Dress', 'A beautifully crafted traditional attire for babies, inspired by the rich Newari heritage. This Hakupatasi gown set features intricate detailing and soft fabric, ensuring comfort while showcasing cultural elegance. Perfect for special occasions or cultura', 'female', 'Newari Traditional Dress Hakupatasi Baby Gown set.jpg'),
(11, 'Biru Maala', 200, 'Neckpiece', 'A stunning traditional necklace that reflects the beauty of Nepali craftsmanship. Made with vibrant blue beads, this necklace adds a pop of color to any outfit while honoring cultural heritage. Perfect for both casual wear and special occasions, the Biru ', 'female', 'Biru Maala.jpeg'),
(12, 'Maadwaari', 1500, 'Earrings', 'A traditional Nepali nose ring that symbolizes cultural heritage and elegance. Crafted with intricate designs, this piece adds a timeless charm to any look, making it perfect for weddings, festivals, and special occasions. The Maadwaari is a stunning blen', 'female', 'Maadwaari.jpeg'),
(13, 'Nakh Dhungri', 500, 'Head', 'A beautifully crafted traditional nose pin, symbolizing elegance and cultural heritage. This intricate piece is adorned with a small gemstone, making it a perfect accessory for festive occasions or daily wear. The Nakh Dhungri is a timeless representation', 'female', 'Nakh Dhungri.jpeg'),
(14, 'Nepali Traditional Daura Suruwal for Men – Lopho (grey)', 2000, 'Dress', 'A classic and elegant attire, this grey Daura Suruwal embodies the essence of Nepali tradition. Crafted with premium fabric, the outfit is designed for comfort and style, featuring the iconic double-breasted Daura and tapered Suruwal pants. Perfect for cu', 'male', 'Nepali Traditional Daura Suruwal for Men – Lopho (grey).png'),
(15, 'Badge Cross Khukuri with Flag and Map of Nepal', 2000, 'Other', 'A unique and patriotic accessory, this badge features a crossed Khukuri design, symbolizing bravery and strength, alongside the flag and map of Nepal. Crafted with attention to detail, it represents national pride and cultural heritage, making it a perfec', 'unisex', 'Badge Cross Khukuri with Flag and Map of Nepal.png'),
(16, 'Bhadgaule topi', 500, 'Head', 'A distinctive traditional Nepali hat, known for its unique design and cultural significance. The Bhadgaule Topi features intricate patterns and a classic shape, representing the rich heritage of the Bhadgaon region. Crafted from high-quality fabric, this ', 'male', 'Bhadgaule topi.png'),
(17, 'Modi Coat', 800, 'Dress', 'A stylish and sophisticated coat inspired by traditional Nepali attire, featuring elegant tailoring and refined details. The Modi Coat combines modern design with cultural elements, offering a versatile and polished look. Perfect for formal events or spec', 'male', 'Modi Coat.jpeg'),
(18, 'Magar Dress', 1500, 'Dress', 'A vibrant and culturally rich garment, this Magar Dress features traditional patterns and intricate embroidery that reflect the heritage of the Magar community. Made from high-quality fabric, it combines comfort with elegance, making it perfect for festiv', 'male', 'Magar Dress.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `fname`, `lname`, `email`, `password`) VALUES
(1, 'Nitika', 'Rumal', 'nitika@gmail.com', '123'),
(2, 'Bikal', 'Rumba', 'bikal@gmail.com', '123'),
(3, 'Nikita', 'Rimal', 'nikita@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `oid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
