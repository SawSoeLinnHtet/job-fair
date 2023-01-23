/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE TABLE `applier_lists` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `phone_number` text COLLATE utf8mb4_general_ci NOT NULL,
  `cv_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` int NOT NULL,
  `job_id` int NOT NULL,
  `accept` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `users` (`user_id`),
  KEY `jobs` (`job_id`),
  CONSTRAINT `jobs` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE,
  CONSTRAINT `users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `image` text COLLATE utf8mb4_general_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `companies` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `image` text COLLATE utf8mb4_general_ci,
  `type` text COLLATE utf8mb4_general_ci NOT NULL,
  `email` text COLLATE utf8mb4_general_ci NOT NULL,
  `location` longtext COLLATE utf8mb4_general_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `job_types` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `jobs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `company_id` int NOT NULL,
  `category_id` int NOT NULL,
  `gender` text COLLATE utf8mb4_general_ci,
  `salary` text COLLATE utf8mb4_general_ci,
  `job_type_id` int NOT NULL DEFAULT '1',
  `address` mediumtext COLLATE utf8mb4_general_ci,
  `description` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `requirements` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `close_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `responsibility` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`),
  KEY `categories` (`category_id`),
  KEY `companies` (`company_id`),
  KEY `job_types` (`job_type_id`),
  CONSTRAINT `categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `companies` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  CONSTRAINT `job_types` FOREIGN KEY (`job_type_id`) REFERENCES `job_types` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `mails` (
  `id` int NOT NULL AUTO_INCREMENT,
  `recipient` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` int NOT NULL,
  `job_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `roles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` text COLLATE utf8mb4_general_ci NOT NULL,
  `password` text COLLATE utf8mb4_general_ci NOT NULL,
  `image` text COLLATE utf8mb4_general_ci,
  `phone_number` text COLLATE utf8mb4_general_ci NOT NULL,
  `address` mediumtext COLLATE utf8mb4_general_ci,
  `city` text COLLATE utf8mb4_general_ci NOT NULL,
  `postal_code` int NOT NULL,
  `role_id` int NOT NULL DEFAULT '2',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `roles` (`role_id`),
  CONSTRAINT `roles` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `categories` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(32, 'Sales, Business Development ', NULL, '2023-01-22 21:42:50', '2023-01-22 21:42:50');
INSERT INTO `categories` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(33, 'IT Hardware, Software', NULL, '2023-01-22 21:43:10', '2023-01-22 21:43:10');
INSERT INTO `categories` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(34, 'Marketing, Media, Creative ', NULL, '2023-01-22 21:43:22', '2023-01-22 21:43:22');
INSERT INTO `categories` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(35, 'Finance, Accounting, Audit', NULL, '2023-01-22 21:43:35', '2023-01-22 21:43:35'),
(36, 'Engineering, Technical, HSE', NULL, '2023-01-22 21:43:53', '2023-01-22 21:43:53'),
(37, 'Administrative', NULL, '2023-01-22 21:44:14', '2023-01-22 21:44:14'),
(38, 'Customer Service, Support', NULL, '2023-01-22 21:44:32', '2023-01-22 21:44:32'),
(39, 'HR, Training and Recruitment', NULL, '2023-01-22 21:44:44', '2023-01-22 21:44:44'),
(40, 'Project, Operations Management', NULL, '2023-01-22 21:46:13', '2023-01-22 21:46:13'),
(41, 'Education, Teaching, Childcare', NULL, '2023-01-22 21:46:36', '2023-01-22 21:46:36'),
(42, 'Procurement, Supply Chain', NULL, '2023-01-22 21:48:04', '2023-01-22 21:48:04'),
(43, 'Logistics, Warehousing, Port ', NULL, '2023-01-22 21:48:28', '2023-01-22 21:48:28'),
(44, 'Legal, Risk and Compliance', NULL, '2023-01-22 21:48:49', '2023-01-22 21:48:49'),
(45, 'Management ', NULL, '2023-01-22 21:49:02', '2023-01-22 21:49:02'),
(46, 'Manufacturing, Factory ', NULL, '2023-01-22 21:49:16', '2023-01-22 21:49:16'),
(47, 'Food and Beverage', NULL, '2023-01-22 21:49:31', '2023-01-22 21:49:31'),
(49, 'Hospitality, Hotel, Tourism', NULL, '2023-01-22 21:49:54', '2023-01-22 21:49:54'),
(50, 'Research and Development ', NULL, '2023-01-22 21:50:08', '2023-01-22 21:50:08'),
(51, ' Quality Assurance', NULL, '2023-01-22 21:50:20', '2023-01-22 21:50:20'),
(52, ' Strategy, Planning ', NULL, '2023-01-22 21:50:32', '2023-01-22 21:50:32'),
(53, 'Consulting ', NULL, '2023-01-22 21:50:44', '2023-01-22 21:50:44'),
(54, 'Medical, Nursing, Pharmacy', NULL, '2023-01-22 21:50:55', '2023-01-22 21:50:55'),
(55, 'PR, Communications', NULL, '2023-01-22 21:51:07', '2023-01-22 21:51:07'),
(56, 'Translation', NULL, '2023-01-22 21:51:53', '2023-01-22 21:51:53'),
(57, 'Science, Technology', NULL, '2023-01-22 21:52:10', '2023-01-22 21:52:10'),
(58, 'Writing, Editing ', NULL, '2023-01-22 21:52:25', '2023-01-22 21:52:25'),
(59, ' Architecture, Design', NULL, '2023-01-22 22:02:56', '2023-01-22 22:02:56');

INSERT INTO `companies` (`id`, `name`, `image`, `type`, `email`, `location`, `created_at`, `updated_at`) VALUES
(30, 'Yoma Bank', 'yoma.png', 'Yoma Bank', 'yoma@gmail.com', 'အမှတ် ၁၄၊ ကျိုက်ခေါက်ဘုရားလမ်း၊ ကြယ်စင်မြို့တော်၊ သန်လျင်မြို့နယ်၊ ရန်ကုန်မြို့ ၁၁၂၉၁                    ', '2023-01-22 02:56:17', '2023-01-22 02:55:03');
INSERT INTO `companies` (`id`, `name`, `image`, `type`, `email`, `location`, `created_at`, `updated_at`) VALUES
(31, 'Ayawady Bank', 'aya.png', 'Banking and Insurance', 'info@ayabank.com', 'No. 416, Mahabandoola Road, Kyauktada Township, Yangon, Myanmar.', '2023-01-22 02:58:00', '2023-01-22 02:58:00');
INSERT INTO `companies` (`id`, `name`, `image`, `type`, `email`, `location`, `created_at`, `updated_at`) VALUES
(32, 'Coca Cola', 'coca.png', 'Food & Beverages', 'sgfeedback@coca-cola.com', 'ဗန်းမော်အတွင်းဝန်လမ်း, Yangon', '2023-01-22 03:00:40', '2023-01-22 03:00:40');
INSERT INTO `companies` (`id`, `name`, `image`, `type`, `email`, `location`, `created_at`, `updated_at`) VALUES
(33, 'Unique', 'unique.png', 'It & Mobile', 'unique@gmail.com', '\r\n31, Yangon-Insein Rd., Ward (9),, Hlaing, Yangon , Myanmar', '2023-01-22 03:04:02', '2023-01-22 03:04:02'),
(34, 'United Vision', 'united.jpg', 'Eye Health and Glasses', 'unitedvison@gmail.com', '263, Shwe Bon Thar Rd, Yangon', '2023-01-22 03:05:37', '2023-01-22 03:05:37'),
(35, 'Yangon American International School', 'ygnusa.jpeg', 'Education', 'yangonusinternational@gmail.com', ' 58 Industrial Rd, Yangon', '2023-01-22 03:09:52', '2023-01-22 03:09:52'),
(36, 'Denko Myanmar', 'denko.png', 'Patroll And Machine', 'denkogroup@gmail.com', 'No.(18/19), Bayint Naung Main Road, Shwe Pone Nyet Yeik Mon, No.4 Ward, Kamaryut Township, Yangon, Myanmar.', '2023-01-22 21:18:09', '2023-01-22 21:18:09'),
(37, 'Wave Money', 'wavemoney.jpg', 'Transfaring and Billing', 'wavemoney@gmail.com', 'Yangon, Myanmar', '2023-01-22 21:22:31', '2023-01-22 21:22:31'),
(38, 'Lotteria Myanmar', 'lotteria.jpeg', 'Food & Beverages', 'lotterialmyanmar22@gmail.com', 'Thamine Junction Mosque, U Aung Bwint St, Yangon', '2023-01-22 21:24:03', '2023-01-22 21:24:03'),
(39, 'Tech Ace', 'techace.png', 'Computer accessories store', 'techace@gmail.com', '357 Thein Phyu Road, Yangon', '2023-01-22 21:25:20', '2023-01-22 21:25:20');

INSERT INTO `job_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Full Time', '2023-01-17 02:32:51', '0000-00-00 00:00:00');
INSERT INTO `job_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Part Time', '2023-01-19 22:59:29', '0000-00-00 00:00:00');
INSERT INTO `job_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'Freelance', '2023-01-19 22:59:42', '0000-00-00 00:00:00');

INSERT INTO `jobs` (`id`, `name`, `company_id`, `category_id`, `gender`, `salary`, `job_type_id`, `address`, `description`, `requirements`, `close_date`, `created_at`, `updated_at`, `responsibility`) VALUES
(48, 'Senior Accountant ', 30, 35, 'Female Only', 'Negotiate', 1, '40 Sa-dan Street Ahlon Tsp , Yangon,Myanmar', 'We are looking for an experienced HTML developer to oversee the design, coding, and implementation of website projects for our clients. In this role, you will be required to collaborate with Website Designers on the initial web design, write the code, ensure cross-platform compatibility, and provide user support.\r\n\r\nTo be successful as an HTML developer, you should have a good eye for detail and excellent knowledge of front-end technologies. Ultimately a top-notch HTML developer should be proficient in web design, a master coder, and someone with the skills to provide user support.', '<ul><li>Bachelor\'s degree in computer science, computer engineering, MIS, or similar.</li><li>At least 3 years\' experience as an HTML Developer.</li><li>In-depth knowledge of front-end coding languages including HTML, CSS, JavaScript, and XML.</li><li>Ability to troubleshoot coding and application errors.</li><li>Knowledge of web design and user application requirements.</li><li>Ability to meet strict publication deadlines.</li><li>Excellent communication and interpersonal skills.</li><li>Strong attention to detail.</li></ul><p></p>', '2023-02-02', '2023-01-22 22:07:45', NULL, '<ul><li>Meeting with Web designers to discuss project design and layout.</li><li>Coding the entire HTML site from end to end.</li><li>Debugging code and front-end web applications.</li><li>Ensuring cross-platform compatibility.</li><li>Troubleshooting application errors.</li><li>Conducting website performance and usability tests.</li><li>Meeting publication deadlines.</li><li>Providing user support.</li></ul><p></p>');
INSERT INTO `jobs` (`id`, `name`, `company_id`, `category_id`, `gender`, `salary`, `job_type_id`, `address`, `description`, `requirements`, `close_date`, `created_at`, `updated_at`, `responsibility`) VALUES
(49, 'Bike Delivery', 38, 47, 'Male and Female', '150,000', 2, 'Room 1 Shed  Wholesale Market Insein Tsp , Yangon,Myanmar', 'We are looking for an experienced HTML developer to oversee the design, coding, and implementation of website projects for our clients. In this role, you will be required to collaborate with Website Designers on the initial web design, write the code, ensure cross-platform compatibility, and provide user support.\r\n\r\nTo be successful as an HTML developer, you should have a good eye for detail and excellent knowledge of front-end technologies. Ultimately a top-notch HTML developer should be proficient in web design, a master coder, and someone with the skills to provide user support.', '<ul><li>Bachelor\'s degree in computer science, computer engineering, MIS, or similar.</li><li>At least 3 years\' experience as an HTML Developer.</li><li>In-depth knowledge of front-end coding languages including HTML, CSS, JavaScript, and XML.</li><li>Ability to troubleshoot coding and application errors.</li><li>Knowledge of web design and user application requirements.</li><li>Ability to meet strict publication deadlines.</li><li>Excellent communication and interpersonal skills.</li><li>Strong attention to detail.</li></ul><p></p>', '2024-05-05', '2023-01-22 22:12:31', NULL, '<ul><li>Meeting with Web designers to discuss project design and layout.</li><li>Coding the entire HTML site from end to end.</li><li>Debugging code and front-end web applications.</li><li>Ensuring cross-platform compatibility.</li><li>Troubleshooting application errors.</li><li>Conducting website performance and usability tests.</li><li>Meeting publication deadlines.</li><li>Providing user support.</li></ul><p></p>');
INSERT INTO `jobs` (`id`, `name`, `company_id`, `category_id`, `gender`, `salary`, `job_type_id`, `address`, `description`, `requirements`, `close_date`, `created_at`, `updated_at`, `responsibility`) VALUES
(50, 'Android Developer (Flutter)', 37, 33, 'Male Only', '500,000', 1, 'Room 1 Shed  Wholesale Market Insein Tsp , Yangon,Myanmar', 'We are looking for an experienced HTML developer to oversee the design, coding, and implementation of website projects for our clients. In this role, you will be required to collaborate with Website Designers on the initial web design, write the code, ensure cross-platform compatibility, and provide user support.\r\n\r\nTo be successful as an HTML developer, you should have a good eye for detail and excellent knowledge of front-end technologies. Ultimately a top-notch HTML developer should be proficient in web design, a master coder, and someone with the skills to provide user support.', '<h3 id=\"html-developer-requirements\"></h3><ul><li>Bachelor\'s degree in computer science, computer engineering, MIS, or similar.</li><li>At least 3 years\' experience as an HTML Developer.</li><li>In-depth knowledge of front-end coding languages including HTML, CSS, JavaScript, and XML.</li><li>Ability to troubleshoot coding and application errors.</li><li>Knowledge of web design and user application requirements.</li><li>Ability to meet strict publication deadlines.</li><li>Excellent communication and interpersonal skills.</li><li>Strong attention to detail.</li></ul><p></p>', '2023-12-03', '2023-01-22 22:24:21', NULL, '<ul><li>Meeting with Web designers to discuss project design and layout.</li><li>Coding the entire HTML site from end to end.</li><li>Debugging code and front-end web applications.</li><li>Ensuring cross-platform compatibility.</li><li>Troubleshooting application errors.</li><li>Conducting website performance and usability tests.</li><li>Meeting publication deadlines.</li><li>Providing user support.</li></ul><p></p>');

INSERT INTO `mails` (`id`, `recipient`, `title`, `message`, `sender`, `user_id`, `job_id`, `created_at`, `updated_at`) VALUES
(11, 'Hadley Richard', 'Job Accetance', 'Thank you for your job appliciant. You are chosen for our company android developer role', 'wave Money', 39, 50, '2023-01-22 23:10:16', '2023-01-22 23:10:16');


INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2023-01-17 01:14:33', '2023-01-17 01:14:33');
INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'User', '2023-01-17 01:14:42', '2023-01-17 01:14:42');


INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`, `phone_number`, `address`, `city`, `postal_code`, `role_id`, `created_at`, `updated_at`) VALUES
(36, 'Saw Soe Linn Htet haha heehee', 'soesoe@gmail.com', 'e10adc3949ba59abbe56e057f20f883e ', 'pf.jpg', '09962569030', '247-C Hlaythin A-twinn-wun U Chain Rd. Hlaing Tharyar Tsp , Yangon,Myanmar', 'afsdhglahsgl', 123131, 1, '2023-01-22 02:14:18', '0000-00-00 00:00:00');
INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`, `phone_number`, `address`, `city`, `postal_code`, `role_id`, `created_at`, `updated_at`) VALUES
(39, 'Hadley Richard', 'power@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, '+1 (929) 667-8803', '10-F Dagon Tower Shwegondaing Junction Bahan Tsp , Yangon,Myanmar', 'Rem illo fuga Labor', 19, 2, '2023-01-22 02:48:45', '0000-00-00 00:00:00');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;