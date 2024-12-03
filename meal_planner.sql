-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2024 at 12:31 AM
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
-- Database: `meal_planner`
--

-- --------------------------------------------------------

--
-- Table structure for table `meal_plans`
--

CREATE TABLE `meal_plans` (
  `MealPlanID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meal_plans`
--

INSERT INTO `meal_plans` (`MealPlanID`, `UserID`) VALUES
(4, 1),
(8, 1),
(9, 1),
(7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `meal_plan_recipes`
--

CREATE TABLE `meal_plan_recipes` (
  `MealPlanID` int(11) NOT NULL,
  `RecipeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meal_plan_recipes`
--

INSERT INTO `meal_plan_recipes` (`MealPlanID`, `RecipeID`) VALUES
(4, 13),
(4, 14),
(4, 15),
(7, 13),
(7, 14),
(8, 13),
(8, 14),
(8, 16),
(9, 13),
(9, 14),
(9, 16);

-- --------------------------------------------------------

--
-- Table structure for table `meal_type`
--

CREATE TABLE `meal_type` (
  `MealType` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meal_type`
--

INSERT INTO `meal_type` (`MealType`) VALUES
('Breakfast'),
('Dinner'),
('Lunch');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `RecipeID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `RecipeName` varchar(100) NOT NULL,
  `MealType` varchar(20) NOT NULL,
  `CookTime` int(11) NOT NULL,
  `Cal` int(11) NOT NULL,
  `URL` varchar(255) NOT NULL,
  `ImageURL` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`RecipeID`, `UserID`, `RecipeName`, `MealType`, `CookTime`, `Cal`, `URL`, `ImageURL`) VALUES
(13, 1, 'Oatmeal with Fruit', 'Breakfast', 18, 400, 'https://nenaswellnesscorner.com/breakfast-oatmeal/', '../Model/images/oatmeal.jpg'),
(14, 1, 'Grilled Chicken Salad', 'Breakfast', 20, 350, 'https://www.onceuponachef.com/recipes/perfectly-grilled-chicken-breasts.html', '../Model/images/chicken.jpg'),
(15, 1, 'Steak and Veggies', 'Dinner', 40, 600, 'https://thewholecook.com/steak-roasted-veggies/', '../Model/images/Steak-with-Roasted-Veggies-1.jpg'),
(16, 1, 'Smoothie Bowl', 'Breakfast', 15, 300, 'https://themodernproper.com/how-to-make-a-smoothie-bowl', '../Model/images/Smoothie-Bowl-8.webp'),
(17, 1, 'Turkey Sandwich', 'Lunch', 15, 400, 'https://www.favfamilyrecipes.com/turkey-sandwich/', '../Model/images/Turkey-Sandwich-3.jpg'),
(18, 1, 'Pasta Bolognese', 'Dinner', 30, 500, 'https://feelgoodfoodie.net/recipe/pasta-bolognese/', '../Model/images/Pasta-Bolognese-11.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `ScheduleID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `MealPlanID` int(11) NOT NULL,
  `MealDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`ScheduleID`, `UserID`, `MealPlanID`, `MealDate`) VALUES
(5, 1, 4, '2024-11-21'),
(8, 1, 4, '2024-11-20'),
(9, 1, 4, '2024-11-29'),
(11, 1, 4, '2024-12-02'),
(12, 1, 4, '2024-12-03'),
(13, 1, 4, '2024-12-04'),
(14, 1, 4, '2024-12-06'),
(15, 1, 8, '2024-12-05'),
(16, 1, 8, '2024-12-07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `FName` varchar(50) NOT NULL,
  `LName` varchar(50) NOT NULL,
  `Password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Username`, `FName`, `LName`, `Password`) VALUES
(1, 'Test', 'Andrew', 'Austin', '$2y$10$YnmKdVGD3hSpkCmdj1zQdeVh9PF028FrQEckQg2KgZcyBEgOX.4UW'),
(2, 'Demo', 'Andrew', 'Austin', '$2y$10$ZqXgvkREaB0dDtggsJyqY.I0EAAlTSkSK8UiUT7O5VcjVKl/x1npq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `meal_plans`
--
ALTER TABLE `meal_plans`
  ADD PRIMARY KEY (`MealPlanID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `meal_plan_recipes`
--
ALTER TABLE `meal_plan_recipes`
  ADD PRIMARY KEY (`MealPlanID`,`RecipeID`),
  ADD KEY `RecipeID` (`RecipeID`);

--
-- Indexes for table `meal_type`
--
ALTER TABLE `meal_type`
  ADD PRIMARY KEY (`MealType`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`RecipeID`),
  ADD KEY `MealType` (`MealType`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`ScheduleID`),
  ADD KEY `MealPlanID` (`MealPlanID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `meal_plans`
--
ALTER TABLE `meal_plans`
  MODIFY `MealPlanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `RecipeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `ScheduleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `meal_plans`
--
ALTER TABLE `meal_plans`
  ADD CONSTRAINT `meal_plans_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE;

--
-- Constraints for table `meal_plan_recipes`
--
ALTER TABLE `meal_plan_recipes`
  ADD CONSTRAINT `fk_mealplan` FOREIGN KEY (`MealPlanID`) REFERENCES `meal_plans` (`MealPlanID`) ON DELETE CASCADE,
  ADD CONSTRAINT `meal_plan_recipes_ibfk_1` FOREIGN KEY (`MealPlanID`) REFERENCES `meal_plans` (`MealPlanID`) ON DELETE CASCADE,
  ADD CONSTRAINT `meal_plan_recipes_ibfk_2` FOREIGN KEY (`RecipeID`) REFERENCES `recipes` (`RecipeID`) ON DELETE CASCADE;

--
-- Constraints for table `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `recipes_ibfk_1` FOREIGN KEY (`MealType`) REFERENCES `meal_type` (`MealType`),
  ADD CONSTRAINT `recipes_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE;

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`MealPlanID`) REFERENCES `meal_plans` (`MealPlanID`) ON DELETE CASCADE,
  ADD CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
