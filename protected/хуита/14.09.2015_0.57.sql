-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Sep 14, 2015 at 01:56 AM
-- Server version: 5.5.42
-- PHP Version: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `vitamir`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Рыба и морепродукты'),
(2, 'Курица и мясо'),
(3, 'Вегитарианское');

-- --------------------------------------------------------

--
-- Table structure for table `daytime`
--

CREATE TABLE `daytime` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `daytime`
--

INSERT INTO `daytime` (`id`, `name`) VALUES
(1, 'утро'),
(2, 'день'),
(3, 'вечер'),
(12, 'утро, день'),
(13, 'утро, вечер'),
(23, 'день, вечер'),
(123, 'утро, день, вечер');

-- --------------------------------------------------------

--
-- Table structure for table `dish`
--

CREATE TABLE `dish` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `m_1` float NOT NULL,
  `m_2` float NOT NULL,
  `m_3` float NOT NULL,
  `w_1` float NOT NULL,
  `w_2` float NOT NULL,
  `w_3` float NOT NULL,
  `weight` int(11) NOT NULL,
  `fat` float NOT NULL,
  `protein` float NOT NULL,
  `carbohydrate` float NOT NULL,
  `calories` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `action` float DEFAULT '0',
  `category_id` int(11) unsigned NOT NULL,
  `daytime_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=259 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dish`
--

INSERT INTO `dish` (`id`, `name`, `image`, `description`, `m_1`, `m_2`, `m_3`, `w_1`, `w_2`, `w_3`, `weight`, `fat`, `protein`, `carbohydrate`, `calories`, `price`, `action`, `category_id`, `daytime_id`) VALUES
(198, 'Омлет белковый с сыром', 'upload/images/p19upmfbha8cp19o71vldc5nfli7.jpg', 'Омлет белковый с сыром', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 270, 9.385, 38.598, 0.387, 240, 0, 0, 3, 123),
(199, 'Омлет белковый с шпинатом', 'upload/images/p19upmijqg1ot033rfbq1ieq1bo3c.jpg', 'Омлет белковый с шпинатом', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 262, 0, 23.168, 0.517, 92, 0, 0, 3, 123),
(200, 'Омлет с овощами', 'upload/images/p19upmkeh61q3q11pv1nbkirrje6h.jpg', 'Омлет с овощами', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 265, 23.91, 27.792, 4.918, 344, 0, 0, 3, 123),
(201, 'Яица с зеленью', 'upload/images/p19upmltps245cma494grh1pa4m.jpg', 'Яица с зеленью', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 212, 23.482, 26.236, 2.274, 325, 0, 0, 3, 123),
(202, 'Овсяная каша на молоке', 'upload/images/default.jpg', 'Овсяная каша на молоке', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 203, 8.866, 10.5, 32.53, 249, 0, 0, 3, 123),
(203, 'Каша гречневая с орехами и ягодами', 'upload/images/p19upmndkk14061vff1p5u1ifd5piu.jpg', 'Каша гречневая с орехами и ягодами', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 203, 8.099, 9.033, 20.518, 187, 0, 0, 3, 123),
(204, 'Каша манная с молоком', 'upload/images/p19upmo95cnmbmi51gdpcm11ihp13.jpg', 'Каша манная с молоком', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 208, 1.96, 9.235, 37.66, 199, 0, 0, 3, 123),
(205, 'Каша рисовая с финиками', 'upload/images/p19upmp56k4ls17itvot1e077vq18.jpg', 'Каша рисовая с финиками', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 188, 1.715, 6.665, 33.36, 171, 0, 0, 3, 123),
(206, 'Каша 4 злака с молоком', 'upload/images/p19upmppnapttijs1ei5qbc61d.jpg', 'Каша 4 злака с молоком', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 205, 5.355, 11.315, 37.4, 243, 0, 0, 3, 123),
(207, 'Творожок дядюшки бороды', 'upload/images/p19upmqd5hskh1cb10pv184n1dbb1i.jpg', 'Творожок дядюшки бороды', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 215, 17.305, 31.185, 37.565, 420, 0, 0, 3, 123),
(208, 'Творог с курагой', 'upload/images/p19upn32bpnjid8rjcmq8g16ho1n.jpg', 'Творог с курагой', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 160, 7.53, 26.32, 7.8, 203, 0, 0, 3, 123),
(209, 'Творог с медом', 'upload/images/p19upn5o1g189pelk17di1h8ge221s.jpg', 'Творог с медом', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 165, 7.5, 25.92, 14.925, 227, 0, 0, 3, 123),
(210, 'Овощные крудитэ', 'upload/images/p19upn6d381h1ebg8bb9he81e3d21.jpg', 'Овощные крудитэ', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 120, 0.06, 1.29, 5.01, 24, 0, 0, 3, 123),
(211, 'Ореховая смесь', 'upload/images/p19upn72sp1aj3166b17k7u3o1cr26.jpg', 'Ореховая смесь', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 49, 28.483, 8.975, 6.31, 315, 0, 0, 3, 123),
(212, 'Фруктовый салат', 'upload/images/p19upn7p0b19b819h1jkf8qcsfa2b.jpg', 'Фруктовый салат', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 134, 0.464, 1.008, 11.246, 53, 0, 0, 3, 123),
(213, 'Блинчики из овсянки', 'upload/images/p19upn8g7qp9t12kf1fqb866rdl2j.jpg', 'Блинчики из овсянки', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 279, 24.2, 39.743, 27.704, 488, 0, 0, 3, 123),
(214, 'Творожники идеальные', 'upload/images/p19upn964211j71rbdfht1bc81kce2o.jpg', 'Творожники идеальные', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 318, 16.85, 38.491, 35.581, 442, 0, 0, 3, 123),
(215, 'Мусс из авакадо с клубникой', 'upload/images/p19upn9u5j1iql1f9pomr1lkm16gk2t.jpg', 'Мусс из авакадо с клубникой', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 178, 30.072, 3.282, 20.61, 350, 0, 0, 3, 123),
(216, 'Кефир 500 мл.', 'upload/images/default.jpg', 'Кефир 500 мл.', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 500, 5, 14, 20, 200, 0, 0, 3, 123),
(217, 'Салат из авокадо с клубникой', 'upload/images/p19upnakfm1d4s1clt1b75nvvrsg32.jpg', 'Салат из авокадо с клубникой', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 238, 17.314, 6.56, 8.365, 214, 0, 0, 3, 123),
(218, 'Овощной салат с красной капустой', 'upload/images/p19upnb8c813jc1ls8egct3k1kef37.jpg', 'Овощной салат с красной капустой', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 236, 5.719, 3.092, 9.473, 100, 0, 0, 3, 123),
(219, 'Спаржа запеченая в ломтиках индейки', 'upload/images/default.jpg', 'Спаржа запеченая в ломтиках индейки', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 108, 0.6, 14.7, 1.55, 81, 0, 0, 2, 123),
(220, 'Бутерброд с индейкой', 'upload/images/p19upncuu1ncikgebu219ve13uk3c.jpg', 'Бутерброд с индейкой', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 145, 4.135, 20.04, 18.245, 197, 0, 0, 2, 123),
(221, 'Бутерброд с курицей', 'upload/images/p19upnditl1s481qd2e1larro2h3h.jpg', 'Бутерброд с курицей', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 145, 4.47, 21.96, 18.415, 200, 0, 0, 2, 123),
(222, 'Воздушные хлебцы с лососем на козьем сыре.', 'upload/images/p19upnehg51ep216kfkjn7c11ku3m.jpg', 'Воздушные хлебцы с лососем на козьем сыре.', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 98, 8.587, 16.183, 20.631, 231, 0, 0, 1, 123),
(223, 'Салат из тунца и свежих овощей', 'upload/images/p19upnf4s61kcns6q16e310ml1pi03r.jpg', 'Салат из тунца и свежих овощей', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 339, 0.938, 37.804, 3.894, 181, 0, 0, 1, 123),
(224, 'Овощной салат с гречкой', 'upload/images/p19upngb3st7i1j15f40dpag5h40.jpg', 'Овощной салат с гречкой', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 123, 0.71, 3.185, 14.641, 74, 0, 0, 3, 123),
(225, 'Салат из огурца и сельдерея', 'upload/images/p19upnh3iu8puba457a180au045.jpg', 'Салат из огурца и сельдерея', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 158, 0.167, 1.363, 4.181, 22, 0, 0, 3, 123),
(226, 'Овощи на пару', 'upload/images/p19upnhqjs1r5m17alo0i19bj18un4a.jpg', 'Овощи на пару', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 275, 0.204, 2.163, 9.755, 48, 0, 0, 3, 123),
(227, 'Гречка отварная', 'upload/images/default.jpg', 'Гречка отварная', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 24, 0.792, 3.024, 14.904, 75, 0, 0, 3, 123),
(228, 'Рис отварной дл', 'upload/images/default.jpg', 'Рис отварной дл', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 20, 0.14, 1.34, 15.78, 68, 0, 0, 3, 123),
(229, 'Макароны отварные (твердый сорт)', 'upload/images/default.jpg', 'Макароны отварные (твердый сорт)', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 25, 0.275, 2.6, 17.425, 84, 0, 0, 3, 123),
(230, 'Броколли', 'upload/images/default.jpg', 'Броколли', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 100, 0.4, 3, 5.2, 28, 0, 0, 3, 123),
(231, 'Шпинат', 'upload/images/default.jpg', 'Шпинат', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 100, 0, 1.3, 4.7, 23, 0, 0, 3, 123),
(232, 'Картофель отварной', 'upload/images/default.jpg', 'Картофель отварной', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 90, 0.36, 1.8, 15.03, 73, 0, 0, 3, 123),
(233, 'Куриное филе с гречкой', 'upload/images/p19upnjm7n88l1to1ah9171b2qa4f.jpg', 'Куриное филе с гречкой', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 254, 3.231, 44.788, 14.246, 261, 0, 0, 2, 123),
(234, 'Куриное филе с рисом', 'upload/images/p19upnkb361hgfp1c13ui16hpgf4k.jpg', 'Куриное филе с рисом', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 213, 2.8, 44.04, 7.5, 226, 0, 0, 2, 123),
(235, 'Куриное филе с шпинатом', 'upload/images/p19upnm19u7uqn1l9c91c1sb0r4p.jpg', 'Куриное филе с шпинатом', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 243, 2.52, 43.02, 5.4, 214, 0, 0, 2, 123),
(236, 'Куриное филе с цветной капустой', 'upload/images/p19upnmtid14gccje1prh1b6qpu54u.jpg', 'Куриное филе с цветной капустой', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 193, 2.67, 42.97, 3.4, 206, 0, 0, 2, 123),
(237, 'Филе индейки с гречкой', 'upload/images/p19upnoa628vu4no3n1gip7mc53.jpg', 'Филе индейки с гречкой', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 254, 2.111, 38.068, 13.546, 251, 0, 0, 2, 123),
(238, 'Филе индейки с рисом', 'upload/images/p19upnov367q115sk1q4u16051s1458.jpg', 'Филе индейки с рисом', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 263, 1.88, 38.82, 9.4, 230, 0, 0, 2, 123),
(239, 'Филе индейки с шпинатом', 'upload/images/p19upnpi3dbq43q8jfhpu21dmc5d.jpg', 'Филе индейки с шпинатом', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 243, 1.4, 36.3, 4.7, 205, 0, 0, 2, 123),
(240, 'Филе индейки с цветной капустой', 'upload/images/p19upnq44egijpl9p6t1o9j60n5i.jpg', 'Филе индейки с цветной капустой', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 193, 1.55, 36.25, 2.7, 197, 0, 0, 2, 123),
(241, 'Филе куриное', 'upload/images/default.jpg', 'Филе куриное', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 140, 2.52, 41.72, 0.7, 191, 0, 0, 2, 123),
(242, 'Филе индейки', 'upload/images/default.jpg', 'Филе индейки', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 140, 1.4, 35, 0, 182, 0, 0, 2, 123),
(243, 'Телапия на пару с рисом', 'upload/images/p19upnr4hm1kqq1tcd14981m9b106m5n.jpg', 'Телапия на пару с рисом', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 273, 2.47, 28.55, 19.38, 212, 0, 0, 1, 123),
(244, 'Треска с отварным картофелем и зеленью', 'upload/images/p19upns2c0qqf1v4rk4ds0l1v9e5s.jpg', 'Треска с отварным картофелем и зеленью', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 226, 1.282, 24.888, 15.186, 176, 0, 0, 1, 123),
(245, 'Треска с зеленью', 'upload/images/p19upnst0k10491isi1jk516ck1t6m61.jpg', 'Треска с зеленью', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 133, 0.922, 23.088, 0.156, 102, 0, 0, 1, 123),
(246, 'Кальмар с овощами', 'upload/images/p19upntf8kvn88v5bagoi01gvn66.jpg', 'Кальмар с овощами', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 257, 18.03, 24.436, 11.674, 293, 0, 0, 1, 123),
(247, 'Куриный рулет', 'upload/images/p19upnu6qs109j13b51iau19tn163m6b.jpg', 'Куриный рулет', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 272, 13.962, 69.768, 9.891, 438, 0, 0, 2, 123),
(248, 'Курица в медово-лимонном соусе', 'upload/images/p19upnv2rb180c14i6ags1q251vd86g.jpg', 'Курица в медово-лимонном соусе', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 483, 27.649, 44.578, 89.146, 761, 0, 0, 2, 123),
(249, 'Паровая телятина в прованских травах ', 'upload/images/p19upo031t19ai1h701dr1jk31lia6l.jpg', 'Паровая телятина в прованских травах ', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 309, 1.643, 47.794, 4.219, 222, 0, 0, 2, 123),
(250, 'Телятина с овощами', 'upload/images/p19upo0usmu1afd813pu1m07amo6q.jpg', 'Телятина с овощами', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 229, 6.383, 46.758, 2.52, 254, 0, 0, 2, 123),
(251, 'Паровые котлеты куриные с макаронами', 'upload/images/p19upo1tdr18me1autsu0qu77u86v.jpg', 'Паровые котлеты куриные с макаронами', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 176, 7.869, 44.396, 18.612, 324, 0, 0, 2, 123),
(252, 'Паровые котлеты из индейки с макаронами', 'upload/images/p19upo2bir6u67kk18pr151gfvm74.jpg', 'Паровые котлеты из индейки с макаронами', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 176, 6.749, 37.676, 17.912, 314, 0, 0, 2, 123),
(253, 'Креветки с чесноком', 'upload/images/default.jpg', 'Креветки с чесноком', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 110, 1.099, 22.553, 2.599, 109, 0, 0, 1, 123),
(254, 'Медальоны из телятины', 'upload/images/p19upo361p19k8cs7eujt6n3mm7c.jpg', 'Медальоны из телятины', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 157, 1.446, 46.204, 0.643, 200, 0, 0, 2, 123),
(255, 'Гречка с тунцом и капустным салатом  ', 'upload/images/p19upo3t9rv2q9to10q515o0j4b7h.jpg', 'Гречка с тунцом и капустным салатом  ', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 274, 1.182, 20.917, 18.87, 168, 0, 0, 1, 123),
(256, 'Индейка с овощами', 'upload/images/p19upo4h6h1kebctt8ne9401e4r7m.jpg', 'Индейка с овощами', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 277, 6.735, 41.864, 27.29, 364, 0, 0, 2, 123),
(257, 'Спагетти с кальмарами', 'upload/images/p19upo50vduo31gp5o1bih9t417r.jpg', 'Спагетти с кальмарами', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 268, 3.225, 39.137, 25.061, 280, 0, 0, 1, 123),
(258, 'Зеленая фасоль с курицей и рисом', 'upload/images/p19upo5vkc1qu61uvugjeao6cmr80.jpg', 'Зеленая фасоль с курицей и рисом', 1, 1.8, 1.3, 0.5, 1.2, 0.8, 433, 9.769, 60.889, 39.968, 486, 0, 0, 2, 123);

-- --------------------------------------------------------

--
-- Table structure for table `dish_set`
--

CREATE TABLE `dish_set` (
  `set_id` int(10) unsigned NOT NULL,
  `dish_id` int(10) unsigned NOT NULL,
  `daytime_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dish_set`
--

INSERT INTO `dish_set` (`set_id`, `dish_id`, `daytime_id`) VALUES
(5, 200, 1),
(5, 203, 1),
(5, 235, 2),
(5, 240, 3),
(5, 250, 2),
(5, 255, 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_names`
--

CREATE TABLE `model_names` (
  `id` smallint(5) unsigned NOT NULL,
  `code` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `vin_name` varchar(128) NOT NULL,
  `rod_name` varchar(128) NOT NULL,
  `admin_menu` tinyint(1) NOT NULL DEFAULT '0',
  `sort` smallint(6) DEFAULT '9999'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `model_names`
--

INSERT INTO `model_names` (`id`, `code`, `name`, `vin_name`, `rod_name`, `admin_menu`, `sort`) VALUES
(1, 'set', 'Наборы', 'Набор', 'Набора', 1, 100),
(8, 'text', 'Тексты', 'Текст', 'Текста', 0, NULL),
(9, 'settings', 'Настройки', 'Параметр', 'Параметра', 1, 200),
(10, 'user', 'Пользователи', 'Пользователя', 'Пользователя', 0, NULL),
(11, 'import', 'Импорт', 'Импорт', 'Импорта', 1, 300),
(12, 'dish', 'Блюда', 'Блюдо', 'Блюда', 1, 150),
(13, 'order', 'Заказы', 'Заказ', 'Заказа', 1, 50);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(10) unsigned NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(10) unsigned DEFAULT NULL,
  `delivery` tinyint(4) DEFAULT NULL,
  `payment` tinyint(4) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `type` varchar(3) NOT NULL,
  `price` int(11) NOT NULL,
  `day` tinyint(4) NOT NULL,
  `state` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `date`, `user_id`, `delivery`, `payment`, `location`, `type`, `price`, `day`, `state`) VALUES
(2, '2015-09-13 14:26:21', 1, 0, 0, NULL, 'm-1', 1, 3, 1),
(17, '2015-09-13 14:37:54', 1, 0, 0, NULL, 'm-1', 1, 3, 3),
(18, '2015-09-13 14:38:14', 1, 0, 0, NULL, 'm-1', 1, 3, 3),
(19, '2015-09-13 14:39:02', 1, 0, 0, NULL, 'm-1', 1, 3, 2),
(20, '2015-09-13 14:39:14', 1, 0, 0, NULL, 'm-1', 1, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_dish`
--

CREATE TABLE `order_dish` (
  `order_id` int(10) unsigned NOT NULL,
  `dish_id` int(11) NOT NULL,
  `daytime_id` tinyint(4) NOT NULL,
  `count` tinyint(4) NOT NULL,
  `day` tinyint(3) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_dish`
--

INSERT INTO `order_dish` (`order_id`, `dish_id`, `daytime_id`, `count`, `day`) VALUES
(2, 200, 1, 1, 1),
(2, 200, 1, 1, 2),
(2, 200, 1, 1, 3),
(2, 203, 1, 2, 1),
(2, 203, 1, 1, 2),
(2, 203, 1, 1, 3),
(2, 235, 2, 4, 1),
(2, 235, 2, 1, 2),
(2, 235, 2, 1, 3),
(2, 236, 1, 1, 2),
(2, 237, 3, 9, 1),
(2, 239, 1, 1, 1),
(2, 239, 2, 1, 2),
(2, 240, 1, 3, 1),
(2, 240, 3, 7, 1),
(2, 240, 3, 1, 2),
(2, 240, 3, 1, 3),
(2, 241, 2, 1, 2),
(2, 242, 2, 6, 1),
(2, 242, 2, 1, 3),
(2, 250, 2, 5, 1),
(2, 250, 2, 1, 2),
(2, 250, 2, 1, 3),
(2, 255, 3, 8, 1),
(2, 255, 3, 1, 2),
(2, 255, 3, 1, 3),
(17, 200, 1, 1, 1),
(17, 200, 1, 1, 2),
(17, 200, 1, 1, 3),
(17, 203, 1, 2, 1),
(17, 203, 1, 1, 2),
(17, 203, 1, 1, 3),
(17, 235, 2, 4, 1),
(17, 235, 2, 1, 2),
(17, 235, 2, 1, 3),
(17, 236, 1, 1, 2),
(17, 237, 3, 9, 1),
(17, 239, 1, 1, 1),
(17, 239, 2, 1, 2),
(17, 240, 1, 3, 1),
(17, 240, 3, 7, 1),
(17, 240, 3, 1, 2),
(17, 240, 3, 1, 3),
(17, 241, 2, 1, 2),
(17, 242, 2, 6, 1),
(17, 242, 2, 1, 3),
(17, 250, 2, 5, 1),
(17, 250, 2, 1, 2),
(17, 250, 2, 1, 3),
(17, 255, 3, 8, 1),
(17, 255, 3, 1, 2),
(17, 255, 3, 1, 3),
(18, 200, 1, 1, 1),
(18, 200, 1, 1, 2),
(18, 200, 1, 1, 3),
(18, 203, 1, 2, 1),
(18, 203, 1, 1, 2),
(18, 203, 1, 1, 3),
(18, 235, 2, 4, 1),
(18, 235, 2, 1, 2),
(18, 235, 2, 1, 3),
(18, 236, 1, 1, 2),
(18, 237, 3, 9, 1),
(18, 239, 1, 1, 1),
(18, 239, 2, 1, 2),
(18, 240, 1, 3, 1),
(18, 240, 3, 7, 1),
(18, 240, 3, 1, 2),
(18, 240, 3, 1, 3),
(18, 241, 2, 1, 2),
(18, 242, 2, 6, 1),
(18, 242, 2, 1, 3),
(18, 250, 2, 5, 1),
(18, 250, 2, 1, 2),
(18, 250, 2, 1, 3),
(18, 255, 3, 8, 1),
(18, 255, 3, 1, 2),
(18, 255, 3, 1, 3),
(19, 200, 1, 1, 1),
(19, 200, 1, 1, 2),
(19, 200, 1, 1, 3),
(19, 203, 1, 2, 1),
(19, 203, 1, 1, 2),
(19, 203, 1, 1, 3),
(19, 235, 2, 4, 1),
(19, 235, 2, 1, 2),
(19, 235, 2, 1, 3),
(19, 236, 1, 1, 2),
(19, 237, 3, 9, 1),
(19, 239, 1, 1, 1),
(19, 239, 2, 1, 2),
(19, 240, 1, 3, 1),
(19, 240, 3, 7, 1),
(19, 240, 3, 1, 2),
(19, 240, 3, 1, 3),
(19, 241, 2, 1, 2),
(19, 242, 2, 6, 1),
(19, 242, 2, 1, 3),
(19, 250, 2, 5, 1),
(19, 250, 2, 1, 2),
(19, 250, 2, 1, 3),
(19, 255, 3, 8, 1),
(19, 255, 3, 1, 2),
(19, 255, 3, 1, 3),
(20, 200, 1, 1, 1),
(20, 200, 1, 1, 2),
(20, 200, 1, 1, 3),
(20, 203, 1, 2, 1),
(20, 203, 1, 1, 2),
(20, 203, 1, 1, 3),
(20, 235, 2, 4, 1),
(20, 235, 2, 1, 2),
(20, 235, 2, 1, 3),
(20, 236, 1, 1, 2),
(20, 237, 3, 9, 1),
(20, 239, 1, 1, 1),
(20, 239, 2, 1, 2),
(20, 240, 1, 3, 1),
(20, 240, 3, 7, 1),
(20, 240, 3, 1, 2),
(20, 240, 3, 1, 3),
(20, 241, 2, 1, 2),
(20, 242, 2, 6, 1),
(20, 242, 2, 1, 3),
(20, 250, 2, 5, 1),
(20, 250, 2, 1, 2),
(20, 250, 2, 1, 3),
(20, 255, 3, 8, 1),
(20, 255, 3, 1, 2),
(20, 255, 3, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(10) unsigned NOT NULL,
  `code` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `code`, `name`) VALUES
(1, 'root', 'Создатель'),
(2, 'admin', 'Администратор'),
(3, 'manager', 'Контент-менеджер'),
(4, 'client', 'Покупатель');

-- --------------------------------------------------------

--
-- Table structure for table `set`
--

CREATE TABLE `set` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `set`
--

INSERT INTO `set` (`id`, `name`, `sort`) VALUES
(5, 'Первый набор', 100);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` text,
  `code` varchar(50) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '9999'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `code`, `sort`) VALUES
(1, 'Заголовок страницы', '', 'TITLE', 10),
(2, 'Описание', '', 'DESCRIPTION', 20),
(3, 'Ключевые фразы', '', 'KEYWORDS', 30);

-- --------------------------------------------------------

--
-- Table structure for table `text`
--

CREATE TABLE `text` (
  `id` int(10) unsigned NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `text`
--

INSERT INTO `text` (`id`, `text`) VALUES
(1, 'Немецкий чип-тюнинг с гарантией результата в Москве'),
(2, 'Есть вопрос? Звоните - поможем!'),
(3, '+7 (499) 390-63-44'),
(4, 'Сделайте ваш'),
(5, 'мощнее\r\nна 32% за 20 минут'),
(6, 'Вернем деньги, если не почувствуете результат'),
(8, 'Современный немецкий чип-тюнинг блок + усилитель педали газа раскроет заложенные производителем мощности вашего автомобиля.'),
(9, 'Рассчитайте прирост мощности для'),
(10, 'прямо сейчас!'),
(11, 'Сегодня рассчитали уже <b>132</b> варианта чип-тюнинга'),
(12, 'Акция!'),
(13, 'При заявке до 29 мая монтаж - в подарок!'),
(14, 'Для продолжения заполните форму'),
(15, 'С сохранением дилерской гарантии\r\nНикакого вреда автомобилю\r\nБез увеличения расхода топлива'),
(16, '+7 (800) 505-79-53');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `usr_id` int(11) NOT NULL,
  `usr_login` varchar(128) NOT NULL,
  `usr_password` varchar(128) NOT NULL,
  `usr_name` varchar(255) DEFAULT 'дорогой клиент',
  `usr_surname` varchar(255) DEFAULT NULL,
  `usr_middle` varchar(255) DEFAULT NULL,
  `usr_email` varchar(128) DEFAULT NULL,
  `usr_rol_id` int(10) unsigned NOT NULL,
  `usr_promo` varchar(10) DEFAULT NULL,
  `usr_discount` int(11) NOT NULL DEFAULT '0',
  `usr_pers_discount` int(11) DEFAULT NULL,
  `usr_address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`usr_id`, `usr_login`, `usr_password`, `usr_name`, `usr_surname`, `usr_middle`, `usr_email`, `usr_rol_id`, `usr_promo`, `usr_discount`, `usr_pers_discount`, `usr_address`) VALUES
(1, 'root', '85676905d35fb12da70e8cb8bc8cebb0', 'Иван', 'Иванов', 'Иванович', 'beatbox787@gmail.com', 1, NULL, 0, NULL, ''),
(3, 'admin', 'eaaba36a95aedcfd1c21a0d011e12ecd', 'Петров П. П.', NULL, NULL, 'asdas@asdasd.ru', 2, NULL, 0, NULL, NULL),
(29, '74253453453', '85676905d35fb12da70e8cb8bc8cebb0', 'as dasf sad', NULL, NULL, 'asdas@alivance.com', 4, NULL, 0, NULL, NULL),
(30, '71111111111', '85676905d35fb12da70e8cb8bc8cebb0', 'qwe', NULL, NULL, 'asd@asd.ru', 4, NULL, 0, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daytime`
--
ALTER TABLE `daytime`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dish`
--
ALTER TABLE `dish`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dish_set`
--
ALTER TABLE `dish_set`
  ADD PRIMARY KEY (`set_id`,`dish_id`,`daytime_id`);

--
-- Indexes for table `model_names`
--
ALTER TABLE `model_names`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_dish`
--
ALTER TABLE `order_dish`
  ADD PRIMARY KEY (`order_id`,`dish_id`,`daytime_id`,`day`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `set`
--
ALTER TABLE `set`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `text`
--
ALTER TABLE `text`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`usr_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `daytime`
--
ALTER TABLE `daytime`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=124;
--
-- AUTO_INCREMENT for table `dish`
--
ALTER TABLE `dish`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=259;
--
-- AUTO_INCREMENT for table `model_names`
--
ALTER TABLE `model_names`
  MODIFY `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `set`
--
ALTER TABLE `set`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `text`
--
ALTER TABLE `text`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `usr_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;