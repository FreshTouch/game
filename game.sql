-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Авг 05 2017 г., 22:59
-- Версия сервера: 5.7.18-16-beget-5.7.18-16-1-1-log
-- Версия PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `hipparey_test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `answers`
--
-- Создание: Июл 21 2017 г., 00:48
--

DROP TABLE IF EXISTS `answers`;
CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `verity` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `answers`
--

INSERT INTO `answers` (`id`, `question_id`, `answer`, `verity`) VALUES
(1, 1, 'Sydney', 0),
(2, 1, 'Canberra', 1),
(3, 1, 'Melbourne', 0),
(4, 1, 'Adelaide', 0),
(5, 3, 'Reyljavik', 0),
(6, 3, 'Norilsk', 1),
(7, 3, 'Vladivostok', 0),
(8, 3, 'Murmansk', 0),
(9, 2, 'Arizona', 1),
(10, 2, 'Rhode Island', 0),
(11, 2, 'California', 0),
(12, 2, 'Nebraska', 0),
(13, 4, 'Egypt', 0),
(14, 4, 'Iraq', 1),
(15, 4, 'Sudan', 0),
(16, 4, 'Russia', 0),
(17, 5, 'Missouri river', 1),
(18, 5, 'Ohio river', 0),
(19, 5, 'Columbia river', 0),
(20, 5, 'Colorado river', 0),
(21, 6, 'Trafalagar square', 0),
(22, 6, 'Piazza San Marco', 0),
(23, 6, 'Plaza Mayor', 0),
(24, 6, 'Duomo di Milano', 1),
(25, 7, 'Ecuador', 0),
(26, 7, 'Popua New Guinea', 1),
(27, 7, 'British Virhin Islands', 0),
(28, 7, 'Jamaica', 0),
(29, 8, 'Hawaii', 1),
(30, 8, 'Oklahoma', 0),
(31, 8, 'Gerogia', 0),
(32, 8, 'Alaska', 0),
(33, 9, 'North Pacific Ocean', 1),
(34, 9, 'Indian Ocean', 0),
(35, 9, 'Atlantic Ocean', 0),
(36, 9, 'South Pacific Ocean', 0),
(37, 10, 'Curacao', 1),
(38, 10, 'Chad', 0),
(39, 10, 'Dominica', 0),
(40, 10, 'Bhutan', 0),
(48, 11, 'Martin, Travis, Fran', 0),
(49, 11, 'Thomas, Flynn, Micah', 0),
(50, 11, 'Freddy, Timothy, Mark', 0),
(51, 11, 'Trevor, Franklin, Michael', 1),
(52, 12, 'Derek Marshall', 0),
(53, 12, 'David Miles', 0),
(54, 12, 'Danny Matthews', 0),
(55, 12, 'Desmond Miles', 1),
(56, 13, 'Activision', 0),
(57, 13, 'Hello Games', 1),
(58, 13, 'Dont Nod Entertainment', 0),
(59, 13, 'UbiSoft', 0),
(60, 14, ' E.c.T.s', 0),
(61, 14, ' I.N.O.c', 0),
(62, 14, 'C.t.O.S', 1),
(63, 14, ' E.n.C.S', 0),
(64, 15, '2', 0),
(65, 15, '3', 1),
(66, 15, '4', 0),
(67, 15, '5', 0),
(68, 16, 'Rivia', 0),
(69, 16, 'Geralt', 1),
(70, 16, 'Ciri', 0),
(71, 16, 'Griffin', 0),
(72, 17, 'Cullen', 0),
(73, 17, 'Iron Bull', 0),
(74, 17, 'Dorian', 0),
(75, 17, 'Varric', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `games`
--
-- Создание: Июл 21 2017 г., 00:48
--

DROP TABLE IF EXISTS `games`;
CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `period_id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `description` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `score` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `games`
--

INSERT INTO `games` (`id`, `period_id`, `title`, `description`, `image`, `score`) VALUES
(1, 1, 'Countries', 'countries descreiption', 'http://lizardpoint.com/geography/images/stamps/209x206xstamp-composite.gif.pagespeed.ic.Q5P_wd_M51.webp', '600'),
(2, 1, 'Countries', 'countries descreiption', 'http://lizardpoint.com/geography/images/stamps/209x206xstamp-composite.gif.pagespeed.ic.Q5P_wd_M51.webp', '600'),
(3, 2, 'Games', 'game_descreiption', 'https://i.quotev.com/img/q/u/17/1/1/nj3tsdcw7c.jpg', '600'),
(4, 2, 'Games', 'Who is that Video Game Character?', 'https://i.quotev.com/img/q/u/16/2/28/wbj..jpg', '600');

-- --------------------------------------------------------

--
-- Структура таблицы `periods`
--
-- Создание: Июл 21 2017 г., 00:48
--

DROP TABLE IF EXISTS `periods`;
CREATE TABLE `periods` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `score` int(11) NOT NULL,
  `position` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `periods`
--

INSERT INTO `periods` (`id`, `name`, `score`, `position`) VALUES
(1, 'World', 800, 1000),
(2, 'Game', 800, 2000);

-- --------------------------------------------------------

--
-- Структура таблицы `questions`
--
-- Создание: Июл 21 2017 г., 00:48
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `question` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `questions`
--

INSERT INTO `questions` (`id`, `game_id`, `question`, `image`) VALUES
(1, 1, 'What is the capital of Australia?', 'https://img.buzzfeed.com/buzzfeed-static/static/enhanced/webdr05/2013/8/15/8/enhanced-buzz-16449-1376571229-0.jpg?no-auto'),
(2, 1, 'Which US state is the Grand Canyon located in?', 'http://cdn.playbuzz.com/cdn/78785892-a084-4113-8529-f06eb86c71b3/e872565b-fb3e-4949-ab29-a99497eddfaa.jpg'),
(3, 1, 'Which of these cities is the northernmost city in the world?', 'http://cdn.playbuzz.com/cdn/78785892-a084-4113-8529-f06eb86c71b3/5e2754c9-83e5-4c49-a022-a938a097ef7a.jpg'),
(4, 1, 'The above satellite image shows which country?', 'http://cdn.playbuzz.com/cdn/78785892-a084-4113-8529-f06eb86c71b3/76ce0c05-cf24-4156-b940-2ef988176473.jpg'),
(5, 1, 'Which is the longest river in the USA?', 'http://cdn.playbuzz.com/cdn/78785892-a084-4113-8529-f06eb86c71b3/80b7483c-b65a-4232-8359-28d3904750ad.jpg'),
(6, 2, 'Which town square is this?', 'http://cdn.playbuzz.com/cdn/78785892-a084-4113-8529-f06eb86c71b3/729e7f3e-d915-4e17-851b-6d0a8b1547c7.jpg'),
(7, 2, 'Port Moresby is the capital of which country?', 'http://cdn.playbuzz.com/cdn/78785892-a084-4113-8529-f06eb86c71b3/2bf816e8-ffe4-43fe-8e37-790a352cb381.jpg'),
(8, 2, 'Which is the only US state to commercially grow coffee?', 'http://cdn.playbuzz.com/cdn/78785892-a084-4113-8529-f06eb86c71b3/c9e7dbe4-841f-4d7c-a3a4-0cf2d8a727f5.jpg'),
(9, 2, 'Which ocean is on the west coast of San Francisco in the US?', 'http://cdn.playbuzz.com/cdn/78785892-a084-4113-8529-f06eb86c71b3/6a09aec6-2aee-4405-8e19-5be254bb255d.jpg'),
(10, 2, 'Willemstad is the capital of which country?', 'http://cdn.playbuzz.com/cdn/78785892-a084-4113-8529-f06eb86c71b3/c9ba7d39-c420-40bd-b02d-d53504758c20.jpg'),
(11, 3, 'Who are the three main characters in Grand Theft Auto Five?', 'https://i.quotev.com/img/q/u/17/1/1/5x6ch6curh.jpg'),
(12, 3, 'Who is the main character of the Assassins Creed games?', 'https://i.quotev.com/img/q/u/17/1/1/srgumw6a2h.jpg'),
(13, 3, 'What game developer was in charge of the game No Mans Sky?', 'https://i.quotev.com/img/q/u/16/12/17/ph5e7dsiji.jpg'),
(14, 3, 'What was the name of the organization who regulates electronics in the game Watch Dogs?', 'https://i.quotev.com/img/q/u/17/1/1/lbnoxy5pig.jpg'),
(15, 3, 'How many Dark Souls games are there?', 'https://i.quotev.com/img/q/u/17/1/1/4qbvt4xmbz.jpg'),
(16, 4, 'Who is this?', 'https://i.quotev.com/img/q/u/16/9/25/y4twh5jeuv.jpg'),
(17, 4, 'Who is this?', 'https://i.quotev.com/img/q/u/16/9/25/3ltlchpibj.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--
-- Создание: Июл 21 2017 г., 00:48
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `token` varchar(32) NOT NULL,
  `score` varchar(45) NOT NULL DEFAULT '0',
  `rate` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `token`, `score`, `rate`) VALUES
(17, 'Suren', 'hipparchus@ya.ru', '436c725a0b137ac80d73247185da7793', '23a8c98455d6d74b4854ccc3115de977', '1058', 600),
(18, 'suro', 'ewfwefwefwef@gmail.com', '72886be5c72202b24e65f1db29a48ab1', '81a66326dfc9b5c3dab037e20d9eca1b', '0', 0),
(19, 'surwefwefo', 'poxoswef@gmail.com', 'c8c3c72e761700679d7339bb3131c605', 'd485ec5771eef6a1d26042eaed92d3c6', '0', 0),
(20, 'petros', 'wefwef@gmail.com', '8be38573e2d51279073972381944c592', '2032d1898231d96cb7b7074648cc424b', '1800', 4100),
(21, 'poxos', 'wefwefwe@gmail.com', '89b51ae3e1c093c807ad7ef17337946d', '064b7b9e66c84c3feb2b4c5047a3b8ad', '0', 0),
(22, 'valod', 'a@mail.ru', '679e91d5ae7837235021f8f524cf7d16', '70785e8db5eb5ca848ea8109b4ee6445', '0', 0),
(23, 'valod', 'vlepox@mail.ru', '679e91d5ae7837235021f8f524cf7d16', '51591b93c1c3a43a860de1a2134c52da', '0', 0),
(24, 'Artur', 'artts@mail.ru', '51c55e72c43b6da6395a43212dae27b1', '166d9c322631d0810ae806d8bf8a9def', '0', 0),
(25, 'Artur', 'ts@mail.ru', 'd84be0a066f16835a631efe4032f93f1', '44a42c40dddf02b97d4ce9f19c175c29', '0', 0),
(26, 'valod', 'p@mail.ru', '26a6e5e51e08645bf108cf701ec5165f', '80c2c55928c44143313308582b082762', '0', 0),
(27, 'poxox', 'sfsdfsfsdf@mail.re', '3540549a45708fa3718f0582a34f7d60', 'dfcc5bd06950fe436cbf6042cf1df4c5', '0', 0),
(28, 'dsgsdg', 'asdfasfdasf@mail.ru', '86424d6b6f9cf25fc17ae9f309627a39', '15461c62a0d7ae06403394ef97e45188', '0', 0),
(29, 'asda', 'asdasd@mail.ru', '0c6f9a99c469c27e664413755f8767f7', 'b31df7c0e3a42eb417da09d5ffe29986', '0', 0),
(30, 'vardan', 'vard@mail.ru', 'b54731e662f995077f13714dc9fa909a', 'd6418eceefbf1f89c5442caca883b08d', '0', 0),
(31, 'papik', 'paptat@mail.ru', '6c9a0d0577a640d2ac5de610d3da0cf0', 'e6b599b2e1a695bce5c447e08e7fe14f', '0', 0),
(32, 'aper', 'apqur@mail.ru', 'b57f7a065f234dba69bb6de5d6cf5e7d', '4cbe6073ba185b9ee4d2c2d5b4962833', '0', 0),
(33, 'asdfsdf', 'zgvdfvbzb@mail.ru', '4ad58630ea1c9d79d5f0f6cbc6f0e13c', 'ee05df828de461c09af8d99fde34d2a2', '0', 0),
(34, 'sdfgsdfg', 'dfgddfg@mail.ru', '2302ba813427872e62b294afe063d7f2', '8b3f2929710a1d9e1396b5ec022ba216', '0', 0),
(35, 'zcvzxv', 'xzcvxzvcxzv@mail.ru', '997141fa619a399d6dd06c260791eaa5', '21a8cc12ed5b800d66177a0663c9a974', '0', 0),
(36, 'afs', 'sadfsadf@mail.ru', '2365f4228c94ab7a9ba2ad00fd2ceedb', '992755b4470b4310faed027b7f91eb7f', '0', 0),
(37, 'asdbh', 'fgjhk@mail.ru', '72b00d037b7729a32f035fb2a172ecab', 'cc98c0061e69159d9a541f7728fdd27f', '0', 0),
(38, 'lkjlk', 'kllkklk@mail.ru', 'e21f374fc390b55ab12c26519b557711', 'e0d67651627a1db692c9290bd4714365', '0', 0),
(39, 'barev', 'lavem@mail.ru', '11cc4278f4328088ea8163364d9d87be', '180afde1a8fcbdd907476cf71f02bcbb', '0', 0),
(40, 'abg', 'abgdez@mail.ru', '665d3ed8e0469c9d56171f807d297911', '093fcc14883f3da5a66bdb13c6705d6c', '0', 0),
(41, 'aghfdnb', 'jkljhljklh@mail.ru', '64994abe5f7e4dd7c64c51d1daf7db8d', '42125a3013adbeb8acc4f3a0e57661bf', '0', 0),
(42, 'jfghtoirph', 'rtiypii@mail.ru', 'bee31ea16c2a5b6f7b86159db15be773', 'caf06ac77c7b0ba4abffb47608b38463', '0', 0),
(43, 'ewrtuy', 'ieuto@mail.ru', '397e891a6eb318fd9b7d5f3476259093', '1681c9ac0390bac8cd065447a40fb6c2', '0', 0),
(44, 'paradzem', 'parikta@mail.ru', 'c45fa5fc563a46ef0e65c0d6eef9b9d5', '698f4ed5cd6556f4e85ebaba89f525bc', '0', 0),
(45, 'abul', 'abnm@mail.ru', '8f7b68a75ac17ade0fdf0e6efb86dbc4', '031295f7b0a2a6803fa344ee028a77ff', '0', 0),
(46, 'poipoiu', 'fdkl@mail.ru', '1fdd2ffbbf657547c2bcdb2eb93fa0b4', 'fe17a7d3a06fcc725bf9fd27052fe4f8', '0', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `user_games`
--
-- Создание: Июл 21 2017 г., 00:48
--

DROP TABLE IF EXISTS `user_games`;
CREATE TABLE `user_games` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `period_id` int(11) DEFAULT NULL,
  `game_status` varchar(5) NOT NULL,
  `advt_count` int(1) DEFAULT '0',
  `score` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_games`
--

INSERT INTO `user_games` (`id`, `user_id`, `game_id`, `period_id`, `game_status`, `advt_count`, `score`) VALUES
(16, 17, 1, 1, 'close', 0, 486),
(17, 20, 1, 1, 'open', 2, 540),
(18, 24, 1, 1, 'close', 1, 600),
(19, 24, 2, 1, 'close', 0, 486),
(20, 24, 3, 2, 'close', 0, 486),
(21, 24, 4, 2, 'close', 2, 486);

-- --------------------------------------------------------

--
-- Структура таблицы `user_periods`
--
-- Создание: Июл 21 2017 г., 00:48
--

DROP TABLE IF EXISTS `user_periods`;
CREATE TABLE `user_periods` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `period_id` int(11) NOT NULL,
  `period_status` varchar(6) NOT NULL DEFAULT 'close'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_periods`
--

INSERT INTO `user_periods` (`id`, `user_id`, `period_id`, `period_status`) VALUES
(47, 17, 1, 'open'),
(48, 18, 1, 'open'),
(49, 19, 1, 'open'),
(50, 20, 1, 'open'),
(51, 20, 1, 'open'),
(52, 20, 1, 'open'),
(53, 20, 1, 'open'),
(54, 20, 1, 'open'),
(55, 20, 1, 'open'),
(56, 20, 1, 'open'),
(57, 20, 1, 'open'),
(58, 20, 1, 'open'),
(59, 20, 1, 'open'),
(60, 20, 1, 'open'),
(61, 20, 1, 'open'),
(62, 20, 1, 'open'),
(63, 20, 1, 'open'),
(64, 20, 1, 'open'),
(65, 20, 1, 'open'),
(66, 20, 2, 'open'),
(70, 21, 1, 'open'),
(71, 22, 1, 'open'),
(72, 23, 1, 'open'),
(73, 24, 1, 'open'),
(74, 25, 1, 'open'),
(75, 26, 1, 'open'),
(76, 27, 1, 'open'),
(77, 28, 1, 'open'),
(78, 29, 1, 'open'),
(79, 30, 1, 'open'),
(80, 31, 1, 'open'),
(81, 32, 1, 'open'),
(82, 33, 1, 'open'),
(83, 34, 1, 'open'),
(84, 35, 1, 'open'),
(85, 36, 1, 'open'),
(86, 37, 1, 'open'),
(87, 38, 1, 'open'),
(88, 39, 1, 'open'),
(89, 40, 1, 'open'),
(90, 41, 1, 'open'),
(91, 42, 1, 'open'),
(92, 43, 1, 'open'),
(93, 44, 1, 'open'),
(94, 45, 1, 'open'),
(95, 46, 1, 'open');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`);

--
-- Индексы таблицы `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `period_id` (`period_id`);

--
-- Индексы таблицы `periods`
--
ALTER TABLE `periods`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`),
  ADD UNIQUE KEY `position_UNIQUE` (`position`);

--
-- Индексы таблицы `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `game_id` (`game_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Индексы таблицы `user_games`
--
ALTER TABLE `user_games`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `game_id` (`game_id`),
  ADD KEY `period_id` (`period_id`);

--
-- Индексы таблицы `user_periods`
--
ALTER TABLE `user_periods`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `period_id` (`period_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT для таблицы `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `periods`
--
ALTER TABLE `periods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT для таблицы `user_games`
--
ALTER TABLE `user_games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT для таблицы `user_periods`
--
ALTER TABLE `user_periods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`);

--
-- Ограничения внешнего ключа таблицы `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `games_ibfk_1` FOREIGN KEY (`period_id`) REFERENCES `periods` (`id`);

--
-- Ограничения внешнего ключа таблицы `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`);

--
-- Ограничения внешнего ключа таблицы `user_games`
--
ALTER TABLE `user_games`
  ADD CONSTRAINT `user_games_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_games_ibfk_2` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`),
  ADD CONSTRAINT `user_games_ibfk_3` FOREIGN KEY (`period_id`) REFERENCES `games` (`period_id`);

--
-- Ограничения внешнего ключа таблицы `user_periods`
--
ALTER TABLE `user_periods`
  ADD CONSTRAINT `user_periods_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_periods_ibfk_2` FOREIGN KEY (`period_id`) REFERENCES `periods` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
