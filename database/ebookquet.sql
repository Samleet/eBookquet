-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2023 at 05:40 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ebookquet`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookhuts`
--

CREATE TABLE `bookhuts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bookquet_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `org_name` varchar(100) NOT NULL,
  `logo` text NOT NULL,
  `thumbnail` text NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `social_link` text DEFAULT NULL,
  `source` varchar(100) DEFAULT NULL,
  `status` enum('FREE','SPONSORED') NOT NULL,
  `access` enum('PUBLIC','PRIVATE') NOT NULL,
  `access_pin` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookhuts`
--

INSERT INTO `bookhuts` (`id`, `user_id`, `bookquet_id`, `name`, `description`, `org_name`, `logo`, `thumbnail`, `address`, `website`, `social_link`, `source`, `status`, `access`, `access_pin`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Introducing the Crypto Concept over the air', NULL, '', 'https://img.freepik.com/free-vector/cryptocurrency-bitcoin-golden-coin-background_1017-31505.jpg?w=2000', 'https://assets.weforum.org/article/image/f1rGh3mhhk-oj1fj1qjwJ56U37_dJ-MGTGGFHzBp25Q.jpg', '', NULL, '', '', 'FREE', 'PRIVATE', 12345, '2022-08-07 23:00:00', '2022-08-07 23:00:00'),
(2, 1, 2, 'Mastering the art of knowledge', NULL, '', 'https://www.dictionary.com/e/wp-content/uploads/2020/01/WisdomvsKnowledge_1000x700_jpg_OHVUvmTo.jpg', 'https://news.yale.edu/sites/default/files/styles/featured_media/public/yalenews_57735773-cc.jpg?itok=5s1EYkrl&c=07307e7d6a991172b9f808eb83b18804', '', NULL, '', '', 'SPONSORED', 'PRIVATE', NULL, '2022-08-07 23:00:00', '2022-08-07 23:00:00'),
(3, 7, 3, 'ChitChat with the Johnson', NULL, '', 'https://dz9yg0snnohlc.cloudfront.net/cro-the-pros-and-cons-of-video-chat-with-random-people-1.jpg', 'https://previews.123rf.com/images/ninann/ninann1406/ninann140600015/29468753-party-people.jpg', '', NULL, '', '', 'FREE', 'PUBLIC', NULL, '2022-08-07 23:00:00', '2022-08-07 23:00:00'),
(4, 1, 4, 'Love & Life - Striking a Balance in a relationship', NULL, '', 'https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/she-has-her-own-way-of-saying-good-morning-royalty-free-image-1633533916.jpg', 'https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/mosuno-06-preview-1513629127.jpg?crop=1.00xw:0.752xh;0,0.0769xh&resize=1200:*', '', NULL, '', '', 'SPONSORED', 'PRIVATE', NULL, '2022-08-07 23:00:00', '2022-08-07 23:00:00'),
(5, 1, 5, 'Hangouts with the Alumnis', NULL, '', 'https://previews.123rf.com/images/solisimages/solisimages1705/solisimages170500012/79450218-group-of-young-people-hangout-at-the-city-street-they-sitting-on-bench-singing-and-playing-guitar-su.jpg', 'https://olorisupergal.com/wp-content/uploads/2018/09/OndoCity-Facebook-Hangout-20180911_205110.jpg', '', NULL, '', '', 'SPONSORED', 'PUBLIC', NULL, '2022-08-07 23:00:00', '2022-08-07 23:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `bookquet`
--

CREATE TABLE `bookquet` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `tagline` text NOT NULL,
  `type` enum('SOCIAL','EDUCATION') NOT NULL,
  `category` varchar(100) NOT NULL,
  `interest` varchar(100) NOT NULL,
  `source` enum('OPEN','SPONSORED') NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `logo` text NOT NULL,
  `banner` text NOT NULL,
  `org_name` varchar(100) NOT NULL,
  `website` varchar(100) DEFAULT NULL,
  `access` enum('PUBLIC','PRIVATE') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookquet`
--

INSERT INTO `bookquet` (`id`, `user_id`, `name`, `tagline`, `type`, `category`, `interest`, `source`, `address`, `logo`, `banner`, `org_name`, `website`, `access`, `created_at`, `updated_at`) VALUES
(1, 1, 'Security Matters', 'Motion to support peace talks and combatting insurgency in the country', 'SOCIAL', 'Country', 'Politics', 'OPEN', NULL, 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/43/Flag-map_of_Nigeria.svg/2557px-Flag-map_of_Nigeria.svg.png', 'https://i0.wp.com/businessday.ng/wp-content/uploads/2022/05/Nigeria-2.jpg?fit=700%2C400&ssl=1', 'Times Magazine', 'https://www.timemagazine.com', 'PUBLIC', '2022-08-07 23:00:00', '2022-08-07 23:00:00'),
(2, 1, 'Tech Talks', 'Supporting Tech as a career in modern day generation', 'SOCIAL', 'School', 'Entrepreneurship', 'OPEN', NULL, 'https://i0.wp.com/businessday.ng/wp-content/uploads/2021/09/Tech.jpg', 'https://cdn-wordpress-info.futurelearn.com/wp-content/uploads/FL191_Tech_Banner-1.jpg', 'Times Magazine', 'https://www.timemagazine.com', 'PUBLIC', '2022-08-07 23:00:00', '2022-08-07 23:00:00'),
(3, 1, 'Planet Earth & Mars', 'Diving deep into ensuring a greener earth. Will Mars be our next option', 'SOCIAL', 'Government', 'Travel', 'OPEN', NULL, 'https://previews.123rf.com/images/tolokonov/tolokonov1303/tolokonov130300027/18410025-green-earth-abstract-environmental-backgrounds.jpg', 'https://image.makewebeasy.net/makeweb/0/BWNAWB5oJ/Home%2Fslide_greenearthinnovation_001.png?v=202012190947', 'Times Magazine', 'https://www.timemagazine.com', 'PUBLIC', '2022-08-07 23:00:00', '2022-08-07 23:00:00'),
(4, 1, 'High school Alumni', 'Welcome the Alumni to our school community', 'EDUCATION', 'School', 'General', 'OPEN', NULL, 'https://merriam-webster.com/assets/mw/images/article/art-global-footer-recirc/alt-59a727587d503-4156-bf951dbeea3197680b8d4fb5b814a474@1x.jpg', 'https://www.collinsdictionary.com/images/full/school_309241295.jpg', 'Times Magazine', 'https://www.timemagazine.com', 'PRIVATE', '2022-08-07 23:00:00', '2022-08-07 23:00:00'),
(5, 1, 'Essi College of Warri', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore', 'EDUCATION', 'School', 'General', 'SPONSORED', NULL, 'https://z-m-scontent.fabb1-1.fna.fbcdn.net/v/t39.30808-1/291614053_450397323761621_4082413760166387753_n.jpg?stp=c2.0.120.120a_cp0_dst-jpg_e15_p120x120_q65&_nc_cat=101&ccb=1-7&_nc_sid=dbb9e7&_nc_ohc=nkfambgXZWAAX9wjuPB&_nc_ad=z-m&_nc_cid=1080&_nc_eh=69ef6c53ef47e1863e1d659ebd021ddd&_nc_rml=0&_nc_ht=z-m-scontent.fabb1-1.fna&oh=00_AT_1LoRZmbdu1CXtetbQJWGFrYEYyUOwyQzfbJ92IYmsUg&oe=62F63F51', 'https://meetingyoumagazine.com.ng/wp-content/uploads/2020/01/82678460_1786528754815452_7256115438617100288_n.jpg', 'Times Magazine', 'https://www.timemagazine.com', 'PUBLIC', '2022-08-07 23:00:00', '2022-08-07 23:00:00'),
(6, 1, 'World Health Society of Clean Waters', 'The goal is to provide clean and drinkable water for all', 'SOCIAL', 'Health', 'General', 'OPEN', NULL, 'https://www.theregreview.org/wp-content/uploads/2019/02/GettyImages-904647396-4.33.40-PM.jpg', 'https://ane4bf-datap1.s3-eu-west-1.amazonaws.com/wmocms/s3fs-public/styles/featured_media_detail/public/advanced_page/featured_media/24173092_10155466299211888_6522533877145049287_o_0.jpg?7ilevZOfpEeYsIaj41nDq.bTBneGkINL&itok=BivckYMP', 'Times Magazine', 'https://www.timemagazine.com', 'PUBLIC', '2022-08-07 23:00:00', '2022-08-07 23:00:00'),
(7, 1, 'University of Benin', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore', 'EDUCATION', 'Education', 'General', 'SPONSORED', NULL, 'https://res.cloudinary.com/crunchbase-production/image/upload/c_lpad,h_256,w_256,f_auto,q_auto:eco,dpr_1/rigageagsfucrvlprqld', 'https://uniben.edu.ng/wp-content/uploads/2021/02/Beautiful-Area-Pic-of-UNIBEN-800-BY-475.jpg', 'Times Magazine', 'https://www.timemagazine.com', 'PUBLIC', '2022-08-07 23:00:00', '2022-08-07 23:00:00'),
(8, 1, 'The Power of SpaceX. Genesis to Mars', 'SpaceX designs, manufactures and launches advanced rockets and spacecraft. The company was founded in 2002 to revolutionize space technology', 'SOCIAL', 'Education', 'General', 'OPEN', NULL, 'https://yellowhammernews.com/wp-content/uploads/2021/04/Elon-Musk-SpaceX.jpg', 'https://image.cnbcfm.com/api/v1/image/104504783-GettyImages-494548555.jpg?v=1533926309', 'Times Magazine', 'https://www.timemagazine.com', 'PUBLIC', '2022-08-07 23:00:00', '2022-08-07 23:00:00'),
(9, 1, 'Nigeria Culture & The People', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore', 'SOCIAL', 'Politics', 'General', 'OPEN', NULL, 'https://www.commisceo-global.com/images/two-women-lagos.jpg', 'https://guardian.ng/wp-content/uploads/2021/12/Yoruba-Dancers.jpg', 'Times Magazine', 'https://www.timemagazine.com', 'PUBLIC', '2022-08-07 23:00:00', '2022-08-07 23:00:00'),
(10, 1, 'Food Party and Trip Moments', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore', 'SOCIAL', 'Food', 'General', 'OPEN', NULL, 'https://answersnigeria.com/wp-content/uploads/2022/01/nigerian-food-names-806x440.jpg', 'https://insanelygoodrecipes.com/wp-content/uploads/2021/05/Jollof-Rice-with-Green-Onions.jpg', 'Times Magazine', 'https://www.timemagazine.com', 'PUBLIC', '2022-08-07 23:00:00', '2022-08-07 23:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bookquet_id` int(11) DEFAULT NULL,
  `bookhut_id` int(11) DEFAULT NULL,
  `classroom_id` int(11) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `thumbnail` text NOT NULL,
  `description` text DEFAULT NULL,
  `pages` int(11) NOT NULL,
  `genre` varchar(100) DEFAULT NULL,
  `reference` varchar(100) NOT NULL,
  `source` varchar(100) DEFAULT NULL,
  `status` enum('FREE','SPONSORED') NOT NULL,
  `access` enum('PRIVATE','PUBLIC') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `user_id`, `bookquet_id`, `bookhut_id`, `classroom_id`, `title`, `thumbnail`, `description`, `pages`, `genre`, `reference`, `source`, `status`, `access`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 5, NULL, 'The secret to peace vol.1', 'https://www.history.com/.image/ar_16:9%2Cc_fill%2Ccs_srgb%2Cfl_progressive%2Cq_auto:good%2Cw_1200/MTU3OTIzNjU0NDk4NzIzNDc0/the-pictures-that-defined-world-war-iis-featured-photo.jpg', NULL, 100, 'History', 'sjieneuiaj', 'N/A', 'SPONSORED', 'PUBLIC', '2022-08-07 23:00:00', '2022-08-07 23:00:00'),
(2, 1, 2, 1, NULL, 'Making waves from sea shells', 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8c3VtbWVyJTIwYmVhY2h8ZW58MHx8MHx8&w=1000&q=80', NULL, 100, 'Art', 'weirjdaxoy', 'N/A', 'SPONSORED', 'PRIVATE', '2022-08-07 23:00:00', '2022-08-07 23:00:00'),
(3, 1, 3, 4, NULL, 'Stop procastinating! do it now', 'https://www.teamly.com/blog/wp-content/uploads/2021/11/Benefits-of-procrastination.png', NULL, 100, 'Science', 'hewquiopsa', 'N/A', 'SPONSORED', 'PUBLIC', '2022-08-07 23:00:00', '2022-08-07 23:00:00'),
(4, 1, 4, 3, NULL, 'Advancing the Metaverse - The Evolution', 'https://idsb.tmgrup.com.tr/ly/uploads/images/2022/02/04/180030.jpg', 'eBookquet offers different learning environments for reading, coaching, networking, matching interests, knowledge sharing, and tracking the reading progress of readers and stakeholders’ knowledge baselines. \n\nThe platform supports building personal and professional relationships across the world for career and life-long learning. eBookquet is available on iOS, Android, and Web browsers via mobile, computer, and tablet devices.\n\nThe platform can easily be aligned and integrated with any system’s objective and values across different societies. Experience reading anywhere and anytime with your folks at your convenience and imagine the feel and smell of reading in the woodies. And imagine our level of knowledge and collective intelligence if we were on the same page! \n', 100, 'Tech', 'fghiqeoma', 'N/A', 'SPONSORED', 'PUBLIC', '2022-08-07 23:00:00', '2022-08-07 23:00:00'),
(5, 1, 1, 1, NULL, 'Sex in the City', 'https://m.media-amazon.com/images/M/MV5BNGEyNDRjM2QtY2VlYy00OWRhLWI4N2UtZTM4NDc0MGM0YzBkXkEyXkFqcGdeQXVyNjk1Njg5NTA@._V1_.jpg', NULL, 100, 'Politics', 'vbndaltopq', 'N/A', 'SPONSORED', 'PRIVATE', '2022-08-07 23:00:00', '2022-08-07 23:00:00'),
(6, 1, 1, 1, NULL, 'Twist of Oliver\'s Travel', 'https://upload.wikimedia.org/wikipedia/en/d/d9/Oliver%21_%281968_movie_poster%29.jpg', NULL, 100, 'Education', 'hritydtriw', 'N/A', 'SPONSORED', 'PUBLIC', '2022-08-07 23:00:00', '2022-08-07 23:00:00'),
(7, 1, 1, 1, NULL, 'The Dawn of the A.I - Breaking Chronicles', 'https://www.acquisition-international.com/wp-content/uploads/2020/01/tech-cruve.jpg', NULL, 100, 'Tech', 'xseriohfmn', 'N/A', 'SPONSORED', 'PUBLIC', '2022-08-07 23:00:00', '2022-08-07 23:00:00'),
(8, 1, 1, 1, NULL, 'Queens of Egypt - Cleopatra', 'https://m.media-amazon.com/images/M/MV5BNjc0MDZiNWEtODA2MC00MmFlLTg1OWMtYzJkZmM2MDg0MzA4XkEyXkFqcGdeQXVyNjEyNjE4NDE@._V1_.jpg', 'eBookquet offers different learning environments for reading, coaching, networking, matching interests, knowledge sharing, and tracking the reading progress of readers and stakeholders’ knowledge baselines. \r\n\r\nThe platform supports building personal and professional relationships across the world for career and life-long learning. eBookquet is available on iOS, Android, and Web browsers via mobile, computer, and tablet devices.\r\n\r\nThe platform can easily be aligned and integrated with any system’s objective and values across different societies. Experience reading anywhere and anytime with your folks at your convenience and imagine the feel and smell of reading in the woodies. And imagine our level of knowledge and collective intelligence if we were on the same page! \r\n', 100, 'Discovery', 'qasertiojd', 'N/A', 'SPONSORED', 'PUBLIC', '2022-08-07 23:00:00', '2022-08-07 23:00:00'),
(9, 1, 1, 3, NULL, 'The Journeys of the Avengers', 'https://cdn.akamai.steamstatic.com/steam/apps/997070/capsule_616x353.jpg?t=1606127840', NULL, 100, 'Movie', 'riotpewqax', 'N/A', 'SPONSORED', 'PUBLIC', '2022-08-07 23:00:00', '2022-08-07 23:00:00'),
(10, 1, 1, 1, NULL, 'Understanding a Womans Heart', 'https://www.lovepanky.com/wp-content/uploads/2017/12/how-to-romance-a-woman-1.jpg', 'eBookquet offers different learning environments for reading, coaching, networking, matching interests, knowledge sharing, and tracking the reading progress of readers and stakeholders’ knowledge baselines. \r\n\r\nThe platform supports building personal and professional relationships across the world for career and life-long learning. eBookquet is available on iOS, Android, and Web browsers via mobile, computer, and tablet devices.\r\n\r\nThe platform can easily be aligned and integrated with any system’s objective and values across different societies. Experience reading anywhere and anytime with your folks at your convenience and imagine the feel and smell of reading in the woodies. And imagine our level of knowledge and collective intelligence if we were on the same page! \r\n', 100, 'Romance', 'utjeowlfns', 'N/A', 'SPONSORED', 'PUBLIC', '2022-08-07 23:00:00', '2022-08-07 23:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `classrooms`
--

CREATE TABLE `classrooms` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bookquet_id` int(11) NOT NULL,
  `school` varchar(100) NOT NULL,
  `class_name` varchar(100) NOT NULL,
  `grade` varchar(100) NOT NULL,
  `tagline` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `access` enum('PUBLIC','PRIVATE') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `message` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `reply_to` int(11) DEFAULT NULL,
  `highlight` mediumtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `book_id`, `message`, `reply_to`, `highlight`, `created_at`, `updated_at`) VALUES
(1, 1, 8, 'It as great thing to read this book even though it long', NULL, NULL, '2022-09-02 23:00:00', '2022-09-02 23:00:00'),
(2, 7, 8, 'I dunno but i\'m finding this book so interesting to read', 5, NULL, '2022-09-02 23:00:00', '2022-09-02 23:00:00'),
(3, 20, 8, 'I have tried so much to get my mind over chapter 4 of TBD', 2, NULL, '2022-09-02 23:00:00', '2022-09-02 23:00:00'),
(4, 7, 8, 'I have tried so much to get my mind over chapter 4 of TBD', NULL, NULL, '2022-09-02 23:00:00', '2022-09-02 23:00:00'),
(5, 21, 8, 'I have tried so much to get my mind over chapter 4 of TBD', NULL, NULL, '2022-09-02 23:00:00', '2022-09-02 23:00:00'),
(6, 21, 8, 'This is my first test from the chat endpoint', NULL, NULL, '2022-09-02 23:00:00', '2022-09-02 23:00:00'),
(7, 21, 8, 'Good riddance', 6, NULL, '2022-09-02 23:00:00', '2022-09-02 23:00:00'),
(12, 7, 8, 'Hi', 0, NULL, '2022-09-04 11:30:52', '2022-09-04 11:30:52'),
(13, 7, 8, '. I am going to drop a review on this book once I am done reading on it', 0, NULL, '2022-09-04 11:31:45', '2022-09-04 11:31:45'),
(14, 7, 8, 'Miss Tourism Africa is a platform open to all Black young women from African communities around the world, including France, Spain, Japan, China, Germany, the United Kingdom, Canada, USA', 0, NULL, '2022-09-04 11:31:45', '2022-09-04 11:31:45'),
(15, 7, 7, 'How can you say a thing like that? are you from this world?', 5, NULL, '2022-09-04 11:34:05', '2022-09-04 11:34:05'),
(16, 7, 8, 'it\'s just about you.', 15, NULL, '2022-09-04 11:35:09', '2022-09-04 11:35:09'),
(17, 7, 7, 'I am the first to comment', 0, NULL, '2022-09-04 11:40:01', '2022-09-04 11:40:01'),
(18, 7, 8, 'Holla', 0, NULL, '2022-09-04 21:30:41', '2022-09-04 21:30:41'),
(19, 7, 8, 'Holla', 0, NULL, '2022-09-05 12:25:39', '2022-09-05 12:25:39'),
(20, 7, 8, 'Nice', 0, NULL, '2022-09-05 12:25:53', '2022-09-05 12:25:53'),
(21, 7, 8, 'Okay', 0, NULL, '2022-09-05 12:26:00', '2022-09-05 12:26:00'),
(22, 7, 8, 'I really like this place so much. I can\'t wait to get over it', 0, NULL, '2022-09-05 12:26:28', '2022-09-05 12:26:28'),
(23, 7, 8, 'Great', 0, NULL, '2022-09-05 12:26:55', '2022-09-05 12:26:55'),
(24, 7, 8, 'Holla', 0, NULL, '2022-09-05 12:27:59', '2022-09-05 12:27:59'),
(25, 7, 8, 'hey', 0, NULL, '2022-09-05 12:28:50', '2022-09-05 12:28:50'),
(26, 7, 8, 'nice', 0, NULL, '2022-09-05 12:32:39', '2022-09-05 12:32:39'),
(27, 7, 8, 'great', 0, NULL, '2022-09-05 12:33:34', '2022-09-05 12:33:34'),
(28, 7, 8, 'nice', 0, NULL, '2022-09-05 12:33:49', '2022-09-05 12:33:49'),
(29, 7, 8, 'Nice', 0, NULL, '2022-09-05 12:34:11', '2022-09-05 12:34:11'),
(30, 7, 8, 'The above exception is shown when we call setState() after we dispose of the widget due to async.', 0, NULL, '2022-09-05 12:34:51', '2022-09-05 12:34:51'),
(31, 7, 8, 'ok', 0, NULL, '2022-09-05 12:35:07', '2022-09-05 12:35:07'),
(32, 7, 8, 'replying myself', 30, NULL, '2022-09-05 12:35:40', '2022-09-05 12:35:40'),
(33, 7, 8, 'nice', 0, NULL, '2022-09-05 12:42:27', '2022-09-05 12:42:27'),
(34, 7, 8, 'if (mounted) {\n    setState(() {\n        ...\n    });\n}', 0, NULL, '2022-09-05 12:43:14', '2022-09-05 12:43:14'),
(35, 7, 8, 'if (mounted) {\n    setState(() {\n        ...\n    });\n}', 0, NULL, '2022-09-05 12:43:54', '2022-09-05 12:43:54'),
(36, 7, 8, 'nice', 0, NULL, '2022-09-05 12:44:02', '2022-09-05 12:44:02'),
(37, 7, 8, '1', 0, NULL, '2022-09-05 12:44:29', '2022-09-05 12:44:29'),
(38, 7, 8, '2', 0, NULL, '2022-09-05 12:44:38', '2022-09-05 12:44:38'),
(39, 7, 8, 'if (mounted) {\n    setState(() {\n        ...\n    });\n}', 0, NULL, '2022-09-05 12:44:47', '2022-09-05 12:44:47'),
(40, 7, 8, 'Timer(Duration(seconds: 1), ()=>scrollDown(\'smooth\'));', 0, NULL, '2022-09-05 12:45:17', '2022-09-05 12:45:17'),
(41, 7, 8, '// Before calling setState check if the state is mounted. \nif (mounted) { \n  setState (() => _noDataText = \'No Data\');\n}', 0, NULL, '2022-09-05 12:49:00', '2022-09-05 12:49:00'),
(42, 1, 8, 'what\'s all this?', 41, NULL, '2022-09-05 12:52:20', '2022-09-05 12:52:20'),
(43, 1, 8, '?', 41, NULL, '2022-09-05 12:53:20', '2022-09-05 12:53:20'),
(44, 1, 8, '? nice', 0, NULL, '2022-09-05 13:54:32', '2022-09-05 13:54:32'),
(45, 1, 8, 'jo', 0, NULL, '2022-09-05 14:39:19', '2022-09-05 14:39:19'),
(46, 7, 8, 'hi', 44, NULL, '2022-09-05 15:29:11', '2022-09-05 15:29:11'),
(47, 7, 8, 'hi', 0, NULL, '2022-09-05 15:43:26', '2022-09-05 15:43:26'),
(48, 7, 8, 'holla', 0, NULL, '2022-09-05 15:43:33', '2022-09-05 15:43:33'),
(49, 7, 8, '??????', 0, NULL, '2022-09-05 15:48:55', '2022-09-05 15:48:55'),
(50, 7, 8, '???', 0, NULL, '2022-09-05 15:49:52', '2022-09-05 15:49:52'),
(51, 7, 8, '?????', 0, NULL, '2022-09-05 15:52:43', '2022-09-05 15:52:43'),
(52, 7, 8, '?', 0, NULL, '2022-09-05 15:53:00', '2022-09-05 15:53:00'),
(53, 7, 8, '???', 0, NULL, '2022-09-05 15:53:15', '2022-09-05 15:53:15'),
(54, 7, 8, '🍊🍋🍌', 0, NULL, '2022-09-05 15:57:52', '2022-09-05 15:57:52'),
(55, 1, 8, 'I like my things to be accurate enough😍😍😍', 0, NULL, '2022-09-05 16:05:43', '2022-09-05 16:05:43'),
(56, 1, 8, 'mad oh!', 0, NULL, '2022-09-05 16:05:43', '2022-09-05 16:05:43'),
(57, 1, 8, '😁😁😂', 0, NULL, '2022-09-05 16:10:22', '2022-09-05 16:10:22'),
(58, 1, 8, '=-O', 0, NULL, '2022-09-05 16:16:02', '2022-09-05 16:16:02'),
(59, 1, 8, '🌏🌏🌏🌏🌏🌏🌏🌏🌏🌏🌏🌏🌏🌏🌏🌏🌏🌏🌏🌏🌏🌏🌏🌏🌏🌏🌏🌏🌏🌏🌏🌏🌏🌏🌏🌏🌏🌏🌏🌏🌏🌏🌏🌏', 0, NULL, '2022-09-05 16:16:15', '2022-09-05 16:16:15'),
(60, 1, 7, 'Holla people', 0, NULL, '2022-09-05 16:17:44', '2022-09-05 16:17:44'),
(61, 1, 7, 'I am new to the game', 0, NULL, '2022-09-05 16:17:55', '2022-09-05 16:17:55'),
(62, 1, 7, 'Haha', 17, NULL, '2022-09-05 16:18:10', '2022-09-05 16:18:10'),
(63, 1, 7, 'Nice', 60, NULL, '2022-09-05 16:23:17', '2022-09-05 16:23:17'),
(64, 1, 7, 'Web support is an open issue here. Currently this library will just return false for keyboard visibility on web.', 17, NULL, '2022-09-05 16:23:57', '2022-09-05 16:23:57'),
(65, 1, 7, 'i see', 64, NULL, '2022-09-05 16:24:18', '2022-09-05 16:24:18'),
(66, 1, 7, 'hi', 0, NULL, '2022-09-06 10:47:09', '2022-09-06 10:47:09'),
(67, 7, 7, 'nice', NULL, NULL, '2022-09-07 12:46:05', '2022-09-07 12:46:05'),
(68, 7, 5, 'who run the world?', NULL, NULL, '2022-09-08 05:46:33', '2022-09-08 05:46:33'),
(69, 7, 5, 'ok', NULL, NULL, '2022-09-08 05:46:40', '2022-09-08 05:46:40'),
(70, 7, 5, 'great', NULL, NULL, '2022-09-08 05:46:46', '2022-09-08 05:46:46'),
(71, 7, 5, 'nice', NULL, NULL, '2022-09-08 05:46:52', '2022-09-08 05:46:52'),
(72, 7, 5, 'heya', NULL, NULL, '2022-09-08 05:46:58', '2022-09-08 05:46:58'),
(73, 7, 5, 'ok', NULL, NULL, '2022-09-08 05:47:04', '2022-09-08 05:47:04'),
(74, 7, 5, 'ooo', NULL, NULL, '2022-09-08 05:47:12', '2022-09-08 05:47:12'),
(75, 7, 5, 'hi', 68, NULL, '2022-09-08 05:47:24', '2022-09-08 05:47:24'),
(76, 7, 5, 'see', NULL, NULL, '2022-09-08 05:47:29', '2022-09-08 05:47:29'),
(77, 7, 8, 'holla', NULL, NULL, '2022-09-08 08:03:35', '2022-09-08 08:03:35'),
(78, 7, 9, 'Nice Book', NULL, NULL, '2022-11-20 12:28:29', '2022-11-20 12:28:29');

-- --------------------------------------------------------

--
-- Table structure for table `directories`
--

CREATE TABLE `directories` (
  `id` int(11) NOT NULL,
  `bookquet` varchar(100) NOT NULL,
  `data` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `directories`
--

INSERT INTO `directories` (`id`, `bookquet`, `data`, `created_at`, `updated_at`) VALUES
(1, 'SOCIAL', '/entity/social.json', '2022-08-04 23:00:00', '2022-08-04 23:00:00'),
(2, 'EDUCATIONAL', '/entity/educational.json', '2022-08-04 23:00:00', '2022-08-04 23:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bookquet_id` int(11) DEFAULT NULL,
  `bookhut_id` int(11) DEFAULT NULL,
  `classroom_id` int(11) DEFAULT NULL,
  `approved` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `user_id`, `bookquet_id`, `bookhut_id`, `classroom_id`, `approved`, `created_at`, `updated_at`) VALUES
(1, 7, 1, 1, NULL, 1, '2022-08-31 14:23:03', '2022-08-31 14:23:03'),
(2, 8, 1, 1, NULL, 1, '2022-08-31 14:23:03', '2022-08-31 14:23:03'),
(3, 21, 1, 1, NULL, 0, '2022-09-02 14:12:12', '2022-09-02 14:12:12'),
(4, 7, 4, 4, NULL, 0, '2022-09-03 08:01:36', '2022-09-03 08:01:36'),
(12, 7, 2, 2, NULL, 0, '2022-09-03 17:45:56', '2022-09-03 17:45:56'),
(16, 1, 5, 5, NULL, 1, '2022-09-05 16:54:55', '2022-09-05 16:54:55'),
(17, 1, 2, 2, NULL, 0, '2022-09-05 16:56:17', '2022-09-05 16:56:17'),
(20, 1, 4, 4, NULL, 0, '2022-09-05 17:02:37', '2022-09-05 17:02:37'),
(21, 7, 3, 3, NULL, 1, '2022-09-05 17:03:19', '2022-09-05 17:03:19'),
(22, 28, 1, 1, NULL, 0, '2022-09-05 17:03:19', '2022-09-05 17:03:19'),
(29, 7, 5, 5, NULL, 1, '2022-09-07 06:37:52', '2022-09-07 06:37:52'),
(30, 1, 3, 3, NULL, 1, '2022-09-07 10:10:54', '2022-09-07 10:10:54');

-- --------------------------------------------------------

--
-- Table structure for table `hut_chat`
--

CREATE TABLE `hut_chat` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bookhut_id` int(11) DEFAULT NULL,
  `classroom_id` int(11) DEFAULT NULL,
  `message` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `reply_to` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hut_chat`
--

INSERT INTO `hut_chat` (`id`, `user_id`, `bookhut_id`, `classroom_id`, `message`, `reply_to`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, 'I like this bookhut', NULL, '2022-09-06 23:00:00', '2022-09-06 23:00:00'),
(2, 7, 1, NULL, 'nice', 0, '2022-09-07 06:09:23', '2022-09-07 06:09:23'),
(3, 7, 1, NULL, 'replying to myself', 2, '2022-09-07 06:09:47', '2022-09-07 06:09:47'),
(4, 7, 1, NULL, 'great', 0, '2022-09-07 06:18:54', '2022-09-07 06:18:54'),
(5, 7, 1, NULL, 'ok', 0, '2022-09-07 06:19:01', '2022-09-07 06:19:01'),
(6, 7, 1, NULL, 'I see', 1, '2022-09-07 06:19:13', '2022-09-07 06:19:13'),
(7, 7, 1, NULL, 'alright', 1, '2022-09-07 06:19:26', '2022-09-07 06:19:26'),
(8, 7, 1, NULL, 'great', 0, '2022-09-07 06:28:41', '2022-09-07 06:28:41'),
(9, 7, 1, NULL, 'It\'s not so much that there\'s a padding there. IconButton is a Material Design widget which follows the spec that tappable objects need to be at least 48px on each side. You can click into the IconButton implementation from any IDEs.', 0, '2022-09-07 06:29:03', '2022-09-07 06:29:03'),
(10, 7, 1, NULL, 'how?', 7, '2022-09-07 06:29:22', '2022-09-07 06:29:22'),
(11, 7, 3, NULL, 'voilla', 0, '2022-09-07 06:31:39', '2022-09-07 06:31:39'),
(12, 7, 1, NULL, 'okay', 0, '2022-09-07 08:43:06', '2022-09-07 08:43:06'),
(13, 7, 1, NULL, 'nice', 0, '2022-09-07 08:43:30', '2022-09-07 08:43:30'),
(14, 7, 1, NULL, 'var focusNode = FocusNode();\nRawKeyboardListener(\n        focusNode: focusNode,\n        onKey: (event) {\n          if (event.isKeyPressed(LogicalKeyboardKey.enter)) {\n            // Do something\n          }\n        },\n        child: TextField(controller: TextEditingController())\n    )', 0, '2022-09-07 08:44:07', '2022-09-07 08:44:07'),
(15, 7, 1, NULL, 'RawKeyboardListener(\n    focusNode: FocusNode(onKey: (node, event) {\n              if (event.isKeyPressed(LogicalKeyboardKey.enter)) {\n                return KeyEventResult.handled; // prevent passing the event into the TextField\n              }\n              return KeyEventResult.ignored; // pass the event to the TextField\n            }),\n    onKey: (event) {\n      if (event.isKeyPressed(LogicalKeyboardKey.enter)) {\n        // Do something\n      }\n    },\n    child: TextField(controller: TextEditingController())\n)', 0, '2022-09-07 08:44:45', '2022-09-07 08:44:45'),
(16, 7, 2, NULL, 'nice', 14, '2022-09-07 08:45:24', '2022-09-07 08:45:24'),
(17, 7, 3, NULL, 'hi', 0, '2022-09-07 09:22:13', '2022-09-07 09:22:13'),
(18, 7, 3, NULL, 'Goodnight', 0, '2022-09-07 09:28:54', '2022-09-07 09:28:54'),
(20, 7, 1, NULL, '🤣🤣🤣', 0, '2022-09-07 10:08:19', '2022-09-07 10:08:19'),
(21, 7, 1, NULL, '😎😎😎😎 looking good is good business you know', 0, '2022-09-07 10:09:20', '2022-09-07 10:09:20'),
(22, 7, 3, NULL, 'nice', 18, '2022-09-07 12:24:18', '2022-09-07 12:24:18'),
(23, 7, 3, NULL, 'okay', NULL, '2022-09-07 12:24:22', '2022-09-07 12:24:22'),
(24, 7, 3, NULL, 'nice', NULL, '2022-09-07 12:25:22', '2022-09-07 12:25:22'),
(25, 7, 3, NULL, 'okkk', NULL, '2022-09-07 12:25:30', '2022-09-07 12:25:30'),
(26, 7, 3, NULL, 'ouytr', NULL, '2022-09-07 12:25:36', '2022-09-07 12:25:36'),
(27, 7, 1, NULL, 'nive', NULL, '2022-09-08 05:59:58', '2022-09-08 05:59:58'),
(28, 7, 1, NULL, 'ok', NULL, '2022-09-08 06:00:10', '2022-09-08 06:00:10'),
(29, 7, 1, NULL, '1234567890', NULL, '2022-09-08 06:00:26', '2022-09-08 06:00:26'),
(30, 7, 1, NULL, 'why?', 14, '2022-09-08 06:00:58', '2022-09-08 06:00:58'),
(31, 7, 1, NULL, 'no', 21, '2022-09-08 06:01:14', '2022-09-08 06:01:14'),
(32, 7, 1, NULL, 'great', 21, '2022-09-08 17:17:21', '2022-09-08 17:17:21'),
(33, 7, 1, NULL, 'alright', NULL, '2022-09-08 17:17:36', '2022-09-08 17:17:36'),
(34, 7, 1, NULL, 'Hi', NULL, '2022-11-20 07:29:20', '2022-11-20 07:29:20');

-- --------------------------------------------------------

--
-- Table structure for table `interests`
--

CREATE TABLE `interests` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `data` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `interests`
--

INSERT INTO `interests` (`id`, `user_id`, `data`, `created_at`, `updated_at`) VALUES
(1, 21, '[\"Biography\",\"Romance Science\",\"ICT\",\"Art\",\"FinTech\"]', '2022-09-02 14:00:54', '2022-09-02 14:00:54'),
(2, 27, '[\"Documentary Fiction\",\"Entrepreneurship\",\"Articles\",\"Cookbooks\",\"FinTech\"]', '2022-09-03 18:19:01', '2022-09-03 18:19:01'),
(3, 28, '[\"Entrepreneurship\",\"FinTech\",\"Comics\",\"Romance Science\"]', '2022-09-03 21:48:36', '2022-09-03 21:48:36'),
(4, 29, '[\"Sports Triller\",\"Journals\",\"Documentary Fiction\",\"Cookbooks\"]', '2022-09-05 11:35:20', '2022-09-05 11:35:20'),
(5, 30, '[\"Documentary Fiction\",\"History\"]', '2022-10-30 18:32:25', '2022-10-30 18:32:25');

-- --------------------------------------------------------

--
-- Table structure for table `libraries`
--

CREATE TABLE `libraries` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `current_page` int(11) NOT NULL DEFAULT 1,
  `statistics` text DEFAULT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT 0,
  `anotations` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `libraries`
--

INSERT INTO `libraries` (`id`, `user_id`, `book_id`, `current_page`, `statistics`, `completed`, `anotations`, `created_at`, `updated_at`) VALUES
(14, 7, 9, 1, NULL, 0, NULL, '2022-09-05 18:25:55', '2022-09-07 09:48:55'),
(15, 7, 4, 1, NULL, 0, NULL, '2022-09-05 18:26:07', '2022-11-20 06:03:46'),
(22, 7, 5, 55, NULL, 0, NULL, '2022-09-07 09:40:11', '2022-11-20 07:10:28'),
(23, 1, 5, 1, NULL, 0, NULL, '2022-09-07 09:40:11', '2022-09-07 09:40:11'),
(24, 1, 2, 1, NULL, 0, NULL, '2022-09-07 09:40:11', '2022-09-07 09:40:11'),
(25, 1, 6, 1, NULL, 0, NULL, '2022-09-07 09:40:11', '2022-09-07 09:40:11'),
(26, 1, 7, 1, NULL, 0, NULL, '2022-09-07 09:40:11', '2022-09-07 09:40:11'),
(28, 7, 8, 17, '{\"6\":{\"textCount\":1607,\"wordCount\":264},\"28\":{\"textCount\":2523,\"wordCount\":451}}', 0, NULL, '2022-09-07 12:37:31', '2022-11-20 08:15:39');

-- --------------------------------------------------------

--
-- Table structure for table `notecards`
--

CREATE TABLE `notecards` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `library_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `highlight` text DEFAULT NULL,
  `tags` text NOT NULL,
  `color` varchar(100) DEFAULT '#666666',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notecards`
--

INSERT INTO `notecards` (`id`, `user_id`, `library_id`, `title`, `highlight`, `tags`, `color`, `created_at`, `updated_at`) VALUES
(1, 7, 28, 'Hello', 'Nice is not always nice. it\'s better to take a break sometimes', '', '#cc33cc', '2022-11-19 09:18:30', '2022-11-19 09:18:30'),
(3, 7, 28, '28', 'The lazy dog ran all over the farm with it\'s feet all drench in water', '', '#ff3300', '2022-11-19 12:57:42', '2022-11-19 12:57:42'),
(4, 7, 28, '28', 'it\'s really nice to live a life of peace not giving in to none', '', '#00cc00', '2022-11-19 12:57:42', '2022-11-19 12:57:42'),
(8, 7, 28, '500', 'nice I would love to practice this session nice I would love to practice this session nice I would lnice I would love to practice this session ', '', '#7b1fa2', '2022-11-19 20:52:39', '2022-11-19 21:05:08'),
(10, 7, 28, 'Page 10', 'Seriously.  It’s  a  wish  that  gets  granted  after\nyou prove yourself to the magic forest, and though odds of me surviving my\nthree  nights  are  low—I  only  found  evidence  of  a  handful  of  applicants  who\nwalk back out of the forest again—I’m single-minded enough\nThat’s  the  draw.  That’s  what  gets  hundreds  of  distraught  and  desperate\npeople to apply to the Blackmoor council', '', '#7b1fa2', '2022-11-19 21:22:04', '2022-11-19 21:22:04'),
(11, 7, 28, 'Epistle', 'I can make it all the way through Halloween, I’m free. I get to walk out\nof the forest on November 1st.', '', '#7b1fa2', '2022-11-19 21:22:29', '2022-11-20 07:22:51'),
(12, 7, 22, 'Page 17', 'beginning', '', '#666666', '2022-11-20 05:07:10', '2022-11-20 05:07:10'),
(18, 7, 22, 'Page 17', 'worst', '', '#666666', '2022-11-20 05:18:42', '2022-11-20 05:18:42');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `title`, `message`, `seen`, `created_at`, `updated_at`) VALUES
(1, 7, '', 'You have a new join request from Smith John on Bookhut: Mastering the art of knowledge', 1, '2022-09-03 17:45:56', '2022-09-07 09:31:48'),
(2, 7, '', 'Welcome to eBookquet! We are more than glad to have you with us. Enjoy access to instants books, bookhuts and more.', 1, '2022-09-03 18:17:47', '2022-09-04 05:27:06'),
(4, 7, '', 'Welcome to eBookquet! We are more than glad to have you with us. Enjoy access to instants books, bookhuts and more.', 1, '2022-09-03 18:17:47', '2022-09-04 06:34:20'),
(5, 28, '', 'Welcome to eBookquet! We are more than glad to have you with us. Enjoy access to instants books, bookhuts and more.', 0, '2022-09-03 21:48:16', '2022-09-03 21:48:16'),
(6, 29, '', 'Welcome to eBookquet! We are more than glad to have you with us. Enjoy access to instants books, bookhuts and more.', 0, '2022-09-05 11:33:56', '2022-09-05 11:33:56'),
(7, 1, '', 'You have a new join request from Samson Orode on Bookhut: Mastering the art of knowledge', 1, '2022-09-05 16:32:50', '2022-09-06 17:07:34'),
(8, 1, '', 'You have a new join request from Samson Orode on Bookhut: Mastering the art of knowledge', 0, '2022-09-05 16:56:17', '2022-09-05 16:56:17'),
(9, 1, '', 'You have a new join request from Samson Orode on Bookhut: Introducing the Crypto Concept over the air', 0, '2022-09-05 16:58:02', '2022-09-05 16:58:02'),
(10, 1, '', 'You have a new join request from Samson Orode on Bookhut: Introducing the Crypto Concept over the air', 0, '2022-09-05 17:01:22', '2022-09-05 17:01:22'),
(11, 1, '', 'You have a new join request from Samson Orode on Bookhut: Love & Life - Striking a Balance in a relationship', 1, '2022-09-05 17:02:37', '2022-09-06 17:07:29'),
(12, 1, '', 'You have a new join request from Samson Orode on Bookhut: Introducing the Crypto Concept over the air', 0, '2022-09-05 17:03:19', '2022-09-05 17:03:19'),
(13, 1, '', 'Congrats! Your join request to Bookhut: ChitChat with the Johnson has been successfuly approved. Welcome to the Hut', 1, '2022-09-06 16:09:19', '2022-09-06 17:07:21'),
(14, 1, '', 'We\'re sorry, Your join request to Bookhut: ChitChat with the Johnson was declined by the Hut admins', 0, '2022-09-06 16:09:48', '2022-09-06 16:09:48'),
(15, 1, '', 'You have a new join request from Smith John on Bookhut: Introducing the Crypto Concept over the air', 1, '2022-09-06 17:06:15', '2022-09-06 17:14:23'),
(16, 7, '', 'Congrats! Your join request to Bookhut: Introducing the Crypto Concept over the air has been successfuly approved. Welcome to the Hut', 1, '2022-09-06 17:18:14', '2022-09-07 09:31:55'),
(17, 7, '', 'Congrats! Your join request to Bookhut: Introducing the Crypto Concept over the air has been successfuly approved. Welcome to the Hut', 1, '2022-09-06 17:19:24', '2022-09-07 09:31:29'),
(18, 7, '', 'Congrats! Your join request to Bookhut: Introducing the Crypto Concept over the air has been successfuly approved. Welcome to the Hut', 1, '2022-09-06 17:20:53', '2022-09-07 09:32:19'),
(19, 21, '', 'We\'re sorry, Your join request to Bookhut: Introducing the Crypto Concept over the air was declined by the Hut admins', 0, '2022-09-06 17:22:43', '2022-09-06 17:22:43'),
(20, 7, '', 'Congrats! Your join request to Bookhut: Introducing the Crypto Concept over the air has been successfuly approved. Welcome to the Hut', 1, '2022-09-06 17:22:48', '2022-09-07 09:37:02'),
(21, 30, '', 'Welcome to eBookquet! We are more than glad to have you with us. Enjoy access to instants books, bookhuts and more.', 0, '2022-10-30 18:32:14', '2022-10-30 18:32:14');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `offer` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `offer`, `created_at`, `updated_at`) VALUES
(1, 'Standard', '{\"Books\":\"50\",\"BookHuts\":\"5\"}', '2022-08-04 23:00:00', '2022-08-04 23:00:00'),
(2, 'Silver', '{\"Books\":\"100\",\"BookHuts\":\"20\"}', '2022-08-04 23:00:00', '2022-08-04 23:00:00'),
(3, 'Bronze', '{\"Books\":\"500\",\"BookHuts\":\"50\"}', '2022-08-04 23:00:00', '2022-08-04 23:00:00'),
(4, 'Gold', '{\"Books\":\"100\",\"BookHuts\":\"100\"}', '2022-08-04 23:00:00', '2022-08-04 23:00:00'),
(5, 'Platinum', '{\"Books\":\"*\",\"BookHuts\":\"*\"}', '2022-08-04 23:00:00', '2022-08-04 23:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `postcards`
--

CREATE TABLE `postcards` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `library_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `highlight` text DEFAULT NULL,
  `tags` text NOT NULL,
  `color` varchar(100) DEFAULT '#4b4e97',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `postcards`
--

INSERT INTO `postcards` (`id`, `user_id`, `library_id`, `title`, `highlight`, `tags`, `color`, `created_at`, `updated_at`) VALUES
(1, 7, 28, 'awesome', 'Good reads', '', '#03a9f4', '2022-11-19 22:12:42', '2022-11-19 22:12:42'),
(2, 7, 28, 'Great', 'plug-in & package', '', '#5d4037', '2022-11-19 22:21:51', '2022-11-19 22:21:51'),
(3, 7, 28, 'great', 'holla', '', '#4b4e97', '2022-11-19 22:32:37', '2022-11-19 22:32:37'),
(4, 7, 28, 'hma', 'holla', '', '#4477dd', '2022-11-19 22:33:55', '2022-11-19 22:33:55'),
(5, 7, 28, 'Guillable', 'To Be exposed to lies and deceit.', '', '#43a047', '2022-11-20 06:24:43', '2022-11-20 06:24:59');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(100) DEFAULT NULL,
  `value` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `user_id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 1, 'pin_login', 'true', '2022-08-03 23:00:00', '2022-08-03 23:00:00'),
(2, 7, 'pin_login', 'false', '2022-08-03 23:00:00', '2022-08-03 23:00:00'),
(5, 8, 'biometric', 'false', '2022-08-03 23:00:00', '2022-08-03 23:00:00'),
(9, 16, 'pin_login', 'true', '2022-09-02 11:04:19', '2022-09-02 11:04:19'),
(10, 17, 'pin_login', 'true', '2022-09-02 11:14:57', '2022-09-02 11:14:57'),
(11, 18, 'pin_login', 'true', '2022-09-02 11:16:30', '2022-09-02 11:16:30'),
(12, 19, 'pin_login', 'true', '2022-09-02 11:17:03', '2022-09-02 11:17:03'),
(16, 27, 'pin_login', 'true', '2022-09-03 18:18:43', '2022-09-03 18:18:43'),
(17, 28, 'pin_login', 'true', '2022-09-03 21:48:16', '2022-09-03 21:48:16'),
(18, 29, 'pin_login', 'true', '2022-09-05 11:33:56', '2022-09-05 11:33:56'),
(19, 30, 'pin_login', 'true', '2022-10-30 18:32:13', '2022-10-30 18:32:13');

-- --------------------------------------------------------

--
-- Table structure for table `spaces`
--

CREATE TABLE `spaces` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bookhut_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `members` text NOT NULL,
  `time` varchar(100) NOT NULL,
  `schedule` timestamp NULL DEFAULT NULL,
  `status` enum('pending','started','finished','') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spaces`
--

INSERT INTO `spaces` (`id`, `user_id`, `bookhut_id`, `title`, `members`, `time`, `schedule`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'The Perfect Guy Talk', '[{\"user\":1,\"admin\":true,\"coleader\":true,\"speaker\":true,\"approved\":true},{\"user\":7,\"admin\":false,\"coleader\":true,\"speaker\":true,\"approved\":true},{\"user\":8,\"admin\":false,\"coleader\":true,\"speaker\":true,\"approved\":true},{\"user\":20,\"admin\":false,\"coleader\":true,\"speaker\":true,\"approved\":true},{\"user\":21,\"admin\":false,\"coleader\":true,\"speaker\":true,\"approved\":true},{\"user\":28,\"admin\":false,\"coleader\":true,\"speaker\":true,\"approved\":true}]', '01:30', NULL, 'finished', '2022-09-07 23:00:00', '2022-09-07 23:00:00'),
(2, 1, 1, 'The future might be too late', '[{\"user\":1,\"admin\":true,\"coleader\":true,\"speaker\":true,\"approved\":true},{\"user\":7,\"admin\":false,\"coleader\":true,\"speaker\":true,\"approved\":true},{\"user\":8,\"admin\":false,\"coleader\":true,\"speaker\":true,\"approved\":true},{\"user\":20,\"admin\":false,\"coleader\":true,\"speaker\":true,\"approved\":true},{\"user\":21,\"admin\":false,\"coleader\":true,\"speaker\":true,\"approved\":true},{\"user\":29,\"admin\":false,\"coleader\":true,\"speaker\":true,\"approved\":true}]', '00:50', NULL, 'started', '2022-09-07 23:00:00', '2022-09-07 23:00:00'),
(3, 8, 1, 'Setting limits in a space', '[{\"user\":8,\"admin\":true,\"coleader\":true,\"speaker\":true,\"approved\":true},{\"user\":7,\"admin\":false,\"coleader\":true,\"speaker\":true,\"approved\":true},{\"user\":1,\"admin\":false,\"coleader\":true,\"speaker\":true,\"approved\":true},{\"user\":20,\"admin\":false,\"coleader\":true,\"speaker\":true,\"approved\":true},{\"user\":21,\"admin\":false,\"coleader\":true,\"speaker\":true,\"approved\":true},{\"user\":28,\"admin\":false,\"coleader\":true,\"speaker\":true,\"approved\":true}]', '02:20', NULL, 'pending', '2022-09-07 23:00:00', '2022-09-07 23:00:00'),
(4, 7, 1, 'The Twist of Oliver & the Sea', '[{\"user\":7,\"admin\":true,\"coleader\":true,\"speaker\":true,\"approved\":true},{\"user\":8,\"admin\":false,\"coleader\":true,\"speaker\":true,\"approved\":true},{\"user\":1,\"admin\":false,\"coleader\":true,\"speaker\":true,\"approved\":true},{\"user\":20,\"admin\":false,\"coleader\":true,\"speaker\":true,\"approved\":true},{\"user\":21,\"admin\":false,\"coleader\":true,\"speaker\":true,\"approved\":true},{\"user\":28,\"admin\":false,\"coleader\":true,\"speaker\":true,\"approved\":true}]', '02:20', NULL, 'started', '2022-09-07 23:00:00', '2022-09-07 23:00:00'),
(5, 8, 1, 'Making Shells from Shadows', '[{\"user\":8,\"admin\":true,\"coleader\":true,\"speaker\":true,\"approved\":true},{\"user\":7,\"admin\":false,\"coleader\":true,\"speaker\":true,\"approved\":true},{\"user\":1,\"admin\":false,\"coleader\":true,\"speaker\":true,\"approved\":true},{\"user\":20,\"admin\":false,\"coleader\":true,\"speaker\":true,\"approved\":true},{\"user\":21,\"admin\":false,\"coleader\":true,\"speaker\":true,\"approved\":true},{\"user\":28,\"admin\":false,\"coleader\":true,\"speaker\":true,\"approved\":true}]', '02:20', NULL, 'finished', '2022-09-07 23:00:00', '2022-09-07 23:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `duration` varchar(100) NOT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pin_code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `telephone`, `photo`, `password`, `bio`, `pin_code`, `created_at`, `updated_at`) VALUES
(1, 'Samson', 'Orode', 'samcool53@gmail.com', '09067888777', 'https://s.yimg.com/ny/api/res/1.2/0wj9LndsMtHaLJU8.tTh3w--/YXBwaWQ9aGlnaGxhbmRlcjt3PTY0MA--/https://s.yimg.com/cd/resizer/2.0/original/-Q7ql8v_Hy83ubHz_N1KOxjFLbo', '$2y$10$0z8RIcbY8BPFI2iHOTUsq.160pmlL5vmmYrgT2N0gxHR8p3LnpzOy', NULL, '2022', '2022-08-04 23:00:00', '2022-09-05 12:51:22'),
(7, 'Smith', 'John', 'smithjohn@gmail.com', '09067888767', 'http://10.0.2.2:8000/storage/profiles/07im6cebxh.jpg', '$2y$10$3KQK1QCByHp0Xw64xN7PuejuaZR.Sm8FYvujg5ubwYyENWlKw8sbu', 'I love being happy. and that\'s what matters to me', '1234', '2022-08-06 11:51:41', '2022-11-25 06:54:25'),
(8, 'Stone', 'Cole', 'smithmiller@gmail.com', '09067888777', 'https://media.allure.com/photos/5a26c1d8753d0c2eea9df033/3:4/w_1262,h_1683,c_limit/mostbeautiful.jpg', '$2y$10$W7ThhCRuvQYNH9J4.mWZe.NaF3oBuMOEYuwe/NiG1ktKMefbZFffW', 'Pop culture guru, Twitter Fanatics, Certified reader, Introvert', NULL, '2022-08-06 20:47:57', '2022-08-06 20:47:57'),
(20, 'Esther', 'Kay', 'esther@gmail.com', '09067888777', 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8dXNlciUyMHByb2ZpbGV8ZW58MHx8MHx8&w=1000&q=80', '$2y$10$u.PB0o5c43mEIXQTyOepJO7E8SIgEG9siS4gYtWwEiPGd2VvmM.aa', NULL, '5252', '2022-09-02 11:18:13', '2022-09-02 11:19:28'),
(21, 'Peter', 'Parker', 'peter@gmail.com', '09067888666', 'https://spng.subpng.com/20211215/wc/icon-user-profile-user-for-avatar-61b97aba5ab025.31777939.jpg', '$2y$10$iVX33cKNbmbObIsRw1sxKuCShmBsfVlunrpo49AaCN8CUl9mp8Skq', 'Pop culture guru, Twitter Fanatics, Certified reader, Introvert', '2022', '2022-09-02 13:04:07', '2022-09-02 14:06:40'),
(28, 'Tim', 'Lake', 'tim@gmail.com', '012', 'http://www.venmond.com/demo/vendroid/img/avatar/big.jpg', '$2y$10$k7xbVAuollnPYi.HQ0iG7eKSfOGm5Kx5lzt9VlzSfj0qpX7wmPmjO', NULL, NULL, '2022-09-03 21:48:15', '2022-09-03 21:48:16'),
(29, 'Johans', 'Hill', 'johanshill@gmail.com', '+2349067888777', 'https://lenstax.com/auth/app-assets/images/profile/user-uploads/user-04.jpg', '$2y$10$xxegSUl0UaGvauL3k0ts8eB9K1tKcot0ehifJdK7VLwgcLRl/3.i.', NULL, NULL, '2022-09-05 11:33:55', '2022-09-05 11:33:55'),
(30, 'Smith', 'Mill', 'smithmill@gmail.com', '+2340813646485', 'http://10.0.2.2:8000/storage/profiles/user.jpg', '$2y$10$Qu2OIA1PF7aUcDi84kdYEeiAGxy.vI/TZg1/kUdxyWkiiQxwlQ4ye', NULL, NULL, '2022-10-30 18:32:13', '2022-10-30 18:32:13');

-- --------------------------------------------------------

--
-- Table structure for table `vocabularies`
--

CREATE TABLE `vocabularies` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `library_id` int(11) NOT NULL,
  `word` varchar(100) NOT NULL,
  `textCount` int(11) NOT NULL,
  `meaning` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vocabularies`
--

INSERT INTO `vocabularies` (`id`, `user_id`, `library_id`, `word`, `textCount`, `meaning`, `created_at`, `updated_at`) VALUES
(1, 7, 28, 'damp', 4, 'Moisture; humidity; dampness.', '2022-11-20 04:46:27', '2022-11-20 04:46:27'),
(3, 7, 28, 'Falling', 7, '(heading) To be moved downwards.', '2022-11-20 04:47:18', '2022-11-20 04:47:18'),
(5, 7, 28, 'toward', 6, 'Yielding, pliant; docile; ready or apt to learn; not froward.', '2022-11-20 04:47:50', '2022-11-20 04:47:50'),
(6, 7, 22, 'beginning', 9, 'The act of doing that which begins anything; commencement of an action, state, or space of time; entrance into being or upon a course; the first act, effort, or state of a succession of acts or states.', '2022-11-20 05:07:26', '2022-11-20 05:07:26'),
(7, 7, 22, 'covered', 7, 'To place something over or upon, as to conceal or protect.', '2022-11-20 05:23:23', '2022-11-20 05:23:23'),
(8, 7, 28, 'However', 7, 'Nevertheless; yet, still; in spite of (that).', '2022-11-20 05:25:45', '2022-11-20 05:25:45'),
(9, 7, 28, 'massive', 7, 'A homogeneous mass of rock, not layered and without an obvious crystal structure.', '2022-11-20 05:26:19', '2022-11-20 05:26:19'),
(11, 7, 28, 'oversized', 9, 'Very large; especially of something larger than normal for its type.', '2022-11-20 05:56:40', '2022-11-20 05:56:40'),
(12, 7, 28, 'lolling', 7, 'To laugh out loud.', '2022-11-20 06:16:28', '2022-11-20 06:16:28'),
(13, 7, 28, 'communicate', 11, 'To impart', '2022-11-20 06:17:29', '2022-11-20 06:17:29'),
(14, 7, 28, 'sprinkle', 8, 'A light covering with a sprinkled substance.', '2022-11-20 06:18:09', '2022-11-20 06:18:09'),
(15, 7, 28, 'freaking', 8, 'To make greatly distressed and/or a discomposed appearance', '2022-11-20 06:18:51', '2022-11-20 06:18:51');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `book_id`, `created_at`, `updated_at`) VALUES
(36, 7, 6, '2022-09-07 12:44:14', '2022-09-07 12:44:14'),
(37, 7, 10, '2022-09-07 12:44:27', '2022-09-07 12:44:27'),
(38, 7, 1, '2022-09-07 12:44:39', '2022-09-07 12:44:39'),
(39, 7, 7, '2022-09-07 12:45:51', '2022-09-07 12:45:51'),
(40, 7, 2, '2022-11-19 04:40:39', '2022-11-19 04:40:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookhuts`
--
ALTER TABLE `bookhuts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookquet`
--
ALTER TABLE `bookquet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classrooms`
--
ALTER TABLE `classrooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `directories`
--
ALTER TABLE `directories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hut_chat`
--
ALTER TABLE `hut_chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interests`
--
ALTER TABLE `interests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `libraries`
--
ALTER TABLE `libraries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notecards`
--
ALTER TABLE `notecards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postcards`
--
ALTER TABLE `postcards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spaces`
--
ALTER TABLE `spaces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vocabularies`
--
ALTER TABLE `vocabularies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookhuts`
--
ALTER TABLE `bookhuts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bookquet`
--
ALTER TABLE `bookquet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `classrooms`
--
ALTER TABLE `classrooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `directories`
--
ALTER TABLE `directories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `hut_chat`
--
ALTER TABLE `hut_chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `interests`
--
ALTER TABLE `interests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `libraries`
--
ALTER TABLE `libraries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `notecards`
--
ALTER TABLE `notecards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `postcards`
--
ALTER TABLE `postcards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `spaces`
--
ALTER TABLE `spaces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `vocabularies`
--
ALTER TABLE `vocabularies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
