-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2021 at 11:16 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

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
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(100) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_image` text NOT NULL,
  `admin_contact` varchar(100) NOT NULL,
  `admin_country` text NOT NULL,
  `admin_job` varchar(255) NOT NULL,
  `admin_about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_contact`, `admin_country`, `admin_job`, `admin_about`) VALUES
(1, 'Fardeen Siddiqui', 'fardeenhassan98@gmail.com', 'oiiyee', 'MYPIC.jpg', '56478432', 'India', 'Data science', '');

-- --------------------------------------------------------

--
-- Table structure for table `box_section`
--

CREATE TABLE `box_section` (
  `box_id` int(100) NOT NULL,
  `box_title` varchar(255) NOT NULL,
  `box_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `box_section`
--

INSERT INTO `box_section` (`box_id`, `box_title`, `box_desc`) VALUES
(1, 'BEST PRICE', 'You can check all others sites about the prices and then compare with us.'),
(2, '100% SATISFACTION GUARANTEED FROM US', 'Free breturns on everything for 3 months'),
(3, 'WE LOVE OUR CUSTOMERS', 'We are known to provide best possible service ever.');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(100) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(100) NOT NULL,
  `size` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`p_id`, `ip_add`, `qty`, `size`) VALUES
(15, '::1', 1, 'Medium');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL,
  `cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_desc`) VALUES
(1, 'Men', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Est pariatur minus repellat ab consequuntur totam inventore distinctio ex. Omnis repudiandae repellat quam nemo harum, recusandae ab vero perferendis necessitatibus id.'),
(2, 'Women', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Est pariatur minus repellat ab consequuntur totam inventore distinctio ex. Omnis repudiandae repellat quam nemo harum, recusandae ab vero perferendis necessitatibus id.'),
(3, 'Kids', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Est pariatur minus repellat ab consequuntur totam inventore distinctio ex. Omnis repudiandae repellat quam nemo harum, recusandae ab vero perferendis necessitatibus id.'),
(4, 'Others ', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Est pariatur minus repellat ab consequuntur totam inventore distinctio ex. Omnis repudiandae repellat quam nemo harum, recusandae ab vero perferendis necessitatibus ids.');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(100) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_email` varchar(255) NOT NULL,
  `c_subject` varchar(255) NOT NULL,
  `c_massage` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `c_name`, `c_email`, `c_subject`, `c_massage`) VALUES
(1, 'fardeen', 'fhassansidq@gmail.com', 'problem to facing order time ', 'My name is fardeen hassan siddiqui '),
(2, 'fardeen', 'fhassansidq@gmail.com', 'problem to facing order time ', 'My name is fardeen hassan siddiqui '),
(3, 'fardeen', 'fhassansidq@gmail.com', 'problem to facing order time ', 'My name is fardeen hassan siddiqui '),
(4, 'Fardeen', 'fardeen@gmail.com', 'payment issues', 'When i pay for any product then say bank account issues but i checked by bank.'),
(5, 'Fardeen', 'fardeen@gmail.com', 'payment issues', 'When i pay for any product then say bank account issues but i checked by bank.'),
(6, 'Fardeen', 'fardeen@gmail.com', 'payment issues', 'When i pay for any product then say bank account issues but i checked by bank.'),
(7, 'Fardeen', 'fardeen@gmail.com', 'payment issues', 'When i pay for any product then say bank account issues but i checked by bank.'),
(8, 'Fardeen', 'fardeen@gmail.com', 'payment issues', 'When i pay for any product then say bank account issues but i checked by bank.'),
(9, 'fardeen_786', 'fardeenhsiddiqui98@gmail.com', 'problem to facing order time ', 'iam '),
(10, 'fardeen_786', 'fardeenhsiddiqui98@gmail.com', 'problem to facing order time ', 'iam '),
(11, 'fardeen_786', 'fardeenhsiddiqui98@gmail.com', 'problem to facing order time ', 'iam '),
(12, 'fardeen_786', 'fardeenhsiddiqui98@gmail.com', 'problem to facing order time ', 'iam '),
(13, 'fardeen_786', 'fardeenhsiddiqui98@gmail.com', 'problem to facing order time ', 'iam '),
(14, 'far', 'fardeenhsiddiqui98@gmail.com', 'problem to facing order time ', 'hahghjkhak'),
(15, 'far', 'fardeenhsiddiqui98@gmail.com', 'problem to facing order time ', 'hahghjkhak'),
(16, 'far', 'fardeenhsiddiqui98@gmail.com', 'problem to facing order time ', 'hahghjkhak'),
(17, 'far', 'fardeenhsiddiqui98@gmail.com', 'problem to facing order time ', 'hahghjkhak'),
(18, 'fdgfhg', 'fardeenhsiddiqui98@gmail.com', 'gfghkj', 'gyugiuhi'),
(19, 'dfhjgkjh', 'mrfcsetech123@gmail.com', 'hlllo raif bhai', 'hlllo raif bhai'),
(20, 'fdgfhg', 'fardeenhsiddiqui98@gmail.com', 'gfghkj', 'gyugiuhi');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(100) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(255) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_image` text NOT NULL,
  `customer_ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`) VALUES
(1, 'siddiqui1', 'fhassansidq@gmail.com', '465768', 'india', 'DARBHANGA', '6205213878', 'wheelar ganj gudari bajar laheriyasarai  darbhanga', 'MYPIC.jpg', '::1'),
(2, 'Hassan', 'fardeen98@gmail.com', '12345', 'india', 'DARBHANGA', '6205213878', 'wheelar ganj gudari bajar laheriyasarai  darbhanga', 'faiz pic.jpg', '::1'),
(5, 'siddiqui', 'fardeen@gmail', '12345', 'india', 'DARBHANGA', '620521387', 'wheelar ganj gudari bajar laheriyasarai  darbhanga', 'logo3.jpg', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `product_id` int(100) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`order_id`, `customer_id`, `product_id`, `due_amount`, `invoice_no`, `qty`, `size`, `order_date`, `order_status`) VALUES
(19, 2, 4, 2000, 968777077, 4, 'Large', '2020-12-10 13:16:20', 'pending'),
(20, 2, 3, 450, 968777077, 1, 'Small', '2020-12-10 13:17:58', 'pending'),
(21, 1, 5, 600, 2090333779, 2, 'Medium', '2020-12-10 13:16:34', 'Complete'),
(22, 1, 8, 1500, 1147898092, 3, 'Large', '2020-12-10 13:17:30', 'Complete'),
(23, 1, 10, 20000, 1992738888, 2, 'Small', '2020-12-10 13:16:48', 'Complete'),
(24, 1, 12, 1200, 2062932935, 2, 'Small', '2020-12-10 13:17:23', 'pending'),
(26, 2, 16, 1400, 617102756, 2, 'Small', '2020-12-13 14:10:20', 'pending'),
(27, 2, 12, 500, 786576361, 1, 'Large', '2021-01-04 16:43:01', 'pending'),
(28, 2, 14, 500, 786576361, 1, 'Large', '2021-01-04 16:43:01', 'pending'),
(29, 2, 8, 10000, 786576361, 1, '', '2021-01-04 16:43:01', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `payment_mode` text NOT NULL,
  `ref_no` int(100) NOT NULL,
  `payment_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `invoice_no`, `amount`, `payment_mode`, `ref_no`, `payment_date`) VALUES
(1, 143254364, 2000, 'PayuMoney', 136578454, '2020-11-28'),
(3, 143254364, 2000, 'Paypal', 136578454, '2020-11-28'),
(4, 124456466, 2000, 'PayuMoney', 4563456, '2020-11-28'),
(5, 344467, 2000, 'Paypal', 434564534, '2020-11-29'),
(6, 344467, 4556, 'PayuMoney', 4455676, '2020-11-25');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `p_cat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_desc` text NOT NULL,
  `product_keyword` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `p_cat_id`, `cat_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_desc`, `product_keyword`) VALUES
(4, 4, 1, '2020-11-13 04:46:04', 'BENTTON White Polo Shirt', 't2.jpeg', '', '', 450, 'BENTTON White Polo Killer Shirt are available in easly in my shop', 'Killer Shirt'),
(5, 4, 1, '2020-12-08 18:11:39', 'BENTTON White Polo Shirt', 'tshirt1.jpeg', 'tshirt1.jpeg', 'tshirt1.jpeg', 550, '<p>BENTTON White Polo shirt..</p>', 'Killer Shirt'),
(6, 2, 4, '2020-11-13 05:18:14', 'Blanket Winter season offer', 'blanket1.jpeg', '', '', 10000, 'Blanket winter season item and it very good product', 'Blanket winter season item'),
(8, 2, 4, '2020-11-13 05:11:19', 'Blanket Winter season offer', 'blanket2.jpeg', '', '', 10000, 'Blanket winter season item', 'Blanket winter season item'),
(12, 4, 1, '2020-11-13 06:14:51', 'BENTTON White Polo Shirt', 'tshirt1.jpeg', '', '', 500, 'BENTTON White Polo shirt', 'Killer Shirt'),
(13, 7, 1, '2020-12-16 09:35:42', 'Trouser in all sizes ', 'trouser.jpeg', '', '', 450, 'Killer Trouser', 'Killer Trouser and Trouser'),
(14, 7, 1, '2020-11-13 08:11:36', 'Trouser in all sizes ', 'tr1.jpeg', '', '', 500, 'Trouser in all sizes ', 'Killer Trouser'),
(15, 5, 1, '2020-11-13 08:13:28', 'Killer Blue Jeans', 'l2.jpeg', '', '', 600, 'Killer Jeans', 'Killer Jeans'),
(16, 5, 1, '2020-11-13 08:15:05', 'Killer Blue Jeans', 'l1.jpeg', '', '', 700, 'Killer Jeans', 'Killer Jeans');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `p_cat_id` int(10) NOT NULL,
  `p_cat_title` text NOT NULL,
  `p_cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`p_cat_id`, `p_cat_title`, `p_cat_desc`) VALUES
(2, 'Accessories', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Est pariatur minus repellat ab consequuntur totam inventore distinctio ex. Omnis repudiandae repellat quam nemo harum, recusandae ab vero perferendis necessitatibus id.'),
(3, 'Shoes', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Est pariatur minus repellat ab consequuntur totam inventore distinctio ex. Omnis repudiandae repellat quam nemo harum, recusandae ab vero perferendis necessitatibus id.'),
(4, 'T-Shirts', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Est pariatur minus repellat ab consequuntur totam inventore distinctio ex. Omnis repudiandae repellat quam nemo harum, recusandae ab vero perferendis necessitatibus id.'),
(5, 'Jeans', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Assumenda earum in, accusamus voluptas nobis veritatis quia optio blanditiis minima quis, fuga sunt ea? Quasi non suscipit quaerat corporis praesentium eaque.'),
(6, 'Winter Items', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Assumenda earum in, accusamus voluptas nobis veritatis quia optio blanditiis minima quis, fuga sunt ea? Quasi non suscipit quaerat corporis praesentium eaque.'),
(7, 'Trouser', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Assumenda earum in, accusamus voluptas nobis veritatis quia optio blanditiis minima quis, fuga sunt ea? Quasi non suscipit quaerat corporis praesentium eaque.');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(10) NOT NULL,
  `slider_name` varchar(255) NOT NULL,
  `slider_image` text NOT NULL,
  `slider_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `slider_name`, `slider_image`, `slider_url`) VALUES
(1, 'slider number 1', 'la.jpg', 'http://localhost/faazmark/details.php?pro_id=12'),
(2, 'slider number 2', 'ny.jpg', 'http://localhost/faazmark/details.php?pro_id=15'),
(3, 'slider_number 3 ', 'chicago.jpg', 'http://localhost/faazmark/details.php?pro_id=15'),
(5, 'slider 4   ', '3.jpeg', ' http://localhost/faazmark/details.php?pro_id=3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `box_section`
--
ALTER TABLE `box_section`
  ADD PRIMARY KEY (`box_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`p_cat_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `box_section`
--
ALTER TABLE `box_section`
  MODIFY `box_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `p_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
