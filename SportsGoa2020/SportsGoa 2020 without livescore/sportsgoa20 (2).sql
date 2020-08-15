-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 15, 2020 at 05:12 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sportsgoa20`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` varchar(500) NOT NULL,
  `news_id` int(11) NOT NULL,
  `n_reports` int(5) NOT NULL,
  `comment_status` int(1) NOT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `news_id` (`news_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `comment`, `news_id`, `n_reports`, `comment_status`) VALUES
(4, 'gtrdger', 99, 0, 0),
(2, 'hiii', 99, 1, 0),
(27, 'ss', 130, 0, 0),
(28, 'yyy', 130, 0, 0),
(29, 'www', 99, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `event_id` int(10) NOT NULL AUTO_INCREMENT,
  `subuser_id` varchar(20) NOT NULL,
  `subscriber_id` varchar(20) NOT NULL,
  `event_name` varchar(30) NOT NULL,
  `event_type` varchar(20) NOT NULL,
  `event_category` varchar(30) NOT NULL,
  `place` varchar(50) NOT NULL,
  `t_date` date NOT NULL,
  `t_time` varchar(10) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `pic` varchar(2000) DEFAULT NULL,
  `authenticate_status` varchar(20) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`event_id`),
  KEY `subuser_id` (`subuser_id`),
  KEY `subscriber_id` (`subscriber_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `subuser_id`, `subscriber_id`, `event_name`, `event_type`, `event_category`, `place`, `t_date`, `t_time`, `description`, `pic`, `authenticate_status`, `status`) VALUES
(1, 'arjun@10', 'mfc@11', 'Pro League', 'local', 'football', 'Athletic Stadium, Bambolim', '2020-04-30', '04:00', 'Goa Football Academy''s Pro League  ', '197275.jpg', 'approved', 1),
(2, 'arjun@10', 'khush@10', 'Champions Trophy', 'local', 'football', 'Duler Stadium, Mapusa', '2020-04-30', '10:00', 'GFA''s All Goa Football Tournament', '', 'approved', 1),
(3, 'arjun@10', 'mfc@11', 'GU Volleyball Cup', 'university', 'volleyball', 'Dr. Shyama Prasad Indoor Stadium, Bambolim', '2020-05-28', '09:30', 'Inter-colligiate Volleyball Tournament organised by Goa University ', '', 'approved', 1),
(4, 'audi@10', 'mfc@11', 'Reliance Cup', 'university', 'football', 'Athletic Stadium, Bambolim', '2020-06-19', '04:00', 'Reliance Foundation in collaboration with Goa Football Association organises football tournament to develop and promote football in Goa', '213677.jpg', 'approved', 1),
(6, 'arjun@10', 'mfc@11', 'Inter-Colligiate Cup', 'university', 'volleyball', 'Pernem Sports Complex,Pernem', '2020-05-02', '09:00', 'Govt College Pernem in collaboration with Goa University organises Inter-Colligiate Cup ', '283219.jpg', 'approved', 1),
(32, 'arjun@10', 'mfc@11', 'Challenger''s Trophy', 'university', 'football', 'mapusa', '2020-06-25', '06:01', 'Goa University team selection to represent for Goa Univerity in all India Tournament will be carried out simultaneouly', '961587.jpg', 'approved', 1),
(33, 'arjun@10', 'mfc@11', 'Sporting Cup', 'local', 'football', 'Calangute Sports Complex, Calangute', '2020-05-28', '09:30', 'Sporting Club of Goa organises Sporting Cup in Association with GFA', '944118.jpg', 'approved', 1),
(41, 'arjun@10', 'mfc@11', 'Goa Badminton League', 'local', 'badminton', 'Mapusa', '2020-05-29', '09:00', 'All Goa Badminton Tournament by Lion''s Club of Mapusa', '760281.jpg', 'approved', 0),
(48, 'arjun@10', 'mfc@11', 'super cup', 'local', 'volleyball', 'Bambolim Stadium', '2020-06-29', '10am', 'Organised by volleyball federation of india', '923569.jpg', 'waiting', 0),
(49, 'arjun@10', 'mfc@11', 'Commonwealth Cup', 'local', 'cricket', 'GCA Ground, Porvorim', '2020-06-26', '12:00', 'Goa Cricket Association organises All Goa cricket tournament', '', 'approved', 1),
(51, 'arjun@10', 'mfc@11', 'Hockey League', 'university', 'hockey', 'Bicholim Sports Complex,Pernem', '2020-06-30', '10:00', 'All Goa Hockey Tournament', '106668.jpg', 'approved', 1),
(52, 'arjun@10', 'mfc@11', 'University Cup', 'university', 'football', 'Nehru Stadium, Fatorda', '2020-03-21', '09:30', 'Inter-colligiate Football Tournament organised by Goa University', '208434.jpg', 'waiting', 0),
(53, 'audi@10', 'mfc@11', 'GFL Cup', 'university', 'football', 'Athletic Stadium, Bambolim', '2020-08-29', '17:00', 'Goa Football Academy''s Goa Football League', '233281.png', 'waiting', 0),
(58, 'arjun@10', 'mfc@11', 'La Liga Santander', 'local', 'football', 'Spain', '2020-03-04', '03:30', 'Spanish Professional League', '', 'waiting', 0),
(60, 'arjun@10', 'mfc@11', 'Lion''s Cup', 'local', 'cricket', 'Peddem Sports Complex,Peddem', '2020-08-29', '16:00', 'All Goa Cricket Tournament by Lion''s Club of Mapusa', '', 'waiting', 0),
(61, 'audi@10', 'mfc@11', 'MPL', 'local', 'cricket', 'Menkurem, Bicholim Goa', '2020-08-15', '16:00', 'Panchayat Level Cricket Tournament', '', 'waiting', 0),
(62, 'witty@10', 'ved@10', 'Playon', 'university', 'cricket', 'Goa University Play Ground', '2020-08-22', '10:00', 'Inter departmental', '', 'waiting', 0),
(63, 'snape@123', 'khush@10', 'snape@123', 'university', 'cricket', 'Goa University Play Ground', '2020-08-22', '10:00', 'An inter departmental sports event (cricket) in Goa University', '', 'waiting', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fixtures`
--

CREATE TABLE IF NOT EXISTS `fixtures` (
  `match_id` int(10) NOT NULL AUTO_INCREMENT,
  `event_id` int(10) NOT NULL,
  `team1` varchar(30) NOT NULL,
  `team2` varchar(30) NOT NULL,
  `place` varchar(50) NOT NULL,
  `t_date` date NOT NULL,
  `t_time` varchar(10) NOT NULL,
  PRIMARY KEY (`match_id`),
  KEY `event_id` (`event_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=122 ;

--
-- Dumping data for table `fixtures`
--

INSERT INTO `fixtures` (`match_id`, `event_id`, `team1`, `team2`, `place`, `t_date`, `t_time`) VALUES
(25, 1, 'Santa Cruz FC', 'Taliegao FC', 'Bambolim Stadium', '2020-05-10', '16:00'),
(29, 1, 'Lions club', 'Wilson Union', 'Bambolim Stadium', '2020-05-11', '14:00'),
(30, 1, 'Sporting Club', 'Dunes FC', 'Bambolim Stadium', '2020-05-11', '10:00'),
(39, 2, 'Maina 6', 'Sporting Fc', 'Duler', '2020-05-31', '08:00'),
(40, 3, 'barazan sc', 'mardol six', 'mardol', '2020-08-27', '10:30'),
(41, 3, 'goa', 'kerala', 'mapusa', '2020-06-30', '10:00'),
(42, 3, 'punjab', 'haryana', 'Duler Stadium, Mapusa', '2020-07-30', '10:00'),
(43, 4, 'Dempo sc', 'Mohan Bagan', 'duler stadium,mapusa', '2020-06-08', '05:30'),
(44, 4, 'Salgaonkar sc', 'Sporting club de Goa', 'Bambolim Stadium', '2020-07-20', '08:00'),
(49, 6, 'Dempo ', 'Pernem', 'Pernem', '2020-05-29', '10:30 '),
(50, 6, 'GCQ Quepem', 'Dhempe', 'Pernem', '2020-05-10', '11:00'),
(51, 6, 'MFC Dharbandora', 'St. Xaviers', 'Pernem', '2020-05-19', '10:00'),
(54, 41, 'goa', 'karnataka', 'peddem mapusa', '2020-06-23', '09:00'),
(56, 1, 'Siolim FC', 'Victory Jesus', 'Bambolim Stadium', '2020-05-07', '18:00'),
(58, 1, 'fc bardez', 'Churchill SC', 'Bambolim Stadium', '2020-05-22', '10:00'),
(60, 2, 'fc goa', 'dunes madrem', 'Duler', '2020-05-21', '04:00'),
(63, 49, 'Siolim Lions', 'Sal Fighters', 'Peddem', '2020-07-20', '02:30'),
(71, 1, 'Da Cruz', 'Churchill Brothers', 'Bambolim Stadium', '2020-05-06', '16:30'),
(72, 1, 'FC Dune''s', 'FC Bardez', 'Bambolim Stadium', '2020-05-02', '20:00'),
(73, 2, 'FC Goa', 'Sesa FC', 'Duler', '2020-05-28', '20:00'),
(74, 51, 'Goa University', 'Sesa FC', 'University Ground', '2020-07-22', '11:00'),
(75, 6, 'GC Khandola', 'Malikaarjun Kankon', 'Pernem', '2020-05-24', '10:30'),
(76, 41, 'Barcelona', 'real madrid', 'Duler', '2020-05-29', '01:47'),
(77, 41, 'Barcelona', 'Chelsea', 'Duler', '2020-06-30', '02:30'),
(78, 6, 'India', 'macau', 'Duler', '2020-07-03', '11:00'),
(79, 6, 'Goa University', 'GC Sankhalim', 'Pernem', '2020-05-05', '10:00'),
(80, 3, 'England', 'Australia', 'Duler', '2020-06-27', '02:30'),
(81, 3, 'barcelona', 'real madrid', 'camp nou', '2020-06-30', '10:00'),
(82, 4, 'china', 'macau', 'Bambolim', '2020-07-01', '10:00'),
(83, 4, 'Barcelona', 'Savilla', 'Duler', '2020-05-31', '10:00'),
(84, 3, 'goa', 'karnataka', 'goa', '2021-02-12', '14:31'),
(85, 3, 'india', 'china', 'India', '2020-08-29', '15:42'),
(86, 49, 'Saligao', 'Pernem', 'GCA, Porvorim', '2020-06-28', '14:00'),
(87, 6, 'India', 'Bangladesh', 'mapusa', '2020-08-28', '17:00'),
(88, 3, 'chelsea', 'bayern', 'london', '2020-08-21', '07:37'),
(89, 3, 'csk', 'rcb', 'chennai', '2020-08-14', '12:00'),
(90, 3, 'dubai', 'china', 'korea', '2020-07-05', '19:16'),
(97, 3, 'barcelona', 'madrid', 'camp nou', '2018-03-30', '12:31'),
(98, 3, 'barcelona', 'chelsea', 'camp nou', '2018-03-30', '12:31'),
(99, 60, 'aa', 'bb', 'cc', '2020-08-21', '12 am'),
(100, 51, 'abc', 'bba', 'mapusa', '2020-08-13', '00:58'),
(101, 49, 'Morjim', 'Vasco', 'GCA, Porvorim', '2020-07-21', '16:00'),
(102, 49, 'Mapusa', 'Bicholim', 'GCA, Porvorim', '2020-07-19', '16:00'),
(103, 2, 'Baina 6', 'Vasco Fc', 'Duler', '2020-05-24', '19:30'),
(104, 2, 'Goa Fc', 'Churchill Brothers', 'Duler', '2020-05-25', '20:00'),
(105, 2, 'Santa Cruz FC', 'Lions Club', 'Duler', '2020-05-28', '16:00'),
(107, 49, 'Valpoi', 'Margao ', 'GCA, Porvorim', '2020-07-25', '18:30'),
(108, 1, 'Dempo SC', 'Sesa Goa', 'Bambolim Stadium', '2020-05-03', '16:00'),
(109, 2, 'FC Dune''s', 'FC Bardez', 'Duler', '2020-05-22', '14:00'),
(110, 2, 'Santa Cruz FC', 'FC Baga', 'Duler', '2020-05-21', '16:00'),
(111, 2, 'FC Colvale', 'FC Bardez', 'Duler', '2020-05-23', '15:00'),
(112, 49, 'Sankhalim', 'Pernem', 'GCA, Porvorim', '2020-07-28', '16:00'),
(113, 49, 'Baga', 'Calangute', 'GCA, Porvorim', '2020-07-30', '16:00'),
(114, 62, 'MCom', 'MA', 'Goa University Play Ground', '2020-08-22', '10:00'),
(115, 62, 'MCom', 'MA', 'Goa University Play Ground', '2020-08-22', '11:00'),
(117, 62, 'MCA', 'MA', 'Goa University Play Ground', '2020-08-22', '15:00'),
(118, 62, 'MCom', 'MBA', 'Goa University Play Ground', '2020-08-23', '10:00'),
(120, 63, 'MCom', 'MA', 'Goa University Play Ground', '2020-08-22', '11:00'),
(121, 63, 'MCom', 'MA', 'Mapusa', '2020-08-22', '12:00');

-- --------------------------------------------------------

--
-- Table structure for table `livecricket`
--

CREATE TABLE IF NOT EXISTS `livecricket` (
  `reg_id` int(5) NOT NULL AUTO_INCREMENT,
  `event_id` int(10) NOT NULL,
  `match_id` int(10) NOT NULL,
  `team_name` varchar(30) NOT NULL,
  `toss` varchar(10) NOT NULL,
  `choice` varchar(10) NOT NULL,
  `inning` int(5) NOT NULL,
  `runs` int(5) NOT NULL,
  `wickets` int(5) NOT NULL,
  `overs` float NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`reg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `livecricket`
--

INSERT INTO `livecricket` (`reg_id`, `event_id`, `match_id`, `team_name`, `toss`, `choice`, `inning`, `runs`, `wickets`, `overs`, `status`) VALUES
(17, 49, 102, 'India', 'W', 'bat', 1, 1, 2, 0.1, 1),
(18, 49, 102, 'Pakistan', 'L', 'bowl', 2, 0, 0, 0, 0),
(19, 62, 114, 'MCom', 'W', 'bat', 1, 0, 0, 0, 1),
(20, 62, 114, 'MA', 'L', 'bowl', 2, 0, 0, 0, 0),
(21, 62, 115, 'MCom', 'W', 'bat', 1, 1, 0, 0, 1),
(22, 62, 115, 'MA', 'L', 'bowl', 2, 0, 0, 0, 0),
(23, 62, 116, 'MBA', 'L', 'bat', 1, 0, 0, 0, 1),
(24, 62, 116, 'MCA', 'W', 'bowl', 2, 0, 0, 0, 0),
(25, 62, 118, 'MCom', 'W', 'bat', 1, 4, 0, 0, 1),
(26, 62, 118, 'MBA', 'L', 'bowl', 2, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `livescore`
--

CREATE TABLE IF NOT EXISTS `livescore` (
  `REG_ID` int(10) NOT NULL AUTO_INCREMENT,
  `event_id` int(10) NOT NULL,
  `match_id` int(10) NOT NULL,
  `TEAM1` int(10) NOT NULL,
  `TEAM2` int(10) NOT NULL,
  PRIMARY KEY (`REG_ID`),
  KEY `event_id` (`event_id`),
  KEY `match_id` (`match_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `livescore`
--

INSERT INTO `livescore` (`REG_ID`, `event_id`, `match_id`, `TEAM1`, `TEAM2`) VALUES
(2, 2, 73, 1, 0),
(3, 51, 74, 2, 1),
(5, 3, 81, 0, 0),
(6, 4, 82, 0, 0),
(7, 3, 84, 0, 0),
(8, 3, 85, 0, 0),
(9, 49, 86, 0, 0),
(10, 2, 104, 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `livescorevolleyball`
--

CREATE TABLE IF NOT EXISTS `livescorevolleyball` (
  `reg_id` int(10) NOT NULL AUTO_INCREMENT,
  `event_id` int(10) NOT NULL,
  `match_id` int(10) NOT NULL,
  `set_no` int(1) NOT NULL,
  `team1_score` int(5) NOT NULL,
  `team2_score` int(5) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`reg_id`),
  KEY `event_id` (`event_id`),
  KEY `match_id` (`match_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `livescorevolleyball`
--

INSERT INTO `livescorevolleyball` (`reg_id`, `event_id`, `match_id`, `set_no`, `team1_score`, `team2_score`, `status`) VALUES
(6, 41, 76, 1, 17, 9, 1),
(7, 41, 76, 2, 0, 0, 0),
(8, 41, 76, 3, 0, 0, 0),
(9, 41, 76, 4, 0, 0, 0),
(10, 41, 76, 5, 0, 0, 0),
(11, 41, 77, 1, 0, 0, 1),
(12, 41, 77, 2, 0, 0, 0),
(13, 41, 77, 3, 0, 0, 0),
(14, 41, 77, 4, 0, 0, 0),
(15, 41, 77, 5, 0, 0, 0),
(21, 6, 79, 1, 2, 1, 1),
(22, 6, 79, 2, 0, 0, 0),
(23, 6, 79, 3, 0, 0, 0),
(24, 6, 79, 4, 0, 0, 0),
(25, 6, 79, 5, 0, 0, 0),
(26, 6, 87, 1, 0, 0, 1),
(27, 6, 87, 2, 0, 0, 0),
(28, 6, 87, 3, 0, 0, 0),
(29, 6, 87, 4, 0, 0, 0),
(30, 6, 87, 5, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `news_articles`
--

CREATE TABLE IF NOT EXISTS `news_articles` (
  `news_id` int(150) NOT NULL AUTO_INCREMENT,
  `event_id` int(10) NOT NULL,
  `heading` varchar(150) NOT NULL,
  `description` varchar(1500) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `place` varchar(50) NOT NULL,
  `pic` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`news_id`),
  KEY `event_id` (`event_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=138 ;

--
-- Dumping data for table `news_articles`
--

INSERT INTO `news_articles` (`news_id`, `event_id`, `heading`, `description`, `date`, `time`, `place`, `pic`) VALUES
(127, 2, 'ISL Final To Be Played in Goa', 'The final of the Indian Super League 2019-20 season will take place in Goa''s Margao, the founding chairperson of Football Sports Development Limited Nita Ambani announced on Sunday.  The summit clash will be held at 7:30 pm on March 14 at the Jawaharlal Nehru Stadium at Fatorda in Margao. "Goa deserves to host the ISL final. There is no denying that Goa loves its football and we would like to bring the most crucial football event to the city for the people of Goa," Ambani said.  The JLN stadium at Fatorda is the home venue of FC Goa, who have secured a berth in the AFC Champions League 2021 group stage by finishing on top of the league stage of the ISL.  "It has been such a joy to watch FC Goa this season. A fantastic team and the most consistent club in ISL over last six years. My heartiest congratulations to FC Goa''s captain Mandar, their lead goal scorer Coro (Ferran Corominas) and entire squad, coaching staff and the management for winning the first-ever ISL League Shield," said Neeta Ambani.', '2020-07-29', '01:30', 'mapusa', ''),
(128, 2, 'Bayern Humiliated Barcelona with 8-2 goals', 'The humiliating loss ended a disappointing season for Barcelona, one that included a coaching change and public disputes between players and team officials. It is the first time since 2008 that the Spanish club finished a season without a significant title. It hasn’t lifted the European trophy since 2015.  The commanding victory kept alive Bayern’s quest for a sixth title, which would move it ahead of Barcelona. It will be back in the semifinals for the first time since 2018 when it lost to Real Madrid in the last four. The German champion was eliminated by Liverpool in the round of 16 last season.', '2020-07-31', '01:00', 'Panjim', ''),
(130, 2, 'indian super league', ' The JLN stadium at Fatorda is the home venue of FC Goa, who have secured a berth in the AFC Champions League 2021 group stage by finishing on top of the league stage of the ISL. "It has been such a joy to watch FC Goa this season. A fantastic team and the most consistent club in ISL over last six years. My heartiest congratulations to FC Goa''s captain Mandar, their lead goal scorer Coro (Ferran Corominas) and entire squad, coaching staff and the management for winning the first-ever ISL League Shield," said Neeta Ambani.', '2020-08-01', '02:30', 'Goa', ''),
(131, 2, ' What next after their humiliating 8-2 defeat by Bayern Munich?', 'It was a night of utter humiliation for Barcelona as they went out of the Champions League after a crushing defeat by Bayern Munich.  Pundits called their 8-2 quarter-final loss "pathetic and embarrassing", while Spanish football writer Guillem Balague said Barca''s proud heritage had been "thrown in the bin".  Long-serving defender Gerard Pique did not hold back after the match, saying changes were needed - amid widespread reports boss Quique Setien, who has only been in the job since January, would be sacked.Having finished runners-up to bitter rivals Real Madrid in La Liga, the pressure was already mounting on Setien, who is seven months into a two-and-a-half-year contract.  His chances of remaining in charge after his side''s capitulation in Lisbon are slim, with some reports circulating that Barca have already decided to sack him. ', '2020-08-14', '01:00', 'Goa', ''),
(137, 63, ' Playon News', 'It was successful', '2020-08-23', '11:00', 'Goa University Play Ground', '');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `subuser_id` varchar(250) NOT NULL,
  `event_id` varchar(10) NOT NULL,
  `n_status` int(1) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=76 ;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`comment_id`, `subuser_id`, `event_id`, `n_status`) VALUES
(5, 'arjun@10', '37', 1),
(6, 'arjun@10', '38', 1),
(7, 'arjun@10', '38', 1),
(8, 'arjun@10', '39', 1),
(11, 'audi@10', '42', 1),
(28, 'arjusn@10', '40', 1),
(32, 'arjun@10', '18', 1),
(40, 'arjun@10', '43', 1),
(42, 'arjun@10', '44', 1),
(49, 'arjun@10', '45', 1),
(51, 'arjun@10', '46', 1),
(52, 'arjun@10', '46', 1),
(53, 'arjun@10', '47', 1),
(54, 'arjun@10', '48', 1),
(55, 'arjun@10', '49', 1),
(57, 'arjun@10', '51', 1),
(59, 'arjun@10', '1', 1),
(64, 'arjun@10', '33', 1),
(66, 'arjun@10', '6', 1),
(67, 'arjun@10', '4', 1),
(68, 'arjun@10', '2', 1),
(69, 'arjun@10', '52', 1),
(70, 'arjun@10', '32', 1),
(72, '', '', 1),
(73, 'arjun@10', '3', 1),
(74, 'arjun@10', '41', 1),
(75, 'audi@10', '53', 1);

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `photo_id` int(20) NOT NULL AUTO_INCREMENT,
  `event_id` int(20) NOT NULL,
  `caption` varchar(500) NOT NULL,
  `picture` varchar(200) NOT NULL,
  PRIMARY KEY (`photo_id`),
  KEY `event_id` (`event_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`photo_id`, `event_id`, `caption`, `picture`) VALUES
(1, 1, 'my first upload', '393917.jpg'),
(2, 1, 'a', '572754.jpeg'),
(3, 1, 'wa', '609674.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE IF NOT EXISTS `reports` (
  `r_id` int(10) NOT NULL AUTO_INCREMENT,
  `comment_id` int(20) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `reports`
--


-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE IF NOT EXISTS `results` (
  `result_id` int(10) NOT NULL AUTO_INCREMENT,
  `event_id` int(10) NOT NULL,
  `match_id` int(10) NOT NULL,
  `team1_score` varchar(20) NOT NULL,
  `team2_score` varchar(20) NOT NULL,
  `set1` varchar(10) DEFAULT NULL,
  `set2` varchar(10) DEFAULT NULL,
  `set3` varchar(10) DEFAULT NULL,
  `set4` varchar(10) DEFAULT NULL,
  `set5` varchar(10) DEFAULT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`result_id`),
  UNIQUE KEY `match_id` (`match_id`),
  KEY `event_id` (`event_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`result_id`, `event_id`, `match_id`, `team1_score`, `team2_score`, `set1`, `set2`, `set3`, `set4`, `set5`, `description`) VALUES
(6, 3, 40, '3', '2', '21-20', '20-21', '19-21', '18-21', '21-18', 'Barazan won by 3-2 sets'),
(7, 3, 41, '2', '3', '21-10', '21-11', '20-21', '20-21', '15-21', 'goa won by 3-2  sets'),
(21, 4, 43, '4', '3', NULL, NULL, NULL, NULL, NULL, 'dempo won by 4-3 goals'),
(23, 4, 44, '3', '1', NULL, NULL, NULL, NULL, NULL, 'salgaonkar sc won by 3-1 goals'),
(24, 3, 42, '2', '3', '20-21', '19-21', '21-16', '12-21', '18-21', 'harayana won the match by 3-2 sets'),
(27, 6, 49, '3', '2', '20-21', '20-21', '21-20', '20-21', '20-21', 'Dempo won by 3-2 sets'),
(28, 6, 51, '2', '3', '20-21', '20-21', '21-20', '21-19', '20-21', 'St. Xaviers won by 3-2 sets'),
(29, 2, 39, '3', '3', NULL, NULL, NULL, NULL, NULL, 'match draw'),
(30, 2, 60, '3', '3', NULL, NULL, NULL, NULL, NULL, 'match draw'),
(31, 49, 63, '239/3 (45.5)', '241/3 (46.5)', NULL, NULL, NULL, NULL, NULL, 'Sal Fighters won by 7 wickets'),
(35, 6, 50, '2', '3', '20-21', '20-21', '21-20', '21-19', '20-21', 'Dhempe won by 3-2 sets'),
(38, 6, 75, '3', '1', '9 - 11', '21 - 19', '21 - 19', '21 - 10', '0 - 0', 'GC khandola won by 3-1 sets'),
(41, 4, 83, '0', '0', NULL, NULL, NULL, NULL, NULL, 'match draw'),
(51, 1, 25, '3', '2', NULL, NULL, NULL, NULL, NULL, 'Santa Cruz Won By 3-2 goals'),
(52, 1, 71, '4', '4', NULL, NULL, NULL, NULL, NULL, 'match draw with 4-4 goals'),
(53, 1, 56, '3', '5', NULL, NULL, NULL, NULL, NULL, 'Victory Jesus Won By 5-3'),
(54, 1, 58, '0', '0', NULL, NULL, NULL, NULL, NULL, 'Goalless Draw'),
(55, 2, 105, '3', '1', NULL, NULL, NULL, NULL, NULL, 'Santa Cruz Won By 3-1 goals'),
(56, 49, 113, '240/2 (30.2)', '238/8 (50)', NULL, NULL, NULL, NULL, NULL, 'Baga won by 8 Wickets'),
(57, 49, 86, '200 (45.2)', '190 (49.2)', NULL, NULL, NULL, NULL, NULL, 'Saligao Won by 9 runs'),
(58, 62, 114, '102', '100', NULL, NULL, NULL, NULL, NULL, 'MCom won by 2 runs'),
(59, 63, 120, '102', '100', NULL, NULL, NULL, NULL, NULL, 'MCom won by 2 runs');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE IF NOT EXISTS `subscribers` (
  `subscriber_id` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(50) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  PRIMARY KEY (`subscriber_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`subscriber_id`, `password`, `name`, `dob`, `gender`, `address`, `email`, `mobile`) VALUES
('arjun@10', 'arjun@10', 'Ajun Naik', '1997-04-28', 'male', 'Bicholim', 'naikarjun10@gmail.com', '9821114112'),
('arya@10', 'arya@10', 'Shabri Shet Teli', '1998-11-06', 'female', 'Sakhlim', 'aaryateli12@gmail.com', '9923810760'),
('khush@10', 'khush@10', 'Khushboo Shetkar', '1997-04-30', 'female', 'Siolim', 'khushboo.shetkar43.ks@gmail.co', '8007014757'),
('mfc@11', 'mfc', 'virat', '1994-05-18', 'male', 'b-23,royal plaza, menkurem goa', 'virat@11', '9922114421'),
('ved@10', 'ved@10', 'Ved Parsekar', '1997-08-06', 'male', 'Morjim', 'vedparsekar@gmail.com', '9823073895'),
('vijju@10', 'vijju@10', 'Vijayendra Satarkar', '1998-11-06', 'male', 'Canacona', 'vijayendra@gmail.com', '7038471602');

-- --------------------------------------------------------

--
-- Table structure for table `sub_users`
--

CREATE TABLE IF NOT EXISTS `sub_users` (
  `subuser_id` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  PRIMARY KEY (`subuser_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_users`
--

INSERT INTO `sub_users` (`subuser_id`, `password`, `name`, `dob`, `gender`, `email`, `mobile`) VALUES
('arjun@10', 'kavvs', 'Shanaya Teli', '1997-04-28', 'male', 'kavvs@gmail.com', '9922463312'),
('audi@10', 'kavvs', 'Raam Ghotge', '1994-01-02', 'male', 'kavvs@gmail.com', '9922463312'),
('mer11', 'oooo', 'merc', '1997-09-09', 'female', 'naikarjun0010@gmail.com', '9999900000'),
('mer1q', 'oooo', 'mm', '1998-09-09', 'female', 'naikarjun0010@gmail.com', '0000099900'),
('naikk11', 'llll', 'bbbb', '1997-09-09', 'male', 'arjun@10', '9900990099'),
('nats@10', 'nats@10', 'Natasha Anvekar', '1998-11-06', 'female', 'natasha@gmail.com', '9922463321'),
('ole211', 'ooo', 'ole', '2020-08-13', 'male', 'ole@gmail.com', '9900990099'),
('q@11', 'pppp', 'qq', '1997-09-09', 'female', 'naikarjun10@gmail.com', '9988776655'),
('snape@123', 'snape123', 'Severus Snape', '1990-07-15', 'male', 'snape@gmail.com', '7798100602'),
('update', 'pppp', 'virat', '1998-09-09', 'male', 'arjun@10', '9000900099'),
('virat@18', 'pppp', 'viru', '1998-09-09', 'male', 'arjun@10', '9000900099'),
('witty@10', 'witty@10', 'Emmanuel Wiredu', '1992-04-23', 'male', 'emmanuel.yaw.wiredu@gmail.com', '9988776655');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `password` varchar(100) NOT NULL,
  `profile_pic` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `name`, `email`, `gender`, `dob`, `password`, `profile_pic`, `status`) VALUES
(1, 'goa@11', 'goa', 'goa@gmail.com', '', '0000-00-00', 'goa', '', 0),
(2, 'arjun', 'arjun', 'naikarjun0010@gmail.com', '', '0000-00-00', 'arjun', '', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`subuser_id`) REFERENCES `sub_users` (`subuser_id`),
  ADD CONSTRAINT `events_ibfk_2` FOREIGN KEY (`subscriber_id`) REFERENCES `subscribers` (`subscriber_id`);

--
-- Constraints for table `fixtures`
--
ALTER TABLE `fixtures`
  ADD CONSTRAINT `fixtures_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`);

--
-- Constraints for table `livescore`
--
ALTER TABLE `livescore`
  ADD CONSTRAINT `livescore_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`),
  ADD CONSTRAINT `livescore_ibfk_2` FOREIGN KEY (`match_id`) REFERENCES `fixtures` (`match_id`);

--
-- Constraints for table `livescorevolleyball`
--
ALTER TABLE `livescorevolleyball`
  ADD CONSTRAINT `livescorevolleyball_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`),
  ADD CONSTRAINT `livescorevolleyball_ibfk_2` FOREIGN KEY (`match_id`) REFERENCES `fixtures` (`match_id`);

--
-- Constraints for table `news_articles`
--
ALTER TABLE `news_articles`
  ADD CONSTRAINT `news_articles_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`);

--
-- Constraints for table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`);

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`),
  ADD CONSTRAINT `results_ibfk_2` FOREIGN KEY (`match_id`) REFERENCES `fixtures` (`match_id`),
  ADD CONSTRAINT `results_ibfk_3` FOREIGN KEY (`match_id`) REFERENCES `fixtures` (`match_id`),
  ADD CONSTRAINT `results_ibfk_4` FOREIGN KEY (`match_id`) REFERENCES `fixtures` (`match_id`);
