-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2024 at 05:18 PM
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
-- Database: `coincraft`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `adminname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `datestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `adminname`, `email`, `password`, `datestamp`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$um1t5YRxGY7bsMZ2RKUZYesV/tQH3ZK5B7pHDmkb/61DLX06rSiOe', '2024-02-22 23:24:20');

-- --------------------------------------------------------

--
-- Table structure for table `daily_expenditure`
--

CREATE TABLE `daily_expenditure` (
  `id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `datestammp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daily_expenditure`
--

INSERT INTO `daily_expenditure` (`id`, `amount`, `description`, `date`, `user_id`, `category_id`, `payment_id`, `datestammp`) VALUES
(47, 5000.00, 'Tea', '2024-03-19', 1, 1, 1, '2024-03-19 00:24:08'),
(48, 5000.00, '', '2024-02-19', 1, 1, 1, '2024-03-20 12:52:30'),
(49, 500.00, '', '2024-03-12', 1, 1, 1, '2024-03-20 12:52:40'),
(50, 500.00, '', '2024-03-12', 1, 1, 1, '2024-03-20 12:53:57');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `star` int(11) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `datestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `insurance`
--

CREATE TABLE `insurance` (
  `id` int(11) NOT NULL,
  `policy_no` int(50) NOT NULL,
  `coverage` float(10,2) NOT NULL,
  `premium` int(20) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `insurance_id` int(11) NOT NULL,
  `frequency_id` int(11) NOT NULL,
  `datestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` int(11) NOT NULL,
  `amount` float(10,2) NOT NULL,
  `description` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `intrest` float(10,2) NOT NULL,
  `user_id` int(11) NOT NULL,
  `loans_id` int(11) NOT NULL,
  `frequency_id` int(11) NOT NULL,
  `datestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `datestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `name`, `description`, `datestamp`) VALUES
(1, 'Welcome to CoinCraft - Your Expense Tracker!', 'Congratulations on creating your account! We\'re thrilled to have you join our community. Whether you\'re here to explore our services, connect with others, or access exclusive features, we\'re dedicated to providing you with a seamless and rewarding experience.\r\n\r\nFeel free to navigate through our portal and discover all the exciting opportunities awaiting you. If you have any questions or need assistance along the way, our support team is here to help. Simply reach out, and we\'ll be more than happy to assist you.\r\n\r\nThank you for choosing CoinCraft. We look forward to being part of your journey and providing you with valuable resources to achieve your goals.\r\n\r\nBest regards,\r\nCoinCraft Team', '2024-03-06 21:11:39'),
(4, 'Boring', 'We will not make you to be boring, lets chill', '2024-03-13 17:43:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `budget` float NOT NULL DEFAULT 100000,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `datestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `budget`, `email`, `password`, `datestamp`) VALUES
(1, 'Indudhara', 'S', 100000, 'a@gmail.com', '$2y$10$T454fW2ROceQbi1uJSY/Ke6hTXNlk6TSpns2hE1dBEdDeuDHRHnx2', '2024-02-21 22:07:49'),
(25, 'INDUDHARA', 'S', 10, 'q@gmail.com', '$2y$10$hUgJolNNU4OQKkoWrLXyTuPOHPjclfd/E0DWk76fLPUgmHbgMl2Ru', '2024-03-18 23:52:09');

-- --------------------------------------------------------

--
-- Table structure for table `_category`
--

CREATE TABLE `_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `_category`
--

INSERT INTO `_category` (`id`, `name`, `description`) VALUES
(1, 'Food & Drink', 'Daily spending on meals, snacks, and beverages.'),
(2, 'Transportation', 'Costs related to commuting, including fuel, fares, and parking.'),
(3, 'Personal Care', 'Expenses for hygiene and grooming products.'),
(4, 'Entertainment', 'Spending on leisure activities like movies and outings.'),
(5, 'Miscellaneous', 'Small, miscellaneous purchases not fitting other categories.');

-- --------------------------------------------------------

--
-- Table structure for table `_frequency`
--

CREATE TABLE `_frequency` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `_frequency`
--

INSERT INTO `_frequency` (`id`, `name`, `description`) VALUES
(1, 'Weekly Payment', 'Loan payments made every week, spreading the repayment schedule across the month.'),
(2, 'Bi-weekly Payment', 'Loan payments made every two weeks, resulting in 26 payments per year.'),
(3, 'Monthly Payment', 'Loan payments made once a month, offering a predictable repayment schedule.'),
(4, 'Quarterly Payment', 'Loan payments made every three months, reducing the frequency of payments.'),
(5, 'Annual Payment', 'Loan payments made once per year, providing a less frequent repayment option suited for longer-term loans.');

-- --------------------------------------------------------

--
-- Table structure for table `_insurance`
--

CREATE TABLE `_insurance` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `_insurance`
--

INSERT INTO `_insurance` (`id`, `name`, `description`) VALUES
(1, 'Health Insurance', 'Covers medical expenses and healthcare services.'),
(2, 'Life Insurance', 'Offers financial protection to beneficiaries upon the policyholder\'s death.'),
(3, 'Travel Insurance', 'Protects against financial loss due to trip cancellation, medical emergencies, or lost luggage while traveling.'),
(4, 'Homeowners Insurance', 'Provides coverage for damage to homes and personal property.'),
(5, 'Pet Insurance', 'Covers veterinary expenses for illnesses, injuries, or preventive care for pets.');

-- --------------------------------------------------------

--
-- Table structure for table `_loans`
--

CREATE TABLE `_loans` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `_loans`
--

INSERT INTO `_loans` (`id`, `name`, `description`) VALUES
(1, 'Student Loan', ' Borrowed funds specifically for educational expenses, typically with deferred repayment until after graduation.'),
(2, 'Personal Loan', 'General-purpose loan that individuals can use for various personal expenses, such as debt consolidation, home improvements, or unexpected costs, usually repaid in fixed installments over a set period.'),
(3, 'Mortgage Loan', 'Loan secured by real estate property, used to purchase a home or other real estate, with repayment terms typically spanning several years to decades.'),
(4, 'Business Loan', 'Financing provided to businesses for various purposes, such as starting or expanding a business, purchasing equipment, or covering operating expenses, with repayment terms tailored to business cash flow and needs.'),
(5, 'Consolidation Loan', 'Loan used to combine multiple debts into a single payment, often with lower interest rates or extended repayment terms.');

-- --------------------------------------------------------

--
-- Table structure for table `_payment`
--

CREATE TABLE `_payment` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `_payment`
--

INSERT INTO `_payment` (`id`, `name`, `description`) VALUES
(1, 'Cash', 'Physical currency used for immediate transactions.'),
(2, 'Credit Card', 'Allows users to borrow funds up to a certain limit for purchases, with repayment later.'),
(3, 'Debit Card', 'Withdraws funds directly from a linked bank account for purchases.'),
(4, 'Check', 'A written order instructing a bank to pay a specific amount from the payer\'s account to the payee.'),
(5, 'Online Transfer', 'Directly transfers funds electronically between bank accounts.');

-- --------------------------------------------------------

--
-- Table structure for table `_star`
--

CREATE TABLE `_star` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `_star`
--

INSERT INTO `_star` (`id`, `name`, `description`) VALUES
(1, 'Very Poor ', 'Indicates the lowest rating, signifying significant dissatisfaction or disappointment with the product or service.'),
(2, 'Poor ', 'Suggests below-average quality or performance, with notable shortcomings or areas for improvement.'),
(3, 'Average ', 'Represents a neutral or middling rating, indicating a standard or acceptable level of quality.'),
(4, 'Good ', 'Reflects above-average satisfaction, indicating a positive experience with minor areas for enhancement.'),
(5, 'Excellent ', 'Signifies the highest rating, showcasing exceptional quality, performance, or service excellence.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daily_expenditure`
--
ALTER TABLE `daily_expenditure`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `payment_id` (`payment_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `star` (`star`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `insurance`
--
ALTER TABLE `insurance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `insurance_id` (`insurance_id`),
  ADD KEY `frequency_id` (`frequency_id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `loans_id` (`loans_id`),
  ADD KEY `frequency_id` (`frequency_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `_category`
--
ALTER TABLE `_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `_frequency`
--
ALTER TABLE `_frequency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `_insurance`
--
ALTER TABLE `_insurance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `_loans`
--
ALTER TABLE `_loans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `_payment`
--
ALTER TABLE `_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `_star`
--
ALTER TABLE `_star`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `daily_expenditure`
--
ALTER TABLE `daily_expenditure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `insurance`
--
ALTER TABLE `insurance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `_category`
--
ALTER TABLE `_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `_frequency`
--
ALTER TABLE `_frequency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `_insurance`
--
ALTER TABLE `_insurance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `_loans`
--
ALTER TABLE `_loans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `_payment`
--
ALTER TABLE `_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `_star`
--
ALTER TABLE `_star`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `daily_expenditure`
--
ALTER TABLE `daily_expenditure`
  ADD CONSTRAINT `daily_expenditure_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `daily_expenditure_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `_category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `daily_expenditure_ibfk_3` FOREIGN KEY (`payment_id`) REFERENCES `_payment` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`star`) REFERENCES `_star` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `insurance`
--
ALTER TABLE `insurance`
  ADD CONSTRAINT `insurance_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `insurance_ibfk_2` FOREIGN KEY (`insurance_id`) REFERENCES `_insurance` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `insurance_ibfk_3` FOREIGN KEY (`frequency_id`) REFERENCES `_frequency` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `loans`
--
ALTER TABLE `loans`
  ADD CONSTRAINT `loans_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `loans_ibfk_2` FOREIGN KEY (`loans_id`) REFERENCES `_loans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `loans_ibfk_3` FOREIGN KEY (`frequency_id`) REFERENCES `_frequency` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
