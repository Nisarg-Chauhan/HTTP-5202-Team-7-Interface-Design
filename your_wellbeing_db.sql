-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 15 mars 2021 à 22:09
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `your_wellbeing_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `coaches`
--

CREATE TABLE `coaches` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) COLLATE latin1_bin NOT NULL,
  `last_name` varchar(50) COLLATE latin1_bin NOT NULL,
  `experience` int(11) NOT NULL,
  `speciality` varchar(50) COLLATE latin1_bin NOT NULL,
  `email` varchar(100) COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `coaches`
--

INSERT INTO `coaches` (`id`, `first_name`, `last_name`, `experience`, `speciality`, `email`) VALUES
(1, 'John', 'Sean', 5, 'Swimming', 'john.sean@gmail.com'),
(2, 'Christoph', 'Doug', 2, 'Biking', 'christoph.doug@yahoo.fr'),
(3, 'Alexander', 'Vincent', 7, 'Yogga', 'alexander.vincent@hotmail.com'),
(4, 'Zizou', 'Erikson', 5, 'Bodybuilding', 'zizou.erikson@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `exercises`
--

CREATE TABLE `exercises` (
  `id` int(11) NOT NULL,
  `exercise_name` varchar(50) COLLATE latin1_bin NOT NULL,
  `exercise_description` text COLLATE latin1_bin NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `exercises`
--

INSERT INTO `exercises` (`id`, `exercise_name`, `exercise_description`, `user_id`) VALUES
(1, 'Leg lift', 'This is an exercise intending to improve the blood circulation in the body.', 1),
(2, 'Aerobics', 'This exercise is designed to warm up customers each time before starting other exercises.', 2),
(3, 'Strength', 'This exercise helps in reducing body fat uplifting weights for a certain amount of time.', 2),
(4, 'Biking', 'Biking allows customers to improve heart wellbeing and loss weight in a short time.', 3);

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `shipment_address` varchar(255) COLLATE latin1_bin NOT NULL,
  `order_date` date NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `shipment_address`, `order_date`, `user_id`) VALUES
(1, '502 Richard Road, Kingston, Ontario, CANADA', '2021-03-08', 2),
(2, '62 Trudeau Street, Toronto, Ontario, Canada', '2021-03-09', 2),
(3, '30 Clemenceau Avenue,38000, Grenoble, France', '2021-03-11', 1),
(4, 'University of Kerala, Tamil Nadu, India.', '2021-03-14', 3);

-- --------------------------------------------------------

--
-- Structure de la table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` decimal(6,2) NOT NULL,
  `product_id` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `order_details`
--

INSERT INTO `order_details` (`id`, `quantity`, `amount`, `product_id`, `orders_id`) VALUES
(1, 2, '100.00', 1, 1),
(2, 10, '59.90', 4, 1),
(3, 3, '17.97', 4, 2),
(4, 1, '40.00', 2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(50) COLLATE latin1_bin NOT NULL,
  `product_description` text COLLATE latin1_bin NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `images` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_description`, `price`, `images`) VALUES
(1, 'Aerobic stepper', 'This stepper allows you to do your own exercise at home at your own pace.', '50.00', NULL),
(2, 'Scale', 'Monitor your weight regularly to evaulate your program performance.', '40.00', NULL),
(3, 'Knee support', 'Reduce the risk of articulation dislocation during advanced exercices.', '18.20', NULL),
(4, 'Supplement', 'Take these supplements to help your body loose quikly fat and calories.', '5.99', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE latin1_bin NOT NULL,
  `message` text COLLATE latin1_bin NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `testimonials`
--

INSERT INTO `testimonials` (`id`, `title`, `message`, `user_id`) VALUES
(1, 'Wonderful experience', 'My experience with Your Wellbeing was unforgettable and I reached my fitness goals in much less time than expected. I recommend this center to everyone!', 3),
(2, 'Unforgettable experience', 'I spent 3 weeks at Your Wellbeing center and I enjoyed their staffs and the brand new equipments they have. Awesome crew!', 1),
(3, 'Excellent weight loss program', 'Your Wellbeing has excellent programs for anytime of fitness and I particularly appreciated their weight loss program which is very efficient. I strongly recommend Your Wellbeing!', 2),
(4, 'Nice fitness center', 'Your Wellbeing is a brand new fitness center fitted with all new generation machines. In addtiton, their many skillful coaches always available to guide customers. I liked my 6 week stay at this Your Wellbeing.', 3);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) COLLATE latin1_bin NOT NULL,
  `last_name` varchar(50) COLLATE latin1_bin NOT NULL,
  `email` varchar(255) COLLATE latin1_bin NOT NULL,
  `password` varchar(100) COLLATE latin1_bin NOT NULL,
  `age` int(11) NOT NULL,
  `profile_picture` blob DEFAULT NULL,
  `user_data_id` int(11) NOT NULL,
  `coach_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `age`, `profile_picture`, `user_data_id`, `coach_id`) VALUES
(1, 'Salomon', 'Pongo', 'salomon.pongo@yahoo.ca', '09d8fb81003e405687a741850fd9a383', 25, NULL, 1, 1),
(2, 'Serena', 'Indira', 'serena.indira@hotmail.com', 'f66999ee4ff0d6e6f637cdb067e46078', 30, NULL, 2, 1),
(3, 'Salmany', 'Khan', 'salmany.khan@yahoo.com', 'salmany1', 40, NULL, 2, 2),
(4, 'Ngolo', 'Conte', 'ngolo.conte@gmail.com', 'ngolo1', 27, NULL, 3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `user_physical_data`
--

CREATE TABLE `user_physical_data` (
  `id` int(11) NOT NULL,
  `height` decimal(6,2) NOT NULL,
  `weight` decimal(6,2) NOT NULL,
  `bmi` decimal(6,2) NOT NULL,
  `body_fat` decimal(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `user_physical_data`
--

INSERT INTO `user_physical_data` (`id`, `height`, `weight`, `bmi`, `body_fat`) VALUES
(1, '180.00', '90.00', '28.00', NULL),
(2, '190.00', '120.00', '33.00', NULL),
(3, '175.00', '90.00', '26.10', NULL),
(4, '180.00', '90.00', '27.80', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `workouts`
--

CREATE TABLE `workouts` (
  `id` int(11) NOT NULL,
  `workout_name` varchar(50) COLLATE latin1_bin NOT NULL,
  `workout_description` text COLLATE latin1_bin NOT NULL,
  `calorie_burnt` decimal(10,0) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `workouts`
--

INSERT INTO `workouts` (`id`, `workout_name`, `workout_description`, `calorie_burnt`, `user_id`) VALUES
(1, 'Fat burning', 'A 30 minutes equipment combined exercises to burn the maximum of fat in a short time.', '100', 1),
(2, 'Cardio', 'Workout very efficient for heart beat regulation but it also burns some calories when done with endyarance.', '30', 2),
(3, 'Body dumbbell', 'Light weight bodybuilding to tonify muscles and dissipate extra fats.', '70', 2),
(4, 'Latin dance', 'Some swinging to recover a better form and regulate heart beats. This is suitable for all ages.', '65', 3);

-- --------------------------------------------------------

--
-- Structure de la table `workouts_exercises`
--

CREATE TABLE `workouts_exercises` (
  `id` int(11) NOT NULL,
  `exercise_id` int(11) NOT NULL,
  `workout_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `workouts_exercises`
--

INSERT INTO `workouts_exercises` (`id`, `exercise_id`, `workout_id`) VALUES
(1, 1, 2),
(2, 2, 1),
(3, 3, 2),
(4, 4, 4);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `coaches`
--
ALTER TABLE `coaches`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `exercises`
--
ALTER TABLE `exercises`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_id` (`orders_id`),
  ADD KEY `product_id` (`product_id`) USING BTREE;

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coach_id` (`coach_id`),
  ADD KEY `user_data_id` (`user_data_id`);

--
-- Index pour la table `user_physical_data`
--
ALTER TABLE `user_physical_data`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `workouts`
--
ALTER TABLE `workouts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `workouts_exercises`
--
ALTER TABLE `workouts_exercises`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exercise_id` (`exercise_id`),
  ADD KEY `workout_id` (`workout_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `coaches`
--
ALTER TABLE `coaches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `exercises`
--
ALTER TABLE `exercises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `user_physical_data`
--
ALTER TABLE `user_physical_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `workouts`
--
ALTER TABLE `workouts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `workouts_exercises`
--
ALTER TABLE `workouts_exercises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `exercises`
--
ALTER TABLE `exercises`
  ADD CONSTRAINT `exercises_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `testimonials`
--
ALTER TABLE `testimonials`
  ADD CONSTRAINT `testimonials_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`coach_id`) REFERENCES `coaches` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`user_data_id`) REFERENCES `user_physical_data` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `workouts`
--
ALTER TABLE `workouts`
  ADD CONSTRAINT `workouts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `workouts_exercises`
--
ALTER TABLE `workouts_exercises`
  ADD CONSTRAINT `workouts_exercises_ibfk_1` FOREIGN KEY (`exercise_id`) REFERENCES `exercises` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `workouts_exercises_ibfk_2` FOREIGN KEY (`workout_id`) REFERENCES `workouts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
