-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 08, 2019 at 10:27 AM
-- Server version: 8.0.17
-- PHP Version: 7.2.24-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tht`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `author_id` bigint(20) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '0',
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'post',
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'vi',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `author_id`, `title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `type`, `locale`, `created_at`, `updated_at`) VALUES
(21, 2, 'Lời chào CEO', NULL, NULL, NULL, 'loi-chao-ceo', NULL, NULL, 1, 'page', 'vi', '2019-11-07 03:51:31', '2019-11-07 03:51:31'),
(22, 2, 'ceo letter', NULL, '<p><strong><span>OPEN LETTER</span></strong></p>\n<p><strong><em><span><span class=\"goog-text-highlight\">Welcome!</span></span></em></strong></p>\n<p><em><span>First of all, THT Trading, Service and High Technology Joint Stock Company would like to send respectful greetings to customers.</span></em></p>\n<p><em><span>Founded in 2012 by dedicated people, like-minded people, THT has gradually become one of the leading trading and technology service companies in Vietnam.</span></em></p>\n<p><em><span>THT\'s main business is Trading, Providing technical services and High Technology</span></em></p>\n<p><em><span>In the field of Commerce, we are the official distributor of electrical equipment products of GE Group (USA), LEELEN Group (China). In addition, we also distribute Telecommunications products, Switchboards, Video door phones with brands like Panasonic, Siemens ...</span></em></p>\n<p><em><span>      In the field of providing High Technology and Technical Services, we have a team of experienced engineers in the field of Electrical and Telecommunications Engineering, we are capable of providing Control Systems and Maintenance. protection (SCADA, DCS ...) for Factories, Enterprises, Power Transmission and Distribution Stations. We also provide consultancy, supply and installation of video conferencing systems, telephone exchange ... for state agencies and office buildings.</span></em></p>\n<p><em><span>      With the motto \"Quality of products and services ensure customer loyalty\", we believe, be proud and look forward to becoming a long-term reliable partner of customers.</span></em></p>\n<p><em><span>      Come to us so that you can really feel the word Trust in business, from words to actions, of a pure Vietnamese company, Trade, Service and High-tech THT company.</span></em></p>\n<p><em><span>Sincerely thank you and look forward to your cooperation!</span></em></p>', NULL, 'ceo-letter', NULL, NULL, 1, 'page', 'en', '2019-11-07 03:52:11', '2019-11-07 19:02:07'),
(23, 2, 'about us', NULL, '<h3>Formation process</h3>\n<p>Founded in 2012 by dedicated people, like-minded people, THT has gradually become one of the leading trading and technology service companies in Vietnam.</p>\n<p>THT\'s main business is Trading, Providing technical services and High Technology.<br />In the field of Commerce, we are the official distributor of electrical equipment products of GE Group (USA), LEELEN Group (China). In addition, we also distribute Telecommunications products, Switchboards, Video door phones with brands like Panasonic, Siemens ...</p>\n<p><em>In the field of providing High Technology and Technical Services, we have a team of experienced engineers in the field of Electrical and Telecommunications Engineering, we are capable of providing Control Systems and Maintenance. protection (SCADA, DCS ...) for Factories, Enterprises, Power Transmission and Distribution Stations. We also provide consultancy, supply and installation of video conferencing systems, telephone exchange ... for state agencies and office buildings.</em></p>\n<p>After more than 03 years of constant striving and maturing,  <strong>THT High Technology Service and Trading Joint Stock Company</strong>  has made progress in all aspects. With the orientation to build the Company to become the best and professional supplier of products, solutions and technical services to bring trust to customers.</p>\n<p>We have gradually asserted our position in the field of distribution of industrial electrical equipment, automation, design and manufacture of electrical cabinets, Scada systems and become a reliable partner of our customers. We are honored to be trusted by reputable partners in the world and selected to become the official importer and distributor of products and equipment in Vietnam. <strong>THT High Technology Service and Trading Joint Stock Company </strong> has become the official importer and distributor of  <strong>digital </strong><strong>relays</strong>   and  <strong>SCADA Synchronous Systems</strong>  of  <strong>GE </strong><strong>(USA) </strong> and  <strong>Alstom (UK)</strong>  since August  <strong>31, 2016</strong> . We are committed to providing our customers with genuine equipment, quality, reasonable prices and best after-sales service.</p>\n<h3>Oriented development</h3>\n<section class=\"ptb ptb-sm-80\">\n<div class=\"container\">\n<div class=\"row\">\n<div class=\"col-md-12\">\n<div class=\"text-justify\">\n<p>THT always strives towards the goal of sustainable development and becomes one of the leading trading and manufacturing panel companies in Vietnam, always providing high quality products and after-sales services based on on the professionalism, technology, internal knowledge and enthusiasm and creativity of our staff.</p>\n<p>THT always focuses on human factors, people are the company\'s top priority. With the motto: people are the decisive subject to success in work, THT constantly training, improving morality, qualification and creative thinking of human resources with the goals: Discipline - Solidarity - Dynamic - Creative. Benefit and develop career for each individual, for each member of the company</p>\n<p>THT always focuses on developing and perfecting products based on advanced technology, creativity and compliance with design standards to enhance the stature and reputation of the company in the field of manufacturing.</p>\n<p>THT always aims to achieve an effective management system to enhance the passion, responsibility and job transparency in each member of the company as well as to specify the benefits for each member.</p>\n<p>THT always focuses on building an enterprise culture environment with a professional style but covers human and human identities. And a stable, solid development foundation to bring the company to a high level of success.</p>\n<p>THT always expands comprehensive cooperation with domestic and foreign partners to absorb the quintessence from partners, as well as develop and promote its strengths. Always working with partners to build solidarity and commitment to benefit the company and the community</p>\n</div>\n</div>\n</div>\n</div>\n</section>\n<section id=\"client-logos\" class=\" fadeIn ptb ptb-sm-80\">\n<div class=\"container\">\n<div class=\"row\">\n<div class=\"col-lg-12 center-col margin-50px-bottom sm-margin-40px-bottom xs-margin-30px-bottom text-center\"> </div>\n</div>\n</div>\n</section>', NULL, 'about-us', NULL, NULL, 1, 'page', 'en', '2019-11-07 19:05:11', '2019-11-07 19:09:23'),
(24, 2, 'core value', NULL, '<p><span>- THT has a group of knowledgeable, cultural, active, creative, effective people who are eager to learn, respect and share with each other towards the goal of sustainable development and always consider: \" The company is family, colleagues are brothers ”</span></p>\n<p><span>- THT\'s products and services are high-quality and high-tech products and services which are crystallized from the intellectual elite of THT people plus advanced machine technology, and the process of organizing production compliance. ISO 9001: 2008 quality management system strictly controls every stage and every detail.</span></p>\n<p><span>- Having a system of suppliers that are selected, reputable, high quality, competitive prices. Always cooperating, respecting, sharing and supporting each other to develop together.</span></p>\n<p><span>- Having a large traditional customer system. Be trusted by customers on the basis of good products and services, dedicated to customers. Having the ability to expand and develop the customer system based on the reputation of quality, service and reputation of the brand and image of the business.</span></p>\n<p><span> Solidarity leadership, high competence, standards, always towards the interests of the community, in which the interests of employees and shareholders, are always thorough in implementing the commitments of yourself. The transparency and high responsibility of the leaders create trust for all those involved and easily get cooperation, support from many sides, promote the company\'s development fast, strong , lasting.</span></p>\n<h4><span>Oriented development</span></h4>\n<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n<tbody>\n<tr>\n<td>\n<p><span>THT always strives towards the goal of sustainable development and becomes one of the leading trading and manufacturing panel companies in Vietnam, always providing high quality products and after-sales services based on on the professionalism, technology, internal knowledge and enthusiasm and creativity of our staff.</span></p>\n<p><span>THT always focuses on human factors, people are the company\'s top priority. With the motto: people are the decisive subject to success in work, THT constantly training, improving morality, qualification and creative thinking of human resources with the goals: Discipline - Solidarity - Dynamic - Creative. Benefit and develop career for each individual, for each member of the company</span></p>\n<p><span>THT always focuses on developing and perfecting products based on advanced technology, creativity and compliance with design standards to enhance the stature and reputation of the company in the field of manufacturing.</span></p>\n<p><span>THT always aims to achieve an effective management system to enhance the passion, responsibility and job transparency in each member of the company as well as to specify the benefits for each member.</span></p>\n<p><span>THT always focuses on building an enterprise culture environment with a professional style but covers human and human identities. And a stable, solid development foundation to bring the company to a high level of success.</span></p>\n<p><span>THT always expands comprehensive cooperation with domestic and foreign partners to absorb the quintessence from partners, as well as develop and promote its strengths. Always working with partners to build solidarity and commitment to benefit the company and the community</span></p>\n</td>\n</tr>\n</tbody>\n</table>', NULL, 'core-value', NULL, NULL, 1, 'page', 'en', '2019-11-07 19:10:32', '2019-11-07 19:10:32'),
(25, 2, 'organizational chart', NULL, NULL, NULL, 'organizational-chart', NULL, NULL, 1, 'page', 'en', '2019-11-07 19:12:07', '2019-11-07 19:12:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
