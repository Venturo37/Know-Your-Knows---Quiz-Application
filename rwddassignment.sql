-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2025 at 07:49 AM
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
-- Database: `rwddassignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `admin_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`admin_id`, `firstname`, `lastname`, `password`, `email`) VALUES
(1, 'Arley', 'Node', 'bP5=J6&i', 'anode0@infoseek.co.jp'),
(2, 'Obed', 'Durrand', 'iJ0?7\"n!lc7S$>', 'odurrand1@youtu.be'),
(5, 'Julia', 'Lodovichi', 'hH1&/y3a1\"\'@FH', 'jlodovichi4@lycos.com'),
(6, 'Raphael', 'Kellart', 'cW9#h6={PqeC9+hC', 'rkellart5@home.pl'),
(8, 'Fredericka', 'Dutch', 'nU9$|5`k*\"|H$uqb', 'fdutch7@newyorker.com'),
(9, 'Ambrosio', 'Cogdon', 'uP7!{_4nJ', 'acogdon8@aboutads.info'),
(10, 'Tildie', 'Bollini', 'dH7\\MR4L', 'tbollini9@goo.ne.jp'),
(11, 'Marjie', 'Bour', 'lR4>G<>V|fGczoc', 'mboura@canalblog.com'),
(12, 'Randene', 'Fantham', 'rU0/$G3Mc!', 'rfanthamb@mozilla.org'),
(13, 'Samara', 'Kail', 'gC1*Cp*La', 'skailc@wired.com'),
(14, 'Amye', 'Frankling', 'aC6<z<}p3r\"(Vm/', 'afranklingd@paypal.com'),
(15, 'Bud', 'Verrechia', 'zN7&g8~cn{K3}R9?', 'bverrechiae@histats.com'),
(16, 'Ella', 'Millwall', 'eK4=4*<9', 'emillwallf@aboutads.info'),
(18, 'Laure', 'Elton', 'cA8#qyR\"$', 'leltonh@flickr.com'),
(19, 'Desdemona', 'Copson', 'mI1~/U~X<ALN', 'dcopsoni@gravatar.com'),
(20, 'Maddalena', 'Pluvier', 'vM1>1Dr~B', 'mpluvierj@oaic.gov.au'),
(21, 'Kitti', 'Dixey', 'rH5_>`uL>eysxL*', 'kdixeyk@shinystat.com'),
(22, 'Minta', 'Burdass', 'pD7/xV*@', 'mburdassl@so-net.ne.jp'),
(23, 'Petronilla', 'Antonomoli', 'eF4*gZO\\Jbj', 'pantonomolim@prlog.org'),
(25, 'Zebulen', 'Pulster', 'hY8\'X{dF4Ki4w(', 'zpulstero@army.mil'),
(26, 'Morgan', 'Fedoronko', 'rY9)07jU', 'mfedoronkop@nasa.gov'),
(27, 'Edmon', 'Gaynor', 'tZ4(,xU13#|L@yc{', 'egaynorq@ucla.edu'),
(29, 'Wyatt', 'Scotchmore', 'iO8~3Kp\"', 'wscotchmores@is.gd'),
(30, 'Wiatt', 'Leavey', 'kZ9#Fi%5', 'wleaveyt@msn.com'),
(31, 'Michail', 'Nicholes', 'zZ1+eTG4148(', 'mnicholesu@sohu.com'),
(32, 'Danni', 'Pickersgill', 'vP3}L#b%.', 'dpickersgillv@irs.gov'),
(33, 'Eolanda', 'Robbie', 'lE0)Ps*d', 'erobbiew@ihg.com'),
(34, 'Arni', 'Hazel', 'zN0/.(?BT', 'ahazelx@buzzfeed.com'),
(35, 'Heidi', 'Poschel', 'fK7.XfWDC~Kw@', 'hposchely@hubpages.com'),
(36, 'Kerwin', 'Saywell', 'uG6_ppOqEMfq{', 'ksaywellz@fema.gov'),
(37, 'Lockwood', 'Scad', 'qV4\'MkGE&6M', 'lscad10@free.fr'),
(38, 'Tiebold', 'Tott', 'wK2)D@OoO', 'ttott11@smh.com.au'),
(40, 'Richardo', 'Faunt', 'zO2>szM)?wm', 'rfaunt13@nba.com'),
(41, 'Xylia', 'Duckerin', 'jI8\\3Hmop', 'xduckerin14@ftc.gov'),
(42, 'Terrijo', 'Holbie', 'nR4#)vw3$,?r', 'tholbie15@marriott.com'),
(44, 'Harbert', 'Whewell', 'tK3~+k,dz', 'hwhewell17@uiuc.edu'),
(45, 'Melly', 'Kindleside', 'rE1$jH&\'{#aP9W*5', 'mkindleside18@indiegogo.com'),
(47, 'Gisela', 'Birney', 'eG6{k\"~_j<U5nZGy', 'gbirney1a@yahoo.co.jp'),
(48, 'Nobe', 'Pummery', 'hR2`/<R6=+B', 'npummery1b@infoseek.co.jp'),
(49, 'Malvin', 'Haddon', 'pY6${R$fr8@8Gz/', 'mhaddon2c@blogs.com'),
(50, 'Capucino', 'Tapscott', 'iF7}JDbD+!58%', 'ltapscott1d@ifeng.com'),
(51, 'Admin', 'Tester', 'jason123', 'jasonAdmin@gmail.com'),
(53, 'Malvin', 'Tester', 'malvin123', 'malvin@gmail.com'),
(54, 'Justin', 'Timberlake', 'Justin123', 'justin@gmail.com'),
(55, 'Carlos', 'NicardoRs', 'carlos123', 'carlos@gmail.com'),
(56, 'Jacob', 'Kennedy', 'jacob123', 'jacob@gmail.com'),
(57, 'JohnAdmin', 'Doe', 'john123', 'johnAdmin@gmail.com'),
(58, 'Jeremy', 'Liew', 'jeremy123', 'jeremy@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tblquestion`
--

CREATE TABLE `tblquestion` (
  `question_id` int(11) NOT NULL,
  `question` varchar(250) NOT NULL,
  `a` varchar(250) NOT NULL,
  `b` varchar(250) NOT NULL,
  `c` varchar(250) NOT NULL,
  `d` varchar(250) NOT NULL,
  `correct_answer` varchar(250) NOT NULL,
  `topic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblquestion`
--

INSERT INTO `tblquestion` (`question_id`, `question`, `a`, `b`, `c`, `d`, `correct_answer`, `topic_id`) VALUES
(21, 'What is the shape of the top of planet Saturn?', 'Triangle', 'Square', 'Pentagon', 'Hexagon', 'Hexagon', 1),
(22, 'How many moons does planet Jupiter have?', '77', '78', '79', '80', '79', 1),
(23, 'Which planet in the solar system has the highest temperature during daytime?', 'Venus', 'Mercury', 'Earth', 'Mars', 'Venus', 1),
(24, 'Which planet has the vertical ring?', 'Saturn', 'Jupiter', 'Neptune', 'Uranus', 'Neptune ', 1),
(25, 'Which colour of the stars have the highest temperature?', 'Orange', 'Red', 'White', 'Blue', 'Blue ', 1),
(26, 'What is the name of our galaxy?', 'Andromeda Galaxy', 'Milky Way Galaxy', 'Whirlpool Galaxy', 'Tadpole Galaxy', 'Milky Way Galaxy', 2),
(27, 'What is the galaxy that is near to our galaxy?', 'Andromeda Galaxy', 'Milky Way Galaxy', 'Whirlpool Galaxy', 'Tadpole Galaxy', 'Andromeda Galaxy', 2),
(28, 'What is the central of our galaxy?', 'A giant star', 'A giant black hole', 'Nothing', 'A nebula', 'A giant black hole', 2),
(29, 'What is the shape of our galaxy?', 'Circular', 'Elliptical', 'Spiral', 'Irregular', 'Spiral', 2),
(30, 'How large is our galaxy?', '50000 light-years', '100000 light-years', '150000 light-years', '200000 light-years', '100000 light-years', 2),
(31, 'What is a nebula?', 'A type of galaxy', 'A cloud of gas and dust in space', 'A black hole', 'A cluster of stars', 'A cloud of gas and dust in space', 3),
(32, 'What is the primary gas found in most nebulae?', 'Oxygen', 'Carbon dioxide', 'Hydrogen', 'Helium', 'Hydrogen', 3),
(33, 'What is the main source of illumination in an emission nebula?', 'Reflected light from nearby stars', 'Light from a black hole', 'Light from a supernova explosion', 'Light emitted by ionized gas', 'Light emitted by ionized gas', 3),
(34, 'Which nebula is often called the Pillars of Creation?', 'Orion Nebula', 'Eagle Nebula', 'Trifid Nebula', 'Cat’s Eye Nebula', 'Eagle Nebula', 3),
(35, 'What is the term for a star-forming region in a nebula?', 'Stellar nursery', 'Protozone', 'Nebular forge', 'Star cradle', 'Stellar nursery', 3),
(36, 'What is the universe primarily composed of?', 'Stars and galaxies', 'Dark energy and dark matter', 'Planets and asteroids', 'Gas and dust', 'Dark energy and dark matter', 4),
(37, 'What is the estimated age of the universe?', '4.6 billion years', '10 billion years', '13.8 billion years', '20 billion years', '13.8 billion years', 4),
(38, 'What is the name of the theory that explains the origin of the universe?', 'String Theory', 'Steady-State Theory', 'Big Bang Theory', 'Nebular Theory', 'Big Bang Theory', 4),
(39, 'What is the largest structure in the universe?', 'Galaxies', 'Galaxy clusters', 'Superclusters', 'Filaments', 'Filaments', 4),
(40, 'What is a light-year?', 'The time it takes for light to travel around the Earth', 'The distance light travels in one year', 'The speed of light in space', 'A measure of time in space', 'The distance light travels in one year', 4),
(41, 'Which European city is famously known for the building Colosseum?', 'Paris', 'Athens', 'Rome', 'Istanbul', 'Rome', 5),
(42, 'Which explorer is credited with being the first European to reach India by sea, sailing around the southern tip of Africa in 1498?', 'Ferdinand Magellan', 'Christopher Columbus', 'Vasco da Gama', 'Amerigo Vespucci', 'Vasco da Gama', 5),
(43, 'The Treaty of Versailles, signed in 1919, officially ended which major war?', 'Napoleonic War', 'World War 2', 'Franco-Prussian War', 'World War 1', 'World War 1', 5),
(44, 'Which European king was known as the “Sun King” that ruled France for 72 years?', 'Louis XIV', 'Louis XVI', 'Charles V', 'Henry VIII', 'Louis XIV', 5),
(45, 'Who led the army that stopped the Muslim advance into Europe in the Battle of Tours in 732AD?', 'Charlemagne', 'William the Conqueror', 'Charles Martel', 'Otto the Great', 'Charles Martel', 5),
(46, 'Which Chinese Dynasty is credited with building the first sections of The Great Wall?', 'Tang', 'Qin', 'Ming', 'Song', 'Qin', 6),
(47, 'Which Japanese city was the capital during the Heian period and is known for its historical temple?', 'Kyoto', 'Tokyo', 'Osaka', 'Hiroshima', 'Kyoto', 6),
(48, 'The Three Kingdom Period in Korean history refers to which three kingdoms?', 'Baekje, Silla, Goguryeo', 'Goryeo, Joseon, Silla', 'Tang, Song, Yuan', 'Liao, Jin, Yuan', 'Baekje, Silla, Goguryeo', 6),
(49, 'What was the name of the Mongol-led dynasty that ruled China from 1271 to 1368?', 'Yuan Dynasty', 'Ming Dynasty', 'Song Dynasty', 'Qing Dynasty', 'Yuan Dynasty', 6),
(50, 'Who was the Korean admiral known for his victories against the Japanese navy during the Imjin War (1592-1598), particularly involving his innovative turtle ships?', 'Sejong the Great', 'Gwanggaeto the Great', 'Yi Sun-sin', 'King Yeongjo', 'Yi Sun-sin', 6),
(51, 'Which ancient civilization built the famous ziggurats in Mesopotamia?', 'Babylonians', 'Assyrians', 'Sumerians', 'Persians', 'Sumerians', 7),
(52, 'What is the name of the religious text central to Islam?', 'Torah', 'Quran', 'Bible', 'Vedas', 'Quran', 7),
(53, 'Which empire, known for its extensive trade routes and control of Jerusalem, was defeated during the First Crusade in 1099?', 'Byzantine Empire', 'Ottoman Empire', 'Seljuk Empire', 'Abbasid Caliphate', 'Seljuk Empire', 7),
(54, 'Who founded the Achaemenid Empire in the 6th century BCE, becoming one of the greatest rulers in Persian history?', 'Cyrus the Great', 'Darius I', 'Xerxes I', 'Artaxerxes', 'Cyrus the Great', 7),
(55, 'What is the name of the battle in 1258 where the Mongols sacked Baghdad, leading to the fall of the Abbasid Caliphate?', 'Battle of Ain Jalut', 'Siege of Baghdad', 'Battle of Hattin', 'Battle of Manzikert', 'Siege of Baghdad', 7),
(56, 'What is the highest mountain in the world?', 'K2', 'Mount Kilimanjaro', 'Mount Everest', 'Mount Denali', 'Mount Everest', 8),
(57, 'Which mountain range is known as the \"Roof of the World\"?', 'Andes', 'Pamirs', 'Rockies', 'Himalayas', 'Pamirs', 8),
(58, 'Which mountain range is formed by the Indian plate colliding with the Eurasian plate?', 'Andes', 'Alps', 'Rockies', 'Himalayas', 'Himalayas', 8),
(59, 'Which mountain range runs along the western coast of South America?', 'Rockies', 'Andes', 'Alps', 'Sierra Madre', 'Andes', 8),
(60, 'What is the term for the highest point of a mountain?', 'Plateau', 'Ridge', 'Summit', 'Base', 'Summit', 8),
(61, 'Which is the largest hot desert in the world?', 'Gobi Desert', 'Sahara Desert', 'Atacama Desert', 'Kalahari Desert', 'Sahara Desert', 9),
(62, 'What is the main characteristic of a desert climate?', 'High humidity', 'Extreme temperatures', 'Frequent rainfall', 'Strong winds', 'Extreme temperatures', 9),
(63, 'Which desert is located in China and Mongolia?', 'Thar Desert', 'Gobi Desert', 'Kalahari Desert', 'Namib Desert', 'Gobi Desert', 9),
(64, 'What causes the rain shadow effect leading to desert formation?', 'Proximity to oceans', 'Mountains blocking moist air', 'Flat terrain', 'Constant winds', 'Mountains blocking moist air', 9),
(65, 'Which desert is known for being the driest place on Earth?', 'Sahara', 'Kalahari', 'Atacama', 'Mojave', 'Atacama', 9),
(66, 'Which layer of soil remains frozen year-round in the tundra?', 'Topsoil', 'Bedrock', 'Permafrost', 'Loam', 'Permafrost', 10),
(67, 'What is the dominant vegetation in the tundra?', 'Large trees', 'Mosses and lichens', 'Dense shrubs', 'Grasslands', 'Mosses and lichens', 10),
(68, 'Where is Arctic tundra located?', 'Near the equator', 'Around the South Pole', 'Near the North Pole', 'In mountainous regions', 'Near the North Pole', 10),
(69, 'Which animal is commonly associated with the tundra biome?', 'Tiger', 'Polar bear', 'Kangaroo', 'Elephant', 'Polar bear', 10),
(70, 'What is a major environmental concern for tundra regions?', 'Overgrazing', 'Deforestation', 'Melting permafrost', 'Desertification', 'Melting permafrost', 10),
(71, 'Solve for x: 4x + 7 = 19', '2', '3', '4', '5', '3', 11),
(72, 'The equation 2x – 5 = 3x + 2 has x equal to:', '-7', '7', '-2', '2', '-7', 11),
(73, 'Solve for y: 3y – 8 = 2y + 4', '-12', '12', '8', '-8', '12', 11),
(74, 'If 3x + 4 = 7, what is x + 1?', '0', '1', '2', '3', '2', 11),
(75, 'Solve for x: 2x/3 = 8', '6', '12', '18', '24', '12', 11),
(76, 'The union of two sets A = {1,2} and B = {2,3} is:', '{1,2}', '{2,3}', '{1,2,3}', '{1,3}', '{1,2,3}', 12),
(77, 'The intersection of A = {1,2,3} and B = {2,3,4} is:', '{1}', '{2,3}', '{4}', '{}', '{2,3}', 12),
(78, 'If U={1,2,3,4,5} is the universal set and A = {1,2}, then the complement of A is:', '{3,4,5}', '{1,2}', '{1,3,5}', '{4,5}', '{3,4,5}', 12),
(79, 'If n(A) = 5 and n(B) = 7, and n(A ∩ B) = 3, what is n(A∪B)?', '12', '9', '10', '15', '9', 12),
(80, 'In a survey, 60 people like tea, 40 like coffee, and 20 like both. How many like only tea?', '20', '40', '30', '60', '30', 12);

-- --------------------------------------------------------

--
-- Table structure for table `tblquizattempt`
--

CREATE TABLE `tblquizattempt` (
  `attempt_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `score` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblquizattempt`
--

INSERT INTO `tblquizattempt` (`attempt_id`, `user_id`, `topic_id`, `score`) VALUES
(1, 53, 1, 4),
(12, 53, 1, 3),
(13, 53, 2, 1),
(14, 53, 1, 3),
(15, 53, 1, 5),
(16, 53, 1, 3),
(17, 53, 1, 2),
(18, 53, 1, 3),
(19, 53, 1, 3),
(20, 53, 1, 3),
(21, 53, 3, 2),
(22, 53, 3, 1),
(23, 53, 3, 2),
(24, 53, 3, 3),
(25, 53, 3, 0),
(26, 53, 1, 3),
(27, 53, 1, 2),
(28, 53, 1, 2),
(29, 53, 2, 1),
(30, 53, 4, 1),
(31, 53, 1, 3),
(32, 53, 11, 0),
(33, 53, 9, 0),
(34, 53, 9, 2),
(35, 53, 8, 1),
(36, 53, 8, 2),
(37, 53, 8, 1),
(38, 53, 8, 2),
(39, 53, 10, 3),
(40, 53, 1, 4),
(41, 53, 1, 3),
(42, 53, 1, 2),
(43, 53, 1, 4),
(44, 53, 1, 4),
(45, 53, 1, 5),
(46, 53, 1, 6),
(47, 53, 1, 2),
(48, 53, 1, 2),
(49, 53, 1, 3),
(50, 53, 2, 1),
(51, 53, 2, 1),
(52, 53, 1, 3),
(53, 53, 2, 1),
(54, 53, 2, 3),
(55, 53, 2, 1),
(56, 53, 1, 2),
(57, 53, 1, 2),
(58, 53, 4, 1),
(59, 53, 2, 1),
(60, 53, 8, 0),
(61, 53, 7, 1),
(62, 53, 11, 3),
(63, 53, 1, 3),
(64, 53, 9, 1),
(65, 53, 9, 2),
(66, 53, 4, 1),
(67, 53, 6, 1),
(68, 60, 2, 1),
(69, 53, 3, 2),
(70, 53, 1, 2),
(71, 53, 12, 2),
(72, 53, 12, 2),
(73, 53, 12, 0),
(74, 53, 12, 2),
(75, 53, 11, 3),
(76, 53, 11, 4),
(77, 53, 5, 2),
(78, 59, 6, 5),
(79, 53, 7, 3),
(80, 53, 1, 2),
(81, 53, 1, 2),
(82, 53, 3, 1),
(83, 53, 2, 1),
(84, 53, 3, 1),
(85, 53, 1, 4),
(86, 53, 1, 3),
(87, 53, 1, 3),
(88, 53, 8, 1),
(89, 53, 12, 1),
(90, 53, 2, 0),
(91, 61, 11, 2),
(92, 61, 4, 2),
(93, 64, 6, 0),
(94, 64, 5, 2),
(95, 66, 5, 0),
(96, 53, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblsubject`
--

CREATE TABLE `tblsubject` (
  `subject_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblsubject`
--

INSERT INTO `tblsubject` (`subject_id`, `name`) VALUES
(1, 'Astronomy'),
(2, 'History'),
(3, 'Geography'),
(4, 'Mathematics');

-- --------------------------------------------------------

--
-- Table structure for table `tbltopic`
--

CREATE TABLE `tbltopic` (
  `topic_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `topic_description` varchar(1000) NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbltopic`
--

INSERT INTO `tbltopic` (`topic_id`, `name`, `topic_description`, `subject_id`) VALUES
(1, 'Solar System', 'Welcome to the Solar System Quiz!  Our solar system is a vast and fascinating place, consisting of the Sun, eight planets, moons, asteroids, comets, and other celestial bodies. The planets orbit the Sun in an elliptical path, with Mercury being the closest and Neptune the farthest. Each planet has unique characteristics, from the scorching surface of Venus to the icy rings of Saturn. Beyond Neptune lies the Kuiper Belt and the mysterious Oort Cloud, home to many icy objects.  Get ready to test your knowledge about planets, moons, and space phenomena in this exciting quiz!', 1),
(2, 'Galaxy', 'Galaxies are vast systems of stars, gas, dust, and dark matter bound together by gravity. They come in various shapes and sizes, from spirals like the Milky Way to ellipticals and irregular forms. Each galaxy can contain millions to trillions of stars, along with planets, nebulae, and black holes. Scientists study galaxies to understand the universe’s structure, evolution, and origins. Ready to test your knowledge of these cosmic giants? Let’s begin the quiz.', 1),
(3, 'Nebula', 'Nebulae are vast clouds of gas and dust scattered throughout the universe, often serving as the birthplaces of stars. These cosmic structures come in various forms, from bright and colorful emission nebulae to dark and shadowy absorption nebulae. Some are remnants of dying stars, while others are regions of intense star formation. Their beauty and mystery have fascinated astronomers for centuries. How much do you know about these celestial wonders? Take this quiz to find out.', 1),
(4, 'Universe', 'The universe is vast, mysterious, and ever-expanding, containing everything from the smallest particles to the largest galaxies. It encompasses all matter, energy, space, and time, and stretches across unimaginable distances. Scientists believe it began around 13.8 billion years ago with the Big Bang, a moment of intense energy and rapid expansion. Since then, the universe has continued to evolve, with billions of stars, planets, and other celestial bodies scattered throughout. Are you ready to explore some of its wonders? Test your knowledge of this incredible cosmos in the following quiz!', 1),
(5, 'European History', 'European history is rich and diverse, spanning thousands of years and shaping much of the modern world. From the rise of ancient civilizations like the Greeks and Romans, through the Middle Ages marked by feudalism and the power of monarchies, to the Renaissance and the age of exploration that expanded Europe\'s influence globally, the continent has been at the heart of political, cultural, and scientific transformation. The industrial revolution, two World Wars, and the formation of the European Union further reshaped Europe\'s landscape, making it a key player in the global stage today.', 2),
(6, 'East Asia History', 'East Asia has a rich and complex history that spans thousands of years. It includes the rise and fall of powerful dynasties, the spread of major religions, and the development of unique cultural and political traditions. Key civilizations such as ancient China, Japan, Korea, and Vietnam shaped the region\'s history, each contributing to advancements in philosophy, science, and art. From the early dynastic periods in China to the influence of Confucianism, Buddhism, and Shintoism, East Asia’s historical timeline is marked by significant social, political, and cultural transformations. This history also includes periods of conflict, such as the Mongol invasions, the World Wars, and the Cold War, which have all influenced the modern identities of these nations.', 2),
(7, 'Middle East', 'The history of the Middle East is rich and complex, spanning thousands of years. It is often referred to as the \"cradle of civilization,\" as it was home to some of the earliest and most influential cultures in human history, including the Sumerians, Egyptians, Persians, and Phoenicians. Over time, the region saw the rise and fall of empires, such as the Roman, Byzantine, and Ottoman Empires. The spread of major world religions like Judaism, Christianity, and Islam has shaped the region’s cultural, political, and social dynamics. The modern history of the Middle East has been marked by significant conflicts, colonialism, the discovery of oil, and the ongoing struggle for peace and stability.', 2),
(8, 'Mountains', 'Mountains are natural elevations of the Earth\'s surface, typically rising steeply and often forming part of a mountain range. They are created through geological processes such as tectonic plate movements, volcanic activity, and erosion. Mountains can vary greatly in size, shape, and climate, offering diverse ecosystems and habitats. From towering peaks covered in snow to lush valleys, they play a crucial role in the Earth\'s weather patterns, biodiversity, and human culture. Let\'s test your knowledge about these majestic landforms!', 3),
(9, 'Deserts', 'Deserts are arid regions characterized by extremely low precipitation, making them some of the harshest environments on Earth. They can be hot, like the Sahara, or cold, like Antarctica. Despite their harsh conditions, deserts are home to a variety of unique plant and animal species adapted to survive with minimal water. These ecosystems are shaped by factors such as temperature, rainfall, and soil type, creating diverse landscapes ranging from sand dunes to rocky plateaus. Now, let\'s test your knowledge about these fascinating and extreme environments.', 3),
(10, 'Tundra', 'The tundra is a cold, treeless biome found in the Arctic and at high mountain elevations. Characterized by low temperatures, strong winds, and minimal precipitation, it is home to specially adapted plants and animals. The soil is often frozen, known as permafrost, which limits the growth of large vegetation. Despite its harsh conditions, the tundra supports a variety of life, including migratory birds, arctic foxes, and caribou. This unique ecosystem plays a crucial role in regulating the Earth\'s climate.', 3),
(11, 'Linear Equations', 'A linear equation is an algebraic expression that represents a straight line when graphed on a coordinate plane. It involves variables raised to the power of one and typically has the form  𝑎 𝑥 + 𝑏 = 0 ax+b=0, where  𝑎 a and  𝑏 b are constants, and  𝑥 x is the variable. The solutions to a linear equation are the values of the variable that make the equation true. Linear equations are fundamental in mathematics and are used in various real-world applications, such as calculating rates of change, predicting trends, and solving problems involving constant relationships.', 4),
(12, 'Sets and Venn Diagrams', 'A set is a collection of distinct objects, considered as an object in its own right. These objects can be anything: numbers, letters, or even other sets. In set theory, sets are typically represented by curly braces, like {1, 2, 3}.  A Venn diagram is a visual tool used to illustrate the relationships between different sets. It shows sets as circles, with overlaps representing elements that belong to multiple sets. Venn diagrams help us understand how sets relate to each other, highlighting similarities, differences, and common elements.  This quiz will test your understanding of sets and Venn diagrams, focusing on identifying set elements and interpreting their relationships.', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`user_id`, `firstname`, `lastname`, `password`, `email`) VALUES
(1, 'Rocky', 'Aronowicz2', 'aR1>xux>0/urQ4', 'raronowicz0@boston.com'),
(3, 'Bon', 'Fanshawe', 'mZ2%c|c\"A\'xvHor', 'bfanshawe2@scribd.com'),
(6, 'Remy', 'Klimsch', 'iH3!Aq,JO7pPO_~+', 'rklimsch5@domainmarket.com'),
(7, 'Danny', 'Lomb', 'tK4}2y<V=Oa', 'dlomb6@craigslist.org'),
(9, 'Johny', 'Poat', 'sK6%Gad\"\"#H1', 'jpoat8@about.me'),
(10, 'Les', 'Bouzan', 'fA3,&UMU)Te\"WQ\\', 'lbouzan9@nba.com'),
(11, 'Moyra', 'Taunton', 'mP4)dpQ%k', 'mtauntona@163.com'),
(12, 'Garald', 'Dottrell', 'aN2#`,$!j', 'gdottrellb@google.cn'),
(13, 'Celinda', 'Browell', 'gM9+jP\"Q)zmt~|G', 'cbrowellc@unblog.fr'),
(15, 'Marsha', 'Brookton', 'qJ0@pshCE#\"X', 'mbrooktone@bluehost.com'),
(16, 'Cissiee', 'Samper', 'tW2|fc\"l\'', 'csamperf@cbsnews.com'),
(17, 'Quillan', 'Yerrell', 'lY7{w>!.7Lm_+', 'qyerrellg@bizjournals.com'),
(18, 'June', 'Antonio', 'tS8@>{Z_Y|$F@z', 'jantonioh@adobe.com'),
(19, 'Madelena', 'Preston', 'uO9\'\'?+(NG$X6DPL', 'mprestoni@google.it'),
(20, 'Venus', 'Biss', 'zJ2\\C8#C+)', 'vbissj@vinaora.com'),
(21, 'Akim', 'Murrey', 'rY2|Q=9)@0\\yy*', 'amurreyk@fda.gov'),
(22, 'Wakefield', 'Bichener', 'nV5*?$\"gZ&Fl', 'wbichenerl@multiply.com'),
(23, 'Louisa', 'Giacomasso', 'vJ2=iFz4%?J@4m%', 'lgiacomassom@usatoday.com'),
(24, 'Maud', 'Antcliffe', 'eJ1+sE+<PpbP,&SJ', 'mantcliffen@domainmarket.com'),
(25, 'Holly-anne', 'Samweyes', 'sS7(apr4nDvi(_U', 'hsamweyeso@google.nl'),
(26, 'Laurent', 'Searles', 'aN1+zmLtG!Tw|R{', 'lsearlesp@ocn.ne.jp'),
(27, 'Leland', 'Curtis', 'iD2`m~C4', 'lcurtisq@youtu.be'),
(28, 'Herman', 'Pantling', 'rY4=g\"g>rPGL', 'hpantlingr@comcast.net'),
(29, 'Reube', 'Pellingar', 'dJ0#oSMq`=_/>', 'rpellingars@adobe.com'),
(30, 'Eleonora', 'Northall', 'eD3&~!bwa', 'enorthallt@freewebs.com'),
(31, 'Ruperta', 'Dongles', 'zW3\"hQd\\k>2UQG', 'rdonglesu@ocn.ne.jp'),
(32, 'Lonny', 'Siaskowski', 'nG3)V=FpUL8DCoK}', 'lsiaskowskiv@nature.com'),
(33, 'Katey', 'Bruckshaw', 'nB0/NWbf($', 'kbruckshaww@mtv.com'),
(34, 'Tonye', 'Cholerton', 'zW5=K5,Pf??4', 'tcholertonx@sina.com.cn'),
(35, 'Tibold', 'Dugdale', 'fV1<I4c|(zuO', 'tdugdaley@twitter.com'),
(36, 'Emmerich', 'Creus', 'hW9>qqMy1~Zn<93g', 'ecreusz@house.gov'),
(37, 'Vida', 'Humble', 'hS4~$u)T\\j+\'&/|', 'vhumble10@netscape.com'),
(38, 'Trudy', 'Gainsboro', 'tD3)dk=9?Keu8s~w', 'tgainsboro11@time.com'),
(39, 'Tammie', 'Greenier', 'kB6)pxARG|', 'tgreenier12@blogtalkradio.com'),
(40, 'Sansone', 'Sloan', 'cJ4\\\"2#,TD', 'ssloan13@prweb.com'),
(41, 'Vanny', 'McGlue', 'cW5?LrtSd|\"', 'vmcglue14@liveinternet.ru'),
(42, 'Collete', 'Clear', 'cY2,6IIkh{', 'cclear15@reddit.com'),
(43, 'Demetre', 'Louisot', 'dW5(_5(eI(xxCWPC', 'dlouisot16@accuweather.com'),
(44, 'Nannette', 'Hargrave', 'hS6$H_k\\,YyV$#\"O', 'nhargrave17@virginia.edu'),
(45, 'Carmine', 'Treadgall', 'vG6_\"TQsECh,', 'ctreadgall18@123-reg.co.uk'),
(46, 'Terri', 'Marklund', 'iY7)<Tqp|A', 'tmarklund19@bluehost.com'),
(47, 'Oliy', 'Macoun', 'gT9_L<gqX3kQPI=Z', 'omacoun1a@deviantart.com'),
(48, 'Dallas', 'Torrent', 'oL0%7#OpFdEQ', 'dtorrent1b@tinyurl.com'),
(49, 'Cicily', 'Tremellier', 'gB2\",G#yX2,&', 'ctremellier1c@cbsnews.com'),
(50, 'Ardene', 'Hollingsby', 'kK7{9pZxTL&8G', 'ahollingsby1d@bbc.co.uk'),
(52, 'Jackson', 'Tester', 'jackson123', 'jackson@gmail.com'),
(53, 'Jason', 'Tester', 'jason123', 'jason@gmail.com'),
(57, 'Jojo', 'Tester', 'jojo1234', 'jojo@gmail.com'),
(58, 'Derick', 'Ivan', 'ruijie123', 'chung@gmail.com'),
(59, 'Derick', 'Ivan', 'gogo', 'gogo@gmail.com'),
(60, 'Ivan', 'Rui', 'Derick123', 'yie@gmail.com'),
(61, 'EdwinWin', 'Kah', 'wun123', 'chua@gmail.com'),
(62, 'derick', 'liew', '123', 'aoppo9932@gmail.com'),
(64, 'Johnny', 'Doe', 'john123', 'john@gmail.com'),
(66, 'Benny', 'Chow', 'ben12345', 'ben@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `email_2` (`email`);

--
-- Indexes for table `tblquestion`
--
ALTER TABLE `tblquestion`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `topic_id` (`topic_id`);

--
-- Indexes for table `tblquizattempt`
--
ALTER TABLE `tblquizattempt`
  ADD PRIMARY KEY (`attempt_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `topic_id` (`topic_id`);

--
-- Indexes for table `tblsubject`
--
ALTER TABLE `tblsubject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `tbltopic`
--
ALTER TABLE `tbltopic`
  ADD PRIMARY KEY (`topic_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `tblquestion`
--
ALTER TABLE `tblquestion`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `tblquizattempt`
--
ALTER TABLE `tblquizattempt`
  MODIFY `attempt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `tblsubject`
--
ALTER TABLE `tblsubject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbltopic`
--
ALTER TABLE `tbltopic`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblquestion`
--
ALTER TABLE `tblquestion`
  ADD CONSTRAINT `tblquestion_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `tbltopic` (`topic_id`);

--
-- Constraints for table `tblquizattempt`
--
ALTER TABLE `tblquizattempt`
  ADD CONSTRAINT `tblquizattempt_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbluser` (`user_id`),
  ADD CONSTRAINT `tblquizattempt_ibfk_2` FOREIGN KEY (`topic_id`) REFERENCES `tbltopic` (`topic_id`);

--
-- Constraints for table `tbltopic`
--
ALTER TABLE `tbltopic`
  ADD CONSTRAINT `tbltopic_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `tblsubject` (`subject_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
