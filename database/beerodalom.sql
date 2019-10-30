-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2019. Ápr 09. 08:34
-- Kiszolgáló verziója: 10.1.37-MariaDB
-- PHP verzió: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `beerodalom`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `beers`
--

CREATE TABLE `beers` (
  `beer_ID` int(11) NOT NULL,
  `brewery_ID` int(11) NOT NULL,
  `glass_ID` int(11) NOT NULL,
  `category_ID` int(11) NOT NULL,
  `beer_name` varchar(100) NOT NULL,
  `taste` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `foam` varchar(50) NOT NULL,
  `smell` varchar(50) NOT NULL,
  `ABV` float NOT NULL,
  `IBU` int(3) NOT NULL,
  `EBC` int(3) NOT NULL,
  `capacity` float NOT NULL,
  `serving_temp` varchar(15) NOT NULL,
  `overall_taste_point` int(11) NOT NULL,
  `overall_color_point` int(11) NOT NULL,
  `overall_foam_point` int(11) NOT NULL,
  `overall_smell_point` int(11) NOT NULL,
  `overall_rating_point` int(11) NOT NULL,
  `rating_count` int(11) NOT NULL,
  `all_like` int(11) NOT NULL,
  `all_unlike` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `add_tmp` date NOT NULL,
  `making_tmp` date NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `beers`
--

INSERT INTO `beers` (`beer_ID`, `brewery_ID`, `glass_ID`, `category_ID`, `beer_name`, `taste`, `color`, `foam`, `smell`, `ABV`, `IBU`, `EBC`, `capacity`, `serving_temp`, `overall_taste_point`, `overall_color_point`, `overall_foam_point`, `overall_smell_point`, `overall_rating_point`, `rating_count`, `all_like`, `all_unlike`, `image`, `add_tmp`, `making_tmp`, `description`) VALUES
(1, 1, 6, 203, 'Hathárom', 'édeskés, keserű kávés és kekszes', 'Fekete', 'enyhén habzó ', ' kakaópor és a cikória kávé', 4.9, 25, 74, 0.5, '10-13 °C', 79, 69, 61, 47, 9, 1, 0, 1, 'Hathárom.png', '2019-02-27', '2019-02-22', 'A Wembley Stadionban lejátszott legendás futballmérkőzés ihlette Hathárom arra vállalkozik, hogy ne csak fociban, de sörben is odacsapjon az angoloknak. Ezzel a könnyű, kellemesen pörkölt ízeket hozó, halványbarna, kekszesen-malátás angol porterrel Hidegkuti, Puskás, Bozsik és az Aranycsapat előtt tisztelgünk, akik legyőzték a hazai pályán 90 éve veretlen Angliát.'),
(2, 1, 11, 192, 'Esthajnal \'18', 'csokis, kávés, szilvás enyhén füstös', 'Fekete', 'kevés, sötét', 'füstölt szilva', 10.5, 62, 350, 0.33, '14-16 °C', 65, 67, 86, 81, 8, 1, 0, 1, 'Esthajnal \'18.png', '2019-02-27', '2018-12-01', 'Limitált kiadású, évente megújuló Esthajnal söreink nem csupán ünnepi meglepetések, de télnyitó desszertsörök is egyben. Az Esthajnal-sorozat hatodik darabjában, az Esthajnal ’18-ban a békési aszaltszilva füstössége találkozik a pörkölt árpa és maláta kávés-karamellás ízkarakterével, amelyet egy krémes, bársonyosan lágy russian imprerial stout foglal keretbe. Az Esthajnal \'18-at sörfőzőmesterünk úgy alkotta meg, hogy az ünnepek alatt mindig legyen jó ok egy meghitt, karácsonyi sörözéshez.'),
(3, 1, 11, 192, 'Rettegett Iván', 'csokis, pörköltmagvas ', 'Fekete', 'sötét és tartós', 'sűrű, pörköltes', 9, 60, 270, 0.33, '12-14 °C', 0, 0, 0, 0, 0, 0, 0, 0, 'Rettegett Iván.png', '2019-02-27', '2019-02-01', 'Ez a sörtípus több évszázados kísérletezés, tudás és játékosság eredménye, melyet a 18. századi brit sörfőzők az orosz cári udvar részére készítettek. Ehhez a gazdagon fűszerezett, kirobbanóan zamatos már-már átláthatatlanul fekete sörhöz négyféle malátát adtunk, amik tökéletes harmóniát alkotnak a füstös, a csokoládés és a krémesen karamellás ízkarakterekkel.'),
(4, 1, 3, 226, 'Ogre', ' Lágy, kevés keserűség, édes maláta', 'Borostyánsárga', 'nem tartós', 'Pilzeni, komlós', 5.6, 33, 13, 0.5, '7-12 °C', 0, 0, 0, 0, 0, 0, 0, 0, 'Ogre.png', '2019-02-27', '2005-01-01', 'A Szent András Sörfőzde egyik zászlóshajójának számító Ogre markánsan komlózott pilzeni sörélményt garantál, amelyhez határozott alkoholtartalom és izgalmas aroma párosul. Így született meg a tradicionális, cseh ivósör jellegű mestermunka. Nevét az ötletindítóról, Marosvári „Ogre” Lászlóról, az ország egyik leghíresebb sörszakértőjéről kapta, aki azóta márkasörözőnk, az Ogre bácsi Söröző szakértő vezetője is egyben.');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `beers_ratings`
--

CREATE TABLE `beers_ratings` (
  `beer_rating_ID` int(11) NOT NULL,
  `profile_ID` int(11) NOT NULL,
  `beer_ID` int(11) NOT NULL,
  `taste_point` int(3) NOT NULL,
  `color_point` int(3) NOT NULL,
  `foam_point` int(3) NOT NULL,
  `smell_point` int(3) NOT NULL,
  `overall_point` int(2) NOT NULL,
  `like_unlike` int(1) NOT NULL,
  `rating_tmp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(100) NOT NULL,
  `opinion` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `beers_ratings`
--

INSERT INTO `beers_ratings` (`beer_rating_ID`, `profile_ID`, `beer_ID`, `taste_point`, `color_point`, `foam_point`, `smell_point`, `overall_point`, `like_unlike`, `rating_tmp`, `image`, `opinion`) VALUES
(1, 2, 1, 79, 69, 61, 47, 9, 0, '2019-04-08 23:35:56', '2 Navigation tile 484x967 jpg.jpg', 'sdfdsggsfdgsdfgfdsgdfgdsfgsdfgddfgsf'),
(2, 2, 2, 65, 67, 86, 81, 8, 0, '2019-04-08 23:37:00', '4k6-1920x1080.jpg', 'cvbncvbncvbnbvncvbnbvnvcbncvbncbvncvb');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `breweries`
--

CREATE TABLE `breweries` (
  `brewery_ID` int(11) NOT NULL,
  `country_ID` int(11) NOT NULL,
  `brewery_name` varchar(100) NOT NULL,
  `place` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `website` varchar(80) NOT NULL,
  `facebook_link` varchar(80) NOT NULL,
  `instagram_name` varchar(60) NOT NULL,
  `twitter_name` varchar(60) NOT NULL,
  `introduced_date` date NOT NULL,
  `adding_tmp` date NOT NULL,
  `beers_count` int(4) NOT NULL,
  `rating_overall` int(11) NOT NULL,
  `rating_count` int(11) NOT NULL,
  `all_like` int(11) NOT NULL,
  `all_unlike` int(11) NOT NULL,
  `description` varchar(750) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `breweries`
--

INSERT INTO `breweries` (`brewery_ID`, `country_ID`, `brewery_name`, `place`, `image`, `website`, `facebook_link`, `instagram_name`, `twitter_name`, `introduced_date`, `adding_tmp`, `beers_count`, `rating_overall`, `rating_count`, `all_like`, `all_unlike`, `description`, `active`) VALUES
(1, 97, 'Békésszentandrási Szent András Sörfőzde', 'Békésszentandrás, Szent András u. 11, 5561', 'SzentAndrasSorfozde.png', 'https://szentandrassorfozde.hu/', 'SzentAndrasSorfozde', 'szentandrassorfozde', '', '1993-01-01', '2019-02-26', 24, 0, 0, 0, 0, 'A Szent András Sörfőzde több mint 20 éve gyárt kiemelkedő minőségű magyar kézműves sörkülönlegességeket. 2011-ben az év sörfőzdéjének választott békésszentandrási kisüzem nem titkolt célja, hogy a sörivást valódi gasztronómiai eseménnyé nemesítse. A főzde meglehetősen erős karakteres komlós, illetve gyümölcsös söreinek utánozhatatlansága a hamisítatlan, lágy Szent András ízvilágban és a békésszentandrási víz meghatározó jellegében rejlik. A főzde széles sörkínálatában a valódi gyümölccsel készült söröktől kezdve az erőteljes, közel 10 %-os fekete sörökig minden megtalálható.', 1),
(2, 97, 'MONYO Brewing Co.', 'Budapest, Maglódi út 47., 1106', 'MONYO Brewing Co..png', 'http://monyobrewing.com/', 'MonyoBrewingCo', 'monyobrewing', '', '2014-01-01', '2019-02-26', 52, 10, 1, 0, 1, 'A MONYO Brewing Co. sörfőzdéjét 2014-ben alapította Pein Ádám, Németh Antal és Elek Zoltán alapította. Egyike annak a négy kisüzemi hazai sörfőzdének, amelyek összefogásából létrejött 2016 nyarán a Főzdepark az egykori Királyi sörfőzde ipari parkjában. 2015-ben a főzde elnyerte az \"Év sörfőzdéje\" díjat. 2016-ban az Alltech Commonwealth versenyén a hazai sörfőzdék 27 kategóriában indultak, ebből 16 érmet sikerült szerezniük összesen, a MONYO ebből 7 érmet szerzett.', 1),
(3, 97, 'Mad Scientist', 'Budapest, Maglódi út 47, 1106', 'Mad Scientist.png', 'http://madscientist.hu/', 'madscientistbeer', 'madscientistbeer', '', '2016-01-01', '2019-02-26', 62, 10, 1, 0, 1, 'A Mad Scientist budapesti kisüzemi sörfőzdét 2016-ban alapította a mesterhármas, Tarján Csaba, Szilágyi Tamás és Závodszky Gergő. 2016 áprilisában lepték meg először a közönséget söreikkel. Ekkor négy nedűd dobtak piacra, azóta pedig már számtalan főzetet dobtak piacra. A bezsebelt díjak egyenesen arányosan nőnek a megjelent sörök számával.', 1),
(4, 66, 'Põhjala Brewery', 'Peetri 5 10415 Tallinn', 'Põhjala Brewery.png', 'https://pohjalabeer.com/', 'pohjalabeer', 'pohjalabeer', 'pohjalabeer', '2011-12-01', '2019-02-26', 80, 8, 0, 0, 0, 'Põhjala was founded in Tallinn, Estonia at the end of 2011 by four Estonian beer enthusiasts and home brewers. Soon thereafter the company was joined by a Scottish head brewer, Chris Pilkington, with a few years of Brewdog experience under his belt. The first Põhjala beer, Öö Imperial Baltic Porter, was released in the beginning of 2013 and for most of that year, our beers were contract-brewed in other breweries’ production facilities while we prepared to open our own.', 1),
(5, 155, 'Heineken', 'Tweede Weteringplantsoen 21 1017 ZD Amsterdam,', 'Heineken.png', 'https://www.heineken.com', 'heineken', 'heineken', 'heineken', '1863-12-16', '2019-02-26', 32, 0, 0, 0, 0, 'Heineken N.V. is a Dutch brewing company, founded in 1864 by Gerard Adriaan Heineken in Amsterdam. As of 2017, Heineken owns over 165 breweries in more than 70 countries. It produces 250 international, regional, local and speciality beers and ciders and employs approximately 73,000 people. With an annual beer production of 188.3 million hectoliters in 2015, and global revenues of EUR 20,511 billions in 2015, Heineken N.V. is the number one brewer in Europe and one of the largest brewers by volume in the world.', 1),
(6, 56, 'Carlsberg Group', '100 Ny Carlsberg Vej 1799 Copenhagen V Denmark', 'Carlsberg Group.png', 'https://www.carlsberg.com/', 'Carlsberg', 'carlsberg', 'carlsberggroup', '1847-01-01', '2019-02-26', 304, 0, 0, 0, 0, 'Carlsberg A/S is a global brewer. Founded in 1847 by J. C. Jacobsen, the company\'s headquarters is located in Copenhagen, Denmark. Since Jacobsen\'s death in 1887, the majority owner of the company has been the Carlsberg Foundation. The company\'s flagship brand is Carlsberg (named after Jacobsen\'s son Carl). It also brews Tuborg, Kronenbourg, Somersby cider, Russia\'s best-selling beer Baltika, Belgian Grimbergen abbey beers, and more than 500 local beers.', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `brewery_ratings`
--

CREATE TABLE `brewery_ratings` (
  `brewery_rating_ID` int(11) NOT NULL,
  `profile_ID` int(11) NOT NULL,
  `brewery_ID` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `rating` int(2) NOT NULL,
  `like_unlike` int(1) NOT NULL,
  `rating_tmp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `opinion` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `brewery_ratings`
--

INSERT INTO `brewery_ratings` (`brewery_rating_ID`, `profile_ID`, `brewery_ID`, `image`, `rating`, `like_unlike`, `rating_tmp`, `opinion`) VALUES
(1, 2, 2, '4k6-1920x1080.jpg', 10, 0, '2019-04-08 23:41:16', 'fdsfsfdsfsdfdsfdsfdsfsdfsdf'),
(2, 2, 3, '4k6-1920x1080.jpg', 10, 0, '2019-04-08 23:42:12', 'fdsfdsfsdfdsf');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `categories`
--

CREATE TABLE `categories` (
  `category_ID` int(11) NOT NULL,
  `category_name` varchar(60) NOT NULL,
  `parent` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `categories`
--

INSERT INTO `categories` (`category_ID`, `category_name`, `parent`) VALUES
(1, 'Ale', 0),
(2, 'Lager', 0),
(3, 'Spontán', 0),
(4, 'Hibrid', 0),
(5, 'Alkoholmentes', 0),
(6, 'Gluténmentes', 0),
(7, 'Egyéb', 0),
(8, 'Adambier', 1),
(9, 'American Pale Wheat Ale', 1),
(10, 'American Wild Ale', 1),
(11, 'Australian Sparkling Ale', 1),
(12, 'Barley Wine', 1),
(13, 'Belgian Ale', 1),
(14, 'Bière de Champagne / Bière Brut', 1),
(15, 'Bière de Garde', 1),
(16, 'Bière de Mars', 1),
(17, 'Black & Tan', 1),
(18, 'Blonde Ale', 1),
(19, 'Brown Ale', 1),
(20, 'Burton Ale', 1),
(21, 'Cream Ale', 1),
(22, 'Dampfbier', 1),
(23, 'Dark Ale', 1),
(24, 'Dark Ale', 1),
(25, 'English Bitter', 1),
(26, 'English Mild Ale', 1),
(27, 'Extra Special / Strong Bitter', 1),
(28, 'Golden Ale', 1),
(29, 'Grisette', 1),
(30, 'Gruit / Ancient Herbed Ale', 1),
(31, 'Grätzer / Grodziskie', 1),
(32, 'Italian Grape Ale', 1),
(33, 'Kölsch', 1),
(34, 'Lichtenhainer', 1),
(35, 'Mild', 1),
(36, 'Mumme', 1),
(37, 'Old Ale', 1),
(38, 'Pale Ale', 1),
(39, 'Patersbier', 1),
(40, 'Red Ale', 1),
(41, 'Roggenbier', 1),
(42, 'Rye Beer', 1),
(43, 'Rye Wine', 1),
(44, 'Sahti', 1),
(45, 'Saison / Farmhouse Ale', 1),
(46, 'Scotch Ale / Wee Heavy', 1),
(47, 'Scottish Export Ale', 1),
(48, 'Sour Ale', 1),
(49, 'Strong Ale', 1),
(50, 'Table Beer', 1),
(51, 'Traditional Ale', 1),
(52, 'Wheat beer', 1),
(53, 'Winter Ale', 1),
(54, 'Winter Warmer', 1),
(55, 'Witbier', 1),
(56, 'Amber Lager', 2),
(57, 'American Amber / Red Lager', 2),
(58, 'American Light Lager', 2),
(59, 'Bock', 2),
(60, 'Dark Lager', 2),
(61, 'Dunkel Lager', 2),
(62, 'Euro Dark Lager', 2),
(63, 'Euro Lager', 2),
(64, 'Euro Strong Lager', 2),
(65, 'Festbier', 2),
(66, 'Happoshu', 2),
(67, 'Hard Seltzer', 2),
(68, 'IPL (India Pale Lager)', 2),
(69, 'Japanese Rice Lager', 2),
(70, 'Kellerbier / Zwickelbier', 2),
(71, 'Munich Dunkel Lager', 2),
(72, 'Märzen', 2),
(73, 'North American Adjunct Lager', 2),
(74, 'Pale Lager', 2),
(75, 'Rauchbier', 2),
(76, 'Red Lager', 2),
(77, 'Schwarzbier', 2),
(78, 'Vienna Lager', 2),
(79, 'Winter Lager', 2),
(80, 'Zoigl', 2),
(81, 'Lambic', 3),
(82, 'California Common', 4),
(83, 'Kentucky Common', 4),
(84, 'Smoked Beer', 4),
(85, 'Steam Beer', 4),
(86, 'Cider', 7),
(87, 'Fruit Beer', 7),
(88, 'Ginger Beer', 7),
(89, 'Honey Beer', 7),
(90, 'Kombucha', 7),
(91, 'Kvass', 7),
(92, 'Malt Beer', 7),
(93, 'Malt Liquor ', 7),
(94, 'Pumpkin / Yam Beer', 7),
(95, 'Root Beer', 7),
(96, 'Shandy / Radler', 7),
(97, 'Specialty Grain', 7),
(98, 'Spiced / Herbed Beer', 7),
(99, 'American Barley Wine', 12),
(100, 'English Barley Wine', 12),
(101, 'Other Barley Wine', 12),
(102, 'Abbey', 13),
(103, 'Amber', 13),
(104, 'Belgian Strong Dark Ale', 13),
(105, 'Belgian Strong Golden Ale', 13),
(106, 'Blond', 13),
(107, 'Dubbel', 13),
(108, 'Flemish red', 13),
(109, 'Quadrupel', 13),
(110, 'Trappist', 13),
(111, 'Tripel', 13),
(112, ' English Brown Ale', 19),
(113, 'American Brown Ale', 19),
(114, 'Belgian Brown Ale', 19),
(115, 'Imperial / Double Brown Ale', 19),
(116, 'Other Brown Ale', 19),
(117, 'Porter', 23),
(118, 'Stout', 23),
(119, 'Altbier', 38),
(120, 'American Pale Ale', 38),
(121, 'American Pale Wheat Ale', 38),
(122, 'Australian Pale Ale', 38),
(123, 'Belgian Pale Ale', 38),
(124, 'English Bitter', 38),
(125, 'English Pale Ale', 38),
(126, 'IPA', 38),
(127, 'International Pale Ale', 38),
(128, 'New England Pale Ale', 38),
(129, 'New Zealand Pale Ale', 38),
(130, 'Saison', 38),
(131, 'Scotch Ale', 38),
(132, 'Berliner Weisse', 52),
(133, 'Dunkel Wheat beer', 52),
(134, 'Dunkelweizen', 52),
(135, 'Hefeweizen', 52),
(136, 'Hefeweizen Light / Leicht', 52),
(137, 'Kristallweizen', 52),
(138, 'Other Wheat Beer', 52),
(139, 'Weizenbock', 52),
(140, 'White beer', 52),
(141, 'American Strong Ale', 49),
(142, 'English Strong Ale', 49),
(143, 'Other Strong Ale', 49),
(144, 'American Amber / Red Red Ale', 40),
(145, 'Flemish Red Ale', 40),
(146, 'Imperial / Double Red Ale', 40),
(147, 'Irish Red Ale', 40),
(148, 'Other Red Ale', 40),
(149, 'Sour Ale', 48),
(150, 'Sour Berliner Weisse', 48),
(151, 'Sour Farmhouse IPA', 48),
(152, 'Sour Flanders Oud Bruin', 48),
(153, 'Sour Flanders Red Ale', 48),
(154, 'Sour Fruited', 48),
(155, 'Sour Gose', 48),
(156, 'Doppelbock', 59),
(157, 'Eisbock', 59),
(158, 'Maibock / Heller (Helles) / Lentebock', 59),
(159, 'Single / Traditional', 59),
(160, 'Weizenbock', 59),
(161, 'Dortmunder / Export', 74),
(162, 'Dry Lager', 74),
(163, 'Helles', 74),
(164, 'Pilsner', 74),
(165, 'Spetial', 74),
(166, 'Faro', 81),
(167, 'Framboise', 81),
(168, 'Fruit Lambic', 81),
(169, 'Gueuze', 81),
(170, 'Kriek', 81),
(171, 'Traditional Lambic', 81),
(172, 'Dry Cider', 86),
(173, 'Herbed / Spiced / Hopped Cider', 86),
(174, 'Ice / Applewine Cider', 86),
(175, 'Other Cider', 86),
(176, 'Other Fruit Cider', 86),
(177, 'Perry Cider', 86),
(178, 'Sweet Cider', 86),
(179, 'Mead Beer', 7),
(180, 'American Imperial / Double Stout', 118),
(181, 'American Stout', 118),
(182, 'Chocolate Stout', 118),
(183, 'Coffee Stout', 118),
(184, 'Dry Stout', 118),
(185, 'English Stout', 118),
(186, 'Foreign / Export Stout', 118),
(187, 'Imperial / Double Stout', 118),
(188, 'Imperial Stout', 118),
(189, 'Milk Stout', 118),
(190, 'Oatmeal Stout', 118),
(191, 'Oyster Stout', 118),
(192, 'Russian Imperial Stout', 118),
(193, 'Imperial / Double White Stout', 118),
(194, 'Imperial Milk / Sweet Stout', 118),
(195, 'Imperial Oatmeal Stout', 118),
(196, 'Irish Dry Stout', 118),
(197, 'Milk / Sweet Stout', 118),
(198, 'Other Stout', 118),
(199, 'White Stout', 118),
(200, 'American Porter', 117),
(201, 'Baltic Porter', 117),
(202, 'Coffee Porter', 117),
(203, 'English Porter', 117),
(204, 'Imperial / Double Porter', 117),
(205, 'Other Porter', 117),
(206, 'American IPA', 126),
(207, 'Belgian IPA', 126),
(208, 'Black / Cascadian Dark Ale IPA', 126),
(209, 'Brown IPA', 126),
(210, 'Brut IPA', 126),
(211, 'English IPA', 126),
(212, 'Imperial / Double Black IPA', 126),
(213, 'Imperial / Double IPA', 126),
(214, 'Imperial / Double New England IPA', 126),
(215, 'International IPA', 126),
(216, 'Milkshake IPA', 126),
(217, 'New England IPA', 126),
(218, 'Red IPA', 126),
(219, 'Rye IPA', 126),
(220, 'Session / India Session Ale IPA', 126),
(221, 'Triple IPA', 126),
(222, 'White IPA', 126),
(223, 'Czech Pilsner', 164),
(224, 'German Pilsner', 164),
(225, 'Imperial / Double Pilsner', 164),
(226, 'Other Pilsner', 164),
(227, 'Braggot', 179),
(228, 'Cyser', 179),
(229, 'Melomel', 179),
(230, 'Metheglin', 179),
(231, 'Other', 179),
(232, 'Pyment', 179);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `confirm`
--

CREATE TABLE `confirm` (
  `confirm_ID` int(11) NOT NULL,
  `profile_ID` int(11) NOT NULL,
  `confirm_key` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `confirm`
--

INSERT INTO `confirm` (`confirm_ID`, `profile_ID`, `confirm_key`) VALUES
(1, 2, 'df2cd7104536553afde9f7d66133d578eccb4606');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `countries`
--

CREATE TABLE `countries` (
  `country_ID` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL,
  `country_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `countries`
--

INSERT INTO `countries` (`country_ID`, `country_code`, `country_name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'DS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CG', 'Congo'),
(50, 'CK', 'Cook Islands'),
(51, 'CR', 'Costa Rica'),
(52, 'HR', 'Croatia (Hrvatska)'),
(53, 'CU', 'Cuba'),
(54, 'CY', 'Cyprus'),
(55, 'CZ', 'Czech Republic'),
(56, 'DK', 'Denmark'),
(57, 'DJ', 'Djibouti'),
(58, 'DM', 'Dominica'),
(59, 'DO', 'Dominican Republic'),
(60, 'TP', 'East Timor'),
(61, 'EC', 'Ecuador'),
(62, 'EG', 'Egypt'),
(63, 'SV', 'El Salvador'),
(64, 'GQ', 'Equatorial Guinea'),
(65, 'ER', 'Eritrea'),
(66, 'EE', 'Estonia'),
(67, 'ET', 'Ethiopia'),
(68, 'FK', 'Falkland Islands (Malvinas)'),
(69, 'FO', 'Faroe Islands'),
(70, 'FJ', 'Fiji'),
(71, 'FI', 'Finland'),
(72, 'FR', 'France'),
(73, 'FX', 'France, Metropolitan'),
(74, 'GF', 'French Guiana'),
(75, 'PF', 'French Polynesia'),
(76, 'TF', 'French Southern Territories'),
(77, 'GA', 'Gabon'),
(78, 'GM', 'Gambia'),
(79, 'GE', 'Georgia'),
(80, 'DE', 'Germany'),
(81, 'GH', 'Ghana'),
(82, 'GI', 'Gibraltar'),
(83, 'GK', 'Guernsey'),
(84, 'GR', 'Greece'),
(85, 'GL', 'Greenland'),
(86, 'GD', 'Grenada'),
(87, 'GP', 'Guadeloupe'),
(88, 'GU', 'Guam'),
(89, 'GT', 'Guatemala'),
(90, 'GN', 'Guinea'),
(91, 'GW', 'Guinea-Bissau'),
(92, 'GY', 'Guyana'),
(93, 'HT', 'Haiti'),
(94, 'HM', 'Heard and Mc Donald Islands'),
(95, 'HN', 'Honduras'),
(96, 'HK', 'Hong Kong'),
(97, 'HU', 'Hungary'),
(98, 'IS', 'Iceland'),
(99, 'IN', 'India'),
(100, 'IM', 'Isle of Man'),
(101, 'ID', 'Indonesia'),
(102, 'IR', 'Iran (Islamic Republic of)'),
(103, 'IQ', 'Iraq'),
(104, 'IE', 'Ireland'),
(105, 'IL', 'Israel'),
(106, 'IT', 'Italy'),
(107, 'CI', 'Ivory Coast'),
(108, 'JE', 'Jersey'),
(109, 'JM', 'Jamaica'),
(110, 'JP', 'Japan'),
(111, 'JO', 'Jordan'),
(112, 'KZ', 'Kazakhstan'),
(113, 'KE', 'Kenya'),
(114, 'KI', 'Kiribati'),
(115, 'KP', 'Korea, Democratic People\'s Republic of'),
(116, 'KR', 'Korea, Republic of'),
(117, 'XK', 'Kosovo'),
(118, 'KW', 'Kuwait'),
(119, 'KG', 'Kyrgyzstan'),
(120, 'LA', 'Lao People\'s Democratic Republic'),
(121, 'LV', 'Latvia'),
(122, 'LB', 'Lebanon'),
(123, 'LS', 'Lesotho'),
(124, 'LR', 'Liberia'),
(125, 'LY', 'Libyan Arab Jamahiriya'),
(126, 'LI', 'Liechtenstein'),
(127, 'LT', 'Lithuania'),
(128, 'LU', 'Luxembourg'),
(129, 'MO', 'Macau'),
(130, 'MK', 'Macedonia'),
(131, 'MG', 'Madagascar'),
(132, 'MW', 'Malawi'),
(133, 'MY', 'Malaysia'),
(134, 'MV', 'Maldives'),
(135, 'ML', 'Mali'),
(136, 'MT', 'Malta'),
(137, 'MH', 'Marshall Islands'),
(138, 'MQ', 'Martinique'),
(139, 'MR', 'Mauritania'),
(140, 'MU', 'Mauritius'),
(141, 'TY', 'Mayotte'),
(142, 'MX', 'Mexico'),
(143, 'FM', 'Micronesia, Federated States of'),
(144, 'MD', 'Moldova, Republic of'),
(145, 'MC', 'Monaco'),
(146, 'MN', 'Mongolia'),
(147, 'ME', 'Montenegro'),
(148, 'MS', 'Montserrat'),
(149, 'MA', 'Morocco'),
(150, 'MZ', 'Mozambique'),
(151, 'MM', 'Myanmar'),
(152, 'NA', 'Namibia'),
(153, 'NR', 'Nauru'),
(154, 'NP', 'Nepal'),
(155, 'NL', 'Netherlands'),
(156, 'AN', 'Netherlands Antilles'),
(157, 'NC', 'New Caledonia'),
(158, 'NZ', 'New Zealand'),
(159, 'NI', 'Nicaragua'),
(160, 'NE', 'Niger'),
(161, 'NG', 'Nigeria'),
(162, 'NU', 'Niue'),
(163, 'NF', 'Norfolk Island'),
(164, 'MP', 'Northern Mariana Islands'),
(165, 'NO', 'Norway'),
(166, 'OM', 'Oman'),
(167, 'PK', 'Pakistan'),
(168, 'PW', 'Palau'),
(169, 'PS', 'Palestine'),
(170, 'PA', 'Panama'),
(171, 'PG', 'Papua New Guinea'),
(172, 'PY', 'Paraguay'),
(173, 'PE', 'Peru'),
(174, 'PH', 'Philippines'),
(175, 'PN', 'Pitcairn'),
(176, 'PL', 'Poland'),
(177, 'PT', 'Portugal'),
(178, 'PR', 'Puerto Rico'),
(179, 'QA', 'Qatar'),
(180, 'RE', 'Reunion'),
(181, 'RO', 'Romania'),
(182, 'RU', 'Russian Federation'),
(183, 'RW', 'Rwanda'),
(184, 'KN', 'Saint Kitts and Nevis'),
(185, 'LC', 'Saint Lucia'),
(186, 'VC', 'Saint Vincent and the Grenadines'),
(187, 'WS', 'Samoa'),
(188, 'SM', 'San Marino'),
(189, 'ST', 'Sao Tome and Principe'),
(190, 'SA', 'Saudi Arabia'),
(191, 'SN', 'Senegal'),
(192, 'RS', 'Serbia'),
(193, 'SC', 'Seychelles'),
(194, 'SL', 'Sierra Leone'),
(195, 'SG', 'Singapore'),
(196, 'SK', 'Slovakia'),
(197, 'SI', 'Slovenia'),
(198, 'SB', 'Solomon Islands'),
(199, 'SO', 'Somalia'),
(200, 'ZA', 'South Africa'),
(201, 'GS', 'South Georgia South Sandwich Islands'),
(202, 'SS', 'South Sudan'),
(203, 'ES', 'Spain'),
(204, 'LK', 'Sri Lanka'),
(205, 'SH', 'St. Helena'),
(206, 'PM', 'St. Pierre and Miquelon'),
(207, 'SD', 'Sudan'),
(208, 'SR', 'Suriname'),
(209, 'SJ', 'Svalbard and Jan Mayen Islands'),
(210, 'SZ', 'Swaziland'),
(211, 'SE', 'Sweden'),
(212, 'CH', 'Switzerland'),
(213, 'SY', 'Syrian Arab Republic'),
(214, 'TW', 'Taiwan'),
(215, 'TJ', 'Tajikistan'),
(216, 'TZ', 'Tanzania, United Republic of'),
(217, 'TH', 'Thailand'),
(218, 'TG', 'Togo'),
(219, 'TK', 'Tokelau'),
(220, 'TO', 'Tonga'),
(221, 'TT', 'Trinidad and Tobago'),
(222, 'TN', 'Tunisia'),
(223, 'TR', 'Turkey'),
(224, 'TM', 'Turkmenistan'),
(225, 'TC', 'Turks and Caicos Islands'),
(226, 'TV', 'Tuvalu'),
(227, 'UG', 'Uganda'),
(228, 'UA', 'Ukraine'),
(229, 'AE', 'United Arab Emirates'),
(230, 'GB', 'United Kingdom'),
(231, 'US', 'United States'),
(232, 'UM', 'United States minor outlying islands'),
(233, 'UY', 'Uruguay'),
(234, 'UZ', 'Uzbekistan'),
(235, 'VU', 'Vanuatu'),
(236, 'VA', 'Vatican City State'),
(237, 'VE', 'Venezuela'),
(238, 'VN', 'Vietnam'),
(239, 'VG', 'Virgin Islands (British)'),
(240, 'VI', 'Virgin Islands (U.S.)'),
(241, 'WF', 'Wallis and Futuna Islands'),
(242, 'EH', 'Western Sahara'),
(243, 'YE', 'Yemen'),
(244, 'ZR', 'Zaire'),
(245, 'ZM', 'Zambia'),
(246, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `friends`
--

CREATE TABLE `friends` (
  `friend_ID` int(11) NOT NULL,
  `initiator_ID` int(11) NOT NULL,
  `acceptor_ID` int(11) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `glasses`
--

CREATE TABLE `glasses` (
  `glass_ID` int(11) NOT NULL,
  `glass_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `glasses`
--

INSERT INTO `glasses` (`glass_ID`, `glass_type`) VALUES
(1, 'Weizenbier'),
(2, 'Pilsner'),
(3, 'Footed Pilsner'),
(4, 'Tulip Pint'),
(5, 'Conical Pint'),
(6, 'Nonic Pint'),
(7, 'Willi Becher'),
(8, 'Stange'),
(9, 'Flute'),
(10, 'Pokal'),
(11, 'Snifter'),
(12, 'Goblet'),
(13, 'Chalice'),
(14, 'Oversized Wine'),
(15, 'Tulip'),
(16, 'Thistle'),
(17, 'Tumbler'),
(18, 'Hopside Down'),
(19, 'Yard'),
(20, 'Boot'),
(21, 'Stein'),
(22, 'Dimpled Mug'),
(23, 'Tankard'),
(24, 'Oktoberfest Mug');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `persons`
--

CREATE TABLE `persons` (
  `person_ID` int(11) NOT NULL,
  `country_ID` int(11) NOT NULL,
  `birth_date` date NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `check_question` varchar(60) NOT NULL,
  `check_answer` varchar(60) NOT NULL,
  `sex` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `persons`
--

INSERT INTO `persons` (`person_ID`, `country_ID`, `birth_date`, `first_name`, `last_name`, `email`, `check_question`, `check_answer`, `sex`) VALUES
(1, 97, '0000-00-00', '', '', '', '', '', 0),
(2, 97, '1994-07-12', 'Roland', 'Kovács ', 'latinkukacprof@hotmail.com', 'Mi a kedvenc könyved?', 'Hogyan elégítsünk ki egy nőt 24 óra alatt', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `private_message`
--

CREATE TABLE `private_message` (
  `msg_ID` int(11) NOT NULL,
  `sender_ID` int(11) NOT NULL,
  `consignee_ID` int(11) NOT NULL,
  `message` varchar(350) NOT NULL,
  `send_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `seen` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `private_message`
--

INSERT INTO `private_message` (`msg_ID`, `sender_ID`, `consignee_ID`, `message`, `send_timestamp`, `seen`) VALUES
(1, 1, 2, 'Isten hozott a To Beer Or Not To Beer sör és sörfőzde értékelő oldalán.', '2019-04-08 21:36:07', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `profiles`
--

CREATE TABLE `profiles` (
  `profile_ID` int(11) NOT NULL,
  `person_ID` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `profile_pic` varchar(100) NOT NULL,
  `join_tmp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_enter` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `coin` int(11) NOT NULL,
  `rating_count` int(11) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `profiles`
--

INSERT INTO `profiles` (`profile_ID`, `person_ID`, `username`, `password`, `profile_pic`, `join_tmp`, `last_enter`, `coin`, `rating_count`, `active`) VALUES
(1, 1, 'Rendszer', '', '', '2019-04-08 21:24:29', '2019-04-08 21:24:29', 0, 0, 0),
(2, 2, 'latinkukacprof', 'b6fc4ab7f014b293fadfbbd07d460ad76ae8de2d', '', '2019-04-08 21:36:04', '2019-04-09 06:13:35', 20, 4, 1);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `beers`
--
ALTER TABLE `beers`
  ADD PRIMARY KEY (`beer_ID`),
  ADD KEY `brewery_ID` (`brewery_ID`),
  ADD KEY `glass_ID` (`glass_ID`),
  ADD KEY `category_ID` (`category_ID`);

--
-- A tábla indexei `beers_ratings`
--
ALTER TABLE `beers_ratings`
  ADD PRIMARY KEY (`beer_rating_ID`),
  ADD KEY `profile_ID` (`profile_ID`),
  ADD KEY `beer_ID` (`beer_ID`);

--
-- A tábla indexei `breweries`
--
ALTER TABLE `breweries`
  ADD PRIMARY KEY (`brewery_ID`),
  ADD KEY `country_ID` (`country_ID`);

--
-- A tábla indexei `brewery_ratings`
--
ALTER TABLE `brewery_ratings`
  ADD PRIMARY KEY (`brewery_rating_ID`),
  ADD KEY `profile_ID` (`profile_ID`),
  ADD KEY `brewery_ID` (`brewery_ID`);

--
-- A tábla indexei `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_ID`);

--
-- A tábla indexei `confirm`
--
ALTER TABLE `confirm`
  ADD PRIMARY KEY (`confirm_ID`),
  ADD KEY `profile_ID` (`profile_ID`);

--
-- A tábla indexei `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`country_ID`);

--
-- A tábla indexei `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`friend_ID`),
  ADD KEY `initiator_ID` (`initiator_ID`),
  ADD KEY `acceptor_ID` (`acceptor_ID`);

--
-- A tábla indexei `glasses`
--
ALTER TABLE `glasses`
  ADD PRIMARY KEY (`glass_ID`);

--
-- A tábla indexei `persons`
--
ALTER TABLE `persons`
  ADD PRIMARY KEY (`person_ID`),
  ADD KEY `country_ID` (`country_ID`);

--
-- A tábla indexei `private_message`
--
ALTER TABLE `private_message`
  ADD PRIMARY KEY (`msg_ID`),
  ADD KEY `sender_ID` (`sender_ID`),
  ADD KEY `consignee_ID` (`consignee_ID`);

--
-- A tábla indexei `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`profile_ID`),
  ADD KEY `person_ID` (`person_ID`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `beers`
--
ALTER TABLE `beers`
  MODIFY `beer_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT a táblához `beers_ratings`
--
ALTER TABLE `beers_ratings`
  MODIFY `beer_rating_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT a táblához `breweries`
--
ALTER TABLE `breweries`
  MODIFY `brewery_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT a táblához `brewery_ratings`
--
ALTER TABLE `brewery_ratings`
  MODIFY `brewery_rating_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT a táblához `categories`
--
ALTER TABLE `categories`
  MODIFY `category_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;

--
-- AUTO_INCREMENT a táblához `confirm`
--
ALTER TABLE `confirm`
  MODIFY `confirm_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT a táblához `countries`
--
ALTER TABLE `countries`
  MODIFY `country_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT a táblához `friends`
--
ALTER TABLE `friends`
  MODIFY `friend_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `glasses`
--
ALTER TABLE `glasses`
  MODIFY `glass_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT a táblához `persons`
--
ALTER TABLE `persons`
  MODIFY `person_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT a táblához `private_message`
--
ALTER TABLE `private_message`
  MODIFY `msg_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT a táblához `profiles`
--
ALTER TABLE `profiles`
  MODIFY `profile_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `beers`
--
ALTER TABLE `beers`
  ADD CONSTRAINT `beers_ibfk_1` FOREIGN KEY (`brewery_ID`) REFERENCES `breweries` (`brewery_ID`),
  ADD CONSTRAINT `beers_ibfk_2` FOREIGN KEY (`glass_ID`) REFERENCES `glasses` (`glass_ID`),
  ADD CONSTRAINT `beers_ibfk_3` FOREIGN KEY (`category_ID`) REFERENCES `categories` (`category_ID`);

--
-- Megkötések a táblához `beers_ratings`
--
ALTER TABLE `beers_ratings`
  ADD CONSTRAINT `beers_ratings_ibfk_1` FOREIGN KEY (`profile_ID`) REFERENCES `profiles` (`profile_ID`),
  ADD CONSTRAINT `beers_ratings_ibfk_2` FOREIGN KEY (`beer_ID`) REFERENCES `beers` (`beer_ID`);

--
-- Megkötések a táblához `breweries`
--
ALTER TABLE `breweries`
  ADD CONSTRAINT `breweries_ibfk_1` FOREIGN KEY (`country_ID`) REFERENCES `countries` (`country_ID`);

--
-- Megkötések a táblához `brewery_ratings`
--
ALTER TABLE `brewery_ratings`
  ADD CONSTRAINT `brewery_ratings_ibfk_1` FOREIGN KEY (`profile_ID`) REFERENCES `profiles` (`profile_ID`),
  ADD CONSTRAINT `brewery_ratings_ibfk_2` FOREIGN KEY (`brewery_ID`) REFERENCES `breweries` (`brewery_ID`);

--
-- Megkötések a táblához `confirm`
--
ALTER TABLE `confirm`
  ADD CONSTRAINT `confirm_ibfk_1` FOREIGN KEY (`profile_ID`) REFERENCES `profiles` (`profile_ID`);

--
-- Megkötések a táblához `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `friends_ibfk_1` FOREIGN KEY (`initiator_ID`) REFERENCES `profiles` (`profile_ID`),
  ADD CONSTRAINT `friends_ibfk_2` FOREIGN KEY (`acceptor_ID`) REFERENCES `profiles` (`profile_ID`);

--
-- Megkötések a táblához `persons`
--
ALTER TABLE `persons`
  ADD CONSTRAINT `persons_ibfk_1` FOREIGN KEY (`country_ID`) REFERENCES `countries` (`country_ID`);

--
-- Megkötések a táblához `private_message`
--
ALTER TABLE `private_message`
  ADD CONSTRAINT `private_message_ibfk_1` FOREIGN KEY (`sender_ID`) REFERENCES `profiles` (`profile_ID`),
  ADD CONSTRAINT `private_message_ibfk_2` FOREIGN KEY (`consignee_ID`) REFERENCES `profiles` (`profile_ID`);

--
-- Megkötések a táblához `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_ibfk_1` FOREIGN KEY (`person_ID`) REFERENCES `persons` (`person_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
