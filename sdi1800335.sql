-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Εξυπηρετητής: 127.0.0.1
-- Χρόνος δημιουργίας: 22 Ιαν 2023 στις 09:09:13
-- Έκδοση διακομιστή: 10.4.27-MariaDB
-- Έκδοση PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `sdi1800335`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `company_type` enum('ΙΔΙΩΤΙΚΟΣ','ΔΗΜΟΣΙΟΣ','Μ.Κ.Ο.') NOT NULL,
  `field` enum('ΠΛΗΡΟΦΟΡΙΚΗ','ΒΙΟΛΟΓΙΑ','ΑΘΛΗΤΙΣΜΟΣ') NOT NULL,
  `afm` int(11) NOT NULL,
  `doy` enum('Α ΑΘΗΝΩΝ','Β ΑΘΗΝΩΝ','Γ ΑΘΗΝΩΝ') NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `user_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Άδειασμα δεδομένων του πίνακα `companies`
--

INSERT INTO `companies` (`id`, `title`, `company_type`, `field`, `afm`, `doy`, `first_name`, `last_name`, `user_id`) VALUES
(3, 'CompanyTitle IKE', 'ΙΔΙΩΤΙΚΟΣ', 'ΠΛΗΡΟΦΟΡΙΚΗ', 123456789, 'Α ΑΘΗΝΩΝ', 'CompanyName', 'CompanyLastname', 71);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Άδειασμα δεδομένων του πίνακα `departments`
--

INSERT INTO `departments` (`id`, `name`) VALUES
(3, 'Τμήμα Πληροφορικής και Τηλεπικοινωνιών'),
(4, 'Τμήμα Φυσικής'),
(5, 'Τμήμα Χημείας'),
(8, 'Τμήμα Μαθηματικών');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `listings`
--

CREATE TABLE `listings` (
  `id` bigint(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `duration_in_months` int(2) NOT NULL,
  `time` enum('ΠΛΗΡΗΣ','ΜΕΡΙΚΗ') NOT NULL,
  `location_id` bigint(20) NOT NULL,
  `salary` bigint(20) NOT NULL,
  `status` enum('ΠΡΟΣΩΡΙΝΑ ΑΠΟΘΗΚΕΥΜΕΝΗ','ΟΡΙΣΤΙΚΑ ΥΠΟΒΕΒΛΗΜΕΝΗ') NOT NULL,
  `company_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `students`
--

CREATE TABLE `students` (
  `id` bigint(20) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `university_id` bigint(20) NOT NULL,
  `department_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Άδειασμα δεδομένων του πίνακα `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `university_id`, `department_id`, `user_id`) VALUES
(41, 'studentName', 'studentLastName', 1, 3, 70);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `universities`
--

CREATE TABLE `universities` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Άδειασμα δεδομένων του πίνακα `universities`
--

INSERT INTO `universities` (`id`, `name`) VALUES
(1, 'Εθνικό και Καποδιστριακό Πανεπιστήμιο Αθηνών'),
(2, 'Εθνικό Μετσόβιο Πολυτεχνείο'),
(3, 'Γεωπονικό Πανεπιστήμιο Αθηνών'),
(4, 'Χαροκόπειο Πανεπιστήμιο');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `session_id` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` enum('ΦΟΙΤΗΤΗΣ','ΕΤΑΙΡΕΙΑ') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`id`, `session_id`, `email`, `password`, `user_type`) VALUES
(70, 1494766611010, 'student@mail.com', '123', 'ΦΟΙΤΗΤΗΣ'),
(71, 119195998349399148, 'company@mail.com', '123', 'ΕΤΑΙΡΕΙΑ');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `companies_to_users` (`user_id`);

--
-- Ευρετήρια για πίνακα `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `listings`
--
ALTER TABLE `listings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `listings_to_companies` (`company_id`);

--
-- Ευρετήρια για πίνακα `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_to_departments` (`department_id`),
  ADD KEY `students_to_universities` (`university_id`),
  ADD KEY `students_to_users` (`user_id`);

--
-- Ευρετήρια για πίνακα `universities`
--
ALTER TABLE `universities`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT για πίνακα `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT για πίνακα `listings`
--
ALTER TABLE `listings`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT για πίνακα `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT για πίνακα `universities`
--
ALTER TABLE `universities`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT για πίνακα `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- Περιορισμοί για άχρηστους πίνακες
--

--
-- Περιορισμοί για πίνακα `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_to_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Περιορισμοί για πίνακα `listings`
--
ALTER TABLE `listings`
  ADD CONSTRAINT `listings_to_companies` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Περιορισμοί για πίνακα `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_to_departments` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `students_to_universities` FOREIGN KEY (`university_id`) REFERENCES `universities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `students_to_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
