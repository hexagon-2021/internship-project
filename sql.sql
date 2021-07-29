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

ALTER TABLE `product`
  ADD KEY `business_id` (`business_id`);

ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`business_id`) REFERENCES `business` (`id`);

ALTER TABLE `business` ADD `aproved` TINYINT(1) NOT NULL AFTER `phone_number`;

ALTER TABLE `business` ADD `document_name` VARCHAR(256) NOT NULL AFTER `phone_number`;

ALTER TABLE `business` ADD `status` VARCHAR(256) NOT NULL AFTER `document_name`;
