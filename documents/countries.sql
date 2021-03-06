SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";



CREATE TABLE IF NOT EXISTS `countries` (
`id` int(11) NOT NULL,
  `summary` varchar(4) NOT NULL,
  `title` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=244 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `summary`, `title`) VALUES
(1, 'AFG', 'افغانستان'),
(2, 'ALA', 'جزایر آلند'),
(3, 'ALB', 'آلبانی'),
(4, 'DZA', 'الجزایر'),
(5, 'ASM', 'ساموای آمریکا'),
(6, 'AND', 'آندورا'),
(7, 'AGO', 'آنگولا'),
(8, 'AIA', 'آنگویلا'),
(9, 'ATA', 'جنوبگان'),
(10, 'ATG', 'آنتیگوا و باربودا'),
(11, 'ARG', 'آرژانتین'),
(12, 'ARM', 'ارمنستان'),
(13, 'ABW', 'آروبا'),
(14, 'AUS', 'استرالیا'),
(15, 'AUT', 'اتریش'),
(16, 'AZE', 'جمهوری آذربایجان'),
(17, 'BHS', 'باهاما'),
(18, 'BHR', 'بحرین'),
(19, 'BGD', 'بنگلادش'),
(20, 'BRB', 'باربادوس'),
(21, 'BLR', 'بلاروس'),
(22, 'BEL', 'بلژیک'),
(23, 'BLZ', 'بلیز'),
(24, 'BEN', 'بنین'),
(25, 'BMU', 'برمودا'),
(26, 'BTN', 'پادشاهی بوتان'),
(27, 'BOL', 'بولیوی'),
(28, 'BIH', 'بوسنی و هرزگوین'),
(29, 'BWA', 'بوتسوانا'),
(30, 'BVT', 'جزیره بووه'),
(31, 'BRA', 'برزیل'),
(32, 'IOT', 'قلمرو اقیانوس هند بر'),
(33, 'BRN', 'برونئی'),
(34, 'BGR', 'بلغارستان'),
(35, 'BFA', 'بورکینافاسو'),
(36, 'BDI', 'بوروندی'),
(37, 'KHM', 'کامبوج'),
(38, 'CMR', 'کامرون'),
(39, 'CAN', 'کانادا'),
(40, 'CPV', 'کیپ ورد'),
(41, 'CYM', 'جزایر کیمن'),
(42, 'CAF', 'جمهوری آفریقای مرکزی'),
(43, 'TCD', 'چاد'),
(44, 'CHL', 'شیلی'),
(45, 'CHN', 'چین'),
(46, 'CXR', 'جزیره کریسمس'),
(47, 'CCK', 'جزایر کوکوس'),
(48, 'COL', 'کلمبیا'),
(49, 'COM', 'کومور'),
(50, 'COG', 'جمهوری کنگو'),
(51, 'COD', 'جمهوری دموکراتیک کنگ'),
(52, 'COK', 'جزایر کوک'),
(53, 'CRI', 'کاستاریکا'),
(54, 'CIV', 'ساحل عاج'),
(55, 'HRV', 'کرواسی'),
(56, 'CUB', 'کوبا'),
(57, 'CYP', 'قبرس'),
(58, 'CZE', 'جمهوری چک'),
(59, 'DNK', 'دانمارک'),
(60, 'DJI', 'جیبوتی'),
(61, 'DMA', 'دومینیکا'),
(62, 'DOM', 'جمهوری دومینیکن'),
(63, 'ECU', 'اکوادور'),
(64, 'EGY', 'مصر'),
(65, 'SLV', 'السالوادور'),
(66, 'GNQ', 'گینه استوایی'),
(67, 'ERI', 'اریتره'),
(68, 'EST', 'استونی'),
(69, 'ETH', 'اتیوپی'),
(70, 'FLK', 'جزایر فالکند'),
(71, 'FRO', 'جزایر فارو'),
(72, 'FJI', 'فیجی'),
(73, 'FIN', 'فنلاند'),
(74, 'FRA', 'فرانسه'),
(75, 'GUF', 'گویان فرانسه'),
(76, 'PYF', 'پولی‌نزی فرانسه'),
(77, 'ATF', 'سرزمین‌های قطب جنوب '),
(78, 'GAB', 'گابون'),
(79, 'GMB', 'گامبیا'),
(80, 'GEO', 'گرجستان'),
(81, 'DEU', 'آلمان'),
(82, 'GHA', 'غنا'),
(83, 'GIB', 'جبل طارق'),
(84, 'GRC', 'یونان'),
(85, 'GRL', 'گرینلند'),
(86, 'GRD', 'گرنادا'),
(87, 'GLP', 'جزیره گوادلوپ'),
(88, 'GUM', 'گوآم'),
(89, 'GTM', 'گواتمالا'),
(90, 'GGY', 'گرنزی'),
(91, 'GIN', 'گینه'),
(92, 'GNB', 'گینه بیسائو'),
(93, 'GUY', 'گویان'),
(94, 'HTI', 'هائیتی'),
(95, 'HMD', 'جزیره هرد و جزایر مک'),
(96, 'VAT', 'واتیکان'),
(97, 'HND', 'هندوراس'),
(98, 'HKG', 'هنگ کنگ'),
(99, 'HUN', 'مجارستان'),
(100, 'ISL', 'ایسلند'),
(101, 'IND', 'هند'),
(102, 'IDN', 'اندونزی'),
(103, 'IRQ', 'عراق'),
(104, 'IRL', 'جمهوری ایرلند'),
(105, 'IMN', 'جزیره من'),
(106, 'ISR', 'اسرائیل'),
(107, 'ITA', 'ایتالیا'),
(108, 'JAM', 'جامائیکا'),
(109, 'JPN', 'ژاپن'),
(110, 'JEY', 'جرسی'),
(111, 'JOR', 'اردن'),
(112, 'KAZ', 'قزاقستان'),
(113, 'KEN', 'کنیا'),
(114, 'KIR', 'کیریباتی'),
(115, 'PRK', 'کره شمالی'),
(116, 'KOR', 'کره جنوبی'),
(117, 'KWT', 'کویت'),
(118, 'KGZ', 'قرقیزستان'),
(119, 'LAO', 'لائوس'),
(120, 'LVA', 'لتونی'),
(121, 'LBN', 'لبنان'),
(122, 'LSO', 'لسوتو'),
(123, 'LBR', 'لیبریا'),
(124, 'LIE', 'لیختن‌اشتاین'),
(125, 'LTU', 'لیتوانی'),
(126, 'LUX', 'لوکزامبورگ'),
(127, 'MAC', 'ماکائو'),
(128, 'MKD', 'مقدونیه'),
(129, 'MDG', 'ماداگاسکار'),
(130, 'MWI', 'مالاوی'),
(131, 'MYS', 'مالزی'),
(132, 'MDV', 'مالدیو'),
(133, 'MLI', 'مالی'),
(134, 'MLT', 'مالت'),
(135, 'MHL', 'جزایر مارشال'),
(136, 'MTQ', 'مارتینیک'),
(137, 'MRT', 'موریتانی'),
(138, 'MUS', 'موریس'),
(139, 'MYT', 'مایوت'),
(140, 'MEX', 'مکزیک'),
(141, 'FSM', 'ایالات فدرال میکرونز'),
(142, 'MDA', 'مولداوی'),
(143, 'MCO', 'موناکو'),
(144, 'MNG', 'مغولستان'),
(145, 'MNE', 'مونته‌نگرو'),
(146, 'MSR', 'مونتسرات'),
(147, 'MAR', 'مراکش'),
(148, 'MOZ', 'موزامبیک'),
(149, 'MMR', 'میانمار'),
(150, 'NAM', 'نامیبیا'),
(151, 'NRU', 'نائورو'),
(152, 'NPL', 'نپال'),
(153, 'NLD', 'هلند'),
(154, 'ANT', 'آنتیل هلند'),
(155, 'NCL', 'کالدونیای جدید'),
(156, 'NZL', 'نیوزیلند'),
(157, 'NIC', 'نیکاراگوئه'),
(158, 'NER', 'نیجر'),
(159, 'NGA', 'نیجریه'),
(160, 'NIU', 'نیووی'),
(161, 'NFK', 'جزیره نورفولک'),
(162, 'MNP', 'جزایر ماریانای شمالی'),
(163, 'NOR', 'نروژ'),
(164, 'OMN', 'عمان'),
(165, 'PAK', 'پاکستان'),
(166, 'PLW', 'پالائو'),
(167, 'PSE', 'فلسطین'),
(168, 'PAN', 'پاناما'),
(169, 'PNG', 'پاپوآ گینه نو'),
(170, 'PRY', 'پاراگوئه'),
(171, 'PER', 'پرو'),
(172, 'PHL', 'فیلیپین'),
(173, 'PCN', 'جزایر پیت‌کرن'),
(174, 'POL', 'لهستان'),
(175, 'PRT', 'پرتغال'),
(176, 'PRI', 'پورتوریکو'),
(177, 'QAT', 'قطر'),
(178, 'REU', 'رئونیون'),
(179, 'ROU', 'رومانی'),
(180, 'RUS', 'روسیه'),
(181, 'RWA', 'رواندا'),
(182, 'BLM', 'سنت بارثلمی'),
(183, 'SHN', 'سینت هلینا'),
(184, 'KNA', 'سنت کیتس و نویس'),
(185, 'LCA', 'سنت لوسیا'),
(186, 'MAF', 'سنت مارتین'),
(187, 'SPM', 'سنت پیر و ماژلان'),
(188, 'VCT', 'سنت وینسنت و گرنادین'),
(189, 'WSM', 'ساموآ'),
(190, 'SMR', 'سن مارینو'),
(191, 'STP', 'سائوتومه و پرنسیپ'),
(192, 'SAU', 'عربستان سعودی'),
(193, 'SEN', 'سنگال'),
(194, 'SRB', 'صربستان'),
(195, 'SYC', 'سیشل'),
(196, 'SLE', 'سیرالئون'),
(197, 'SGP', 'سنگاپور'),
(198, 'SVK', 'اسلواکی'),
(199, 'SVN', 'اسلوونی'),
(200, 'SLB', 'جزایر سلیمان'),
(201, 'SOM', 'سومالی'),
(202, 'ZAF', 'آفریقای جنوبی'),
(203, 'SGS', 'جورجیای جنوبی و جزای'),
(204, 'ESP', 'اسپانیا'),
(205, 'LKA', 'سری‌لانکا'),
(206, 'SDN', 'سودان'),
(207, 'SUR', 'سورینام'),
(208, 'SJM', 'سوالبارد و یان ماین'),
(209, 'SWZ', 'سوازیلند'),
(210, 'SWE', 'سوئد'),
(211, 'CHE', 'سوئیس'),
(212, 'SYR', 'سوریه'),
(213, 'TJK', 'تاجیکستان'),
(214, 'TZA', 'تانزانیا'),
(215, 'THA', 'تایلند'),
(216, 'TLS', 'تیمور شرقی'),
(217, 'TGO', 'توگو'),
(218, 'TKL', 'توکلائو'),
(219, 'TON', 'تونگا'),
(220, 'TTO', 'ترینیداد و توباگو'),
(221, 'TUN', 'تونس'),
(222, 'TUR', 'ترکیه'),
(223, 'TKM', 'ترکمنستان'),
(224, 'TCA', 'جزایر تورکس و کایکوس'),
(225, 'TUV', 'تووالو'),
(226, 'UGA', 'اوگاندا'),
(227, 'UKR', 'اوکراین'),
(228, 'ARE', 'امارات متحده عربی'),
(229, 'GBR', 'بریتانیا'),
(230, 'USA', 'ایالات متحده آمریکا'),
(231, 'UMI', 'جزایر کوچک حاشیه‌ای '),
(232, 'URY', 'اروگوئه'),
(233, 'UZB', 'ازبکستان'),
(234, 'VUT', 'وانواتو'),
(235, 'VEN', 'ونزوئلا'),
(236, 'VNM', 'ویتنام'),
(237, 'VGB', 'جزایر ویرجین انگلستا'),
(238, 'VIR', 'جزایر ویرجین ایالات '),
(239, 'WLF', 'والیس و فوتونا'),
(240, 'ESH', 'صحرای غربی'),
(241, 'YEM', 'یمن'),
(242, 'ZMB', 'زامبیا'),
(243, 'ZWE', 'زیمبابوه');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=244;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;