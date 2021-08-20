-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2021 at 12:31 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hexagon_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE `business` (
  `id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `company_name` varchar(256) NOT NULL,
  `company_city` varchar(256) NOT NULL,
  `company_logo` varchar(256) DEFAULT NULL,
  `phone_number` varchar(256) NOT NULL,
  `aproved` tinyint(1) NOT NULL,
  `document_name` varchar(256) NOT NULL,
  `status` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`id`, `username`, `password`, `name`, `email`, `company_name`, `company_city`, `company_logo`, `phone_number`, `aproved`, `document_name`, `status`) VALUES
(1, 'mergimalidema', '$2y$10$/RKwHm9ScU8ymFV659JpsOuG1CP9bvR.r1ULzG4uufrj1F/U.A6CC', 'Mërgim Alidema', 'mergimalidema@gmail.com', 'KFC', 'Gjilan', 'KFC_Logo.jpg', '045239821', 1, '', 'Active'),
(3, 'filanfisteku', '$2y$10$nA/SaVGliUk7qcQyZaAew.A2DDBA8zXt5/rGQNIouo1W3cpqvjtxC', 'Filan Fisteku', 'filanfisteku@gmail.com', 'Burger King', 'Prishtina', NULL, '0628201588', 1, '', 'Active'),
(6, 'admin', '$2y$10$Dj8SXVGpooLa4fg9aPgLZOAULqfV7n6VtGlEo7msVX5P6R/wvNRzW', 'Admin', 'admin@gmail.com', 'Test', 'Ferizaj', NULL, '045239821', 0, '60f53e0903b3b7.86124861.pdf', ''),
(7, 'frankcarney', '$2y$10$HwEoUyJPasMmycTMa8MMW.8WRKu3xbcfzGbbpcVbPrD4y1W5KkXSi', 'Frank Carney', 'frank@gmail.com', 'Pizza Hut', 'Prishtina', 'pizzaHut.png', '045896325', 1, '60ffe12b4f79f1.30073692.pdf', 'Active'),
(8, 'Burger King', '$2y$10$SWUPsY.MSKG.XQs9ks/sHucNDr5jz82N9jGuMkMc72JEHEGhQEwhS', 'art', 'artrrustemi9@gmail.com', 'Burger King', 'Prishtinë', NULL, '+38345876042', 1, '60f1607074a2f0.91647362.jpg', 'Active'),
(9, 'Dominos', '$2y$10$jVSuQ6GOW.89GIgyMwUdzOdXcozkYFdAKDvEn4LInklboSip6/Ptq', 'test', 'testi@gmail.com', 'Dominos', 'Prishtinë', 'domino-s-pizza-logo.jpg', '045876042', 1, '60f16671e9d324.87348658.jpg', 'Active'),
(10, 'Sach Pizaa', '$2y$10$9KxWvV3e3gQ8QsVHbY8OUO6CNU..cJ9d/4b3zLTFyU/.oZ2kpIMcu', 'Art Rrustemi', 'art_rrustemi@hotmail.com', 'Sach Pizza', 'Prishtinë', 'sachpizza.png', '044500600', 1, '60f167c8baf8a8.76494375.jpg', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `business_id` int(11) NOT NULL,
  `user_id` int(15) NOT NULL,
  `products` varchar(256) NOT NULL,
  `quantities` varchar(256) NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `business_id`, `user_id`, `products`, `quantities`, `date`, `status`) VALUES
(1, 1, 1, '86, 88', '2, 3', '2021-08-18 11:54:23', 'E Realizuar'),
(2, 1, 1, '89, 94', '3, 1', '2021-08-18 19:09:10', 'E Përfunduar'),
(3, 1, 2, '91', '1', '2021-08-10 19:09:35', 'E Realizuar'),
(4, 7, 1, '95, 96', '5, 2', '2021-08-19 19:09:40', 'E Pa Realizuar'),
(5, 7, 2, '96, 97', '2, 2', '2021-08-16 19:09:44', 'E Pa Realizuar'),
(6, 7, 1, '53, 98', '3, 2', '2021-08-20 19:09:47', 'E Pa Realizuar'),
(7, 1, 2, '87, 94', '3, 3', '2021-08-12 19:09:50', 'E Realizuar'),
(8, 1, 1, '89, 90', '3, 5', '2021-08-06 19:09:54', 'E Pa Realizuar'),
(9, 1, 1, '86, 92', '3, 3', '2021-08-20 19:09:56', 'E Pa Realizuar'),
(10, 1, 2, '92', '1', '2021-08-20 19:09:59', 'E Realizuar'),
(11, 1, 1, '87, 91', '1, 1', '2021-08-14 19:10:02', 'E Pa Realizuar'),
(12, 1, 1, '93', '2', '2021-08-16 19:10:05', 'E Realizuar'),
(13, 1, 2, '89, 94', '3, 1', '2021-08-20 19:10:07', 'E Pa Realizuar');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `name` text NOT NULL,
  `email` text NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`name`, `email`, `message`) VALUES
('Mërgim Alidema', 'mergimalidema@gmail.com', 'Test'),
('Filan', 'filanfisteku@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus commodo dolor eget ligula tempus, id consectetur nisi faucibus. Quisque et mattis mi. Donec mattis tellus et risus fringilla, at auctor risus vehicula. Donec at nisl vel massa molestie lobortis ac quis sapien. Sed fermentum placerat velit congue faucibus. Nunc tristique quam eu sodales luctus. Aliquam iaculis feugiat varius.'),
('Filane', 'filane@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus commodo dolor eget ligula tempus, id consectetur nisi faucibus. Quisque et mattis mi. Donec mattis tellus et risus fringilla, at auctor risus vehicula. Donec at nisl vel massa molestie lobortis ac quis sapien. Sed fermentum placerat velit congue faucibus. Nunc tristique quam eu sodales luctus. Aliquam.'),
('Mergim', 'mergimalidema@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus commodo dolor eget ligula tempus, id consectetur nisi faucibus. Quisque et mattis mi. Donec mattis tellus et risus fringilla, at auctor risus vehicula. Donec at nisl vel massa molestie lobortis ac quis sapien. Sed fermentum placerat velit congue faucibus. Nunc tristique quam eu sodales luctus. Aliquam iaculis feugiat varius.');

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE `inbox` (
  `id` int(10) NOT NULL,
  `sender_id` int(10) NOT NULL,
  `receiver_id` int(10) NOT NULL,
  `subject` varchar(256) NOT NULL,
  `message` varchar(256) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inbox`
--

INSERT INTO `inbox` (`id`, `sender_id`, `receiver_id`, `subject`, `message`, `data`) VALUES
(1, 1, 1, 'Aprovim', 'Klient i nderuar biznesi juaj eshte aprovuar me sukses', '2021-08-19'),
(2, 1, 3, 'Aprovim', 'Klient i nderuar biznesi juaj eshte aprovuar me sukses', '2021-08-19'),
(3, 1, 7, 'Aprovim', 'Klient i nderuar biznesi juaj eshte aprovuar me sukses', '2021-08-19'),
(4, 1, 8, 'Aprovim', 'Klient i nderuar biznesi juaj eshte aprovuar me sukses', '2021-08-19'),
(5, 1, 9, 'Aprovim', 'Klient i nderuar biznesi juaj eshte aprovuar me sukses', '2021-08-19'),
(6, 1, 10, 'Aprovim', 'Klient i nderuar biznesi juaj eshte aprovuar me sukses', '2021-08-19'),
(7, 1, 9, 'Suspendim', 'Per shkak te shkelejve te rregullave tona, ju jeni i suspenduar', '2021-08-19'),
(8, 1, 9, 'Aktivizim', 'Ju jeni aktivizuar', '2021-08-19'),
(9, 1, 9, 'Inactive', 'Llogaria juaj eshte jo aktive', '2021-08-19'),
(10, 1, 9, 'Aktive', 'Jeni aktivizuar me sukses', '2021-08-19');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `email` varchar(250) NOT NULL,
  `key` varchar(250) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `business_id` int(11) NOT NULL,
  `item_offer` tinyint(1) NOT NULL,
  `item_name` varchar(256) NOT NULL,
  `item_picture` varchar(256) NOT NULL,
  `item_ingridients` varchar(256) DEFAULT NULL,
  `item_price` float NOT NULL,
  `item_categorie` varchar(256) NOT NULL,
  `item_views` int(11) NOT NULL,
  `item_sale` int(11) NOT NULL,
  `date_added` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `business_id`, `item_offer`, `item_name`, `item_picture`, `item_ingridients`, `item_price`, `item_categorie`, `item_views`, `item_sale`, `date_added`) VALUES
(46, 3, 0, 'Greek Salad', 'greeksalad.jpg', 'Tomato, Cucumber, Cheese, Red Onion', 1.5, 'Salad', 0, 0, '2021-07-08 08:48:09.953932'),
(52, 7, 0, 'Pizza Margharita', 'Margherita-Pizza.jpg', 'Tomato, Cheese', 3, 'Pizza', 0, 0, '2021-07-28 16:17:48.264618'),
(53, 7, 0, 'Pizza Pepperoni', 'Pepperoni-Pizza.jpg', 'Mozzarella, Chicken Pepperoni, Sliced Mushroom, Fresh Onion', 6, 'Pizza', 0, 0, '2021-07-28 16:40:42.828292'),
(56, 7, 0, 'Carbonara', 'carbonara.jpg', 'Cream, Bacon, Cheese', 4, 'Pasta', 0, 0, '2021-08-19 16:59:18.497818'),
(86, 1, 0, 'Cheese Burger', 'cheeseBurger.png', 'Bun, Ketchup, Mustard, 1 Drumstick Fillet, Cheddar Cheese', 1.49, 'Salad', 0, 0, '2021-08-19 16:26:51.854365'),
(87, 1, 0, 'Original Burger', 'Orignial-Burger.png', 'Bun, Lettuce, Fillet (Original or Zinger)', 2.49, 'Salad', 0, 0, '2021-08-19 16:32:30.590148'),
(88, 1, 0, 'Twister Wrap', 'Twister-compressor.png', 'Tortilla, Pepper Mayo, Lettuce, Chopped Tomatoes, 2 Crispy Strips', 2.79, 'Fast Food', 0, 0, '2021-08-19 16:32:35.373122'),
(89, 1, 0, 'Double Fillet Burger', 'Double-Fillet-Burger.jpg', 'Chicken, Mayonnaise, Cheese', 4.49, 'Fast Food', 0, 0, '2021-08-19 16:34:36.495307'),
(90, 1, 0, 'Tower Burger', 'Tower-Burger.png', 'Bun, Mayonnaise, Iceberg, 1 Fillet (Original or Zinger), Hashbrown, Cheese', 3.96, 'Fast Food', 0, 0, '2021-08-19 16:38:22.183246'),
(91, 1, 0, 'Hot Wings', 'wings.png', 'Chicken wings', 5.69, 'Fast Food', 0, 0, '2021-08-19 16:38:17.240506'),
(92, 1, 0, 'Kream Ball', 'KreamBal.png', 'Chocolate ', 1.49, 'Desert', 0, 0, '2021-08-19 16:44:41.464449'),
(93, 1, 0, 'Strawberry Milkshake', 'Milkshake-Straw.png', 'Strawberry, Milk', 1.49, 'Desert', 0, 0, '2021-08-19 16:44:45.590870'),
(94, 1, 0, 'Chicken Salad', 'Chicken-Salad.png', 'Iceberg, Chopped Tomatoes, Crutons, 1 Fillet, Ceasar Dressing', 2.99, 'Salad', 0, 0, '2021-08-19 16:47:21.765186'),
(95, 7, 0, 'Pasta Bolognese', 'bolognesePastaPizzaHut.jpg', 'Beef, Cheese, Tomato, Garlic', 3.5, 'Pasta', 0, 0, '2021-08-19 17:00:50.789779'),
(96, 7, 0, 'Pizza e Shpisë', 'Piza e eShpise.jpg', 'Cheese, Bacon, Tomato, Mushroom', 4.5, 'Pizza', 0, 0, '2021-08-19 17:02:23.835929'),
(97, 7, 0, 'Samun me suxhuk', 'samunMeSuxhuk.jpg', 'Cheese, Bacon', 1.5, 'Fast Food', 0, 0, '2021-08-19 17:05:58.064652'),
(98, 7, 0, 'Risotto Pule', 'RisottoPule.jpg', 'Rice, Chicken ', 4.5, 'Rice', 0, 0, '2021-08-19 17:05:55.226513'),
(99, 8, 0, 'Whopper', 'Whopper-meal.png', 'Beef, fresh lettuce, creamy mayonnaise, ketchup', 4.49, 'Fast Food', 0, 0, '2021-08-19 17:16:01.441690'),
(100, 8, 0, 'DOUBLE WHOPPER MEAL', 'Double-Whopper-meal.png', 'Topped with juicy tomatoes, fresh lettuce, creamy mayonnaise, ketchup, crunchy pickles', 5.99, 'Fast Food', 0, 0, '2021-08-19 17:17:29.210423'),
(101, 8, 0, 'STEAKHOUSE MEAL', 'steakhouse-new-meal.png', 'freshly grilled beef, cheese, BBQ sauce, fresh tomatoes, lettuce, mayonnaise and hearty roasted crispy onions', 4.99, 'Fast Food', 0, 0, '2021-08-19 17:20:08.879747'),
(102, 8, 0, 'DOUBLE STEAKHOUSE MEAL', 'steakhouse-double-new-meal.png', 'freshly grilled beef, cheese, BBQ sauce, fresh tomatoes, lettuce, mayonnaise and hearty roasted crispy onions', 6.49, 'Fast Food', 0, 0, '2021-08-19 17:21:26.096257'),
(103, 8, 0, 'CHICKEN SALAD', 'chicken-saladKing.png', 'Chicken Salad, juicy chicken, fresh cherry tomatoes', 2, 'Salad', 0, 0, '2021-08-19 17:22:53.148657'),
(104, 8, 0, 'FRESH SALAD', 'fresh-salad.png', 'Cherry tomatoes, cucumber, sweet corn, lettuce and salad dressing', 3, 'Salad', 0, 0, '2021-08-19 17:23:36.855215'),
(105, 8, 0, 'KING FRIES', 'Fries.png', 'Fries ', 5, 'Fast Food', 0, 0, '2021-08-19 17:24:37.000065'),
(106, 9, 0, 'DOMINO\'S AMERICAN HOT PIZZA', 'american-hot-pizza-review-american-hot-pizza-from-pizza-express.jpg', 'Peperoni, Oregano, Onions, Cheese', 6.6, 'Pizza', 0, 0, '2021-08-19 17:42:28.496044'),
(107, 9, 0, 'PIZZA DELUXE', 'deleuxe.png', 'Tomatensaus, mozzarella, bacon, rundergehakt, pepperoni, champignons, paprika & ui', 5, 'Pizza', 0, 0, '2021-08-19 17:48:07.168967'),
(108, 9, 0, 'PIZZA BBQ CHICKEN', 'bbqpiza.png', 'BBQ Sauce, Mozzarella, Tender Chicken Breast Starting', 6.49, 'Pizza', 0, 0, '2021-08-19 17:50:29.932928'),
(109, 9, 0, 'All Meats', 'All MEats.jpg', 'BBQ Sauce, Mozzarella, Beef, Turkey Ham, Pepperoni Starting', 5, 'Pizza', 0, 0, '2021-08-19 17:51:27.029256'),
(110, 9, 0, 'Kosovo', 'Kosovo.jpg', 'Tomato sauce, Mozzarella, Olives, feta cheese, parmesan cheese, Chicken', 6.49, 'Pizza', 0, 0, '2021-08-19 17:53:51.049248'),
(111, 9, 0, 'Pasta Napolitana', 'PastaNapolitana.jpg', 'Fresh napolitana sauce and shredded parmesan cheese', 3.5, 'Pasta', 0, 0, '2021-08-19 17:53:45.689487'),
(112, 9, 0, 'Pasta Pesto', 'PestoPasta.jpg', 'Pesto sauce and shredded parmesan cheese', 5, 'Pasta', 0, 0, '2021-08-19 17:54:33.039294'),
(113, 9, 0, 'Choco Pie', 'F_CHOCOPIE.jpg', 'Freshly oven baked puff pastry filled with Nutella spread and sprinkled with icing sugar', 3, 'Desert', 0, 0, '2021-08-19 17:56:05.925512'),
(114, 9, 0, 'Choco Pizza With Oreo', 'F_CHOCZAO.jpg', 'Freshly oven baked puff pastry filled with Nutella spread and sprinkled with icing sugar and crushed Oreo cookies!', 6.99, 'Desert', 0, 0, '2021-08-19 17:58:27.671452'),
(115, 9, 0, 'Choco Brownie', 'F_CHCBRWNE.jpg', 'delicious pieces of freshly baked chocolate brownies', 1.99, 'Desert', 0, 0, '2021-08-19 18:00:07.939899');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `date_added` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `userid`, `rating`, `date_added`) VALUES
(1, 1, 4, '2021-07-29 22:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `phone_number` varchar(256) NOT NULL,
  `full_name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `phone_number`, `full_name`) VALUES
(1, 'mergimalidemaa', 'mergimalidema@gmail.com', '$2y$10$YExmCYDCGF7JUC9oPKDDveXUr3vSjqmV/0Je3eeeTw4yji9hENJeq', '045239821', 'Mërgim Alidema'),
(2, 'filanfisteku', 'filanfisteku@gmail.com', '$2y$10$0m5VZrIlDpCO1tYTEhH.2OK6e2iOUKTzF5qXSfzNLCY3UIfLBk0Ri', '045369852', 'Filan Fisteku');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender_id_fk` (`sender_id`),
  ADD KEY `receiver_id_fk` (`receiver_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `business_id` (`business_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business`
--
ALTER TABLE `business`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `inbox`
--
ALTER TABLE `inbox`
  ADD CONSTRAINT `receiver_id_fk` FOREIGN KEY (`receiver_id`) REFERENCES `business` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sender_id_fk` FOREIGN KEY (`sender_id`) REFERENCES `business` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`business_id`) REFERENCES `business` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
