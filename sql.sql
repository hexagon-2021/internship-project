SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `business` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `company_name` varchar(256) NOT NULL,
  `company_city` varchar(256) NOT NULL,
  `company_logo` varchar(256) DEFAULT NULL,
  `phone_number` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `business_id` int(11) NOT NULL,
  `item_offer` tinyint(1) NOT NULL,
  `item_name` varchar(256) NOT NULL,
  `item_picture` varchar(256) NOT NULL,
  `item_ingridients` varchar(256) DEFAULT NULL,
  `item_price` float DEFAULT NULL,
  `item_categorie` varchar(256) NOT NULL,
  `item_views` int(11) NOT NULL,
  `item_sale` int(11) NOT NULL,
  `date_added` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `contact_us` (
  `name` text NOT NULL,
  `email` text NOT NULL,
  `message` text NOT NULL
);

CREATE TABLE ratings (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `date_added` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `inbox` (
  `id` int(10) NOT NULL,
  `sender_id` int(10) NOT NULL,
  `receiver_id` int(10) NOT NULL,
  `subject` varchar(256) NOT NULL,
  `message` varchar(256) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender_id_fk` (`sender_id`),
  ADD KEY `receiver_id_fk` (`receiver_id`);

ALTER TABLE `inbox`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
  
  ALTER TABLE `inbox`
  ADD CONSTRAINT `receiver_id_fk` FOREIGN KEY (`receiver_id`) REFERENCES `business` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sender_id_fk` FOREIGN KEY (`sender_id`) REFERENCES `business` (`id`) ON DELETE CASCADE;

ALTER TABLE `product`
  ADD KEY `business_id` (`business_id`);

ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`business_id`) REFERENCES `business` (`id`);

ALTER TABLE `business` ADD `aproved` TINYINT(1) NOT NULL AFTER `phone_number`;

ALTER TABLE `business` ADD `document_name` VARCHAR(256) NOT NULL AFTER `phone_number`;

ALTER TABLE `business` ADD `status` VARCHAR(256) NOT NULL AFTER `document_name`;

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `products` varchar(256) NOT NULL,
  `quantities` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Indexes for table `cart`
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

-- AUTO_INCREMENT for table `cart`
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
  
  CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `phone number` varchar(256) NOT NULL,
  `full name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

