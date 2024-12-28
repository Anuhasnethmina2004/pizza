/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 80030
 Source Host           : localhost:3306
 Source Schema         : pizza

 Target Server Type    : MySQL
 Target Server Version : 80030
 File Encoding         : 65001

 Date: 28/12/2024 17:46:08
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for cache
-- ----------------------------
DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache`  (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cache
-- ----------------------------

-- ----------------------------
-- Table structure for cache_locks
-- ----------------------------
DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks`  (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cache_locks
-- ----------------------------

-- ----------------------------
-- Table structure for cart
-- ----------------------------
DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `price` decimal(10, 2) NOT NULL DEFAULT 0.00,
  `loyalty` int NOT NULL DEFAULT 0,
  `discounts` decimal(10, 2) NOT NULL DEFAULT 0.00,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `item_count` int NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `delivery_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `phone_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `delivery_status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cart
-- ----------------------------
INSERT INTO `cart` VALUES (1, 0.00, 0, 0.00, '1', 2, '2024-12-22 10:45:26', NULL, 'Anuhas Liyanage', NULL, '3', '2024-12-22 05:15:26', '2024-12-27 15:23:18', 3);
INSERT INTO `cart` VALUES (2, 0.00, 0, 0.00, '1', 2, '2024-12-22 12:39:33', 'fgfdg', 'ssssss', '123456765fgd', '0', '2024-12-22 07:09:33', '2024-12-22 07:09:33', 3);
INSERT INTO `cart` VALUES (3, 0.00, 0, 0.00, '1', 1, '2024-12-24 20:31:07', 'kegalle', 'Anuhas Liyanage', '0716340944', '1', '2024-12-24 15:01:07', '2024-12-27 09:10:55', 4);
INSERT INTO `cart` VALUES (4, 0.00, 0, 0.00, '1', 1, '2024-12-24 21:53:48', 'kegalle', 'Anuhas Liyanage', '0716340944', '0', '2024-12-24 16:23:48', '2024-12-24 16:23:48', 5);
INSERT INTO `cart` VALUES (5, 0.00, 0, 0.00, '1', 1, '2024-12-24 22:05:15', NULL, 'Anuhas Liyanage', '0716340944', '0', '2024-12-24 16:35:15', '2024-12-24 16:35:15', 5);
INSERT INTO `cart` VALUES (6, 724.00, 0, 0.00, '1', 5, '2024-12-26 23:29:16', NULL, 'Anuhas Liyanage', '0716340944', '3', '2024-12-26 17:59:16', '2024-12-26 18:53:34', 7);
INSERT INTO `cart` VALUES (7, 130.00, 0, 50.00, '1', 1, '2024-12-28 15:56:14', 'jaffna', 'Anuhas Liyanage', '0716340944', '0', '2024-12-28 10:26:14', '2024-12-28 10:26:14', 7);
INSERT INTO `cart` VALUES (8, 130.00, 0, 50.00, '1', 1, '2024-12-28 17:20:30', 'jaffna', 'Anuhas Liyanage', '0716340944', '0', '2024-12-28 11:50:30', '2024-12-28 11:50:30', 7);
INSERT INTO `cart` VALUES (9, 130.00, 0, 50.00, '1', 1, '2024-12-28 17:33:04', 'kegalle', 'Anuhas Liyanage', '0716340944', '0', '2024-12-28 12:03:04', '2024-12-28 12:03:04', 7);

-- ----------------------------
-- Table structure for discounts
-- ----------------------------
DROP TABLE IF EXISTS `discounts`;
CREATE TABLE `discounts`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `type` enum('fixed','percentage') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` decimal(10, 2) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `max_uses` int NOT NULL DEFAULT 0,
  `uses` int NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `discounts_code_unique`(`code` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of discounts
-- ----------------------------
INSERT INTO `discounts` VALUES (1, '7272', 'Discount', 'fixed', 50.00, '2024-12-27', '2025-01-05', 100, 0, NULL, NULL);

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for feedback
-- ----------------------------
DROP TABLE IF EXISTS `feedback`;
CREATE TABLE `feedback`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `rating` tinyint UNSIGNED NOT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of feedback
-- ----------------------------
INSERT INTO `feedback` VALUES (1, 7, 6, 4, 'test', '2024-12-27 16:44:54', '2024-12-27 16:44:54');
INSERT INTO `feedback` VALUES (3, 7, 1, 2, 'sdssd', '2024-12-27 16:50:24', '2024-12-27 16:50:24');

-- ----------------------------
-- Table structure for job_batches
-- ----------------------------
DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches`  (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `cancelled_at` int NULL DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of job_batches
-- ----------------------------

-- ----------------------------
-- Table structure for jobs
-- ----------------------------
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED NULL DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `jobs_queue_index`(`queue` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jobs
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '0001_01_01_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '0001_01_01_000001_create_cache_table', 1);
INSERT INTO `migrations` VALUES (3, '0001_01_01_000002_create_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2024_12_18_173502_create_pizza_crusts_table', 1);
INSERT INTO `migrations` VALUES (5, '2024_12_18_173503_create_pizza_sauces_table', 1);
INSERT INTO `migrations` VALUES (6, '2024_12_18_173504_create_pizza_orders_table', 1);
INSERT INTO `migrations` VALUES (7, '2024_12_18_173504_create_pizza_toppings_table', 1);
INSERT INTO `migrations` VALUES (8, '2024_12_18_173505_create_order_statuses_table', 1);
INSERT INTO `migrations` VALUES (9, '2024_12_20_050219_create_cart_table', 2);
INSERT INTO `migrations` VALUES (10, '2024_12_26_150630_create_discounts_table', 3);
INSERT INTO `migrations` VALUES (11, '2024_12_26_150711_create_promotions_table', 3);
INSERT INTO `migrations` VALUES (12, '2024_12_26_150740_create_feedback_table', 3);

-- ----------------------------
-- Table structure for order_statuses
-- ----------------------------
DROP TABLE IF EXISTS `order_statuses`;
CREATE TABLE `order_statuses`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of order_statuses
-- ----------------------------

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for pizza_crusts
-- ----------------------------
DROP TABLE IF EXISTS `pizza_crusts`;
CREATE TABLE `pizza_crusts`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8, 2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pizza_crusts
-- ----------------------------
INSERT INTO `pizza_crusts` VALUES (1, 'Thin', 100.00, '2024-12-19 21:07:45', '2024-12-19 21:07:49');
INSERT INTO `pizza_crusts` VALUES (2, 'Big', 150.00, '2024-12-19 21:08:14', '2024-12-19 21:08:17');
INSERT INTO `pizza_crusts` VALUES (3, 'crunchy', 2000.00, '2024-12-19 21:08:37', '2024-12-19 21:08:39');

-- ----------------------------
-- Table structure for pizza_orders
-- ----------------------------
DROP TABLE IF EXISTS `pizza_orders`;
CREATE TABLE `pizza_orders`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `toppings` json NOT NULL,
  `crust` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sauce` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8, 2) NOT NULL,
  `favorite` tinyint(1) NOT NULL DEFAULT 0,
  `paid` tinyint(1) NOT NULL DEFAULT 0,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `cheese_level` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `cart_id` bigint UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `pizza_orders_user_id_foreign`(`user_id` ASC) USING BTREE,
  INDEX `pizza_orders_cart_id_foreign`(`cart_id` ASC) USING BTREE,
  CONSTRAINT `pizza_orders_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `pizza_orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pizza_orders
-- ----------------------------
INSERT INTO `pizza_orders` VALUES (2, 1, '[\"Sausage\"]', 'Thin', 'Tomato', 140.00, 0, 1, '1', '2024-12-19 15:48:54', '2024-12-19 15:52:02', 'Test', NULL, NULL);
INSERT INTO `pizza_orders` VALUES (3, 1, '[\"Sausage\", \"Chicken\"]', 'Big', 'Mayo', 197.00, 0, 1, '1', '2024-12-19 15:50:31', '2024-12-19 15:52:02', 'Test', NULL, NULL);
INSERT INTO `pizza_orders` VALUES (5, 1, '[\"1\", \"2\"]', '1', '3', 139.00, 0, 1, '1', '2024-12-19 16:10:26', '2024-12-19 16:10:29', 'Test', NULL, NULL);
INSERT INTO `pizza_orders` VALUES (6, 1, '[\"1\", \"2\"]', '1', '1', 157.00, 0, 1, '1', '2024-12-19 16:16:45', '2024-12-19 16:43:03', 'Test', NULL, NULL);
INSERT INTO `pizza_orders` VALUES (7, 1, '[\"1\", \"2\"]', '1', '1', 157.00, 0, 1, '1', '2024-12-19 16:43:11', '2024-12-19 16:43:14', 'Test', NULL, NULL);
INSERT INTO `pizza_orders` VALUES (8, 1, '[]', '1', '1', 120.00, 0, 1, '1', '2024-12-19 16:43:20', '2024-12-19 16:52:46', 'Test', NULL, NULL);
INSERT INTO `pizza_orders` VALUES (9, 1, '[\"2\"]', '2', '2', 177.00, 0, 1, '1', '2024-12-19 17:18:55', '2024-12-19 17:32:15', 'Test', NULL, NULL);
INSERT INTO `pizza_orders` VALUES (12, 1, '[]', '1', '1', 120.00, 0, 1, '1', '2024-12-19 17:31:52', '2024-12-19 17:32:15', 'Test', NULL, NULL);
INSERT INTO `pizza_orders` VALUES (13, 3, '[\"1\"]', '2', '2', 180.00, 0, 1, '1', '2024-12-22 04:55:15', '2024-12-22 05:15:26', 'Test', NULL, NULL);
INSERT INTO `pizza_orders` VALUES (14, 3, '[\"1\"]', '1', '1', 120.00, 0, 1, '1', '2024-12-22 05:09:28', '2024-12-22 05:15:26', 'Test', NULL, NULL);
INSERT INTO `pizza_orders` VALUES (15, 3, '[\"1\"]', '2', '2', 180.00, 1, 1, '1', '2024-12-22 07:07:00', '2024-12-22 07:09:33', 'Test', NULL, NULL);
INSERT INTO `pizza_orders` VALUES (16, 3, '[\"1\", \"2\"]', '3', '2', 2047.00, 1, 1, '1', '2024-12-22 07:07:36', '2024-12-22 07:09:33', 'Test', NULL, NULL);
INSERT INTO `pizza_orders` VALUES (17, 4, '[\"2\"]', '1', '1', 137.00, 1, 1, '1', '2024-12-24 15:00:47', '2024-12-24 15:01:07', 'Test', NULL, NULL);
INSERT INTO `pizza_orders` VALUES (18, 4, '[\"1\", \"2\"]', '1', '1', 157.00, 0, 0, '0', '2024-12-24 16:06:35', '2024-12-24 16:06:35', 'Test', 'regular', NULL);
INSERT INTO `pizza_orders` VALUES (19, 5, '[\"1\", \"2\"]', '2', '1', 207.00, 0, 1, '1', '2024-12-24 16:22:58', '2024-12-24 16:23:48', 'Test', 'regular', 6);
INSERT INTO `pizza_orders` VALUES (20, 5, '[]', '1', '1', 120.00, 0, 1, '1', '2024-12-24 16:31:30', '2024-12-24 16:35:15', 'Test', 'regular', 6);
INSERT INTO `pizza_orders` VALUES (21, 5, '[\"1\", \"2\"]', '1', '1', 157.00, 0, 0, '0', '2024-12-24 16:35:31', '2024-12-24 16:35:31', 'Test', 'regular', 6);
INSERT INTO `pizza_orders` VALUES (22, 7, '[\"2\"]', '2', '1', 187.00, 0, 1, '1', '2024-12-26 15:39:38', '2024-12-26 17:59:16', 'Test', 'regular', 6);
INSERT INTO `pizza_orders` VALUES (23, 7, '[\"1\", \"2\"]', '1', '1', 157.00, 0, 1, '1', '2024-12-26 15:40:36', '2024-12-26 17:59:16', 'Test', 'regular', 6);
INSERT INTO `pizza_orders` VALUES (24, 7, '[]', '1', '1', 120.00, 0, 1, '1', '2024-12-26 15:42:51', '2024-12-26 17:59:16', 'Test', 'regular', 6);
INSERT INTO `pizza_orders` VALUES (25, 7, '[]', '1', '1', 120.00, 1, 1, '1', '2024-12-26 15:44:46', '2024-12-26 17:59:16', 'Test', 'regular', 6);
INSERT INTO `pizza_orders` VALUES (26, 7, '[\"1\"]', '1', '1', 140.00, 1, 1, '1', '2024-12-26 17:57:40', '2024-12-26 17:59:16', 'Test', 'regular', 6);
INSERT INTO `pizza_orders` VALUES (30, 7, '[\"1\"]', '2', '2', 180.00, 1, 1, '1', '2024-12-28 09:54:33', '2024-12-28 12:03:04', 'Anu', 'extra', 9);

-- ----------------------------
-- Table structure for pizza_sauces
-- ----------------------------
DROP TABLE IF EXISTS `pizza_sauces`;
CREATE TABLE `pizza_sauces`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8, 2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pizza_sauces
-- ----------------------------
INSERT INTO `pizza_sauces` VALUES (1, 'Tomato', 20.00, '2024-12-19 21:09:01', '2024-12-19 21:09:05');
INSERT INTO `pizza_sauces` VALUES (2, 'Mayo', 10.00, '2024-12-19 21:09:17', '2024-12-19 21:09:21');
INSERT INTO `pizza_sauces` VALUES (3, 'oister', 2.00, '2024-12-19 21:09:37', '2024-12-19 21:09:41');

-- ----------------------------
-- Table structure for pizza_toppings
-- ----------------------------
DROP TABLE IF EXISTS `pizza_toppings`;
CREATE TABLE `pizza_toppings`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8, 2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pizza_toppings
-- ----------------------------
INSERT INTO `pizza_toppings` VALUES (1, 'Sausage', 20.00, '2024-12-19 21:09:54', '2024-12-19 21:09:57');
INSERT INTO `pizza_toppings` VALUES (2, 'Chicken', 17.00, '2024-12-19 21:10:13', '2024-12-19 21:10:17');

-- ----------------------------
-- Table structure for promotions
-- ----------------------------
DROP TABLE IF EXISTS `promotions`;
CREATE TABLE `promotions`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `type` enum('fixed','percentage') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` decimal(10, 2) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of promotions
-- ----------------------------
INSERT INTO `promotions` VALUES (1, 'Chrismas', 'Chrismas', 'fixed', 29.00, '2024-12-28', '2025-01-05', NULL, NULL);

-- ----------------------------
-- Table structure for sessions
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions`  (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NULL DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `sessions_user_id_index`(`user_id` ASC) USING BTREE,
  INDEX `sessions_last_activity_index`(`last_activity` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sessions
-- ----------------------------
INSERT INTO `sessions` VALUES ('14hPEHyB4Fc2yvjRz1yyFiRt9HYr3C7eMQTBM6V5', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVjVGWll4eHlKcmtveTI5bEVHNEhOMFpuZkU1dmc1WkJPeFpCVjRHbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1735367245);
INSERT INTO `sessions` VALUES ('41zC5qV3HVFf3ObJ80AtyUbKZVHciGE5DhIt6kkM', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUms1ZnhsM0t1MU9tVXc2aEJrQnpjVjlSeENaM2thVVVIU0VpN1dBSiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9yZWdpc3RlciI7fX0=', 1735387468);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Anuhas', 'admin@gmail.com', NULL, '$2y$12$ubLCPItIvAtz0IN2vmQsh.uqxglZZoarXDkPX7NEVh64GrUvZdcYW', NULL, '2024-12-19 15:48:28', '2024-12-19 15:48:28');
INSERT INTO `users` VALUES (3, 'Anuhas', 'anuhas.nethmina1@layoutindex.lk', NULL, '$2y$12$P4WFNbuRrr1mhQnPK4rmdeu4Yv0fEJ7YMwVXNAq8GcsBEfHB/pyKW', NULL, '2024-12-22 04:54:34', '2024-12-22 04:54:34');
INSERT INTO `users` VALUES (4, 'Anuhas', 'abc@gmail.com', NULL, '$2y$12$VonGntTI4ClIn.hu/KXo9eK1i2iIe9jb1Q7keOhWJcSPY.UOFopYC', NULL, '2024-12-24 15:00:06', '2024-12-24 15:00:06');
INSERT INTO `users` VALUES (5, 'Anuhas', 'anuhas@gmail.com', NULL, '$2y$12$r2yowE5Sop/dS3PAaJKzu.RvWfFgw.BV2hXIqJ2W7FiBjD7/o7PXC', NULL, '2024-12-24 16:21:49', '2024-12-24 16:21:49');
INSERT INTO `users` VALUES (6, 'luxshi', 'lux@gmail.com', NULL, '$2y$12$SlfDVU0T3HICJEN.RI43MuwjFQ9Fce/ZyYqG1XPg40yMxRoN3.Uja', NULL, '2024-12-25 11:59:58', '2024-12-25 11:59:58');
INSERT INTO `users` VALUES (7, 'asd', 'asd@gmail.com', NULL, '$2y$12$9D4y7FOR5Amu1XdkHm8JJ.Tptaoe8eNKhF5yWtXhnTjWaZISLf7UG', NULL, '2024-12-26 15:37:42', '2024-12-26 15:37:42');

SET FOREIGN_KEY_CHECKS = 1;
