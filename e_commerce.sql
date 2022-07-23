-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2022 at 03:20 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_to_cart`
--

CREATE TABLE `add_to_cart` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `pro_attr_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `security_code` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `username`, `password`, `email`, `security_code`) VALUES
(2, 'kush', '$2y$10$eo4z/aU9t18m3nX65q0QTOOjR7aanuKD/Pya9owcahe1EbWiHam7q', 'juthanikush@gmail.com', '$2y$10$WZWlSGsfeBekaDeQfvsAF.jOR3KHJumhTceiONuI2y6Nxrqv9DvKS');

-- --------------------------------------------------------

--
-- Table structure for table `baners`
--

CREATE TABLE `baners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `btn_txt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `heading` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `baners`
--

INSERT INTO `baners` (`id`, `image`, `btn_txt`, `btn_link`, `heading`, `status`, `created_at`, `updated_at`) VALUES
(8, '75341.jpg', 'Shop Now', 'https://www.google.com/', 'Our New Collection', 1, '2022-05-23 07:01:04', '2022-05-23 07:01:04'),
(10, '14110.jpg', NULL, NULL, NULL, 1, '2022-05-23 07:21:21', '2022-05-23 07:21:21');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(7, '56279.png', 1, '2022-05-23 06:50:01', '2022-05-23 06:50:01'),
(8, '92545.png', 1, '2022-05-23 06:50:06', '2022-05-23 06:50:06'),
(9, '86119.png', 1, '2022-05-23 06:50:12', '2022-05-23 06:50:12'),
(10, '78605.png', 1, '2022-05-23 06:50:17', '2022-05-23 06:50:17'),
(11, '71796.png', 1, '2022-05-23 06:50:22', '2022-05-23 06:50:22'),
(12, '12597.png', 1, '2022-05-23 06:50:28', '2022-05-23 06:50:28');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_slug`, `status`, `created_at`, `updated_at`) VALUES
(12, 'Clothes', 'Clothes', 1, '2022-05-22 20:22:35', '2022-05-22 20:22:35'),
(13, 'Electronics', 'Electronics', 1, '2022-05-22 20:23:53', '2022-06-10 23:25:17'),
(14, 'Shoes', 'Shoes', 0, '2022-05-22 20:24:28', '2022-05-24 09:47:44'),
(15, 'Bags', 'Bags', 1, '2022-05-22 20:24:56', '2022-05-22 20:24:56');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `u_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `color`, `u_id`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Blue', 0, 1, '2022-05-04 21:33:00', '2022-05-24 07:29:48'),
(7, 'Green', 0, 1, '2022-05-15 23:51:06', '2022-05-15 23:51:06'),
(8, 'Pink', 0, 1, '2022-05-16 00:36:24', '2022-05-23 09:20:21'),
(9, 'Brown', 0, 1, '2022-05-22 21:18:30', '2022-05-22 21:18:30'),
(10, 'Coral', 0, 1, '2022-05-22 21:19:22', '2022-05-22 21:19:22'),
(11, 'Dark Red', 0, 1, '2022-05-22 21:20:03', '2022-05-22 21:20:04'),
(12, 'White', 0, 1, '2022-05-24 07:28:33', '2022-05-24 07:28:33'),
(13, 'yellow', 0, 1, '2022-05-23 19:31:18', '2022-05-23 19:31:18'),
(14, 'Black', 0, 1, '2022-05-23 19:39:03', '2022-05-23 19:39:03'),
(15, 'Grey', 0, 1, '2022-05-23 20:11:27', '2022-05-23 20:11:27'),
(16, 'Maroon', 0, 1, '2022-05-23 20:19:57', '2022-05-23 20:19:57'),
(17, 'Peach', 0, 1, '2022-05-23 20:20:11', '2022-05-23 20:20:11'),
(18, 'Orange', 0, 1, '2022-05-23 20:24:16', '2022-05-23 20:24:16'),
(20, 'Black', 1, 1, '2022-06-06 19:47:54', '2022-06-06 19:47:54');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_name`, `value`, `status`, `created_at`, `updated_at`) VALUES
(3, 'kush', 500, 1, '2022-06-04 01:47:42', '2022-06-04 01:47:42');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_04_24_104626_create_categories_table', 1),
(6, '2022_04_27_123016_create_sub_categories_table', 2),
(7, '2022_04_27_143806_create_coupons_table', 3),
(8, '2022_05_05_140833_create_sizes_table', 4),
(9, '2022_05_05_144156_create_colors_table', 5),
(10, '2022_05_05_152734_create_brands_table', 6),
(12, '2022_05_07_050938_create_taxes_table', 7),
(13, '2022_05_08_124541_create_baners_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `product_attr_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `user_address_id` int(11) NOT NULL,
  `coupon_code_value` int(11) NOT NULL,
  `status` varchar(15) NOT NULL,
  `payment_request_id` varchar(90) NOT NULL,
  `payment_id` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `u_id`, `p_id`, `product_attr_id`, `qty`, `user_address_id`, `coupon_code_value`, `status`, `payment_request_id`, `payment_id`, `date`) VALUES
(3, 1, 6, 16, 6, 6, 0, 'Success', '308968811edb4780a1434c274ff3dc70', 'MOJO2605N05A56692129', '2022-06-07'),
(4, 1, 8, 22, 1, 6, 0, 'Success', '97b2c03277d2485da3b1ed61c4c0b471', 'MOJO2606805A36319538', '2022-06-03'),
(5, 1, 6, 16, 1, 6, 0, 'Success', '97b2c03277d2485da3b1ed61c4c0b471', 'MOJO2606805A36319538', '2022-06-03'),
(6, 1, 9, 23, 1, 6, 0, 'Success', '97b2c03277d2485da3b1ed61c4c0b471', 'MOJO2606805A36319538', '2022-06-03'),
(7, 3, 7, 20, 1, 8, 0, 'Success', '44c767c07b6346098623976e87ecea2a', 'MOJO2607N05A07777392', '2022-06-05'),
(8, 3, 6, 16, 1, 8, 0, 'Success', '44c767c07b6346098623976e87ecea2a', 'MOJO2607N05A07777392', '2022-06-05'),
(9, 1, 8, 22, 1, 6, 500, 'Success', '4b6b69cfce3a4d1ab2e13dc4091808f9', 'MOJO2611L05A65942412', '2022-06-02'),
(10, 1, 6, 15, 1, 6, 500, 'Success', '4b6b69cfce3a4d1ab2e13dc4091808f9', 'MOJO2611L05A65942412', '2022-06-02'),
(11, 1, 6, 16, 2, 6, 500, 'Success', 'b5d04c515b1041bc8e66bf498c890b08', 'MOJO2611905A65942414', '2022-06-08'),
(12, 1, 15, 37, 1, 6, 500, 'Success', 'b5d04c515b1041bc8e66bf498c890b08', 'MOJO2611905A65942414', '2022-06-08'),
(13, 1, 13, 33, 2, 6, 500, 'Success', '855a3519ebd3425186457125803f42ee', 'MOJO2611G05A65942458', '2022-06-09'),
(14, 1, 6, 16, 2, 6, 500, 'Success', '855a3519ebd3425186457125803f42ee', 'MOJO2611G05A65942458', '2022-06-09'),
(15, 1, 7, 20, 1, 6, 0, 'Success', '24ab3a3b8984463591056baaeabe0c50', 'MOJO2611305A65942459', '2022-06-11'),
(16, 1, 9, 23, 1, 6, 0, 'Success', '24ab3a3b8984463591056baaeabe0c50', 'MOJO2611305A65942459', '2022-06-11');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `main_image` varchar(15) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `sub_id` int(11) DEFAULT NULL,
  `short_desc` text NOT NULL,
  `long_desc` text NOT NULL,
  `isfechaer` int(11) NOT NULL,
  `tax_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `rating` float NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `main_image`, `cate_id`, `sub_id`, `short_desc`, `long_desc`, `isfechaer`, `tax_id`, `u_id`, `rating`, `status`) VALUES
(6, 'Dennis Lingo Men\'s Slim Fit Casual Shirt', '879476462.jpg', 12, 8, 'Care Instructions: Machine Wash\r\nFit Type: Slim Fit\r\nColor Name: Bottle Green\r\n100% Cotton\r\nLong sleeve\r\nSlim fit\r\nMachine wash', 'Product Dimensions ‏ : ‎ 30 x 24 x 1 cm; 200 Grams\r\nDate First Available ‏ : ‎ 2 August 2019\r\nManufacturer ‏ : ‎ Swastik Creation\r\nASIN ‏ : ‎ B07W2YBGJ3\r\nItem model number ‏ : ‎ C301\r\nDepartment ‏ : ‎ Men\r\nManufacturer ‏ : ‎ Swastik Creation, Swastik Creation -B-21, Bharat Ind. Estate, Sewree (w) ,Mumbai-15, Email - dennislingoshirts@gmail.com, Phone No. 022-22010742\r\nPacker ‏ : ‎ Swastik Creation -B-21, Bharat Ind. Estate, Sewree (w) ,Mumbai-15, Email - dennislingoshirts@gmail.com, Phone No. 022-22010742\r\nItem Weight ‏ : ‎ 200 g\r\nItem Dimensions LxWxH ‏ : ‎ 30 x 24 x 1 Centimeters\r\nNet Quantity ‏ : ‎ 1 count\r\nIncluded Components ‏ : ‎ Casual Shirt\r\nGeneric Name ‏ : ‎ Casual Shirt', 1, 1, 0, 3, 1),
(7, 'Gauri Laxmi Enterprise Men\'s Cotton Blend Straight Kurta', '230260261.jpg', 12, 8, 'Care Instructions: Hand Wash Only\r\nFit Type: Regular\r\nFabric: Cotton\r\nFull Sleeves Kurta With 2 Side Pockets\r\nRound Neck\r\nAvailable Sizes: X-Small to 3XL\r\nProduct Size Guidance: Please refer to CHEST size measurement in the SIZE CHART for your correct size', 'Product Dimensions ‏ : ‎ 11 x 9 x 4 cm; 100 Grams\r\nDate First Available ‏ : ‎ 18 December 2020\r\nManufacturer ‏ : ‎ Gauri Laxmi Enterprise\r\nASIN ‏ : ‎ B09NXZFQ6F\r\nItem model number ‏ : ‎ PLAIN KURTA 2\r\nDepartment ‏ : ‎ Men\r\nManufacturer ‏ : ‎ Gauri Laxmi Enterprise, GAURI LAXMI ENTERPRISE\r\nItem Weight ‏ : ‎ 100 g\r\nItem Dimensions LxWxH ‏ : ‎ 11 x 9 x 4 Centimeters\r\nNet Quantity ‏ : ‎ 1.00 Piece', 0, 1, 0, 4, 1),
(8, 'Scott International Men\'s Regular Fit T-Shirt', '278002445.jpg', 12, 8, 'Care Instructions: Machine Wash\r\nFit Type: Regular Fit\r\nFabric Type: Cotton; Pattern Name: Solid\r\nClosure Type: Pull On\r\nSleeve Type: Half Sleeve; Collar Style: Collarless\r\nFit Type: Regular Fit', 'Package Dimensions ‏ : ‎ 30.6 x 27.4 x 4.8 cm; 300 Grams\r\nDate First Available ‏ : ‎ 13 October 2020\r\nManufacturer ‏ : ‎ Switz Inc\r\nASIN ‏ : ‎ B08L82LXTM\r\nItem part number ‏ : ‎ SS20-3RNMEL-BU-MA-RB-S\r\nDepartment ‏ : ‎ Men\r\nManufacturer ‏ : ‎ Switz Inc\r\nItem Weight ‏ : ‎ 300 g\r\nNet Quantity ‏ : ‎ 1.00 count', 0, 1, 0, 3, 1),
(9, 'Puma Men\'s Regular T-Shirt', '528788004.jpg', 12, 8, 'Care Instructions: Machine Wash\r\nFit Type: Regular Fit\r\nStyle Name:-T shirt\r\nPuma Black', 'Package Dimensions ‏ : ‎ 29 x 22 x 4 cm; 500 Grams\r\nDate First Available ‏ : ‎ 2 August 2021\r\nManufacturer ‏ : ‎ SRI LAKSHMI CLOTHINGS, 3/808A, SRI GOKULA KRISHNA, TIRUPUR, India, Postal code, 641605\r\nASIN ‏ : ‎ B09BNKLF3G\r\nItem part number ‏ : ‎ 4064533812550\r\nDepartment ‏ : ‎ Men\r\nManufacturer ‏ : ‎ SRI LAKSHMI CLOTHINGS, 3/808A, SRI GOKULA KRISHNA, TIRUPUR, India, Postal code, 641605, SRI LAKSHMI CLOTHINGS, 3/808A, SRI GOKULA KRISHNA, TIRUPUR, India, Postal code, 641605\r\nPacker ‏ : ‎ Puma Sports India Pvt Ltd\r\nImporter ‏ : ‎ Puma Sports India Pvt Ltd\r\nItem Weight ‏ : ‎ 500 g\r\nGeneric Name ‏ : ‎ T-Shirt', 0, 1, 0, 4, 1),
(10, 'EYEBOGLER Men\'s Regular Fit Striped Round Neck T-Shirt', '475784903.jpg', 12, 8, 'Care Instructions: Machine Wash\r\nFit Type: Regular Fit\r\nUnique Design with Excellent durable fabric\r\nFabric GSM is 180\r\nRegular Fit and dimensionally accurate size\r\nMachine wash Cold', 'Product Dimensions ‏ : ‎ 25 x 20 x 4.5 cm; 500 Grams\r\nDate First Available ‏ : ‎ 31 July 2020\r\nManufacturer ‏ : ‎ Seven Rocks International\r\nASIN ‏ : ‎ B08F2C8T28\r\nItem model number ‏ : ‎ T305\r\nDepartment ‏ : ‎ Men\r\nManufacturer ‏ : ‎ Seven Rocks International, Seven Rocks International, Cheema Chowk, Ludhiana\r\nPacker ‏ : ‎ Seven Rocks International, Ludhiana, Punjab, 141003\r\nImporter ‏ : ‎ Seven Rocks International, Ludhiana, Punjab, 141003\r\nItem Weight ‏ : ‎ 500 g\r\nItem Dimensions LxWxH ‏ : ‎ 25 x 20 x 4.5 Centimeters\r\nNet Quantity ‏ : ‎ 1.00 Unit\r\nIncluded Components ‏ : ‎ T Shirt', 0, 1, 0, 3, 1),
(11, 'Amazon Brand - Inkast Denim Co. Men\'s Slim Casual Shirt', '331439111.jpg', 12, 8, 'Care Instructions: Machine Wash\r\nFit Type: Slim\r\nSoft and Breathable 100% Cotton Fabric\r\nGarment dyed solid color shirt\r\nDouble pocket with flap and button closure\r\nEmbroidery detail at chest\r\nBranded inkast trims', 'Package Dimensions ‏ : ‎ 30.4 x 24.2 x 4.6 cm; 500 Grams\r\nDate First Available ‏ : ‎ 31 January 2020\r\nManufacturer ‏ : ‎ Amazon Brand - Inkast Denim Co.\r\nASIN ‏ : ‎ B084DN5GH7\r\nItem model number ‏ : ‎ IN-S-02\r\nDepartment ‏ : ‎ Men\r\nManufacturer ‏ : ‎ Amazon Brand - Inkast Denim Co.\r\nItem Weight ‏ : ‎ 500 g\r\nGeneric Name ‏ : ‎ Casual Shirt', 0, 1, 0, 4, 1),
(12, 'Urbano Fashion Men\'s Solid Cotton Slim Fit Polo Shirt with Mandarin Collar', '305033982.jpg', 12, 8, 'Care Instructions: Do not Iron on print/embroidery/embellishment::Wash with like colors\r\nFit Type: Slim Fit\r\nFabric: Cotton; Style: Regular\r\nNeck Style: Collared\r\nPattern: Striped\r\nSleeve Type: Half Sleeve', 'Product Dimensions ‏ : ‎ 32 x 27 x 1 cm; 250 Grams\r\nDate First Available ‏ : ‎ 3 May 2019\r\nManufacturer ‏ : ‎ Imperial Online Services Pvt Ltd\r\nASIN ‏ : ‎ B07RG5DQX4\r\nItem part number ‏ : ‎ poloshirt-lemyel-s\r\nDepartment ‏ : ‎ Men\r\nManufacturer ‏ : ‎ Imperial Online Services Pvt Ltd, urbanofashion01@gmail.com\r\nItem Weight ‏ : ‎ 250 g\r\nItem Dimensions LxWxH ‏ : ‎ 32 x 27 x 1 Centimeters', 0, 1, 0, 5, 1),
(13, 'FABWAX Men\'s Full Black Casual Premium Cotton Kurta Payjama Set', '949109501.jpg', 12, 8, 'Care Instructions: Hand Wash Only\r\nFit Type: Regular\r\nQuality: Premium Cotton\r\nMATERIAL: Finest Cotton ( Lightweight And Breathable)\r\nCollar: Mandarin\r\nLength: Knee Length Kurta\r\nOCCASIONS: Party, Weddings, Festivals, and great for Gifting', 'Product Dimensions ‏ : ‎ 10 x 5 x 10 cm; 250 Grams\r\nDate First Available ‏ : ‎ 30 September 2021\r\nManufacturer ‏ : ‎ FABWAX\r\nASIN ‏ : ‎ B09HL144XW\r\nItem model number ‏ : ‎ FABWAX - F6\r\nDepartment ‏ : ‎ Mens\r\nManufacturer ‏ : ‎ FABWAX, FABWAX , GUJRAT , NIRAJ BALCHANDANI , NO - 8758252550\r\nPacker ‏ : ‎ FABWAX , GUJRAT , NIRAJ BALCHANDANI , NO - 8758252550\r\nItem Weight ‏ : ‎ 250 g\r\nItem Dimensions LxWxH ‏ : ‎ 10 x 5 x 10 Centimeters\r\nNet Quantity ‏ : ‎ 1.00 count\r\nGeneric Name ‏ : ‎ Kurta Payjama Set', 1, 1, 0, 4, 1),
(14, 'U.S. POLO ASSN. Men\'s Regular fit T-Shirt', '986655279.jpg', 12, 8, 'Care Instructions: Machine Wash\r\nFit Type: regular fit\r\nMi Blue\r\n100% Cotton\r\nregular fit\r\nMachine wash\r\nMade in India', 'roduct details\r\nProduct Dimensions ‏ : ‎ 32 x 27 x 2.5 cm; 500 Grams\r\nDate First Available ‏ : ‎ 25 June 2019\r\nManufacturer ‏ : ‎ Sapphire Clothing Company\r\nASIN ‏ : ‎ B07TM5P1NF\r\nItem model number ‏ : ‎ UDTS0470\r\nCountry of Origin ‏ : ‎ India\r\nDepartment ‏ : ‎ Men\r\nManufacturer ‏ : ‎ Sapphire Clothing Company\r\nItem Weight ‏ : ‎ 500 g\r\nItem Dimensions LxWxH ‏ : ‎ 32 x 27 x 2.5 Centimeters\r\nGeneric Name ‏ : ‎ T-Shirt', 0, 1, 0, 4, 1),
(15, 'GoSriKi Women\'s Cotton Straight Kurta with Palazzo', '299928416.jpg', 12, 9, 'Care Instructions: Dry Clean Only\r\nFit Type: Regular\r\nKurta and Palazzo Fabric: Cotton\r\nPackage Contain :Kurta ,Bottom\r\nStyle: Straight || Length: Calf Length || Sleeves: 3/4\r\nProduct Color May Slightly Vary Due To Photographic Lighting Sources Or Your Monitor And Pantstings', 'Product Dimensions ‏ : ‎ 37 x 27 x 10 cm; 300 Grams\r\nDate First Available ‏ : ‎ 9 June 2021\r\nManufacturer ‏ : ‎ GoSriKi\r\nASIN ‏ : ‎ B096XZCYQG\r\nItem model number ‏ : ‎ Black Flower\r\nDepartment ‏ : ‎ Women\r\nManufacturer ‏ : ‎ GoSriKi, New Sardar Traders Market NSTM, Puna Khumbharira Road, Near Sardar Vegitable Market, Surat-395010.\r\nPacker ‏ : ‎ New Sardar Traders Market NSTM, Puna Khumbharira Road, Near Sardar Vegitable Market, Surat-395010.\r\nItem Weight ‏ : ‎ 300 g\r\nItem Dimensions LxWxH ‏ : ‎ 37 x 27 x 10 Centimeters\r\nNet Quantity ‏ : ‎ 1.00 count\r\nGeneric Name ‏ : ‎ Kurta With Palazzo', 1, 1, 0, 4, 1),
(16, 'RARE Women\'s Georgette A-Line Midi Dress', '119642581.jpg', 12, 9, 'Care Instructions: Hand Wash Only\r\nFit Type: Regular\r\nColor Name: Blue\r\nMaterial: Synthetic\r\nHand wash; A-Line\r\nHalf Sleeve', 'Package Dimensions ‏ : ‎ 32.5 x 25.1 x 5.4 cm; 430 Grams\r\nDate First Available ‏ : ‎ 31 July 2018\r\nManufacturer ‏ : ‎ Epic Brands Pvt Ltd\r\nASIN ‏ : ‎ B07NTC2NL9\r\nItem model number ‏ : ‎ ep3153--s\r\nDepartment ‏ : ‎ Women\r\nManufacturer ‏ : ‎ Epic Brands Pvt Ltd\r\nPacker ‏ : ‎ EPIC BRANDS PVT LTD, D-19, FIRST FLOOR OKHLA, DELHI-110020 ; 9711060049\r\nItem Weight ‏ : ‎ 430 g\r\nIncluded Components ‏ : ‎ 1 Dress\r\nGeneric Name ‏ : ‎ Dress', 0, 1, 0, 5, 1),
(17, 'Khushal K Women\'s Rayon Printed Kurta With Skirt Set', '853298158.jpg', 12, 9, 'Care Instructions: Machine Wash With Like Colours, Low Warm Iron If Needed\r\nKurta Fabric:- Rayon || Bottom Fabric:- Rayon\r\nRegular Fit\r\nSleeve & Neckline : 3/4 Sleeve & Round Neck\r\nPlease Click On Brand Name \"Khushal K\" For More Products\r\nProduct Color May Slightly Vary Due To Photographic Effect', 'Package Dimensions ‏ : ‎ 34.9 x 27.8 x 3.9 cm; 580 Grams\r\nDate First Available ‏ : ‎ 7 October 2020\r\nManufacturer ‏ : ‎ Khushal K\r\nASIN ‏ : ‎ B08KTHNSTZ\r\nItem part number ‏ : ‎ KK-378-Pink-2XL\r\nCountry of Origin ‏ : ‎ India\r\nDepartment ‏ : ‎ Women\r\nManufacturer ‏ : ‎ Khushal K\r\nItem Weight ‏ : ‎ 580 g', 0, 1, 0, 5, 1),
(18, 'ADITYA IMPEX Jaipur Women\'s Stitched POM POM Casual Cotton Long Maxi Dress', '396520564.jpg', 12, 9, 'Care Instructions: Machine Wash\r\nFree Size: Fits Upto 44 Inch (Xxl) | Length: 49 Inch\r\nStitching Type: Stitched | Neck: Round Neck | Type: Flared/A-Line; Embellishment/Work: Printed, Pom Pom\r\nOccasion: Can Be Worn As Casual, Party, Wedding, Ethnic Or Daily Beautiful Looking Dress\r\nShow Off Your Great Sense Of Fashion When You Opt For This Jaipuri Print Maxi Dress. Wear Your Printed Maxi Dress With Strappy Heels And Your Favourite Clutch For A Night Out On The Town With Your Friends.; Sleeve Type: Sleeveless\r\nAge Range Description: Adult; Sleeve Type: Cap Sleeve', 'Additional Flat Rs.1000 Instant Discount with Citibank Credit and Debit transactions. Here\'s how\r\n10% Instant Discount upto Rs.1500 with Citibank Credit Cards and Debit Cards(Non-EMI).Minimum purchase of INR 3000/- Here\'s how\r\n10% Instant Discount upto Rs.1,750 with Citibank Credit EMI transactions.Minimum purchase of INR 3000/- Here\'s how\r\nGet 7.5% up to Rs. 1500 Instant Discount on Yes Bank Credit Card EMI transactions. Here\'s how', 1, 1, 0, 5, 1),
(19, 'Fast Fashions Women\'s Taffeta Silk Semi Stitched Anarkali Floor Length Gown', '404449071.jpg', 12, 9, 'Care Instructions: Hand Wash Only\r\nStyle ; Anarkali Dress ; Long Gown; Fabric :- Taffeta Silk , Work :- Heavy Embroidery , Dupatta :- Yes\r\nGown Length :- 58 Inches , Gown Flair :- 2.50 Mtr , Dupatta :- 2.250 Mtr; Wash Care :- Dry Clean Or Normal Hand Wash\r\nDisclaimer :- Product Color May Slightly Vary Due To Photographic Lighting Sources Or Your Monitor Settings\r\nOccasion Type: Ceremony; Sleeve Type: Long Sleeve\r\nAge Range Description: Adult', 'Caution: This brand is protected under the Design Act and Trademark Act 1999. Illegal and Unauthorized Mapping, Reprint, Publishing, Reproduction, Distribution, and Modification of any Product, for any Purpose, Reason or cause is strictly prohibited and punishable as per the law in force', 1, 1, 0, 4, 1),
(20, 'SHAFNUFAB® Women\'s Net Semi Stitched Anarkali Salwar Suit (Wedding Dress and Salwar', '698573030.jpg', 12, 9, 'Care Instructions: Dry Clean Only\r\nTop Fabric :-Heavy Net with Embroidery work + Stone Top Lenght :56+inch Top Inner :- Satin Top Size :Max Set Up 44 + Inch Top Fair : 2.70 Mtr Sleeves :- Net with Emb.work + Stone Sleeve Type : Long Sleeve Bottom :- Santoon Bottom Lenght: 42 inch (2 Mtr) Dupatta :- Net with Emb.work + Stone Dupatta Lenght : 2.10 Mtr Type :- Semi Stitched ( Material ) Weight :- 1.00kg Type : Semi Stitch n Free Size wash care :dry clean\r\nCare Instructions: Dry clean only; Free Size (| Waist : 42\" | Chest/Bust : 44\") | Semi-stitched free size | , Maximum Size Up To 2XL .', 'Date First Available ‏ : ‎ 19 December 2021\r\nManufacturer ‏ : ‎ SHAFNUFAB\r\nASIN ‏ : ‎ B09NTQ42QB\r\nItem part number ‏ : ‎ wedding dress and salwar suit_SF20131\r\nCountry of Origin ‏ : ‎ India\r\nDepartment ‏ : ‎ Women\r\nManufacturer ‏ : ‎ SHAFNUFAB, safnufab.com.kb25@gmail.com\r\nPacker ‏ : ‎ Safnufab.com.kb25@gmail.com\r\nImporter ‏ : ‎ Safnufab.com.kb25@gmail.com', 1, 1, 0, 5, 1),
(21, 'Women Ethnic Set of Rayon Crop Top Skirt and Shrug || Classy Crop Top Kurti with Skirt and Shrug Jacket || Embroidered Ethnic Kurta Set', '938430613.jpg', 12, 9, 'Care Instructions: Machine Wash\r\nFit Type: Regular Fit\r\nFabric :- Rayon\r\nType ;- Ethnic Top and Skirt Set\r\nPattern :- Embellished', 'Date First Available ‏ : ‎ 10 August 2021\r\nManufacturer ‏ : ‎ AYAAN COLLECTIONS\r\nASIN ‏ : ‎ B09CDQ2JMZ\r\nItem part number ‏ : ‎ ETHNIC-CROP-TOP-KURTI-SKIRT-YR1\r\nDepartment ‏ : ‎ Women\r\nManufacturer ‏ : ‎ AYAAN COLLECTIONS', 0, 1, 0, 5, 1),
(22, 'Boys Festive & Party Kurta, Waistcoat and Pyjama Set', '948637267.jpg', 12, 10, 'Fabric: Silk Blend | Contents: Kurta Pyjama and Waistcoat Set\r\nThe fit is regular for boys clothing.\r\nOccasion: marriages, weddings, temple visit, all festival, Ramadan, eid, diwali, Navratri, dussehra, pooja, christmas, onam, pongal, ganesha, yugadi, christmas, birthday, all spacial occasion\r\nDisclaimer-Color may slightly be different due to viewer\'s screen brightness.\r\nIt is design and created by best and expert Designers', 'Product Dimensions ‏ : ‎ 20 x 22 x 2 cm; 150 Grams\r\nDate First Available ‏ : ‎ 3 February 2021\r\nManufacturer ‏ : ‎ RAJESH ENTERPRISES RJ\r\nASIN ‏ : ‎ B08W3FHD6P\r\nItem part number ‏ : ‎ RAJ005\r\nManufacturer ‏ : ‎ RAJESH ENTERPRISES RJ\r\nItem Weight ‏ : ‎ 150 g\r\nItem Dimensions LxWxH ‏ : ‎ 20 x 22 x 2 Centimeters\r\nNet Quantity ‏ : ‎ 1.00 01\r\nGeneric Name ‏ : ‎ Kurta, Waistcoat and Pyjama Set', 0, 1, 0, 4, 1),
(23, 'NEW GEN Boy\'s Synthetic Kurta Pyjama Set', '907633184.jpg', 12, 10, 'Care Instructions: Dry Clean Only\r\nSuitable for: Party, Weddings, Engagement, Date, Friday Dressing, Ethnic Day.\r\nMaterial : Synthetic\r\nThis dhoti kurta fabric is babies skin friendly\r\nColor:Multi Color\r\nCare Instructions : Dry Clean Only', 'Package Dimensions ‏ : ‎ 27.7 x 20 x 4.6 cm; 110 Grams\r\nDate First Available ‏ : ‎ 3 April 2020\r\nManufacturer ‏ : ‎ NEW GEN\r\nASIN ‏ : ‎ B086RKK5NW\r\nItem part number ‏ : ‎ 300_SKY POCKET_16\r\nDepartment ‏ : ‎ Kids-Boy\r\nManufacturer ‏ : ‎ NEW GEN\r\nItem Weight ‏ : ‎ 110 g', 0, 1, 0, 4, 1),
(24, 'Fashion Fly Girl\'s Maxi Dress', '683359971.jpg', 12, 10, 'Care Instructions: Machine Wash', 'Package Dimensions ‏ : ‎ 12 x 10 x 4 cm; 250 Grams\r\nDate First Available ‏ : ‎ 13 June 2020\r\nASIN ‏ : ‎ B08VJJS4B5\r\nItem part number ‏ : ‎ MR\r\nDepartment ‏ : ‎ Baby girls\r\nItem Weight ‏ : ‎ 250 g', 0, 1, 0, 4, 1),
(25, 'Verone Baby Girl Cotton Frock | Dress | Fashionable Clothes for Kids Girls', '259764541.jpg', 12, 10, 'Care Instructions: Hand Wash Only\r\nMaterial: COTTON AND RAYON\r\nThe actual product may differ slightly in color from the one illustrated in the images\r\nComfortable To fit all day long.\r\nCare Instruction: Gentle Wash', 'Package Dimensions ‏ : ‎ 25 x 15 x 5 cm; 200 Grams\r\nDate First Available ‏ : ‎ 19 July 2021\r\nASIN ‏ : ‎ B09L5YRMGN\r\nItem part number ‏ : ‎ Vero2510\r\nDepartment ‏ : ‎ BabyGirls\r\nItem Weight ‏ : ‎ 200 g\r\nNet Quantity ‏ : ‎ 1.00 count', 0, 1, 0, 4, 1),
(26, 'Samsung Galaxy S20 FE 5G (Cloud Mint, 8GB RAM, 128GB Storage)', '113427395.jpg', 13, 12, 'Wireless Carrier	Unlocked for All Carriers\r\nWhats in the box	Handset, Non-removable Battery Included, Travel Adapter, USB Cable, User Manual\r\nBrand	Samsung\r\nModel Name	Samsung Galaxy S20 FE 5G\r\nBattery Description	Lithium-Ion', '5G Ready powered by Qualcomm Snapdragon 865 Octa-Core processor, 8GB RAM, 128GB internal memory expandable up to 1TB, Android 11.0 operating system and dual SIM\r\nTriple Rear Camera Setup - 12MP (Dual Pixel) OIS F1.8 Wide Rear Camera + 8MP OIS Tele Camera + 12MP Ultra Wide | 30X Space Zoom, Single Take & Night Mode | 32MP F2.2 Front Punch Hole Camera\r\n6.5-inch(16.40 centimeters) Infinity-O Super AMOLED Display with 120Hz Refresh rate, 1080 x 2400 (FHD+) Resolution\r\n4500 mAh battery (Non -removable) with Super Fast Charging, FAst Wireless Charging & Finger Print sensor\r\nIP68 Rated, MicroSD Card Slot (Expandable upto 1 TB), Dual Nano Sim, Hybrid Sim Slot, 5G+5G Dual stand by', 1, 1, 0, 5, 0),
(27, 'Samsung Galaxy S20 FE 5G (Cloud Mint, 8GB RAM, 128GB Storage)', '616894145.jpg', 13, 12, 'Wireless Carrier	Unlocked for All Carriers\r\nWhats in the box	Handset, Non-removable Battery Included, Travel Adapter, USB Cable, User Manual\r\nBrand	Samsung\r\nModel Name	Samsung Galaxy S20 FE 5G\r\nBattery Description	Lithium-Ion', '5G Ready powered by Qualcomm Snapdragon 865 Octa-Core processor, 8GB RAM, 128GB internal memory expandable up to 1TB, Android 11.0 operating system and dual SIM\r\nTriple Rear Camera Setup - 12MP (Dual Pixel) OIS F1.8 Wide Rear Camera + 8MP OIS Tele Camera + 12MP Ultra Wide | 30X Space Zoom, Single Take & Night Mode | 32MP F2.2 Front Punch Hole Camera\r\n6.5-inch(16.40 centimeters) Infinity-O Super AMOLED Display with 120Hz Refresh rate, 1080 x 2400 (FHD+) Resolution\r\n4500 mAh battery (Non -removable) with Super Fast Charging, FAst Wireless Charging & Finger Print sensor\r\nIP68 Rated, MicroSD Card Slot (Expandable upto 1 TB), Dual Nano Sim, Hybrid Sim Slot, 5G+5G Dual stand by', 0, 1, 0, 5, 0),
(28, 'Samsung Galaxy S20 FE 5G (Cloud Mint, 8GB RAM, 128GB Storage)', '227652932.jpg', 13, 12, 'Wireless Carrier	Unlocked for All Carriers\r\nWhats in the box	Handset, Non-removable Battery Included, Travel Adapter, USB Cable, User Manual\r\nBrand	Samsung\r\nModel Name	Samsung Galaxy S20 FE 5G\r\nBattery Description	Lithium-Ion', '5G Ready powered by Qualcomm Snapdragon 865 Octa-Core processor, 8GB RAM, 128GB internal memory expandable up to 1TB, Android 11.0 operating system and dual SIM\r\nTriple Rear Camera Setup - 12MP (Dual Pixel) OIS F1.8 Wide Rear Camera + 8MP OIS Tele Camera + 12MP Ultra Wide | 30X Space Zoom, Single Take & Night Mode | 32MP F2.2 Front Punch Hole Camera\r\n6.5-inch(16.40 centimeters) Infinity-O Super AMOLED Display with 120Hz Refresh rate, 1080 x 2400 (FHD+) Resolution\r\n4500 mAh battery (Non -removable) with Super Fast Charging, FAst Wireless Charging & Finger Print sensor\r\nIP68 Rated, MicroSD Card Slot (Expandable upto 1 TB), Dual Nano Sim, Hybrid Sim Slot, 5G+5G Dual stand by', 1, 1, 0, 5, 0),
(29, 'Samsung Galaxy S20 FE 5G (Cloud Mint, 8GB RAM, 128GB Storage)', '644034346.jpg', 13, 12, 'Wireless Carrier	Unlocked for All Carriers\r\nWhats in the box	Handset, Non-removable Battery Included, Travel Adapter, USB Cable, User Manual\r\nBrand	Samsung\r\nModel Name	Samsung Galaxy S20 FE 5G\r\nBattery Description	Lithium-Ion', '5G Ready powered by Qualcomm Snapdragon 865 Octa-Core processor, 8GB RAM, 128GB internal memory expandable up to 1TB, Android 11.0 operating system and dual SIM\r\nTriple Rear Camera Setup - 12MP (Dual Pixel) OIS F1.8 Wide Rear Camera + 8MP OIS Tele Camera + 12MP Ultra Wide | 30X Space Zoom, Single Take & Night Mode | 32MP F2.2 Front Punch Hole Camera\r\n6.5-inch(16.40 centimeters) Infinity-O Super AMOLED Display with 120Hz Refresh rate, 1080 x 2400 (FHD+) Resolution\r\n4500 mAh battery (Non -removable) with Super Fast Charging, FAst Wireless Charging & Finger Print sensor\r\nIP68 Rated, MicroSD Card Slot (Expandable upto 1 TB), Dual Nano Sim, Hybrid Sim Slot, 5G+5G Dual stand by', 0, 1, 0, 5, 0),
(30, 'Samsung Galaxy S20 FE 5G (Cloud Mint, 8GB RAM, 128GB Storage)', '919222245.jpg', 13, 12, 'Wireless Carrier	Unlocked for All Carriers\r\nWhats in the box	Handset, Non-removable Battery Included, Travel Adapter, USB Cable, User Manual\r\nBrand	Samsung\r\nModel Name	Samsung Galaxy S20 FE 5G\r\nBattery Description	Lithium-Ion', '5G Ready powered by Qualcomm Snapdragon 865 Octa-Core processor, 8GB RAM, 128GB internal memory expandable up to 1TB, Android 11.0 operating system and dual SIM\r\nTriple Rear Camera Setup - 12MP (Dual Pixel) OIS F1.8 Wide Rear Camera + 8MP OIS Tele Camera + 12MP Ultra Wide | 30X Space Zoom, Single Take & Night Mode | 32MP F2.2 Front Punch Hole Camera\r\n6.5-inch(16.40 centimeters) Infinity-O Super AMOLED Display with 120Hz Refresh rate, 1080 x 2400 (FHD+) Resolution\r\n4500 mAh battery (Non -removable) with Super Fast Charging, FAst Wireless Charging & Finger Print sensor\r\nIP68 Rated, MicroSD Card Slot (Expandable upto 1 TB), Dual Nano Sim, Hybrid Sim Slot, 5G+5G Dual stand by', 1, 1, 0, 5, 1),
(31, 'Samsung Galaxy M53 5G (Deep Ocean Blue, 6GB, 128GB Storage) | Travel Adapter to be Purchased Separately', '726874899.jpg', 13, 12, 'Wireless Carrier	Unlocked for All Carriers\r\nWhats in the box	Handset, Ejection Pin,Data Cable,Quick Start Guide\r\nBrand	Samsung\r\nModel Name	Samsung Galaxy M53 5G\r\nBattery Power	5000', 'Segment Best 108MP Quad Camera Setup, with exciting features like Single Take, Object Eraser, and Photo Remaster\r\n6.7-inch Super AMOLED Plus Display, FHD+ resolution, 1080x2400 pixels with 120Hz Refresh Rate\r\nMTK D900 Octa Core 2.4GHz 6nm Processor with 4x4 Mimo Band support for a HyperFast 5G experience\r\nMassive 5000 mAh Battery | Memory, Storage & SIM: 6GB RAM | RAM Plus upto 6GB |128GB internal memory expandable up to 1TB\r\nLatest Android v12.0, One UI 4 operating system', 0, 1, 0, 4, 1),
(32, 'OnePlus Nord CE 2 Lite 5G (Blue Tide, 6GB RAM, 128GB Storage)', '828631717.jpg', 13, 12, 'Wireless Carrier	Unlocked for All Carriers\r\nWhats in the box	SIM Tray Ejector, Adapter, Phone Case, USB Cable\r\nBrand	OnePlus\r\nModel Name	OnePlus Nord CE 2 Lite 5G\r\nBattery Power	5000', 'Camera: 64MP Main Camera with EIS; 2MP Depth Lens and 2MP Macro Lens; Front (Selfie) Camera: 16MP Sony IMX471\r\nCamera Features: AI scene enhancement, Dual-View Video, HDR, Night Portrait, Panorama Mode, Retouch Filters, 1080p video at 30 fps, SLO-MO: 720p video at 120 fps, TIME-LAPSE: 1080p video at 30 fps, Video editor, Face unlock, Screen flash, HDR, NIGHT, PORTRAIT, TIME-LAPSE, Retouch, Filters\r\nDisplay: 6.59 Inches; 120 Hz Refresh Rate; Support sRGB, Display P3; Resolution: 2412 x 1080 pixels 402ppi; Aspect Ratio: 20:9\r\nDisplay Features: Ambient display, Dark mode\r\nOperating System: Oxygen OS based on Android 12\r\nProcessor: Qualcomm Snapdragon 695 5G\r\nBattery & Charging: 5000 mAh with 33W SuperVOOC\r\nAlexa Hands-Free capable: Download the Alexa app to use Alexa hands-free. Play music, make calls, hear news, open apps, navigate, and more, all using just your voice, while on-the-go.', 1, 1, 0, 5, 1),
(33, 'OPPO A15s (Dynamic Black, 4GB, 128GB Storage) AI Triple Camera | 6.52\" HD+ Screen | 2.3GHz Mediatek Helio P35 Octa Core Processor', '877441730.jpg', 13, 12, 'Wireless Carrier	Unlocked for All Carriers\r\nWhats in the box	Handset,USB Cable,Adapter,Sim Tray Ejector, Protective Case, Booklet with Warranty Card and Quick Guide.Handset,USB Cable,Adapter,Sim Tray Ejector, Protective Case, Booklet with Warranty Card and Quick Guide. See more\r\nBrand	Oppo\r\nModel Name	OPPOA15s_4GB_128GB_Black\r\nBattery Description	Lithium-Ion', '13MP main camera + 2MP Depth camera + 2MP Macro lens with 8MP Front\r\n16.55 centimeters (6.52-inch) HD+ Display with 1520 x 720 Pixel Resolution-Rear Fingerprint Sensor + AI face unlock| Eye comfort - filters Blue light to reduce damage to the eyes.\r\nBattery: 4230 mAh Lithium-Polymer Battery providing talk-time of 29 hours and standby time of 323 hours.\r\nMemory & Storage: 4GB Ram with 128GB Storage | Dual Nano Sim with Dual standby (4G+4G)\r\nColor OS 7.2 based on Android Version 10 Operating system with 2.3GHz Mediatek Helio P35 Octa Core Processor', 0, 1, 0, 4, 1),
(34, 'Croma 80 cm (32 Inches) HD Ready Certified Android Smart LED TV CREL032HOF024601 (Black) (2022 Model)', '535795627.jpg', 13, 13, 'Brand	CROMA\r\nSupported Internet Services	Netflix, Amazon Instant Video, YouTube, Browser\r\nScreen Size	32 Inches\r\nConnector Type	HDMI', 'Resolution: HD Ready (1366x768) | Refresh Rate: 60 hertz | 178 Degree wide viewing angle\r\nConnectivity: 2 HDMI ports to connect set top box, Blu-Ray players, gaming console | 2 USB ports to connect hard drives and other USB devices | Bluetooth 5.0 to connect Bluetooth speakers, earphones and TWS earphones\r\nSound: 20 Watts Powerful Stereo Speakers | Dolby Audio | ARC port\r\nSmart TV Features : Android TV 11 | Miracast | Supported Apps: Prime Video | Netflix | Disney + Hotstar | YouTube | Apple TV | 5000+ apps from Play Store | Auto Low Latency Mode | Quad core processor | Dual band Wi-Fi | 1GB RAM + 8GB Storage\r\nDisplay: A+ Grade LED panel | Vivid Picture Engine | Detailed Picture Controls | Ultra bright screen | Dynamic contrast | Dynamic backlight | Zero Dot Panel Warranty\r\nWarranty Information: 1 year comprehensive warranty on product\r\nEasy Returns: This product is eligible for replacement within 10 days of delivery in case of any product defects, damage or features not matching the description provided', 1, 1, 0, 5, 1),
(35, 'Mi 125.7 cm (50 Inches) 4K Ultra HD Android Smart LED TV 4X | L50M5-5AIN (Black)', '812878003.jpg', 13, 13, 'Special Feature	Smart TV Built-In Wi-Fi | PatchWall | Netflix | Prime Video | Disney+Hotstar and more | Android TV 9.0 | Google AssistantSmart TV Built-In Wi-Fi | PatchWall | Netflix | Prime Video | Disney+Hotstar and more | Android TV 9.0 | Google Assistant', 'Resolution: 4K Ultra HD (3840x2160) | Refresh Rate: 60 hertz. Powerful speakers : 2×10W 6ohm\r\nConnectivity: 3 HDMI ports to connect set top box, Blu Ray players gaming console | 2 USB ports to connect hard drives and other USB devices\r\nSound: 20 Watts Output | Dolby+ DTS-HD. Viewing Angle：178°\r\nSmart TV features : Built-In Wi-Fi | PatchWall | Netflix | Prime Video | Disney+Hotstar and more | Android TV 9.0 | Google Assistant\r\nDisplay : LED Panel | 4K HDR 10-bit display\r\nWarranty Information: 1 year warranty on product and 1 year extra on Panel\r\nEasy returns: This product is eligible for replacement within 10 days of delivery in case of any product defects, damage or features not matching the description provided', 0, 1, 0, 5, 1),
(36, 'OnePlus 80 cm (32 inches) Y Series HD Ready LED Smart Android TV 32Y1 (Black) (2020 Model)', '499645607.jpg', 13, 13, 'Brand	OnePlus\r\nSupported Internet Services	Netflix, Prime Video, YouTube\r\nScreen Size	32 Inches\r\nConnector Type	Wi-Fi', 'Resolution: HD Ready (1366x768) | Refresh Rate: 60 hertz\r\nConnectivity: 2 HDMI ports to connect set top box, Blu Ray players, gaming console | 2 USB ports to connect hard drives and other USB devices, Dimensions(TV With Stand) - 71.3cm*20cm*46.9cm, VESA Hole Pitch - 20cm*20cm\r\nSound : 20 Watts Output | Dolby Audio\r\nSmart TV Features: Android TV 9.0 | OnePlus Connect | Google Assistant | Play Store | Chromecast | Shared Album | Supported Apps : Netflix, YouTube, Prime video | Content Calendar | OxygenPlay\r\nDisplay : LED Panel | Noise Reduction | Colour Space Mapping |Dynamic Contrast | Anti-Aliasing | DCI-P3 93% colour gamut | Gamma Engine\r\nDesign: Bezel-less | Screen/Body Ratio = 91.4%\r\nWarranty Information: 1 year comprehensive warranty and additional 1 year on panel provided by the manufacturer from date of purchase', 1, 1, 0, 5, 1),
(37, 'TCL 100 cm (40 inches) Full HD Certified Android Smart LED TV 40S6500FS (Black) (2020 Model)', '754498867.jpg', 13, 13, 'Brand	TCL\r\nSupported Internet Services	Netflix, Amazon Prime, Disney+Hotstar, PlayStore, YouTube', 'Resolution: Full HD (1920 x 1080) | Refresh Rate: 60 Hertz\r\nConnectivity: 2 HDMI Ports to connect set top box, Blu Ray players, gaming console | 1 USB Ports to connect hard drives and other USB devices\r\nSound : 20 Watts Output | Integrated Powerful 2 Stero Surrounding Soundbox speakers with Dolby Audio\r\nSmart TV Features: AI-IN | Built-in WiFi | Android 9 (Certified by Google) | Built-in Chromecast | Dual Core MALI 470 Graphics Processor | Prime video | Youtube | Netflix | Voice Search\r\nDisplay: Slim Design | A+ Grade Panel | Micro Dimming | True Color | View Angle : 178 degree | 2K HDR10 | Color: 16.7 Million(8bit)\r\nWarranty Information: 1 Year warranty provided by the manufacturer from date of purchase\r\nEasy returns: This product is eligible for replacement within 10 days of delivery in case of any product defects, damage or features not matching the description provided', 0, 1, 0, 4, 1),
(38, 'Samsung Galaxy Tab S6 Lite 26.31 cm (10.4 inch), S-Pen in Box, Slim and Light, Dolby Atmos Sound, 4 GB RAM, 64 GB ROM, Wi-Fi Tablet, Chiffon Pink', '578912165.jpg', 13, 14, 'Series	Samsung Galaxy Tab S6 Lite\r\nBrand	Samsung\r\nGeneration	2nd Generation\r\nScreen Size	26.31 Centimetres\r\nOperating System	Android', '26.31 Centimeters (10.4-inch) TFT with 2000 x 1200 pixels resolution, 16M color support\r\nErgonomic S-Pen included in box\r\n8MP primary camera | 5MP front facing camera\r\nDual Speaker with Dolby Atmos\r\nAndoid 10 operating system with 2.3GHz Exynos9611 Octa Core processor\r\n4GB RAM, 64GB internal memory expandable up to 1TB\r\n7,040mAH lithium-ion battery', 1, 1, 0, 3, 1),
(39, 'Xiaomi Pad 5 | Snapdragon 860 | 2.5K Resolution,', '266779279.jpg', 13, 14, 'Series	Xiaomi Pad 5\r\nBrand	MI\r\nScreen Size	10.95 Inches\r\nOperating System	Android 11', 'Qualcomm Snapdragon 860 Octa-core processor | 6GB RAM | 128GB Internal Storage\r\nWQHD+ (2560x1600 high resolution) 10.95\" Dolby Vision display | 120Hz refresh rate | Supports DCI-P3 with over 1 billion colours\r\nQuad Speakers with Dolby Atmos | Long lasting 8720 mAh Battery | Android 11\r\n13MP Rear Camera with 4K recording | 8MP Front camera | Ultra Slim design', 0, 1, 0, 4, 1),
(40, '2021 Apple iPad Pro with Apple M1 chip', '208260223.jpg', 13, 14, 'Model Name	IPad Pro\r\nBrand	Apple\r\nGeneration	3rd Generation\r\nScreen Size	11\r\nOperating System	IOS 14', 'Apple M1 chip for next-level performance\r\nStunning 27.96 cm (11-inch) Liquid Retina display with ProMotion, True Tone, and P3 wide color\r\nTrueDepth camera system featuring Ultra Wide front camera with Center Stage\r\n12MP Wide camera, 10MP Ultra Wide camera, and LiDAR Scanner for immersive AR\r\nStay connected with ultrafast Wi-Fi and 4GLTE\r\nGo further with all-day battery life\r\nThunderbolt port for connecting to fast external storage, displays, and docks', 1, 1, 0, 5, 1),
(41, 'Godrej 190 L 5 Star Inverter Direct-Cool Single Door Refrigerator with Jumbo Vegetable Tray', '228756329.jpg', 13, 15, 'Brand	Godrej\r\nCapacity	190 litres\r\nConfiguration	Freezer-on-Top\r\nEnergy Star	5 Star\r\nColour	Sleek Steel', 'Direct cool refrigerator: Economical and requires manual defrosting\r\nCapacity: 190 litres suitable for a small family\r\nEnergy rating: 5 star, Annual energy consumption: 104 Kilowatt Hours\r\nMade in India\r\nWarranty: 1 year on product, 10 years on compressor\r\nCompressor: The refrigerator comes with Advanced inverter technology\r\nShelf type: Spill proof toughened glass', 0, 1, 0, 4, 1),
(42, 'Samsung 192 L 2 Star Direct Cool Single Door Refrigerator (RR19A241BGS/NL, Grey Silver)', '461511142.jpg', 13, 15, 'Brand	Samsung\r\nCapacity	192 litres\r\nConfiguration	Freezer-on-Top\r\nEnergy Star	2 Star\r\nColour	Grey Silver', 'Direct-cool refrigerator : economical and Cooling without fluctuation\r\nCapacity 192 liters: suitable for families with 2 to 3 members\r\nEnergy Rating: 2 Star\r\nManufacturer Warranty: 1 year on product, 10 years on compressor\r\nShelf type: spill proof toughened glass\r\nInside box: 1 unit Refrigerator & 1 unit user manual with warranty card\r\nSpl. Features: Stablizer free operation (Voltage range 130V - 290V), Stylish crown design, Big Bottle Guard', 1, 1, 0, 4, 1),
(43, 'LG 630 L 3 Star Frost Free Inverter Hygiene Fresh+ Double Door Refrigerator', '906850078.jpg', 13, 15, 'Brand	LG\r\nCapacity	630 litres\r\nConfiguration	Full-Sized Freezer-on-Top\r\nEnergy Star	3 Star\r\nColour	Shiny Steel', 'Frost-free refrigerator; 630 litres capacity\r\nEnergy Rating: 3 Star\r\nWarranty: 1 year on product, 10 years on compressor\r\nFrost free refrigerator: auto defrost function to prevent ice-build up\r\nCapacity 630 L: Suitable for families with 5 or more members I freezer capacity: 176L, fresh food capacity: 454L\r\nInverter linear compressor: uniform cooling anytime, energy efficient, less noise & more durable\r\nShelf Type: Trimless tempered glass; No. Of shelves: 02; Top LED: energy efficient & longer life Span', 0, 1, 0, 4, 1),
(44, 'Whirlpool 190 L 3 Star Direct-Cool Single Door Refrigerator', '119721700.jpg', 13, 15, 'Brand	Whirlpool\r\nCapacity	190 litres\r\nConfiguration	Freezer-on-Top\r\nEnergy Star	3 Star\r\nColour	Blue', 'Direct-cool refrigerator: 190 L with 3S Energy rating\r\nFaster cooling & Better cooling efficiency with Insulated capillary technology\r\nProvides upto 9 hours of cooling retention (in case of power cuts)\r\nHoney comb Lock-in to maintain optimum moisture in your vegetables\r\nManufacturer warranty: 1 year on product, 10 years on compressor\r\nShelf type: Spill proof toughened glass\r\nIncluded in the box: ‎‎1 Unit Refrigerator,1 User Manual, 1 Key & 2 removable adjustable legs\r\nSpecial Features: Jumbo storage (Upto three 2L bottles and five 1L bottles), Stabilizer free operations, Easy Defrosting, Quick chill zone, Large vegetable crisper, Insulated Capillary Technology, Anti bacterial gasket', 0, 1, 0, 4, 1),
(45, 'Hammonds Flycatcher Genuine Leather Men Leather 15.6 inch Laptop Messenger Bag LB150BL (Black)', '831141758.jpg', 15, 0, 'Craftsmanship, metal fitting and reinforcement material: pure leather bags get more beautiful on ageing. These are not PU which will contain shine on its surface. Start your journey now this bag as a messenger bag, shoulder bag or laptop bag. Suitable for your school, office, college, university, meeting, and business for everyday use. It also makes for a great present. It is also most important to use good quality metal fittings and reinforcement materials', 'Warranty - 1-year warranty and lifetime customer service; Waterproof and durable : the laptop messenger bag is durable fabric lining and the metal parts are made of zinc the metal part make the bag more durable to support more weight. The waterproof leather is usable at bad weather whenever you bring the important stuff to go out\r\nReal leather quality : premium pure real Leather: crafted from tough, 100% full-grain leather, which takes hits well and looks even better with age. Full-grain Leather is the top layer of the buffalo skin which is the most expensive and toughest part. The distinguishing feature of this leather is that the leather may have two tone (i.e. shade of two colors), original leather grain, and leathers are made through a totally 12 complete process that are inherent characteristics', 1, 1, 0, 5, 1),
(46, 'ADISA Laptop Backpack 31 Ltrs', '349641665.jpg', 15, 0, 'Dimensions: 31 L x 20 W x 47 H cms; Capacity: 36 Liters; Number of Compartments: 4\r\nLaptop Compatibility: Up to 15.6 inchs; Material: Polyester; Water Resistance Level: Water Resistant', 'Dimensions: 31 L x 20 W x 47 H cms; Capacity: 36 Liters; Number of Compartments: 4\r\nLaptop Compatibility: Up to 15.6 inchs; Material: Polyester; Water Resistance Level: Water Resistant\r\nSpecial Features: Adjustable Padded Shoulder Handles; 2 Bottle Holders; Padded Handle\r\nAge Range Description: Adult; Special Features: Integrated Rain Cover; Pocket Description: Utility Pocket; Lining Description: Polyester; Closure Type: Zipper; Outer Material Type: Polyester; Pattern Name: Solid\r\nPattern Name: Solid; Closure Type: Zipper; Pocket Description: Utility Pocket; Lining Description: Polyester; Special Features: Integrated Rain Cover; Outer Material Type: Polyester; Age Range Description: Adult', 0, 1, 0, 4, 1),
(47, 'Fur Jaden Hiking Camping Rucksack Casual 10 Ltrs Blue Casual Backpack', '712242739.jpg', 15, 0, 'Ideal For - Men, Women and Children of all age groups. Can be used for Hiking, Trekking or as a Casual Backpack for Daily Commute', 'Ideal For - Men, Women and Children of all age groups. Can be used for Hiking, Trekking or as a Casual Backpack for Daily Commute\r\nSmall Size - Please note this is a small sized backpack and we request you to see Mannequin Image before ordering to understand size.\r\nDimension and Capacity - 10L Backpack. Dimensions - 23 x 39 x 10 CM (L x H x W).\r\nThe backpack features a sleek and ergonomic design with a balanced weight distribution. This makes this product a suitable alternative to bulky and unsightly backpacks. The compact design of this backpack helps you to rest it comfortably on your shoulders while accommodating all your essentials with ease.\r\nWarranty - 6 Month Warranty Against Manufacturing Defects. 10 Days No Questions Asked Return Policy', 1, 1, 0, 5, 1),
(48, 'PALAY Women\'s Small Cross', '701430946.jpg', 15, 0, 'Crossbody Phone Bags for Women Size: 7.1\"(H) x 4.37\"(L) x 1.96\"(W), erfect size to storage your phone, napkin paper, lipsticks, mascara, coins, cards, keys, ect. Lightweight and easy to carry.', 'Crossbody Phone Bags for Women Size: 7.1\"(H) x 4.37\"(L) x 1.96\"(W), erfect size to storage your phone, napkin paper, lipsticks, mascara, coins, cards, keys, ect. Lightweight and easy to carry.\r\nPalay Women Crossbody Phone Bag: we offer multi-stylish printed small purse for women, fashion appearance, premium pu leather, firm double stitching edge, which owner durable polyester lining and upgraded zipper, sturdy, wear-resistant and not easy to be ripped. Improved zippers are smooth enough not to worry about stuck or separation issue.\r\nWomen\'s Wallet Small & Practical: cell phone crossbody purses come with 1 front phone pocket, 1 main zipper pocket, 1 bill compartment, 6 credit card slots, 2 clear ID window, large capacity can meet your daily needs, such as passport, credit cards, keys, lipsticks, headphones, tickets, cash and classify your personal small items.\r\nIdeal Gifts For Girls: small crossbody phone bag is a wonderful choice for shopping, dating, night out, travel,working when you do not want to take too much stuff. Meanwhile, we provide you additional gift cards which fit all kind of theme, such as birthdays, anniversaries, weddings, valentine\'s day, mother\'s day, Christmas and other special events, It\'s a best gift for womens, lady, girls, teenage,work mom etc.', 0, 1, 0, 4, 1),
(49, 'PristiveFashionHub Women\'s Codding Long Anarkali Gown With Duppta', '282915157.jpg', 12, 9, 'Gown work: codding || type: semi-stitched (Free Size) ||you can fit to small to XXL size; Style:- anarkali gown , parties wear , function', 'Gown work: codding || type: semi-stitched (Free Size) ||you can fit to small to XXL size; Style:- anarkali gown , parties wear , function\r\nGown fabric : top:- georgette || inner:-shantton || dupatta:- georgette with heavy work. which will provide full comfort everywhere\r\nSuitable for marriages and special occasion this can be paired with beautiful earrings and footwear to enhance your appearance\r\nSleeve Type: Long Sleeve; Closure Type: Popper\r\nAge Range Description: Adult', 1, 2, 1, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pro_attr`
--

CREATE TABLE `pro_attr` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `mrp` float NOT NULL,
  `size_id` int(11) DEFAULT NULL,
  `color_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `image` varchar(15) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pro_attr`
--

INSERT INTO `pro_attr` (`id`, `p_id`, `mrp`, `size_id`, `color_id`, `qty`, `image`, `status`) VALUES
(13, 6, 600, 7, 4, -13, '639306674.jpg', 1),
(14, 6, 600, 7, 8, -13, '973605814.jpg', 1),
(15, 6, 600, 7, 10, -13, '841694615.jpg', 1),
(16, 6, 600, 7, 11, -13, '327630973.jpg', 1),
(17, 7, 250, 7, 13, -13, '458506284.jpg', 1),
(18, 7, 250, 7, 4, -13, '822339546.jpg', 1),
(19, 7, 250, 7, 11, -13, '483284739.jpg', 1),
(20, 7, 250, 7, 12, -13, '837215960.jpg', 1),
(21, 8, 350, 6, 4, -13, '950450210.jpg', 1),
(22, 8, 350, 6, 11, -13, '196490912.jpg', 1),
(23, 9, 150, 6, 14, -13, '767926954.jpg', 1),
(24, 10, 147, 8, 12, -13, '546207181.jpg', 1),
(25, 10, 147, 8, 13, -13, '754537239.jpg', 1),
(26, 11, 300, 8, 7, -13, '893142539.jpg', 1),
(27, 11, 300, 8, 4, -13, '374701354.jpg', 1),
(28, 11, 300, 8, 12, -13, '950285751.jpg', 1),
(29, 12, 550, 8, 13, -13, '760276944.jpg', 1),
(30, 12, 550, 8, 14, -13, '277867223.jpg', 1),
(31, 12, 550, 8, 4, -13, '165737833.jpg', 1),
(32, 12, 550, 8, 14, -13, '126331084.jpg', 1),
(33, 13, 700, 8, 14, -13, '544546118.jpg', 1),
(34, 14, 1200, 8, 4, -13, '246064997.jpg', 1),
(35, 15, 700, 8, 4, -13, '185910814.jpg', 1),
(36, 15, 700, 8, 14, -13, '397785448.jpg', 1),
(37, 15, 700, 8, 13, -13, '253115480.jpg', 1),
(38, 16, 750, 8, 7, -13, '921829143.jpg', 1),
(39, 16, 750, 8, 14, -13, '236497840.jpg', 1),
(40, 17, 800, 8, 15, -13, '506663241.jpg', 1),
(41, 17, 800, 8, 8, -13, '881705269.jpg', 1),
(42, 18, 1000, 8, 14, -13, '311144922.jpg', 1),
(43, 19, 1200, 8, 4, -13, '159594476.jpg', 1),
(44, 19, 1200, 8, 7, -13, '139068102.jpg', 1),
(45, 20, 1700, 8, 4, -13, '890679388.jpg', 1),
(46, 20, 1700, 8, 7, -13, '231800984.jpg', 1),
(47, 20, 1700, 8, 16, -13, '299020411.jpg', 1),
(48, 20, 1700, 8, 18, -13, '933338400.jpg', 1),
(49, 20, 1700, 8, 17, -13, '944015920.jpg', 1),
(50, 20, 1700, 8, 8, -13, '519810208.jpg', 1),
(51, 21, 2050, 4, 13, -13, '626516876.jpg', 1),
(52, 22, 550, 8, 18, -13, '514646373.jpg', 1),
(53, 23, 250, 8, 4, -13, '203352103.jpg', 1),
(54, 24, 300, 8, 11, -13, '862129332.jpg', 1),
(55, 24, 300, 8, 8, -13, '508459282.jpg', 1),
(56, 25, 550, 8, 14, -13, '615831819.jpg', 1),
(57, 25, 550, 8, 12, -13, '200401031.jpg', 1),
(58, 30, 35000, 0, 7, -13, '886911251.jpg', 1),
(59, 30, 35000, 0, 8, -13, '585501109.jpg', 1),
(60, 31, 25000, 0, 7, -13, '721003679.jpg', 1),
(61, 31, 25000, 0, 4, -13, '899209111.jpg', 1),
(62, 32, 20000, 0, 14, -13, '411150390.jpg', 1),
(63, 32, 20000, 0, 4, -13, '697651700.jpg', 1),
(64, 33, 11000, 0, 14, -13, '608353506.jpg', 1),
(65, 34, 12000, 0, 14, -13, '200458315.jpg', 1),
(66, 35, 30000, 0, 14, -13, '614390694.jpg', 1),
(67, 36, 17000, 0, 14, -13, '959864590.jpg', 1),
(68, 37, 21000, 0, 14, -13, '938295506.jpg', 1),
(69, 38, 26000, 0, 15, -13, '811380118.jpg', 1),
(70, 38, 26000, 0, 8, -13, '566929619.jpg', 1),
(71, 39, 29000, 0, 14, -13, '554725041.jpg', 1),
(72, 40, 81000, 0, 15, -13, '954676295.jpg', 1),
(73, 41, 16000, 0, 15, -13, '575845789.jpg', 1),
(74, 42, 14000, 0, 15, -13, '916543381.jpg', 1),
(75, 43, 17000, 0, 15, -13, '282726294.jpg', 1),
(76, 44, 14000, 0, 4, -13, '641102131.jpg', 1),
(77, 45, 10000, 0, 14, -13, '754586800.jpg', 1),
(78, 45, 10000, 0, 9, -13, '680450326.jpg', 1),
(79, 46, 750, 0, 14, -13, '963834228.jpg', 1),
(80, 46, 750, 0, 4, -13, '406238159.jpg', 1),
(81, 47, 350, 0, 4, -13, '531330338.jpg', 1),
(82, 48, 900, 0, 8, -13, '931517094.jpg', 1),
(83, 48, 900, 0, 14, -13, '395983583.jpg', 1),
(84, 49, 1200, 12, 20, -13, '313659640.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `u_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `size`, `u_id`, `status`, `created_at`, `updated_at`) VALUES
(4, '2XL', 0, 1, '2022-05-15 23:51:53', '2022-05-23 09:15:31'),
(5, 'S', 0, 1, '2022-05-22 21:13:30', '2022-05-22 21:13:30'),
(6, 'L', 0, 1, '2022-05-22 21:13:38', '2022-05-22 21:13:38'),
(7, 'M', 0, 1, '2022-05-22 21:13:55', '2022-05-22 21:13:55'),
(8, 'XL', 0, 1, '2022-05-22 21:14:10', '2022-05-22 21:14:10'),
(12, 'XL', 1, 1, '2022-06-06 19:48:25', '2022-06-06 19:48:25');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `sub_category_name`, `category_id`, `status`, `created_at`, `updated_at`) VALUES
(8, 'Man', 12, 1, '2022-05-22 20:26:36', '2022-05-22 20:26:36'),
(9, 'Woman', 12, 1, '2022-05-22 20:26:46', '2022-05-22 20:26:46'),
(10, 'Children', 12, 1, '2022-05-22 20:27:31', '2022-05-22 20:27:31'),
(11, 'Sports', 12, 1, '2022-05-22 20:27:43', '2022-05-22 20:27:43'),
(12, 'Mobile', 13, 1, '2022-05-22 20:32:37', '2022-05-22 20:32:37'),
(13, 'Tv', 13, 1, '2022-06-10 19:34:44', '2022-06-10 19:34:44'),
(14, 'Tablet', 13, 1, '2022-05-22 20:34:06', '2022-05-22 20:34:06'),
(15, 'Refrigerator', 13, 1, '2022-05-22 20:35:15', '2022-05-22 20:35:15'),
(16, 'Man', 14, 1, '2022-05-22 20:35:38', '2022-05-22 20:35:38'),
(17, 'Woman', 14, 1, '2022-05-22 20:35:47', '2022-05-22 20:35:47'),
(18, 'Children', 14, 1, '2022-05-22 20:35:54', '2022-05-22 20:35:54');

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE `taxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Tax` int(11) NOT NULL,
  `u_Id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taxes`
--

INSERT INTO `taxes` (`id`, `Tax`, `u_Id`, `created_at`, `updated_at`) VALUES
(1, 18, 0, '2022-05-08 07:10:28', '2022-05-08 07:10:28'),
(2, 15, 1, '2022-06-06 00:03:13', '2022-06-06 12:05:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` int(11) DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `status`, `created_at`, `updated_at`) VALUES
(1, 'KUSH', 'JUTHNAI', 'juthanikush@gmail.com', 1, '$2y$10$Z6rwetSLQkC8FV.7KHAzUeDkBxrR2DHe1AIWGEAkglKn7gPqlmXeC', 1, '2022-05-24 03:13:06', '2022-05-24 03:13:06'),
(3, 'KUSH', 'JUTHNAI', 'juthanikush18@gmail.com', 1, '$2y$10$47QeEvwpyOHqusefKhs91ekTDFFemP4Wc2JYagoS3BASJnp5pWOzS', 1, '2022-06-03 20:20:39', '2022-06-03 20:20:39');

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `city` varchar(15) NOT NULL,
  `pincode` int(7) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`id`, `u_id`, `name`, `city`, `pincode`, `address`) VALUES
(6, 1, 'alok1', 'Gondal', 741258, 'test'),
(7, 3, 'KUSH JUTHNAI', 'Rajkot', 360001, 'Place Road'),
(8, 3, 'alok', 'jsdalkfalj', 741258, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `vendore_details`
--

CREATE TABLE `vendore_details` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `password` varchar(200) NOT NULL,
  `business_name` varchar(50) NOT NULL,
  `GST_NO` varchar(15) NOT NULL,
  `athara_cart_no` bigint(15) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendore_details`
--

INSERT INTO `vendore_details` (`id`, `u_id`, `password`, `business_name`, `GST_NO`, `athara_cart_no`, `status`) VALUES
(1, 1, '$2y$10$dczoDRgdgfRrWFytvufg7es1f90If7wdP4ehBGU7RoOBF7ul0QHIW', 'kush', '1234567890', 123456789087, 1);

-- --------------------------------------------------------

--
-- Table structure for table `wishilist`
--

CREATE TABLE `wishilist` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishilist`
--

INSERT INTO `wishilist` (`id`, `u_id`, `p_id`) VALUES
(1, 1, 15),
(2, 1, 18);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_to_cart`
--
ALTER TABLE `add_to_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `baners`
--
ALTER TABLE `baners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pro_attr`
--
ALTER TABLE `pro_attr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendore_details`
--
ALTER TABLE `vendore_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishilist`
--
ALTER TABLE `wishilist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_to_cart`
--
ALTER TABLE `add_to_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `baners`
--
ALTER TABLE `baners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `pro_attr`
--
ALTER TABLE `pro_attr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vendore_details`
--
ALTER TABLE `vendore_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wishilist`
--
ALTER TABLE `wishilist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
